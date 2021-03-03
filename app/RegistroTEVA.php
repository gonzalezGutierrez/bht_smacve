<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistroTEVA extends Model
{
    protected $table        = 'tbl_registro_teva';
    protected $primaryKey   = 'idRegistro';

    protected $fillable = [
        'nombre',
        'email',
        'especialidad',
        'telefono',
        'eliminado'
    ];
}
