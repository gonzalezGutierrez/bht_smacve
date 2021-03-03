<?php $__env->startComponent('mail::message'); ?>
# Hola,

Te notificamos que el <?php echo e($usuario->titulo); ?> <?php echo e($usuario->nombre); ?> <?php echo e($usuario->apellidoPaterno); ?> <?php echo e($usuario->apellidoMaterno); ?>, ha realizado su pago vía Paypal, por concepto de
**ANUALIDAD <?php echo e($anualidad->anualidad); ?>**, por un monto total de **$ <?php echo e(number_format($pago->monto,2)); ?>** ; se ha cambiado automaticamente el estatus de su pago a **PENDIENTE DE VERIFICAR**
por favor, lo más breve posible verifica el pago y de ser efectiva la transacción no te olvides de cambiar el estatus de pago a **PAGADO**.


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
