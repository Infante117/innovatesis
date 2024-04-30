<?php 
require_once "app/models/userModel.php";
require_once "app/controllers/userController.php";

use app\controllers\userController;
$controller = new userController();
$roles = $controller->listaRoles();
$roles_json = json_encode($roles);

    $idrolll=$_SESSION['idRol'];
    if($idrolll=="Asesor"){
        include "app/views/inc/headers/headersAsesor/header_Alumnos.php"; 
        include "app/views/inc/Breadcrumbs/Breadcrumbs_AusersNew.php";
    }else{
        include "app/views/inc/headers/header_Ausers.php"; 
        include "app/views/inc/Breadcrumbs/Breadcrumbs_AusersNew.php";   
    }      
?>
<main id="main">
    <section id="contact" class="contact">
        <div class="container">
            <div class="row justify-content-center" data-aos="fade-up">
                <div class="col-lg-12">
                    <div class="info-wrap">
                        <div class="row">
                            <h1>Nuevo Usuario</h1>
                            <hr>
                            <!--Incluimos los campos de actualización de los usuarios-->
                            <?php 
                            if($idrolll=="Asesor"){
                            include "app/views/inc/body/users/newAlumno.php"; 
                            }else{
                            include "app/views/inc/body/users/newUserbody.php";
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