<?php $__env->startSection('title','Voluntariado - Paso 3'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/voluntariado.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="<?php echo e(asset('images/bg/bg_mi_cuenta.jpg')); ?>">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Solicitud de Voluntariado</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="<?php echo e(asset('/')); ?>">Inicio</a></li>
                        <li><a href="<?php echo e(asset('voluntariado')); ?>">Solicitud de Voluntariado</a></li>
                        <li><a href="javascript:void(0)">Paso 3</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-sm-12 padding-50px-right md-padding-30px-right sm-padding-15px-right">
                    <h6 class="font-weight-700 font-size16 sm-font-size14 text-uppercase left-title margin-20px-bottom">ETAPAS</h6>
                    <div class="single-sidebar-menu">
                        <ul class="no-margin">

                            <li><a href="<?php echo e(asset('voluntariado/step_1')); ?>">Inicio de Solicitud</a></li>
                            <li><a href="<?php echo e(asset('voluntariado/step_2')); ?>">Datos Demográficos</a></li>
                            <li class="active"><a href="<?php echo e(asset('voluntariado/step_3')); ?>">Oportunidad de Voluntariado</a></li>
                            <li><a href="<?php echo e(asset('voluntariado/step_4')); ?>" class="btn btn-link disabled">Politicas de Divulgación</a></li>
                            <li><a href="<?php echo e(asset('voluntariado/step_5')); ?>" class="btn btn-link disabled">Revisar y Enviar</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 col-sm-12">

                    <?php if(session('status_success')): ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <?php echo session('status_success'); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(session('status_fail')): ?>
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <?php echo session('status_fail'); ?>

                        </div>
                    <?php endif; ?>


                        <div class="section-heading half left">
                            <h4>Seleccione Oportunidad de Voluntariado</h4>
                        </div>
                        <p>Revise la lista de comités y seleccione como máximo 2 opciones en la cual le gustaría ser considerado para su nombramiento. Para leer mas sobre cada comité de click sobre el link de ver información..</p>

                        <div class="space30"></div>
                        <div class="bg-white padding-20px-all sm-padding-20px-all border border-width-5">


                            <?php echo Form::open(['url' => 'voluntariado/step_3', 'method' => 'POST',  'id' => 'voluntariado', 'class'=>'contact-form' ]); ?>


                            <ul class="list-unstyled lista-oportunidad-voluntariados">
                                <?php $__currentLoopData = $puestos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $puesto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="puesto">

                                        <?php if(count($puesto->children) <= 0): ?>
                                            <input class="check_list" type="checkbox" value="<?php echo e($puesto->idPuestoVoluntariado); ?>" id="check_<?php echo e($puesto->idPuestoVoluntariado); ?>"  name="check_list[]">
                                        <?php else: ?>
                                            <span> <i class="fas fa-caret-down"></i> </span>
                                        <?php endif; ?>
                                        <label for="check_<?php echo e($puesto->idPuestoVoluntariado); ?>"><?php echo e($puesto->puestoVoluntariado); ?></label>

                                        <?php if($puesto->descripcion): ?>
                                            <a class="btn btn-link btn-xs"data-toggle="collapse" href="#collapse<?php echo e($puesto->idPuestoVoluntariado); ?>" role="button" aria-expanded="false" aria-controls="<?php echo e($puesto->idPuestoVoluntariado); ?>">
                                                Ver Información
                                            </a>

                                            <div class="descripcion collapse" id="collapse<?php echo e($puesto->idPuestoVoluntariado); ?>">
                                                <?php echo $puesto->descripcion; ?>

                                            </div>
                                        <?php endif; ?>
                                    </li>

                                    <?php if($puesto->children): ?>
                                        <?php $__currentLoopData = $puesto->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="subpuesto">
                                                <input class="check_list" type="checkbox" value="<?php echo e($children->idPuestoVoluntariado); ?>" id="check_<?php echo e($children->idPuestoVoluntariado); ?>"  name="check_list[]">
                                                <label for="check_<?php echo e($children->idPuestoVoluntariado); ?>"><?php echo e($children->puestoVoluntariado); ?></label>

                                                <?php if($children->descripcion): ?>
                                                    <a class="btn btn-link btn-xs"data-toggle="collapse" href="#collapse<?php echo e($children->idPuestoVoluntariado); ?>" role="button" aria-expanded="false" aria-controls="<?php echo e($puesto->idPuestoVoluntariado); ?>">
                                                        Ver Información
                                                    </a>
                                                    <div class="descripcion collapse" id="collapse<?php echo e($children->idPuestoVoluntariado); ?>">
                                                        <?php echo $children->descripcion; ?>

                                                    </div>
                                                <?php endif; ?>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>


                            <div class="space20"></div>


                            <hr/>

                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <div class="form-group">
                                        <button class="butn theme medium" type="submit"><span>Guardar y Continuar</span></button>
                                    </div>
                                </div>
                            </div>

                            <?php echo Form::close(); ?>


                        </div>

                    <div class="space30"></div>
                </div>
            </div>
        </div>
    </section>

    <input type="hidden" id="seccion_smacve" value="#btn-atencion-al-socio" />

<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>

    <script type="text/javascript" src="<?php echo e(asset('libraries/jquery-validate-1.19.0/jquery.validate.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('libraries/jquery-validate-1.19.0/additional-methods.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('libraries/bootbox-v4.4.0/bootbox.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(asset('js/voluntariado/voluntariado_step_3.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template_01', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>