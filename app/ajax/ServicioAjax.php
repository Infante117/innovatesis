<?php
	
	require_once "../../config/app.php";
	require_once "../views/inc/session_start.php";
	require_once "../../autoload.php";
	
	use app\controllers\servicesController;

	if(isset($_POST['modulo_servicio'])){

		$insUsuario = new servicesController();

		if($_POST['modulo_servicio']=="registrar"){
			echo $insUsuario->insertarServiciosControlador();
		}

		if($_POST['modulo_servicio']=="DarBaja"){
			echo $insUsuario->DARBAJAServiciosControlador();
		}

		if($_POST['modulo_servicio']=="DarAlta"){
			echo $insUsuario->DARALTAServiciosControlador();
		}
		
		if($_POST['modulo_servicio']=="actualizar"){
			echo $insUsuario->actualizarServiciosControlador();
		}

		
		
	}else{
		session_destroy();
		header("Location: ".APP_URL."login/");
	}