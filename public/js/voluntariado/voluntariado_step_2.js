
$(document).ready(function(){


    $("#datetimepicker1").datetimepicker({
        locale: 'es',
        format: 'DD/MM/YYYY',
        viewMode: 'years',
        useCurrent: false,
        ignoreReadonly:true
    });


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
            'check_tipo_practica[]':            { required: true},
            practicaHospitales:                 { required: false},
            afiliacionInstitucion:              { required: true},
            nombreInstitucion:                  { required: false, maxlength:255},
            'check_configuracion_practica[]':   { required: true},
            comitesAnteriores:                  { required: true},
            fechaInicioPractica:                { required: true},
            idEstado:                           { required: true},
            ciudad:                             { required: true},
            fechaNacimiento:                    { required: true}
        },
        messages: {
            'check_tipo_practica[]':            { required: "Seleccione minimo una opción"},
            practicaHospitales:                 { required: "Requerido"},
            afiliacionInstitucion:              { required: "Requerido"},
            nombreInstitucion:                  { required: "Requerido", maxlength:"Máximo 255 caracteres."},
            'check_configuracion_practica[]':   { required: "Seleccione minimo una opción"},
            comitesAnteriores:                  { required: "Requerido"},
            fechaInicioPractica:                { required: "Requerido"},
            idEstado:                           { required: "Requerido"},
            ciudad:                             { required: "Requerido"},
            fechaNacimiento:                    { required: "Requerido"}

        }
    });
}



