
<!DOCTYPE html>
<html lang="es">
   <head>
        <meta charset="utf-8">
        <style>
            .header {
                background-color: #000;
                height: 70px;
                padding: 10px;
            }
            .header p {
                color: #FFFFFF;
                font-size: 24px;
            }
            .jumbotron {
                background-color: #FAFAFA;
            }
            .jumbotron p {
                font-size: 14px;
                font-family: "arial","sans-serif";
                color:#444444;
            }
            .container .jumbotron {
                padding-left: 30px;
                padding-right: 30px;
                border-radius: 0;
            }
            
            .content {
                background-color: #F3F3F3;
                padding: 20px;
            }
            .page-wrapper h1 {
                font-size: 22px;
            }
        </style>
    </head>
    <body>

        <div class="content container">
            <div class="page-wrapper">
               
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="header">                            
                            <p>
                                Solicitud de Contacto desde el Portal Web SMACVE
                            </p>                             
                      </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="jumbotron"> 
                            <br>
                            <p>
                            <strong>Nombre:</strong>{!! $nombre !!}<br>
                            <strong>Teléfono:</strong> {!! $telefono !!} <br/>
                            <strong>Email:</strong> {!! $email !!}<br>
                            <strong>Mensaje:</strong> {!! $mensaje !!}
                            </p>
                            <br>                            
                            <br>
                            <p style="font-size: 13px; text-align: left; color: #444444">
                                Servidor Web SMACVE<br>
                                Tel. 01 55 2614 7849
                                <br><br>
                                <small style="color: #BBBBBB;font-size: 13px;">* Este correo ha sido generado automáticamente por el servidor de correos. No es necesario responderlo.</small>
                            </p> 
                            <br>
                      </div>
                    </div>
                </div>
                                
                
            </div>            
            <br/>
            <br/>            
        </div>   
        
    </body>
</html>