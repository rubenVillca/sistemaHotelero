<!-- lista de preguntas respondidas -->
<section>
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-offset-2 col-lg-8 col-lg-offset-2 app-color-white">
	<?php if(!empty($questionContainer) && $questionContainer[0]['ID_INQUEST'] > 0){ ?>
    <!-- lista de preguntas disponibles -->
        <div class="panel panel-primary">
            <!-- titulo -->
            <div class='panel-heading'>
                <h3 class='text-center text-capitalize'><?= $questionContainer[0]['NAME_INQUEST']; ?></h3>
            </div>
            <!-- descipcion de la encuesta -->
            <div class="panel-body">
                <p class='text-justify text-capitalize'><?= Helper::camelUpperCase($questionContainer[0]['DESCRIPTION_INQUEST']); ?></p>
            </div>
            <!-- lista de preguntas -->
            <div class="control-list panel-body">
                <ol class="list-group">
					<?php $i = 0;
					foreach($questionContainer as $question){ ?>
                    <li class="list-group-item">
                        <!-- pregunta y respuesta -->
                        <p>
                            <b class="text-justify">
								<?= $i+1; ?>.- <?= Helper::camelUpperCase($question['DESCRIPTION_QUESTION']); ?>
                            </b>
                        </p><!-- pregunta -->
                        <h5 class="text-primary">
                            Estado: <?= $question['ACTIVE_QUESTION'] == 1 ? 'Visible' : 'No visible'?></h5>
                        <p class="text-justify"><?= Helper::camelUpperCase($question['DESCRIPTION_RESPONSE']); ?></p>
                        <!-- respuesta -->
                        <!-- botones para realizar una accion -->
                        <div class="pull-right">
                            <button type='button'
                                    value='<?= $question['ID_QUESTION'] ?>'
                                    name='edit'
                                    class='btn btn-xs btn-info'
                                    data-toggle="modal"
                                    data-target="#modalEdit-<?= $i; ?>">
                                <span class='glyphicon glyphicon-edit'></span>
                            </button>
                            <a href="frequently/delete_dd/<?= $question['ID_INQUEST'] ?>/<?= $question['ID_QUESTION'] ?>"
                               onclick="return validLink('frequently/delete_dd/<?= $question['ID_INQUEST'] ?>/<?= $question['ID_QUESTION'] ?>','Eliminar','¿Desea eliminar la pregunta?','warning')"
                               class='btn btn-xs btn-danger'>
                                <span class='glyphicon glyphicon-remove'></span>
                            </a>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                    <!-- MODAL para editar pregunta -->
                    <div id="modalEdit-<?= $i++ ?>"
                         class="modal fade"
                         role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <!-- titulo -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title text-center">Preguntas Frecuentes</h4>
                                </div>
                                <form action="<?= 'frequently/edit/'.$question['ID_INQUEST'].'/'.$question['ID_QUESTION']?>"
                                      method="post"
                                      role="form"
                                      id="form-<?= $question['ID_QUESTION'] ?>"
                                      enctype="multipart/form-data">
                                    <!-- pregunta a editar -->
                                    <div class="modal-body">
                                        <!-- pregunta -->
                                        <label class="control-label" for="pregunta">Pregunta</label>
                                        <input type="text"
                                               name="pregunta"
                                               id="pregunta"
                                               value="<?= Helper::camelUpperCase($question['DESCRIPTION_QUESTION']) ?>"
                                               class="form-control"
                                               required>
                                        <!-- respuesta -->
                                        <label class="control-label" for="respuesta">Respuesta</label>
                                        <textarea name="respuesta"
                                                  id="respuesta"
                                                  class="jqte-test form-control"
                                                  rows="5"
                                                  required><?= Helper::camelUpperCase($question['DESCRIPTION_RESPONSE']); ?></textarea>
                                        <!-- estado -->
                                        <label for="stateQuestion">Estado</label>
                                        <div class="radio">
                                            <label><input type="radio" name="stateQuestion"
											              <?= $question['ACTIVE_QUESTION'] == 1 ? 'checked' : ''?> value="1">Activo</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="stateQuestion"
											              <?= $question['ACTIVE_QUESTION'] == 0 ? 'checked' : ''?> value="0">No
                                                Activo</label>
                                        </div>
                                    </div>
                                    <!-- botonoes para ccionar -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                                            <i class="fa fa-close"></i> Cerrar
                                        </button>
                                        <button type="submit"
                                                name="edit"
                                                onclick="return validForm('form-<?= $question['ID_QUESTION'] ?>','Actualizar Cambios?','Desea gauardar los cambios hechos en la pregunta','success')"
                                                id="edit"
                                                class="btn btn-primary">
                                            <i class="fa fa-save"></i> Guardar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
					<?php } ?>
                </ol>
            </div>
        </div>
	<?php }
	else{ ?>
    <!-- si no existe preguntas disponibles -->
        <h4 class="text-center animated zoomIn">No existen preguntas disponibles</h4>
        <img src="img/404/caja-vacia.jpg" class="app-img-5 center-block" alt="No existen datos disponibles">
	<?php } ?>
    <!-- boton para agregar nueva pregunta -->
        <div class="panel">
            <button type="button"
                    name="btnAddQuestion"
                    data-toggle="modal"
                    data-target="#modalInsert"
                    class="btn btn-primary btn-block">
                <i class="fa fa-plus"></i> Agregar
            </button>
        </div>
    </div>
</section>
<!-- modal para agregar -->
<div id="modalInsert" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button"
                        class="close"
                        data-dismiss="modal">&times;
                </button>
                <h4 class="modal-title text-center">Preguntas Frecuentes</h4>
            </div>
            <form action="<?= 'frequently/insert/'?>"
                  method="post"
                  role="form"
                  enctype="multipart/form-data">
                <div class="modal-body">
                    <!-- pregunta -->
                    <label class="control-label"
                           for="pregunta">Pregunta</label>
                    <input type="text"
                           name="pregunta"
                           id="pregunta"
                           class="form-control"
                           required>
                    <!-- respuesta -->
                    <label class="control-label"
                           for="respuesta">Respuesta</label>
                    <textarea name="respuesta"
                              id="respuesta"
                              class="jqte-test form-control"
                              rows="5"
                              required></textarea>
                    <!-- estado -->
                    <label for="stateQuestion">Visible</label>
                    <div class="onoffswitch">
                        <input type="checkbox" name="stateQuestion" class="onoffswitch-checkbox" id="myonoffswitch"
                               checked>
                        <label class="onoffswitch-label" for="myonoffswitch">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-danger"
                            data-dismiss="modal">
                        <i class="fa fa-close"></i> Cerrar
                    </button>
                    <button type="submit"
                            name="btnAddQuestion"
                            id="agregar"
                            class="btn btn-primary">
                        <i class="fa fa-save"></i> Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
