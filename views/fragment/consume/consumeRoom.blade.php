<!-- costo del servicio -->
<?php if (isset($listConsumCheck)) { ?>
<h3>
	<a data-toggle="collapse" class="btn btn-primary" data-parent="#accordion" href="#collapse-room">Habitaciones</a>
</h3>
<div id="collapse-room" class="panel-collapse collapse in">
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
				<tr>
					<th>Ingreso</th>
					<th>Salida</th>
					<th>Servicio</th>
					<th>Precio</th>
					<th>Pagado</th>
					<th>Estado</th>
					<th>Acción</th>
				</tr>
				</thead>
				<tbody>
				<?php $i = 0;
				$id = 0;
				foreach($listReserveHistory as $reserve){
				$i++;
				if($id != $reserve['ID_CHECK']){//si es diferente idCheck
				$id = $reserve['ID_CHECK']; ?>
				<?php } ?>
				<!-- informacion de consumo -->
				<tr>
					<td class="text-center">
						<?= $reserve['DATE_START_CHECK'] ?><br>
						(<?= $reserve['TIME_START_CHECK']; ?>)
					</td>
					<td>
						<?= $reserve['DATE_END_CHECK'] ?><br>
						(<?= $reserve['TIME_END_CHECK']; ?>)
					</td>
					<td><?= $reserve['NAME_SERVICE'] ?></td>
					<td><?= $reserve['PRICE_CONSUME_SERVICE']; ?></td>
					<td><?= $reserve['PAY_CONSUME_SERVICE']; ?></td>
					<td>
						<label class="label label-<?=$reserve['ID_STATE_CHECK']==Constants::$STATE_CHECK_ACTIVE?
							'success':($reserve['ID_STATE_CHECK']==Constants::$STATE_CHECK_FINISHED?'primary':'warning')?>">
							<?= $reserve['NAME_STATE_CHECK'] ?>
						</label>
					</td>
					<td><!-- opciones del consumo -->
						<?php if($reserve['ID_STATE_CHECK'] == 5 || $reserve['ID_STATE_CHECK'] == 7){ ?>
						<a href="reserve/editConsume/<?= $reserve['ID_CONSUME_SERVICE'] ?>"
						   class="btn btn-xs btn-<?= $reserve['ACTIVE_CONSUME_SERVICE'] == 0 ? 'warning' : 'info' ?>">
							<i class="fa fa-edit"></i>
						</a>
						<a href="reserve/deleteConsume_dd/<?= $reserve['ID_CONSUME_SERVICE'] ?>"
						   class="btn btn-xs btn-danger"
						   onclick="return validLink('reserve/deleteConsume_dd/<?= $reserve['ID_CONSUME_SERVICE'] ?>','Eliminar Consumo','El consumo se eliminara','error')">
							<i class="fa fa-remove"></i>
						</a>
						<?php }
						else{ ?>
						<a href="reserve/editConsume/<?= $reserve['ID_CONSUME_SERVICE'] ?>"
						   class="btn btn-xs btn-primary"
						   name="show">
							Ver <i class="fa fa-eye"></i>
						</a>
						<?php } ?>
					</td>
				</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php } ?>

<script>
    let totalPrice =<?=isset($totalPrice) ? $totalPrice : 0?>;
    let totalPay =<?=isset($totalPay) ? $totalPay : 0?>;

    function updateValue(i) {
        p = document.getElementById('cost-price-' + i).textContent;
        d = document.getElementById('deposit-' + i).value;
        c = document.getElementById('cost-pay-' + i).textContent;
        //totalAux=-(d-p);
        document.getElementById('cost-pay-' + i).textContent = d - p;
        totalPay = Math.round(parseFloat(totalPay + parseFloat(c - (d - p))) * 100) / 100;
        document.getElementById('totalPay').textContent = -totalPay;
        document.getElementById('totalResult').textContent = Math.round((-totalPrice - totalPay) * 100) / 100;
    }
</script>
