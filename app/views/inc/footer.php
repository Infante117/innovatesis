 <!-- ======= Footer ======= -->
 <footer id="footer">
     <div class="footer-top">
         <div class="container">
             <div class="row">
                 <?php  
                  use app\controllers\companyController;
                  $empresa = new companyController();
                  echo $empresa->ListarEmpresaControllerFooter();
                  ?>
                  
                 <div class="col-lg-2 col-md-6 footer-links">
                     <h4>Enlaces útiles</h4>
                     <ul>
                         <li><i class="bx bx-chevron-right"></i> <a href="<?php echo APP_URL; ?>">Inicio</a></li>
                         <li><i class="bx bx-chevron-right"></i> <a href="<?php echo APP_URL; ?>about/">Sobre
                                 Nosotros</a></li>
                         <li><i class="bx bx-chevron-right"></i> <a href="<?php echo APP_URL; ?>services/">Servicios</a>
                         </li>
                     </ul>
                 </div>

             </div>
         </div>
     </div>
 </footer>
 <!-- End Footer -->