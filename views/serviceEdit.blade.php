<div class="app-color-white animated fadeIn">
	<?php if(!empty($service)){ ?>
    <form action="service/edit_dd/<?= $service[0]['ID_SERVICE']; ?>"
          method="post"
          id="form-service-edit"
          class="form-horizontal"
          enctype="multipart/form-data">
        <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
            <!-- Nombre del servicio y tipo -->
            <div class="row">
                <!-- nombre -->
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 row">
                    <label for="name"
                           class="control-label">Nombre del servicio</label>
                    <input type="text"
                           id="name"
                           name="name"
                           class="form-control"
                           value="<?= $service[0]['NAME_SERVICE'] ?>"
                           placeholder="Nombre del servicio"
                           required>
                </div>
                <!-- tipos de habitaciones -->
                <div class="col-xs-12 col-md-6 col-md-6 col-lg-6">
					<?php if(!empty($listTypeRoom1) || !empty($listTypeRoom2)){ ?>
                    <label for="listTypeRoom"
                           class="control-label">Tipo de habitaci&oacute;n</label>
                    <select name="listTypeRoom[]"
                            id="listTypeRoom"
                            class="form-control"
                            multiple="multiple"
                            title="Lista de habitaciones">
                        <optgroup label="Habitaciones">
							<?php if(!empty($serviceTypeRoom)){//lista de habitaciones usadas
							foreach($serviceTypeRoom as $item){
							if($item['VALUE_TYPE_ROOM_MODEL'] == 1){//si es habitacion insertar a la lista
							?>
                            <option value="<?= $item['ID_ROOM_MODEL']; ?>"
                                    selected>
								<?= $item['NAME_ROOM_MODEL']; ?>
                            </option>
							<?php }
							}
							} ?>
							<?php if(!empty($listTypeRoom1)){ //LISTA DE TIpos de habitaciones no usadas?>
							<?php foreach($listTypeRoom1 as $type){ ?>
                            <option value="<?= $type['ID_ROOM_MODEL']; ?>">
								<?= $type['NAME_ROOM_MODEL']; ?>
                            </option>
							<?php }
							} ?>
                        </optgroup>
                        <optgroup label="Ambientes">
							<?php if(!empty($listTypeRoom2)){ ?>
							<?php foreach($listTypeRoom2 as $type){
							$select = '';
							if(!empty($serviceTypeRoom)) {
								foreach($serviceTypeRoom as $item) {
									$select = $type['ID_ROOM_MODEL'] == $item['ID_ROOM_MODEL'] ? 'selected' : $select;
								}
							} ?>
                            <option value="<?= $type['ID_ROOM_MODEL']; ?>" <?= $select ?>>
								<?= $type['NAME_ROOM_MODEL']; ?>
                            </option>
							<?php }
							} ?>
                        </optgroup>
                    </select>
					<?php } ?>
                </div>
            </div>
            <!-- Tipo y estado de Servicio -->
            <div class="row">
				<?php if(!empty($listType)){ ?>
                <div class="col-xs-12 col-md-6 col-md-6 col-lg-6 row">
                    <label for="type"
                           class="control-label">Tipo de Servicio</label>
                    <select name="type"
                            id="type"
                            class="form-control"
                            required>
						<?php foreach($listType as $type){ ?>
                        <option value="<?= $type['ID_TYPE_SERVICE']; ?>" <?= $type['ID_TYPE_SERVICE'] == $service[0]['ID_TYPE_SERVICE'] ? 'selected' : ''; ?>>
							<?= $type['NAME_TYPE_SERVICE']; ?>
                        </option>
						<?php } ?>
                    </select>
                </div>
				<?php } ?>
				<?php if(!empty($listState)){ ?>
                <div class="col-xs-12 col-md-6 col-md-6 col-lg-6">
                    <!-- Estado del Servicio -->
                    <label for="state"
                           class="control-label">Estado del servicio</label>
                    <select name="state"
                            id="state"
                            class="form-control"
                            required>
						<?php foreach($listState as $state){ ?>
                        <option value="<?= $state['ID_STATE_SERVICE']; ?>" <?= $state['ID_STATE_SERVICE'] == $service[0]['ID_STATE_SERVICE'] ? 'checked' : ''; ?>>
							<?= $state['NAME_STATE_SERVICE']; ?>
                        </option>
						<?php } ?>
                    </select>
                </div>
				<?php } ?>
            </div>
            <!-- Descripcion del servicio -->
            <div class="row">
                <label for="descr"
                       class="control-label">Descripci&oacute;n</label>
                <textarea id="descr"
                          name="descr"
                          class="jqte-test form-control"
                          placeholder="Descripci&oacute;n del Servicio"
                          rows="4"
                          required><?= $service[0]['DESCRIPTION_SERVICE']; ?></textarea>
            </div>
            <!-- Imagen del servicio  y reserva?-->
            <div class="row">
                <!-- reservas? -->
                <div class="col-xs-3 col-sm-3 col-md-2 col-lg-2 row">
                    <label for="reserve"
                           class="control-label">Reservas</label>
                    <input type="checkbox"
                           id="reserve"
                           name="reserve"
                           value="1"
					       <?= $service[0]['RESERVED_SERVICE'] == 1 ? 'checked' : ''; ?>
                           class="form-control"
                           placeholder="Permitir reserva">
                </div>
                <!-- reservas -->
                <div class="col-xs-9 col-sm-9 col-md-10 col-lg-10">
                    <label for="imgAddress"
                           class="control-label">Imagen</label>
                    <input id="imgAddress"
                           name="imgAddress"
                           type="file"
                           class="file"
                           data-show-upload="false"
                           data-show-caption="true"
                           value="valor">
                </div>
            </div>
            <!-- listas de costos -->
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Moneda</th>
                            <th>Costos</th>
                            <th>D&iacute;as .</th>
                            <th>Horas.</th>
                            <th>Cantidad</th>
                            <th>Puntos Obtenidos</th>
                            <th>Puntos Reqs.</th>
                            <th>Opcion</th>
                        </tr>
                        </thead>
                        <tbody id="listCost">
						<?php
						$i = 0;
						if(!empty($serviceCost)){
						foreach($serviceCost as $cost){ ?>
                        <tr>
                            <td>
								<?php if(!empty($listTypeMoney)){ ?>
                                <select name="cost[<?= $i ?>][idTypeMoney]"
                                        id="idTypeMoney"
                                        class="form-control"
                                        title="Tipo de moneda">
									<?php foreach($listTypeMoney as $type){ ?>
                                    <option value="<?= $type['ID_TYPE_MONEY']; ?>" <?= $cost['ID_TYPE_MONEY'] == $type['ID_TYPE_MONEY'] ? 'selected' : '' ?>>
										<?= $type['NAME_TYPE_MONEY']; ?>
                                    </option>
									<?php } ?>
                                </select>
								<?php } ?>
                            </td>
                            <td>
                                <input type="number"
                                       step="0.01"
                                       name="cost[<?= $i ?>][nCost]"
                                       value="<?= $cost['PRICE_COST_SERVICE'] ?>"
                                       min="0"
                                       max="99999"
                                       class="form-control"
                                       title="costo del servicio"
                                       required>
                            </td>
                            <td>
                                <input type="number"
                                       name="cost[<?= $i; ?>][nDay]"
                                       min="0"
                                       max="99"
                                       value="<?= $cost['UNIT_DAY_COST_SERVICE'] ?>"
                                       class="form-control"
                                       title="Dias"
                                       required>
                            </td>
                            <td>
                                <input type="number"
                                       name="cost[<?= $i ?>][nHour]"
                                       min="0"
                                       max="23"
                                       value="<?= $cost['UNIT_HOUR_COST_SERVICE']; ?>"
                                       class="form-control"
                                       title="Horas"
                                       required>
                            </td>
                            <td>
                                <input type="number"
                                       name="cost[<?= $i; ?>][nUnit]"
                                       min="0"
                                       max="999"
                                       value="<?= $cost['UNIT_COST_SERVICE'] ?>"
                                       title="Unidades del servicio"
                                       class="form-control"
                                       required>
                            </td>
                            <td>
                                <input type="number"
                                       name="cost[<?= $i ?>][pointObtain]"
                                       min="0"
                                       max="99999"
                                       value="<?= $cost['POINT_OBTAIN_COST_SERVICE'] ?>"
                                       class="form-control"
                                       title="Puntos de fidelizacion obtenidos"
                                       required>
                            </td>
                            <td>
                                <input type="number"
                                       name="cost[<?= $i; ?>][pointRequired]"
                                       min="0"
                                       max="99999"
                                       value="<?= $cost['POINT_REQUIRED_COST_SERVICE'] ?>"
                                       class="form-control"
                                       title="Puntos de fidelizacion requeridos"
                                       required>
                            </td>
                            <td>
								<?php if($i < 1){ ?>
                                <button type="button"
                                        id="insertCost"
                                        name="insertCost"
                                        class="btn btn-sm btn-primary">
                                    <i class="fa fa-plus"></i>
                                </button>
								<?php }
								else{ ?>
                                <button type="button"
                                        id="removeCost"
                                        name="removeCost"
                                        class="btn btn-sm btn-danger">
                                    <i class="fa fa-minus"></i>
                                </button>
								<?php } ?>
                            </td>
                        </tr>
						<?php $i++;
						} ?>
						<?php }
						else{
						?>
                        <tr>
                            <td>
								<?php if(!empty($listTypeMoney)){ ?>
                                <select name="cost[<?= $i ?>][idTypeMoney]"
                                        id="idTypeMoney"
                                        class="form-control"
                                        title="Tipo de moneda"
                                        required>
									<?php foreach($listTypeMoney as $type){ ?>
                                    <option value="<?= $type['ID_TYPE_MONEY']; ?>">
										<?= $type['NAME_TYPE_MONEY']; ?>
                                    </option>
									<?php } ?>
                                </select>
								<?php } ?>
                            </td>
                            <td>
                                <input type="number"
                                       step="0.01"
                                       name="cost[<?= $i ?>][nCost]"
                                       value="0"
                                       min="0"
                                       max="99999"
                                       class="form-control"
                                       title="costo del servicio"
                                       required>
                            </td>
                            <td>
                                <input type="number"
                                       name="cost[<?= $i; ?>][nDay]"
                                       min="0"
                                       max="99"
                                       value="0"
                                       class="form-control"
                                       title="Dias"
                                       required>
                            </td>
                            <td>
                                <input type="number"
                                       name="cost[<?= $i ?>][nHour]"
                                       min="0"
                                       max="23"
                                       value="0"
                                       class="form-control"
                                       title="Horas"
                                       required>
                            </td>
                            <td>
                                <input type="number"
                                       name="cost[<?= $i; ?>][nUnit]"
                                       min="0"
                                       max="999"
                                       value="1"
                                       title="Unidades del servicio"
                                       class="form-control"
                                       required>
                            </td>
                            <td>
                                <input type="number"
                                       name="cost[<?= $i ?>][pointObtain]"
                                       min="0"
                                       max="99999"
                                       value="0"
                                       class="form-control"
                                       title="Puntos de fidelizacion obtenidos"
                                       required>
                            </td>
                            <td>
                                <input type="number"
                                       name="cost[<?= $i; ?>][pointRequired]"
                                       min="0"
                                       max="99999"
                                       value="0"
                                       class="form-control"
                                       title="Puntos de fidelizacion requeridos"
                                       required>
                            </td>
                            <td>
								<?php if($i < 1){ ?>
                                <button type="button"
                                        id="insertCost"
                                        name="insertCost"
                                        class="btn btn-sm btn-primary">
                                    <i class="fa fa-plus"></i>
                                </button>
								<?php }
								else{ ?>
                                <button type="button"
                                        id="removeCost"
                                        name="removeCost"
                                        class="btn btn-sm btn-danger">
                                    <i class="fa fa-minus"></i>
                                </button>
								<?php } ?>
                            </td>
                        </tr>
						<?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- botones -->
            <div class="row">
                <div class="panel pull-right">
                    <a href="service/panel/"
                       class="btn btn-danger">Cancelar <i class="fa fa-remove"></i></a>
                    <button type="submit"
                            onclick="return validForm('form-service-edit','Modificar','Desea modificar el serviccio <?=$service[0]['NAME_SERVICE']?>','info')"
                            class="btn btn-primary"
                            name="btnEdit">
                        Guardar <i class="fa fa-save"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>
	<?php }
	else{ ?>
    <div class="thumbnail">
        <h4 class="text-center">Servicio no encontrado</h4>
        <img src="img/404/caja-vacia.jpg"
             class="app-img-5 center-block"
             alt="No existen datos disponibles">
    </div>
	<?php } ?>
</div>
<!-- scripts -->
<script>
    //multiselect
    $(document).ready(function () {
        $('#listTypeRoom').multiselect({
            buttonWidth: '100%',
            dropRight: true
        });
    });
    $(document).ready(function () {
        $('#listMenuFood').multiselect({
            buttonWidth: '100%',
            dropRight: true
        });
    });
    //todos costo
    $(function () {
        var scntDiv = $('#listCost');
        var i = <?=isset($serviceCost) ? count($serviceCost) : 1?>;
        $(document).on('click', '#insertCost', function () {
            i++;
            $('<tr>' +
                '<td>' +
				<?php if(!empty($listTypeMoney)){?>
                    '<select name="cost[' + i + '][idTypeMoney]" id="idTypeMoney" class="form-control" required>' +
				<?php foreach($listTypeMoney as $type) { ?>
                    '<option value="<?= $type['ID_TYPE_MONEY']; ?>"><?= $type['NAME_TYPE_MONEY']?></option>' +
				<?php } ?>
                    '</select>' +
				<?php } ?>
                    '</td>' +
                '<td><input type="number" name="cost[' + i + '][nCost]" step="0.01" min="0" max="99999" value="0.00" class="form-control" required></td>' +
                '<td><input type="number" name="cost[' + i + '][nDay]" min="0" max="99" value="1" class="form-control" required></td>' +
                '<td><input type="number" name="cost[' + i + '][nHour]" min="0" max="23" value="0" class="form-control" required></td>' +
                '<td><input type="number" name="cost[' + i + '][nUnit]" min="0" max="999" value="1" class="form-control" required></td>' +
                '<td><input type="number" name="cost[' + i + '][pointObtain]" min="0" max="999" value="0" class="form-control" required></td>' +
                '<td><input type="number" name="cost[' + i + '][pointRequired]" min="0" max="999" value="0" class="form-control" required></td>' +
                '<td><button type="button" id="removeCost" name="removeCost" class="btn btn-sm btn-danger"><i class="fa fa-minus"></i></button></td>' +
                '</tr>').appendTo(scntDiv);
            return false;
        });
        $(document).on('click', '#removeCost', function () {
            $(this).parents('tr').remove();
            i--;
            return false;
        });
    });
</script>