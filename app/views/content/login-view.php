<!-- Section: Design Block -->
<section class="login-section">
    <!-- Jumbotron -->
    <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
        <div class="container">
            <div class="row gx-lg-5 align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h1 class="my-5 display-3 fw-bold ls-tight">
                        Innova Tesis <br />
                        <span class="text-primary">Perú</span>
                    </h1>
                    <p style="color: hsl(217, 10%, 50.8%)">
                        "La pregunta que me hago casi todos los días es: '¿Estoy haciendo lo más importante que
                        puedo?'"<br>
                        <span class="text-primary">Mark Zuckerberg</span>
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="card" id="login">
                        <div class="card-body py-5 px-md-5">
                            <form action="" method="POST" autocomplete="off">
                                <div class="form-outline mb-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-white border-1" name="login_usuario"
                                            placeholder="">
                                        <label class="form-label"><i class="fa-solid fa-user"></i> Usuario
                                        </label>
                                    </div>
                                </div>
                                <div class="form-outline mb-4">
                                    <div class="form-outline mb-4 password-container">
                                        <div class="form-floating">
                                            <input type="password" class="form-control bg-white border-1 passwordField"
                                                name="login_clave" placeholder="">
                                            <label class="form-label"><i class="fa-solid fa-key"></i> Contraseña
                                            </label>
                                        </div>
                                        <i class="toggle-password fa-solid fa-eye-slash"></i>
                                    </div>
                                </div>
                                <!-- <div class="row mb-4">
                                    <div class="col">
                                        <a href="">¿Has olvidado tu contraseña?</a>
                                    </div>
                                </div>-->

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block mb-4">
                                    <i class="fa-solid fa-right-to-bracket"></i> Iniciar Sesión
                                </button>
                                
                                <div class="row mb-4">
                                        <p><a href="<?php echo APP_URL?>">
                                                Regresar
                                            </a></p>
                                </div>
                                <!--<div class="row mb-4">
                                    <div class="col">                            
                                        <p>No tienes Cuenta? <button type="button" class="link-primary-modal"
                                                data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                Registrate
                                            </button></p>
                                    </div>
                                </div>-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->
<!--creamos un modal para el registro de usuarios--->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="containerSignUp">
                    <header>Formulario de Registro</header>
                    <div class="progress-barSU">
                        <div class="step">
                            <p>
                                Nombres
                            </p>
                            <div class="bullet">
                                <span class="spanSU">1</span>
                            </div>
                            <div class="check fa-solid fa-check"></div>
                        </div>
                        <div class="step">
                            <p>
                                Contacto
                            </p>
                            <div class="bullet">
                                <span class="spanSU">2</span>
                            </div>
                            <div class="check fa-solid fa-check"></div>
                        </div>
                        <div class="step">
                            <p>
                                Cumpleaños
                            </p>
                            <div class="bullet">
                                <span class="spanSU">3</span>
                            </div>
                            <div class="check fa-solid fa-check"></div>
                        </div>
                        <div class="step">
                            <p>
                                Finalizar
                            </p>
                            <div class="bullet">
                                <span class="spanSU">4</span>
                            </div>
                            <div class="check fa-solid fa-check"></div>
                        </div>
                    </div>
                    <div class="form-outer">
                        <form action="<?php echo APP_URL; ?>app/ajax/usuarioAjax.php" method="POST" autocomplete="off"
                            enctype="multipart/form-data" class="FormularioAjax">
                            <input type="hidden" name="modulo_usuario" value="registrarCliente">
                            <div class="page slide-page">
                                <div class="title">
                                    Basic Info:
                                </div>
                                <div class="form-outline mb-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-white border-1"
                                            name="su_nombreCliente" placeholder="">
                                        <label class="form-label"><i class="fa-sharp fa-solid fa-id-card"></i> Nombre
                                            Completo
                                        </label>
                                    </div>
                                </div>
                                <div class="form-outline mb-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-white border-1"
                                            name="su_apellidoCliente" placeholder="">
                                        <label class="form-label"><i class="fa-sharp fa-solid fa-id-card"></i>
                                            Apellidos Completos
                                        </label>
                                    </div>
                                </div>
                                <div class="field">
                                    <button class="firstNext next">Siguiente <i
                                            class="fa-sharp fa-solid fa-chevron-right"></i></button>
                                </div>
                            </div>
                            <div class="page">
                                <div class="title">
                                    Información de Contacto:
                                </div>
                                <div class="form-outline mb-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-white border-1"
                                            name="su_correoCliente" placeholder="">
                                        <label class="form-label"><i class="fa-sharp fa-solid fa-envelope"></i> Correo
                                        </label>
                                    </div>
                                </div>
                                <div class="form-outline mb-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-white border-1"
                                            name="su_telefonoCliente" placeholder="" maxlength="9">
                                        <label class="form-label"><i class="fa-sharp fa-solid fa-phone"></i> Telefono
                                        </label>
                                    </div>
                                </div>
                                <div class="field btns">
                                    <button class="prev-1 prev"><i class="fa-sharp fa-solid fa-chevron-left"></i>
                                        Atras</button>
                                    <button class="next-1 next">Siguiente <i
                                            class="fa-sharp fa-solid fa-chevron-right"></i></button>
                                </div>
                            </div>
                            <div class="page">
                                <div class="title">
                                    Genero y Fecha de Nacimiento:
                                </div>
                                <div class="form-outline mb-4">
                                    <div class="form-floating">
                                        <select class="form-select" name="su_generoCliente">
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                            <option value="Otro">Otro</option>
                                        </select>
                                        <label><i class="fa-sharp fa-solid fa-mars-and-venus"></i> Genero</label>
                                    </div>
                                </div>
                                <div class="form-outline mb-4">
                                    <div class="form-floating">
                                        <input type="date" class="form-control bg-white border-1"
                                            name="su_fechaNacimientoCliente" placeholder="">
                                        <label class="form-label"><i class="fa-sharp fa-solid fa-calendar-days"></i>
                                            Fecha de
                                            Nacimiento
                                        </label>
                                    </div>
                                </div>
                                <div class="field btns">
                                    <button class="prev-2 prev"><i class="fa-sharp fa-solid fa-chevron-left"></i>
                                        Atras</button>
                                    <button class="next-2 next">Siguiente <i
                                            class="fa-sharp fa-solid fa-chevron-right"></i></button>
                                </div>
                            </div>
                            <div class="page">
                                <div class="title">
                                    Detalles de registro:
                                </div>
                                <div class="form-outline mb-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-white border-1"
                                            name="su_usuarioCliente" placeholder="">
                                        <label class="form-label"><i class="fa-sharp fa-solid fa-id-badge"></i> Usuario
                                        </label>
                                    </div>
                                </div>
                                <div class="form-outline mb-4">
                                    <div class="form-outline mb-4 password-container">
                                        <div class="form-floating">
                                            <input type="password" class="form-control bg-white border-1 passwordField"
                                                name="su_contrasenaCliente1" placeholder="">
                                            <label class="form-label"><i class="fa-solid fa-key"></i> Contraseña
                                            </label>
                                        </div>
                                        <i class="toggle-password fa-solid fa-eye-slash"></i>
                                    </div>
                                </div>
                                <div class="form-outline mb-4">
                                    <div class="form-outline mb-4 password-container">
                                        <div class="form-floating">
                                            <input type="password" class="form-control bg-white border-1 passwordField"
                                                name="su_contrasenaCliente2" placeholder="">
                                            <label class="form-label"><i class="fa-solid fa-key"></i> Repita la
                                                Contraseña
                                            </label>
                                        </div>
                                        <i class="toggle-password fa-solid fa-eye-slash"></i>
                                    </div>
                                </div>
                                <div class="field btns">
                                    <button class="prev-3 prev"><i class="fa-sharp fa-solid fa-chevron-left"></i>
                                        Atras</button>
                                    <button class="submit"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<!--finalizamos el modal para el registro de usuarios--->








<?php
	if(isset($_POST['login_usuario']) && isset($_POST['login_clave'])){
		$insLogin->iniciarSesionControlador();
	}
?>


<script>
const togglePasswords = document.querySelectorAll('.toggle-password');
const passwordFields = document.querySelectorAll('.passwordField');

togglePasswords.forEach((togglePassword, index) => {
    togglePassword.addEventListener('click', function() {
        const type = passwordFields[index].getAttribute('type') === 'password' ? 'text' : 'password';
        passwordFields[index].setAttribute('type', type);
        togglePassword.classList.toggle('fa-eye');
        togglePassword.classList.toggle('fa-eye-slash');
    });
});
</script>
<script>
const slidePage = document.querySelector(".slide-page");
const nextBtnFirst = document.querySelector(".firstNext");
const prevBtnSec = document.querySelector(".prev-1");
const nextBtnSec = document.querySelector(".next-1");
const prevBtnThird = document.querySelector(".prev-2");
const nextBtnThird = document.querySelector(".next-2");
const prevBtnFourth = document.querySelector(".prev-3");
const submitBtn = document.querySelector(".submit");
const progressText = document.querySelectorAll(".step p");
const progressCheck = document.querySelectorAll(".step .check");
const bullet = document.querySelectorAll(".step .bullet");
let current = 1;

nextBtnFirst.addEventListener("click", function(event) {
    event.preventDefault();
    slidePage.style.marginLeft = "-25%";
    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    current += 1;
});
nextBtnSec.addEventListener("click", function(event) {
    event.preventDefault();
    slidePage.style.marginLeft = "-50%";
    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    current += 1;
});
nextBtnThird.addEventListener("click", function(event) {
    event.preventDefault();
    slidePage.style.marginLeft = "-75%";
    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    current += 1;
});
submitBtn.addEventListener("click", function() {
    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    current += 1;
});

prevBtnSec.addEventListener("click", function(event) {
    event.preventDefault();
    slidePage.style.marginLeft = "0%";
    bullet[current - 2].classList.remove("active");
    progressCheck[current - 2].classList.remove("active");
    progressText[current - 2].classList.remove("active");
    current -= 1;
});
prevBtnThird.addEventListener("click", function(event) {
    event.preventDefault();
    slidePage.style.marginLeft = "-25%";
    bullet[current - 2].classList.remove("active");
    progressCheck[current - 2].classList.remove("active");
    progressText[current - 2].classList.remove("active");
    current -= 1;
});
prevBtnFourth.addEventListener("click", function(event) {
    event.preventDefault();
    slidePage.style.marginLeft = "-50%";
    bullet[current - 2].classList.remove("active");
    progressCheck[current - 2].classList.remove("active");
    progressText[current - 2].classList.remove("active");
    current -= 1;
});
</script>