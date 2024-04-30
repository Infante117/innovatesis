<?php
    use app\controllers\dashboardController;
    $dashboard = new dashboardController();
    $services = $dashboard->countServices();
    $promotions = $dashboard->countPromotions();
    $pots = $dashboard->countPotsSemanales();
    $potsA = $dashboard->countPotsActivos();
    $users = $dashboard->countUsers();
    $totalservices = $services->rowCount();
    $totalpromotions = $promotions->rowCount();
    $totalpots = $pots->rowCount();
    $totalusers = $users->rowCount();    
    $potsActivos = $potsA->rowCount();


?>
<section class="features">
    <div class="container" data-aos="fade-up">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Bienvenido <strong><?php echo $_SESSION['nombre']; ?> <?php echo $_SESSION['apellido']; ?></strong>.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="row" data-aos="fade-up">
            <div class="col-lg-12">
                <div class="card-dashboard">
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

<script src="<?php echo APP_URL; ?>app/views/assets/js/calendar.js"></script>

