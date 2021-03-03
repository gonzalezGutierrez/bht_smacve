
$(document).ready(function(){


    form_sumit_actualizar_datos();

});

function form_sumit_actualizar_datos(){

    $("#voluntariado").validate({
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
            declaracionInteres:        { required: true, maxlength:600},
            aptitudes:                 { required: true, maxlength:600}
        },
        messages: {
            declaracionInteres:        { required: "Requerido",maxlength:"Máximo 600 caracteres."},
            aptitudes:                 { required: "Requerido",maxlength:"Máximo 600 caracteres."},
        }
    });
}



