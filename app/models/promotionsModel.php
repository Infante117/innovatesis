<?php
namespace app\models;
use PDO;

if(file_exists(__DIR__."/../../config/server.php")){
    require_once __DIR__."/../../config/server.php";
}

class promotionsModel{
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

protected function insertarPromotion($datos) {
    try {
        $conexion = $this->conectar();    
        // Crear la cadena de marcadores de posición para los parámetros
        $parametros = rtrim(str_repeat('?, ', count($datos)), ', ');    
        // Crear la cadena de llamada al procedimiento almacenado con marcadores de posición
        $sql = "CALL Procedimiento_InsertarPromocion($parametros)";
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


protected function ActualizarPromotion($datos) {
    try {
        $conexion = $this->conectar();    
        // Crear la cadena de marcadores de posición para los parámetros
        $parametros = rtrim(str_repeat('?, ', count($datos)), ', ');    
        // Crear la cadena de llamada al procedimiento almacenado con marcadores de posición
        $sql = "CALL Procedimiento_ActualizarPromocion($parametros)";
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


protected function bajaPromotion($datos) {
    try {
        $conexion = $this->conectar();    
        // Crear la cadena de marcadores de posición para los parámetros
        $parametros = rtrim(str_repeat('?, ', count($datos)), ', ');    
        // Crear la cadena de llamada al procedimiento almacenado con marcadores de posición
        $sql = "CALL Procedimiento_BajaPromocion($parametros)";
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


protected function altaPromotion($datos) {
    try {
        $conexion = $this->conectar();    
        // Crear la cadena de marcadores de posición para los parámetros
        $parametros = rtrim(str_repeat('?, ', count($datos)), ', ');    
        // Crear la cadena de llamada al procedimiento almacenado con marcadores de posición
        $sql = "CALL Procedimiento_AltaPromocion($parametros)";
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