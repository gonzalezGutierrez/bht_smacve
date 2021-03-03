<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Anualidad extends Model
{
    protected $table = 'tbl_anualidades';
    protected $primaryKey = 'idAnualidad';


    protected $fillable = [
        'anualidad',
        'costo',
        'descripcion',
        'eliminado'
    ];


    public static function getHistorialAnualidades($idUsuario)
    {

        $anualidades = DB::table('tbl_anualidades')
            ->leftJoin('tbl_pagos', function ($join) use($idUsuario) {
                $join->on('tbl_pagos.idAnualidad', '=', 'tbl_anualidades.idAnualidad')->where('tbl_pagos.idUsuario', '=', $idUsuario);
            })
            ->leftJoin('cat_status_pagos', 'cat_status_pagos.idStatusPago', '=', 'tbl_pagos.idStatusPago')
            ->where('tbl_anualidades.eliminado', '=', 0)
            ->select(
                'tbl_anualidades.idAnualidad',
                'tbl_anualidades.anualidad',
                'tbl_anualidades.costo',
                DB::raw('IFNULL(tbl_pagos.idStatusPago,"1") AS idStatusPago'),
                DB::raw('IFNULL(cat_status_pagos.statusPago,"NO PAGADO") AS statusPago'),
                DB::raw('IFNULL(cat_status_pagos.badgeStatusPago,"badge-secondary") AS badgeStatusPago')
            )
            ->orderBy('tbl_anualidades.idAnualidad','DESC')
            ->get();

        return $anualidades;

    }


}


