<?php
	
	require_once "../../config/app.php";
	require_once "../views/inc/session_start.php";
	require_once "../../autoload.php";
	
	use app\controllers\blogController;

	if(isset($_POST['modulo_blog'])){

		$insBlog = new blogController();

		if($_POST['modulo_blog']=="registrar"){
			echo $insBlog->insertarBlogControlador();
		}

		if($_POST['modulo_blog']=="DarBaja"){
			echo $insBlog->DarBajaBlogControlador();
		}

		if($_POST['modulo_blog']=="DarAlta"){
			echo $insBlog->DarAltaBlogControlador();
		}

		if($_POST['modulo_blog']=="Actualizar"){
			echo $insBlog->actualizarBlogControlador();
		}

		if($_POST['modulo_blog']=="eliminarFoto"){
			echo $insBlog->eliminarFotoBlogControlador();
		}
		
		if($_POST['modulo_blog']=="NuevoComentario"){
			echo $insBlog->insertarComentario();
		}

		if($_POST['modulo_blog']=="ActualizarComentario"){
			echo $insBlog->actualizarComenterio();
		}

		if($_POST['modulo_blog']=="EliminarComentario"){
			echo $insBlog->eliminarComentario();
		}

		if($_POST['modulo_blog']=="InsertarReplyComentario"){
			echo $insBlog->insertarReplycoment();
		}

		if($_POST['modulo_blog']=="ActualizarComentarioReply"){
			echo $insBlog->actualizarReplyComenterio();
		}
		
		if($_POST['modulo_blog']=="EliminarReplyComentario"){
			echo $insBlog->eliminarReplyComentario();
		}

		
	}else{
		session_destroy();
		header("Location: ".APP_URL."login/");
	}