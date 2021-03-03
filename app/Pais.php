<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = 'cat_paises';
    protected $primaryKey = 'idPais';

    protected $fillable = [
        'clavePaisSat',
        'pais',
        'bandera',
        'eliminado'
    ];
}
