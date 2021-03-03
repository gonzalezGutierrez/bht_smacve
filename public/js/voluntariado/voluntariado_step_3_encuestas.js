
$(document).ready(function(){


    form_sumit_actualizar_datos();

});

function form_sumit_actualizar_datos(){

    $("#voluntariado").validate({
        errorClass: "invalid-feedback",
        validClass: "has-success",
        errorElement: "span",
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            }
            else if(element.closest('.form-check-list').length){
                error.insertAfter(element.closest('.form-check-list'));
            }
            else {
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
            idHoraDisponible:        { required: true},
            'check_actividades[]':   { required: false}
        },
        messages: {
            idHoraDisponible:        { required: "Requerido"},
            'check_actividades[]':   { required: "Requerido"},
        }
    });
}



