<h3>
    <a data-toggle="collapse" class="btn btn-primary" data-parent="#accordion" href="#collapse1">Datos del t&iacute;tular</a>
</h3>
<div id="collapse1" class="panel-collapse collapse in">
    <div class="panel-body">
        <div class="clearfix"></div>
        <div class="row">
            <!--name-->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <label class="control-label" for="name">Nombre</label>
                <input type="text"
                       class=" form-control"
                       id="name"
                       name="name"
                       value="<?= empty($check) ? '' : $check['NAME_PERSON'] ?>"
                       required>
            </div>
            <!--apellidos-->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <label class="control-label" for="app">Apellidos</label>
                <input type="text"
                       class="form-control"
                       id="app"
                       name="app"
                       value="<?= empty($check) ? '' : $check['LAST_NAME_PERSON']; ?>"
                       required>
            </div>
        </div>
        <div class="row">
            <!--sexo-->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="row">
                        <label class="control-label">Sexo</label>
                    </div>
                </div>
                <label class="radio-inline">
                    <input type="radio"
                           id="hombre"
                           value="1"
                           name="sex"
					       <?= empty($check) ? '' : ($check['SEX_PERSON'] == 1 ? 'checked' : '') ?> required>
                    Hombre
                </label>
                <label class="radio-inline">
                    <input type="radio" id="mujer" value="0" name="sex" <?= empty($check) ? '' :
						($check['SEX_PERSON'] == 0 ? 'checked' : '') ?> >
                    Mujer
                </label>
            </div>
            <!--correo-->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <label class="control-label" for="email">Correo electr&oacute;nico</label>
                <input type="email"
                       class="form-control"
                       id="email"
                       name="email"
                       value="<?= empty($check) ? '' : $check['EMAIL_PERSON']; ?>"
                       required>
            </div>
        </div>
        <div class="row">
            <!--ciudad-->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <label class="control-label" for="city">Ciudad</label>
                <input id="city"
                       class="form-control"
                       name="city"
                       value="<?= empty($check) ? '' : $check['CITY_PERSON']; ?>">
            </div>
            <!--pais-->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <label class="control-label" for="pais">Pais</label>
                <select class="form-control" id="pais" name="pais" required>
                    <option value="">Seleccione un pa&iacute;s</option>
					<?php foreach (Helper::getListCountry() as $pais) { ?>
                    <option value="<?= $pais; ?>" <?= empty($check) ? '' :
						($pais == $check['COUNTRY_PERSON'] ? 'selected' : ''); ?>>
						<?= $pais; ?>
                    </option>
					<?php } ?>
                </select>
            </div>
        </div>
        <div class="row">
            <!--address-->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <label class="control-label" for="address">Direcci&oacute;n</label>
                <input type="text"
                       class="form-control"
                       id="address"
                       name="address"
                       value="<?= empty($check) ? '' : $check['ADDRESS_PERSON']; ?>">
            </div>
            <!--dateNac-->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <label class="control-label" for="dateNac">Fecha de nacimiento</label>
                <input type="date"
                       class="form-control"
                       id="dateNac"
                       name="dateNac"
                       autocomplete="off"
                       min="1990-01-01"
                       max="<?=date('Y-m-d')?>"
                       value="<?= empty($check) ? '' : $check['DATE_BORN_PERSON'] ?>"
                       required>
            </div>
        </div>
        <!-- Documento identificador-->
		<?php $i = 0;
		if (!empty($docCheck)) {
		foreach ($docCheck as $doc) { ?>
        <div class="row">
            <!-- Tipo de documento -->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <label for="idTypeDoc" class='control-label'>Tipo de Documento</label>
                <select class="form-control" id="idTypeDoc" name="docUser[<?= $i; ?>][idType]">
                    <option value=""></option>
					<?php foreach (empty($listTypeDoc) ? array() : $listTypeDoc as $type) { ?>
                    <option value="<?= $type['ID_TYPE_DOCUMENT'] ?>" <?= $doc['ID_TYPE_DOCUMENT'] == $type['ID_TYPE_DOCUMENT'] ?
						'selected' : ''; ?> >
						<?= $type['NAME_TYPE_DOCUMENT'] ?>
                    </option>
					<?php } ?>
                </select>
            </div>
            <!-- Numero de documento -->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <label for="nDoc" class='control-label'>N&uacute;mero de Documento</label>
                <input type="text"
                       class="hidden"
                       name="docUser[<?= $i; ?>][nDocOld]"
                       value="<?= $doc['NUMBER_DOCUMENT']; ?>"
                       title="">
                <input type="text"
                       class="form-control"
                       id="nDoc"
                       minlength="7"
                       maxlength="15"
                       name="docUser[<?= $i; ?>][nDoc]"
                       value="<?= $doc['NUMBER_DOCUMENT']; ?>">
            </div>
        </div>
		<?php $i++;
		}
		} else {?>
        <div class="row">
            <!-- Tipo de documento -->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <label for="idTypeDoc" class='control-label'>Tipo de Documento</label>
                <select class="form-control" id="idTypeDoc" name="docUser[<?= $i; ?>][idType]">
					<?php if (isset($listTypeDoc)) {
					foreach ($listTypeDoc as $type) { ?>
                    <option value="<?= $type['ID_TYPE_DOCUMENT'] ?>">
						<?= $type['NAME_TYPE_DOCUMENT'] ?>
                    </option>
					<?php }
					} ?>
                </select>
            </div>
            <!-- Numero de documento -->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <label for="nDoc" class='control-label'>N&uacute;mero de Documento</label>
                <input type="text"
                       class="form-control"
                       id="nDoc"
                       minlength="7"
                       maxlength="15"
                       name="docUser[<?= $i; ?>][nDoc]">
            </div>
        </div>
		<?php }
		?>
    <!-- Agregado  telefono-->
		<?php $i = 0;
		if (!empty($phoneCheck)) {
		foreach ($phoneCheck as $phone) { ?>
        <div class="row">
            <!-- Tipo de telefono -->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <label for="typePhone" class='control-label'>Tipo de Tel&eacute;fono</label>
                <select class="form-control" id="typePhone" name="phoneUser[<?= $i; ?>][idType]">
					<?php if (isset($listTypePhone)) {
					foreach ($listTypePhone as $type) { ?>
                    <option value="<?= $type['ID_TYPE_PHONE'] ?>" <?= $phone['ID_TYPE_PHONE'] == $type['ID_TYPE_PHONE'] ?
						'selected' : ''; ?>>
						<?= $type['NAME_TYPE_PHONE'] ?>
                    </option>
					<?php }
					} ?>
                </select>
            </div>
            <!-- Numero de telefono -->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <label for="nPhone" class='control-label'>N&uacute;mero de Telefono</label>
                <input type="text"
                       class="hidden"
                       name="phoneUser[<?= $i; ?>][nPhoneOld]"
                       value="<?= $phone['NUMBER_PHONE']; ?>"
                       title="">
                <input type="text"
                       class="form-control"
                       id="nPhone"
                       name="phoneUser[<?= $i; ?>][nPhone]"
                       minlength="6"
                       maxlength="10"
                       value="<?= $phone['NUMBER_PHONE']; ?>">
            </div>
        </div>
		<?php $i++;
		}
		} else {
		?>
        <div class="row">
            <!-- Tipo de telefono -->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <label for="typePhone" class='control-label'>Tipo de Tel&eacute;fono</label>
                <select class="form-control" id="typePhone" name="phoneUser[<?= $i; ?>][idType]">
					<?php if (isset($listTypePhone)) {
					foreach ($listTypePhone as $type) { ?>
                    <option value="<?= $type['ID_TYPE_PHONE'] ?>">
						<?= $type['NAME_TYPE_PHONE'] ?>
                    </option>
					<?php }
					} ?>
                </select>
            </div>
            <!-- Numero de telefono -->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <label for="nPhone" class='control-label'>N&uacute;mero de Telefono</label>
                <input type="text"
                       class="form-control"
                       minlength="6"
                       maxlength="10"
                       id="nPhone"
                       name="phoneUser[<?= $i; ?>][nPhone]">
            </div>
        </div>
	<?php } ?>
    <!-- password -->
        <div class="row" <?= empty($searchUser) ? 'hidden' : '' ?>>
            <div class="checkbox">
                <label>
                    <input type="checkbox" data-toggle="toggle" onchange="enablePass()" data-on="Si" data-off="No">
                    Cambiar contraseña
                </label>
            </div>
            <!-- resetear password -->
            <div id="changePassword" hidden>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label class="control-label" for="password">Contraseña(*)</label>
                    <input type="password"
                           class="form-control"
                           id="password"
                           name="password"
                           placeholder="************"
                           title="Restablecer contraseña">
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label class="control-label" for="password-repeat">Repetir Contraseña(*)</label>
                    <input type="password"
                           class="form-control"
                           id="password-repeat"
                           name="password-repeat"
                           placeholder="************"
                           title="Restablecer contraseña">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function enablePass() {
        document.getElementById('changePassword').hidden = !document.getElementById('changePassword').hidden;
    }
</script>