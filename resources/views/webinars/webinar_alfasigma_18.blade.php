@extends('layouts.template_01')

@section('title','Contenido Científico')

@section('metas-facebook')
    <meta property="og:site_name" content="SMACVE">
    <meta property="og:url" content="{{asset('/webinar')}}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="WEBINAR SMACVE - ALFASIGMA">
    <meta property="og:description" content="Revisión 2020 de la clasificación CEAP">
    <meta property="og:image" content="{{asset('images/webinars/alfasigma_18.jpg') }}">
@endsection

@section('content')

    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="{{asset('images/bg/educacion_medica.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Webinar SMACVE / ALFASIGMA</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="{{asset('/')}}">Inicio</a></li>
                        <li><a href="{{asset('webinar_alfasigma')}}" style="text-transform: lowercase;">Webinar</a></li>
                        <li><a href="javascript:void(0)">Alfasigma 16 Junio</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-7 col-sm-12 text-center">
                    <img src="{{asset('images/webinars/alfasigma_16.jpg')}}" class="img-fluid" />
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12">

                    <div class="bg-white padding-30px-all sm-padding-20px-all border border-width-5">

                       <p>Da click al botón de abajo para poder registrarte y confirmar tu asistencia al evento.</p>

                        <a href="https://us02web.zoom.us/webinar/register/WN_ei-V5e_4T4e-PjQZqYmf9A" class="butn"><span>Registrarse Aqui</span></a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <input type="hidden" id="seccion_smacve" value="#btn-eventos" />


@endsection


@section('javascript')

@endsection