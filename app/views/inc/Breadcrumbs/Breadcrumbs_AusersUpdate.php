<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <?php $idrolll=$_SESSION['idRol'];
              if($idrolll=="Asesor"):?>
            <h2>Perfil del Alumno</h2>
            <ol>
                <li><a href="<?php echo APP_URL; ?>dashboarAS/">Inicio</a></li>
                <li><a href="<?php echo APP_URL; ?>Aclients/">Alumno</a></li>
                <li>Actualizar Datos</li>
            </ol>
            <?php else:?>
            <h2>Actualizar Usuarios</h2>
            <ol>
                <li><a href="<?php echo APP_URL; ?>admin/">Inicio</a></li>
                <li><a href="<?php echo APP_URL; ?>Ausers/">Usuarios</a></li>
                <li>Actualizar Usuario</li>
            </ol>
            <?php endif;?>
        </div>

    </div>
</section>
<!-- End Breadcrumbs -->