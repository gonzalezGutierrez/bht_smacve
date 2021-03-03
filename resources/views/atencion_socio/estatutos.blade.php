@extends('layouts.template_01')

@section('title','Estatutos')

@section('content')

    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="{{asset('images/bg/bg_atencion_socio.jpg')}}">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Estatutos</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="{{asset('/')}}">Inicio</a></li>
                        <li><a href="javascript:void(0)">Atención al Socio</a></li>
                        <li><a href="javascript:void(0)">Estatutos</a></li>
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
                            <li class="active"><a href="{{asset('atencion_socio/estatutos')}}">Estatutos</a></li>
                            <li><a href="{{asset('atencion_socio/pago_anualidad')}}">Pago de Anualidad</a></li>
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
                        <h4>Estatutos SMACVE</h4>
                    </div>

                    <iframe src="{{asset('libraries/pdfjs-1.4.20/web/viewer.html?file=')}}{{asset('pdf/estatutos.pdf')}}" style="width:100%; height:800px;" frameborder="0"></iframe>
                    <!--
                        <iframe src="http://docs.google.com/gview?url={{asset('pdf/estatutos.pdf')}}&embedded=true" style="width:100%; height:800px;" frameborder="0"></iframe>
                    -->

                </div>

            </div>
        </div>
    </section>

    <input type="hidden" id="seccion_smacve" value="#btn-atencion-al-socio" />

@endsection


@section('javascript')

@endsection