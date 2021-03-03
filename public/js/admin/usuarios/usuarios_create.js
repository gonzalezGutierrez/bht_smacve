var _SERVERPATH;


$(document).ready(function(){

    var path = window.location.pathname;
    _SERVERPATH = "";
    if(path.indexOf("/admin/usuarios/create") > -1) {
        var idx = path.indexOf("admin/usuarios/create");
        _SERVERPATH = path.substring(0, idx) + "";
    }


    $("#datetimepicker1").datetimepicker({
        locale: 'es',
        format: 'DD/MM/YYYY',
        viewMode: 'years',
        useCurrent: false,
        ignoreReadonly:true
    });

    $(".dropzone").html5imageupload();
    $(".dropzone:after").css('content','');

    form_sumit();


});


/***************************************************************
 *********************** GENERALES***********************
 ****************************************************************/

function form_sumit(){


    $("#FormNuevoUsuario").validate({
        submitHandler: function (form) {
            bootbox.confirm("Se creará una nuevo Usuario, ¿Desea continuar?", function (result) {
                if(result)
                {
                    showloading();
                    form.submit();
                }
            });
        },
        rules: {
            titulo:                         { required: false},
            nombre:                         { required: true, maxlength:255},
            apellidoPaterno:                { required: true, maxlength:255},
            apellidoMaterno:                { required: false, maxlength:255},
            fechaNacimiento:                { required: false},
            sexo:                           { required: false},
            telOficina:                     { required: false},
            movil:                          { required: false},

            resumenCV:                      { required: false,  maxlength:1000},
            universidad:                    { required: false },
            especialidad:                   { required: false },
            cedulaProfesional:              { required: false },
            cedulaEspecialidad:             { required: false },
            lugarTrabajo:                   { required: false },

            calle:                          { required: false },
            noExt:                          { required: false },
            noInt:                          { required: false },
            colonia:                        { required: false},
            municipio:                      { required: false},
            localidad:                      { required: false},
            idEstado:                       { required: true},
            idPais:                         { required: true},
            codigoPostal:                   { required: false},

            email:                          { required:true,  email: true },
            idRol:                          { required: true},
            idCargo:                        { required: true},
            idStatusSocio:                  { required: true},

            password:                       { required: true, maxlength: 12, minlength: 6 },
            password_confirmation:          { equalTo: "#password"}
        },
        messages: {
            titulo:                         { required: "Requerido"},
            nombre:                         { required: "Requerido", maxlength:"Máximo 255 caracteres."},
            apellidoPaterno:                { required: "Requerido", maxlength:"Máximo 255 caracteres."},
            apellidoMaterno:                { required: "Requerido", maxlength:"Máximo 255 caracteres."},
            fechaNacimiento:                { required: "Requerido"},
            sexo:                           { required: "Requerido"},
            telOficina:                     { required: "Requerido"},
            movil:                          { required: "Requerido"},

            resumenCV:                      { required: "Requerido",  maxlength:"Máximo 1000 caracteres."},
            universidad:                    { required: "Requerido"},
            especialidad:                   { required: "Requerido"},
            cedulaProfesional:              { required: "Requerido"},
            cedulaEspecialidad:             { required: "Requerido"},
            lugarTrabajo:                   { required: "Requerido"},

            calle:                          { required: "Requerido"},
            noExt:                          { required: "Requerido"},
            noInt:                          { required: "Requerido"},
            colonia:                        { required: "Requerido"},
            municipio:                      { required: "Requerido"},
            localidad:                      { required: "Requerido"},
            idEstado:                       { required: "Requerido"},
            idPais:                         { required: "Requerido"},
            codigoPostal:                   { required: "Requerido"},

            email:                          { required: "Requerido", email:"Formato no válido"},
            idRol:                          { required: "Requerido"},
            idCargo:                        { required: "Requerido"},
            idStatusSocio:                  { required: "Requerido"},

            password:                       { required: "Requerido", maxlength: "Máximo 12 caracteres", minlength: "Minimo 6 caracteres"},
            password_confirmation:          { equalTo: "Password y Repetir Password deben coincidir."}
        }

    });
}

