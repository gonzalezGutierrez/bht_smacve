<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitudVoluntariado extends Model
{
    protected $table = 'tbl_solicitudes_voluntariados';
    protected $primaryKey = 'idSolicitudVoluntariado';


    protected $fillable = [
        'idUsuario',
        'idEtapaSolicitudVoluntariado',
        'practicaHospitales',
        'afiliacionInstitucion',
        'nombreInstitucion',
        'comitesAnteriores',
        'fechaInicioPractica',
        'idEstado',
        'ciudad',
        'fechaNacimiento',
        'idHoraDisponible',
        'aceptoPoliticas',
        'politicaConflicto',
        'comentarios',
        'eliminado'
    ];

}
