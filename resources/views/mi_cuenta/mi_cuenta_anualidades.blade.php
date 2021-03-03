@extends('layouts.template_01')

@section('title','Mi Cuenta')

@section('css')
    <style>
        .btn-open-pay{
            background-color: #2C3742;
            display: inline-block;
            font-weight: 400;
            color: white;
            text-align: center;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: 1px solid transparent;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: .25rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
    </style>
@stop

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
                        <li><a href="javascript:void(0)">Anualidades</a></li>
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
                            <li class="active"><a href="{{asset('mi_cuenta/anualidades')}}">Mis Anualidades</a></li>
                            <li><a href="{{asset('mi_cuenta/informacion_pago')}}">Información para Pago</a></li>
                            <li><a href="{{asset('mi_cuenta/mis_datos_personales')}}">Editar información Personal</a></li>
                            <li><a href="{{asset('mi_cuenta/edit_password')}}">Cambiar Contraseña</a></li>
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
                        <h4>Historial de Anualidades</h4>
                    </div>
                    <p class="text-justify">Estimado <strong>{{$usuario->titulo}} {{$usuario->nombre}} {{$usuario->apellidoPaterno}} {{$usuario->apellidoMaterno}}</strong>,
                        a continuación te enlistamos el historial de tus pagos hechos por concepto de anualidad, si aún no te encuentras al corriente,
                        por favor ayúdanos haciendolo a la brevedad.

                        Para informes de pago comunicarse a las oficinas de la sociedad:
                    </p>
                    <ul>
                            <li><strong>Telefono:</strong> 01 55 2614 7849</li>
                            <li><strong>Mail:</strong> atencionalsocio@smacve.org.mx</li>
                            <li><strong>Whatsapp:</strong> +52 1 55 8681 9072</li>
                        </ul>

                    <div class="space30"></div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th class="text-center">Anualidad</th>
                                <th class="text-right">Costo</th>
                                <th class="text-center">Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($anualidades))
                                @foreach($anualidades as $anualidad)
                                    <tr>
                                        <td class="text-center"><strong>Anualidad {{$anualidad->anualidad}}</strong></td>
                                        <td class="text-right">$ {{ number_format($anualidad->costo,2)}}</td>
                                        <td class="text-center">
                                            <span class="badge {{$anualidad->badgeStatusPago}}">{{$anualidad->statusPago}}</span>
                                        </td>
                                        <td class="text-center d-flex justify-content-between">
                                            @if($anualidad->idStatusPago == 1)
                                                <a href="{{asset('mi_cuenta_pay_with_paypal/usuario/'.$usuario->idUsuario.'/anualidad/'.$anualidad->idAnualidad)}}" class="btn btn-success btn-sm">
                                                    Pagar vía Paypal
                                                </a>

                                                <a href="{{asset('mi_cuenta/informacion_pago')}}" class="btn btn-primary btn-sm">
                                                    Transferencia o Deposito
                                                </a>

                                                <a href="{{asset('mi_cuenta/payment/'.$anualidad->idAnualidad.'/credit_card')}}" class="btn-open-pay btn-sm">Pago vía openpay</a>

                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="space30"></div>
                </div>
            </div>
        </div>
    </section>

    <input type="hidden" id="seccion_smacve" value="#btn-atencion-al-socio" />

@endsection


@section('javascript')

@endsection