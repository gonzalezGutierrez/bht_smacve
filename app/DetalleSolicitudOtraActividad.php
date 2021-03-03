<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetalleSolicitudOtraActividad extends Model
{
    protected $table = 'tbl_detalle_solicitudes_otras_actividades';
    protected $primaryKey = 'idDetalleSolicitudOtraActividad';


    protected $fillable = [
        'idSolicitudVoluntariado',
        'idUsuario',
        'idActividadVoluntariado',
        'eliminado'
    ];

}
