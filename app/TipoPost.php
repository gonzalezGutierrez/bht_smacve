<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPost extends Model
{
    protected $table = 'cat_tipo_post';
    protected $primaryKey = 'idTipoPost';

    protected $fillable = [
        'tipoPost',
        'eliminado'
    ];
}
