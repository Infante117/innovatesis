<section id="portfolio-details" class="portfolio-details">
    <div class="container" data-aos="fade-up">
        <div class="row gy-4">
            <div class="col-lg-8">
                <div class="portfolio-details-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        <div class="swiper-slide">
                            <img src="<?php echo APP_URL ?>app/views/assets/imagenes/promotions/<?php echo $foto1 ?>"
                                alt="Foto_detalle_promocion">
                        </div>
                        <div class="swiper-slide">
                            <img src="<?php echo APP_URL ?>app/views/assets/imagenes/promotions/<?php echo $foto2 ?>"
                                alt="Foto_detalle_promocion3">
                        </div>
                        <div class="swiper-slide">
                            <img src="<?php echo APP_URL ?>app/views/assets/imagenes/promotions/<?php echo $foto3 ?>"
                                alt="Foto_detalle_promocion3">
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="portfolio-info">
                    <h3>Información</h3>
                    <ul>
                        <li><strong>Titulo</strong>: <?php echo $titulo ?></li>
                        <li><strong>Inicio de Promoción</strong>: <?php echo $fecha_inicio ?></li>
                        <li><strong>Fin de Promoción</strong>: <?php echo $fecha_fin ?></li>
                        <li><strong>Estado</strong>: <?php echo $estadoP ?></li>
                        <!--Redigiremos a la promocion activiva sea necesario o adquerimos el servicio-->
                        
                        <?php if($estadoP == "Vigente"): ?>
                            <?php
                                $cosulta= $controller->consultaPromovigente($servicio);
                                $consulta_json = json_encode($cosulta);
                                $promo=$cosulta[0]['ID_SERVICIO'];
                                $nombre=$cosulta[0]['NOMBRE_SERVICIO'];?>
                            <button type="button"  class="btn-buy" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" data-id="'.<?php echo $promo?>.'" data-servis="'.$row['NOMBRE_SERVICIO'].'"">Reservar</button>
                            
                            <?php else: ?>             
                                <?php
                                $cosulta= $controller->consultaPromovigente($servicio);
                                $consulta_json = json_encode($cosulta);
                                $promo=$cosulta[0]['ID_PROMOCION'];
                                ?>
                                <a href="<?php echo APP_URL ?>promotionsDetails/<?php echo $promo ?>/" ><button class="btn-buy">Redirigirme a la promoción actual</button></a>

                            <?php endif;?>
                    </ul>
                </div>
                <div class="portfolio-description">
                    <h2>Destalles de la promoción</h2>
                    <p>
                        <?php echo $descripcion ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between align-items-center">
                <button id="backButton" type="button" class="button-atras" style="display:none;"
                    onclick="showPage(1)"><i class="bi bi-arrow-left"></i> </button>
                <h1 class="modal-title fs-5">Reservación de Cita</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Página 1:  -->
                <div id="page1">
                    <form id="formularioemail" action="<?php echo APP_URL; ?>app/ajax/EmailAjax.php" method="POST"
                        autocomplete="off" class="FormularioAjax">
                        <input type="hidden" name="modulo_email" value="reservarCita">
                        <input type="hidden" name="id_servicio" id="id_servicio" value="<?php echo $promo?>">
                        <div class="form-group">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" id="reser_servicio" class="form-control bg-white border-1"
                                            name="reser_servicio" placeholder="" value="<?php echo $nombre?>" readonly>
                                        <label for="reser_servicio">Servicio</label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-floating">
                                        <input type="date" id="reser_fecha" class="form-control bg-white border-1"
                                            name="reser_fecha" placeholder="" min="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>">
                                        <label for="reser_fecha">Fecha</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <select class="form-select" name="reser_hora">
                                            <?php
                                        date_default_timezone_set('America/Lima'); // Configura la zona horaria
                                        $horaActual = strtotime(date('H:i:s')); // Hora actual en formato UNIX
                                        $horaInicial = strtotime('08:00:00'); // Hora inicial en formato UNIX
                                        $horaFinal = strtotime('20:00:00'); // Hora final en formato UNIX
                                        $intervalo = 15 * 60; // Intervalo de 15 minutos en segundos

                                        for ($hora = $horaInicial; $hora <= $horaFinal; $hora += $intervalo) {
                                            $horaFormateada = date('h:i A', $hora); // Formatear la hora en formato 12 horas con AM/PM
                                            $hora24h = date('H:i:s', $hora); // Formatear la hora en formato 24 horas
                                            $horaDisponible = ($hora > $horaActual) ? '' : 'disabled'; // Verificar si la hora está después de la hora actual
                                            echo "<option class='form-control' value='$hora24h' $horaDisponible>$horaFormateada</option>";
                                        }
                                        ?>
                                        </select>
                                        <label class="form-label ">Hora </label>
                                    </div>
                                </div>
                                <div class="col-md-9"></div>
                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <button type="button" class="btn btn-primary"
                                            onclick="showPage(2)">Continuar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- Página 2:-->
                <div id="page2" style="display: none;">
                    <div class="form-group">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" id="reser_nombre_cliente" class="form-control bg-white border-1"
                                        name="reser_nombre_cliente" placeholder="">
                                    <label for="reser_nombre_cliente">Nombre Completo</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" id="reser_correo_cliente" class="form-control bg-white border-1"
                                        name="reser_correo_cliente" placeholder="">
                                    <label for="reser_correo_cliente">Correo</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" id="reser_telefono_cliente"
                                        class="form-control bg-white border-1" name="reser_telefono_cliente"
                                        placeholder="" maxlength="9">
                                    <label for="reser_telefono_cliente">telefono</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <textarea type="text-file" class="form-control bg-white border-1"
                                        name="reser_mensaje_cliente" placeholder=""></textarea>
                                    <label class="form-label">Mensaje </label>
                                </div>
                            </div>
                            <div class="col-md-9"></div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <button type="submit" class="btn btn-primary">Reservar</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function showPage(pageNumber) {
    if (pageNumber === 1) {
        document.getElementById('page1').style.display = 'block';
        document.getElementById('page2').style.display = 'none';
        document.getElementById('backButton').style.display = 'none';
    } else if (pageNumber === 2) {
        document.getElementById('page1').style.display = 'none';
        document.getElementById('page2').style.display = 'block';
        document.getElementById('backButton').style.display = 'block';
    }
}
</script>