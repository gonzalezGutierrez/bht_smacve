<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MessagePost extends Model
{
    protected $table = 'tbl_messages_post';
    protected $primaryKey = 'idMessage';

    protected $fillable = [
        'idPost',
        'idUsuario',
        'comentario',
        'eliminado'
    ];


    public static function getAllMessageByIdPost($idPost)
    {

        $messages = DB::table('tbl_messages_post')
            ->join('tbl_usuarios', 'tbl_usuarios.idUsuario', '=', 'tbl_messages_post.idUsuario')
            ->where('tbl_messages_post.eliminado', 0)
            ->where('tbl_messages_post.idPost', $idPost)
            ->select(
                'tbl_messages_post.idMessage',
                'tbl_messages_post.idPost',
                'tbl_messages_post.idUsuario',
                'tbl_usuarios.nombre',
                'tbl_usuarios.apellidoPaterno',
                'tbl_usuarios.apellidomaterno',
                'tbl_messages_post.comentario'
            )
            ->orderBy('tbl_messages_post.created_at','ASC')
            ->get();

        return $messages;

    }

    public static function getAllMessageAfterLastIdMessage($idPost,$idMessage)
    {

        $messages = DB::table('tbl_messages_post')
            ->join('tbl_usuarios', 'tbl_usuarios.idUsuario', '=', 'tbl_messages_post.idUsuario')
            ->where('tbl_messages_post.eliminado', 0)
            ->where('tbl_messages_post.idPost', $idPost)
            ->where('tbl_messages_post.idMessage','>', $idMessage)
            ->select(
                'tbl_messages_post.idMessage',
                'tbl_messages_post.idPost',
                'tbl_messages_post.idUsuario',
                'tbl_usuarios.nombre',
                'tbl_usuarios.apellidoPaterno',
                'tbl_usuarios.apellidomaterno',
                'tbl_messages_post.comentario',
                'tbl_messages_post.created_at'
            )
            ->orderBy('tbl_messages_post.created_at','ASC')
            ->get();

        return $messages;

    }

}
