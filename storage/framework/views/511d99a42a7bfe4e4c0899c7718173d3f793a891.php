<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <!-- metas -->
    <meta charset="utf-8">
    <meta name="author" content="Black Horse Technologies" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Pagina Oficial de la Sociedad Mexicana de Angiología, Cirugía Vascular y Endovascular" >
    <meta name="keywords" content="evento médico, cdmx, endovascular, vascular, intervencionismo periférico, amputaciones, latinoamerica" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>SMACVE | <?php echo $__env->yieldContent('title'); ?></title>

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('images/favicon/apple-touch-icon.png')); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('images/favicon/favicon-32x32.png')); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('images/favicon/favicon-16x16.png')); ?>">
    <link rel="manifest" href="<?php echo e(asset('images/favicon/site.webmanifest')); ?>">
    <link rel="mask-icon" href="<?php echo e(asset('images/favicon/safari-pinned-tab.svg')); ?>" color="#800b1d">
    <meta name="msapplication-TileColor" content="#b91d47">
    <meta name="theme-color" content="#ffffff">
    <link rel="shortcut icon" href="<?php echo e(asset('images/favicon/favicon.ico')); ?>">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">


    <!-- Styles -->
    <link href="<?php echo e(asset('libraries/bootstrap-4.6.0/css/bootstrap.min.css')); ?>" rel="stylesheet" >
    <link href="<?php echo e(asset('libraries/fontawesome-5.5.0/css/all.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/template_00.css')); ?>" rel="stylesheet">

    <?php echo $__env->yieldContent('css'); ?>

</head>
<body>
    <nav id="menu-principal" class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(asset('/')); ?>">
                <img src="<?php echo e(asset('images/logos/logo_smacve_white.png')); ?>"  height="50px" />&nbsp;<span>ADMINISTRACIÓN SMACVE</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(asset('/')); ?>">Regresar a Página</a>
                    </li>
                    <?php if(auth()->guard()->guest()): ?>
                        <li id="btn_registro"  class="nav-item btn-seccion">
                            <?php if(Route::has('register')): ?>
                                <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Nuevo Registro')); ?></a>
                            <?php endif; ?>
                        </li>
                        <li id="btn_login"  class="nav-item btn-seccion">
                            <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Iniciar Sesión')); ?></a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <?php echo e(Auth::user()->titulo); ?> <?php echo e(Auth::user()->nombre); ?>  <?php echo e(Auth::user()->apellidoPaterno); ?> <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Logout')); ?>

                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->yieldContent('modal'); ?>



    <div id="loading">
        <i class="fa fa-refresh fa-spin"></i><br/>
        Cargando...
    </div>

    <!-- Scripts -->

    <script src="<?php echo e(asset('libraries/jquery-3.5.1/js/jquery-3.5.1.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('libraries/jquery.migrate/jquery.migrate-3.3.2.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('libraries/modernizr/modernizr.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('libraries/bootstrap-4.6.0/js/bootstrap.bundle.min.js')); ?>" type="text/javascript"></script>

    <script type="text/javascript" src="<?php echo e(asset('libraries/bootbox-v4.4.0/bootbox.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('libraries/jquery-validate-1.19.0/jquery.validate.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('libraries/jquery-validate-1.19.0/additional-methods.min.js')); ?>"></script>


    <script type="text/javascript" src="<?php echo e(asset('js/admin/template_00.js')); ?>"></script>

    <?php echo $__env->yieldContent('javascript'); ?>
</body>
</html>
