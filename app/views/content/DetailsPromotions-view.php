<?php 
 require_once "app/models/promotionsModel.php";
 require_once "app/controllers/promotionsController.php";

 use app\controllers\promotionsController;
 $controller = new promotionsController();
 $servicios = $controller->listaServicios();
 $url = urldecode($_SERVER['REQUEST_URI']);
 $urlParts = array_filter(explode("/", $url));
 $updatePromotionIndex = array_search("DetailsPromotions", $urlParts);
 if($updatePromotionIndex !== false && isset($urlParts[$updatePromotionIndex + 1])){
    $id = $urlParts[$updatePromotionIndex + 1];    
    $promotions = $controller->listarPromotionsDetails($id);
    $promotions_json = json_encode($promotions);
    if (!empty($promotions)) {
        $id_promo = $promotions[0]['ID_PROMOCION'];
        $foto1 = $promotions[0]['FOTO_PROMOCION'];
        $foto2 = $promotions[0]['FOTO2'];
        $foto3 = $promotions[0]['FOTO3'];
        $titulo = $promotions[0]['TITULO'];
        $descripcion = $promotions[0]['DESCRIPCION'];
        $precioprom = $promotions[0]['PRECIO'];
        $componente_fecha_hora_ini_promo=explode(" ",$promotions[0]['FECHA_INICIO_PROMOCION']);
        $fecha_inicio = $componente_fecha_hora_ini_promo[0];
        $hora_inicio = $componente_fecha_hora_ini_promo[1];
        $componente_fecha_hora_fin_promo=explode(" ",$promotions[0]['FECHA_FIN_PROMOCION']);
        $fecha_fin = $componente_fecha_hora_fin_promo[0];
        $hora_fin = $componente_fecha_hora_fin_promo[1];
        $fecha_creacion = $promotions[0]['FECHA_CREACION'];
        $fecha_mod = $promotions[0]['FECHA_MODIFICACION'];
        $fecha_eliminacion = $promotions[0]['FECHA_ELIMINACION'];
        $fecha_restauracion=$promotions[0]['FECHA_RESTAURACION'];
        $estado = $promotions[0]['ESTADO'];
        $idservicio = $promotions[0]['ID_SERVICIO'];
    }else{
        $foto1 = "";
        $foto2 = "";
        $foto3 = "";
        $titulo = "";
        $descripcion = "";
        $precioprom = "";
        $fecha_inicio = "";
        $fecha_fin = "";        
        $fecha_creacion = "";
        $fecha_mod = "";
        $fecha_eliminacion = "";
        $fecha_restauracion="";
        $estado = "";
        $idservicio = "";
        echo "<script>
                Swal.fire({
                            title: 'Error',
                            text: 'No se encontro la promocion',
                            icon: 'error',
                            confirmButtonText: 'Aceptar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                            window.location.href = 'http://localhost/www.innovatesisperu.com/Apromotions/';
                            }
                        })
            </script>";
    }
 }else{
    echo "Error: No se proporcionó un parámetro 'url' en la URL.";
 }

 /*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */

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
                            <!--Incluimos la lista de los usuarios-->
                            <?php include "app/views/inc/body/promotions/A_detailsPromotions.php";?>
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
