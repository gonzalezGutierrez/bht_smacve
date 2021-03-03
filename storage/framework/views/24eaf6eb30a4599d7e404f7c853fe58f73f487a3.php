<?php $__env->startSection('title','Seminarios con residentes'); ?>

<?php $__env->startSection('css'); ?>
    <script type="text/javascript" src="<?php echo e(asset('libraries/js-marker-clusterer/src/markerclusterer.js')); ?>"></script>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="<?php echo e(asset('images/bg/bg_eventos.jpg')); ?>">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Sesiones Academicas</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="<?php echo e(asset('/')); ?>">Inicio</a></li>
                        <li><a href="javascript:void(0)">Sesiones Academicas</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row justify-content-center margin-50px-bottom sm-margin-30px-bottom">
                <div class="col-lg-12">
                    <h5 class="text-uppercase">Sesiones academicas</h5>
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
                            <h4>Próximas Sesiones</h4>
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
                                    <td>18/02/2021</td>
                                    <td>
                                        Pie diabético otra pandemia en México, el manejo del cirujano vascular <br>
                                        <small style="font-weight: bold;">Dr. Gerardo Morales Galina</small> <br>
                                        <small style="font-weight: bold;">Dr. Juaquín Becerra Bello</small>
                                    </td>
                                    <td>
                                        <a href="http://bit.ly/37a24yL" target="_blank" class="btn btn-dark btn-sm">Confirma tu asistencia</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>25/02/2021</td>
                                    <td>
                                        De la teoría a la practica del pie diabético por el cirujano vascular.<br>
                                        <small style="font-weight: bold;">Dr. Paulo Cesar Olvera Hernández.</small> <br>
                                        <small style="font-weight: bold;">Dr. Gonzalo Maldonado  Ibarguen.</small>
                                    </td>
                                    <td>
                                        <a href="http://bit.ly/3jJmeVk" target="_blank" class="btn btn-dark btn-sm">Confirma tu asistencia</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="owl-carousel owl-theme"  id="regional-carousel">
                        <div class="item"><img src="<?php echo e(asset('eventos_views/sesiones/s_2.jpeg')); ?>" alt="Ciudad de México" /></div>
                        <div class="item"><img src="<?php echo e(asset('eventos_views/sesiones/s_1.jpeg')); ?>" alt="Ciudad de México" /></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <input type="hidden" id="seccion_smacve" value="#btn-eventos" />

<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>
    <!-- Clave API  AIzaSyD8qcmSDv99YKxFFfBJEfU9bkU0EqQYqAo  -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8qcmSDv99YKxFFfBJEfU9bkU0EqQYqAo&callback=initMap"></script>


    <script src="<?php echo e(asset('js/eventos.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template_01', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>