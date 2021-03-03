<?php

namespace App\Http\Controllers;

use App\CategoriaPost;
use App\Post;
use App\TipoPost;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $txtbuscar = htmlspecialchars(Input::get('txtbuscar'));

        if(!empty($txtbuscar)){
            $post = Post::getAllPostLike($txtbuscar);
        }
        else
        {
            $post = Post::getAllPost();
        }

        return view('admin.educacion_medica.index',compact('post','txtbuscar'));
    }


    public function create()
    {
        $tipoPostList           = TipoPost::where('eliminado',0)->pluck('tipoPost','idTipoPost');
        $categoriaPostList      = CategoriaPost::where('eliminado',0)->pluck('categoriaPost','idCategoriaPost');

        return view('admin.educacion_medica.create',compact('tipoPostList','categoriaPostList'));
    }
    public function store(Request $request)
    {
        try{

            // INSERTAMOS EL THUMB DE LA PUBLICACION
            $fname = "post_empty.jpg";


            if ($request->has('thumb')){
                $imagenjson = $request->input('thumb');
                if(isset($imagenjson) && $imagenjson != 'undefined' )
                {
                    $json		= json_decode($imagenjson);
                    $tmp	    = explode(',',$json->data);
                    $imgdata    = base64_decode($tmp[1]);

                    $extension              =  explode('.',$json->name);
                    $extension				=  strtolower( end($extension));
                    $fname					= 'thumb_'.Carbon::now()->format('YmdHis').'_'.rand(1, 100).'.'.$extension;

                    $handle	= fopen(public_path().'/images/educacion_medica/thumb_post/'.$fname,'w');
                    fwrite($handle, $imgdata);
                    fclose($handle);
                }
            }



            // VERIFICAMOS LA FECHA DE LA PUBLICACION

            $fechaPublicacion = Carbon::now();
            if($request->has('fechaPublicacion')) {
                $fechaPublicacion =  Carbon::CreateFromFormat('d/m/Y H:i:s', $request->input('fechaPublicacion'));

            }

            // INSERTAMOS EL ARTICULO


            $post = new Post();
            $post->titulo                    = $request->input('titulo');
            $post->descripcion               = $request->input('descripcion');
            $post->thumb                     = $fname;
            $post->contenido                 = $request->input('contenido');
            $post->images                    = $request->input('images');
            $post->videos                    = $request->input('videos');
            $post->files                     = $request->input('files');

            $post->idTipoPost                = $request->input('idTipoPost');
            $post->idCategoriaPost           = $request->input('idCategoriaPost');
            $post->fechaPublicacion          = $fechaPublicacion;
            $post->autor                     = $request->input('autor');
            $post->tags                      = '';
            $post->premium                   = $request->input('premium');
            $post->visible                   = $request->input('visible');
            $post->prioridad                 = $request->input('prioridad');

            $post->background_color_fondo    = $request->input('background_color_fondo');
            $post->background_color_texto    = $request->input('background_color_texto');

            $post->numVisitas                = 0;
            $post->numComentarios            = 0;
            $post->idUsuario                 = Auth::user()->idUsuario;
            $post->eliminado                 = 0;
            $post->save();

            $response = array(
                'status' => 'success',
                'idArticulo' => $post->idPost,
            );

        }
        catch(Exception $e){
            $response = array(
                'status' => 'error',
                'msj' => $e->getMessage()
            );
        }

        return Response::json($response);
    }

    public function show($id)
    {
        //
    }

    public function edit($idPost)
    {
        $tipoPostList           = TipoPost::where('eliminado',0)->pluck('tipoPost','idTipoPost');
        $categoriaPostList      = CategoriaPost::where('eliminado',0)->pluck('categoriaPost','idCategoriaPost');

        $post                   = Post::find($idPost);

        return view('admin.educacion_medica.edit',compact('post','tipoPostList','categoriaPostList'));
    }
    public function update(Request $request, $idPost)
    {
        try{

            // INSERTAMOS EL THUMB DE LA PUBLICACION
            $fname = "post_empty.jpg";
            $changefoto = 0;

            if ($request->has('thumb')){
                $imagenjson = $request->input('thumb');
                if(isset($imagenjson) && $imagenjson != 'undefined' )
                {
                    $json		= json_decode($imagenjson);
                    $tmp	    = explode(',',$json->data);
                    $imgdata    = base64_decode($tmp[1]);

                    $extension              =  explode('.',$json->name);
                    $extension				=  strtolower( end($extension));
                    $fname					= 'thumb_'.Carbon::now()->format('YmdHis').'_'.rand(1, 100).'.'.$extension;

                    $handle	= fopen(public_path().'/images/educacion_medica/thumb_post/'.$fname,'w');
                    fwrite($handle, $imgdata);
                    fclose($handle);

                    $changefoto = 1;
                }
            }

            // VERIFICAMOS LA FECHA DEL ARTICULO

            $fechaPublicacion = Carbon::now();
            if($request->has('fechaPublicacion')) {
                $fechaPublicacion =  Carbon::CreateFromFormat('d/m/Y H:i:s', $request->input('fechaPublicacion'));

            }

            // ACTUALIZAMOS EL POST

            $post                           = Post::find($idPost);
            $post->titulo                    = $request->input('titulo');
            $post->descripcion               = $request->input('descripcion');
            if($changefoto == 1) {
                $fotovieja =        $post->thumb;
                $post->thumb = $fname;

                if ($fotovieja != 'post_empty.jpg'){
                    if (Storage::disk('local')->has('images/educacion_medica/thumb_post/' . $fotovieja)) {
                        Storage::disk('local')->delete('images/educacion_medica/thumb_post/' . $fotovieja);
                    }
                }
            }
            $post->contenido                 = $request->input('contenido');
            $post->images                    = $request->input('images');
            $post->videos                    = $request->input('videos');
            $post->files                     = $request->input('files');

            $post->idTipoPost                = $request->input('idTipoPost');
            $post->idCategoriaPost           = $request->input('idCategoriaPost');
            $post->fechaPublicacion          = $fechaPublicacion;
            $post->autor                     = $request->input('autor');
            $post->tags                      = '';
            $post->premium                   = $request->input('premium');
            $post->visible                   = $request->input('visible');
            $post->prioridad                 = $request->input('prioridad');

            $post->background_color_fondo    = $request->input('background_color_fondo');
            $post->background_color_texto    = $request->input('background_color_texto');

            //$post->numVisitas                = 0;
            //$post->numComentarios            = 0;
            $post->idUsuario                 = Auth::user()->idUsuario;
            $post->eliminado                 = 0;
            $post->save();


            $response = array(
                'status' => 'success',
                'idPost' => $post->idPost
            );

        }
        catch(Exception $e){
            $response = array(
                'status' => 'error',
                'msj' => $e->getMessage()
            );
        }

        return Response::json($response);
    }

    public function destroy($idPost)
    {
        $publicacion = Post::find($idPost);
        $publicacion->eliminado = 1;
        $publicacion->save();

        return redirect('admin/educacion_medica');

    }


    public function upload_image(Request $request)
    {
        if($request->hasFile('imagen')){
            $imagen = $request->file('imagen');

            try{

                $nombreArchivo ='img_'.Carbon::now()->format('YmdHis').'_'.rand(1, 100).'.'.$imagen->guessClientExtension();

                // Verificamos si ya existe la carpeta
                if(Storage::disk('local')->has('images/educacion_medica/images_post'))
                {
                    Storage::disk('local')->put('images/educacion_medica/images_post/'.$nombreArchivo,File::get($imagen));
                }
                else
                {
                    Storage::disk('local')->makeDirectory('images/educacion_medica/images_post');
                    Storage::disk('local')->put('images/educacion_medica/images_post/'.$nombreArchivo,File::get($imagen));
                }

                $response = array(
                    'status' => 'success',
                    'imagen' => $nombreArchivo,
                );
            }
            catch(Exception $e){
                $response = array(
                    'status' => 'error',
                    'msg' => $e->getMessage(),
                );
            }
        }
        else
        {
            $response = array(
                'status' => 'error',
                'msg' => 'Seleccione la imagen a subir.'
            );
        }

        return Response::json($response);
    }
    public function destroy_image(Request $request)
    {

        if($request->has('nombre_imagen')){

            $nombre_imagen = $request->input('nombre_imagen');

            try{

                if (Storage::disk('local')->has('images/educacion_medica/images_post/' . $nombre_imagen)) {
                    Storage::disk('local')->delete('images/educacion_medica/images_post/' . $nombre_imagen);
                }

                $response = array(
                    'status' => 'success',
                    'imagen' => $nombre_imagen,
                );
            }
            catch(Exception $e){
                $response = array(
                    'status' => 'error',
                    'msg' => $e->getMessage(),
                );
            }
        }
        else
        {
            $response = array(
                'status' => 'error',
                'msg' => 'Seleccione la imagen a eliminar.'
            );
        }

        return Response::json($response);
    }

    public function upload_pdf(Request $request)
    {
        if($request->hasFile('archivo')){
            $archivo = $request->file('archivo');

            try{

                $nombreArchivo ='pdf_'.Carbon::now()->format('YmdHis').'_'.rand(1, 100).'.'.$archivo->guessClientExtension();

                // Verificamos si ya existe la carpeta
                if(Storage::disk('local')->has('files_post'))
                {
                    Storage::disk('local')->put('files_post/'.$nombreArchivo,File::get($archivo));
                }
                else
                {
                    Storage::disk('local')->makeDirectory('files_post');
                    Storage::disk('local')->put('files_post/'.$nombreArchivo,File::get($archivo));
                }

                $response = array(
                    'status'  => 'success',
                    'archivo' => $nombreArchivo,
                );
            }
            catch(Exception $e){
                $response = array(
                    'status' => 'error',
                    'msg' => $e->getMessage(),
                );
            }
        }
        else
        {
            $response = array(
                'status' => 'error',
                'msg' => 'Seleccione la imagen a subir.'
            );
        }

        return Response::json($response);
    }
    public function destroy_pdf(Request $request)
    {

        if($request->has('nombre_archivo')){

            $nombre_archivo = $request->input('nombre_archivo');

            try{

                if (Storage::disk('local')->has('files_post/' . $nombre_archivo)) {
                    Storage::disk('local')->delete('files_post/' . $nombre_archivo);
                }

                $response = array(
                    'status' => 'success',
                    'archivo' => $nombre_archivo,
                );
            }
            catch(Exception $e){
                $response = array(
                    'status' => 'error',
                    'msg' => $e->getMessage(),
                );
            }
        }
        else
        {
            $response = array(
                'status' => 'error',
                'msg' => 'Seleccione el archivo a eliminar.'
            );
        }

        return Response::json($response);
    }
}
