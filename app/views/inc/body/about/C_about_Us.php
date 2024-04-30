<?php  
use app\controllers\companyController;
$empresa = new companyController();
echo $empresa->AboutEmpresaController();
?>

<?php  
use app\controllers\userController;
$team = new userController();
echo $team->teaminaboutController();
?>