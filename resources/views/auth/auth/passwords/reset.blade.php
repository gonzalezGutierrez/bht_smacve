
@extends('layouts.template_01')

@section('title','Cambiar Contraseña')

@section('css')

@endsection


@section('content')
    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="{{asset('images/bg/bg_login.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Recuperar Contraseña</h1>
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
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="bg-white padding-30px-all sm-padding-20px-all border border-width-5">
                        <div class="text-center section-heading">
                            <h4><i class="fas fa-envelope"></i></h4>
                        </div>
                        {!! Form::open(['url'=>'password/reset','method' => 'POST', 'id'=>'FormRegister','class'=>'contact-form'])!!}

                        <input type="hidden" name="token" value="{{ $token }}">

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
                                    <input id="password" type="password" class="form-control form-control-lg {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Nueva Contraseña" required>
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
                                <div class="form-group">
                                    {!! Form::label('password-confirm', 'Password Confirm:',['class'=>'sr-only']) !!}
                                    <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" placeholder="Confirmar Nueva Contraseña" required>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-12 text-center">
                                <div class="form-group mt-4">
                                    <button class="butn theme medium" type="submit"><span>Cambiar Contraseña</span></button>
                                </div>
                            </div>
                        </div>
                        {!! Form::close()!!}
                    </div>
                </div>
            </div>



        </div>
    </section>
@endsection

@section('javascript')

@endsection
