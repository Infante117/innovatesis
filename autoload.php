<?php
/*autoload.php lo que hace es cargar las clases de manera automatica, es decir, no es necesario estar llamando a cada una de las clases que se van a utilizar en el proyecto, con solo llamar a autoload.php se cargan todas las clases que se van a utilizar en el proyecto*/
spl_autoload_register(function($clase){
    $archivo = __DIR__."/".$clase.".php";
    $archivo = str_replace("\\", "/", $archivo);
    
    if(is_file($archivo)){
        require_once $archivo;
    }
    else{
        echo "El archivo no existe";
    }
}); 
?>