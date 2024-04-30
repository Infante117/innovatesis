<?php 
require_once "app/controllers/blogController.php";
use app\controllers\blogController;
$controller = new blogController();
$url = urldecode($_SERVER['REQUEST_URI']);
$urlParts = array_filter(explode("/", $url));// Divide la URL por las barras y filtra elementos vacíos
$detailBlogIndex = array_search("DetailBlog", $urlParts);// Verifica si hay un segmento "DetailBlog" en la URL
if ($detailBlogIndex !== false && isset($urlParts[$detailBlogIndex + 1])) {
    $id = $urlParts[$detailBlogIndex + 1];
    $blog = $controller->listarBlog_x_ID($id);
    if (!empty($blog)) {
        $id_blog = $blog[0]['ID_BLOG'];
        $titulo = $blog[0]['TITULO'];
        $descripcion = $blog[0]['DESCRIPCION'];
        $imagen = $blog[0]['PORTADA_BLOG'];
        $fecha_creacion = $blog[0]['FECHA_CREACION'];
        $fecha_modificacion = $blog[0]['FECHA_MODIFICACION'];
        $fecha_eliminacion = $blog[0]['FECHA_ELIMINACION'];
        $fecha_restauracion = $blog[0]['FECHA_RESTAURACION'];
        $estado = $blog[0]['ESTADO'];
    } else {
        $id_blog = "";
        $titulo = "";
        $descripcion = "";
        $imagen = "";
        $fecha_creacion = "";
        $fecha_modificacion = "";
        $fecha_eliminacion = "";
        $fecha_restauracion = "";
        $estado = "";
        echo "<script>
            Swal.fire({
                title: 'Error',
                text: 'No se encontró el blog',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '" . APP_URL . "Ablog/';
                }
            });
        </script>";
    }
}else {
    echo "Error: No se proporcionó un parámetro 'url' en la URL.";
}

$idrolll=$_SESSION['idRol'];
if($idrolll=="Asesor"){
    include "app/views/inc/headers/headersAsesor/header_blog.php";        
    include "app/views/inc/Breadcrumbs/Breadcrumbs_AblogDetail.php";
}else{
    include "app/views/inc/headers/header_Ablog.php"; 
    include "app/views/inc/Breadcrumbs/Breadcrumbs_AblogDetail.php";
}        
?>

<main id="main">
    <section id="contact" class="contact">
        <div class="container">
            <div class="row justify-content-center" data-aos="fade-up">
                <div class="col-lg-12">
                    <?php
                    include "app/views/inc/body/blog/A_detailsBlog.php";
                    ?>
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







