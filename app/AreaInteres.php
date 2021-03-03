<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaInteres extends Model
{
    protected $table = 'cat_areas_interes';
    protected $primaryKey = 'idAreaInteres';


    protected $fillable = [
        'areaInteres',
        'eliminado'
    ];
}
