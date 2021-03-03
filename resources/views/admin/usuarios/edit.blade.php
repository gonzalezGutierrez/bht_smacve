@extends('layouts.template_00')

@section('title','Editar Usuario')

@section('css')
    <link href="{{asset('libraries/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('libraries/html5-upload-image/assets/css/html5imageupload.css')}}" rel="stylesheet"/>
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
                            <li class="breadcrumb-item active" aria-current="page">Editar Usuario</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-8">
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li class="alert-link">{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <br/>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    {!! Form::model($usuario,['url'=>'admin/usuarios/'.$usuario->idUsuario,'method' => 'PATCH', 'id'=>'FormEditarUsuario','class'=>''])!!}
                    <div class="card">
                        <h5 class="card-header">
                            Datos Generales del Usuario
                        </h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                {!! Form::label('titulo', 'Titulo:',['class'=>'sr-only']) !!}
                                                {!! Form::text('titulo',null,['class'=>'form-control ','placeholder'=>'Titulo']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                {!! Form::label('nombre', 'Nombre:',['class'=>'sr-only']) !!}
                                                {!! Form::text('nombre',null,['class'=>'form-control ','placeholder'=>'Nombre']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                {!! Form::label('apellidoPaterno', 'Apellido Paterno:',['class'=>'sr-only']) !!}
                                                {!! Form::text('apellidoPaterno',null,['class'=>'form-control ','placeholder'=>'Apellido Paterno']) !!}
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                {!! Form::label('apellidoMaterno', 'Apellido Materno:',['class'=>'sr-only']) !!}
                                                {!! Form::text('apellidoMaterno',null,['class'=>'form-control ','placeholder'=>'Apellido Materno']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                {!! Form::label('fechaNacimiento', 'Fecha Nacimiento:',['class'=>'sr-only']) !!}
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
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                {!! Form::label('sexo', 'Sexo:',['class'=>'sr-only']) !!}
                                                {!!Form::select('sexo', array('M' => 'MASCULINO', 'F' => 'FEMENINO'),null, ['class' => 'form-control '])!!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                {!! Form::label('telOficina', 'Telefono Oficina:',['class'=>'sr-only']) !!}
                                                {!! Form::text('telOficina',null,['class'=>'form-control ','placeholder'=>'Telefono Oficina']) !!}
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                {!! Form::label('movil', 'Movil:',['class'=>'sr-only']) !!}
                                                {!! Form::text('movil',null,['class'=>'form-control ','placeholder'=>'Móvil']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                {!! Form::label('email', 'E-mail:',['class'=>'sr-only']) !!}
                                                {!! Form::text('email',null,['class'=>'form-control ','placeholder'=>'E-mail']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                {!! Form::label('resumenCV', 'Resumen Curriculum:',['class'=>'sr-only']) !!}
                                                {!! Form::textArea('resumenCV',null,['class'=>'form-control ','placeholder'=>'Breve Resumen Curricular','rows'=>5]) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                {!! Form::label('universidad', 'Universidad:',['class'=>'sr-only']) !!}
                                                {!! Form::text('universidad',null,['class'=>'form-control ','placeholder'=>'Universidad']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                {!! Form::label('especialidad', 'Especialidad:',['class'=>'sr-only']) !!}
                                                {!! Form::text('especialidad',null,['class'=>'form-control ','placeholder'=>'Especialidad']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('cedulaProfesional', 'Cedula Profesional:',['class'=>'sr-only']) !!}
                                                {!! Form::text('cedulaProfesional',null,['class'=>'form-control','placeholder'=>'Cedula Profesional']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('cedulaEspecialidad', 'Cedula Especialidad:',['class'=>'sr-only']) !!}
                                                {!! Form::text('cedulaEspecialidad',null,['class'=>'form-control','placeholder'=>'Cedula Especialidad']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                {!! Form::label('lugarTrabajo', 'Lugar de Trabajo:',['class'=>'sr-only']) !!}
                                                {!! Form::text('lugarTrabajo',null,['class'=>'form-control ','placeholder'=>'Lugar de Trabajo']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                {!! Form::label('miembroDesde', 'Miembro Desde:',['class'=>'sr-only']) !!}
                                                {!! Form::text('miembroDesde',null,['class'=>'form-control ','placeholder'=>'Año de Ingreso a Sociedad']) !!}
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                {!! Form::label('socio', 'Socio:',['class'=>'sr-only']) !!}
                                                {!! Form::text('socio',null,['class'=>'form-control ','placeholder'=>'No. Socio']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                {!! Form::label('calle', 'Calle:',['class'=>'sr-only']) !!}
                                                {!! Form::text('calle',null,['class'=>'form-control ','placeholder'=>'Calle o Avenida']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                {!! Form::label('noExt', 'noExt:',['class'=>'sr-only']) !!}
                                                {!! Form::text('noExt',null,['class'=>'form-control ','placeholder'=>'No. Exterior']) !!}
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                {!! Form::label('noInt', 'noInt:',['class'=>'sr-only']) !!}
                                                {!! Form::text('noInt',null,['class'=>'form-control ','placeholder'=>'No. Interior']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                {!! Form::label('colonia', 'Colonia:',['class'=>'sr-only']) !!}
                                                {!! Form::text('colonia',null,['class'=>'form-control ','placeholder'=>'Colonia, Fraccionamiento, etc']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                {!! Form::label('municipio', 'Municipio:',['class'=>'sr-only']) !!}
                                                {!! Form::text('municipio',null,['class'=>'form-control ','placeholder'=>'Municipio']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                {!! Form::label('localidad', 'Localidad:',['class'=>'sr-only']) !!}
                                                {!! Form::text('localidad',null,['class'=>'form-control ','placeholder'=>'Localidad']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                {!! Form::label('idEstado', 'Estado:',['class'=>'sr-only']) !!}
                                                {!! Form::select('idEstado', $estados, null, ['placeholder' => 'Estado','class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                {!! Form::label('idPais', 'País:',['class'=>'sr-only']) !!}
                                                {!! Form::select('idPais', $paises, null, ['placeholder' => 'País','class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                {!! Form::label('codigoPostal', 'Código Postal:',['class'=>'sr-only']) !!}
                                                {!! Form::text('codigoPostal',null,['class'=>'form-control ','placeholder'=>'Código Postal']) !!}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-12">
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
                                    </div>

                                    <h3>Credenciales de Acceso</h3>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                {!! Form::label('idRol', 'Rol:',['class'=>'sr-only']) !!}
                                                {!!Form::select('idRol',$roles_lists,null, ['class' => 'form-control'])!!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                {!! Form::label('idCargo', 'Cargo:',['class'=>'sr-only']) !!}
                                                {!!Form::select('idCargo',$cargos_lists,null, ['class' => 'form-control'])!!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                {!! Form::label('idStatusSocio', 'Status Socio:',['class'=>'sr-only']) !!}
                                                {!!Form::select('idStatusSocio',$status_lists,null, ['class' => 'form-control'])!!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="space30"></div>
                                    <div class="row">
                                        <div class="col-sm-12 text-right">
                                            <div class="form-group">
                                                {!! Form::submit('Actualizar', ['id'=>'btnEnviar','class' => 'btn btn-dark btn-lg']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space50"></div>

                    {!! Form::close()!!}
                </div>
            </div>
        </div>
    </section>

@endsection


@section('javascript')
    <script src="{{ asset('libraries/html5-upload-image/assets/js/html5imageupload.js') }}"></script>
    <script src="{{asset('libraries/moment-develop/moment.js')}}" type="text/javascript"></script>
    <script src="{{asset('libraries/moment-develop/moment-with-locales.js')}}" type="text/javascript"></script>
    <script src="{{asset('libraries/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.js')}}" type="text/javascript" ></script>

    <script src="{{ asset('js/admin/usuarios/usuarios_edit.js') }}"></script>
@endsection
