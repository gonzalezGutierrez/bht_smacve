<?php $__env->startSection('title','Bienvenida a Socios'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="<?php echo e(asset('images/bg/bg_login.jpg')); ?>">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Bievenido Socio SMACVE</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="<?php echo e(asset('/')); ?>">Asociados SMACVE</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-8">
                    <p class="text-justify">Estimado Socio, muchas gracias por completar tu registro, agradecemos tu compromiso con la SMACVE; para garantizar la seguridad de los demás asociados, es necesario un proceso de verificación de tu identidad, por lo que te pedimos paciencia, en un lapso no mayor a 72 horas estaremos confirmando tu acceso a SMACVE.</p>
                    <p class="text-justify">Somos una sociedad en crecimiento que fomenta los valores de sus miembros, quienes se mantienen en constante actualización con acciones académicas frecuentes.</p>
                    <div class="text-center">
                        <a class="butn theme margin-10px-top" href="<?php echo e(asset('/')); ?>"><span>Ir a página de Inicio</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template_01', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>