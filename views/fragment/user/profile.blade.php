<section>
	<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 app-color-white">
		<?php if(isset($person) && $person['ID_PERSON']>0){ ?>
		<div class="row">
			<!-- Imagen de perfil -->
			<div class="thumbnail">
				<img src="<?= $person['IMAGE_PROFILE']; ?>"
				     alt="No cuenta con una imagen de perfil"
				     class="app-img-6 img-circle app-profile-user">
				<h3 class="text-center text-uppercase"><?= $person['NAME_PERSON'].' '.$person['LAST_NAME_PERSON']; ?></h3>
			</div>
		</div>
		<div class="row">
			<!--Type Usuario-->
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<b class="text-success">Tipo de Usuario: </b>
				<p class="text-uppercase"><?= $person['NAME_ROL']; ?></p>
			</div>
			<!--Correo Electronico-->
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<b class="text-success">Correo electr&oacute;nico</b>
				<p><?= $person['EMAIL_PERSON']; ?></p>
			</div>
			<div class="clearfix"></div>
			<!--SEXO-->
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<b class="text-success">Sexo</b>
				<p>
					<label class="radio-inline">
						<input type="radio" <?= $person['SEX_PERSON'] == 1 ? 'checked' : ''; ?>
						name="sex"
						       disabled>
						Hombre
					</label>
					<label class="radio-inline">
						<input type="radio"
						       value="0" <?= $person['SEX_PERSON'] == 0 ? 'checked' : ''; ?>
						       name="sex"
						       disabled>
						Mujer
					</label>
				</p>
			</div>
			<!--Fecha de nacimiento-->
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<b class="text-success">Fecha de nacimiento: </b>
				<p><?= $person['DATE_BORN_PERSON']; ?></p>
			</div>
			<div class="clearfix"></div>
			<!--Direccion-->
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<b class="text-success">Direcci&oacute;n: </b>
				<p><?= $person['ADDRESS_PERSON']; ?></p>
			</div>
			<!-- Pais de origen-->
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<b class="text-success">Ubicacion: </b>
				<p><?= $person['CITY_PERSON'].', '.$person['COUNTRY_PERSON']; ?></p>
			</div>
			<div class="clearfix"></div>
			<!-- Agregado nDoc-->
			<?php $i = 0;
			if(isset($listUserDoc)){
			foreach(is_array($listUserDoc) ? $listUserDoc : array() as $doc){ ?>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<b class="text-success"> Tipo de Documento: </b>
				<?php if(isset($listTypeDoc)){
				foreach($listTypeDoc as $type){ ?>
				<p><?= $doc['ID_TYPE_DOCUMENT'] == $type['ID_TYPE_DOCUMENT'] ? $type['NAME_TYPE_DOCUMENT'] : ''; ?></p>
				<?php }
				} ?>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<b class="text-success">N&uacute;mero de Documento</b>
				<p><?= $doc['NUMBER_DOCUMENT']; ?></p>
			</div>
			<?php $i++;
			}
			} ?>
			<div class="clearfix"></div>
			<!-- Agregado  telefono-->
			<?php if(isset($listUserPhone)){
			foreach(is_array($listUserPhone) ? $listUserPhone : array() as $phone){ ?>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<b class="text-success">Tipo de Tel&eacute;fono: </b>
				<?php if(isset($listTypePhone)){
				foreach($listTypePhone as $type){ ?>
				<p><?= $phone['ID_TYPE_PHONE'] == $type['ID_TYPE_PHONE'] ? $type['NAME_TYPE_PHONE'] : ''; ?></p>
				<?php }
				} ?>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<b class="text-success">N&uacute;mero de Tel&eacute;fono: </b>
				<p><?= $phone['NUMBER_PHONE']; ?></p>
			</div>
		<?php }
		} ?>
		<!--Estado-->
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<b class="text-success">Estado</b>
				<p><?= $person['NAME_STATE_USER'] ?></p>

			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<b class="text-success">Fecha de Registro: </b>
				<p><?= $person['DATE_REGISTER_PERSON']; ?></p>
			</div>
			<!--Botones-->
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-heading">
				<button type="button"
				        class="btn btn-primary pull-right"
				        data-toggle="modal"
				        data-target="#modalEditUser" <?= $person['ID_PERSON'] == -1 ? 'disabled' : '' ?>>
					<i class="fa fa-edit"></i> Editar
				</button>
			</div>
		</div>
		<?php }
		else{ ?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-lg-push-3">
			<img src="img/404/caja-vacia.jpg"
			     class="app-img-5 center-block"
			     alt="No existen datos disponibles">
			<h4 class="text-center">Perfil de usuario no encontrado</h4>
		</div>
		<?php } ?>
	</div>
</section>
<!-- Modal editar Perfil de usuario-->
<div id="modalEditUser"
     class="modal fade"
     role="dialog">
	<div class="modal-dialog">
		<form action="profile/edit_dd/<?= isset($person['ID_PERSON']) ? $person['ID_PERSON'] : -1 ?>"
		      method="post"
		      id="form-edit-user"
		      class="form-horizontal"
		      enctype="multipart/form-data">
			<div class="modal-content">
				<!-- titulo -->
				<div class="modal-header alert alert-success">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title text-center">Editar Perfil</h4>
				</div>
				<!-- inputs -->
				<div class="modal-body">
					<div class="form-group">
						<!--Type Usuario-->
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<label class="control-label"
							       for="typeUser">Tipo de Usuario
							</label>
							<input type="text"
							       class="form-control"
							       name="typeUser"
							       id="typeUser"
							       value="<?= $person['NAME_ROL'] ?>"
							       disabled>
						</div>
						<!--Correo Electronico-->
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<label class="control-label"
							       for="email">Correo electr&oacute;nico
							</label>
							<input type="email"
							       class="form-control"
							       id="email"
							       name="email"
							       pattern="^([a-zA-Z0-9_-.]+)@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.)|(([a-zA-Z0-9-]+.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(]?)$"
							       value="<?= $person['EMAIL_PERSON']; ?>"
							       required>
						</div>
					</div>
					<div class="form-group">
						<!--Nombre-->
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<label class="control-label"
							       for="name">Nombre
							</label>
							<input type="text"
							       class="form-control"
							       id="name"
							       name="name"
							       placeholder="^[a-zA-Z ]{2-25}$"
							       value="<?= $person['NAME_PERSON']; ?>"
							       required>
						</div>
						<!--Apellidos-->
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<label class="control-label"
							       for="app">Apellidos
							</label>
							<input type="text"
							       class="form-control"
							       id="app"
							       name="app"
							       pattern="^[a-zA-Z ]{2-25}$"
							       value="<?= $person['LAST_NAME_PERSON']; ?>"
							       required>
						</div>
					</div>
					<div class="form-group">
						<!--SEXO-->
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<label class="control-label">Sexo</label>
							</div>
							<label class="radio-inline">
								<input type="radio"
								       id="hombre"
								       value="1" <?= $person['SEX_PERSON'] == 1 ? 'checked' : ''; ?>
								       name="sex"
								       required>
								Hombre
							</label>
							<label class="radio-inline">
								<input type="radio"
								       id="mujer"
								       value="0" <?= $person['SEX_PERSON'] == 0 ? 'checked' : ''; ?>
								       name="sex">
								Mujer
							</label>
						</div>
						<!--Fecha de nacimiento-->
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<label class="control-label"
							       for="dataNac">Fecha de nacimiento
							</label>
							<input type="date"
							       class="form-control datepickerBorn"
							       id="dataNac"
							       name="dataNac"
							       value="<?= $person['DATE_BORN_PERSON']; ?>">
						</div>
					</div>
					<div class="form-group">
						<!--Direccion-->
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<label class="control-label"
							       for="direction">Direcci&oacute;n
							</label>
							<input type="text"
							       class="form-control"
							       id="direction"
							       name="direction"
							       pattern="{5-75}"
							       value="<?= $person['ADDRESS_PERSON']; ?>">
						</div>
						<!--Ciudad-->
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<label class="control-label"
							       for="city">Ciudad
							</label>
							<input type="text"
							       class="form-control"
							       id="city"
							       name="city"
							       pattern="^[a-zA-Z0-9 ]{2-25}$"
							       value="<?= $person['CITY_PERSON']; ?>">
						</div>
					</div>
					<div class="form-group">
						<!-- Pais de origen-->
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<label class="control-label"
							       for="pais">Pais
							</label>
							<select id="pais"
							        class="form-control"
							        name="pais">
								<?php if(isset($listPais)){
								foreach(is_array($listPais) ? $listPais : array() as $pais){ ?>
								<option value="<?= $pais ?>" <?= $pais == $person['COUNTRY_PERSON'] ? 'selected' : ''; ?>>
									<?= $pais ?>
								</option>
								<?php }
								} ?>
							</select>
						</div>
						<!-- Imagen de perfil -->
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<label class="control-label"
							       for="imgAddress">Imagen de perfil
							</label>
							<input id="imgAddress"
							       name="imgAddress"
							       type="file"
							       class="file"
							       data-show-upload="false"
							       data-show-caption="true">
						</div>
					</div>
					<div class="form-group">
						<!-- Agregado nDoc-->
						<?php $i = 0;
						if(!empty($listUserDoc)){
						foreach(is_array($listUserDoc) ? $listUserDoc : array() as $doc){ ?>
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<label for="nDoc-<?=$i?>"
							       class='control-label'>N&uacute;mero de Documento
							</label>
							<input type="text"
							       class="form-control"
							       id="nDoc-<?=$i?>"
							       pattern="[0-9]{6-15}$"
							       name="docUser[<?= $i; ?>][nDoc]"
							       value="<?= $doc['NUMBER_DOCUMENT']; ?>">
							<input type="text"
							       class="hidden"
							       id="nDoc-<?=$i?>-hidden"
								   title="id del documento"
							       name="docUser[<?= $i; ?>][nDocOld]"
							       value="<?= $doc['NUMBER_DOCUMENT']; ?>">
						</div>
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<label for="typeDoc<?=$i?>"
							       class='control-label'>Tipo de Documento
							</label>
							<select class="form-control"
							        id="typeDoc<?=$i?>"
							        name="docUser[<?= $i; ?>][idType]">
								<?php if(isset($listTypeDoc)){
								foreach($listTypeDoc as $type){ ?>
								<option value="<?= $type['ID_TYPE_DOCUMENT'] ?>" <?= $doc['ID_TYPE_DOCUMENT'] == $type['ID_TYPE_DOCUMENT'] ? 'selected' : ''; ?>>
									<?= $type['NAME_TYPE_DOCUMENT'] ?>
								</option>
								<?php }
								} ?>
							</select>
						</div>
						<div class="clearfix"></div>
						<?php $i++;
						}
						} ?>
					</div>
					<div class="form-group">
						<!-- Agregado  telefono-->
						<?php $i = 0;
						if(isset($listUserPhone)){
						foreach(is_array($listUserPhone) ? $listUserPhone : array() as $phone){ ?>
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<label for="nPhone"
							       class='control-label'>N&uacute;mero de Telefono
							</label>
							<input type="text"
							       class="form-control"
							       id="nPhone"
							       name="phoneUser[<?= $i; ?>][nPhone]"
							       pattern="^[0-9]{7-15}$"
							       value="<?= $phone['NUMBER_PHONE']; ?>">
							<input type="text"
							       class="hidden"
							       name="phoneUser[<?= $i; ?>][nPhoneOld]"
							       value="<?= $phone['NUMBER_PHONE']; ?>"
							       title="">
						</div>
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<label for="typePhone"
							       class='control-label'>Tipo de Tel&eacute;fono
							</label>
							<select class="form-control"
							        id="typePhone"
							        name="phoneUser[<?= $i; ?>][idType]">
								<?php if(isset($listTypePhone)){
								foreach($listTypePhone as $type){ ?>
								<option value="<?= $type['ID_TYPE_PHONE'] ?>" <?= $phone['ID_TYPE_PHONE'] == $type['ID_TYPE_PHONE'] ? 'selected' : ''; ?>>
									<?= $type['NAME_TYPE_PHONE'] ?>
								</option>
								<?php }
								} ?>
							</select>
						</div>
						<div class="clearfix"></div>
						<?php $i++;
						}
						} ?>
					</div>
					<div class="form-group">
						<!--Contrasña antigua-->
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<label class="control-label"
								   for="passwordActual">Contraseña actual (*)
							</label>
							<input type="password"
								   class="form-control"
								   id="passwordActual"
								   name="passwordActual"

								   value="">
						</div>
						<!--Contrasña nueva-->
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<label class="control-label"
								   for="passwordNew">Contraseña nueva (*)
							</label>
							<input type="password"
								   class="form-control"
								   id="passwordNew"
								   name="passwordNew"

								   value="">
						</div>
					</div>
				</div>
				<!-- Botones -->
				<div class="modal-footer">
					<button type="button"
					        class="btn btn-danger"
					        data-dismiss="modal">
						<i class="fa fa-close"></i> Cerrar
					</button>
					<button type="submit"
					        onclick="return validForm('form-edit-user','Modificar','Desea modificar tu documento','success')"
					        class="btn btn-primary"
					        name="update">
						<i class="fa fa-save"></i> Guardar
					</button>
				</div>
			</div>
		</form>
	</div>
</div>
