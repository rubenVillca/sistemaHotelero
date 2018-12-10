<section>
    <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
        <div class="panel panel-primary">
		<?php if(!empty($room)) {?>
        <!-- titulo -->
            <div class="panel-heading">
                <div class="name_title text-center">
                    <h4 class="modal-title text-center">Editar detalles de habitaci&oacute;n</h4>
                </div>
            </div>
            <!-- datos de habitacion -->
            <div class="panel-body">
                <form action="room/edit_dd/<?= $room['ID_ROOM'] ?>"
                      method="post"
                      id="room-edit"
                      class="form-horizontal"
                      enctype="multipart/form-data">
                    <!-- inputs -->
                    <div class="center-block">
                        <!-- nommbre de la habitacion -->
                        <label for="nameTypeTable" class="control-label">Nombre</label>
                        <input type="text"
                               id="nameRoom"
                               name="nameRoom"
                               class="form-control"
                               value="<?= $room['NAME_ROOM'] ?>"
                               placeholder="Nombre del tipo"
                               required>
                        <!-- tipo de habitacion -->
                        <label for="idTypeRoom">Tipo de habitación</label>
                        <select name="idTypeRoom" id="idTypeRoom" class="form-control">
							<?php if(!empty($listTypeRoom1)) { ?>
                            <optgroup label="Habitaciones">
								<?php foreach($listTypeRoom1 as $type) { ?>
                                <option value="<?= $type['ID_ROOM_MODEL'] ?>" <?= $room['ID_ROOM_MODEL'] == $type['ID_ROOM_MODEL'] ? 'selected' : '' ?>>
									<?= $type['NAME_ROOM_MODEL'] ?>
                                </option>
								<?php } ?>
                            </optgroup>
							<?php } ?>
							<?php if(!empty($listTypeRoom2)) { ?>
                            <optgroup label="Ambientes">
								<?php foreach($listTypeRoom2 as $type) { ?>
                                <option value="<?= $type['ID_ROOM_MODEL'] ?>" <?= $room['ID_ROOM_MODEL'] == $type['ID_ROOM_MODEL'] ? 'selected' : '' ?>>
									<?= $type['NAME_ROOM_MODEL'] ?>
                                </option>
								<?php } ?>
                            </optgroup>
							<?php } ?>
                        </select>
                        <!-- foto de la habitacion -->
                        <label for="imgAddress" class="control-label">Imagen de la habitación</label>
                        <input type="file" id="imgAddress" name="imgAddress" class="file" data-show-upload="false"
                               data-show-caption="true">
                        <!-- estado de la habitacion -->
                        <label for="state" class="control-label">Activo</label><br>
                        <input type="radio"
                               id="state"
                               name="state"
                               value="1" <?= $room['STATE_ROOM'] ? 'checked' : ''; ?>
                               required>
                        Activo
                        <input type="radio" id="state" name="state"
                               value="0" <?= $room['STATE_ROOM'] ? '' : 'checked'; ?> > No
                        activo
                    </div>
                    <!-- botones -->
                    <div class="pull-right">
                        <a href="room/panel/" class="btn btn-danger">Cancelar <i class="fa fa-remove"></i></a>
                        <button type="submit" name="edit"
                                onclick="return validForm('room-edit','Modificar','Desea guardar los cambios hechos a la habitacion <?=$room['NAME_ROOM']?>?','info')"
                                class="btn btn-primary">
                            Actualizar <i class="fa fa-edit"></i>
                        </button>
                    </div>
                </form>
            </div>
			<?php }else{?>
            <h4 class="text-center">Habitacion no encontrada</h4>
            <img src="img/404/caja-vacia.jpg" class="app-img-5 center-block" alt="No existen datos disponibles">
			<?php } ?>
        </div>
    </div>
</section>