<?php

namespace App;

use App\Notifications\CustomResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'tbl_usuarios';
    protected $primaryKey = 'idUsuario';

    protected $fillable = [
        'idRol',
        'idCargo',
        'idStatusSocio',

        'titulo',
        'nombre',
        'apellidoPaterno',
        'apellidoMaterno',

        'foto',
        'fechaNacimiento',
        'sexo',

        'telOficina',
        'movil',
        'email',
        'password',
        'passwordVisible',

        'resumenCV',
        'universidad',
        'especialidad',
        'cedulaProfesional',
        'cedulaEspecialidad',
        'lugarTrabajo',
        'miembroDesde',
        'socio',

        'calle',
        'noExt',
        'noInt',
        'colonia',
        'municipio',
        'localidad',
        'idEstado',
        'idPais',
        'codigoPostal',
        'aceptoCondiciones',
        'compartirInformacion',
        'eliminado'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPasswordNotification($token));
    }
    public function routeNotificationForMail()
    {
        return $this->email;
    }

    // ADMIN

    public static function getAllUsuarios($idEstado,$idStatusSocio){

        $usuarios = DB::table('tbl_usuarios')
            ->join('cat_roles', 'tbl_usuarios.idRol', '=', 'cat_roles.idRol')
            ->join('cat_cargos', 'tbl_usuarios.idCargo', '=', 'cat_cargos.idCargo')
            ->join('cat_status_socio', 'tbl_usuarios.idStatusSocio', '=', 'cat_status_socio.idStatusSocio')
            ->join('cat_estados', 'tbl_usuarios.idEstado', '=', 'cat_estados.idEstado')
            ->join('cat_paises', 'tbl_usuarios.idPais', '=', 'cat_paises.idPais')
            ->select(
                'tbl_usuarios.idUsuario',
                'tbl_usuarios.idRol',
                'cat_roles.rol',
                'tbl_usuarios.idCargo',
                'cat_cargos.cargo',
                'tbl_usuarios.idStatusSocio',
                'cat_status_socio.statusSocio',
                'cat_status_socio.badgeStatusSocio',
                'tbl_usuarios.titulo',
                'tbl_usuarios.nombre',
                'tbl_usuarios.apellidoPaterno',
                'tbl_usuarios.apellidoMaterno',

                'tbl_usuarios.foto',
                'tbl_usuarios.fechaNacimiento',
                'tbl_usuarios.sexo',

                'tbl_usuarios.telOficina',
                'tbl_usuarios.movil',
                'tbl_usuarios.email',
                'tbl_usuarios.passwordVisible',

                'tbl_usuarios.universidad',
                'tbl_usuarios.especialidad',
                'tbl_usuarios.cedulaProfesional',
                'tbl_usuarios.cedulaEspecialidad',
                'tbl_usuarios.lugarTrabajo',
                'tbl_usuarios.miembroDesde',
                'tbl_usuarios.socio',

                'tbl_usuarios.calle',
                'tbl_usuarios.noExt',
                'tbl_usuarios.noInt',
                'tbl_usuarios.colonia',
                'tbl_usuarios.municipio',
                'tbl_usuarios.localidad',
                'tbl_usuarios.idEstado',
                'cat_estados.estado',
                'tbl_usuarios.idPais',
                'cat_paises.pais',
                'tbl_usuarios.codigoPostal',
                'tbl_usuarios.aceptoCondiciones',
                'tbl_usuarios.compartirInformacion',
                'tbl_usuarios.eliminado'
            )
            ->where('tbl_usuarios.eliminado', 0)
            ->when(!empty($idEstado), function ($query) use ($idEstado) {
                return $query->where('tbl_usuarios.idEstado',$idEstado);
            })
            ->when(!empty($idStatusSocio), function ($query) use ($idStatusSocio) {
                return $query->where('tbl_usuarios.idStatusSocio',$idStatusSocio);
            })
            ->orderBy('tbl_usuarios.idUsuario', 'DESC')
            ->paginate(15);


        return $usuarios;

    }
    public static function getAllUsuariosLike($txtbuscar,$idEstado,$idStatusSocio)
    {

        $usuarios = DB::table('tbl_usuarios')
            ->join('cat_roles', 'tbl_usuarios.idRol', '=', 'cat_roles.idRol')
            ->join('cat_cargos', 'tbl_usuarios.idCargo', '=', 'cat_cargos.idCargo')
            ->join('cat_status_socio', 'tbl_usuarios.idStatusSocio', '=', 'cat_status_socio.idStatusSocio')
            ->join('cat_estados', 'tbl_usuarios.idEstado', '=', 'cat_estados.idEstado')
            ->join('cat_paises', 'tbl_usuarios.idPais', '=', 'cat_paises.idPais')
            ->select(
                'tbl_usuarios.idUsuario',
                'tbl_usuarios.idRol',
                'cat_roles.rol',
                'tbl_usuarios.idCargo',
                'cat_cargos.cargo',
                'tbl_usuarios.idStatusSocio',
                'cat_status_socio.statusSocio',
                'cat_status_socio.badgeStatusSocio',
                'tbl_usuarios.titulo',
                'tbl_usuarios.nombre',
                'tbl_usuarios.apellidoPaterno',
                'tbl_usuarios.apellidoMaterno',

                'tbl_usuarios.foto',
                'tbl_usuarios.fechaNacimiento',
                'tbl_usuarios.sexo',

                'tbl_usuarios.telOficina',
                'tbl_usuarios.movil',
                'tbl_usuarios.email',
                'tbl_usuarios.passwordVisible',

                'tbl_usuarios.universidad',
                'tbl_usuarios.especialidad',
                'tbl_usuarios.cedulaProfesional',
                'tbl_usuarios.cedulaEspecialidad',
                'tbl_usuarios.lugarTrabajo',
                'tbl_usuarios.miembroDesde',
                'tbl_usuarios.socio',

                'tbl_usuarios.calle',
                'tbl_usuarios.noExt',
                'tbl_usuarios.noInt',
                'tbl_usuarios.colonia',
                'tbl_usuarios.municipio',
                'tbl_usuarios.localidad',
                'tbl_usuarios.idEstado',
                'cat_estados.estado',
                'tbl_usuarios.idPais',
                'cat_paises.pais',
                'tbl_usuarios.codigoPostal',
                'tbl_usuarios.aceptoCondiciones',
                'tbl_usuarios.compartirInformacion',
                'tbl_usuarios.eliminado'
            )
            ->where(function($query) use ($txtbuscar,$idEstado,$idStatusSocio) {
                $query->where('tbl_usuarios.nombre', "LIKE", "%$txtbuscar%")
                    ->where('tbl_usuarios.eliminado','=',0)
                    ->when(!empty($idEstado), function ($query) use ($idEstado) {
                    return $query->where('tbl_usuarios.idEstado',$idEstado);
                })
                    ->when(!empty($idStatusSocio), function ($query) use ($idStatusSocio) {
                        return $query->where('tbl_usuarios.idStatusSocio',$idStatusSocio);
                    });
            })
            ->orWhere(function($query) use ($txtbuscar,$idEstado,$idStatusSocio) {
                $query->where('tbl_usuarios.apellidoPaterno', "LIKE", "%$txtbuscar%")
                    ->where('tbl_usuarios.eliminado','=',0)
                    ->when(!empty($idEstado), function ($query) use ($idEstado) {
                        return $query->where('tbl_usuarios.idEstado',$idEstado);
                    })
                    ->when(!empty($idStatusSocio), function ($query) use ($idStatusSocio) {
                        return $query->where('tbl_usuarios.idStatusSocio',$idStatusSocio);
                    });
            })
            ->orWhere(function($query) use ($txtbuscar,$idEstado,$idStatusSocio) {
                $query->where('tbl_usuarios.apellidoMaterno', "LIKE", "%$txtbuscar%")
                    ->where('tbl_usuarios.eliminado','=',0)
                    ->when(!empty($idEstado), function ($query) use ($idEstado) {
                        return $query->where('tbl_usuarios.idEstado',$idEstado);
                    })
                    ->when(!empty($idStatusSocio), function ($query) use ($idStatusSocio) {
                        return $query->where('tbl_usuarios.idStatusSocio',$idStatusSocio);
                    });
            })
            ->orWhere(function ($query) use ($txtbuscar,$idEstado,$idStatusSocio) {
                $query->where(DB::raw("CONCAT_WS(' ',tbl_usuarios.apellidoPaterno,tbl_usuarios.apellidoMaterno,tbl_usuarios.nombre)"), "LIKE", "%$txtbuscar%")
                    ->where('tbl_usuarios.eliminado','=',0)
                    ->when(!empty($idEstado), function ($query) use ($idEstado) {
                        return $query->where('tbl_usuarios.idEstado',$idEstado);
                    })
                    ->when(!empty($idStatusSocio), function ($query) use ($idStatusSocio) {
                        return $query->where('tbl_usuarios.idStatusSocio',$idStatusSocio);
                    });
            })
            ->orWhere(function ($query) use ($txtbuscar,$idEstado,$idStatusSocio) {
                $query->where(DB::raw("CONCAT_WS(' ',tbl_usuarios.nombre,tbl_usuarios.apellidoPaterno,tbl_usuarios.apellidoMaterno)"), "LIKE", "%$txtbuscar%")
                    ->where('tbl_usuarios.eliminado','=',0)
                    ->when(!empty($idEstado), function ($query) use ($idEstado) {
                        return $query->where('tbl_usuarios.idEstado',$idEstado);
                    })
                    ->when(!empty($idStatusSocio), function ($query) use ($idStatusSocio) {
                        return $query->where('tbl_usuarios.idStatusSocio',$idStatusSocio);
                    });
            })
            ->orderBy('tbl_usuarios.idUsuario', 'DESC')
            ->paginate(15);

        return $usuarios;

    }

    public static function getAllUsuariosForExcel($idEstado,$idStatusSocio){

        $usuarios = DB::table('tbl_usuarios')
            ->join('cat_roles', 'tbl_usuarios.idRol', '=', 'cat_roles.idRol')
            ->join('cat_cargos', 'tbl_usuarios.idCargo', '=', 'cat_cargos.idCargo')
            ->join('cat_status_socio', 'tbl_usuarios.idStatusSocio', '=', 'cat_status_socio.idStatusSocio')
            ->join('cat_estados', 'tbl_usuarios.idEstado', '=', 'cat_estados.idEstado')
            ->join('cat_paises', 'tbl_usuarios.idPais', '=', 'cat_paises.idPais')
            ->select(
                'tbl_usuarios.idUsuario',
                'tbl_usuarios.idRol',
                'cat_roles.rol',
                'tbl_usuarios.idCargo',
                'cat_cargos.cargo',
                'tbl_usuarios.idStatusSocio',
                'cat_status_socio.statusSocio',
                'cat_status_socio.badgeStatusSocio',
                'tbl_usuarios.titulo',
                'tbl_usuarios.nombre',
                'tbl_usuarios.apellidoPaterno',
                'tbl_usuarios.apellidoMaterno',

                'tbl_usuarios.foto',
                'tbl_usuarios.fechaNacimiento',
                'tbl_usuarios.sexo',

                'tbl_usuarios.telOficina',
                'tbl_usuarios.movil',
                'tbl_usuarios.email',
                'tbl_usuarios.passwordVisible',

                'tbl_usuarios.universidad',
                'tbl_usuarios.especialidad',
                'tbl_usuarios.cedulaProfesional',
                'tbl_usuarios.cedulaEspecialidad',
                'tbl_usuarios.lugarTrabajo',
                'tbl_usuarios.miembroDesde',
                'tbl_usuarios.socio',

                'tbl_usuarios.calle',
                'tbl_usuarios.noExt',
                'tbl_usuarios.noInt',
                'tbl_usuarios.colonia',
                'tbl_usuarios.municipio',
                'tbl_usuarios.localidad',
                'tbl_usuarios.idEstado',
                'cat_estados.estado',
                'tbl_usuarios.idPais',
                'cat_paises.pais',
                'tbl_usuarios.codigoPostal',
                'tbl_usuarios.aceptoCondiciones',
                'tbl_usuarios.compartirInformacion',
                'tbl_usuarios.eliminado'
            )
            ->where('tbl_usuarios.eliminado', 0)
            ->when(!empty($idEstado), function ($query) use ($idEstado) {
                return $query->where('tbl_usuarios.idEstado',$idEstado);
            })
            ->when(!empty($idStatusSocio), function ($query) use ($idStatusSocio) {
                return $query->where('tbl_usuarios.idStatusSocio',$idStatusSocio);
            })
            ->orderBy('tbl_usuarios.idUsuario', 'DESC')
            ->get();


        return $usuarios;

    }
    public static function getAllUsuariosLikeForExcel($txtbuscar,$idEstado,$idStatusSocio)
    {

        $usuarios = DB::table('tbl_usuarios')
            ->join('cat_roles', 'tbl_usuarios.idRol', '=', 'cat_roles.idRol')
            ->join('cat_cargos', 'tbl_usuarios.idCargo', '=', 'cat_cargos.idCargo')
            ->join('cat_status_socio', 'tbl_usuarios.idStatusSocio', '=', 'cat_status_socio.idStatusSocio')
            ->join('cat_estados', 'tbl_usuarios.idEstado', '=', 'cat_estados.idEstado')
            ->join('cat_paises', 'tbl_usuarios.idPais', '=', 'cat_paises.idPais')
            ->select(
                'tbl_usuarios.idUsuario',
                'tbl_usuarios.idRol',
                'cat_roles.rol',
                'tbl_usuarios.idCargo',
                'cat_cargos.cargo',
                'tbl_usuarios.idStatusSocio',
                'cat_status_socio.statusSocio',
                'cat_status_socio.badgeStatusSocio',
                'tbl_usuarios.titulo',
                'tbl_usuarios.nombre',
                'tbl_usuarios.apellidoPaterno',
                'tbl_usuarios.apellidoMaterno',

                'tbl_usuarios.foto',
                'tbl_usuarios.fechaNacimiento',
                'tbl_usuarios.sexo',

                'tbl_usuarios.telOficina',
                'tbl_usuarios.movil',
                'tbl_usuarios.email',
                'tbl_usuarios.passwordVisible',

                'tbl_usuarios.universidad',
                'tbl_usuarios.especialidad',
                'tbl_usuarios.cedulaProfesional',
                'tbl_usuarios.cedulaEspecialidad',
                'tbl_usuarios.lugarTrabajo',
                'tbl_usuarios.miembroDesde',
                'tbl_usuarios.socio',

                'tbl_usuarios.calle',
                'tbl_usuarios.noExt',
                'tbl_usuarios.noInt',
                'tbl_usuarios.colonia',
                'tbl_usuarios.municipio',
                'tbl_usuarios.localidad',
                'tbl_usuarios.idEstado',
                'cat_estados.estado',
                'tbl_usuarios.idPais',
                'cat_paises.pais',
                'tbl_usuarios.codigoPostal',
                'tbl_usuarios.aceptoCondiciones',
                'tbl_usuarios.compartirInformacion',
                'tbl_usuarios.eliminado'
            )
            ->where(function($query) use ($txtbuscar,$idEstado,$idStatusSocio) {
                $query->where('tbl_usuarios.nombre', "LIKE", "%$txtbuscar%")
                    ->where('tbl_usuarios.eliminado','=',0)
                    ->when(!empty($idEstado), function ($query) use ($idEstado) {
                        return $query->where('tbl_usuarios.idEstado',$idEstado);
                    })
                    ->when(!empty($idStatusSocio), function ($query) use ($idStatusSocio) {
                        return $query->where('tbl_usuarios.idStatusSocio',$idStatusSocio);
                    });
            })
            ->orWhere(function($query) use ($txtbuscar,$idEstado,$idStatusSocio) {
                $query->where('tbl_usuarios.apellidoPaterno', "LIKE", "%$txtbuscar%")
                    ->where('tbl_usuarios.eliminado','=',0)
                    ->when(!empty($idEstado), function ($query) use ($idEstado) {
                        return $query->where('tbl_usuarios.idEstado',$idEstado);
                    })
                    ->when(!empty($idStatusSocio), function ($query) use ($idStatusSocio) {
                        return $query->where('tbl_usuarios.idStatusSocio',$idStatusSocio);
                    });
            })
            ->orWhere(function($query) use ($txtbuscar,$idEstado,$idStatusSocio) {
                $query->where('tbl_usuarios.apellidoMaterno', "LIKE", "%$txtbuscar%")
                    ->where('tbl_usuarios.eliminado','=',0)
                    ->when(!empty($idEstado), function ($query) use ($idEstado) {
                        return $query->where('tbl_usuarios.idEstado',$idEstado);
                    })
                    ->when(!empty($idStatusSocio), function ($query) use ($idStatusSocio) {
                        return $query->where('tbl_usuarios.idStatusSocio',$idStatusSocio);
                    });
            })
            ->orWhere(function ($query) use ($txtbuscar,$idEstado,$idStatusSocio) {
                $query->where(DB::raw("CONCAT_WS(' ',tbl_usuarios.apellidoPaterno,tbl_usuarios.apellidoMaterno,tbl_usuarios.nombre)"), "LIKE", "%$txtbuscar%")
                    ->where('tbl_usuarios.eliminado','=',0)
                    ->when(!empty($idEstado), function ($query) use ($idEstado) {
                        return $query->where('tbl_usuarios.idEstado',$idEstado);
                    })
                    ->when(!empty($idStatusSocio), function ($query) use ($idStatusSocio) {
                        return $query->where('tbl_usuarios.idStatusSocio',$idStatusSocio);
                    });
            })
            ->orWhere(function ($query) use ($txtbuscar,$idEstado,$idStatusSocio) {
                $query->where(DB::raw("CONCAT_WS(' ',tbl_usuarios.nombre,tbl_usuarios.apellidoPaterno,tbl_usuarios.apellidoMaterno)"), "LIKE", "%$txtbuscar%")
                    ->where('tbl_usuarios.eliminado','=',0)
                    ->when(!empty($idEstado), function ($query) use ($idEstado) {
                        return $query->where('tbl_usuarios.idEstado',$idEstado);
                    })
                    ->when(!empty($idStatusSocio), function ($query) use ($idStatusSocio) {
                        return $query->where('tbl_usuarios.idStatusSocio',$idStatusSocio);
                    });
            })
            ->orderBy('tbl_usuarios.idUsuario', 'DESC')
            ->get();

        return $usuarios;

    }


    // FRONT END

    public static function getMiembrosComite(){

        $miembros = DB::table('tbl_usuarios')
            ->join('cat_cargos', 'tbl_usuarios.idCargo', '=', 'cat_cargos.idCargo')
            ->join('cat_estados', 'tbl_usuarios.idEstado', '=', 'cat_estados.idEstado')
            ->leftjoin('cat_paises', 'cat_paises.idPais', '=', 'tbl_usuarios.idPais')
            ->where('tbl_usuarios.idRol', 2)
            ->whereNotIn('tbl_usuarios.idCargo', [25])
            ->select(
                'tbl_usuarios.idRol',
                'tbl_usuarios.idCargo',
                'cat_cargos.cargo',
                'tbl_usuarios.titulo',
                'tbl_usuarios.nombre',
                'tbl_usuarios.apellidoPaterno',
                'tbl_usuarios.apellidoMaterno',

                'tbl_usuarios.foto',
                'tbl_usuarios.fechaNacimiento',
                'tbl_usuarios.sexo',

                'tbl_usuarios.telOficina',
                'tbl_usuarios.movil',
                'tbl_usuarios.email',
                'tbl_usuarios.passwordVisible',

                'tbl_usuarios.universidad',
                'tbl_usuarios.especialidad',
                'tbl_usuarios.cedulaProfesional',
                'tbl_usuarios.cedulaEspecialidad',
                'tbl_usuarios.lugarTrabajo',
                'tbl_usuarios.miembroDesde',
                'tbl_usuarios.socio',

                'tbl_usuarios.calle',
                'tbl_usuarios.noExt',
                'tbl_usuarios.noInt',
                'tbl_usuarios.colonia',
                'tbl_usuarios.municipio',
                'tbl_usuarios.localidad',
                'tbl_usuarios.idEstado',
                'cat_estados.estado',
                'tbl_usuarios.idPais',
                'cat_paises.pais',
                'tbl_usuarios.codigoPostal',
                'tbl_usuarios.aceptoCondiciones',
                'tbl_usuarios.compartirInformacion',
                'tbl_usuarios.idStatusSocio',
                'tbl_usuarios.eliminado'
            )
            ->orderBy('cat_cargos.idCargo','ASC')
            ->orderBy('tbl_usuarios.nombre','ASC')
            ->get();

        return $miembros;

    }
    public static function getMiembrosActivos(){

        $miembros = DB::table('tbl_usuarios')
            ->leftjoin('cat_cargos', 'tbl_usuarios.idCargo', '=', 'cat_cargos.idCargo')
            ->leftjoin('cat_estados', 'tbl_usuarios.idEstado', '=', 'cat_estados.idEstado')
            ->leftjoin('cat_paises', 'cat_paises.idPais', '=', 'tbl_usuarios.idPais')
            ->whereIn('idRol',[2,3]) // COMITE Y MIEMBROS SMACVE
            ->whereIn('idStatusSocio',[1,2,3]) // ACTIVO, EMERITO,HONORARIO
            ->select(
                'tbl_usuarios.idRol',
                'tbl_usuarios.idCargo',
                'cat_cargos.cargo',
                'tbl_usuarios.titulo',
                'tbl_usuarios.nombre',
                'tbl_usuarios.apellidoPaterno',
                'tbl_usuarios.apellidoMaterno',

                'tbl_usuarios.foto',
                'tbl_usuarios.fechaNacimiento',
                'tbl_usuarios.sexo',

                'tbl_usuarios.telOficina',
                'tbl_usuarios.movil',
                'tbl_usuarios.email',
                'tbl_usuarios.passwordVisible',

                'tbl_usuarios.universidad',
                'tbl_usuarios.especialidad',
                'tbl_usuarios.cedulaProfesional',
                'tbl_usuarios.cedulaEspecialidad',
                'tbl_usuarios.lugarTrabajo',
                'tbl_usuarios.miembroDesde',
                'tbl_usuarios.socio',

                'tbl_usuarios.calle',
                'tbl_usuarios.noExt',
                'tbl_usuarios.noInt',
                'tbl_usuarios.colonia',
                'tbl_usuarios.municipio',
                'tbl_usuarios.localidad',
                'tbl_usuarios.idEstado',
                'cat_estados.estado',
                'tbl_usuarios.idPais',
                'cat_paises.pais',
                'tbl_usuarios.codigoPostal',
                'tbl_usuarios.aceptoCondiciones',
                'tbl_usuarios.compartirInformacion',
                'tbl_usuarios.idStatusSocio',
                'tbl_usuarios.eliminado'
            )
            ->orderBy('tbl_usuarios.apellidoPaterno','ASC')
            ->paginate(5);

        return $miembros;

    }
    public static function getMiembrosActivosLike($search,$idEstado){

        $miembros = DB::table('tbl_usuarios')
            ->leftjoin('cat_cargos', 'tbl_usuarios.idCargo', '=', 'cat_cargos.idCargo')
            ->leftjoin('cat_estados', 'tbl_usuarios.idEstado', '=', 'cat_estados.idEstado')
            ->leftjoin('cat_paises', 'cat_paises.idPais', '=', 'tbl_usuarios.idPais')
            ->whereIn('idRol',[2,3]) // COMITE Y MIEMBROS SMACVE
            ->whereIn('idStatusSocio',[1,2,3]) // ACTIVO, EMERITO,HONORARIO
            ->when(!empty($idEstado), function ($query) use ($idEstado) {
                return $query->where('tbl_usuarios.idEstado',$idEstado);
            })
            ->when(!empty($search), function ($query) use ($search) {
                return $query->where(DB::raw("CONCAT_WS(' ',tbl_usuarios.titulo,tbl_usuarios.nombre,tbl_usuarios.apellidoPaterno,tbl_usuarios.apellidoMaterno)"), "LIKE", "%$search%");
            })
            ->select(
                'tbl_usuarios.idRol',
                'tbl_usuarios.idCargo',
                'cat_cargos.cargo',
                'tbl_usuarios.titulo',
                'tbl_usuarios.nombre',
                'tbl_usuarios.apellidoPaterno',
                'tbl_usuarios.apellidoMaterno',

                'tbl_usuarios.foto',
                'tbl_usuarios.fechaNacimiento',
                'tbl_usuarios.sexo',

                'tbl_usuarios.telOficina',
                'tbl_usuarios.movil',
                'tbl_usuarios.email',
                'tbl_usuarios.passwordVisible',

                'tbl_usuarios.universidad',
                'tbl_usuarios.especialidad',
                'tbl_usuarios.cedulaProfesional',
                'tbl_usuarios.cedulaEspecialidad',
                'tbl_usuarios.lugarTrabajo',
                'tbl_usuarios.miembroDesde',
                'tbl_usuarios.socio',

                'tbl_usuarios.calle',
                'tbl_usuarios.noExt',
                'tbl_usuarios.noInt',
                'tbl_usuarios.colonia',
                'tbl_usuarios.municipio',
                'tbl_usuarios.localidad',
                'tbl_usuarios.idEstado',
                'cat_estados.estado',
                'tbl_usuarios.idPais',
                'cat_paises.pais',
                'tbl_usuarios.codigoPostal',
                'tbl_usuarios.aceptoCondiciones',
                'tbl_usuarios.compartirInformacion',
                'tbl_usuarios.idStatusSocio',
                'tbl_usuarios.eliminado'
            )
            ->orderBy('tbl_usuarios.apellidoPaterno','ASC')
            ->paginate(5);

        return $miembros;

    }

    public static function getMiembro($idUsuario){

        $miembro = DB::table('tbl_usuarios')
            ->join('cat_roles', 'tbl_usuarios.idRol', '=', 'cat_roles.idRol')
            ->join('cat_cargos', 'tbl_usuarios.idCargo', '=', 'cat_cargos.idCargo')
            ->join('cat_status_socio', 'tbl_usuarios.idStatusSocio', '=', 'cat_status_socio.idStatusSocio')
            ->join('cat_estados', 'tbl_usuarios.idEstado', '=', 'cat_estados.idEstado')
            ->leftjoin('cat_paises', 'cat_paises.idPais', '=', 'tbl_usuarios.idPais')
            ->where('tbl_usuarios.idUsuario', $idUsuario)
            ->select(
                'tbl_usuarios.idUsuario',
                'tbl_usuarios.idRol',
                'cat_roles.rol',
                'tbl_usuarios.idCargo',
                'cat_cargos.cargo',
                'tbl_usuarios.idStatusSocio',
                'cat_status_socio.statusSocio',
                'cat_status_socio.badgeStatusSocio',
                'tbl_usuarios.titulo',
                'tbl_usuarios.nombre',
                'tbl_usuarios.apellidoPaterno',
                'tbl_usuarios.apellidoMaterno',

                'tbl_usuarios.foto',
                'tbl_usuarios.fechaNacimiento',
                'tbl_usuarios.sexo',

                'tbl_usuarios.telOficina',
                'tbl_usuarios.movil',
                'tbl_usuarios.email',
                'tbl_usuarios.passwordVisible',

                'tbl_usuarios.resumenCV',
                'tbl_usuarios.universidad',
                'tbl_usuarios.especialidad',
                'tbl_usuarios.cedulaProfesional',
                'tbl_usuarios.cedulaEspecialidad',
                'tbl_usuarios.lugarTrabajo',
                'tbl_usuarios.miembroDesde',
                'tbl_usuarios.socio',

                'tbl_usuarios.calle',
                'tbl_usuarios.noExt',
                'tbl_usuarios.noInt',
                'tbl_usuarios.colonia',
                'tbl_usuarios.municipio',
                'tbl_usuarios.localidad',
                'tbl_usuarios.idEstado',
                'cat_estados.estado',
                'tbl_usuarios.idPais',
                'cat_paises.pais',
                'tbl_usuarios.codigoPostal',
                'tbl_usuarios.aceptoCondiciones',
                'tbl_usuarios.compartirInformacion',
                'tbl_usuarios.idStatusSocio',
                'tbl_usuarios.eliminado'
            )
            ->first();

        return $miembro;
    }
}
