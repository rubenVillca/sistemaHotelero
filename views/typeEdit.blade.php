<section>
    <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="name_title text-center">
                    <h4 class="modal-title text-center">Editar Tipo <?= $table; ?></h4>
					<?php $tableList = strtoupper($table) ?>
                </div>
            </div>
            <div class="panel-body">
				<?php if(!empty($type)){ ?>
                <form action="type/edit_dd/<?= $type['ID_TYPE_'.$tableList]; ?>/<?= strtolower($table); ?>/"
                      method="post"
                      id="form"
                      class="form-horizontal"
                      enctype="multipart/form-data">
                    <div class="center-block">
                        <label for="nameType"
                               class="control-label">Nombre</label>
                        <input type="text"
                               id="nameType"
                               name="nameType"
                               class="form-control"
                               value="<?= $type['NAME_TYPE_'.$tableList] ?>"
                               placeholder="Nombre del tipo"
                               required>
                        <label for="descrType"
                               class="control-label">Descripci&oacute;n</label>
                        <textarea id="descrType"
                                  name="descrType"
                                  class="jqte-test form-control"
                                  placeholder="Descripci&oacute;n del tipo"
                                  rows="2"
                                  required><?= $type['DESCRIPTION_TYPE_'.$tableList] ?></textarea>
                        <label for="imgAddress"
                               class="control-label">Imagen del tipo</label>
                        <input type="file"
                               id="imgAddress"
                               name="imgAddress"
                               class="file"
                               data-show-upload="false"
                               data-show-caption="true">
                        <label for="active"
                               class="control-label">Activo</label><br>
                        <input type="radio"
                               id="active"
                               name="active"
                               value="1" <?= $type['VALUE_TYPE_'.$tableList] ? 'checked' : ''; ?>
                               required> Activo
                        <input type="radio"
                               id="active"
                               name="active"
                               value="0" <?= $type['VALUE_TYPE_'.$tableList] ? '' : 'checked'; ?> > No activo
                    </div>
                    <!-- botones -->
                    <div class="pull-right">
                        <a href="type/list/<?= $table; ?>"
                           class="btn btn-danger">
                            <i class="fa fa-remove"></i> Cancelar
                        </a>
                        <button type="submit"
                                class="btn btn-primary"
                                name="edit"
                                onclick="return validForm('form','¿Desea Actualizar?','Los cambios se guardaran en el sistema','success')">
                            <i class="fa fa-refresh"></i> Guardar
                        </button>
                    </div>
                </form>
				<?php }
				else{ ?>
                <div class="thumbnail">
                    <img src="img/404/caja-vacia.jpg"
                         class="app-img-5 center-block"
                         alt="No existen datos disponibles">
                    <h4 class="text-center">Tipo de <?= $tableList ?> no encontrado</h4>
                </div>
				<?php } ?>
            </div>
        </div>
    </div>
</section>
