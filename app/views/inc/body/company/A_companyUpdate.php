<?php
    require_once "app/controllers/companyController.php";

    use app\controllers\companyController;
    // Crea una instancia de usuarioController
    $controller = new companyController();
    // Obtiene la URL actual
    $url = urldecode($_SERVER['REQUEST_URI']);
    // Divide la URL por las barras y filtra elementos vacíos
    $urlParts = array_filter(explode("/", $url));
    // Verifica si hay un segmento "updateUser" en la URL 
    $updateCompanyIndex = array_search("companyUpdate", $urlParts);

    if ($updateCompanyIndex !== false && isset($urlParts[$updateCompanyIndex + 1])) {
    // El ID del usuario estaría en la posición siguiente al "updateUser" en la URL
    $id = $urlParts[$updateCompanyIndex + 1];
   
    $company = $controller->companyUpdate($id);
    $company_json = json_encode($company);
    if (!empty($company)) {
        $LOGO_EMPRESA = $company[0]['LOGO_EMPRESA'];
        $RUC = $company[0]['RUC'];
        $RAZON_SOCIAL = $company[0]['RAZON_SOCIAL'];
        $ACTIVIDAD_ECONOMICA = $company[0]['ACTIVIDAD_ECONOMICA'];
        $ACERCADE = $company[0]['ACERCADE'];
        $DIRECCION = $company[0]['DIRECCION'];
        $TELEFONO = $company[0]['TELEFONO'];
        $CORREO = $company[0]['CORREO'];
        $S_FACEBOOK = $company[0]['S_FACEBOOK'];
        $S_INSTAGRAM = $company[0]['S_INSTAGRAM'];
        $S_LINKEDIN = $company[0]['S_LINKEDIN'];
        $S_TIKTOK = $company[0]['S_TIKTOK'];
        $S_YOUTUBE = $company[0]['S_YOUTUBE'];
    }else{
       #mostramos las variable vacias para que no muestre error
       $LOGO_EMPRESA = "";
       $RUC = "";
       $RAZON_SOCIAL = "";
       $ACTIVIDAD_ECONOMICA = "";
       $ACERCADE = "";
       $DIRECCION = "";
       $TELEFONO = "";
       $CORREO = "";
       $S_FACEBOOK = "";
       $S_INSTAGRAM = "";
       $S_LINKEDIN = "";
       $S_TIKTOK = "";
       $S_YOUTUBE = "";
       #mostramos una alerta en sweetalert, si no se encuentra el usuario, redirigimos a la pagina de usuarios
         echo "<script>
            Swal.fire({
                title: 'Error',
                text: 'La empresa no existe, en la base de Datos',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            }).then(function() {
                window.location = 'http://localhost/www.innovatesisperu.com/ACompany/';
            });
        </script>"; 
    }
    } else {
    // Maneja la ausencia del ID en la URL
   echo "Error: No se proporcionó un parámetro 'url' en la URL.";
    
    }


?>

<div class="container emp-profile">
    <form action="<?php echo APP_URL; ?>app/ajax/companyAjax.php" method="POST" autocomplete="off"
        enctype="multipart/form-data" class="FormularioAjax">
        <input type="hidden" name="modulo_company" value="actualizar">
        <input type="hidden" name="id_empresa" id="id_empresa" value="<?php echo $id; ?>">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img id="profile-image"
                        src="<?php echo APP_URL; ?>app/views/assets/imagenes/empresa/<?php echo $LOGO_EMPRESA; ?>"
                        alt="" />
                    <div class="file btn btn-lg btn-primary">
                        Cambiar Logo
                        <input id="file-input" type="file" name="form_logoEmpresa" />
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <p class="proile-rating">Ruc : <span>
                            <?php echo $RUC; ?>
                        </span></p>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" aria-controls="home" aria-selected="true">Acerca de</a>
                        </li>
                    </ul>
                    <P><label class="form-label">ACTIVIDAD ECONÓMICA </label>
                        <textarea class="form-control bg-white border-1" name="form_ActividadEco"
                            value="<?php echo $ACTIVIDAD_ECONOMICA; ?>"><?php echo $ACTIVIDAD_ECONOMICA; ?></textarea>
                    </P>
                    <P><label class="form-label">ACERCA DE </label>
                        <textarea class="form-control bg-white border-1" name="form_acercaDe"
                            value="<?php echo $ACERCADE; ?>"><?php echo $ACERCADE; ?></textarea>
                    </P>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-work">
                    <p>Enlaces de La empresa</p>
                    <p>
                        <i class="bu bi-tiktok"> Tiktok <input type="text" class="form-control bg-white border-1"
                                name="form_s_tiktok" value="<?php echo $S_TIKTOK; ?>"></i><br />
                        <i class="bu bi-linkedin">
                            Linkedin <input type="text" class="form-control bg-white border-1" name="form_s_linkedin"
                                value="<?php echo $S_LINKEDIN; ?>"></i><br />
                        <i class="bu bi-instagram">
                            Instagram <input type="text" class="form-control bg-white border-1" name="form_s_instagram"
                                value="<?php echo $S_INSTAGRAM; ?>"></i><br />
                        <i class="bu bi-facebook">
                            Facebook <input type="text" class="form-control bg-white border-1" name="form_s_facebook"
                                value="<?php echo $S_FACEBOOK; ?>"></i><br />
                        <i class="bu bi-youtube"> Youtube <input type="text" class="form-control bg-white border-1"
                                name="form_s_youtube" value="<?php echo $S_YOUTUBE; ?>"></i><br />
                    </p>


                </div>
            </div>
            <div class="col-md-8">

                <div class="tab-content profile-tab" id="myTabContent">

                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                        <div class="row">
                            <div class="col-md-6">
                                <label>Razon Social</label>
                            </div>
                            <div class="col-md-6">
                                <p><input type="text" class="form-control bg-white border-1" name="form_razon_social"
                                        value="<?php echo $RAZON_SOCIAL; ?>"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Telefono</label>
                            </div>
                            <div class="col-md-6">
                                <p><input type="text" class="form-control bg-white border-1" name="form_telefono"
                                        value="<?php echo $TELEFONO; ?>"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Direccion</label>
                            </div>
                            <div class="col-md-6">
                                <p><input type="text" class="form-control bg-white border-1" name="form_direccion"
                                        value="<?php echo $DIRECCION; ?>"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Correo</label>
                            </div>
                            <div class="col-md-6">
                                <p><input type="text" class="form-control bg-white border-1" name="form_correo"
                                        value="<?php echo $CORREO; ?>"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary text-white w-100 py-3" class="btn btn-primary"
                type="submit"><i class="bi bi-pencil-square"></i> Actualizar</button>
        </div>
    </form>
</div>