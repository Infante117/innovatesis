<?php
	
	require_once "../../config/app.php";
	require_once "../views/inc/session_start.php";
	require_once "../../autoload.php";
	
	use app\controllers\companyController;

	if(isset($_POST['modulo_company'])){

		$insCompany = new companyController();

		if($_POST['modulo_company']=="registrar"){
			echo $insCompany->insertarCompanyControlador();
		}


		if($_POST['modulo_company']=="actualizar"){
			echo $insCompany->actualizarCompanyControlador();
		}
		
	}else{
		session_destroy();
		header("Location: ".APP_URL."login/");
	}