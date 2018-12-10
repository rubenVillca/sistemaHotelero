<!-- lista de habitaciones -->
<section>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">Tipos de habitaciones</h4>
        </div>
		<?php if(!empty($listType)) { ?>
        <!-- contenido -->
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="bg-success">
                    <tr>
                        <th>Nro</th>
                        <th class="hidden-md hidden-sm">Imagen</th>
                        <th>Nombre</th>
                        <th>descripci&oacute;n</th>
                        <th>Persona(s)</th>
                        <th class="hidden-md hidden-sm">Estado</th>
                        <th>Tipo</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php $i = 1;
					foreach($listType as $type) {?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><img src="<?= $type['IMAGE_ROOM_MODEL'] ?>"
                                 alt="Imegen no encontrada"
                                 class="app-img-1"></td>
                        <td><?= $type['NAME_ROOM_MODEL'] ?></td>
                        <td><?= Helper::camelUpperCase($type['DESCRIPTION_ROOM_MODEL']) ?></td>
                        <td><?= $type['UNIT_ADULT_ROOM_MODEL'] ?> Adultos<br>
							<?= $type['UNIT_BOY_ROOM_MODEL'] ?> Niños
                        </td>
                        <td class="hidden-md"><i
                                    class="fa fa-<?= $type['VALUE_TYPE_ROOM_MODEL'] ? 'check' : 'remove' ?>"></i></td>
                        <td><?= $type['VALUE_TYPE_ROOM_MODEL'] == 1 ? 'Habitacion' : ($type['VALUE_TYPE_ROOM_MODEL'] == 2 ? 'Ambiente' : 'Desactivado') ?></td>
                        <td>
                            <a href="typeRoom/edit/<?= $type['ID_ROOM_MODEL'] ?>"
                               class="btn btn-xs btn-primary">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="typeRoom/delete_dd/<?= $type['ID_ROOM_MODEL'] ?>"
                               onclick="return validLink('typeRoom/delete_dd/<?= $type['ID_ROOM_MODEL'] ?>','Eliminar','Eliminar el tipo de habitacion <?=$type['NAME_ROOM_MODEL']?>','error')"
                               class="btn btn-xs btn-danger">
                                <i class="fa fa-remove"></i>
                            </a>
                        </td>
                    </tr>
					<?php } ?>
                    </tbody>
                </table>
            </div>
			<?php } else { ?>
            <img src="img/404/caja-vacia.jpg" class="app-img-5 center-block" alt="No existen datos disponibles">
            <h4 class="text-center">Ingrese un tipo de habitación</h4>
		<?php } ?>
        <!-- boton anadir room -->
            <div class="content">
                <button type="button"
                        class="btn btn-primary btn-block"
                        name="insertType"
                        data-toggle="modal"
                        data-target="#modalInsert">
                    A&ntilde;adir <span class="fa fa-plus"></span>
                </button>
            </div>
        </div>

    <!-- Modal insertar nuevo tipo -->
    <div id="modalInsert" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center">A&ntilde;adir tipo</h4>
                </div>
                <form action="typeRoom/insert/" method="post" role="form" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="nameTypeTable">Nombre</label>
                                <input type="text"
                                       class="form-control"
                                       name="nameTypeTable"
                                       id="nameTypeTable"
                                       placeholder="Nombre del tipo"
                                       required>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="descrType">Descripci&oacute;n</label>
                                <textarea class="jqte-test form-control"
                                          name="descrType"
                                          id="descrType"
                                          placeholder="Descripci&oacute;n del tipo"
                                          rows="3"
                                          required></textarea>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <label for="nAdult" class="col-xs-12 col-sm-6 col-md-6 col-lg-6">Personas</label>
                                <input type="number"
                                       class="form-control"
                                       name="nAdult"
                                       id="nAdult"
                                       min="0"
                                       max="999"
                                       value="1"
                                       required>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <label for="nBoy">Niños</label>
                                <input type="number"
                                       class="form-control"
                                       name="nBoy"
                                       id="nBoy"
                                       min="0"
                                       max="999"
                                       value="0"
                                       required>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="imgAddress" class="control-label">Imagen del tipo</label>
                                <input type="file" id="imgAddress" name="imgAddress" class="file" data-show-upload="false"
                                       data-show-caption="true" required>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="active" class="control-label">Activo:</label><br>
                                <input type="radio" id="active" name="active" value="1" checked required> Habitación |
                                <input type="radio" id="active" name="active" value="2" checked required> Otros ambientes |
                                <input type="radio" id="active" name="active" value="0"> No activo
                            </div>
                        </div>
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
</section>


