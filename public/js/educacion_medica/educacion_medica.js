


$(document).ready(function(){
    let categoriaSelecionada = $("#categoria_educacion_medica").val();

    $(".list-group-item-action").removeClass("active");
    $(categoriaSelecionada).addClass("active");

});

