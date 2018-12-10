<section>
    <div class="panel panel-primary animated fadeInUp">
        <div class="panel-heading">
            <h3 class="panel-title text-center">Registro Usuario</h3>
        </div>
        <div class="panel-body">
            <form action="user/insert/" method="post" class="form-horizontal" enctype="multipart/form-data">
                <!--tipo de Usuario-->
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-12 col-md-6 col-lg-4"
                           for="idRol">Tipo de Usuario* </label>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <select name="idRol"
                                class="form-control"
                                id="idRol"
                                required>
                            <option value="">Seleccione un tipo de usuario</option>
							<?php if(isset($listTypeUser)){
							foreach($listTypeUser as $rol){ ?>
                            <option value="<?= $rol['ID_ROL']; ?>"><?= Helper::camelUpperCase($rol['NAME_ROL']); ?></option>
							<?php }
							} ?>
                        </select>
                    </div>
                </div>
                <!--Nombre-->
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-12 col-md-6 col-lg-4"
                           for="name">Nombre*</label>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <input type="text"
                               class="form-control"
                               id="name"
                               name="name"
                               pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ]+[a-zA-ZñÑáéíóúÁÉÍÓÚ ]{2,20}"
                               placeholder="Ingrese su nombre"
                               title="Cacarteres permitidos de a-z"
                               maxlength="25"
                               required>
                    </div>
                </div>
                <!--Apellido-->
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-12 col-md-6 col-lg-4"
                           for="app">Apellidos*</label>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <input type="text"
                               class="form-control"
                               id="app"
                               name="app"
                               pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ]+[a-zA-ZñÑáéíóúÁÉÍÓÚ ]{2,20}"
                               placeholder="Ingrese sus apellidos"
                               maxlength="25"
                               required>
                    </div>
                </div>
                <!--SEXO-->
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-12 col-md-6 col-lg-4">Sexo*</label>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <label class="radio-inline">
                            <input type="radio" id="hombre" value="1" name="sex" required> Hombre
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="mujer" value="0" name="sex"> Mujer
                        </label>
                    </div>
                </div>
                <!--Fecha de nacimiento-->
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-12 col-md-6 col-lg-4"
                           for="dateNac">Fecha de nacimiento</label>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <input type="date"
                               class="form-control datepickerBorn"
                               id="dateNac"
                               name="dateNac"
                               placeholder="aaaa-mm-dd">
                    </div>
                </div>
                <!--Direccion-->
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-12 col-md-6 col-lg-4"
                           for="address">Direcci&oacute;n </label>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <input type="text"
                               class="form-control"
                               id="address"
                               name="address"
                               placeholder="Ingrese La direcci&oacute;n donde reside"
                               maxlength="200">
                    </div>
                </div>
                <!--Ciudad-->
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-12 col-md-6 col-lg-4"
                           for="city">Ciudad</label>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <input id="city"
                               class="form-control"
                               name="city"
                               maxlength="30"
                               pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ ]{2,}"
                               placeholder="Nombre de la ciudad en la que vive"/>
                    </div>
                </div>
                <!--Pais-->
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-12 col-md-6 col-lg-4"
                           for="pais">Pais</label>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <select id="pais"
                                class="form-control"
                                name="pais">
                            <option value="">Seleccione su pa&iacute;s de origen</option>
							<?php if(isset($listPais)){
							foreach($listPais as $pais){ ?>
                            <option value="<?= $pais; ?>"><?= $pais ?></option>
							<?php }
							} ?>
                        </select>
                    </div>
                </div>
                <hr>
                <!--Correo Electronico-->
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-12 col-md-6 col-lg-4"
                           for="email">Correo electr&oacute;nico*</label>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <input type="email"
                               class="form-control"
                               id="email"
                               name="email"
                               placeholder="Ingrese un correo Electron&iacute;co"
                               maxlength="50"
                               required>
                    </div>
                </div>
                <!--Password-->
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-12 col-md-6 col-lg-4"
                           for="pass">Contrase&ntilde;a*</label>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <input type="password"
                               class="form-control"
                               name="pass"
                               id="passw"
                               placeholder="Ingrese su contrase&ntilde;a"
                               maxlength="25"
                               required>
                    </div>
                </div>
                <!--Password repeat-->
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-12 col-md-6 col-lg-4"
                           for="pass-repeat">Repetir contrase&ntilde;a*</label>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <input type="password"
                               class="form-control"
                               id="pass-repeat"
                               name="pass-repeat"
                               placeholder="Vuelva a introducir su contrase&ntilde;a"
                               maxlength="25"
                               required>
                    </div>
                </div>
                <hr>
                <!--numero de documento y tipo de documento-->
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-12 col-md-6 col-lg-4" for="nDoc">
                        Documento de identificación*
                    </label>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                        <input type="text"
                               class="form-control"
                               id="nDoc"
                               name="docUser[0][nDoc]"
                               pattern="[0-9.]{5,}$"
                               placeholder="N&uacute;mero de identificaci&oacute;n de su documento"
                               maxlength="25"
                               required>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
						<?php if(isset($listTypeDoc)){ ?>
                        <select id="typeDoc"
                                class="form-control"
                                name="docUser[0][idType]"
                                required>
							<?php foreach($listTypeDoc as $doc){ ?>
                            <option value="<?= $doc['ID_TYPE_DOCUMENT']; ?>"><?= $doc['NAME_TYPE_DOCUMENT'] ?></option>
							<?php } ?>
                        </select>
						<?php } ?>
                    </div>
                </div>
                <!--Tipo de telefono y numero de Telefono-->
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-12 col-md-6 col-lg-4"
                           for="nPhone">N&uacute;mero de Tel&eacute;fono*</label>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                        <input type="tel"
                               class="form-control"
                               id="nPhone"
                               name="phoneUser[0][nPhone]"
                               pattern="[0-9]+"
                               placeholder="N&uacute;mero de referencia"
                               maxlength="12"
                               required>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
						<?php if(isset($listTypePhone)){ ?>
                        <select id="typePhone"
                                class="form-control"
                                name="phoneUser[0][idType]"
                                required>
							<?php foreach($listTypePhone as $type){ ?>
                            <option value="<?= $type['ID_TYPE_PHONE']; ?>"><?= $type['NAME_TYPE_PHONE'] ?></option>
							<?php } ?>
                        </select>
						<?php } ?>
                    </div>
                </div>
                <hr>
                <!-- Imagen de perfil -->
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-12 col-md-6 col-lg-4"
                           for="imgAddress">Imagen de perfil</label>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <input type="file"
                               class="file"
                               id="imgAddress"
                               name="imgAddress"
                               data-show-upload="false"
                               data-show-caption="true">
                    </div>
                </div>
                <!-- Puntos de fidelizacion -->
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-12 col-md-6 col-lg-4"
                           for="point">Puntos de fidelizaci&oacute;n</label>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <input type="number"
                               class="form-control"
                               id="point"
                               name="point"
                               value="0"
                               min="0"
                               max="999"
                               required>
                    </div>
                </div>
                <!-- estado -->
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-12 col-md-6 col-lg-4" for="state">Estado*</label>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <select name="state" id="state" class="form-control">
							<?php if(!empty($listStateUser)){
							foreach($listStateUser as $st){ ?>
                            <option value="<?= $st['ID_STATE_USER'] ?>"><?= $st['NAME_STATE_USER']; ?></option>
							<?php }
							} ?>
                        </select>
                    </div>
                </div>
                <!--Botones registrar - registrar-limpiar-cancelar-->
                <div class="form-group">
                    <div class="col-xs-12 col-sm-12 col-md-6-offset col-md-4 col-lg-offset-7 col-lg-3">
                        <div class="pull-right">
                            <button type="reset"
                                    class="btn btn-info"
                                    value="Limpiar">
                                Limpiar <span class="glyphicon glyphicon-refresh"></span>
                            </button>
                            <button type="submit"
                                    class="btn btn-primary"
                                    name="register"
                                    value="Registrar">
                                Registrar <span class="glyphicon glyphicon-check"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>