<!-- Datos de persona del registro check  -->
<section>
	<?php if(!empty($person)) { ?>
    <div class="animated fadeInUp">
        <div class="container-fluid">
            <h3 class="text-left text-primary"><span class="fa fa-user"></span> Datos de usuario</h3>
        </div>
        <hr>
        <div class="form-horizontal">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="personID" class="col-xs-12 col-sm-12 col-md-5 col-lg-5 control-label text-info">
                        <span>Nro de registro:</span>
                    </label>
                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                        <p id="personID"><?= $person['ID_CHECK']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="personEmail" class="col-xs-12 col-sm-12 col-md-5 col-lg-5 control-label text-info">
                        <span>Email</span>
                    </label>
                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
	                    <p id="personEmail"><?= $person['EMAIL_PERSON'] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="personName" class="col-xs-12 col-sm-12 col-md-5 col-lg-5 control-label text-info">
                        <span>Nombre:</span>
                    </label>
                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
			            <p id="personName"><?= $person['NAME_PERSON'] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="personLastName" class="col-xs-12 col-sm-12 col-md-5 col-lg-5 control-label text-info">
                        <span>Apellidos</span>
                    </label>
                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
			            <p id="personLastName"><?= $person['LAST_NAME_PERSON'] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="personDateBorn" class="col-xs-12 col-sm-12 col-md-5 col-lg-5 control-label text-info">
                        <span>F. de nacimiento:</span>
                    </label>
                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                        <p id="personDateBorn"><?= $person['DATE_BORN_PERSON'] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="personSex" class="col-xs-12 col-sm-12 col-md-5 col-lg-5 control-label text-info">
                        <span>Genero:</span>
                    </label>
                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                        <p id="personSex">
                            <?= $person['SEX_PERSON'] == 1 ? 'Hombre' : $person['SEX_PERSON'] == 0 ? 'Mujer' : '' ?>
                        </p>
                    </div>
                </div>
            </div>
            <!-- Documento -->
			<?php if(!empty($nDoc[0]['ID_PERSON'])) { ?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 <?= empty($nDoc) ? 'hidden' : '' ?>">
                <div class="form-group">
                    <label for="personNumberDoc" class="col-xs-12 col-sm-12 col-md-5 col-lg-5 control-label text-info">
                        <span>Nro de Documento:</span>
                    </label>
                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                        <p id="personNumberDoc"><?= $nDoc['0']['NUMBER_DOCUMENT'] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="personTypeDoc" class="col-xs-12 col-sm-12 col-md-5 col-lg-5 control-label text-info">
                        <span>Tipo de Documento:</span>
                    </label>
                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                        <p id="personTypeDoc"><?= $nDoc['0']['NAME_TYPE_DOCUMENT'] ?></p>
                    </div>
                </div>
            </div>
			<?php } ?>
        <!-- Telefono -->
			<?php if(!empty($nPhone[0]['ID_PERSON'])) { ?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" <?= empty($nPhone) ? 'hidden' : '' ?>>
                <div class="form-group">
                    <label for="personNumberPhone" class="col-xs-12 col-sm-12 col-md-5 col-lg-5 control-label text-info">
                        <span>N&uacute;mero de Tel&eacute;fono:</span>
                    </label>
                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                        <p id="personNumberPhone"><?= $nPhone[0]['NUMBER_PHONE'] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="personTypePhone" class="col-xs-12 col-sm-12 col-md-5 col-lg-5 control-label text-info">
                        <span>Tipo de Tel&eacute;fono:</span>
                    </label>
                    <div class="col-xs-6 col-sm-6 col-md-7 col-lg-7">
                        <p id="personTypePhone"><?= $nPhone['0']['NAME_TYPE_PHONE'] ?></p>
                    </div>
                </div>
            </div>
			<?php } ?>
        </div>
    </div>
	<?php } ?>
</section>
