<?php $__env->startSection('title','Solicitud Voluntariado'); ?>

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
                        <li><a href="<?php echo e(asset('mi_cuenta')); ?>">Solicitud de Voluntariado</a></li>
                        <li><a href="javascript:void(0)">Paso 1</a></li>
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

                            <li  class="active"><a href="<?php echo e(asset('voluntariado/step_1')); ?>">Inicio de Solicitud</a></li>
                            <li><a href="<?php echo e(asset('voluntariado/step_2')); ?>" class="btn btn-link disabled">Datos Demográficos</a></li>
                            <li><a href="<?php echo e(asset('voluntariado/step_3')); ?>" class="btn btn-link disabled">Oportunidad de Voluntariado</a></li>
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
                            <h4>Solicitud de Voluntariado</h4>
                        </div>
                        <div class="bg-white padding-20px-all sm-padding-20px-all border border-width-5">

                            <p class="lead"><strong>¡HOLA <?php echo e($usuario->nombre); ?> <?php echo e($usuario->apellidoPaterno); ?> <?php echo e($usuario->apellidoMaterno); ?>!</strong></p>
                            <p class="lead">Las siguientes pantallas lo guiarán a través del proceso de solicitud, que incluye sus datos demográficos y una breve declaración de interés. Los solicitantes no serán considerados hasta que todas las partes de la solicitud estén completas.</p>

                            <div class="text-center">

                                <?php echo Form::open(['url' => 'voluntariado/step_1', 'method' => 'POST',  'id' => 'voluntariado', 'class'=>'contact-form' ]); ?>

                                        <button class="butn theme medium" type="submit" ><span>Continuar</span></button>
                                <?php echo Form::close(); ?>

                            </div>

                        </div>

                    <div class="space30"></div>
                </div>
            </div>
        </div>
    </section>

    <input type="hidden" id="seccion_smacve" value="#btn-atencion-al-socio" />

<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template_01', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>