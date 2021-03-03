<?php $__env->startComponent('mail::message'); ?>
# Estimado  <?php echo e($usuario->titulo); ?> <?php echo e($usuario->nombre); ?> <?php echo e($usuario->apellidoPaterno); ?> <?php echo e($usuario->apellidoMaterno); ?>


Hemos recibido la notificación de tu pago, muchas gracias por contribuir con el beneficio de esta sociedad, por favor se paciente, en breve nos estaremos comunicando contigo,
para confirmarte que tu pago ha sido aprobado.

Forma de Pago: **<?php echo e(strtoupper($metodoPago->tipoPago)); ?>**

<?php $__env->startComponent('mail::table'); ?>
| Anualidad | Costo |
|:--------|-------:|
| ANUALIDAD <?php echo e($anualidad->anualidad); ?>                     | $ <?php echo e(number_format( $anualidad->costo,2)); ?>       |
|                                                           |-------------------------------                    |
| <span style="color:#449D44;">**TOTAL PAGADO**</span>      | <span style="color:#449D44;">**$ <?php echo e(number_format($pago->monto,2)); ?>**</span>|
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('mail::button', ['url' => route('login'), 'color' =>'blue']); ?>
Iniciar Sesión
<?php echo $__env->renderComponent(); ?>

Para cualquier duda, aclaración ó sugerencia, por favor escríbenos al siguiente correo: atencionalsocio@smacve.org.mx, lo más pronto posible te contestaremos.

Muchas Gracias,<br>
**SMACVE**

<?php $__env->startComponent('mail::subcopy'); ?>
Si tienes problemas con el click del boton "Iniciar Sesión", copia y pega la URL siguiente en tu explorador:
[<?php echo e(route('login')); ?>](<?php echo e(route('login')); ?>)
<?php echo $__env->renderComponent(); ?>

<?php echo $__env->renderComponent(); ?>
