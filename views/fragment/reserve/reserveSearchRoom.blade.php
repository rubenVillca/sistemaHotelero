<section>
<form action='checkIn/insert/<?= !empty($idCheck) ? $idCheck : 0 ?>/' method='post'>
	<?php if(!empty($listService)){ ?>
        <div class="hidden">
            <input type="number"
                   name="daysCheckIn"
                   value="<?= $daysCheckIn ?>"
                   title="dias a ocupar">
            <input type="number"
                   name="hoursCheckIn"
                   value="<?= $hoursCheckIn ?>"
                   title="horas a ocupar">
        </div>
	<?php $i = 0; ?>
	<?php foreach($listService as $service){ ?>
    <!-- Descripcion del tipo de habitacion -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <!-- descripcion habitacion -->
            <div class="row">
                <!-- imagen del tipo de habitacion -->
                <div class='hidden-xs col-sm-6 col-md-4 col-lg-4'>
                    <img src='<?= $service['IMAGE_ROOM_MODEL'] ?>'
                         alt='No se cargo la imagen correctamente'
                         class='thumbnail app-img-4'>
                </div>
                <!-- datos del tipo de habitacion -->
                <div class='col-xs-12 col-sm-6 col-md-8 col-lg-8'>
                    <h4 class='panel-title'>
                        <b>Servicio: <?= $service['NAME_SERVICE']; ?></b></h4>
                    <h4><b>Tipo de habitacion:</b> <?= $service['NAME_ROOM_MODEL']; ?></h4>
                    <h4>
                        <b>Capacidad: </b>
						<?=$service['UNIT_ADULT_ROOM_MODEL']?>
                        Adulto(s), <?=$service['UNIT_BOY_ROOM_MODEL']?>
                        Niño(s) </h4>
                    <h4>
                        <b>Permitir reservas: </b>
						<?= $service['RESERVED_SERVICE'] ? 'Si' : 'No' ?>
                    </h4>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h4><b>Descripci&oacute;n:</b></h4>
                <p class="text-justify"><?= Helper::camelUpperCase($service['DESCRIPTION_ROOM_MODEL']) ?></p>
            </div>
        </div>
        <!-- lista de habitacion disponible -->
        <div class="col-xm-12 col-sm-12 col-md-6 col-lg-6 hr-vertical">
            <!-- Nombre de habitacion -->
            <b>Habitaciones: </b><br>
			<?php $j = 0; ?>
			<?php foreach($service['list_room'] as $room){
			if($room['DATE_CHECK_OUT_ROOM'] == date('Y-m-d') && $room['TIME_CHECK_OUT_ROOM'] >= date('H:i:s')){?>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <b><?= $room['NAME_ROOM'] ?></b>
            </div>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				<?= 'Habitacion disponible a partir de las ' . $room['TIME_CHECK_OUT_ROOM']; ?>
            </div>
			<?php }
			else{ ?>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <label for="idRoom-<?= $room['ID_ROOM'] ?>">
                    <input type="checkbox"
                           id="idRoom-<?= $room['ID_ROOM'] ?>"
                           name="listRoom[<?= $i ?>][<?= $j; ?>][idRoom]"
                           value="<?= $room['ID_ROOM'] ?>"
                           title="seleccionar">
					<?= $room['NAME_ROOM'] ?>
                </label>
            </div>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				<?php if (count($service['list_cost'])>1){?>
                <select id="idCost"
                        name=listRoom[<?= $i ?>][<?= $j++; ?>][idCost]"
                        title="Costo"
                        class="form-control">
					<?php foreach($service['list_cost'] as $cost){ ?>
                    <option value="<?= $cost['ID_COST_SERVICE'] ?>">
						<?php
						$totalHourConsum = $hoursCheckIn + $daysCheckIn * 24;
						$totalHourCost = $cost['UNIT_DAY_COST_SERVICE'] * 24 + $cost['UNIT_HOUR_COST_SERVICE'] == 0 ?
							1 :
							$cost['UNIT_DAY_COST_SERVICE'] * 24 + $cost['UNIT_HOUR_COST_SERVICE'];
						$totalTime = $totalHourConsum / ($totalHourCost);
						$priceConsum = $cost['PRICE_COST_SERVICE'] * $totalTime; ?>
						<?= $priceConsum . ' ' . $cost['NAME_TYPE_MONEY'] ?>
                        (<?= $cost['PRICE_COST_SERVICE'] . ' ' . $cost['NAME_TYPE_MONEY'] . ' - ' . $cost['UNIT_DAY_COST_SERVICE'] . ' Dias, ' . $cost['UNIT_HOUR_COST_SERVICE'] . ' Horas' ?>
                        )
                    </option>
					<?php } ?>
                </select>
				<?php }else{?>
                <select id="idCost"
                        name=listRoom[<?= $i ?>][<?= $j++; ?>][idCost]"
                        title="Costo"
                        class="hidden"
                        hidden>
					<?php foreach($service['list_cost'] as $cost){ ?>
                    <option value="<?= $cost['ID_COST_SERVICE'] ?>">
						<?php
						$totalHourConsum = $hoursCheckIn + $daysCheckIn * 24;
						$totalHourCost = $cost['UNIT_DAY_COST_SERVICE'] * 24 + $cost['UNIT_HOUR_COST_SERVICE'] == 0 ?
							1 :
							$cost['UNIT_DAY_COST_SERVICE'] * 24 + $cost['UNIT_HOUR_COST_SERVICE'];
						$totalTime = $totalHourConsum / ($totalHourCost);
						$priceConsum = $cost['PRICE_COST_SERVICE'] * $totalTime; ?>
						<?= $priceConsum . ' ' . $cost['NAME_TYPE_MONEY'] ?>
                        (<?= $cost['PRICE_COST_SERVICE'] . ' ' . $cost['NAME_TYPE_MONEY'] . ' - ' . $cost['UNIT_DAY_COST_SERVICE'] . ' Dias, ' . $cost['UNIT_HOUR_COST_SERVICE'] . ' Horas' ?>
                        )
                    </option>
					<?php } ?>
                </select>
                <p><?php
					$totalHourConsum = $hoursCheckIn + $daysCheckIn * 24;
					$totalHourCost = $cost['UNIT_DAY_COST_SERVICE'] * 24 + $cost['UNIT_HOUR_COST_SERVICE'] == 0 ?
						1 :
						$cost['UNIT_DAY_COST_SERVICE'] * 24 + $cost['UNIT_HOUR_COST_SERVICE'];
					$totalTime = $totalHourConsum / ($totalHourCost);
					$priceConsum = $cost['PRICE_COST_SERVICE'] * $totalTime; ?>
					<?= $priceConsum . ' ' . $cost['NAME_TYPE_MONEY'] ?>
                    (<?= $cost['PRICE_COST_SERVICE'] . ' ' . $cost['NAME_TYPE_MONEY'] . ' - ' . $cost['UNIT_DAY_COST_SERVICE'] . ' Dias, ' . $cost['UNIT_HOUR_COST_SERVICE'] . ' Horas' ?>)
                </p>
				<?php }?>
            </div>
			<?php } ?>
            <div class="clearfix"></div>
			<?php } ?>
        </div>
        <div class="clearfix"></div>
        <hr>
	<?php $i++; ?>
	<?php } ?>
    <!-- Botones -->
        <ul class="list-inline pull-right">
            <li>
                <a href="checkIn/" class="btn btn btn-danger"><i class="fa fa-close"></i>
                    Cancelar
                </a>
            </li>
            <li>
                <button type='submit' name='order' class='btn btn btn-primary next-step'>
                    <span class='fa fa-arrow-right'></span>
                    Guardar y continuar
                </button>
            </li>
        </ul>
	<?php }else{ ?>
    <div class="alert" role="alert">
        <img src="img/404/caja-vacia.jpg"
             class="app-img-5 center-block"
             alt="No existen datos disponibles">
        <h4 class="text-center">No se encontraron habitaciones disponible para la fecha
                                seleccionada,seleccione
                                otra fecha</h4>
    </div>
	<?php } ?>
</form>
</section>