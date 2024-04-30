<?php
    require_once "app/controllers/userController.php";
    use app\controllers\userController;
    $controller = new userController();
    $id = $_SESSION['id'];
    $datos = $controller->listarUsuariosxidD($id);
    $roles = $controller->listaRoles();
    $roles_json = json_encode($roles);
    if (!empty($datos)) {
        $dni_usuario = $datos[0]['DNI'];
        $nombre_usuario = $datos[0]['NOMBRE'];
        $apellido_usuario = $datos[0]['APELLIDO'];
        $sexo_usuario = $datos[0]['SEXO'];
        $estadoCivil_usuario = $datos[0]['ESTADO_CIVIL'];
        $direccion_usuario = $datos[0]['DIRECCION'];
        $telefono_usuario = $datos[0]['NUM_TELEFONICO'];
        $email_usuario = $datos[0]['CORREO'];
        $fnacimiento_usuario = $datos[0]['FECHA_NACIMIENTO'];
        $usuario_usuario = $datos[0]['USUARIO'];
        $contrasena_usuario = $datos[0]['CONTRASENA'];
        $profesion_usuario = $datos[0]['PROFESION'];
        $curriculum_usuario = $datos[0]['CURRICULUM'];
        $rol_usuario = $datos[0]['PRIVILEGIO'];
        $twitterusuario = $datos[0]['S_TWITTER'];  
        $facebookusuario = $datos[0]['S_FACEBOOK'];
        $instagramusuario = $datos[0]['S_INSTAGRAM'];
        $linkedinusuario = $datos[0]['S_LINKEDIN'];  
        $rsocial = $datos[0]['EMPRESA'];
        $estado = $datos[0]['ESTADO'];
        $foto = $datos[0]['FOTO_PERFIL'];
        $informacionAdicional=$datos[0]['INFO_ADICIONAL'];
    }else{
        $dni_usuario = "";
        $nombre_usuario = "";
        $apellido_usuario = "";
        $sexo_usuario = "";
        $estadoCivil_usuario = "";
        $direccion_usuario = "";
        $fnacimiento_usuario = "";
        $telefono_usuario = "";
        $email_usuario = "";
        $usuario_usuario = "";
        $contrasena_usuario = "";
        $profesion_usuario = "";
        $curriculum_usuario = "";
        $rol_usuario = "";
        $rsocial = "";
        $estado = "";
        $twitterusuario ="";  
        $facebookusuario ="";
        $instagramusuario = "";
        $linkedinusuario =""; 
        $foto = "";
        $informacionAdicional="";
        echo "<script>
                    Swal.fire({
                        title: 'Error',
                        text: 'El usuario no existe, en la base de Datos',
                        icon: 'error',
                        confirmButtonText: 'Aceptar'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '" . APP_URL . "Ausers/';
                    }});
                 </script>";
    }
?>
<?php 
#validamos que usuario esta logeado para mostrarle su respectivo header
$idrolll=$_SESSION['idRol'];
if($idrolll=="Asesor"){
    include "app/views/inc/headers/headersAsesor/header_Profile.php";        
    include "app/views/inc/Breadcrumbs/Breadcrumbs_PerfilDetails.php";
}else{
    include "app/views/inc/headers/header_Profile.php"; 
    include "app/views/inc/Breadcrumbs/Breadcrumbs_PerfilDetails.php";
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
                            <?php include "app/views/inc/body/users/viewPerfil.php"; ?>
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