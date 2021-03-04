<form method="POST" action="<?php echo e(asset($categoria->getURL())); ?>" accept-charset="UTF-8" id="FormRegister" class="contact-form">
    <?php echo csrf_field(); ?>
    <?php if($categoria->getMETHOD() == 'PUT'): ?>
        <?php echo method_field('put'); ?>
    <?php endif; ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="email" class="">Nombre de la categoria:</label>
                <input  type="text" required class="form-control form-control-lg " name="nombre" value="<?php echo e($categoria->categoria); ?>" placeholder="Categoria" autofocus="">
                <?php if($errors->has('categoria')): ?>
                    <span class="text-danger" role="alert">
                        <strong><?php echo e($errors->first('categoria')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <button class="butn theme medium" type="submit"><span>Guardar</span></button>
            </div>
        </div>
    </div>
</form>
