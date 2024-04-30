<?php
namespace App\Controllers;
use app\models\mainModel;

class dashboardController extends mainModel{
    #cantidad de servicios
    public function countServices(){
        $consulta = "SELECT * FROM SERVICIOS where ESTADO='Activo'";
        $resultados = $this->ejecutarConsulta($consulta);
        return $resultados;
    }

    public function countPromotions(){
        $consulta = "SELECT * FROM PROMOCIONES where ESTADO='Activo'";
        $resultados = $this->ejecutarConsulta($consulta);
        return $resultados;
    }

    public function countPotsSemanales(){
        $consulta = "SELECT * FROM Blog where ESTADO='Activo'";
        $resultados = $this->ejecutarConsulta($consulta);
        return $resultados;
    }

    public function countUsers(){
        $consulta = "SELECT * FROM USUARIO where ESTADO='Activo' and ID_ROL!='1'";
        $resultados = $this->ejecutarConsulta($consulta);
        return $resultados;
    }

    public function countPotsActivos(){
        $autor=$_SESSION['usuario'];
        $consulta = "  SELECT*FROM blog WHERE autor='$autor' AND estado='Activo'";
        $resultados = $this->ejecutarConsulta($consulta);
        return $resultados;
    }

    public function TableRoles(){
        $tabla="";
        $consulta_datos="SELECT * FROM ROLES order by FECHA_CREACION DESC";
        $consulta_total="SELECT COUNT(ID_ROL) FROM ROLES";
        $datos = $this->ejecutarConsulta($consulta_datos);
        $datos = $datos->fetchAll();
        $total = $this->ejecutarConsulta($consulta_total);
        $total = (int) $total->fetchColumn();
        if($total==0){
            $tabla .=  '<div class="alert alert-warning" role="alert">
                     No hay registros en la base de datos
              </div>';
        }else{
    
            $tabla.='<table class="table table-striped table-hover" id="ADMIN_TablaRoles">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Rol</td>
                                <td>Estado</td>
                                <td>Accion</td>
                            </tr>
                        </thead>
                        <tbody>';    
            $contador=1; // Corregido aquí, estaba mal inicializado antes
            foreach($datos as $rows){    
                $style="";
                $botones="";
                if($rows['ESTADO']=="Inactivo"){
                    $style='class="badge badge-danger"';
                    $botones='<form action="'.APP_URL.'app/ajax/DashboardAjax.php" method="POST" autocomplete="off" enctype="multipart/form-data" class="FormularioAjax">
                                <input type="hidden" name="modulo_dashboard" value="restablecer">
                                <input type="hidden" name="id_rol" id="id_rol" value="' . $rows['ID_ROL'] . '">
                                <button type="submit" class="button-restablecer"><i class="bi bi-arrow-counterclockwise"></i></button>   
                                </form>';
                }else{
                    $style='class="badge badge-success"';
                    $botones='<div class="button-container">
                                <button class="button-edit" data-toggle="modal" data-target="#exampleModal" data-idrol="' . $rows['ID_ROL'] . '"><i class="bi bi-pen"></i></button>
                                <form action="'.APP_URL.'app/ajax/DashboardAjax.php" method="POST" autocomplete="off" enctype="multipart/form-data" class="FormularioAjax">
                                    <input type="hidden" name="modulo_dashboard" value="darbaja">
                                    <input type="hidden" name="id_rol" id="id_rol" value="' . $rows['ID_ROL'] . '">
                                    <button type="submit" class="button-delete"><i class="bi bi-trash"></i></button>   
                                </form>
                              </div>';
                }
    
                $tabla.='
                    <tr>                        
                        <td>'.$contador.'</td> <input type="hidden" name="idrol" value="'.$rows['ID_ROL'].'">                
                        <td data-name="DescripcionRol" data-value="'.$rows['DESCRIPCION'].'">'.$rows['DESCRIPCION'].'</td>
                        <td><span '.$style.'>'.$rows['ESTADO'].'</span></td> 
                        <td>
                            '.$botones.'                       
                        </td>
                    </tr>
                ';
                $contador++;
            }
            $pag_final=$contador-1;
    
        $tabla.='</tbody></table>
        ';   
    
    
        return $tabla;
        }
    }
    

    public function ControllerUpdateRol(){
        $idrol=$_POST['id_rol'];
        $descripcion=$_POST['rol'];
        #validamos que el campo descripcion no vaya vacio
        if($descripcion==""){
            $alert=[
                "alert"=>"simple",
                "title"=>"Campos vacios",
                "text"=>"Todos los campos son obligatorios",
                "type"=>"error"
            ];
            return json_encode($alert);
        }
        $datos=array(
            "idrol"=>$idrol,
            "descripcion"=>$descripcion
        );
        $response = $this->actualizarRoles($datos);
        if($response>0){
            $alerta=[
                "tipo"=>"recargar",
                "titulo"=>"Rol Actualizado",
                "texto"=>"Rol Actualizado con exito",
                "icono"=>"success"
            ];
                       
        }else{
            $alerta=[
                "tipo"=>"simple",
                "titulo"=>"Ocurrió un error inesperado",
                "texto"=>"No pudo actualizar, por favor intente nuevamente",
                "icono"=>"error"
            ];
        }
    
        return json_encode($alerta);
    }

    public function ControllerbajaRol(){
        $idrol=$_POST['id_rol'];
        $datos=array("idrol"=>$idrol);
        $response = $this->darBajaRol($datos);
        if($response>0){    
            $alerta=[
                "tipo"=>"recargar",
                "titulo"=>"Rol dado de baja",
                "texto"=>"Rol dado de baja con exito",
                "icono"=>"success"
            ];
                       
        }else{
            $alerta=[
                "tipo"=>"simple",
                "titulo"=>"Ocurrió un error inesperado",
                "texto"=>"No pudo dar de baja, por favor intente nuevamente",
                "icono"=>"error"
            ];
        }
    
        return json_encode($alerta);
    }    

    public function ControllerrestablecerRol(){
        $idrol=$_POST['id_rol'];
        $datos=array("idrol"=>$idrol);
        $response = $this->restablecerRol($datos);
        if($response>0){
            $alerta=[
                "tipo"=>"recargar",
                "titulo"=>"Rol restablecido",
                "texto"=>"Rol restablecido con exito",
                "icono"=>"success"
            ];
                       
        }else{
            $alerta=[
                "tipo"=>"simple",
                "titulo"=>"Ocurrió un error inesperado",
                "texto"=>"No pudo restablecer, por favor intente nuevamente",
                "icono"=>"error"
            ];
        }
    
        return json_encode($alerta);
    }

    public function ControllerRegisterRol(){
        $descripcion=$_POST['rol'];
        #validamos que el campo descripcion no vaya vacio
        if($descripcion==""){
            $alert=[
                "alert"=>"simple",
                "title"=>"Campos vacios",
                "text"=>"Todos los campos son obligatorios",
                "type"=>"error"
            ];
        }
        $datos=array(
            "descripcion"=>$descripcion
        );
        $response = $this->registrarRoles($datos);
        if($response>0){
            $alerta=[
                "tipo"=>"recargar",
                "titulo"=>"Rol Registrado",
                "texto"=>"Rol Registrado con exito",
                "icono"=>"success"
            ];
                       
        }else{
            $alerta=[
                "tipo"=>"simple",
                "titulo"=>"Ocurrió un error inesperado",
                "texto"=>"No pudo registrar, por favor intente nuevamente",
                "icono"=>"error"
            ];
        }
    
        return json_encode($alerta);
    }
    

}