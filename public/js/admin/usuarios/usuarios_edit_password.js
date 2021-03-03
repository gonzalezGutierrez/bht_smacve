$(document).ready(function(){

    validarFormulario();
});


function validarFormulario(){
    $("#FormCambiarPasswordUsuario").validate({
        submitHandler: function (form) {
            bootbox.confirm("Se editará el password del Usuario, ¿Desea continuar?", function (result) {
                if(result)
                {
                    show_loading();
                    form.submit();
                }
            });
        },
        rules: {
            password:                       { required: true, maxlength: 12, minlength: 6 },
            password_confirmation:          { equalTo: "#password"}
        },
        messages: {
            password:                       { required: "Requerido", maxlength: "Máximo 12 caracteres", minlength: "Minimo 6 caracteres"},
            password_confirmation:          { equalTo: "Password y Repetir Password deben coincidir."}
        }
    });
}