<!-- 404 Start -->
<div class="container-fluid bg-breadcrumb"
    style="background: linear-gradient(rgba(19, 53, 123, 0.3), rgba(19, 53, 153, 0.3)); object-fit: cover;">
    <div class="container py-4m  text-center">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                <h1 class="display-1">404</h1>
                <h1 class="mb-4 text-dark">Página no encontrada</h1>
                <p class="mb-4 text-dark">Lo sentimos, ¡la página que has buscado no existe en nuestro sitio web!
                    ¿Quizás ir a nuestra página de inicio o intentar utilizar una búsqueda?</p>
                    <!--Capturamos el rol del usuario logueado para rediriguirlo a su pagina de inicio correspondiente-->
                    <?php if(isset($_SESSION["id"]) && $_SESSION["id"]!=""): 
                            if($_SESSION["idRol"]="Asesor"):?>
                             <a class="btn btn-primary rounded-pill py-3 px-5" href="<?php echo APP_URL; ?>dashboarAS/">Vuelve a casa</a>
                            <?php elseif($_SESSION["idRol"]="Cliente"): ?>
                             <a class="btn btn-primary rounded-pill py-3 px-5" href="<?php echo APP_URL; ?>dashboard/">Vuelve a casa</a>
                            <?php else: ?>
                                <a class="btn btn-primary rounded-pill py-3 px-5" href="<?php echo APP_URL; ?>admin/">Vuelve a casa</a>
                            <?php endif; ?>
                    <?php else: ?>
                        <a class="btn btn-primary rounded-pill py-3 px-5" href="<?php echo APP_URL; ?>">Vuelve a casa</a>
                    <?php endif; ?>
              
            </div>
        </div>
    </div>
</div>
<!-- 404 End -->