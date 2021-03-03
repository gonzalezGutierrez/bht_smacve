@extends('layouts.template_01')

@section('title','Seminarios con residentes')

@section('css')
    <script type="text/javascript" src="{{asset('libraries/js-marker-clusterer/src/markerclusterer.js')}}"></script>
    <style>
        .btn-actions{
            background-color: #d0ad55 !important;
            color:white;
            padding: 10px;
        }
        .btn-actions:hover {
            color:white;
        }
    </style>
@endsection

@section('content')

    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="{{asset('images/bg/bg_eventos.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Seminarios con residentes</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="{{asset('/')}}">Inicio</a></li>
                        <li><a href="javascript:void(0)">Seminarios con residentes</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row justify-content-center margin-50px-bottom sm-margin-30px-bottom">
                <div class="col-lg-12">
                    <h5 class="text-uppercase">Seminarios con residentes</h5>
                    <p>
                        La Sociedad Mexicana de Angiología, Cirugía Vascular y Endovascular (SMACVE) está comprometida con el desarrollo profesional
                        de sus miembros y con el entrenamiento de las nuevas generaciones de cirujanos vasculares del país.
                        Es por tal motivo que, una de nuestras actividades insignia del año 2021, son las Sesiones de Residentes.
                        Estas sesiones son un espacio semanal en el que participarán 18 programas de residencia de Angiología y Cirugía Vascular y
                        Endovascular reconocidos en México. Se realizarán 44 sesiones en las que residentes de todas las sedes del país presentarán
                        clases magistrales basados en el syllabus del Plan Único de Especializaciones Médicas.
                        A través de esta interacción se logrará promover la búsqueda de fundamentos científicos y respuestas pertinentes a
                        los problemas clínicos de los pacientes, además de favorecer el análisis de la literatura médica relevante y
                        la discusión de casos y abordajes desde la perspectiva específica de las diferentes sedes hospitalarias.
                        Adicionalmente, los residentes se beneficiarán con los comentarios y experiencia de los profesores de los distintos programas,
                        enriqueciendo así su formación académica. <br>

                        Esta serie de clases magistrales se llevará a cabo de forma virtual, con participación en
                        tiempo real de todos los programas involucrados. Los socios activos de la SMACVE tendrán la oportunidad
                        de acceder al repositorio de las sesiones a través de la página de la Sociedad. Las Sesiones de Residentes
                        sin duda serán un foro que propiciará el intercambio de conocimientos y experiencia, aumentando así la calidad
                        en la formación de recursos humanos nuestra especialidad.
                    </p>
                </div>
            </div>
            <div class="row justify-content-center margin-50px-bottom sm-margin-30px-bottom">
                <div class="col-lg-8 col-sm-8">
                    <div class="row">
                        <div class="col-12 mb-2 d-flex justify-content-between align-items-center">
                            <h4>Próximos eventos</h4>
                            <a href="{{asset('eventos_views/residentes/PROGRAMA SEMINARIO.pdf')}}" target="_blank" class="btn btn-sm btn-actions"><i class="fa fa-download"></i> Descargar programa completo</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Fecha</th>
                                <th scope="col">Evento</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>08/02/2021</td>
                                    <td>
                                        Breve historia de la Cirugía Vascular <br>
                                        <small style="font-weight: bold;">Instituto Nacional de Ciencias Médicas y Nutrición Salvador Zubirán</small>
                                    </td>
                                    <td>
                                        <a href="https://us02web.zoom.us/webinar/register/WN_i1q_jCY9TRyKk1UGTlpAmA" target="_blank" class="btn btn-dark btn-sm disabled">Confirma tu asistencia</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>15/02/2021</td>
                                    <td>
                                        Cromosomopatías en padecimientos vasculares; fisiopatología, diagnóstico y principios del tratamiento. Síndrome de Turner. Síndrome de Marfán. Síndrome de Ehler-Danlos. Hemocistinuria. Linfedema congénito. <br>
                                        <small style="font-weight: bold;">Centro Médico Nacional de Occidente.</small>
                                    </td>
                                    <td>
                                        <a href="https://us02web.zoom.us/webinar/register/WN_W80844qLQheA1pdFXJ9EIg" target="_blank" class="btn btn-dark btn-sm disabled">Confirma tu asistencia</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>22/02/2021</td>
                                    <td>
                                        Malformaciones vasculares congénitas: embriología, diagnóstico, clasificación y principios del tratamiento.<br>
                                        <small style="font-weight: bold;">Hospital de Cardiología UMAE 24, IMSS.</small>
                                    </td>
                                    <td>
                                        <a href="https://bit.ly/seminario_residentes_03" target="_blank" class="btn btn-dark disabled btn-sm">Confirma tu asistencia</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>01/03/2021</td>
                                    <td>
                                        Abordes Quirúrgicos en cirugía vascular: procedimientos arteriales,
                                        aorta torácica y sus ramas, aorta abdominal y sus ramas, arterias de las extremidades torácicas,
                                        arterias de las extremidades pélvicas.<br>
                                        <small style="font-weight: bold;">Hospital General Valentín Gómez Farias, ISSSTE. Guadalajara, Jalisco.</small>
                                    </td>
                                    <td>
                                        <a href="https://bit.ly/seminario_residentes_04" target="_blank" class="btn btn-actions btn-sm">Confirma tu asistencia</a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-4">
                    <img src="{{asset('eventos_views/residentes/image.jpeg')}}" style="border-radius: 3px;" alt="">
                </div>
            </div>
        </div>
    </section>

    <input type="hidden" id="seccion_smacve" value="#btn-eventos" />

@endsection


@section('javascript')
    <!-- Clave API  AIzaSyD8qcmSDv99YKxFFfBJEfU9bkU0EqQYqAo  -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8qcmSDv99YKxFFfBJEfU9bkU0EqQYqAo&callback=initMap"></script>


    <script src="{{asset('js/eventos.js')}}" type="text/javascript"></script>
@endsection
