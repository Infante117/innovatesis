<?php
require_once "app/controllers/userController.php";
use app\controllers\userController;
// Crea una instancia de usuarioController
$controller = new userController();
// Obtiene la URL actual
$url = urldecode($_SERVER['REQUEST_URI']);
// Divide la URL por las barras y filtra elementos vacíos
$urlParts = array_filter(explode("/", $url));
// Verifica si hay un segmento "updateUser" en la URL 
$updateUserIndex = array_search("DetailsUser", $urlParts);
if ($updateUserIndex !== false && isset($urlParts[$updateUserIndex + 1])) {
    // El ID del usuario estaría en la posición siguiente al "updateUser" en la URL
    $id = $urlParts[$updateUserIndex + 1];
    $roles = $controller->listaRoles();
    $roles_json = json_encode($roles);
    $users = $controller->listarUsuariosxidD($id);
    $users_json = json_encode($users);
    if (!empty($users)) {
        $id_usuario = $users[0]['ID_USUARIO'];
        $dni = $users[0]['DNI'];
        $nomb_cliente = $users[0]['NOMBRE'];
        $ape_cliente = $users[0]['APELLIDO'];
        $sexo_cliente = $users[0]['SEXO'];
        $fecha_nacimiento = $users[0]['FECHA_NACIMIENTO'];
        $estado_civil = $users[0]['ESTADO_CIVIL'];
        $dir_cliente = $users[0]['DIRECCION'];
        $tel_cliente = $users[0]['NUM_TELEFONICO'];
        $email_cliente = $users[0]['CORREO'];
        $usuario_U = $users[0]['USUARIO'];
        $contrasena = $users[0]['CONTRASENA'];
        $profesion = $users[0]['PROFESION'];
        $curriculum = $users[0]['CURRICULUM'];
        $rol_usuario = $users[0]['PRIVILEGIO'];
        $rsocial = $users[0]['EMPRESA'];
        $estado = $users[0]['ESTADO'];
        $foto = $users[0]['FOTO_PERFIL'];
        $informacionAdicional=$users[0]['INFO_ADICIONAL'];
        $twitter = $users[0]['S_TWITTER'];
        $facebook = $users[0]['S_FACEBOOK'];
        $instagram = $users[0]['S_INSTAGRAM'];
        $linkedin = $users[0]['S_LINKEDIN'];
    }else{
       #mostramos las variable vacias para que no muestre error
       $id_usuario = "";
       $dni = "";
       $nomb_cliente = "";
       $ape_cliente = "";
       $sexo_cliente = "";
       $fecha_nacimiento = "";
       $estado_civil = "";
       $dir_cliente = "";
       $tel_cliente = "";
       $email_cliente = "";
       $usuario_U = "";
       $contrasena = "";
       $profesion = "";
       $curriculum = "";
       $rol_usuario = "";
       $rsocial = "";
       $estado = "";
       $foto = "";
       $informacionAdicional= "";
       $twitter = "";
       $facebook = "";
       $instagram = "";
       $linkedin = "";
       #mostramos una alerta en sweetalert, si no se encuentra el usuario, redirigimos a la pagina de usuarios
        echo "<script>
            Swal.fire({
                title: 'Error',
                text: 'El usuario no existe, en la base de Datos',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '" . APP_URL . "Ausers/';
                }
            });
        </script>";
    }
} else {
    // Maneja la ausencia del ID en la URL
   echo "Error: No se proporcionó un parámetro 'url' en la URL.";
    
}

$idrolll=$_SESSION['idRol'];
if($idrolll=="Asesor"){
    include "app/views/inc/headers/headersAsesor/header_Alumnos.php";        
    include "app/views/inc/Breadcrumbs/Breadcrumbs_AusersDetails.php";
}else{
include "app/views/inc/headers/header_Ausers.php"; 
include "app/views/inc/Breadcrumbs/Breadcrumbs_AusersDetails.php";  
}       
?>
<main id="main">
       <section id="contact" class="contact">
        <div class="container">
            <div class="row justify-content-center" data-aos="fade-up">
                <div class="col-lg-12">
                    <div class="info-wrap">
                        <div class="row">
                            <!--Incluimos los campos de actualización de los usuarios-->
                            <?php include "app/views/inc/body/users/detailsUserBody.php"; ?>
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


