<?php  
use app\controllers\companyController;
$empresa = new companyController();
use app\controllers\userController;
$usuario = new userController();

// Verificar si $_SESSION['id'] está definido
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    
    // Obtener datos del usuario si está logueado
    $datos = $usuario->listarUsuariosxidD($id);
    if (!empty($datos)) {
        $fotoper = $datos[0]['FOTO_PERFIL'];
    } else {
        $fotoper = "";
    }
} else {
    // Manejar el caso en el que no hay usuario logueado
    // Puedes definir un valor predeterminado o realizar alguna acción alternativa
    $fotoper = "";
}
?>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
        <img src="<?php echo APP_URL; ?>app/views/assets/img/graduation.png" class="logoinnovatesis">
        <h1 class="logo me-auto"><a href="<?php echo APP_URL; ?>"><span>InnovaTesis</span>Perú</a></h1>
        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a href="<?php echo APP_URL; ?>">Inicio</a></li>
                <li class="dropdown"><a><span>Acerca de</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="<?php echo APP_URL; ?>about/">Sobre nosotros</a></li>
                        <li><a href="<?php echo APP_URL; ?>team/">Equipo</a></li>
                         <!--<li><a href="<?php echo APP_URL; ?>testimony/">Testimonios</a></li>-->
                    </ul>
                </li>
                <li><a href="<?php echo APP_URL; ?>services/">Servicios</a></li>
                <li><a href="<?php echo APP_URL; ?>promotions/">Promociones</a></li>
                <li><a href="<?php echo APP_URL; ?>blog/">Blog</a></li>
                <li><a href="<?php echo APP_URL; ?>contact/" class="active">Contacto</a></li>


                <!-- Si hay un usuario logeado, mostramos su perfil -->
                <?php if(isset($_SESSION["id"]) && $_SESSION["id"]!=""): 
                    if($_SESSION["idRol"]!="Cliente"):?>
                <li class="user-area dropdown">
                    <img class="user-avatar rounded-circle"
                        src="<?php echo APP_URL; ?>app/views/assets/imagenes/usuarios/<?php echo $fotoper; ?>">
                    <a class="estilo-usuario"><?php echo $_SESSION['nombre']; ?>
                        <?php echo $_SESSION['apellido']; ?><br>
                        <?php echo $_SESSION['idRol']; ?></a>
                    <ul>
                        <li><a href="<?php echo APP_URL; ?>admin/">Vista Administradotor</a></li>
                        <li><a href="<?php echo APP_URL; ?>Perfil/">Mi perfil</a></li>
                        <li><a href="<?php echo APP_URL."logOut/"; ?>">Cerrar Sesión</a></li>
                    </ul>
                </li>
            </ul>
            <!-- Si no hay ningún usuario logeado, mostramos los iconos de redes sociales -->
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- Utiliza 'use' fuera del bloque condicional -->
        <?php else: ?>
        <li class="user-area dropdown">
            <img class="user-avatar rounded-circle"
                src="<?php echo APP_URL; ?>app/views/assets/imagenes/usuarios/<?php echo $fotoper; ?>">
            <a class="estilo-usuario"><?php echo $_SESSION['nombre']; ?> <?php echo $_SESSION['apellido']; ?><br>
                <?php echo $_SESSION['idRol']; ?></a>
            <ul>
                <li><a href="<?php echo APP_URL; ?>Perfil/">Mi perfil</a></li>
                <li><a href="<?php echo APP_URL."logOut/"; ?>">Cerrar Sesión</a></li>
            </ul>
        </li>
        </ul>
        <!-- Si no hay ningún usuario logeado, mostramos los iconos de redes sociales -->
        <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- Utiliza 'use' fuera del bloque condicional -->
        <?php endif; ?>
        <?php else: ?>
        </ul>
        <!-- Si no hay ningún usuario logeado, mostramos los iconos de redes sociales -->
        <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- Utiliza 'use' fuera del bloque condicional -->
        <?php  
        echo $empresa->ListarEmpresaControllerheader();
        ?>
        <?php endif; ?>
    </div>
</header><!-- End Header -->