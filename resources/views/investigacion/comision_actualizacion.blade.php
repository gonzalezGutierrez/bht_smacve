@extends('layouts.template_01')

@section('title','Comision de actualizacion GPC')

@section('css')

    <style>
        .text-link {
            color:#d0ad55 !important;

            word-wrap: break-word;
            word-break: break-all;
        }
    </style>

@stop

@section('content')

<section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="{{asset('images/bg/bg_mi_cuenta.jpg')}}">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h1>Comisión de actualización de GPC</h1>
            </div>
            <div class="col-md-12">
                <ul>
                    <li><a href="{{asset('/')}}">Inicio</a></li>
                    <li><a href="javascript:void(0)">Comisión de actualización de GPC</a></li>
                </ul>
            </div>
        </div>

    </div>
</section>

<section class="container">
    <div class="section-heading">
        <h3>Guías de práctica clínica<br>
            <small>Coordinador: MCs Dr. Rodrigo Lozano Corona</small>
        </h3>
        <p class="width-55 sm-width-75 xs-width-95">En esta sección el socio puede consultar hasta 150 Guías de Práctica Clínica (GPC).</p>
    </div>
    <div class="space30"></div>
    <div class="row">
        <div class="col-lg-4 col-md-5 col-sm-12 padding-50px-right md-padding-30px-right sm-padding-15px-right">
            <h6 class="font-weight-700 font-size16 sm-font-size14 text-uppercase left-title margin-20px-bottom">Guías</h6>
            <div class="single-sidebar-menu">
                <ul class="no-margin">
                    <li class="@if($section=='nacionales') active @endif"><a href="{{asset('investigacion/comision_actualizacion_gpc/nacionales')}}">Guías de Práctica Nacionales</a></li>
                    <li class="@if($section=='internacionales') active @endif"><a href="{{asset('investigacion/comision_actualizacion_gpc/internacionales')}}">Guías de Práctica Clínica Internacionales</a></li>
                    <li class="@if($section=='british') active @endif"><a href="{{asset('investigacion/comision_actualizacion_gpc/british')}}">Guias BMJ (British Medical Journal) Best Practice</a></li>
                    <!--
                    <li class="@if($section=='pdf_clinica') active @endif"><a href="{{asset('investigacion/comision_actualizacion_gpc/pdf_clinica')}}">PDF de Guías de Practicas Clínicas</a></li>
                    -->
                    <li class="@if($section=='libros') active @endif"><a href="{{asset('investigacion/comision_actualizacion_gpc/libros')}}">Libros</a></li>

                </ul>
            </div>
        </div>

        <div class="col-md-8 col-lg-8 col-xs-12">
            @if($section == "nacionales")
                <div class="nacionales">
                    <h6><strong>Guías de práctica clínica del CENETEC sobre patología vascular.</strong></h6>

                    @php
                        $topicosNacionales = App\GPC::where('tipo','nacionales')->orderBy('orden','ASC')->groupBy('Tpico')->select('Tpico')->get();
                    @endphp

                    @foreach($topicosNacionales as $topico)
                        @php
                            $nacionales = App\GPC::where('Tpico',$topico->Tpico)->where('tipo','nacionales')->orderBy('orden','ASC')->select('link','nombre','orden')->get();
                        @endphp
                        <h6>{{$topico->Tpico}}: </h6>
                        @foreach($nacionales as $nacional)
                            <span class="mb-2">{{$nacional->orden}}.- {{$nacional->nombre}}</span> <br>
                            @if(Auth::user()->idStatusSocio == 1)
                                <span>Disponible en: <a href="{{$nacional->link}}" class="text-link" target="_blank">{{$nacional->link}}</a></span>
                            @else
                                <span>Disponible en: <a href="#" data-toggle="modal" class="text-link" data-target="#exampleModal">{{$nacional->link}}</a></span>
                            @endif
                            <hr>
                        @endforeach
                    @endforeach
                </div>
            @endif

            @if($section == "internacionales")
                <div class="internacionales">

                        @php
                            $topicosInternacionales = App\GPC::where('tipo','internacionales')->groupBy('Tpico')->orderBy('Tpico','ASC')->select('Tpico')->get();
                        @endphp

                        @foreach($topicosInternacionales as $topico)
                            @php
                                $internacionales = App\GPC::where('Tpico',$topico->Tpico)->where('tipo','internacionales')->select('link','nombre','orden')->get();
                            @endphp

                            <h6>{{$topico->Tpico}}: </h6>

                            @foreach($internacionales as $internacional)
                                <span class="mb-2">{{$internacional->orden}}.- {!!$internacional->nombre!!}</span> <br>

                                @if(Auth::user()->idStatusSocio == 1)
                                    <span>Disponible en: <a href="{{$internacional->link}}" class="text-link" target="_blank">{{$internacional->link}}</a></span>
                                @else
                                    <span>Disponible en: <a href="javascript:void(0)" data-toggle="modal" class="text-link" data-target="#exampleModal">{{$internacional->link}}</a></span>
                                @endif

                                <hr>
                            @endforeach

                        @endforeach
                    </div>
            @endif

            @if($section == "british")
                <div class="british">
                        @php
                            $british = App\GPC::where('tipo','british')->orderBy('orden','ASC')->select('nombre','link','orden')->get();
                        @endphp
                        @foreach($british as $item)
                            <span class="mb-2">{{$item->orden}}.- {!!$item->nombre!!} </span> <br>
                            @if(Auth::user()->idStatusSocio == 1)
                                <span>Disponible en: <a href="{{asset($item->link)}}" class="text-link" target="_blank">{{asset($item->link)}}</a></span>
                            @else
                                <span>Disponible en: <a href="#" data-toggle="modal" class="text-link" data-target="#exampleModal">{{asset($item->link)}}</a></span>
                            @endif
                            <hr>
                        @endforeach
                </div>
            @endif


            @if($section == "pdf_clinica")
                 <div class="pdf_clinica">
                        @php
                            $pdf_clinicas = App\GPC::where('tipo','pdf_clinica')->orderBy('orden','ASC')->select('nombre','link','orden')->get();

                        @endphp

                        @foreach($pdf_clinicas as $item)

                            <span class="mb-2">{{$item->orden}}.- {{$item->nombre}}</span> <br>
                            @if(Auth::user()->idStatusSocio == 1)
                                <span>Disponible en: <a href="{{asset($item->link)}}" class="text-link" target="_blank">{{asset($item->link)}}</a></span>
                            @else
                                <span>Disponible en: <a href="#" data-toggle="modal" class="text-link" data-target="#exampleModal">{{asset($item->link)}}</a></span>
                            @endif
                            <hr>
                        @endforeach
                 </div>
            @endif

            @if($section == 'libros')
                <div class="libros">
                        @php
                            $libros = App\GPC::where('tipo','libros')->orderBy('orden','ASC')->select('nombre','link','orden')->get();
                        @endphp
                        @foreach($libros as $item)
                            <span class="mb-2">{{$item->orden}}.- {{$item->nombre}}</span> <br>
                            @if(Auth::user()->idStatusSocio == 1)
                                <span>Disponible en: <a href="{{$item->link}}" class="text-link" target="_blank">{{$item->link}}</a></span>
                            @else
                                <span>Disponible en: <a href="#" class="text-link" data-toggle="modal" data-target="#exampleModal">{{$item->link}}</a></span>
                            @endif
                            <hr>
                        @endforeach
                </div>
            @endif
        </div>











    </div>
</section>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title text-uppercase" id="exampleModalLabel">Hola, {{Auth::user()->nombre}} {{Auth::user()->apellidoPaterno}}</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Para poder acceder a este link necesitas ser un mimbro activo, para mas infomarción escribenos al correo atencionalsocio@smacve.org.mx
        </div>
        <div class="modal-footer">
            <a href="{{asset('mi_cuenta/anualidades')}}" target="_blank" class="btn btn-primary">Mis anualizadades</a>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
        </div>
    </div>
</div>


<input type="hidden" id="seccion_smacve" value="#btn-investigacion" />
@stop