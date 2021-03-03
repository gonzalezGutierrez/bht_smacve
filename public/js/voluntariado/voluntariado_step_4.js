
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
            aceptoPoliticas:                { required: true},
            politicaConflicto:              { required: true},
            comentarios:                    { required: false, maxlength:200}
        },
        messages: {
            aceptoPoliticas:                { required: "Es necesario que acepte la política de declaración de conflictos"},
            politicaConflicto:              { required: "Requerido"},
            comentarios:                    { required: "Requerido",maxlength:"Máximo 200 caracteres."}

        }
    });
}



