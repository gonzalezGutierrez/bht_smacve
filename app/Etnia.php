<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etnia extends Model
{
    protected $table = 'cat_etnias';
    protected $primaryKey = 'idEtnia';

    protected $fillable = [
        'etnia',
        'eliminado'
    ];
}
