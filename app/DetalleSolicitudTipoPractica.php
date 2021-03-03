<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetalleSolicitudTipoPractica extends Model
{
    protected $table = 'tbl_detalle_solicitudes_tipo_practica';
    protected $primaryKey = 'idDetalleSolicitudTipoPractica';


    protected $fillable = [
        'idSolicitudVoluntariado',
        'idUsuario',
        'idTipoPractica',
        'eliminado'
    ];

}
