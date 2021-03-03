<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetalleSolicitudAreaInteres extends Model
{
    protected $table = 'tbl_detalle_solicitudes_areas_interes';
    protected $primaryKey = 'idDetalleSolicitudAreaInteres';


    protected $fillable = [
        'idSolicitudVoluntariado',
        'idUsuario',
        'idAreaInteres',
        'tipoTratamiento',
        'eliminado'
    ];

}
