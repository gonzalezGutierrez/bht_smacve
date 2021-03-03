<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expresidentes extends Model
{
    protected $table = 'tbl_expresidentes';
    protected $primaryKey = 'idExpresidente';


    protected $fillable = [
        'nombre',
        'apellidoPaterno',
        'apellidoMaterno',
        'foto',
        'inicio',
        'fin',
        'eliminado'
    ];
}
