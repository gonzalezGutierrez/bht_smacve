
$(document).ready(function(){
    form_sumit();
});


function form_sumit(){
    $("#formularioChangePassword").validate({
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
            password:                       { required: true, maxlength: 10, minlength: 6 },
            password_confirmation:          { equalTo: "#password"}
        },
        messages: {
            password:                       { required: "El campo password es obligatorio.", maxlength: "Password debe contener maximo 10 caracteres", minlength: "Password debe contener al menos 6 caracteres"},
            password_confirmation:          { equalTo:  "La confirmación de Password no coincide"}
        }
    });
}


