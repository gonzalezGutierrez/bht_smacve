<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    protected $table = 'tbl_posts';
    protected $primaryKey = 'idPost';

    protected $fillable = [
        'titulo',
        'descripcion',
        'thumb',
        'contenido',
        'images',
        'videos',
        'files',
        'idTipoPost',
        'idCategoriaPost',
        'fechaPublicacion',
        'autor',
        'premium',
        'tags',
        'visible',
        'prioridad',
        'background_color_fondo',
        'background_color_texto',
        'numVisitas',
        'numComentarios',
        'idUsuario',
        'eliminado'
    ];


    public static function getAllPost()
    {

        $post = DB::table('tbl_posts')
            ->join('cat_categoria_post', 'tbl_posts.idCategoriaPost', '=', 'cat_categoria_post.idCategoriaPost')
            ->where('tbl_posts.eliminado', '=', 0)
            ->select(
                'tbl_posts.idPost',
                'tbl_posts.titulo',
                'tbl_posts.fechaPublicacion',
                'cat_categoria_post.categoriaPost',
                'tbl_posts.autor',
                'tbl_posts.visible',
                'tbl_posts.premium'
            )
            ->orderBy('tbl_posts.idPost','desc')
            ->paginate(15);

        return $post;

    }
    public static function getAllPostLike($txtbuscar){

        $post =  DB::table('tbl_posts')
            ->join('cat_categoria_post', 'tbl_posts.idCategoriaPost', '=', 'cat_categoria_post.idCategoriaPost')
            ->where(function($query) use ($txtbuscar) {
                $query->where('tbl_posts.titulo', "LIKE", "%$txtbuscar%")
                    ->where('tbl_posts.eliminado', '=', 0);
            })
            ->orWhere(function($query) use ($txtbuscar) {
                $query->where('tbl_posts.idPost', "LIKE", "%$txtbuscar%")
                    ->where('tbl_posts.eliminado','=',0);
            })
            ->select(
                'tbl_posts.idPost',
                'tbl_posts.titulo',
                'tbl_posts.fechaPublicacion',
                'cat_categoria_post.categoriaPost',
                'tbl_posts.autor',
                'tbl_posts.visible',
                'tbl_posts.premium'
            )
            ->orderBy('tbl_posts.idPost','desc')
            ->paginate(15);


        return $post;

    }



    /* FRONT END*/

    public static function getAllPostFrontEnd()
    {

        $post = DB::table('tbl_posts')
            ->join('cat_categoria_post', 'tbl_posts.idCategoriaPost', '=', 'cat_categoria_post.idCategoriaPost')
            ->where('tbl_posts.eliminado', '=', 0)
            ->select(
                'tbl_posts.idPost',
                'tbl_posts.titulo',
                'tbl_posts.descripcion',
                'tbl_posts.thumb',
                'tbl_posts.contenido',
                'tbl_posts.images',
                'tbl_posts.videos',
                'tbl_posts.files',
                'tbl_posts.idTipoPost',
                'tbl_posts.idCategoriaPost',
                'cat_categoria_post.categoriaPost',
                'cat_categoria_post.nameURL',
                'tbl_posts.fechaPublicacion',
                'tbl_posts.autor',
                'tbl_posts.tags',
                'tbl_posts.premium',
                'tbl_posts.visible',
                'tbl_posts.prioridad',
                'tbl_posts.background_color_fondo',
                'tbl_posts.background_color_texto',
                'tbl_posts.numVisitas',
                'tbl_posts.numComentarios'


            )
            ->orderBy('tbl_posts.idPost','DESC')
            ->paginate(5);

        return $post;

    }

    public static function getAllPostFrontEndByIdCategoriaPost($idCategoriaPost)
    {

        $post = DB::table('tbl_posts')
            ->join('cat_categoria_post', 'tbl_posts.idCategoriaPost', '=', 'cat_categoria_post.idCategoriaPost')
            ->where('tbl_posts.eliminado', '=', 0)
            ->where('tbl_posts.idCategoriaPost', '=', $idCategoriaPost)
            ->select(
                'tbl_posts.idPost',
                'tbl_posts.titulo',
                'tbl_posts.descripcion',
                'tbl_posts.thumb',
                'tbl_posts.contenido',
                'tbl_posts.images',
                'tbl_posts.videos',
                'tbl_posts.files',
                'tbl_posts.idTipoPost',
                'tbl_posts.idCategoriaPost',
                'cat_categoria_post.categoriaPost',
                'cat_categoria_post.nameURL',
                'tbl_posts.fechaPublicacion',
                'tbl_posts.autor',
                'tbl_posts.tags',
                'tbl_posts.premium',
                'tbl_posts.visible',
                'tbl_posts.prioridad',
                'tbl_posts.background_color_fondo',
                'tbl_posts.background_color_texto',
                'tbl_posts.numVisitas',
                'tbl_posts.numComentarios'
            )
            ->orderBy('tbl_posts.idPost','DESC')
            ->paginate(5);

        return $post;

    }


    public static function getAllPostBuscarFrontEnd($txtbuscar){

        $post =  DB::table('tbl_posts')
            ->join('cat_categoria_post', 'tbl_posts.idCategoriaPost', '=', 'cat_categoria_post.idCategoriaPost')
            ->where(function($query) use ($txtbuscar) {
                $query->where('tbl_posts.titulo', "LIKE", "%$txtbuscar%")
                    ->where('tbl_posts.eliminado', '=', 0);
            })
            ->orWhere(function($query) use ($txtbuscar) {
                $query->where('tbl_posts.autor', "LIKE", "%$txtbuscar%")
                    ->where('tbl_posts.eliminado','=',0);
            })
            ->orWhere(function($query) use ($txtbuscar) {
                $query->where('tbl_posts.idPost', "LIKE", "%$txtbuscar%")
                    ->where('tbl_posts.eliminado','=',0);
            })
            ->select(
                'tbl_posts.idPost',
                'tbl_posts.titulo',
                'tbl_posts.descripcion',
                'tbl_posts.thumb',
                'tbl_posts.contenido',
                'tbl_posts.images',
                'tbl_posts.videos',
                'tbl_posts.files',
                'tbl_posts.idTipoPost',
                'tbl_posts.idCategoriaPost',
                'cat_categoria_post.categoriaPost',
                'cat_categoria_post.nameURL',
                'tbl_posts.fechaPublicacion',
                'tbl_posts.autor',
                'tbl_posts.tags',
                'tbl_posts.premium',
                'tbl_posts.visible',
                'tbl_posts.prioridad',
                'tbl_posts.background_color_fondo',
                'tbl_posts.background_color_texto',
                'tbl_posts.numVisitas',
                'tbl_posts.numComentarios'
            )
            ->orderBy('tbl_posts.idPost','desc')
            ->paginate(15);


        return $post;

    }

    public static function getPostByIdPost($idPost)
    {

        $post = DB::table('tbl_posts')
            ->join('cat_categoria_post', 'tbl_posts.idCategoriaPost', '=', 'cat_categoria_post.idCategoriaPost')
            ->where('tbl_posts.eliminado', '=', 0)
            ->where('tbl_posts.idPost', '=', $idPost)
            ->select(
                'tbl_posts.idPost',
                'tbl_posts.titulo',
                'tbl_posts.descripcion',
                'tbl_posts.thumb',
                'tbl_posts.contenido',
                'tbl_posts.images',
                'tbl_posts.videos',
                'tbl_posts.files',
                'tbl_posts.idTipoPost',
                'tbl_posts.idCategoriaPost',
                'cat_categoria_post.categoriaPost',
                'cat_categoria_post.nameURL',
                'tbl_posts.fechaPublicacion',
                'tbl_posts.autor',
                'tbl_posts.tags',
                'tbl_posts.premium',
                'tbl_posts.visible',
                'tbl_posts.prioridad',
                'tbl_posts.background_color_fondo',
                'tbl_posts.background_color_texto',
                'tbl_posts.numVisitas',
                'tbl_posts.numComentarios'


            )
            ->first();

        return $post;

    }
    public static function getLastFivePost()
    {

        $post = DB::table('tbl_posts')
            ->join('cat_categoria_post', 'tbl_posts.idCategoriaPost', '=', 'cat_categoria_post.idCategoriaPost')
            ->where('tbl_posts.eliminado', '=', 0)
            ->select(
                'tbl_posts.idPost',
                'tbl_posts.titulo',
                'tbl_posts.descripcion',
                'tbl_posts.thumb',
                'tbl_posts.contenido',
                'tbl_posts.images',
                'tbl_posts.videos',
                'tbl_posts.files',
                'tbl_posts.idTipoPost',
                'tbl_posts.idCategoriaPost',
                'cat_categoria_post.categoriaPost',
                'cat_categoria_post.nameURL',
                'tbl_posts.fechaPublicacion',
                'tbl_posts.autor',
                'tbl_posts.tags',
                'tbl_posts.premium',
                'tbl_posts.visible',
                'tbl_posts.prioridad',
                'tbl_posts.background_color_fondo',
                'tbl_posts.background_color_texto',
                'tbl_posts.numVisitas',
                'tbl_posts.numComentarios'
            )
            ->orderBy('tbl_posts.idPost','DESC')
            ->take(5)->get();

        return $post;

    }
}
