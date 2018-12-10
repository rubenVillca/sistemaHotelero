<?php if(!empty($reserve)){ ?>
<!-- idperson -->
<div class="hidden">
    <input type="text" name="person[idPerson]" value="<?=$reserve['ID_PERSON']?>" title="nombre de persona">
</div>
<!-- nombre y apellido -->
<div class="clearfix">
    <!-- nombre de Usuario q hizo la reserva -->
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <label for="nameUser"
               class="control-label">Nombre</label>
        <input type="text"
               id="nameUser"
               name="person[name]"
               value="<?= $reserve['NAME_PERSON']; ?>"
               class="form-control"
               placeholder="Nombre de usuario"
               required>
    </div>
    <!-- apellidos Usuario q hizo la reserva -->
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <label for="appUser"
               class="control-label">Apellidos</label>
        <input type="text"
               id="appUser"
               name="person[app]"
               value="<?= $reserve['LAST_NAME_PERSON']; ?>"
               class="form-control"
               placeholder="Apellido del usuario"
               required>
    </div>
</div>
<!-- sexo y ciudad -->
<div class="clearfix">
    <!-- Sexo -->
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <label for="sex"
               class="control-label">G&eacute;nero</label><br>
        Hombre
        <input type="radio"
               id="sex"
               name="person[sex]"
               value="1" <?= $reserve['SEX_PERSON'] == 1 ? 'checked' : ''; ?>
               class=""
               required> Mujer
        <input type="radio"
               id="sex"
               name="person[sex]"
               value="0" <?= $reserve['SEX_PERSON'] == 0 ? 'checked' : ''; ?>
               class=""
               required>
    </div>
    <!-- Ciudad -->
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <label for="city"
               class="control-label">Ciudad</label>
        <input type="text"
               id="city"
               name="person[city]"
               value="<?= $reserve['CITY_PERSON']; ?>"
               class="form-control"
               placeholder="Ciudad"
               required>
    </div>
</div>
<!-- pais y correo -->
<div class="clearfix">
    <!-- Pais -->
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <label for="pais"
               class="control-label">Pais</label>
        <select id="pais"
                name="person[pais]"
                class="form-control"
                required>
			<?php foreach(empty($listCountry) ? array() : $listCountry as $pais){ ?>
            <option value="<?=$pais?>" <?= $pais == $reserve['COUNTRY_PERSON'] ? 'selected' : ''; ?>>
				<?=$pais?>
            </option>
			<?php } ?>
        </select>
    </div>
    <!-- Correo del representante -->
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <label for="emailUser"
               class="control-label">Correo del hu&eacute;sped</label>
        <input type="email"
               id="emailUser"
               name="person[email]"
               value="<?= $reserve['EMAIL_PERSON']; ?>"
               class="form-control"
               placeholder="Correo del hu&eacute;sped"
               required>
    </div>
</div>
<!-- fecha de nacimiento y direccion -->
<div class="clearfix">
    <!-- fecha de nacimiento -->
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <label for="dateNac"
               class="control-label">Fecha de nacimiento</label>
        <input type="date"
               id="dateNac"
               name="person[dateNac]"
               value="<?= $reserve['DATE_BORN_PERSON']; ?>"
               class="form-control datepicker"
               placeholder="Fecha de nacimiento"
               required>
    </div>
    <!-- Direccion -->
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <label for="address"
               class="control-label">Direcci&oacute;n</label>
        <input type="text"
               id="address"
               name="person[address]"
               value="<?= $reserve['ADDRESS_PERSON']; ?>"
               class="form-control"
               placeholder="Direcci&oacute;n"
               required>
    </div>
</div>
<!-- imagen de perfil y puntos de fidelizacion -->
<div class="clearfix">
    <!-- Imagen de perfil -->
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <label for="img"
               class="control-label">Imagen de perfil</label>
        <input type="file"
               id="img"
               name="person[img]"
               value="<?= $reserve['IMAGE_PROFILE']; ?>"
               class="form-control file"
               placeholder="Imagen de perfil">
    </div>
    <!-- Puntos de fidelizacion -->
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <label for="point"
               class="control-label">Puntos de fidelizaci&oacute;n</label>
        <input type="text"
               id="address"
               name="person[point]"
               value="<?= $reserve['POINT_PERSON']; ?>"
               class="form-control"
               placeholder="Puntos de fidelizaci&oacute;n"
               required>
    </div>
</div>
<!-- lista de telefonos del huesped -->
<?php $i = 0;
foreach(isset($listPhone) ? $listPhone : array() as $phone){ ?>
<!-- Telefono del huesped -->
<div hidden>
    <input type="text"
           name="phoneUser[<?= $i ?>][nPhoneOld]"
           value="<?= $phone['NUMBER_PHONE']; ?>"
           class="hidden"
           title="">
    <input type="text"
           name="phoneUser[<?= $i ?>][idPerson]"
           value="<?= $phone['ID_PERSON']; ?>"
           class="hidden"
           title="">
</div>
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <label for="phoneUser"
           class="control-label">Tel&eacute;fono del hu&eacute;sped</label>
    <input type="text"
           id="phoneUser"
           name="phoneUser[<?= $i ?>][nPhone]"
           value="<?= $phone['NUMBER_PHONE']; ?>"
           class="form-control"
           placeholder="Tel&eacute;fono del h&uacute;esped"
           required>
</div>
<!-- Tipo de telefono del huesped -->
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <label for="phoneType"
           class="control-label">Tipo de tel&eacute;fono del hu&eacute;sped</label>
    <select id="phoneType"
            name="phoneUser[<?= $i ?>][idType]"
            class="form-control"
            required>
		<?php foreach(isset($listTypePhone) ? $listTypePhone : array() as $type){ ?>
        <option value="<?= $type['ID_TYPE_PHONE']; ?>" <?= $phone['ID_TYPE_PHONE'] == $type['ID_TYPE_PHONE'] ? 'selected' : ''; ?>>
			<?= $type['NAME_TYPE_PHONE']; ?>
        </option>
		<?php } ?>
    </select>
</div>
<div class="clearfix"></div>
<?php $i++;
} ?>
<!-- lista de documentos del huesped -->
<?php $i = 0;
foreach(isset($listDoc) ? $listDoc : array() as $doc){ ?>
<!-- Docuemnto del huesped -->
<div class="hidden">
    <input type="text"
           name="docUser[<?= $i ?>][idPerson]"
           value="<?= $doc['ID_PERSON']; ?>"
           class="hidden"
           title="">
    <input type="text"
           id="docUser"
           name="docUser[<?= $i ?>][nDocOld]"
           value="<?= $doc['NUMBER_DOCUMENT']; ?>"
           class="hidden">
</div>
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <label for="docUser"
           class="control-label">Documento del hu&eacute;sped</label>
    <input type="text"
           id="docUser"
           name="docUser[<?= $i ?>][nDoc]"
           value="<?= $doc['NUMBER_DOCUMENT']; ?>"
           class="form-control"
           placeholder="N&uacute;mero del h&uacute;esped"
           required>
</div>
<!-- Tipo de documento del huesped -->
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <label for="docType"
           class="control-label">Tipo de documento del hu&eacute;sped</label>
    <select id="docType"
            name="docUser[<?= $i ?>][idType]"
            class="form-control"
            required>
		<?php foreach(isset($listTypeDoc) ? $listTypeDoc : array() as $type){ ?>
        <option value="<?= $type['ID_TYPE_DOCUMENT']; ?>" <?= $doc['ID_TYPE_DOCUMENT'] == $type['ID_TYPE_DOCUMENT'] ? 'selected' : ''; ?>>
			<?= $type['NAME_TYPE_DOCUMENT']; ?>
        </option>
		<?php } ?>
    </select>
</div>
<div class="clearfix"></div>
<?php $i++;
} ?>
<?php } ?>
