@extends('layouts.template_01')
@section('title','Proveedores')

@section('css')

@stop

@section('content')


    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="{{asset('images/bg/educacion_medica.jpg')}}">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Contenido Científico</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="{{asset('/')}}">Inicio</a></li>
                        <li><a href="{{asset('educacion_medica')}}">Contenido Científico</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>

    <section>
        <div class="container">
            <div class="bg-white padding-30px-all sm-padding-20px-all border border-width-5">
                <div class="text-center text-uppercase section-heading">
                    <h4>Actualizar proveedor</h4>
                </div>
                @include('proveedores.form')
            </div>
        </div>
    </section>


@stop
