
$(document).ready(function(){

    $(":file").jfilestyle({
        theme: "blue",
        dragdrop: false,
        text: "Buscar Imagen"
    });

    form_sumit_registrar_pago();
});

function registrarPago(idAnualidad,anualidad,idStatusPago) {

    $("#idAnualidad").val(idAnualidad);
    $("#anualidad").text(anualidad);
    $("#idStatusPago").val(idStatusPago);

    $("#registrarPagoModal").modal('show');
}


function form_sumit_registrar_pago(){

    $.validator.addMethod('filesize', function (value, element, param) {
        return this.optional(element) || (element.files[0].size <= param)
    }, 'La fotografia debe pesar menos o igual a 4MB');


    $("#FormRegistrarPago").validate({
        submitHandler: function (form) {
            show_loading();
            form.submit();
        },
        rules: {
            idStatusPago:     { required: true},
            comprobantePago:  { required: false,extension: "pdf|jpg|png",filesize: 4000000   }
        },
        messages: {
            idStatusPago:     { required: "Requerido"},
            comprobantePago:  { required: "Requerido", extension:"Solo se permiten archivos con extensión JPG PNG ó PDF."}
        }
    });
}


