<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 app-color-white">
    <div class="row">
        <!----------------------- DATOS DEL SERVICIO -------------------------------------------------------------->
        <section>
			<?php require_once 'views/fragment/consume/consumeService.blade.php'?>
        </section>
        <!----------------------- DATOS DE TITULAR----------------------------------------------------------------->
        <section>
			<?php if(!empty($check)) { ?>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                            Datos del t&iacute;tular: <?= $check['ID_CHECK'] ?>
                        </a>
                    </h3>
                </div>
                <div id="collapse1" class="panel-collapse collapse in">
                    <div class="panel-body form-horizontal">
                        <div class="form-group">
                            <!--name-->
                            <label class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-2" for="name">Nombre:</label>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
                                <h5><?= $check['NAME_PERSON'] ?></h5>
                            </div>
                            <!--apellidos-->
                            <label class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-2"
                                   for="app">Apellido(s):</label>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
                                <h5><?= $check['LAST_NAME_PERSON']; ?></h5>
                            </div>
                            <!--sexo-->
                            <label class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-2">Sexo:</label>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
                                <h5><?= $check['SEX_PERSON'] == 1 ? 'Hombre' : 'Mujer' ?></h5>
                            </div>
                        </div>
                        <div class="form-group">
                            <!--correo-->
                            <label class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-2" for="email">Correo:</label>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
                                <h5><?= $check['EMAIL_PERSON']; ?></h5>
                            </div>
                            <!--ciudad-->
                            <label class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-2" for="city">Ciudad:</label>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
                                <h5><?= $check['CITY_PERSON']; ?></h5>
                            </div>
                            <!--pais-->
                            <label class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-2" for="pais">País:</label>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
                                <h5><?= $check['COUNTRY_PERSON']; ?></h5>
                            </div>
                        </div>
                        <div class="form-group">
                            <!--address-->
                            <label class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-2" for="address">Direcci&oacute;n:
                            </label>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
                                <h5><?= $check['ADDRESS_PERSON']; ?></h5>
                            </div>
                            <!--dateNac-->
                            <label class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-2"
                                   for="dateNac">Nacimiento:</label>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
                                <h5><?= $check['DATE_BORN_PERSON'] ?></h5>
                            </div>
                        </div>
                        <!-- Documentos y telefonos-->
                        <div class="form-group">
						<?php foreach(empty($docCheck) ? array() : $docCheck as $doc) { ?>
                        <!-- Tipo de documento -->
                            <label for="idTypeDoc"
                                   class='control-label col-xs-6 col-sm-3 col-md-3 col-lg-2'>Documento:</label>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
                                <h5><?= $doc['NUMBER_DOCUMENT']; ?> (<?= $doc['NAME_TYPE_DOCUMENT'] ?>)</h5>
                            </div>
						<?php } ?>
                        <!-- Agregado  telefono-->
							<?php foreach(empty($phoneCheck) ? array() : $phoneCheck as $phone) { ?>
                            <label for="typePhone" class='control-label col-xs-6 col-sm-3 col-md-3 col-lg-2'>Tel&eacute;fono:
                            </label>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
                                <h5><?= $phone['NUMBER_PHONE']; ?> (<?= $phone['NAME_TYPE_PHONE'] ?>)</h5>
                            </div>
							<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
			<?php } ?>
        </section>
        <!---------------------- DATOS DE HUESPEDES --------------------------------------------------------------->
        <section>
			<?php if(!empty($listTeam)) { ?>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title text-center">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Datos del los
                            H&uacute;espedes
                        </a>
                    </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse in">
                    <div class="panel-body form-horizontal">
						<?php $i = 0; foreach ($listTeam as $team){?>
                        <div class="form-group">
                            <h3 class="label label-primary control-label col-xs-6 col-sm-3 col-md-3 col-lg-2">
                                Hu&eacute;sped <?= $i + 1?>
                            </h3>
                        </div>
                        <div class="form-group">
                            <!-- id -->
                            <input type="text" name="person[<?=$i?>][idPerson]" class="hidden"
                                   value="<?=$team['ID_PERSON']?>" title="">
                            <!-- Nombre -->
                            <label for=""
                                   class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-2"><b>Nombre: </b></label>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
                                <h5><?=$team['NAME_PERSON']?></h5>
                            </div>
                            <!-- Apellidos -->
                            <label for="" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-2"><b>Apellido(s):</b></label>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
                                <h5><?=$team['LAST_NAME_PERSON']?></h5>
                            </div>
                            <!-- Direccion -->
                            <label for=""
                                   class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-2"><b>Dirección:</b></label>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
                                <h5><?=$team['ADDRESS_PERSON']?></h5>
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- pais -->
                            <label for="" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-2"><b>País:</b></label>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
                                <h5><?=$team['COUNTRY_PERSON']?></h5>
                            </div>
                            <!-- Fecha de dateNac -->
                            <label for=""
                                   class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-2"><b>Nacimiento:</b></label>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
                                <h5><?=$team['DATE_BORN_PERSON'] == '0000-00-00' ? '' : $team['DATE_BORN_PERSON']?></h5>
                            </div>
                            <!-- sexo -->
                            <label for="" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-2"><b>Sexo:</b></label>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
                                <h5><?=$team['SEX_PERSON'] == 1 ? 'Hombre' : 'Mujer'?></h5>
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- Documentos -->
							<?php foreach ($team['documentList'] as $docTeam){?>
                            <label for=""
                                   class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-2"><b>Documento: </b></label>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
                                <h5><?=$docTeam['NUMBER_DOCUMENT']?> (<?=$docTeam['NAME_TYPE_DOCUMENT']?>)</h5>
                            </div>
							<?php } ?>

                            <!-- telefonos -->
	                        <?php foreach ($team['phoneList'] as $phoneTeam){?>
                            <label for="" class="control-label col-xs-6 col-sm-3 col-md-3 col-lg-2">
                                <b>Telefono: </b>
                            </label>
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
                                <h5><?=$phoneTeam['NUMBER_PHONE']?> (<?=$phoneTeam['NAME_TYPE_PHONE']?>)</h5>
                            </div>
	                        <?php } ?>
                        </div>
                        <hr>
						<?php } ?>
                    </div>
                </div>
            </div>
			<?php } ?>
        </section>
    </div>
</div>