@extends('layouts.template_01')

@section('title','Voluntariado - Paso 3')

@section('css')

@endsection

@section('content')

    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="{{asset('images/bg/bg_mi_cuenta.jpg')}}">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Solicitud de Voluntariado</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="{{asset('/')}}">Inicio</a></li>
                        <li><a href="{{asset('voluntariado')}}">Solicitud de Voluntariado</a></li>
                        <li><a href="javascript:void(0)">Paso 3</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-sm-12 padding-50px-right md-padding-30px-right sm-padding-15px-right">
                    <h6 class="font-weight-700 font-size16 sm-font-size14 text-uppercase left-title margin-20px-bottom">ETAPAS</h6>
                    <div class="single-sidebar-menu">
                        <ul class="no-margin">

                            <li><a href="{{asset('voluntariado/step_1')}}">Inicio de Solicitud</a></li>
                            <li><a href="{{asset('voluntariado/step_2')}}">Datos Demográficos</a></li>
                            <li><a href="{{asset('voluntariado/step_3')}}">Oportunidad de Voluntariado</a></li>

                            @if(!empty($puestoSeleccionados))
                                @foreach($puestoSeleccionados as $puesto )
                                    <li><a href="{{asset('voluntariado/step_3/'.$puesto->ordenSeleccion)}}">{{$puesto->puestoVoluntariado}} - Declaración de Interés</a></li>
                                @endforeach
                            @endif
                            <li class="active"><a href="{{asset('voluntariado/step_3_encuestas')}}" >Encuestas de Interés</a></li>
                            <li><a href="{{asset('voluntariado/step_4')}}" class="btn btn-link disabled">Politicas de Divulgación</a></li>
                            <li><a href="{{asset('voluntariado/step_5')}}" class="btn btn-link disabled">Revisar y Enviar</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 col-sm-12">

                    @if (session('status_success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {!! session('status_success')  !!}
                        </div>
                    @endif
                    @if (session('status_fail'))
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {!! session('status_fail')  !!}
                        </div>
                    @endif


                        <div class="section-heading half left">
                            <h4>Encuestas de Interés</h4>
                        </div>
                        <div class="space30"></div>

                        {!!  Form::open(['url' => 'voluntariado/step_3_encuestas', 'method' => 'POST',  'id' => 'voluntariado', 'class'=>'contact-form' ]) !!}

                            <h6>En el caso que desea representar a la SMACVE; ¿Cuál es el área de mayor Interés y Experiencia?</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Areas de Interés</th>
                                        <th class="text-center">Tratamientos Abierto</th>
                                        <th class="text-center">Tratamientos Endovasculares</th>
                                        <th class="text-center">Tratamientos Médico</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($areasInteres as $area)
                                        <tr>
                                            <td>{{$area->areaInteres}}</td>
                                            <td class="text-center">
                                                <input class="check_list" type="checkbox" value="{{$area->idAreaInteres}}" name="check_abierto[]" />
                                            </td>
                                            <td class="text-center">
                                                <input class="check_list" type="checkbox" value="{{$area->idAreaInteres}}" name="check_endovascular[]" />
                                            </td>
                                            <td class="text-center">
                                                <input class="check_list" type="checkbox" value="{{$area->idAreaInteres}}" name="check_medico[]" />
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="space20"></div>
                            <h6>¿Cuantas horas a la semana tiene de su tiempo, para participar desde su trabajo, consultorio o casa en actividades académicas de la SMACVE?</h6>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        {!! Form::select('idHoraDisponible',$horasDisponiblesList,null, ['class' => 'form-control','id'=>'idHoraDisponible', 'placeholder'=>'Seleccion una opción...'])!!}
                                    </div>
                                </div>
                            </div>

                            <div class="space20"></div>
                            <h6>Si desea participar en la SMACVE ¿En que actividad, más, le gustaría participar?</h6>

                            <ul class="list-tipo-practica form-check-list">
                                @foreach($actividadesVoluntariadoList as $actividad)
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{$actividad->idActividadVoluntariado}}" id="check_{{$actividad->idActividadVoluntariado}}"  name="check_actividades[]">
                                            <label class="form-check-label" for="check_{{$actividad->idActividadVoluntariado}}">{{ $actividad->actividadVoluntariado}}</label>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

                            <hr/>

                            <div class="row">
                                    <div class="col-md-12 text-right">
                                        <div class="form-group">
                                            <button class="butn theme medium" type="submit"><span>Guardar y Continuar</span></button>
                                        </div>
                                    </div>
                                </div>

                        {!!  Form::close() !!}



                    <div class="space30"></div>
                </div>
            </div>
        </div>
    </section>

    <input type="hidden" id="seccion_smacve" value="#btn-atencion-al-socio" />

@endsection


@section('javascript')

    <script type="text/javascript" src="{{ asset('libraries/jquery-validate-1.19.0/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('libraries/jquery-validate-1.19.0/additional-methods.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/voluntariado/voluntariado_step_3_encuestas.js') }}"></script>


@endsection