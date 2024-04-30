<?php include "app/views/inc/headers/header_Ausers.php"; 
      include "app/views/inc/Breadcrumbs/Breadcrumbs_Ausers.php";
      use app\controllers\userController;
        $controller = new userController();
        $datosInactivos = $controller->ListarUsuariosInactivos();
        $CantdatosInactivos = count($datosInactivos);         
?>
<main id="main">
    <section id="contact" class="contact">
        <div class="container">
            <div class="row justify-content-center" data-aos="fade-up">
                <div class="col-lg-12">
                    <div class="info-wrap">
                        <div class="row">
                            <h1>Lista de Usuarios</h1>
                            <div class="text-left">
                                <a type="button" class="btn btn-primary" href="<?php echo APP_URL; ?>newUser/">
                                    <i class="fa-solid fa-user-plus"></i> Agregar Usuario
                                </a>
                                <!--creamos un boton modal-->
                                <?php 
                                    if($CantdatosInactivos > 0){
                                ?>
                                <a class="btn btnP-dangerP" data-bs-toggle="modal" href="#ModalUsuarioRestaurar"
                                    role="button">
                                    <i class="bi bi-x-octagon"></i> Usuarios Inactivos
                                    (<?php echo $CantdatosInactivos; ?>)
                                </a>
                                <?php
                                    }
                                ?>
                            </div>
                            <br><br>
                            <hr>
                            <!--Incluimos la lista de los usuarios-->

                            <?php include "app/views/inc/body/users/userList.php";?>
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

<!-- Modal -->
<div class="modal fade" id="ModalUsuarioRestaurar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                    echo $controller->listarUsuarioControladorINACTIVO();
                ?>
            </div>
        </div>
    </div>
</div>