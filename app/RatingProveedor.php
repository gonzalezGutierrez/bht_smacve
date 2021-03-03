<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class RatingProveedor extends Model
{

    protected $table = 'tbl_rating_proveedores';
    protected $primaryKey = 'idRating';

    protected $fillable = [
        'calificacion',
        'idProveedor',
        'idUsuario'
    ];

    public static function getCalificacionByIdUserAndIdProveedor($usuarioId,$proveedorId)
    {
        return RatingProveedor::where('idProveedor',$proveedorId)
            ->where('idUsuario',$usuarioId)
            ->first();
    }

}
