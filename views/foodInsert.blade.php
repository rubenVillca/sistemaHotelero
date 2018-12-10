<section>
    <div class="app-color-white animated fadeIn col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
        <form action="<?= 'food/insert_dd/'?>"
              method="post"
              enctype="multipart/form-data">
            <!-- Nombre de food -->
            <div class="row">
                <label for="nameFood"
                       class="control-label">Nombre de la comida</label>
                <input type="text"
                       id="nameFood"
                       name="nameFood"
                       class="form-control"
                       placeholder="Nombre de la comida"
                       required>
            </div>
            <!-- descripcion de food -->
            <div class="row">
                <label for="descFood"
                       class="control-label">Descripci&oacute;n de la comida</label>
                <textarea id="descFood"
                          name="descFood"
                          class="form-control jqte-test"
                          placeholder="Descripci&oacute;n de la comida"
                          required></textarea>
            </div>
            <!-- Tipo de food -->
			<?php if(!empty($listType)){ ?>
            <div class="row">
                <label for="idTypeFood"
                       class="control-label">Tipo de Comida</label>
                <select id="idTypeFood"
                        name="idTypeFood"
                        class="form-control"
                        required>
                    <option value=""></option>
					<?php foreach($listType as $type){ ?>
                    <option value="<?= $type['ID_TYPE_FOOD'] ?>"><?= $type['NAME_TYPE_FOOD'] ?></option>
					<?php } ?>
                </select>
            </div>
			<?php } ?>
        <!-- Estado de food -->
			<?php if(!empty($listState)){ ?>
            <div class="row">
                <label for="idStateFood"
                       class="control-label">Estado</label>
                <select id="idStateFood"
                        name="idStateFood"
                        class="form-control"
                        required>
					<?php foreach($listState as $state){ ?>
                    <option value="<?= $state['ID_STATE_FOOD'] ?>"><?= $state['NAME_STATE_FOOD'] ?></option>
					<?php } ?>
                </select>
            </div>
		<?php } ?>
        <!-- imagen de la food -->
            <div class="row">
                <label for="imgAddress"
                       class="control-label">Imagen</label>
                <input type="file"
                       id="imgAddress"
                       name="imgAddress"
                       class="file"
                       data-show-upload="false"
                       data-show-caption="true">
            </div>
            <!-- tabla de costos -->
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Moneda</th>
                            <th>Costos</th>
                            <th>Unidades</th>
                            <th>Puntos a obtener</th>
                            <th>Puntos Requeridos</th>
                            <th>Opcion</th>
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
            <!-- botones -->
            <hr>
            <div class="row">
                <div class="panel pull-right">
                    <a href="food/"
                       class="btn btn-danger">
                        Cancelar <i class="fa fa-remove"></i>
                    </a>
                    <button type="submit"
                            class="btn btn-primary"
                            name="insert">
                        Insertar <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>
<script type="text/javascript">
    //tabla de costo
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