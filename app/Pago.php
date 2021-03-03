<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table        = 'tbl_pagos';
    protected $primaryKey   = array('idUsuario', 'idAnualidad');
    public $incrementing    = false;

    protected $fillable = [
        'idUsuario',
        'idAnualidad',
        'idStatusPago',
        'monto',
        'observaciones',
        'comprobantePago',
        'idMetodoPago',
        'eliminado'
    ];
}
