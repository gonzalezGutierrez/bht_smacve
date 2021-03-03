@extends('layouts.template_01')

@section('title','Sede')

@section('content')

    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="{{asset('images/bg/bg_merida_2020.jpg')}}">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Sede del Evento</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="{{asset('/')}}">Inicio</a></li>
                        <li><a href="javascript:void(0)">Merida 2020</a></li>
                        <li><a href="javascript:void(0)">Sede del Evento</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-sm-12 padding-50px-right md-padding-30px-right sm-padding-15px-right">
                    <h6 class="font-weight-700 font-size16 sm-font-size14 text-uppercase left-title margin-20px-bottom">MERIDA 2020</h6>
                    <div class="single-sidebar-menu">
                        <ul class="no-margin">
                            <li><a href="{{asset('merida_2020/costo_inscripcion')}}">Costo de Inscripción</a></li>
                            <li class="active"><a href="{{asset('merida_2020/sede')}}">Sede del Evento</a></li>
                            <li><a href="{{asset('merida_2020/programa')}}">Programa Académico</a></li>
                            <li><a href="{{asset('merida_2020/profesores')}}">Profesores</a></li>
                            <li><a href="{{asset('merida_2020/registro_online')}}">Registro Online</a></li>
                            <li><a href="{{asset('pdf/convocatoria_trabajos_libres_2020.pdf')}}">Convocatoria Trabajos Libres</a></li>
                        <!--
                            <li><a href="{{asset('merida_2020/hoteles')}}">Hoteles Sub Sede</a></li>
                         -->
                        </ul>
                    </div>
                    <div class="bg-img cover-background theme-overlay border-radius-5 margin-30px-bottom sm-margin-25px-bottom" data-overlay-dark="8" data-background="{{asset('images/bg/bg2.jpg')}}" >
                        <div class="position-relative z-index-9 text-center padding-50px-tb md-padding-40px-tb sm-padding-30px-tb padding-30px-lr">
                            <i class="fas fa-headset font-size50 md-font-size46 sm-font-size42 text-white margin-15px-bottom"></i>
                            <h5 class="text-white font-weight-600 margin-5px-bottom">¿Tienes alguna duda?</h5>
                            <p class="text-white font-weight-500">¡Contáctanos!</p>
                            <div class="bg-white separator-line-horrizontal-full opacity3 margin-20px-bottom sm-margin-15px-bottom"></div>
                            <ul class="text-center no-padding no-margin">
                                <li class="text-white margin-5px-bottom"><i class="fa fa-phone font-size16 text-white margin-15px-right"></i><a href="tel:015526147849 " class="text-white">01 55 2614 7849</a></li>
                                <li class="text-white"><i class="fa fa-envelope-open font-size16 text-white margin-15px-right"></i><a href="mailto:mail@example.com" class="text-white">atencionalsocio@smacve.org.mx</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 col-sm-12">
                    <div class="section-heading left">
                        <h4>Sede del Evento</h4>
                    </div>

                    <div class="veracruz_2019">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">

                                <div id="carouselWTC" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselWTC" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselWTC" data-slide-to="1"></li>
                                        <li data-target="#carouselWTC" data-slide-to="2"></li>
                                        <li data-target="#carouselWTC" data-slide-to="3"></li>
                                        <li data-target="#carouselWTC" data-slide-to="4"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="{{asset('images/merida_2020/fiesta_americana/fa_01.jpg')}}" class="d-block w-100" alt="World Trade Center">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{asset('images/merida_2020/fiesta_americana/fa_02.jpg')}}" class="d-block w-100" alt="World Trade Center">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{asset('images/merida_2020/fiesta_americana/fa_03.jpg')}}" class="d-block w-100" alt="World Trade Center">
                                        </div>

                                    </div>
                                    <a class="carousel-control-prev" href="#carouselWTC" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselWTC" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>

                                <div class="title">
                                    <span>MERIDA</span>
                                    <h4>Hotel Fiesta Americana Merida</h4>
                                </div>
                                <p class="text-justify">
                                    El mejor hotel de todo Yucatán, enmarcado por el bello Paseo de Montejo, te consiente con una estancia placentera. Su arquitectura señorial con gran influencia francesa crea un ambiente acogedor que invita a disfrutar de la cálida hospitalidad mexicana. Una increíble ubicación donde podrás conocer hermosas construcciones coloniales.
                                </p>
                                <p class="special">En Fiesta Americana nuestro compromiso es cuidar hasta el mínimo detalle para hacer de tu evento en un éxito</p>

                                <p class="text-justify">Este exclusivo hotel se encuentra a 13 minutos a pie del museo del Palacio Cantón y a 2 km de la catedral de Mérida.</p>

                                <p class="text-justify">Las habitaciones son sofisticadas y disponen de Wi‑Fi gratis, televisión de pantalla plana, caja fuerte y minibar. Las habitaciones Club incluyen acceso a una sala donde se sirven bebidas de bienvenida y desayuno continental gratuitos. Las suites son elegantes y cuentan con sala de estar independiente. Las suites superiores tienen bañera de hidromasaje, terraza, balcón o cocina. Hay servicio de habitaciones las 24 horas.</p>
                                <p class="text-justify">El aparcamiento es gratuito. También cuenta con un restaurante informal, un bar acogedor y una piscina exterior, además de una zona de juego para niños, un spa y un gimnasio.</p>

                                <h5>Ubicación</h5>
                                <address>
                                    <strong>Paseo Montejo No. 451, esq, Av. Colon, Centro, 97000</strong><br>
                                     Mérida, Yucatán<br>
                                    <abbr title="Telefono">Tel:</abbr> 999 942 1111<br/>
                                </address>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <input type="hidden" id="seccion_smacve" value="#btn-eventos" />

@endsection


@section('javascript')

@endsection