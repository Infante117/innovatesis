<style>
.imagePreviewProfileUserUpdate {
    width: 100%;
    /*ancho de la imagen*/
    height: 260px;
    /*alto de la imagen*/
    background-position: center center;
    background: url(<?php echo APP_URL; ?>app/views/assets/imagenes/usuarios/<?php echo $foto; ?>);
    /*imagen de fondo*/
    /*centramos la imagen*/
    background-position: center center;
    background-color: #fff;
    background-size: cover;
    background-repeat: no-repeat;
    display: inline-block;
    box-shadow: 0px -3px 6px 2px rgba(0, 0, 0, 0.2);
}
</style>
<h5 class="section-booking-title pe-3">Actualización de Datos Usuario</h5>
<hr>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <small> Datos Personales de</small><strong>
                            <?php echo $nomb_usuario," ",$ape_usuario ?></strong>
                    </div>
                    <div class="card-body">
                        <div id="pay-invoice">
                            <div class="card-body">
                                <form action="<?php echo APP_URL; ?>app/ajax/usuarioAjax.php" method="POST"
                                    autocomplete="off" enctype="multipart/form-data" class="FormularioAjax">
                                    <input type="hidden" name="modulo_usuario" value="actualizarAlumno">
                                    <input type="hidden" name="id_usuario" id="id_usuario"
                                        value="<?php echo $id_usuario; ?>">
                                    <div class="form-group">
                                        <div class="row g-3">
                                            <!-- ingresamos la foto de usuario -->
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div class="form-floating">
                                                    <div class="portada-img">
                                                        <div class="col-sm-12 imgUp">
                                                            <div class="imagePreviewProfileUserUpdate"></div>
                                                            <label class="btn btn-primary1 btn-upload">
                                                                <span class="btn-text">Cambiar foto de
                                                                    Perfil</span>
                                                                <input type="file" class="uploadFile img"
                                                                    name="perfil_usuario" value="Upload Photo"
                                                                    style="display: none;">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ingresamos dni de usuario-->
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control bg-white border-1"
                                                        name="dni_usuario" value="<?php echo $dni; ?>" maxlength="8">
                                                    <label>DNI</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control bg-white border-1"
                                                        name="nomb_usuario" value="<?php echo $nomb_usuario; ?>">
                                                    <label>Nombre </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control bg-white border-1"
                                                        name="ape_usuario" value="<?php echo $ape_usuario; ?>">
                                                    <label class="form-label">Apellidos </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <select class="form-select" name="sexo_usuario">
                                                        <?php if ($sexo_usuario == "Masculino"): ?>
                                                        <option value="Masculino" selected>Masculino</option>
                                                        <option value="Femenino">Femenino</option>
                                                        <?php elseif ($sexo_usuario == "Femenino"): ?>
                                                        <option value="Masculino">Masculino</option>
                                                        <option value="Femenino" selected>Femenino</option>
                                                        <?php endif; ?>
                                                    </select>
                                                    <label class="form-label">Sexo</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="date" class="form-control bg-white border-1"
                                                        name="fechaNac_usuario" value="<?php echo $fnac_usuario; ?>">
                                                    <label class="form-label">Fecha de Nacimiento </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <select class="form-select" name="estadocivil_usuarioActualizar">
                                                        <?php if ($estadoCivil == "Soltero(a)"): ?>
                                                        <option class="form-control" value="Soltero(a)" SELECTED>
                                                            Soltero(a)</option>
                                                        <option class="form-control" value="Casado(a)">Casado(a)
                                                        </option>
                                                        <option class="form-control" value="Viudo(a)">Viudo(a)
                                                        </option>
                                                        <option class="form-control" value="Conviviente">Conviviente
                                                        </option>
                                                        <?php elseif ($estadoCivil == "Casado(a)"): ?>
                                                        <option class="form-control" value="Soltero(a)">Soltero(a)
                                                        </option>
                                                        <option class="form-control" value="Casado(a)" SELECTED>
                                                            Casado(a)</option>
                                                        <option class="form-control" value="Viudo(a)">Viudo(a)
                                                        </option>
                                                        <option class="form-control" value="Conviviente">Conviviente
                                                        </option>
                                                        <?php elseif ($estadoCivil == "Viudo(a)"): ?>
                                                        <option class="form-control" value="Soltero(a)">Soltero(a)
                                                        </option>
                                                        <option class="form-control" value="Casado(a)">Casado(a)
                                                        </option>
                                                        <option class="form-control" value="Viudo(a)" SELECTED>
                                                            Viudo(a)</option>
                                                        <option class="form-control" value="Conviviente">Conviviente
                                                        </option>
                                                        <?php elseif ($estadoCivil == "Conviviente"): ?>
                                                        <option class="form-control" value="Soltero(a)">Soltero(a)
                                                        </option>
                                                        <option class="form-control" value="Casado(a)">Casado(a)
                                                        </option>
                                                        <option class="form-control" value="Viudo(a)">Viudo(a)
                                                        </option>
                                                        <option class="form-control" value="Conviviente" SELECTED>
                                                            Conviviente</option>
                                                        <?php endif; ?>
                                                    </select>
                                                    <label class="form-label ">Estado Civil </label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control bg-white border-1"
                                                        name="dir_usuario" value="<?php echo $dir_usuario; ?>">
                                                    <label class="form-label">Dirección </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control bg-white border-1"
                                                        name="tel_usuario" maxlength="9"
                                                        value="<?php echo $tel_usuario; ?>">
                                                    <label class="form-label">Telefono </label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating">
                                                    <input type="email" class="form-control bg-white border-1"
                                                        name="email_usuario" value="<?php echo $email_usuario; ?>">
                                                    <label class="form-label">Correo </label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control bg-white border-1"
                                                        name="profesion_usuario" value="<?php echo $profesion; ?>">
                                                    <label class="form-label">Profesion </label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating">
                                                    <textarea type="text-file" class="form-control bg-white border-1"
                                                        name="observacionAdicional_usuario"
                                                        value="<?php echo $informacionAdicional; ?>"><?php echo $informacionAdicional; ?></textarea>
                                                    <label class="form-label">Acerca de </label>
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
                    <div class="card-header"><small> Documentos</small><strong> Personales</strong></div>
                    <div class="card-body card-block">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <div class="preview-document">
                                        <embed id="pdf-preview"
                                            src="<?php echo APP_URL; ?>app/views/assets/documents/<?php echo $documento; ?>"
                                            type="application/pdf" width="100%" height="600px">
                                        <label for="pdf-input" class="file btn btn-lg btn-primary">
                                            Cambiar cv
                                            <input id="pdf-input" type="file" accept=".pdf" name="cv">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header"><small> Redes</small><strong> Sociales</strong></div>
                    <div class="card-body card-block">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-white border-1" name="twitter_usuario"
                                        value="<?php echo $twitter; ?>">
                                    <label class="form-label"><i class="bu bi-twitter"> Twitter </i></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-white border-1" name="facebook_usuario"
                                        value="<?php echo $facebook; ?>">
                                    <label class="form-label"><i class="bu bi-facebook"> Facebook </i></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-white border-1" name="instagram_usuario"
                                        value="<?php echo $instagram; ?>">
                                    <label class="form-label"><i class="bu bi-instagram"> Instagram </i></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-white border-1" name="linkedin_usuario"
                                        value="<?php echo $linkedin; ?>">
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
                                        value="<?php echo $usuario_UA; ?>">
                                    <label class="form-label">Usuario </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="password" class="form-control bg-white border-1" name="clave_usuario"
                                        value="<?php echo $contrasena; ?>">
                                    <label class="form-label">Password </label>
                                </div>
                            </div>                            
                            <div class="col-12">
                                <button class="btn btn-primary text-white w-100 py-3" type="submit">Actualizar
                                    Datos</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>

            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <!--<script>
            document.addEventListener("DOMContentLoaded", function() {
                [].forEach.call(document.querySelectorAll('.dropimage'), function(img) {
                    img.onchange = function(e) {
                        var inputfile = this,
                            reader = new FileReader();
                        reader.onloadend = function() {
                            inputfile.style['background-image'] = 'url(' + reader.result +
                                ')';
                        }
                        reader.readAsDataURL(e.target.files[0]);
                    }
                });
            });
            </script>-->
            <!---->
            <script>
            $(document).on("change", ".uploadFile", function() {
                var input = $(this);
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        input.closest(".imgUp").find('.imagePreviewProfileUserUpdate').css('background-image',
                            'url(' + e
                            .target.result + ')');
                        input.closest(".imgUp").find('.btn-text').text('Cambiar');
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });
            </script>