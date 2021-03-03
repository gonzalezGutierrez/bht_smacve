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
                        <li><a href="javascript:void(0)">Información para Pago</a></li>
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
                            <li class="active"><a href="{{asset('mi_cuenta/informacion_pago')}}">Información para Pago</a></li>
                            <li><a href="{{asset('mi_cuenta/mis_datos_personales')}}">Editar información Personal</a></li>
                            <li><a href="{{asset('mi_cuenta/edit_password')}}">Cambiar Contraseña</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 col-sm-12">
                    <div class="section-heading half left">
                        <h4>Informacion para Pagos</h4>
                    </div>
                    <p class="text-justify">Estimado <strong>{{$usuario->titulo}} {{$usuario->nombre}} {{$usuario->apellidoPaterno}} {{$usuario->apellidoMaterno}}</strong>,
                        A continuación te dejamos la información necesaria para que puedas realizar tu deposito o transferencia electrónica.
                    </p>
                    <p>Te recordamos que después de realizar tu deposito o transferencia electrónica, es necesario nos envíes el comprobante de pago al correo atencionalsocio@smacve.org.mx</p>
                    <div class="space30"></div>
                    <div class="col-md-12 margin-60px-bottom xs-margin-30px-bottom">
                        <div class="border-left border-width-3 padding-25px-all xs-padding-20px-all">
                            <p class="font-italic">
                                <strong>Titular de la Cuenta:</strong> Sociedad Mexicana de Angiología Cirugía Vascular y Endovascular, A.C. <br/>
                                <strong>Banco:</strong> BBVA Bancomer <br/>
                                <strong>No Cuenta:</strong>  0482240564 <br/>
                                <strong>Clabe:</strong>  012180004822405645 <br/>
                            </p>
                            <h6 class="font-size13 text-uppercase font-weight-600 no-margin">-  Mesa Directiva SMACVE</h6>
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

@endsection