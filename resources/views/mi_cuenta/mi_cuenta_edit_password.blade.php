@extends('layouts.template_01')

@section('title','Mi Cuenta')

@section('content')

    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="{{asset('images/bg/bg_mi_cuenta.jpg')}}">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Mi Cuenta</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="{{asset('/')}}">Inicio</a></li>
                        <li><a href="{{asset('mi_cuenta')}}">Mi Cuenta</a></li>
                        <li><a href="javascript:void(0)">Cambiar Contraseña</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-sm-12 padding-50px-right md-padding-30px-right sm-padding-15px-right">
                    <h6 class="font-weight-700 font-size16 sm-font-size14 text-uppercase left-title margin-20px-bottom">MI CUENTA</h6>
                    <div class="single-sidebar-menu">
                        <ul class="no-margin">
                            <li><a href="{{asset('mi_cuenta')}}">Mi Cuenta</a></li>
                            <li><a href="{{asset('mi_cuenta/herramientas_para_socios')}}">Herramientas para el Socio</a></li>
                            <li><a href="{{asset('mi_cuenta/anualidades')}}">Mis Anualidades</a></li>
                            <li><a href="{{asset('mi_cuenta/informacion_pago')}}">Información para Pago</a></li>
                            <li><a href="{{asset('mi_cuenta/mis_datos_personales')}}">Editar información Personal</a></li>
                            <li class="active"><a href="{{asset('mi_cuenta/edit_password')}}">Cambiar Contraseña</a></li>
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
                    @if($errors->any())
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li class="alert-link">{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <br/>
                    @endif


                    <div class="section-heading half left">
                        <h4>Cambiar Contraseña</h4>
                    </div>
                    <div class="space30"></div>

                        <div class="row justify-content-center">
                            <div class="col-sm-8">
                                <div class="bg-white padding-30px-all sm-padding-20px-all border border-width-5">
                                    {!!  Form::model($usuario,['url' => 'mi_cuenta/'.$usuario->idUsuario.'/update_password', 'method' => 'PATCH', 'files' => false, 'id' => 'formularioChangePassword', 'class'=>'contact-form' ]) !!}

                                    <div class="form-group">
                                        {!! Form::label('password', 'Contraseña:',['class'=>'sr-only']) !!}
                                        {!! Form::password('password',['class'=>'form-control','placeholder'=>'Nueva Contraseña']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('password_confirmation', 'Confirmar Contraseña:',['class'=>'sr-only']) !!}
                                        {!! Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'Confirmar Contraseña']) !!}
                                    </div>
                                    <div class="space30"></div>
                                    <div class="form- text-right">
                                        <button class="butn theme medium" type="submit"><span>Actualizar</span></button>
                                    </div>
                                    {!!  Form::close() !!}
                                </div>
                            </div>
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


    <script type="text/javascript" src="{{ asset('js/mi_cuenta/edit_password.js') }}"></script>
@endsection