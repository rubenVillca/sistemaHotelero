<section>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Insertar habitación</h3>
        </div>
        <div class="panel-body">
            <div class="app-color-white animated fadeIn col-xs-12 col-sm-12 col-md-8 col-md-offset-4 col-lg-6 col-lg-offset-3">
				<?php if(!empty($listTypeRoom1) || !empty($listTypeRoom2)){ ?>
                <form action="room/insert_dd/"
                      method="post"
                      enctype="multipart/form-data">
                    <!-- Nombre de habitacion -->
                    <div class="row">
                        <label for="nameRoom"
                               class="control-label">Nombre de habitaci&oacute;n</label>
                        <input type="text"
                               id="nameRoom"
                               name="room[nameRoom]"
                               class="form-control"
                               placeholder="Nombre de Habitaci&oacute;n"
                               required>
                    </div>
                    <!-- Tipo de habitacion -->
                    <div class="row">
                        <label for="typeRoom"
                               class="control-label">Tipo de habitaci&oacute;n</label>
                        <select id="typeRoom"
                                name="room[idDetailRoom]"
                                class="form-control"
                                required>
							<?php if(!empty($listTypeRoom1)){ ?>
                            <optgroup label="Habitaciones">
								<?php foreach($listTypeRoom1 as $type){ ?>
                                <option value="<?= $type['ID_ROOM_MODEL'] ?>"><?= $type['NAME_ROOM_MODEL'] ?></option>
								<?php } ?>
                            </optgroup>
							<?php } ?>
							<?php if(!empty($listTypeRoom2)){ ?>
                            <optgroup label="Ambientes">
								<?php foreach($listTypeRoom2 as $type){ ?>
                                <option value="<?= $type['ID_ROOM_MODEL'] ?>"><?= $type['NAME_ROOM_MODEL'] ?></option>
								<?php } ?>
                            </optgroup>
							<?php } ?>
                        </select>
                    </div>
                    <!-- imgen de la habitacion -->
                    <div class="row">
                        <label for="imgAddress"
                               class="control-label">Foto de Habitaci&oacute;n</label>
                        <input type="file"
                               id="imgAddress"
                               name="imgAddress"
                               class="file"
                               data-show-upload="false"
                               data-show-caption="true">
                    </div>
                    <!-- botones -->
                    <hr>
                    <div class="row">
                        <div class="panel pull-right">
                            <a href="room/"
                               class="btn btn-danger">
                                Cancelar <i class="fa fa-remove"></i>
                            </a>
                            <button type="submit"
                                    class="btn btn-primary"
                                    name="insert">
                                Insertar <i class="fa fa-save"></i>
                            </button>
                        </div>
                    </div>
                </form>
				<?php }
				else{ ?>
                <div class="panel">
                    <h4 class="text-center">Primero inserte un tipo de habitación para poder crear una habitación</h4>
                    <img src="img/404/caja-vacia.jpg"
                         class="app-img-5 center-block"
                         alt="No existen datos disponibles">
                    <a href="typeRoom/"
                       class="center-block  btn btn-primary">Tipos de habitaciones</a>
                </div>
				<?php } ?>
            </div>
        </div>
    </div>
</section>