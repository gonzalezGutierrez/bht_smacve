<?php $__env->startSection('title','Boletín Quinta Edición'); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="<?php echo e(asset('images/bg/bg_eventos.jpg')); ?>">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Boletín 6ta Edición</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="<?php echo e(asset('/')); ?>">Inicio</a></li>
                        <li><a href="javascript:void(0)">Boletín Sexta Edición</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section style="padding-top: 15px;">
        <div class="container">
            <div class="row justify-content-center margin-50px-bottom sm-margin-30px-bottom">
                <div class="col-lg-12">
                    <div class="text-center margin-10px-bottom">
                        <a target="_blank" href="<?php echo e(asset('pdf/boletines/boletin_sexta_edicion.pdf')); ?>" class="butn"><span>Descargar Boletín en PDF</span></a>
                    </div>
                    <div style="text-align:center; height: 650px;">
                        <iframe src="//v.calameo.com/?bkcode=0060513215f9bcf9658f8&mode=mini" width="100%" height="100%" frameborder="0" scrolling="no" allowtransparency allowfullscreen style="margin:0 auto;"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <input type="hidden" id="seccion_smacve" value="#btn-eventos" />

<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template_01', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>