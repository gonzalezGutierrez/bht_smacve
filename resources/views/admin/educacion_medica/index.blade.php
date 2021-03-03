@extends('layouts.template_00')

@section('css')

@endsection

@section('content')

    <section class="header-page mb-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent">
                            <li class="breadcrumb-item"><a href="{{asset('inicio')}}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{asset('admin')}}">Administración</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Post</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row" id="search">
            <div class="col-sm-10 col-xs-9">
                <form method="GET" role="search" action="{{asset('admin/educacion_medica')}}">
                    <div class="input-group input-group-lg mb-3">
                        <input  id="txtbuscar" name="txtbuscar"  type="text" class="form-control" placeholder="Buscar" aria-label="Buscar" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-dark" type="submit" id="button-addon2">Buscar</button>
                        </div>
                    </div>
                    <small>{{$post->total()}} Registros Encontrados</small>
                </form>
            </div>
            <div class="col-sm-2 col-xs-3 text-left">
                <a href="{{asset('admin/educacion_medica/create')}}" class="btn btn-dark btn-lg" data-toggle="tooltip" data-placement="top" title="Nuevo Post">
                    <i class="fa fa-plus" aria-hidden="true"></i> Nuevo
                </a>
            </div>
        </div>
        <div class="space50"></div>
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col" style="width: 250px;">Titulo</th>
                            <th scope="col">Fecha Publicación</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Autor</th>
                            <th scope="col" class="text-center">Premium</th>
                            <th scope="col" class="text-center">Visible</th>
                            <th scope="col" class="text-center">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($post)>0)
                            @foreach ($post as $item)
                                <tr>
                                    <td>{{$item->idPost}}</td>
                                    <td style="width: 250px;">{{$item->titulo}}</td>
                                    <td>{{date('d/m/Y H:i:s',strtotime($item->fechaPublicacion))}}</td>
                                    <td>{{$item->categoriaPost}}</td>
                                    <td>{{$item->autor}}</td>
                                    <td class="text-center">
                                        @if($item->premium == 1)
                                            <span class="badge  badge-success">SI</span>
                                        @else
                                            <span class="badge  badge-secondary">NO</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($item->visible == 1)
                                            <span class="badge  badge-success">SI</span>
                                        @else
                                            <span class="badge  badge-light">NO</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{asset('admin/educacion_medica/'.$item->idPost.'/edit')}}" class="btn btn-link" data-toggle="tooltip" data-placement="top" title="Editar">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        {!! Form::open(['url'=>'admin/educacion_medica/'.$item->idPost,'method' => 'DELETE','class'=>'formDeleteEvento','style'=>'display:inline']) !!}
                                        <button type="button" class="btn btn-link btnDelete" title="Eliminar">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="text-center"> No hay Posts Registrados</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row" style="margin-bottom:70px">
            <div class="col-sm-12 text-right">
                {!! $post->appends(['txtbuscar' => $txtbuscar])->render()!!}
            </div>
        </div>
    </div>

@endsection

@section('javascript')
    <script src="{{ asset('js/admin/educacion_medica/educacion_medica_index.js') }}"></script>
@endsection