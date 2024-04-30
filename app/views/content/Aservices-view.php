<?php 
    require_once "app/models/servicesModel.php";
    require_once "app/controllers/servicesController.php";
    
    use app\controllers\servicesController;
    $controller = new servicesController();
    $datosInactivos = $controller->ListarServiciosInactivos();
    $CantdatosInactivos = count($datosInactivos);

    include "app/views/inc/headers/header_Aservices.php"; 
    include "app/views/inc/Breadcrumbs/Breadcrumbs_Aservices.php";         
?>
<main id="main">
    <section id="contact" class="contact">
        <div class="container">
            <div class="row justify-content-center" data-aos="fade-up">
                <div class="col-lg-12">
                    <div class="info-wrap">
                        <div class="row">
                            <h1>Servicios Activos</h1>
                            <div class="text-left">
                                <a class="btn btn-primary" data-bs-toggle="modal" href="#ModalService" role="button">
                                    <i class="bi bi-node-plus"></i> Agregar Servicio
                                </a>
                                <!--creamos el boton boton modal para las promociones eliminadas-->
                                <?php 
                                    if($CantdatosInactivos > 0){
                                ?>
                                <a class="btn btnP-dangerP" data-bs-toggle="modal" href="#ModalBlogRestaurar"
                                    role="button">
                                    <i class="bi bi-x-octagon"></i> Servicios Inactivos
                                    (<?php echo $CantdatosInactivos; ?>)
                                </a>
                                <?php
                                    }
                                ?>
                                <hr><br>
                                <?php include "app/views/inc/body/services/A_bodyServices.php";?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><?php
    include "app/views/inc/footer.php"; 
    ?>
</main>
<!-- Para desplazarme al inicio de la pagina-->
<a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i></a>

<!--Modal registro-->



<!---MODAL PARA AGREGAR NUEVO SERVICIO-->
<div class="modal fade" id="ModalService" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Nuevo Servicio</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo APP_URL; ?>app/ajax/ServicioAjax.php" method="POST" autocomplete="off"
                enctype="multipart/form-data" class="FormularioAjax">
                <input type="hidden" name="modulo_servicio" value="registrar">
                <div class="modal-body">
                    <div class="container emp-profile">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="portada-img">
                                    <div class="col-sm-12 imgUp">
                                        <div class="imagePreviewservices"></div>
                                        <label class="btn btn-primary1 btn-upload">
                                            <span class="btn-text">Subir</span>
                                            <input type="file" class="uploadFile img" name="foto_servicio" value="Upload Photo"
                                                style="display: none;">
                                        </label>
                                    </div>
                                </div>
                                <br>
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-white border-1" name="precio_servicio">
                                    <label>Precio: </label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="profile-head">
                                    <div class="col-md-12">
                                        <br>
                                        <div class="form-floating">
                                            <input type="text" class="form-control bg-white border-1"
                                                name="nombre_servicio">
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
                                            name="descripcion_servicio" style="height: 300px;"></textarea>
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
                                    <i class="bi bi-save"></i> Guardar
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
                        <?php include "app/views/inc/body/services/A_ServicesInactivos.php";?>
                        <!--finalizamos la lista de los blogs Innactivos-->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Fin Modal Para Mostrar Promociones Eliminados-->


<script>
   $(document).on("change", ".uploadFile", function() {
        var input = $(this);
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                input.closest(".imgUp").find('.imagePreviewservices').css('background-image', 'url(' + e
                    .target.result + ')');
                input.closest(".imgUp").find('.btn-text').text('Cambiar');
            }
            reader.readAsDataURL(this.files[0]);
        }
    }); 
</script>