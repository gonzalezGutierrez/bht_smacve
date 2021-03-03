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
                    <h1>Webinar SMACVE / TEVA</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="{{asset('/')}}">Inicio</a></li>
                        <li><a href="{{asset('webinar')}}" style="text-transform: lowercase;">Webinar</a></li>
                        <li><a href="javascript:void(0)">TEVA</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-7 col-sm-12">
                    @if (session('status_success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <img src="{{asset('images/webinars/logo_teva.png')}}" class="img-fluid" style="max-width: 320px; width: 100%;" />
                            <img src="{{asset('images/logos/logo_smacve.png')}}" class="img-fluid" style="max-width: 60px; width: 100%;" />
                            <h4 style="margin-bottom: 5px; font-weight: 700;">Muchas gracias por tu registro.</h4>
                            <p style="margin: 5px;font-size: 16px;">
                                {!! session('status_success')  !!}
                            </p>
                        </div>
                        <div class="space20"></div>
                    @endif
                    @if (session('status_fail'))
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {!! session('status_fail')  !!}
                        </div>
                        <div class="space20"></div>
                    @endif

                    <div class="row d-none">
                        <div class="col-sm-8 text-center">
                            <img src="{{asset('images/webinars/logo_teva.png')}}" class="img-fluid" style="max-width: 450px; width: 100%;" />
                        </div>
                        <div class="col-sm-4 text-center">
                            <img src="{{asset('images/logos/logo_smacve.png')}}" class="img-fluid" style="max-width: 90px; width: 100%;" />
                        </div>
                    </div>
                    <img src="{{asset('images/webinars/invitacion_teva.jpg')}}" class="img-fluid" />
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12">



                    <div class="bg-white padding-30px-all sm-padding-20px-all border border-width-5">

                       <p>Da click al botón de abajo para poder registrarte y confirmar tu asistencia al evento.</p>

                        {!! Form::open(['url'=>'webinar','method' => 'POST', 'id'=>'FormSendRegister2','class'=>''])!!}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"  id="aceptoCondiciones" name="aceptoCondiciones" style="width: auto;">
                                        <label class="form-check-label" for="aceptoCondiciones">
                                            <small>He leido y <a target="_blank" href="http://lp6.me/Nnk39" style="text-decoration: underline;"> acepto los términos y condiciones.</a></small>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="butn"><span>Registrarse</span></button>
                            </div>
                        </div>
                        {!! Form::close()!!}

                    </div>


                    <div class="d-none bg-white padding-30px-all sm-padding-20px-all border border-width-5">
                        <div class="section-heading left">
                            <h4>Regístrese</h4>
                        </div>

                        @if($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li class="alert-link">{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <br/>
                        @endif

                        {!! Form::open(['url'=>'webinar','method' => 'POST', 'id'=>'FormSendRegister','class'=>''])!!}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('nombre', 'Nombre Completo:',['class'=>'sr-only']) !!}
                                    {!! Form::text('nombre',null,['class'=>'form-control form-control-lg','placeholder'=>'Nombre Completo']) !!}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('email', 'Email:',['class'=>'sr-only']) !!}
                                    {!! Form::text('email',null,['class'=>'form-control form-control-lg','placeholder'=>'E-Mail']) !!}
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('especialidad', 'Especialidad:',['class'=>'sr-only']) !!}
                                    {!! Form::text('especialidad',null,['class'=>'form-control form-control-lg','placeholder'=>'Especialidad']) !!}
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="form-group">
                                    {!! Form::label('telefono', 'Telefono Celular:',['class'=>'sr-only']) !!}
                                    {!! Form::text('telefono',null,['class'=>'form-control form-control-lg','placeholder'=>'Celular']) !!}
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"  id="aceptoCondiciones" name="aceptoCondiciones" style="width: auto;">
                                        <label class="form-check-label" for="aceptoCondiciones">
                                            <small>He leido y <a target="_blank" href="http://lp6.me/Nnk39" style="text-decoration: underline;"> acepto los términos y condiciones.</a></small>
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                    <label for="g-recaptcha-response" class="sr-only">Recaptcha</label>
                                    {!! Recaptcha::render() !!}
                                </div>
                            </div>




                            <div class="col-md-12">
                                <button type="submit" class="butn"><span>Registrarse</span></button>
                            </div>
                        </div>
                        {!! Form::close()!!}
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