<?php
    use app\controllers\dashboardController;
    $dashboard = new dashboardController();
    $services = $dashboard->countServices();
    $promotions = $dashboard->countPromotions();
    $pots = $dashboard->countPotsSemanales();
    $users = $dashboard->countUsers();
    $totalservices = $services->rowCount();
    $totalpromotions = $promotions->rowCount();
    $totalpots = $pots->rowCount();
    $totalusers = $users->rowCount();

?>
<section id="features" class="features">
    <div class="container" data-aos="fade-up">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Bienvenido <strong><?php echo $_SESSION['nombre']; ?> <?php echo $_SESSION['apellido']; ?></strong>.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="icon-box">
                    <i class="ri-customer-service-2-fill" style="color: #ffbb2c;"></i>
                    <h3><a href="<?php echo APP_URL ?>Aservices/">Servicios (<?php echo $totalservices ?>)</a></h3>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
                <div class="icon-box">
                    <i class="ri-user-voice-line" style="color: #5578ff;"></i>
                    <h3><a href="<?php echo APP_URL ?>Apromotions/"> Promociones (<?php echo $totalpromotions ?>)</a>
                    </h3>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
                <div class="icon-box">
                    <i class="ri-blogger-fill" style="color: #e80368;"></i>
                    <h3><a href="<?php echo APP_URL ?>Ablog/">Pots Semanales (<?php echo $totalpots ?>)</a></h3>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
                <div class="icon-box">
                    <i class="ri-user-fill" style="color: #023FFF;"></i>
                    <h3><a href="<?php echo APP_URL ?>Ausers/">Usuarios (<?php echo $totalusers ?>)</a></h3>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-8 col-md-4">
                <div class="card">
                    <div class="card-header">
                        <strong><i class="ri-list-settings-fill" style="color: #FF0202;"></i> Roles</strong>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#NuevoRol"
                            title="Nuevo Rol">
                            <i class="bi bi-plus-circle"></i></button>
                            <?php echo $dashboard->TableRoles(); ?>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="icon-box">
                    <div class="containerCalendar">
                        <div class="left">
                            <div class="calendar">
                                <div class="month">
                                    <i class="fas fa-angle-left prev"></i>
                                    <div class="date">Enero 2024</div>
                                    <i class="fas fa-angle-right next"></i>
                                </div>
                                <div class="weekdays">
                                    <div data-initial="D"><span class="day">Domingo</span></div>
                                    <div data-initial="L"><span class="day">Lunes</span></div>
                                    <div data-initial="M"><span class="day">Martes</span></div>
                                    <div data-initial="X"><span class="day">Miércoles</span></div>
                                    <div data-initial="J"><span class="day">Jueves</span></div>
                                    <div data-initial="V"><span class="day">Viernes</span></div>
                                    <div data-initial="S"><span class="day">Sábado</span></div>
                                </div>
                                <div class="days"></div>
                                <div class="goto-today">
                                    <div class="goto">
                                        <input type="text" placeholder="mm/yyyy" class="date-input" />
                                        <button class="goto-btn">Vamos</button>
                                    </div>
                                    <button class="today-btn">Hoy</button>
                                </div>
                            </div>
                        </div>
                        <div class="right">
                            <div class="today-date">
                                <div class="event-day">wed</div>
                                <div class="event-date">12 de diciembre de 2024</div>
                            </div>
                            <div class="events"></div>
                            <div class="add-event-wrapper">
                                <div class="add-event-header">
                                    <div class="title">Añadir evento</div>
                                    <i class="fas fa-times close"></i>
                                </div>
                                <div class="add-event-body">
                                    <div class="add-event-input">
                                        <input type="text" placeholder="Nombre Evento" class="event-name" />
                                    </div>
                                    <div class="add-event-input">
                                        <input type="text" placeholder="Hora del evento desde"
                                            class="event-time-from" />
                                    </div>
                                    <div class="add-event-input">
                                        <input type="text" placeholder="Hora del evento hasta" class="event-time-to" />
                                    </div>
                                </div>
                                <div class="add-event-footer">
                                    <button class="add-event-btn">Añadir evento</button>
                                </div>
                            </div>
                        </div>
                        <button class="add-event">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Actualizacion de Rol</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo APP_URL; ?>app/ajax/DashboardAjax.php" method="POST" autocomplete="off"
                    enctype="multipart/form-data" class="FormularioAjax">
                    <input type="hidden" name="modulo_dashboard" value="actualizar">
                    <input type="hidden" name="id_rol" id="id_rol" value="">
                    <div class="form-group">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="nombre" class="form-label">Rol</label>
                                <input type="text" class="form-control" id="rol" name="rol" value="" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="NuevoRol" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Nuevo Rol</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo APP_URL; ?>app/ajax/DashboardAjax.php" method="POST" autocomplete="off"
                    enctype="multipart/form-data" class="FormularioAjax">
                    <input type="hidden" name="modulo_dashboard" value="registrar">
                    <input type="hidden" name="id_rol" id="id_rol">
                    <div class="form-group">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="nombre" class="form-label">Rol</label>
                                <input type="text" class="form-control" id="rol" name="rol" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo APP_URL; ?>app/views/assets/js/calendar.js"></script>
<script>
$(document).ready(function() {
    $('.button-edit').click(function() {
        var descripcion = $(this).closest('tr').find('td[data-name="DescripcionRol"]').text();
        var id = $(this).closest('tr').find('input[name="idrol"]').val();
        $('#rol').attr('value', descripcion);
        $('#id_rol').attr('value', id);
    });
});
</script>