@extends('layouts.template_01')

@section('title','Contenido Científico')

@section('metas-facebook')
    <meta property="og:site_name" content="SMACVE">
    <meta property="og:url" content="{{asset('/webinar')}}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="WEBINAR SMACVE - TEVA">
    <meta property="og:description" content="Uso de flebotónicos en el postoperatorio inmediato">
    <meta property="og:image" content="{{asset('images/webinar_teva/logo_teva.png') }}">
@endsection

@section('content')

    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="{{asset('images/bg/educacion_medica.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Webinar SMACVE / PIERRE FABRE</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="{{asset('/')}}">Inicio</a></li>
                        <li><a href="{{asset('webinar_pierre_fabre')}}" style="text-transform: lowercase;">Webinar</a></li>
                        <li><a href="javascript:void(0)">Pierre Fabre</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-7 col-sm-12 text-center">
                    <img src="{{asset('images/webinars/webinar_pierre_fabre.png')}}" class="img-fluid" />
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12">

                    <div class="bg-white padding-30px-all sm-padding-20px-all border border-width-5">

                       <p>Da click al botón de abajo para poder registrarte y confirmar tu asistencia al evento.</p>

                        <a href="https://us02web.zoom.us/webinar/register/WN_yYhm1KZFS-WIRghBIe4e5Q" class="butn"><span>Registrarse Aqui</span></a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <input type="hidden" id="seccion_smacve" value="#btn-eventos" />


@endsection


@section('javascript')
    <script type="text/javascript" src="{{ asset('libraries/jquery-validate-1.19.0/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('libraries/jquery-validate-1.19.0/additional-methods.min.js') }}"></script>


    <script src="{{asset('js/webinars/webinar_teva.js')}}" type="text/javascript"></script>
@endsection