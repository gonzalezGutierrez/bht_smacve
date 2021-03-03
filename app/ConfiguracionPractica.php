<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfiguracionPractica extends Model
{
    protected $table = 'cat_configuraciones_practica';
    protected $primaryKey = 'idConfiguracionPractica';

    protected $fillable = [
        'configuracionPractica',
        'eliminado'
    ];
}
