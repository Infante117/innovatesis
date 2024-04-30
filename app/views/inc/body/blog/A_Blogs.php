<?php
		use app\controllers\blogController;
		$insBlogs = new blogController();
		//validamos el tipo de usuario para mostrar sus respectibos blogs
		$rol=$_SESSION['idRol'];
		if($rol=='Asesor'){
			echo $insBlogs->listarBlogsControladorParaAsesores();
		}else{
		echo $insBlogs->listarBlogsControlador();
		}
?>

