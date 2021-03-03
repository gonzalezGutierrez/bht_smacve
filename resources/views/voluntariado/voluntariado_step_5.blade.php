@extends('layouts.template_01')

@section('title','Voluntariado - Paso 5')

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
                        <li><a href="javascript:void(0)">Paso 5</a></li>
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

                            <li><a href="{{asset('voluntariado/step_4')}}">Politicas de Divulgación</a></li>
                            <li class="active"><a href="{{asset('voluntariado/step_5')}}">Revisar y Enviar</a></li>
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
                            <h4> Resumen </h4>
                        </div>
                        <p class="text-justify">
                            Gracias por completar los formularios de solicitud. Haz clic en el botón enviar para finalizar el proceso de solicitud.
                        </p>


                        <div class="space10"></div>

                        {!! Form::model($solicitud,['url' => 'voluntariado/step_5', 'method' => 'POST',  'id' => 'voluntariado', 'class'=>'contact-form' ]) !!}

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Articulo</th>
                                    <th>Estado</th>
                                    <th>Mensaje</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-left">Se ha seleccionado al menos una oportunidad de voluntariado</td>
                                    <td class="text-center"><i class="fas fa-check"></i></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="text-left">El número de comités seleccionados debe coincidir con el número de ensayos presentados.</td>
                                    <td class="text-center"><i class="fas fa-check"></i></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="text-left">Política sobre conflictos completada en apoyo a la solicitud de voluntariado.</td>
                                    <td class="text-center"><i class="fas fa-check"></i></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <hr/>

                        <div class="row">
                            <div class="col-md-12 text-right">
                                <div class="form-group">
                                    <button class="butn theme medium" type="submit"><span>Enviar Solicitud</span></button>
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