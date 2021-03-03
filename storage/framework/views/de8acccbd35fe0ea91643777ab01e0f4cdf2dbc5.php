<?php $__env->startSection('title','Voluntariado - Paso 3'); ?>

<?php $__env->startSection('css'); ?>

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
                            <li><a href="<?php echo e(asset('voluntariado/step_3')); ?>">Oportunidad de Voluntariado</a></li>

                            <?php if(!empty($puestoSeleccionados)): ?>
                                <?php $__currentLoopData = $puestoSeleccionados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $puesto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php
                                        $class = '';
                                        if($puestoActivo->idPuestoVoluntariado == $puesto->idPuestoVoluntariado){
                                            $class = 'active';
                                        }
                                    ?>

                                    <li class="<?php echo e($class); ?>"><a href="<?php echo e(asset('voluntariado/step_3/'.$puesto->ordenSeleccion)); ?>"><?php echo e($puesto->puestoVoluntariado); ?> - Declaración de Interés</a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

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
                            <h4><?php echo e($puestoActivo->puestoVoluntariado); ?> - Declaración de Interés</h4>
                        </div>
                        <p>Proporcione una breve descripción de su interés<br/> Describa las aptitudes y la experiencia que puede aportar a este comité.<br/></p>

                        <div class="space30"></div>
                        <div class="bg-white padding-20px-all sm-padding-20px-all border border-width-5">


                            <?php echo Form::model($puestoActivo,['url' => 'voluntariado/step_3/'.$puestoActivo->ordenSeleccion, 'method' => 'POST',  'id' => 'voluntariado', 'class'=>'contact-form' ]); ?>


                            <div class="form-group row">
                                <div class="col-md-12">
                                    <?php echo Form::label('declaracionInteres', 'Declaración de Interés:',['class'=>'']); ?>

                                </div>
                                <div class="col-md-12">
                                    <?php echo Form::textArea('declaracionInteres',null,['class'=>'form-control ','placeholder'=>'','rows'=>5]); ?>

                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-md-12">
                                    <?php echo Form::label('aptitudes', 'Aptitudes y Experiencia:',['class'=>'']); ?>

                                </div>
                                <div class="col-md-12">
                                    <?php echo Form::textArea('aptitudes',null,['class'=>'form-control ','placeholder'=>'','rows'=>5]); ?>

                                </div>
                            </div>


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
    <script type="text/javascript" src="<?php echo e(asset('js/voluntariado/voluntariado_step_3_declaracion_interes.js')); ?>"></script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template_01', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>