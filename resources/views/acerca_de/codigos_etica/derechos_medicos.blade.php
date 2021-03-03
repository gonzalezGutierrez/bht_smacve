@extends('layouts.template_01')

@section('title','Códigos de Ética')

@section('content')

    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="{{asset('images/bg/bg_acerca_de.jpg')}}">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Derechos de los Médicos</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="{{asset('/')}}">Inicio</a></li>
                        <li><a href="javascript:void(0)">Acerca de</a></li>
                        <li><a href="javascript:void(0)">Códigos de Ética</a></li>
                        <li><a href="javascript:void(0)">Derechos de los Médicos</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-sm-12 padding-50px-right md-padding-30px-right sm-padding-15px-right">
                    <h6 class="font-weight-700 font-size16 sm-font-size14 text-uppercase left-title margin-20px-bottom">CÓDIGOS DE ÉTICA</h6>
                    <div class="single-sidebar-menu">
                        <ul class="no-margin">
                            <li><a href="{{asset('acerca_de/codigos_etica/mesa_directiva')}}">Mesa Directiva</a></li>
                            <li class="active"><a href="{{asset('acerca_de/codigos_etica/derechos_medicos')}}">Médicos</a></li>
                            <li><a href="{{asset('acerca_de/codigos_etica/derechos_pacientes')}}">Pacientes</a></li>
                            <li><a href="{{asset('acerca_de/codigos_etica/aviso_privacidad')}}">Aviso de Privacidad</a></li>
                            <li><a href="{{asset('acerca_de/codigos_etica/politica_conflictos')}}">Política sobre Conflictos</a></li>
                        </ul>
                    </div>
                    <div class="bg-img cover-background theme-overlay border-radius-5 margin-30px-bottom sm-margin-25px-bottom" data-overlay-dark="8" data-background="{{asset('images/bg/bg2.jpg')}}" >
                        <div class="position-relative z-index-9 text-center padding-50px-tb md-padding-40px-tb sm-padding-30px-tb padding-30px-lr">
                            <i class="fas fa-headset font-size50 md-font-size46 sm-font-size42 text-white margin-15px-bottom"></i>
                            <h5 class="text-white font-weight-600 margin-5px-bottom">¿Tienes alguna duda?</h5>
                            <p class="text-white font-weight-500">¡Contáctanos!</p>
                            <div class="bg-white separator-line-horrizontal-full opacity3 margin-20px-bottom sm-margin-15px-bottom"></div>
                            <ul class="text-center no-padding no-margin">
                                <li class="text-white margin-5px-bottom"><i class="fa fa-phone font-size16 text-white margin-15px-right"></i><a href="tel:015526147849 " class="text-white">01 55 2614 7849</a></li>
                                <li class="text-white"><i class="fa fa-envelope-open font-size16 text-white margin-15px-right"></i><a href="mailto:mail@example.com" class="text-white">atencionalsocio@smacve.org.mx</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 col-sm-12">
                    <div class="section-heading">
                        <h3>Derechos Generales de los Médicos</h3>
                    </div>
                    <ul class="fa-ul list-derechos">
                        <li><span class="fa-li" ><i class="fas fa-long-arrow-alt-right"></i></span>
                            Ejercer la profesión en forma libre, sin presiones y en igualdad de condiciones interprofesionales.
                        </li>
                        <li><span class="fa-li" ><i class="fas fa-long-arrow-alt-right"></i></span>
                            Laborar en instalaciones apropiadas y seguras, que garanticen la seguridad e integridad personal y profesional.
                        </li>
                        <li><span class="fa-li" ><i class="fas fa-long-arrow-alt-right"></i></span>
                            Contar con los recursos necesarios para el óptimo desempeño de sus funciones.
                        </li>
                        <li><span class="fa-li" ><i class="fas fa-long-arrow-alt-right"></i></span>
                            Abstenerse de garantizar resultados y proporcionar información que sobrepase su competencia profesional y laboral.
                        </li>
                        <li><span class="fa-li" ><i class="fas fa-long-arrow-alt-right"></i></span>
                            Recibir trato digno y respetuoso por parte de pacientes y sus familiares, así como del personal relacionado con su trabajo, independientemente del nivel jerárquico.
                        </li>
                        <li><span class="fa-li" ><i class="fas fa-long-arrow-alt-right"></i></span>
                            Tener acceso a la actualización profesional en igualdad de oportunidades para su desarrollo personal y a actividades de investigación y docencia de acuerdo con su profesión y competencias.
                        </li>
                        <li><span class="fa-li" ><i class="fas fa-long-arrow-alt-right"></i></span>
                            Asociarse libremente para promover sus intereses profesionales.
                        </li>
                        <li><span class="fa-li" ><i class="fas fa-long-arrow-alt-right"></i></span>
                            Salvaguardar su prestigio e intereses profesionales.
                        </li>
                        <li><span class="fa-li" ><i class="fas fa-long-arrow-alt-right"></i></span>
                            Tener acceso a posiciones de toma de decisión de acuerdo con sus competencias.
                        </li>
                        <li><span class="fa-li" ><i class="fas fa-long-arrow-alt-right"></i></span>
                            Recibir de forma oportuna y completa la remuneración que corresponda por los servicios prestados.
                        </li>
                    </ul>


                </div>

            </div>
        </div>
    </section>

    <input type="hidden" id="seccion_smacve" value="#btn-acerca-de" />

@endsection


@section('javascript')

@endsection