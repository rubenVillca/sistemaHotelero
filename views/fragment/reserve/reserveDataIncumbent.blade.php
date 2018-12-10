<!-- Datos titular -->
<?php if (!empty($check)) { ?>
<div class="">
    <div class="text-primary">
        <h4 class=""><b>Datos del titular</b></h4>
    </div>
    <hr>
    <div class="clearfix">
        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
            <label class="control-label"><b>Correo:</b></label><br> <?= $check['EMAIL_PERSON'] ?>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
            <label class="control-label"><b>Direcci&oacute;n:</b></label><br> <?= $check['EMAIL_PERSON'] ?>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
            <label class="control-label"><b>Fecha de
                    entrada:</b></label><br> <?= $check['DATE_START_CHECK'] ?>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
            <label class="control-label"><b>Fecha de salida:</b></label><br> <?= $check['DATE_END_CHECK'] ?>
        </div>
    </div>
    <div class="clearfix">
        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
            <label class="control-label"><b>Nombre:</b></label><br><?= $check['NAME_PERSON'] ?>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
            <label class="control-label"><b>Apellidos: </b></label><br> <?= $check['LAST_NAME_PERSON'] ?>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
            <label class="control-label"><b>Fecha de
                    nacimiento</b></label><br><?= $check['DATE_BORN_PERSON'] ?>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
            <b>Sexo</b><br>
            <label class="radio-inline">
                <input type="radio"
                       class="radio-inline" <?= $check['SEX_PERSON'] == 1 ? 'checked' : '' ?>
                       name="sex"
                       disabled> Hombre
            </label>
            <label class="radio-inline">
                <input type="radio"
                       class="radio-inline" <?= $check['SEX_PERSON'] == 0 ? 'checked' : '' ?>
                       name="sex"
                       disabled> Mujer
            </label><br>
        </div>
    </div>
    <div class="clearfix">
        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
            <label class="control-label"><b>Ciudad</b></label><br>
			<?= $check['CITY_PERSON'] ?></div>
        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
            <label class="control-label"><b>Pa&iacute;s</b></label><br>
			<?= $check['COUNTRY_PERSON'] ?></div>
    </div>
    <div class="clearfix">
		<?php if (isset($userDoc)) {
		foreach ($userDoc as $doc) {
		?>
        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
            <label class="control-label"><b>N&uacute;mero de
                    Documento:</b></label><br> <?= $doc['NUMBER_DOCUMENT'] ?>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
            <label class="control-label"><b>Tipo de
                    Documento:</b></label><br> <?= $doc['NAME_TYPE_DOCUMENT'] ?>
        </div>
		<?php }
		} ?>
		<?php if (isset($userPhone)) {
		foreach ($userPhone as $phone) {
		?>
        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
            <label class="control-label"><b>N&uacute;mero de
                    tel&eacute;fono:</b></label><br> <?= $phone['NUMBER_PHONE'] ?>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
            <label class="control-label"><b>Tipo de
                    tel&eacute;fono:</b></label><br> <?= $phone['NAME_TYPE_PHONE'] ?>
        </div>
		<?php }
		} ?>
    </div>
</div>
<?php } ?>