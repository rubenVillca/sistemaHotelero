<section>
    <div class="app-color-white animated fadeIn">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">Editar Oferta</h4>
            </div>
            <div class="panel-body">
        <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2 app-color-white">
			<?php if(!empty($offer) && !empty($offerDate)){ ?>
            <form action="offer/edit_dd/<?= $offer['ID_SERVICE'] ?>/<?= $offerDate['ID_OFFER'] ?>"
                  method="post"
                  id="form-edit-offer"
                  class="form-horizontal"
                  enctype="multipart/form-data">
                <!-- nombre de la oferta -->
                <div class="row">
                    <div class="col-xs-9 col-sm-9 col-md-10 col-lg-10">
                        <label for="name"
                               class="control-label">Nombre de Oferta</label>
                        <input type="text"
                               id="name"
                               name="name"
                               class="form-control"
                               value="<?= $offer['NAME_SERVICE']; ?>"
                               placeholder="Nombre de oferta"
                               title="Nombre de la oferta"
                               required>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-2 col-lg-2">
                        <label for="reserve"
                               class="control-label">Reservas</label>
                        <input type="checkbox"
                               id="reserve"
                               name="reserve"
                               value="1"
						       <?= $offer['RESERVED_SERVICE'] == 1 ? 'checked' : ''; ?>
                               class="form-control"
                               placeholder="Permitir reserva">
                    </div>
                </div>
                <!--descripcion de la oferta -->
                <div class="row">
                    <label for="descr"
                           class="control-label">Descripci&oacute;n</label>
                    <textarea id="descr"
                              name="descr"
                              class="jqte-test form-control"
                              placeholder="Descripci&oacute;n de la oferta"
                              rows="3"><?= $offer['DESCRIPTION_SERVICE']; ?></textarea>
                </div>
                <!-- Fecha y hora de inicio y  finalizacion -->
                <div class="row">
                    <!-- Inicio-->
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                        <label for="dateIni">Fecha Inicio</label>
                        <input type="date"
                               class="form-control datepicker"
                               name="dateIni"
                               id="dateIni"
                               value="<?= $offerDate['DATE_INI_OFFER']; ?>"
                               title="Fecha de inicio"
                               required>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                        <label for="timeIni">Hora Inicio</label>
                        <input type="time"
                               class="form-control"
                               name="timeIni"
                               id="timeIni"
                               value="<?= $offerDate['TIME_INI_OFFER']; ?>"
                               title="Hora de inicio"
                               required>
                    </div>
                    <!-- Fecha de finalizacion -->
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                        <label for="dateFin">Fecha Fin</label>
                        <input type="date"
                               class="form-control datepicker"
                               name="dateFin"
                               id="dateFin"
                               value="<?= $offerDate['DATE_FIN_OFFER']; ?>"
                               title="Fecha de fin"
                               required>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                        <label for="timeFin">Hora Fin</label>
                        <input type="time"
                               class="form-control"
                               name="timeFin"
                               id="timeFin"
                               value="<?= $offerDate['TIME_FIN_OFFER']; ?>"
                               title="Hora de finalizacion"
                               required>
                    </div>
                </div>
                <!--tipo y estado de oferta -->
                <div class="row">
                    <!-- Tipo de oferta -->
					<?php if(isset($listTypeOffer)){ ?>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <label for="idType"
                               class="control-label">Tipo de oferta</label>
                        <select name="idType"
                                id="idType"
                                class="form-control"
                                required>
							<?php foreach($listTypeOffer as $typeOffer){ ?>
                            <option value="<?= $typeOffer['ID_TYPE_SERVICE'] ?>" <?= $typeOffer['ID_TYPE_SERVICE'] == $offer['ID_TYPE_SERVICE'] ? 'selected' : ''; ?>>
								<?= $typeOffer['NAME_TYPE_SERVICE'] ?>
                            </option>
							<?php } ?>
                        </select>
                    </div>
				<?php } ?>
                <!--estado de la oferta -->
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <label for="idState"
                               class="control-label">Estado de la oferta</label><br>
                        <select name="idState"
                                id="idState"
                                class="form-control"
                                required>
							<?php if(isset($listStateOffer)){
							foreach($listStateOffer as $stateOffer){ ?>
                            <option value="<?= $stateOffer['ID_STATE_SERVICE'] ?>" <?= $stateOffer['ID_STATE_SERVICE'] == $offer['ID_STATE_SERVICE'] ? 'selected' : ''; ?>>
								<?= $stateOffer['NAME_STATE_SERVICE'] ?>
                            </option>
							<?php }
							} ?>
                        </select>
                    </div>
                </div>
                <!-- Listas: servicios, imagen -->
                <div class="row">
                    <!-- lista de tipos de habitacion -->
					<?php if(!empty($listTypeRoom1) || !empty($listTypeRoom2)){ ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label for="listTypeRoom"
                               class="control-label">Habitaciones</label>
                        <select name="listTypeRoom[]"
                                multiple="multiple"
                                id="listTypeRoom"
                                class="form-control"
                                title="Seleccione un servicio"
                                required>
							<?php if(!empty($listTypeRoom1)){ ?>
                            <optgroup label="Habitaciones">
								<?php foreach($listTypeRoom1 as $typeRoom){
								$selected = '';
								if(!empty($listTypeRoomOffer)) {
									foreach($listTypeRoomOffer as $typeRoomOffer) {
										$selected = $typeRoom['ID_ROOM_MODEL'] == $typeRoomOffer['ID_ROOM_MODEL'] ? 'selected' : $selected;
									}
								} ?>
                                <option value="<?= $typeRoom['ID_ROOM_MODEL']; ?>" <?= $selected; ?>>
									<?= $typeRoom['NAME_ROOM_MODEL']; ?>
                                </option>
								<?php } ?>
                            </optgroup>
							<?php } ?>
							<?php if(!empty($listTypeRoom2)){ ?>
                            <optgroup label="Ambientes">
								<?php foreach($listTypeRoom2 as $typeRoom){
								$selected = '';
								if(!empty($listTypeRoomOffer)) {
									foreach($listTypeRoomOffer as $typeRoomOffer) {
										$selected = $typeRoom['ID_ROOM_MODEL'] == $typeRoomOffer['ID_ROOM_MODEL'] ? 'selected' : $selected;
									}
								} ?>
                                <option value="<?= $typeRoom['ID_ROOM_MODEL']; ?>" <?= $selected; ?>>
									<?= $typeRoom['NAME_ROOM_MODEL']; ?>
                                </option>
								<?php } ?>
                            </optgroup>
							<?php } ?>
                        </select>
                    </div>
				<?php } ?>
                <!-- Imagen  de la oferta-->
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <label for="imgAddress"
                               class="control-label">Imagen Nueva</label>
                        <input id="imgAddress"
                               name="imgAddress"
                               type="file"
                               class="file"
                               data-show-upload="false"
                               data-show-caption="true">
                    </div>
                </div>
                <!-- costo, tipo de moneda, nDias, nHoras -->
                <div class="row">
					<?php if(!empty($offerCost)){ ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Moneda</th>
                                <th>Costos</th>
                                <th>D&iacute;as.</th>
                                <th>Horas.</th>
                                <th>Cantidad</th>
                                <th>Puntos a ganar</th>
                                <th>Puntos Necesarios</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody id="listCost">
							<?php
							$i = 0;
							foreach($offerCost as $cost){ ?>
                            <tr>
                                <td>
									<?php if(!empty($listTypeMoney)){ ?>
                                    <select name="cost[<?= $i ?>][idTypeMoney]"
                                            id="idTypeMoney"
                                            class="form-control"
                                            title="Tipo de moneda"
                                            required>
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
                            </tbody>
                        </table>
                    </div>
					<?php } ?>
                </div>
                <!-- Botones de guardar y retroceder-->
                <div class="pull-right panel-body row">
                    <a href="offer/panel/"
                       class="btn btn-danger">Atras
                        <span class="fa fa-remove"></span>
                    </a>
                    <button type="submit"
                            onclick="return validForm('form-edit-offer','Modificar','Desea modificar la oferta <?=$offer['NAME_SERVICE'];?>?','success')"
                            class="btn btn-primary"
                            name="btnEdit">
                        Guardar <span class="fa fa-save"></span>
                    </button>
                </div>
            </form>
			<?php }
			else{ ?>
            <h3 class="text-center">Oferta inexistente</h3>
            <img src="img/404/caja-vacia.jpg"
                 class="app-img-5 center-block"
                 alt="No existen datos disponibles">
			<?php } ?>
        </div>
            </div>
        </div>
    </div>
</section>
<!-- script -->
<script>
    //multi select
    $(document).ready(function () {
        $('#listTypeRoom').multiselect({
            buttonWidth: '100%',
            dropRight: true
        });
    });
    //cost
    $(function () {
        var scntDiv = $('#listCost');
        var i = 1;
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