<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoraDisponibleVoluntariado extends Model
{
    protected $table = 'cat_horas_disponibles_voluntariado';
    protected $primaryKey = 'idHoraDisponible';


    protected $fillable = [
        'horaDisponible',
        'eliminado'
    ];
}
