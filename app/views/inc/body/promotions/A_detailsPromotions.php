<style>
.profile-img {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.profile-img img {
    width: 100%;
    height: auto;
}

.profile-img .portfolio-lightbox {
    position: absolute;
    top: 10px;
    right: 10px;
    color: #fff;
    background-color: rgba(0, 0, 0, 0.7);
    padding: 5px;
    border-radius: 50%;
    transition: background-color 0.3s ease-in-out;
}

.profile-img .portfolio-lightbox:hover {
    background-color: rgba(0, 0, 0, 0.9);
}

.profile-img .portfolio-lightbox i {
    font-size: 1.5rem;
}
</style>

<a href="<?php echo APP_URL; ?>Apromotions/" class="arrow-left"><i class="bi bi-box-arrow-left"></i><span
        class="sr-only">
        Atras</span></a>
<div class="container emp-profile">
    <div class="row">
        <div class="col-md-4">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100"
                            src="<?php echo APP_URL; ?>app/views/assets/imagenes/promotions/<?php echo $foto1; ?>"
                            alt="" />
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100"
                            src="<?php echo APP_URL; ?>app/views/assets/imagenes/promotions/<?php echo $foto2; ?>"
                            alt="" />
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100"
                            src="<?php echo APP_URL; ?>app/views/assets/imagenes/promotions/<?php echo $foto3; ?>"
                            alt="" />
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only"></span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only"></span>
                </a>
            </div>

            <br>
            <!--HABLILITAMOS LOS BOTONES DAR BAJA O ALTA SEGUN EL ESTADO-->
            <div class="buttons-container">
                <?php if($estado == 'Activo') : ?>
                <a class="btnP btnP-warningP" data-bs-toggle="modal" href="#ModalBlog" role="button"><i
                        class="bi bi-pencil-square"></i> Editar Promoción</a>
                <form action="<?php echo APP_URL; ?>app/ajax/PromotionsAjax.php" method="POST" autocomplete="off"
                    enctype="multipart/form-data" class="FormularioAjax">
                    <input type="hidden" name="modulo_promotions" value="DarBaja">
                    <input type="hidden" name="id_promocion" id="id_promocion" value="<?php echo $id; ?>">
                    <button type="submit" class="btnP btnP-dangerP"><i class="bi bi-folder-minus"></i> Eliminar
                        Promoción</button>
                </form>
                <?php elseif ($estado == 'Inactivo') : ?>
                <form action="<?php echo APP_URL; ?>app/ajax/PromotionsAjax.php" method="POST" autocomplete="off"
                    enctype="multipart/form-data" class="FormularioAjax">
                    <input type="hidden" name="modulo_promotions" value="DarAlta">
                    <input type="hidden" name="id_promocion" id="id_promocion" value="<?php echo $id; ?>">
                    <button type="submit" class="btnP btnP-SuccessP"><i class="bi bi-arrow-counterclockwise"></i>
                        Restaurar Promoción</button>
                </form>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-8">
            <div class="profile-head">
                <h1 style="font-family: courier, arial, helvetica; font-weight: bold;">
                    <?php echo $titulo; ?>
                </h1>
                <?php
                if($estado == 'Activo'){
                    $StylePersonalizado = 'badge badge-success';
                } else {
                    $StylePersonalizado = 'badge badge-danger';
                }
                ?>
                <p class="proile-rating">Estado : <span
                        class="<?php echo $StylePersonalizado; ?>"><?php echo $estado; ?></span></p>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">Contenido del Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#mas" role="tab"
                            aria-controls="profile" aria-selected="false">Detalles Del Blog</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-12">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <?php echo $descripcion; ?>
                    </div>
                    <div class="tab-pane fade" id="mas" role="tabpanel" aria-labelledby="profile-tab">
                        <p>Inicio de Promoción: <br><i class="bi bi-calendar-week"></i> <?php echo $fecha_inicio; ?>
                        </p>
                        <p>Fin de Promoción: <br><i class="bi bi-calendar-week"></i> <?php echo $fecha_fin; ?></p>

                        <p>Fecha de Creacion: <br><i class="bi bi-calendar-week"></i> <?php echo $fecha_creacion;?>
                        </p>
                        <p>Fecha de Modificación: <br><i class="bi bi-calendar-week"></i>
                            <?php echo $fecha_mod;?></p>
                        <p>Fecha de Eliminación: <br><i class="bi bi-calendar-week"></i>
                            <?php echo $fecha_eliminacion;?></p>
                        <p>Fecha de restauración: <br><i class="bi bi-calendar-week"></i>
                            <?php echo $fecha_restauracion;?></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--Modal Para Actualizar-->
<div class="modal fade" id="ModalBlog" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Actualizar Promoción</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container emp-profile">
                    <form action="<?php echo APP_URL; ?>app/ajax/PromotionsAjax.php" method="POST" autocomplete="off"
                        enctype="multipart/form-data" class="FormularioAjax">
                        <input type="hidden" name="modulo_promotions" value="Actualizar">
                        <input type="hidden" name="id_promocion" value="<?php echo $id_promo; ?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-4 imgUp">
                                    <div class="portada-img">
                                        <img id="profile-image1"
                                            src="<?php echo APP_URL; ?>app/views/assets/imagenes/promotions/<?php echo $foto1; ?>"
                                            alt="" />
                                        <a href="<?php echo APP_URL; ?>app/views/assets/imagenes/promotions/<?php echo $foto1; ?>"
                                            data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i
                                                class="bi bi-eye"></i></a>
                                        <div class="file btn btn-lg btn-primary">
                                            Cambiar foto de portada
                                            <input id="file-input1" type="file" name="foto1" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 imgUp">
                                    <div class="portada-img">
                                        <img id="profile-image2"
                                            src="<?php echo APP_URL; ?>app/views/assets/imagenes/promotions/<?php echo $foto2; ?>"
                                            alt="" />
                                        <a href="<?php echo APP_URL; ?>app/views/assets/imagenes/promotions/<?php echo $foto2; ?>"
                                            data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i
                                                class="bi bi-eye"></i></a>
                                        <div class="file btn btn-lg btn-primary">
                                            Cambiar foto de portada
                                            <input id="file-input2" type="file" name="foto2" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 imgUp">
                                    <div class="portada-img">
                                        <img id="profile-image3"
                                            src="<?php echo APP_URL; ?>app/views/assets/imagenes/promotions/<?php echo $foto3; ?>"
                                            alt="" />
                                        <a href="<?php echo APP_URL; ?>app/views/assets/imagenes/promotions/<?php echo $foto3; ?>"
                                            data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i
                                                class="bi bi-eye"></i></a>
                                        <div class="file btn btn-lg btn-primary">
                                            Cambiar foto de portada
                                            <input id="file-input3" type="file" name="foto3" />
                                        </div>
                                    </div>
                                </div>
                            </div><!-- row -->
                        </div>
                        <br>
                        <div class="col-md-12">
                            <div class="profile-head">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control bg-white border-1"
                                                name="titulo_promocion" value="<?php echo $titulo ?>">
                                            <label>Promoción</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control bg-white border-1"
                                                name="precio_promocion" value="<?php echo $precioprom ?>">
                                            <label>S/.</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <textarea type="text-file" class="mi-textarea border-1"
                                                name="acerca_promocion"
                                                placeholder="Acerca de la Promoción"><?php echo $descripcion ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating">
                                            <input type="date" class="form-control bg-white border-1"
                                                name="fecha_inicio_promocion" value="<?php echo $fecha_inicio ?>">
                                            <label>Fecha Inicio Promoción</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating">
                                            <input type="time" class="form-control bg-white border-1"
                                                name="hora_inicio_promocion" value="<?php echo $hora_inicio ?>">
                                            <label>Hora Inicio Promoción</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating">
                                            <input type="date" class="form-control bg-white border-1"
                                                name="fecha_fin_promocion" value="<?php echo $fecha_fin ?>">
                                            <label>Fecha Fin Promoción</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating">
                                            <input type="time" class="form-control bg-white border-1"
                                                name="hora_fin_promocion" value="<?php echo $hora_fin ?>">
                                            <label>Hora Fin Promoción</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <select class="form-select bg-white border-1" name="servicio">
                                                <?php foreach ($servicios as $servis) : ?>
                                                <option value="<?php echo $servis['ID_SERVICIO']; ?>"
                                                    <?php if ($servis['ID_SERVICIO'] == $idservicio) echo "selected"; ?>>
                                                    <?php echo $servis['NOMBRE_SERVICIO']; ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>

                                            <label>Servicio</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <button type="submit" class="btnP-SuccessP">
                            <i class="bi bi-save"></i> Actualizar
                        </button>
                    </div>
                </div>
                </form>
            </div>

        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    // Manejar el cambio en el input de tipo archivo
    $('#file-input1').change(function() {
        // Obtener el archivo seleccionado
        var file = this.files[0];

        if (file) {
            // Crear un objeto URL para la nueva imagen
            var objectURL = URL.createObjectURL(file);

            // Actualizar la fuente de la imagen con la nueva URL
            $('#profile-image1').attr('src', objectURL);
        }
    });
});
$(document).ready(function() {
    // Manejar el cambio en el input de tipo archivo
    $('#file-input2').change(function() {
        // Obtener el archivo seleccionado
        var file = this.files[0];

        if (file) {
            // Crear un objeto URL para la nueva imagen
            var objectURL = URL.createObjectURL(file);

            // Actualizar la fuente de la imagen con la nueva URL
            $('#profile-image2').attr('src', objectURL);
        }
    });
});
$(document).ready(function() {
    // Manejar el cambio en el input de tipo archivo
    $('#file-input3').change(function() {
        // Obtener el archivo seleccionado
        var file = this.files[0];

        if (file) {
            // Crear un objeto URL para la nueva imagen
            var objectURL = URL.createObjectURL(file);

            // Actualizar la fuente de la imagen con la nueva URL
            $('#profile-image3').attr('src', objectURL);
        }
    });
});
</script>