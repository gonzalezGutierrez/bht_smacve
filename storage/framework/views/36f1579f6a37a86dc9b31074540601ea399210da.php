<?php $__env->startSection('title','Solicitud de Voluntariado'); ?>


<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/voluntariado.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="<?php echo e(asset('images/bg/bg_mi_cuenta.jpg')); ?>">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Solicitud de Voluntariado</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="<?php echo e(asset('/')); ?>">Inicio</a></li>
                        <li><a href="<?php echo e(asset('voluntariado')); ?>">Solicitud de Voluntariado</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12 col-sm-12 ">
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

                    <div class="section-heading half left">
                        <h4>Solicitud de voluntario para participar en un comité de la SMACVE</h4>
                    </div>

                    <p class="text-justify">Si está interesado en formar parte de un comité de SMACVE, complete la siguiente solicitud. No podrá seleccionar y postularse para más de 2 comités. Como parte del proceso de solicitud, se le pedirá que proporcione una breve declaración de intereses y describa la experiencia, competencias o razones específicas por las cuales desea ser parte del comité en el que está interesado en participar. Además, se le pedirá que complete una sección donde manifieste de forma breve su compromiso para colaborar y esté de acuerdo con la política de conflicto de intereses. Tenga en cuenta que las relaciones con la industria no descalifican a nadie del servicio del Comité, pero es un requisito que se divulguen por completo.</p>
                    <p class="text-justify">Los solicitantes no serán considerados para nombramientos a un Comité hasta que ambas partes de la solicitud estén completas.</p>
                    <p class="text-justify">La SMACVE invierte en un proceso que asegura diversidad, equidad e inclusión en todos los niveles, incluida la representación en sus juntas de trabajo, consejos y comités. Buscamos miembros entusiastas y elegibles de todos los aspectos de género, orientación sexual, edad, ubicación geográfica y entorno de práctica para aplicar y enriquecer nuestros recursos de SMACVE.</p>
                    <p class="text-justify">El Comité de nombramientos está compuesto por el Presidente, el Secretario, Tesorero, y representantes de los comités de educación médica continua, científico, comités clínicos de patología arterial, patología venosa y linfática, Pie diabético, accesos vasculares y terapia sustitutiva renal y Cirujanos Vasculares Jóvenes. Deseamos despertar un gran entusiasmo de colaboración de los socios y así contar con un gran número de solicitantes para que puedan ser nombrados para un comité, quisiéramos ver muchos más solicitantes que puestos vacantes. Además, comuníquese con SMACVE para conocer otras formas de participar.</p>
                    <p class="text-justify"><strong>Los nombramientos se anunciarán a finales de marzo.</strong></p>
                    <p class="text-justify">En nombre de la mesa directiva de SMACVE, gracias por todo lo que está haciendo en nombre de sus pacientes y de SMACVE.</p>
                    <p class="text-justify">Si tiene alguna pregunta, no dude en enviar un correo electrónico a <a href="mailto:presidencia@smacve.org.mx">presidencia@smacve.org.mx</a></p>

                    <div class="text-center">
                        <a class="butn theme medium" href="<?php echo e(asset('voluntariado/step_1')); ?>"><span>Iniciar la Solicitud</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <input type="hidden" id="seccion_smacve" value="#btn-atencion-al-socio" />

<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template_01', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>