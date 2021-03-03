<?php $__env->startSection('title','Comision de actualizacion GPC'); ?>

<?php $__env->startSection('css'); ?>

    <style>
        .text-link {
            color:#d0ad55 !important;
        }
    </style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="<?php echo e(asset('images/bg/bg_mi_cuenta.jpg')); ?>">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h1>Comisión de actualización de GPC</h1>
            </div>
            <div class="col-md-12">
                <ul>
                    <li><a href="<?php echo e(asset('/')); ?>">Inicio</a></li>
                    <li><a href="javascript:void(0)">Comisión de actualización de GPC</a></li>
                </ul>
            </div>
        </div>

    </div>
</section>

<section class="container">
    <div class="section-heading">
        <h3>Guías de práctica clínica<br>
            <small>Coordinador: MCs Dr. Rodrigo Lozano Corona</small>
        </h3>
        <p class="width-55 sm-width-75 xs-width-95">En esta sección el socio puede consultar hasta 150 Guías de Práctica Clínica (GPC).</p>
    </div>
    <div class="space30"></div>
    <div class="row">
        <div class="col-lg-4 col-md-5 col-sm-12 padding-50px-right md-padding-30px-right sm-padding-15px-right">
            <h6 class="font-weight-700 font-size16 sm-font-size14 text-uppercase left-title margin-20px-bottom">Guías</h6>
            <div class="single-sidebar-menu">
                <ul class="no-margin">
                    <li class="<?php if($section=='nacionales'): ?> active <?php endif; ?>"><a href="<?php echo e(asset('investigacion/comision_actualizacion_gpc/nacionales')); ?>">Guías de práctica nacionales</a></li>
                    <li class="<?php if($section=='internacionales'): ?> active <?php endif; ?>"><a href="<?php echo e(asset('investigacion/comision_actualizacion_gpc/internacionales')); ?>">Guías de práctica internacionales</a></li>
                    <li class="<?php if($section=='british'): ?> active <?php endif; ?>"><a href="<?php echo e(asset('investigacion/comision_actualizacion_gpc/british')); ?>">Guias British Journal</a></li>
                    <li class="<?php if($section=='pdf_clinica'): ?> active <?php endif; ?>"><a href="<?php echo e(asset('investigacion/comision_actualizacion_gpc/pdf_clinica')); ?>">PDF de Guías de practicas clínicas</a></li>
                    <li class="<?php if($section=='libros'): ?> active <?php endif; ?>"><a href="<?php echo e(asset('investigacion/comision_actualizacion_gpc/libros')); ?>">Libros</a></li>

                </ul>
            </div>
        </div>

        <div class="col-md-8 col-lg-8 col-xs-12">
            <?php if($section == 'nacionales'): ?>
                <div class="nacionales">

                    <h6><strong>Guías de práctica clínica del CENETEC sobre patología vascular.</strong></h6>

                    <?php
                        $nacionales = App\GPC::where('tipo','nacionales')->orderBy('idGPC','ASC')->groupBy('Tpico')->select('Tpico','idGPC')->get();
                        $count = 1;
                    ?>
                    <?php $__currentLoopData = $nacionales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $items = App\GPC::where('Tpico',$item->Tpico)->where('tipo','nacionales')->orderBy('idGPC','ASC')->select('link','nombre')->get();
                        ?>
                        <h6><?php echo e($item->Tpico); ?>: </h6>
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="mb-2"><?php echo e($count++); ?>.- <?php echo e($i->nombre); ?></span> <br>
                            <?php if(Auth::user()->idStatusSocio == 1): ?>
                                <span>Disponible en: <a href="<?php echo e(asset($i->link)); ?>" class="text-link" target="_blank"><?php echo e(asset($i->link)); ?></a></span>
                            <?php else: ?>
                                <span>Disponible en: <a href="#" data-toggle="modal" class="text-link" data-target="#exampleModal"><?php echo e(asset($i->link)); ?></a></span>
                            <?php endif; ?>
                            <hr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

            <?php if($section == 'internacionales'): ?>
                <div class="internacionales">
                        <?php
                            $internacionales = App\GPC::where('tipo','internacionales')->groupBy('Tpico')->orderBy('Tpico','ASC')->select('Tpico')->get();
                            $count = 1;
                        ?>
                        <?php $__currentLoopData = $internacionales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $items = App\GPC::where('Tpico',$item->Tpico)->where('tipo','internacionales')->select('link','nombre')->get();
                            ?>
                            <h6><?php echo e($item->Tpico); ?>: </h6>
                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="mb-2"><?php echo e($count++); ?>.- <?php echo e($i->nombre); ?></span> <br>
                                <?php if(Auth::user()->idStatusSocio == 1): ?>
                                    <span>Disponible en: <a href="<?php echo e(asset($i->link)); ?>" class="text-link" target="_blank"><?php echo e(asset($i->link)); ?></a></span>
                                <?php else: ?>
                                    <span>Disponible en: <a href="#" data-toggle="modal" class="text-link" data-target="#exampleModal"><?php echo e(asset($i->link)); ?></a></span>
                                <?php endif; ?>
                                <hr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
            <?php endif; ?>

            <?php if($section == 'british'): ?>
                <div class="british">
                        <?php
                            $british = App\GPC::where('tipo','british')->select('nombre','link')->get();
                            $count = 1;
                        ?>
                        <?php $__currentLoopData = $british; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="mb-2"><?php echo e($count++); ?>.- <?php echo e($item->nombre); ?></span> <br>
                            <?php if(Auth::user()->idStatusSocio == 1): ?>
                                <span>Disponible en: <a href="<?php echo e(asset($item->link)); ?>" class="text-link" target="_blank"><?php echo e(asset($item->link)); ?></a></span>
                            <?php else: ?>
                                <span>Disponible en: <a href="#" data-toggle="modal" class="text-link" data-target="#exampleModal"><?php echo e(asset($item->link)); ?></a></span>
                            <?php endif; ?>
                            <hr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

            <?php if($section == 'pdf_clinica'): ?>
                 <div class="pdf_clinica">
                        <?php
                            $pdf_clinicas = App\GPC::where('tipo','pdf_clinica')->select('nombre','link')->get();
                            $count = 1;
                        ?>
                        <?php $__currentLoopData = $pdf_clinicas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="mb-2"><?php echo e($count++); ?>.- <?php echo e($item->nombre); ?></span> <br>
                            <?php if(Auth::user()->idStatusSocio == 1): ?>
                                <span>Disponible en: <a href="<?php echo e(asset($item->link)); ?>" class="text-link" target="_blank"><?php echo e(asset($item->link)); ?></a></span>
                            <?php else: ?>
                                <span>Disponible en: <a href="#" data-toggle="modal" class="text-link" data-target="#exampleModal"><?php echo e(asset($item->link)); ?></a></span>
                            <?php endif; ?>
                            <hr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </div>
            <?php endif; ?>

            <?php if($section == 'libros'): ?>
                <div class="libros">
                        <?php
                            $libros = App\GPC::where('tipo','libros')->select('nombre','link')->get();
                            $count = 1;
                        ?>
                        <?php $__currentLoopData = $libros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="mb-2"><?php echo e($count++); ?>.- <?php echo e($item->nombre); ?></span> <br>
                            <?php if(Auth::user()->idStatusSocio == 1): ?>
                                <span>Disponible en: <a href="<?php echo e(asset($item->link)); ?>" class="text-link" target="_blank"><?php echo e(asset($item->link)); ?></a></span>
                            <?php else: ?>
                                <span>Disponible en: <a href="#" class="text-link" data-toggle="modal" data-target="#exampleModal"><?php echo e(asset($item->link)); ?></a></span>
                            <?php endif; ?>
                            <hr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>











    </div>
</section>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title text-uppercase" id="exampleModalLabel">Hola, <?php echo e(Auth::user()->nombre); ?> <?php echo e(Auth::user()->apellidoPaterno); ?></h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Para poder acceder a este link necesitas ser un mimbro activo, para mas infomarción escribenos al correo atencionalsocio@smacve.org.mx
        </div>
        <div class="modal-footer">
            <a href="<?php echo e(asset('mi_cuenta/anualidades')); ?>" target="_blank" class="btn btn-primary">Mis anualizadades</a>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
        </div>
    </div>
</div>


<input type="hidden" id="seccion_smacve" value="#btn-investigacion" />
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template_01', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>