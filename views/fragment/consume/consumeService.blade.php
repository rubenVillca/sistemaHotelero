<?php if(!empty($service)){ ?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h4 class="panel-title text-center">
			<a data-toggle="collapse"
			   data-parent="#accordion"
			   href="#collapse0">
				Datos del servicio
			</a>
		</h4>
	</div>
	<div id="collapse0"
	     class="panel-collapse">
		<div class="panel-body">
			<!-- imagen del tipo de habitacion -->
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				<img src="<?= $service['IMAGE_SERVICE'] ?>"
				     alt="Foto del tipo de habitaci&oacute;n"
				     class="thumbnail app-img-4">
			</div>
			<!-- Nombre del servicio -->
			<div class="col-xs-12 col-sm-6 col-md-8 col-lg-8 form-horizontal">
				<div class="form-group">
					<label class="control-label control-label col-xs-2 col-sm-6 col-md-2 col-lg-2">
						<b>Servicio:</b>
					</label>
					<div class="col-xs-4 col-sm-6 col-md-4 col-lg-4">
						<h5><?= $service['NAME_SERVICE'] ?></h5>
					</div>
					<label class="control-label control-label col-xs-2 col-sm-6 col-md-2 col-lg-2">
						<b>Tipo:</b>
					</label>
					<div class="col-xs-4 col-sm-6 col-md-4 col-lg-4">
						<h5><?= $service['NAME_TYPE_SERVICE'] ?></h5>
					</div>
				</div>
				<div class="form-group">
					<!-- Tipo de habitacion -->
					<?php if(!empty($typeRoom)){ ?>
					<?php foreach($typeRoom as $type){ ?>
					<label class="control-label col-xs-2 col-sm-6 col-md-2 col-lg-2">Habitaci&oacute;n:</label>
					<div class="col-xs-4 col-sm-6 col-md-4 col-lg-4">
						<h5>- <?= $type['NAME_ROOM_MODEL'] ?></h5>
					</div>
					<label class="control-label col-xs-2 col-sm-6 col-md-2 col-lg-2">Capacidad:
					</label>
					<div class="col-xs-4 col-sm-6 col-md-4 col-lg-4">
						<h5><?= $type['UNIT_ADULT_ROOM_MODEL']+$type['UNIT_BOY_ROOM_MODEL'].' Personas' ?></h5>
					</div>

					<?php } ?>
					<?php } ?>
				</div>
				<div class="form-group">
					<!-- Costo del servicio -->
					<?php if(!empty($costService)){ ?>
					<label class="control-label control-label col-xs-2 col-sm-6 col-md-2 col-lg-2">Costo:</label>
					<?php foreach($costService as $cost){ ?>
					<div class="col-xs-4 col-sm-6 col-md-4 col-lg-4">
						<h5><b>- Unidades:</b> <?= $cost['UNIT_COST_SERVICE'] ?></h5>
						<h5><b>- Costo:</b> <?= $cost['NAME_TYPE_MONEY'].' '.$cost['PRICE_COST_SERVICE'] ?></h5>
						<h5><b>-
								Tiempo:</b> <?= $cost['UNIT_DAY_COST_SERVICE'].'dias, '.$cost['UNIT_HOUR_COST_SERVICE'].' horas' ?>
						</h5>
						<h5><b>- Total costo (<?=$cost['NAME_TYPE_MONEY']?>
								):</b> <?=  $consum['PRICE_CONSUME_SERVICE'] ?>
						</h5>
					</div>
					<?php } ?>
					<?php } ?>
				<!-- tiempo de estadia -->
					<?php if(!empty($totalHour)){ ?>
					<label class="control-label control-label col-xs-2 col-sm-6 col-md-2 col-lg-2">Estadia:</label>
					<div class="col-xs-4 col-sm-6 col-md-4 col-lg-4">
						<h5><?= $totalHour.' Horas'; ?></h5>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>