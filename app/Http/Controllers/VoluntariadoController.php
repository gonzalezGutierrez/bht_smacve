<?php

namespace App\Http\Controllers;


use App\ActividadVoluntariado;
use App\AreaInteres;
use App\ConfiguracionPractica;
use App\DetalleSolicitudAreaInteres;
use App\DetalleSolicitudConfiguracionPractica;
use App\DetalleSolicitudOtraActividad;
use App\DetalleSolicitudTipoPractica;
use App\DetalleSolicitudVoluntariado;

use App\Estado;
use App\Etnia;
use App\HoraDisponibleVoluntariado;
use App\Mail\SolicitudVoluntariadoMail;
use App\PuestoVoluntariado;
use App\SolicitudVoluntariado;
use App\StatusSocio;
use App\TipoPractica;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class VoluntariadoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check.status.user');

    }

    public function voluntariado_step_1()
    {
        $usuario = Auth::user();

        if( $this->esSocioActivo($usuario->idStatusSocio) ){

            return view('voluntariado.voluntariado_step_1',compact('usuario'));
        }
        else{

            $statusSocio = StatusSocio::where('idStatusSocio',$usuario->idStatusSocio)->first();
            $mensaje = "Hola estimado <strong>".$usuario->nombre." ".$usuario->apellidoPaterno."</strong>,<br/> tu estatus dentro de la sociedad es de <strong>".$statusSocio->statusSocio."</strong> Recuerda que para poder iniciar la solicitud debes ser socio activo.<br/>
                        Por favor, revisa tu status, si tienes alguna duda o aclaración haznoslo saber al correo atencionalsocio@smacve.org.mx";

            return redirect('voluntariado')->with('status_fail', $mensaje);
        }
    }
    public function store_voluntariado_step_1()
    {
        $usuario = Auth::user();

        if(SolicitudVoluntariado::where('eliminado',0)->where('idUsuario',$usuario->idUsuario)->exists()){

            $solicitud = SolicitudVoluntariado::where('eliminado',0)->where('idUsuario',$usuario->idUsuario)->first();
            $solicitud->idEtapaSolicitudVoluntariado = 2;
            $solicitud->save();
        }
        else{

            $solicitud                                  = new SolicitudVoluntariado();
            $solicitud->idUsuario                       = $usuario->idUsuario;
            $solicitud->idEtapaSolicitudVoluntariado    = 2;
            $solicitud->eliminado                       = 0;
            $solicitud->save();
        }

        return redirect('voluntariado/step_2');
    }

    public function voluntariado_step_2()
    {
        $usuario = Auth::user();

        if(SolicitudVoluntariado::where('eliminado',0)->where('idUsuario',$usuario->idUsuario)->exists()){
           $solicitud = SolicitudVoluntariado::where('eliminado',0)->where('idUsuario',$usuario->idUsuario)->first();
        }
        else{
            return redirect('voluntariado/step_1');
        }

        $estadosList                = Estado::where('eliminado',0)->pluck('estado','idEstado');
        $tiposPracticaList          = TipoPractica::where('eliminado',0)->get();
        $configuracionPracticaList  = ConfiguracionPractica::where('eliminado',0)->get();

        return view('voluntariado.voluntariado_step_2',compact('solicitud','estadosList','tiposPracticaList','configuracionPracticaList'));
    }
    public function store_voluntariado_step_2(Request $request)
    {
        $usuario = Auth::user();

        if(SolicitudVoluntariado::where('eliminado',0)->where('idUsuario',$usuario->idUsuario)->exists()){

            $solicitud = SolicitudVoluntariado::where('eliminado',0)->where('idUsuario',$usuario->idUsuario)->first();


            $fechaNacimiento = $request->input('fechaNacimiento');
            if(!empty($fechaNacimiento)){
                $fechaNacimiento =  Carbon::CreateFromFormat('d/m/Y', $request->input('fechaNacimiento'));
            }

            $solicitud->idEtapaSolicitudVoluntariado    = 3;
            $solicitud->practicaHospitales              = $request->input('practicaHospitales');
            $solicitud->afiliacionInstitucion           = $request->input('afiliacionInstitucion');
            $solicitud->nombreInstitucion               = $request->input('nombreInstitucion');
            $solicitud->comitesAnteriores               = $request->input('comitesAnteriores');
            $solicitud->fechaInicioPractica             = $request->input('fechaInicioPractica');
            $solicitud->idEstado                        = $request->input('idEstado');
            $solicitud->ciudad                          = $request->input('ciudad');
            if(!empty($fechaNacimiento))
            {
                $solicitud->fechaNacimiento             = $fechaNacimiento;
            }
            $solicitud->eliminado                       = 0;
            $solicitud->save();


            $tiposPracticaSeleccionados             = $request->input('check_tipo_practica');
            $configuracionesPracticaSeleccionados   = $request->input('check_configuracion_practica');

            DetalleSolicitudTipoPractica::where('idUsuario',$usuario->idUsuario)->delete();
            DetalleSolicitudConfiguracionPractica::where('idUsuario',$usuario->idUsuario)->delete();


            foreach ($tiposPracticaSeleccionados as $idTipoPractica){

                $detalle = new DetalleSolicitudTipoPractica();
                $detalle->idSolicitudVoluntariado    = $solicitud->idSolicitudVoluntariado;;
                $detalle->idUsuario                  = $usuario->idUsuario;
                $detalle->idTipoPractica            = $idTipoPractica;
                $detalle->eliminado                  = 0;
                $detalle->save();

            }

            foreach ($configuracionesPracticaSeleccionados as $idConfiguracionPractica){

                $detalle = new DetalleSolicitudConfiguracionPractica();
                $detalle->idSolicitudVoluntariado    = $solicitud->idSolicitudVoluntariado;;
                $detalle->idUsuario                  = $usuario->idUsuario;
                $detalle->idConfiguracionPractica    = $idConfiguracionPractica;
                $detalle->eliminado                  = 0;
                $detalle->save();

            }



        }
        else{
            return redirect('voluntariado/step_1');
        }

        return redirect('voluntariado/step_3');
    }


    public function voluntariado_step_3()
    {
        $usuario = Auth::user();

        if(SolicitudVoluntariado::where('eliminado',0)->where('idUsuario',$usuario->idUsuario)->exists()){

            $puestos = PuestoVoluntariado::with('children')->where('parentId',0)->get();

            return view('voluntariado.voluntariado_step_3', compact('puestos'));
        }
        else{
            return redirect('voluntariado/step_1');
        }
    }
    public function store_voluntariado_step_3(Request $request){

        $usuario = Auth::user();

        if(SolicitudVoluntariado::where('eliminado',0)->where('idUsuario',$usuario->idUsuario)->exists()){

            $solicitud = SolicitudVoluntariado::where('eliminado',0)->where('idUsuario',$usuario->idUsuario)->first();

            $solicitud->idEtapaSolicitudVoluntariado    = 4;
            $solicitud->save();

            $puestosVoluntariado = $request->input('check_list');

            DetalleSolicitudVoluntariado::where('idUsuario',$usuario->idUsuario)->delete();


            $orden = 1;
            foreach ($puestosVoluntariado as $idPuesto){
                $detalle = new DetalleSolicitudVoluntariado();
                $detalle->idSolicitudVoluntariado    = $solicitud->idSolicitudVoluntariado;
                $detalle->idUsuario                  = $usuario->idUsuario;
                $detalle->idPuestoVoluntariado       = $idPuesto;
                $detalle->ordenSeleccion             = $orden;
                $detalle->eliminado                  = 0;
                $detalle->save();

                $orden++;

            }

            return redirect('voluntariado/step_3/1');

        }
        else{
            return redirect('voluntariado/step_1');
        }
    }

    public function voluntariado_step_3_declaracion_interes($orden){

        $usuario = Auth::user();

        if(SolicitudVoluntariado::where('eliminado',0)->where('idUsuario',$usuario->idUsuario)->exists()){

             $puestoSeleccionados = DetalleSolicitudVoluntariado::getAllPuestosSeleccionadosByUsuario($usuario->idUsuario);

            if(count($puestoSeleccionados) > 0)
            {
                $puestoActivo        = DetalleSolicitudVoluntariado::getPuestoSeleccionadoByUsuarioAndOrden($usuario->idUsuario,$orden);

                return view('voluntariado.voluntariado_step_3_declaracion_interes', compact('puestoSeleccionados','puestoActivo'));
            }
            else{
                return redirect('voluntariado/step_3');
            }
        }
        else{
            return redirect('voluntariado/step_1');
        }


    }
    public function store_voluntariado_step_3_declaracion_interes($orden,Request $request){

        $usuario = Auth::user();

        if(SolicitudVoluntariado::where('eliminado',0)->where('idUsuario',$usuario->idUsuario)->exists()){

            $totalPuestoSeleccionados = DetalleSolicitudVoluntariado::where('eliminado',0)->where('idUsuario',$usuario->idUsuario)->count();

            $puestoActivo   = DetalleSolicitudVoluntariado::where('eliminado',0)->where('idUsuario',$usuario->idUsuario)->where('ordenSeleccion',$orden)->first();
            $puestoActivo->declaracionInteres   = $request->input('declaracionInteres');
            $puestoActivo->aptitudes            = $request->input('aptitudes');
            $puestoActivo->save();

            if($orden < $totalPuestoSeleccionados )
            {
                $next = $orden+1;

                return redirect('voluntariado/step_3/'.$next);
            }
            else{
                return redirect('voluntariado/step_3_encuestas');
            }

        }
        else{
            return redirect('voluntariado/step_1');
        }



    }


    public function voluntariado_step_3_encuestas(){

        $usuario = Auth::user();

        if(SolicitudVoluntariado::where('eliminado',0)->where('idUsuario',$usuario->idUsuario)->exists()){

            $puestoSeleccionados = DetalleSolicitudVoluntariado::getAllPuestosSeleccionadosByUsuario($usuario->idUsuario);

            if(count($puestoSeleccionados) > 0) {

                $areasInteres                   = AreaInteres::where('eliminado',0)->get();
                $horasDisponiblesList           = HoraDisponibleVoluntariado::where('eliminado',0)->pluck('horaDisponible','idHoraDisponible');
                $actividadesVoluntariadoList    = ActividadVoluntariado::where('eliminado',0)->get();


                $solicitud = SolicitudVoluntariado::where('eliminado',0)->where('idUsuario',$usuario->idUsuario)->first();

                return view('voluntariado.voluntariado_step_3_encuestas',compact('solicitud','areasInteres','horasDisponiblesList','actividadesVoluntariadoList','puestoSeleccionados') );
            }
            else{
                return redirect('voluntariado/step_3');
            }
        }
        else{
            return redirect('voluntariado/step_1');
        }
    }

    public function store_voluntariado_step_3_encuestas(Request $request){
        $usuario = Auth::user();

        if(SolicitudVoluntariado::where('eliminado',0)->where('idUsuario',$usuario->idUsuario)->exists()){

            $solicitud = SolicitudVoluntariado::where('eliminado',0)->where('idUsuario',$usuario->idUsuario)->first();

            DetalleSolicitudAreaInteres::where('idusuario',$usuario->idUsuario)->delete();

            $tratamientoAbierto         = $request->input('check_abierto');
            $tratamientoEndovascular    = $request->input('check_endovascular');
            $tratamientoMedico          = $request->input('check_medico');

            if(!empty($tratamientoAbierto)){
                foreach ($tratamientoAbierto as $idAreaInteres){
                    $detalle = new DetalleSolicitudAreaInteres();
                    $detalle->idSolicitudVoluntariado     = $solicitud->idSolicitudVoluntariado;
                    $detalle->idUsuario                   = $usuario->idUsuario;
                    $detalle->idAreaInteres               = $idAreaInteres;
                    $detalle->tipoTratamiento             = 'Tratamiento Abierto';
                    $detalle->eliminado                   = 0;
                    $detalle->save();
                }
            }

            if(!empty($tratamientoEndovascular)){
                foreach ($tratamientoEndovascular as $idAreaInteres){
                    $detalle = new DetalleSolicitudAreaInteres();
                    $detalle->idSolicitudVoluntariado     = $solicitud->idSolicitudVoluntariado;
                    $detalle->idUsuario                   = $usuario->idUsuario;
                    $detalle->idAreaInteres               = $idAreaInteres;
                    $detalle->tipoTratamiento             = 'Tratamiento Endovascular';
                    $detalle->eliminado                   = 0;
                    $detalle->save();
                }
            }

            if(!empty($tratamientoMedico)){
                foreach ($tratamientoMedico as $idAreaInteres){
                    $detalle = new DetalleSolicitudAreaInteres();
                    $detalle->idSolicitudVoluntariado     = $solicitud->idSolicitudVoluntariado;
                    $detalle->idUsuario                   = $usuario->idUsuario;
                    $detalle->idAreaInteres               = $idAreaInteres;
                    $detalle->tipoTratamiento             = 'Tratamiento Médico';
                    $detalle->eliminado                   = 0;
                    $detalle->save();
                }
            }



            $solicitud->idHoraDisponible    = $request->input('idHoraDisponible');
            $solicitud->save();


            $otrasActividades         = $request->input('check_actividades');

            DetalleSolicitudOtraActividad::where('idusuario',$usuario->idUsuario)->delete();

            if(!empty($otrasActividades)){
                foreach ($otrasActividades as $idActividadVoluntariado){
                    $detalle = new DetalleSolicitudOtraActividad();
                    $detalle->idSolicitudVoluntariado     = $solicitud->idSolicitudVoluntariado;
                    $detalle->idUsuario                   = $usuario->idUsuario;
                    $detalle->idActividadVoluntariado     = $idActividadVoluntariado;
                    $detalle->eliminado                   = 0;
                    $detalle->save();
                }
            }

            return redirect('voluntariado/step_4');


        }
        else{
            return redirect('voluntariado/step_1');
        }


    }

    public function voluntariado_step_4(){

        $usuario = Auth::user();

        if(SolicitudVoluntariado::where('eliminado',0)->where('idUsuario',$usuario->idUsuario)->exists()){

            $puestoSeleccionados = DetalleSolicitudVoluntariado::getAllPuestosSeleccionadosByUsuario($usuario->idUsuario);

            if(count($puestoSeleccionados) > 0) {

                $solicitud = SolicitudVoluntariado::where('eliminado',0)->where('idUsuario',$usuario->idUsuario)->first();

                return view('voluntariado.voluntariado_step_4',compact('solicitud','puestoSeleccionados') );
            }
            else{
                return redirect('voluntariado/step_3');
            }
        }
        else{
            return redirect('voluntariado/step_1');
        }
    }
    public function store_voluntariado_step_4(Request $request){

        $usuario = Auth::user();

        if(SolicitudVoluntariado::where('eliminado',0)->where('idUsuario',$usuario->idUsuario)->exists()){

            $aceptoPoliticas = 0;
            if(!empty($request->input('aceptoPoliticas'))){
                $aceptoPoliticas = (bool) $request->input('aceptoPoliticas');
            }

            $solicitud = SolicitudVoluntariado::where('eliminado',0)->where('idUsuario',$usuario->idUsuario)->first();
            $solicitud->idEtapaSolicitudVoluntariado    = 5;
            $solicitud->aceptoPoliticas     = $aceptoPoliticas;
            $solicitud->politicaConflicto   = $request->input('politicaConflicto');
            $solicitud->comentarios         = $request->input('comentarios');
            $solicitud->save();

            return redirect('voluntariado/step_5');
        }
        else
            {
            return redirect('voluntariado/step_1');
        }

    }

    public function voluntariado_step_5(){

        $usuario = Auth::user();

        if(SolicitudVoluntariado::where('eliminado',0)->where('idUsuario',$usuario->idUsuario)->exists()){

            $puestoSeleccionados = DetalleSolicitudVoluntariado::getAllPuestosSeleccionadosByUsuario($usuario->idUsuario);

            if(count($puestoSeleccionados) > 0) {

                $solicitud = SolicitudVoluntariado::where('eliminado',0)->where('idUsuario',$usuario->idUsuario)->first();

                return view('voluntariado.voluntariado_step_5',compact('solicitud','puestoSeleccionados') );
            }
            else{
                return redirect('voluntariado/step_3');
            }
        }
        else{
            return redirect('voluntariado/step_1');
        }
    }
    public function store_voluntariado_step_5(Request $request){

        $usuario = Auth::user();

        if(SolicitudVoluntariado::where('eliminado',0)->where('idUsuario',$usuario->idUsuario)->exists()){

            $solicitud = SolicitudVoluntariado::where('eliminado',0)->where('idUsuario',$usuario->idUsuario)->first();
            $solicitud->idEtapaSolicitudVoluntariado    = 6;
            $solicitud->save();

            return redirect('voluntariado/step_6');
        }
        else
        {
            return redirect('voluntariado/step_1');
        }

    }

    public function voluntariado_step_6(){

        $usuario = Auth::user();

        if(SolicitudVoluntariado::where('eliminado',0)->where('idUsuario',$usuario->idUsuario)->exists()){

            $solicitud          = SolicitudVoluntariado::where('eliminado',0)->where('idUsuario',$usuario->idUsuario)->first();
            $detalleSolicitud   = DetalleSolicitudVoluntariado::getAllPuestosSeleccionadosByUsuario($usuario->idUsuario);

            //Mail::to([$usuario->email])->send(new SolicitudVoluntariadoMail($usuario,$solicitud,$detalleSolicitud));

            return view('voluntariado.voluntariado_step_6',compact('solicitud','usuario') );

            //return (new SolicitudVoluntariadoMail($usuario,$solicitud,$detalleSolicitud))->render();
        }
        else{
            return redirect('voluntariado/step_1');
        }
    }

    private function esSocioActivo($idStatusSocio){

        // SI ESTA ACTIVO, ES HONORARIO O EMERITO
        if($idStatusSocio == 1 || $idStatusSocio == 2 || $idStatusSocio == 3 ){

            return true;
        }
        else {
            return false;
        }
    }

}
