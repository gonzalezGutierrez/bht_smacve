@extends('layouts.template_00')

@section('css')

@endsection

@section('content')
    <section class="header-page">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent">
                            <li class="breadcrumb-item"><a href="{{asset('inicio')}}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Administración</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <div class="space50"></div>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="title-2">Bienvenidos</h3>
                    <p class="lead text-justify">
                        Estimado <strong>{{ Auth::user()->nombre }} {{ Auth::user()->apellidoPaterno }} {{ Auth::user()->apellidoMaterno }}</strong>,
                        te encuentras dentro del área de administración de la WEB PAGE SMACVE 2019-2020. Por favor, haz uso responsable de este sitio, ayudanos a cuidar la integridad y a preservar los valores de esta organización.
                    </p>
                    <p>Atentamente</p>
                    <p>
                        <strong>COMITÉ DIRECTIVO SMACVE</strong><br/>
                        <small>2019-2020</small>
                    </p>
                </div>
            </div>
            <div class="space40"></div>
            <div class="row">
                <div class="col-sm-12">
                   <a class="btn btn-outline-dark" href="{{asset('admin/usuarios')}}">Usuarios</a>
                   <a class="btn btn-outline-dark" href="{{asset('admin/transmisiones')}}">Transmisiones</a>
                   <a class="btn btn-outline-dark" href="{{asset('admin/educacion_medica')}}">Educación Médica</a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('javascript')

@endsection