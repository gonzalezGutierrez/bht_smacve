<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPractica extends Model
{
    protected $table = 'cat_tipos_practica';
    protected $primaryKey = 'idTipoPractica';

    protected $fillable = [
        'tipoPractica',
        'eliminado'
    ];
}
