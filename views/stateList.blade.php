<!-- lista de stados -->
<section>
    <div class="panel panel-primary">
        <!-- titulo -->
        <div class="panel-heading">
            <div class="name_title text-center">
                <b>Estados de <?=$table;?></b>
				<?php $tableState = isset($table) ? strtoupper($table) : ''; ?>
            </div>
        </div>
        <!-- lista de estado -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="bg-success">
                    <tr>
                        <th>Nro</th>
                        <th>Nombre</th>
                        <th>descripci&oacute;n</th>
                        <th class="hidden-xs hidden-md">Estado</th>
                        <th>Acción</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php if(!empty($listState)) {
					$i = 1;
					foreach($listState as $state) { ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $state['NAME_STATE_'.$tableState] ?></td>
                        <td><?= Helper::camelUpperCase($state['DESCRIPTION_STATE_'.$tableState]) ?></td>
                        <td class="hidden-xs hidden-md"><?= $state['VALUE_STATE_'.$tableState] ? 'Activo' : 'No activo'; ?></td>
                        <td>
                            <div class="btn-block">
                                <!-- boton editar -->
                                <button type="button"
                                        class="btn btn-primary btn-xs"
                                        name="edit"
                                        data-toggle="modal"
                                        data-target="#modalEdit-<?= $state['ID_STATE_'.$tableState] ?>"
                                        value="<?= $state['ID_STATE_'.$tableState] ?>">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <!-- boton eliminar -->
                                <a href="state/delete_dd/<?= $state['ID_STATE_'.$tableState]; ?>/<?= strtolower($table) ?>"
                                   onclick="return validLink('state/delete_dd/<?= $state['ID_STATE_'.$tableState]; ?>/<?= strtolower($table) ?>',
                                           'Eliminar estado: <?= $tableState?>',
                                           'Desea eliminar la el objeto <?= $state['NAME_STATE_'.$tableState]; ?>',
                                           'error')"
                                   class="btn btn-danger btn-xs">
                                    <i class="fa fa-remove"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <!-- Modal editar Estado-->
                    <div id="modalEdit-<?= $state['ID_STATE_'.$tableState] ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title text-center">Editar estado <?= $tableState ?></h4>
                                </div>
                                <form action="state/edit_dd/<?= $state['ID_STATE_'.$tableState]; ?>/<?= $table ?>"
                                      method="post"
                                      class="form-horizontal"
                                      enctype="multipart/form-data"
                                      role="form">
                                    <div class="modal-body">
                                        <!-- nombre -->
                                        <label for="nameState-<?= $state['ID_STATE_'.$tableState]; ?>"
                                               class="control-label">Nombre</label>
                                        <input type="text"
                                               id="nameState-<?= $state['ID_STATE_'.$tableState]; ?>"
                                               name="nameState"
                                               class="form-control"
                                               value="<?= $state['NAME_STATE_'.$tableState] ?>"
                                               placeholder="Nombre del estado"
                                               required>
                                        <!-- descripcion -->
                                        <label for="descrState--<?= $state['ID_STATE_'.$tableState]; ?>"
                                               class="control-label">Descripci&oacute;n</label>
                                        <textarea id="descrState-<?= $state['ID_STATE_'.$tableState]; ?>"
                                                  name="descrState"
                                                  class="form-control"
                                                  placeholder="Descripci&oacute;n del estado"
                                                  rows="3"
                                                  required><?= $state['DESCRIPTION_STATE_'.$tableState] ?></textarea>
                                        <!-- estado -->
                                        <label for="active" class="control-label">Activo</label><br>
                                        <input type="radio"
                                               id="active"
                                               name="active"
                                               value="1" <?= $state['VALUE_STATE_'.$tableState] ? 'checked' : ''; ?>
                                               required> Activo
                                        <input type="radio"
                                               id="active"
                                               name="active"
                                               value="0" <?= $state['VALUE_STATE_'.$tableState] ? '' : 'checked'; ?> >
                                        No activo
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="edit">
                                            <i class="fa fa-save"></i> Guardar
                                        </button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                                            <i class="fa fa-remove"></i> Cerrar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
					<?php }
					} else { ?>
                    <!-- cuando no hay stados -->
                    <tr>
                        <td colspan="5" class="hidden-xs hidden-sm">
                            <div class="center-block col-xs-12 col-sm-12 col-md-12 col-lg-6 col-lg-push-3 thumbnail">
                                <img src="img/404/caja-vacia.jpg" class="app-img-5 center-block"
                                     alt="imagen no disponibles">
                                <h4 class="text-center"><b>No existen tipos de <?=$tableState;?> registrados</b></h4>
                            </div>
                        </td>
                    </tr>
					<?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- botones de anadir y atras -->
            <div class="pull-right">
                <a href='settings/' class="btn btn-danger"><i class="fa fa-close"></i> Atras</a>
                <button type="button"
                        class="btn btn-primary"
                        name="insertState"
                        data-toggle="modal"
                        data-target="#modalInsert">
                    <span class="fa fa-save"></span> A&ntilde;adir
                </button>
            </div>
        </div>
    </div>
</section>
<!-- Modal insertar nuevo Estado -->
<div id="modalInsert" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">A&ntilde;adir nuevo estado</h4>
            </div>

            <form action="state/insert/<?= strtolower($table) ?>" method="post" role="form">
                <div class="modal-body">
                    <label for="nameState">Nombre del estado</label>
                    <input type="text"
                           class="form-control"
                           name="nameState"
                           id="nameState"
                           placeholder="Nombre del estado"
                           required>
                    <label for="descrState">Descripci&oacute;n de tipo</label>
                    <textarea class="form-control"
                              name="descrState"
                              id="descrState"
                              placeholder="Descripci&oacute;n del Estado"
                              rows="3"
                              required></textarea>
                    <label for="active" class="control-label">Activo:</label>
                    <input type="radio" id="active" name="active" value="1" checked required> Activo
                    <input type="radio" id="active" name="active" value="0"> No activo
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="insert" id="insert">
                        <i class="fa fa-plus"></i> Insertar
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fa fa-close"></i> Cerrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>