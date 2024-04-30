<?php  
        use app\controllers\userController;
        $usuario = new userController();
        $id = $_SESSION['id'];
        $datos = $usuario->listarUsuariosxidD($id);
        if (!empty($datos)) {
            $fotoper = $datos[0]['FOTO_PERFIL'];
        }

?>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
        <img src="<?php echo APP_URL; ?>app/views/assets/img/graduation.png" class="logoinnovatesis">
        <h1 class="logo me-auto"><a href="<?php echo APP_URL; ?>"><span>InnovaTesis</span>Perú</a></h1>
        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a href="<?php echo APP_URL; ?>admin/">Inicio</a></li>
                <!--<li><a href="<?php echo APP_URL; ?>Ausers/">Usuarios</a></li>-->
                <li class="dropdown"><a class="active"><span>Usuarios</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="<?php echo APP_URL; ?>Ausers/">Usuarios</a></li>
                        <li><a href="<?php echo APP_URL; ?>Aclients/" class="active">Clientes</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo APP_URL; ?>Aservices/">Servicios</a></li>
                <li><a href="<?php echo APP_URL; ?>Ablog/">Blog</a></li>
                <!--<li><a href="<?php echo APP_URL; ?>Aportfolio">portafolio</a></li>-->
                <li><a href="<?php echo APP_URL; ?>Apromotions/">Promociones</a></li>
                <li><a href="<?php echo APP_URL; ?>Acompany/">Empresa</a></li>
                <li class="user-area dropdown">
                    <img class="user-avatar rounded-circle"
                        src="<?php echo APP_URL; ?>app/views/assets/imagenes/usuarios/<?php echo $fotoper; ?>">
                    <a class="estilo-usuario"><?php echo $_SESSION['nombre']; ?> <?php echo $_SESSION['apellido']; ?>
                        <br> <?php echo $_SESSION['idRol']; ?></a>
                    <ul>
                        <li><a href="<?php echo APP_URL; ?>dashboard/">Vista Cliente</a></li>
                        <hr>
                        <li><a href="<?php echo APP_URL; ?>Perfil/">Mi perfil</a></li>
                        <li><a href="<?php echo APP_URL."logOut/"; ?>">Cerrar Sesion</a></li>
                    </ul>
                </li>
            </ul>

            <i class="bi bi-list mobile-nav-toggle">

            </i>
        </nav>
        <!--<?php  
            use app\controllers\companyController;
            $empresa = new companyController();
            echo $empresa->ListarEmpresaControllerheader();
            ?>-->

    </div>
</header><!-- End Header -->