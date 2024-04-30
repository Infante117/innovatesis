
<?php
    $user= $_SESSION['usuario'];
	use app\controllers\userController;
	$insCliente = new userController();
	echo $insCliente->listarAlumnoPorDocenteControlador($user);
?>

