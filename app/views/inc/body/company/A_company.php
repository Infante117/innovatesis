<h1>Datos de la empresa</h1>
<hr>
<?php  
use app\controllers\companyController;
$empresa = new companyController();
echo $empresa->ListarEmpresaController();
?>