<?php if (isset($listConsum)) { ?>
<?php $i = 1; ?>
<?php foreach ($listConsum as $consum) { ?>
<hr>
<div class="">
    <!------------------------------------- Datos servicio y reserva -------------------------->
    <!-- Datos de consumo -->
    <div class="text-primary">
        <h4 class=""><b>Consumo <?= $i++?></b></h4>
    </div>
    <hr>
    <div class="panel-body">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <label class="control-label"><b>Nro de reserva:</b></label>
            <br> <?= $consum['ID_CHECK'] ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <label class="control-label"><b>Nombre:</b></label><br> <?= $consum['NAME_SERVICE'] ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <label class="control-label"><b>Costo:</b></label><br> <?= $consum['PRICE_CONSUME_SERVICE'].' '.$consum['NAME_TYPE_MONEY'] ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <b>Cantidad de personas:</b><br>
            Adultos:<?= $consum['UNIT_ADULT_ROOM_MODEL'].', Ni&ntilde;os: '.$consum['UNIT_BOY_ROOM_MODEL'] ?>
        </div>
    </div>

    <!-------------------------------------- datos de huespedes ------------------------------->
	<?php if (!empty($consum['list_member'])) { ?>
    <div class="panel-heading">
        <h4 class="panel-title"><b>Datos de huespedes</b></h4>
    </div>
	<?php foreach ($consum['list_member'] as $member) { ?>
    <div class="clearfix">
        <!-- nombre -->
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <label class="control-label"><b>Nombre:</b></label><br> <?= $member['NAME_PERSON'] ?>
        </div>
        <!-- apellido -->
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <label class="control-label"><b>Apellido:</b></label><br> <?= $member['LAST_NAME_PERSON'] ?>
        </div>
        <!-- Fecha de nacimiento -->
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <label class="control-label"><b>Fecha de
                    nacimiento:</b></label><br> <?= $member['DATE_BORN_PERSON'] ?>
        </div>
        <!-- Sexo -->
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <b>Sexo</b><br>
            <label class="radio-inline">
                <input type="radio"
                       class="radio-inline" <?= $member['SEX_PERSON'] == '1' ? 'checked' : '' ?>
                       name="sex-<?= $member['ID_PERSON'] ?>"
                       disabled> Hombre
            </label>
            <label class="radio-inline">
                <input type="radio"
                       class="radio-inline" <?= $member['SEX_PERSON'] == '0' ? 'checked' : '' ?>
                       name="sex-<?= $member['ID_PERSON'] ?>"
                       disabled> Mujer
            </label>
        </div>
        <!-- fecha de ingreso -->
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <b>Fecha de Ingreso:</b><br>
			<?= $consum['DATE_START_CONSUME_SERVICE'] ?>
        </div>
        <!-- fecha de egreso -->
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <label class="control-label"><b>Fecha de
                    egreso:</b></label><br> <?= $consum['DATE_END_CONSUME_SERVICE'] ?>
        </div>
        <!-- pais -->
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <label class="control-label"><b>Pais:</b></label><br> <?= $member['COUNTRY_PERSON'] ?>
        </div>
        <!-- documento de identificacion -->
		<?php foreach (isset($member['list_document']) ? $member['list_document'] : array() as $doc) { ?>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <b>N&uacute;mero de documento:</b><br>
			<?= $doc['NUMBER_DOCUMENT'] ?>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <b>Tipo de documento:</b><br>
			<?= $doc['NAME_TYPE_DOCUMENT'] ?>
        </div>
		<?php } ?>
    <!-- telefonos -->
		<?php foreach (isset($member['list_phone']) ? $member['list_phone'] : array() as $phone) { ?>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <b>N&uacute;mero de Telefono:</b><br>
			<?= $phone['NUMBER_PHONE'] ?>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <b>Tipo de telefono:</b><br>
			<?= $phone['NAME_TYPE_PHONE'] ?>
        </div>
		<?php } ?>
    </div>
    <hr>
	<?php } ?>
	<?php } ?>
</div>
<?php } ?>
<?php } ?>
