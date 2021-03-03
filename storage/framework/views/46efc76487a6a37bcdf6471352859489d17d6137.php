<form method="POST" action="<?php echo e(asset($proveedor->getURL())); ?>" accept-charset="UTF-8" id="FormRegister" class="contact-form">
    <?php echo csrf_field(); ?>
    <?php if($proveedor->getMETHOD() == 'PUT'): ?>
        <?php echo method_field('put'); ?>
    <?php endif; ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="email" class="">Nombre del proveedor:</label>
                <input  type="text" class="form-control form-control-lg " name="proveedor" value="<?php echo e($proveedor->proveedor); ?>" placeholder="Proveedor" autofocus="">
                <?php if($errors->has('proveedor')): ?>
                    <span class="text-danger" role="alert">
                        <strong><?php echo e($errors->first('proveedor')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="password" class="">Categoria:</label>
                <?php echo Form::select('idCategoria',$categorias,$proveedor->idCategoria,['class'=>'form-control','placeholder'=>'Selecciona una categoria...']); ?>

                <?php if($errors->has('idCategoria')): ?>
                    <span class="text-danger" role="alert">
                        <strong><?php echo e($errors->first('idCategoria')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-sm-12 section-heading" style="margin-bottom:10px;">
            <h6>Datos de contacto</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="telefono">Ciudad: </label>
                <input type="text" name="ciudad" class="form-control" value="<?php echo e($proveedor->ciudad); ?>">
                <?php if($errors->has('ciudad')): ?>
                    <span class="text-danger" role="alert">
                        <strong><?php echo e($errors->first('idCategoria')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label for="telefono">Telefono: </label>
                <input type="text" name="telefono" class="form-control" value="<?php echo e($proveedor->telefono); ?>">
                <?php if($errors->has('telefono')): ?>
                    <span class="text-danger" role="alert">
                        <strong><?php echo e($errors->first('idCategoria')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label for="telefono">Correo electronico: </label>
                <input type="text" name="correo_electronico" class="form-control" value="<?php echo e($proveedor->correo_electronico); ?>">
                <?php if($errors->has('correo_electronico')): ?>
                    <span class="text-danger" role="alert">
                        <strong><?php echo e($errors->first('idCategoria')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label for="telefono">Página web: </label>
                <input type="text" name="pagina_web" class="form-control" value="<?php echo e($proveedor->pagina_web); ?>">
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label for="telefono">Descripción: </label>
                <textarea name="descripcion" rows="8" class="form-control" cols="80"><?php echo e($proveedor->descripcion); ?></textarea>
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
