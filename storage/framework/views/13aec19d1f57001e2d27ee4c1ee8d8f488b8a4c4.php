<?php $__env->startSection('title','Mi Cuenta'); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('libraries/bootstrap4-toggle-3.4.0/css/bootstrap4-toggle.css')); ?>" rel="stylesheet" >
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="<?php echo e(asset('images/bg/bg_mi_cuenta.jpg')); ?>">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Mi Cuenta</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="<?php echo e(asset('/')); ?>">Inicio</a></li>
                        <li><a href="javascript:void(0)">Mi Cuenta</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-sm-12 padding-50px-right md-padding-30px-right sm-padding-15px-right">
                    <h6 class="font-weight-700 font-size16 sm-font-size14 text-uppercase left-title margin-20px-bottom">MI CUENTA</h6>
                    <div class="single-sidebar-menu">
                        <ul class="no-margin">
                            <li class="active"><a href="<?php echo e(asset('mi_cuenta')); ?>">Mi Cuenta</a></li>
                            <li><a href="<?php echo e(asset('mi_cuenta/herramientas_para_socios')); ?>">Herramientas para el Socio</a></li>
                            <li><a href="<?php echo e(asset('mi_cuenta/anualidades')); ?>">Mis Anualidades</a></li>
                            <li><a href="<?php echo e(asset('mi_cuenta/informacion_pago')); ?>">Información para Pago</a></li>
                            <li><a href="<?php echo e(asset('mi_cuenta/mis_datos_personales')); ?>">Editar información Personal</a></li>
                            <li><a href="<?php echo e(asset('mi_cuenta/edit_password')); ?>">Cambiar Contraseña</a></li>
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

                    <div class=member-single>
                        <div class="row">
                            <div class="col-md-4">
                                <img alt="img" src="<?php echo e(asset('images/miembros/'.$usuario->foto)); ?>" class="img-fluid" />
                            </div>
                            <div class="col-md-8">
                                <span class="badge  <?php echo e($usuario->badgeStatusSocio); ?>">SOCIO <?php echo e($usuario->statusSocio); ?></span>
                                <div class="section-heading half left">
                                    <h4><?php echo e($usuario->titulo); ?> <?php echo e($usuario->nombre); ?> <?php echo e($usuario->apellidoPaterno); ?> <?php echo e($usuario->apellidoMaterno); ?></h4>
                                </div>
                                <p class="text-justify"><?php echo e($usuario->resumenCV); ?></p>
                            </div>
                        </div>
                        <div class="space20"></div>
                        <div class="row">
                            <div class="col">
                                <ul class="member-single-info">
                                    <li><strong>Universidad:</strong><span><?php echo e($usuario->universidad); ?></span></li>
                                    <li><strong>Especialidad:</strong><span><?php echo e($usuario->especialidad); ?></span></li>
                                </ul>
                            </div>
                            <div class="col">
                                <ul class="member-single-info">
                                    <li><strong>Cedula Profesional:</strong><span><?php echo e($usuario->cedulaProfesional); ?></span></li>
                                    <li><strong>Cedula Especialidad:</strong><span><?php echo e($usuario->cedulaEspecialidad); ?></span></li>
                                    <li><strong>Lugar de Trabajo:</strong><span><?php echo e($usuario->lugarTrabajo); ?></span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="member-contact-info-section">
                            <ul class="list-style-1">
                                <li>
                                    <p>
                                        <i class="fas fa-mobile-alt text-center"></i> <strong>DIRECCIÓN:</strong>
                                        <?php if(!empty($usuario->titulo)): ?><?php echo e($usuario->calle); ?> <?php endif; ?>
                                        <?php if(!empty($usuario->numExt)): ?><?php echo e($usuario->numExt); ?> <?php endif; ?>
                                        <?php if(!empty($usuario->numInt)): ?><?php echo e($usuario->numInt); ?> <?php endif; ?>
                                        <?php if(!empty($usuario->colonia)): ?><?php echo e($usuario->colonia); ?> <?php endif; ?>
                                        <?php if(!empty($usuario->municipio)): ?><?php echo e($usuario->municipio); ?> <?php endif; ?>
                                        <?php if(!empty($usuario->localidad)): ?><?php echo e($usuario->localidad); ?> <?php endif; ?>
                                        <?php if(!empty($usuario->estado)): ?><?php echo e($usuario->estado); ?> <?php endif; ?>
                                        <?php if(!empty($usuario->pais)): ?><?php echo e($usuario->pais); ?> <?php endif; ?>
                                    </p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone text-center"></i> <strong>TELÉFONO:</strong> <?php echo e($usuario->telOficina); ?></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-mobile-alt text-center"></i> <strong>MÓVIL:</strong> <?php echo e($usuario->movil); ?></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope text-center"></i> <strong>EMAIL:</strong> <a href="javascript:void(0)"><?php echo e($usuario->email); ?></a></p>
                                </li>
                            </ul>
                        </div>
                        <div class="space20"></div>

                        <div class="text-left">
                            <h4>¿Te gustaría hacer público tus datos?</h4>
                            <input type="checkbox" id="toggle-share">
                            <input hidden id="toggle-share-hidden" value="<?php echo e($usuario->compartirInformacion); ?>">
                            <div class="space10"></div>
                            <small>Unicamente se compartirá tu teléfono de oficina, correo electrónico y dirección, para cuestiones de contacto estarán  a la vista de los visitantes del portal web SMACVE</small>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <input type="hidden" id="seccion_smacve" value="#btn-atencion-al-socio" />

<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('libraries/bootstrap4-toggle-3.4.0/js/bootstrap4-toggle.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/mi_cuenta/mi_cuenta.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template_01', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>