<div class="map-section">
    <iframe style="border:0; width: 100%; height: 350px;"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.522401989643!2d-79.90637572591417!3d-6.705911765560928!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x904ced93986be5f5%3A0xbf2674128fb2e51b!2sLeandro%20Pastor%20141%2C%20Lambayeque%2014013%2C%20Per%C3%BA!5e0!3m2!1ses-419!2sus!4v1709663150574!5m2!1ses-419!2sus"
        frameborder="0" allowfullscreen></iframe>
</div>

<section id="contact" class="contact">
    <div class="container">
        <div class="row justify-content-center" data-aos="fade-up">
            <div class="col-lg-12">
                <?php  
            use app\controllers\companyController;
            $empresa = new companyController();
            echo $empresa->ListarEmpresaControllerContact();
            ?>
            </div>
        </div>
        <div class="row mt-5 justify-content-center" data-aos="fade-up">
            <div class="col-lg-10">
                <form id="formularioemail" action="<?php echo APP_URL; ?>app/ajax/EmailAjax.php" method="POST"
                    autocomplete="off" class="FormularioAjax">
                    <input type="hidden" name="modulo_email" value="enviar">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Su Nombre"
                                required>
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Su Email"
                                required>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto"
                            required>
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control" name="message" rows="5" placeholder="Mensaje"
                            required></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit">Enviar mensaje</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-5 justify-content-center" data-aos="fade-up">
            <div class="col-lg-10">
                <h2 align="Center"><u>Hora de Apertura</u></h2>
                <p align="Center">Nuestro horario de apertura es:</p>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="info-box">
                            <table class="horario">
                                <thead>
                                    <tr>
                                        <th>Día</th>
                                        <th>Horario</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr >
                                        <td>Lunes</td>
                                        <td>9:00 AM - 5:00 PM</td>
                                    </tr>
                                    <tr>
                                        <td>Martes</td>
                                        <td>9:00 AM - 5:00 PM</td>
                                    </tr>
                                    <tr>
                                        <td>Miércoles</td>
                                        <td>9:00 AM - 5:00 PM</td>
                                    </tr>
                                    <tr>
                                        <td>Jueves</td>
                                        <td>9:00 AM - 5:00 PM</td>
                                    </tr>
                                    <tr>
                                        <td>Viernes</td>
                                        <td>9:00 AM - 5:00 PM</td>
                                    </tr>
                                    <tr>
                                        <td>Sábado</td>
                                        <td>Cerrado</td>
                                    </tr>
                                    <tr>
                                        <td>Domingo</td>
                                        <td>Cerrado</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>

                    </div>
</section><!-- End Contact Section -->