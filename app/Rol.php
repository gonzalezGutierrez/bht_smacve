<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'cat_roles';
    protected $primaryKey = 'idRol';


    protected $fillable = [
        'rol',
        'eliminado'
    ];
}
