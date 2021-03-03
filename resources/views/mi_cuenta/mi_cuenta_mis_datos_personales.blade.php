@extends('layouts.template_01')

@section('title','Mi Cuenta')

@section('css')
    <link href="{{asset('libraries/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('libraries/html5-upload-image/assets/css/html5imageupload.css')}}" rel="stylesheet"/>
@endsection

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
                        <li><a href="javascript:void(0)">Editar Información Personal</a></li>
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
                            <li class="active"><a href="{{asset('mi_cuenta/mis_datos_personales')}}">Editar información Personal</a></li>
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
                        <h4>Editar Información Personal</h4>
                    </div>
                    <div class="space30"></div>
                        <div class="bg-white padding-20px-all sm-padding-20px-all border border-width-5">
                            {!!  Form::model($usuario,['url' => 'mi_cuenta/'.$usuario->idUsuario.'/update_mis_datos_personales', 'method' => 'PATCH',  'id' => 'FormEditarUsuario', 'class'=>'contact-form' ]) !!}
                            <div class="row justify-content-center">
                                <div class="col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                {!! Form::label('titulo', 'Titulo:',['class'=>'']) !!}
                                                {!! Form::text('titulo',null,['class'=>'form-control ','placeholder'=>'Titulo']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('nombre', 'Nombre:',['class'=>'']) !!}
                                        {!! Form::text('nombre',null,['class'=>'form-control ','placeholder'=>'Nombre']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('apellidoPaterno', 'Apellido Paterno:',['class'=>'']) !!}
                                        {!! Form::text('apellidoPaterno',null,['class'=>'form-control ','placeholder'=>'Apellido Paterno']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('apellidoMaterno', 'Apellido Materno:',['class'=>'']) !!}
                                        {!! Form::text('apellidoMaterno',null,['class'=>'form-control ','placeholder'=>'Apellido Materno']) !!}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-12">
                                            <div class="form-group">
                                                {!! Form::label('fechaNacimiento', 'Fecha Nacimiento:',['class'=>'']) !!}
                                                <div style="display: block; position: relative;">
                                                    <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                                        <input id="fechaNacimiento" name="fechaNacimiento" type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" placeholder="Fecha Nacimiento" value="{{date('d/m/Y',strtotime($usuario->fechaNacimiento))}}" readonly/>
                                                        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                    <label id="fechaNacimiento-error" class="error" for="fechaNacimiento"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="space20"></div>
                                    <div class="form-group">
                                        {!! Form::label('sexo', 'Sexo:',['class'=>'']) !!}
                                        {!!Form::select('sexo', array('M' => 'MASCULINO', 'F' => 'FEMENINO'),null, ['class' => 'form-control '])!!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('telOficina', 'Telefono Oficina:',['class'=>'']) !!}
                                        {!! Form::text('telOficina',null,['class'=>'form-control ','placeholder'=>'Telefono Oficina']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('thumb_values', 'Fotografía:',['class'=>'']) !!}
                                        <div class="contenedor-upload-image">
                                            <div class="dropzone"
                                                 data-width="300"
                                                 data-ajax="false"
                                                 data-height="300"
                                                 data-canvas="true"
                                                 data-image="{{ asset('images/miembros/'.$usuario->foto) }}" >
                                                <input type="file" name="thumb"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('email', 'E-mail:',['class'=>'']) !!}
                                        {!! Form::text('email',null,['class'=>'form-control ','placeholder'=>'E-mail']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('movil', 'Movil:',['class'=>'']) !!}
                                        {!! Form::text('movil',null,['class'=>'form-control ','placeholder'=>'Móvil']) !!}
                                    </div>
                                    <div class="space20"></div>
                                </div>
                            </div>
                            <hr/>
                            <div class="row justify-content-center">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('resumenCV', 'Resumen Curricular:',['class'=>'']) !!}
                                        {!! Form::textArea('resumenCV',null,['class'=>'form-control ','placeholder'=>'Breve Resumen Curricular','rows'=>5]) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('universidad', 'Universidad:',['class'=>'']) !!}
                                        {!! Form::text('universidad',null,['class'=>'form-control ','placeholder'=>'Universidad']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('especialidad', 'Especialidad:',['class'=>'']) !!}
                                        {!! Form::text('especialidad',null,['class'=>'form-control ','placeholder'=>'Especialidad']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('cedulaProfesional', 'Cedula Profesional:',['class'=>'']) !!}
                                        {!! Form::text('cedulaProfesional',null,['class'=>'form-control','placeholder'=>'Cedula Profesional']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('cedulaEspecialidad', 'Cedula Especialidad:',['class'=>'']) !!}
                                        {!! Form::text('cedulaEspecialidad',null,['class'=>'form-control','placeholder'=>'Cedula Especialidad']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('lugarTrabajo', 'Lugar de Trabajo:',['class'=>'']) !!}
                                        {!! Form::text('lugarTrabajo',null,['class'=>'form-control ','placeholder'=>'Lugar de Trabajo']) !!}
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="space20"></div>
                            <div class="row justify-content-center">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('calle', 'Calle:',['class'=>'']) !!}
                                        {!! Form::text('calle',null,['class'=>'form-control ','placeholder'=>'Calle o Avenida']) !!}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('noExt', 'noExt:',['class'=>'']) !!}
                                                {!! Form::text('noExt',null,['class'=>'form-control ','placeholder'=>'No. Exterior']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('noInt', 'noInt:',['class'=>'']) !!}
                                                {!! Form::text('noInt',null,['class'=>'form-control ','placeholder'=>'No. Interior']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('colonia', 'Colonia:',['class'=>'']) !!}
                                        {!! Form::text('colonia',null,['class'=>'form-control ','placeholder'=>'Colonia, Fraccionamiento, etc']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('municipio', 'Municipio:',['class'=>'']) !!}
                                        {!! Form::text('municipio',null,['class'=>'form-control ','placeholder'=>'Municipio']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('localidad', 'Localidad:',['class'=>'']) !!}
                                        {!! Form::text('localidad',null,['class'=>'form-control ','placeholder'=>'Localidad']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        {!! Form::label('idEstado', 'Estado:',['class'=>'']) !!}
                                        {!! Form::select('idEstado', $estados, null, ['placeholder' => 'Estado','class'=>'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('idPais', 'País:',['class'=>'']) !!}
                                        {!! Form::select('idPais', $paises, null, ['placeholder' => 'País','class'=>'form-control']) !!}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('codigoPostal', 'Código Postal:',['class'=>'']) !!}
                                                {!! Form::text('codigoPostal',null,['class'=>'form-control ','placeholder'=>'Código Postal']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <div class="form-group">
                                        <button class="butn theme medium" type="submit"><span>Actualizar</span></button>
                                    </div>
                                </div>
                            </div>
                            {!!  Form::close() !!}
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

    <script src="{{ asset('libraries/html5-upload-image/assets/js/html5imageupload.js') }}"></script>
    <script src="{{asset('libraries/moment-develop/moment.js')}}" type="text/javascript"></script>
    <script src="{{asset('libraries/moment-develop/moment-with-locales.js')}}" type="text/javascript"></script>
    <script src="{{asset('libraries/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.js')}}" type="text/javascript" ></script>



    <script type="text/javascript" src="{{ asset('js/mi_cuenta/mi_cuenta_mis_datos_personales.js') }}"></script>
@endsection