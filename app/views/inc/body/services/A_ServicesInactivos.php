<?php
		use app\controllers\servicesController;

		$listServices = new servicesController();

		echo $listServices->listarServiciosInactivosController();
?>