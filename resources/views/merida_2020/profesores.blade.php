<?php use Carbon\Carbon; ?>

@extends('layouts.template_01')

@section('title','Profesores')

@section('css')

@endsection

@section('content')

    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="{{asset('images/bg/bg_merida_2020.jpg')}}">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Profesores</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="{{asset('/')}}">Inicio</a></li>
                        <li><a href="javascript:void(0)">Merida 2020</a></li>
                        <li><a href="javascript:void(0)">Profesores</a></li>
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
                    <div class="nav nav-tabs" id="tab-profesores" role="tablist" style="max-width: 330px;">
                        <a  class="nav-item nav-link active"    id="internacionales-tab"        data-toggle="tab" href="#internacionales"       role="tab" aria-controls="internacionales" aria-selected="true">Internacionales</a>
                        <a class="nav-item nav-link"            id="nacionales-tab"             data-toggle="tab" href="#nacionales"            role="tab" aria-controls="nacionales"      aria-selected="false">Nacionales</a>
                    </div>
                    <div class="tab-content" id="tab-content-profesores">
                        <div class="tab-pane fade show active" id="internacionales" role="tabpanel" aria-labelledby="internacionales-tab">
                            <div class="row">
                                @foreach($profesores as $profesor)
                                    @if($profesor->idPais > 1)
                                        <div class="col-md-4 col-sm-12">
                                            <div class="profesor center">
                                                <div class="foto">
                                                    <img  src="{{asset('https://smacve.iview02.com/images/ponentes/fotos/'.$profesor->foto)}}" class="img-fluid"/>
                                                </div>
                                                <h4 class="nombre">{{$profesor->titulo}}  {{$profesor->apellidoPaterno}} {{$profesor->apellidoMaterno}} {{$profesor->nombre}}</h4>
                                                <h5 class="pais">{{$profesor->pais}} </h5>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="tab-pane fade" id="nacionales" role="tabpanel" aria-labelledby="nacionales-tab">
                            <div class="row">
                                @foreach($profesores as $profesor)
                                    @if($profesor->idPais == 1)
                                        <div class="col-md-4 col-sm-12">
                                            <div class="profesor center">
                                                <div class="foto">
                                                    <img  src="{{asset('https://smacve.iview02.com/images/ponentes/fotos/'.$profesor->foto)}}" class="img-fluid"/>
                                                </div>
                                                <h4 class="nombre">{{$profesor->titulo}}  {{$profesor->apellidoPaterno}} {{$profesor->apellidoMaterno}} {{$profesor->nombre}}</h4>
                                                <h5 class="pais">{{$profesor->pais}} </h5>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
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


