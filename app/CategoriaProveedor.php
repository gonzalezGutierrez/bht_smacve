<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaProveedor extends Model
{
    protected $table = 'cat_categorias_proveedores';
    protected $primaryKey = 'idCategoria';
    protected $perPage    = 10;

    public function getAll()
    {
        return $this->where('eliminado',0)->get();
    }
    public function getAllPluck()
    {
        return $this->where('eliminado',0)->pluck('categoria','idCategoria');
    }

    public function getURL()
    {
        return $this->idcategoria ?
             'proveedores/categorias/'.$this->slug :
             'proveedores/categorias';
    }

    public function getMETHOD()
    {
        return $this->idcategoria ?
             'PUT' :
             'POST';
    }
}
