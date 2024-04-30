<?php
namespace App\Controllers;
use app\models\promotionsModel;

class promotionsController extends promotionsModel{
public function listarPromotionsControlador(){
    $tabla="";
    $consulta_datos="SELECT * FROM PROMOCIONES WHERE ESTADO='Activo' ORDER BY FECHA_CREACION DESC";
    $consulta_total="SELECT COUNT(ID_PROMOCION) FROM PROMOCIONES WHERE ESTADO='Activo'";    

    $datos = $this->ejecutarConsulta($consulta_datos);
    $datos = $datos->fetchAll();
    $total = $this->ejecutarConsulta($consulta_total);
    $total = (int) $total->fetchColumn();
    if($total==0){
        echo '<div class="alert alert-warning" role="alert">
                    No hay promociones activas registradas
               </div>';
    }else{

        $tabla.='<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead>
                <tr>
                <th>#<span class="icon-arrow"></th>
                <th>Portada<span class="icon-arrow"></th>
                <th>Titulo<span class="icon-arrow"></th>
                <th>Precio<span class="icon-arrow"></th>
                <th>Inicio de Promocion<span class="icon-arrow"></th>
                <th>Fin de promocion<span class="icon-arrow"></th>
                <th>Fecha de Creación<span class="icon-arrow"></th> 
                <th>Fecha de Modificación<span class="icon-arrow"></th>   
                <th>Fecha de Eliminación<span class="icon-arrow"></th>    
                <th>Fecha de Restauración<span class="icon-arrow"></th>                 
                <th>Estado Promoción<span class="icon-arrow"></th>
                <th>Estado<span class="icon-arrow"></th>
                <th>Accion<span class="icon-arrow"></th>
                </tr>
            </thead>
            <tbody>';
            $contador=+1;
            foreach($datos as $rows){
                $fechamod="";
                $fechaelim="";
                $fecharestau="";
                if($rows['FECHA_MODIFICACION']==NULL AND $rows['FECHA_ELIMINACION']==NULL AND $rows['FECHA_RESTAURACION']==NULL){
                    $fechamod="";
                    $fechaelim="";
                    $fecharestau="";
                }else{
                    if($rows['FECHA_MODIFICACION']!=NULL){
                        $fechamod=date("d-m-Y  h:i:s A", strtotime($rows['FECHA_MODIFICACION']));
                    }
                    if($rows['FECHA_ELIMINACION']!=NULL){
                        $fechaelim=date("d-m-Y  h:i:s A", strtotime($rows['FECHA_ELIMINACION']));
                    }
                    if($rows['FECHA_RESTAURACION']!=NULL){
                        $fecharestau=date("d-m-Y  h:i:s A", strtotime($rows['FECHA_RESTAURACION']));
                    }
                }
                $estadoStyle = "";
                if($rows['ESTADO'] == "Activo"){
                    $estadoStyle = "color: green;";
                }else if($rows['ESTADO'] == "Inactivo"){
                    $estadoStyle = "color: red;";
                }

            $tabla.='
                <tr>
                    <td>'.$contador.'</td>
                    <td><img src="'.APP_URL.'/app/views/assets/imagenes/promotions/'.$rows['FOTO_PROMOCION'].'" width="50" height="50"></td>
                    <td>'.$rows['TITULO'].'</td>
                    <td>'.$rows['PRECIO'].'</td>
                    <td>'.($rows['FECHA_INICIO_PROMOCION'] ? date("d-m-Y  h:i:s A", strtotime($rows['FECHA_INICIO_PROMOCION'])) : '').'</td>
                    <td>'.($rows['FECHA_FIN_PROMOCION'] ? date("d-m-Y  h:i:s A", strtotime($rows['FECHA_FIN_PROMOCION'])) : '').'</td> 
                    <td>'.($rows['FECHA_CREACION'] ? date("d-m-Y  h:i:s A", strtotime($rows['FECHA_CREACION'])) : '').'</td>
                    <td>'.$fechamod.'</td>                   
                    <td>'.$fechaelim.'</td>
                    <td>'.$fecharestau.'</td>
                    <td>' . $rows['ESTADO_PROMO'] . '</td>  
                    <td>' . $rows['ESTADO'] . '</td>                                        
                    <td>
                        <a href="'.APP_URL.'DetailsPromotions/'.$rows['ID_PROMOCION'].'/" class="btn btn-warning"><i class="bi bi-eye"></i> Ver más</a>                        
                    </td>
                </tr>';
            $contador++;
            }
             $pag_final=$contador-1;
    
            $tabla.='</tbody></table>';   
    

            return $tabla;
        }
}

public function listarpromotionsINACTIVOControlador(){

    $tabla="";
        $consulta_datos="SELECT * FROM PROMOCIONES WHERE ESTADO='Inactivo' ORDER BY FECHA_CREACION ASC";
        $consulta_total="SELECT COUNT(ID_PROMOCION) FROM PROMOCIONES WHERE ESTADO='Inactivo'";    

    $datos = $this->ejecutarConsulta($consulta_datos);
    $datos = $datos->fetchAll();
    $total = $this->ejecutarConsulta($consulta_total);
    $total = (int) $total->fetchColumn();
    if($total==0){
        echo '<div class="alert alert-warning" role="alert">
                    No hay promociones activas registradas
               </div>';
    }else{

        $tabla.='<table id="example2" class="table table-striped nowrap" style="width:100%">
            <thead>
                <tr>
                <th>#<span class="icon-arrow"></th>
                <th>Portada<span class="icon-arrow"></th>
                <th>Titulo<span class="icon-arrow"></th>
                <th>Fecha de Eliminación<span class="icon-arrow"></th>
                <th>Accion<span class="icon-arrow"></th>
                </tr>
            </thead>
            <tbody>';
            $contador=+1;
            foreach($datos as $rows){
                if($rows['FECHA_ELIMINACION']==NULL){
                    $fechaelim="";                   
                }else{                    
                    if($rows['FECHA_ELIMINACION']!=NULL){
                        $fechaelim=date("d-m-Y  h:i:s A", strtotime($rows['FECHA_ELIMINACION']));
                    }
                }
            $tabla.='
                <tr>
                    <td>'.$contador.'</td>
                    <td><img src="'.APP_URL.'/app/views/assets/imagenes/promotions/'.$rows['FOTO_PROMOCION'].'" width="50" height="50"></td>
                    <td>'.$rows['TITULO'].'</td>               
                    <td>'.$fechaelim.'</td>                                       
                    <td>
                        <a href="'.APP_URL.'DetailsPromotions/'.$rows['ID_PROMOCION'].'/" class="btn btn-warning"><i class="bi bi-eye"></i> Ver más</a>                        
                    </td>
                </tr>';
            $contador++;
            }
             $pag_final=$contador-1;
    
            $tabla.='</tbody></table>';   
    

            return $tabla;
        }
}

public function listaServicios(){
    $consulta = "SELECT * FROM servicios";
    $resultados = $this->index($consulta);
    return $resultados;
 
}

public function ListarPromotionsInactivos(){
    $consulta = "SELECT * FROM promociones WHERE ESTADO='Inactivo'";
    $resultados = $this->index($consulta);
    return $resultados;
 
}

public function listarPromotionsDetails($ID){
    $consulta = "SELECT * FROM promociones where ID_PROMOCION='$ID'";
    $resultados = $this->index($consulta);
    return $resultados;
 
}

public function insertarPromotionsControlador() {
   // Almacenamos los datos que vienen del formulario en un array
 $titulo_promotion = $this->limpiarCadena($_POST['titulo_promocion']);
 $precio_promocion = $this->limpiarCadena($_POST['precio_promocion']);
 $acercade_promotion = $this->limpiarCadena($_POST['acerca_promocion']);
 $fecha_inicio_promotion = $this->limpiarCadena($_POST['fecha_inicio_promocion']);
 $fecha_fin_promotion = $this->limpiarCadena($_POST['fecha_fin_promocion']);
 $serviciop = $this->limpiarCadena($_POST['servicio']);

 //VALIDAMOS LOS CAMPOS OBLIGATORIOS
 $camposobligatorios = [
    "titulo_promotion" => "Título de la promoción",
    "acercade_promotion" => "Acerca de la promoción",
    "fecha_inicio_promotion" => "Fecha de inicio de la promoción",
    "fecha_fin_promotion" => "Fecha del fin de la promoción",
    "serviciop" => "Servicio"
 ];
 $campos_faltantes = []; // Array para almacenar los campos faltantes
 foreach ($camposobligatorios as $campo=> $nombre_campo) {
    if (empty($$campo)) { // Verificar si el valor del campo está vacío
        $campos_faltantes[] = $nombre_campo; // Agregar el campo faltante al array       
    }
 }
 if (!empty($campos_faltantes)) {
    $alerta = [
        "tipo" => "simple",
        "titulo" => "Ocurrió un error inesperado",
        "texto" => "Todos los campos son obligatorios, los campos faltantes son: " . implode(', ', $campos_faltantes),
        "icono" => "error"
    ];
    return json_encode($alerta);
 }
    //validamos que no haya una promocion activa dirigida al mismo servicio
    $consulta = "SELECT * FROM PROMOCIONES WHERE ID_SERVICIO='$serviciop' AND ESTADO='Activo'AND ESTADO_PROMO='Vigente'";
    $resultados = $this->ejecutarConsulta($consulta);
    if($resultados->rowCount() > 0){
        $alerta = [
            "tipo" => "simple",
            "titulo" => "Ocurrió un error inesperado",
            "texto" => "Ya existe una promoción activa para el servicio seleccionado",
            "icono" => "error"
        ];
        return json_encode($alerta);
    }

    
    
    // Directorio de fotos
    $img_dir = "../views/assets/imagenes/promotions/";

    $formatosPermitidos = ["jpeg", "png", "jpg"];
    $alerta = [];

    // Definimos las variables para evitar advertencias de índices no definidos
    $foto1 = null;
    $foto2 = null;
    $foto3 = null;

    for ($i = 1; $i <= 3; $i++) {
        // Verificamos si se seleccionó una imagen
        if (!empty($_FILES['foto'.$i]['name'])) {
            $imagen = $_FILES['foto'.$i]['tmp_name'];
            $nombre_imagen = $_FILES['foto'.$i]['name'];
            $tipo_imagen = strtolower(pathinfo($nombre_imagen, PATHINFO_EXTENSION));
            $tamano_imagen = $_FILES['foto'.$i]['size'];

            // Verificamos si la imagen es permitida
            if (!in_array($tipo_imagen, $formatosPermitidos)) {
                $alerta = [
                    "tipo" => "simple",
                    "titulo" => "Ocurrió un error inesperado",
                    "texto" => "La imagen que ha seleccionado es de un formato no permitido",
                    "icono" => "error"
                ];
                return json_encode($alerta);
            }

            // Verificamos el tamaño de la imagen
            if (($tamano_imagen / 1024) > 5120) {
                $alerta = [
                    "tipo" => "simple",
                    "titulo" => "Ocurrió un error inesperado",
                    "texto" => "La imagen que ha seleccionado supera el peso permitido",
                    "icono" => "error"
                ];
                return json_encode($alerta);
            }

            // Nombre de la foto
            $foto = str_ireplace(" ", "_", $titulo_promotion) . "_" . rand(0, 100);

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

            // Moviendo imagen al directorio
            if (!move_uploaded_file($imagen, $img_dir . $foto)) {
                $alerta = [
                    "tipo" => "simple",
                    "titulo" => "Ocurrió un error inesperado",
                    "texto" => "No podemos subir la imagen al sistema en este momento",
                    "icono" => "error"
                ];
                return json_encode($alerta);
            }

            // Asignamos la foto a la variable correspondiente
            if ($i === 1) {
                $foto1 = $foto;
            } elseif ($i === 2) {
                $foto2 = $foto;
            } elseif ($i === 3) {
                $foto3 = $foto;
            }
        } else {
            // Si no se seleccionó una imagen, asignamos "promocion.png"
            if ($i === 1) {
                $foto1 = "promocion.png";
            } elseif ($i === 2) {
                $foto2 = "promocion.png";
            } elseif ($i === 3) {
                $foto3 = "promocion.png";
            }
        }
    }

    $datos = [
        "foto1" => $foto1,
        "foto2" => $foto2,
        "foto3" => $foto3,
        "titulo_promocion" => $titulo_promotion,
        "precio_promocion" => $precio_promocion,
        "acerca_promocion" => $acercade_promotion,
        "fecha_inicio_promocion" => $fecha_inicio_promotion,
        "fecha_fin_promocion" => $fecha_fin_promotion,
        "serviciop" => $serviciop
    ];

    #ahora si lo enviamos a la funcion insertarUsuario
    $response = $this->insertarPromotion($datos);

    if ($response > 0) {
        $alerta = [
            "tipo" => "limpiar",
            "titulo" => "Promoción registrada",
            "texto" => "La promoción ".$titulo_promotion." se registró con éxito",
            "icono" => "success"
        ];
    } else {
        // Eliminamos las imágenes si falla el registro
        if (isset($foto1) && is_file($img_dir.$foto1)) {
            chmod($img_dir.$foto1, 0777);
            unlink($img_dir.$foto1);
        }

        if (isset($foto2) && is_file($img_dir.$foto2)) {
            chmod($img_dir.$foto2, 0777);
            unlink($img_dir.$foto2);
        }

        if (isset($foto3) && is_file($img_dir.$foto3)) {
            chmod($img_dir.$foto3, 0777);
            unlink($img_dir.$foto3);
        }

        $alerta = [
            "tipo" => "simple",
            "titulo" => "Ocurrió un error inesperado",
            "texto" => "No se pudo registrar la promoción, por favor intente nuevamente",
            "icono" => "error"
        ];
    }

    return json_encode($alerta);
}

public function actualizarPromotionsControlador() {
    // Almacenamos los datos que vienen del formulario en un array
  $id=$this->limpiarCadena($_POST['id_promocion']);  
  $titulo_promotion = $this->limpiarCadena($_POST['titulo_promocion']);
  $precio_promocion = $this->limpiarCadena($_POST['precio_promocion']);
  $acercade_promotion = $this->limpiarCadena($_POST['acerca_promocion']);
  $fecha_inicio_promotion_update = $this->limpiarCadena($_POST['fecha_inicio_promocion']);
  $hora_inicio_promotion_update = $this->limpiarCadena($_POST['hora_inicio_promocion']);
  $fecha_fin_promotion_update = $this->limpiarCadena($_POST['fecha_fin_promocion']);
  $hora_fin_promotion_update = $this->limpiarCadena($_POST['hora_fin_promocion']);
  $fecha_inicio_promotion = $fecha_inicio_promotion_update.' '.$hora_inicio_promotion_update;
  $fecha_fin_promotion = $fecha_fin_promotion_update.' '.$hora_fin_promotion_update;
  $serviciop = $this->limpiarCadena($_POST['servicio']);
 
  //VALIDAMOS LOS CAMPOS OBLIGATORIOS
  $camposobligatorios = [
     "titulo_promotion" => "Título de la promoción",
     "acercade_promotion" => "Acerca de la promoción",
     "fecha_inicio_promotion" => "Fecha de inicio de la promoción",
     "fecha_fin_promotion" => "Fecha del fin de la promoción",
     "serviciop" => "Servicio"
  ];
  $campos_faltantes = []; // Array para almacenar los campos faltantes
  foreach ($camposobligatorios as $campo=> $nombre_campo) {
     if (empty($$campo)) { // Verificar si el valor del campo está vacío
         $campos_faltantes[] = $nombre_campo; // Agregar el campo faltante al array       
     }
  }
  if (!empty($campos_faltantes)) {
     $alerta = [
         "tipo" => "simple",
         "titulo" => "Ocurrió un error inesperado",
         "texto" => "Todos los campos son obligatorios, los campos faltantes son: " . implode(', ', $campos_faltantes),
         "icono" => "error"
     ];
     return json_encode($alerta);
  }
 
     
     
     // Directorio de fotos
     $img_dir = "../views/assets/imagenes/promotions/";
 
     $formatosPermitidos = ["jpeg", "png", "jpg"];
     $alerta = [];
 
     // Definimos las variables para evitar advertencias de índices no definidos
     $foto1 = null;
     $foto2 = null;
     $foto3 = null;
 
     for ($i = 1; $i <= 3; $i++) {
         // Verificamos si se seleccionó una imagen
         if (!empty($_FILES['foto'.$i]['name'])) {
             $imagen = $_FILES['foto'.$i]['tmp_name'];
             $nombre_imagen = $_FILES['foto'.$i]['name'];
             $tipo_imagen = strtolower(pathinfo($nombre_imagen, PATHINFO_EXTENSION));
             $tamano_imagen = $_FILES['foto'.$i]['size'];
 
             // Verificamos si la imagen es permitida
             if (!in_array($tipo_imagen, $formatosPermitidos)) {
                 $alerta = [
                     "tipo" => "simple",
                     "titulo" => "Ocurrió un error inesperado",
                     "texto" => "La imagen que ha seleccionado es de un formato no permitido",
                     "icono" => "error"
                 ];
                 return json_encode($alerta);
             }
 
             // Verificamos el tamaño de la imagen
             if (($tamano_imagen / 1024) > 5120) {
                 $alerta = [
                     "tipo" => "simple",
                     "titulo" => "Ocurrió un error inesperado",
                     "texto" => "La imagen que ha seleccionado supera el peso permitido",
                     "icono" => "error"
                 ];
                 return json_encode($alerta);
             }
 
             // Nombre de la foto
             $foto = str_ireplace(" ", "_", $titulo_promotion) . "_" . rand(0, 100);
 
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
 
             // Moviendo imagen al directorio
             if (!move_uploaded_file($imagen, $img_dir . $foto)) {
                 $alerta = [
                     "tipo" => "simple",
                     "titulo" => "Ocurrió un error inesperado",
                     "texto" => "No podemos subir la imagen al sistema en este momento",
                     "icono" => "error"
                 ];
                 return json_encode($alerta);
             }
 
             // Asignamos la foto a la variable correspondiente
             if ($i === 1) {
                 $foto1 = $foto;
             } elseif ($i === 2) {
                 $foto2 = $foto;
             } elseif ($i === 3) {
                 $foto3 = $foto;
             }
         } else {
             // buscamos el nombre de la imagen registrada en la base de datos
             $consulta_datos="SELECT * FROM PROMOCIONES WHERE ID_PROMOCION='$id'";
             $datos = $this->ejecutarConsulta($consulta_datos);
             $datos = $datos->fetchAll();
             foreach($datos as $row){
                if ($i === 1) {
                     $foto1 = $row['FOTO_PROMOCION'];;
                 } elseif ($i === 2) {
                     $foto2 = $row['FOTO2'];;
                 } elseif ($i === 3) {
                     $foto3 = $row['FOTO3'];;
                 }
             }   
             
         }
     }
 
     $datos = [
        "id"=>$id,
         "foto1" => $foto1,
         "foto2" => $foto2,
         "foto3" => $foto3,
         "titulo_promocion" => $titulo_promotion,
         "precio_promocion" => $precio_promocion,
         "acerca_promocion" => $acercade_promotion,
         "fecha_inicio_promocion" => $fecha_inicio_promotion,
         "fecha_fin_promocion" => $fecha_fin_promotion,
         "serviciop" => $serviciop
     ];
 
     #ahora si lo enviamos a la funcion insertarUsuario
     $response = $this->ActualizarPromotion($datos);
 
     if ($response > 0) {
         $alerta = [
             "tipo" => "limpiar",
             "titulo" => "Promoción Actualizada",
             "texto" => "La promoción".$titulo_promotion." se Actualizo con éxito",
             "icono" => "success"
         ];
     } else {
         // Eliminamos las imágenes si falla el registro
         if (isset($foto1) && is_file($img_dir.$foto1)) {
             chmod($img_dir.$foto1, 0777);
             unlink($img_dir.$foto1);
         }
 
         if (isset($foto2) && is_file($img_dir.$foto2)) {
             chmod($img_dir.$foto2, 0777);
             unlink($img_dir.$foto2);
         }
 
         if (isset($foto3) && is_file($img_dir.$foto3)) {
             chmod($img_dir.$foto3, 0777);
             unlink($img_dir.$foto3);
         }
 
         $alerta = [
             "tipo" => "simple",
             "titulo" => "Ocurrió un error inesperado",
             "texto" => "No se pudo registrar el Servicio, por favor intente nuevamente",
             "icono" => "error"
         ];
     }
 
     return json_encode($alerta);
 }
 

 public function bodyPromotionsController() {
    $tabla = "";
    $consulta_datos = "SELECT *, DATE(FECHA_INICIO_PROMOCION) AS fechaInicio, DATE(FECHA_FIN_PROMOCION) AS fechafin FROM PROMOCIONES WHERE ESTADO='Activo'";
    $datos = $this->ejecutarConsulta($consulta_datos);
    $datos = $datos->fetchAll();
    
    if($datos==null){
        $tabla.='<div class="alert alert-warning" role="alert">
                    No hay promociones activas registradas
               </div>';}else{
    // Inicia la cadena de $tabla con la estructura HTML deseada
    $tabla = '<div class="row portfolio-container" data-aos="fade-up">';

    $counter = 0; // Contador para llevar el seguimiento de los servicios

    foreach ($datos as $row) {
        if ($counter % 4 == 0 && $counter != 0) {            
            $tabla .= '';
        }
            $tabla .= '<div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <img src="'.APP_URL.'/app/views/assets/imagenes/promotions/'.$row['FOTO_PROMOCION'].'" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>'.$row['TITULO'].'</h4>
                                <p>INICIO: '.$row['fechaInicio'].'<br>
                                   FIN: '.$row['fechafin'].'</p>
                                <a href="'.APP_URL.'/app/views/assets/imagenes/promotions/'.$row['FOTO_PROMOCION'].'" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="'.$row['TITULO'].'"><i class="bx bx-plus"></i></a>
                                <a href="'.APP_URL.'promotionsDetails/'.$row['ID_PROMOCION'].'/" class="details-link" title="Mas detalles"><i class="bx bx-link"></i></a>
                            </div>
                        </div>';

        $counter++;
    }
               }
    // Cerrar la última fila
    $tabla .= '</div>';

    return $tabla;
}

public function bajaPromotionsControlador(){
    $id = $this->limpiarCadena($_POST['id_promocion']);
    $datos = [
        "id" => $id
    ];
    $response = $this->bajaPromotion($datos);
    if ($response > 0) {
        $alerta = [
            "tipo" => "bajaPromotions",
            "titulo" => "Promoción dada de baja",
            "texto" => "La promoción se ha dado de baja con éxito",
            "icono" => "success"
        ];
    } else {
        $alerta = [
            "tipo" => "simple",
            "titulo" => "Ocurrió un error inesperado",
            "texto" => "No se pudo dar de baja la promoción, por favor intente nuevamente",
            "icono" => "error"
        ];
    }
    return json_encode($alerta);
}

public function altaPromotionsControlador(){
    $id = $this->limpiarCadena($_POST['id_promocion']);
    $datos = [
        "id" => $id
    ];
    $response = $this->altaPromotion($datos);
    if ($response > 0) {
        $alerta = [
            "tipo" => "limpiar",
            "titulo" => "Promoción dada de alta",
            "texto" => "La promoción se ha dado de alta con éxito",
            "icono" => "success"
        ];
    } else {
        $alerta = [
            "tipo" => "simple",
            "titulo" => "Ocurrió un error inesperado",
            "texto" => "No se pudo dar de alta la promoción, por favor intente nuevamente",
            "icono" => "error"
        ];
    }
    return json_encode($alerta);
}	

public function bodyPromotionsDetailsController($id) {   
    $consulta_datos = "SELECT *, DATE_FORMAT(FECHA_INICIO_PROMOCION, '%d de %M de %Y') AS fechaInicio, DATE_FORMAT(FECHA_FIN_PROMOCION, '%d de %M de %Y') AS fechafin FROM PROMOCIONES WHERE ESTADO='Activo' AND ID_PROMOCION='$id'";
    $resultados = $this->index($consulta_datos);
    return $resultados;
}

public function consultaPromovigente($id){
    $consulta_datos = "SELECT S.ID_SERVICIO, S.PORTADA_SERVICIO, S.NOMBRE_SERVICIO, S.DESCRIPCION, S.PRECIO AS PRECIOSERVICIO, S.FECHA_CREACION, S.FECHA_ELIMINACION, S.ESTADO AS ESTADOSERVICIO, S.ID_EMPRESA, P.ID_PROMOCION,P.ESTADO AS ESTADOP, P.ESTADO_PROMO AS ESTADOPROMO, P.PRECIO AS PRECIOPROMO 
    FROM servicios S LEFT JOIN PROMOCIONES P ON S.ID_SERVICIO = P.ID_SERVICIO WHERE P.ESTADO_PROMO ='Vigente' AND S.ID_SERVICIO='$id'";
    $resultados = $this->index($consulta_datos);
    return $resultados;
}

}

?>