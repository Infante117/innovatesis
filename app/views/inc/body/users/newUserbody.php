<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <small> Datos</small><strong> Personales</strong>
                    </div>
                    <div class="card-body">
                        <div id="pay-invoice">
                            <div class="card-body">
                                <form action="<?php echo APP_URL; ?>app/ajax/usuarioAjax.php" method="POST"
                                    autocomplete="off" enctype="multipart/form-data" class="FormularioAjax">
                                    <input type="hidden" name="modulo_usuario" value="registrar">
                                    <div class="form-group">
                                        <div class="row g-3">
                                            <div class="col-md-4"></div>
                                            <!-- ingresamos la foto de usuario -->
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <div style="width: 200px" class="col-4">
                                                        <label class="dropimage profile">
                                                            <input name="usuario_foto" title="Foto de Perfil"
                                                                type="file" accept=".jpg, .png, .jpeg">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ingresamos dni de usuario-->
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" id="dni_usuario"
                                                        class="form-control bg-white border-1" name="dni_usuario"
                                                        placeholder="DNI" maxlength="8">
                                                    <label for="dni_usuario">DNI</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" id="nomb_usuario"
                                                        class="form-control bg-white border-1" name="nomb_usuario"
                                                        placeholder="Nombre" readonly>
                                                    <label for="nomb_usuario">Nombre</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" id="ape_usuario"
                                                        class="form-control bg-white border-1" name="ape_usuario"
                                                        placeholder="Apellidos" readonly>
                                                    <label for="ape_usuario">Apellidos</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <select class="form-select" name="sexo_usuario">
                                                        <option class="form-control" value="Masculino">Masculino
                                                        </option>
                                                        <option class="form-control" value="Femenino">Femenino</option>
                                                    </select>
                                                    <label class="form-label ">Sexo </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="date" class="form-control bg-white border-1"
                                                        name="fechaNac_usuario" placeholder="">
                                                    <label class="form-label">Fecha de Nacimiento </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <select class="form-select" name="estadoCivil">
                                                        <option class="form-control" value="Soltero(a)">Soltero(a)
                                                        </option>
                                                        <option class="form-control" value="Casado(a)">Casado(a)
                                                        </option>
                                                        <option class="form-control" value="Viudo(a)">Viudo(a)</option>
                                                        <option class="form-control" value="Conviviente">Conviviente
                                                        </option>
                                                    </select>
                                                    <label class="form-label ">Estado Civil </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control bg-white border-1"
                                                        name="dir_usuario"
                                                        placeholder="Calle las Amapolas N°459 2 Piso">
                                                    <label class="form-label">Dirección </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control bg-white border-1"
                                                        name="tel_usuario" maxlength="9" placeholder="957845485">
                                                    <label class="form-label">Telefono </label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating">
                                                    <input type="email" class="form-control bg-white border-1"
                                                        name="email_usuario" placeholder="">
                                                    <label class="form-label">Correo </label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control bg-white border-1"
                                                        name="profesion_usuario"
                                                        placeholder="Desarrollador de Software">
                                                    <label class="form-label">Profesion </label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating">
                                                    <textarea type="text-file" class="form-control bg-white border-1"
                                                        name="observacionAdicional_usuario" placeholder=""></textarea>
                                                    <label class="form-label">Observaciones Adicionales </label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating">
                                                    <input type="file" class="form-control bg-white border-1" name="cv"
                                                        placeholder="">
                                                    <label class="form-label"><i class="bi bi-cloud-upload"></i>CV
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header"><small> Redes</small><strong> Sociales</strong></div>
                    <div class="card-body card-block">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-white border-1" name="twitter_usuario"
                                        placeholder="">
                                    <label class="form-label"><i class="bu bi-twitter"> Twitter </i></label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-white border-1" name="facebook_usuario"
                                        placeholder="">
                                    <label class="form-label"><i class="bu bi-facebook"> Facebook </i></label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-white border-1" name="instagram_usuario"
                                        placeholder="">
                                    <label class="form-label"><i class="bu bi-instagram"> Instagram </i></label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-white border-1" name="linkedin_usuario"
                                        placeholder="">
                                    <label class="form-label"><i class="bu bi-linkedin"> Linkedin </i></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </br>
                <div class="card">
                    <div class="card-header"><small> Datos</small><strong> Corporativos</strong></div>
                    <div class="card-body card-block">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-white border-1" name="usuario_usuario"
                                        placeholder="clienteEdia">
                                    <label class="form-label">Usuario </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="password" class="form-control bg-white border-1" name="clave_usuario"
                                        placeholder="">
                                    <label class="form-label">Password </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating date" id="date3" data-target-input="nearest">
                                    <select class="form-select bg-white border-1" name="rol_usuario">
                                        <?php foreach ($roles as $rol) : ?>
                                        <?php if ($rol['ID_ROL'] == $rol_use) : ?>
                                        <option value="<?php echo $rol['ID_ROL']; ?>">
                                            <?php echo $rol['DESCRIPCION']; ?>
                                        </option>
                                        <?php else : ?>
                                        <option value="<?php echo $rol['ID_ROL']; ?>">
                                            <?php echo $rol['DESCRIPCION']; ?>
                                        </option>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <label>Rol </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary text-white w-100 py-3" type="submit">Registrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>

            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <!--script para la consulta de usuarios a traves de una api-->
            <script>
             $(document).ready(function() {
                $('#dni_usuario').on('input', function() {
                    var dni = $(this).val();
                    if (dni.length === 8) {
                        $.ajax({
                            url: 'https://dniruc.apisperu.com/api/v1/dni/' + dni +
                                '?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImNyaXN0aGlhbi5pbmZhbnRlMTE3QGdtYWlsLmNvbSJ9.3swHoIp6E8dcqLd1kgFGj5eRthSDrKUmZLccLzBAgbE',
                            type: 'GET',
                            dataType: 'json',
                            data: {
                                dni: dni
                            },
                            success: function(data) {
                                $('#nomb_usuario').val(data.nombres);
                                $('#ape_usuario').val(data.apellidoPaterno + ' ' + data
                                    .apellidoMaterno);
                            },
                            error: function(xhr, status, error) {
                                console.error('Error al obtener los datos del usuario:',
                                    status, error);
                            }
                        });
                    }
                });
             });
            </script>
            <script>
             document.addEventListener("DOMContentLoaded", function() {
                [].forEach.call(document.querySelectorAll('.dropimage'), function(img) {
                    img.onchange = function(e) {
                        var inputfile = this,
                            reader = new FileReader();
                        reader.onloadend = function() {
                            inputfile.style['background-image'] = 'url(' + reader.result + ')';
                        }
                        reader.readAsDataURL(e.target.files[0]);
                    }
                });
             });
            </script>