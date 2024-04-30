<?php 
require_once "app/models/promotionsModel.php";
require_once "app/controllers/promotionsController.php";

use app\controllers\promotionsController;
$controller = new promotionsController();
$servicios = $controller->listaServicios();
$roles_json = json_encode($servicios);
$datosInactivos = $controller->ListarPromotionsInactivos();
$CantdatosInactivos = count($datosInactivos);


include "app/views/inc/headers/header_Apromotions.php"; 
include "app/views/inc/Breadcrumbs/Breadcrumbs_Apromotions.php";         
?>
<main id="main">
    <section id="contact" class="contact">
        <div class="container">
            <div class="row justify-content-center" data-aos="fade-up">
                <div class="col-lg-12">
                    <div class="info-wrap">
                        <div class="row">
                            <h1>Promociones Activas</h1>
                            <div class="text-left">
                                <a class="btn btn-primary" data-bs-toggle="modal" href="#ModalBlog" role="button">
                                <i class="bi bi-patch-check"></i> Nueva Promoción
                                </a>
                            <!--creamos el boton boton modal para las promociones eliminadas-->
                            <?php 
                                    if($CantdatosInactivos > 0){
                                ?> 
                                <a class="btn btnP-dangerP" data-bs-toggle="modal" href="#ModalBlogRestaurar"
                                    role="button">
                                    <i class="bi bi-x-octagon"></i> Promociones Eliminadas (<?php echo $CantdatosInactivos; ?>)
                                </a>
                                <?php
                                    }
                                ?>
                            </div>
                            <br><br>
                            <hr>
                            <!--Incluimos la lista de los usuarios-->
                            <?php include "app/views/inc/body/promotions/A_bodyPromotions.php";?>
                            <!--finalizamos la lista de los usuarios-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "app/views/inc/footer.php"; ?>
</main>
<!-- Para desplazarme al inicio de la pagina-->
<a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i></a>

<!--Inicio Modal Para Mostrar Promociones Eliminados-->
<div class="modal fade" id="ModalBlogRestaurar" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Promociones Eliminadas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="container restaure">
                <div class="row justify-content-center" data-aos="fade-up">
                    <div class="col-lg-12">
                        <!--Incluimos la lista de los blogs Innactivos-->
                        <?php include "app/views/inc/body/promotions/A_PromotionsInactivos.php";?>
                        <!--finalizamos la lista de los blogs Innactivos-->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Fin Modal Para Mostrar Promociones Eliminados-->

<div class="modal fade" id="ModalBlog" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Nueva Promoción</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container emp-profile">
                    <form action="<?php echo APP_URL; ?>app/ajax/PromotionsAjax.php" method="POST" autocomplete="off"
                        enctype="multipart/form-data" class="FormularioAjax">
                        <input type="hidden" name="modulo_promotions" value="registrar">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-4 imgUp">
                                    <div class="imagePreview"></div>
                                    <label class="btn btn-primary1 btn-upload">
                                        <span class="btn-text">Subir</span>
                                        <input type="file" class="uploadFile img" name="foto1" value="Upload Photo"
                                            style="display: none;">
                                    </label>
                                </div>
                                <i class="bi bi-plus imgAdd"></i>
                            </div><!-- row -->
                        </div>
                        <br>
                        <div class="col-md-12">
                            <div class="profile-head">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control bg-white border-1"
                                                name="titulo_promocion" placeholder="">
                                            <label>Promoción</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control bg-white border-1"
                                                name="precio_promocion" placeholder="">
                                            <label>S/.</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <textarea type="text-file" class="mi-textarea border-1"
                                                name="acerca_promocion" placeholder="Acerca de la Promoción"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="datetime-local" class="form-control bg-white border-1"
                                                name="fecha_inicio_promocion" placeholder="">
                                            <label>Inicio Promoción</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="datetime-local" class="form-control bg-white border-1"
                                                name="fecha_fin_promocion" placeholder="">
                                            <label>Fin Promoción</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <select class="form-select bg-white border-1" name="servicio">
                                                <?php foreach ($servicios as $servis) : ?>
                                                <option value="<?php echo $servis['ID_SERVICIO']; ?>">
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
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btnP-SuccessP">
                            <i class="bi bi-save"></i> Guardar
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
    $(".imgAdd").click(function() {
        var container = $(this).closest(".container");
        var imagesCount = container.find(".imgUp").length;
        if (imagesCount < 3) {
            container.find(".imgUp").last().after(
                '<div class="col-sm-4 imgUp">' +
                '<div class="imagePreview"></div>' +
                '<label class="btn btn-primary1 btn-upload">' +
                '<span class="btn-text">Subir</span>' +
                '<input type="file" class="uploadFile img" name="foto' + (imagesCount + 1) +
                '" value="Upload Photo" style="display: none;">' +
                '</label>' +
                '<i class="bi bi-trash3 del"></i>' +
                '</div>'
            );
        }
        if (imagesCount == 2) {
            $(this).hide();
        }
    });

    $(document).on("change", ".uploadFile", function() {
        var input = $(this);
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                input.closest(".imgUp").find('.imagePreview').css('background-image', 'url(' + e
                    .target.result + ')');
                input.closest(".imgUp").find('.btn-text').text('Cambiar');
            }
            reader.readAsDataURL(this.files[0]);
        }
    });

    $(document).on("click", ".del", function() {
        $(this).closest(".imgUp").remove();
        var container = $(".container");
        var imagesCount = container.find(".imgUp").length;
        if (imagesCount < 3) {
            container.find(".imgAdd").show();
        }
    });
 });
</script>