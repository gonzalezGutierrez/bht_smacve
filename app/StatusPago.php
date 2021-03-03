<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusPago extends Model
{
    protected $table = 'cat_status_pagos';
    protected $primaryKey = 'idStatusPago';


    protected $fillable = [
        'statusPago',
        'badgeStatusPago',
        'eliminado'
    ];
}
