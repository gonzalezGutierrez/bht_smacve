var _SERVERPATH;
var _array_imagen_name;
var _array_archivo_name;
var _array_videos_name;

$(document).ready(function(){

    let path = window.location.pathname;
    _SERVERPATH = "";

    if(path.indexOf("/admin/educacion_medica") > -1) {
        let idx = path.indexOf("admin/educacion_medica");
        _SERVERPATH = path.substring(0, idx) + "";
    }

    $('.dropzone').html5imageupload();

    $('.dropzone:after').css('content','');

    $("#datetimepicker1").datetimepicker({
        locale: 'es',
        format: 'DD/MM/YYYY HH:mm:ss',
        viewMode: 'years',
        useCurrent: false,
    });

    $("#editor").jqte();
    $('.jqte_editor').css({ height: '250px' });

    $("#cp2").colorpicker();
    $("#cp3").colorpicker();


    form_sumit();

    /******************************************************
     *******************IMAGENES***************************
     ******************************************************/

    $("#btnBuscarImagen").click(function () {
        $('#imagen_file').click();
    });
    $('#imagen_file').on('change', function(){
        let file = $('#imagen_file')[0].files[0];
        $('#imagen_text').val(file.name);
    });
    $("#btnUploadImagen").click(function(){
        uploadImagen();
    });

    /******************************************************
     *******************ARCHIVO PDF***************************
     ******************************************************/

    $("#btnBuscarArchivo").click(function () {
        $('#archivo_file').click();
    });
    $("#archivo_file").on('change', function(){
        let file = $('#archivo_file')[0].files[0];
        $('#archivo_text').val(file.name);
    });
    $("#btnUploadArchivo").click(function(){
        uploadArchivo();
    });

    /******************************************************
     ********************VIDEOS***************************
     ******************************************************/

    $("#btnAgregarVideo").click(function () {
        uploadVideo();
    });

});

$(window).on('load', function(){

    _array_imagen_name  = [];
    _array_archivo_name = [];
    _array_videos_name = [];

    $("[name='checkboxPrioridad']").bootstrapSwitch('state', false);
    $("[name='checkboxVisible']").bootstrapSwitch('state', false);
    $("[name='checkboxPremium']").bootstrapSwitch('state', false);


    if(parseInt($("#hiddencheckboxPrioridad").val()) === 1){
        $("[name='checkboxPrioridad']").bootstrapSwitch('state', true);
    }
    if(parseInt($("#hiddencheckboxVisible").val()) === 1){
        $("[name='checkboxVisible']").bootstrapSwitch('state', true);
    }
    if(parseInt($("#hiddencheckboxPremium").val()) === 1){
        $("[name='checkboxPremium']").bootstrapSwitch('state', true);
    }

    getImagen();
    getVideos();
});



/***************************************************************
 ***********************FUNCIONES DE EDICION***********************
 ****************************************************************/
 function getImagen(){
    let imagenes = $("#imagen_hidden").val();

    if(imagenes !== ""){
        imagenes = imagenes.split(",");

        for(let i=0; i<imagenes.length; i++)
        {
            let idImagen = imagenes[i].replace(".", "");
            let img = "<div id=\"" + idImagen + "\" class=\"imagen-uploaded\">" +
                "<img src=\" " + _SERVERPATH + 'images_articulos/' + imagenes[i] + " \" class=\"\"/>" +

                "<div class=\"progress\"><div  aria-valuemax=\"100\" aria-valuemin=\"0\" aria-valuenow=\"100\" role=\"progressbar\" class=\"progress-bar progress-bar-success\" style=\" width: 100%;\"><span class=\"progress-title\">100%</span></div></div> " +

                "<div class=\"tools\">" +
                " <a href=\"javascript:void(0);\" onclick=\"delete_imagen('" + imagenes[i] + "')\" class=\"btn btn-default btn-xs\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>" +
                "</div>" +
                "</div>";

            // Mostramos la Imagen
            $("#contenedor-imagenes").append(img);

            // Agregamos el nombre a nuestro arreglo a guardar
            _array_imagen_name.push(imagenes[i]);

        }
    }


}
 function getArchivo(){
     let archivos = $("#archivo_hidden").val();

     if(archivos !== ""){
         archivos = archivos.split(",");

         for(let i=0; i<archivos.length; i++)
         {
             let idArchivo = archivos[i].replace(".", "");

             let item = "<div id=\"" + idArchivo + "\" class=\"archivo-uploaded\">" +
                         "<div class=\"pdf-img\">" +
                         "<i class=\"fa fa-file-pdf-o\" aria-hidden=\"true\"></i>" +
                         "</div>" +
                         "<div class=\"pdf-name\">"+archivos[i]+"</div>" +

                         "<div class=\"progress\"><div  aria-valuemax=\"100\" aria-valuemin=\"0\" aria-valuenow=\"100\" role=\"progressbar\" class=\"progress-bar progress-bar-success\" style=\" width: 100%;\"><span class=\"progress-title\">100%</span></div></div> " +

                         "<div class=\"tools\">" +
                         " <a href=\"javascript:void(0);\" onclick=\"delete_archivo('" + archivos[i] + "')\" class=\"btn btn-default btn-xs\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>" +
                         "</div>" +
                         "</div>";

             // Mostramos la Imagen
             $("#contenedor-archivos").append(item);

             // Agregamos el nombre a nuestro arreglo a guardar
             _array_archivo_name.push(archivos[i]);

         }
     }

 }
 function getVideos(){
     let videos = $("#video_hidden").val();

    if(videos !== ""){
        videos = videos.split(",");

        for(let i=0; i<videos.length; i++)
        {
            let id_video = videos[i];

            let item = "<div id=\"" + id_video.replace('/','') + "\" class=\"videos-uploaded\">" +
                "<div class=\"video\">" +
                "<iframe src=\"http://www.youtube.com/embed/"+id_video+"\" frameborder=\0\ allowfullscreen=\"\"  width=\"100%\" height=\"100%\" allowfullscreen></iframe>" +
                "</div>" +
                "<div class=\"video-name\">"+id_video+"</div>" +
                "<div class=\"progress\"><div  aria-valuemax=\"100\" aria-valuemin=\"0\" aria-valuenow=\"100\" role=\"progressbar\" class=\"progress-bar progress-bar-success\" style=\" width: 100%;\"><span class=\"progress-title\">100%</span></div></div> " +
                "<div class=\"tools\">" +
                " <a href=\"javascript:void(0);\" onclick=\"delete_video('" + id_video + "')\" class=\"btn btn-default btn-xs\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>" +
                "</div>" +
                "</div>";

            // Mostramos el video
            $("#contenedor-videos").append(item);

            // Agregamos el nombre a nuestro arreglo a guardar
            _array_videos_name.push(id_video);

        }
    }
}

/***************************************************************
 ***********************UPLOADER IMAGENES***********************
 ****************************************************************/
function uploadImagen() {

    if ($("#imagen_file").val() != "") {

        var imagen = $("#imagen_file")[0].files[0];

        if (isImage(imagen)) {
            var formData = new FormData();
            formData.append('imagen', imagen);

            $.ajax({
                async: true,
                type: "POST",
                dataType: "json",
                cache: false,
                //contentType: "application/x-www-form-urlencoded",
                contentType: false,
                processData: false,
                url: _SERVERPATH + 'admin/articulos/upload_image',
                data: formData,
                headers: {'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')},
                beforeSend: show_upload_loading_imagen,
                success: function (datos) {
                    if (datos.status == "success") {

                        var idImagen = datos.imagen.replace(".", "");
                        var img = "<div id=\"" + idImagen + "\" class=\"imagen-uploaded\">" +
                            "<img src=\" " + _SERVERPATH + 'images_articulos/' + datos.imagen + " \" class=\"\"/>" +

                            "<div class=\"progress\"><div  aria-valuemax=\"100\" aria-valuemin=\"0\" aria-valuenow=\"100\" role=\"progressbar\" class=\"progress-bar progress-bar-success\" style=\" width: 100%;\"><span class=\"progress-title\">100%</span></div></div> " +

                            "<div class=\"tools\">" +
                            " <a href=\"javascript:void(0);\" onclick=\"delete_imagen('" + datos.imagen + "')\" class=\"btn btn-default btn-xs\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>" +
                            "</div>" +
                            "</div>";

                        // Mostramos la Imagen
                        $("#contenedor-imagenes").append(img);

                        // Agregamos el nombre a nuestro arreglo a guardar
                        _array_imagen_name.push(datos.imagen);

                        // limpiamos el file
                        $("#imagen_file").val("");
                        $('#imagen_text').val("");
                    }
                    else {
                        bootbox.alert("<strong>ADVERTENCIA!</strong> " + datos.msg);
                    }
                },
                error: function () {
                    bootbox.alert("<strong>ERROR.-</strong> No se pudo conectar con el servidor.");
                },
                complete: function (xhr, status) {
                    $(".upload-loading-imagen").hide()
                }
            });
        }
        else{
            bootbox.alert("<strong>ADVERTENCIA!</strong> El achivo que elegiste no tiene formato de imagen.");
        }
    }

    else{
        bootbox.alert("<strong>ADVERTENCIA!</strong> Antes debes seleccionar la imagen que deseas subir.");
    }

}
function delete_imagen(n_imagen){

    var nombre_imagen = n_imagen;

    var formData = new FormData();
    formData.append('nombre_imagen',nombre_imagen);

    $.ajax({
        async: true,
        type: "POST",
        dataType: "json",
        cache: false,
        //contentType: "application/x-www-form-urlencoded",
        contentType: false,
        processData: false,
        url: _SERVERPATH+'admin/articulos/destroy_image',
        data: formData,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        beforeSend:show_upload_loading_imagen(),
        success: function (datos) {
            if (datos.status == "success") {

                // Mostramos la Imagen
                var idImagen = nombre_imagen.replace(".", "");
                $("#"+idImagen).remove();

                // Eliminamos el nombre a nuestro arreglo a guardar
                for(var i = 0; i < _array_imagen_name.length; i++){
                    if(nombre_imagen === _array_imagen_name[i]){
                        delete _array_imagen_name[i];
                        _array_imagen_name.splice(i,1);
                    }
                }
                // limpiamos el file
                $('#imagen_file').empty();
                $('#imagen_text').val("");
            }
            else
            {
                bootbox.alert("<strong>ADVERTENCIA!</strong> "+datos.msg);
            }
        },
        error: function () {
            bootbox.alert("<strong>ERROR.-</strong> No se pudo conectar con el servidor.");
        },
        complete: function (xhr, status) {
            $(".upload-loading-imagen").hide()
        }
    })

}
function show_upload_loading_imagen(){
    $(".upload-loading-imagen").show()
}
function isImage(imagen) {
    var fsize = imagen.size;
    var ftype = imagen.type;

    var result = false;

    switch(ftype)
    {
        //case 'text/plain':
        //case 'text/html':
        //case 'application/x-zip-compressed':
        //case 'application/pdf':
        //case 'application/msword':
        //case 'application/vnd.ms-excel':
        //case 'video/mp4':
        case 'image/png':   result = true; break;
        case 'image/gif':   result = true; break;
        case 'image/jpg':   result = true; break;
        case 'image/jpeg':  result = true; break;
        default:            result = false; break;
    }

    return result;
}


/***************************************************************
 *********************** UPLOADER ARCHIVO***********************
 ****************************************************************/

function uploadArchivo() {

    if ($("#archivo_file").val() != "") {

        var archivo = $('#archivo_file')[0].files[0];

        if (isPDF(archivo)) {

            var formData = new FormData();
            formData.append('archivo', archivo);

            $.ajax({
                async: true,
                type: "POST",
                dataType: "json",
                cache: false,
                //contentType: "application/x-www-form-urlencoded",
                contentType: false,
                processData: false,
                url: _SERVERPATH + 'admin/articulos/upload_pdf',
                data: formData,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                beforeSend: show_upload_loading_archivo,
                success: function (datos) {
                    if (datos.status == "success") {

                        var idArchivo = datos.archivo.replace(".", "");

                        var item = "<div id=\"" + idArchivo + "\" class=\"archivo-uploaded\">" +

                            "<div class=\"pdf-img\">" +
                            "<i class=\"fa fa-file-pdf-o\" aria-hidden=\"true\"></i>" +
                            "</div>" +
                            "<div class=\"pdf-name\">"+datos.archivo+"</div>" +

                            "<div class=\"progress\"><div  aria-valuemax=\"100\" aria-valuemin=\"0\" aria-valuenow=\"100\" role=\"progressbar\" class=\"progress-bar progress-bar-success\" style=\" width: 100%;\"><span class=\"progress-title\">100%</span></div></div> " +

                            "<div class=\"tools\">" +
                            " <a href=\"javascript:void(0);\" onclick=\"delete_archivo('" + datos.archivo + "')\" class=\"btn btn-default btn-xs\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>" +
                            "</div>" +
                            "</div>";


                        // Mostramos la Imagen
                        $("#contenedor-archivos").append(item);

                        // Agregamos el nombre a nuestro arreglo a guardar
                        _array_archivo_name.push(datos.archivo);

                        // limpiamos el file
                        $("#archivo_file").val("");
                        $('#archivo_text').val("");
                    }
                    else {
                        bootbox.alert("<strong>ADVERTENCIA!</strong> " + datos.msg);
                    }
                },
                error: function () {
                    bootbox.alert("<strong>ERROR.-</strong> No se pudo conectar con el servidor.");
                },
                complete: function (xhr, status) {
                    $(".upload-loading-arhivo").hide()
                }
            });
        }
        else{
            bootbox.alert("<strong>ADVERTENCIA!</strong> El achivo que elegiste no tiene formato PDF.");
        }
    }

    else{
        bootbox.alert("<strong>ADVERTENCIA!</strong> Antes debes seleccionar el archivo PDF que deseas subir.");
    }

}
function delete_archivo(n_archivo){

    var nombre_archivo = n_archivo;

    var formData = new FormData();
    formData.append('nombre_archivo',nombre_archivo);

    $.ajax({
        async: true,
        type: "POST",
        dataType: "json",
        cache: false,
        //contentType: "application/x-www-form-urlencoded",
        contentType: false,
        processData: false,
        url: _SERVERPATH+'admin/articulos/destroy_pdf',
        data: formData,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        beforeSend:show_upload_loading_archivo,
        success: function (datos) {
            if (datos.status == "success") {

                // Removemos el archivo de la vista
                var idArchivo = nombre_archivo.replace(".", "");
                $("#"+idArchivo).remove();

                // Eliminamos el nombre a nuestro arreglo a guardar
                for(var i = 0; i < _array_archivo_name.length; i++){
                    if(nombre_archivo === _array_archivo_name[i]){
                        delete _array_archivo_name[i];
                        _array_archivo_name.splice(i,1);
                    }
                }

                $("#archivo_file").val("");
                $('#archivo_text').val("");
            }
            else
            {
                bootbox.alert("<strong>ADVERTENCIA!</strong> "+datos.msg);
            }
        },
        error: function () {
            bootbox.alert("<strong>ERROR.-</strong> No se pudo conectar con el servidor.");
        },
        complete: function (xhr, status) {
            $(".upload-loading-arhivo").hide()
        }
    })

}

function show_upload_loading_archivo(){
    $(".upload-loading-arhivo").show()
}
function isPDF(archivo) {

    //var fsize = archivo.size;
    var ftype = archivo.type;

    var result = false;

    if(ftype == 'application/pdf')
    {
        result = true;
    }

    return result;
}

/****************************************************************
 ***********************UPLOAD VIDEOS YOUTUBE*********************
 ****************************************************************/

function uploadVideo(){
    if ($("#video_text").val() != "") {

        let url = $("#video_text").val();

        let id_video;
        let item;


        if(getVimeoId(url) !== "not a vimeo url" ){
            id_video = getVimeoId(url);

            item = "<div id=\"" + id_video.replace('/','') + "\" class=\"videos-uploaded\">" +
                "<div class=\"video\">" +
                "<iframe src=\"https://player.vimeo.com/video/"+id_video+"\" frameborder=\"0\" allow=\"autoplay; fullscreen\" width=\"100%\" height=\"100%\" allowfullscreen></iframe>" +
                "</div>" +
                "<div class=\"video-name\">"+id_video+"</div>" +
                "<div class=\"progress\"><div  aria-valuemax=\"100\" aria-valuemin=\"0\" aria-valuenow=\"100\" role=\"progressbar\" class=\"progress-bar progress-bar-success\" style=\" width: 100%;\"><span class=\"progress-title\">100%</span></div></div> " +
                "<div class=\"tools\">" +
                " <a href=\"javascript:void(0);\" onclick=\"delete_video('" + id_video + "')\" class=\"btn btn-default btn-xs\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>" +
                "</div>" +
                "</div>";
        }
        else{

            id_video = getYoutubeId(url);

            item = "<div id=\"" + id_video.replace('/','') + "\" class=\"videos-uploaded\">" +
                "<div class=\"video\">" +
                "<iframe src=\"http://www.youtube.com/embed/"+id_video+"\" frameborder=\0\ allowfullscreen=\"\"  width=\"100%\" height=\"100%\" allowfullscreen></iframe>" +
                "</div>" +
                "<div class=\"video-name\">"+id_video+"</div>" +
                "<div class=\"progress\"><div  aria-valuemax=\"100\" aria-valuemin=\"0\" aria-valuenow=\"100\" role=\"progressbar\" class=\"progress-bar progress-bar-success\" style=\" width: 100%;\"><span class=\"progress-title\">100%</span></div></div> " +
                "<div class=\"tools\">" +
                " <a href=\"javascript:void(0);\" onclick=\"delete_video('" + id_video + "')\" class=\"btn btn-default btn-xs\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>" +
                "</div>" +
                "</div>";
        }


        // Mostramos el video
        $("#contenedor-videos").append(item);

        // Agregamos el nombre a nuestro arreglo a guardar
        _array_videos_name.push(id_video);

        // limpiamos el video text
        $("#video_text").val("");

    }
    else{
        bootbox.alert("<strong>ADVERTENCIA!</strong> Escribe la url del Video Youtube.");
    }
}

function getYoutubeId(url) {

    var length_url = url.length;
    var length_idVideo = 11;
    var start_idVideo = length_url - length_idVideo;

    return url.substring(start_idVideo);
}
function getVimeoId( url ) {

    // Look for a string with 'vimeo', then whatever, then a
    // forward slash and a group of digits.
    let match = /vimeo.*\/(\d+)/i.exec( url );

    // If the match isn't null (i.e. it matched)
    if ( match ) {
        // The grouped/matched digits from the regex
        return match[1];
    }
    else{
        return "not a vimeo url";
    }
}
function delete_video(id_video){

    var id = "#"+id_video.replace('/','');
    // Removemos el video de la vista
    $(id).remove();

    // Eliminamos el nombre a nuestro arreglo a guardar
    for(var i = 0; i < _array_videos_name.length; i++){
        if(id_video === _array_videos_name[i]){
            delete _array_videos_name[i];
            _array_videos_name.splice(i,1);
        }
    }

    $("#video_text").val("");
}


/***************************************************************
 *********************** GENERALES***********************
 ****************************************************************/

function form_sumit(){
    $("#FormEditarPost").validate({
        submitHandler: function (form) {
            bootbox.confirm("Se actualizará el Post, ¿Desea continuar?", function (result) {
                    if(result)
                    {

                        let formData = new FormData();
                        formData.append('_method','PATCH');

                        formData.append('titulo',$("#titulo").val());
                        formData.append('descripcion',$("#descripcion").val());
                        formData.append('thumb',$('input[name=thumb_values]').val());

                        formData.append('idTipoPost',$("#idTipoPost").val());
                        formData.append('idCategoriaPost',$("#idCategoriaPost").val());
                        formData.append('fechaPublicacion',$("#fechaPublicacion").val());
                        formData.append('autor',$("#autor").val());

                        formData.append('premium',(String($("[name='checkboxPremium']").bootstrapSwitch('state')) === "false") ? 0 : 1);
                        formData.append('prioridad',(String($("[name='checkboxPrioridad']").bootstrapSwitch('state')) === "false") ? 0 : 1);
                        formData.append('visible',(String($("[name='checkboxVisible']").bootstrapSwitch('state')) === "false") ? 0 : 1);

                        formData.append('background_color_fondo',$("#background_color_fondo").val());
                        formData.append('background_color_texto',$("#background_color_texto").val());

                        formData.append('contenido',$("#editor").val());
                        formData.append('images',_array_imagen_name.toString());
                        formData.append('videos',_array_videos_name.toString());
                        formData.append('files',_array_archivo_name.toString());

                        $.ajax({
                            async: true,
                            type: "POST",
                            dataType: "json",
                            cache: false,
                            //contentType: "application/x-www-form-urlencoded",
                            contentType: false,
                            processData: false,
                            url: $("#FormEditarPost").attr('action'),
                            data: formData,
                            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                            beforeSend:showloading(),
                            success: function (datos) {
                                if (datos.status === "success") {
                                    bootbox.dialog({
                                        message: "Los datos se han guardado exitosamente.",
                                        title: "Post Actualizado",
                                        buttons: {
                                            aceptar: {
                                                label: "Aceptar",
                                                className: "btn-theme",
                                                callback: function () {
                                                    window.location.href = _SERVERPATH + "admin/educacion_medica";
                                                }
                                            }
                                        }
                                    });
                                }
                                else
                                {
                                    bootbox.alert("<strong>ERROR!</strong> "+datos.msj);
                                }
                            },
                            error: function (xhr) {
                                bootbox.alert("An error occured: " + xhr.status + " " + xhr.statusText);
                            },
                            complete: function (xhr, status) {
                                hideloading();
                            }
                        });
                    }
                });
        },
        rules: {
            titulo:                 { required: true},
            descripcion:            { required: true, maxlength:500},
            idTipoPost:             { required:true},
            idCategoriaPost:        { required:true},
            fechaPublicacion:       { required:true},
            autor:                { required:true}
        },
        messages: {
            titulo:                 { required: "Requerido"},
            descripcion:            { required: "Requerido", maxlength:"500 caracteres como maximo."},
            idTipoPost:             { required: "Requerido"},
            idCategoriaPost:        { required: "Requerido"},
            fechaPublicacion:       { required: "Requerido"},
            autor:                  { required: "Requerido"}
        }
    });
}
