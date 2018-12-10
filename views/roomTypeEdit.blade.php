<section>
    <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 app-color-white">
		<?php if (!empty($type) && is_array($type)){?>
        <div class="panel-primary">
            <div class="panel-heading row">
                <h4 class="panel-title">Hu&eacute;spedes registrados</h4>
            </div>
            <form action="typeRoom/edit_dd/<?= $type['ID_ROOM_MODEL']; ?>"
                  method="post"
                  id="edit-room-model"
                  class="form-horizontal"
                  enctype="multipart/form-data">
                <div class="center-block">
                    <label for="nameTypeTable"
                           class="control-label">Nombre</label>
                    <input type="text"
                           id="nameTypeTable"
                           name="nameTypeTable"
                           class="form-control"
                           value="<?= $type['NAME_ROOM_MODEL'] ?>"
                           placeholder="Nombre del tipo"
                           required>
                    <label for="descrType"
                           class="control-label">Descripci&oacute;n</label>
                    <textarea id="descrType"
                              name="descrType"
                              class="jqte-test form-control"
                              placeholder="Descripci&oacute;n del tipo"
                              rows="3"
                              required><?= $type['DESCRIPTION_ROOM_MODEL'] ?></textarea>
                    <label for="nAdult"
                           class="control-label">Personas</label>
                    <input type="number"
                           id="nAdult"
                           name="nAdult"
                           class="form-control"
                           value="<?= $type['UNIT_ADULT_ROOM_MODEL'] ?>"
                           min="0"
                           max="999">
                    <label for="nBoy"
                           class="control-label">Niños</label>
                    <input type="number"
                           id="nBoy"
                           name="nBoy"
                           class="form-control"
                           value="<?= $type['UNIT_BOY_ROOM_MODEL'] ?>"
                           min="0"
                           max="999">
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
                           value="1" <?= $type['VALUE_TYPE_ROOM_MODEL'] == 1 ? 'checked' : ''; ?>
                           required> Habitación |
                    <input type="radio"
                           id="active"
                           name="active"
                           value="2" <?= $type['VALUE_TYPE_ROOM_MODEL'] == 2 ? 'checked' : ''; ?>> Ambiente |
                    <input type="radio"
                           id="active"
                           name="active"
                           value="0" <?= $type['VALUE_TYPE_ROOM_MODEL'] == 0 ? 'checked' : ''; ?> > No activo
                </div>
                <div class="pull-right panel">
                    <button type="submit"
                            onclick="return validForm('edit-room-model','Actualizar','Desea Modificar el modelo de la habitacion?','warning')"
                            class="btn btn-primary"
                            name="edit">
                        Guardar <i class="fa fa-save"></i>
                    </button>
                    <a href="typeRoom/edit"
                       class="btn btn-danger">Cancelar <i class="fa fa-remove"></i></a>
                </div>
            </form>
        </div>
		<?php }?>
    </div>
</section>
