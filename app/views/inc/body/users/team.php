<section id="team" class="team section-bg">
    <div class="container">
        <?php  
            use app\controllers\userController;
            $services = new userController();
            echo $services->ListarEquipoControllerTotal();
            ?>
    </div>
</section>