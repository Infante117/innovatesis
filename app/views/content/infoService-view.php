<?php 
use app\controllers\servicesController;
$controller = new servicesController();
// Obtiene la URL actual
$url = urldecode($_SERVER['REQUEST_URI']);
// Divide la URL por las barras y filtra elementos vacíos
$urlParts = array_filter(explode("/", $url));
// Verifica si hay un segmento "updateUser" en la URL 
$updateServicesIndex = array_search("infoService", $urlParts);

if ($updateServicesIndex !== false && isset($urlParts[$updateServicesIndex + 1])) {
    // El ID del usuario estaría en la posición siguiente al "updateUser" en la URL
    $id = $urlParts[$updateServicesIndex + 1];
    $services = $controller->listarServicesxidD($id);
    $users_json = json_encode($services);
    if (!empty($services)) {
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
                    html: 'El Servicio no existe o ha sido eliminado.<br> Se redirigirá a la página de servicios.',
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                    }).then(function() {
                    window.location = 'http://localhost/www.innovatesisperu.com/services/';
                    });
                </script>"; 
    }
} else {
    // Maneja la ausencia del ID en la URL
   echo "Error: No se proporcionó un parámetro 'url' en la URL.";
    
}
include "app/views/inc/headers/header_services.php"; 
include "app/views/inc/Breadcrumbs/Breadcrumbs_servicesdetail.php";         
?>
<main id="main">
    <?php include "app/views/inc/body/services/C_detailService.php";
    include "app/views/inc/footer.php"; 
    ?>
</main>
<!-- Para desplazarme al inicio de la pagina-->
<a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i></a>