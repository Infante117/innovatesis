<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <?php
        if(isset($_SESSION['idRol'])) {
        $rol = $_SESSION['idRol'];
    // Verificar el valor de 'idRol'
    if($rol == "Asesor") {         
        ?>
        <div class="d-flex justify-content-between align-items-center">
            <h2>Blog</h2>
            <ol>
                <li><a href="<?php echo APP_URL; ?>dashboarAS/">Inicio</a></li>
                <li>Blog</li>
                <li>Comentarios</li>
            </ol>
        </div>
        <?php }else{ ?>
        <div class="d-flex justify-content-between align-items-center">
            <h2>Blog</h2>
            <ol>
                <li><a href="<?php echo APP_URL; ?>">Inicio</a></li>
                <li>Blog</li>
            </ol>
        </div>
        <?php }}else{ ?>
        <div class="d-flex justify-content-between align-items-center">
            <h2>Blog</h2>
            <ol>
                <li><a href="<?php echo APP_URL; ?>">Inicio</a></li>
                <li>Blog</li>
            </ol>
        </div>
        <?php } ?>



    </div>
</section>
<!-- End Breadcrumbs -->