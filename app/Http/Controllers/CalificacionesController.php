<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use App\RatingProveedor;
use Auth;

class CalificacionesController extends Controller
{

    public function store(Request $request, $URLProveedor)
    {
        try {

            $proveedor = Proveedor::findByURL($URLProveedor);

            RatingProveedor::updateOrCreate(['idUsuario'=>Auth::user()->idUsuario,'idProveedor'=>$proveedor->idProveedor],[
                'calificacion'=>$request->calificacion,
                'idProveedor'=>$proveedor->idProveedor,
                'idUsuario'=>Auth::user()->idUsuario
            ]);

            return response()->json([
                'ok'=>true,
                'msg'=>'La calificación fue agregada correctamente'
            ],201);

        } catch (\Exception $e) {

        }

    }

}
