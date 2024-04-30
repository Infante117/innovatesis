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

.imagePreviewBlogUserUpdate {
    width: 100%;
    /*ancho de la imagen*/
    height: 260px;
    /*alto de la imagen*/
    background-position: center center;
    background: url(<?php echo APP_URL; ?>app/views/assets/imagenes/blogs/<?php echo $imagen; ?>);
    /*imagen de fondo*/
    /*centramos la imagen*/
    background-position: center center;
    background-color: #fff;
    background-size: cover;
    background-repeat: no-repeat;
    display: inline-block;
    box-shadow: 0px -3px 6px 2px rgba(0, 0, 0, 0.2);
}
</style>

<a href="<?php echo APP_URL; ?>Ablog/" class="arrow-left"><i class="bi bi-box-arrow-left"></i><span class="sr-only">
        Atras</span></a>
<div class="container emp-profile">
    <div class="row">
        <div class="col-md-4">
            <div class="profile-img">
                <img src="<?php echo APP_URL; ?>app/views/assets/imagenes/blogs/<?php echo $imagen; ?>" alt="" />
                <a href="<?php echo APP_URL; ?>app/views/assets/imagenes/blogs/<?php echo $imagen; ?>"
                    data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i
                        class="bi bi-eye"></i></a>
            </div>
            <br>
            <!--HABLILITAMOS LOS BOTONES DAR BAJA O ALTA SEGUN EL ESTADO-->
            <div class="buttons-container">
                <?php if($estado == 'Activo') : ?>
                <a class="btnP btnP-warningP" data-bs-toggle="modal" href="#ModalBlog" role="button"><i
                        class="bi bi-pencil-square"></i> Editar Blog</a>
                <form action="<?php echo APP_URL; ?>app/ajax/BlogAjax.php" method="POST" autocomplete="off"
                    enctype="multipart/form-data" class="FormularioAjax">
                    <input type="hidden" name="modulo_blog" value="DarBaja">
                    <input type="hidden" name="id_blog" id="id_blog" value="<?php echo $id_blog; ?>">
                    <button type="submit" class="btnP btnP-dangerP"><i class="bi bi-folder-minus"></i> Eliminar
                        Blog</button>
                </form>
                <?php elseif ($estado == 'Inactivo') : ?>
                <form action="<?php echo APP_URL; ?>app/ajax/BlogAjax.php" method="POST" autocomplete="off"
                    enctype="multipart/form-data" class="FormularioAjax">
                    <input type="hidden" name="modulo_blog" value="DarAlta">
                    <input type="hidden" name="id_blog" id="id_blog" value="<?php echo $id_blog; ?>">
                    <button type="submit" class="btnP btnP-SuccessP"><i class="bi bi-arrow-counterclockwise"></i>
                        Restaurar Blog</button>
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
                        <div class="entry-content">
                            <?php echo $descripcion; ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="mas" role="tabpanel" aria-labelledby="profile-tab">

                        <p>Fecha de Creacion: <br><i class="bi bi-calendar-week"></i> <?php echo $fecha_creacion;?>
                        </p>
                        <p>Fecha de Modificación: <br><i class="bi bi-calendar-week"></i>
                            <?php echo $fecha_modificacion;?></p>
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

<!--MODAL PARA LA ACTUALIZACION DEL BLOG-->
<div class="modal fade" id="ModalBlog" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Actualizar Blog</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo APP_URL; ?>app/ajax/BlogAjax.php" method="POST" autocomplete="off"
                enctype="multipart/form-data" class="FormularioAjax">
                <input type="hidden" name="modulo_blog" value="Actualizar">
                <input type="hidden" name="id" value="<?php echo $id_blog; ?>">
                <div class="modal-body">
                    <div class="container emp-profile">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-white border-1" name="titulo_blog"
                                        value="<?php echo $titulo;?>">
                                    <label>Título Blog </label>
                                </div>
                                <br>
                                <!--<div class="portada-img">
                                    <img id="profile-image"
                                        src="<?php echo APP_URL; ?>app/views/assets/imagenes/blogs/<?php echo $imagen; ?>"
                                        alt="" />
                                    <div class="file btn btn-lg btn-primary">
                                        Cambiar foto de portada
                                        <input id="file-input" type="file" name="portada_blog" />
                                    </div>
                                </div>-->
                                <div class="portada-img">
                                    <div class="col-sm-12 imgUp">
                                        <div class="imagePreviewBlogUserUpdate"></div>
                                        <label class="btn btn-primary1 btn-upload">
                                            <span class="btn-text">Cambiar foto de
                                                Portada</span>
                                            <input type="file" class="uploadFile img" name="portada_blog"
                                                value="Upload Photo" style="display: none;">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="profile-head">
                                    <div class="form-floating">
                                        <textarea type="text-file" id="summernote"
                                            class="form-control bg-white border-1" name="descripcion_blog">
                                            <?php echo $descripcion?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <button type="submit" class="btnP-SuccessP">
                                    <i class="bi bi-save"></i> Actualizar Post
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
#incluimos el archivo script_summernote.php
include "app/views/inc/script_summernote.php";
?>

<script>
$(document).on("change", ".uploadFile", function() {
    var input = $(this);
    if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            input.closest(".imgUp").find('.imagePreviewBlogUserUpdate').css('background-image',
                'url(' + e
                .target.result + ')');
            input.closest(".imgUp").find('.btn-text').text('Cambiar');
        }
        reader.readAsDataURL(this.files[0]);
    }
});
</script>