<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Blog</h2>
          <ol>
          <?php $idrolll=$_SESSION['idRol']; 
                  if($idrolll=="Asesor"):?>
                  <li><a href="<?php echo APP_URL; ?>dashboarAS/">Inicio</a></li>
            <?php else:?>
            <li><a href="<?php echo APP_URL; ?>admin/">Inicio</a></li>
            <?php endif;?>
            <li>Blog</li>
          </ol>
        </div>

      </div>
    </section>
<!-- End Breadcrumbs -->