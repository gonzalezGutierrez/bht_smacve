@extends('layouts.template_01')

@section('title','Comité de promoción y profesionalización de la investigación')

@section('css')

    <style>
        .text-link {
            color:#d0ad55 !important;

            word-wrap: break-word;
            word-break: break-all;
        }

        .image-book {
            width: 40%;
            height: 40%;
        }
    </style>

@stop

@section('content')

    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="{{asset('images/bg/bg_mi_cuenta.jpg')}}">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Comité de promoción y profesionalización de la investigación</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="{{asset('/')}}">Inicio</a></li>
                        <li><a href="javascript:void(0)">Comité de promoción y profesionalización de la investigación</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>

    <section class="container">
        <div class="section-heading">
            <h3>Promoción y Profesionalización de la Investigación.<br>
                <small>Coordinador:  Dr. Gabriel López Peña</small>
            </h3>
        </div>
        <div class="space30"></div>
        <div class="row">
            <div class="col-lg-4 col-md-5 col-sm-12 padding-50px-right md-padding-30px-right sm-padding-15px-right">
                <h6 class="font-weight-700 font-size16 sm-font-size14 text-uppercase left-title margin-20px-bottom">Proyectos</h6>
                <div class="single-sidebar-menu">
                    <ul class="no-margin">
                        <li class="@if($section=='proyectos_nacionales') active @endif"><a href="{{asset('investigacion/comite_promocion/proyectos_nacionales')}}">Proyectos nacionales</a></li>
                        <li class="@if($section=='proyectos_internacionales') active @endif"><a href="{{asset('investigacion/comite_promocion/proyectos_internacionales')}}">Proyectos internacionales</a></li>
                        <li class="@if($section=='profesionalizacion_investigacion') active @endif"><a href="{{asset('investigacion/comite_promocion/profesionalizacion_investigacion')}}">Profesionalización de la investigación</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-8 col-lg-8 col-xs-12">
                @if($section == 'inicio')
                    <p class="text-justify lead">
                        Uno de los objetivos fundamentales de la SMACVE es impulsar la investigación clínica. Como todo en medicina, la cirugía vascular basa sus conocimientos en los resultados de investigaciones tanto nacionales como internacionales de alta calidad.
                    </p>

                    <p class="text-justify lead">
                        El objetivo de este comité es fomentar la investigación a través de plataformas formales que realizan estudios a nivel mundial, con lo estándares de calidad necesarios. Los socios de la SMACVE podrán encontrar aquí múltiples ligas para acceder y colaborar con equipos de investigación nacionales e internacionales.
                    </p>
                    <p class="text-justify lead">
                        Una parte importante de la investigación clínica es realizarla de manera profesional; ¿qué quiere decir esto? Significa someter nuestros trabajos de investigación a los comités correspondientes y apegarlos a las guías éticas internacionales. En esta sección de la SMACVE proporcionaremos ligas que facilitan el estudio de los fundamentos de los protocolos de investigación y de pasos que conllevan para su correcta realización.
                    </p>
                @endif
                @if($section == 'profesionalizacion_investigacion')
                    <div class="">
                        <img class="image-book" src="{{asset('images/libros/libro_proyectos_internacionales.png')}}" class="img-responsive" alt="">
                        <br>
                        <a href="{{asset('pdf/libros/designing_clinical_research.pdf')}}" target="_blank" class="btn text-white text-uppercase mt-3" style="background:rgb(150, 125, 61);">
                            Descargar libro
                        </a>
                    </div>
                @endif
                @if($section == 'proyectos_nacionales')
                    <div class="">
                        <h6>Trombosis venosa profunda</h6>
                        <p class="text-justify">
                            La trombosis venosa profunda es una enfermedad con una elevada prevalencia y altas
                            tasas de morbi-mortalidad. La incidencia conocida de TVP oscila entre 1 de cada 10 000
                            hasta un máximo de 1 de cada 100 en personas; aumentando con la edad.
                        </p>

                        <p class="text-justify">
                            En México se desconocen las cifras exactas de casos, aunque se estima que pueden
                            existir entre 400,000 y 500,000 casos de trombosis (TVP y TEP) por año.
                        </p>

                        <p class="text-justify">
                            El síndrome post trombótico es la complicación más frecuente de la trombosis venosa
                            profunda. Si bien no es mortal, tiene serias implicaciones médicas, sociales y
                            económicas en el sistema de salud.
                            Igualmente, el SPT es el principal determinante de calidad de vida después de la TVP.
                            Así, se ha reportado que del 20 al 50% de los pacientes, desarrollarán SPT dentro de
                            los siguientes 2 años posterior a la TVP.
                        </p>

                        <p class="text-justify">
                            En nuestro país se desconocen la prevalencia, características demográficas y factores
                            de riesgo para desarrollar TVP. Es por todo lo anterior, que es de vital importancia
                            llevar a cabo un estudio que nos permita conocer la incidencia y los factores de
                            riesgo asociados a la TVP en nuestra población, para así, poder diseñar estrategias
                            preventivas que nos permitan disminuir la morbilidad y mortalidad en pacientes que
                            diariamente sufren de esta patología.
                        </p>

                        <p class="text-justify">
                            Actualmente, contamos con un proyecto en marcha, en el que participan de forma
                            activa 11 estados de la Republica. De tal forma, con el objetivo de conocer y mejorar
                            nuestro entendimiento de esta enfermedad en nuestra población, los invitamos, con
                            gran entusiasmo, a participar en este proyecto de suma relevancia para la salud
                            pública de nuestro país. <br>
                            ¡Muchas gracias!
                        </p>

                        <p class="text-justify">
                            Datos de contactos: <a target="_blank" href="https://www.tvpmexico.com" class="text-link">https://www.tvpmexico.com</a> , <a class="text-link" href="tel:+525556612024">+52 5556612024</a>,
                            <a class="text-link" href="mailto:tvpmexico@incmnsz.mx">tvpmexico@incmnsz.mx</a>
                        </p>

                        <p class="text-justify">
                            Silverstein MD, Heit JA, Mohr DN, Petterson TM, O’Fallon WM, Melton LJ III. Trends in
                            the incidence of deep vein thrombosis and pulmonary embolism: a 25-year population-
                            based study. Arch Intern Med. 1998;158(6):585-593.
                            Galanaud, J.-P., Monreal, M., &amp; Kahn, S. R. (2018). Epidemiology of the post-
                            thrombotic syndrome. Thrombosis Research, 164, 100–109.
                            doi:10.1016/j.thromres.2017.07.026
                            Galanaud, J.-P., Monreal, M., &amp; Kahn, S. R. (2018). Epidemiology of the post-
                            thrombotic syndrome. Thrombosis Research, 164, 100–109.
                            doi:10.1016/j.thromres.2017.07.026 
                            Guía de Práctica Clínica Diagnóstico y Tratamiento de la Enfermedad Tromboembólica
                            Venosa, México: Secretaria de Salud, 2010.
                        </p>
                    </div>
                @endif

                @if($section == 'proyectos_internacionales')

                    <div class="">
                        <h6>Vascular Surgery COVID-19 Collaborative (VASCC)</h6>

                        <p class="text-justify">VASCC es una iniciativa que inicia a raíz de la pandemia por COVID-19. En vista de la necesidad de camas y personal para atender a pacientes con COVID-19, y por recomendaciones de múltiples sociedades internacionales, los cirujanos vasculares en el mundo han tenido que cancelar procedimientos electivos y semi-electivos para atender las necesidades actuales de los hospitales. Nunca se había visto una cancelación de procedimientos vasculares a tan gran escala. La iniciativa VASCC tiene como fin evaluar el impacto de la COVID-19 en el manejo de los pacientes con patología vascular.</p>

                        <p class="text-justify">VASCC fue fundada por Max Wohlauer, médico de la Univesity of Colorado y por el médico Robert Cuff, de la Michigan State University. Ambos han mostrado gran interés en extender esta iniciativa a todo el mundo, y por lo mismo entablaron un acercamiento especial con la SMACVE para invitar a centros de cirugía vascular en nuestro país a unirse a ella.</p>

                        <p class="text-justify">Se pretende que esta iniciativa tenga un impacto global en los pacientes con patología vascular, ya que no sólo ha tomado datos respecto a procedimientos cancelados, sino</p>


                        <p class="text-justify">también se han estudiado las manifestaciones de patología vascular en pacientes infectados COVID-19.</p>

                        <p class="text-justify">
                            Invitamos a los socios que estén interesados a inscribirse e  inscribir a su centro, accediendo a la liga <br>
                            <a class="text-link" target="_blank" href="https://medschool.cuanschutz.edu/surgery/specialties/vascular/research/vascular-surgery-covid-19-collaborative">
                                https://medschool.cuanschutz.edu/surgery/specialties/vascular/research/vascular-surgery-covid-19-collaborative
                            </a>
                        </p>


                        <p class="text-justify">
                            Actualmente la VASCC tiene activos dos proyectos: <br>
                            <span class="ml-3">1: Impacto de COVID-19 en cirugías programadas. </span> <br>
                            <span class="ml-3">2: Complicaciones trombóticas asociadas a COVID-19. </span> <br>
                        </p>

                        <p  class="text-justify">
                            Estos proyectos pueden ser revisarlos en la liga: <br>
                            <a href="https://medschool.cuanschutz.edu/surgery/specialties/vascular/research/vascular-surgery-covid-19-collaborative/projects" target="_blank" class="text-link">
                                https://medschool.cuanschutz.edu/surgery/specialties/vascular/research/vascular-surgery-covid-19-collaborative/projects
                            </a>
                        </p>

                        <p class="text-justify">
                            Por favor no duden en contactar a un servidor para más información sobre los procesos
                            de registro en los protocolos y sobre el registro de comités de éticas en su hospital.
                        </p>

                        <p class="text-justify">VASCC 1 representa una gran oportunidad para los socios de la
                        SMACVE que tengan el interés de aportar conocimiento científico
                        para mejorar la atención de nuestros pacientes en estos tiempos
                        tan difíciles, además de que representa una oportunidad para participar
                        en protocolos de investigación internacionales, que son publicados en Pubmed.</p>

                        <p class="text-justify">
                            Estas son algunas publicaciones derivadas de estos proyectos:

                            <a class="text-link d-block" target="_blank" href="https://pubmed.ncbi.nlm.nih.gov/32798205/">https://pubmed.ncbi.nlm.nih.gov/32798205/ </a>
                            <a class="text-link d-block" target="_blank" href="https://pubmed.ncbi.nlm.nih.gov/32334050/">https://pubmed.ncbi.nlm.nih.gov/32334050/ </a>
                        </p>
                    </div>

                @endif
            </div>
        </div>
    </section>

@stop
