@extends('layouts.template_01')

@section('title','Inicio')

@section('metas-facebook')
    @include('includes.metas')
@endsection


@section('css')
    <link href="{{asset('libraries/layerslider-6.8.4/css/layerslider.css')}}" rel="stylesheet" type="text/css"/>
    <style>
        .butn.theme:hover {
            color:rgba(0,0,0,0.2) !important;
        }
    </style>
@endsection

@section('content')

    <div id="layerslider" style="width:100%;height:700px;margin:0 auto;">

        <div class="ls-slide" data-ls="duration:10000; transition2d:2; timeshift:-200; kenburnsscale:1.2;">
            <img  src="{{asset('images/layerslider/convocatoria_trabajos/bg.jpg')}}" class="ls-bg" alt="" />
            <p style="top:140px; left:50%; font-family:'Montserrat', sans-serif; font-size:60px; color:#967d3d; font-weight:900;" class="ls-l" data-ls="offsetxin:100%; durationin:1500; delayin:400; easingin:easeOutQuint; clipin:0 0 0 100%; offsetxout:-100%; durationout:500; clipout:0 0 0 100%; parallaxlevel:0;">¡Estamos buscándote!</p>
            <p style="top:240px; left:50%; font-family:'Montserrat', sans-serif; font-size:25px; color:#000; font-weight:600; " class="ls-l" data-ls="offsetxin:100%; durationin:1500; delayin:1000; easingin:easeOutQuint; clipin:0 0 0 100%; offsetxout:-100%; durationout:500; clipout:0 0 0 100%; parallaxlevel:0;"><strong>¡SMACVE te necesita!</strong> ¡A ti, a tu experiencia y conocimientos!</p>
            <p style="top:280px; left:50%; width: 800px; font-family:'Open Sans', sans-serif; font-size:20px; text-align: center; color:#000; font-weight:400; white-space: normal; " class="ls-l" data-ls="offsetxin:100%; durationin:1500; delayin:1500; easingin:easeOutQuint; clipin:0 0 0 100%; offsetxout:-100%; durationout:500; clipout:0 0 0 100%; parallaxlevel:0;">
                la Sociedad Mexicana de Angiología, Cirugía Vascular y Endovascular convoca a los especialistas de nuestra comunidad que estén interesados en participar con sus trabajos y experiencia, a que envíen resúmenes para trabajos de ingreso, libres, poster y videos en ocasión de nuestro Congreso Anual 2021, el cual se llevará a cabo del 26 al 31 de octubre en la Ciudad de México.
            </p>

            <a class="ls-layer" href="https://smacve.org.mx/requisitos_2021/convocatoria"
               style="top:460px;left:50%; line-height: normal; padding: 15px 30px; font-family: 'Poppins', sans-serif;font-size: 20px; font-weight: 700; width: 270px; text-align: center;  color:#FFF; background-color:#967d3d;"
               data-ls="offsetyin:-500;durationin:4000;easingin:easeOutElastic;offsetyout:-400;durationout:1000;delayin:4000;">
                Ver Convocatoría
            </a>
        </div>

        <div class="ls-slide" data-ls="duration:10000; transition2d:2; timeshift:-200; kenburnsscale:1.2;">
            <img  src="{{asset('images/layerslider/comite_cirujanos_jovenes/bg.jpg')}}" class="ls-bg" alt="" />
            <p style="top:140px; left:50%; font-family:'Montserrat', sans-serif; font-size:20px; padding: 10px 20px; background-color:#c78906;  color:#FFF; font-weight:900;" class="ls-l" data-ls="offsetxin:100%; durationin:1500; delayin:400; easingin:easeOutQuint; clipin:0 0 0 100%; offsetxout:-100%; durationout:500; clipout:0 0 0 100%; parallaxlevel:0;">SMACVE INVITA A :</p>
            <p style="top:210px; left:50%; font-family:'Montserrat', sans-serif; font-size:60px; color:#01165d; font-weight:900;" class="ls-l" data-ls="offsetxin:100%; durationin:1500; delayin:400; easingin:easeOutQuint; clipin:0 0 0 100%; offsetxout:-100%; durationout:500; clipout:0 0 0 100%; parallaxlevel:0;">CIRUJANOS VASCULARES JOVENES</p>
            <p style="top:290px; left:50%; font-family:'Montserrat', sans-serif; font-size:25px; color:#000; font-weight:600; " class="ls-l" data-ls="offsetxin:100%; durationin:1500; delayin:1000; easingin:easeOutQuint; clipin:0 0 0 100%; offsetxout:-100%; durationout:500; clipout:0 0 0 100%; parallaxlevel:0;"><strong>¡SMACVE te necesita!</strong> ¡Los necesitamos, de ustedes depende construir la sociedad del futuro!</p>
            <p style="top:350px; left:50%; width: 600px; font-family:'Open Sans', sans-serif; font-size:20px; text-align: center; color:#01165d; font-weight:400; white-space: normal; " class="ls-l" data-ls="offsetxin:100%; durationin:1500; delayin:1500; easingin:easeOutQuint; clipin:0 0 0 100%; offsetxout:-100%; durationout:500; clipout:0 0 0 100%; parallaxlevel:0;">
                Participa en los proyecto SMACVE integrate y acercate a la sociedad, con el fin de incorporar a la práctica diaria las técnicas qirúrgicas y el conocimiento científico
                más novedoso, y que éstos lleguen a todos los estados de la República Mexicana.
            </p>

            <a class="ls-layer" href="https://smacve.org.mx/educacion_medica/comision_cirujanos_vasculares_jovenes"
               style="top:525px;left:50%; line-height: normal; padding: 15px 30px; font-family: 'Poppins', sans-serif;font-size: 20px; font-weight: 700; width: 270px; text-align: center;  color:#FFF; background-color:#01165d;"
               data-ls="offsetyin:-500;durationin:4000;easingin:easeOutElastic;offsetyout:-400;durationout:1000;delayin:2000;">
                Más Información
            </a>

        </div>

        <div class="ls-slide" data-ls="duration:10000; transition2d:2; timeshift:-200; kenburnsscale:1.2;">
            <img  src="{{asset('images/layerslider/gpc/bg.jpg')}}" class="ls-bg" alt="" />
            <p style="top:220px; left:50%; font-family:'Montserrat', sans-serif; font-size:60px; color:#2f1711; font-weight:900;" class="ls-l" data-ls="offsetxin:100%; durationin:1500; delayin:400; easingin:easeOutQuint; clipin:0 0 0 100%; offsetxout:-100%; durationout:500; clipout:0 0 0 100%; parallaxlevel:0;">Guías de práctica clínica</p>
            <p style="top:320px; left:50%; width: 600px; font-family:'Montserrat', sans-serif; font-size:25px; color:#000; font-weight:600; white-space: normal; text-align: center " class="ls-l" data-ls="offsetxin:100%; durationin:1500; delayin:1000; easingin:easeOutQuint; clipin:0 0 0 100%; offsetxout:-100%; durationout:500; clipout:0 0 0 100%; parallaxlevel:0;">En esta sección exclusiva para socios, puedes consultar hasta 150 Guías de Práctica Clínica (GPC).</p>

            <a class="ls-layer" href="https://smacve.org.mx/paginaweb/public/investigacion/comision_actualizacion_gpc/nacionales"
               style="top:440px;left:50%; line-height: normal; padding: 15px 30px; font-family: 'Poppins', sans-serif;font-size: 20px; font-weight: 700; width: 270px; text-align: center;  color:#2f1711; background-color:#FFF;"
               data-ls="offsetyin:-500;durationin:4000;easingin:easeOutElastic;offsetyout:-400;durationout:1000;delayin:4000;">
                CONSULTAR GPC
            </a>
        </div>

        <!--
        <div class="ls-slide" data-ls="duration:10000; transition2d:2; timeshift:-200; kenburnsscale:1.2;">
            <img  src="{{asset('images/layerslider/certificacion/bg_shadow.jpg')}}" class="ls-bg" alt="" />
            <p style="top:210px; left:50%; font-family:'Montserrat', sans-serif; font-size:60px; color:#FFF; font-weight:900;" class="ls-l" data-ls="offsetxin:100%; durationin:1500; delayin:400; easingin:easeOutQuint; clipin:0 0 0 100%; offsetxout:-100%; durationout:500; clipout:0 0 0 100%; parallaxlevel:0;">CERTIFICACIÓN ACADÉMICA</p>
            <p style="top:290px; left:50%; font-family:'Montserrat', sans-serif; font-size:25px; color:#FFF; font-weight:600; " class="ls-l" data-ls="offsetxin:100%; durationin:1500; delayin:1000; easingin:easeOutQuint; clipin:0 0 0 100%; offsetxout:-100%; durationout:500; clipout:0 0 0 100%; parallaxlevel:0;">La capacitación académica <strong>¡SI IMPORTA!</strong></p>
            <p style="top:330px; left:50%; width: 600px; font-family:'Open Sans', sans-serif; font-size:20px; text-align: center; color:#FFF; font-weight:400; white-space: normal; " class="ls-l" data-ls="offsetxin:100%; durationin:1500; delayin:1500; easingin:easeOutQuint; clipin:0 0 0 100%; offsetxout:-100%; durationout:500; clipout:0 0 0 100%; parallaxlevel:0;">Un médico especialista en Angiología, Cirugía Vascular y Endovascular debidamente acreditado tiene certificación de un gran respaldo académico.</p>
        </div>
        -->

        <!--
        <div class="ls-slide" data-ls="duration:10000; transition2d:2; timeshift:-200; kenburnsscale:1.2;">
            <img width="1920" height="700" src="{{asset('images/layerslider/participacion/participacion_bg_shadow.jpg')}}" class="ls-bg" alt="" />

            <p style="top:210px; left:100%; padding-right: 200px; font-family:'Montserrat', sans-serif; font-size:60px; text-align: right; color:#FFF; font-weight:900;" class="ls-l" data-ls="offsetxin:-100%; durationin:1000; delayin:300; easingin:easeOutQuint; clipin:0 0 0 100%; offsetxout:-100%; durationout:500; clipout:0 0 0 100%; parallaxlevel:0;">PARTICIPA ACADÉMICAMENTE</p>
            <p style="top:300px; left:100%; padding-right: 200px; width:600px; font-family:'Open Sans', sans-serif; font-size:20px; text-align: right; color:#FFF; font-weight:400; white-space: normal; " class="ls-l" data-ls="offsetxin:-100%; durationin:1000; delayin:800; easingin:easeOutQuint; clipin:0 0 0 100%; offsetxout:-100%; durationout:500; clipout:0 0 0 100%; parallaxlevel:0;">Nos encontramos trabajando arduamente en el desarrollo de congresos en diversas regiones de nuestro país para todos nuestros socios y especialistas afines.</p>
        </div>
        -->

    <!--

        <div class="ls-slide" data-ls="duration:10000; transition2d:2; timeshift:-200; kenburnsscale:1.2;">
            <img  src="{{asset('images/layerslider/congreso_regional_centro_2021/congreso_regional_1920x700.jpg')}}" class="ls-bg" alt="" />

            <a class="ls-layer" href="https://curso-cirugia.virtualtradecenter.com.mx/"
               style="top:600px;left:508px; line-height: normal; padding: 15px 30px; font-family: 'Poppins', sans-serif;font-size: 20px; font-weight: 700; width: 270px; text-align: center;  color:#3c0003; background-color:#ffffff;"
               data-ls="offsetyin:-500;durationin:4000;easingin:easeOutElastic;offsetyout:-400;durationout:1000;delayin:2000;">
                Regístrate
            </a>
        </div>

        -->
    </div>
    <section class="section-revistas">
        <div class="container">
            <div class="section-heading">
                <h1>Revista Mexicana de Angiología</h1>
            </div>
            <div class="owl-carousel owl-theme" id="revista-carousel">
                <div class="item item-revista">
                    <div class="card">
                        <div class="front">
                            <img class="owl-lazy" data-src="{{asset('images/portada_revistas/thumbs/48_03.jpg')}}" alt="Volumen 48, No. 03, Julio-Septiembre 2020">
                        </div>
                        <div class="back">
                            <div class="d-flex flex-row justify-content-center align-items-center h-100">
                                <div class="w-100 text-center p-4">
                                    <h5>Volumen 48 No. 3,<br/> Julio - Septiembre 2020</h5>
                                    <p>Artículos Covid - Artículos originales - Articulos de revisión</p>
                                    <a target="_blank" class="butn theme white-hover" href="https://www.rmangiologia.com/?indice=2020483#JournalContents"><span>Ver Revista</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="volumen">Volumen 48 No. 3,<br/> Julio - Septiembre 2020</h5>
                </div>
                <div class="item item-revista">
                    <div class="card">
                        <div class="front">
                            <img class="owl-lazy" data-src="{{asset('images/portada_revistas/thumbs/48_02.jpg')}}"  alt="Volumen 48, No. 02, Abril-Junio 2020">
                        </div>
                        <div class="back">
                            <div class="d-flex flex-row justify-content-center align-items-center h-100">
                                <div class="w-100 text-center p-4">
                                    <h5>Volumen 48 No. 2,<br/> Abril - Junio 2020</h5>
                                    <p>Artículos Covid - Artículos originales - Articulos de revisión - Caso Clínico y revisión a la literatura</p>
                                    <a target="_blank" class="butn theme white-hover" href="https://www.rmangiologia.com/?indice=2020482#JournalContents"><span>Ver Revista</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="volumen">Volumen 48 No. 2,<br/> Abril - Junio 2020</h5>
                </div>
                <div class="item item-revista">
                    <div class="card">
                        <div class="front">
                            <img class="owl-lazy" data-src="{{asset('images/portada_revistas/thumbs/48_01.jpg')}}"  alt="Volumen 48, No. 01, Enero-Marzo 2020">
                        </div>
                        <div class="back">
                            <div class="d-flex flex-row justify-content-center align-items-center h-100">
                                <div class="w-100 text-center p-4">
                                    <h5>Volumen 48 No. 1,<br/> Enero - Marzo 2020</h5>
                                    <p>Artículos originales - Articulos de revisión</p>
                                    <a target="_blank" class="butn theme white-hover" href="https://www.rmangiologia.com/?indice=2020481#JournalContents"><span>Ver Revista</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="volumen">Volumen 48 No. 1,<br/> Enero - Marzo 2020</h5>
                </div>
                <div class="item item-revista">
                    <div class="card">
                        <div class="front">
                            <img class="owl-lazy" data-src="{{asset('images/portada_revistas/thumbs/47_04.jpg')}}"  alt="Volumen 47, No. 04, Octubre-Diciembre 2019">
                        </div>
                        <div class="back">
                            <div class="d-flex flex-row justify-content-center align-items-center h-100">
                                <div class="w-100 text-center p-4">
                                    <h5>Volumen 47 No. 4,<br/> Octubre - Diciembre 2019</h5>
                                    <p>Artículos originales - Articulos de revisión</p>
                                    <a target="_blank" class="butn theme white-hover" href="https://www.rmangiologia.com/?indice=2019474#JournalContents"><span>Ver Revista</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="volumen">Volumen 47 No. 4,<br/> Octubre - Diciembre 2019</h5>
                </div>
                <div class="item item-revista">
                    <div class="card">
                        <div class="front">
                            <img class="owl-lazy" data-src="{{asset('images/portada_revistas/thumbs/47_03.jpg')}}"  alt="Volumen 47, No. 03, Julio-Septiembre 2019">
                        </div>
                        <div class="back">
                            <div class="d-flex flex-row justify-content-center align-items-center h-100">
                                <div class="w-100 text-center p-4">
                                    <h5>Volumen 47 No. 3,<br/> Julio - Septiembre 2019</h5>
                                    <p>Artículos originales</p>
                                    <a target="_blank" class="butn theme white-hover" href="https://www.rmangiologia.com/?indice=2019473#JournalContents"><span>Ver Revista</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="volumen">Volumen 47 No. 3,<br/> Julio - Septiembre 2019</h5>
                </div>
                <div class="item item-revista">
                    <div class="card">
                        <div class="front">
                            <img class="owl-lazy" data-src="{{asset('images/portada_revistas/thumbs/47_02.jpg')}}"  alt="Volumen 47, No. 02, Abril-Junio 2019">
                        </div>
                        <div class="back">
                            <div class="d-flex flex-row justify-content-center align-items-center h-100">
                                <div class="w-100 text-center p-4">
                                    <h5>Volumen 47 No. 2,<br/> Abril - Junio 2019</h5>
                                    <p>Artículos originales</p>
                                    <a target="_blank" class="butn theme white-hover" href="https://www.rmangiologia.com/?indice=2019472#JournalContents"><span>Ver Revista</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="volumen">Volumen 47 No. 2,<br/> Abril - Junio 2019</h5>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 sm-margin-30px-bottom">
                    <div class="section-heading title-style5 title-inicio left half">
                        <span>Bienvenido</span>
                        <h2 class="text-uppercase font-weight-600">Sociedad Mexicana de Angiología, Cirugía Vascular y Endovascular</h2>
                        <div class="square">
                            <span class="separator-left bg-theme"></span>
                            <span class="separator-right bg-theme"></span>
                        </div>
                    </div>
                    <p class="text-justify">La Sociedad Mexicana de Angiología, Cirugía Vascular y Endovascular es una asociación civil de médicos cirujanos especializados en angiología, cirugía vascular y endovascular; así mismo, de médicos cirujanos con otras especialidades que pueden considerarse como afines a la angiología, cirugía vascular y endovascular; y de aquellos que, con frecuencia en sus actividades y ejercicio profesional, encaminen sus esfuerzos a la investigación,el estudio o al tratamiento de las enfermedades vasculares, residentes en distintos lugares de la República Mexicana.</p>
                    <a href="{{asset('acerca_de/quienes_somos')}}" class="butn theme medium"><span>Saber Más</span></a>
                </div>
                <div class="col-lg-5 col-md-12 offset-lg-1">
                    <div class="boletin-content">
                        <div class="image" style="background-color: #FFF;">
                            <img src="{{asset('images/portada_boletines/boletin_sexta_edicion.jpg')}}" />
                        </div>
                        <div class="text">
                            <h4>Boletín SMACVE</h4>
                            <p>6ta Edición Digital del Boletín de la Sociedad Mexicana de Angiología, Cirugía Vascular y Endovascular A.C.</p>
                            <a target="_blank" href="{{asset('boletines/sexta_edicion')}}" class="butn small"><span>Leer Boletín</span></a>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div id="podcast-widget" class="owl-carousel owl-theme">
                        <div class="item">
                            <iframe src="https://open.spotify.com/embed-podcast/episode/6lgouPEcIgxyiqFCu0oYfZ" width="100%" height="auto" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                        </div>

                        <div class="item">
                            <iframe src="https://open.spotify.com/embed-podcast/episode/7wczL0gZk4W9UccgatPJdq" width="100%" height="auto" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                        </div>

                        <div class="item">
                            <iframe src="https://open.spotify.com/embed-podcast/episode/5d4b3IJRHh18HcMCzSetIT" width="100%" height="auto" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                        </div>

                        <div class="item">
                            <iframe src="https://open.spotify.com/embed-podcast/episode/0BzhLANOBGNO5wePFjz10H" width="100%" height="auto" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                        </div>

                        <!--
                        <div class="item">
                            <iframe src="https://open.spotify.com/embed-podcast/episode/61w1xPcfI0vm0zYstbhumD" width="100%" height="auto" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                        </div>

                        <div class="item">
                            <iframe src="https://open.spotify.com/embed-podcast/episode/5Cxe73Tu6xSEUHKO11JmyF" width="100%" height="auto" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                        </div>

                        <div class="item">
                            <iframe src="https://open.spotify.com/embed-podcast/episode/54fyfTbe7IqqCmCagpCezs" width="100%" height="auto" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                        </div>

                        <div class="item">
                            <iframe src="https://open.spotify.com/embed-podcast/episode/7xxQrEliDQvpKG9NEKl2yu" width="100%" height="auto" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                        </div>
                        <div class="item">
                            <iframe src="https://open.spotify.com/embed-podcast/episode/6FI0Ne0GHr4drSnVILOfDG" width="100%" height="auto" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                        </div>
                        <div class="item">
                            <iframe src="https://open.spotify.com/embed-podcast/episode/4mFHcK5FjXLdFCEJ4qPKkB" width="100%" height="auto" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                        </div>
                        -->
                    </div>
                    <!--
                    <div class="about-carousel margin-30px-top margin-100px-left sm-margin-50px-left xs-no-margin-left">
                        <div class="owl-carousel owl-theme">
                            <div class="item"><img src="{{asset('images/inicio/carousel/about-01.png')}}" alt="" /></div>
                            <div class="item"><img src="{{asset('images/inicio/carousel/about-02.png')}}" alt="" /></div>
                            <div class="item"><img src="{{asset('images/inicio/carousel/about-03.png')}}" alt="" /></div>
                            <div class="item"><img src="{{asset('images/inicio/carousel/about-04.png')}}" alt="" /></div>
                            <div class="item"><img src="{{asset('images/inicio/carousel/about-05.png')}}" alt="" /></div>
                            <div class="item"><img src="{{asset('images/inicio/carousel/about-06.png')}}" alt="" /></div>
                            <div class="item"><img src="{{asset('images/inicio/carousel/about-07.png')}}" alt="" /></div>
                            <div class="item"><img src="{{asset('images/inicio/carousel/about-08.png')}}" alt="" /></div>
                            <div class="item"><img src="{{asset('images/inicio/carousel/about-09.png')}}" alt="" /></div>
                            <div class="item"><img src="{{asset('images/inicio/carousel/about-10.png')}}" alt="" /></div>
                            <div class="item"><img src="{{asset('images/inicio/carousel/about-11.png')}}" alt="" /></div>
                        </div>
                    </div>
                    -->
                </div>
            </div>
        </div>
    </section>

    <div class="section-post">
        <div class="container">
            <div class="section-heading">
                <h1>Webinars y Conferencias</h1>
            </div>

            <div class="owl-carousel owl-theme" id="posts-carousel">
                @foreach($post as $item)
                    <div class="item post-block">
                        <img src="{{asset('images/educacion_medica/thumb_post/'.$item->thumb)}}"  alt="{{$item->titulo}}" class="float-left">
                        <div class="post-block-inner">
                            <a href="{{asset('educacion_medica/'.$item->nameURL.'/post/'.$item->idPost)}}">
                                {{$item->titulo}}
                            </a>
                        </div>
                        @if($item->premium == 1)
                            <span class="badge badge-warning">Solo Miembros</span>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <section class="parallax about-area" data-overlay-dark="8" data-background="{{asset('images/bg/bg3.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="about-text">
                        <div class="section-heading left white">
                            <h4>SMACVE 2021-2022</h4>
                        </div>
                        <div class="inner-content">
                            <h2><span>“estamos conscientes de que las principales expectativas anhelan mayores beneficios al ser miembro de esta sociedad." </span></h2>
                            <p>Nuestro compromiso va ligado a trabajar en ello, y a dar nuestro mayor esfuerzo para que eso suceda.</p>
                            <div class="bottom">
                                <div class="signature">
                                    <img alt="Signature" src="{{asset('images/firmas/firma_dr_hinojosa_white.png')}}">
                                </div>
                                <p class="thm-clr">Dr. Carlos Arturo Hinojosa Becerril<br/><small>Presidente 2021-2022</small></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="about-right-box">
                        <div class="twitter-content">
                            <div class="icon">
                                <i class="fab fa-twitter"></i>
                            </div>
                            <div id="twitter-widget" class="twitter-widget owl-carousel owl-theme">
                                @if(count($tweets))
                                    @foreach($tweets as $tweet)
                                        <div class="item">
                                            <h3>
                                                {!!  \Thujohn\Twitter\Facades\Twitter::linkify($tweet->text)  !!}
                                            </h3>
                                            <p>Publicado {!!  \Thujohn\Twitter\Facades\Twitter::ago($tweet->created_at)!!} de <a href="{{  \Thujohn\Twitter\Facades\Twitter::linkUser($tweet->user)  }}">@smacve_oficial</a></p>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="info-contacto">
                            <h1>Sociedad Mexicana de Angiología, Cirugía Vascular y Endovascular, A.C</h1>
                            <div class="links">
                                <ul class="fa-ul">
                                    <li><span class="fa-li" ><i class="fas fa-map-marker-alt"></i></span>Alfonso Reyes 161 Col. Condesa, Del. Cuaúhtemoc, Ciudad de México.</li>
                                    <li><span class="fa-li"><i class="fas fas fa-mobile-alt"></i></span>01 55 2614 7849</li>
                                    <li><span class="fa-li"><i class="fas fa-envelope"></i></span>atencionalsocio@smacve.org.mx</li>
                                    <li><span class="fa-li"><i class="fab fa-facebook-messenger"></i></span>@smacve.oficial</li>
                                    <li><span class="fa-li"><i class="fab fa-whatsapp"></i></span>+52 55 4489 2572</li>
                                    <li><span class="fa-li"><i class="fab fa-telegram"></i></span>+52 55 4489 2572</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="section-heading"><span class="badge">SMACVE</span>
                <h4>Información de Interés</h4>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-12 sm-margin-20px-bottom">
                    <div class="anualidad-box">
                        <img src="{{asset('images/atencion_socio/actualiza_status.jpg')}}" class="img_fluid" />
                        <h4>#TodosSomosSMACVE</h4>
                        <p>
                            Actualiza tu estatus y obtén grandes beneficios como socio <strong>#SMACVE</strong>, participa en las sesiones académicas de actualización en línea para socios activos, asiste a los distintos congresos regionales que se llevarán a cabo en todo el país.
                        </p>

                    </div>
                </div>
                <!--
                <div class="col-lg-4 col-md-12 sm-margin-20px-bottom">
                    <div class="pricing-list highlight">
                        <i class="fas fa-money-bill-alt"></i>
                        <div class="text-center margin-15px-bottom">
                            <h4 class="text-white">CUOTA 2019</h4>
                        </div>
                        <div class="pricing-list-price">
                            <h2 class="text-white"><sup class="text-white">$</sup>3,000.00</h2><span class="text-white">MN</span>
                        </div>
                        <ul>
                            <li class="text-white">Sociedad Mexicana de Angiología Cirugía Vascular y Endovascular, A.C.</li>
                            <li class="text-white"><strong>Banco:</strong> BBVA Bancomer</li>
                            <li class="text-white"><strong>Cuenta:</strong> 0482240564</li>
                            <li class="text-white"><strong>CLABE:</strong> 012180004822405645</li>
                        </ul>
                        <div class="space20"></div>
                        <div class="pricing-list-button"><a href="{{asset('contacto')}}">Contáctanos</a></div>
                    </div>
                </div>
                -->
                <div class="col-lg-4 col-md-12 sm-margin-20px-bottom">
                    <img src="{{asset('images/inicio/anual_veracruz_2020.jpg')}}" class="img-fluid" />
                </div>
                <div class="col-lg-4 col-md-12 sm-margin-20px-bottom">
                    <div class="fb-page" data-href="https://www.facebook.com/smacve.oficial/"
                         data-tabs="timeline"
                         data-height="550"
                         data-small-header="false"
                         data-adapt-container-width="true"
                         data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/smacve.oficial/" class="fb-xfbml-parse-ignore">
                            <a href="https://www.facebook.com/smacve.oficial/">Sociedad Mexicana de Angiología, Cirugía Vascular y Endovascular</a>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="parallax" data-overlay-dark="8" data-background="{{asset('images/bg/bg1.jpg')}}" >
        <div class="container text-center">
            <div class="section-heading half white">
                <h4>¿Estas buscando a un especialistas cerca de ti?</h4>
                <p>Un médico especialista en Angiología, Cirugía Vascular y Endovascular debidamente acreditado tiene certificación de un gran respaldo académico.</p>
                <p>En la #SMACVE garantizamos nuestro profesionalismo. </p>
            </div>
            <a href="{{asset('acerca_de/miembros')}}" class="butn theme white-hover"><span>Contactar</span></a>
        </div>
    </section>

    <section class="bg-grey" style="background: url('{{asset('images/bg/bg6.jpg')}}')">
        <div class="container">
            <div class="section-heading">
                <span class="badge">SMACVE</span>
                <h6>Congresos Regionales</h6>
                <p class="width-55 sm-width-75 xs-width-95">
                    Somos una sociedad en crecimiento que fomenta los valores de sus miembros, quienes se mantienen en constante actualización con acciones académicas frecuentes.
                    No dejes de participar en los seis congresos regionales, ubica el más cercano a ti.
                </p>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="services-block-two col-lg-6 col-md-6 margin-30px-bottom xs-margin-20px-bottom">
                            <div class="inner-box">
                                <div class="icon-box">
                                    <span class="icon-calendar"></span>
                                </div>
                                <h2>01</h2>
                                <h3><a  href="javascript:void(0);">Ciudad de México</a></h3>
                                <h4>11 de Febrero</h4>
                                <p></p>
                            </div>
                        </div>
                        <div class="services-block-two col-lg-6 col-md-6 margin-30px-bottom xs-margin-20px-bottom">
                            <div class="inner-box">
                                <div class="icon-box">
                                    <span class="icon-calendar"></span>
                                </div>
                                <h2>02</h2>
                                <h3><a  href="javascript:void(0);">Tuxtla Gutiérrez</a></h3>
                                <h4>23 y 24 de Abril</h4>
                                <p></p>
                            </div>
                        </div>
                        <div class="services-block-two col-lg-6 col-md-6 margin-30px-bottom xs-margin-20px-bottom">
                            <div class="inner-box active">
                                <div class="icon-box">
                                    <span class="icon-calendar"></span>
                                </div>
                                <h2>03</h2>
                                <h3><a  href="javascript:void(0);">Tijuana</a></h3>
                                <h4>28 y 29 de Mayo</h4>
                                <p></p>
                            </div>
                        </div>
                        <div class="services-block-two col-lg-6 col-md-6 sm-margin-30px-bottom xs-margin-20px-bottom">
                            <div class="inner-box">
                                <div class="icon-box">
                                    <span class="icon-calendar"></span>
                                </div>
                                <h2>04</h2>
                                <h3><a  href="javascript:void(0);">Oaxaca</a></h3>
                                <h4>18 y 19 de Junio</h4>
                                <p></p>
                            </div>
                        </div>
                        <div class="services-block-two col-lg-6 col-md-6 margin-30px-bottom">
                            <div class="inner-box">
                                <div class="icon-box">
                                    <span class="icon-calendar"></span>
                                </div>
                                <h2>05</h2>
                                <h3><a  href="javascript:void(0);">Morelia</a></h3>
                                <h4>09 y 10 de Julio</h4>
                                <p></p>
                            </div>
                        </div>
                        <div class="services-block-two col-lg-6 col-md-6 margin-30px-bottom">
                            <div class="inner-box">
                                <div class="icon-box">
                                    <span class="icon-calendar"></span>
                                </div>
                                <h2>06</h2>
                                <h3><a  href="javascript:void(0);">Chihuahua</a></h3>
                                <h4>06 y 07 de Agosto</h4>
                                <p></p>
                            </div>
                        </div>

                        <div class="services-block-two col-lg-6 col-md-6 margin-30px-bottom">
                            <div class="inner-box">
                                <div class="icon-box">
                                    <span class="icon-calendar"></span>
                                </div>
                                <h2>07</h2>
                                <h3><a  href="javascript:void(0);">Tampico</a></h3>
                                <h4>24 y 25 de Septiembre</h4>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="owl-carousel owl-theme"  id="regional-carousel">
                        <div class="item"><img src="{{asset('images/regionales/2021/02_congreso_regional.jpeg')}}" alt="Ciudad de México" /></div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('includes.clientes_carousel')

    <input type="hidden" id="seccion_smacve" value="#btn-inicio" />
@endsection


@section('modal')

    <!--

    <div id="streamingModal" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="background-color: #5b2300;">
                <div class="modal-body">
                    <img src="{{asset('images/inicio/fleboestetica_kikuchi.jpg')}}" class="img-fluid" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
                    <a href="https://us02web.zoom.us/webinar/register/WN_tM0qpH_wQR2l7Il75j8IiQ" class="btn btn-warning">Regístrate aquí</a>
                </div>
            </div>
        </div>
    </div>

    -->


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
    <!-- Your customer chat code -->
    <div class="fb-customerchat"
         attribution=setup_tool
         page_id="1390379887710698"
         theme_color="#d0ad55"
         logged_in_greeting="¡Hola!, ¿Podemos ayudarte?"
         logged_out_greeting="¡Hola!, ¿Podemos ayudarte?">
    </div>

@endsection

@section('javascript')
    <script type="text/javascript" src="{{asset('libraries/layerslider-6.8.4/js/greensock.js')}}"></script>
    <script type="text/javascript" src="{{asset('libraries/layerslider-6.8.4/js/layerslider.transitions.js')}}"></script>
    <script type="text/javascript" src="{{asset('libraries/layerslider-6.8.4/js/layerslider.kreaturamedia.jquery.js')}}"></script>

    <script src="{{asset('js/inicio.js?v='.time())}}" type="text/javascript"></script>

@endsection