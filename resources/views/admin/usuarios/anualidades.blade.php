@extends('layouts.template_00')

@section('title','Cambiar Password Usuario')

@section('css')
    <link rel="stylesheet" href="{{asset('libraries/jquery-filestyle-2.1.0/jquery-filestyle.css')}} " />
@endsection

@section('content')
    <section class="header-page mb-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent">
                            <li class="breadcrumb-item"><a href="{{asset('inicio')}}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{asset('admin')}}">Administración</a></li>
                            <li class="breadcrumb-item"><a href="{{asset('admin/usuarios')}}">Usuarios</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pago de Anualidades</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section>
        @if (session('status_success'))
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-10">
                        <div class="alert alert-success">
                            {{ session('status_success') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if (session('status_fail'))
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-10">
                        <div class="alert alert-danger">
                            {{ session('status_fail') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-8">
                    <div class="space30"></div>
                    <h4>
                        [{{$usuario->idUsuario}}] - {{$usuario->titulo}} {{$usuario->nombre}} {{$usuario->apellidoPaterno}} {{$usuario->apellidoMaterno}}<br/>
                        <small class="text-muted">Historial de Pago de Anualidades</small>
                        <small class="text-muted" style="font-size: 12px;">Miembro desde {{$usuario->miembroDesde}}</small>
                    </h4>
                    <div class="space30"></div>
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                        <tr>
                            <th class="text-center">Anualidad</th>
                            <th class="text-right">Costo</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Acción</th>
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
                                        <td class="text-center">
                                            <button type="button" onclick="javascript:registrarPago('{{$anualidad->idAnualidad}}','{{$anualidad->anualidad}}','{{$anualidad->idStatusPago}}')"  class="btn btn-link" data-toggle="tooltip" data-placement="top" title="Cambiar Status Anualidad">
                                                <i class="fas fa-money-check-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div class="space50"></div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('modal')
    <div id="registrarPagoModal" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                {!! Form::open(['url'=>'admin/usuarios/'.$usuario->idUsuario.'/registrar_pago_anualidad','method' => 'PATCH', 'id'=>'FormRegistrarPago','role'=>'form','files' => true])!!}
                <div class="modal-header bg-dark color-white">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Anualidad <span id="anualidad"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::label('idAnualidad', 'idAnualidad:',['class'=>'sr-only']) !!}
                        {!! Form::hidden('idAnualidad',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('idStatusPago', 'Status Pago:',['class'=>'']) !!}
                        {!! Form::select('idStatusPago', $statusPagosList, null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="space10"></div>
                    <div class="form-group">
                        {!! Form::label('comprobantePago', 'Comprobante de Pago:') !!}<br/>
                        {!! Form::file('comprobantePago') !!}
                        <p class="help-block"><small>* Solo se permiten archivos con extensión JPG PNG ó PDF.</small></p>
                        <label id="comprobantePago-error" class="error" for="comprobantePago"></label>
                    </div>
                    <div class="form-group">
                        {!! Form::label('observaciones', 'Observaciones:',['class'=>'']) !!}
                        {!! Form::textArea('observaciones', null, ['class'=>'form-control','rows'=>'3']) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
                {!! Form::close()!!}
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript" src="{{ asset('libraries/jquery-filestyle-2.1.0/jquery-filestyle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/usuarios/usuarios_anualidades.js') }}"></script>
@endsection
