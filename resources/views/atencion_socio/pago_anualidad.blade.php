@extends('layouts.template_01')

@section('title','Pago de Anualidad')

@section('content')

    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="{{asset('images/bg/bg_atencion_socio.jpg')}}">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Pago de Anualidad</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="{{asset('/')}}">Inicio</a></li>
                        <li><a href="javascript:void(0)">Atención al Socio</a></li>
                        <li><a href="javascript:void(0)">Pago de Anualidad</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-sm-12 padding-50px-right md-padding-30px-right sm-padding-15px-right">
                    <h6 class="font-weight-700 font-size16 sm-font-size14 text-uppercase left-title margin-20px-bottom">ATENCIÓN AL SOCIO</h6>
                    <div class="single-sidebar-menu">
                        <ul class="no-margin">
                            <li><a href="{{asset('atencion_socio/guias_clinicas')}}">Guías Clínicas</a></li>
                            <li><a href="{{asset('atencion_socio/estatutos')}}">Estatutos</a></li>
                            <li class="active"><a href="{{asset('atencion_socio/pago_anualidad')}}">Pago de Anualidad</a></li>
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
                    <div class="section-heading">
                        <h3>Anualidad 2021</h3>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-12 sm-margin-20px-bottom">
                            <div class="anualidad-box">
                                <img src="{{asset('images/atencion_socio/actualiza_status.jpg')}}" class="img_fluid" />
                                <h4>#TodosSomosSMACVE</h4>
                                <p>
                                    Actualiza tu estatus y obtén grandes beneficios como socio <strong>#SMACVE</strong>, participa en las sesiones académicas de actualización en línea para socios activos, asiste a los distintos congresos regionales que se llevarán a cabo en todo el país.
                                </p>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 sm-margin-20px-bottom">
                            <div class="pricing-list highlight">
                                <i class="fas fa-money-bill-alt"></i>
                                <div class="text-center margin-15px-bottom">
                                    <h4 class="text-white">CUOTA 2021</h4>
                                </div>
                                <div class="pricing-list-price">
                                    <h2 class="text-white"><sup class="text-white">$</sup>3,600.00</h2><span class="text-white">MN</span>
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
                    </div>
                </div>

            </div>
        </div>
    </section>


    <input type="hidden" id="seccion_smacve" value="#btn-atencion-al-socio" />

@endsection


@section('javascript')

@endsection
