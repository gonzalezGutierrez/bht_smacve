<?php

namespace App\Http\Controllers;

use App\AccesoPost;
use App\CategoriaPost;
use App\Estado;
use App\Expresidentes;
use App\Http\Requests\SendMailRequest;
use App\Http\Requests\SendRegisterWebinarRequest;
use App\Mail\ContactoMail;
use App\Mail\SendRegistroTEVAMail;
use App\MessagePost;
use App\Post;
use App\RegistroTEVA;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;
use Mpdf\Mpdf;
use Thujohn\Twitter\Facades\Twitter;

use App\GPC;

use App\ArchivoAdjuntoPost;

class FrontEndController extends Controller
{

    public function __construct()
    {

    }

    public function inicio()
    {

        $tweets         = Twitter::getUserTimeline(['screen_name' => 'smacve_oficial', 'count' => 5, 'format' => 'json']);
        $tweets         =  json_decode($tweets);

        //return $tweets;

        $post           = Post::getLastFivePost();

        return view('inicio',compact('post','tweets'));
    }

  /* ========================================================
     ACERCA DE
  ======================================================== */

    public function quienes_somos(){
        return view('acerca_de.quienes_somos');
    }

    public function mesa_directiva(){

        $comite = User::getMiembrosComite();

        return view('acerca_de.mesa_directiva',compact('comite'));
    }

    public function expresidentes(){

        $expresidentes  = Expresidentes::where('eliminado',0)->orderBy('idExpresidente','DESC')->get();

        return view('acerca_de.expresidentes',compact('expresidentes'));
    }

    public function miembros(){

        $search     = htmlspecialchars(Input::get('search'));
        $idEstado   = htmlspecialchars(Input::get('idEstado'));

        $estados   = Estado::where('eliminado',0)->pluck('estado','idEstado');
        $miembros  = User::getMiembrosActivosLike($search,$idEstado);

        return view('acerca_de.miembros', compact('miembros', 'estados', 'search', 'idEstado'));
    }

    public function codigos_etica_mesa_directiva(){
        return view('acerca_de.codigos_etica.mesa_directiva');
    }

    public function codigos_etica_derechos_medicos(){

        return view('acerca_de.codigos_etica.derechos_medicos');
    }

    public function codigos_etica_derechos_pacientes(){
        return view('acerca_de.codigos_etica.derechos_pacientes');
    }

    public function codigos_etica_aviso_privacidad(){
        return view('acerca_de.codigos_etica.aviso_privacidad');
    }

    public function codigos_etica_politica_conflictos(){
        return view('acerca_de.codigos_etica.politica_conflictos');
    }



    public function convenios(){
        return view('acerca_de.convenios');
    }





    /* ========================================================
      ATENCIÓN AL SOCIO
    ======================================================== */


    public function guias_clinicas(){

        return view('atencion_socio.guias_clinicas');
    }

    public function estatutos(){

        return view('atencion_socio.estatutos');
    }

    public function obligaciones(){

        return view('atencion_socio.obligaciones');
    }

    public function pago_anualidad(){

        return view('atencion_socio.pago_anualidad');
    }



    /*INVESTIGACIÓN*/
    public function comisionActualizacionGPC($section)
    {

        $british = GPC::where('tipo','british')->orderBy('orden','ASC')->select('nombre','link')->get();

        return view('investigacion.comision_actualizacion',compact('section'));
    }

    public function comitePromocionInicio()
    {
        $section = 'inicio';
        return view('investigacion.comite_promocion',compact('section'));
    }

    public function comitePromocion($section)
    {
        return view('investigacion.comite_promocion',compact('section'));
    }


    /* ========================================================
      EDUCACION MEDICA
    ======================================================== */

    public function educacion_comision_cirujanos_vasculares_jovenes(){

        return view('educacion_medica.comision_cirujanos_vasculares_jovenes');
    }

    public function educacion_medica($categoriaURL = null){

        $txtbuscar = htmlspecialchars(Input::get('txtbuscar'));

        if(!empty($categoriaURL)){

            $categoriaPost          = CategoriaPost::where('nameURL',$categoriaURL)->first();
            $post                   = Post::getAllPostFrontEndByIdCategoriaPost($categoriaPost->idCategoriaPost);

            $categoriaSelecionada       = $categoriaPost->nameURL;
            $categoriaSelecionadaName   = mb_strtolower($categoriaPost->categoriaPost) ;

        }
        else{

            $post = Post::getAllPostFrontEnd();
            $categoriaSelecionada       = "todas";
            $categoriaSelecionadaName   = "";
        }

        $categorias     = CategoriaPost::where('eliminado',0)->get();
        $postRecientes  = Post::getLastFivePost();


        return view('educacion_medica.index',compact('post','categorias','categoriaSelecionada','categoriaSelecionadaName','postRecientes','txtbuscar'));
    }

    public function educacion_medica_buscar(){

        $txtbuscar = htmlspecialchars(Input::get('txtbuscar'));

        $categorias = CategoriaPost::where('eliminado',0)->get();
        $postRecientes  = Post::getLastFivePost();

        $categoriaSelecionada       = "todas";
        $categoriaSelecionadaName   = "";


        if(!empty($txtbuscar)){
            $post = Post::getAllPostBuscarFrontEnd($txtbuscar);
        }
        else
        {
            $post = Post::getAllPostFrontEnd();

        }

        return view('educacion_medica.index',compact('post','categorias','categoriaSelecionada','categoriaSelecionadaName','postRecientes','txtbuscar'));
    }

    public function educacion_medica_post($categoriaURL,$idPost){

        $post           = Post::getPostByIdPost($idPost);
        $categorias     = CategoriaPost::where('eliminado',0)->get();
        $postRecientes  = Post::getLastFivePost();

        $archivosAdjuntos = ArchivoAdjuntoPost::getFilesByIdPost($idPost);

        if($post->premium == 1){
            if(Auth::check()){
                // SI ESTA ACTIVO, ES HONORARIO O EMERITO
                if(Auth::user()->idStatusSocio == 1 || Auth::user()->idStatusSocio == 2 || Auth::user()->idStatusSocio == 3 ){

                    Post::where('idPost',$idPost)->increment('numVisitas');

                    AccesoPost::create([
                        'idUsuario' => Auth::user()->idUsuario,
                        'idPost'    => $idPost
                    ]);

                    return view('educacion_medica.show',compact('post','categorias','postRecientes','archivosAdjuntos'));
                }
                else {
                    return redirect('educacion_medica')->with('warning', '¡Hola! Para poder acceder al contenido premium necesita ser miembro Activo, por favor revisa tu estatus.');
                }
            }
            else{
                return redirect('login')->with('warning', '¡Hola! Para poder acceder al contenido premium necesitas ser miembro Activo de la SMACVE.<br/> Si aún no eres miembro ¿Qué esperas? ¡Registrate ya! y obtén los beneficios de inmediato.');
            }
        }
        else{
            Post::where('idPost',$idPost)->increment('numVisitas');

            return view('educacion_medica.show',compact('post','categorias','postRecientes','archivosAdjuntos'));
        }
    }

    public function chat_send_message(Request $request){
        try{

            $idUsuario  = $request->input('idUsuario');
            $idPost     = $request->input('idPost');
            $comentario = $request->input('comentario');


            $message = new MessagePost();
            $message->idPost        = $idPost;
            $message->idUsuario     = $idUsuario;
            $message->comentario    = $comentario;
            $message->eliminado     = 0;
            $message->save();

            $response = array(
                'status'     => 'success',
                'created_at' => $message->created_at->format('Y-m-d H:i:s'),
                'idMessage'  => $message->idMessage,
            );
        }
        catch (Exception $e){
            $response = array(
                'status' => 'error',
                'msj' => $e->getMessage()
            );
        }

        return Response::json($response);
    }

    public function retrieve_chat_messages(Request $request){
        try{

            $idPost         = $request->input('idPost');
            $idMessage      = $request->input('idMessage');

            $message = MessagePost::getAllMessageAfterLastIdMessage($idPost,$idMessage);

            $response = array(
                'status'    => 'success',
                'message' => $message,
            );
        }
        catch (Exception $e){
            $response = array(
                'status' => 'error',
                'msj' => $e->getMessage()
            );
        }

        return Response::json($response);
    }


    /* =================================================================
       SMACVE 2019
   ==================================================================== */

    public function merida_2020_costo_inscripcion(){

        return view('merida_2020.costo_inscripcion');
    }

    public function merida_2020_sede(){

        return view('merida_2020.sede');
    }

    public function merida_2020_hoteles(){

        return view('merida_2020.hoteles');
    }
    public function merida_2020_programa(){

        $agenda28     = json_decode(file_get_contents("https://smacve.iview02.com/get_conferencias/1"));
        $agenda29     = json_decode(file_get_contents("https://smacve.iview02.com/get_conferencias/2"));
        $agenda30     = json_decode(file_get_contents("https://smacve.iview02.com/get_conferencias/3"));
        $agenda31     = json_decode(file_get_contents("https://smacve.iview02.com/get_conferencias/4"));


        return view('merida_2020.programa',compact('agenda28', 'agenda29', 'agenda30', 'agenda31'));

    }

    public function merida_2020_programa_descargar(){

        $pathtoFile = public_path().'/plantilla_programa/archivo_pdf/Programa_Academico_SMACVE_2020.pdf';
        $filename = 'programa_smacve_2019.pdf';

        // return response()->download($pathtoFile);
        return Response::make(file_get_contents($pathtoFile), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$filename.'"'
        ]);
    }

    public function merida_2020_programa_actualizar(){

        ini_set('max_execution_time', 0);
        set_time_limit(0);

        $agenda28     = json_decode(file_get_contents("https://smacve.iview02.com/get_conferencias/1"));
        $agenda29     = json_decode(file_get_contents("https://smacve.iview02.com/get_conferencias/2"));
        $agenda30     = json_decode(file_get_contents("https://smacve.iview02.com/get_conferencias/3"));
        $agenda31     = json_decode(file_get_contents("https://smacve.iview02.com/get_conferencias/4"));

        $profesores     = json_decode(file_get_contents("https://smacve.iview02.com/get_ponentes"));

        $pdf_name        ='programa_smacve_2020.pdf';

        $carpetaTemporal = public_path().'/pdf_temporal';

        $defaultConfig  = (new ConfigVariables())->getDefaults();
        $fontDirs       = $defaultConfig['fontDir'];

        $defaultFontConfig = (new FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];


        $mpdf = new Mpdf([
            'tempDir'       =>$carpetaTemporal,
            'mode'          => 'utf-8' ,
            'format'        => 'Letter',
            'orientation'   => 'P',
            'fontDir' => array_merge($fontDirs, [
                public_path().'/plantilla_programa/fonts',
            ]),
            'fontdata' => $fontData + [
                    'caviardreams' => [
                        'R' => 'CaviarDreams.ttf',
                        'B' => 'CaviarDreams_Bold.ttf',

                    ],
                    'dincondensed' => [
                        'R' => 'Din-Condensed-Bold.ttf',
                        'B' => 'Din-Condensed-Bold.ttf',

                    ]
                ],
            'default_font' => 'caviardreams'

        ]);

        $mpdf->setFooter('{PAGENO}{nbpg}');
        $mpdf->nbpgPrefix = ' de ';

        $view = \View::make('pdf_template.programa_template',compact(
            'agenda28',
            'agenda29',
            'agenda30',
            'agenda31',
            'profesores'
        ))->render();

        $mpdf->WriteHTML($view);
        $mpdf->Output($pdf_name,'I');

    }

    public function merida_2020_registro_online(){

        return redirect('https://smacve.iview02.com/');
    }

    public function merida_2020_profesores(){

        $profesores     = json_decode(file_get_contents("https://smacve.iview02.com/get_ponentes"));



        return view('merida_2020.profesores',compact(
            'profesores'
        ));



    }

    /* =================================================================
        BOLETINES
    ==================================================================== */

    public function boletin_primera_edicion()
    {

        return view('boletines.primera_edicion');
    }
    public function boletin_segunda_edicion()
    {

        return view('boletines.segunda_edicion');
    }
    public function boletin_tercera_edicion(){
        return view('boletines.tercera_edicion');
    }
    public function boletin_cuarta_edicion(){
        return view('boletines.cuarta_edicion');
    }
    public function boletin_quinta_edicion(){
        return view('boletines.quinta_edicion');
    }
    public function boletin_sexta_edicion(){
        return view('boletines.sexta_edicion');
    }


    /* =================================================================
        OTROS EVENTOS
    ==================================================================== */

    public function eventos()
    {
        $eventos       = json_decode(file_get_contents("https://hendolat.com/get_json_eventos"));

        return view('eventos.eventos',compact('eventos'));
    }
    public function eventosSeminarioResidentes()
    {
        if(Auth::user()->idStatusSocio == 1 || Auth::user()->idStatusSocio == 2 || Auth::user()->idStatusSocio == 3 || Auth::user()->idRol == 1 ) {
            return view('eventos.eventos_residentes');
        }

        return redirect('educacion_medica')->with('warning', '¡Hola! Para poder acceder al contenido premium necesita ser miembro Activo, por favor revisa tu estatus.');

    }
    public function eventosSesionesAcademicas()
    {
        if(Auth::user()->idStatusSocio == 1 || Auth::user()->idStatusSocio == 2 || Auth::user()->idStatusSocio == 3 || Auth::user()->idRol == 1 ) {
            return view('eventos.sesiones_academicas');
        }

        return redirect('educacion_medica')->with('warning', '¡Hola! Para poder acceder al contenido premium necesita ser miembro Activo, por favor revisa tu estatus.');
    }
    public function eventos_json(){

        $eventos       = json_decode(file_get_contents("https://hendolat.com/get_json_eventos"));

        return $eventos;

    }



    /* ==================================================================
        CONTACTO
    =====================================================================*/

    public function contacto()
    {
        return view('contacto');
    }
    public function contacto_send_mail(SendMailRequest $request)
    {
        try
        {
            $nombre         = $request->input('nombre');
            $telefono       = $request->input('telefono');
            $email          = $request->input('email');
            $mensaje        = $request->input('mensaje');

            Mail::to(['danielalvarez@bht.mx','atencionalsocio@smacve.org.mx'])->send(new ContactoMail($nombre,$telefono,$email,$mensaje));

            $mensaje = "Tu mensaje se ha enviado, muchas gracias por contactarnos.<br/> En breve nos comunicaremos contigo.";

            return redirect('contacto')->with('status_success', $mensaje);

        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();

            return redirect('contacto')->with('status_fail', $mensaje);
        }

    }


    /* ==================================================================
        VOLUNTARIADO
        =====================================================================*/

    public function voluntariado_index()
    {

        return view('voluntariado.voluntariado_index');
    }

    /* ==================================================================
    WEBINARS
    =====================================================================*/



    public function webinar_servier_28()
    {

        return view('webinars.webinar_servier_28');
    }

    public function webinar_fleboestetica()
    {

        return view('webinars.webinar_fleboestetica');
    }

    public function webinar_alfasigma_04()
    {

        return view('webinars.webinar_alfasigma_04');
    }
    public function webinar_alfasigma_18()
    {

        return view('webinars.webinar_alfasigma_18');
    }

    public function webinar_pierre_fabre()
    {

        return view('webinars.webinar_pierre_fabre');
    }

    public function webinar_teva()
    {

        return view('webinars.webinar_teva');
    }

    public function store_webinar_teva(Request $request){
        try
        {
            return redirect('https://us02web.zoom.us/webinar/register/WN_FNSCZjdEQV6Q2jGPVAU6bA');

        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();

            return redirect('webinar')->with('status_fail', $mensaje);
        }

    }

    public function trabajosLibresRequisitos($section = 'convocatoria')
    {
        return view('trabajos_libres.requisitos',compact('section'));
    }




}
