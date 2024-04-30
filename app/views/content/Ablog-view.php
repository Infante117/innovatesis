<?php 
#validamos que usuario esta logeado para mostrarle su respectivo header
$idrolll=$_SESSION['idRol'];
if($idrolll=="Asesor"){
    include "app/views/inc/headers/headersAsesor/header_blog.php";        
    include "app/views/inc/Breadcrumbs/Breadcrumbs_Ablog.php";
}else{
    include "app/views/inc/headers/header_Ablog.php"; 
    include "app/views/inc/Breadcrumbs/Breadcrumbs_Ablog.php";
}
require_once "app/controllers/blogController.php";
use app\controllers\blogController;
$controller = new blogController();
$datosInactivos = $controller->ListarBlogInactivos();
/*los almacenaremos */
$CantdatosInactivos = count($datosInactivos);        
?>
<main id="main">
    <section id="contact" class="contact">
        <div class="container">
            <div class="row justify-content-center" data-aos="fade-up">
                <div class="col-lg-12">
                    <div class="info-wrap">
                        <div class="row">
                            <h1>Blog's Activos</h1>
                            <div class="text-left">
                                <a class="btn btn-primary" data-bs-toggle="modal" href="#ModalBlog" role="button">
                                    <i class="bi bi-newspaper"></i> Nuevo Blog
                                </a>
                                <a class="btn btn-primary"  href="<?php echo APP_URL?>blog/" role="button">
                                    <i class="bi bi-newspaper"></i> Blogs
                                </a>
                                <!--habilitaremos el boton si es que tenemos datos en estado inactivo-->
                                <?php 
                                    if($CantdatosInactivos > 0){
                                ?> 
                                <a class="btn btnP-dangerP" data-bs-toggle="modal" href="#ModalBlogRestaurar"
                                    role="button">
                                    <i class="bi bi-x-octagon"></i> Blogs Eliminados (<?php echo $CantdatosInactivos; ?>)
                                </a>
                                <?php
                                    }
                                ?>
                            </div>
                            <br><br>
                            <hr>
                            <!--Incluimos la lista de los blogs Activo-->
                            <?php include "app/views/inc/body/blog/A_Blogs.php";?>
                            <!--finalizamos la lista de los blogs Activo-->
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

<!--Inicio Modal Para registrar Nuevos Blogs-->
<div class="modal fade" id="ModalBlog" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Nuevo Blog</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo APP_URL; ?>app/ajax/BlogAjax.php" method="POST" autocomplete="off"
                enctype="multipart/form-data" class="FormularioAjax">
                <input type="hidden" name="modulo_blog" value="registrar">
                <div class="modal-body">
                    <div class="container emp-profile">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-white border-1" name="titulo_blog"
                                        placeholder="">
                                    <label>Título Blog </label>
                                </div>
                                <br>
                                <div class="portada-img">
                                    <div class="col-sm-12 imgUp">
                                        <div class="imagePreviewblog"></div>
                                        <label class="btn btn-primary1 btn-upload">
                                            <span class="btn-text">Subir portada del blog</span>
                                            <input type="file" class="uploadFile img" name="portada_blog" value="Upload Photo"
                                                style="display: none;">
                                        </label>
                                    </div>
                                </div>
                                <br>
                                <div class="form-floating">
                                    <textarea class="form-control" id="floatingTextarea2" style="height: 100px"
                                        name="comentario_blog" placeholder=""></textarea>    
                                    <label>Deja Tu Comentario </label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="profile-head">
                                    <div class="form-floating">
                                        <textarea type="text-file" id="summernote"
                                            class="form-control bg-white border-1" name="descripcion_blog"
                                            style="height: 300px;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <button type="submit" class="btnP-SuccessP">
                                    <i class="bi bi-save"></i> Postear
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Fin Modal Para registrar Nuevos Blogs-->

<!--Inicio Modal Para Mostrar Blogs Eliminados-->
<div class="modal fade" id="ModalBlogRestaurar" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Blogs Eliminados</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="container restaure">
                <div class="row justify-content-center" data-aos="fade-up">
                    <div class="col-lg-12">
                        <!--Incluimos la lista de los blogs Innactivos-->
                        <?php include "app/views/inc/body/blog/A_BlogsInactivos.php";?>
                        <!--finalizamos la lista de los blogs Innactivos-->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Fin Modal Para Mostrar Blogs Eliminados-->



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
                input.closest(".imgUp").find('.imagePreviewblog').css('background-image', 'url(' + e
                    .target.result + ')');
                input.closest(".imgUp").find('.btn-text').text('Cambiar foto de portada');
            }
            reader.readAsDataURL(this.files[0]);
        }
    }); 
</script>