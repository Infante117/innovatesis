<?php
if($rol_usuario != 1):?>
    <a href="<?php echo APP_URL; ?>Ausers/" class="arrow-left"><i class="bi bi-box-arrow-left"></i></a>
<?php else:?>
    <a href="<?php echo APP_URL; ?>Aclients/" class="arrow-left"><i class="bi bi-box-arrow-left"></i></a>
<?php endif;
?>

<!--<a href="<?php echo APP_URL; ?>Ausers/" class="arrow-left"><i class="bi bi-box-arrow-left"></i></a>-->
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
                    <?php echo $nomb_cliente.' '.$ape_cliente; ?>
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
        <?php $usuario=$_SESSION['idRol'];
            if($usuario=='Asesor'):?>
        <div class=" col-md-3">
            <!--HABLILITAMOS LOS BOTONES DAR BAJA O ALTA SEGUN EL ESTADO-->
            <?php if($estado == 'Activo') : ?>
            <a href="<?php echo APP_URL; ?>userUpdate/<?php echo $id_usuario; ?>/" class="btnP btnP-warningP"><i class="bi bi-pencil-square"></i> Editar Perfil</a>
            <form action="<?php echo APP_URL; ?>app/ajax/usuarioAjax.php" method="POST" autocomplete="off"
                enctype="multipart/form-data" class="FormularioAjax">
                <input type="hidden" name="modulo_usuario" value="DarBajaAlumno">
                <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $id_usuario; ?>">
                <button type="submit" class="btnP btnP-dangerP"><i class="bi bi-person-x"></i> Dar Baja</button>
            </form>
            <?php elseif ($estado == 'Inactivo') : ?>
            <form action="<?php echo APP_URL; ?>app/ajax/usuarioAjax.php" method="POST" autocomplete="off"
                enctype="multipart/form-data" class="FormularioAjax">
                <input type="hidden" name="modulo_usuario" value="DarAlta">
                <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $id_usuario; ?>">
                <button type="submit" class="btn btn-success"><i class="bi bi-arrow-counterclockwise"></i> Dar Alta</button>
            </form>
            <?php endif; ?>
        </div>
        <?php else:?>
            <div class=" col-md-3">
            <!--HABLILITAMOS LOS BOTONES DAR BAJA O ALTA SEGUN EL ESTADO-->
            <?php if($estado == 'Activo') : ?>
            <a href="<?php echo APP_URL; ?>userUpdate/<?php echo $id_usuario; ?>/" class="btnP btnP-warningP"><i class="bi bi-pencil-square"></i> Editar Perfil</a>
            <form action="<?php echo APP_URL; ?>app/ajax/usuarioAjax.php" method="POST" autocomplete="off"
                enctype="multipart/form-data" class="FormularioAjax">
                <?php if($rol_usuario == 1):?>
                <input type="hidden" name="modulo_usuario" value="DarBajaAlumno">                
                <?php else:?>
                <input type="hidden" name="modulo_usuario" value="DarBaja">
                <?php endif;?>
                <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $id_usuario; ?>">
                <button type="submit" class="btnP btnP-dangerP"><i class="bi bi-person-x"></i> Dar Baja</button>
            </form>
            <?php elseif ($estado == 'Inactivo') : ?>
            <form action="<?php echo APP_URL; ?>app/ajax/usuarioAjax.php" method="POST" autocomplete="off"
                enctype="multipart/form-data" class="FormularioAjax">
                <input type="hidden" name="modulo_usuario" value="DarAlta">
                <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $id_usuario; ?>">
                <button type="submit" class="btn btn-success"><i class="bi bi-arrow-counterclockwise"></i> Dar Alta</button>
            </form>
            <?php endif; ?>
        </div>
        <?php endif;?>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="profile-work">
                <p>Información Adicional</p>
                <p><?php echo $informacionAdicional;?></p>
                <hr>
                <p>Redes Sociales</p>
                <a href="<?php echo $twitter;?>" class="twitter" target="_blank"><i class="bu bi-twitter"></i></a>
                <a href="<?php echo $facebook;?>" class="facebook" target="_blank"><i class="bu bi-facebook"></i></a>
                <a href="<?php echo $instagram;?>" class="instagram" target="_blank"><i class="bu bi-instagram"></i></a>
                <a href="<?php echo $linkedin;?>" class="linkedin" target="_blank"><i class="bu bi-linkedin"></i></a>

            </div>
        </div>
        <div class="col-md-8">
            <div class="tab-content profile-tab" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <label>DNI</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $dni;?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nombres Completos</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $nomb_cliente.' '.$ape_cliente; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Estado Civil</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $estado_civil; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Sexo</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $sexo_cliente; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Fecha Nacimiento</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $fecha_nacimiento; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Email</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $email_cliente;?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Telefono</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $tel_cliente;?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Profession</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $profesion;?></p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="mas" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Usuario</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $usuario_U;?></p>
                        </div>
                    </div>
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
                            <p><a href="<?php echo APP_URL; ?>app/views/assets/documents/<?php echo $curriculum;?>"
                                    target="_blank"><?php echo $curriculum;?><i class="bi bi-file-pdf"></i></a></p>
                        </div>
                    </div>
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