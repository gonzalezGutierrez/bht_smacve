@extends('layouts.template_01')

@section('title','Voluntariado - Paso 3')

@section('css')
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
                            <li class="active"><a href="{{asset('voluntariado/step_3')}}">Oportunidad de Voluntariado</a></li>
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
                            <h4>Seleccione Oportunidad de Voluntariado</h4>
                        </div>
                        <p>Revise la lista de comités y seleccione como máximo 2 opciones en la cual le gustaría ser considerado para su nombramiento. Para leer mas sobre cada comité de click sobre el link de ver información..</p>

                        <div class="space30"></div>
                        <div class="bg-white padding-20px-all sm-padding-20px-all border border-width-5">


                            {!!  Form::open(['url' => 'voluntariado/step_3', 'method' => 'POST',  'id' => 'voluntariado', 'class'=>'contact-form' ]) !!}

                            <ul class="list-unstyled lista-oportunidad-voluntariados">
                                @foreach($puestos as $puesto)
                                    <li class="puesto">

                                        @if(count($puesto->children) <= 0)
                                            <input class="check_list" type="checkbox" value="{{$puesto->idPuestoVoluntariado}}" id="check_{{$puesto->idPuestoVoluntariado}}"  name="check_list[]">
                                        @else
                                            <span> <i class="fas fa-caret-down"></i> </span>
                                        @endif
                                        <label for="check_{{$puesto->idPuestoVoluntariado}}">{{ $puesto->puestoVoluntariado}}</label>

                                        @if($puesto->descripcion)
                                            <a class="btn btn-link btn-xs"data-toggle="collapse" href="#collapse{{$puesto->idPuestoVoluntariado}}" role="button" aria-expanded="false" aria-controls="{{$puesto->idPuestoVoluntariado}}">
                                                Ver Información
                                            </a>

                                            <div class="descripcion collapse" id="collapse{{$puesto->idPuestoVoluntariado}}">
                                                {!! $puesto->descripcion !!}
                                            </div>
                                        @endif
                                    </li>

                                    @if($puesto->children)
                                        @foreach($puesto->children as $children)
                                            <li class="subpuesto">
                                                <input class="check_list" type="checkbox" value="{{$children->idPuestoVoluntariado}}" id="check_{{$children->idPuestoVoluntariado}}"  name="check_list[]">
                                                <label for="check_{{$children->idPuestoVoluntariado}}">{{ $children->puestoVoluntariado}}</label>

                                                @if($children->descripcion)
                                                    <a class="btn btn-link btn-xs"data-toggle="collapse" href="#collapse{{$children->idPuestoVoluntariado}}" role="button" aria-expanded="false" aria-controls="{{$puesto->idPuestoVoluntariado}}">
                                                        Ver Información
                                                    </a>
                                                    <div class="descripcion collapse" id="collapse{{$children->idPuestoVoluntariado}}">
                                                        {!! $children->descripcion !!}
                                                    </div>
                                                @endif
                                            </li>
                                        @endforeach
                                    @endif
                                @endforeach
                            </ul>


                            <div class="space20"></div>


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
                </div>
            </div>
        </div>
    </section>

    <input type="hidden" id="seccion_smacve" value="#btn-atencion-al-socio" />

@endsection


@section('javascript')

    <script type="text/javascript" src="{{ asset('libraries/jquery-validate-1.19.0/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('libraries/jquery-validate-1.19.0/additional-methods.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('libraries/bootbox-v4.4.0/bootbox.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/voluntariado/voluntariado_step_3.js') }}"></script>
@endsection