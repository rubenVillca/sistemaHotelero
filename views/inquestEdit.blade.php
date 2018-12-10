<div class="app-color-white animated fadeIn col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <label for="" class="panel-title">Crear Encuesta</label>
        </div>
        <div class="panel-body">
            <form action="inquest/<?= empty($inquest) ? 'insert_dd/' : 'edit_dd/'.$inquest['ID_INQUEST'] ?>"
                  method="post"
                  id="form-edit-inquest"
                  class="form-horizontal"
                  enctype="multipart/form-data"
                  role="form">
                <!-- Nombre de la encuesta -->
                <div class="form-group">
                    <label for="nameInquest" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 control-label">
                        Nombre*
                    </label>
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
                        <input type="text"
                               id="nameInquest"
                               name="nameInquest"
                               class="form-control"
                               placeholder="Nombre de la encuesta"
                               value="<?= empty($inquest) ? '' : $inquest['NAME_INQUEST'] ?>"
                               required>
                    </div>
                </div>
                <!-- Estado de la encuesta -->
                <div class="form-group">
                    <label for="stateInquest" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 control-label">
                        Estado*
                    </label>
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
                        <select id="stateInquest"
                                name="stateInquest"
                                class='form-control'
                                required>
							<?php if(!empty($listState)){
							foreach($listState as $state){ ?>
                            <option value="<?= $state['ID_STATE_INQUEST']; ?>"
							<?= $state['ID_STATE_INQUEST'] == (empty($inquest) ? '-1' : $inquest['ID_STATE_INQUEST']) ? 'selected' : '' ?>>
								<?= $state['NAME_STATE_INQUEST']; ?>
                            </option>
							<?php }
							} ?>
                        </select>
                    </div>
                </div>
                <!-- hora,fecha inicio-->
                <div class="form-group">
                    <label for="dateIni" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 control-label">Inicio*</label>
                    <div class="col-xs-6 col-sm-4 col-md-5 col-lg-5">
                        <input type="date"
                               id="dateIni"
                               name="dateIni"
                               class="form-control datepicker"
                               value="<?= empty($inquest) ? '' : $inquest['DATE_START_INQUEST'] ?>"
                               required>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
                        <input type="time"
                               id="timeIni"
                               name="timeIni"
                               title="hora de inicio de la encuesta"
                               class="form-control timepicker"
                               value="<?= empty($inquest) ? '' : $inquest['TIME_START_INQUEST'] ?>"
                               required>
                    </div>
                </div>
                <!-- hora,fecha fin -->
                <div class="form-group">
                    <label for="dateFin" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 control-label">Fin</label>
                    <div class="col-xs-6 col-sm-4 col-md-5 col-lg-5">
                        <input type="date"
                               id="dateFin"
                               name="dateFin"
                               class="form-control datepicker"
                               value="<?= empty($inquest) ? '' : $inquest['DATE_END_INQUEST'] ?>"
                               required>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
                        <input type="time"
                               id="dateFin"
                               name="timeFin"
                               class="form-control timepicker"
                               value="<?= empty($inquest) ? '' : $inquest['TIME_END_INQUEST'] ?>"
                               required>
                    </div>
                </div>
                <!-- Descripcion del Encuesta -->
                <div class="form-group">
                    <label for="descr" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 control-label">
                        Descripci&oacute;n*
                    </label>
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
                        <textarea id="descr"
                                  name="descr"
                                  class="jqte-test form-control"
                                  placeholder="Descripci&oacute;n de la Encuesta"
                                  rows="5"
                                  required><?= empty($inquest) ? '' : $inquest['DESCRIPTION_INQUEST'] ?></textarea>
                    </div>
                </div>
                <!-- lista de preguntas -->
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Pregunta</th>
                            <th>Estado</th>
                            <th>Opcion</th>
                        </tr>
                        </thead>
                        <tbody id="listQuestion">
						<?php if(!empty($listQuestionActive)){
						$i = 0;
						foreach($listQuestionActive as $question){?>
                        <tr>
                            <td>
                                <input type="text"
                                       name="question[<?= $i ?>][id]"
                                       value="<?= $question['ID_QUESTION'] ?>"
                                       title="id"
                                       class="form-control hidden"
                                       hidden>
                                <textarea name="question[<?= $i ?>][name]"
                                          title="Pregunta"
                                          class="form-control"><?= $question['DESCRIPTION_QUESTION'] ?></textarea>
                            </td>
                            <td>
                                <select name="question[<?= $i ?>][state]"
                                        class="form-control"
                                        title="Estado de la pregunta">
                                    <option value="2" <?= $question['ACTIVE_QUESTION'] == 2 ? 'selected' : '' ?>>
                                        Seleccion
                                    </option>
                                    <option value="1" <?= $question['ACTIVE_QUESTION'] == 1 ? 'selected' : '' ?>>
                                        Activo
                                    </option>
                                    <option value="0" <?= $question['ACTIVE_QUESTION'] == 0 ? 'selected' : '' ?>>
                                        Desactivado
                                    </option>
                                </select>
                            </td>
                            <td>
								<?php if($i == 0){ ?>
                                <button type="button"
                                        id="insertQuestion"
                                        name="insertQuestion"
                                        class="btn btn-sm btn-primary">
                                    <i class="fa fa-plus"></i>
                                </button>
								<?php }
								else{ ?>
                                <button type="button"
                                        id="removeQuestion"
                                        name="removeQuestion"
                                        class="btn btn-sm btn-danger">
                                    <i class="fa fa-minus"></i>
                                </button>
								<?php }
								$i++;
								?>
                            </td>
                        </tr>
						<?php }
						}
						else{ ?>
                        <tr>
                            <td>
                                <input type="text"
                                       name="question[0][id]"
                                       class="form-control hidden"
                                       title="id de la pregunta"
                                       hidden>
                                <input type="text"
                                       name="question[0][name]"
                                       title="Pregunta"
                                       class="form-control">
                            </td>
                            <td>
                                <select name="question[0][state]"
                                        class="form-control"
                                        title="Estado de la pregunta">
                                    <option value="2">Seleccion</option>
                                    <option value="1">Activo</option>
                                    <option value="0">Desactivado</option>
                                </select>
                            </td>
                            <td>
                                <button type="button"
                                        id="insertQuestion"
                                        name="insertCost"
                                        class="btn btn-sm btn-primary">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </td>
                        </tr>
						<?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- botones -->
                <div class="control-group">
                    <div class="panel pull-right">
                        <a href="inquest/panel/"
                           class="btn btn-danger">Cancelar <i class="fa fa-remove"></i></a>
                        <button type="submit"
                                onclick="return validForm('form-edit-inquest','Modificar','Desea guardas los cambios en la encuesta <?=$inquest['NAME_INQUEST']?>','success')"
                                class="btn btn-primary"
                                name="btnInsert"
                                id="btnInsert">
                            Guardar <i class="fa fa-save"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(function () {
        var scntDiv = $('#listQuestion');
        var i = '<?=isset($listQuestionActive) ? count($listQuestionActive) : 1?>';
        $(document).on('click', '#insertQuestion', function () {
            i++;
            $('<tr>' +
                '<td><input type="text" name="question[' + i + '][name]" class="form-control" required></td>' +
                '<td>' +
                '<select name="question[' + i + '][state]" class="form-control" title="Estado de la pregunta">' +
                '<option value="2">Seleccion</option>' +
                '<option value="1">Activo</option>' +
                '<option value="0">Desactivado</option>' +
                '</select>' +
                '</td>' +
                '<td><button type="button" id="removeQuestion" name="removeQuestion" class="btn btn-sm btn-danger"><i class="fa fa-minus"></i></button></td>' +
                '</tr>').appendTo(scntDiv);
            return false;
        });
        $(document).on('click', '#removeQuestion', function () {
            $(this).parents('tr').remove();
            i--;
            return false;
        });
    });
</script>