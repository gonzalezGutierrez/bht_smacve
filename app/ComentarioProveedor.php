<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComentarioProveedor extends Model
{

    protected $table = 'tbl_comentarios_proveedores';
    protected $primaryKey = 'idComentario';

    public function getAllCommentsbyProveedorId($idProveedor)
    {
        return $this->join('tbl_usuarios','tbl_comentarios_proveedores.idUsuario','tbl_usuarios.idUsuario')
            ->where('tbl_comentarios_proveedores.idProveedor',$idProveedor)
            ->orderBy('tbl_comentarios_proveedores.created_at','DESC')
            ->select([
                'tbl_usuarios.nombre',
                'tbl_usuarios.apellidoPaterno',
                'tbl_usuarios.apellidoMaterno',
                'tbl_usuarios.foto',
                'tbl_comentarios_proveedores.comentario'
            ])
            ->paginate(20);
    }

}
