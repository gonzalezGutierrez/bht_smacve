<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AccesoPost extends Model
{
    protected $table = 'tbl_accesos_post';
    protected $primaryKey = 'idAcceso';

    protected $fillable = [
        'idUsuario',
        'idPost'
    ];
}
