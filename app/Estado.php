<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'cat_estados';
    protected $primaryKey = 'idEstado';


    protected $fillable = [
        'estado',
        'idPais',
        'eliminado'
    ];
}
