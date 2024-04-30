<?php
	
	require_once "../../config/app.php";
	require_once "../views/inc/session_start.php";
	require_once "../../autoload.php";
	
	use app\controllers\dashboardController;

	if(isset($_POST['modulo_dashboard'])){

		$insCompany = new dashboardController();

		if($_POST['modulo_dashboard']=="registrar"){
			echo $insCompany->ControllerRegisterRol();
		}


		if($_POST['modulo_dashboard']=="actualizar"){
			echo $insCompany->ControllerUpdateRol();
		}

		if($_POST['modulo_dashboard']=="darbaja"){
			echo $insCompany->ControllerbajaRol();
		}

		if($_POST['modulo_dashboard']=="restablecer"){
			echo $insCompany->ControllerrestablecerRol();
		}
		
	}else{
		session_destroy();
		header("Location: ".APP_URL."login/");
	}