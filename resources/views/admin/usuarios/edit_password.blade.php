@extends('layouts.template_00')

@section('title','Cambiar Password Usuario')

@section('css')

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
                            <li class="breadcrumb-item active" aria-current="page">Cambiar Password Usuario</li>
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
            <div class="row justify-content-center">
                <div class="col-sm-8">
                    {!! Form::model($usuario,['url'=>'admin/usuarios/'.$usuario->idUsuario.'/updated_password','method' => 'PATCH', 'id'=>'FormCambiarPasswordUsuario','class'=>''])!!}
                    <div class="card">
                        <h5 class="card-header">
                            Credenciales de Acceso
                        </h5>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        {!! Form::label('nombreCompleto', 'Nombre:',['class'=>'sr-only']) !!}
                                        {!! Form::text('nombreCompleto',$usuario->nombre.' '.$usuario->apellidoPaterno.' '.$usuario->apellidoMaterno,['class'=>'form-control','readonly'=>'readonly','placeholder'=>'nombreCompleto']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('email', 'Email:',['class'=>'sr-only']) !!}
                                        {!! Form::text('email',null,['class'=>'form-control','readonly'=>'readonly','placeholder'=>'nombreCompleto']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('password', 'Contraseña:',['class'=>'sr-only']) !!}
                                        {!! Form::password('password',['class'=>'form-control ','placeholder'=>'Contraseña']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('password_confirmation', 'Confirmar Contraseña:',['class'=>'sr-only']) !!}
                                        {!! Form::password('password_confirmation',['class'=>'form-control ','placeholder'=>'Confirmar Contraseña']) !!}
                                    </div>
                                    <div class="space30"></div>
                                    <div class="form- text-right">
                                        {!! Form::submit('Actualizar', ['id'=>'btnEnviar','class' => 'btn btn-dark btn-lg']) !!}
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
    <script src="{{ asset('js/admin/usuarios/usuarios_edit_password.js') }}"></script>
@endsection
