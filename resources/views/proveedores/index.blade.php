@extends('layouts.template_01')
@section('title','Proveedores')

@section('css')
    <style media="screen">

        .active {
            color:#967D3D !important;
        }

    </style>
@stop

@section('content')


    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="{{asset('images/bg/educacion_medica.jpg')}}">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Contenido Científico</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="{{asset('/')}}">Inicio</a></li>
                        <li><a href="{{asset('educacion_medica')}}">Contenido Científico</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 order-lg-1 order-md-2 padding-30px-right xs-padding-15px-right sm-margin-30px-top">
                    <div class="side-bar">
                        <div class="widget search">
                            <form method="GET" role="search" action="{{asset('proveedores/')}}">
                                <input type="search" id="txtbuscar" name="txtsearch"  placeholder="Buscar ..." value="{{$txtsearch}}">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>

                            <small class="total_registros badge badge-secondary"> {{$proveedores->count()}} proveedores Encontrados</small>
                        </div>
                        <a href="{{asset('proveedores/create')}}" class="btn btn-dark btn-sm">Registra un nuevo proveedor</a> <hr>
                        <div class="widget">
                            <div class="widget-title">
                                <h6>Categorías</h6>
                            </div>
                            <ul class="categorias">
                                @foreach($categorias as $categoria)
                                    <li class=""> <a class="text-uppercase {{$categoria->idCategoria == $categoriaSearch ? 'active' : '' }}" href="{{asset("proveedores?txtsearch=".$txtsearch."&categoria=".$categoria->idCategoria)}}">{{$categoria->categoria}}</a> </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget">
                            <div class="widget-title">
                                <h6>Siguenos</h6>
                            </div>
                            <ul class="social-listing">
                                <li><a href="https://www.facebook.com/pg/smacve.oficial/"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://twitter.com/smacve_oficial"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="https://www.youtube.com/channel/UCz9_5YUxOa1i0uTG3sQgwJQ"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 order-lg-2 order-md-1">
                    @forelse($proveedores as $proveedor)
                    <div class="blog-list">
                        <div class=blog-list-simple>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="blog-list-simple-text">
                                        <span class="category">{{$proveedor->category}}</span>
                                        <h4>{{$proveedor->proveedor}}</h4>
                                        <ul class="meta">
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <i class="fas fa-phone" aria-hidden="true"></i>  {{$proveedor->proveedorPhone}}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <i class="fas fa-envelope" aria-hidden="true"></i> {{$proveedor->proveedorEmail}}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);"  style="font-size:14px;">
                                                    <i class="fas fa-star" style="font-size:14px;" aria-hidden="true"></i>5
                                                </a>
                                            </li>
                                        </ul>
                                        <p>{{$proveedor->descripcion}}</p>
                                        <div class="text-left margin-10px-top">
                                            <a href="{{asset('proveedores/'.$proveedor->proveedorURL)}}" class="butn small"><span>Detalle <i class="fas fa-chevron-right    "></i> </span></a>
                                            @if(Auth::user()->idUsuario == $proveedor->idUsuario)
                                                <a href="{{asset('proveedores/'.$proveedor->proveedorURL.'/edit')}}" class="butn small"><span> <i class="fas fa-edit"></i> Actualizar</span></a>
                                            @endif
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <h4>Ningun registro encontrado...</h4>
                    @endforelse
                    <div style="margin-bottom: 100px; margin-top: 70px;">
                        {{$proveedores->appends(['txtsearch'=>$txtsearch])->links()}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <input type="hidden" id="seccion_smacve" value="#btn-educacion_medica" />


@stop
