<?php $__env->startSection('title','Proveedores'); ?>

<?php $__env->startSection('css'); ?>
    <style media="screen">

        .active {
            color:#967D3D !important;
        }

        .form-control {
            border-radius: 0px !important;
            border: none;
        }

        .btn_smacve {
            background: #d0ad55;
            color:white !important;
            border:none !important;
        }

        label{ color:grey; font-size: 25px;}

        input[type = "radio"]{ display:none;}

        .clasificacion{
          direction: rtl;/* right to left */
          unicode-bidi: bidi-override;/* bidi de bidireccional */
        }

        label:hover{color:orange;}

        label:hover ~ label{color:orange;}

        input[type = "radio"]:checked ~ label{color:orange;}

        #form {
          width: 250px;
          margin: 0 auto;
          height: 50px;
        }

        #form p {
          text-align: center;
        }

        #form label {
          font-size: 20px;
        }

        input[type="radio"] {
          display: none;
        }

        label {
          color: grey;
        }

        .clasificacion {
          direction: rtl;
          unicode-bidi: bidi-override;
        }

        label:hover,
        label:hover ~ label {
          color: orange;
        }

        input[type="radio"]:checked ~ label {
          color: orange;
        }

    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="<?php echo e(asset('images/bg/educacion_medica.jpg')); ?>">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Proveedores</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="<?php echo e(asset('/')); ?>">Inicio</a></li>
                        <li><a href="<?php echo e(asset('/proveedores')); ?>">Proveedores</a></li>
                        <li><a href="javascript::void(0 )"><?php echo e($proveedor->proveedor); ?></a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>

    <section class="blogs">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12 padding-30px-right xs-padding-15px-right sm-margin-30px-bottom">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="posts">
                                <div class="post">
                                    <div class="content">
                                        <div class="post-title">
                                            <span class="badge text-uppercase badge-secondary"> <i class="fas fa-bookmark"></i> <?php echo e($categoria->categoria); ?></span>
                                            <h5><?php echo e($proveedor->proveedor); ?></h5>
                                        </div>
                                        <div class="post-meta">
                                            <ul class="meta">
                                                <li><i class="fas fa-phone"></i> <?php echo e($proveedor->telefono); ?> </li>
                                                <li><i class="fas fa-envelope  "></i> <?php echo e($proveedor->correo_electronico); ?> </li>
                                                <li><a href="<?php echo e($proveedor->pagina_web); ?>"><i class="fas fa-globe"></i> Ver página web del proveedor</a> </li>
                                                <li> <i class="fas fa-star" style="color:orange; font-size:16px;"></i> <?php echo e($proveedor->calificacion); ?></li>
                                            </ul>
                                        </div>
                                        <div class="post-cont">
                                            <p class="special">
                                                <?php echo e($proveedor->descripcion); ?>

                                            </p>
                                        </div>

                                        <div class="post-cont">
                                            <h5>Calificar</h5>
                                            <p class="clasificacion">
                                                <input id="radio1" type="radio" <?php if($calificacion == 5): ?> checked <?php endif; ?> name="estrellas" value="5">
                                                <label for="radio1"> <i class="fas fa-star"></i> </label>
                                                <input id="radio2" type="radio" <?php if($calificacion == 4): ?> checked <?php endif; ?> name="estrellas" value="4">
                                                <label for="radio2"><i class="fas fa-star"></i></label>
                                                <input id="radio3" type="radio" <?php if($calificacion == 3): ?> checked <?php endif; ?> name="estrellas" value="3">
                                                <label for="radio3"><i class="fas fa-star"></i></label>
                                                <input id="radio4" type="radio" <?php if($calificacion == 2): ?> checked <?php endif; ?> name="estrellas" value="2">
                                                <label for="radio4"><i class="fas fa-star"></i></label>
                                                <input id="radio5" type="radio" <?php if($calificacion == 1): ?> checked <?php endif; ?> name="estrellas" value="1">
                                                <label for="radio5"><i class="fas fa-star"></i></label>
                                             </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="posts">
                                <div class="post">
                                    <div class="content">
                                        <div class="post-title">
                                            <h5>Comentarios</h5>
                                            <span class="badge text-uppercase badge-secondary"> <i class=""></i> <?php echo e($comentarios->count()); ?> Comentarios</span>
                                        </div>
                                        <hr>
                                        <div class="post-cont mt-3">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <form class="" action="<?php echo e(asset('proveedores/'.$proveedor->slug.'/comentar')); ?>" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <div class="card" style="border-radius:0px !important;">
                                                            <textarea name="comentario" class="form-control" style="border-radius:0px !important; border:none;" rows="3" placeholder="Agrega un comentario..." cols="80"></textarea>
                                                            <div class="card-footer text-right">
                                                                <button type="submit" class="btn btn_smacve" name="button">Publicar</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="row mt-5">
                                                <div class="col-sm-12 col-md-12">
                                                    <?php $__currentLoopData = $comentarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comentario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <img src="<?php echo e(asset('images/miembros/'.$comentario->foto)); ?>" style="width:48px; height:48px; "  alt="">
                                                            </div>
                                                            <div class="col-md-10" style="margin-left:-50px !important;">
                                                                <span class="font-weight-bold"><?php echo e($comentario->nombre.' '.$comentario->apellidoPaterno); ?></span> <br>
                                                                <p><?php echo e($comentario->comentario); ?></p>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>

                                            <?php echo e($comentarios->links()); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="side-bar">
                        <div class="widget">
                            <div class="widget-title">
                                <h6>Otros proveedores</h6>
                            </div>
                            <ul>
                                <?php $__currentLoopData = $proveedores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(asset('proveedores/'.$item->slug)); ?>"><?php echo e($item->proveedor); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script type="text/javascript">

        let $stars = document.getElementsByName('estrellas');

        let size = $stars.length;

        for(let i = 0; i< size; i++) {
            $stars[i].addEventListener("change", function(event) {
                calificacion = event.target.value;
                calificar(calificacion);
            })
        }

        function calificar(calificacion) {
            let endpoint     = "http://localhost:8000/proveedores/<?php echo e($proveedor->slug); ?>/calificar";
            axios.post(endpoint,{
                calificacion:calificacion
            }).then((result)=>{

                location.reload();

            }).catch((error)=>{
                console.log(error);
            });
        }



        /*function getStarActiveValue()
        {


            let size = $stars.length;

            for(let i = 0; i< size; i++) {
                if ($stars[i].checked) {
                    return $stars[i].value;
                }
            }
        }*/

        /*let calificacion = getStarActiveValue();
        let endpoint     = "http://localhost:8000/proveedores/<?php echo e($proveedor->slug); ?>/calificar";

        alert(endpoint);



        axios.post(endpoint,{
            calificacion:calificacion
        }).then((result)=>{

        }).catch((error)=>{

        });*/
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template_01', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>