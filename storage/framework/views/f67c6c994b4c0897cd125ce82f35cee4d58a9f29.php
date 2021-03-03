<?php $__env->startSection('title','Eventos en el Mundo'); ?>

<?php $__env->startSection('css'); ?>
    <script type="text/javascript" src="<?php echo e(asset('libraries/js-marker-clusterer/src/markerclusterer.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="<?php echo e(asset('images/bg/bg_eventos.jpg')); ?>">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Eventos en el Mundo</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="<?php echo e(asset('/')); ?>">Inicio</a></li>
                        <li><a href="javascript:void(0)">Eventos en el Mundo</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row justify-content-center margin-50px-bottom sm-margin-30px-bottom">
                <div class="col-lg-12">


                    <h5>La capacitación académica <br/> <strong>¡SI IMPORTA!</strong></h5>
                    <p>
                        <span class="fa fa-quote-left margin-10px-right font-size20"></span>
                        Para SMACVE es fundamental fortalecer el aprendizaje con las teorías, casos y experiencias que se comparten y debaten en congresos y seminarios, por ello año con año hacemos el esfuerzo para que nuestros doctores asistan a los eventos más importantes en el mundo, con el fin de obtener nuevos conocimientos, tecnicas e instrumentos que nos ayuden a mejorar día con día nuestra labor.
                        <span class="fa fa-quote-right margin-10px-left font-size20"></span>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center margin-50px-bottom sm-margin-30px-bottom">
                <div class="col-lg-8 col-sm-8">
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
                            <?php $row = 1; ?>
                            <?php $__currentLoopData = $eventos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="align-middle"><?php echo \App\FormatoFecha::getSpanishFormat($evento->fechaInicio); ?></td>
                                    <td class="align-middle">
                                        <div class="title"> <?php echo e($evento->titulo); ?></div>
                                        <div class="description"><?php echo e($evento->descripcion); ?></div>
                                    </td>
                                    <td class="align-middle">
                                        <a type="button" href="<?php echo e($evento->link); ?>" target="_blank" class="btn btn-outline-dark btn-sm">Más Información</a>
                                    </td>
                                </tr>

                                <?php $row++; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div id="carouselEventos" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">

                            <?php if(count($eventos) > 0): ?>
                                <?php $clase = "active"; ?>
                                <?php $__currentLoopData = $eventos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(!empty($evento->cartel)): ?>
                                        <div class="carousel-item <?php echo e($clase); ?>">
                                            <img class="d-block w-100" src="https://hendolat.com/images/posters_eventos/<?php echo e($evento->cartel); ?>" alt="First slide">
                                        </div>
                                        <?php $clase = "" ; ?>
                                    <?php endif; ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                        </div>
                        <a class="carousel-control-prev" href="#carouselEventos" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselEventos" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="map" style="position: relative; overflow: hidden;"></div>

    <input type="hidden" id="seccion_smacve" value="#btn-eventos" />

<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>
    <!-- Clave API  AIzaSyD8qcmSDv99YKxFFfBJEfU9bkU0EqQYqAo  -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8qcmSDv99YKxFFfBJEfU9bkU0EqQYqAo&callback=initMap"></script>


    <script src="<?php echo e(asset('js/eventos.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template_01', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>