<style>
.imagePreviewprofile {
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


<div class="container emp-profile">
    <div class="row">
        <div class="col-md-4">
            <div class="profile-img">
                <img src="<?php echo APP_URL; ?>app/views/assets/imagenes/usuarios/<?php echo $foto; ?>" alt="" />
            </div>
        </div>
        <div class="col-md-5">
            <div class="profile-head">
                <h5>
                    <?php echo $nombre_usuario.' '.$apellido_usuario; ?>
                </h5>
                <h6>
                    <?php foreach ($roles as $rol) : ?>
                    <?php if ($rol['ID_ROL'] == $rol_usuario) : ?>
                    <?php echo $rol['DESCRIPCION']; ?>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </h6>
                <p class="proile-rating">Empresa : <span><?php echo $rsocial; ?></span></p>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">Acerca de</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#mas" role="tab"
                            aria-controls="profile" aria-selected="false">Datos corporativos</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class=" col-md-3">
            <?php if($_SESSION['idRol']== 'Cliente'): ?> 
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalCliente"><i class="bi bi-pencil-square"></i> Editar Perfil
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalClave"><i class="bi bi-pencil-square"></i> Cambiar Clave   
            <?php elseif($_SESSION['idRol']== 'Asesor'): ?> 
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalClave"><i class="bi bi-pencil-square"></i> Cambiar Clave
            <?php else: ?> 
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalAdmin"><i class="bi bi-pencil-square"></i> Editar Perfil
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalClave"><i class="bi bi-pencil-square"></i> Cambiar Clave 
            <?php endif; ?>                    
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?php if($_SESSION['idRol']!= 'Cliente'): ?>
            <div class="profile-work">
                <p>Información Adicional</p>
                <p><?php echo $informacionAdicional;?></p>
                <hr>
                <p>Redes Sociales</p>
                <a href="<?php echo $twitterusuario;?>" class="twitter" target="_blank"><i
                        class="bu bi-twitter"></i></a>
                <a href="<?php echo $facebookusuario;?>" class="facebook" target="_blank"><i
                        class="bu bi-facebook"></i></a>
                <a href="<?php echo $instagramusuario;?>" class="instagram" target="_blank"><i
                        class="bu bi-instagram"></i></a>
                <a href="<?php echo $linkedinusuario;?>" class="linkedin" target="_blank"><i
                        class="bu bi-linkedin"></i></a>

            </div>
            <?php endif; ?>
        </div>
        <div class="col-md-8">
            <div class="tab-content profile-tab" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <label>DNI</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $dni_usuario;?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nombres Completos</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $nombre_usuario.' '.$apellido_usuario; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Fecha Nacimiento</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $fnacimiento_usuario; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Estado Civil</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $estadoCivil_usuario; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Sexo</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $sexo_usuario; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Email</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $email_usuario;?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Telefono</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $telefono_usuario;?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Profesión</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $profesion_usuario;?></p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="mas" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Usuario</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $usuario_usuario;?></p>
                        </div>
                    </div>
                    <?php if($_SESSION['idRol']!= 'Cliente'): ?>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Rol</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php foreach ($roles as $rol) : ?>
                                <?php if ($rol['ID_ROL'] == $rol_usuario) : ?>
                                <?php echo $rol['DESCRIPCION']; ?>
                                <?php endif; ?>
                                <?php endforeach; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Curriculum Vitae</label>
                        </div>
                        <div class="col-md-6">
                            <p><a href="<?php echo APP_URL; ?>app/views/assets/documents/<?php echo $curriculum_usuario;?>"
                                    target="_blank"><?php echo $curriculum_usuario;?><i class="bi bi-file-pdf"></i></a>
                            </p>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-md-6">
                            <label>Estado</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $estado;?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--creamos un modal para actualizar el perfil del usuario del admin-->
<div class="modal fade" id="ModalAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Perfil de Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="content mt-3">
                    <div class="animated fadeIn">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <small> Datos Personales de</small><strong>
                                            <?php echo $nombre_usuario," ",$apellido_usuario ?></strong>
                                    </div>
                                    <div class="card-body">
                                        <div id="pay-invoice">
                                            <div class="card-body">
                                                <form action="<?php echo APP_URL; ?>app/ajax/usuarioAjax.php"
                                                    method="POST" autocomplete="off" enctype="multipart/form-data"
                                                    class="FormularioAjax">
                                                    <input type="hidden" name="modulo_usuario"
                                                        value="actualizarUsuario">
                                                    <input type="hidden" name="id_usuario" value="<?php echo $id; ?>">
                                                    <div class="form-group">
                                                        <div class="row g-3">
                                                            <div class="col-md-2"></div>
                                                            <div class="col-md-8">
                                                                <div class="form-floating">
                                                                    <div class="portada-img">
                                                                        <div class="col-sm-12 imgUp">
                                                                            <div class="imagePreviewprofile"></div>
                                                                            <label class="btn btn-primary1 btn-upload">
                                                                                <span class="btn-text">Cambiar foto de
                                                                                    perfil</span>
                                                                                <input type="file"
                                                                                    class="uploadFile img"
                                                                                    name="perfil_usuario"
                                                                                    value="Upload Photo"
                                                                                    style="display: none;">
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- ingresamos dni de usuario-->
                                                            <div class="col-md-6">
                                                                <div class="form-floating">
                                                                    <input type="text"
                                                                        class="form-control bg-white border-1"
                                                                        name="dni_usuario"
                                                                        value="<?php echo $dni_usuario; ?>" readonly
                                                                        maxlength="8">
                                                                    <label>DNI</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-floating">
                                                                    <input type="text"
                                                                        class="form-control bg-white border-1"
                                                                        name="nomb_usuario" readonly
                                                                        value="<?php echo $nombre_usuario; ?>">
                                                                    <label>Nombre </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-floating">
                                                                    <input type="text"
                                                                        class="form-control bg-white border-1"
                                                                        name="ape_usuario" readonly
                                                                        value="<?php echo $apellido_usuario; ?>">
                                                                    <label class="form-label">Apellidos </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-floating">
                                                                    <select class="form-select" name="sexo_usuario">
                                                                        <?php if ($sexo_usuario == "Masculino"): ?>
                                                                        <option value="Masculino" selected>Masculino
                                                                        </option>
                                                                        <option value="Femenino">Femenino</option>
                                                                        <?php elseif ($sexo_usuario == "Femenino"): ?>
                                                                        <option value="Masculino">Masculino</option>
                                                                        <option value="Femenino" selected>Femenino
                                                                        </option>
                                                                        <?php endif; ?>
                                                                    </select>
                                                                    <label class="form-label">Sexo</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-floating">
                                                                    <select class="form-select"
                                                                        name="estadocivil_usuario">
                                                                        <?php if ($estadoCivil_usuario == "Soltero(a)"): ?>
                                                                        <option class="form-control" value="Soltero(a)"
                                                                            SELECTED>
                                                                            Soltero(a)</option>
                                                                        <option class="form-control" value="Casado(a)">
                                                                            Casado(a)
                                                                        </option>
                                                                        <option class="form-control" value="Viudo(a)">
                                                                            Viudo(a)
                                                                        </option>
                                                                        <option class="form-control"
                                                                            value="Conviviente">Conviviente
                                                                        </option>
                                                                        <?php elseif ($estadoCivil_usuario == "Casado(a)"): ?>
                                                                        <option class="form-control" value="Soltero(a)">
                                                                            Soltero(a)
                                                                        </option>
                                                                        <option class="form-control" value="Casado(a)"
                                                                            SELECTED>
                                                                            Casado(a)</option>
                                                                        <option class="form-control" value="Viudo(a)">
                                                                            Viudo(a)
                                                                        </option>
                                                                        <option class="form-control"
                                                                            value="Conviviente">Conviviente
                                                                        </option>
                                                                        <?php elseif ($estadoCivil_usuario == "Viudo(a)"): ?>
                                                                        <option class="form-control" value="Soltero(a)">
                                                                            Soltero(a)
                                                                        </option>
                                                                        <option class="form-control" value="Casado(a)">
                                                                            Casado(a)
                                                                        </option>
                                                                        <option class="form-control" value="Viudo(a)"
                                                                            SELECTED>
                                                                            Viudo(a)</option>
                                                                        <option class="form-control"
                                                                            value="Conviviente">Conviviente
                                                                        </option>
                                                                        <?php elseif ($estadoCivil_usuario == "Conviviente"): ?>
                                                                        <option class="form-control" value="Soltero(a)">
                                                                            Soltero(a)
                                                                        </option>
                                                                        <option class="form-control" value="Casado(a)">
                                                                            Casado(a)
                                                                        </option>
                                                                        <option class="form-control" value="Viudo(a)">
                                                                            Viudo(a)
                                                                        </option>
                                                                        <option class="form-control" value="Conviviente"
                                                                            SELECTED>
                                                                            Conviviente</option>
                                                                        <?php endif; ?>
                                                                    </select>
                                                                    <label class="form-label ">Estado Civil </label>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-floating">
                                                                    <input type="text"
                                                                        class="form-control bg-white border-1"
                                                                        name="dir_usuario"
                                                                        value="<?php echo $direccion_usuario; ?>">
                                                                    <label class="form-label">Dirección </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-floating">
                                                                    <input type="date"
                                                                        class="form-control bg-white border-1"
                                                                        name="fechaNac_usuario"
                                                                        value="<?php echo $fnacimiento_usuario; ?>"
                                                                        readonly>
                                                                    <label class="form-label">Fecha de Nacimiento
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-floating">
                                                                    <input type="text"
                                                                        class="form-control bg-white border-1"
                                                                        name="tel_usuario" maxlength="9"
                                                                        value="<?php echo $telefono_usuario; ?>">
                                                                    <label class="form-label">Telefono </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-floating">
                                                                    <input type="email"
                                                                        class="form-control bg-white border-1"
                                                                        name="email_usuario"
                                                                        value="<?php echo $email_usuario; ?>">
                                                                    <label class="form-label">Correo </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-floating">
                                                                    <input type="text"
                                                                        class="form-control bg-white border-1"
                                                                        name="profesion_usuario"
                                                                        value="<?php echo $profesion_usuario; ?>">
                                                                    <label class="form-label">Profesion </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-floating">
                                                                    <textarea type="text-file"
                                                                        class="form-control bg-white border-1"
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
                                    <div class="card-header"><small> Documentos</small><strong> Personales</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <div class="form-floating">
                                                    <div class="preview-document">
                                                        <embed id="pdf-preview"
                                                            src="<?php echo APP_URL; ?>app/views/assets/documents/<?php echo $curriculum_usuario; ?>"
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
                                                    <input type="text" class="form-control bg-white border-1"
                                                        name="twitter_usuario" value="<?php echo $twitterusuario; ?>">
                                                    <label class="form-label"><i class="bu bi-twitter"> Twitter
                                                        </i></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control bg-white border-1"
                                                        name="facebook_usuario" value="<?php echo $facebookusuario; ?>">
                                                    <label class="form-label"><i class="bu bi-facebook"> Facebook
                                                        </i></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control bg-white border-1"
                                                        name="instagram_usuario"
                                                        value="<?php echo $instagramusuario; ?>">
                                                    <label class="form-label"><i class="bu bi-instagram"> Instagram
                                                        </i></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control bg-white border-1"
                                                        name="linkedin_usuario" value="<?php echo $linkedinusuario; ?>">
                                                    <label class="form-label"><i class="bu bi-linkedin"> Linkedin
                                                        </i></label>
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
                                                    <input type="text" class="form-control bg-white border-1"
                                                        name="usuario_usuario" value="<?php echo $usuario_usuario; ?>"
                                                        readonly>
                                                    <label class="form-label">Usuario </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <?php foreach ($roles as $rol) : ?>
                                                    <?php if ($rol['ID_ROL'] == $rol_usuario) : ?>
                                                    <input type="text" class="form-control bg-white border-1"
                                                        name="rol_usuario" value="<?php echo $rol['DESCRIPCION']; ?>"
                                                        readonly>
                                                    <label class="form-label">Rol </label>
                                                    <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary" type="submit">Actualizar
                            Datos</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--creamos un modal para actualizar el perfil del usuario del CLIENTE-->
<div class="modal fade" id="ModalCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Perfil de Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="content mt-3">
                    <div class="animated fadeIn">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <small> Datos Personales de</small><strong>
                                            <?php echo $nombre_usuario," ",$apellido_usuario ?></strong>
                                    </div>
                                    <div class="card-body">
                                        <!-- Credit Card -->
                                        <div id="pay-invoice">
                                            <div class="card-body">
                                                <form action="<?php echo APP_URL; ?>app/ajax/usuarioAjax.php"
                                                    method="POST" autocomplete="off" enctype="multipart/form-data"
                                                    class="FormularioAjax">
                                                    <input type="hidden" name="modulo_usuario"
                                                        value="actualizarCliente">
                                                    <input type="hidden" name="id_usuario" value="<?php echo $id; ?>">
                                                    <div class="form-group">
                                                        <div class="row g-3">
                                                            <div class="col-md-4">
                                                                <div class="portada-img">
                                                                    <div class="col-sm-12 imgUp">
                                                                        <div class="imagePreviewprofile"></div>
                                                                        <label class="btn btn-primary1 btn-upload">
                                                                            <span class="btn-text">Cambiar foto de
                                                                                perfil</span>
                                                                            <input type="file" class="uploadFile img"
                                                                                name="perfil_usuario"
                                                                                value="Upload Photo"
                                                                                style="display: none;">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- ingresamos dni de usuario-->
                                                            <div class="col-md-4">
                                                                <div class="form-floating">
                                                                    <input type="text"
                                                                        class="form-control bg-white border-1"
                                                                        name="dni_usuario"
                                                                        value="<?php echo $dni_usuario; ?>" readonly
                                                                        maxlength="8">
                                                                    <label>DNI</label>
                                                                </div>
                                                                <br>
                                                                <div class="form-floating">
                                                                    <input type="text"
                                                                        class="form-control bg-white border-1"
                                                                        name="ape_usuario" readonly
                                                                        value="<?php echo $apellido_usuario; ?>">
                                                                    <label class="form-label">Apellidos </label>
                                                                </div>
                                                                <br>
                                                                <div class="form-floating">
                                                                    <select class="form-select"
                                                                        name="estadocivil_usuario">
                                                                        <?php if ($estadoCivil_usuario == "Soltero(a)"): ?>
                                                                        <option class="form-control" value="Soltero(a)"
                                                                            SELECTED>
                                                                            Soltero(a)</option>
                                                                        <option class="form-control" value="Casado(a)">
                                                                            Casado(a)
                                                                        </option>
                                                                        <option class="form-control" value="Viudo(a)">
                                                                            Viudo(a)
                                                                        </option>
                                                                        <option class="form-control"
                                                                            value="Conviviente">Conviviente
                                                                        </option>
                                                                        <?php elseif ($estadoCivil_usuario == "Casado(a)"): ?>
                                                                        <option class="form-control" value="Soltero(a)">
                                                                            Soltero(a)
                                                                        </option>
                                                                        <option class="form-control" value="Casado(a)"
                                                                            SELECTED>
                                                                            Casado(a)</option>
                                                                        <option class="form-control" value="Viudo(a)">
                                                                            Viudo(a)
                                                                        </option>
                                                                        <option class="form-control"
                                                                            value="Conviviente">Conviviente
                                                                        </option>
                                                                        <?php elseif ($estadoCivil_usuario == "Viudo(a)"): ?>
                                                                        <option class="form-control" value="Soltero(a)">
                                                                            Soltero(a)
                                                                        </option>
                                                                        <option class="form-control" value="Casado(a)">
                                                                            Casado(a)
                                                                        </option>
                                                                        <option class="form-control" value="Viudo(a)"
                                                                            SELECTED>
                                                                            Viudo(a)</option>
                                                                        <option class="form-control"
                                                                            value="Conviviente">Conviviente
                                                                        </option>
                                                                        <?php elseif ($estadoCivil_usuario == "Conviviente"): ?>
                                                                        <option class="form-control" value="Soltero(a)">
                                                                            Soltero(a)
                                                                        </option>
                                                                        <option class="form-control" value="Casado(a)">
                                                                            Casado(a)
                                                                        </option>
                                                                        <option class="form-control" value="Viudo(a)">
                                                                            Viudo(a)
                                                                        </option>
                                                                        <option class="form-control" value="Conviviente"
                                                                            SELECTED>
                                                                            Conviviente</option>
                                                                        <?php endif; ?>
                                                                    </select>
                                                                    <label class="form-label ">Estado Civil </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-floating">
                                                                    <input type="text"
                                                                        class="form-control bg-white border-1"
                                                                        name="nomb_usuario" readonly
                                                                        value="<?php echo $nombre_usuario; ?>">
                                                                    <label>Nombre </label>
                                                                </div>
                                                                <br>
                                                                <div class="form-floating">
                                                                    <select class="form-select" name="sexo_usuario">
                                                                        <?php if ($sexo_usuario == "Masculino"): ?>
                                                                        <option value="Masculino" selected>Masculino
                                                                        </option>
                                                                        <option value="Femenino">Femenino</option>
                                                                        <?php elseif ($sexo_usuario == "Femenino"): ?>
                                                                        <option value="Masculino">Masculino</option>
                                                                        <option value="Femenino" selected>Femenino
                                                                        </option>
                                                                        <?php endif; ?>
                                                                    </select>
                                                                    <label class="form-label">Sexo</label>
                                                                </div>
                                                                <br>
                                                                <div class="form-floating">
                                                                    <input type="text"
                                                                        class="form-control bg-white border-1"
                                                                        name="dir_usuario"
                                                                        value="<?php echo $direccion_usuario; ?>">
                                                                    <label class="form-label">Dirección </label>
                                                                </div>
                                                            </div>
                                                            <!---eliminar hacia abajo--->
                                                            <div class="col-md-4">
                                                                <div class="form-floating">
                                                                    <input type="text"
                                                                        class="form-control bg-white border-1"
                                                                        name="tel_usuario" maxlength="9"
                                                                        value="<?php echo $telefono_usuario; ?>">
                                                                    <label class="form-label">Telefono </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-floating">
                                                                    <input type="email"
                                                                        class="form-control bg-white border-1"
                                                                        name="email_usuario"
                                                                        value="<?php echo $email_usuario; ?>">
                                                                    <label class="form-label">Correo </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-floating">
                                                                    <input type="text"
                                                                        class="form-control bg-white border-1"
                                                                        name="profesion_usuario"
                                                                        value="<?php echo $profesion_usuario; ?>">
                                                                    <label class="form-label">Profesion </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-floating">
                                                                    <textarea type="text-file"
                                                                        class="textarea form-control bg-white border-1"
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
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary" type="submit">Actualizar Datos</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Modal para cambiar clave -->
<div class="modal fade" id="ModalClave" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cambiar Clave de Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo APP_URL; ?>app/ajax/usuarioAjax.php" method="POST" autocomplete="off"
                    enctype="multipart/form-data" class="FormularioAjax" id="cambioClaveForm">
                    <input type="hidden" name="modulo_usuario" value="actualizarClave">
                    <input type="hidden" name="id_usuario" value="<?php echo $id; ?>">
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <div class="form-outline mb-4 password-container">
                                    <div class="form-floating">
                                        <input type="password" class="form-control bg-white border-1 passwordField"
                                            name="claveActual" placeholder="">
                                        <label class="form-label"><i class="fa-solid fa-key"></i> Contraseña
                                            Actual</label>
                                    </div>
                                    <i class="toggle-password fa-solid fa-eye-slash"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <div class="form-outline mb-4 password-container">
                                    <div class="form-floating">
                                        <input type="password" class="form-control bg-white border-1 passwordField"
                                            name="claveNueva" placeholder="">
                                        <label class="form-label"><i class="fa-solid fa-key"></i> Nueva
                                            Contraseña</label>
                                    </div>
                                    <i class="toggle-password fa-solid fa-eye-slash"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <div class="form-outline mb-4 password-container">
                                    <div class="form-floating">
                                        <input type="password" class="form-control bg-white border-1 passwordField"
                                            name="claveNueva2" placeholder="">
                                        <label class="form-label"><i class="fa-solid fa-key"></i> Repetir
                                            Contraseña</label>
                                    </div>
                                    <i class="toggle-password fa-solid fa-eye-slash"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <button type="submit" class="btn btn-primary">Cambiar Clave</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                    onclick="cancelar()">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
function cancelar() {
    document.getElementById("cambioClaveForm").reset();
    $('#ModalClave').modal('hide');
    $('body').removeClass('modal-open');
    $('.modal-backdrop').remove();
}
</script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Script para alternar contraseñas
    const togglePasswords = document.querySelectorAll('.toggle-password');
    const passwordFields = document.querySelectorAll('.passwordField');

    togglePasswords.forEach((togglePassword, index) => {
        togglePassword.addEventListener('click', function() {
            const type = passwordFields[index].getAttribute('type') === 'password' ? 'text' :
                'password';
            passwordFields[index].setAttribute('type', type);
            togglePassword.classList.toggle('fa-eye');
            togglePassword.classList.toggle('fa-eye-slash');
        });
    });

    // Script para cargar la imagen
    $(document).on("change", ".uploadFile", function() {
        var input = $(this);
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                input.closest(".imgUp").find('.imagePreviewprofile').css('background-image',
                    'url(' + e.target.result + ')');
                input.closest(".imgUp").find('.btn-text').text('Cambiar');
            }
            reader.readAsDataURL(this.files[0]);
        }
    });

    // Script para el paso a paso
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

    if (nextBtnFirst) {
        nextBtnFirst.addEventListener("click", function(event) {
            event.preventDefault();
            slidePage.style.marginLeft = "-25%";
            bullet[current - 1].classList.add("active");
            progressCheck[current - 1].classList.add("active");
            progressText[current - 1].classList.add("active");
            current += 1;
        });
    }

    if (nextBtnSec) {
        nextBtnSec.addEventListener("click", function(event) {
            event.preventDefault();
            slidePage.style.marginLeft = "-50%";
            bullet[current - 1].classList.add("active");
            progressCheck[current - 1].classList.add("active");
            progressText[current - 1].classList.add("active");
            current += 1;
        });
    }

    if (nextBtnThird) {
        nextBtnThird.addEventListener("click", function(event) {
            event.preventDefault();
            slidePage.style.marginLeft = "-75%";
            bullet[current - 1].classList.add("active");
            progressCheck[current - 1].classList.add("active");
            progressText[current - 1].classList.add("active");
            current += 1;
        });
    }

    if (submitBtn) {
        submitBtn.addEventListener("click", function() {
            bullet[current - 1].classList.add("active");
            progressCheck[current - 1].classList.add("active");
            progressText[current - 1].classList.add("active");
            current += 1;
        });
    }

    if (prevBtnSec) {
        prevBtnSec.addEventListener("click", function(event) {
            event.preventDefault();
            slidePage.style.marginLeft = "0%";
            bullet[current - 2].classList.remove("active");
            progressCheck[current - 2].classList.remove("active");
            progressText[current - 2].classList.remove("active");
            current -= 1;
        });
    }

    if (prevBtnThird) {
        prevBtnThird.addEventListener("click", function(event) {
            event.preventDefault();
            slidePage.style.marginLeft = "-25%";
            bullet[current - 2].classList.remove("active");
            progressCheck[current - 2].classList.remove("active");
            progressText[current - 2].classList.remove("active");
            current -= 1;
        });
    }

    if (prevBtnFourth) {
        prevBtnFourth.addEventListener("click", function(event) {
            event.preventDefault();
            slidePage.style.marginLeft = "-50%";
            bullet[current - 2].classList.remove("active");
            progressCheck[current - 2].classList.remove("active");
            progressText[current - 2].classList.remove("active");
            current -= 1;
        });
    }

});
</script>