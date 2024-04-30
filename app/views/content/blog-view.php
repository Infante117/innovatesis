<!--incluimos el header para el dasboard-->

<?php 
if(isset($_SESSION['idRol'])) {
$rol=$_SESSION['idRol'];
if($rol=="Asesor"){
    include "app/views/inc/headers/headersAsesor/header_blog.php";        
    include "app/views/inc/Breadcrumbs/Breadcrumbs_Ablog.php";
}else{
    include "app/views/inc/headers/header_blog.php"; 
    include "app/views/inc/Breadcrumbs/Breadcrumbs_blog.php";  
}}else{
    include "app/views/inc/headers/header_blog.php"; 
    include "app/views/inc/Breadcrumbs/Breadcrumbs_blog.php";  
}     
?>
<main id="main">
    <?php include "app/views/inc/body/blog/C_bodyBlog.php";
    include "app/views/inc/footer.php"; 
    ?>
</main>
<!-- Para desplazarme al inicio de la pagina-->
<a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i></a>