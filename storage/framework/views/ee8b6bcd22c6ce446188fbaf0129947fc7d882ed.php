<?php $__env->startSection('title','ExPresidentes'); ?>

<?php $__env->startSection('content'); ?>

    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="<?php echo e(asset('images/bg/bg_acerca_de.jpg')); ?>">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Ex Presidentes</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="<?php echo e(asset('/')); ?>">Inicio</a></li>
                        <li><a href="javascript:void(0)">Acerca de</a></li>
                        <li><a href="javascript:void(0)">Ex Presidentes SMACVE</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
              <?php $__currentLoopData = $expresidentes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expresidente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-4 col-xs-6 margin-50px-bottom sm-margin-20px-bottom text-center">
                    <div class="team-style3">
                        <div class="team-member-img">
                            <img class="img-responsive" src="<?php echo e(asset('images/expresidentes/'.$expresidente->foto)); ?>" alt="">
                            <div class="team-description">
                                <div class="team-description-wrapper">
                                    <div class="team-description-content">
                                        <p class="about-me">Presidente SMACVE <br/> <?php echo e($expresidente->inicio); ?> -  <?php echo e($expresidente->fin); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-cover"></div>
                        </div>
                        <div class="text-center margin-15px-top xs-margin-15px-top">
                            <div class="member-name alt-font text-extra-gray"><?php echo e($expresidente->nombre); ?> <?php echo e($expresidente->apellidoPaterno); ?> <?php echo e($expresidente->apellidoMaterno); ?></div>
                            <div class="years"><?php echo e($expresidente->inicio); ?> -  <?php echo e($expresidente->fin); ?></div>
                        </div>
                    </div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    <input type="hidden" id="seccion_smacve" value="#btn-acerca-de" />

<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template_01', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>