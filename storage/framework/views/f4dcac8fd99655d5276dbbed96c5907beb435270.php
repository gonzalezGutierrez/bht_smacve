<?php $__env->startSection('title','Acceso a Socios'); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="<?php echo e(asset('images/bg/bg_login.jpg')); ?>">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Acceso a Socios</h1>
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
            <div class="row">
                <div class="col-lg-6 center-col">
                    <?php if(session('warning')): ?>
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <?php echo session('warning'); ?>

                        </div>
                    <?php endif; ?>

                    <div class="bg-white padding-30px-all sm-padding-20px-all border border-width-5">
                        <div class="text-center section-heading">
                            <h4>Iniciar Sesión</h4>

                        </div>
                        <?php echo Form::open(['url'=>'login','method' => 'POST', 'id'=>'FormRegister','class'=>'contact-form']); ?>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <?php echo Form::label('email', 'Email:',['class'=>'sr-only']); ?>

                                    <input id="email" type="email" class="form-control form-control-lg <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" placeholder="Correo Electronico" required autofocus>
                                    <?php if($errors->has('email')): ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <?php echo Form::label('password', 'Password:',['class'=>'sr-only']); ?>

                                    <input id="password" type="password" class="form-control form-control-lg <?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" placeholder="Contraseña" required>
                                    <?php if($errors->has('password')): ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"  <?php echo e(old('remember') ? 'checked' : ''); ?> style="width: auto;">
                                    <label class="form-check-label" for="remember">
                                        Recordarme
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button class="butn theme medium" type="submit"><span>Accesar</span></button>
                                    <p class="no-margin float-right"><a href="<?php echo e(route('password.request')); ?>">¿Olvistaste tu Contraseña?</a></p>
                                </div>
                            </div>
                        </div>
                        <?php echo Form::close(); ?>

                    </div>
                    <div class="space20"></div>
                    <p class="text-center font-size16">
                        <a href="<?php echo e(asset('register')); ?>">Eres socio SMACVE y aún no tienes cuenta, <span class="text-theme-color">registrate aqui.</span></a>
                    </p>
                </div>
            </div>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.template_01', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>