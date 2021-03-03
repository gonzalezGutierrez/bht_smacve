<?php $__env->startSection('title','Usuarios'); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="header-page mb-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent">
                            <li class="breadcrumb-item"><a href="<?php echo e(asset('inicio')); ?>">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(asset('admin')); ?>">Administración</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <?php if(session('status_success')): ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-10">
                    <div class="alert alert-success">
                        <?php echo e(session('status_success')); ?>

                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if(session('status_fail')): ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-10">
                    <div class="alert alert-danger">
                        <?php echo e(session('status_fail')); ?>

                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">

                </div>
            </div>
            <div id="search">
                <form method="GET" role="search" action="<?php echo e(asset('admin/usuarios')); ?>">
                    <div class="form-row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?php echo Form::label('idEstado', 'Estado:',['class'=>'sr-only']); ?>

                                <?php echo Form::select('idEstado', $estados, $idEstado, ['placeholder' => 'TODOS LOS ESTADOS','class'=>'form-control form-control-lg']); ?>

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?php echo Form::label('idStatusSocio', 'Status Socio:',['class'=>'sr-only']); ?>

                                <?php echo Form::select('idStatusSocio', $statusSocio, $idStatusSocio, ['placeholder' => 'TODOS LOS STATUS','class'=>'form-control form-control-lg']); ?>

                            </div>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-sm-8">
                            <div class="input-group input-group-lg mb-3">
                                <input id="txtbuscar" name="txtbuscar" type="text" class="form-control" placeholder="Buscar" aria-label="Buscar" aria-describedby="button-addon2" value="<?php echo e($txtbuscar); ?>">
                                <div class="input-group-append">
                                    <button class="btn btn-dark" type="submit" id="button-addon2">Buscar</button>
                                </div>
                            </div>
                            <small><?php echo e($usuarios->total()); ?> Registros Encontrados</small>
                        </div>
                        <div class="col-sm-4 text-right" style="vertical-align: top;">

                            <button id="btnExportar" class="btn btn-dark btn-lg"  data-toggle="tooltip" data-placement="top" title="Exportar" type="button"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Exportar</button>

                            <a href="<?php echo e(asset('admin/usuarios/create')); ?>" class="btn btn-dark btn-lg" data-toggle="tooltip" data-placement="top" title="Nuevo Evento">
                                <i class="fa fa-plus" aria-hidden="true"></i> Nuevo
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="space50"></div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col" >Id</th>
                                <th scope="col" >Nombre</th>
                                <th scope="col" style="width: 250px;">Email</th>
                                <th scope="col" >Password</th>
                                <th scope="col" >Estado</th>
                                <th class="text-center" scope="col" >Estatus</th>
                                <th scope="col"  class="text-center" style="width: 210px;">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(count($usuarios)>0): ?>
                                <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td  scope="row"><?php echo e($usuario->idUsuario); ?></td>
                                        <td><?php echo e($usuario->nombre); ?> <?php echo e($usuario->apellidoPaterno); ?> <?php echo e($usuario->apellidoMaterno); ?></td>
                                        <td style="width: 250px;"><?php echo e($usuario->email); ?></td>
                                        <td><?php echo e($usuario->passwordVisible); ?></td>
                                        <td><?php echo e($usuario->estado); ?></td>
                                        <td class="text-center">
                                            <span class="badge  <?php echo e($usuario->badgeStatusSocio); ?>"><?php echo e($usuario->statusSocio); ?></span>
                                        </td>
                                        <td class="text-center" style="width: 210px;">
                                            <a href="<?php echo e(asset('admin/usuarios/'.$usuario->idUsuario.'/anualidades')); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="top" title="Anualidad">
                                                <i class="fas fa-money-check-alt"></i>
                                            </a>

                                            <a href="<?php echo e(asset('admin/usuarios/'.$usuario->idUsuario.'/edit_password')); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="top" title="Cambiar Password">
                                                <i class="fas fa-key" aria-hidden="true"></i>
                                            </a>

                                            <a href="<?php echo e(asset('admin/usuarios/'.$usuario->idUsuario.'/edit')); ?>" class="btn btn-link" data-toggle="tooltip" data-placement="top" title="Editar">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            <?php echo Form::open(['url'=>'admin/usuarios/'.$usuario->idUsuario,'method' => 'DELETE','class'=>'formDeleteUsuario','style'=>'display:inline']); ?>

                                            <button type="button" class="btn btn-link btnDelete" data-toggle="tooltip" data-placement="top" title="Eliminar"> <i class="fas fa-trash-alt"></i></button>
                                            <?php echo Form::close(); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center"> No hay Usuarios Registrados</td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-bottom:70px">
                <div class="col-sm-12 text-right">
                    <?php echo $usuarios->appends(['txtbuscar' => $txtbuscar,'idEstado'=>$idEstado,'idStatusSocio'=>$idStatusSocio])->links(); ?>

                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('js/admin/usuarios/usuarios_index.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template_00', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>