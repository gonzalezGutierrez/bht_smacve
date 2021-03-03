
@extends('layouts.template_01')

@section('title','Acceso a Socios')

@section('css')

@endsection


@section('content')
    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="{{asset('images/bg/bg_login.jpg')}}">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Acceso a Socios</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="{{asset('/')}}">Asociados SMACVE</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 center-col">
                    @if (session('warning'))
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {!! session('warning')  !!}
                        </div>
                    @endif

                    <div class="bg-white padding-30px-all sm-padding-20px-all border border-width-5">
                        <div class="text-center section-heading">
                            <h4>Iniciar Sesión</h4>

                        </div>
                        {!! Form::open(['url'=>'login','method' => 'POST', 'id'=>'FormRegister','class'=>'contact-form'])!!}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    {!! Form::label('email', 'Email:',['class'=>'sr-only']) !!}
                                    <input id="email" type="email" class="form-control form-control-lg {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Correo Electronico" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    {!! Form::label('password', 'Password:',['class'=>'sr-only']) !!}
                                    <input id="password" type="password" class="form-control form-control-lg {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Contraseña" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"  {{ old('remember') ? 'checked' : '' }} style="width: auto;">
                                    <label class="form-check-label" for="remember">
                                        Recordarme
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button class="butn theme medium" type="submit"><span>Accesar</span></button>
                                    <p class="no-margin float-right"><a href="{{ route('password.request') }}">¿Olvistaste tu Contraseña?</a></p>
                                </div>
                            </div>
                        </div>
                        {!! Form::close()!!}
                    </div>
                    <div class="space20"></div>
                    <p class="text-center font-size16">
                        <a href="{{asset('register')}}">Eres socio SMACVE y aún no tienes cuenta, <span class="text-theme-color">registrate aqui.</span></a>
                    </p>
                </div>
            </div>

        </div>
    </section>
@endsection

@section('javascript')

@endsection


