<?php use Carbon\Carbon; ?>

@extends('layouts.template_01')

@section('title','Programa Académico')

@section('css')

@endsection

@section('content')

    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="{{asset('images/bg/bg_merida_2020.jpg')}}">
        <div class="container">

            <div class="row">
                <div class="col-md-6">
                    <h1>Programa Académico</h1>
                </div>
                <div class="col-md-6 text-lg-right text-md-center">
                  <a href="{{asset('merida_2020/programa/descargar')}}" target="_blank" class="butn theme"><span>Descargar PDF del Programa </span></a>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="{{asset('/')}}">Inicio</a></li>
                        <li><a href="javascript:void(0)">Merida 2020</a></li>
                        <li><a href="javascript:void(0)">Programa Académico</a></li>
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
                            <li><a href="{{asset('merida_2020/sede')}}">Sede del Evento</a></li>
                            <li class="active"><a href="{{asset('merida_2020/programa')}}">Programa Académico</a></li>
                            <li><a href="{{asset('merida_2020/profesores')}}">Profesores</a></li>
                            <li><a href="{{asset('merida_2020/registro_online')}}">Registro Online</a></li>
                            <li><a href="{{asset('pdf/convocatoria_trabajos_libres_2020.pdf')}}">Convocatoria Trabajos Libres</a></li>
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

                    <div class="nav nav-tabs" id="tab-programa" role="tablist">
                            <a  class="nav-item nav-link active" id="octubre28-tab"     data-toggle="tab" href="#octubre28"     role="tab" aria-controls="octubre28" aria-selected="true">Octubre 28</a>
                            <a class="nav-item nav-link" id="octubre29-tab"             data-toggle="tab" href="#octubre29"     role="tab" aria-controls="octubre29" aria-selected="false">Octubre 29</a>
                            <a class="nav-item nav-link" id="octubre30-tab"             data-toggle="tab" href="#octubre30"     role="tab" aria-controls="octubre30" aria-selected="false">Octubre 30</a>
                            <a class="nav-item nav-link" id="octubre31-tab"             data-toggle="tab"   href="#octubre31"   role="tab" aria-controls="octubre31" aria-selected="false">Octubre 31</a>
                    </div>
                    <div class="tab-content" id="tab-content-programa">
                        <div class="tab-pane fade active show" id="octubre28" role="tabpanel" aria-labelledby="octubre28-tab">
                            <table class="table-bht-congress" cellpadding="0" cellspacing="0" border="0">
                                <tbody>
                                <?php $idBloque = 0; ?>
                                @foreach($agenda28 as $conferencia)
                                    @if($conferencia->idBloque !== $idBloque)
                                        <?php  $idBloque =  $conferencia->idBloque; ?>
                                        <tr class="bloque">
                                            <td colspan="2" class="nombre-bloque">
                                                <strong>{!!  $conferencia->bloque!!} </strong>
                                                @if(!empty($conferencia->moderador))
                                                    <small><strong>MODERADOR:</strong> {{$conferencia->moderador}}</small>
                                                @endif
                                                @if(!empty($conferencia->comentarista1))
                                                    <small><strong>COMENTARISTA 1:</strong> {{$conferencia->comentarista1}}</small>
                                                @endif
                                                @if(!empty($conferencia->comentarista2))
                                                    <small><strong>COMENTARISTA 2:</strong> {{$conferencia->comentarista2}}</small>
                                                @endif
                                                @if(!empty($conferencia->comentarista3))
                                                    <small><strong>COMENTARISTA 3:</strong> {{$conferencia->comentarista4}}</small>
                                                @endif
                                            </td>
                                            <td class="horario-bloque">
                                                {{  Carbon::CreateFromFormat('H:i:s', $conferencia->horaInicioBloque)->format('H:i') }} -
                                                {{  Carbon::CreateFromFormat('H:i:s', $conferencia->horaFinBloque)->format('H:i') }} HRS CST
                                            </td>
                                        </tr>
                                    @endif

                                    <tr class="conferencia" id="conferencia-{{$conferencia->idConferencia}}">
                                        <td class="t_inicio">
                                            {{  Carbon::CreateFromFormat('H:i:s', $conferencia->horaInicioConferencia)->format('H:i') }}
                                        </td>
                                        <td class="tema">{!! $conferencia->tema !!}</td>
                                        <td class="expositor">{{$conferencia->ponente}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="octubre29" role="tabpanel" aria-labelledby="octubre29-tab">
                            <table class="table-bht-congress" cellpadding="0" cellspacing="0" border="0">
                                <tbody>
                                <?php $idBloque = 0; ?>
                                @foreach($agenda29 as $conferencia)
                                    @if($conferencia->idBloque !== $idBloque)
                                        <?php  $idBloque =  $conferencia->idBloque; ?>
                                        <tr class="bloque">
                                            <td colspan="2" class="nombre-bloque">
                                                <strong>{!!  $conferencia->bloque!!} </strong>
                                                @if(!empty($conferencia->moderador))
                                                    <small><strong>MODERADOR:</strong> {{$conferencia->moderador}}</small>
                                                @endif
                                                @if(!empty($conferencia->comentarista1))
                                                    <small><strong>COMENTARISTA 1:</strong> {{$conferencia->comentarista1}}</small>
                                                @endif
                                                @if(!empty($conferencia->comentarista2))
                                                    <small><strong>COMENTARISTA 2:</strong> {{$conferencia->comentarista2}}</small>
                                                @endif
                                                @if(!empty($conferencia->comentarista3))
                                                    <small><strong>COMENTARISTA 3:</strong> {{$conferencia->comentarista4}}</small>
                                                @endif
                                            </td>
                                            <td class="horario-bloque">
                                                {{  Carbon::CreateFromFormat('H:i:s', $conferencia->horaInicioBloque)->format('H:i') }} -
                                                {{  Carbon::CreateFromFormat('H:i:s', $conferencia->horaFinBloque)->format('H:i') }} HRS CST
                                            </td>
                                        </tr>
                                    @endif

                                    <tr class="conferencia" id="conferencia-{{$conferencia->idConferencia}}">
                                        <td class="t_inicio">
                                            {{  Carbon::CreateFromFormat('H:i:s', $conferencia->horaInicioConferencia)->format('H:i') }}
                                        </td>
                                        <td class="tema">{!! $conferencia->tema !!}</td>
                                        <td class="expositor">{{$conferencia->ponente}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="octubre30" role="tabpanel" aria-labelledby="octubre30-tab">
                            <table class="table-bht-congress" cellpadding="0" cellspacing="0" border="0">
                                <tbody>
                                <?php $idBloque = 0; ?>
                                @foreach($agenda30 as $conferencia)
                                    @if($conferencia->idBloque !== $idBloque)
                                        <?php  $idBloque =  $conferencia->idBloque; ?>
                                        <tr class="bloque">
                                            <td colspan="2" class="nombre-bloque">
                                                <strong>{!!  $conferencia->bloque!!} </strong>
                                                @if(!empty($conferencia->moderador))
                                                    <small><strong>MODERADOR:</strong> {{$conferencia->moderador}}</small>
                                                @endif
                                                @if(!empty($conferencia->comentarista1))
                                                    <small><strong>COMENTARISTA 1:</strong> {{$conferencia->comentarista1}}</small>
                                                @endif
                                                @if(!empty($conferencia->comentarista2))
                                                    <small><strong>COMENTARISTA 2:</strong> {{$conferencia->comentarista2}}</small>
                                                @endif
                                                @if(!empty($conferencia->comentarista3))
                                                    <small><strong>COMENTARISTA 3:</strong> {{$conferencia->comentarista4}}</small>
                                                @endif
                                            </td>
                                            <td class="horario-bloque">
                                                {{  Carbon::CreateFromFormat('H:i:s', $conferencia->horaInicioBloque)->format('H:i') }} -
                                                {{  Carbon::CreateFromFormat('H:i:s', $conferencia->horaFinBloque)->format('H:i') }} HRS CST
                                            </td>
                                        </tr>
                                    @endif

                                    <tr class="conferencia" id="conferencia-{{$conferencia->idConferencia}}">
                                        <td class="t_inicio">
                                            {{  Carbon::CreateFromFormat('H:i:s', $conferencia->horaInicioConferencia)->format('H:i') }}
                                        </td>
                                        <td class="tema">{!! $conferencia->tema !!}</td>
                                        <td class="expositor">{{$conferencia->ponente}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="octubre31" role="tabpanel" aria-labelledby="octubre31-tab">
                            <table class="table-bht-congress" cellpadding="0" cellspacing="0" border="0">
                                <tbody>
                                <?php $idBloque = 0; ?>
                                @foreach($agenda31 as $conferencia)
                                    @if($conferencia->idBloque !== $idBloque)
                                        <?php  $idBloque =  $conferencia->idBloque; ?>
                                        <tr class="bloque">
                                            <td colspan="2" class="nombre-bloque">
                                                <strong>{!!  $conferencia->bloque!!} </strong>
                                                @if(!empty($conferencia->moderador))
                                                    <small><strong>MODERADOR:</strong> {{$conferencia->moderador}}</small>
                                                @endif
                                                @if(!empty($conferencia->comentarista1))
                                                    <small><strong>COMENTARISTA 1:</strong> {{$conferencia->comentarista1}}</small>
                                                @endif
                                                @if(!empty($conferencia->comentarista2))
                                                    <small><strong>COMENTARISTA 2:</strong> {{$conferencia->comentarista2}}</small>
                                                @endif
                                                @if(!empty($conferencia->comentarista3))
                                                    <small><strong>COMENTARISTA 3:</strong> {{$conferencia->comentarista4}}</small>
                                                @endif
                                            </td>
                                            <td class="horario-bloque">
                                                {{  Carbon::CreateFromFormat('H:i:s', $conferencia->horaInicioBloque)->format('H:i') }} -
                                                {{  Carbon::CreateFromFormat('H:i:s', $conferencia->horaFinBloque)->format('H:i') }} HRS CST
                                            </td>
                                        </tr>
                                    @endif

                                    <tr class="conferencia" id="conferencia-{{$conferencia->idConferencia}}">
                                        <td class="t_inicio">
                                            {{  Carbon::CreateFromFormat('H:i:s', $conferencia->horaInicioConferencia)->format('H:i') }}
                                        </td>
                                        <td class="tema">{!! $conferencia->tema !!}</td>
                                        <td class="expositor">{{$conferencia->ponente}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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


