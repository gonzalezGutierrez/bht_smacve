@extends('layouts.template_01')

@section('title','Voluntariado - Paso 4')

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
                        <li><a href="javascript:void(0)">Paso 4</a></li>
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

                            <li><a href="{{asset('voluntariado/step_3_encuestas')}}" >Encuestas de Interés</a></li>
                            <li class="active"><a href="{{asset('voluntariado/step_4')}}" >Politicas de Divulgación</a></li>
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
                            <h4> Política de la SMACVE sobre conflictos </h4>
                        </div>
                        <p class="text-justify">La relación entre las sociedades medicas profesionales y la industria, especificamente las industrias farmaceuticas y de dispositivo médicos, ha sido objeto de un escrutinio cada vez mayor.
                        La principal preeocupación es que la industria pueda influir en las actividades de la sociedad médica de manera que pueda comprometer la atención óptima al paciente o socavar la reputacion de la profesión.
                        Revise la política completa <a target="_blank" href="{{asset('acerca_de/codigos_etica/politica_conflictos')}}" class="text-theme-color">Aquí</a>
                        </p>

                        <div class="section-heading half left">
                            <h4> Política de la SMACVE sobre  declaración de conflictos </h4>
                        </div>
                        <p><strong>Después de leer la declaración anterior, complete los siguientes campos.</strong></p>


                        <div class="space10"></div>

                        {!! Form::model($solicitud,['url' => 'voluntariado/step_4', 'method' => 'POST',  'id' => 'voluntariado', 'class'=>'contact-form' ]) !!}

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"  id="aceptoPoliticas" name="aceptoPoliticas" style="width: auto;">
                                    <label class="form-check-label" for="aceptoPoliticas">
                                        Estoy de Acuerdo con la Política de la SMACVE sobre declaración de conflictos.
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                {!! Form::label('politicaConflicto', '¿Política sobre conflictos que declarar?',['class'=>'']) !!}
                            </div>
                            <div class="col-md-8">
                                {!!Form::select('politicaConflicto', array('SI' => 'Estaré declarando conflictos potenciales', 'NO' => 'Deseo afirmar que no tengo conflictos que declarar'),null, ['class' => 'form-control','placeholder'=>'Seleccion una ópcion...'])!!}
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-12">
                                {!! Form::label('comentarios', 'Comentarios Adicionales:',['class'=>'']) !!}
                                <p class="text-justify">Nuestra sociedad cuenta con extraordinarias personas, con mucho talento, algunos de sus socios están posicionados en lugares académicos, políticos o administrativos estratégicos, todos pueden ayudar a la SMACVE; otros con su talento, capacidades más allá de la medicina o relaciones personales. ¿Cómo ayudaría usted, para que nuestra SMACVE sea una mejor Institución?</p>
                            </div>
                            <div class="col-md-12">
                                {!! Form::textArea('comentarios',null,['class'=>'form-control ','placeholder'=>'','rows'=>5]) !!}
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

    <script type="text/javascript" src="{{ asset('js/voluntariado/voluntariado_step_4.js') }}"></script>


@endsection