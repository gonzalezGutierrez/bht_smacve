<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriaProveedor;
use Auth;
class CategoriaController extends Controller
{

    public function create()
    {
        $categoria = new CategoriaProveedor();
        return view('proveedores.categorias.create',compact('categoria'));
    }

    public function store (Request $request)
    {
        try {

            $categoria = new CategoriaProveedor();
            $categoria->categoria = $request->nombre;
            $categoria->idUsuario = Auth::user()->idUsuario;

            $categoria->save();

            return redirect('/proveedores');

        } catch (\Exception $e) {
            return back()->with('status_warning','La categoria no pudo ser guardada,  intentalo mas tarde.');
        }

    }

    public function edit($idCategoria)
    {
        $categoria = CategoriaProveedor::findOrfail($idCategoria);
        return view('proveedores.categorias.create',compact('categoria'));
    }


    public function update(Request $request,$idCategoria)
    {
        try {

            $categoria = CategoriaProveedor::findOrfail($idCategoria);
            $categoria->categoria = $request->nombre;

            $categoria->save();

            return redirect('/proveedores');

        } catch (\Exception $e) {
            return back()->with('status_warning','La categoria no pudo ser guardada,  intentalo mas tarde.');
        }
    }

}
