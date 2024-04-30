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
<a href="<?php echo APP_URL; ?>Aservices/" class="arrow-left"><i class="bi bi-box-arrow-left"></i></a>
<div class="container emp-profile">
    <div class="row">
        <div class="col-md-4">
            <div class="profile-img">
                <img src="<?php echo APP_URL; ?>app/views/assets/imagenes/Services/<?php echo $portada; ?>" alt="" />
                <a href="<?php echo APP_URL; ?>app/views/assets/imagenes/Services/<?php echo $portada; ?>"
                    data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i
                        class="bi bi-eye"></i></a>
            </div>
        </div>
        <div class="col-md-5">
            <div class="profile-head">
                <h5>
                    <?php echo $nom_servicio; ?>
                </h5>
                <?php
                if($estado == 'Activo'){
                    $StylePersonalizado = 'badge badge-success';
                }else{
                    $StylePersonalizado = 'badge badge-danger';
                }
                ?>
                <p class="proile-rating">Estado : <span
                        class="<?php echo $StylePersonalizado; ?>"><?php echo $estado; ?></span></p>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">Acerca de</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class=" col-md-3">
            <!--HABLILITAMOS LOS BOTONES DAR BAJA O ALTA SEGUN EL ESTADO-->
            <?php if($estado == 'Activo') : ?>
            <a class="btnP btnP-warningP" data-bs-toggle="modal" href="#exampleModalToggle" role="button"><i
                    class="bi bi-pencil-square"></i> Editar Servicio</a>
            <form action="<?php echo APP_URL; ?>app/ajax/ServicioAjax.php" method="POST" autocomplete="off"
                enctype="multipart/form-data" class="FormularioAjax">
                <input type="hidden" name="modulo_servicio" value="DarBaja">
                <input type="hidden" name="id_servicio" id="id_servicio" value="<?php echo $id_servicio; ?>">
                <button type="submit" class="btnP btnP-dangerP"><i class="bi bi-folder-minus"></i> Dar Baja
                    Servicio</button>
            </form>
            <?php elseif ($estado == 'Inactivo') : ?>
            <form action="<?php echo APP_URL; ?>app/ajax/ServicioAjax.php" method="POST" autocomplete="off"
                enctype="multipart/form-data" class="FormularioAjax">
                <input type="hidden" name="modulo_servicio" value="DarAlta">
                <input type="hidden" name="id_servicio" id="id_servicio" value="<?php echo $id_servicio; ?>">
                <button type="submit" class="btnP btnP-SuccessP"><i class="bi bi-arrow-counterclockwise"></i> Restaurar
                    Servicio</button>
            </form>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="profile-work">
                <p>Información Adicional</p>
                <hr>
                <p>Fecha de Creacion: <br><i class="bi bi-calendar-week"></i> <?php echo $fecha_creacion;?></p>
                <p>Fecha de Modificación: <br><i class="bi bi-calendar-week"></i> <?php echo $fecha_modificacion;?></p>
                <p>Fecha de Eliminación: <br><i class="bi bi-calendar-week"></i> <?php echo $fecha_eliminacion;?></p>
                <p>Fecha de restauración: <br><i class="bi bi-calendar-week"></i> <?php echo $fecha_restauracion;?></p>
            </div>
        </div>
        <div class="col-md-8">
            <div class="tab-content profile-tab" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col-md-12">
                            <!--traemos los datos de la variable $listaServicios,
                             que vienen en un array ahora lo mostraremos en una lista-->
                            <?php foreach($listaServicios as $servicio) : 
                            // Saltar servicios vacíos
                            if ($servicio !== '') {
                                // Si el servicio no es el último elemento de la lista y no termina con un punto, agrégale un punto al final
                                if ($servicio !== end($listaServicios) && substr($servicio, -1) !== '.') {
                                    $servicio .= '.';
                                }
                                echo "<i class='bi bi-check2-square'></i> ".$servicio."<br>";
                            }
                                endforeach;
                             ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!---MODAL PARA ACTUALIZAR EL SERVICIO-->
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Actualizar Datos de Servicio</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo APP_URL; ?>app/ajax/ServicioAjax.php" method="POST" autocomplete="off"
                enctype="multipart/form-data" class="FormularioAjax">
                <input type="hidden" name="modulo_servicio" value="actualizar">
                <input type="hidden" name="id_servicio" id="id_servicio" value="<?php echo $id_servicio; ?>">
                <div class="modal-body">
                    <div class="container emp-profile">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="portada-img">
                                    <div class="col-sm-12 imgUp">
                                        <div class="imagePreviewServicesUpdate"></div>
                                        <label class="btn btn-primary1 btn-upload">
                                            <span class="btn-text">Cambiar foto de Servicio</span>
                                            <input type="file" class="uploadFile img" name="foto_servicio"
                                                value="Upload Photo" style="display: none;">
                                        </label>
                                    </div>
                                </div>
                                <br>
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-white border-1" name="precio_servicio"
                                        value="<?php echo $precio?>">
                                    <label>Precio: </label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="profile-head">
                                    <div class="col-md-12">
                                        <br>
                                        <div class="form-floating">
                                            <input type="text" class="form-control bg-white border-1"
                                                name="nombre_servicio" value="<?php echo $nom_servicio; ?>">
                                            <label>Servicio: </label>
                                        </div>
                                    </div>
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                                role="tab" aria-controls="home" aria-selected="true">Acerca de</a>
                                        </li>
                                    </ul>
                                    <div class="form-floating">
                                        <textarea type="text-file" class="form-control bg-white border-1"
                                            name="descripcion_servicio" style="height: 300px;"
                                            value="<?php echo $descrip_servicio; ?>"><?php echo $descrip_servicio; ?></textarea>
                                        <label class="form-label">Acerca de </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <button type="submit" class="btnP-SuccessP">
                                    <i class="bi bi-save"></i> Guardar Cambios
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!---->
<script>
$(document).on("change", ".uploadFile", function() {
    var input = $(this);
    if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            input.closest(".imgUp").find('.imagePreviewServicesUpdate').css('background-image', 'url(' + e
                .target.result + ')');
            input.closest(".imgUp").find('.btn-text').text('Cambiar');
        }
        reader.readAsDataURL(this.files[0]);
    }
});
</script>