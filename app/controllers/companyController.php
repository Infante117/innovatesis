<?php
namespace App\Controllers;
use app\models\companyModel;

class companyController extends companyModel{

/*::::::::::::___FUNCION LISTAR DE DATOS DE LA EMPRESA __:::::::::::::*/
public function ListarEmpresaController() {
    $tabla = "";
    $consulta_datos = "SELECT * FROM empresa";
    $datos = $this->ejecutarConsulta($consulta_datos);
    $datos = $datos->fetchAll();
    $tabla .= '';    
    foreach ($datos as $row) {
        $roluser = $_SESSION['idRol'];
        $boton='';
        if($roluser != "Asesor"){
            $boton = '<a href="'.APP_URL.'companyUpdate/'.$row['ID_EMPRESA'].'/" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Editar</a>';  
        }else{
            $boton = '';
        }
        
        $tabla .= '<div class="container emp-profile">    
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="../app/views/assets/imagenes/empresa/'.$row['LOGO_EMPRESA'].'"  alt="" width="180" height="180" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5></h5>
                        <h6></h6>
                        <p class="proile-rating">Ruc : <span>'.$row['RUC'].'</span></p>
                        <p>'.$row['RAZON_SOCIAL'].'</p>                    
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" aria-controls="home" aria-selected="true">Acerca de</a>
                            </li>
                        </ul>                    
                        <p>'.$row['ACERCADE'].'</p>     
                    </div>
                </div>            
                <div class="col-md-2">
                    <!--<a href="'.APP_URL.'companyUpdate/'.$row['ID_EMPRESA'].'/" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Editar</a>-->
                    '.$boton.'
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <p>Enlaces de La empresa</p>
                        <p>
                            <i class="bu bi-tiktok"><a href="'.$row['S_TIKTOK'].'" target="_blank"> Tiktok</a></i><br />
                            <i class="bu bi-linkedin"><a href="'.$row['S_LINKEDIN'].'" target="_blank"> Linkedin</a></i><br />
                            <i class="bu bi-instagram"><a href="'.$row['S_INSTAGRAM'].'" target="_blank"> Instagram</a></i><br />
                            <i class="bu bi-facebook"><a href="'.$row['S_FACEBOOK'].'" target="_blank"> Facebook</a></i><br />
                            <i class="bu bi-youtube"><a href="'.$row['S_YOUTUBE'].'" target="_blank"> Youtube</a></i><br />
                        </p>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>ACTIVIDAD ECONOMICA</label>
                                </div>
                                <div class="col-md-8">
                                    <p>'.$row['ACTIVIDAD_ECONOMICA'].'</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Telefono</label>
                                </div>
                                <div class="col-md-8">
                                    <p>'.$row['TELEFONO'].'</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Direccion</label>
                                </div>
                                <div class="col-md-8">
                                    <p>'.$row['DIRECCION'].'</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Correo</label>
                                </div>
                                <div class="col-md-8">
                                    <p>'.$row['CORREO'].'</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Estado</label>
                                </div>
                                <div class="col-md-8">
                                    <p>'.$row['ESTADO'].'</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    }

    return $tabla;
}


public function ListarEmpresaControllerFooter() {
    $tabla = "";
    $consulta_datos = "SELECT * FROM empresa";
    $datos = $this->ejecutarConsulta($consulta_datos);
    $datos = $datos->fetchAll();
    $tabla .= '';

    foreach ($datos as $row) { // Corregir $rows a $row
        $tabla .= '<div class="col-lg-3 col-md-6 footer-contact">
                        <h3>'.$row['RAZON_SOCIAL'].'</h3>
                        <p>'.$row['DIRECCION'].'<br><br>
                        <strong>Telefono:</strong>'.$row['TELEFONO'].'<br>
                        <strong>Correo:</strong> '.$row['CORREO'].'<br>
                        </p>
                        </div>';
    }

    return $tabla;
}

public function ListarEmpresaControllerheader() {
    $tabla = "";
    $consulta_datos = "SELECT * FROM empresa";
    $datos = $this->ejecutarConsulta($consulta_datos);
    $datos = $datos->fetchAll();
    $tabla .= '';

    foreach ($datos as $row) { // Corregir $rows a $row
        $tabla .= '
        <div class="header-social-links d-flex">
            <a href="'.$row['S_TIKTOK'].'" class="tiktok" target="_blank"><i class="bu bi-tiktok"></i></a>
            <a href="'.$row['S_FACEBOOK'].'" class="facebook" target="_blank"><i class="bu bi-facebook"></i></a>
            <a href="'.$row['S_INSTAGRAM'].'" class="instagram" target="_blank"><i class="bu bi-instagram"></i></a>
            <a href="'.$row['S_LINKEDIN'].'" class="linkedin" target="_blank"><i class="bu bi-linkedin"></i></i></a>            
            <div class="header-social-links d-flex"> 
                <div class="circle">
                    <div class="lines"></div>
                        <a href="'.APP_URL.'login/" class="icon-person" title="Iniciar Sesión"><i class="bu bi-person-fill-add"></i></a> 
                </div>               
            </div>
        </div>
        

       
        ';
    }

    return $tabla;
}

public function ListarEmpresaControllerContact() {
    $tabla = "";
    $consulta_datos = "SELECT * FROM empresa";
    $datos = $this->ejecutarConsulta($consulta_datos);
    $datos = $datos->fetchAll();
    $tabla .= '';

    foreach ($datos as $row) { 
        $tabla .= '<div class="info-wrap">
        <div class="row">
          <div class="col-lg-4 info">
            <i class="bi bi-geo-alt"></i>
            <h4>Ubicación:</h4>
            <p>'.$row['DIRECCION'].'</p>
          </div>

          <div class="col-lg-4 info mt-4 mt-lg-0">
            <i class="bi bi-envelope"></i>
            <h4>Email:</h4>
            <p>'.$row['CORREO'].'</p>
          </div>

          <div class="col-lg-4 info mt-4 mt-lg-0">
            <i class="bi bi-phone"></i>
            <h4>Teléfono:</h4>
            <p>'.$row['TELEFONO'].'</p>
          </div>
        </div>
      </div>';
    }
    return $tabla;
}

public function companyUpdate($id) {
 $consulta = "SELECT*FROM empresa WHERE ID_EMPRESA = $id";
 $resultados = $this->index($consulta);

 return $resultados;
}

public function AboutEmpresaController() {
    $tabla = "";
    $consulta_datos = "SELECT * FROM empresa";
    $datos = $this->ejecutarConsulta($consulta_datos);
    $datos = $datos->fetchAll();
    $tabla .= '';

    foreach ($datos as $row) { 
        #crearemos una lista con las actividades que se realizan en la empresa dicha informacion viene separada por comas
        $detalles_lista = explode(',', $row['DETALLES']);
        $detalles_l = '<li><i class="ri-check-double-line"></i>' . implode('</li><li><i class="ri-check-double-line"></i>', $detalles_lista) . '</li>';
        $tabla .= '
        <section id="about-us" class="about-us">
            <div class="container" data-aos="fade-up">
              <div class="row content">
                  <div class="col-lg-6" data-aos="fade-right">
                    <h2>'.$row['RAZON_SOCIAL'].'</h2>
                    <h3>'.$row['ESLOGAN'].'</h3>
                  </div>
                  <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
                  <p>
                  '.$row['ACERCADE'].'
                  </p>
                  <ul>
                  '.$detalles_l.'
                  </ul>
                </div>
              </div>
      
            </div>
          </section>
           ';
    }

    return $tabla;
}

public function actualizarCompanyControlador() {
 $id = $this->limpiarCadena($_POST['id_empresa']);
 $RAZON_SOCIAL = $this->limpiarCadena($_POST['form_razon_social']);
 $ACERCADE = $this->limpiarCadena($_POST['form_acercaDe']);
 $ACTIVIDAD_ECONOMICA = $this->limpiarCadena($_POST['form_ActividadEco']);
 $DIRECCION = $this->limpiarCadena($_POST['form_direccion']);
 $TELEFONO = $this->limpiarCadena($_POST['form_telefono']);
 $E_CORREO = $this->limpiarCadena($_POST['form_correo']);
 $S_FACEBOOK = $this->limpiarCadena($_POST['form_s_facebook']);
 $S_INSTAGRAM = $this->limpiarCadena($_POST['form_s_instagram']);
 $S_LINKEDIN = $this->limpiarCadena($_POST['form_s_linkedin']);
 $S_TIKTOK = $this->limpiarCadena($_POST['form_s_tiktok']);
 $S_YOUTUBE = $this->limpiarCadena($_POST['form_s_youtube']);


 // Verificamos los campos obligatorios
 $camposObligatorios = ["RAZON_SOCIAL", "ACTIVIDAD_ECONOMICA", "DIRECCION", "TELEFONO", "E_CORREO"];
 foreach ($camposObligatorios as $campo) {
 if (empty($$campo)) {
        $alerta =["tipo"=>"simple",
                    "titulo"=> "Ocurrió un error inesperado",
                    "texto"=> "No has llenado todos los campos obligatorios",
                    "icono"=> "error"];
                    return json_encode($alerta);
                    exit();
                 }
 }

    // Verificamos la integridad de los datos
 $verificaciones = [
    ["^[^<>]{0,9999}$", $ACTIVIDAD_ECONOMICA, "La Actividad Economica no coincide con el formato solicitado"],
    ["^[^<>]{0,9999}$", $RAZON_SOCIAL, "La Razón Social no coincide con el formato solicitado"],
    ["^[^<>]{3,50}$", $DIRECCION, "La dirección no coincide con el formato solicitado"],
    ["^[0-9]{9}$", $TELEFONO, "El teléfono no coincide con el formato solicitado"],
 ];

 foreach ($verificaciones as list($patron, $valor, $mensajeError)) {
 if ($this->verificarDatos($patron, $valor)) {
 $alerta =["tipo"=>"simple",
            "titulo"=> "Ocurrió un error inesperado",
            "texto"=> $mensajeError,
            "icono"=> "error"];
            return json_encode($alerta);
            exit();
    }
    }

    // Directorio de fotos
    $img_dir = "../views/assets/imagenes/empresa/";

    // Verificamos si seleccionó una imagen
    if ($_FILES['form_logoEmpresa']['name'] != "" && $_FILES['form_logoEmpresa']['size'] > 0) {
    // Creando directorio
    if (!file_exists($img_dir) && !mkdir($img_dir, 0777)) {
            $alerta =["tipo"=>"simple",
                    "titulo"=> "Ocurrió un error inesperado",
                    "texto"=> "Error al crear el directorio",
                    "icono"=>"error"];
                    return json_encode($alerta);
                    exit();
        }

        $formatosPermitidos = ["jpeg", "png", "jpg"];
        $imagen = $_FILES['form_logoEmpresa']['tmp_name'];
        $nombre_imagen = $_FILES['form_logoEmpresa']['name'];
        $tipo_imagen = strtolower(pathinfo($nombre_imagen, PATHINFO_EXTENSION)); // Corregido el error de escritura en strtolower
        $tamano_imagen = $_FILES['form_logoEmpresa']['size'];

 // Validamos si la imagen es permitida
    if (!in_array($tipo_imagen, $formatosPermitidos)) { // Corregido la verificación de la extensión del archivo
    $alerta = [
        "tipo" => "simple",
        "titulo" => "Ocurrió un error inesperado",
        "texto" => "La imagen que ha seleccionado es de un formato no permitido",
        "icono" => "error"
    ];
    echo json_encode($alerta); // Usamos echo en lugar de return para imprimir el JSON
    exit();
    }

 // Verificando peso de la imagen
    if (($tamano_imagen / 1024) > 5120) {
    $alerta =["tipo"=>"simple",
    "titulo"=> "Ocurrió un error inesperado",
    "texto"=> "La imagen que ha seleccionado supera el peso permitido",
    "icono"=> "error"];
    return json_encode($alerta);
    exit();
    }

 // Nombre de la foto
    $foto = str_ireplace(" ", "_", $RAZON_SOCIAL) . "_" . rand(0, 100);

 // Extensión de la imagen
  switch ($tipo_imagen) {
    case 'jpeg':
    case 'jpg':
        $foto .= ".jpg";
        break;
    case 'png':
        $foto .= ".png";
        break;
  }

 chmod($img_dir, 0755);

 // Moviendo imagen al directorio
    if (!move_uploaded_file($_FILES['form_logoEmpresa']['tmp_name'], $img_dir . $foto)) {
    $alerta =["tipo"=>"simple",
    "titulo"=> "Ocurrió un error inesperado",
    "texto"=> "No podemos subir la imagen al sistema en este momento",
    "icono"=> "error"];
    return json_encode($alerta);
    exit();
    }
    } else {
 #aqui se debe de obtener la foto actual del usuario registrado en la base de datos
 # consultamos la foto actual del usuario y lo almacenamos en una variable
 #consultamos en la base de datos
    $consulta = "SELECT LOGO_EMPRESA FROM EMPRESA WHERE ID_EMPRESA = $id";
    $resultados = $this->index($consulta);
    $foto = $resultados[0]['LOGO_EMPRESA'];

    }

    $datos = array(
    "E_IDEMP"=> $id,
    "E_LOGO"=> $foto,    
    "E_RAZONSOCIAL"=> $RAZON_SOCIAL,
    "E_ACTIVIDADECONOMICA"=> $ACTIVIDAD_ECONOMICA,
    "E_ACERCADE"=> $ACERCADE,
    "E_DIRECCION"=> $DIRECCION,
    "E_TELEFONO"=> $TELEFONO,
    "E_CORREO"=> $E_CORREO,    
    "E_SFACEBOOK"=> $S_FACEBOOK,
    "E_SINSTAGRAM"=> $S_INSTAGRAM,
    "E_SLINKEDIN"=> $S_LINKEDIN,    
    "E_STIKTOK"=> $S_TIKTOK,
    "E_SYOUTUBE"=> $S_YOUTUBE);

 #ahora si lo enviamos a la funcion insertarUsuario

    $response = $this->actualizarEmpresa($datos);

    if($response>0){
    $alerta=[
    "tipo"=>"limpiarCompany",
    "titulo"=>"Empresa Actualizada",
    "texto"=>"Los Datos de la Empresa".$RAZON_SOCIAL." se Actualizaron con exito",
    "icono"=>"success"
    ];

    }else{

    if(is_file($img_dir.$foto)){
    chmod($img_dir.$foto,0777);
    unlink($img_dir.$foto);
    }

    $alerta=[
    "tipo"=>"simple",
    "titulo"=>"Ocurrió un error inesperado",
    "texto"=>"No se pudo Actualizar los datos de la empresa, por favor intente nuevamente",
    "icono"=>"error"
    ];
    }

    return json_encode($alerta);
}

}    ?>