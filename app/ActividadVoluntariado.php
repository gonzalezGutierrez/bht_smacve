<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActividadVoluntariado extends Model
{
    protected $table = 'cat_actividades_voluntariado';
    protected $primaryKey = 'idActividadVoluntariado';


    protected $fillable = [
        'actividadVoluntariado',
        'eliminado'
    ];
}
