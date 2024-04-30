<?php
    require_once "../../config/app.php";
    require_once "../views/inc/session_start.php";
    require_once "../../autoload.php";

    use app\controllers\emailController;

    if(isset($_POST['modulo_email']) && $_POST['modulo_email'] == "enviar") {
        $insemail = new emailController();
        echo $insemail->enviarEmail();
    } 
    if(isset($_POST['modulo_email']) && $_POST['modulo_email'] == "reservarCita") {
        $insemail = new emailController();
        echo $insemail->ReservarCitaEmail();
    } 
    else {
        session_destroy();
        header("Location: ".APP_URL."login/");
    }
?>
