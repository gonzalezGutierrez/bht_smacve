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


    <?php echo $__env->yieldContent('metas-facebook'); ?>

    <!-- Global site tag (gtag.js) - Google Analytics smacveoficial@gmail.com-->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-S9LQN522EB"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-S9LQN522EB');
    </script>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">


    <!-- plugins -->

    <link href="<?php echo e(asset('libraries/bootstrap-4.6.0/css/bootstrap.min.css')); ?>" rel="stylesheet" >
    <link href="<?php echo e(asset('libraries/animate-3.6.0/animate.css')); ?>" rel="stylesheet" >
    <link href="<?php echo e(asset('libraries/fontawesome-5.5.0/css/all.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('libraries/et-line/et-line.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('libraries/icomoon/icomoon.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('libraries/jquery.magnific-popup/magnific-popup.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('libraries/owl_carousel_2-2.3.4/assets/owl.carousel.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('libraries/owl_carousel_2-2.3.4/assets/owl.theme.default.min.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('libraries/xzoom/xzoom.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('css/default.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/nav-menu.css')); ?>" rel="stylesheet">


    <!-- search css -->
    <link rel="stylesheet" href="<?php echo e(asset('css/search.css')); ?>" />

    <!-- custom css -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/template_01.css?v='.time())); ?>" />



    <?php echo $__env->yieldContent('css'); ?>

</head>
<body>



<div id="preloader">
    <div class="row loader">
        <div class="loader-icon"></div>
    </div>
</div>

<div class="main-wrapper">
    <header>
        <div id="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 d-none d-lg-block p-0">
                        <ul class="top-social-icon">
                            <li><a href="https://www.facebook.com/pg/smacve.oficial/"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://twitter.com/smacve_oficial"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="https://www.instagram.com/smacve"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="https://www.youtube.com/channel/UCz9_5YUxOa1i0uTG3sQgwJQ"><i class="fab fa-youtube"></i></a></li>

                            <li><a href="https://www.linkedin.com/in/smacve"><i class="fab fa-linkedin"></i></a></li>
                            <li><a target="_blank" href="https://api.whatsapp.com/send?phone=+525544892572&text=Hola"><i class="fab fa-whatsapp"></i></a></li>
                        </ul>

                        <div class="top-bar-info">
                            <ul>
                                <li><i class="fas fa-mobile-alt"></i>01 55 2614 7849</li>
                                <li><i class="fas fa-envelope"></i>atencionalsocio@smacve.org.mx</li>
                            </ul>
                        </div>

                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 p-0">
                        <div id="dropdownMenuUser" class="dropdown">
                            <button class="dropdown-toggle" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php if(auth()->guard()->guest()): ?>
                                    Acceso a Miembros
                                <?php else: ?>
                                    <?php echo e(Auth::user()->titulo); ?> <?php echo e(Auth::user()->nombre); ?> <?php echo e(Auth::user()->apellidoPaterno); ?> <?php echo e(Auth::user()->apellidoMaterno); ?>

                                <?php endif; ?>
                            </button>
                            <div class="dropdown-menu">
                                <?php if(auth()->guard()->guest()): ?>
                                    <a class="dropdown-item" href="<?php echo e(route('login')); ?>">Iniciar Sesión</a>
                                    <a class="dropdown-item" href="<?php echo e(route('register')); ?>">Nuevo Registro</a>
                                <?php else: ?>
                                    <?php if( Auth::user()->idRol == 1): ?>
                                        <a class="dropdown-item" href="<?php echo e(asset('admin')); ?>">Área de Administración</a>
                                    <?php endif; ?>
                                    <a class="dropdown-item" href="<?php echo e(asset('mi_cuenta')); ?>">Mi Cuenta</a>
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>


                        <div id="dropdownCAV2019" class="dropdown">
                            <button class="dropdown-toggle" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                CDMX 2021
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php echo e(asset('requisitos_2021/convocatoria')); ?>">Requisitos  globales de convocatoria 2021</a>
                                <a class="dropdown-item" href="<?php echo e(asset('pdf/convocatoria_2021.pdf')); ?>" target="_blank">Convocatoria de participación 2021</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="navbar-default">
            <div class="top-search bg-theme">
                <div class="container">
                    <form class="search-form" action="<?php echo e(asset('/')); ?>" method="GET" accept-charset="utf-8">
                        <div class="input-group">
                                <span class="input-group-addon cursor-pointer">
                                    <button class="search-form_submit fas fa-search font-size18 text-white" type="submit"></button>
                                </span>
                            <input type="text" class="search-form_input form-control" name="s" autocomplete="off" placeholder="Escribe aquí">
                            <span class="input-group-addon close-search"><i class="fas fa-times font-size18 line-height-28 margin-5px-top"></i></span>
                        </div>
                    </form>
                </div>
            </div>

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-12">
                        <div class="menu_area alt-font">
                            <nav class="navbar navbar-expand-lg navbar-light no-padding">

                                <div class="navbar-header navbar-header-custom">
                                    <a href="<?php echo e(asset('/')); ?>" class="navbar-brand">
                                        <img id="logo" src="<?php echo e(asset('images/logos/logo_smacve.png')); ?>" alt="SMACVE" />
                                        <span class="xs-display-none">Sociedad Mexicana de Angiología, Cirugía Vascular y Endovascular</span>
                                    </a>
                                </div>

                                <div class="navbar-toggler"></div>

                                <ul class="navbar-nav ml-auto" id="nav" style="display: none;">
                                    <li id="btn-inicio" class="btn-section"><a href="<?php echo e(asset('/')); ?>">Inicio</a></li>
                                    <li id="btn-acerca-de" class="btn-section" >
                                        <a href="javascript:void(0)">ACERCA DE</a>
                                        <ul>
                                            <li><a href="<?php echo e(asset('acerca_de/quienes_somos')); ?>">Quienes Somos</a></li>
                                            <li><a href="<?php echo e(asset('acerca_de/mesa_directiva')); ?>">Mesa Directiva</a></li>
                                            <li><a href="<?php echo e(asset('acerca_de/miembros')); ?>">Miembros Activos</a></li>
                                            <li><a href="<?php echo e(asset('acerca_de/expresidentes')); ?>">Expresidentes</a></li>
                                            <li>
                                                <a href="javascript:void(0)">Códigos de Ética</a>
                                                <ul>
                                                    <li><a href="<?php echo e(asset('acerca_de/codigos_etica/mesa_directiva')); ?>">Mesa Directiva</a></li>
                                                    <li><a href="<?php echo e(asset('acerca_de/codigos_etica/derechos_medicos')); ?>">Médicos</a></li>
                                                    <li><a href="<?php echo e(asset('acerca_de/codigos_etica/derechos_pacientes')); ?>">Pacientes</a></li>
                                                    <li><a href="<?php echo e(asset('acerca_de/codigos_etica/aviso_privacidad')); ?>">Aviso de Privacidad</a></li>
                                                    <li><a href="<?php echo e(asset('acerca_de/codigos_etica/politica_conflictos')); ?>">Política de Conflictos</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="<?php echo e(asset('acerca_de/convenios')); ?>">Convenios</a></li>
                                        </ul>
                                    </li>

                                    <?php if(auth()->guard()->guest()): ?>
                                        <li id="btn-atencion-al-socio" class="btn-section"><a href="javascript:void(0)">Atención al Socio</a>
                                            <ul>
                                                <li><a href="<?php echo e(asset('atencion_socio/guias_clinicas')); ?>">Guias Clínicas</a></li>
                                                <li><a href="<?php echo e(asset('atencion_socio/estatutos')); ?>">Estatutos</a></li>
                                                <li><a href="<?php echo e(asset('atencion_socio/pago_anualidad')); ?>">Pago de Anualidad 2020</a></li>
                                                <li>
                                                    <a href="javascript:void(0)">Actas de Asamblea</a>
                                                    <ul>
                                                        <li><a target="_blank" href="<?php echo e(asset('documentos/acta_asamblea_negocios.pdf')); ?>">Acta de Asamblea de Negocios Vallarta 2018</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">Convocatorias</a>
                                                    <ul>
                                                        <!--
                                                        <li><a target="_blank" href="<?php echo e(asset('documentos/convocatorias/convocatoria_asamblea_general_ordinaria.pdf')); ?>">Convocatoria a Asamblea General Ordinaria</a></li>
                                                        <li><a target="_blank" href="<?php echo e(asset('documentos/convocatorias/convocatoria_asamblea_extraordinaria.pdf')); ?>">Convocatoria a Asamblea Extraordinaria</a></li>
                                                        <li><a target="_blank" href="<?php echo e(asset('documentos/convocatorias/convocatoria_comisionados_honor_justicia.pdf')); ?>">Convocatoria Comisionados Honor y Justicia</a></li>
                                                        <li><a target="_blank" href="<?php echo e(asset('documentos/convocatorias/convocatoria_comisarios.pdf')); ?>">Convocatoria Comisarios</a></li>
                                                        <li><a target="_blank" href="<?php echo e(asset('documentos/convocatorias/convocatoria_vocalias.pdf')); ?>">Convocatoria Vocalías</a></li>
                                                        <li><a target="_blank" href="<?php echo e(asset('documentos/convocatorias/convocatoria_vicepresidente.pdf')); ?>">Convocatoria Vicepresidente</a></li>
                                                        -->
                                                    </ul>
                                                </li>

                                            </ul>
                                        </li>
                                    <?php else: ?>
                                        <li id="btn-atencion-al-socio" class="btn-section"><a href="javascript:void(0)">Mi Cuenta</a>
                                            <ul>
                                                <li><a href="<?php echo e(asset('mi_cuenta')); ?>">Mi Cuenta</a></li>
                                                <li><a href="<?php echo e(asset('mi_cuenta/herramientas_para_socios')); ?>">Herramientas para Socios</a></li>
                                                <li><a href="<?php echo e(asset('mi_cuenta/anualidades')); ?>">Mis Anualidades</a></li>
                                                <li><a href="<?php echo e(asset('mi_cuenta/informacion_pago')); ?>">Información para Pagos</a></li>
                                                <li><a href="<?php echo e(asset('mi_cuenta/mis_datos_personales')); ?>">Editar Información Personal</a></li>
                                                <li><a href="<?php echo e(asset('mi_cuenta/edit_password')); ?>">Cambiar Contraseña</a></li>
                                                <hr/>

                                                <li><a href="<?php echo e(asset('atencion_socio/guias_clinicas')); ?>">Guias Clínicas</a></li>
                                                <li><a href="<?php echo e(asset('atencion_socio/estatutos')); ?>">Estatutos</a></li>
                                                <li><a href="<?php echo e(asset('atencion_socio/pago_anualidad')); ?>">Anualidad 2020</a></li>
                                                <li>
                                                    <a href="javascript:void(0)">Actas de Asamblea</a>
                                                    <ul>
                                                        <li><a target="_blank" href="<?php echo e(asset('documentos/acta_asamblea_negocios.pdf')); ?>">Acta de Asamblea de Negocios Vallarta 2018</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">Convocatorias</a>
                                                    <ul>
                                                        <li><a target="_blank" href="<?php echo e(asset('documentos/convocatorias/convocatoria_asamblea_general_ordinaria.pdf')); ?>">Convocatoria a Asamblea General Ordinaria</a></li>
                                                        <li><a target="_blank" href="<?php echo e(asset('documentos/convocatorias/convocatoria_asamblea_extraordinaria.pdf')); ?>">Convocatoria a Asamblea Extraordinaria</a></li>
                                                        <li><a target="_blank" href="<?php echo e(asset('documentos/convocatorias/convocatoria_comisionados_honor_justicia.pdf')); ?>">Convocatoria Comisionados Honor y Justicia</a></li>
                                                        <li><a target="_blank" href="<?php echo e(asset('documentos/convocatorias/convocatoria_comisarios.pdf')); ?>">Convocatoria Comisarios</a></li>
                                                        <li><a target="_blank" href="<?php echo e(asset('documentos/convocatorias/convocatoria_vocalias.pdf')); ?>">Convocatoria Vocalías</a></li>
                                                        <li><a target="_blank" href="<?php echo e(asset('documentos/convocatorias/convocatoria_vicepresidente.pdf')); ?>">Convocatoria Vicepresidente</a></li>

                                                    </ul>
                                                </li>

                                            </ul>
                                        </li>
                                    <?php endif; ?>

                                    <li id="btn-investigacion" class="btn-section" >
                                        <a href="javascript:void(0)">INVESTIGACIÓN</a>
                                        <ul>
                                            <li><a href="javascript:void(0)">Comité de ciencias básicas</a></li>
                                            <li><a href="javascript:void(0)">Comisión de investigación clínica</a></li>
                                            <li><a href="javascript:void(0)">Comité de Bioetica en investigación y practica vascular</a></li>
                                            <li><a href="<?php echo e(asset('investigacion/comision_actualizacion_gpc/nacionales')); ?>">Comisión de actualización de GPC</a></li>
                                        <li><a href="<?php echo e(asset('investigacion/comite_promocion/')); ?>">Comité de promoción y profesionalización de la investigación</a></li>

                                            <li><a href="javascript:void(0)">Comité de investigación en políticas públicas de cirugía vascular</a></li>
                                        </ul>
                                    </li>


                                    <li id="btn-educacion_medica" class="btn-section" >
                                        <a href="javascript:void(0)">EDUCACIÓN</a>
                                        <ul>
                                            <li><a href="<?php echo e(asset('educacion_medica')); ?>">Webinars y Conferencias</a></li>
                                            <li><a href="<?php echo e(asset('educacion_medica/comision_cirujanos_vasculares_jovenes')); ?>">Comité de Cirujanos Vasculares Jovenes</a></li>
                                        </ul>
                                    </li>


                                    <li id="btn-boletin" class="btn-section" >
                                        <a href="javascript:void(0)">BOLETINES</a>
                                        <ul>
                                            <li><a href="<?php echo e(asset('boletines/sexta_edicion')); ?>">Sexta Edición</a></li>
                                            <li><a href="<?php echo e(asset('boletines/quinta_edicion')); ?>">Quinta Edición</a></li>
                                            <li><a href="<?php echo e(asset('boletines/cuarta_edicion')); ?>">Cuarta Edición</a></li>
                                            <li><a href="<?php echo e(asset('boletines/tercera_edicion')); ?>">Tercera Edición</a></li>
                                            <li><a href="<?php echo e(asset('boletines/segunda_edicion')); ?>">Segunda Edición</a></li>
                                            <li><a href="<?php echo e(asset('boletines/primera_edicion')); ?>">Primera Edición</a></li>
                                        </ul>
                                    </li>
                                    <li id="btn-eventos" class="btn-section">
                                        <a href="javascript:void(0)">Eventos</a>
                                        <ul>
                                            <li><a href="<?php echo e(asset('eventos')); ?>">Eventos internacionales</a></li>
                                            <li><a href="<?php echo e(asset('seminarios-residentes')); ?>">Seminarios Residentes</a></li>
                                            <li><a href="<?php echo e(asset('sesiones_academicas')); ?>">Sesiones Academicas</a></li>
                                        </ul>
                                    </li>
                                    <li id="btn-contacto" class="btn-section"><a href="<?php echo e(asset('contacto')); ?>">Contacto</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <?php echo $__env->yieldContent('content'); ?>

    <footer class="no-padding-top">
        <div class="footer-top-bar margin-50px-bottom xs-margin-30px-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="padding-30px-all sm-padding-25px-tb sm-no-padding-lr border-right border-color-light-white sm-no-border-right sm-border-bottom">
                            <span class="d-inline-block font-size36 line-height-30 sm-font-size32 sm-line-height-30 text-light-gray vertical-align-top width-40px">
                                <i class="fas fa-user-edit vertical-align-top"></i>
                            </span>
                            <div class="d-inline-block vertical-align-top padding-10px-left width-75">
                                <h5 class="no-margin text-white text-uppercase font-size15">ACTUALIZA TU ESTATUS</h5>
                                <a href="<?php echo e(asset('mi_cuenta')); ?>" class="no-margin line-height-normal">Accesa a cuenta</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="padding-30px-all sm-padding-25px-tb sm-no-padding-lr border-right border-color-light-white sm-no-border-right sm-border-bottom">
                            <span class="d-inline-block font-size36 line-height-30 sm-font-size32 sm-line-height-30 text-light-gray vertical-align-top width-40px">
                                <i class="fas fa-money-bill-alt vertical-align-top"></i>
                            </span>
                            <div class="d-inline-block vertical-align-top padding-10px-left width-75">
                                <h5 class="no-margin text-white text-uppercase font-size15">Anualidad</h5>
                                <a href="<?php echo e(asset('atencion_socio/pago_anualidad')); ?>" class="no-margin line-height-normal">Cuota 2021: $3,600.00</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="padding-30px-all sm-padding-25px-tb sm-no-padding-lr">
                            <span class="d-inline-block font-size36 line-height-30 sm-font-size32 sm-line-height-30 text-light-gray vertical-align-top width-40px">
                                <i class="fas fa-headset vertical-align-top"></i>
                            </span>
                            <div class="d-inline-block vertical-align-top padding-10px-left width-75">
                                <h5 class="no-margin text-white text-uppercase font-size15">Contácto</h5>
                                <a href="<?php echo e(asset('contacto')); ?>" class="no-margin line-height-normal">Será un placer atenderte</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6 sm-margin-30px-bottom">
                    <div class="text-center">
                        <img class="footer-logo" alt="SMACVE" src="<?php echo e(asset('images/logos/logo_smacve_white.png')); ?>">
                    </div>

                    <p class="margin-25px-top margin-20px-bottom">Sociedad Mexicana de Angiología, Cirugía Vascular y Endovascular, A.C.</p>
                    <ul class="footer-list">
                        <li>
                            <span class="d-inline-block vertical-align-top font-size18"><i class="fas fa-map-marker-alt text-theme-color"></i></span>
                            <span class="d-inline-block width-85 vertical-align-top padding-10px-left">Alfonso Reyes 161 Col. Condesa, Del. Cuaúhtemoc, Ciudad de México.</span>
                        </li>
                        <li>
                            <span class="d-inline-block vertical-align-top font-size18"><i class="fas fa-mobile-alt text-theme-color"></i></span>
                            <span class="d-inline-block width-85 vertical-align-top padding-10px-left">01 55 2614 7849</span>
                        </li>
                        <li>
                            <span class="d-inline-block vertical-align-top font-size18"><i class="far fa-envelope text-theme-color"></i></span>
                            <span class="d-inline-block width-85 vertical-align-top padding-10px-left">atencionalsocio@smacve.org.mx</span>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="padding-30px-left sm-no-padding-left">
                        <h3 class="text-white">Twitter</h3>
                        <div style="max-width: 320px; overflow-y: hidden;">
                            <a class="twitter-timeline"
                               href="https://twitter.com/smacve_oficial?ref_src=twsrc%5Etfw"
                               width="100%"
                               data-chrome="transparent noheader nofooter noscrollbar noborders"
                               data-lang="es"
                               data-link-color="#d0ad55"
                               data-theme="dark"
                               data-height="300" >
                                Tweets by smacve_oficial</a>
                            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 sm-margin-30px-bottom">
                    <h3 class="text-white">Ligas de Intéres</h3>
                    <div class="row">
                        <div class="col-md-6 no-padding-right xs-padding-15px-right">
                            <ul class="footer-list xs-margin-5px-bottom">
                                <li><a href="http://www.cmacv.org.mx/">CMACVE</a></li>
                                <li><a href="https://hendolat.com">HENDOLAT</a></li>
                                <li><a href="https://cadeci.org.mx/2019/">CADECI</a></li>
                                <li><a href="http://forovenosomexicano.com/">FVM 2019</a></li>
                                <li><a href="https://www.amexipied.com/">AMEXIPIED</a></li>
                                <li><a href="http://www.sociedadcela.org/">CELA</a></li>

                            </ul>
                        </div>
                        <div class="col-md-6 no-padding-right xs-padding-15px-right">
                            <ul class="footer-list">
                                <li><a href="http://cenetec-difusion.com/gpc-sns/">Guías Clínicas</a></li>
                                <li><a href="<?php echo e(asset('atencion_socio/estatutos')); ?>">Estatutos SMACVE</a></li>
                                <li><a href="<?php echo e(asset('atencion_socio/pago_anualidad')); ?>">Anualidad SMACVE</a></li>
                                <li><a href="<?php echo e(asset('acerca_de/codigos_etica/aviso_privacidad')); ?>">Aviso de Privacidad</a></li>
                            </ul>
                        </div>
                    </div>
                </div>


            </div>

        </div>

        <div class="footer-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-left xs-text-center xs-margin-5px-bottom">
                        <div class="footer-social-icons small">
                            <ul>
                                <li><a href="https://www.facebook.com/pg/smacve.oficial/"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://twitter.com/smacve_oficial"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://www.instagram.com/smacve"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="https://www.youtube.com/channel/UCz9_5YUxOa1i0uTG3sQgwJQ"><i class="fab fa-youtube"></i></a></li>

                                <li><a href="https://www.linkedin.com/in/smacve"><i class="fab fa-linkedin"></i></a></li>
                                <li><a target="_blank" href="https://api.whatsapp.com/send?phone=+525544892572&text=Hola"><i class="fab fa-whatsapp"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 text-right xs-text-center">
                        <p class="xs-margin-5px-top xs-font-size13">© 2021 smacve.org.mx By <a href="<?php echo e(asset('https://bht.mx')); ?>">Black Horse Technologies</a></p>
                    </div>
                </div>
            </div>
        </div>

    </footer>

</div>

<?php echo $__env->yieldContent('modal'); ?>



<a href="javascript:void(0)" class="scroll-to-top"><i class="fas fa-angle-up" aria-hidden="true"></i></a>




<script src="<?php echo e(asset('libraries/jquery-3.5.1/js/jquery-3.5.1.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('libraries/jquery.migrate/jquery.migrate-3.3.2.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('libraries/modernizr/modernizr.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('libraries/bootstrap-4.6.0/js/bootstrap.bundle.min.js')); ?>" type="text/javascript"></script>


<script src="<?php echo e(asset('js/nav-menu.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/search.js')); ?>" type="text/javascript"></script>

<script src="<?php echo e(asset('libraries/jquery.magnific-popup/jquery.magnific-popup.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('libraries/easy.responsive.tabs/easy.responsive.tabs.js')); ?>"></script>

<script src="<?php echo e(asset('libraries/owl_carousel_2-2.3.4/owl.carousel.min.js')); ?>" type="text/javascript"></script>


<script src="<?php echo e(asset('libraries/jquery.counterup/jquery.counterup.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('libraries/jquery.stellar/jquery.stellar.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('libraries/jquery.tabs/tabs.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('libraries/isotope.pkgd/isotope.pkgd.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('libraries/jquery.waypoints/jquery.waypoints.min.js')); ?>" type="text/javascript"></script>


<script src="<?php echo e(asset('js/template_01.js?v='.time())); ?>" type="text/javascript"></script>


<?php echo $__env->yieldContent('javascript'); ?>

</body>

</html>
