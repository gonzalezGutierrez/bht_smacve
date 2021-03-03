<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use App\ComentarioProveedor;
use Auth;
class ComentariosController extends Controller
{

    public function store(Request $request, $URLProveedor)
    {
        try {

            $proveedor = Proveedor::findByURL($URLProveedor);

            $comentario = new ComentarioProveedor();

            $comentario->comentario  = $request->comentario;
            $comentario->idUsuario   = Auth::user()->idUsuario;
            $comentario->idProveedor = $proveedor->idProveedor;

            $comentario->save();

            return back();

        } catch (\Exception $e) {
            dd($e);
        }

    }

}
