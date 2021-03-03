<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetalleSolicitudVoluntariado extends Model
{
    protected $table = 'tbl_detalle_solicitudes_voluntariados';
    protected $primaryKey = 'idDetalleSolicitudVoluntariado';


    protected $fillable = [
        'idSolicitudVoluntariado',
        'idUsuario',
        'idPuestoVoluntariado',
        'declaracionInteres',
        'aptitudes',
        'ordenSeleccion',
        'eliminado'
    ];


    public static function getAllPuestosSeleccionadosByUsuario($idUsuario){

        $puestoSeleccionados = DB::table('tbl_detalle_solicitudes_voluntariados')
            ->join('cat_puestos_voluntariado', 'tbl_detalle_solicitudes_voluntariados.idPuestoVoluntariado', '=', 'cat_puestos_voluntariado.idPuestoVoluntariado')

            ->select(
                'tbl_detalle_solicitudes_voluntariados.idPuestoVoluntariado',
                'cat_puestos_voluntariado.puestoVoluntariado',
                'tbl_detalle_solicitudes_voluntariados.ordenSeleccion'
            )
            ->where('tbl_detalle_solicitudes_voluntariados.eliminado', 0)
            ->where('tbl_detalle_solicitudes_voluntariados.idUsuario', $idUsuario)

            ->orderBy('tbl_detalle_solicitudes_voluntariados.ordenSeleccion', 'ASC')
            ->get();


        return $puestoSeleccionados;

    }

    public static function getPuestoSeleccionadoByUsuarioAndOrden($idUsuario,$orden){

        $puestoSeleccionado = DB::table('tbl_detalle_solicitudes_voluntariados')
            ->join('cat_puestos_voluntariado', 'tbl_detalle_solicitudes_voluntariados.idPuestoVoluntariado', '=', 'cat_puestos_voluntariado.idPuestoVoluntariado')

            ->select(
                'tbl_detalle_solicitudes_voluntariados.idPuestoVoluntariado',
                'cat_puestos_voluntariado.puestoVoluntariado',
                'tbl_detalle_solicitudes_voluntariados.declaracionInteres',
                'tbl_detalle_solicitudes_voluntariados.aptitudes',
                'tbl_detalle_solicitudes_voluntariados.ordenSeleccion'
            )
            ->where('tbl_detalle_solicitudes_voluntariados.eliminado', 0)
            ->where('tbl_detalle_solicitudes_voluntariados.idUsuario', $idUsuario)
            ->where('tbl_detalle_solicitudes_voluntariados.ordenSeleccion',$orden)
            ->first();


        return $puestoSeleccionado;

    }

}
