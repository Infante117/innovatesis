<?php
namespace app\models;
use PDO;

if(file_exists(__DIR__."/../../config/server.php")){
    require_once __DIR__."/../../config/server.php";
}

class blogModel{
    private $server=DB_SERVER;
    private $db=DB_NAME;
    private $user=DB_USER;
    private $pass=DB_PASS;

/*----------  Funcion conectar a BD  ----------*/
protected function conectar(){
    $conexion = new PDO("mysql:host=".$this->server.";dbname=".$this->db,$this->user,$this->pass);
    $conexion->exec("SET CHARACTER SET utf8");
    return $conexion;
}


/*----------  Funcion ejecutar consultas  ----------*/
protected function ejecutarConsulta($consulta){
    $sql=$this->conectar()->prepare($consulta);
    $sql->execute();
    return $sql;
}


/*----------  Funcion limpiar cadenas  ----------*/
public function limpiarCadena($cadena){

    $palabras=["<script>","</script>","<script src","<script type=","SELECT * FROM","SELECT "," SELECT ","DELETE FROM","INSERT INTO","DROP TABLE","DROP DATABASE","TRUNCATE TABLE","SHOW TABLES","SHOW DATABASES","<?php","?>","--","^","<",">","==","=",";","::"];

    $cadena=trim($cadena);
    $cadena=stripslashes($cadena);

    foreach($palabras as $palabra){
        $cadena=str_ireplace($palabra, "", $cadena);
    }

    $cadena=trim($cadena);
    $cadena=stripslashes($cadena);

    return $cadena;
}


/*---------- Funcion verificar datos (expresion regular) ----------*/
protected function verificarDatos($filtro,$cadena){
    if(preg_match("/^".$filtro."$/", $cadena)){
        return false;
    }else{
        return true;
    }
}



/*---------- Funcion seleccionar datos ----------*/
public function seleccionarDatos($tipo,$tabla,$campo,$id){
    $tipo=$this->limpiarCadena($tipo);
    $tabla=$this->limpiarCadena($tabla);
    $campo=$this->limpiarCadena($campo);
    $id=$this->limpiarCadena($id);

    if($tipo=="Unico"){
        $sql=$this->conectar()->prepare("SELECT * FROM $tabla WHERE $campo=:ID");
        $sql->bindParam(":ID",$id);
    }elseif($tipo=="Normal"){
        $sql=$this->conectar()->prepare("SELECT $campo FROM $tabla");
    }
    $sql->execute();

    return $sql;
}

/*---------- Funcion index ----------*/
protected function index($consulta) {
    try {
        $conexion = $this->conectar();
        $statement = $conexion->query($consulta);
        $resultados = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $resultados;
    } catch (\PDOException $e) {
        echo "Error en la consulta: " . $e->getMessage();
    }
}

protected function insertarBlog($datos) {
    try {
        $conexion = $this->conectar();    
        // Crear la cadena de marcadores de posición para los parámetros
        $parametros = rtrim(str_repeat('?, ', count($datos)), ', ');    
        // Crear la cadena de llamada al procedimiento almacenado con marcadores de posición
        $sql = "CALL Procedimiento_InsertarBlog($parametros)";
        // Depuración: imprimir SQL generado
        // echo $sql;
        $query_sql = $conexion->prepare($sql);    
        // Ejecutar el procedimiento almacenado con los valores de los parámetros
        $query_sql->execute(array_values($datos));    
        // Obtener los resultados, si es necesario
        $resultados = $query_sql->fetchAll(\PDO::FETCH_ASSOC);    
        // Cerrar el cursor y la conexión
        $query_sql->closeCursor();
        $conexion = null;                     


         return $resultados;
    } catch(\PDOException $e) {
        // Manejo de errores
        throw new \PDOException("Error en la consulta: " . $e->getMessage());
        return [];
    }
}

protected function updateBlogModel($datos){
    try {
        $conexion = $this->conectar();    
        // Crear la cadena de marcadores de posición para los parámetros
        $parametros = rtrim(str_repeat('?, ', count($datos)), ', ');    
        // Crear la cadena de llamada al procedimiento almacenado con marcadores de posición
        $sql = "CALL Procedimiento_ActualizarBlog($parametros)";
        // Depuración: imprimir SQL generado
        // echo $sql;
        $query_sql = $conexion->prepare($sql);    
        // Ejecutar el procedimiento almacenado con los valores de los parámetros
        $query_sql->execute(array_values($datos));    
        // Obtener los resultados, si es necesario
        $resultados = $query_sql->fetchAll(\PDO::FETCH_ASSOC);    
        // Cerrar el cursor y la conexión
        $query_sql->closeCursor();
        $conexion = null;                     


         return $resultados;
    } catch(\PDOException $e) {
        // Manejo de errores
        throw new \PDOException("Error en la consulta: " . $e->getMessage());
        return [];
    }

}

protected function DarBajaBlogModel($datos){
    try {
        $conexion = $this->conectar();    
        // Crear la cadena de marcadores de posición para los parámetros
        $parametros = rtrim(str_repeat('?, ', count($datos)), ', ');    
        // Crear la cadena de llamada al procedimiento almacenado con marcadores de posición
        $sql = "CALL Procedimiento_DarBajaBlog($parametros)";
        // Depuración: imprimir SQL generado
        // echo $sql;
        $query_sql = $conexion->prepare($sql);    
        // Ejecutar el procedimiento almacenado con los valores de los parámetros
        $query_sql->execute(array_values($datos));    
        // Obtener los resultados, si es necesario
        $resultados = $query_sql->fetchAll(\PDO::FETCH_ASSOC);    
        // Cerrar el cursor y la conexión
        $query_sql->closeCursor();
        $conexion = null;
            
             return $resultados;
        } catch(\PDOException $e) {
            // Manejo de errores
            throw new \PDOException("Error en la consulta: " . $e->getMessage());
            return [];
        }
}

protected function DarAltaBlogModel($datos){
    try {
        $conexion = $this->conectar();    
        // Crear la cadena de marcadores de posición para los parámetros
        $parametros = rtrim(str_repeat('?, ', count($datos)), ', ');    
        // Crear la cadena de llamada al procedimiento almacenado con marcadores de posición
        $sql = "CALL Procedimiento_DarAltaBlog($parametros)";
        // Depuración: imprimir SQL generado
        // echo $sql;
        $query_sql = $conexion->prepare($sql);    
        // Ejecutar el procedimiento almacenado con los valores de los parámetros
        $query_sql->execute(array_values($datos));    
        // Obtener los resultados, si es necesario
        $resultados = $query_sql->fetchAll(\PDO::FETCH_ASSOC);    
        // Cerrar el cursor y la conexión
        $query_sql->closeCursor();
        $conexion = null;
            
             return $resultados;
        } catch(\PDOException $e) {
            // Manejo de errores
            throw new \PDOException("Error en la consulta: " . $e->getMessage());
            return [];
        }
}


/*---------- Paginador de tablas ----------*/
protected function paginadorTablas($pagina, $numeroPaginas, $url, $botones) {
    $tabla = '<div class="blog-pagination"><ul class="justify-content-center">';
    
    for ($i = 1; $i <= $numeroPaginas; $i++) {
        if ($i == $pagina) {
            $tabla .= '<li class="active"><a href="#">' . $i . '</a></li>';
        } else {
            $tabla .= '<li><a href="' . $url . $i . '/">' . $i . '</a></li>';
        }
    }

    $tabla .= '</ul></div>';
    
    return $tabla;
}

protected function insertarComentarioModel($datos){
    try {
        $conexion = $this->conectar();    
        // Crear la cadena de marcadores de posición para los parámetros
        $parametros = rtrim(str_repeat('?, ', count($datos)), ', ');    
        // Crear la cadena de llamada al procedimiento almacenado con marcadores de posición
        $sql = "CALL Procedimiento_Ingresar_Comentario ($parametros)";
        // Depuración: imprimir SQL generado
        // echo $sql;
        $query_sql = $conexion->prepare($sql);    
        // Ejecutar el procedimiento almacenado con los valores de los parámetros
        $query_sql->execute(array_values($datos));    
        // Obtener los resultados, si es necesario
        $resultados = $query_sql->fetchAll(\PDO::FETCH_ASSOC);    
        // Cerrar el cursor y la conexión
        $query_sql->closeCursor();
        $conexion = null;                     


         return $resultados;
    } catch(\PDOException $e) {
        // Manejo de errores
        throw new \PDOException("Error en la consulta: " . $e->getMessage());
        return [];
    }
}

protected function updateComentarioModel($datos){
    try {
        $conexion = $this->conectar();    
        // Crear la cadena de marcadores de posición para los parámetros
        $parametros = rtrim(str_repeat('?, ', count($datos)), ', ');    
        // Crear la cadena de llamada al procedimiento almacenado con marcadores de posición
        $sql = "CALL Procedimiento_Actualizar_Comentario ($parametros)";
        // Depuración: imprimir SQL generado
        // echo $sql;
        $query_sql = $conexion->prepare($sql);    
        // Ejecutar el procedimiento almacenado con los valores de los parámetros
        $query_sql->execute(array_values($datos));    
        // Obtener los resultados, si es necesario
        $resultados = $query_sql->fetchAll(\PDO::FETCH_ASSOC);    
        // Cerrar el cursor y la conexión
        $query_sql->closeCursor();
        $conexion = null;                     


         return $resultados;
    } catch(\PDOException $e) {
        // Manejo de errores
        throw new \PDOException("Error en la consulta: " . $e->getMessage());
        return [];
    }
}

protected function deleteComentarioModel($datos){
    try {
        $conexion = $this->conectar();    
        // Crear la cadena de marcadores de posición para los parámetros
        $parametros = rtrim(str_repeat('?, ', count($datos)), ', ');    
        // Crear la cadena de llamada al procedimiento almacenado con marcadores de posición
        $sql = "CALL Procedimiento_Eliminar_Comentario ($parametros)";
        // Depuración: imprimir SQL generado
        // echo $sql;
        $query_sql = $conexion->prepare($sql);    
        // Ejecutar el procedimiento almacenado con los valores de los parámetros
        $query_sql->execute(array_values($datos));    
        // Obtener los resultados, si es necesario
        $resultados = $query_sql->fetchAll(\PDO::FETCH_ASSOC);    
        // Cerrar el cursor y la conexión
        $query_sql->closeCursor();
        $conexion = null;                     


         return $resultados;
    } catch(\PDOException $e) {
        // Manejo de errores
        throw new \PDOException("Error en la consulta: " . $e->getMessage());
        return [];
    }
}


protected function insertarReplyComentarioModel($datos){
    try {
        $conexion = $this->conectar();    
        // Crear la cadena de marcadores de posición para los parámetros
        $parametros = rtrim(str_repeat('?, ', count($datos)), ', ');    
        // Crear la cadena de llamada al procedimiento almacenado con marcadores de posición
        $sql = "CALL Procedimiento_Ingresar_Reply_Comentario ($parametros)";
        // Depuración: imprimir SQL generado
        // echo $sql;
        $query_sql = $conexion->prepare($sql);    
        // Ejecutar el procedimiento almacenado con los valores de los parámetros
        $query_sql->execute(array_values($datos));    
        // Obtener los resultados, si es necesario
        $resultados = $query_sql->fetchAll(\PDO::FETCH_ASSOC);    
        // Cerrar el cursor y la conexión
        $query_sql->closeCursor();
        $conexion = null;                     


         return $resultados;
    } catch(\PDOException $e) {
        // Manejo de errores
        throw new \PDOException("Error en la consulta: " . $e->getMessage());
        return [];
    }
}

protected function updateReplyComentarioModel($datos){
    try {
        $conexion = $this->conectar();    
        // Crear la cadena de marcadores de posición para los parámetros
        $parametros = rtrim(str_repeat('?, ', count($datos)), ', ');    
        // Crear la cadena de llamada al procedimiento almacenado con marcadores de posición
        $sql = "CALL Procedimiento_Actualizar_Reply_Comentario ($parametros)";
        // Depuración: imprimir SQL generado
        // echo $sql;
        $query_sql = $conexion->prepare($sql);    
        // Ejecutar el procedimiento almacenado con los valores de los parámetros
        $query_sql->execute(array_values($datos));    
        // Obtener los resultados, si es necesario
        $resultados = $query_sql->fetchAll(\PDO::FETCH_ASSOC);    
        // Cerrar el cursor y la conexión
        $query_sql->closeCursor();
        $conexion = null;                     


         return $resultados;
    } catch(\PDOException $e) {
        // Manejo de errores
        throw new \PDOException("Error en la consulta: " . $e->getMessage());
        return [];
    }
}

protected function deleteReplyComentarioModel($datos){
    try {
        $conexion = $this->conectar();    
        // Crear la cadena de marcadores de posición para los parámetros
        $parametros = rtrim(str_repeat('?, ', count($datos)), ', ');    
        // Crear la cadena de llamada al procedimiento almacenado con marcadores de posición
        $sql = "CALL Procedimiento_Delete_Reply_Comentario ($parametros)";
        // Depuración: imprimir SQL generado
        // echo $sql;
        $query_sql = $conexion->prepare($sql);    
        // Ejecutar el procedimiento almacenado con los valores de los parámetros
        $query_sql->execute(array_values($datos));    
        // Obtener los resultados, si es necesario
        $resultados = $query_sql->fetchAll(\PDO::FETCH_ASSOC);    
        // Cerrar el cursor y la conexión
        $query_sql->closeCursor();
        $conexion = null;                     


         return $resultados;
    } catch(\PDOException $e) {
        // Manejo de errores
        throw new \PDOException("Error en la consulta: " . $e->getMessage());
        return [];
    }
}

}