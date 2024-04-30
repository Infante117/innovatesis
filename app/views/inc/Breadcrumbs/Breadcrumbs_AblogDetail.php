<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <?php $idrolll=$_SESSION['idRol'];
                if($idrolll=="Asesor"):?>
                <h2>Blog</h2>
          <ol>
            <li><a href="<?php echo APP_URL; ?>dashboarAS/">Inicio</a></li>
            <li><a href="<?php echo APP_URL; ?>Ablog/">Blog</a></li>
            <li>Detalle Blog</li>
          </ol>
          <?php else:?>      
          <h2>Blog</h2>
          <ol>
            <li><a href="<?php echo APP_URL; ?>admin/">Inicio</a></li>
            <li><a href="<?php echo APP_URL; ?>Ablog/">Blog</a></li>
            <li>Detalle Blog</li>
          </ol>
          <?php endif;?>
        </div>

      </div>
    </section>
<!-- End Breadcrumbs -->