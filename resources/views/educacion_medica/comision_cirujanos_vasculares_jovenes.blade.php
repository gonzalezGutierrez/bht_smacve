@extends('layouts.template_01')

@section('title','Comision de actualizacion GPC')

@section('css')

    <style>
        .text-link {
            color:#d0ad55 !important;
        }
    </style>

@stop

@section('content')

<section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="{{asset('images/bg/bg_mi_cuenta.jpg')}}">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h1>Comité de Cirujanos Vasculares Jóvenes</h1>
            </div>
            <div class="col-md-12">
                <ul>
                    <li><a href="{{asset('/')}}">Inicio</a></li>
                    <li><a href="javascript:void(0)">Comité de Cirujanos Vasculares Jóvenes</a></li>
                </ul>
            </div>
        </div>

    </div>
</section>

<section class="container">

    <div class="section-heading">
        <h3>Comité de Cirujanos Vasculares Jóvenes de la SMACVE<br>
            <small>Coordinador General: Dr. Rodrigo Garza Herrera</small>
        </h3>
    </div>

    <div class="row">
        <div class="col-sm-8">
            <h6>Grupos de Trabajo:</h6>
            <div id="accordion" class="accordion-style">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <strong>Crecimiento profesional</strong> <br/>
                                <small>Dr. Gerardo Lozano Balderas </small> <br/>
                                <small>Dra. Romina Álvarez Arcaute </small> <br/>
                                <small>Dr. José Arturo González Elizondo</small>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">

                            <p>Busca facilitar el inicio y posicionamiento de la práctica profesional para el cirujano vascular joven. Brindando conocimientos sobre marketing, administración y networking el poder abrir mercados aún no explotados mediante e identificación de áreas no explotadas en la especialidad.</p>
                            <p>Objetivos:</p>
                            <ul>
                                <li>Proporcionar estrategias para el acercamiento a referidores.</li>
                                <li>Encontrar áreas de oportunidad en la región.</li>
                                <li>Determinar necesidades de marketing en la práctica médica.</li>
                                <li>Principios de administración de consultorio.</li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                <strong>Difusión</strong> <br/>
                                <small>Dra. Georgina Bezares Bravo </small> <br/>
                                <small>Dr. Miguel Ángel Ramírez Quintero</small> <br/>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse " aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <p>Su esencia es acercarse a las nuevas generaciones de médicos para aumentar el interés en la especialidad. Buscando posicionarla como una especialidad de vanguardia, con un área laboral en constante crecimiento y avance, que logre atraer a los talentos más prometedores del país.</p>
                            <p>Objetivo:</p>
                           <ul>
                               <li>Promover la participación de los cirujanos vasculares jóvenes en las actividades de la SMACVE.</li>
                               <li>Pretende el acercamiento a internos y estudiantes de medicina para promoción de la especialidad.</li>
                               <li>Busca la difusión de la especialidad enfocada a las futuras generaciones.</li>
                           </ul>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                <strong>Actualización </strong> <br/>
                                <small>Dr. Alejandro Celis Jiménez </small> <br/>
                                <small>Dr. Paulo César Olvera Hernández </small> <br/>
                                <small>Dra. Rebeca Margarita Herrera Llamas</small> <br/>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse " aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            <p>Lograr mantener una actualización constante en los especialistas del país, puliendo los conocimientos y habilidades aprendidos durante el programa de residencias médicas, para que dichos conocimientos puedan ser aplicados en la practica diaria e impacte directamente sobre la salud vascular de los pacientes en México.</p>
                            <p>Objetivo:</p>
                            <ul>
                                <li>Creación de cursos de actualización médica con enfoque teórico práctico, mediante el método del caso.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingFour">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                <strong>Desarrollo Académico  </strong> <br/>
                                <small>Dra. María Azul Rocha Madrigal  </small> <br/>
                                <small>Dr. Víctor Contreras Lima  </small> <br/>
                                <small>Dr. Jorge García Dávila</small> <br/>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseFour" class="collapse " aria-labelledby="headingFour" data-parent="#accordion">
                        <div class="card-body">
                            <p>Busca ofrecer herramientas a los cirujanos vasculares jóvenes mediante rotaciones, participaciones en conferencias y actividades de la Sociedad Mexicana, así como internacionales, para impulsar la presencia de las nuevas generaciones en el panorama de la especialidad.</p>
                            <p>Objetivo:</p>
                            <ul>
                                <li>Abrir canales de comunicación con Servicios y Organismos nacionales e internacionales.</li>
                                <li>Promover el interés por la realización de actividades académicas. </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingFive">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                <strong>Apoyo y bienestar </strong> <br/>
                                <small>Dra. Sue Tatiana Delgado Aguilar  </small> <br/>
                                <small>Dr. Jesús Emmanuel Arriaga Caballero</small> <br/>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseFive" class="collapse " aria-labelledby="headingFive" data-parent="#accordion">
                        <div class="card-body">
                            <p>La identificación de trastornos mentales, discriminación, burnout y equidad de género es esencial para lograr un crecimiento integral del médico especialista. Conocer estas necesidades dentro de nuestra población ayudará a desarrollar programas que fomenten el bienestar entre los socios. </p>
                            <p>Objetivo:</p>
                            <ul>
                                <li>Realizar estudios para conocer prevalencias de enfermedades mentales en nuestro gremio.</li>
                                <li>Implementar herramientas de soporte para los socios.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="bg-white padding-20px-all sm-padding-20px-all border border-width-5">
                <h4>Misión</h4>
                <p>El Comité de Cirujanos Vasculares Jóvenes, formado por especialistas menores a los 40 años de edad, tiene la misión de facilitar el desarrollo profresional de manera integral del especialista en Angiología, Cirugía Vascular y Endovascular en México; mediante proyectos que mantengan como prioridad la ideología de innovación y renovación contínua.</p>
            </div>
            <div class="space20"></div>
            <div class="bg-white padding-20px-all sm-padding-20px-all border border-width-5">
                <h4>Visión</h4>
                <p>Crear una serie de proyectos enfocados al cirujano vascular joven, para llevar las técnicas quirúrgicas y conocimiento científico más novedoso a la práctica diaria en todos los Estados de la República Mexicana. Fomentando una cultura de colaboración, que logre desarrollar proyectos exitosos que puedan ser replicados en la Sociedad Mexicana de Angiología, Cirugía Vascular y Endovascular.</p>
            </div>
        </div>
    </div>
    <div class="space30"></div>

</section>


<input type="hidden" id="seccion_smacve" value="#btn-educacion-medica" />
@stop