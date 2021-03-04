<?php $__env->startSection('title','Proveedores'); ?>

<?php $__env->startSection('css'); ?>
<style media="screen">

    .active {
        color:#967D3D !important;
    }

    .form-control {
        border-radius: 0px !important;
        border: none;
    }

    .btn_smacve {
        background: #d0ad55;
        color:white !important;
        border:none !important;
    }

    label{ color:grey; font-size: 25px;}

    input[type = "radio"]{ display:none;}

    .clasificacion{
      direction: rtl;/* right to left */
      unicode-bidi: bidi-override;/* bidi de bidireccional */
    }

    label:hover{color:orange;}

    label:hover ~ label{color:orange;}

    input[type = "radio"]:checked ~ label{color:orange;}

    #form {
      width: 250px;
      margin: 0 auto;
      height: 50px;
    }

    #form p {
      text-align: center;
    }

    #form label {
      font-size: 20px;
    }

    input[type="radio"] {
      display: none;
    }

    label {
      color: grey;
    }

    .clasificacion {
      direction: rtl;
      unicode-bidi: bidi-override;
    }

    label:hover,
    label:hover ~ label {
      color: orange;
    }

    input[type="radio"]:checked ~ label {
      color: orange;
    }

</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="<?php echo e(asset('images/bg/educacion_medica.jpg')); ?>">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Proveedores</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="<?php echo e(asset('/')); ?>">Inicio</a></li>
                        <li><a href="<?php echo e(asset('proveedores')); ?>">Proveedores</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 order-lg-1 order-md-2 padding-30px-right xs-padding-15px-right sm-margin-30px-top">
                    <div class="side-bar">
                        <div class="widget search">
                            <form method="GET" role="search" action="<?php echo e(asset('proveedores/')); ?>">
                                <input type="search" id="txtbuscar" name="txtsearch"  placeholder="Buscar ..." value="<?php echo e($txtsearch); ?>">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>

                            <small class="total_registros badge badge-secondary"> <?php echo e($proveedores->count()); ?> proveedores Encontrados</small>
                        </div>
                        <a href="<?php echo e(asset('proveedores/create')); ?>" class="btn btn-dark btn-sm">Registra un nuevo proveedor</a>
                        <a href="<?php echo e(asset('proveedores/categorias/create')); ?>" class="btn btn-dark mt-2 btn-sm">Registra nueva categoria</a> <hr>
                        <hr>
                        <div class="widget">
                            <div class="widget-title d-flex justify-content-between">
                                <h6>Categorías</h6>
                            </div>
                            <ul class="categorias">
                                <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="">
                                        <a class="text-uppercase <?php echo e($categoria->idCategoria == $categoriaSearch ? 'active' : ''); ?>" href="<?php echo e(asset("proveedores?txtsearch=".$txtsearch."&categoria=".$categoria->idCategoria)); ?>">
                                            <?php echo e($categoria->categoria); ?>

                                        </a>
                                        <?php if(Auth::user()->idUsuario == $categoria->idUsuario): ?>
                                            <a href="<?php echo e(asset('proveedores/categorias/'.$categoria->idCategoria.'/edit')); ?>"> <i class="fas fa-edit"></i> </a>
                                        <?php endif; ?>
                                    </li>
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
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 order-lg-2 order-md-1">
                    <?php $__empty_1 = true; $__currentLoopData = $proveedores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proveedor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="blog-list">
                            <div class=blog-list-simple>
                                <div class="row">
                                    <div class="col-md-9 col-sm-9">
                                        <div class="blog-list-simple-text">
                                            <span class="category"><?php echo e($proveedor->category); ?></span>
                                            <h4><?php echo e($proveedor->proveedor); ?></h4>
                                            <ul class="meta">
                                                <li>
                                                    <a href="javascript:void(0);">
                                                        <i class="fas fa-phone" aria-hidden="true"></i>  <?php echo e($proveedor->proveedorPhone); ?>

                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);">
                                                        <i class="fas fa-envelope" aria-hidden="true"></i> <?php echo e($proveedor->proveedorEmail); ?>

                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"  style="font-size:16px;">
                                                        <i class="fas fa-star" style="font-size:16px; color:orange;" aria-hidden="true"></i>
                                                        <?php echo e($proveedor->calificacion); ?>

                                                    </a>
                                                </li>
                                            </ul>
                                            <p class="text-justify"><?php echo e($proveedor->descripcion); ?></p>

                                            <div class="text-left">
                                                <a href="<?php echo e(asset('proveedores/'.$proveedor->proveedorURL)); ?>" class="butn small mb-3">
                                                    <span>Detalle</span>
                                                </a>
                                                <?php if(Auth::user()->idUsuario == $proveedor->idUsuario): ?>
                                                    <a href="<?php echo e(asset('proveedores/'.$proveedor->proveedorURL.'/edit')); ?>" class="butn small"> Actualizar</span></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md3 col-sm-3 mt-5">
                                        <p class="clasificacion">

                                            <?php for($i=0; $i<5-$proveedor->calificacion; $i++): ?>
                                                <span class="fas fa-star" style="font-size:16px;"></span>
                                            <?php endfor; ?>

                                            <?php for($i=0; $i<$proveedor->calificacion; $i++): ?>
                                                <span class="fas fa-star" style="color:orange; font-size:16px;"></span>
                                            <?php endfor; ?>



                                         </p>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <h4>Ningun registro encontrado...</h4>
                    <?php endif; ?>
                    <div style="margin-bottom: 100px; margin-top: 70px;">
                        <?php echo e($proveedores->appends(['txtsearch'=>$txtsearch])->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <input type="hidden" id="seccion_smacve" value="#btn-educacion_medica" />


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template_01', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>