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
$updateUserIndex = array_search("userUpdate", $urlParts);

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
        $nomb_usuario = $users[0]['NOMBRE'];
        $ape_usuario = $users[0]['APELLIDO'];
        $sexo_usuario = $users[0]['SEXO'];
        $fnac_usuario = $users[0]['FECHA_NACIMIENTO'];
        $estadoCivil = $users[0]['ESTADO_CIVIL'];
        $documento = $users[0]['CURRICULUM'];
        $facebook = $users[0]['S_FACEBOOK'];
        $instagram = $users[0]['S_INSTAGRAM'];
        $twitter = $users[0]['S_TWITTER'];
        $linkedin = $users[0]['S_LINKEDIN'];
        $dir_usuario = $users[0]['DIRECCION'];
        $tel_usuario = $users[0]['NUM_TELEFONICO'];
        $email_usuario = $users[0]['CORREO'];
        $usuario_UA = $users[0]['USUARIO'];
        $contrasena = $users[0]['CONTRASENA'];
        $profesion = $users[0]['PROFESION'];
        $rol_usuario = $users[0]['PRIVILEGIO'];
        $rsocial = $users[0]['EMPRESA'];
        $estado = $users[0]['ESTADO'];
        $foto = $users[0]['FOTO_PERFIL'];
        $informacionAdicional=$users[0]['INFO_ADICIONAL'];
    }else{
       #mostramos las variable vacias para que no muestre error
        $dni = "";
        $nomb_cliente = "";
        $ape_cliente = "";
        $sexo_cliente = "";
        $fnac_cliente = "";
        $estadoCivil = "";
        $documento = "";
        $facebook = "";
        $instagram = "";
        $twitter = "";
        $linkedin = "";
        $dir_cliente = "";
        $tel_cliente = "";
        $email_cliente = "";
        $usuario = "";
        $contrasena = "";
        $profesion = "";
        $rol = "";
        $rsocial = "";
        $estado = "";
        $foto = "";
        $informacionAdicional="";

       #mostramos una alerta en sweetalert, si no se encuentra el usuario, redirigimos a la pagina de usuarios
         echo "<script>
            Swal.fire({
                title: 'Error',
                text: 'El usuario no existe, en la base de Datos',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            }).then(function() {
                window.location = 'http://localhost/www.innovatesisperu.com/Ausers/';
            });
        </script>"; 
    }
} else {
    // Maneja la ausencia del ID en la URL
   echo "Error: No se proporcionó un parámetro 'url' en la URL.";
    
}

#validamos que usuario esta logeado para mostrarle su respectivo header
$idrolll=$_SESSION['idRol'];
if($idrolll=="Asesor"){
    include "app/views/inc/headers/headersAsesor/header_Alumnos.php";        
    include "app/views/inc/Breadcrumbs/Breadcrumbs_AusersUpdate.php";
}else{
    include "app/views/inc/headers/header_Ausers.php"; 
    include "app/views/inc/Breadcrumbs/Breadcrumbs_AusersUpdate.php"; 
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
                            <?php 
                            if($idrolll=="Asesor"){
                            include "app/views/inc/body/users/updateAlumno.php"; 
                            }else{
                            include "app/views/inc/body/users/updateUser.php";
                            } 
                            ?>
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



<script>
document.getElementById('pdf-input').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const reader = new FileReader();
    
    reader.onload = function(event) {
        const pdfPreview = document.getElementById('pdf-preview');
        pdfPreview.setAttribute('src', event.target.result);
    };
    
    reader.readAsDataURL(file);
});

</script>