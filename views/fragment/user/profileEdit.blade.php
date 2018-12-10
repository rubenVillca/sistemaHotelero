<!-- Section para editar cuenta de usuario-->
<section>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="text-center">Editar Usuario <?= $rol; ?></h4>
        </div>
        <div class="panel-body">
            <!--Nombre-->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <b>Nombre</b>
                <p> <?= $nombre; ?> </p>
            </div>
            <!--Apellidos-->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <b>Apellidos</b>
                <p><?= $app1; ?></p>
            </div>
            <div class="clearfix"></div>
            <!--Correo Electronico-->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <b>Correo electr&oacute;nico</b>
                <p><?= $email; ?></p>
            </div>
            <!--SEXO-->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="row">
                        <b>Sexo</b>
                    </div>
                </div>
                <label class="radio-inline">
                    <input type="radio"
                           id="hombre"
                           value="1" <?= ($sexo == -1) ? '' : ($sexo ? 'checked' : ''); ?>
                           name="sexo"
                           disabled> Hombre
                </label>
                <label class="radio-inline">
                    <input type="radio"
                           id="mujer"
                           value="0" <?= ($sexo == -1) ? '' : ($sexo ? '' : 'checked'); ?>
                           name="sexo"
                           disabled> Mujer
                </label>
            </div>
            <div class="clearfix"></div>
            <!--  nDoc-->
			<?php if(isset($listUserDocument)) {
			foreach($listUserDocument as $doc) { ?>
            <div class="<?= $doc[1] == '' ? 'hidden' : '' ?>">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <b>Tipo de Documento</b>
                    <p><?= $doc[1]; ?></p>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <b>N&uacute;mero de Documento</b>
                    <p><?= $doc[2]; ?></p>
                </div>
            </div>
            <div class="clearfix"></div>
			<?php }
			} ?>
        <!-- Telefono del usuario -->
			<?php if(isset($listUserPhone)) {
			foreach($listUserPhone as $phone) { ?>
            <div class="<?= $phone[1] == '' ? 'hidden' : '' ?>">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <b>Tipo de Telefono</b>
                    <p><?= $phone[1]; ?></p>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <b>N&uacute;mero de Tel&eacute;fono</b>
                    <p><?= $phone[2]; ?></p>
                </div>
            </div>
            <div class="clearfix"></div>
		<?php }
		} ?>
        <!--Direccion-->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <b>Direcci&oacute;n</b>
                <p><?= $direccion; ?></p>
            </div>
            <!-- Fecha de nacimiento -->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <b>Fecha de nacimiento</b>
                <p><?= $fechaNac; ?></p>
            </div>
            <div class="clearfix"></div>
            <!--Tipo de cuenta-->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <b>Tipo de cuenta</b>
                <p><?= $rol; ?></p>
            </div>
            <!-- Ciudad -->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <b>Ciudad</b>
                <p><?= $city; ?></p>
            </div>
            <!-- Pais -->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <b>Pais</b>
                <p><?= $pais; ?></p>
            </div>
            <!-- Puntos de fidelizacion -->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <b>Puntos de fidelizaci&oacute;n</b>
                <p><?= $point; ?></p>
            </div>
            <!-- Imagen de perfil -->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <b>Imagen de perfil</b>
                <figure>
                    <img src="<?= $imgPerfil ?>" alt="No cuenta con imagen de perfil" class="app-img-4">
                </figure>
            </div>
            <!--Estado-->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <b>Estado</b><br>
                <p><?= Helper::camelUpperCase($state); ?></p>
            </div>
            <div class="clearfix"></div>
            <!--Botones-->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 panel-body pull-right">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalEditUser">
                    Editar <span class="glyphicon glyphicon-save"></span>
                </button>
                <a href="" class="btn btn-danger" name="cancelar">
                    Cancelar <span class="glyphicon glyphicon-remove"></span>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- Modal editar Perfil de usuario-->
<div id="modalEditUser" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">Editar Perfil de usuario</h4>
            </div>
            <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                <input type="text" class="hidden" name="idPerson" value="<?= $idPerson; ?>" title="idPerson">
                <!--Nombre-->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label class="control-label" for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $nombre; ?>">
                </div>
                <!--Apellido Paterno-->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label class="control-label" for="app">Apellidos</label>
                    <input type="text" class="form-control" id="app" name="app" value="<?= $app1; ?>">
                </div>
                <div class="clearfix"></div>
                <!--Correo Electronico-->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label class="control-label" for="email">Correo electr&oacute;nico</label>
                    <input type="email" class="hidden" id="email" name="emailOld" value="<?= $email; ?>">
                    <input type="email" class="form-control" id="email" name="email" value="<?= $email; ?>">
                </div>
                <!--SEXO-->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="row">
                            <label class="control-label">Sexo</label>
                        </div>
                    </div>
                    <label class="radio-inline">
                        <input type="radio"
                               id="hombre"
                               value="1" <?= ($sexo == -1) ? '' : ($sexo ? 'checked' : ''); ?>
                               name="sex"> Hombre
                    </label>
                    <label class="radio-inline">
                        <input type="radio"
                               id="mujer"
                               value="0" <?= ($sexo == -1) ? '' : ($sexo ? '' : 'checked'); ?>
                               name="sex"> Mujer
                    </label>
                </div>
                <div class="clearfix"></div>
                <!-- Documento de identidad-->
				<?php $i = 0;
				if(isset($listUserDocument)) {
				foreach($listUserDocument as $doc) { ?>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label for="docUser" class='control-label'>Tipo de Documento</label>
                    <select name="docUser[<?= $i; ?>][0]" id="docUser" class="form-control">
                        <option value="">Seleccione un tipo de Documento</option>
						<?php if(isset($listTypeDoc)) {
						foreach($listTypeDoc as $type) { ?>
                        <option value="<?= $type[0] ?>" <?= $doc[0] == $type[0] ? 'selected' : '' ?>><?= $type[1]; ?></option>
						<?php }
						} ?>
                    </select>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label for="docUser" class='control-label'>N&uacute;mero de Documento</label>
                    <input type="text"
                           class="form-control"
                           id="docUser"
                           name="docUser[<?= $i; ?>][1]"
                           value="<?= $doc[2]; ?>">
                </div>
                <input type="text"
                       class="hidden"
                       name="docUser[<?= $i; ?>][2]"
                       value="<?= $doc[0] ?>"
                       title="numero de documento">
                <input type="text"
                       class="hidden"
                       name="docUser[<?= $i; ?>][3]"
                       value="<?= $doc[2] ?>"
                       title="tipo de docuemento">
                <div class="clearfix"></div>
				<?php $i++;
				}
				} ?>
            <!-- telefono-->
				<?php $i = 0;
				foreach($listUserPhone as $phone) { ?>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label for="phoneUser" class='control-label'>Tipo de Tel&eacute;fono</label>
                    <select name="phoneUser[<?= $i; ?>][0]" id="phoneUser" class="form-control">
                        <option value="">Seleccione un tipo de tel&eacute;fono</option>
						<?php foreach($listTypePhone as $type) { ?>
                        <option value="<?= $type[0] ?>" <?= $phone[0] == $type[0] ? 'selected' : '' ?>><?= $type[1]; ?></option>
						<?php } ?>
                    </select>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label for="phoneUser" class='control-label'>N&uacute;mero de Tel&eacute;fono</label>
                    <input type="text"
                           class="form-control"
                           id="phoneUser"
                           name="phoneUser[<?= $i; ?>][1]"
                           value="<?= $phone[2]; ?>">
                </div>
                <input type="text"
                       class="hidden"
                       name="phoneUser[<?= $i; ?>][2]"
                       value="<?= $phone[0] ?>"
                       title="numero de telefono">
                <input type="text"
                       class="hidden"
                       name="phoneUser[<?= $i; ?>][3]"
                       value="<?= $phone[2] ?>"
                       title="tipo de telefono">
                <div class="clearfix"></div>
			<?php $i++;
			} ?>
            <!--Direccion-->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label class="control-label" for="direction">Direcci&oacute;n</label>
                    <input type="text" class="form-control" id="direction" name="direction" value="<?= $direccion; ?>">
                </div>
                <!-- Fecha de nacimiento -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label class="control-label" for="dataNac">Fecha de nacimiento</label>
                    <input type="dataNac" class="form-control" id="dataNac" name="dataNac" value="<?= $fechaNac; ?>">
                </div>
                <div class="clearfix"></div>
                <!--Tipo de cuenta-->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label class="control-label" for="idRol">Tipo de cuenta</label>
                    <select name="idRol" id="idRol" class="form-control">
                        <option value=""></option>
						<?php foreach($listTypeUser as $type) { ?>
                        <option value="<?= $type[0] ?>" <?= $rol == $type[1] ? 'selected' : '' ?>><?= $type[1]; ?></option>
						<?php } ?>
                    </select>
                </div>
                <!-- Ciudad -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label class="control-label" for="city">Ciudad</label>
                    <input type="text" class="form-control" id="city" name="city" value="<?= $city; ?>">
                </div>
                <!-- Pais -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label class="control-label" for="pais">Pais</label>
                    <input type="text" class="form-control" id="pais" name="pais" value="<?= $pais; ?>">
                </div>
                <!-- Puntos de fidelizacion -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label class="control-label" for="point">Puntos de fidelizaci&oacute;n</label>
                    <input type="text" class="form-control" id="point" name="point" value="<?= $point; ?>">
                </div>
                <!-- Imagen de perfil -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label class="control-label" for="imgPerfil">Imagen de perfil</label>
                    <input type="text" class="form-control" id="imgPerfil" name="imgPerfil" value="<?= $imgPerfil; ?>">
                </div>
                <!--Estado-->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label class="control-label" for="state">Estado</label><br>
					<?php foreach($listStateUser as $st) { ?>
                    <label for="state"><?= $st[1]; ?></label>
                    <input type="radio"
                           id="state"
                           name="state"
                           value="<?= $st[0]; ?>" <?= $st[1] == $state ? 'checked' : ''; ?>>
					<?php } ?>
                </div>
                <div class="clearfix"></div>
                <!-- Botones -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" name="btnUpdate">Guardar</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>