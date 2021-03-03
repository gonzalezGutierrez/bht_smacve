<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use App\CategoriaProveedor;
use Auth;
use App\ComentarioProveedor;
use App\Http\Requests\ProveedorStoreRequest;
use App\RatingProveedor;

class ProveedoresController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        $proveedor = new Proveedor();
        $categoria = new CategoriaProveedor();

        $proveedores = $proveedor->getAllPaginate($request);

        $categorias  = $categoria->getAll();

        $txtsearch   = $request->txtsearch;
        $categoriaSearch = $request->categoria;

        return view('proveedores.index',compact('proveedores','categorias','txtsearch','categoriaSearch'));
    }

    public function create()
    {
        $categoria  = new CategoriaProveedor();
        $proveedor  = new Proveedor();
        $categorias = $categoria->getAllPluck();
        return view('proveedores.create',compact('proveedor','categorias','categoria'));
    }

    public function store(ProveedorStoreRequest $request)
    {

        try {

            $proveedor = new Proveedor();

            $proveedor->proveedor          = $request->proveedor;
            $proveedor->slug               = $request->proveedor;
            $proveedor->idCategoria        = $request->idCategoria;
            $proveedor->telefono           = $request->telefono;
            $proveedor->pagina_web         = $request->pagina_web;
            $proveedor->correo_electronico = $request->correo_electronico;
            $proveedor->descripcion        = $request->descripcion;
            $proveedor->ciudad             = $request->ciudad;
            $proveedor->idUsuario          = Auth::user()->idUsuario;

            $proveedor->save();

            return redirect('/proveedores')->with('status_success','El proveedor se ha registrado correctamente');

        } catch (\Exception $e) {
            return back()->with('status_warning','Error al registrar el proveedor');
        }


    }

    public function show($URL)
    {
        $proveedor = new Proveedor();
        $comentario = new ComentarioProveedor();

        $proveedorDetail = $proveedor->getProveedor($URL)->first();

        $categoria    = CategoriaProveedor::findOrFail($proveedorDetail->idCategoria);
        $comentarios  = $comentario->getAllCommentsbyProveedorId($proveedorDetail->idProveedor);
        $proveedores  = $proveedor->getOtherProveedores($proveedorDetail->idProveedor);

        $calificacion = RatingProveedor::getCalificacionByIdUserAndIdProveedor(Auth::user()->idUsuario,$proveedorDetail->idProveedor);

        $calificacionUser = ($calificacion == null) ? 0 : $calificacion->calificacion;

        return view('proveedores.show',[
            'proveedor'=>$proveedorDetail,
            'categoria'=>$categoria,
            'comentarios'=>$comentarios,
            'proveedores'=>$proveedores,
            'calificacion'=>$calificacionUser
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($URL)
    {
        $categoria  = new CategoriaProveedor();

        $proveedor = Proveedor::findByURL($URL);
        $categorias = $categoria->getAllPluck();

        return view('proveedores.edit',compact('proveedor','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProveedorStoreRequest $request, $URL)
    {
        try {

            $proveedor                     = Proveedor::findByURL($URL);

            $proveedor->proveedor          = $request->proveedor;
            $proveedor->slug               = $request->proveedor;
            $proveedor->idCategoria        = $request->idCategoria;
            $proveedor->telefono           = $request->telefono;
            $proveedor->pagina_web         = $request->pagina_web;
            $proveedor->correo_electronico = $request->correo_electronico;
            $proveedor->descripcion        = $request->descripcion;
            $proveedor->ciudad             = $request->ciudad;
            $proveedor->idUsuario          = Auth::user()->idUsuario;

            $proveedor->save();

            return redirect('/proveedores')->with('status_success','El proveedor se ha actualizado correctamente');

        } catch (\Exception $e) {
            return back()->with('status_warning','Error al actualizar el proveedor');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
