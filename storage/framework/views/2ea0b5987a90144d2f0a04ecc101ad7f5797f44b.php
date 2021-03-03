<?php $__env->startSection('title','Voluntariado - Paso 5'); ?>

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
                        <li><a href="javascript:void(0)">Solicitud Presentada</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 col-sm-12">

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
                            <h4> Solicitud Presentada </h4>
                        </div>
                        <p class="text-justify">
                            Gracias por solicitar ser considerado para el nombramiento del comité de la SMACVE. Recibirás un correo electrónico de confirmación momentaneamente.
                            Los nombramientos para todos los comités se anunciarán en marzo de este año.
                        </p>

                        <div class="row">
                            <div class="col-md-12 text-left">
                                <div class="form-group">
                                    <a class="butn theme medium" href="<?php echo e(asset('/')); ?>"><span>Ir a Inicio</span></a>
                                </div>
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

    <script type="text/javascript" src="<?php echo e(asset('libraries/jquery-validate-1.19.0/jquery.validate.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('libraries/jquery-validate-1.19.0/additional-methods.min.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(asset('js/voluntariado/voluntariado_step_4.js')); ?>"></script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template_01', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>