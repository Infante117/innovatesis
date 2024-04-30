<?php
    require_once "./config/app.php";
    require_once "./autoload.php";    
    /*---------- Iniciando sesion ----------*/
    require_once "./app/views/inc/session_start.php";
    if(isset($_GET['views'])){
        $url=explode("/", $_GET['views']);
    }else{
        $url=["dashboard"];
    }
?>
<!DOCTYPE html>
<html lang="es">
    <?php require_once "./app/views/inc/head.php"; ?>

<body>
    <?php
     use app\controllers\loginController;/*lo que hace esta linea es que se esta utilizando el namespace de la clase loginController, para poder utilizar la clase loginController*/    
     use app\controllers\viewsController;/*lo que hace esta linea es que se esta utilizando el namespace de la clase viewsController, para poder utilizar la clase viewsController*/
     $viewsController= new viewsController();/*se crea un objeto de la clase viewsController*/
     $insLogin= new loginController();/*se crea un objeto de la clase loginController*/
     $vista=$viewsController->obtenerVistasControlador($url[0]);/*se llama al metodo obtener_VistasControlador de la clase viewsController y el 0 es el indice del array*/    

     if($vista=="login" || $vista=="404" || $vista=="signUp"){//si la vista es igual a login o 404 o signUp entonces se va a requerir el archivo de la vista
        require_once "./app/views/content/".$vista."-view.php";
    }else{
        require_once $vista;
     }

     require_once "./app/views/inc/script.php";
     ?>
     
</body>
</html>