var _SERVERPATH;

$(document).ready(function(){

    let path = window.location.pathname;
    _SERVERPATH = "";
    if(path.indexOf("/educacion_medica") > -1) {
        let idx = path.indexOf("educacion_medica");
        _SERVERPATH = path.substring(0, idx) + "";
    }
    
    $(document).keyup(function (e) {
        
        if(e.keyCode === 13){
            sendMessage();
        }
    });

    $("#btn-send").click(function () {
        sendMessage();
    });

    // INICIALIZAMOS LA LISTA DE MENSAJE E INICIAMOS LA BUSQUEDA
    $("#idMessage").val(0);

    // Si no es vimeo, activamos el chat
    if($("#idTipoPost").val() !== '4'){
        setTimeout(function () {
            retrieveChatMessages();
        },3000);
    }
});


function sendMessage() {

    let username    = $("#username").text();
    let idUsuario   = $("#idUsuario").val();
    let idPost      = $("#idPost").val();
    let message     = $("#message").val();

    if(message.length > 0){

        let formData = new FormData();
        formData.append('idUsuario', idUsuario);
        formData.append('idPost', idPost);
        formData.append('comentario', message);

        $.ajax({
            async: true,
            type: "POST",
            dataType: "json",
            //contentType: "application/x-www-form-urlencoded",
            cache: false,
            contentType: false,
            processData: false,
            url: _SERVERPATH+"educacion_medica/chat/send_message",
            data: formData,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            beforeSend: '',
            success: function (datos) {

                if (datos.status === "success") {
                    let html =  "<div class=\"comentario\">";
                        html += "<div class=\"date\">"+datos.created_at.toString()+"</div>";
                        html += "<div class=\"name\">"+username+"</div>";
                        html += "<div class=\"text\">"+message+"</div>";
                        html += "</div>";

                    $("#chat-window").append(html);
                    $("#message").val('');

                    $("#idMessage").val(datos.idMessage);


                    document.getElementById('chat-window').scrollTop=document.getElementById('chat-window').scrollHeight;

                }
            },
            error: function () {

            },
            complete: function (xhr, status) {
            }
        });

    }

}

function retrieveChatMessages() {

    let idPost          = $("#idPost").val();
    let idMessage      = $("#idMessage").val();

    let formData = new FormData();
    formData.append('idPost', idPost);
    formData.append('idMessage', idMessage);

    $.ajax({
        async: true,
        type: "POST",
        dataType: "json",
        //contentType: "application/x-www-form-urlencoded",
        cache: false,
        contentType: false,
        processData: false,
        url: _SERVERPATH+"educacion_medica/chat/retrieve_chat_messages",
        data: formData,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        beforeSend: '',
        success: function (datos) {

            if (datos.status === "success") {
                if(datos.message.length > 0){
                    for(let i=0; i<datos.message.length; i++) {


                        let html =  "<div class=\"comentario\">";
                        html += "<div class=\"date\">"+datos.message[i].created_at+"</div>";
                        html += "<div class=\"name\">"+datos.message[i].nombre+' '+datos.message[i].apellidoPaterno+"</div>";
                        html += "<div class=\"text\">"+datos.message[i].comentario+"</div>";
                        html += "</div>";

                        $("#chat-window").append(html);

                        idMessage = datos.message[i].idMessage;
                        $("#idMessage").val(idMessage);
                    }
                    document.getElementById('chat-window').scrollTop=document.getElementById('chat-window').scrollHeight;
                }
            }
        },
        error: function () {

        },
        complete: function (xhr, status) {
            setTimeout(function () {
                retrieveChatMessages();
            },7000);
        }
    });
}
