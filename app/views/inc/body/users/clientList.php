
<?php
	use app\controllers\userController;
	$insCliente = new userController();
	echo $insCliente->listarClienteControlador($id);
?>

