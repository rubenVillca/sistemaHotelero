<section>
    <div class="app-color-white animated fadeIn">
		<?php if(!empty($food)){ ?>
        <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 app-color-white panel panel-default">
            <div class="panel-body">
                <form action="<?= 'food/edit_dd/' . $food[0]['ID_FOOD'] ?>"
                      method="post"
                      enctype="multipart/form-data"
                      id="formFood"
                      name="formFood">
                    <!-- imagen-->
                    <div class="row">
                        <img src="<?= $food[0]['IMAGE_FOOD'] ?>" alt="" class="app-img-3 img-circle center-block">
                    </div>
                    <!-- name-->
                    <div class="row">
                        <label for="nameFood" class="control-label">Nombre de la comida</label>
                        <input type="text"
                               id="nameFood"
                               name="nameFood"
                               class="form-control"
                               value="<?= $food[0]['NAME_FOOD']; ?>"
                               required>
                    </div>
                    <!-- descripcion-->
                    <div class="row">
                        <label for="descrFood" class="control-label">Descripci&oacute;n</label>
                        <textarea name="descrFood"
                                  id="descrFood"
                                  class="jqte-test form-control"
                                  rows="5"
                                  required><?= $food[0]['DESCRIPTION_FOOD']; ?></textarea>
                    </div>
                    <!-- estsdo -->
					<?php if(!empty($listState)){ ?>
                    <div class="row">
                        <label for="idState" class="control-label">Estado</label>
                        <select id="idState" name="idState" class="form-control" required>
							<?php foreach($listState as $state){ ?>
                            <option value="<?= $state['ID_STATE_FOOD'] ?>" <?= $food[0]['ID_STATE_FOOD'] == $state['ID_STATE_FOOD'] ?
								'selected' : '' ?>>
								<?= $state['NAME_STATE_FOOD'] ?>
                            </option>
							<?php } ?>
                        </select>
                    </div>
					<?php } ?>
                <!-- tipo -->
					<?php if(!empty($listType)){ ?>
                    <div class="row">
                        <label for="idType" class="control-label">Tipo</label>
                        <select id="idType" name="idType" class="form-control" required>
							<?php foreach($listType as $type){ ?>
                            <option value="<?= $type['ID_TYPE_FOOD'] ?>" <?= $food[0]['ID_TYPE_FOOD'] == $type['ID_TYPE_FOOD'] ?
								'selected' : '' ?>>
								<?= $type['NAME_TYPE_FOOD'] ?>
                            </option>
							<?php } ?>
                        </select>
                    </div>
					<?php } ?>
                <!-- imagen -->
                    <div class="row">
                        <label for="imgAddress" class="control-label">Imagen de la comida</label>
                        <input type="file"
                               id="imgAddress"
                               name="imgAddress"
                               class="file"
                               data-show-upload="false"
                               data-show-caption="true">
                    </div>
                    <!-- costos -->
					<?php if(!empty($costFood)){ ?>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Moneda</th>
                                    <th>Costos</th>
                                    <th>Cantidad</th>
                                    <th>Puntos a obtener</th>
                                    <th>Puntos Requeridos</th>
                                    <th>Opcion</th>
                                </tr>
                                </thead>
                                <tbody id="listCost">
								<?php $i = 0;
								foreach($costFood as $cost){ ?>
                                <tr>
                                    <td>
										<?php if(!empty($listTypeMoney)){ ?>
                                        <select name="cost[<?= $i ?>][idTypeMoney]"
                                                id="idTypeMoney"
                                                class="form-control"
                                                title="Tipo de moneda"
                                                required>
											<?php foreach($listTypeMoney as $type){ ?>
                                            <option value="<?= $type['ID_TYPE_MONEY']; ?>" <?= $type['ID_TYPE_MONEY'] == $cost['ID_TYPE_MONEY'] ?
												'selected' : '' ?>>
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
                                               value="<?= $cost['PRICE_COST_FOOD'] ?>"
                                               min="0"
                                               max="99999"
                                               class="form-control"
                                               title="costo del servicio"
                                               required>
                                    </td>
                                    <td>
                                        <input type="number"
                                               name="cost[<?= $i ?>][nUnit]"
                                               min="0"
                                               max="999"
                                               value="<?= $cost['UNIT_COST_FOOD'] ?>"
                                               title="Unidades del servicio"
                                               class="form-control"
                                               required>
                                    </td>
                                    <td>
                                        <input type="number"
                                               name="cost[<?= $i ?>][pointObtain]"
                                               min="0"
                                               max="99999"
                                               value="<?= $cost['POINT_OBTAIN_COST_FOOD'] ?>"
                                               class="form-control"
                                               title="Puntos de fidelizacion obtenidos"
                                               required>
                                    </td>
                                    <td>
                                        <input type="number"
                                               name="cost[<?= $i ?>][pointRequired]"
                                               min="0"
                                               max="99999"
                                               value="<?= $cost['POINT_REQUIRED_COST_FOOD'] ?>"
                                               class="form-control"
                                               title="Puntos de fidelizacion requeridos"
                                               required>
                                    </td>
                                    <td>
										<?php if($i == 0){ ?>
                                        <button type="button"
                                                id="insertCost"
                                                name="insertCost"
                                                class="btn btn-sm btn-primary">
                                            <i class="fa fa-plus"></i>
                                        </button>
										<?php }
                                        elseif($i > 0){ ?>
                                        <button type="button"
                                                id="removeCost"
                                                name="insertCost"
                                                class="btn btn-sm btn-danger">
                                            <i class="fa fa-minus"></i>
                                        </button>
										<?php }
										$i++;
										?>
                                    </td>
                                </tr>
								<?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
				<?php } ?>
                <!-- Boton de guardar -->
                    <div class="row">
                        <div class="panel pull-right">
                            <button type="button"
                                    class="btn btn-primary"
                                    name="save"
                                    onclick="return validForm('formFood','Actualizar','Desea realizar los cambios?','warning')">
                                <i class="fa fa-save"></i> Guardar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
		<?php } ?>
    </div>
</section><!-- script -->
<script type="text/javascript">
    //tabla de costo
    $(function () {
        var scntDiv = $('#listCost');
        var i = <?=!empty($costFood) ? count($costFood) : '0'?>;
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