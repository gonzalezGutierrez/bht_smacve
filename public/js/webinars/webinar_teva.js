
var _SERVERPATH;
var map;

$(document).ready(function(){

    let path = window.location.pathname;
    _SERVERPATH = "";
    if(path.indexOf("/webinar") > -1) {
        let idx = path.indexOf("webinar");
        _SERVERPATH = path.substring(0, idx) + "";
    }

    form_sumit_2();
});


function form_sumit_2(){
    $("#FormSendRegister2").validate({
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
            aceptoCondiciones:  { required: true}

        },
        messages: {
            aceptoCondiciones:  { required: "Para continuar debe aceptar las Condiciones de Uso"}


        }
    });
}

function form_sumit(){
    $("#FormSendRegister").validate({
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
            nombre:             {required: true},
            email:              {required: true, email: true},
            especialidad:       {required: true},
            telefono:           {required: false},
            aceptoCondiciones:  { required: true}

        },
        messages: {
            nombre:             {required: "Requerido"},
            email:              {required: "Requerido", email: "Formato No Valido"},
            especialidad:       {required: "Requerido"},
            telefono:           {required: "Requerido"},
            aceptoCondiciones:  { required: "Para continuar debe aceptar las Condiciones de Uso"}


        }
    });
}

