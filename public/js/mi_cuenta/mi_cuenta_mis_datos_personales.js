
$(document).ready(function(){



    $("#datetimepicker1").datetimepicker({
        locale: 'es',
        format: 'DD/MM/YYYY',
        viewMode: 'years',
        useCurrent: false,
        ignoreReadonly:true
    });


    $(".dropzone").html5imageupload();
    $(".dropzone:after").css('content','');

    form_sumit_actualizar_datos();

});

function form_sumit_actualizar_datos(){

    $("#FormEditarUsuario").validate({
        errorClass: "invalid-feedback",
        validClass: "has-success",
        errorElement: "span",
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length || element.parent('.form-check').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function(element) {
            $(element).closest('.form-control').addClass('is-invalid');
        },
        unhighlight: function(element) {
            $(element).closest('.form-control').removeClass('is-invalid');
        },
        submitHandler: function (form) {
            show_loading();
            form.submit();
        },
        rules: {
            titulo:                         { required: true},
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

            email:                          { required:true,  email: true }
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

            email:                          { required: "Requerido", email:"Formato no válido"}
        }
    });
}



