@extends('layouts.template_01')

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
                        <li><a href="{{asset('mi_cuenta/anualidades')}}">Anualidades</a></li>
                        <li><a href="javascript:void(0)">Pago con tarjeta</a>
                    </ul>
                </div>
            </div>

        </div>
    </section>

    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-sm-12 padding-50px-right md-padding-30px-right sm-padding-15px-right">
                    <h6 class="font-weight-700 font-size16 sm-font-size14 text-uppercase left-title margin-20px-bottom">MI CUENTA</h6>
                    <div class="single-sidebar-menu">
                        <ul class="no-margin">
                            <li><a href="{{asset('mi_cuenta')}}">Mi Cuenta</a></li>
                            <li><a href="{{asset('mi_cuenta/herramientas_para_socios')}}">Herramientas para el Socio</a></li>
                            <li class="active"><a href="{{asset('mi_cuenta/anualidades')}}">Mis Anualidades</a></li>
                            <li><a href="{{asset('mi_cuenta/informacion_pago')}}">Información para Pago</a></li>
                            <li><a href="{{asset('mi_cuenta/mis_datos_personales')}}">Editar información Personal</a></li>
                            <li><a href="{{asset('mi_cuenta/edit_password')}}">Cambiar Contraseña</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 col-sm-12">
                    <div class="bg-white padding-30px-all sm-padding-20px-all border border-width-5">
                        <div class="text-center section-heading">
                            <h4>Pago de anualidad</h4>

                        </div>
                        {!! Form::open(['url'=>'mi_cuenta/payment/'.$idAnualidad,'method' => 'POST', 'id'=>'FormRegister','class'=>'contact-form','id'=>'formPay'])!!}
                        <input type="hidden"  name="inputTokenHidden" id="inputTokenHidden">
                        <input type="hidden"  name="inputDeviceSessionIdHidden" id="inputDeviceSessionIdHidden">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    {!! Form::label('numeroTarjeta', 'Numero de tarjeta:',['class'=>'label-bold']) !!}
                                    <input id="numeroTarjeta" type="text " class="form-control form-control-lg {{ $errors->has('numeroTarjeta') ? ' is-invalid' : '' }}" name="numeroTarjeta" value="{{ old('numeroTarjeta') }}" required autofocus>
                                    @if ($errors->has('numeroTarjeta'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('numeroTarjeta') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-lg-8 col-xs-12 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Mes de expiración</label>
                                            {!! Form::select('month_expiration',[1=>'Enero',2=>'Febrero',3=>'Marzo',4=>'Abril',5=>'Mayo',6,'Junio',7=>'Julio',8=>'Agosto',9=>'Septiembre',10=>'Octubre',11=>'Noviembre',12=>'Diciembre'],'',['placeholder'=>'Mes','class'=>'form-control form-control-lg','id'=>'month_expiration']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Año de expiración</label>
                                            {!! Form::select('year_expiration',[21=>'2021',22=>'2022',23=>'2023',24=>'2024',25=>'2025'],'',['placeholder'=>'Año','class'=>'form-control form-control-lg','id'=>'year_expiration']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">CVV</label>
                                    <input type="text" name="cvv" id="cvv" placeholder="Obligatorio" class="form-control form-control-lg">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    {!! Form::label('nombreCompleto', 'Nombre del titular:') !!}
                                    <input id="nombreCompleto" type="text"  value="" class="form-control form-control-lg {{ $errors->has('nombreCompleto') ? ' is-invalid' : '' }}" name="nombreCompleto" placeholder="Como aparece en la tarjeta" required>
                                    @if ($errors->has('nombreCompleto'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombreCompleto') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button class="butn theme large" id="btnPayment"  type="button"><span>Pagar</span></button>
                                </div>
                            </div>
                        </div>
                        {!! Form::close()!!}
                    </div>

                    <div class="space30"></div>
                </div>
            </div>
        </div>
    </section>

@stop

@section("javascript")

    <script type="text/javascript" src="https://openpay.s3.amazonaws.com/openpay.v1.min.js">
    </script>

    <script type='text/javascript' src="https://openpay.s3.amazonaws.com/openpay-data.v1.min.js">
    </script>

    <script src="{{asset('js/mi_cuenta/openpay/payment.js')}}"></script>

    <script>
        $(document).ready(function(){
            let payment = new Payment();
        });
    </script>
@stop