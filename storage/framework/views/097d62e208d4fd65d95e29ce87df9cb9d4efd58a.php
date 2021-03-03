<?php $__env->startSection('title','Mi Cuenta'); ?>

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
                        <li><a href="<?php echo e(asset('mi_cuenta')); ?>">Mi Cuenta</a></li>
                        <li><a href="javascript:void(0)">Herramientas para el Socio</a></li>
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
                            <li><a href="<?php echo e(asset('mi_cuenta')); ?>">Mi Cuenta</a></li>
                            <li class="active"><a href="<?php echo e(asset('mi_cuenta/herramientas_para_socios')); ?>">Herramientas para el Socio</a></li>
                            <li><a href="<?php echo e(asset('mi_cuenta/anualidades')); ?>">Mis Anualidades</a></li>
                            <li><a href="<?php echo e(asset('mi_cuenta/informacion_pago')); ?>">Información para Pago</a></li>
                            <li><a href="<?php echo e(asset('mi_cuenta/mis_datos_personales')); ?>">Editar información Personal</a></li>
                            <li><a href="<?php echo e(asset('mi_cuenta/edit_password')); ?>">Cambiar Contraseña</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 col-sm-12">
                    <div class="section-heading half left">
                        <h4>Herramientas para el Socio</h4>
                    </div>
                    <p class="text-justify">Estimado <strong><?php echo e($usuario->titulo); ?> <?php echo e($usuario->nombre); ?> <?php echo e($usuario->apellidoPaterno); ?> <?php echo e($usuario->apellidoMaterno); ?></strong>,
                        A continuación te dejamos diferentes formatos que podrán servirte como herramientas en tu oficina.
                    </p>
                    <div class="space30"></div>

                    <div id="accordion" class="accordion-style">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        Aviso de Privacidad
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    <ul class="list-style-5">
                                        <li><a target="_blank" href="<?php echo e(asset('herramientas_socios/aviso_privacidad.pdf')); ?>">Aviso de Privacidad</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                        Carta de Consentimiento Bajo Información
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    <ul class="list-style-5">
                                        <li><a target="_blank" href="<?php echo e(asset('herramientas_socios/ccbi_amputacion_mayor.pdf')); ?>">Amputación Mayor de Miembro Inferior: Supracondilea ó Infracondilea.</a></li>
                                        <li><a target="_blank" href="<?php echo e(asset('herramientas_socios/ccbi_amputacion_menor.pdf')); ?>">Amputación Menor de Miembro Inferior: Dedo, Transmetatarsiana, Lisfranc, chopart.</a></li>
                                        <li><a target="_blank" href="<?php echo e(asset('herramientas_socios/ccbi_angiografia.pdf')); ?>">Angiografía más Intervención Endovascular de Miembro Inferior.</a></li>
                                        <li><a target="_blank" href="<?php echo e(asset('herramientas_socios/ccbi_angioplastia.pdf')); ?>">Angioplastía y Stenting Carotídeo.</a></li>
                                        <li><a target="_blank" href="<?php echo e(asset('herramientas_socios/ccbi_bypass_infrainguinal.pdf')); ?>">Bypass Infrainguinal con Injerto Autólogo en Miembro Inferior.</a></li>
                                        <li><a target="_blank" href="<?php echo e(asset('herramientas_socios/ccbi_colocacion_cateter_hemodialisis.pdf')); ?>">Colocación o Recambio de Cateter Permanente para Hemodiálisis.</a></li>
                                        <li><a target="_blank" href="<?php echo e(asset('herramientas_socios/ccbi_colocacion_filtro_vena_cava.pdf')); ?>">Colocación de Filtro de Vena Cava.</a></li>
                                        <li><a target="_blank" href="<?php echo e(asset('herramientas_socios/ccbi_endarterectomia_carotidea.pdf')); ?>">Endarterectomía Carotídea.</a></li>
                                        <li><a target="_blank" href="<?php echo e(asset('herramientas_socios/ccbi_escleroterapia.pdf')); ?>">Escleroterapia Transdermica o Ecoguiada.</a></li>
                                        <li><a target="_blank" href="<?php echo e(asset('herramientas_socios/ccbi_exclusion_endovascular_aneurisma.pdf')); ?>">Exclusión Endovascular de Aneurisma Aortico Infrarrenal.</a></li>
                                        <li><a target="_blank" href="<?php echo e(asset('herramientas_socios/ccbi_fistulas_arteriovenosas.pdf')); ?>">Fistula Arteriovenosa Autóloga de Miembro Superior.</a></li>
                                        <li><a target="_blank" href="<?php echo e(asset('herramientas_socios/ccbi_reparacion_abierta_aaa.pdf')); ?>">Reparación Abierta de AAA Infrarrenal con Injerto Protesico Bifucardo.</a></li>
                                        <li><a target="_blank" href="<?php echo e(asset('herramientas_socios/ccbi_reseccion_glomus_carotideo.pdf')); ?>">Resección de Glomus Carotídeo.</a></li>
                                        <li><a target="_blank" href="<?php echo e(asset('herramientas_socios/ccbi_safenoablacion.pdf')); ?>">Safenoablación con Laser o Radiofrecuencia.</a></li>
                                        <li><a target="_blank" href="<?php echo e(asset('herramientas_socios/ccbi_safenoexceresis.pdf')); ?>">Safenoexceresis más Flebectomias.</a></li>
                                        <li><a target="_blank" href="<?php echo e(asset('herramientas_socios/ccbi_trombolisis_farmacomecanica.pdf')); ?>">Trombólisis Farmacomecanicas por TVP Aguda de Miembros Inferiores o Superiores.</a></li>
                                    </ul>
                                </div>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template_01', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>