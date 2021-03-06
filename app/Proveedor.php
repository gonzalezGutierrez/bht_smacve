<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use DB;
class Proveedor extends Model
{

    protected $table = 'tbl_proveedores';
    protected $primaryKey = 'idProveedor';
    protected $perPage    = 10;

    public function setSlugAttribute($proveedor)
    {
        $this->attributes['slug'] = Str::slug($proveedor);
    }

    public function getURL()
    {
        return $this->idProveedor ?
             'proveedores/'.$this->slug :
             'proveedores';
    }

    public function getMETHOD()
    {
        return $this->idProveedor ?
             'PUT' :
             'POST';
    }

    public function getAllPaginate($filters)
    {
        $txtsearch = $filters->txtsearch;
        $categoria = $filters->categoria;
        return $this->join('cat_categorias_proveedores','tbl_proveedores.idCategoria','cat_categorias_proveedores.idCategoria')
            ->when(!empty($txtsearch), function($query) use($txtsearch){
                return $query->where('tbl_proveedores.proveedor','LIKE',"%{$txtsearch}%");
            })
            ->when(!empty($filters->categoria), function($query) use($categoria){
                return $query->where('cat_categorias_proveedores.idCategoria',$categoria);
            })
            ->where('tbl_proveedores.eliminado',0)
            ->orderBy('tbl_proveedores.idProveedor','DESC')
            ->select(
                'tbl_proveedores.idProveedor as proveedorId',
                'tbl_proveedores.proveedor',
                'tbl_proveedores.slug as proveedorURL',
                'tbl_proveedores.foto as proveedorImage',
                'tbl_proveedores.telefono as proveedorPhone',
                'tbl_proveedores.correo_electronico as proveedorEmail',
                'tbl_proveedores.descripcion',
                'tbl_proveedores.idUsuario',
                'cat_categorias_proveedores.idCategoria as categoryId',
                'cat_categorias_proveedores.categoria as category',
                DB::raw("format((select sum(calificacion)/count(*) from tbl_rating_proveedores where idProveedor = tbl_proveedores.idProveedor),0) as calificacion")
            )
            ->paginate($this->perPage);
    }

    public function getProveedor($URL)
    {
        return $this->where('slug',$URL)
            ->select(
                'idProveedor',
                'proveedor',
                'telefono',
                'correo_electronico',
                'pagina_web',
                'descripcion',
                'slug',
                'ciudad',
                'idUsuario',
                'idCategoria',
                DB::raw("format((select sum(calificacion)/count(*) from tbl_rating_proveedores where idProveedor = tbl_proveedores.idProveedor),0) as calificacion")
            );
    }

    public function getOtherProveedores($proveedorId)
    {
        return $this->where('idProveedor','<>',$proveedorId)
            ->take(5)
            ->orderBy('idProveedor','DESC')
            ->inRandomOrder()
            ->get();
    }


    public static function findByURL($URL)
    {
        return Proveedor::where('slug',$URL)->first();
    }

}
