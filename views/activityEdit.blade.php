<section>
    <div class="app-color-white animated fadeIn col-xs-12 col-sm-12 col-md-8 col-md-offset-4 col-lg-6 col-lg-offset-3">
        <div class="panel-primary">
            <div class="panel-heading row">
                <h3 class="panel-title">Editar actividad</h3>
            </div>
            <div class="panel-body">
	            <?php if(!empty($activity)){ ?>
                <form action="<?= 'activity/edit_dd/'. $activity['ID_ACTIVITY'] ?>"
                      method="post"
                      id="form-edit-activity"
                      enctype="multipart/form-data">
                    <!-- Nombre de activity -->
                    <div class="row">
                        <label for="nameActivity"
                               class="control-label">Nombre de la actividad</label>
                        <input type="text"
                               id="nameActivity"
                               name="nameActivity"
                               value="<?= $activity['NAME_ACTIVITY'] ?>"
                               class="form-control"
                               placeholder="Nombre de la actividad"
                               required>
                    </div>
                    <!-- descripcion de activity -->
                    <div class="row">
                        <label for="descrActivity"
                               class="control-label">Descripci&oacute;n de la actividad</label>
                        <textarea id="descrActivity"
                                  name="descrActivity"
                                  class="form-control jqte-test"
                                  placeholder="Descripci&oacute;n de la actividad"
                                  required><?= $activity['DESCRIPTION_ACTIVITY'] ?></textarea>
                    </div>
                    <!-- Tipo de activity -->
		            <?php if(!empty($listType)){ ?>
                    <div class="row">
                        <label for="idTypeActivity"
                               class="control-label">Tipo de Actividad</label>
                        <select id="idTypeActivity"
                                name="idTypeActivity"
                                class="form-control"
                                required>
				            <?php foreach($listType as $type){ ?>
                            <option value="<?= $type['ID_TYPE_ACTIVITY'] ?>" <?= $type['ID_TYPE_ACTIVITY'] == $activity['ID_TYPE_ACTIVITY'] ? 'selected' : '' ?>>
					            <?= $type['NAME_TYPE_ACTIVITY'] ?>
                            </option>
				            <?php } ?>
                        </select>
                    </div>
		            <?php } ?>
                <!-- Estado de activity -->
		            <?php if(!empty($listState)){ ?>
                    <div class="row">
                        <label for="idStateActivity"
                               class="control-label">Estado</label>
                        <select id="idStateActivity"
                                name="idStateActivity"
                                class="form-control"
                                required>
				            <?php foreach($listState as $state){ ?>
                            <option value="<?= $state['ID_STATE_ACTIVITY'] ?>" <?= $state['ID_STATE_ACTIVITY'] == $activity['ID_STATE_ACTIVITY'] ? 'selected' : ''; ?>>
					            <?= $state['NAME_STATE_ACTIVITY'] ?>
                            </option>
				            <?php } ?>
                        </select>
                    </div>
	            <?php } ?>
                <!-- imagen de la activity -->
                    <div class="row">
                        <label for="imgAddress"
                               class="control-label">Imagen</label>
                        <input type="file"
                               id="imgAddress"
                               name="imgAddress"
                               class="file"
                               data-show-upload="false"
                               data-show-caption="true">
                    </div>
                    <!-- hora y fecha de inicio -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <!-- fecha -->
                            <div class="row">
                                <label for="dateActivityIni"
                                       class="control-label">Fecha de inicio</label>
                                <input type="date"
                                       id="dateActivityIni"
                                       name="dateActivityIni"
                                       class="form-control datepicker"
                                       placeholder="Fecha inicio de la actividad"
                                       value="<?= $activity['DATE_START_ACTIVITY'] ?>"
                                       required>
                            </div>
                        </div>
                        <!-- hora -->
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <label for="timeActivityIni"
                                   class="control-label">Hora de inicio</label>
                            <input type="time"
                                   id="timeActivityIni"
                                   name="timeActivityIni"
                                   class="form-control timepicker"
                                   placeholder="00:00:00"
                                   value="<?= $activity['TIME_START_ACTIVITY'] ?>"
                                   required>
                        </div>
                    </div>
                    <!-- hora y fecha de fin -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <!-- fecha -->
                            <div class="row">
                                <label for="dateActivityFin"
                                       class="control-label">Fecha de Finalización</label>
                                <input type="date"
                                       id="dateActivityFin"
                                       name="dateActivityFin"
                                       class="form-control datepicker"
                                       placeholder="Fecha finalizacion de la actividad"
                                       value="<?= $activity['DATE_END_ACTIVITY'] ?>"
                                       required>
                            </div>
                        </div>
                        <!-- hora -->
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <label for="timeActivityFin"
                                   class="control-label">Hora de Finalización</label>
                            <input type="time"
                                   id="timeActivityFin"
                                   name="timeActivityFin"
                                   class="form-control timepicker"
                                   placeholder="00:00:00"
                                   value="<?= $activity['TIME_END_ACTIVITY'] ?>"
                                   required>
                        </div>
                    </div>
                    <!-- botones -->
                    <hr>
                    <div class="row">
                        <div class="panel pull-right">
                            <a href="<?= 'activity/panel/'?>"
                               class="btn btn-danger">
                                Cancelar <i class="fa fa-remove"></i>
                            </a>
                            <button type="submit"
                                    onclick="return validForm('form-edit-activity','Modificar','Desea guardar los cambios realizados en la actividad <?=$activity['NAME_ACTIVITY']?>','success')"
                                    class="btn btn-primary"
                                    name="edit">
                                Actualizar <i class="fa fa-refresh"></i>
                            </button>
                        </div>
                    </div>
                </form>
	            <?php }
	            else{ ?>
                <div class="thumbnail">
                    <h4 class="text-center">Actividades no registradas</h4>
                    <img src="img/404/caja-vacia.jpg"
                         class="app-img-5 center-block"
                         alt="No existen datos disponibles">
                </div>
	            <?php } ?>
            </div>
        </div>
    </div>
</section>
