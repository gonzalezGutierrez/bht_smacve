@extends('layouts.template_01')

@section('title','Miembros SMACVE')

@section('content')

    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="{{asset('images/bg/bg_acerca_de.jpg')}}">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Miembros Activos</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="{{asset('/')}}">Inicio</a></li>
                        <li><a href="javascript:void(0)">Acerca de</a></li>
                        <li><a href="javascript:void(0)">Miembros SMACVE</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="search-doctor">
                        {!! Form::open(['url'=>'acerca_de/miembros','method' => 'GET', 'id'=>'FormSendMail','class'=>''])!!}
                        <div class="form-row align-items-center">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    {!! Form::label('idEstado', 'Estado:',['class'=>'sr-only']) !!}
                                    {!! Form::select('idEstado', $estados, $idEstado, ['placeholder' => 'TODOS','class'=>'form-control form-control-lg']) !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('search', 'search:',['class'=>'sr-only']) !!}
                                    {!! Form::text('search',$search,['class'=>'form-control form-control-lg','placeholder'=>'Buscar Especialista Certificado']) !!}
                                </div>
                            </div>
                            <div class="col-sm-3 text-left">
                                <div class="form-group">
                                    <button type="submit" class="butn"><span>Buscar</span></button>
                                </div>
                            </div>
                        </div>
                        {!! Form::close()!!}
                    </div>
                    <div class="total-items-search"> <h6>{{$miembros->total()}} Registros encontrados </h6></div>
                    @foreach($miembros as $miembro)
                        <div class="list-doctor">
                            <div class="row">
                                <div class="col-md-4 col-sm-12 sm-margin-20px-bottom">
                                    <div class=list-doctor-img>
                                        <img alt=img src="{{asset('images/miembros/'.$miembro->foto)}}" />
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-12">
                                    <div class="list-doctor-simple-text">
                                        <span>Socio SMACVE</span>
                                        @if(!empty($miembro->estado))
                                            <span> / {{$miembro->estado}}</span>
                                        @endif
                                        <h4>{{$miembro->titulo}} {{$miembro->apellidoPaterno}} {{$miembro->apellidoMaterno}} {{$miembro->nombre}}</h4>
                                        @if($miembro->compartirInformacion == 1)
                                        <ul class="meta">
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <i class="fas fa-phone"></i> {{$miembro->telOficina}}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <i class="fas fa-envelope"></i> {{$miembro->email}}
                                                </a>
                                            </li>
                                        </ul>
                                        <p>
                                            <strong>Cedula Profesional:</strong>{{$miembro->cedulaProfesional}} <br/>
                                            <strong>Cedula Especialidad:</strong>  {{$miembro->cedulaEspecialidad}}<br/>
                                            <strong>Lugar de Trabajo: </strong> {{$miembro->lugarTrabajo}}
                                        </p>
                                        <p>
                                            <strong>Dirección: </strong><br/>
                                            @if(!empty($miembro->titulo)){{$miembro->calle}} @endif
                                            @if(!empty($miembro->numExt)){{$miembro->numExt}} @endif
                                            @if(!empty($miembro->numInt)){{$miembro->numInt}} @endif
                                            @if(!empty($miembro->colonia)){{$miembro->colonia}} @endif
                                            @if(!empty($miembro->municipio)){{$miembro->municipio}} @endif
                                            @if(!empty($miembro->localidad)){{$miembro->localidad}} @endif
                                            @if(!empty($miembro->estado)){{$miembro->estado}} @endif
                                            @if(!empty($miembro->pais)){{$miembro->pais}} @endif
                                        </p>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="space30"></div>
                    {{ $miembros->appends(['idEstado' => $idEstado, 'search'=>$search])->links() }}
                </div>
                <div class="col-sm-4">
                    <div class="space30"></div>
                    <div class="section-heading">
                        <h6>
                            <strong class="font-size42">SMACVE</strong><br/>
                            Especialistas Certificados
                        </h6>
                    </div>
                    <p class="text-center">Un médico especialista en Angiología, Cirugía Vascular y Endovascular debidamente acreditado tiene certificación de un gran respaldo académico. </p>
                    <p class="text-center">En la <span class="text-theme-color font-weight-600">#SMACVE</span> garantizamos nuestro profesionalismo. </p>
                    <div class="space20"></div>
                    <img src="{{asset('images/acerca_de/capacitacion_academica.jpg')}}" class="img-fluid" />
                    <div class="space30"></div>
                    <p class="text-center">Somos una sociedad en crecimiento que fomenta los valores de sus miembros, quienes se mantienen en constante actualización con acciones académicas frecuentes.</p>
                    <p class="text-center">Únete a nosotros y ¡actualiza tus datos!</p>
                </div>
            </div>
        </div>
    </section>

    <input type="hidden" id="seccion_smacve" value="#btn-acerca-de" />

@endsection


@section('javascript')

@endsection