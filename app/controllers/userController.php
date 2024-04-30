<?php
namespace App\Controllers;
use app\models\userModel;

class userController extends userModel{

public function listarUsuarioControlador($id){
    $tabla="";
    $consulta_datos="SELECT U.ID_USUARIO AS ID_USUARIO, U.FOTO_PERFIL AS FOTO_PERFIL, U.DNI AS DNI, U.NOMBRE AS NOMBRE, U.APELLIDO AS APELLIDO,
        U.SEXO AS SEXO,U.FECHA_NACIMIENTO AS FECHA_NACIMIENTO, U.DIRECCION AS DIRECCION, U.NUM_TELEFONICO AS NUM_TELEFONICO, U.CORREO AS CORREO, U.USUARIO AS USUARIO,
        U.CONTRASENA AS CONTRASENA, R.DESCRIPCION AS ROL, E.RAZON_SOCIAL AS EMPRESA, U.FECHA_CREACION AS FECHA_CREACION, 
        U.FECHA_MODIFICACION AS FECHA_MODIFICACION, U.FECHA_ELIMINACION AS FECHA_ELIMINACION,U.FECHA_RESTAURACION AS FECHA_RESTAURACION, U.ESTADO AS ESTADO
         FROM USUARIO U
         INNER JOIN EMPRESA E ON U.ID_EMPRESA = E.ID_EMPRESA
         INNER JOIN ROLES R ON R.ID_ROL = U.ID_ROL WHERE U.ESTADO='Activo' and  U.ID_USUARIO!='$id' and U.ID_ROL!='1' ORDER BY U.ESTADO ASC";
    $consulta_total="SELECT COUNT(ID_USUARIO) FROM usuario WHERE  ID_USUARIO!='$id'";
    $datos = $this->ejecutarConsulta($consulta_datos);
    $datos = $datos->fetchAll();
    $total = $this->ejecutarConsulta($consulta_total);
    $total = (int) $total->fetchColumn();
    if($total==0){
    echo '<div class="alert alert-warning" role="alert">
                 No hay registros en la base de datos
          </div>';
    }else{

        $tabla.='<table id="tableuser" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
            <th># </th>
            <th>Foto </th>
            <th>DNI </th>
            <th>Nombre Completos </th>                
            <th>Sexo </th>
            <th>Fecha Nacimiento </th>
            <th>direccion </th>
            <th>Telefono </th>
            <th>correo </th>
            <th>usuario </th>
            <th>contraseña </th>
            <th>Rol </th>
            <th>Empresa </th> 
            <th>Fecha Creación </th>
            <th>Fecha Modificación </th>          
            <th>Fecha Baja </th>
            <th>Fecha Restaurición </th>
            <th>Estado </th>
            <th>Accion </th>
            </tr>
        </thead>
        <tbody>';

        $contador=+1;
        foreach($datos as $rows){
            /*validamos las fechas vacias */
            $fechamod="";
            $fechadelete="";
            $fecharestaure="";
            $fechanacimiento="";
            if ($rows['FECHA_MODIFICACION']== NULL and $rows['FECHA_ELIMINACION']== NULL and $rows['FECHA_RESTAURACION']== NULL and $rows['FECHA_NACIMIENTO']== NULL){
                $fechamod="";
                $fechadelete="";
                $fecharestaure="";
                $fechanacimiento="";
            }else {
                // Si alguno de los campos de fecha no es NULL, formatea las fechas
                if ($rows['FECHA_MODIFICACION'] !== NULL) {
                    $fechamod = date("d-m-Y h:i:s A", strtotime($rows['FECHA_MODIFICACION']));
                }
                if ($rows['FECHA_ELIMINACION'] !== NULL) {
                    $fechadelete = date("d-m-Y h:i:s A", strtotime($rows['FECHA_ELIMINACION']));
                }
                if ($rows['FECHA_RESTAURACION'] !== NULL) {
                    $fecharestaure = date("d-m-Y h:i:s A", strtotime($rows['FECHA_RESTAURACION']));
                }
                if ($rows['FECHA_NACIMIENTO'] !== NULL) {
                    $fechanacimiento = date("d-m-Y", strtotime($rows['FECHA_NACIMIENTO']));
                }
            }
            $tabla.='
                <tr>
                    <td>'.$contador.'</td>
                    <td><img src="'.APP_URL.'/app/views/assets/imagenes/usuarios/'.$rows['FOTO_PERFIL'].'" width="50" height="50"></td>
                    <td>'.$rows['DNI'].'</td>
                    <td>'.$rows['NOMBRE'].' '.$rows['APELLIDO'].'</td>                    
                    <td>'.$rows['SEXO'].'</td>
                    <td>'.$fechanacimiento.'</td>
                    <td>'.$rows['DIRECCION'].'</td>
                    <td>'.$rows['NUM_TELEFONICO'].'</td>
                    <td>'.$rows['CORREO'].'</td>
                    <td>'.$rows['USUARIO'].'</td>
                    <!--<td>'.$rows['CONTRASENA'].'</td>-->
                    <td>*********</td>
                    <td>'.$rows['ROL'].'</td>
                    <td>'.$rows['EMPRESA'].'</td> 
                    <td>'.date("d-m-Y  h:i:s A",strtotime($rows['FECHA_CREACION'])).'</td>
                    <td>'.$fechamod.'</td>                   
                    <td>'.$fechadelete.'</td>
                    <td>'.$fecharestaure.'</td>
                    <td>'.$rows['ESTADO'].'</td>                                       
                    <td>
                        <a href="'.APP_URL.'DetailsUser/'.$rows['ID_USUARIO'].'/" class="btn btn-warning"><i class="bi bi-eye-fill"></i> ver más</a>                        
                    </td>
                </tr>
            ';
            $contador++;
        }
        $pag_final=$contador-1;
    
    $tabla.='</tbody>
        </table>';   
    

    return $tabla;
    }
}

public function listarClienteControlador(){
    $tabla="";
    $consulta_datos="SELECT U.ID_USUARIO AS ID_USUARIO, U.FOTO_PERFIL AS FOTO_PERFIL, U.DNI AS DNI, U.NOMBRE AS NOMBRE, U.APELLIDO AS APELLIDO,
    U.SEXO AS SEXO,U.FECHA_NACIMIENTO AS FECHA_NACIMIENTO, U.DIRECCION AS DIRECCION, U.NUM_TELEFONICO AS NUM_TELEFONICO, U.CORREO AS CORREO, U.USUARIO AS USUARIO,
    U.CONTRASENA AS CONTRASENA, R.DESCRIPCION AS ROL,U.USUARIO_CREADOR AS USUARIOCREADOR,U.USUARIO_MODIFICADOR AS USERMOD,U.USUARIO_ELIMINADOR AS USUARIO_ELI,U.USUARIO_DALTA AS USUARIORESTAR, E.RAZON_SOCIAL AS EMPRESA, U.FECHA_CREACION AS FECHA_CREACION, 
    U.FECHA_MODIFICACION AS FECHA_MODIFICACION, U.FECHA_ELIMINACION AS FECHA_ELIMINACION,U.FECHA_RESTAURACION AS FECHA_RESTAURACION, U.ESTADO AS ESTADO
    FROM usuario U LEFT JOIN usuario D ON U.USUARIO_CREADOR = D.usuario
    INNER JOIN ROLES R ON R.ID_ROL=U.ID_ROL
    INNER JOIN EMPRESA E ON E.ID_EMPRESA= U.ID_EMPRESA
    WHERE U.ID_ROL = '1' AND (U.USUARIO_ELIMINADOR != '$_SESSION[usuario]' OR (U.USUARIO_ELIMINADOR = '$_SESSION[usuario]' AND U.ESTADO = 'activo')) ORDER BY U.ESTADO ASC";
    $consulta_total="SELECT COUNT(ID_USUARIO) FROM usuario WHERE ID_ROL='1'";
    $datos = $this->ejecutarConsulta($consulta_datos);
    $datos = $datos->fetchAll();
    $total = $this->ejecutarConsulta($consulta_total);
    $total = (int) $total->fetchColumn();
    if($total==0){
    echo '<div class="alert alert-warning" role="alert">
                 No hay registros en la base de datos
          </div>';
    }else{

        $tabla.='<table id="tableuser" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                        <th># </th>
                        <th>Foto </th>
                        <th>DNI </th>
                        <th>Nombre Completos </th>                
                        <th>Sexo </th>
                        <th>Fecha Nacimiento </th>
                        <th>Direccion </th>
                        <th>Telefono </th>
                        <th>Correo </th>
                        <th>Usuario </th>
                        <th>Contraseña </th>
                        <th>Usuario Creador </th>
                        <th>Usuario Mod </th>
                        <th>Usuario Eli </th>
                        <th>Usuario Resta </th>                
		                <th>Fecha Creación </th>
                        <th>Fecha Modificación </th>          
                        <th>Fecha Baja </th>
                        <th>Fecha Restaurición </th>
                        <th>Empresa </th> 
                        <th>Estado </th>
                        <th>Accion </th>
                        </tr>
                    </thead>
                    <tbody>';

        $contador=+1;
        foreach($datos as $rows){
            /*validamos las fechas vacias */
            $fechamod="";
            $fechadelete="";
            $fecharestaure="";
            $fechanacimiento="";
            if ($rows['FECHA_MODIFICACION']== NULL and $rows['FECHA_ELIMINACION']== NULL and $rows['FECHA_RESTAURACION']== NULL and $rows['FECHA_NACIMIENTO']== NULL){
                $fechamod="";
                $fechadelete="";
                $fecharestaure="";
                $fechanacimiento="";
            }else {
                // Si alguno de los campos de fecha no es NULL, formatea las fechas
                if ($rows['FECHA_MODIFICACION'] !== NULL) {
                    $fechamod = date("d-m-Y h:i:s A", strtotime($rows['FECHA_MODIFICACION']));
                }
                if ($rows['FECHA_ELIMINACION'] !== NULL) {
                    $fechadelete = date("d-m-Y h:i:s A", strtotime($rows['FECHA_ELIMINACION']));
                }
                if ($rows['FECHA_RESTAURACION'] !== NULL) {
                    $fecharestaure = date("d-m-Y h:i:s A", strtotime($rows['FECHA_RESTAURACION']));
                }
                if ($rows['FECHA_NACIMIENTO'] !== NULL) {
                    $fechanacimiento = date("d-m-Y", strtotime($rows['FECHA_NACIMIENTO']));
                }
            }
            $tabla.='
                <tr>
                    <td>'.$contador.'</td>
                    <td><img src="'.APP_URL.'/app/views/assets/imagenes/usuarios/'.$rows['FOTO_PERFIL'].'" width="50" height="50"></td>
                    <td>'.$rows['DNI'].'</td>
                    <td>'.$rows['NOMBRE'].' '.$rows['APELLIDO'].'</td>                    
                    <td>'.$rows['SEXO'].'</td>
                    <td>'.$fechanacimiento.'</td>
                    <td>'.$rows['DIRECCION'].'</td>
                    <td>'.$rows['NUM_TELEFONICO'].'</td>
                    <td>'.$rows['CORREO'].'</td>
                    <td>'.$rows['USUARIO'].'</td>
                    <td>*********</td>
                    <td>'.$rows['USUARIOCREADOR'].'</td>
                    <td>'.$rows['USERMOD'].'</td>
                    <td>'.$rows['USUARIO_ELI'].'</td>
                    <td>'.$rows['USUARIORESTAR'].'</td>                    
                    <td>'.date("d-m-Y  h:i:s A",strtotime($rows['FECHA_CREACION'])).'</td>
                    <td>'.$fechamod.'</td>                   
                    <td>'.$fechadelete.'</td>
                    <td>'.$fecharestaure.'</td>
                    <td>'.$rows['EMPRESA'].'</td> 
                    <td>'.$rows['ESTADO'].'</td>                                       
                    <td>
                        <a href="'.APP_URL.'DetailsUser/'.$rows['ID_USUARIO'].'/" class="btn btn-warning"><i class="bi bi-eye-fill"></i> ver más</a>                        
                    </td>
                </tr>
            ';
            $contador++;
        }
        $pag_final=$contador-1;
    
    $tabla.='</tbody>
        </table>';   
    

    return $tabla;
    }
}

public function listarAlumnoPorDocenteControlador($user){
    $tabla="";
    $consulta_datos="SELECT U.ID_USUARIO AS ID_USUARIO, U.FOTO_PERFIL AS FOTO_PERFIL, U.DNI AS DNI, U.NOMBRE AS NOMBRE, U.APELLIDO AS APELLIDO,
    U.SEXO AS SEXO,U.FECHA_NACIMIENTO AS FECHA_NACIMIENTO, U.DIRECCION AS DIRECCION, U.NUM_TELEFONICO AS NUM_TELEFONICO, U.CORREO AS CORREO, U.USUARIO AS USUARIO,
    U.CONTRASENA AS CONTRASENA, R.DESCRIPCION AS ROL, E.RAZON_SOCIAL AS EMPRESA, U.FECHA_CREACION AS FECHA_CREACION, 
    U.FECHA_MODIFICACION AS FECHA_MODIFICACION, U.FECHA_ELIMINACION AS FECHA_ELIMINACION,U.FECHA_RESTAURACION AS FECHA_RESTAURACION, U.ESTADO AS ESTADO
    FROM usuario U LEFT JOIN usuario D ON U.USUARIO_CREADOR = D.usuario
    INNER JOIN ROLES R ON R.ID_ROL=U.ID_ROL
    INNER JOIN EMPRESA E ON E.ID_EMPRESA= U.ID_EMPRESA
    WHERE U.ID_ROL = '1' AND U.USUARIO_CREADOR = '$user' AND U.ESTADO='Activo' ORDER BY U.ESTADO ASC";
    $consulta_total="SELECT COUNT(ID_USUARIO) FROM usuario WHERE ID_ROL='1'";
    $datos = $this->ejecutarConsulta($consulta_datos);
    $datos = $datos->fetchAll();
    $total = $this->ejecutarConsulta($consulta_total);
    $total = (int) $total->fetchColumn();
    if($total==0){
    echo '<div class="alert alert-warning" role="alert">
                 No hay registros en la base de datos
          </div>';
    }else{

        $tabla.='<table id="tableuser" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th># </th>
                            <th>Foto </th>
                            <th>DNI </th>
                            <th>Nombre Completos </th>                
                            <th>Sexo </th>
                            <th>Fecha Nacimiento </th>
                            <th>direccion </th>
                            <th>Telefono </th>
                            <th>correo </th>
                            <th>usuario </th>
                            <th>contraseña </th>
                            <th>Empresa </th> 
		                    <th>Fecha Creación </th>
                            <th>Fecha Modificación </th>          
                            <th>Fecha Baja </th>
                            <th>Fecha Restaurición </th>
                            <th>Estado </th>
                            <th>Accion </th>
                        </tr>
                    </thead>
                    <tbody>';

        $contador=+1;
        foreach($datos as $rows){
            /*validamos las fechas vacias */
            $fechamod="";
            $fechadelete="";
            $fecharestaure="";
            $fechanacimiento="";
            if ($rows['FECHA_MODIFICACION']== NULL and $rows['FECHA_ELIMINACION']== NULL and $rows['FECHA_RESTAURACION']== NULL and $rows['FECHA_NACIMIENTO']== NULL){
                $fechamod="";
                $fechadelete="";
                $fecharestaure="";
                $fechanacimiento="";
            }else {
                // Si alguno de los campos de fecha no es NULL, formatea las fechas
                if ($rows['FECHA_MODIFICACION'] !== NULL) {
                    $fechamod = date("d-m-Y h:i:s A", strtotime($rows['FECHA_MODIFICACION']));
                }
                if ($rows['FECHA_ELIMINACION'] !== NULL) {
                    $fechadelete = date("d-m-Y h:i:s A", strtotime($rows['FECHA_ELIMINACION']));
                }
                if ($rows['FECHA_RESTAURACION'] !== NULL) {
                    $fecharestaure = date("d-m-Y h:i:s A", strtotime($rows['FECHA_RESTAURACION']));
                }
                if ($rows['FECHA_NACIMIENTO'] !== NULL) {
                    $fechanacimiento = date("d-m-Y", strtotime($rows['FECHA_NACIMIENTO']));
                }
            }
            $tabla.='
                <tr>
                    <td>'.$contador.'</td>
                    <td><img src="'.APP_URL.'/app/views/assets/imagenes/usuarios/'.$rows['FOTO_PERFIL'].'" width="50" height="50"></td>
                    <td>'.$rows['DNI'].'</td>
                    <td>'.$rows['NOMBRE'].' '.$rows['APELLIDO'].'</td>                    
                    <td>'.$rows['SEXO'].'</td>
                    <td>'.$fechanacimiento.'</td>
                    <td>'.$rows['DIRECCION'].'</td>
                    <td>'.$rows['NUM_TELEFONICO'].'</td>
                    <td>'.$rows['CORREO'].'</td>
                    <td>'.$rows['USUARIO'].'</td>
                    <!--<td>'.$rows['CONTRASENA'].'</td>-->
                    <td>*********</td>
                    <td>'.$rows['EMPRESA'].'</td> 
                    <td>'.date("d-m-Y  h:i:s A",strtotime($rows['FECHA_CREACION'])).'</td>
                    <td>'.$fechamod.'</td>                   
                    <td>'.$fechadelete.'</td>
                    <td>'.$fecharestaure.'</td>
                    <td>'.$rows['ESTADO'].'</td>                                       
                    <td>
                        <a href="'.APP_URL.'DetailsUser/'.$rows['ID_USUARIO'].'/" class="btn btn-warning"><i class="bi bi-eye-fill"></i> ver más</a>                        
                    </td>
                </tr>
            ';
            $contador++;
        }
        $pag_final=$contador-1;
    
    $tabla.='</tbody>
        </table>';   
    

    return $tabla;
    }
}

public function listarAlumnoPorDocenteControladorEliminado($user){
    $tabla="";
    $consulta_datos="SELECT U.ID_USUARIO AS ID_USUARIO, U.FOTO_PERFIL AS FOTO_PERFIL, U.DNI AS DNI, U.NOMBRE AS NOMBRE, U.APELLIDO AS APELLIDO,
    U.SEXO AS SEXO,U.FECHA_NACIMIENTO AS FECHA_NACIMIENTO, U.DIRECCION AS DIRECCION, U.NUM_TELEFONICO AS NUM_TELEFONICO, U.CORREO AS CORREO, U.USUARIO AS USUARIO,
    U.CONTRASENA AS CONTRASENA, R.DESCRIPCION AS ROL, E.RAZON_SOCIAL AS EMPRESA, U.FECHA_CREACION AS FECHA_CREACION, 
    U.FECHA_MODIFICACION AS FECHA_MODIFICACION, U.FECHA_ELIMINACION AS FECHA_ELIMINACION,U.FECHA_RESTAURACION AS FECHA_RESTAURACION, U.ESTADO AS ESTADO
    FROM usuario U LEFT JOIN usuario D ON U.USUARIO_CREADOR = D.usuario
    INNER JOIN ROLES R ON R.ID_ROL=U.ID_ROL
    INNER JOIN EMPRESA E ON E.ID_EMPRESA= U.ID_EMPRESA
    WHERE U.ID_ROL = '1' AND U.USUARIO_CREADOR = '$user' AND U.ESTADO='Inactivo' AND U.USUARIO_ELIMINADOR='$_SESSION[usuario]' ORDER BY U.ESTADO ASC";
    $consulta_total="SELECT COUNT(ID_USUARIO) FROM usuario WHERE ID_ROL='1'";
    $datos = $this->ejecutarConsulta($consulta_datos);
    $datos = $datos->fetchAll();
    $total = $this->ejecutarConsulta($consulta_total);
    $total = (int) $total->fetchColumn();
    if($total==0){
    echo '<div class="alert alert-warning" role="alert">
                 No hay registros en la base de datos
          </div>';
    }else{

        $tabla.='<table id="example2" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                        <th># </th>
                        <th>Foto </th>
                        <th>DNI </th>
                        <th>Nombre Completos </th>  
                        <th>Correo </th>
                        <th>Usuario </th>       
                        <th>Fecha Baja </th>
                        <th>Accion </th>
                        </tr>
                    </thead>
                    <tbody>';

        $contador=+1;
        foreach($datos as $rows){
            /*validamos las fechas vacias */
            $fechamod="";
            $fechadelete="";
            $fecharestaure="";
            $fechanacimiento="";
            if ($rows['FECHA_MODIFICACION']== NULL and $rows['FECHA_ELIMINACION']== NULL and $rows['FECHA_RESTAURACION']== NULL and $rows['FECHA_NACIMIENTO']== NULL){
                $fechamod="";
                $fechadelete="";
                $fecharestaure="";
                $fechanacimiento="";
            }else {
                // Si alguno de los campos de fecha no es NULL, formatea las fechas
                if ($rows['FECHA_MODIFICACION'] !== NULL) {
                    $fechamod = date("d-m-Y h:i:s A", strtotime($rows['FECHA_MODIFICACION']));
                }
                if ($rows['FECHA_ELIMINACION'] !== NULL) {
                    $fechadelete = date("d-m-Y h:i:s A", strtotime($rows['FECHA_ELIMINACION']));
                }
                if ($rows['FECHA_RESTAURACION'] !== NULL) {
                    $fecharestaure = date("d-m-Y h:i:s A", strtotime($rows['FECHA_RESTAURACION']));
                }
                if ($rows['FECHA_NACIMIENTO'] !== NULL) {
                    $fechanacimiento = date("d-m-Y", strtotime($rows['FECHA_NACIMIENTO']));
                }
            }
            $tabla.='
                <tr>
                    <td>'.$contador.'</td>
                    <td><img src="'.APP_URL.'/app/views/assets/imagenes/usuarios/'.$rows['FOTO_PERFIL'].'" width="50" height="50"></td>
                    <td>'.$rows['DNI'].'</td>
                    <td>'.$rows['NOMBRE'].' '.$rows['APELLIDO'].'</td>
                    <td>'.$rows['CORREO'].'</td>
                    <td>'.$rows['USUARIO'].'</td>                 
                    <td>'.$fechadelete.'</td>                                     
                    <td>
                        <a href="'.APP_URL.'DetailsUser/'.$rows['ID_USUARIO'].'/" class="btn btn-warning"><i class="bi bi-eye-fill"></i> ver más</a>                        
                    </td>
                </tr>
            ';
            $contador++;
        }
        $pag_final=$contador-1;
    
    $tabla.='</tbody>
        </table>';   
    

    return $tabla;
    }
}

public function listarUsuarioControladorINACTIVO(){

    $tabla="";
    $consulta_datos="SELECT U.ID_USUARIO AS ID_USUARIO, U.FOTO_PERFIL AS FOTO_PERFIL, U.DNI AS DNI, U.NOMBRE AS NOMBRE, U.APELLIDO AS APELLIDO,
    U.SEXO AS SEXO,U.FECHA_NACIMIENTO AS FECHA_NACIMIENTO, U.DIRECCION AS DIRECCION, U.NUM_TELEFONICO AS NUM_TELEFONICO, U.CORREO AS CORREO, U.USUARIO AS USUARIO,
    U.CONTRASENA AS CONTRASENA, R.DESCRIPCION AS ROL,U.USUARIO_CREADOR AS USUARIOCREADOR,U.USUARIO_MODIFICADOR AS USERMOD,U.USUARIO_ELIMINADOR AS USUARIO_ELI,U.USUARIO_DALTA AS USUARIORESTAR, E.RAZON_SOCIAL AS EMPRESA, U.FECHA_CREACION AS FECHA_CREACION, 
    U.FECHA_MODIFICACION AS FECHA_MODIFICACION, U.FECHA_ELIMINACION AS FECHA_ELIMINACION,U.FECHA_RESTAURACION AS FECHA_RESTAURACION, U.ESTADO AS ESTADO
    FROM usuario U LEFT JOIN usuario D ON U.USUARIO_CREADOR = D.usuario
    INNER JOIN ROLES R ON R.ID_ROL=U.ID_ROL
    INNER JOIN EMPRESA E ON E.ID_EMPRESA= U.ID_EMPRESA WHERE U.ESTADO='Inactivo' AND U.USUARIO_ELIMINADOR='$_SESSION[usuario]' ORDER BY U.ESTADO ASC";
    $consulta_total="SELECT COUNT(ID_USUARIO) FROM usuario WHERE  ID_USUARIO!='1'";
    $datos = $this->ejecutarConsulta($consulta_datos);
    $datos = $datos->fetchAll();
    $total = $this->ejecutarConsulta($consulta_total);
    $total = (int) $total->fetchColumn();
    if($total==0){
    echo '<div class="alert alert-warning" role="alert">
                 No hay registros en la base de datos
          </div>';
    }else{

        $tabla.='<table id="example2" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th># </th>
                    <th>Foto </th>
                    <th>DNI </th>
                    <th>Nombre Completos </th>  
                    <th>Correo </th>
                    <th>Usuario </th>                           
                    <th>Fecha Baja </th>
                    <th>Elim. Por </th> 
                    <th>Accion </th>
                </tr>
            </thead>
            <tbody>';

        $contador=+1;
        foreach($datos as $rows){
            /*validamos las fechas vacias */
            $fechamod="";
            $fechadelete="";
            $fecharestaure="";
            $fechanacimiento="";
            if ($rows['FECHA_MODIFICACION']== NULL and $rows['FECHA_ELIMINACION']== NULL and $rows['FECHA_RESTAURACION']== NULL and $rows['FECHA_NACIMIENTO']== NULL){
                $fechamod="";
                $fechadelete="";
                $fecharestaure="";
                $fechanacimiento="";
            }else {
                // Si alguno de los campos de fecha no es NULL, formatea las fechas
                if ($rows['FECHA_MODIFICACION'] !== NULL) {
                    $fechamod = date("d-m-Y h:i:s A", strtotime($rows['FECHA_MODIFICACION']));
                }
                if ($rows['FECHA_ELIMINACION'] !== NULL) {
                    $fechadelete = date("d-m-Y h:i:s A", strtotime($rows['FECHA_ELIMINACION']));
                }
                if ($rows['FECHA_RESTAURACION'] !== NULL) {
                    $fecharestaure = date("d-m-Y h:i:s A", strtotime($rows['FECHA_RESTAURACION']));
                }
                if ($rows['FECHA_NACIMIENTO'] !== NULL) {
                    $fechanacimiento = date("d-m-Y", strtotime($rows['FECHA_NACIMIENTO']));
                }
            }
            $tabla.='
                <tr>
                    <td>'.$contador.'</td>
                    <td><img src="'.APP_URL.'/app/views/assets/imagenes/usuarios/'.$rows['FOTO_PERFIL'].'" width="50" height="50"></td>
                    <td>'.$rows['DNI'].'</td>
                    <td>'.$rows['NOMBRE'].' '.$rows['APELLIDO'].'</td>  
                    <td>'.$rows['CORREO'].'</td>
                    <td>'.$rows['USUARIO'].'</td>                                   
                    <td>'.$fechadelete.'</td>
                    <td>'.$rows['USUARIO_ELI'].'</td>                                       
                    <td>
                        <a href="'.APP_URL.'DetailsUser/'.$rows['ID_USUARIO'].'/" class="btn btn-warning"><i class="bi bi-eye-fill"></i> ver más</a>                        
                    </td>
                </tr>
            ';
            $contador++;
        }
        $pag_final=$contador-1;
    
    $tabla.='</tbody></table>';   
    

    return $tabla;
    }
}

public function listarUsuariosxid($id) {
    $consulta = "SELECT u.id_usuario AS id, u.foto AS foto, u.dni AS dni, u.nombre AS nombre, u.apellido AS apellido, u.sexo AS sexo,u.fecha_nacimiento as fecha_nacimiento,u.direccion AS direccion, u.telefono AS telefono, u.correo AS correo, u.usuario AS usuario, u.contrasena AS contrasena,u.profesion AS profesion,u.observacionAdicional AS observacionAdicional, p.descripcion AS rol, e.razon_social AS empresa, u.estado AS estado  FROM usuario u INNER JOIN empresa e ON u.id_empresa = e.id_empresa INNER JOIN privilegios p ON p.id_privilegio = u.id_privilegio WHERE u.id_usuario = $id";
    $resultados = $this->index($consulta);

    return $resultados;
}

public function listarUsuariosxidD($id) {
    $consulta = "SELECT U.ID_USUARIO AS ID_USUARIO, U.FOTO_PERFIL AS FOTO_PERFIL, U.DNI AS DNI, U.NOMBRE AS NOMBRE, U.APELLIDO AS APELLIDO, U.SEXO AS SEXO, U.FECHA_NACIMIENTO AS FECHA_NACIMIENTO,U.ESTADO_CIVIL AS ESTADO_CIVIL, U.DIRECCION AS DIRECCION, U.NUM_TELEFONICO AS NUM_TELEFONICO, U.CORREO AS CORREO, U.USUARIO AS USUARIO, U.CONTRASENA AS CONTRASENA,U.PROFESION AS PROFESION,U.CURRICULUM AS CURRICULUM,U.INFO_ADICIONAL AS INFO_ADICIONAL, R.ID_ROL AS PRIVILEGIO, E.RAZON_SOCIAL AS EMPRESA, U.ESTADO AS ESTADO,U.S_FACEBOOK AS S_FACEBOOK,U.S_TWITTER AS S_TWITTER,U.S_INSTAGRAM AS S_INSTAGRAM,U.S_LINKEDIN AS S_LINKEDIN ,U.CURRICULUM AS CURRICULUM
                 FROM USUARIO U INNER JOIN EMPRESA E 
                 ON U.ID_EMPRESA = E.ID_EMPRESA 
                 INNER JOIN ROLES R ON R.ID_ROL = U.ID_ROL 
                 WHERE U.ID_USUARIO = $id";
    $resultados = $this->index($consulta);

    return $resultados;
}

public function listaRoles(){
    $consulta = "SELECT * FROM roles";
    $resultados = $this->index($consulta);
    return $resultados;
 
}

public function listaRolesXid($id){
    $consulta = "SELECT * FROM roles where id_rol=$id";
    $resultados = $this->index($consulta);
    return $resultados;
 
}

public function ConsultaFoto($id){
    $consulta = "SELECT * FROM usuario where ID_USUARIO=$id";
    $resultados = $this->index($consulta);
    return $resultados;
 
}

public function ListarUsuariosInactivos(){
    $consulta = "SELECT * FROM usuario where estado='Inactivo' AND ID_ROL!='1'";
    $resultados = $this->index($consulta);
    return $resultados;
}

public function ListarAlumnosInactivos(){
    $consulta = "SELECT * FROM usuario where estado='Inactivo' AND ID_ROL='1' AND USUARIO_ELIMINADOR='$_SESSION[usuario]'";
    $resultados = $this->index($consulta);
    return $resultados;
}

public function insertarUsuarioControlador() {
    //almacenamos los datos que vienen del formulario en un array
    $dni = $this->limpiarCadena($_POST['dni_usuario']);
    $nombre = $this->limpiarCadena($_POST['nomb_usuario']);
    $apellido = $this->limpiarCadena($_POST['ape_usuario']);
    $sexo = $this->limpiarCadena($_POST['sexo_usuario']);
    $fechaNac = $this->limpiarCadena($_POST['fechaNac_usuario']);
    $estadoCivil=$this->limpiarCadena($_POST['estadoCivil']);
    $direccion = $this->limpiarCadena($_POST['dir_usuario']);
    $telefono = $this->limpiarCadena($_POST['tel_usuario']); 
    $correo = $this->limpiarCadena($_POST['email_usuario']);
    $usuario = $this->limpiarCadena($_POST['usuario_usuario']);
    $contrasena = $this->limpiarCadena($_POST['clave_usuario']);
    $twitter = $this->limpiarCadena($_POST['twitter_usuario']);
    $facebook = $this->limpiarCadena($_POST['facebook_usuario']);
    $instagram = $this->limpiarCadena($_POST['instagram_usuario']);
    $linkedin = $this->limpiarCadena($_POST['linkedin_usuario']);
    $profesion = $this->limpiarCadena($_POST['profesion_usuario']);
    $observacionAdicional = $this->limpiarCadena($_POST['observacionAdicional_usuario']);
    $id_privilegio = $this->limpiarCadena($_POST['rol_usuario']);
    $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);
    $usuario_creador = $_SESSION['usuario'];

    // Verificamos los campos obligatorios
    $camposObligatorios = ["nombre", "apellido", "dni", "sexo", "fechaNac", "direccion", "telefono", "correo", "usuario", "contrasena", "id_privilegio"];
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
        ["^[0-9]{8}$", $dni, "El DNI no coincide con el formato solicitado"],
        ["^[a-zA-Z ]{3,30}$", $nombre, "El nombre no coincide con el formato solicitado"],
        ["^[a-zA-Z ]{3,30}$", $apellido, "El apellido no coincide con el formato solicitado"],
        ["^[a-zA-Z ]{1,10}$", $sexo, "El sexo no coincide con el formato solicitado"],
        ["^[0-9]{9}$", $telefono, "El teléfono no coincide con el formato solicitado"],
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

    // Verificamos si el correo ya existe
    if ($correo != "" && filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $check_email = $this->ejecutarConsulta("SELECT correo FROM usuario WHERE correo='$correo'");
        if ($check_email->rowCount() > 0) {
            $alerta =["tipo"=>"simple",
                       "titulo"=> "Ocurrió un error inesperado",
                       "texto"=> "El EMAIL que acaba de ingresar ya se encuentra registrado en el sistema, por favor verifique e intente nuevamente", 
                       "icono"=>"error"];
            return json_encode($alerta);
            exit();
        }
    } elseif ($correo != "") {
        $alerta =["tipo"=>"simple", 
                   "titulo"=>"Ocurrió un error inesperado", 
                   "texto"=> "Ha ingresado un correo electrónico no válido",
                    "icono"=>"error"];
        return json_encode($alerta);
            exit();
    }

    // Verificamos si el usuario ya existe
    $check_usuario = $this->ejecutarConsulta("SELECT usuario FROM usuario WHERE usuario='$usuario'");
    if ($check_usuario->rowCount() > 0) {
        $alerta =["tipo"=>"simple", 
                   "titulo"=>"Ocurrió un error inesperado", 
                   "texto"=> "ElUSUARIO que acaba de ingresar ya se encuentra registrado en el sistema, por favor verifique e intente nuevamente", 
                   "icono"=>"error"];
        return json_encode($alerta);
            exit();
    }

    // Directorio de fotos
    $img_dir = "../views/assets/imagenes/usuarios/";

    $formatosPermitidos = ["jpeg", "png", "jpg"];
    $imagen = $_FILES['usuario_foto']['tmp_name'];
    $nombre_imagen = $_FILES['usuario_foto']['name'];
    $tipo_imagen = strtolower(pathinfo($nombre_imagen, PATHINFO_EXTENSION)); // Corregido el error de escritura en strtolower
    $tamano_imagen = $_FILES['usuario_foto']['size'];
        
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
        $foto = str_ireplace(" ", "_", $nombre) . "_" . rand(0, 100);

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

    //enviamos los datos del curriculum
    //directorio de curriculum
    $directorio_documento = "../views/assets/documents/";

    $formatosPermitido = ["pdf"];
    $documento = $_FILES['cv']['tmp_name'];
    $nombre_documento = $_FILES['cv']['name'];
    $tipo_documento = strtolower(pathinfo($nombre_documento, PATHINFO_EXTENSION)); // Corregido el error de escritura en strtolower
    $tamano_documento = $_FILES['cv']['size'];

    if ($nombre_documento != "" && $tamano_documento > 0) {
        // Creando directorio
        if (!file_exists($directorio_documento) && !mkdir($directorio_documento, 0777)) {
            $alerta =["tipo"=>"simple",
                       "titulo"=> "Ocurrió un error inesperado",
                       "texto"=> "Error al crear el directorio", 
                       "icono"=>"error"];
            return json_encode($alerta);
            exit();
        }

        
        // Validamos si la imagen es permitida
        if (!in_array($tipo_documento, $formatosPermitido)) { // Corregido la verificación de la extensión del archivo
            $alerta = [
                "tipo" => "simple",
                "titulo" => "Ocurrió un error inesperado",
                "texto" => "El documento que ha seleccionado es de un formato no permitido",
                "icono" => "error"
            ];
            echo json_encode($alerta); // Usamos echo en lugar de return para imprimir el JSON
            exit();
        }


        // Verificando peso de la imagen
        if (($tamano_documento / 1024) > 5120) {
            $alerta =["tipo"=>"simple",
                       "titulo"=> "Ocurrió un error inesperado",
                       "texto"=> "El documento que ha seleccionado supera el peso permitido, formatos permitidos pdf",
                       "icono"=> "error"];
            return json_encode($alerta);
            exit();
        }

        // Nombre del curriculum
        $curriculum = str_ireplace(" ", "_", $nombre) . "_" . rand(0, 100);

        // Extensión de la imagen
        switch ($tipo_documento) {
                case 'pdf':
                $curriculum .= ".pdf";
                break;
        }

        chmod($directorio_documento, 0755);

        // Moviendo imagen al directorio
        if (!move_uploaded_file($documento, $directorio_documento . $curriculum)) {
            $alerta =["tipo"=>"simple",
                       "titulo"=> "Ocurrió un error inesperado",
                       "texto"=> "No podemos subir el documento al sistema en este momento",
                       "icono"=> "error"];
          return json_encode($alerta);
            exit();
        }
    } else {
        $curriculum = "";
    }



    $datos = array(
        
        "foto" => $foto,
        "dni" => $dni,
        "nombre" => $nombre,
        "apellido" => $apellido,
        "sexo" => $sexo,
        "fechaNac" => $fechaNac,
        "estadoCivil" => $estadoCivil,
        "direccion" => $direccion,
        "correo" => $correo,
        "profesion" => $profesion,
        "curriculum"=>$curriculum,
        "observacionAdicional" => $observacionAdicional,
        "telefono" => $telefono,        
        "usuario" => $usuario,
        "contrasena" => $contrasena_hash, 
        "facebook"=>$facebook,
        "twitter"=>$twitter,
        "instagram"=>$instagram,
        "linkedin"=>$linkedin,           
        "id_privilegio" => $id_privilegio,
        "usuario_creador" => $usuario_creador);

   
    #ahora si lo enviamos a la funcion insertarUsuario

    $response = $this->insertarUsuario($datos);

    if($response>0){
        $alerta=[
            "tipo"=>"limpiarRegistroUsuario",
            "titulo"=>"Usuario registrado",
            "texto"=>"El usuario ".$nombre." ".$apellido." se registro con exito",
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
            "texto"=>"No se pudo registrar el usuario, por favor intente nuevamente",
            "icono"=>"error"
        ];
    }

    return json_encode($alerta);
}

public function insertarAlumnoControlador() {
    //almacenamos los datos que vienen del formulario en un array
    $dni = $this->limpiarCadena($_POST['dni_usuario']);
    $nombre = $this->limpiarCadena($_POST['nomb_usuario']);
    $apellido = $this->limpiarCadena($_POST['ape_usuario']);
    $sexo = $this->limpiarCadena($_POST['sexo_usuario']);
    $fechaNac = $this->limpiarCadena($_POST['fechaNac_usuario']);
    $estadoCivil=$this->limpiarCadena($_POST['estadoCivil']);
    $direccion = $this->limpiarCadena($_POST['dir_usuario']);
    $telefono = $this->limpiarCadena($_POST['tel_usuario']); 
    $correo = $this->limpiarCadena($_POST['email_usuario']);
    $usuario = $this->limpiarCadena($_POST['usuario_usuario']);
    $contrasena = $this->limpiarCadena($_POST['clave_usuario']);
    $twitter = $this->limpiarCadena($_POST['twitter_usuario']);
    $facebook = $this->limpiarCadena($_POST['facebook_usuario']);
    $instagram = $this->limpiarCadena($_POST['instagram_usuario']);
    $linkedin = $this->limpiarCadena($_POST['linkedin_usuario']);
    $profesion = $this->limpiarCadena($_POST['profesion_usuario']);
    $observacionAdicional = $this->limpiarCadena($_POST['observacionAdicional_usuario']);
    $id_privilegio = "1";
    $usuario_creador = $_SESSION['usuario'];
    $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);

    // Verificamos los campos obligatorios
    $camposObligatorios = ["nombre", "apellido", "dni", "sexo", "fechaNac", "direccion", "telefono", "correo", "usuario", "contrasena", "id_privilegio"];
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
        ["^[0-9]{8}$", $dni, "El DNI no coincide con el formato solicitado"],
        ["^[a-zA-Z ]{3,30}$", $nombre, "El nombre no coincide con el formato solicitado"],
        ["^[a-zA-Z ]{3,30}$", $apellido, "El apellido no coincide con el formato solicitado"],
        ["^[a-zA-Z ]{1,10}$", $sexo, "El sexo no coincide con el formato solicitado"],
        ["^[^<>]{3,50}$", $direccion, "La dirección no coincide con el formato solicitado"],
        ["^[0-9]{9}$", $telefono, "El teléfono no coincide con el formato solicitado"],
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

    // Verificamos si el correo ya existe
    if ($correo != "" && filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $check_email = $this->ejecutarConsulta("SELECT correo FROM usuario WHERE correo='$correo'");
        if ($check_email->rowCount() > 0) {
            $alerta =["tipo"=>"simple",
                       "titulo"=> "Ocurrió un error inesperado",
                       "texto"=> "El EMAIL que acaba de ingresar ya se encuentra registrado en el sistema, por favor verifique e intente nuevamente", 
                       "icono"=>"error"];
            return json_encode($alerta);
            exit();
        }
    } elseif ($correo != "") {
        $alerta =["tipo"=>"simple", 
                   "titulo"=>"Ocurrió un error inesperado", 
                   "texto"=> "Ha ingresado un correo electrónico no válido",
                    "icono"=>"error"];
        return json_encode($alerta);
            exit();
    }

    // Verificamos si el usuario ya existe
    $check_usuario = $this->ejecutarConsulta("SELECT usuario FROM usuario WHERE usuario='$usuario'");
    if ($check_usuario->rowCount() > 0) {
        $alerta =["tipo"=>"simple", 
                   "titulo"=>"Ocurrió un error inesperado", 
                   "texto"=> "ElUSUARIO que acaba de ingresar ya se encuentra registrado en el sistema, por favor verifique e intente nuevamente", 
                   "icono"=>"error"];
        return json_encode($alerta);
            exit();
    }

    // Directorio de fotos
    $img_dir = "../views/assets/imagenes/usuarios/";

    $formatosPermitidos = ["jpeg", "png", "jpg"];
    $imagen = $_FILES['usuario_foto']['tmp_name'];
    $nombre_imagen = $_FILES['usuario_foto']['name'];
    $tipo_imagen = strtolower(pathinfo($nombre_imagen, PATHINFO_EXTENSION)); // Corregido el error de escritura en strtolower
    $tamano_imagen = $_FILES['usuario_foto']['size'];
        
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
        $foto = str_ireplace(" ", "_", $nombre) . "_" . rand(0, 100);

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

    //enviamos los datos del curriculum
    //directorio de curriculum
    $directorio_documento = "../views/assets/documents/";

    $formatosPermitido = ["pdf"];
    $documento = $_FILES['cv']['tmp_name'];
    $nombre_documento = $_FILES['cv']['name'];
    $tipo_documento = strtolower(pathinfo($nombre_documento, PATHINFO_EXTENSION)); // Corregido el error de escritura en strtolower
    $tamano_documento = $_FILES['cv']['size'];

    if ($nombre_documento != "" && $tamano_documento > 0) {
        // Creando directorio
        if (!file_exists($directorio_documento) && !mkdir($directorio_documento, 0777)) {
            $alerta =["tipo"=>"simple",
                       "titulo"=> "Ocurrió un error inesperado",
                       "texto"=> "Error al crear el directorio", 
                       "icono"=>"error"];
            return json_encode($alerta);
            exit();
        }

        
        // Validamos si la imagen es permitida
        if (!in_array($tipo_documento, $formatosPermitido)) { // Corregido la verificación de la extensión del archivo
            $alerta = [
                "tipo" => "simple",
                "titulo" => "Ocurrió un error inesperado",
                "texto" => "El documento que ha seleccionado es de un formato no permitido",
                "icono" => "error"
            ];
            echo json_encode($alerta); // Usamos echo en lugar de return para imprimir el JSON
            exit();
        }


        // Verificando peso de la imagen
        if (($tamano_documento / 1024) > 5120) {
            $alerta =["tipo"=>"simple",
                       "titulo"=> "Ocurrió un error inesperado",
                       "texto"=> "El documento que ha seleccionado supera el peso permitido, formatos permitidos pdf",
                       "icono"=> "error"];
            return json_encode($alerta);
            exit();
        }

        // Nombre del curriculum
        $curriculum = str_ireplace(" ", "_", $nombre) . "_" . rand(0, 100);

        // Extensión de la imagen
        switch ($tipo_documento) {
                case 'pdf':
                $curriculum .= ".pdf";
                break;
        }

        chmod($directorio_documento, 0755);

        // Moviendo imagen al directorio
        if (!move_uploaded_file($documento, $directorio_documento . $curriculum)) {
            $alerta =["tipo"=>"simple",
                       "titulo"=> "Ocurrió un error inesperado",
                       "texto"=> "No podemos subir el documento al sistema en este momento",
                       "icono"=> "error"];
          return json_encode($alerta);
            exit();
        }
    } else {
        $curriculum = "";
    }



    $datos = array(
        
        "foto" => $foto,
        "dni" => $dni,
        "nombre" => $nombre,
        "apellido" => $apellido,
        "sexo" => $sexo,
        "fechaNac" => $fechaNac,
        "estadoCivil" => $estadoCivil,
        "direccion" => $direccion,
        "correo" => $correo,
        "profesion" => $profesion,
        "curriculum"=>$curriculum,
        "observacionAdicional" => $observacionAdicional,
        "telefono" => $telefono,        
        "usuario" => $usuario,
        "contrasena" => $contrasena_hash, 
        "facebook"=>$facebook,
        "twitter"=>$twitter,
        "instagram"=>$instagram,
        "linkedin"=>$linkedin,           
        "id_privilegio" => $id_privilegio,
        "usuario_creador" => $usuario_creador);

   
    #ahora si lo enviamos a la funcion insertarUsuario

    $response = $this->insertarUsuario($datos);

    if($response>0){
        $alerta=[
            "tipo"=>"limpiarRegistroAlumno",
            "titulo"=>"Alumno registrado",
            "texto"=>"El Alumno ".$nombre." ".$apellido." se registro con exito",
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
            "texto"=>"No se pudo registrar el Alumno, por favor intente nuevamente",
            "icono"=>"error"
        ];
    }

    return json_encode($alerta);
}

public function insertarClienteControlador() {
    //almacenamos los datos que vienen del formulario en un array
    $nombre = $this->limpiarCadena($_POST['su_nombreCliente']);
    $apellido = $this->limpiarCadena($_POST['su_apellidoCliente']);
    $correo = $this->limpiarCadena($_POST['su_correoCliente']);
    $telefono = $this->limpiarCadena($_POST['su_telefonoCliente']); 
    $sexo = $this->limpiarCadena($_POST['su_generoCliente']);
    $fechaNac = $this->limpiarCadena($_POST['su_fechaNacimientoCliente']);
    $usuario = $this->limpiarCadena($_POST['su_usuarioCliente']);
    $contrasena1 = $this->limpiarCadena($_POST['su_contrasenaCliente1']);
    $contrasena2 = $this->limpiarCadena($_POST['su_contrasenaCliente2']);

    // Verificamos los campos obligatorios
    $camposObligatorios = ["nombre", "apellido", "sexo", "fechaNac", "telefono", "correo", "usuario", "contrasena1","contrasena2"];
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
        ["^[a-zA-Z ]{3,30}$", $nombre, "El nombre no coincide con el formato solicitado"],
        ["^[a-zA-Z ]{3,30}$", $apellido, "El apellido no coincide con el formato solicitado"],
        ["^[a-zA-Z ]{1,10}$", $sexo, "El sexo no coincide con el formato solicitado"],
        ["^[0-9]{9}$", $telefono, "El teléfono no coincide con el formato solicitado"],
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

    // Verificamos si el correo ya existe
    if ($correo != "" && filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $check_email = $this->ejecutarConsulta("SELECT correo FROM usuario WHERE correo='$correo'");
        if ($check_email->rowCount() > 0) {
            $alerta =["tipo"=>"simple",
                       "titulo"=> "Ocurrió un error inesperado",
                       "texto"=> "El EMAIL que acaba de ingresar ya se encuentra registrado en el sistema, por favor verifique e intente nuevamente", 
                       "icono"=>"error"];
            return json_encode($alerta);
            exit();
        }
    } elseif ($correo != "") {
        $alerta =["tipo"=>"simple", 
                   "titulo"=>"Ocurrió un error inesperado", 
                   "texto"=> "Ha ingresado un correo electrónico no válido",
                    "icono"=>"error"];
        return json_encode($alerta);
            exit();
    }

    // Verificamos si el usuario ya existe
    $check_usuario = $this->ejecutarConsulta("SELECT usuario FROM usuario WHERE usuario='$usuario'");
    if ($check_usuario->rowCount() > 0) {
        $alerta =["tipo"=>"simple", 
                   "titulo"=>"Ocurrió un error inesperado", 
                   "texto"=> "ElUSUARIO que acaba de ingresar ya se encuentra registrado en el sistema, por favor verifique e intente nuevamente", 
                   "icono"=>"error"];
        return json_encode($alerta);
            exit();
    }
    //validamos que las contraseñas sean iguales
    if($contrasena1 != $contrasena2){
        $alerta =["tipo"=>"simple",
                   "titulo"=> "Ocurrió un error inesperado",
                   "texto"=> "Las contraseñas no coinciden",
                   "icono"=> "error"];
        return json_encode($alerta);
        exit();
    }else{
        $contrasena_hash = password_hash($contrasena1, PASSWORD_DEFAULT);
    }


    $datos = array(        
        "nombre" => $nombre,
        "apellido" => $apellido,
        "sexo" => $sexo,
        "fechaNac" => $fechaNac,
        "correo" => $correo,
        "telefono" => $telefono, 
        "usuario" => $usuario,
        "contrasena" => $contrasena_hash
 );

   
    #ahora si lo enviamos a la funcion insertarUsuario

    $response = $this->insertarCliente($datos);

    if($response>0){
        $alerta=[
            "tipo"=>"recargar",
            "titulo"=>"Usuario registrado",
            "texto"=>"El usuario ".$nombre." ".$apellido." se registro con exito",
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
            "texto"=>"No se pudo registrar el usuario, por favor intente nuevamente",
            "icono"=>"error"
        ];
    }

    return json_encode($alerta);
}

public function actualizarUsuarioControlador() {
    //almacenamos los datos que vienen del formulario en un array
    $id = $this->limpiarCadena($_POST['id_usuario']);        
    $dni = $this->limpiarCadena($_POST['dni_usuario']);
    $nombre = $this->limpiarCadena($_POST['nomb_usuario']);
    $apellido = $this->limpiarCadena($_POST['ape_usuario']);
    $sexo = $this->limpiarCadena($_POST['sexo_usuario']);
    $fechaNac = $this->limpiarCadena($_POST['fechaNac_usuario']);
    $estadoCivil=$this->limpiarCadena($_POST['estadocivil_usuarioActualizar']);
    $direccion = $this->limpiarCadena($_POST['dir_usuario']);
    $telefono = $this->limpiarCadena($_POST['tel_usuario']); 
    $correo = $this->limpiarCadena($_POST['email_usuario']);
    $usuario = $this->limpiarCadena($_POST['usuario_usuario']);
    $contrasena = $this->limpiarCadena($_POST['clave_usuario']);
    $facebook = $this->limpiarCadena($_POST['facebook_usuario']);
    $twitter = $this->limpiarCadena($_POST['twitter_usuario']);
    $instagram = $this->limpiarCadena($_POST['instagram_usuario']);
    $linkedin = $this->limpiarCadena($_POST['linkedin_usuario']);    
    $profesion = $this->limpiarCadena($_POST['profesion_usuario']);
    $observacionAdicional = $this->limpiarCadena($_POST['observacionAdicional_usuario']);
    $id_privilegio = $this->limpiarCadena($_POST['rol_usuario']);
    $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);
    $usuario_creador = $_SESSION['usuario'];

    // Verificamos los campos obligatorios
    $camposObligatorios = ["nombre", "apellido", "dni", "sexo", "direccion", "telefono", "correo", "usuario", "contrasena", "id_privilegio"];
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
        ["^[0-9]{8}$", $dni, "El DNI no coincide con el formato solicitado"],
        ["^[a-zA-Z ]{3,30}$", $nombre, "El nombre no coincide con el formato solicitado"],
        ["^[a-zA-Z ]{3,30}$", $apellido, "El apellido no coincide con el formato solicitado"],
        ["^[a-zA-Z ]{1,10}$", $sexo, "El sexo no coincide con el formato solicitado"],
        ["^[^<>]{3,50}$", $direccion, "La dirección no coincide con el formato solicitado"],
        ["^[0-9]{9}$", $telefono, "El teléfono no coincide con el formato solicitado"],
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
    $img_dir = "../views/assets/imagenes/usuarios/";
    $formatosPermitidos = ["jpeg", "png", "jpg"];
    $imagen = $_FILES['perfil_usuario']['tmp_name'];
    $nombre_imagen = $_FILES['perfil_usuario']['name'];
    $tipo_imagen = strtolower(pathinfo($nombre_imagen, PATHINFO_EXTENSION)); // Corregido el error de escritura en strtolower
    $tamano_imagen = $_FILES['perfil_usuario']['size'];

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
        $foto = str_ireplace(" ", "_", $nombre) . "_" . rand(0, 100);

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
    }else {
        #aqui se debe de obtener la foto actual del usuario registrado en la base de datos
        # consultamos la foto actual del usuario y lo almacenamos en una variable
        #consultamos en la base de datos
        $consulta = "SELECT FOTO_PERFIL FROM usuario WHERE id_usuario = $id";
        $resultados = $this->index($consulta);
        $foto = $resultados[0]['FOTO_PERFIL'];
    
    }

      //directorio de curriculum
      $directorio_documento = "../views/assets/documents/";

      $formatosPermitido = ["pdf"];
      $documento = $_FILES['cv']['tmp_name'];
      $nombre_documento = $_FILES['cv']['name'];
      $tipo_documento = strtolower(pathinfo($nombre_documento, PATHINFO_EXTENSION)); // Corregido el error de escritura en strtolower
      $tamano_documento = $_FILES['cv']['size'];
  
      if ($nombre_documento != "" && $tamano_documento > 0) {
          // Creando directorio
          if (!file_exists($directorio_documento) && !mkdir($directorio_documento, 0777)) {
              $alerta =["tipo"=>"simple",
                         "titulo"=> "Ocurrió un error inesperado",
                         "texto"=> "Error al crear el directorio", 
                         "icono"=>"error"];
              return json_encode($alerta);
              exit();
          }
  
          
          // Validamos si la imagen es permitida
          if (!in_array($tipo_documento, $formatosPermitido)) { // Corregido la verificación de la extensión del archivo
              $alerta = [
                  "tipo" => "simple",
                  "titulo" => "Ocurrió un error inesperado",
                  "texto" => "El documento que ha seleccionado es de un formato no permitido",
                  "icono" => "error"
              ];
              echo json_encode($alerta); // Usamos echo en lugar de return para imprimir el JSON
              exit();
          }
  
  
          // Verificando peso de la imagen
          if (($tamano_documento / 1024) > 5120) {
              $alerta =["tipo"=>"simple",
                         "titulo"=> "Ocurrió un error inesperado",
                         "texto"=> "El documento que ha seleccionado supera el peso permitido, formatos permitidos pdf",
                         "icono"=> "error"];
              return json_encode($alerta);
              exit();
          }
  
          // Nombre del curriculum
          $curriculum = str_ireplace(" ", "_", $nombre) . "_" . rand(0, 100);
  
          // Extensión de la imagen
          switch ($tipo_documento) {
                  case 'pdf':
                  $curriculum .= ".pdf";
                  break;
          }
  
          chmod($directorio_documento, 0755);
  
          // Moviendo imagen al directorio
          if (!move_uploaded_file($documento, $directorio_documento . $curriculum)) {
              $alerta =["tipo"=>"simple",
                         "titulo"=> "Ocurrió un error inesperado",
                         "texto"=> "No podemos subir el documento al sistema en este momento",
                         "icono"=> "error"];
            return json_encode($alerta);
              exit();
          }
      } else {
        $consulta = "SELECT CURRICULUM FROM usuario WHERE id_usuario = $id";
        $resultados = $this->index($consulta);
        $curriculum = $resultados[0]['CURRICULUM'];
      }

    $datos = array(
        "id_usuario" => $id,
        "foto" => $foto,
        "dni" => $dni,
        "nombre" => $nombre,
        "apellido" => $apellido,
        "sexo" => $sexo,
        "fechaNac" => $fechaNac,
        "estadoCivil" => $estadoCivil,
        "direccion" => $direccion,
        "correo" => $correo,
        "profesion" => $profesion,
        "curriculum"=>$curriculum,
        "observacionAdicional" => $observacionAdicional,
        "telefono" => $telefono,        
        "usuario" => $usuario,
        "contrasena" => $contrasena_hash, 
        "twitter"=>$twitter,
        "facebook"=>$facebook,        
        "instagram"=>$instagram,
        "linkedin"=>$linkedin,           
        "id_privilegio" => $id_privilegio,
        "usuario_creador" => $usuario_creador);

   
    #ahora si lo enviamos a la funcion insertarUsuario

    $response = $this->actualizarUsuario($datos);

    if($response>0){
        $alerta=[
            "tipo"=>"limpiarUsuarioActualizado",
            "titulo"=>"Usuario Actualizado",
            "texto"=>"El usuario ".$nombre." ".$apellido." se Actualizo con exito",
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
            "texto"=>"No se pudo registrar el usuario, por favor intente nuevamente",
            "icono"=>"error"
        ];
    }

    return json_encode($alerta);
}

public function actualizarAlumnoControlador() {
    //almacenamos los datos que vienen del formulario en un array
    $id = $this->limpiarCadena($_POST['id_usuario']);        
    $dni = $this->limpiarCadena($_POST['dni_usuario']);
    $nombre = $this->limpiarCadena($_POST['nomb_usuario']);
    $apellido = $this->limpiarCadena($_POST['ape_usuario']);
    $sexo = $this->limpiarCadena($_POST['sexo_usuario']);
    $fechaNac = $this->limpiarCadena($_POST['fechaNac_usuario']);
    $estadoCivil=$this->limpiarCadena($_POST['estadocivil_usuarioActualizar']);
    $direccion = $this->limpiarCadena($_POST['dir_usuario']);
    $telefono = $this->limpiarCadena($_POST['tel_usuario']); 
    $correo = $this->limpiarCadena($_POST['email_usuario']);
    $usuario = $this->limpiarCadena($_POST['usuario_usuario']);
    $contrasena = $this->limpiarCadena($_POST['clave_usuario']);
    $facebook = $this->limpiarCadena($_POST['facebook_usuario']);
    $twitter = $this->limpiarCadena($_POST['twitter_usuario']);
    $instagram = $this->limpiarCadena($_POST['instagram_usuario']);
    $linkedin = $this->limpiarCadena($_POST['linkedin_usuario']);    
    $profesion = $this->limpiarCadena($_POST['profesion_usuario']);
    $observacionAdicional = $this->limpiarCadena($_POST['observacionAdicional_usuario']);
    $id_privilegio = "1";
    $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);
    $usuario_creador = $_SESSION['usuario'];

    // Verificamos los campos obligatorios
    $camposObligatorios = ["nombre", "apellido", "dni", "sexo", "direccion", "telefono", "correo", "usuario", "contrasena", "id_privilegio"];
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
        ["^[0-9]{8}$", $dni, "El DNI no coincide con el formato solicitado"],
        ["^[a-zA-Z ]{3,30}$", $nombre, "El nombre no coincide con el formato solicitado"],
        ["^[a-zA-Z ]{3,30}$", $apellido, "El apellido no coincide con el formato solicitado"],
        ["^[a-zA-Z ]{1,10}$", $sexo, "El sexo no coincide con el formato solicitado"],
        ["^[^<>]{3,50}$", $direccion, "La dirección no coincide con el formato solicitado"],
        ["^[0-9]{9}$", $telefono, "El teléfono no coincide con el formato solicitado"],
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
    $img_dir = "../views/assets/imagenes/usuarios/";
    $formatosPermitidos = ["jpeg", "png", "jpg"];
    $imagen = $_FILES['perfil_usuario']['tmp_name'];
    $nombre_imagen = $_FILES['perfil_usuario']['name'];
    $tipo_imagen = strtolower(pathinfo($nombre_imagen, PATHINFO_EXTENSION)); // Corregido el error de escritura en strtolower
    $tamano_imagen = $_FILES['perfil_usuario']['size'];

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
        $foto = str_ireplace(" ", "_", $nombre) . "_" . rand(0, 100);

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
    }else {
        #aqui se debe de obtener la foto actual del usuario registrado en la base de datos
        # consultamos la foto actual del usuario y lo almacenamos en una variable
        #consultamos en la base de datos
        $consulta = "SELECT FOTO_PERFIL FROM usuario WHERE id_usuario = $id";
        $resultados = $this->index($consulta);
        $foto = $resultados[0]['FOTO_PERFIL'];
    
    }

      //directorio de curriculum
      $directorio_documento = "../views/assets/documents/";

      $formatosPermitido = ["pdf"];
      $documento = $_FILES['cv']['tmp_name'];
      $nombre_documento = $_FILES['cv']['name'];
      $tipo_documento = strtolower(pathinfo($nombre_documento, PATHINFO_EXTENSION)); // Corregido el error de escritura en strtolower
      $tamano_documento = $_FILES['cv']['size'];
  
      if ($nombre_documento != "" && $tamano_documento > 0) {
          // Creando directorio
          if (!file_exists($directorio_documento) && !mkdir($directorio_documento, 0777)) {
              $alerta =["tipo"=>"simple",
                         "titulo"=> "Ocurrió un error inesperado",
                         "texto"=> "Error al crear el directorio", 
                         "icono"=>"error"];
              return json_encode($alerta);
              exit();
          }
  
          
          // Validamos si la imagen es permitida
          if (!in_array($tipo_documento, $formatosPermitido)) { // Corregido la verificación de la extensión del archivo
              $alerta = [
                  "tipo" => "simple",
                  "titulo" => "Ocurrió un error inesperado",
                  "texto" => "El documento que ha seleccionado es de un formato no permitido",
                  "icono" => "error"
              ];
              echo json_encode($alerta); // Usamos echo en lugar de return para imprimir el JSON
              exit();
          }
  
  
          // Verificando peso de la imagen
          if (($tamano_documento / 1024) > 5120) {
              $alerta =["tipo"=>"simple",
                         "titulo"=> "Ocurrió un error inesperado",
                         "texto"=> "El documento que ha seleccionado supera el peso permitido, formatos permitidos pdf",
                         "icono"=> "error"];
              return json_encode($alerta);
              exit();
          }
  
          // Nombre del curriculum
          $curriculum = str_ireplace(" ", "_", $nombre) . "_" . rand(0, 100);
  
          // Extensión de la imagen
          switch ($tipo_documento) {
                  case 'pdf':
                  $curriculum .= ".pdf";
                  break;
          }
  
          chmod($directorio_documento, 0755);
  
          // Moviendo imagen al directorio
          if (!move_uploaded_file($documento, $directorio_documento . $curriculum)) {
              $alerta =["tipo"=>"simple",
                         "titulo"=> "Ocurrió un error inesperado",
                         "texto"=> "No podemos subir el documento al sistema en este momento",
                         "icono"=> "error"];
            return json_encode($alerta);
              exit();
          }
      } else {
        $consulta = "SELECT CURRICULUM FROM usuario WHERE id_usuario = $id";
        $resultados = $this->index($consulta);
        $curriculum = $resultados[0]['CURRICULUM'];
      }

    $datos = array(
        "id_usuario" => $id,
        "foto" => $foto,
        "dni" => $dni,
        "nombre" => $nombre,
        "apellido" => $apellido,
        "sexo" => $sexo,
        "fechaNac" => $fechaNac,
        "estadoCivil" => $estadoCivil,
        "direccion" => $direccion,
        "correo" => $correo,
        "profesion" => $profesion,
        "curriculum"=>$curriculum,
        "observacionAdicional" => $observacionAdicional,
        "telefono" => $telefono,        
        "usuario" => $usuario,
        "contrasena" => $contrasena_hash, 
        "twitter"=>$twitter,
        "facebook"=>$facebook,        
        "instagram"=>$instagram,
        "linkedin"=>$linkedin,           
        "id_privilegio" => $id_privilegio,
        "usuario_creador" => $usuario_creador);

   
    #ahora si lo enviamos a la funcion insertarUsuario

    $response = $this->actualizarUsuario($datos);

    if($response>0){
        $alerta=[
            "tipo"=>"limpiarUsuarioActualizado",
            "titulo"=>"Alumno Actualizado",
            "texto"=>"El Alumno ".$nombre." ".$apellido." se Actualizo con exito",
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
            "texto"=>"No se pudo Actualizar Los Datos del Alumno, por favor intente nuevamente",
            "icono"=>"error"
        ];
    }

    return json_encode($alerta);
}

public function eliminarUsuarioControlador(){

    $id_usuario=$this->limpiarCadena($_POST['id_usuario']);
    $usuario_creador = $_SESSION['usuario'];

    if($id_usuario==1){
        $alerta=[
            "tipo"=>"simple",
            "titulo"=>"Ocurrió un error inesperado",
            "texto"=>"No podemos eliminar el usuario principal del sistema",
            "icono"=>"error"
        ];
        return json_encode($alerta);
        exit();
    }

    # Verificando usuario #
    $datos=$this->ejecutarConsulta("SELECT * FROM usuario WHERE id_usuario='$id_usuario'");
    if($datos->rowCount()<=0){
        $alerta=[
            "tipo"=>"simple",
            "titulo"=>"Ocurrió un error inesperado",
            "texto"=>"No hemos encontrado el usuario en el sistema",
            "icono"=>"error"
        ];
        return json_encode($alerta);
        exit();
    }else{
        $datos=$datos->fetch();
    }

    $nombre=$datos['NOMBRE'];
    $apellidos=$datos['APELLIDO'];
    $datos=array(
        "id_usuario"=>$id_usuario,
        "usuario_creador"=>$usuario_creador
    );
    $eliminarUsuario=$this->eliminarUsuario($datos);

    if($eliminarUsuario>0){            

        $alerta=[
            "tipo"=>"limpiarUsuarioEliminado",
            "titulo"=>"Usuario Dado de Baja",
            "texto"=>"El usuario ".$nombre." ".$apellidos." ha sido dado de baja con éxito",
            "icono"=>"success"
        ];

    }else{

        $alerta=[
            "tipo"=>"simple",
            "titulo"=>"Ocurrió un error inesperado",
            "texto"=>"No hemos podido dar de baja al usuario ".$nombre." ".$apellidos." del sistema, por favor intente nuevamente",
            "icono"=>"error"
        ];
    }

    return json_encode($alerta);
}

public function eliminarAlumnoControlador(){

    $id_usuario=$this->limpiarCadena($_POST['id_usuario']);
    $usuario_creador = $_SESSION['usuario'];

    if($id_usuario==1){
        $alerta=[
            "tipo"=>"simple",
            "titulo"=>"Ocurrió un error inesperado",
            "texto"=>"No podemos eliminar el usuario principal del sistema",
            "icono"=>"error"
        ];
        return json_encode($alerta);
        exit();
    }

    # Verificando usuario #
    $datos=$this->ejecutarConsulta("SELECT * FROM usuario WHERE id_usuario='$id_usuario'");
    if($datos->rowCount()<=0){
        $alerta=[
            "tipo"=>"simple",
            "titulo"=>"Ocurrió un error inesperado",
            "texto"=>"No hemos encontrado el usuario en el sistema",
            "icono"=>"error"
        ];
        return json_encode($alerta);
        exit();
    }else{
        $datos=$datos->fetch();
    }

    $nombre=$datos['NOMBRE'];
    $apellidos=$datos['APELLIDO'];
    $datos=array(
        "id_usuario"=>$id_usuario,
        "usuario_creador"=>$usuario_creador
    );
    $eliminarUsuario=$this->eliminarUsuario($datos);

    if($eliminarUsuario>0){            

        $alerta=[
            "tipo"=>"limpiarAlumnoEliminado",
            "titulo"=>"Usuario Dado de Baja",
            "texto"=>"El usuario ".$nombre." ".$apellidos." ha sido dado de baja con éxito",
            "icono"=>"success"
        ];

    }else{

        $alerta=[
            "tipo"=>"simple",
            "titulo"=>"Ocurrió un error inesperado",
            "texto"=>"No hemos podido dar de baja al usuario ".$nombre." ".$apellidos." del sistema, por favor intente nuevamente",
            "icono"=>"error"
        ];
    }

    return json_encode($alerta);
}

public function DA_UsuarioControlador(){

    $id=$this->limpiarCadena($_POST['id_usuario']);    
    $usuario_creador = $_SESSION['usuario'];

    if($id==1){
        $alerta=[
            "tipo"=>"simple",
            "titulo"=>"Ocurrió un error inesperado",
            "texto"=>"No podemos eliminar el usuario principal del sistema",
            "icono"=>"error"
        ];
        return json_encode($alerta);
        exit();
    }

    # Verificando usuario #
    $datos=$this->ejecutarConsulta("SELECT * FROM usuario WHERE id_usuario='$id'");
    if($datos->rowCount()<=0){
        $alerta=[
            "tipo"=>"simple",
            "titulo"=>"Ocurrió un error inesperado",
            "texto"=>"No hemos encontrado el usuario en el sistema",
            "icono"=>"error"
        ];
        return json_encode($alerta);
        exit();
    }else{
        $datos=$datos->fetch();
    }
    $nombre=$datos['NOMBRE'];
    $apellidos=$datos['APELLIDO'];
    $datos=array(
        "id"=>$id,
        "usuario_creador"=>$usuario_creador);

    $eliminarUsuario=$this->darAltaUsuario($datos);

    if($eliminarUsuario>0){            

        $alerta=[
            "tipo"=>"recargar",
            "titulo"=>"Usuario Dado de Alta",
            "texto"=>"El usuario ".$nombre." ".$apellidos." ha sido dado de Alta con éxito",
            "icono"=>"success"
        ];

    }else{

        $alerta=[
            "tipo"=>"simple",
            "titulo"=>"Ocurrió un error inesperado",
            "texto"=>"No hemos podido dar de Alta al usuario ".$nombre." ".$apellidos." del sistema, por favor intente nuevamente",
            "icono"=>"error"
        ];
    }

    return json_encode($alerta);
}

public function ListarEquipoControllerTotal() {
    $tabla = "";
    $consulta_datos = "SELECT U.ID_USUARIO AS ID_USUARIO, U.FOTO_PERFIL AS FOTO_PERFIL, U.DNI AS DNI, U.NOMBRE AS NOMBRE, U.APELLIDO AS APELLIDO,
    U.SEXO AS SEXO, U.DIRECCION AS DIRECCION, U.NUM_TELEFONICO AS NUM_TELEFONICO, U.CORREO AS CORREO, U.USUARIO AS USUARIO,
    U.CONTRASENA AS CONTRASENA, R.DESCRIPCION AS ROL, E.RAZON_SOCIAL AS EMPRESA, U.FECHA_CREACION AS FECHA_CREACION, 
    U.FECHA_MODIFICACION AS FECHA_MODIFICACION, U.FECHA_ELIMINACION AS FECHA_ELIMINACION, U.ESTADO AS ESTADO,EQ.TITULO AS EQUIPO,EQ.DESCRIPCION AS DESCRIPCION,
    U.S_TWITTER AS S_TWITTER, U.S_FACEBOOK AS S_FACEBOOK, U.S_INSTAGRAM AS S_INSTAGRAM, U.S_LINKEDIN AS S_LINKEDIN
     FROM USUARIO U
     INNER JOIN EMPRESA E ON U.ID_EMPRESA = E.ID_EMPRESA
     INNER JOIN ROLES R ON R.ID_ROL = U.ID_ROL
     INNER JOIN EQUIPO EQ ON EQ.ID_EQUIPO=U.ID_EQUIPO WHERE R.DESCRIPCION !='CLIENTE'";
    $datos = $this->ejecutarConsulta($consulta_datos);
    $datos = $datos->fetchAll();
    if($datos==null){
        $tabla = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Aún no contamos con el equipo!</strong> Estamos Organizandonos para tener el equipo que te merces, no te vayas.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
    }else{
    // Inicia la cadena de $tabla con la estructura HTML deseada
    $tabla = '<div class="section-title" data-aos="fade-up">
        <h2><strong>'.$datos[0]['EQUIPO'].'</strong></h2>
        <p>'.$datos[0]['DESCRIPCION'].'</p>
    </div><div class="row">';

    $counter = 0; // Contador para llevar el seguimiento de los servicios

    foreach ($datos as $index=>$row) {
        $delay = $index * 100;
        if ($counter % 4 == 0 && $counter != 0) {
                        $tabla .= '';
        }
        $tabla .= '<div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="'.$delay.'">
                <div class="member-img">
                    <img src="'.APP_URL.'app/views/assets/imagenes/usuarios/'.$row['FOTO_PERFIL'].'" class="img-fluid" alt="">
                    <div class="social">
                        <a href="'.$row['S_TWITTER'].'"><i class="bi bi-twitter"></i></a>
                        <a href="'.$row['S_FACEBOOK'].'"><i class="bi bi-facebook"></i></a>
                        <a href="'.$row['S_INSTAGRAM'].'"><i class="bi bi-instagram"></i></a>
                        <a href="'.$row['S_LINKEDIN'].'"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
                <div class="member-info">
                    <h4>'.$row['NOMBRE'].' '.$row['APELLIDO'].'</h4>
                    <span>'.$row['ROL'].'</span>
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

public function teaminaboutController() {
    $tabla = "";
    $consulta_datos = "SELECT U.ID_USUARIO AS ID_USUARIO, U.FOTO_PERFIL AS FOTO_PERFIL, U.DNI AS DNI, U.NOMBRE AS NOMBRE, U.APELLIDO AS APELLIDO,
    U.SEXO AS SEXO, U.DIRECCION AS DIRECCION, U.NUM_TELEFONICO AS NUM_TELEFONICO, U.CORREO AS CORREO, U.USUARIO AS USUARIO,
    U.CONTRASENA AS CONTRASENA, R.DESCRIPCION AS ROL, E.RAZON_SOCIAL AS EMPRESA, U.FECHA_CREACION AS FECHA_CREACION, 
    U.FECHA_MODIFICACION AS FECHA_MODIFICACION, U.FECHA_ELIMINACION AS FECHA_ELIMINACION, U.ESTADO AS ESTADO,EQ.TITULO AS EQUIPO,EQ.DESCRIPCION AS DESCRIPCION,
    U.S_TWITTER AS S_TWITTER, U.S_FACEBOOK AS S_FACEBOOK, U.S_INSTAGRAM AS S_INSTAGRAM, U.S_LINKEDIN AS S_LINKEDIN
     FROM USUARIO U
     INNER JOIN EMPRESA E ON U.ID_EMPRESA = E.ID_EMPRESA
     INNER JOIN ROLES R ON R.ID_ROL = U.ID_ROL
     INNER JOIN EQUIPO EQ ON EQ.ID_EQUIPO=U.ID_EQUIPO WHERE R.DESCRIPCION !='CLIENTE'";
    $datos = $this->ejecutarConsulta($consulta_datos);
    $datos = $datos->fetchAll();
    if($datos==null){
        $tabla = '<section id="team" class="team section-bg">
                    <div class="container">
                        <div class="section-title" data-aos="fade-up">
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                             <strong>Aún no contamos con el equipo!</strong> Estamos Organizandonos para tener el equipo que te merces, no te vayas.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                </section>';
    }else{
    // Inicia la cadena de $tabla con la estructura HTML deseada
    $tabla = '<section id="team" class="team section-bg">
                <div class="container">
                 <div class="section-title" data-aos="fade-up">
                     <h2><strong>'.$datos[0]['EQUIPO'].'</strong></h2>
                     <p>'.$datos[0]['DESCRIPCION'].'</p>
                </div>
                  <div class="row">
                    ';

    $counter = 0; // Contador para llevar el seguimiento de los servicios

    foreach ($datos as $index => $row) {
        $delay = $index * 100;
        if ($counter % 4 == 0 && $counter != 0) {            
            $tabla .= '';
        }
            $tabla .= '     <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                                <div class="member" data-aos="fade-up" data-aos-delay="'.$delay.'">
                                    <div class="member-img">
                                        <img src="'.APP_URL.'app/views/assets/imagenes/usuarios/'.$row['FOTO_PERFIL'].'" class="img-fluid" alt="">
                                        <div class="social">
                                            <a href="'.$row['S_TWITTER'].'"><i class="bi bi-twitter"></i></a>
                                            <a href="'.$row['S_FACEBOOK'].'"><i class="bi bi-facebook"></i></a>
                                            <a href="'.$row['S_INSTAGRAM'].'"><i class="bi bi-instagram"></i></a>
                                            <a href="'.$row['S_LINKEDIN'].'"><i class="bi bi-linkedin"></i></a>
                                        </div>
                                    </div>
                                    <div class="member-info">
                                        <h4>'.$row['NOMBRE'].' '.$row['APELLIDO'].'</h4>
                                        <span>'.$row['ROL'].'</span>
                                    </div>
                                </div>
                            </div>
                            ';

        $counter++;
    }
    }
    // Cerrar la última fila
    $tabla .= '</div>
            </div>
        </section>';

    return $tabla;
}

public function ACTUALIZAR_PERFIL_USUARIOS() {
    //almacenamos los datos que vienen del formulario en un array
    $id = $this->limpiarCadena($_POST['id_usuario']);   
    $sexo = $this->limpiarCadena($_POST['sexo_usuario']);
    $fechaNac = $this->limpiarCadena($_POST['fechaNac_usuario']);
    $estadoCivil=$this->limpiarCadena($_POST['estadocivil_usuario']);
    $direccion = $this->limpiarCadena($_POST['dir_usuario']);
    $telefono = $this->limpiarCadena($_POST['tel_usuario']); 
    $correo = $this->limpiarCadena($_POST['email_usuario']);
    $facebook = $this->limpiarCadena($_POST['facebook_usuario']);
    $twitter = $this->limpiarCadena($_POST['twitter_usuario']);
    $instagram = $this->limpiarCadena($_POST['instagram_usuario']);
    $linkedin = $this->limpiarCadena($_POST['linkedin_usuario']);    
    $profesion = $this->limpiarCadena($_POST['profesion_usuario']);
    $observacionAdicional = $this->limpiarCadena($_POST['observacionAdicional_usuario']);

    // Verificamos la integridad de los datos
    $verificaciones = [
        ["^[a-zA-Z ]{1,10}$", $sexo, "El sexo no coincide con el formato solicitado"],
        ["^[^<>]{3,50}$", $direccion, "La dirección no coincide con el formato solicitado"],
        ["^[0-9]{9}$", $telefono, "El teléfono no coincide con el formato solicitado"],
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

    // Verificamos si el correo ya existe
    if ($correo != "" && filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $check_email = $this->ejecutarConsulta("SELECT correo FROM usuario WHERE correo='$correo' and id_usuario!='$id'");
        if ($check_email->rowCount() > 0) {
            $alerta =["tipo"=>"simple",
                       "titulo"=> "Ocurrió un error inesperado",
                       "texto"=> "El EMAIL que acaba de ingresar ya se encuentra registrado en el sistema, por favor verifique e intente nuevamente", 
                       "icono"=>"error"];
            return json_encode($alerta);
            exit();
        }
    } elseif ($correo != "") {
        $alerta =["tipo"=>"simple", 
                   "titulo"=>"Ocurrió un error inesperado", 
                   "texto"=> "Ha ingresado un correo electrónico no válido",
                    "icono"=>"error"];
        return json_encode($alerta);
            exit();
    }

    // Verificamos si el usuario ya existe
    $consult = $this->ejecutarConsulta("SELECT usuario FROM usuario WHERE id_usuario='$id'");
    $nombre=$consult->fetchColumn();

    // Directorio de fotos
    $img_dir = "../views/assets/imagenes/usuarios/";
    $formatosPermitidos = ["jpeg", "png", "jpg"];
    $imagen = $_FILES['perfil_usuario']['tmp_name'];
    $nombre_imagen = $_FILES['perfil_usuario']['name'];
    $tipo_imagen = strtolower(pathinfo($nombre_imagen, PATHINFO_EXTENSION)); // Corregido el error de escritura en strtolower
    $tamano_imagen = $_FILES['perfil_usuario']['size'];

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
        $foto = str_ireplace(" ", "_", $nombre) . "_" . rand(0, 100);

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
    }else {
        #aqui se debe de obtener la foto actual del usuario registrado en la base de datos
        # consultamos la foto actual del usuario y lo almacenamos en una variable
        #consultamos en la base de datos
        $consulta = "SELECT FOTO_PERFIL FROM usuario WHERE id_usuario = $id";
        $resultados = $this->index($consulta);
        $foto = $resultados[0]['FOTO_PERFIL'];
    
    }

      //directorio de curriculum
      $directorio_documento = "../views/assets/documents/";

      $formatosPermitido = ["pdf"];
      $documento = $_FILES['cv']['tmp_name'];
      $nombre_documento = $_FILES['cv']['name'];
      $tipo_documento = strtolower(pathinfo($nombre_documento, PATHINFO_EXTENSION)); // Corregido el error de escritura en strtolower
      $tamano_documento = $_FILES['cv']['size'];
  
      if ($nombre_documento != "" && $tamano_documento > 0) {
          // Creando directorio
          if (!file_exists($directorio_documento) && !mkdir($directorio_documento, 0777)) {
              $alerta =["tipo"=>"simple",
                         "titulo"=> "Ocurrió un error inesperado",
                         "texto"=> "Error al crear el directorio", 
                         "icono"=>"error"];
              return json_encode($alerta);
              exit();
          }
  
          
          // Validamos si la imagen es permitida
          if (!in_array($tipo_documento, $formatosPermitido)) { // Corregido la verificación de la extensión del archivo
              $alerta = [
                  "tipo" => "simple",
                  "titulo" => "Ocurrió un error inesperado",
                  "texto" => "El documento que ha seleccionado es de un formato no permitido",
                  "icono" => "error"
              ];
              echo json_encode($alerta); // Usamos echo en lugar de return para imprimir el JSON
              exit();
          }
  
  
          // Verificando peso de la imagen
          if (($tamano_documento / 1024) > 5120) {
              $alerta =["tipo"=>"simple",
                         "titulo"=> "Ocurrió un error inesperado",
                         "texto"=> "El documento que ha seleccionado supera el peso permitido, formatos permitidos pdf",
                         "icono"=> "error"];
              return json_encode($alerta);
              exit();
          }
  
          // Nombre del curriculum
          $curriculum = str_ireplace(" ", "_", $nombre) . "_" . rand(0, 100);
  
          // Extensión de la imagen
          switch ($tipo_documento) {
                  case 'pdf':
                  $curriculum .= ".pdf";
                  break;
          }
  
          chmod($directorio_documento, 0755);
  
          // Moviendo imagen al directorio
          if (!move_uploaded_file($documento, $directorio_documento . $curriculum)) {
              $alerta =["tipo"=>"simple",
                         "titulo"=> "Ocurrió un error inesperado",
                         "texto"=> "No podemos subir el documento al sistema en este momento",
                         "icono"=> "error"];
            return json_encode($alerta);
              exit();
          }
      } else {
        $consulta = "SELECT CURRICULUM FROM usuario WHERE id_usuario = $id";
        $resultados = $this->index($consulta);
        $curriculum = $resultados[0]['CURRICULUM'];
      }

    $datos = array(
        "id_usuario" => $id,
        "foto" => $foto,
        "sexo" => $sexo,
        "fechaNac" => $fechaNac,
        "estadoCivil" => $estadoCivil,
        "direccion" => $direccion,
        "correo" => $correo,
        "profesion" => $profesion,
        "curriculum"=>$curriculum,
        "observacionAdicional" => $observacionAdicional,
        "telefono" => $telefono,    
        "twitter"=>$twitter,
        "facebook"=>$facebook,        
        "instagram"=>$instagram,
        "linkedin"=>$linkedin);

   
    #ahora si lo enviamos a la funcion insertarUsuario

    $response = $this->actualizarPerfilUsuario($datos);

    if($response>0){
        $alerta=[
            "tipo"=>"limpiarPerfilActualizado",
            "titulo"=>"Datos Actualizados",
            "texto"=>"Los datos del perfil se Actualizaron con exito",
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
            "texto"=>"No se pudo Actualizar los datos del perfil, por favor intente nuevamente",
            "icono"=>"error"
        ];
    }

    return json_encode($alerta);
}

public function ACTUALIZAR_PERFIL_CLIENTES() {
    //almacenamos los datos que vienen del formulario en un array
    $id = $this->limpiarCadena($_POST['id_usuario']);   
    $sexo = $this->limpiarCadena($_POST['sexo_usuario']);
    $fechaNac = $this->limpiarCadena($_POST['fechaNac_usuario']);
    $estadoCivil=$this->limpiarCadena($_POST['estadocivil_usuario']);
    $direccion = $this->limpiarCadena($_POST['dir_usuario']);
    $telefono = $this->limpiarCadena($_POST['tel_usuario']); 
    $correo = $this->limpiarCadena($_POST['email_usuario']);    
    $profesion = $this->limpiarCadena($_POST['profesion_usuario']);
    $observacionAdicional = $this->limpiarCadena($_POST['observacionAdicional_usuario']);

    // Verificamos la integridad de los datos
    $verificaciones = [
        ["^[a-zA-Z ]{1,10}$", $sexo, "El sexo no coincide con el formato solicitado"],
        ["^[^<>]{3,50}$", $direccion, "La dirección no coincide con el formato solicitado"],
        ["^[0-9]{9}$", $telefono, "El teléfono no coincide con el formato solicitado"],
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

    // Verificamos si el correo ya existe
    if ($correo != "" && filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $check_email = $this->ejecutarConsulta("SELECT correo FROM usuario WHERE correo='$correo' and id_usuario!='$id'");
        if ($check_email->rowCount() > 0) {
            $alerta =["tipo"=>"simple",
                       "titulo"=> "Ocurrió un error inesperado",
                       "texto"=> "El EMAIL que acaba de ingresar ya se encuentra registrado en el sistema, por favor verifique e intente nuevamente", 
                       "icono"=>"error"];
            return json_encode($alerta);
            exit();
        }
    } elseif ($correo != "") {
        $alerta =["tipo"=>"simple", 
                   "titulo"=>"Ocurrió un error inesperado", 
                   "texto"=> "Ha ingresado un correo electrónico no válido",
                    "icono"=>"error"];
        return json_encode($alerta);
            exit();
    }

    // Verificamos si el usuario ya existe
    $resultado = $this->ejecutarConsulta("SELECT usuario FROM usuario WHERE  id_usuario='$id'");
    $nombre=$resultado->fetchColumn();

    // Directorio de fotos
    $img_dir = "../views/assets/imagenes/usuarios/";
    $formatosPermitidos = ["jpeg", "png", "jpg"];
    $imagen = $_FILES['perfil_usuario']['tmp_name'];
    $nombre_imagen = $_FILES['perfil_usuario']['name'];
    $tipo_imagen = strtolower(pathinfo($nombre_imagen, PATHINFO_EXTENSION)); // Corregido el error de escritura en strtolower
    $tamano_imagen = $_FILES['perfil_usuario']['size'];

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
        $foto = str_ireplace(" ", "_", $nombre) . "_" . rand(0, 100);

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
    }else {
        #aqui se debe de obtener la foto actual del usuario registrado en la base de datos
        # consultamos la foto actual del usuario y lo almacenamos en una variable
        #consultamos en la base de datos
        $consulta = "SELECT FOTO_PERFIL FROM usuario WHERE id_usuario = $id";
        $resultados = $this->index($consulta);
        $foto = $resultados[0]['FOTO_PERFIL'];
    
    }


    $datos = array(
        "id_usuario" => $id,
        "foto" => $foto,
        "sexo" => $sexo,
        "fechaNac" => $fechaNac,
        "estadoCivil" => $estadoCivil,
        "direccion" => $direccion,
        "correo" => $correo,
        "profesion" => $profesion,
        "observacionAdicional" => $observacionAdicional,
        "telefono" => $telefono);

   
    #ahora si lo enviamos a la funcion insertarUsuario

    $response = $this->actualizarPerfilCliente($datos);

    if($response>0){
        $alerta=[
            "tipo"=>"limpiarPerfilActualizado",
            "titulo"=>"Datos Actualizado",
            "texto"=>"Tus datos se Actualizaron con exito",
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
            "texto"=>"No se pudo registrar el usuario, por favor intente nuevamente",
            "icono"=>"error"
        ];
    }

    return json_encode($alerta);
}

public function ActualizarClave(){
    $id = $this->limpiarCadena($_POST['id_usuario']);
    $claveActual = $this->limpiarCadena($_POST['claveActual']);
    $claveNueva = $this->limpiarCadena($_POST['claveNueva']);
    $claveNueva2 = $this->limpiarCadena($_POST['claveNueva2']);

    // Obtener la contraseña almacenada en la base de datos
    $claveconsulta = $this->ejecutarConsulta("SELECT contrasena FROM usuario WHERE id_usuario='$id'");
    $claveconsulta = $claveconsulta->fetch();
    $claveBD = $claveconsulta['contrasena'];

    // Comprobar si la contraseña actual coincide con la almacenada en la base de datos
    if (!password_verify($claveActual, $claveBD)) {
    $alerta = [
        "tipo" => "simple",
        "titulo" => "ERROR",
        "texto" => "CONTRASEÑA ACTUAL INCORRECTA",
        "icono" => "error"
    ];
    return json_encode($alerta);
    }

    // Comprobar si las nuevas contraseñas coinciden
    if ($claveNueva !== $claveNueva2) {
    $alerta = [
        "tipo" => "simple",
        "titulo" => "Error",
        "texto" => "Las contraseñas no coinciden, por favor verifique e intente nuevamente",
        "icono" => "error"
    ];
    return json_encode($alerta);
    }

    // Verificar que la nueva contraseña no sea igual a la actual
    if (password_verify($claveNueva, $claveBD)) {
    $alerta = [
        "tipo" => "simple",
        "titulo" => "Error",
        "texto" => "La nueva contraseña no puede ser igual a la actual",
        "icono" => "error"
    ];
    return json_encode($alerta);
    }

    // Actualizar la contraseña en la base de datos
    $datos = [
    "id_usuario" => $id,
    "contrasena" => password_hash($claveNueva, PASSWORD_DEFAULT)
    ];

    $response = $this->UpdatePass($datos);

    if ($response > 0) {
    $alerta = [
        "tipo" => "limpiarClaveActualizada",
        "titulo" => "Clave Actualizada",
        "texto" => "Se actualizó la clave con éxito",
        "icono" => "success"
    ];
    } else {
    $alerta = [
        "tipo" => "simple",
        "titulo" => "Ocurrió un error inesperado",
        "texto" => "No se pudo actualizar la clave, por favor intente nuevamente",
        "icono" => "error"
    ];
    }

    return json_encode($alerta);
}



}?>