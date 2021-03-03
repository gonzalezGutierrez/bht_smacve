@extends('layouts.template_01')

@section('title','Contenido Científico')

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
                        @if(!empty($categoriaSelecionadaName))
                            <li><a href="javascript:void(0)">{{$categoriaSelecionadaName}}</a></li>
                        @endif

                    </ul>
                </div>
            </div>

        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 order-lg-1 order-md-2 padding-30px-right xs-padding-15px-right sm-margin-30px-top">
                    <div class="side-bar">
                        <div class="widget search">
                            <form method="GET" role="search" action="{{asset('educacion_medica/buscar')}}">
                                <input type="search" id="txtbuscar" name="txtbuscar"  placeholder="Buscar ..." value="{{$txtbuscar}}">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>

                            <small class="total_registros">{{$post->total()}} Registros Encontrados</small>
                        </div>
                        <div class="widget">
                            <div class="widget-title">
                                <h6>Contenido Reciente</h6>
                            </div>
                            <ul>
                                @foreach($postRecientes as $reciente)
                                    <li><a href="{{asset('educacion_medica/'.$reciente->nameURL.'/post/'.$reciente->idPost)}}">{{$reciente->titulo}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget">
                            <div class="widget-title">
                                <h6>Categorías</h6>
                            </div>
                            <ul>
                                @foreach($categorias as $cat)
                                    <li><a id="btn_{{$cat->nameURL}}"  href="{{asset('educacion_medica/'.$cat->nameURL)}}">{{$cat->categoriaPost}}</a></li>
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
                <div class="col-lg-9 col-md-12 order-lg-2 order-md-1">
                    @if (session('warning'))
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {!! session('warning')  !!}
                        </div>
                    @endif


                    <div class="blog-list">
                        <?php
                        $mesesArray       = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
                        ?>

                        @if(count($post) > 0)
                            @foreach($post as $item)
                                <div class=blog-list-simple>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-12 sm-margin-20px-bottom">
                                            <div class=blog-list-simple-img>
                                                <img alt="{{$item->titulo}}" src="{{asset('images/educacion_medica/thumb_post/'.$item->thumb)}}" title="{{$item->titulo}}">
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-sm-12">
                                            <div class="blog-list-simple-text">
                                                <span class="category">{{$item->categoriaPost}}</span>
                                                @if($item->premium == 1)
                                                    <span class="badge badge-warning">Solo Miembros</span>
                                                @endif
                                                <h4>{{$item->titulo}}</h4>
                                                <ul class="meta">
                                                    <li>
                                                        <a href="javascript:void(0);">
                                                            <i class="fas fa-user-tie" aria-hidden="true"></i>  {{$item->autor}}
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <?php
                                                        $numMes           = intval(date('n', strtotime($item->fechaPublicacion))) - 1;
                                                        $fechaPublicacion = date('d ', strtotime($item->fechaPublicacion)).$mesesArray[$numMes].date(' Y', strtotime($item->fechaPublicacion));
                                                        ?>
                                                        <a href="javascript:void(0);">
                                                            <i class="fas fa-calendar-alt" aria-hidden="true"></i> {{$fechaPublicacion}}
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">
                                                            <i class="fas fa-folder-open" aria-hidden="true"></i> {{ $item->numVisitas }} VECES VISTO
                                                        </a>
                                                    </li>
                                                </ul>
                                                <p>{{$item->descripcion}}</p>
                                                <div class="text-left margin-10px-top">
                                                    <a href="{{asset('educacion_medica/'.$item->nameURL.'/post/'.$item->idPost)}}" class="butn small"><span>Leer más</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h5 class="my-5 text-center">No se ha encontrado contenido</h5>
                        @endif
                    </div>
                    <div style="margin-bottom: 100px; margin-top: 70px;">

                        {!! $post->appends(['txtbuscar' => $txtbuscar])->links()!!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <input type="hidden" id="seccion_smacve" value="#btn-educacion_medica" />
    <input type="hidden" id="categoria_educacion_medica" value="#btn_{{$categoriaSelecionada}}" />

@endsection


@section('javascript')
    <script src="{{ asset('js/educacion_medica/educacion_medica.js') }}"></script>
@endsection