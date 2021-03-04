<?php $__env->startSection('title','Proveedores'); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="<?php echo e(asset('images/bg/educacion_medica.jpg')); ?>">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Catergorias</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="<?php echo e(asset('/')); ?>">Inicio</a></li>
                        <li><a href="<?php echo e(asset('/proveedores')); ?>">Proveedores</a></li>
                        <li><a href="<?php echo e(asset('proveedores/categorias')); ?>">Categorias</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>

    <section>
        <div class="container">
            <div class="bg-white padding-30px-all sm-padding-20px-all border border-width-5">
                <?php if(Session::has('status_warning')): ?>
                    <div class="alert alert-warning">
                        <strong><?php echo e(Session::get('status_warning')); ?></strong>
                    </div>
                <?php endif; ?>
                <div class="text-center text-uppercase section-heading">
                    <h4>Agrega una nueva categoria</h4>
                </div>
                <?php echo $__env->make('proveedores.categorias.form', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </section>

    <input type="hidden" id="seccion_smacve" value="#btn-educacion_medica" />


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template_01', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>