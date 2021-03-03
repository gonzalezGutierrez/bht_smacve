@extends('layouts.template_01')

@section('title','Convenios')

@section('content')

    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="{{asset('images/bg/bg_acerca_de.jpg')}}">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Convenios</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="{{asset('/')}}">Inicio</a></li>
                        <li><a href="javascript:void(0)">Acerca de</a></li>
                        <li><a href="javascript:void(0)">Convenios</a></li>

                    </ul>
                </div>
            </div>

        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-sm-12 padding-50px-right md-padding-30px-right sm-padding-15px-right">

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
                        <h4>Convenios</h4>
                    </div>
                    <p class="text-justify">La Sociedad Mexicana de Angiología, Cirugía Vascular y Endovascular A.C. (SMACVE), con el fin de mejorar y cumplir con sus objetivos, gestiona y elabora diversos convenios de colaboración con instituciones afines, para que en conjunto encaminen sus esfuerzos a la invesrtigación, el estudio o al tratamiento de las enfermedades vasculares.</p>

                    <div class="space40"></div>
                    <div class="row justify-content-center">
                        <div class="col-sm-4">
                            <img src="{{asset('images/convenios/SVS.png')}}" class="img-fluid img-convenio" />
                        </div>
                        <div class="col-sm-4">
                            <img src="{{asset('images/convenios/CMACVE.png')}}" class="img-fluid img-convenio" />
                        </div>
                        <div class="col-sm-4">
                            <img src="{{asset('images/convenios/CONAMEGE.png')}}" class="img-fluid img-convenio" />
                        </div>
                        <div class="col-sm-4">
                            <img src="{{asset('images/convenios/FVL.png')}}" class="img-fluid img-convenio" />
                        </div>
                        <div class="col-sm-4">
                            <img src="{{asset('images/convenios/FVM.png')}}" class="img-fluid img-convenio" />
                        </div>
                        <div class="col-sm-4">
                            <img src="{{asset('images/convenios/HENDOLAT.png')}}" class="img-fluid img-convenio" />
                        </div>
                        <div class="col-sm-4">
                            <img src="{{asset('images/convenios/CELA.png')}}" class="img-fluid img-convenio" />
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <input type="hidden" id="seccion_smacve" value="#btn-acerca-de" />

@endsection


@section('javascript')

@endsection