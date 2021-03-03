<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/registered';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre'                => ['required', 'string', 'max:255'],
            'apellidoPaterno'       => ['required','string',],
            'fechaNacimiento'       => 'required|date_format:"d/m/Y"',
            'email'                 => ['required', 'string', 'email', 'max:255', 'unique:tbl_usuarios'],
            'password'              => ['required', 'string', 'min:6', 'confirmed'],
            'especialidad'          => ['required', 'string'],
            'aceptoCondiciones'     => ['accepted'],
            'g-recaptcha-response'  => ['required','recaptcha']
        ]);
    }


    protected function create(array $data)
    {
        $fechaNacimiento = "";
        if(!empty($data['fechaNacimiento'])) {
            $fechaNacimiento =  Carbon::CreateFromFormat('d/m/Y', $data['fechaNacimiento']);
        }

        $aceptoCondiciones = 0;
        if(!empty($data['aceptoCondiciones'])){
            $aceptoCondiciones = (bool) $data['aceptoCondiciones'];
        }

        return  User::create([
            'idRol'                 => 3,
            'idCargo'               => 25,
            'idStatusSocio'         => 4,
            'titulo'                => mb_strtoupper($data['titulo']) ,
            'nombre'                => mb_strtoupper($data['nombre']),
            'apellidoPaterno'       => mb_strtoupper($data['apellidoPaterno']),
            'apellidoMaterno'       => mb_strtoupper($data['apellidoMaterno']),
            'foto'                  => 'sin_foto.jpg',
            'fechaNacimiento'       => $fechaNacimiento,
            'sexo'                  => $data['sexo'],
            'telOficina'            => $data['telOficina'],
            'movil'                 => $data['movil'],
            'email'                 => $data['email'],
            'password'              => Hash::make($data['password']),
            'passwordVisible'       => $data['password'],
            'universidad'           => mb_strtoupper($data['universidad']),
            'especialidad'          => mb_strtoupper($data['especialidad']),

            'cedulaProfesional'     => $data['cedulaProfesional'],
            'cedulaEspecialidad'    => $data['cedulaEspecialidad'],
            'lugarTrabajo'          => mb_strtoupper($data['lugarTrabajo']),
            'miembroDesde'          => now()->year,

            'calle'             => mb_strtoupper($data['calle']),
            'noExt'             => mb_strtoupper($data['noExt']),
            'noInt'             => mb_strtoupper($data['noInt']),
            'colonia'           => mb_strtoupper($data['colonia']),
            'municipio'         => mb_strtoupper( $data['municipio']),
            'localidad'         => mb_strtoupper($data['localidad']),
            'idEstado'          => $data['idEstado'],
            'idPais'            => $data['idPais'],
            'codigoPostal'      => mb_strtoupper($data['codigoPostal']),
            'aceptoCondiciones' => $aceptoCondiciones,
            'eliminado'         => 0
        ]);
    }
}
