<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <?php $idrolll=$_SESSION['idRol'];
            if($idrolll=="Asesor"): ?>
            <h2>Nuevo Alumno</h2>
          <ol>
            <li><a href="<?php echo APP_URL; ?>dashboarAS/">Inicio</a></li>
            <li><a href="<?php echo APP_URL; ?>Aclients/">Alumno</a></li>
            <li>Nuevo Alumno</li>
          </ol>
          <?php else: ?>
          <h2>Nuevo Usuario</h2>
          <ol>
            <li><a href="<?php echo APP_URL; ?>admin/">Inicio</a></li>
            <li><a href="<?php echo APP_URL; ?>Ausers/">Usuarios</a></li>
            <li>Nuevo Usuario</li>
          </ol>
          <?php endif; ?>
        </div>

      </div>
    </section>
<!-- End Breadcrumbs -->