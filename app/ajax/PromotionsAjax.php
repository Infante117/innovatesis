<?php
	
	require_once "../../config/app.php";
	require_once "../views/inc/session_start.php";
	require_once "../../autoload.php";
	
	use app\controllers\promotionsController;

	if(isset($_POST['modulo_promotions'])){

		$inspromotion = new promotionsController();

		if($_POST['modulo_promotions']=="registrar"){
			echo $inspromotion->insertarPromotionsControlador();
		}

		if($_POST['modulo_promotions']=="DarBaja"){
			echo $inspromotion->bajaPromotionsControlador();
		}

		if($_POST['modulo_promotions']=="DarAlta"){
			echo $inspromotion->altaPromotionsControlador();
		}
		 

		if($_POST['modulo_promotions']=="Actualizar"){
			echo $inspromotion->actualizarPromotionsControlador();
		}

		if($_POST['modulo_promotions']=="eliminarFoto"){
			echo $inspromotion->eliminarFotoPromotionsControlador();
		}
		
	}else{
		session_destroy();
		header("Location: ".APP_URL."login/");
	}