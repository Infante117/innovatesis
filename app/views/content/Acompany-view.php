<?php 
#validamos que usuario esta logeado para mostrarle su respectivo header
$idrolll=$_SESSION['idRol'];
if($idrolll=="Asesor"){
    include "app/views/inc/headers/headersAsesor/header_empresa.php";        
    include "app/views/inc/Breadcrumbs/Breadcrumbs_Acompany.php";
}else{
    include "app/views/inc/headers/header_Acompany.php"; 
    include "app/views/inc/Breadcrumbs/Breadcrumbs_Acompany.php";  
}       
?>
<main id="main">
    <section id="contact" class="contact">
        <div class="container">
            <div class="row justify-content-center" data-aos="fade-up">
                <div class="col-lg-12">
                    <div class="info-wrap">
                        <div class="row">
                            <?php include "app/views/inc/body/company/A_company.php";?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include "app/views/inc/footer.php"; 
    ?>
</main>
<!-- Para desplazarme al inicio de la pagina-->
<a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i></a>