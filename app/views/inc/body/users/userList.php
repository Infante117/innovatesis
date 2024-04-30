
<?php
	use app\controllers\userController;
	$insUsuario = new userController();
	$id = $_SESSION['id'];
	echo $insUsuario->listarUsuarioControlador($id);
?>

