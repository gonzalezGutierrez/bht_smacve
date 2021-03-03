var _SERVERPATH;

$(document).ready(function(){


    let path = window.location.pathname;
    _SERVERPATH = "";
    if(path.indexOf("/mi_cuenta") > -1) {
        let idx = path.indexOf("mi_cuenta");
        _SERVERPATH = path.substring(0, idx) + "";
    }



    $("#toggle-share").bootstrapToggle({
        on          : '<i class=\'fas fa-share\'></i> Compartir',
        off         : '<i class=\'fas fa-ban\'></i> No Compartir',
        onstyle     : 'success',
        offstyle    :'dark',
        width       : '180',
        height      : '35'
    });

    var toggle_share_hidden = $("#toggle-share-hidden").val();
    if(parseInt(toggle_share_hidden) === 1){
        $("#toggle-share").bootstrapToggle('on');
    }

    $("#toggle-share").change(function() {
        if($(this).prop('checked')){
            compartirInformacion(1);
        }
        else {
            compartirInformacion(0);
        }
    });


});

function compartirInformacion(share_response) {
    $.ajax({
        async: true,
        type: "POST",
        dataType: "json",
        //contentType: "application/x-www-form-urlencoded",
        cache: false,
        contentType: false,
        processData: false,
        url: _SERVERPATH+"mi_cuenta/compartir_informacion/"+share_response,
        data: '',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        beforeSend:show_loading(),
        success: function (result) {

        },
        error: function () {
            alert('error');
        },
        complete: function (xhr, status) {
            hide_loading();
        }
    });
}

