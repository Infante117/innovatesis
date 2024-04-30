<?php
	
	require_once "../../config/app.php";
	require_once "../views/inc/session_start.php";
	require_once "../../autoload.php";
	
	use app\controllers\userController;

	if(isset($_POST['modulo_usuario'])){

		$insUsuario = new userController();

		if($_POST['modulo_usuario']=="registrar"){
			echo $insUsuario->insertarUsuarioControlador();
		}

		if($_POST['modulo_usuario']=="registrarAlumno"){
			echo $insUsuario->insertarAlumnoControlador();
		}

		if($_POST['modulo_usuario']=="registrarCliente"){
			echo $insUsuario->insertarClienteControlador();
		}

		if($_POST['modulo_usuario']=="DarBaja"){
			echo $insUsuario->eliminarUsuarioControlador();
		}
		
		if($_POST['modulo_usuario']=="DarBajaAlumno"){
			echo $insUsuario->eliminarAlumnoControlador();
		}

		if($_POST['modulo_usuario']=="DarAlta"){
			echo $insUsuario->DA_UsuarioControlador();
		}

		if($_POST['modulo_usuario']=="actualizar"){
			echo $insUsuario->actualizarUsuarioControlador();
		}

		if($_POST['modulo_usuario']=="actualizarAlumno"){
			echo $insUsuario->actualizarAlumnoControlador();
		}

		if($_POST['modulo_usuario']=="actualizarCliente"){
			echo $insUsuario->ACTUALIZAR_PERFIL_CLIENTES();
		}

		if($_POST['modulo_usuario']=="actualizarUsuario"){
			echo $insUsuario->ACTUALIZAR_PERFIL_USUARIOS();
		}

		if($_POST['modulo_usuario']=="eliminarFoto"){
			echo $insUsuario->eliminarFotoUsuarioControlador();
		}

		if($_POST['modulo_usuario']=="actualizarClave"){
			echo $insUsuario->ActualizarClave();
		}
		
	}else{
		session_destroy();
		header("Location: ".APP_URL."login/");
	}