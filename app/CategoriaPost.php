<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaPost extends Model
{
    protected $table = 'cat_categoria_post';
    protected $primaryKey = 'idCategoriaPost';

    protected $fillable = [
        'categoriaPost',
        'descripcion',
        'nameURL',
        'eliminado'
    ];
}
