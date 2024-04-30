<?php
#incluimos el sweetalert
#crearemos el controlador para el BLOG
namespace App\Controllers;
use app\models\blogModel;

class blogController extends blogModel{
    #crearemos todo los metodos aqui
/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
/*::::::::::::::::::::FUNCION LISTAR LOS SERVICIOS::::::::::::::::::*/
public function listarBlogsControlador(){

    $tabla="";
        $consulta_datos="SELECT * FROM blog WHERE ESTADO='ACTIVO' ORDER BY 
        CASE 
            WHEN fecha_eliminacion IS NOT NULL THEN fecha_eliminacion  -- Ordenar servicios eliminados por fecha de eliminación ascendente
            ELSE '9999-12-31'  -- Hacer que los servicios activos aparezcan al final
          END DESC,
          CASE 
          WHEN fecha_modificacion IS NOT NULL THEN fecha_modificacion
          ELSE '9999-12-31'
          END DESC,
          CASE 
            WHEN fecha_eliminacion IS NULL THEN fecha_creacion  -- Ordenar servicios activos por fecha de creación descendente
          END DESC;";
        $consulta_total="SELECT COUNT(id_blog) FROM blog";    

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
                <th>Titulo<span class="icon-arrow"></th>
                <th>Fecha de Cración<span class="icon-arrow"></th>
                <th>Fecha de Modificación<span class="icon-arrow"></th>
                <th>Fecha de Baja<span class="icon-arrow"></th>                
                <th>Estado<span class="icon-arrow"></th>
                <th>Accion<span class="icon-arrow"></th>
                </tr>
            </thead>
            <tbody>';
            $contador=+1;
            foreach($datos as $rows){
                $fechamod="";
                $fechaelim="";
                if($rows['FECHA_MODIFICACION']==NULL AND $rows['FECHA_ELIMINACION']==NULL){
                    $fechamod="";
                    $fechaelim="";
                }else{
                    if($rows['FECHA_MODIFICACION']!=NULL){
                        $fechamod=date("d-m-Y  h:i:s A",strtotime($rows['FECHA_MODIFICACION']));
                    }
                    if($rows['FECHA_ELIMINACION']!=NULL){
                        $fechaelim=date("d-m-Y  h:i:s A",strtotime($rows['FECHA_ELIMINACION']));
                    }
                }

            $tabla.='
                <tr>
                    <td>'.$contador.'</td>
                    <td><img src="'.APP_URL.'/app/views/assets/imagenes/blogs/'.$rows['PORTADA_BLOG'].'" width="50" height="50"></td>
                    <td>'.$rows['TITULO'].'</td>
                    <td>'.date("d-m-Y  h:i:s A",strtotime($rows['FECHA_CREACION'])).'</td>
                    <td>'.$fechamod.'</td>                   
                    <td>'.$fechaelim.'</td>
                    <td>'.$rows['ESTADO'].'</td>                                       
                    <td>
                        <a href="'.APP_URL.'DetailBlog/'.$rows['ID_BLOG'].'/" class="btn btn-warning"><i class="bi bi-eye-fill"></i> Ver más</a>                        
                    </td>
                </tr>';
            $contador++;
            }
            $tabla.='</tbody></table>';   
    

            return $tabla;
        }
}

public function listarBlogsControladorParaAsesores(){
    $autor=$_SESSION['usuario'];
    $tabla="";
        $consulta_datos="SELECT * FROM blog WHERE ESTADO='ACTIVO' AND AUTOR='$autor' ORDER BY 
        CASE 
            WHEN fecha_eliminacion IS NOT NULL THEN fecha_eliminacion  -- Ordenar servicios eliminados por fecha de eliminación ascendente
            ELSE '9999-12-31'  -- Hacer que los servicios activos aparezcan al final
          END DESC,
          CASE 
          WHEN fecha_modificacion IS NOT NULL THEN fecha_modificacion
          ELSE '9999-12-31'
          END DESC,
          CASE 
            WHEN fecha_eliminacion IS NULL THEN fecha_creacion  -- Ordenar servicios activos por fecha de creación descendente
          END DESC;";
        $consulta_total="SELECT COUNT(id_blog) FROM blog";    

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
                <th>#</th>
                <th>Portada</th>
                <th>Titulo</th>
                <th>Fecha de Cración</th>
                <th>Fecha de Modificación</th>
                <th>Fecha de Baja</th>                
                <th>Estado</th>
                <th>Accion</th>
                </tr>
            </thead>
            <tbody>';
            $contador=+1;
            foreach($datos as $rows){
                $fechamod="";
                $fechaelim="";
                if($rows['FECHA_MODIFICACION']==NULL AND $rows['FECHA_ELIMINACION']==NULL){
                    $fechamod="";
                    $fechaelim="";
                }else{
                    if($rows['FECHA_MODIFICACION']!=NULL){
                        $fechamod=date("d-m-Y  h:i:s A",strtotime($rows['FECHA_MODIFICACION']));
                    }
                    if($rows['FECHA_ELIMINACION']!=NULL){
                        $fechaelim=date("d-m-Y  h:i:s A",strtotime($rows['FECHA_ELIMINACION']));
                    }
                }

            $tabla.='
                <tr>
                    <td>'.$contador.'</td>
                    <td><img src="'.APP_URL.'/app/views/assets/imagenes/blogs/'.$rows['PORTADA_BLOG'].'" width="50" height="50"></td>
                    <td>'.$rows['TITULO'].'</td>
                    <td>'.date("d-m-Y  h:i:s A",strtotime($rows['FECHA_CREACION'])).'</td>
                    <td>'.$fechamod.'</td>                   
                    <td>'.$fechaelim.'</td>
                    <td>'.$rows['ESTADO'].'</td>                                       
                    <td>
                        <a href="'.APP_URL.'DetailBlog/'.$rows['ID_BLOG'].'/" class="btn btn-warning"><i class="bi bi-eye-fill"></i> Ver más</a>                        
                    </td>
                </tr>';
            $contador++;
            }
            $tabla.='</tbody></table>';   
    

            return $tabla;
        }
}

/*blogs inactivos */
public function listarBlogsINACTIVOControlador(){

    $tabla="";
        $consulta_datos="SELECT*FROM BLOG WHERE ESTADO='Inactivo' ORDER BY FECHA_ELIMINACION DESC;";
        $consulta_total="SELECT COUNT(id_blog) FROM blog";    

    $datos = $this->ejecutarConsulta($consulta_datos);
    $datos = $datos->fetchAll();
    $total = $this->ejecutarConsulta($consulta_total);
    $total = (int) $total->fetchColumn();
    if($total==0){
        echo '<div class="alert alert-warning" role="alert">
                    No hay registros en la base de datos
               </div>';
    }else{
        $tabla.='<table id="example2" class="table table-striped nowrap" style="width:100%">
            <thead>
                <tr>
                <th>#<span class="icon-arrow"></th>
                <th>Portada<span class="icon-arrow"></th>
                <th>Titulo<span class="icon-arrow"></th>
                <th>Fecha de Eliminacion<span class="icon-arrow"></th>
                <th>Accion<span class="icon-arrow"></th>
                </tr>
            </thead>
            <tbody>';
            $contador=+1;
            foreach($datos as $rows){
                $fechamod="";
                $fechaelim="";
                if($rows['FECHA_ELIMINACION']==NULL){
                    $fechaelim="";
                }else{
                    if($rows['FECHA_ELIMINACION']!=NULL){
                        $fechaelim=date("d-m-Y  h:i:s A",strtotime($rows['FECHA_ELIMINACION']));
                    }
                }

            $tabla.='
                <tr>
                    <td>'.$contador.'</td>
                    <td><img src="'.APP_URL.'/app/views/assets/imagenes/blogs/'.$rows['PORTADA_BLOG'].'" width="50" height="50"></td>
                    <td>'.$rows['TITULO'].'</td>                  
                    <td>'.$fechaelim.'</td>                                     
                    <td>
                        <a href="'.APP_URL.'DetailBlog/'.$rows['ID_BLOG'].'/" class="btn btn-warning"><i class="bi bi-eye-fill"></i> Detalle</a>                        
                    </td>
                </tr>';
            $contador++;
            }
            $tabla.='</tbody></table>';   
    

            return $tabla;
        }
}


public function listarBlog_x_ID($id){
    $consulta_datos="SELECT * FROM blog WHERE ID_BLOG='$id'";
    $datos = $this->ejecutarConsulta($consulta_datos);
    $datos = $datos->fetchAll();
    return $datos;

}


public function ListarBlogInactivos(){
    $consulta_datos="SELECT * FROM blog WHERE ESTADO='Inactivo' ORDER BY TITULO DESC";
    $datos = $this->ejecutarConsulta($consulta_datos);
    $datos = $datos->fetchAll();
    return $datos;

}

/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/

/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
/*::::::::::::::::FUNCION INGRESAR BLOG'S NUEVOS:::::::::::::::::*/
public function insertarBlogControlador() {
    //almacenamos los datos que vienen del formulario en un array
    $titulo_blog = $this->limpiarCadena($_POST['titulo_blog']);
    $descripcion_blog = $_POST['descripcion_blog'];
    $comentarioUserLog =$_POST['comentario_blog'];
    $autor = $_SESSION['usuario'];
   ;
    
    // Directorio de fotos
    $img_dir = "../views/assets/imagenes/blogs/";

    // Verificamos si seleccionó una imagen
    $formatosPermitidos = ["jpeg", "png", "jpg"];
    $imagen = $_FILES['portada_blog']['tmp_name'];
    $nombre_imagen = $_FILES['portada_blog']['name'];
    $tipo_imagen = strtolower(pathinfo($nombre_imagen, PATHINFO_EXTENSION)); // Corregido el error de escritura en strtolower
    $tamano_imagen = $_FILES['portada_blog']['size'];
        
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
        $foto = str_ireplace(" ", "_", $titulo_blog) . "_" . rand(0, 100);

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
        $foto = "blog.png";
    }

    $datos = array(
        "portada_blog" => $foto,
        "titulo_blog" => $titulo_blog,
        "descripcion" => $descripcion_blog,
        "comentario" => $comentarioUserLog,
        "autor" => $autor);

   
    #ahora si lo enviamos a la funcion insertarBLOG

    $response = $this->insertarBlog($datos);
        
    if($response>0){
        $alerta=[
            "tipo"=>"limpiar",
            "titulo"=>"Posts registrado",
            "texto"=>"Nuevo Posts ".$titulo_blog." se registro con exito",
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
            "texto"=>"No se pudo registrar el posts, por favor intente nuevamente",
            "icono"=>"error"
        ];
    }

    return json_encode($alerta);
}

public function actualizarBlogControlador(){
    $id = $this->limpiarCadena($_POST['id']);
    $titulo_blog = $this->limpiarCadena($_POST['titulo_blog']);
    $descripcion_blog = $_POST['descripcion_blog']; 
     // Directorio de fotos
     $img_dir = "../views/assets/imagenes/blogs/";

     // Verificamos si seleccionó una imagen
     $formatosPermitidos = ["jpeg", "png", "jpg"];
     $imagen = $_FILES['portada_blog']['tmp_name'];
     $nombre_imagen = $_FILES['portada_blog']['name'];
     $tipo_imagen = strtolower(pathinfo($nombre_imagen, PATHINFO_EXTENSION)); // Corregido el error de escritura en strtolower
     $tamano_imagen = $_FILES['portada_blog']['size'];
         
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
         $foto = str_ireplace(" ", "_", $titulo_blog) . "_" . rand(0, 100);
 
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
        $consulta_datos="SELECT * FROM blog WHERE ID_BLOG='$id'";
        $datos = $this->ejecutarConsulta($consulta_datos);
        $datos = $datos->fetchAll();
        foreach($datos as $row){
            $foto = $row['PORTADA_BLOG'];
        }        
     }
 
     $datos = array(
         "id" => $id,
         "portada_blog" => $foto,
         "titulo_blog" => $titulo_blog,
         "descripcion" => $descripcion_blog);
 
    
     #ahora si lo enviamos a la funcion insertarBLOG
 
     $response = $this->updateBlogModel($datos);
 
     if($response>0){
         $alerta=[
             "tipo"=>"limpiar",
             "titulo"=>"Posts Actualiza",
             "texto"=>"El Posts ".$titulo_blog." se Actualizo con exito",
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
             "texto"=>"No se pudo Actualizar el posts, por favor intente nuevamente",
             "icono"=>"error"
         ];
     }
 
     return json_encode($alerta);
}

public function DarBajaBlogControlador(){
    $id = $this->limpiarCadena($_POST['id_blog']);
    $datos = array(
        "id" => $id);
    $response = $this->DarBajaBlogModel($datos);
    if($response>0){
        $alerta=[
            "tipo"=>"limpiarDeleteBlogsssss",
            "titulo"=>"Posts Eliminado",
            "texto"=>"El Posts se dio de baja con exito",
            "icono"=>"success"
        ];
                   
    }else{
        $alerta=[
            "tipo"=>"simple",
            "titulo"=>"Ocurrió un error inesperado",
            "texto"=>"No se pudo dar de baja el posts, por favor intente nuevamente",
            "icono"=>"error"
        ];
    }
    return json_encode($alerta);

}

public function DarAltaBlogControlador(){
        $id = $this->limpiarCadena($_POST['id_blog']);
        $datos = array(
            "id" => $id);
        $response = $this->DarAltaBlogModel($datos);
        if($response>0){
            $alerta=[
                "tipo"=>"limpiar",
                "titulo"=>"Posts Restaurado",
                "texto"=>"El Posts se restauro con exito",
                "icono"=>"success"
            ];
                       
        }else{
            $alerta=[
                "tipo"=>"simple",
                "titulo"=>"Ocurrió un error inesperado",
                "texto"=>"No se pudo restaurar el posts, por favor intente nuevamente",
                "icono"=>"error"
            ];
        }
        return json_encode($alerta);
    
}

public function blogControllerNT(){
    $tabla = "";
    $consulta_datos = "SELECT * FROM BLOG WHERE ESTADO = 'Activo' AND WEEK(FECHA_CREACION) = WEEK(NOW());";   
    $datos_result = $this->ejecutarConsulta($consulta_datos);
    $datos = $datos_result->fetchAll();
    $tabla .= '<div class="sidebar-item recent-posts">';  
    foreach ($datos as $row) {
        $tabla .= ' <div class="post-item clearfix">
                        <img src="'.APP_URL.'/app/views/assets/imagenes/blogs/'.$row['PORTADA_BLOG'].'" alt="">
                        <h4><a href="'.APP_URL.'detailsBlog/'.$row['ID_BLOG'].'/">'.$row['TITULO'].'</a></h4>
                        <time datetime="2020-01-01">'.$row['FECHA_CREACION'].'</time>
                    </div>';
    }
    $tabla .= '</div>';
    return $tabla;

}

public function blogControllerNOTE($pagina, $registros, $url,$busqueda) {
        $pagina=$this->limpiarCadena($pagina);
        $registros=$this->limpiarCadena($registros);
        $url=$this->limpiarCadena($url);
        $url=APP_URL.$url."/";

        $busqueda=$this->limpiarCadena($busqueda);
        $tabla='<section id="blog" class="blog">
                    <div class="container" data-aos="fade-up">
                        <div class="row">
                            <div class="col-lg-8 entries">';

        $pagina = (isset($pagina) && $pagina>0) ? (int) $pagina : 1;
        $inicio = ($pagina>0) ? (($pagina * $registros)-$registros) : 0;

        if(isset($busqueda) && $busqueda!=""){

            $consulta_datos="SELECT * , REGEXP_REPLACE(DESCRIPCION, '<[^>]+>', '') AS DESCRIPCION2 FROM BLOG WHERE ESTADO='Activo' AND (TITULO LIKE '%asesoria de tesis%' OR DESCRIPCION LIKE '%asesoria de tesis%' OR FECHA_CREACION LIKE '%asesoria de tesis%')ORDER BY  ID_BLOG DESC LIMIT $inicio,$registros;";

            $consulta_total="SELECT COUNT(ID_BLOG) FROM BLOG WHERE TITULO LIKE '%$busqueda%' OR DESCRIPCION LIKE '%$busqueda%' OR FECHA_CREACION LIKE '%$busqueda%'";

        }else{

            $consulta_datos="SELECT * , REGEXP_REPLACE(DESCRIPCION, '<[^>]+>', '') AS DESCRIPCION2 FROM BLOG WHERE ESTADO='Activo' ORDER BY  ID_BLOG DESC LIMIT $inicio,$registros";

            $consulta_total="SELECT COUNT(ID_BLOG) FROM BLOG WHERE ESTADO='Activo'";

        }

        $datos = $this->ejecutarConsulta($consulta_datos);
        $datos = $datos->fetchAll();

        $total = $this->ejecutarConsulta($consulta_total);
        $total = (int) $total->fetchColumn();

        $numeroPaginas =ceil($total/$registros);

        $tabla.='';

        if($total>=1 && $pagina<=$numeroPaginas){
            $contador=$inicio+1;
            $pag_inicio=$inicio+1;
            foreach($datos as $row){
                $contenido=substr($row['DESCRIPCION2'],0,1024);
                $tabla.='<article class="entry">
                <div class="entry-img">
                    <img src="'.APP_URL.'/app/views/assets/imagenes/blogs/'.$row['PORTADA_BLOG'].'" alt="" class="img-fluid">
                </div>
                <h2 class="entry-title">
                    <a href="'.APP_URL.'detailsBlog/'.$row['ID_BLOG'].'/">'.$row['TITULO'].'</a>
                </h2>
                <div class="entry-meta">
                    <ul>
                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <time datetime="2020-01-01">'.$row['FECHA_CREACION'].'</time></li>
                    </ul>
                </div>
                <div class="entry-content">
                    <p>'.$contenido.'...</p>
                    <div class="read-more">
                        <a href="'.APP_URL.'detailsBlog/'.$row['ID_BLOG'].'/">Ver Más</a>
                    </div>
                </div>
            </article>';
                $contador++;
            }
            $pag_final=$contador-1;
        }else{
            if($total>=1){
                $tabla.='
                    <tr class="has-text-centered" >
                        <td colspan="7">
                            <a href="'.$url.'1/" class="button is-link is-rounded is-small mt-4 mb-4">
                                Haga clic acá para recargar el listado
                            </a>
                        </td>
                    </tr>
                ';
            }else{
                $tabla.='
                <div class="alert alert-danger" role="alert">
                            No hay registros en la base de datos
                </div>    
                ';
            }
        }

        $tabla.='';

        ### Paginacion ###
        if($total>0 && $pagina<=$numeroPaginas){
            $tabla.='<p class="has-text-right">Mostrando <strong>'.$pag_inicio.'</strong> Al <strong>'.$pag_final.'</strong> de un <strong>total de '.$total.'</strong></p>';

            $tabla.=$this->paginadorTablas($pagina,$numeroPaginas,$url,7);
        }

        return $tabla;
    
}

// Función para calcular el tiempo transcurrido de manera relativa
function tiempo_transcurrido($fecha) {
    $ahora = time();
    $fecha_comentario = strtotime($fecha);
    $diferencia = $ahora - $fecha_comentario;

    $minutos = round($diferencia / 60);
    $horas = round($minutos / 60);
    $dias = round($horas / 24);

    if ($minutos < 60) {
        if ($minutos == 1) {
            return "hace 1 minuto";
        } else {
            return "hace $minutos minutos";
        }
    } elseif ($horas < 24) {
        if ($horas == 1) {
            return "hace 1 hora";
        } else {
            return "hace $horas horas";
        }
    } elseif ($dias < 7) {
        if ($dias == 1) {
            return "hace 1 día";
        } else {
            return "hace $dias días";
        }
    } else {
        return date('d M, Y', $fecha_comentario);
    }
}

// Función para obtener los comentarios y mostrarlos con la fecha relativa
public function COMENT_REPLY($idus){
    $tabla="";
    $consulta_datos="SELECT RC.ID_REPLY AS IDREPLY,U.FOTO_PERFIL AS FOTO_PERFIL,CONCAT(U.NOMBRE,' ', U.APELLIDO)AS NOMBREUSERREPLY,RC.USUARIO AS USUARIOREPLY, 
    C.COMENTARIO AS COMENTARIO,CONCAT(U2.NOMBRE,' ', U2.APELLIDO)AS PRIMERCOMENTARIO,RC.COMENTARIO AS COMENTARIOREPLY,
    RC.FECHA_CREACION AS FECHACOMENTARIO FROM USUARIO U
    INNER JOIN REPLY_COMENT RC ON RC.USUARIO = U.USUARIO
    INNER JOIN COMENTARIOS C ON C.ID_COMENTARIO = RC.ID_COMENTARIO
    INNER JOIN USUARIO U2 ON U2.ID_USUARIO = C.ID_USUARIO
    WHERE U2.ID_USUARIO='$idus'  AND RC.ESTADO='Activo' AND C.ESTADO='Activo' ORDER BY IDREPLY ASC"; 
    
    $consulta_total="SELECT COUNT(rc.id_reply) FROM USUARIO U
    INNER JOIN REPLY_COMENT RC ON RC.USUARIO = U.USUARIO
    INNER JOIN COMENTARIOS C ON C.ID_COMENTARIO = RC.ID_COMENTARIO
    INNER JOIN USUARIO U2 ON U2.ID_USUARIO = C.ID_USUARIO
    WHERE U2.ID_USUARIO='$idus'AND RC.ESTADO='Activo' AND C.ESTADO='Activo'";        

    $datos = $this->ejecutarConsulta($consulta_datos);
    $datos = $datos->fetchAll();
    $total = $this->ejecutarConsulta($consulta_total);
    $total = (int) $total->fetchColumn();

    //Verificamos si el comentario es de la persona logeada para mostrar el boton de eliminar
    $botoneliminar="";
    $botoneditar="";
    if(isset($_SESSION['usuario'])){
    $usuarioLog=$_SESSION['usuario'];
    }else{
    $usuarioLog="";
    }
    $consultaNueva="SELECT * FROM USUARIO WHERE USUARIO='".$usuarioLog."'";
    $datosNueva = $this->ejecutarConsulta($consultaNueva);
    $datosNueva = $datosNueva->fetchAll();
    foreach($datosNueva as $row){
        $uslog=$row['USUARIO'];
    }
    
    if($total == 0) {
        $tabla .= '';
    } else {        
        $tabla .= '';
        $indice=0;
        
        foreach($datos as $row) {                        
            //botones a mostrar
            if($uslog==$row['USUARIOREPLY']){
                $botoneliminar='<a href="#" class="delete" onclick="deleteReplyCommentForm(event, '.$row['IDREPLY'].')"><i class="bi bi-trash-fill" title="Eliminar comentario"></i></a>';
                $botoneditar='<a href="#" class="edit" onclick="editReplyCommentForm(event, '.$row['IDREPLY'].')"><i class="bi bi-pencil-fill" title="Editar comentario"></i></a>';
                
            }else{
                $botoneliminar="";
                $botoneditar="";
            }
            //
            $formularioeditar='<div id="reply-form-'.$row['IDREPLY'].'" class="reply_comment-form comment-'.$row['IDREPLY'].'" style="display: none;">
            <form action="'.APP_URL.'app/ajax/BlogAjax.php" method="POST" autocomplete="off"
                enctype="multipart/form-data" class="FormularioAjax">
            <input type="hidden" name="modulo_blog" value="ActualizarComentarioReply">
            <input type="hidden" name="id_comentario" value="'.$row['IDREPLY'].'">
            <textarea name="comentario"class="form-control" placeholder="">'.$row['COMENTARIOREPLY'].'</textarea>
            <button class="btn btn-primary" onclick="submitReplyCommentForm('.$row['IDREPLY'].')">Actualizar</button>
            <button class="btn btn-danger cancelar-btn" onclick="cancelReplyCommentForm('.$row['IDREPLY'].')">Cancelar</button>
            </form>                 
            
            </div>';
            $indice+=1;
            $fecha_amigable = $this->tiempo_transcurrido($row['FECHACOMENTARIO']);             
            $tabla .= '<div id="comment-reply-'.$indice.'" class="comment comment-reply">
                        <div class="d-flex">
                        <div class="comment-img"><img src="'.APP_URL.'/app/views/assets/imagenes/usuarios/'.$row['FOTO_PERFIL'].'" alt=""></div>
                         <div>
                            <h5><a href="">'.$row['NOMBREUSERREPLY'].'</a>
                            '.$botoneditar.'
                            '.$botoneliminar.'
                            </h5>
                            <time datetime="'.$row['FECHACOMENTARIO'].'">'.$fecha_amigable.'</time> <!-- Mostrar la fecha de manera relativa -->
                            <p>'
                            .$row['COMENTARIOREPLY'].                                                        
                            '</p>
                            '.$formularioeditar.'
                        </div>
                    </div>
                </div>';
        }

        $tabla .= ''; // Cierre de sección y contenedores
    }
    return $tabla;
}

public function detalleBlogController($id) {
    $tabla="";
    $consulta_datos="SELECT B.*,U.*, CONCAT(U.NOMBRE,' ',U.APELLIDO)AS AUTOR 
                    FROM BLOG B
                    JOIN USUARIO U ON U.USUARIO = B.AUTOR WHERE B.ID_BLOG='$id' and B.ESTADO='ACTIVO'";    
    $consulta_total="SELECT COUNT(id_blog) FROM blog";
    $cant_coment="SELECT    
    (SELECT COUNT(id_comentario) FROM comentarios WHERE estado = 'Activo' AND id_blog = '$id') +
    (SELECT COUNT(id_reply) FROM reply_coment rc INNER JOIN comentarios c ON rc.id_comentario = c.id_comentario WHERE rc.estado = 'Activo' AND c.estado = 'Activo' AND c.id_blog = '$id') AS total
"; 
    $consulta_coment="SELECT *,C.FECHA_CREACION AS FECHACOMENTARIO FROM COMENTARIOS C
    INNER JOIN USUARIO U
    ON C.ID_USUARIO = U.ID_USUARIO
    WHERE C.id_blog='$id' AND C.estado='Activo' ORDER BY C.fecha_creacion DESC"; 
     

    $datos = $this->ejecutarConsulta($consulta_datos);
    $datos = $datos->fetchAll();
    $datosComentario = $this->ejecutarConsulta($consulta_coment);
    $datosComentario = $datosComentario->fetchAll();
    $total = $this->ejecutarConsulta($consulta_total);
    $total = (int) $total->fetchColumn();
    $totalcoment = $this->ejecutarConsulta($cant_coment);
    $totalcoment = (int) $totalcoment->fetchColumn();
    if($total == 0) {
        $tabla .= '<div class="alert alert-warning" role="alert">No hay registros en la base de datos</div>';
    } else {        
        $tabla .= '<section id="blog" class="blog">
                    <div class="container" data-aos="fade-up">
                        <div class="row">
                            <div class="col-lg-8 entries">
                            ';
        foreach($datos as $row) {
            $tabla .= '
            <article class="entry">
                        <div class="entry-img">
                            <img src="'.APP_URL.'/app/views/assets/imagenes/blogs/'.$row['PORTADA_BLOG'].'" alt="" class="img-fluid">
                        </div>
                        <h2 class="entry-title">
                            <a href="blog-single.html">'.$row['TITULO'].'</a>
                        </h2>
                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i><a>'.$row['USUARIO'].'</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <time datetime="2020-01-01">'.$row['FECHA_CREACION'].'</time></li>
                                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="#comentarios">'.$totalcoment.' Comentarios</a></li>
                            </ul>
                        </div>
                        <div class="entry-content">
                            <p>'.$row['DESCRIPCION'].'</p>
                        </div>
                    </article>
                    <div class="blog-author d-flex align-items-center">
              <img src="'.APP_URL.'/app/views/assets/imagenes/usuarios/'.$row['FOTO_PERFIL'].'" class="rounded-circle float-left" alt="">
              <div>
                <h4>'.$row['NOMBRE'].' '.$row['APELLIDO'].'</h4>
                <div class="social-links">
                  <a href="'.$row['S_TWITTER'].'"><i class="bi bi-twitter"></i></a>
                  <a href="'.$row['S_FACEBOOK'].'"><i class="bi bi-facebook"></i></a>
                  <a href="'.$row['S_INSTAGRAM'].'"><i class="biu bi-instagram"></i></a>
                </div>
                <p>'.$row['COMENTARIO'].'</p>
              </div>
            </div>';
        }

        // Comentarios
        $tabla .= '<div class="blog-comments" id="comentarios">
                      <h4 class="comments-count">'.$totalcoment.' Comentarios</h4>';
        foreach($datosComentario as $row) {
            $fecha_amigable = $this->tiempo_transcurrido($row['FECHACOMENTARIO']);
            $idusucoment=$row['ID_USUARIO'];
            $cant_reply_x_coment="SELECT COUNT(rc.id_reply) FROM USUARIO U INNER JOIN REPLY_COMENT RC ON RC.USUARIO = U.USUARIO
                                    INNER JOIN COMENTARIOS C ON C.ID_COMENTARIO = RC.ID_COMENTARIO INNER JOIN USUARIO U2  ON U2.ID_USUARIO = C.ID_USUARIO
                                    WHERE U2.ID_USUARIO='$idusucoment' AND C.ESTADO='Activo' AND RC.ESTADO='Activo'";   
            $datosReply = $this->ejecutarConsulta($cant_reply_x_coment);
            $datosReply = (int) $datosReply->fetchColumn();
            $comentreply="" ;
            $botonMostraOcultar="";
            #botones####################################
            $botoneliminar="";
            $botoneditar="";
            if(isset($_SESSION['usuario'])){
            $usuario=$_SESSION['usuario'];
            }else{
            $usuario="";
            }
            
            $consultauserlog="SELECT * FROM USUARIO WHERE USUARIO='".$usuario."'";            
            $datosuserlog = $this->ejecutarConsulta($consultauserlog);
            $datosuserlog = $datosuserlog->fetchAll();
            foreach($datosuserlog as $rowuserlog){
                if($rowuserlog['ID_USUARIO']==$row['ID_USUARIO']){
                    $botoneditar='<a href="#" class="reply" onclick="showEditarCommentForm(event, '.$row['ID_COMENTARIO'].')"><i class="bi bi-pencil" title="Editar Comentario"></i></a>';
                    $botoneliminar='<a href="#" class="reply" onclick="deleteCommentForm(event, '.$row['ID_COMENTARIO'].')"><i class="bi bi-trash3" title="Borrar Comentario"></i></a>';
                }else{
                    $botoneditar='<a href="#" class="reply" onclick="showCommentForm(event, '.$row['ID_COMENTARIO'].')"><i class="bi bi-reply-fill" title="Responder"></i></a>';
                   
                }

            }
            $formularioeditar='<div id="edit-form-'.$row['ID_COMENTARIO'].'" class="editar_comment-form comment-'.$row['ID_COMENTARIO'].'" style="display: none;">
            <form action="'.APP_URL.'app/ajax/BlogAjax.php" method="POST" autocomplete="off"
                enctype="multipart/form-data" class="FormularioAjax">
            <input type="hidden" name="modulo_blog" value="ActualizarComentario">
            <input type="hidden" name="id_comentario" value="'.$row['ID_COMENTARIO'].'">
            <textarea name="comentario"class="form-control" placeholder="">'.$row['COMENTARIO'].'</textarea>
            <button class="btn btn-primary" onclick="submitEditarComment('.$row['ID_COMENTARIO'].')">Actualizar</button>
            <button class="btn btn-danger cancelar-btn" onclick="cancelEditarComment('.$row['ID_COMENTARIO'].')">Cancelar</button>
            </form>                 
            
            </div>';
            #fin botones#####################################
            $formularioRespuesta = '<div id="comment-form-'.$row['ID_COMENTARIO'].'" class="comment-form comment-'.$row['ID_COMENTARIO'].'" style="display: none;">
            <form action="'.APP_URL.'app/ajax/BlogAjax.php" method="POST" autocomplete="off"
                enctype="multipart/form-data" class="FormularioAjax">
                <input type="hidden" name="modulo_blog" value="InsertarReplyComentario">
                <textarea class="form-control" name="respuestacomentario" placeholder="Deja tu comentario..."></textarea>
                <input type="hidden" name="id_coment" value="'.$row['ID_COMENTARIO'].'">
                <button class="btn btn-primary" onclick="submitComment('.$row['ID_COMENTARIO'].')">Comentar</button>
                <button class="btn btn-danger cancelar-btn" onclick="cancelComment('.$row['ID_COMENTARIO'].')">Cancelar</button>
            </form>
                </div>';            
            if($datosReply>0){
                $reply=$this->COMENT_REPLY($idusucoment);
                $comentreply= $reply; 
                $botonMostraOcultar = '<button class="link-btn" id="show-comments-btn-'.$row['ID_COMENTARIO'].'" onclick="toggleComments('.$row['ID_COMENTARIO'].')"><i class="fa-solid fa-angle-down"></i> Mostrar más comentarios</button>';
            }else{
                $comentreply="";
                $botonMostraOcultar="";
            }
            $tabla .= '<div id="comment-'.$row['ID_COMENTARIO'].'" class="comment">
                            <div class="d-flex">
                                <div class="comment-img"><img src="'.APP_URL.'/app/views/assets/imagenes/usuarios/'.$row['FOTO_PERFIL'].'" alt=""></div>
                                <div>
                                <h5>
                                <a>'.$row['NOMBRE'].' '.$row['APELLIDO'].' </a>                               
                                '.$botoneditar.'
                                '.$botoneliminar.'                                   
                                
                            </h5>
                                    <time datetime="'.$row['FECHACOMENTARIO'].'">'.$fecha_amigable.'</time>
                                    <p>'.$row['COMENTARIO'].'</p>
                                </div>                               
                            </div>
                            '.$formularioeditar.'
                            '.$formularioRespuesta.'
                            '.$botonMostraOcultar.'                            
                        </div>
                        <div id="additional-comments-'.$row['ID_COMENTARIO'].'" style="display: none;">
                        '.$comentreply.'
                        </div>
                        <button class="link-btn" id="hide-comments-btn-'.$row['ID_COMENTARIO'].'" style="display: none;" onclick="toggleComments('.$row['ID_COMENTARIO'].')"><i class="fa fa-angle-up" aria-hidden="true"></i> Ocultar comentarios</button>
                        ';
                        

        }
        $tabla .= '</div>
        '; // Cierre de sección y contenedores
        
    }
    return $tabla;
}

public function insertarComentario(){
    $id_blog = $this->limpiarCadena($_POST['commentId']);
    $comentario = $this->limpiarCadena($_POST['comment']);
    $id_usuario = $_SESSION['id'];
    //validamos que el campo no este vacio y que contanga al menos 3 caracteres    
    if($comentario == "" || strlen($comentario) < 3){
        $alerta=[
            "tipo"=>"simple",
            "titulo"=>"Ocurrió un error inesperado",
            "texto"=>"El comentario no puede estar vacío y debe contener al menos 3 caracteres",
            "icono"=>"error"
        ];
        return json_encode($alerta);
    } 
    $datos = array(
        "id_usuario" => $id_usuario,
        "id_blog" => $id_blog,
        "comentario" => $comentario
        );
    $response = $this->insertarComentarioModel($datos);
    if($response>0){
        $alerta=[
            "tipo"=>"limpiar",
            "titulo"=>"Comentario registrado",
            "texto"=>"El comentario se registro con exito",
            "icono"=>"success"
        ];
                   
    }else{
        $alerta=[
            "tipo"=>"simple",
            "titulo"=>"Ocurrió un error inesperado",
            "texto"=>"No se pudo registrar el comentario, por favor intente nuevamente",
            "icono"=>"error"
        ];
    }
    return json_encode($alerta);
}

public function actualizarComenterio(){
    $id_comentario = $this->limpiarCadena($_POST['id_comentario']);
    $comentario = $this->limpiarCadena($_POST['comentario']);
    $datos = array(
        "id_comentario" => $id_comentario,
        "comentario" => $comentario
        );
    $response = $this->updateComentarioModel($datos);
    if($response>0){
        $alerta=[
            "tipo"=>"limpiar",
            "titulo"=>"Comentario Actualizado",
            "texto"=>"El comentario se actualizo con exito",
            "icono"=>"success"
        ];
                   
    }else{
        $alerta=[
            "tipo"=>"simple",
            "titulo"=>"Ocurrió un error inesperado",
            "texto"=>"No se pudo actualizar el comentario, por favor intente nuevamente",
            "icono"=>"error"
        ];
    }
    return json_encode($alerta);

}

public function eliminarComentario(){
    $id_comentario = $this->limpiarCadena($_POST['id_comentario']);
    $datos = array(
        "id_comentario" => $id_comentario
        );
    $response = $this->deleteComentarioModel($datos);
    if($response>0){
        $alerta=[
            "tipo"=>"limpiar",
            "titulo"=>"Comentario Eliminado",
            "texto"=>"El comentario se elimino con exito",
            "icono"=>"success"
        ];
                   
    }else{
        $alerta=[
            "tipo"=>"simple",
            "titulo"=>"Ocurrió un error inesperado",
            "texto"=>"No se pudo eliminar el comentario, por favor intente nuevamente",
            "icono"=>"error"
        ];
    }
    return json_encode($alerta);


}

public function insertarReplycoment(){
    $id_comentario = $this->limpiarCadena($_POST['id_coment']);
    $comentario = $this->limpiarCadena($_POST['respuestacomentario']);
    $usuarioLogg = $_SESSION['usuario'];
    //validamos que el campo no este vacio y que contanga al menos 3 caracteres    
    if($comentario == "" || strlen($comentario) < 3){
        $alerta=[
            "tipo"=>"simple",
            "titulo"=>"Ocurrió un error inesperado",
            "texto"=>"El comentario no puede estar vacío y debe contener al menos 3 caracteres",
            "icono"=>"error"
        ];
        return json_encode($alerta);
    } 
    $datos = array(
        "id_comentario" => $id_comentario,
        "comentario" => $comentario,
        "usuario" => $usuarioLogg
        );
    $response = $this->insertarReplyComentarioModel($datos);
    if($response>0){
        $alerta=[
            "tipo"=>"limpiar",
            "titulo"=>"Comentario registrado",
            "texto"=>"El comentario se registro con exito",
            "icono"=>"success"
        ];
                   
    }else{
        $alerta=[
            "tipo"=>"simple",
            "titulo"=>"Ocurrió un error inesperado",
            "texto"=>"No se pudo registrar el comentario, por favor intente nuevamente",
            "icono"=>"error"
        ];
    }
    return json_encode($alerta);   
}

public function actualizarReplyComenterio(){
    $id_comentario = $this->limpiarCadena($_POST['id_comentario']);
    $comentario = $this->limpiarCadena($_POST['comentario']);
    $datos = array(
        "id_comentario" => $id_comentario,
        "comentario" => $comentario
        );
    $response = $this->updateReplyComentarioModel($datos);
    if($response>0){
        $alerta=[
            "tipo"=>"limpiar",
            "titulo"=>"Comentario Actualizado",
            "texto"=>"El comentario se actualizo con exito",
            "icono"=>"success"
        ];
                   
    }else{
        $alerta=[
            "tipo"=>"simple",
            "titulo"=>"Ocurrió un error inesperado",
            "texto"=>"No se pudo actualizar el comentario, por favor intente nuevamente",
            "icono"=>"error"
        ];
    }
    return json_encode($alerta);

}

public function eliminarReplyComentario(){
    $id_comentario = $this->limpiarCadena($_POST['id_comentario']);
    $datos = array(
        "id_comentario" => $id_comentario
        );
    $response = $this->deleteReplyComentarioModel($datos);
    if($response>0){
        $alerta=[
            "tipo"=>"limpiar",
            "titulo"=>"Comentario Eliminado",
            "texto"=>"El comentario se elimino con exito",
            "icono"=>"success"
        ];
                   
    }else{
        $alerta=[
            "tipo"=>"simple",
            "titulo"=>"Ocurrió un error inesperado",
            "texto"=>"No se pudo eliminar el comentario, por favor intente nuevamente",
            "icono"=>"error"
        ];
    }
    return json_encode($alerta);


}

##############no tocar lo de abajo####################
public function COMENT_REPLY_($idus){
    $tabla="";
    $consulta_datos="SELECT RC.ID_REPLy AS IDREPLY,U.FOTO_PERFIL AS FOTO_PERFIL,CONCAT(U.NOMBRE,' ', U.APELLIDO)AS USUARIOREPLY, 
    C.COMENTARIO AS COMENTARIO,CONCAT(U2.NOMBRE,' ', U2.APELLIDO)AS PRIMERCOMENTARIO,RC.COMENTARIO AS COMENTARIOREPLY,
    RC.FECHA_CREACION AS FECHACOMENTARIO FROM USUARIO U
    INNER JOIN REPLY_COMENT RC ON RC.USUARIO = U.USUARIO
    INNER JOIN COMENTARIOS C ON C.ID_COMENTARIO = RC.ID_COMENTARIO
    INNER JOIN USUARIO U2 ON U2.ID_USUARIO = C.ID_USUARIO
    WHERE U2.ID_USUARIO='$idus' ORDER BY IDREPLY ASC"; 
    
    $consulta_total="SELECT COUNT(rc.id_reply) FROM USUARIO U
    INNER JOIN REPLY_COMENT RC ON RC.USUARIO = U.USUARIO
    INNER JOIN COMENTARIOS C ON C.ID_COMENTARIO = RC.ID_COMENTARIO
    INNER JOIN USUARIO U2 ON U2.ID_USUARIO = C.ID_USUARIO
    WHERE U2.ID_USUARIO='$idus'";        

    $datos = $this->ejecutarConsulta($consulta_datos);
    $datos = $datos->fetchAll();
    $total = $this->ejecutarConsulta($consulta_total);
    $total = (int) $total->fetchColumn();
    if($total == 0) {
        $tabla .= '<div class="alert alert-warning" role="alert">No hay registros en la base de datos</div>';
    } else {        
        $tabla .= '';
        $indice=0;
        foreach($datos as $row) {
            $indice+=1;
            $tabla .= '<div id="comment-reply-'.$indice.'" class="comment comment-reply">
                        <div class="d-flex">
                        <div class="comment-img"><img src="'.APP_URL.'/app/views/assets/imagenes/usuarios/'.$row['FOTO_PERFIL'].'" alt=""></div>
                         <div>
                            <h5><a href="">'.$row['USUARIOREPLY'].'</a> <a href="#" class="reply"><i class="bi bi-reply-fill" title="Responder'.$row['IDREPLY'].'"></i></a></h5>
                            <time datetime="'.$row['FECHACOMENTARIO'].'">'.date('d M, Y', strtotime($row['FECHACOMENTARIO'])).'</time>
                            <p>'                            
                            .$row['COMENTARIOREPLY'].
                            '</p>
                        </div>
                    </div>
                </div>';
        }

        $tabla .= ''; // Cierre de sección y contenedores
    }
    return $tabla;
}

public function detalleBlogController__($id) {
    $tabla="";
    $consulta_datos="SELECT B.*,U.*, CONCAT(U.NOMBRE,' ',U.APELLIDO)AS AUTOR 
                    FROM BLOG B
                    JOIN USUARIO U ON U.USUARIO = B.AUTOR WHERE B.ID_BLOG='$id' and B.ESTADO='ACTIVO'";    
    $consulta_total="SELECT COUNT(id_blog) FROM blog";
    $cant_coment="SELECT COUNT(c.id_comentario) + (SELECT COUNT(id_comentario) FROM reply_coment WHERE estado = 'Activo' AND c.id_comentario =id_comentario) 
    FROM comentarios c  
    WHERE c.estado = 'Activo' AND c.id_blog='$id'"; 
    $consulta_coment="SELECT *,C.FECHA_CREACION AS FECHACOMENTARIO FROM COMENTARIOS C
    INNER JOIN USUARIO U
    ON C.ID_USUARIO = U.ID_USUARIO
    WHERE C.id_blog='$id' AND C.estado='Activo' ORDER BY C.fecha_creacion DESC"; 
     

    $datos = $this->ejecutarConsulta($consulta_datos);
    $datos = $datos->fetchAll();
    $datosComentario = $this->ejecutarConsulta($consulta_coment);
    $datosComentario = $datosComentario->fetchAll();
    $total = $this->ejecutarConsulta($consulta_total);
    $total = (int) $total->fetchColumn();
    $totalcoment = $this->ejecutarConsulta($cant_coment);
    $totalcoment = (int) $totalcoment->fetchColumn();
    if($total == 0) {
        $tabla .= '<div class="alert alert-warning" role="alert">No hay registros en la base de datos</div>';
    } else {        
        $tabla .= '<section id="blog" class="blog">
                    <div class="container" data-aos="fade-up">
                        <div class="row">
                            <div class="col-lg-8 entries">';
        foreach($datos as $row) {
            $tabla .= '<article class="entry">
                        <div class="entry-img">
                            <img src="'.APP_URL.'/app/views/assets/imagenes/blogs/'.$row['PORTADA_BLOG'].'" alt="" class="img-fluid">
                        </div>
                        <h2 class="entry-title">
                            <a href="blog-single.html">'.$row['TITULO'].'</a>
                        </h2>
                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i><a>'.$row['USUARIO'].'</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <time datetime="2020-01-01">'.$row['FECHA_CREACION'].'</time></li>
                                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="#comentarios">'.$totalcoment.' Comentarios</a></li>
                            </ul>
                        </div>
                        <div class="entry-content">
                            <p>'.$row['DESCRIPCION'].'</p>
                        </div>
                    </article>
                    <div class="blog-author d-flex align-items-center">
              <img src="'.APP_URL.'/app/views/assets/imagenes/usuarios/'.$row['FOTO_PERFIL'].'" class="rounded-circle float-left" alt="">
              <div>
                <h4>'.$row['NOMBRE'].' '.$row['APELLIDO'].'</h4>
                <div class="social-links">
                  <a href="https://twitters.com/#"><i class="bi bi-twitter"></i></a>
                  <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                  <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                </div>
                <p>'.$row['COMENTARIO'].'</p>
              </div>
            </div>';
        }

        // Comentarios
        $tabla .= '<div class="blog-comments" id="comentarios">
                      <h4 class="comments-count">'.$totalcoment.' Comentarios</h4>';
        foreach($datosComentario as $row) {
            $fecha_amigable = $this->tiempo_transcurrido($row['FECHACOMENTARIO']);
            $idusucoment=$row['ID_USUARIO'];
            $cant_reply_x_coment="SELECT COUNT(rc.id_reply) FROM USUARIO U INNER JOIN REPLY_COMENT RC ON RC.USUARIO = U.USUARIO
                                    INNER JOIN COMENTARIOS C ON C.ID_COMENTARIO = RC.ID_COMENTARIO INNER JOIN USUARIO U2  ON U2.ID_USUARIO = C.ID_USUARIO
                                    WHERE U2.ID_USUARIO='$idusucoment'";   
            $datosReply = $this->ejecutarConsulta($cant_reply_x_coment);
            $datosReply = (int) $datosReply->fetchColumn();
            $comentreply="" ;
            if($datosReply>0){
                $reply=$this->COMENT_REPLY($idusucoment);
                $comentreply= $reply;
            }else{
                $comentreply="";
            }
            $tabla .= '<div id="comment-'.$row['ID_COMENTARIO'].'" class="comment">
                            <div class="d-flex">
                                <div class="comment-img"><img src="'.APP_URL.'/app/views/assets/imagenes/usuarios/'.$row['FOTO_PERFIL'].'" alt=""></div>
                                <div>
                                    <h5><a>'.$row['NOMBRE'].' '.$row['APELLIDO'].'</a><a href="#" class="reply"><i class="bi bi-reply-fill" title="Responder"></i></a> <a><i class="bi bi-trash3" title="Borrar Comentario"></i></a></h5>
                                    <time datetime="'.$row['FECHACOMENTARIO'].'">'.$fecha_amigable.'</time>
                                    <p>'.$row['COMENTARIO'].'</p>
                                </div>
                            </div>
                        </div>
                        
                        '.$comentreply.'';
                        

        }
        $tabla .= '</div></div>
        '; // Cierre de sección y contenedores
    }
    return $tabla;
}
}?>