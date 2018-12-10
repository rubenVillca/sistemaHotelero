<section>
    <div class="app-color-white animated fadeIn panel">
        <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
            <form action="offer/insert_dd/"
                  method="post"
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
                               placeholder="Nombre de oferta"
                               required>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-2 col-lg-2">
                        <label for="reserve"
                               class="control-label">Reservas</label>
                        <input type="checkbox"
                               id="reserve"
                               name="reserve"
                               value="1"
                               class="form-control"
                               placeholder="Permitir reserva">
                    </div>
                </div>
                <!--descripcion de la oferta -->
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <label for="descr"
                               class="control-label">Descripci&oacute;n</label>
                        <textarea id="descr"
                                  name="descr"
                                  class="jqte-test form-control"
                                  placeholder="Descripci&oacute;n de la oferta"
                                  rows="3"
                                  required></textarea>
                    </div>
                </div>
                <!-- Direccion de la imagen de la oferta -->
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <label for="imgAddress"
                               class="control-label">Imagen</label>
                        <input id="imgAddress"
                               name="imgAddress"
                               type="file"
                               class="file"
                               data-show-upload="false"
                               data-show-caption="true">
                    </div>
                </div>
                <!-- Fecha,Hora e Inicio y fin de la oferta -->
                <div class="row">
                    <!-- Inicio-->
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <label for="dateIni">Fecha Inicio</label>
                        <input type="date"
                               class="form-control datepicker"
                               name="dateIni"
                               id="dateIni"
                               value="<?= date('Y-m-d') ?>"
                               required>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <label for="timeIni">Hora Inicio</label>
                        <input type="time"
                               class="form-control"
                               name="timeIni"
                               id="timeIni"
                               value="00:00:00"
                               required>
                    </div>
                    <!-- Fin-->
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <label for="dateFin">Fecha Fin</label>
                        <input type="date"
                               class="form-control datepicker"
                               name="dateFin"
                               id="dateFin"
                               value="<?= date('Y-m-d') ?>"
                               required>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <label for="timeFin">Hora Fin</label>
                        <input type="time"
                               class="form-control"
                               name="timeFin"
                               id="timeFin"
                               value="23:59:59"
                               required>
                    </div>
                </div>
                <!--tipo y estado de la oferta -->
                <div class="row">
                    <!--tipo de oferta -->
					<?php if(isset($listTypeOffer)){ ?>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <label for="idType"
                               class="control-label">Tipo de oferta</label>
                        <select name="idType"
                                id="idType"
                                class="form-control"
                                required>
							<?php foreach($listTypeOffer as $typeOffer){ ?>
                            <option value="<?= $typeOffer['ID_TYPE_SERVICE'] ?>">
								<?= $typeOffer['NAME_TYPE_SERVICE'] ?>
                            </option>
							<?php } ?>
                        </select>
                    </div>
					<?php } ?>
                <!--estado de la oferta -->
					<?php if(isset($listStateOffer)){ ?>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <label for="idState"
                               class="control-label">Estado de la oferta</label><br>
                        <select name="idState"
                                id="idState"
                                class="form-control">
                            <option value=""></option>
							<?php foreach($listStateOffer as $stateOffer){ ?>
                            <option value="<?= $stateOffer['ID_STATE_SERVICE']; ?>">
								<?= $stateOffer['NAME_STATE_SERVICE']; ?>
                            </option>
							<?php } ?>
                        </select>
                    </div>
					<?php } ?>
                </div>
                <!-- Listas: habitaciones comidas -->
                <div class="row">
                    <!-- habtitaciones -->
					<?php if(!empty($listTypeRoom1) || !empty($listTypeRoom2)){ ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label for="idTypeRoom"
                               class="control-label">Habitaciones</label>
                        <select name="idTypeRoom[]"
                                multiple="multiple"
                                id="idTypeRoom"
                                class="form-control">
							<?php if(!empty($listTypeRoom1)){ ?>
                            <optgroup label="Habitaciones">
								<?php foreach($listTypeRoom1 as $typeRoom){ ?>
                                <option value="<?= $typeRoom['ID_ROOM_MODEL']; ?>"><?= $typeRoom['NAME_ROOM_MODEL']; ?></option>
								<?php } ?>
                            </optgroup>
							<?php } ?>
							<?php if(!empty($listTypeRoom2)){ ?>
                            <optgroup label="Ambientes">
								<?php foreach($listTypeRoom2 as $typeRoom){ ?>
                                <option value="<?= $typeRoom['ID_ROOM_MODEL']; ?>"><?= $typeRoom['NAME_ROOM_MODEL']; ?></option>
								<?php } ?>
                            </optgroup>
							<?php } ?>
                        </select>
                    </div>
					<?php } ?>
                </div>
                <!-- tabla -->
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Moneda</th>
                                <th>Costos</th>
                                <th>D&iacute;as</th>
                                <th>Horas</th>
                                <th>Cantidad</th>
                                <th>Puntos a ganar</th>
                                <th>Puntos Necesarios</th>
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
                                           name="cost[0][nCost]"
                                           value="0"
                                           min="0"
                                           max="99999"
                                           class="form-control"
                                           title="costo del servicio"
                                           required>
                                </td>
                                <td>
                                    <input type="number"
                                           name="cost[0][nDay]"
                                           min="0"
                                           max="99"
                                           value="0"
                                           class="form-control"
                                           title="Dias"
                                           required>
                                </td>
                                <td>
                                    <input type="number"
                                           name="cost[0][nHour]"
                                           min="0"
                                           max="23"
                                           value="0"
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
                <!-- botones -->
                <div class="row">
                    <div class="pull-right">
                        <a href="offer/panel/"
                           class="btn btn-danger">
                            <i class="fa fa-arrow-left"></i> Atras
                        </a>
                        <button type="submit"
                                class="btn btn-primary"
                                name="btnInsert">
                            <i class="fa fa-save"></i> Guardar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- script -->
<script type="text/javascript">
    //multiselect
    $(document).ready(function () {
        $('#idTypeRoom').multiselect({
            buttonWidth: '100%',
            dropRight: true
        });
    });
    //costos
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