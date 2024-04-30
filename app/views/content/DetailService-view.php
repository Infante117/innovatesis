<?php
require_once "app/controllers/servicesController.php";

use app\controllers\servicesController;
// Crea una instancia de usuarioController
$controller = new servicesController();
// Obtiene la URL actual
$url = urldecode($_SERVER['REQUEST_URI']);
// Divide la URL por las barras y filtra elementos vacíos
$urlParts = array_filter(explode("/", $url));
// Verifica si hay un segmento "updateUser" en la URL 
$updateServicesIndex = array_search("DetailService", $urlParts);

if ($updateServicesIndex !== false && isset($urlParts[$updateServicesIndex + 1])) {
    // El ID del usuario estaría en la posición siguiente al "updateUser" en la URL
    $id = $urlParts[$updateServicesIndex + 1];
    $services = $controller->listarServicesxidD($id);
    $users_json = json_encode($services);
    if (!empty($services)) {
        $id_servicio=$services[0]['ID_SERVICIO'];
        $portada=$services[0]['PORTADA_SERVICIO'];
        $nom_servicio=$services[0]['NOMBRE_SERVICIO'];
        $descrip_servicio=$services[0]['DESCRIPCION'];
        $precio=$services[0]['PRECIO'];
        $fecha_creacion=$services[0]['FECHA_CREACION'];
        $fecha_modificacion=$services[0]['FECHA_MODIFICACION'];
        $fecha_eliminacion=$services[0]['FECHA_ELIMINACION'];
        $fecha_restauracion=$services[0]['FECHA_RESTAURACION'];
        $estado=$services[0]['ESTADO'];
        $empresa=$services[0]['ID_EMPRESA'];
        #mostraremos la descripcion del servicio en una lista de items la descripcion se separara en PUNTOS
        $listaServicios = explode(".",  rtrim($descrip_servicio));
        $listaServicios[] = '';

    }else{
       #mostramos las variable vacias para que no muestre error
        $id_servicio="";
        $portada="";
        $nom_servicio="";
        $descrip_servicio="";
        $listaServicios="";
        $precio="";
        $fecha_creacion="";
        $fecha_modificacion="";
        $fecha_eliminacion="";
        $fecha_restauracion="";
        $estado="";
        $empresa="";    
       #mostramos una alerta en sweetalert, si no se encuentra el usuario, redirigimos a la pagina de usuarios
         echo "<script>
            Swal.fire({
                title: 'Error',
                text: 'El usuario no existe, en la base de Datos',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            }).then(function() {
                window.location = 'http://localhost/www.innovatesisperu.com/Aservices/';
            });
        </script>"; 
    }
} else {
    // Maneja la ausencia del ID en la URL
   echo "Error: No se proporcionó un parámetro 'url' en la URL.";
    
}
 include "app/views/inc/headers/header_Aservices.php"; 
 include "app/views/inc/Breadcrumbs/Breadcrumbs_AservicesDetails.php";         
?>
<style>
.imagePreviewServicesUpdate {
    width: 100%;
    /*ancho de la imagen*/
    height: 260px;
    /*alto de la imagen*/
    background-position: center center;
    background: url(<?php echo APP_URL; ?>app/views/assets/imagenes/Services/<?php echo $portada; ?>);
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
<main id="main">
       <section id="contact" class="contact">
        <div class="container">
            <div class="row justify-content-center" data-aos="fade-up">
                <div class="col-lg-12">
                    <div class="info-wrap">
                        <div class="row">
                            <!--Incluimos los campos de actualización de los usuarios-->
                            <?php include "app/views/inc/body/services/A_detailService.php"; ?>
                            <!--finalizamos los campos de actualización de los usuarios-->
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


