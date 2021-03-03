<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = 'cat_cargos';
    protected $primaryKey = 'idCargo';


    protected $fillable = [
        'cargo',
        'eliminado'
    ];
}
