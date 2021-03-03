<?php
$mesesArray       = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
$numMes           = intval(date('n', strtotime($post->fechaPublicacion))) - 1;
$fechaPublicacion = date('d ', strtotime($post->fechaPublicacion)).$mesesArray[$numMes].date(' Y', strtotime($post->fechaPublicacion));

?>

@extends('layouts.template_01')

@section('title','Contenido Científico')

@section('metas-facebook')
    <meta property="og:site_name" content="SMACVE">
    <meta property="og:url" content="{{asset('educacion_medica/'.$post->nameURL.'/post/'.$post->idPost)}}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{$post->titulo}}">
    <meta property="og:description" content="{{$post->descripcion}}">
    <meta property="og:image" content="{{asset('images/educacion_medica/thumb_post/'.$post->thumb) }}">
@endsection

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
                        <li><a href="{{asset('educacion_medica/'.$post->nameURL)}}" style="text-transform: lowercase;">{{$post->categoriaPost}}</a></li>
                        <li><a href="javascript:void(0)">{{$post->titulo}}</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>
    <section class="blogs">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 padding-30px-right xs-padding-15px-right sm-margin-30px-bottom">
                    <div class="posts">
                        <div class="post">
                            @if($post->idTipoPost == 2)
                                <div class="embed-video">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$post->videos}}?rel=0&showinfo=0&autoplay=0&modestbranding=1&color=white&iv_load_policy=3" frameborder="0" ></iframe>
                                    </div>
                                </div>
                            @elseif($post->idTipoPost == 3)
                                <iframe src="{{asset('libraries/pdfjs-1.4.20/web/viewer.html?file=')}}{{asset('pdf_revistas/'.$post->files)}}" style="width:100%; height:950px;" frameborder="0"></iframe>
                            @elseif($post->idTipoPost == 4)
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe src="https://player.vimeo.com/video/{{$post->videos}}"  frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                                </div>
                            @else
                                <div class="post-img">
                                    <a href="javascript:void(0);" class="width-100">
                                        <img src="{{asset('images/educacion_medica/thumb_post/'.$post->images) }}" alt="{{$post->titulo}}">
                                    </a>
                                </div>
                            @endif

                            <div class="content">
                                <div class="post-title">
                                    <h5>{{$post->titulo}}</h5>
                                </div>
                                <div class="post-meta">
                                    <ul class="meta">
                                        <li>
                                            <a href="javascript:void(0);">
                                                <i class="fas fa-user-tie" aria-hidden="true"></i>  {{$post->autor}}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <i class="fas fa-certificate" aria-hidden="true"></i> {{$post->categoriaPost}}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <i class="fas fa-calendar-alt" aria-hidden="true"></i> {{$fechaPublicacion}}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <i class="fas fa-folder-open" aria-hidden="true"></i> {{ $post->numVisitas }} VECES VISTO
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="post-cont">
                                    <p class="special">{{$post->descripcion}}</p>
                                    {!! $post->contenido !!}

                                </div>

                                <h5 class="mt-3"> <i class="fa fa-download"></i> Documentos de apoyo</h5>

                                @foreach($archivosAdjuntos as $archivo)

                                    <span class="font-weight-bold">{{$archivo->nombreArchivo}}</span> <br>

                                    <a href="{{$archivo->urlArchivoAdjunto}}" class=" p-2 badge badge-primary font-14 "><i class="fa fa-download"></i> Descargar Archivo</a> <br>
                                    <hr>
                                @endforeach

                                <div class="share-post">
                                    <span>Compartir Post</span>
                                    <div class="plugins">
                                        <div class="fb-like" data-href="{{ asset('educacion_medica/'.$post->nameURL.'/post/'.$post->idPost) }}" data-layout="button_count" data-action="recommend" data-size="large" data-show-faces="false" data-share="true"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comments-area">
                            <div class="title-g mb-50">
                                <h3>Comentarios</h3>
                            </div>
                            <div class="fb-comments" data-href="{{asset('educacion_medica/'.$post->nameURL.'/post/'.$post->idPost)}}" data-numposts="5" data-colorscheme="light" data-mobile="Auto-detected" data-width="100%"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="side-bar">
                        @if($post->idTipoPost === 4)
                            <div style="padding: 0 10px; margin-bottom: 30px;">
                                <iframe src="https://vimeo.com/live-chat/418271154/cdf9dcf7e8" width="100%" height="500" frameborder="0"></iframe>
                            </div>

                        @else
                            @if(Auth::check())
                                <div id="chat-streaming">
                                    <h1 class="greeting">Hola, <span id="username">{{Auth::user()->nombre}} {{Auth::user()->apellidoPaterno}}</span></h1>
                                    <div id="chat-window" class="chat-window">
                                        <div class="comentario">
                                            <div class="text">Aún no hay Comentarios</div>
                                        </div>
                                    </div>
                                    <div class="footer-chat">
                                        <input type="hidden" id="idUsuario" value="{{Auth::user()->idUsuario}}" />
                                        <input type="hidden" id="idPost" value="{{$post->idPost}}" />
                                        <input type="hidden" id="idMessage" value="0" />
                                        <div class="input-group">
                                            <input type="text" id="message" class="form-control" placeholder="Escribe aqui" aria-label="Escribe aqui" aria-describedby="btn-send">
                                            <div class="input-group-append">
                                                <button class="btn btn-dark" type="button" id="btn-send"><i class="fas fa-paper-plane"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif


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
                                <li><a href="{{asset('educacion_medica/'.$cat->nameURL)}}">{{$cat->categoriaPost}}</a></li>
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
            </div>
        </div>
    </section>

    <input type="hidden" id="idTipoPost" value="{{$post->idTipoPost}}" />
    <input type="hidden" id="seccion_smacve" value="#btn-educacion_medica" />


@endsection

@section('modal')


    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml            : true,
                version          : 'v3.2'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

@endsection

@section('javascript')
    <script src="{{ asset('js/educacion_medica/educacion_medica_show.js?v='.time()) }}"></script>
@endsection