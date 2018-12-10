<div class="app-color-white animated fadeIn">
    <div class="panel">
        <form action="service/insert_dd/"
              method="post"
              class="form-horizontal"
              enctype="multipart/form-data">
            <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                <!-- nombre y tipo -->
                <div class="row">
                    <!-- Nombre del servicio -->
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label for="nameService"
                               class="control-label">Nombre del servicio *</label>
                        <input type="text"
                               id="nameService"
                               name="nameService"
                               class="form-control"
                               placeholder="Nombre del servicio"
                               required>
                    </div>
                    <!--  Habitaciones del servicio -->
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<?php if(!empty($listTypeRoom1) || !empty($listTypeRoom2)){ ?>
                        <label for="listTypeRoom"
                               class="control-label">Ambientes</label>
                        <br>
                        <select name="listTypeRoom[]"
                                id="listTypeRoom"
                                class="form-control"
                                multiple="multiple">
							<?php if(!empty($listTypeRoom1)){ ?>
                            <optgroup label="Habitaciones">
								<?php foreach($listTypeRoom1 as $type){ ?>
                                <option value="<?= $type['ID_ROOM_MODEL']; ?>">
									<?= $type['NAME_ROOM_MODEL']; ?>
                                </option>
								<?php } ?>
                            </optgroup>
							<?php } ?>
							<?php if(!empty($listTypeRoom2)){ ?>
                            <optgroup label="Ambientes">
								<?php foreach($listTypeRoom2 as $type){ ?>
                                <option value="<?= $type['ID_ROOM_MODEL']; ?>">
									<?= $type['NAME_ROOM_MODEL']; ?>
                                </option>
								<?php } ?>
                            </optgroup>
							<?php } ?>
                        </select>
						<?php } ?>
                    </div>
                </div>
                <!-- habitaciones y estado -->
                <div class="row">
                    <!-- Tipo de Servicio -->
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label for="typeService"
                               class="control-label">Tipo de Servicio *</label>
                        <select id="typeService"
                                name="typeService"
                                class='form-control'
                                required>
                            <option value=""></option>
							<?php if(!empty($listType)){
							foreach($listType as $type){ ?>
                            <option value="<?= $type['ID_TYPE_SERVICE']; ?>">
								<?= $type['NAME_TYPE_SERVICE']; ?>
                            </option>
							<?php }
							} ?>
                        </select>
                    </div>
                    <!-- Estado del Servicio -->
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label for="stateService"
                               class="control-label">Estado del servicio *</label><br>
                        <select id="stateService"
                                name="stateService"
                                class='form-control'
                                required>
							<?php if(!empty($listState)){
							foreach($listState as $state){ ?>
                            <option value="<?= $state['ID_STATE_SERVICE']; ?>"> <?= $state['NAME_STATE_SERVICE']; ?></option>
							<?php }
							} ?>
                        </select>
                    </div>
                </div>
                <h3 class="text-center text-primary">Lista de Costos</h3>
                <hr>
                <!-- tabla de costos -->
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Moneda</th>
                                <th>Costos</th>
                                <th>D&iacute;as.</th>
                                <th>Horas.</th>
                                <th>Unidades</th>
                                <th>Puntos. Obtenidos</th>
                                <th>Puntos. Reqeridos</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody id="listCost">
                            <tr>
                                <td>
									<?php if(!empty($listTypeMoney)){ ?>
                                    <select name="cost[0][idTypeMoney]"
                                            id="idTypeMoney"
                                            class="form-control"
                                            title="Tipo de moneda"
                                            required>
										<?php foreach($listTypeMoney as $type){ ?>
                                        <option value="<?= $type['ID_TYPE_MONEY']; ?>"><?= $type['NAME_TYPE_MONEY']; ?></option>
										<?php } ?>
                                    </select>
									<?php } ?>
                                </td>
                                <td>
                                    <input type="number"
                                           step="0.01"
                                           name="cost[0][nCost]"
                                           value="0.00"
                                           min="0"
                                           max="99999"
                                           class="form-control"
                                           title="costo del servicio"
                                           required>
                                </td>
                                <td>
                                    <input type="number"
                                           name="cost[0][nDay]"
                                           value="1"
                                           min="0"
                                           max="99"
                                           class="form-control"
                                           title="Dias"
                                           required>
                                </td>
                                <td>
                                    <input type="number"
                                           name="cost[0][nHour]"
                                           value="0"
                                           min="0"
                                           max="23"
                                           class="form-control"
                                           title="Horas"
                                           required>
                                </td>
                                <td>
                                    <input type="number"
                                           name="cost[0][nUnit]"
                                           min="0"
                                           max="999"
                                           value="1"
                                           title="Unidades del servicio"
                                           class="form-control"
                                           required>
                                </td>
                                <td>
                                    <input type="number"
                                           name="cost[0][pointObtain]"
                                           min="0"
                                           max="99999"
                                           value="0"
                                           class="form-control"
                                           title="Puntos de fidelizacion obtenidos"
                                           required>
                                </td>
                                <td>
                                    <input type="number"
                                           name="cost[0][pointRequired]"
                                           min="0"
                                           max="99999"
                                           value="0"
                                           class="form-control"
                                           title="Puntos de fidelizacion requeridos"
                                           required>
                                </td>
                                <td>
                                    <button type="button"
                                            id="insertCost"
                                            name="insertCost"
                                            class="btn btn-sm btn-primary">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Imagen del servicio -->
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-2 col-lg-2">
                        <label for="reserve"
                               class="control-label">Reservas</label><br>
                        <input type="checkbox"
                               name="reserve"
                               id="reserve"
                               value="1"
                               class="form-control">
                    </div>
                    <div class="col-xs-9 col-sm-9 col-md-10 col-lg-10">
                        <label for="imgAddress"
                               class="control-label">Imagen *</label>
                        <input id="imgAddress"
                               name="imgAddress"
                               type="file"
                               class="file"
                               data-show-upload="false"
                               data-show-caption="true"
                               required>
                    </div>
                </div>
                <!-- Descripcion del servicio -->
                <div class="row">
                    <label for="descr"
                           class="control-label">Descripci&oacute;n *</label>
                    <textarea id="descr"
                              name="descr"
                              class="jqte-test form-control"
                              placeholder="Descripci&oacute;n del Servicio"
                              rows="4"
                              required></textarea>
                </div>
                <!-- botones -->
                <div class="row">
                    <div class="panel pull-right">
                        <a href="service/panel/"
                           class="btn btn-danger">Cancelar <i class="fa fa-remove"></i></a>
                        <button type="submit"
                                class="btn btn-primary"
                                name="btnInsert"
                                id="btnInsert">
                            Guardar <i class="fa fa-save"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    //multiselects
    $(document).ready(function () {
        $('#listTypeRoom').multiselect({
            buttonWidth: '100%',
            dropRight: true
        });
    });
    //todos costo
    $(function () {
        var scntDiv = $('#listCost');
        var i = 0;
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