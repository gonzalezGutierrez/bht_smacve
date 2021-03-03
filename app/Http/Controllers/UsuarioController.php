<?php

namespace App\Http\Controllers;

use App\Anualidad;
use App\Cargo;
use App\Estado;
use App\Notifications\CuentaCreadaNotification;
use App\Notifications\EnvioPasswordNotification;
use App\Pago;
use App\Pais;
use App\Rol;
use App\StatusPago;
use App\StatusSocio;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use PHPExcel_Cell_DataType;


class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }

    public function index()
    {

        $txtbuscar      = htmlspecialchars(Input::get('txtbuscar'));
        $idEstado       = htmlspecialchars(Input::get('idEstado'));
        $idStatusSocio  = htmlspecialchars(Input::get('idStatusSocio'));


        if(!empty($txtbuscar)){
            $usuarios = User::getAllUsuariosLike($txtbuscar,$idEstado,$idStatusSocio);
        }
        else
        {
            $usuarios = User::getAllUsuarios($idEstado,$idStatusSocio);
        }


        $estados        = Estado::where('eliminado',0)->pluck('estado','idEstado');
        $statusSocio    = StatusSocio::where('eliminado',0)->pluck('statusSocio','idStatusSocio');

        return view('admin.usuarios.index',compact('usuarios','estados','statusSocio','idEstado','idStatusSocio','txtbuscar'));
    }

    public function create()
    {
        $roles_lists        = Rol::where('eliminado',0)->pluck('rol','idRol');
        $cargos_lists       = Cargo::where('eliminado',0)->pluck('cargo','idCargo');
        $status_lists       = StatusSocio::where('eliminado',0)->pluck('statusSocio','idStatusSocio');
        $estados            = Estado::where('eliminado',0)->pluck('estado','idEstado');
        $paises             = Pais::where('eliminado',0)->pluck('pais','idPais');

        return view('admin.usuarios.create',compact('roles_lists','cargos_lists','status_lists','estados','paises'));
    }
    public function store(Request $request)
    {
        $fotografia = "sin_foto.jpg";
        $fechaNacimiento = $request->input('fechaNacimiento');
        if(!empty($fechaNacimiento)){
            $fechaNacimiento =  Carbon::CreateFromFormat('d/m/Y', $request->input('fechaNacimiento'));
        }

        try{
            $usuario = new User();
            $usuario->idRol                  = $request->input('idRol');
            $usuario->idCargo                = $request->input('idCargo');
            $usuario->idStatusSocio          = $request->input('idStatusSocio');

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
                }
            }

            $usuario->foto                   = $fotografia;

            if(!empty($fechaNacimiento))
            {
                $usuario->fechaNacimiento        = $fechaNacimiento;
            }
            $usuario->sexo                   = $request->input('sexo');
            $usuario->telOficina             = $request->input('telOficina');
            $usuario->movil                  = $request->input('movil');

            $usuario->email                  = $request->input('email');
            $usuario->password               = bcrypt($request->input('password'));
            $usuario->passwordVisible        = $request->input('password');

            $usuario->resumenCV              = $request->input('resumenCV');
            $usuario->universidad            = mb_strtoupper($request->input('universidad'));
            $usuario->especialidad           = mb_strtoupper($request->input('especialidad'));
            $usuario->cedulaProfesional      = mb_strtoupper($request->input('cedulaProfesional'));
            $usuario->cedulaEspecialidad     = mb_strtoupper($request->input('cedulaEspecialidad'));
            $usuario->lugarTrabajo           = mb_strtoupper($request->input('lugarTrabajo'));
            $usuario->miembroDesde           = mb_strtoupper($request->input('miembroDesde'));
            $usuario->socio                  = mb_strtoupper($request->input('socio'));

            $usuario->calle                  = mb_strtoupper($request->input('calle'));
            $usuario->noExt                  = mb_strtoupper($request->input('noExt'));
            $usuario->noInt                  = mb_strtoupper($request->input('noInt'));
            $usuario->colonia                = mb_strtoupper($request->input('colonia'));
            $usuario->municipio              = mb_strtoupper($request->input('municipio'));
            $usuario->localidad              = mb_strtoupper($request->input('localidad'));
            $usuario->idEstado               = mb_strtoupper($request->input('idEstado'));
            $usuario->idPais                 = mb_strtoupper($request->input('idPais'));
            $usuario->codigoPostal           = mb_strtoupper($request->input('codigoPostal'));
            $usuario->aceptoCondiciones      = 1;
            $usuario->eliminado              = 0;
            $usuario->save();


            $usuario->notify(new CuentaCreadaNotification($usuario));


            return redirect('admin/usuarios')->with('status_success','El usuario se ha creado, se han enviado las credenciales de acceso al correo: '.$usuario->email );

        }
        catch (\Exception $e){
            return redirect('admin/usuarios')->with('status_fail',$e->getMessage());

        }

    }

    public function show($id)
    {
        //
    }

    public function edit($idUsuario)
    {
        $usuario        = User::find($idUsuario);

        $roles_lists        = Rol::where('eliminado',0)->pluck('rol','idRol');
        $cargos_lists       = Cargo::where('eliminado',0)->pluck('cargo','idCargo');
        $status_lists       = StatusSocio::where('eliminado',0)->pluck('statusSocio','idStatusSocio');
        $estados            = Estado::where('eliminado',0)->pluck('estado','idEstado');
        $paises             = Pais::where('eliminado',0)->pluck('pais','idPais');

        return view('admin.usuarios.edit',compact('usuario','roles_lists','cargos_lists','status_lists','estados','paises'));
    }
    public function update(Request $request,$idUsuario)
    {
        $fotografia = "sin_foto.jpg";
        $changeFoto  = 0;
        $fechaNacimiento = $request->input('fechaNacimiento');

        if(!empty($fechaNacimiento)){
            $fechaNacimiento =  Carbon::CreateFromFormat('d/m/Y', $request->input('fechaNacimiento'));
        }

        try
        {
            $usuario                        = User::find($idUsuario);
            $usuario->idRol                  = $request->input('idRol');
            $usuario->idCargo                = $request->input('idCargo');
            $usuario->idStatusSocio          = $request->input('idStatusSocio');

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
            $usuario->miembroDesde           = mb_strtoupper($request->input('miembroDesde'));
            $usuario->socio                  = mb_strtoupper($request->input('socio'));


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

        return redirect('admin/usuarios')->with('status_success','El Usuario se ha Actualizado');

        }

        catch (\Exception $e){
            return redirect('admin/usuarios')->with('status_fail',$e->getMessage());

        }
    }

    public function editPassword($idUsuario){

        $usuario = User::find($idUsuario);

        return view('admin.usuarios.edit_password',compact('usuario'));
    }
    public function updatePassword(Request $request, $idUsuario){

        if ($request->has('password')){

            $usuario = User::find($idUsuario);
            $usuario->password = bcrypt($request->input('password'));
            $usuario->passwordVisible = $request->input('password');
            $usuario->save();
        }

        return redirect('admin/usuarios')->with('status_success','La credencial de acceso se ha actualizado para el usuario: '.$usuario->email);
    }

    public function destroy($idUsuario)
    {
        $usuario = User::find($idUsuario);
        $usuario->eliminado = 1;
        $usuario->save();

        return redirect('admin/usuarios');
    }

    public function export()
    {

        $txtbuscar      = htmlspecialchars(Input::get('txtbuscar'));
        $idEstado       = htmlspecialchars(Input::get('idEstado'));
        $idStatusSocio  = htmlspecialchars(Input::get('idStatusSocio'));

        $fechaActual    = Carbon::now();
        $usuarios       = null;
        $tituloReporte  = "SOCIOS SMACVE";
        $nombreReporte  = "SOCIOS SMACVE CON FECHA ".$fechaActual->format('d/m/Y H:i:s');

        if(!empty($txtbuscar)){
            $usuarios = User::getAllUsuariosLikeForExcel($txtbuscar,$idEstado,$idStatusSocio);
        }
        else
        {
            $usuarios = User::getAllUsuariosForExcel($idEstado,$idStatusSocio);
        }

        if(!empty($idEstado)){
            $estado  = Estado::find($idEstado);
            $tituloReporte = $tituloReporte." DEL ESTADO DE ".$estado->estado;
        }

        if(!empty($idStatusSocio)){
            $statusSocio  = StatusSocio::find($idStatusSocio);
            $tituloReporte = $tituloReporte." CON STATUS ".$statusSocio->statusSocio;
        }

        ini_set('max_execution_time', 0);
        set_time_limit(0);


        Excel::create($nombreReporte, function($excel) use($usuarios,$fechaActual,$tituloReporte) {
            $excel->sheet('SOCIOS SMACVE', function($sheet) use ($usuarios,$fechaActual,$tituloReporte){

                $sheet->row(1, array($tituloReporte));
                $sheet->row(2, array("FECHA ".$fechaActual->format('d/m/Y H:i:s')));

                $sheet->mergeCells('A1:W1');
                $sheet->mergeCells('A2:W2');

                $sheet->cells('A1:W1', function($cells){
                    $cells->setFontColor('#000');
                    $cells->setFontSize(18);
                    $cells->setFontWeight('bold');
                    $cells->setAlignment('center');
                });
                $sheet->cells('A2:W2', function($cells){
                    $cells->setFontColor('#000');
                    $cells->setFontSize(14);
                    $cells->setFontWeight('bold');
                    $cells->setAlignment('center');
                });

                $sheet->row(5, array(
                    'ID USUARIO',           // A
                    'TITULO',               // B
                    'NOMBRE',               // C
                    'APELLIDO PATERNO',     // D
                    'APELLIDO MATERNO',     // E

                    'ROL',                  // F
                    'CARGO',                // G
                    'STATUS',               // H

                    'FECHA NACIMIENTO',     // I
                    'SEXO',                 // J
                    'TEL OFICINA',          // K
                    'MOVIL',                // L
                    'EMAIL',                // M
                    'UNIVERSIDAD',          // N
                    'ESPECIALIDAD',         // O
                    'CEDULA PROFESIONAL',   // P
                    'CEDULA ESPECIALIDAD',  // Q
                    'LUGAR DE TRABAJO',     // R
                    'MIEMBRO DESDE',        // S
                    'DIRECCION',            // T
                    'ESTADO',               // U
                    'PAIS',                 // V
                    'CODIGO POSTAL'         // W
                ));

                $sheet->cells('A5:W5', function($cells){
                    $cells->setBackground('#154246');
                    $cells->setFontColor('#ffffff');
                    $cells->setFontSize(16);
                    $cells->setFontWeight('bold');
                    $cells->setAlignment('center');
                });

                $sheet->setColumnFormat(array(
                    'A' => '0',
                    'B' => '@',
                    'C' => '@',
                    'D' => '@',
                    'E' => '@',
                    'F' => '@',
                    'G' => '@',
                    'H' => '@',
                    'I' => 'yyyy-mm-dd h:mm:ss',
                    'J' => '@',
                    'K' => '@',
                    'L' => '0',
                    'M' => '@',
                    'N' => '@',
                    'O' => '@',
                    'P' => '@',
                    'Q' => '@',
                    'R' => '@',
                    'S' => '@',
                    'T' => '@',
                    'U' => '@',
                    'V' => '@',
                    'W' => '@'
                ));

                $fila = 6;

                foreach($usuarios as $item)
                {

                    $direccion = $item->calle." ".$item->noExt." ".$item->colonia." ".$item->localidad;

                    $sheet->row($fila, array(
                        $item->idUsuario,               // A
                        $item->titulo,                  // B
                        $item->nombre,                  // C
                        $item->apellidoPaterno,         // D
                        $item->apellidoMaterno,         // E

                        $item->rol,                     // F
                        $item->cargo,                   // G
                        $item->statusSocio,             // H

                        $item->fechaNacimiento,         // I
                        $item->sexo,                    // J
                        $item->telOficina,              // K
                        $item->movil,                   // L
                        $item->email,                   // M
                        $item->universidad,             // N
                        $item->especialidad,            // O
                        $item->cedulaProfesional,       // P
                        $item->cedulaEspecialidad,      // Q
                        $item->lugarTrabajo,            // R
                        $item->miembroDesde,            // S
                        $direccion,                     // T
                        $item->estado,                  // U
                        $item->pais,                    // V
                        $item->codigoPostal             // W
                    ));

                    $sheet->setCellValueExplicit('P'.$fila, $item->cedulaProfesional,PHPExcel_Cell_DataType::TYPE_STRING);
                    $sheet->setCellValueExplicit('Q'.$fila, $item->cedulaEspecialidad,PHPExcel_Cell_DataType::TYPE_STRING);

                    $fila++;
                }

                $sheet->cells('A5:A'.$fila, function($cells) {
                    $cells->setFontSize(14);
                    $cells->setAlignment('center');
                });
                $sheet->cells('B5:B'.$fila, function($cells) {
                    $cells->setFontSize(14);
                    $cells->setAlignment('left');
                });
                $sheet->cells('C5:C'.$fila, function($cells) {
                    $cells->setFontSize(14);
                    $cells->setAlignment('left');
                });
                $sheet->cells('D5:D'.$fila, function($cells) {
                    $cells->setFontSize(14);
                    $cells->setAlignment('left');
                });
                $sheet->cells('E5:E'.$fila, function($cells) {
                    $cells->setFontSize(14);
                    $cells->setAlignment('left');
                });
                $sheet->cells('F5:F'.$fila, function($cells) {
                    $cells->setFontSize(14);
                    $cells->setAlignment('left');
                });

                $sheet->cells('G5:G'.$fila, function($cells) {
                    $cells->setFontSize(14);
                    $cells->setAlignment('left');
                });
                $sheet->cells('H5:H'.$fila, function($cells) {
                    $cells->setFontSize(14);
                    $cells->setAlignment('left');
                });
                $sheet->cells('I5:I'.$fila, function($cells) {
                    $cells->setFontSize(14);
                    $cells->setAlignment('left');
                });
                $sheet->cells('J5:J'.$fila, function($cells) {
                    $cells->setFontSize(14);
                    $cells->setAlignment('left');
                });
                $sheet->cells('K5:K'.$fila, function($cells) {
                    $cells->setFontSize(14);
                    $cells->setAlignment('left');
                });
                $sheet->cells('L5:L'.$fila, function($cells) {
                    $cells->setFontSize(14);
                    $cells->setAlignment('left');
                });
                $sheet->cells('M5:M'.$fila, function($cells) {
                    $cells->setFontSize(14);
                    $cells->setFontWeight('bold');
                    $cells->setAlignment('left');
                });
                $sheet->cells('N5:N'.$fila, function($cells) {
                    $cells->setFontSize(14);
                    $cells->setAlignment('left');
                });
                $sheet->cells('O5:O'.$fila, function($cells) {
                    $cells->setFontSize(14);
                    $cells->setAlignment('left');
                });
                $sheet->cells('P5:P'.$fila, function($cells) {
                    $cells->setFontSize(14);
                    $cells->setAlignment('left');
                });
                $sheet->cells('Q5:Q'.$fila, function($cells) {
                    $cells->setFontSize(14);
                    $cells->setAlignment('left');
                });
                $sheet->cells('R5:R'.$fila, function($cells) {
                    $cells->setFontSize(14);
                    $cells->setAlignment('left');
                });
                $sheet->cells('S5:S'.$fila, function($cells) {
                    $cells->setFontSize(14);
                    $cells->setAlignment('left');
                });
                $sheet->cells('T5:T'.$fila, function($cells) {
                    $cells->setFontSize(14);
                    $cells->setAlignment('left');
                });
                $sheet->cells('U5:U'.$fila, function($cells) {
                    $cells->setFontSize(14);
                    $cells->setAlignment('left');
                });
                $sheet->cells('V5:V'.$fila, function($cells) {
                    $cells->setFontSize(14);
                    $cells->setAlignment('left');
                });
                $sheet->cells('W5:W'.$fila, function($cells) {
                    $cells->setFontSize(14);
                    $cells->setAlignment('left');
                });
            });
        })->download('xls');
    }

    public function anualidades($idUsuario)
    {
        $usuario            = User::find($idUsuario);
        $anualidades        = Anualidad::getHistorialAnualidades($idUsuario);
        $statusPagosList    = StatusPago::where('eliminado',0)->pluck('statusPago','idStatusPago');

        return view('admin.usuarios.anualidades',compact('usuario','anualidades','statusPagosList'));
    }

    public function registrarPagoAnualidad(Request $request,$idUsuario){

        $idAnualidad        =  $request->input('idAnualidad');
        $idStatusPago       =  $request->input('idStatusPago');
        $observaciones      =  $request->input('observaciones');
        $comprobanteName    =  'sin_comprobante_pago.jpg';
        $withComprobante    = 0;

        $usuario            = User::find($idUsuario);
        $anualidad          = Anualidad::find($idAnualidad);

        try{

            if($request->hasFile('comprobantePago')) {

                $comprobantePago = $request->file('comprobantePago');

                $titulo             = trim(str_replace(' ', '', $usuario->titulo));
                $titulo             = trim(str_replace('.', '', $usuario->titulo));
                $nombre             = trim(str_replace(' ', '', $usuario->nombre));
                $apellidoPaterno    = trim(str_replace(' ', '', $usuario->apellidoPaterno));
                $apellidoMaterno    = trim(str_replace(' ', '', $usuario->apellidoMaterno));

                $comprobanteName         = mb_strtolower($this->quitar_tildes('pago_'.$titulo.'_'.$nombre.'_'.$apellidoPaterno.'_'.$apellidoMaterno.'_'.$anualidad->anualidad.'.'.$comprobantePago->guessClientExtension())) ;

                if(Storage::disk('local')->has('comprobante_pago'))
                {
                    Storage::disk('local')->put('comprobante_pago/'.$comprobanteName,File::get($comprobantePago));
                }
                else
                {
                    Storage::disk('local')->makeDirectory('comprobante_pago');
                    Storage::disk('local')->put('comprobante_pago/'.$comprobanteName,File::get($comprobantePago));
                }

                $withComprobante = 1;

            }

            if(Pago::where('idUsuario',$idUsuario)->where('idAnualidad',$idAnualidad)->where('eliminado',0)->exists()){

                $pago = Pago::where('idUsuario',$idUsuario)->where('idAnualidad',$idAnualidad)->where('eliminado',0)->first();
                if(!empty($pago->observaciones)){
                    $observaciones =  $pago->observaciones.' - '.$observaciones;
                }

                Pago::where('idUsuario',$idUsuario)->where('idAnualidad',$idAnualidad)->where('eliminado',0)->update([
                    'idStatusPago'  => $idStatusPago,
                    'monto'         => $anualidad->costo,
                    'observaciones' => $observaciones
                ]);

                if($withComprobante == 1){
                    Pago::where('idUsuario',$idUsuario)->where('idAnualidad',$idAnualidad)->where('eliminado',0)->update([
                        'comprobantePago'  => $comprobanteName
                    ]);
                }
            }
            else{

                $pago = new Pago();
                $pago->idUsuario        = $idUsuario;
                $pago->idAnualidad      = $idAnualidad;
                $pago->idStatusPago     = $idStatusPago;
                $pago->monto            = $anualidad->costo;
                $pago->observaciones    = $observaciones;
                $pago->comprobantePago  = $comprobanteName;
                $pago->eliminado        = 0;
                $pago->save();

            }

            return redirect('admin/usuarios/'.$idUsuario.'/anualidades')->with('status_success','La anualidad '.$anualidad->anualidad.' ha cambiado de status.');

        }
        catch (\Exception $e){
            return redirect('admin/usuarios/'.$idUsuario.'/anualidades')->with('status_fail','Error al intentar cambiar el Status de la anualidad '.$anualidad->anualidad.':'.$e->getMessage());
        }
    }

    public function send_email_password(){
        try{

            $users  = User::where('eliminado',0)->get();

            $subject            = 'CREDENCIALES DE ACCESO SMACVE.ORG.MX';


            Notification::send($users, new EnvioPasswordNotification($subject));


            return redirect('admin/usuarios')->with('status_success','Se ha enviado las credenciales de acceso a los usuarios seleccionados' );
        }
        catch (\Exception $e){
            return back()->withInput()->with('status_warning', 'Whoops! '.$e->getMessage());
        }
    }

    private function quitar_tildes($cadena) {

        $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
        $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");

        $texto = str_replace($no_permitidas, $permitidas ,$cadena);

        return $texto;
    }
}
