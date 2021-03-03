<?php $__env->startSection('title','Contacto'); ?>

<?php $__env->startSection('content'); ?>

    <section class="page-title-section2 bg-img cover-background" data-overlay-dark="2" data-background="<?php echo e(asset('images/bg/bg_contacto_info.jpg')); ?>">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Contáctanos</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="<?php echo e(asset('/')); ?>">Inicio</a></li>
                        <li><a href="javascript:void(0)">Contáctanos</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>
    <section class="bg-grey">
        <div class="container">
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

            <div class="text-center section-heading">
                <h3>Estimado socio, es un placer el ayudarte</h3>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <div class="contact-box"><i class="fas fa-phone"></i>
                        <h4>Teléfono</h4><span>01 55 2614 7849</span></div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="contact-box"><i class="far fa-envelope"></i>
                        <h4>Mail</h4><span>atencionalsocio@smacve.org.mx</span></div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="contact-box"><i class="fab fa-whatsapp"></i>
                        <h4>Whatsapp</h4><span>+52 1 55 8681 9072</span></div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="contact-box"><i class="fab fa-facebook-messenger"></i>
                        <h4>Facebook Messenger</h4><span>@smacve.oficial</span></div>
                </div>
            </div>
            <div class="space50"></div>
            <div class="row">
                <div class="col-md-6 sm-margin-30px-bottom">
                    <?php echo Form::open(['url'=>'contacto','method' => 'POST', 'id'=>'FormSendMail','class'=>'']); ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php echo Form::label('nombre', 'Nombre:',['class'=>'sr-only']); ?>

                                <?php echo Form::text('nombre',null,['class'=>'form-control form-control-lg','placeholder'=>'Nombre Completo']); ?>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo Form::label('telefono', 'telefono:',['class'=>'sr-only']); ?>

                                <?php echo Form::text('telefono',null,['class'=>'form-control form-control-lg','placeholder'=>'Telefono']); ?>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo Form::label('email', 'Email:',['class'=>'sr-only']); ?>

                                <?php echo Form::text('email',null,['class'=>'form-control form-control-lg','placeholder'=>'E-Mail']); ?>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php echo Form::label('mensaje', 'Mensaje:',['class'=>'sr-only']); ?>

                                <?php echo Form::textarea('mensaje',null,['class'=>'form-control form-control-lg','placeholder'=>'Mensaje','rows'=>'5']); ?>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group <?php echo e($errors->has('g-recaptcha-response') ? ' has-error' : ''); ?>">
                                <label for="g-recaptcha-response" class="sr-only">Recaptcha</label>
                                <?php echo Recaptcha::render(); ?>

                            </div>
                        </div>


                        <div class="col-md-12">
                            <button type="submit" class="butn"><span>Enviar Mensaje</span></button>
                        </div>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
                <div class="col-md-6">
                    <div class="contact-info-box padding-30px-left sm-no-padding">
                        <div class="contact-info-section">
                            <h4>Visítanos</h4>
                            <ul class="fa-ul no-margin-bottom" style="margin-left: 1.5em;">
                                <li style="padding-left: 10px;"><span class="fa-li" ><i class="fas fas fa-map-marker-alt"></i></span><strong>Dirección:</strong> Alfonso Reyes 161 Col. Condesa, Del. Cuaúhtemoc, Ciudad de México.</li>
                            </ul>
                        </div>
                        <div class="contact-info-section border-none no-padding-bottom no-margin-bottom">

                            <h4>Horarios de Atención</h4>
                            <ul class="list-style-2">
                                <li>Lunes - Viernes - 8:00am a 5:00pm</li>
                                <li>Sabado - Cerrado</li>
                                <li>Domingo - Cerrado</li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="map" style="position: relative; overflow: hidden;"></div>

    <input type="hidden" id="seccion_smacve" value="#btn-contacto" />

<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>
    <!-- Clave API  AIzaSyD8qcmSDv99YKxFFfBJEfU9bkU0EqQYqAo  -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8qcmSDv99YKxFFfBJEfU9bkU0EqQYqAo&callback=initMap"></script>

    <script type="text/javascript" src="<?php echo e(asset('libraries/jquery-validate-1.19.0/jquery.validate.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('libraries/jquery-validate-1.19.0/additional-methods.min.js')); ?>"></script>


    <script src="<?php echo e(asset('js/contacto.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template_01', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>