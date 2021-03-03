@extends('layouts.template_00')

@section('css')

    <link href="{{asset('libraries/html5-upload-image/assets/css/html5imageupload.css')}}" rel="stylesheet"/>
    <link href="{{asset('libraries/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />


    <link href="{{asset('libraries/jQuery-TE_v.1.4.0/jquery-te-1.4.0.css')}}" rel="stylesheet"/>
    <link href="{{asset('libraries/bootstrap-switch/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css"  />
    <link href="{{asset('libraries/bootstrap-colorpicker-master/css/bootstrap-colorpicker.css')}}" rel="stylesheet" type="text/css"  />
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
                            <li class="breadcrumb-item"><a href="{{asset('admin/educacion_medica')}}">Educación Medica</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Nuevo Post</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    {!! Form::open(['url'=>'admin/educacion_medica','method' => 'POST', 'id'=>'FormNuevoPost','class'=>''])!!}
                    <div class="card">
                        <h5 class="card-header">
                            Datos Generales del Post
                        </h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="form-group {{ $errors->has('titulo') ? ' has-error' : '' }}">
                                        {!! Form::label('titulo', 'Titulo:') !!}
                                        {!! Form::text('titulo',null,['class'=>'form-control']) !!}
                                    </div>
                                    <div class="form-group {{ $errors->has('descripcion') ? ' has-error' : '' }}">
                                        {!! Form::label('descripcion', 'Descripcion:') !!}
                                        {!! Form::textArea('descripcion',null,['class'=>'form-control','rows'=>'5']) !!}
                                     </div>
                                     <div class="form-group">
                                         {!! Form::label('idTipoPost', 'Tipo Post:') !!}
                                         {!!Form::select('idTipoPost',$tipoPostList,null, ['class' => 'form-control','placeholder'=>"SELECCIONE TIPO POST"])!!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('idCategoriaPost', 'Categoría:') !!}
                                        {!!Form::select('idCategoriaPost',$categoriaPostList,null, ['class' => 'form-control','placeholder'=>"SELECCIONE CATEGORÍA"])!!}
                                    </div>
                                </div>
                                <div class="col-sm-5">

                                    <div class="form-group">
                                        {!! Form::label('fechaPublicacion', 'Fecha Publicación:') !!}
                                        <div style="display: block; position: relative;">
                                            <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                                <input id="fechaPublicacion" name="fechaPublicacion" type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
                                                <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                            <label id="fechaPublicacion-error" class="error" for="fechaPublicacion"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('autor', 'Autor:') !!}
                                        {!! Form::text('autor',null,['class'=>'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('premium', '¿Es Premium?') !!}<br/>
                                        <input type="checkbox" id="checkboxPremium" name="checkboxPremium">
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('prioridad', '¿Es prioritario?') !!}<br/>
                                        <input type="checkbox" id="checkboxPrioridad" name="checkboxPrioridad">
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('visible', '¿Esta Visible?') !!}<br/>
                                        <input type="checkbox" id="checkboxVisible" name="checkboxVisible" />
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('background_color_fondo', 'Color Barra Secundario :') !!}
                                        <div style="max-width: 250px;">
                                            <div id="cp2" class="input-group colorpicker-component">
                                                {!! Form::text('background_color_fondo','#333333',['class'=>'form-control']) !!}
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="input-group-addon"><i></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('background_color_texto', 'Color Barra Primario :') !!}
                                        <div style="max-width: 250px;">
                                            <div id="cp3" class="input-group colorpicker-component">
                                                {!! Form::text('background_color_texto','#272727',['class'=>'form-control']) !!}
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="input-group-addon"><i></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    {!! Form::label('thumb_values', 'Thumb:',['class'=>'']) !!}
                                    <div class="contenedor-upload-image">
                                        <div class="dropzone"
                                             data-width="600"
                                             data-ajax="false"
                                             data-height="500"
                                             data-canvas="true">
                                            <input type="file" name="thumb"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="space50"></div>
                    <div class="card">
                        <h5 class="card-header">
                           Contenido
                        </h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    {!! Form::text('editor','Contenido de la Publicación',['class'=>'form-control', 'id'=>'editor']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="space50"></div>
                    <div class="card">
                        <h5 class="card-header">
                            Imagen(s)
                        </h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group {{ $errors->has('imagen_file') ? ' has-error' : '' }}">
                                        {!! Form::label('imagen_file', 'Imagen:',['class'=>'col-sm-2 control-label']) !!}
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                {!! Form::text('imagen_text',null,['class'=>'form-control','id'=>'imagen_text']) !!}
                                                <div class="input-group-btn">
                                                    <button id="btnBuscarImagen" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Buscar Imagen">
                                                        <i class="fa fa-folder-open" aria-hidden="true"></i>&nbsp;Buscar...
                                                    </button>
                                                    <button id="btnUploadImagen" type="button" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Subir Imagen">
                                                        <i class="fa fa-upload" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            {!! Form::file('imagen_file',['class'=>'file-hidden','id'=>'imagen_file']) !!}
                                            <small>Tamaño de imagen aceptable: Ancho = 960px |  Alto = 450px </small>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="upload-loading-imagen">
                                                <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
                                                <span>Loading...</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="contenedor-imagenes"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="space50"></div>
                    <div class="card">
                        <h5 class="card-header">
                            Video(s)
                        </h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group {{ $errors->has('video') ? ' has-error' : '' }}">
                                        {!! Form::label('video', 'URL Video Youtube:',['class'=>'col-sm-2 control-label']) !!}
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                {!! Form::text('video_text',null,['class'=>'form-control','id'=>'video_text']) !!}
                                                <div class="input-group-btn">
                                                    <button id="btnAgregarVideo" type="button" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Agregar Video">
                                                        <i class="fa fa-upload" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="contenedor-videos"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right mt-5">
                        {!! Form::submit('GUARDAR', ['id'=>'btnGuardar','class' => 'btn btn-dark btn-lg']) !!}
                    </div>

                    {!! Form::close()!!}
                </div>
            </div>
        </div>
    </section>
@endsection


@section('javascript')
    <script src="{{asset('libraries/moment-develop/moment.js')}}" type="text/javascript"></script>
    <script src="{{asset('libraries/moment-develop/moment-with-locales.js')}}" type="text/javascript"></script>
    <script src="{{asset('libraries/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.js')}}" type="text/javascript" ></script>>

    <script src="{{ asset('libraries/html5-upload-image/assets/js/html5imageupload.js') }}"></script>

    <script src="{{asset('libraries/jQuery-TE_v.1.4.0/jquery-te-1.4.0.min.js')}}"></script>
    <script src="{{asset('libraries/bootstrap-switch/bootstrap-switch.min.js')}}" type="text/javascript" ></script>
    <script src="{{asset('libraries/bootstrap-colorpicker-master/js/bootstrap-colorpicker.min.js')}}" type="text/javascript" ></script>

    <script src="{{ asset('js/admin/educacion_medica/educacion_medica_create.js') }}"></script>
@endsection
