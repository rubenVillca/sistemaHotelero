<section>
    <!-- form -->
    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
	<?php isset($person) ?: $person = array(); ?>
    <!-- Datos Ocultos -->
        <div class="hidden">
            <input type="text" name="idPerson" value="<?= empty($person) ? '-1' : $person['ID_PERSON']; ?>" title=""
                   hidden>
            <input type="date" name="dateIn" value="<?= !isset($dateIn) ?: $dateIn ?>" title="" hidden>
            <input type="date" name="dateOut" value="<?= !isset($dateOut) ?: $dateOut ?>" title="" hidden>
            <input type="text"
                   name="idService"
                   value="<?= !empty($service['ID_SERVICE']) ? $service['ID_SERVICE'] : -1; ?>"
                   title="">
            <input type="text" name="nAdult" value="<?= isset($nAdult) ? $nAdult : 1; ?>" title="" hidden>
            <input type="text" name="nBoys" value="<?= isset($nBoys) ? $nBoys : 0; ?>" title="" hidden>
            <input type="text" name="idCheck" value="<?= isset($idCheck) ? $idCheck : 0; ?>" title="" hidden>
            <input type="text" name="searchUser" value="<?= isset($searchUser) ? $searchUser : ''; ?>" title="" hidden>
        </div>
        <!-- Datos del titular ---------------------------------------------------------------------------------------->
        <div class="panel panel-primary">
            <!-- Titulo -->
            <div class="panel-heading">
                <h4 class="text-center">
                    <b>Tipo de habitaci&oacute;n:</b>
					<?= Helper::camelUpperCase(!empty($service['NAME_SERVICE']) ? $service['NAME_SERVICE'] : 'no ha seleccionado un servicio'); ?>
                </h4>
                <h2 class="text-center">Datos del Titular</h2>
            </div>
            <!-- Inputs -->
            <div class="panel-body">
                <!-- Nombre -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <label class="control-label" for="namePerson">Nombre:</label>
                    <input type="text"
                           name="name"
                           value="<?= $person['name']; ?>"
                           id="name"
                           pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ\s]{2,25}"
                           class="form-control"
                           placeholder="Nombre"
                           title="Nombre del titular ej: Juan"
                           required>
                </div>
                <!-- Apellidos -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <label class="control-label" for="app">Apellido</label>
                    <input type="text"
                           name="app"
                           value="<?= $person['app']; ?>"
                           id="app"
                           pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ\s]{2,25}"
                           class="form-control"
                           title="Apellido del titular ej: Perez Perez"
                           placeholder="Apellidos"
                           required>
                </div>
                <div class="clearfix"></div>
                <!-- Sexo -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="row">
                            <label class="control-label" for="sex">Sexo</label>
                        </div>
                    </div>
                    <label class="radio-inline">
                        <input type="radio"
                               id="hombre"
                               value="1" <?= $person['SEX_PERSON'] == 1 ? 'checked' : ''; ?>
                               name="sex"
                               required> Hombre
                    </label>
                    <label class="radio-inline">
                        <input type="radio" id="mujer" value="0"
						       <?= $person['SEX_PERSON'] == 0 ? 'checked' : ''; ?> name="sex">
                        Mujer
                    </label>
                </div>
                <!-- Fecha de Nacimiento -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <label class="control-label" for="dateNac">Fecha de nacimiento</label>
                    <input type="date"
                           name="dateNac"
                           value="<?= $person['DATE_BORN_PERSON']; ?>"
                           id="dateNac"
                           pattern="\d{1,4}/\d{1,2}/\d{2}"
                           class="form-control datepicker"
                           placeholder="aaaa/mm/dd"
                           title="aaaa/mm/dd "
                           required>
                </div>
                <div class="clearfix"></div>
                <!-- Email -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <label class="control-label" for="email">Email</label>
                    <input type="text"
                           name="email"
                           value="<?= $person['EMAIL_PERSON']; ?>"
                           id="email"
                           pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                           class="form-control"
                           placeholder="ejempl@gmail.com"
                           required>
                </div>
                <!-- Address -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <label class="control-label" for="address">Direcci&oacute;n</label>
                    <input type="text"
                           name="address"
                           value="<?= $person['ADDRESS_PERSON']; ?>"
                           id="address"
                           class="form-control"
                           placeholder="Direcci&oacute;n"
                           required>
                </div>
                <!-- Ciudad -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <label class="control-label" for="city">Ciudad</label>
                    <input type="text"
                           name="city"
                           value="<?= $person['CITY_PERSON']; ?>"
                           id="city"
                           pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ\s]{2,25}"
                           class="form-control"
                           placeholder="ciudad"
                           required>
                </div>
                <!-- pais-->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <label class="control-label" for="pais">Nacionalidad</label>
                    <select name="pais" id="pais" class="form-control" required>
                        <option value=""></option>
						<?php if(isset($listPais)) {
						foreach(is_array($listPais) ? $listPais : array() as $pais) {
						?>
                        <option value="<?= $pais ?>" <?= $pais == $person['COUNTRY_PERSON'] ? 'selected' : ''; ?>><?= $pais ?></option>
						<?php }
						} ?>
                    </select>
                </div>
                <!-- Documento identificador-->
			<?php $i = 0;
			if(isset($listUserDoc)) {
			foreach(is_array($listUserDoc) ? $listUserDoc : array() as $doc) { ?>
            <!-- Tipo de documento -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label for="typeDoc" class='control-label'>Tipo de Documento</label>
                    <select class="form-control" id="typeDoc" name="docUser[<?= $i; ?>][idType]">
                        <option value=""></option>
						<?php if(isset($listTypeDoc)) {
						foreach($listTypeDoc as $type) { ?>
                        <option value="<?= $type['ID_TYPE_DOCUMENT'] ?>" <?= $doc['ID_TYPE_DOCUMENT'] == $type['ID_TYPE_DOCUMENT'] ? 'selected' : ''; ?>>
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
                           class="hidden"
                           name="docUser[<?= $i; ?>][nDocOld]"
                           value="<?= $doc['NUMBER_DOCUMENT']; ?>"
                           title="">
                    <input type="text"
                           class="form-control"
                           title="digitos permitidos de 6 a 15"
                           id="nDoc"
                           pattern="\d{6,15}"
                           name="docUser[<?= $i; ?>][nDoc]"
                           value="<?= $doc['NUMBER_DOCUMENT']; ?>"
                           placeholder="N&uacute;mero de documento"
                           required>
                </div>
			<?php $i++;
			}
			} ?>
            <!-- Agregado  telefono-->
			<?php $i = 0;
			if(isset($listUserPhone)) {
			foreach(is_array($listUserPhone) ? $listUserPhone : array() as $phone) { ?>
            <!-- Tipo de telefono -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label for="typePhone" class='control-label'>Tipo de Tel&eacute;fono</label>
                    <select class="form-control" id="typePhone" name="phoneUser[<?= $i; ?>][idType]">
                        <option value=""></option>
						<?php if(isset($listTypePhone)) {
						foreach($listTypePhone as $type) { ?>
                        <option value="<?= $type['ID_TYPE_PHONE'] ?>" <?= $phone['ID_TYPE_PHONE'] == $type['ID_TYPE_PHONE'] ? 'selected' : ''; ?>>
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
                           title="digitos numeros permitidos de 6 a 15"
                           class="form-control"
                           id="nPhone"
                           pattern="\d{6,15}"
                           name="phoneUser[<?= $i; ?>][nPhone]"
                           value="<?= $phone['NUMBER_PHONE']; ?>"
                           placeholder="N&uacute;mero de tel&eacute;fono">
                </div>
				<?php $i++;
				}
				} ?>
            </div>
        </div>
        <!---------------------------------- Servicio------------------------------ ----------------------------------->
		<?php if(isset($listRoom)) { ?>
        <div class="panel panel-primary">
            <!-- sub titulo -->
            <div class="panel-heading">
                <h4>Datos de la habitaci&oacute;n</h4>
            </div>
            <!-- contenido datos del servicio -->
            <div class="panel-body">
                <!-- dateIn-->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <label class="control-label" for="dateIn">fecha de ingreso</label>
                    <input type="date"
                           name="dateIn"
                           id="dateIn"
                           class="form-control datepicker"
                           value="<?= isset($dateIn) ? $dateIn : date('Y-m-d') ?>"
                           disabled
                           required>
                </div>
                <!-- dateOut-->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <label class="control-label" for="dateOut">Fecha de egreso</label>
                    <input type="date"
                           name="dateOut"
                           id="dateOut"
                           class="form-control datepicker"
                           value="<?= isset($dateOut) ? $dateOut : date('d-m-Y') ?>"
                           disabled
                           required>
                </div>
                <!-- room-->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <label class="control-label" for="listRoom">Nombre de cuarto</label>
                    <select name="listRoom[]" id="listRoom" class="form-control" multiple="multiple" required>
						<?php foreach($listRoom as $room) { ?>
                        <option value="<?= $room['ID_ROOM']; ?>"><?= $room['NAME_ROOM']; ?></option>
						<?php } ?>
                    </select>
                </div>
                <!-- listIdArticle-->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <label class="control-label" for="listIdArticle">Art&iacute;culos entregados</label>
                    <select name="listIdArticle[]" id="listIdArticle" class="form-control" multiple="multiple">
						<?php if(isset($listArticle)) {
						foreach($listArticle as $item) {
						?>
                        <option value="<?= $item['ID_ARTICLE']; ?>"><?= $item['NAME_ARTICLE']; ?></option>
						<?php }
						} ?>
                    </select>
                </div>
                <!-- observaciones-->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label class="control-label" for="observation">Observaciones</label>
                    <textarea rows="3"
                              name="observation"
                              id="observation"
                              class="jqte-test form-control"
                              placeholder="Observaciones"></textarea>
                </div>
            </div>
        </div>
	<?php } ?>
    <!----------------------------------- TARGETA------------------------------------------------------------------>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="text-center">Datos de la tarjeta</h4>
            </div>
            <div class="panel-body">
                <!-- Numero de Targeta-->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <label class="control-label" for="nCard">N&uacute;mero de Tarjeta</label>
                    <input type="tel"
                           name="nCard"
                           id="nCard"
                           pattern="\d{10-20}"
                           title="cantidad de digitos permitidos de 10 a 20"
                           class="form-control"
                           placeholder="N&uacute;mero de tarjeta"
                           required>
                </div>
                <!-- Tipo de targeta-->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <label class="control-label" for="typeCard">Tipo de tarjeta</label>
                    <select name="typeCard" id="typeCard" class="form-control" required>
                        <option value=""></option>
						<?php if(isset($listTypeCard)) {
						foreach($listTypeCard as $card) {?>
                        <option value="<?= $card['ID_TYPE_CARD']; ?>"><?= $card['NAME_TYPE_CARD']; ?></option>
						<?php }
						} ?>
                    </select>
                </div>
                <!-- mesExp-->
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label for="month" class="control-label">Mes de expiraci&oacute;n</label>
                    <select name="month" id="month" class="form-control">
						<?php if(isset($months)) {
						foreach($months as $mes) { ?>
                        <option value="<?= $mes['id'] ?>">
							<?= $mes['name'] ?>
                        </option>
						<?php }
						} ?>
                    </select>
                </div>
                <!-- anio de expiracion -->
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <label for="year" class="control-label">A&ntilde;o de expiraci&oacute;n</label>
                    <input type="number"
                           class="form-control"
                           id="year"
                           name="year"
                           min="<?= date('Y') ?>"
                           max="<?= (date('Y')+15) ?>"
                           placeholder="A&ntilde;o de expiraci&oacute;n"
                           required>
                </div>
                <!-- Numero de CVV-->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <label class="control-label" for="ccv">CCV</label>
                    <input type="tel"
                           name="ccv"
                           id="ccv"
                           class="form-control"
                           pattern="\d{3,4}"
                           title="codigo ccv de tres digitos"
                           required>
                </div>
                <!-- Booton-->
                <div class="panel-body pull-right">
                    <a href="" class="btn btn-warning">Cancelar <i class="fa fa-remove"></i></a>
                    <button type="submit" name="insert" id="insert" class="btn btn-success">
                        <span class="glyphicon glyphicon-send"></span> Agregar
                    </button>
                </div>
            </div>
        </div>
    </form>
</section>
<!-- para el multiselect -->
<script type="text/javascript">
    $(document).ready(function () {
        $("#listRoom").multiselect({
            buttonWidth: '100%'
        });
        $('#listIdArticle').multiselect({
            buttonWidth: '100%'
        });
    });
</script>