<?php
#incluimos el sweetalert
#crearemos el controlador para el usuario
namespace App\Controllers;
use app\models\servicesModel;

class servicesController extends servicesModel{

public function listarServiciosInactivosController(){   
    $tabla="";
    $consulta_datos="SELECT * FROM servicios WHERE estado='Inactivo' ORDER BY FECHA_ELIMINACION DESC";
    $consulta_total="SELECT COUNT(ID_SERVICIO) FROM servicios";    

    $datos = $this->ejecutarConsulta($consulta_datos);
    $datos = $datos->fetchAll();
    $total = $this->ejecutarConsulta($consulta_total);
    $total = (int) $total->fetchColumn();
    if($total==0){
        echo '<div class="alert alert-warning" role="alert">
                    No hay registros en la base de datos
               </div>';
    }else{

        $tabla.='<div class="table-responsive">
        <table id="example2" class="table table-striped nowrap" style="width:100%">
            <thead>
                <tr>
                <th>#<span class="icon-arrow"></th>
                <th>Portada<span class="icon-arrow"></th>
                <th>Servicio<span class="icon-arrow"></th>               
                <th>Precio<span class="icon-arrow"></th>
                <th>Fecha de Eliminación<span class="icon-arrow"></th>
                <th>Acciones<span class="icon-arrow"></th>
                </tr>
            </thead>
            <tbody>';
            $contador = 1; // Inicializamos el contador
            foreach($datos as $rows){
                $fechaelimina="";
                if($rows['FECHA_ELIMINACION'] == NULL){                  
                    $fechaelimina="";
                }else{
                    if($rows['FECHA_ELIMINACION'] != NULL){
                        $fechaelimina=date("d-m-Y  h:i:s A",strtotime($rows['FECHA_ELIMINACION']));
                    }
                   }
            $tabla.='
                <tr>
                    <td>'.$contador.'</td>
                    <td><img src="'.APP_URL.'app/views/assets/imagenes/Services/'.$rows['PORTADA_SERVICIO'].'" width="50" height="50"></td>
                    <td>'.$rows['NOMBRE_SERVICIO'].'</td>                 
                    <td> S/.'.$rows['PRECIO'].'</td>                 
                    <td>'.$fechaelimina.'</td>                                      
                    <td>
                        <a href="'.APP_URL.'DetailService/'.$rows['ID_SERVICIO'].'/" class="btn btn-warning"><i class="bi bi-eye-fill"></i> ver más</a>                                         
                    </td>
                </tr>';
            $contador++; // Incrementamos el contador
            }
             $pag_final=$contador-1;
    
            $tabla.='</tbody></table></div>';   
    

            return $tabla;
        }
}

public function listarServiciosController(){   
    $tabla="";
    $consulta_datos="SELECT * FROM servicios WHERE ESTADO='Activo'
    ORDER BY 
    CASE 
      WHEN fecha_eliminacion IS NOT NULL THEN fecha_eliminacion  -- Ordenar servicios eliminados por fecha de eliminación ascendente
      ELSE '9999-12-31'  -- '9999-12-31' es una fecha muy lejana, por lo que los servicios activos se ordenarán al final de la lista
      END DESC,-- Ordenar servicios activos por fecha de eliminación descendente
    CASE 
      WHEN fecha_modificacion IS NOT NULL THEN fecha_modificacion -- Ordenar servicios modificados por fecha de modificación descendente
      ELSE '9999-12-31' -- '9999-12-31' es una fecha muy lejana, por lo que los servicios no modificados se ordenarán al final de la lista  
      END DESC,-- Ordenar servicios activos por fecha de modificación descendente
    CASE 
      WHEN fecha_eliminacion IS NULL THEN fecha_creacion  -- Ordenar servicios activos por fecha de creación descendente
      END DESC";#Ordenar servicios activos por fecha de creación descendente
    $consulta_total="SELECT COUNT(ID_SERVICIO) FROM SERVICIOS";    

    $datos = $this->ejecutarConsulta($consulta_datos);
    $datos = $datos->fetchAll();
    $total = $this->ejecutarConsulta($consulta_total);
    $total = (int) $total->fetchColumn();
    if($total==0){
        echo '<div class="alert alert-warning" role="alert">
                    No hay registros en la base de datos
               </div>';
    }else{

        $tabla.='<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead>
                <tr>
                <th>#<span class="icon-arrow"></th>
                <th>Portada<span class="icon-arrow"></th>
                <th>Servicio<span class="icon-arrow"></th>               
                <th>Precio<span class="icon-arrow"></th>
                <th>Fecha Creación<span class="icon-arrow"></th>
                <th>Fecha Modificación<span class="icon-arrow"></th>
                <th>Fecha de Eliminación<span class="icon-arrow"></th>
                <th>Fecha de Restauración<span class="icon-arrow"></th>
                <th>Estado<span class="icon-arrow"></th>
                <th>Acciones<span class="icon-arrow"></th>
                </tr>
            </thead>
            <tbody>';
            $contador = 1; // Inicializamos el contador
            foreach($datos as $rows){
                $fechamodi="";
                $fechaelimina="";
                $fecharestaura="";
                if($rows['FECHA_MODIFICACION'] == NULL AND $rows['FECHA_ELIMINACION'] == NULL AND $rows['FECHA_RESTAURACION'] == NULL){                  
                    $fechamodi="";
                    $fechaelimina="";
                    $fecharestaura="";
                }else{
                    if($rows['FECHA_MODIFICACION'] != NULL){
                        $fechamodi=date("d-m-Y  h:i:s A",strtotime($rows['FECHA_MODIFICACION']));
                    }
                    if($rows['FECHA_ELIMINACION'] != NULL){
                        $fechaelimina=date("d-m-Y  h:i:s A",strtotime($rows['FECHA_ELIMINACION']));
                    }
                    if($rows['FECHA_RESTAURACION'] != NULL){
                        $fecharestaura=date("d-m-Y  h:i:s A",strtotime($rows['FECHA_RESTAURACION']));
                    }
                }
            $tabla.='
                <tr>
                    <td>'.$contador.'</td>
                    <td><img src="'.APP_URL.'app/views/assets/imagenes/services/'.$rows['PORTADA_SERVICIO'].'" width="50" height="50"></td>
                    <td>'.$rows['NOMBRE_SERVICIO'].'</td>                 
                    <td> S/.'.$rows['PRECIO'].'</td>
                    <td>'.date("d-m-Y  h:i:s A",strtotime($rows['FECHA_CREACION'])).'</td>
                    <td>'.$fechamodi.'</td>                   
                    <td>'.$fechaelimina.'</td>
                    <td>'.$fecharestaura.'</td>
                    <td>'.$rows['ESTADO'].'</td>                                       
                    <td>
                        <a href="'.APP_URL.'DetailService/'.$rows['ID_SERVICIO'].'/" class="btn btn-warning"><i class="bi bi-eye-fill"></i> ver más</a>                        
                    </td>
                </tr>';
            $contador++; // Incrementamos el contador
            }
             $pag_final=$contador-1;
    
            $tabla.='</tbody></table>';   
    

            return $tabla;
        }
}

public function ListarServiciosInactivos(){
    $consulta_datos="SELECT * FROM servicios WHERE estado='Inactivo'";
    $resultados = $this->index($consulta_datos);
    return $resultados;
}

public function ListarServiciosControllerTotal() {
    $tabla = '<div class="row">';
    $consulta_datos = "SELECT S.ID_SERVICIO, S.PORTADA_SERVICIO, S.NOMBRE_SERVICIO, S.DESCRIPCION, S.PRECIO AS PRECIOSERVICIO, S.FECHA_CREACION, S.FECHA_ELIMINACION, S.ESTADO AS ESTADOSERVICIO, S.ID_EMPRESA, P.ID_PROMOCION,P.ESTADO AS ESTADOP, P.ESTADO_PROMO AS ESTADOPROMO, P.PRECIO AS PRECIOPROMO 
    FROM servicios S LEFT JOIN PROMOCIONES P ON S.ID_SERVICIO = P.ID_SERVICIO AND P.ESTADO_PROMO = 'Vigente' WHERE S.ESTADO='ACTIVO' GROUP BY S.ID_SERVICIO ORDER BY S.NOMBRE_SERVICIO ASC";
    $datos_result = $this->ejecutarConsulta($consulta_datos);
    $datos = $datos_result->fetchAll();
    $counter = 0; // Contador para llevar el seguimiento de los servicios
    if($datos==null){
        $tabla = '<div class="alert alert-warning" role="alert">
                    No hay registros en la base de datos
               </div>';
    }else{
    foreach ($datos as $row) {
        // Si el contador es múltiplo de 4, cerrar la fila actual y abrir una nueva
        if ($counter % 4 == 0 && $counter > 0) {
            $tabla .= '</div><div class="row">';
        }

        $descripcion_lista = explode('.', rtrim($row['DESCRIPCION'], '.'));//CREAMOS UNA LISTA CON LOS DATOS QUE VIENEN SEPARADOS POR UN PUNTO, PERO EXCLUIMOS EL ULTIMO PUNTO
        
        $descripcion_format = '';
        foreach ($descripcion_lista as $descripcion) {
            $descripcion_format .= '<i class="bi bi-check2"></i>' . $descripcion . '<br>';           
        }

        $precioActualizado='';
        $avanzado = '';
        if($row['ID_PROMOCION'] !== null) :
            if($row['ESTADOPROMO'] == 'Vigente' and $row['ESTADOP'] == 'Activo') :
                $avanzado = '<span class="advanced">Promoción</span>';
                $precioActualizado = '<h6><span>Antes </span><sup>$</sup><span class="original-price">'.$row['PRECIOSERVICIO'].'</span></h6>
                                      <h4><span>Ahora </span><sup>$</sup>'.$row['PRECIOPROMO'].'</h4>';
            else :
                $avanzado = '';
                $precioActualizado = '<h4><sup>$</sup>'.$row['PRECIOSERVICIO'].'</h4>';
            endif;
        else:
            $avanzado = '';
            $precioActualizado = '<h4><sup>$</sup>'.$row['PRECIOSERVICIO'].'</h4>';    
        endif;

        $tabla .= '
            <div class="col-lg-3 col-md-6">
                <div class="box">
                    '.$avanzado.'
                    <h3>'.$row['NOMBRE_SERVICIO'].'</h3>
                    '.$precioActualizado.'
                    '.$descripcion_format.'
                    <div class="btn-wrap">
                        <!--<a href="'.APP_URL.'infoService/'.$row['ID_SERVICIO'].'/" class="btn-buy"><i class="bi bi-eye-fill"></i> ver más</a> -->  
                        <button type="button"  class="btn-buy" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" data-id="'.$row['ID_SERVICIO'].'" data-servis="'.$row['NOMBRE_SERVICIO'].'"">Reservar</button>
                    </div>
                </div>
            </div>';
        
        $counter++;
    }
    }
    // Cerrar la última fila
    $tabla .= '</div>';

    return $tabla;
}

public function listarServicesxidD($id) {
    $consulta = "SELECT *  FROM SERVICIOS WHERE ID_SERVICIO = $id";
    $resultados = $this->index($consulta);

    return $resultados;
}

public function insertarServiciosControlador() {
    //almacenamos los datos que vienen del formulario en un array
    $nombre_servicio = $this->limpiarCadena($_POST['nombre_servicio']);
    $descripcion_servicio = $this->limpiarCadena($_POST['descripcion_servicio']);
    $precio_servicio = $this->limpiarCadena($_POST['precio_servicio']);
   ;
    //VALIDAMOS LOS CARACTERES DEL Nombre de servicio
   $verificaciones=[   
    ['^\d{1,3}(?:\.\d{1,2})?$', $precio_servicio, "El precio del servicio no coincide con el formato solicitado, no debe de exceer los 3 digitos antes del punto y 2 despues del punto"]
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
     $img_dir = "../views/assets/imagenes/Services/";

     // Verificamos si seleccionó una imagen
     
     $formatosPermitidos = ["jpeg", "png", "jpg"];
     $imagen = $_FILES['foto_servicio']['tmp_name'];
     $nombre_imagen = $_FILES['foto_servicio']['name'];
     $tipo_imagen = strtolower(pathinfo($nombre_imagen, PATHINFO_EXTENSION)); // Corregido el error de escritura en strtolower
     $tamano_imagen = $_FILES['foto_servicio']['size'];
         
     // Verificamos si seleccionó una imagen
     if ($nombre_imagen != "" && $tamano_imagen > 0) {
         // Creando directorio
         if (!file_exists($img_dir) && !mkdir($img_dir, 0777)) {
             $alerta =["tipo"=>"simple",
                        "titulo"=> "Ocurrió un error inesperado",
                        "texto"=> "Error al crear el directorio", 
                        "icono"=>"error"];
             return json_encode($alerta);
             exit();
         }
 
         
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
         $foto = str_ireplace(" ", "_", $nombre_servicio) . "_" . rand(0, 100);
 
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
         if (!move_uploaded_file($imagen, $img_dir . $foto)) {
             $alerta =["tipo"=>"simple",
                        "titulo"=> "Ocurrió un error inesperado",
                        "texto"=> "No podemos subir la imagen al sistema en este momento",
                        "icono"=> "error"];
           return json_encode($alerta);
             exit();
         }
     } else {
        $foto = "predefinido.png";
     }
        
    

    $datos = array(
        "portada" => $foto,
        "nombre_servicio" => $nombre_servicio,
        "descripcion" => $descripcion_servicio,
        "precio" => $precio_servicio);

   
    #ahora si lo enviamos a la funcion insertarUsuario

    $response = $this->insertarServicio($datos);

    if($response>0){
        $alerta=[
            "tipo"=>"limpiar",
            "titulo"=>"Servicio registrado",
            "texto"=>"El Servicio ".$nombre_servicio." se registro con exito",
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
            "texto"=>"No se pudo registrar el Servicio, por favor intente nuevamente",
            "icono"=>"error"
        ];
    }

    return json_encode($alerta);
}

public function actualizarServiciosControlador(){
    //almacenamos los datos que vienen del formulario en un array
    $id_servicio = $this->limpiarCadena($_POST['id_servicio']);
    $nombre_servicio = $this->limpiarCadena($_POST['nombre_servicio']);
    $descripcion_servicio = $this->limpiarCadena($_POST['descripcion_servicio']);
    $precio_servicio = $this->limpiarCadena($_POST['precio_servicio']);
   ;
    
   //VALIDAMOS LOS CARACTERES DEL Nombre de servicio
   $verificaciones=[  
    ['^\d{1,3}(?:\.\d{1,2})?$', $precio_servicio, "El precio del servicio no coincide con el formato solicitado, no debe de exceer los 3 digitos antes del punto y 2 despues del punto"]
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
    $img_dir = "../views/assets/imagenes/services/";

    // Verificamos si seleccionó una imagen
    
    $formatosPermitidos = ["jpeg", "png", "jpg"];
    $imagen = $_FILES['foto_servicio']['tmp_name'];
    $nombre_imagen = $_FILES['foto_servicio']['name'];
    $tipo_imagen = strtolower(pathinfo($nombre_imagen, PATHINFO_EXTENSION)); // Corregido el error de escritura en strtolower
    $tamano_imagen = $_FILES['foto_servicio']['size'];
        
    // Verificamos si seleccionó una imagen
    if ($nombre_imagen != "" && $tamano_imagen > 0) {
        // Creando directorio
        if (!file_exists($img_dir) && !mkdir($img_dir, 0777)) {
            $alerta =["tipo"=>"simple",
                       "titulo"=> "Ocurrió un error inesperado",
                       "texto"=> "Error al crear el directorio", 
                       "icono"=>"error"];
            return json_encode($alerta);
            exit();
        }

        
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
        $foto = str_ireplace(" ", "_", $nombre_servicio) . "_" . rand(0, 100);

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
        if (!move_uploaded_file($imagen, $img_dir . $foto)) {
            $alerta =["tipo"=>"simple",
                       "titulo"=> "Ocurrió un error inesperado",
                       "texto"=> "No podemos subir la imagen al sistema en este momento",
                       "icono"=> "error"];
          return json_encode($alerta);
            exit();
        }
    } else {
        $consulta = "SELECT PORTADA_SERVICIO FROM servicios WHERE ID_SERVICIO = $id_servicio";
        $resultados = $this->index($consulta);
        $foto = $resultados[0]['PORTADA_SERVICIO'];
    }

    $datos = array(
        "id_servicio" => $id_servicio,
        "portada" => $foto,
        "nombre_servicio" => $nombre_servicio,
        "descripcion" => $descripcion_servicio,
        "precio" => $precio_servicio);

   
    #ahora si lo enviamos a la funcion insertarUsuario

    $response = $this->UpdateServices($datos);

    if($response>0){
        $alerta=[
            "tipo"=>"limpiar",
            "titulo"=>"Servicio Actualizado",
            "texto"=>"El Servicio ".$nombre_servicio." se actualizo con exito",
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
            "texto"=>"No se pudo registrar el Servicio, por favor intente nuevamente",
            "icono"=>"error"
        ];
    }

    return json_encode($alerta);
}

public function DARBAJAServiciosControlador(){
    //almacenamos los datos que vienen del formulario en un array
    $id_servicio = $this->limpiarCadena($_POST['id_servicio']);
    $consulta = "SELECT NOMBRE_SERVICIO FROM servicios WHERE ID_SERVICIO = $id_servicio";
    $resultados = $this->index($consulta);
    $nombre_servicio = $resultados[0]['NOMBRE_SERVICIO'];
    $datos = array(
        "id_servicio" => $id_servicio);

   
    #ahora si lo enviamos a la funcion insertarUsuario

    $response = $this->BajaServices($datos);

    if($response>0){
        $alerta=[
            "tipo"=>"limpiarServicioBaja",
            "titulo"=>"Servicio dado de baja",
            "texto"=>"El Servicio ".$nombre_servicio." se dio de baja con exito",
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
            "texto"=>"No se pudo dar de baja el Servicio, por favor intente nuevamente",
            "icono"=>"error"
        ];
    }

    return json_encode($alerta);
}

public function DARALTAServiciosControlador(){
    //almacenamos los datos que vienen del formulario en un array
    $id_servicio = $this->limpiarCadena($_POST['id_servicio']);
    $consulta = "SELECT NOMBRE_SERVICIO FROM servicios WHERE ID_SERVICIO = $id_servicio";
    $resultados = $this->index($consulta);
    $nombre_servicio = $resultados[0]['NOMBRE_SERVICIO'];
    $datos = array(
        "id_servicio" => $id_servicio);

   
    #ahora si lo enviamos a la funcion insertarUsuario

    $response = $this->AltaServices($datos);

    if($response>0){
        $alerta=[
            "tipo"=>"limpiar",
            "titulo"=>"Servicio Restaurado",
            "texto"=>"El Servicio ".$nombre_servicio." se restauro con exito",
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
            "texto"=>"No se pudo restaurar el Servicio, por favor intente nuevamente",
            "icono"=>"error"
        ];
    }

    return json_encode($alerta);
}

}