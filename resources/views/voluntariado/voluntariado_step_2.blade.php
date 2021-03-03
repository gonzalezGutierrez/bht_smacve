@extends('layouts.template_01')

@section('title','Voluntariado Paso 2')


@section('css')
    <link href="{{asset('libraries/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/voluntariado.css')}}" />
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
                        <li><a href="javascript:void(0)">Paso 2</a></li>
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
                            <li class="active"><a href="{{asset('voluntariado/step_2')}}">Datos Demográficos</a></li>
                            <li><a href="{{asset('voluntariado/step_3')}}" class="btn btn-link disabled">Oportunidad de Voluntariado</a></li>
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
                            <h4>Datos Demográficos</h4>
                        </div>

                        <div class="space10"></div>
                        <div class="bg-white padding-20px-all sm-padding-20px-all border border-width-5">

                            {!!  Form::model($solicitud,['url' => 'voluntariado/step_2', 'method' => 'POST',  'id' => 'voluntariado', 'class'=>'contact-form' ]) !!}

                            <div class="space20"></div>

                            <div class="row">
                                <div class="col-md-12">
                                    {!! Form::label('check_tipo_practica[]', '¿Qué es lo que mayor define tu práctica médica?',['class'=>'']) !!}

                                    <ul class="list-tipo-practica form-check-list">
                                        @foreach($tiposPracticaList as $tipoPractica)
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="{{$tipoPractica->idTipoPractica}}" id="check_{{$tipoPractica->idTipoPractica}}"  name="check_tipo_practica[]">
                                                    <label class="form-check-label" for="check_{{$tipoPractica->idTipoPractica}}">{{ $tipoPractica->tipoPractica}}</label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="space20"></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    {!! Form::label('practicaHospitales', 'De tener una práctica médica privada, mencione los dos hospitales más importantes para usted, donde tiene privilegios:',['class'=>'']) !!}
                                </div>
                                <div class="col-md-12">
                                    {!! Form::textArea('practicaHospitales',null,['class'=>'form-control ','placeholder'=>'Escriba los dos hospitales más importantes para usted.','rows'=>3]) !!}
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-md-12">
                                    {!! Form::label('afiliacionInstitucion', '¿Es tu práctica afiliada con alguna institución universitaría?',['class'=>'']) !!}
                                </div>
                                <div class="col-md-5">
                                    {!!Form::select('afiliacionInstitucion', array('SI' => 'SI', 'NO' => 'NO'),null, ['class' => 'form-control','placeholder'=>'Seleccion una ópcion...'])!!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    {!! Form::label('nombreInstitucion', 'Nombre de la Universidad:',['class'=>'']) !!}
                                </div>
                                <div class="col-md-12">
                                    {!! Form::text('nombreInstitucion',null,['class'=>'form-control ','placeholder'=>'Escriba el nombre de la universidad']) !!}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    {!! Form::label('check_configuracion_practica[]', 'Configuración de Práctica',['class'=>'']) !!}

                                    <ul class="list-tipo-practica form-check-list">
                                        @foreach($configuracionPracticaList as $configuracionPractica)
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="{{$configuracionPractica->idConfiguracionPractica}}" id="check_{{$configuracionPractica->idConfiguracionPractica}}"  name="check_configuracion_practica[]">
                                                    <label class="form-check-label" for="check_{{$configuracionPractica->idConfiguracionPractica}}">{{ $configuracionPractica->configuracionPractica}}</label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="space20"></div>
                                </div>
                            </div>



                            <div class="form-group row">
                                <div class="col-md-12">
                                    {!! Form::label('comitesAnteriores', 'Enumere los comités en los que ha trabajado anteriormente. si no ha trabajado en alguno con anterioridad, por favor escriba "ninguno":',['class'=>'']) !!}
                                </div>
                                <div class="col-md-8">
                                    {!! Form::textArea('comitesAnteriores',null,['class'=>'form-control ','placeholder'=>'','rows'=>5]) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    {!! Form::label('fechaInicioPractica', 'Fecha de inicio de práctica: (Año)',['class'=>'']) !!}
                                </div>
                                <div class="col-md-5">
                                    {!! Form::text('fechaInicioPractica',null,['class'=>'form-control ','placeholder'=>'Escriba solo el año']) !!}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('idEstado', '¿En que estado de la república radica?',['class'=>'']) !!}
                                        {!! Form::select('idEstado',$estadosList,null, ['class' => 'form-control','placeholder'=>'Seleccion una opción...'])!!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    {!! Form::label('ciudad','Mencione la o las ciudades en las que trabaja:',['class'=>'']) !!}
                                </div>
                                <div class="col-md-12">
                                    {!! Form::text('ciudad',null,['class'=>'form-control ','placeholder'=>'Escriba el nombre de la ciudad']) !!}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8 col-sm-12">
                                    <div class="form-group">
                                        @php
                                            $fechaNacimiento = "";

                                            if(!empty($solicitud->fechaNacimiento)){
                                             $fechaNacimiento = date('d/m/Y',strtotime($solicitud->fechaNacimiento));
                                            }
                                        @endphp
                                        {!! Form::label('fechaNacimiento', 'Fecha Nacimiento:',['class'=>'']) !!}
                                        <div style="display: block; position: relative;">
                                            <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                                <input id="fechaNacimiento" name="fechaNacimiento" type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" placeholder="Fecha Nacimiento" value="{{$fechaNacimiento}}" readonly/>
                                                <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                                    <button class="btn btn-primary" type="button" id="button-addon1"><i class="fa fa-calendar"></i></button>
                                                </div>
                                            </div>
                                            <label id="fechaNacimiento-error" class="error" for="fechaNacimiento"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr/>

                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <div class="form-group">
                                        <button class="butn theme medium" type="submit"><span>Guardar y Continuar</span></button>
                                    </div>
                                </div>
                            </div>

                            {!!  Form::close() !!}

                        </div>

                        <div class="space30"></div>
                        <div class="space30"></div>
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

    <script src="{{asset('libraries/moment-develop/moment.js')}}" type="text/javascript"></script>
    <script src="{{asset('libraries/moment-develop/moment-with-locales.js')}}" type="text/javascript"></script>
    <script src="{{asset('libraries/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.js')}}" type="text/javascript" ></script>



    <script type="text/javascript" src="{{ asset('js/voluntariado/voluntariado_step_2.js') }}"></script>

@endsection