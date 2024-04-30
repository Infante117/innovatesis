<?php
	
	namespace app\models;

	class viewsModel{

		/*---------- Modelo obtener vista ----------*/
		protected function obtenerVistasModelo_($vista){
			
			$listaBlanca=["dashboard","about","blog","contact","promotionsDetails","promotions",
			"services","team","testimony","Ausers","admin","Aservices","Aportfolio","Apromotions",
			"Acompany","userUpdate","newUser","DetailsUser","newServices","Ablog","companyUpdate",
			"detailsBlog","DetailsPromotions","DetailService","DetailBlog","Perfil","logOut"];

			if(in_array($vista, $listaBlanca)){
				if(is_file("./app/views/content/".$vista."-view.php")){
					$contenido="./app/views/content/".$vista."-view.php";
				}else{
					$contenido="404";
				}
			}elseif($vista=="login" || $vista=="index"){
				$contenido="login";
			}elseif($vista=="signUp"){
				$contenido="signUp";
			}else{
				$contenido="404";
			}
			return $contenido;
		}

		protected function obtenerVistasModelo($vista) {
			$listaClientes = ["login","dashboard", "about", "blog", "contact", "promotionsDetails", "promotions", "services", "team", "testimony", "Perfil", "logOut","detailsBlog","infoService"];
			$listauserNotLogged = ["login","dashboard", "about", "blog", "contact", "promotionsDetails", "promotions", "services", "team", "testimony", "logOut","infoService","detailsBlog"];
			$listaBlanca = ["dashboard", "about", "blog", "contact", "promotionsDetails", "promotions",
				"services", "team", "testimony", "Ausers", "admin", "Aservices", "Aportfolio", "Apromotions",
				"Acompany", "userUpdate", "newUser", "DetailsUser", "newServices", "Ablog", "companyUpdate",
				"detailsBlog", "DetailsPromotions", "DetailService", "DetailBlog", "Perfil", "logOut","login","infoService","Aclients"];
			$listaAsesore =["dashboarAS","Aclients","newUser","DetailsUser","userUpdate","Ablog","DetailBlog","Acompany","Perfil","logOut","login","blog","detailsBlog"];	
			
			// Obtener el rol del usuario
			$rolUsuario = isset($_SESSION['idRol']) ? $_SESSION['idRol'] : null;
			$contenido = "./app/views/content/404-view.php"; // Vista por defecto "404
			if ($rolUsuario == null) {
				if (in_array($vista, $listauserNotLogged) && is_file("./app/views/content/".$vista."-view.php")) {
					$contenido = "./app/views/content/".$vista."-view.php";
				}
			} elseif ($rolUsuario == "Cliente") {
				if (in_array($vista, $listaClientes) && is_file("./app/views/content/".$vista."-view.php")) {
					$contenido = "./app/views/content/".$vista."-view.php";
				}
			} elseif ($rolUsuario == "Asesor") {
				if (in_array($vista, $listaAsesore) && is_file("./app/views/content/".$vista."-view.php")) {
					$contenido = "./app/views/content/".$vista."-view.php";
				}
			} elseif ($rolUsuario != "Cliente") {
				if (in_array($vista, $listaBlanca) && is_file("./app/views/content/".$vista."-view.php")) {
					$contenido = "./app/views/content/".$vista."-view.php";
				}
			} else{
				$contenido = "./app/views/content/404-view.php";
			}
						
			return $contenido;
		}
		




	}