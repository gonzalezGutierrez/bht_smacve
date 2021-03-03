<?php $__env->startSection('title','Contenido Científico'); ?>

<?php $__env->startSection('content'); ?>

    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="<?php echo e(asset('images/bg/educacion_medica.jpg')); ?>">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Contenido Científico</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="<?php echo e(asset('/')); ?>">Inicio</a></li>
                        <li><a href="<?php echo e(asset('educacion_medica')); ?>">Contenido Científico</a></li>
                        <?php if(!empty($categoriaSelecionadaName)): ?>
                            <li><a href="javascript:void(0)"><?php echo e($categoriaSelecionadaName); ?></a></li>
                        <?php endif; ?>

                    </ul>
                </div>
            </div>

        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 order-lg-1 order-md-2 padding-30px-right xs-padding-15px-right sm-margin-30px-top">
                    <div class="side-bar">
                        <div class="widget search">
                            <form method="GET" role="search" action="<?php echo e(asset('educacion_medica/buscar')); ?>">
                                <input type="search" id="txtbuscar" name="txtbuscar"  placeholder="Buscar ..." value="<?php echo e($txtbuscar); ?>">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>

                            <small class="total_registros"><?php echo e($post->total()); ?> Registros Encontrados</small>
                        </div>
                        <div class="widget">
                            <div class="widget-title">
                                <h6>Contenido Reciente</h6>
                            </div>
                            <ul>
                                <?php $__currentLoopData = $postRecientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reciente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(asset('educacion_medica/'.$reciente->nameURL.'/post/'.$reciente->idPost)); ?>"><?php echo e($reciente->titulo); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <div class="widget">
                            <div class="widget-title">
                                <h6>Categorías</h6>
                            </div>
                            <ul>
                                <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a id="btn_<?php echo e($cat->nameURL); ?>"  href="<?php echo e(asset('educacion_medica/'.$cat->nameURL)); ?>"><?php echo e($cat->categoriaPost); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <div class="widget">
                            <div class="widget-title">
                                <h6>Siguenos</h6>
                            </div>
                            <ul class="social-listing">
                                <li><a href="https://www.facebook.com/pg/smacve.oficial/"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://twitter.com/smacve_oficial"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="https://www.youtube.com/channel/UCz9_5YUxOa1i0uTG3sQgwJQ"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12 order-lg-2 order-md-1">
                    <?php if(session('warning')): ?>
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <?php echo session('warning'); ?>

                        </div>
                    <?php endif; ?>


                    <div class="blog-list">
                        <?php
                        $mesesArray       = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
                        ?>

                        <?php if(count($post) > 0): ?>
                            <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class=blog-list-simple>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-12 sm-margin-20px-bottom">
                                            <div class=blog-list-simple-img>
                                                <img alt="<?php echo e($item->titulo); ?>" src="<?php echo e(asset('images/educacion_medica/thumb_post/'.$item->thumb)); ?>" title="<?php echo e($item->titulo); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-sm-12">
                                            <div class="blog-list-simple-text">
                                                <span class="category"><?php echo e($item->categoriaPost); ?></span>
                                                <?php if($item->premium == 1): ?>
                                                    <span class="badge badge-warning">Solo Miembros</span>
                                                <?php endif; ?>
                                                <h4><?php echo e($item->titulo); ?></h4>
                                                <ul class="meta">
                                                    <li>
                                                        <a href="javascript:void(0);">
                                                            <i class="fas fa-user-tie" aria-hidden="true"></i>  <?php echo e($item->autor); ?>

                                                        </a>
                                                    </li>
                                                    <li>
                                                        <?php
                                                        $numMes           = intval(date('n', strtotime($item->fechaPublicacion))) - 1;
                                                        $fechaPublicacion = date('d ', strtotime($item->fechaPublicacion)).$mesesArray[$numMes].date(' Y', strtotime($item->fechaPublicacion));
                                                        ?>
                                                        <a href="javascript:void(0);">
                                                            <i class="fas fa-calendar-alt" aria-hidden="true"></i> <?php echo e($fechaPublicacion); ?>

                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">
                                                            <i class="fas fa-folder-open" aria-hidden="true"></i> <?php echo e($item->numVisitas); ?> VECES VISTO
                                                        </a>
                                                    </li>
                                                </ul>
                                                <p><?php echo e($item->descripcion); ?></p>
                                                <div class="text-left margin-10px-top">
                                                    <a href="<?php echo e(asset('educacion_medica/'.$item->nameURL.'/post/'.$item->idPost)); ?>" class="butn small"><span>Leer más</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <h5 class="my-5 text-center">No se ha encontrado contenido</h5>
                        <?php endif; ?>
                    </div>
                    <div style="margin-bottom: 100px; margin-top: 70px;">

                        <?php echo $post->appends(['txtbuscar' => $txtbuscar])->links(); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <input type="hidden" id="seccion_smacve" value="#btn-educacion_medica" />
    <input type="hidden" id="categoria_educacion_medica" value="#btn_<?php echo e($categoriaSelecionada); ?>" />

<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('js/educacion_medica/educacion_medica.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template_01', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>