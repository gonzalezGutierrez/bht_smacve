<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchivoAdjuntoPost extends Model
{

    protected $table = 'tbl_archivos_adjuntos_posts';
    protected $primaryKey = 'idArchivoAdjunto';

    public static function getFilesByIdPost($idPost)
    {
        return ArchivoAdjuntoPost::where('idPost',$idPost)
            ->where('eliminado',0)
            ->get(['idArchivoAdjunto','urlArchivoAdjunto','nombreArchivo']);
    }

}
