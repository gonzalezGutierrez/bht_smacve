
$(document).ready(function(){

    $("#datetimepicker1").datetimepicker({
        locale: 'es',
        format: 'DD/MM/YYYY',
        viewMode: 'years',
        useCurrent: false,
        ignoreReadonly:true
    });

    form_sumit();

});


/********************************************************************************************************
 ********************************************** GENERALES ***********************************************
 ********************************************************************************************************/




function form_sumit(){

    $("#FormRegister").validate({
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
            bootbox.confirm("Estas a punto de crear tu cuenta, ¿Deseas continuar?", function (result) {
                    if(result)
                    {
                        show_loading();
                        form.submit();
                    }
                });
        },
        rules: {
            nombre:                         { required: true, maxlength:255},
            apellidoPaterno:                { required: true, maxlength:255},
            fechaNacimiento:                { required: true},
            especialidad:                   { required: true, maxlength:255},
            cedulaProfesional:              { required: true},
            cedulaEspecialidad:             { required: true},

            calle:                          { required: true},
            noExt:                          { required: true},
            colonia:                        { required: true},
            municipio:                      { required: true},
            idEstado:                       { required: true},
            idPais:                         { required: true},

            email:                          { required:true,  email: true },
            password:                       { required: true, maxlength: 12, minlength: 6 },
            password_confirmation:          { equalTo: "#password"},
            aceptoCondiciones:              { required: true}
        },
        messages: {
            nombre:                         { required: "Requerido", maxlength:"Máximo 255 caracteres."},
            apellidoPaterno:                { required: "Requerido", maxlength:"Máximo 255 caracteres."},
            fechaNacimiento:                { required: "Requerido"},
            especialidad:                   { required: "Requerido", maxlength:"Máximo 255 caracteres."},
            cedulaProfesional:              { required: "Requerido"},
            cedulaEspecialidad:             { required: "Requerido"},

            calle:                          { required: "Requerido"},
            noExt:                          { required: "Requerido"},
            colonia:                        { required: "Requerido"},
            municipio:                      { required: "Requerido"},
            idEstado:                       { required: "Requerido"},
            idPais:                         { required: "Requerido"},

            email:                          { required: "Requerido", email:"Formato no válido"},
            password:                       { required: "Requerido", maxlength: "Máximo 12 caracteres", minlength: "Minimo 6 caracteres"},
            password_confirmation:          { equalTo: "Password y Repetir Password deben coincidir."},
            aceptoCondiciones:              { required: "Para continuar debe aceptar las Condiciones de Uso"}
        }

    });
}
