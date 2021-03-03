<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetalleSolicitudConfiguracionPractica extends Model
{
    protected $table = 'tbl_detalle_solicitudes_configuracion_practica';
    protected $primaryKey = 'idDetalleSolicitudConfiguracionPractica';


    protected $fillable = [
        'idSolicitudVoluntariado',
        'idUsuario',
        'idConfiguracionPractica',
        'eliminado'
    ];

}
