<?php
$paises         = \App\Pais::where('eliminado',0)->pluck('pais','idPais');
$estados        = \App\Estado::where('eliminado',0)->pluck('estado','idEstado');
?>


<?php $__env->startSection('title','Registro de Socios'); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('libraries/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="<?php echo e(asset('images/bg/bg_register.jpg')); ?>">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Registro de Socios</h1>
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
                <div class="col-lg-6">
                    <div class="bg-white padding-30px-all sm-padding-20px-all border border-width-5">
                        <?php echo Form::open(['url'=>'register','method' => 'POST', 'id'=>'FormRegister','class'=>'contact-form']); ?>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php echo Form::label('titulo', 'Titulo:',['class'=>'sr-only']); ?>

                                    <?php echo Form::text('titulo',null,['class'=>'form-control form-control-lg','placeholder'=>'Titulo']); ?>

                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <?php echo Form::label('nombre', 'Nombre:',['class'=>'sr-only']); ?>

                                    <?php echo Form::text('nombre',null,['class'=>'form-control form-control-lg','placeholder'=>'Nombre']); ?>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo Form::label('apellidoPaterno', 'Apellido Paterno:',['class'=>'sr-only']); ?>

                                    <?php echo Form::text('apellidoPaterno',null,['class'=>'form-control form-control-lg','placeholder'=>'Apellido Paterno']); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo Form::label('apellidoMaterno', 'Apellido Materno:',['class'=>'sr-only']); ?>

                                    <?php echo Form::text('apellidoMaterno',null,['class'=>'form-control form-control-lg','placeholder'=>'Apellido Materno']); ?>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <?php echo Form::label('fechaNacimiento', 'Fecha Nacimiento:',['class'=>'sr-only']); ?>

                                    <div style="display: block; position: relative;">
                                        <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                            <input id="fechaNacimiento" name="fechaNacimiento" type="text" class="form-control form-control-lg datetimepicker-input" data-target="#datetimepicker1" placeholder="Fecha Nacimiento" readonly/>
                                            <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo Form::label('sexo', 'Sexo:',['class'=>'sr-only']); ?>

                                    <?php echo Form::select('sexo', array('M' => 'MASCULINO', 'F' => 'FEMENINO'),'M', ['class' => 'form-control form-control-lg ']); ?>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo Form::label('telOficina', 'Tel. Oficina:',['class'=>'sr-only']); ?>

                                    <?php echo Form::text('telOficina',null,['class'=>'form-control form-control-lg','placeholder'=>'Tel. Oficina']); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo Form::label('movil', 'Móvil:',['class'=>'sr-only']); ?>

                                    <?php echo Form::text('movil',null,['class'=>'form-control form-control-lg','placeholder'=>'Móvil']); ?>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <?php echo Form::label('email', 'Email:',['class'=>'sr-only']); ?>

                                    <?php echo Form::text('email',null,['class'=>'form-control form-control-lg','placeholder'=>'Email']); ?>

                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo Form::label('universidad', 'Universidad:',['class'=>'sr-only']); ?>

                                    <?php echo Form::text('universidad',null,['class'=>'form-control form-control-lg','placeholder'=>'Universidad de Egreso']); ?>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo Form::label('especialidad', 'Especialidad:',['class'=>'sr-only']); ?>

                                    <?php echo Form::text('especialidad',null,['class'=>'form-control form-control-lg','placeholder'=>'Especialidad']); ?>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo Form::label('cedulaProfesional', 'Cedula Profesional:',['class'=>'sr-only']); ?>

                                    <?php echo Form::text('cedulaProfesional',null,['class'=>'form-control form-control-lg','placeholder'=>'Cedula Profesional']); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo Form::label('cedulaEspecialidad', 'Cedula Especialidad:',['class'=>'sr-only']); ?>

                                    <?php echo Form::text('cedulaEspecialidad',null,['class'=>'form-control form-control-lg','placeholder'=>'Cedula Especialidad']); ?>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo Form::label('lugarTrabajo', 'Lugar de Trabajo:',['class'=>'sr-only']); ?>

                                    <?php echo Form::text('lugarTrabajo',null,['class'=>'form-control form-control-lg','placeholder'=>'Lugar de Trabajo']); ?>

                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <?php echo Form::label('calle', 'Calle:',['class'=>'sr-only']); ?>

                                    <?php echo Form::text('calle',null,['class'=>'form-control form-control-lg','placeholder'=>'Calle o Avenida']); ?>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?php echo Form::label('noExt', 'noExt:',['class'=>'sr-only']); ?>

                                    <?php echo Form::text('noExt',null,['class'=>'form-control form-control-lg','placeholder'=>'No. Exterior']); ?>

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?php echo Form::label('noInt', 'noInt:',['class'=>'sr-only']); ?>

                                    <?php echo Form::text('noInt',null,['class'=>'form-control form-control-lg','placeholder'=>'No. Interior']); ?>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <?php echo Form::label('colonia', 'Colonia:',['class'=>'sr-only']); ?>

                                    <?php echo Form::text('colonia',null,['class'=>'form-control form-control-lg','placeholder'=>'Colonia, Fraccionamiento, etc']); ?>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <?php echo Form::label('municipio', 'Municipio:',['class'=>'sr-only']); ?>

                                    <?php echo Form::text('municipio',null,['class'=>'form-control form-control-lg','placeholder'=>'Municipio']); ?>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <?php echo Form::label('localidad', 'Localidad:',['class'=>'sr-only']); ?>

                                    <?php echo Form::text('localidad',null,['class'=>'form-control form-control-lg','placeholder'=>'Localidad']); ?>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <?php echo Form::label('idEstado', 'Estado:',['class'=>'sr-only']); ?>

                                    <?php echo Form::select('idEstado', $estados, null, ['placeholder' => 'Estado','class'=>'form-control form-control-lg']); ?>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <?php echo Form::label('idPais', 'País:',['class'=>'sr-only']); ?>

                                    <?php echo Form::select('idPais', $paises, null, ['placeholder' => 'País','class'=>'form-control form-control-lg']); ?>

                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <?php echo Form::label('codigoPostal', 'Código Postal:',['class'=>'sr-only']); ?>

                                    <?php echo Form::text('codigoPostal',null,['class'=>'form-control form-control-lg','placeholder'=>'Código Postal']); ?>

                                </div>
                            </div>

                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <?php echo Form::label('password', 'Contraseña:',['class'=>'sr-only']); ?>

                                    <?php echo Form::password('password',['class'=>'form-control form-control-lg','placeholder'=>'Contraseña']); ?>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <?php echo Form::label('password_confirmation', 'Confirmar Contraseña:',['class'=>'sr-only']); ?>

                                    <?php echo Form::password('password_confirmation',['class'=>'form-control form-control-lg','placeholder'=>'Confirmar Contraseña']); ?>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"  id="aceptoCondiciones" name="aceptoCondiciones" style="width: auto;">
                                        <label class="form-check-label" for="aceptoCondiciones">
                                            <small>He leido el <a href="<?php echo e(asset('aviso_privacidad')); ?>">aviso de privacidad</a> y acepto las <a href="<?php echo e(asset('codiciones_uso')); ?>">condiciones de uso</a>.</small>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group <?php echo e($errors->has('g-recaptcha-response') ? ' has-error' : ''); ?>">
                                    <label for="g-recaptcha-response" class="sr-only">Recaptcha</label>
                                    <?php echo Recaptcha::render(); ?>

                                </div>
                            </div>
                        </div>
                        <br/>

                        <div class="row">
                            <div class="col-sm-12 text-right">

                                <button class="butn theme medium" type="submit"><span>Registrarse</span></button>


                            </div>
                        </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-heading left">
                        <h4>Aviso de Privacidad</h4>
                    </div>
                    <p class="text-justify">SMACVE Sociedad Mexicana de Angiología, Cirugía Vascular y Endovascular A.C. con dirección en Alfonso Reyes 161 Colonia Condesa, Delegación Cuaúhtemoc, Ciudad de México, México.  es responsable de la confidencialidad, uso y protección de los datos personales que recibe, y tratará los mismos de conformidad con el presente aviso de privacidad.</p>
                    <p class="text-justify">SMACVE hace de su conocimiento que puede obtener, almacenar, transmitir y hacer uso de sus datos personales y sensibles, con cualquiera de las siguientes finalidades:</p>
                    <ul>
                        <li>Darlo de alta en nuestros sistemas y bases de datos.</li>
                        <li>Registrarlo en nuestra página web, para generar un perfil de usuario.</li>
                        <li>Proveerle información sobre nuestras actividades científicas.</li>
                        <li>Enviarle material promocional, informativo que promocione nuestras actividades y le convoque a asistir, con apego a la normatividad aplicable.</li>
                        <li>Evaluar la calidad del servicio que le brindamos.</li>
                    </ul>
                    <p class="text-justify">SMACVE le  informa  que  realiza  el  tratamiento  de  datos  personales  y sensibles que usted nos proporciona de conformidad con lo dispuesto en la Ley Federal de Protección de Datos Personales en Posesión de los Particulares.</p>
                    <p class="text-justify">Que la  información personal y los datos considerados sensibles se guardan en bases de datos bajo resguardo de SMACVE.</p>
                    <p class="text-justify">Con  la  finalidad  de  impedir  el  acceso  y  revelación  no  autorizada, mantener la exactitud de los datos y garantizar la utilización correcta de la información, SMACVE utiliza procedimientos físicos, tecnológicos y administrativos apropiados para proteger la información que recaba, de conformidad con la Ley Federal de Protección de Datos Personales en Posesión de los Particulares y el Capítulo III de su Reglamento.</p>
                    <p class="text-justify">De acuerdo con lo dispuesto en la Ley Federal de Protección de Datos Personales en Posesión de Particulares en su artículo 29 y demás disposiciones aplicables, usted podrá ejercer sus derechos ARCO para acceder, rectificar o cancelar sus datos personales, así como oponerse al tratamiento  de los mismos, limitar  su uso o divulgación y/o revocar el consentimiento que para tal fin haya otorgado a SMACVE enviando un correo a la siguiente dirección</p>
                    <p class="text-justify">SMACVE se abstendrá en todo momento de vender, arrendar o alquilar su información personal y datos sensibles a un tercero.</p>
                    <p class="text-justify">En caso de que SMACVE sufriera alguna vulneración de seguridad en cualquier fase del tratamiento de sus datos personales y/o datos sensibles, por medio de la figura del responsable, lo hará de su conocimiento de manera inmediata y pública en internet y mediante envío de un comunicado a su correo electrónico para que tome las medidas correspondientes a fin de resguardar sus derechos.</p>
                    <p class="text-justify">SMACVE se reserva el derecho de modificar y/o actualizar el presente aviso de privacidad unilateralmente en cualquier momento, ya sea para la atención de novedades  legislativas,  regulatorias  o  jurisprudenciales,  políticas  internas, prácticas del mercado o por cualquier otra razón.</p>
                    <p class="text-justify">Cualquier modificación o actualización del presente aviso se difundirá a través de nuestro portal de Internet https://smacve.org.mx  en el vínculo denominado Aviso de Privacidad.</p>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script type="text/javascript" src="<?php echo e(asset('libraries/jquery-validate-1.19.0/jquery.validate.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('libraries/jquery-validate-1.19.0/additional-methods.min.js')); ?>"></script>

    <script src="<?php echo e(asset('libraries/moment-develop/moment.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('libraries/moment-develop/moment-with-locales.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('libraries/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.js')); ?>" type="text/javascript" ></script>
    <script src="<?php echo e(asset('js/auth/register.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template_01', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>