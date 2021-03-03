<?php

namespace App\Http\Controllers;


use App\Anualidad;

use App\Estado;
use App\Http\Requests\EditPasswordRequest;
use App\Mail\SendAvisoPagoMail;
use App\Notifications\PagoEjecutadoNotification;
use App\Pago;
use App\Pais;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;


class MiCuentaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check.status.user');

    }

    public function mi_cuenta()
    {
        $idUsuario          = Auth::user()->idUsuario;
        $usuario            = User::getMiembro($idUsuario);

        return view('mi_cuenta.mi_cuenta',compact('usuario'));
    }

    public function herramientas_para_socios(){

        $idUsuario          = Auth::user()->idUsuario;
        $usuario            = User::getMiembro($idUsuario);

        return view('mi_cuenta.mi_cuenta_herramientas_para_socios',compact('usuario'));
    }


    public function mi_cuenta_anualidades(){

        $idUsuario          = Auth::user()->idUsuario;
        $usuario            = User::getMiembro($idUsuario);
        $anualidades        = Anualidad::getHistorialAnualidades($idUsuario);

        return view('mi_cuenta.mi_cuenta_anualidades',compact('usuario','anualidades'));
    }

    public function mi_cuenta_informacion_pago(){
        $idUsuario          = Auth::user()->idUsuario;
        $usuario            = User::getMiembro($idUsuario);

        return view('mi_cuenta.mi_cuenta_informacion_pago',compact('usuario'));
    }


    public function mis_datos_personales(){

        $idUsuario      = Auth::user()->idUsuario;
        $usuario                = User::find($idUsuario);


        $estados            = Estado::where('eliminado',0)->pluck('estado','idEstado');
        $paises             = Pais::where('eliminado',0)->pluck('pais','idPais');

        return view('mi_cuenta.mi_cuenta_mis_datos_personales',compact('usuario','estados','paises'));

    }
    public function update_mis_datos_personales(Request $request,$idUsuario){


        $fotografia = "sin_foto.jpg";
        $changeFoto  = 0;
        $fechaNacimiento = $request->input('fechaNacimiento');

        if(!empty($fechaNacimiento)){
            $fechaNacimiento =  Carbon::CreateFromFormat('d/m/Y', $request->input('fechaNacimiento'));
        }

        try
        {
            $usuario                        = User::find($idUsuario);

            $usuario->titulo                 = mb_strtoupper($request->input('titulo'));
            $usuario->nombre                 = mb_strtoupper($request->input('nombre'));
            $usuario->apellidoPaterno        = mb_strtoupper($request->input('apellidoPaterno'));
            $usuario->apellidoMaterno        = mb_strtoupper($request->input('apellidoMaterno'));

            if ($request->has('thumb_values')){
                $imagenjson = $request->input('thumb_values');
                if(isset($imagenjson) && $imagenjson != 'undefined' )
                {
                    $json		= json_decode($imagenjson);
                    $tmp	    = explode(',',$json->data);
                    $imgdata    = base64_decode($tmp[1]);

                    $extension              =  explode('.',$json->name);
                    $extension				=  strtolower( end($extension));

                    $titulo             = trim(str_replace(' ', '', $usuario->titulo));
                    $titulo             = trim(str_replace('.', '', $usuario->titulo));
                    $nombre             = trim(str_replace(' ', '', $usuario->nombre));
                    $apellidoPaterno    = trim(str_replace(' ', '', $usuario->apellidoPaterno));
                    $apellidoMaterno    = trim(str_replace(' ', '', $usuario->apellidoMaterno));


                    $fotografia         = mb_strtolower($this->quitar_tildes($titulo.'_'.$nombre.'_'.$apellidoPaterno.'_'.$apellidoMaterno.'.'.$extension)) ;

                    $handle	= fopen(public_path().'/images/miembros/'.$fotografia,'w+');
                    fwrite($handle, $imgdata);
                    fclose($handle);

                    $changeFoto = 1;
                }
            }

            if($changeFoto == 1){
                $usuario->foto                   = $fotografia;
            }

            if(!empty($fechaNacimiento))
            {
                $usuario->fechaNacimiento    = $fechaNacimiento;
            }

            $usuario->sexo                   = $request->input('sexo');
            $usuario->telOficina             = $request->input('telOficina');
            $usuario->movil                  = $request->input('movil');

            $usuario->email                  = $request->input('email');

            $usuario->resumenCV              = $request->input('resumenCV');
            $usuario->universidad            = mb_strtoupper($request->input('universidad'));
            $usuario->especialidad           = mb_strtoupper($request->input('especialidad'));
            $usuario->cedulaProfesional      = mb_strtoupper($request->input('cedulaProfesional'));
            $usuario->cedulaEspecialidad     = mb_strtoupper($request->input('cedulaEspecialidad'));
            $usuario->lugarTrabajo           = mb_strtoupper($request->input('lugarTrabajo'));

            $usuario->calle                  = mb_strtoupper($request->input('calle'));
            $usuario->noExt                  = mb_strtoupper($request->input('noExt'));
            $usuario->noInt                  = mb_strtoupper($request->input('noInt'));
            $usuario->colonia                = mb_strtoupper($request->input('colonia'));
            $usuario->municipio              = mb_strtoupper($request->input('municipio'));
            $usuario->localidad              = mb_strtoupper($request->input('localidad'));
            $usuario->idEstado               = mb_strtoupper($request->input('idEstado'));
            $usuario->idPais                 = mb_strtoupper($request->input('idPais'));
            $usuario->codigoPostal           = mb_strtoupper($request->input('codigoPostal'));
            $usuario->save();

            return redirect('mi_cuenta/mis_datos_personales')->with('status_success','Tu Información Personal se ha actualizado correctamente.' );

        }

        catch (\Exception $e){
            return back()->withInput()->with('status_warning', 'Whoops! '.$e->getMessage());
        }

    }

    public function edit_password()
    {
        $idUsuario      = Auth::user()->idUsuario;
        $usuario           = User::find($idUsuario);

        return view('mi_cuenta.mi_cuenta_edit_password',compact('usuario'));
    }
    public function update_password(EditPasswordRequest $request,$idUsuario)
    {
        try
        {
            $password       =  $request->input('password');

            $usuario = User::find($idUsuario);
            $usuario->password          = bcrypt($password);
            $usuario->passwordVisible   = $password;
            $usuario->save();


            $mensaje = "Hola ".$usuario->titulo ." ".$usuario->nombre." ".$usuario->apellidoPaterno." ".$usuario->apellidoMaterno;
            $mensaje .= "<br/> Tu contraseña se ha cambiado satisfactoriamente.";

            return redirect('mi_cuenta')->with('status_success',$mensaje);
        }
        catch (Exception $e)
        {
            return back()->withInput()->with('status_warning', $e->getMessage());
        }
    }

    public function compartir_informacion(Request $request,$share_response){

        try{

            $idUsuario  = Auth::user()->idUsuario;
            $usuario                        = User::find($idUsuario);
            $usuario->compartirInformacion  = $share_response;
            $usuario->save();


            $response = array(
                'status'        => 'success',
                'msj'           => 'Se ha guardado la información'
            );
        }

        catch (Exception $e){
            $response = array(
                'status'          => 'error',
                'msj'             =>  'Whoops! '.$e->getMessage()
            );
        }

        return Response::json($response);
    }



    public function pago_paypal_aprobado($idUsuario,$idAnualidad){


        $comprobanteName    =  'sin_comprobante_pago.jpg';
        $anualidad          = Anualidad::find($idAnualidad);

        try{

            if(Pago::where('idUsuario',$idUsuario)->where('idAnualidad',$idAnualidad)->where('eliminado',0)->exists()){


                Pago::where('idUsuario',$idUsuario)->where('idAnualidad',$idAnualidad)->where('eliminado',0)->update([
                    'idStatusPago'      => 4,
                    'monto'             => $anualidad->costo,
                    'observaciones'     => 'Pago vía Paypal',
                    'comprobantePago'   => $comprobanteName
                ]);

                $pago = Pago::where('idUsuario',$idUsuario)->where('idAnualidad',$idAnualidad)->where('eliminado',0)->first();
            }
            else{

                $pago = new Pago();
                $pago->idUsuario        = $idUsuario;
                $pago->idAnualidad      = $idAnualidad;
                $pago->idStatusPago     = 4;
                $pago->monto            = $anualidad->costo;
                $pago->observaciones    = 'Pago vía Paypal';
                $pago->comprobantePago  = $comprobanteName;
                $pago->eliminado        = 0;
                $pago->save();
            }

            // Notificacion a Usuario

            $user = User::find($idUsuario);
            $user->notify(new PagoEjecutadoNotification($user,$pago,$anualidad));

            // Notificacion a SMACVE
             Mail::to(['danielalvarez@bht.mx','atencionalsocio@smacve.org.mx'])->send(new SendAvisoPagoMail($user,$pago,$anualidad));

            return redirect('mi_cuenta/anualidades')->with('status_success', "Hemos recibido la notificación de tu pago, muchas gracias por contribuir con el beneficio de esta sociedad, por favor se paciente, en breve nos estaremos comunicando contigo, para confirmarte que tu pago ha sido aprobado.");

        }
        catch (\Exception $e){
            return redirect('mi_cuenta/anualidades')->with('status_fail','Error al intentar cambiar el Status de la anualidad '.$anualidad->anualidad.':'.$e->getMessage());
        }
    }

    public function pago_paypal_no_aprobado_cancelado_error($tipo,$mensaje = ""){

        if($tipo == "no_approval"){
            $msj    = "Whoops, lo sentimos la transacción no fue aceptada por Paypal. <br/> Por favor revise su cuenta Paypal y vuelva a intentarlo.";
        }
        else if($tipo == "cancel"){
            $msj    = "Whoops! Vemos que ha cancelado su Pago vía Paypal, esperamos pronto se decida a realizarlo. Hasta luego.";
        }
        else if($tipo == "exception"){
            $msj    = $mensaje;
        }
        else{
            $msj = "Whoops, lo sentimos algo salio mal con la conexion a Paypal. <br/>".$mensaje;
        }

        return redirect('mi_cuenta/anualidades')->with('status_fail', $msj);
    }



    private function quitar_tildes($cadena) {

        $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
        $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");

        $texto = str_replace($no_permitidas, $permitidas ,$cadena);

        return $texto;
    }

}
