
$(document).ready(function(){


    $(".check_list").click(function() {

        if($(".check_list:checked").length > 2){

            $(this).prop('checked', false);

            bootbox.alert({
                message: "Solo puedes seleccionar como máximo dos opciones.",
                size: 'small'
            });
        }
    });


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

            let total = $(".check_list:checked").length;

            if(total > 0 ){

                if(total <= 2){
                    show_loading();
                    form.submit();
                }
                else{
                    bootbox.alert({
                        message: "Solo puedes seleccionar como máximo dos opciones.",
                        size: 'small'
                    });
                }
            }
            else{
                bootbox.alert({
                    message: "Seleccione como minimo una opción para continuar.",
                    size: 'small'
                });
            }

        },
        rules: {
            'check_list[]':                 { required: false}
        },
        messages: {
            'check_list[]':                { required: "Requerido"}
        }
    });
}



