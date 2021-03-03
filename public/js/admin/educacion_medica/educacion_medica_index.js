$(document).ready(function(){
    $(".btnDelete").on("click",function(){
        let form = $( this ).parent("form");
        bootbox.confirm("Se eliminará el Post, ¿Desea continuar?", function (result) {
            if(result)
            {
                show_loading();
                form.submit();
            }
        });
    });
});