


$(document).ready(function(){

    let seccionHendolat = $("#seccion_hendolat").val();

    $(".btn-seccion").removeClass("active");
    $(seccionHendolat).addClass("active");


});

function showloading() {
    $("#loading").show();
}

function show_loading(){
    $("#loading").show();
}

function hide_loading(){
    $("#loading").hide();
}

function hideloading() {
    $("#loading").hide();
}