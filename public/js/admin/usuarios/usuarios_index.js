$(document).ready(function(){

    var path = window.location.pathname;
    _SERVERPATH = "";

    if(path.indexOf("/admin/usuarios") > -1) {
        var idx = path.indexOf("admin/usuarios");
        _SERVERPATH = path.substring(0, idx) + "";
    }

    $(".btnDelete").on("click",function(){
        var form = $( this ).parent("form");
        bootbox.confirm("Se eliminará el Usuario, ¿Desea continuar?", function (result) {
            if(result)
            {
                show_loading();
                form.submit();
            }
        });
    });


    $("#btnExportar").click(function () {
        export_excel();
    });
});



function export_excel() {

    var idEstado        = $("#idEstado").val();
    var idStatusSocio   = $("#idStatusSocio").val();
    var txtbuscar       = $("#txtbuscar").val();


    window.open(_SERVERPATH+'admin/usuarios/export?idEstado='+idEstado+'&idStatusSocio='+idStatusSocio+'&txtbuscar='+txtbuscar,'_blank');

}