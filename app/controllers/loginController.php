<?php
	namespace app\controllers;
	use app\models\mainModel;
	
	class loginController extends mainModel{

		/*----------  Controlador iniciar sesion  ----------*/
		public function iniciarSesionControlador(){

			$usuario=$this->limpiarCadena($_POST['login_usuario']);
		    $clave=$this->limpiarCadena($_POST['login_clave']);

		    # Verificando campos obligatorios #
		    if($usuario=="" || $clave==""){
		        echo "<script>
			        Swal.fire({
					  icon: 'error',
					  title: 'Ocurrió un error inesperado',
					  text: 'No has llenado todos los campos que son obligatorios'
					});
				</script>";
		    }else{

			    # Verificando integridad de los datos #
			    if($this->verificarDatos("[a-zA-Z0-9]{4,20}",$usuario)){
			        echo "<script>
				        Swal.fire({
						  icon: 'error',
						  title: 'Ocurrió un error inesperado',
						  text: 'El USUARIO no coincide con el formato solicitado'
						});
					</script>";
			    }else{

			    	# Verificando integridad de los datos #
				    if($this->verificarDatos("[a-zA-Z0-9$@.-]{7,100}",$clave)){
				        echo "<script>
					        Swal.fire({
							  icon: 'error',
							  title: 'Ocurrió un error inesperado',
							  text: 'La CLAVE no coincide con el formato solicitado'
							});
						</script>";
				    }else{

					    # Verificando usuario "SELECT * FROM usuario WHERE USUARIO='$usuario'#
					    $check_usuario=$this->ejecutarConsulta("SELECT * FROM usuario WHERE USUARIO='$usuario'");

					    if($check_usuario->rowCount()==1){
							$valRol_Estado=$this->ejecutarConsulta("SELECT * FROM usuario u INNER JOIN roles r ON r.id_rol=u.id_rol WHERE u.USUARIO='$usuario' AND r.estado='Activo'");
							if($valRol_Estado->rowCount()==1){
					    		$check_usuario=$check_usuario->fetch();
					    		if($check_usuario['USUARIO']==$usuario && password_verify($clave,$check_usuario['CONTRASENA'])){
					    			session_set_cookie_params(3600 * 24 * 30); // Cookie de sesión dura 30 días
					    			session_start(); // Inicia la sesión
					    			$_SESSION['id']=$check_usuario['ID_USUARIO'];
                                	$_SESSION['foto']=$check_usuario['FOTO_PERFIL'];
					            	$_SESSION['dni']=$check_usuario['DNI'];
					            	$_SESSION['nombre']=$check_usuario['NOMBRE'];
					            	$_SESSION['apellido']=$check_usuario['APELLIDO'];
                                	$_SESSION['sexo']=$check_usuario['SEXO'];
                                	$_SESSION['estadoCivil']=$check_usuario['ESTADO_CIVIL'];
                                	$_SESSION['direccion']=$check_usuario['DIRECCION'];
                                	$_SESSION['correo']=$check_usuario['CORREO'];
                                	$_SESSION['profesion']=$check_usuario['PROFESION'];
                                	$_SESSION['cv']=$check_usuario['CURRICULUM'];
                                	$_SESSION['infoAdicional']=$check_usuario['INFO_ADICIONAL'];
                                	$_SESSION['numTelefonico']=$check_usuario['NUM_TELEFONICO'];
                                	$_SESSION['usuario']=$check_usuario['USUARIO'];
                                	$_SESSION['twitter']=$check_usuario['S_TWITTER'];
                                	$_SESSION['facebook']=$check_usuario['S_FACEBOOK'];
                                	$_SESSION['instagram']=$check_usuario['S_INSTAGRAM'];
                                	$_SESSION['linkedin']=$check_usuario['S_LINKEDIN'];
                                	$_SESSION['idEmpresa']=$check_usuario['ID_EMPRESA'];
                                	$_SESSION['idEquipo']=$check_usuario['ID_EQUITO'];					           
                                	#de la base de datos los roles vienen en numeros, entonces se hace una consulta para obtener el nombre del rol
                                	// Obtener el nombre del rol
                                	$check_rol = $this->ejecutarConsulta("SELECT DESCRIPCION FROM roles WHERE ID_ROL='$check_usuario[ID_ROL]'");
                                	$check_rol = $check_rol->fetch();
                                	$_SESSION['idRol'] = $check_rol['DESCRIPCION']; // Esta línea asigna la descripción del rol
        
									if($_SESSION['idRol']=="Cliente"){
										if(headers_sent()){
											echo "<script> window.location.href='".APP_URL."dashboard/'; </script>";
											}else{
											header("Location: ".APP_URL."dashboard/");
											}					            		
									}elseif($_SESSION['idRol']=="Administrador"){
					            		if(headers_sent()){
											echo "<script> window.location.href='".APP_URL."admin/'; </script>";
											}else{
											header("Location: ".APP_URL."admin/");
											}
									}elseif($_SESSION['idRol']=="Asesor"){
										if(headers_sent()){
											echo "<script> window.location.href='".APP_URL."dashboarAS/'; </script>";
										}else{
											header("Location: ".APP_URL."dashboarAS/");
										}
									}else{
										if(headers_sent()){
											echo "<script> window.location.href='".APP_URL."login/'; </script>";
										}else{
											header("Location: ".APP_URL."login/");
										}
									}	

					    		}else{
					    			echo "<script>
							    	    Swal.fire({
										  icon: 'error',
										  title: 'Ocurrió un error inesperado',
										  text: 'Usuario o clave incorrectos'
										});
									</script>";
					    		}
							}else{
								echo "<script>
							        Swal.fire({
									  icon: 'error',
									  title: 'Ocurrió un error inesperado',
									  text: 'El rol del usuario no está activo'
									});
								</script>";
							}
					    }else{
					        echo "<script>
						        Swal.fire({
								  icon: 'error',
								  title: 'Ocurrió un error inesperado',
								  text: 'Usuario o clave incorrectos'
								});
							</script>";
					    }
				    }
			    }
		    }
		}
	

		/*----------  Controlador cerrar sesion  ----------*/
		public function cerrarSesionControlador(){

			session_destroy();

		    if(headers_sent()){
                echo "<script> window.location.href='".APP_URL."login/'; </script>";
            }else{
                header("Location: ".APP_URL."login/");
            }
		}

	}

?>
