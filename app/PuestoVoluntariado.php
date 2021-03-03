<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PuestoVoluntariado extends Model
{
    protected $table = 'cat_puestos_voluntariado';
    protected $primaryKey = 'idPuestoVoluntariado';


    protected $fillable = [
        'puestoVoluntariado',
        'descripcion',
        'parentId',
        'orden',
        'eliminado'
    ];


    public function children(){

        return $this->hasMany(PuestoVoluntariado::class,'parentId','idPuestoVoluntariado');
    }

    public function parent() {
        return $this->belongsTo(PuestoVoluntariado::class, 'parentId', 'idPuestoVoluntariado');
    }

}
