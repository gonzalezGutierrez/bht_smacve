<?php $__env->startComponent('mail::message'); ?>

#HOLA <?php echo e($usuario->titulo); ?> <?php echo e($usuario->nombre); ?> <?php echo e($usuario->apellidoPaterno); ?> <?php echo e($usuario->apellidoMaterno); ?>


Gracias por enviar su solicitud de voluntariado en la Sociedad Mexicana de Angiología, Cirugía Vascular y Endovascular. Revisaremos su solicitud y le proporcionaremos una actualización
una vez que se hayan revisado todas las solicitudes.

<strong>Comités Seleccionados:</strong><br/>
<ul>
    <?php if(!empty($detalleSolicitud)): ?>
    <?php $__currentLoopData = $detalleSolicitud; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detalle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($detalle->puestoVoluntariado); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</ul>
<br>
<br>
Sinceramente,<br>
**Astrid Carreño**<br/>
Dirección Administrativa<br/>
SMACVE

<?php $__env->startComponent('mail::subcopy'); ?>
    Para cualquier duda, aclaración ó sugerencia, por favor escríbenos al siguiente correo: atencionalsocio@smacve.org.mx o bien a astrid.carreno@smacve.org.mx, lo más pronto posible te contestaremos.
<?php echo $__env->renderComponent(); ?>

<?php echo $__env->renderComponent(); ?>
