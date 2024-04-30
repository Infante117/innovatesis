<?php 
require_once "app/models/promotionsModel.php";
require_once "app/controllers/promotionsController.php";

use app\controllers\promotionsController;
$controller = new promotionsController();
#$servicios = $controller->listaServicios();
#$roles_json = json_encode($servicios);-->
$url = urldecode($_SERVER['REQUEST_URI']);
$urlParts = array_filter(explode("/", $url));
$updatePromotionIndex = array_search("promotionsDetails", $urlParts);
if($updatePromotionIndex !== false && isset($urlParts[$updatePromotionIndex + 1])){
    $id = $urlParts[$updatePromotionIndex + 1];    
    $promotions = $controller->bodyPromotionsDetailsController($id);
    $promotions_json = json_encode($promotions);
    if (!empty($promotions)) {
        $idpromo = $promotions[0]['ID_PROMOCION'];
        $foto1 = $promotions[0]['FOTO_PROMOCION'];
        $foto2 = $promotions[0]['FOTO2'];
        $foto3 = $promotions[0]['FOTO3'];
        $titulo = $promotions[0]['TITULO'];
        $descripcion = $promotions[0]['DESCRIPCION'];
        $fecha_inicio = $promotions[0]['FECHA_INICIO_PROMOCION'];
        $fecha_fin = $promotions[0]['FECHA_FIN_PROMOCION'];
        $fecha_mod = $promotions[0]['FECHA_MODIFICACION'];
        $fecha_eliminacion = $promotions[0]['FECHA_ELIMINACION'];
        $estado = $promotions[0]['ESTADO'];
        $estadoP = $promotions[0]['ESTADO_PROMO'];
        $servicio = $promotions[0]['ID_SERVICIO'];
    }else{
        $foto1 = "";
        $foto2 = "";
        $foto3 = "";
        $titulo = "";
        $descripcion = "";
        $fecha_inicio = "";
        $fecha_fin = "";
        $fecha_mod = "";
        $fecha_eliminacion = "";
        $estadoP="";
        $estado = "";
        $servicio = "";
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

include "app/views/inc/headers/header_promotions.php"; 
include "app/views/inc/Breadcrumbs/Breadcrumbs_promotionsDetails.php";         
?>
<main id="main">
    <?php include "app/views/inc/body/promotions/C_promotionsDetails.php";
    include "app/views/inc/footer.php"; 
    ?>
</main>
<!-- Para desplazarme al inicio de la pagina-->
<a href="#" class="back-to-top d-flex align-items-center justify-content-center">
     <i class="bi bi-arrow-up-short"></i></a>