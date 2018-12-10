<!-- costo del servicio -->
<?php if (isset($listConsumCheck)) { ?>
<h3>
    <a data-toggle="collapse" class="btn btn-primary" data-parent="#accordion" href="#collapse8">Pagos</a>
</h3>
<div id="collapse8" class="panel-collapse collapse in">
    <!-- cabecera -->
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Habitación</th>
                    <th>Fecha ingreso</th>
                    <th>Fecha salida</th>
                    <th>Costo</th>
                    <th>Pago</th>
                    <th>Saldo</th>
                    <th>Estado</th>
                    <th>Opcion</th>
                </tr>
                </thead>
                <tbody>
                <!-- costos inputs -->
				<?php
				$totalPrice = 0;
				$totalPay = 0;
				$typeMoney = '$';
				$i = 0;
				foreach ($listConsumCheck as $consumCheck) {

				$totalPrice += $consumCheck['PRICE_COST_SERVICE'];
				if ($_SESSION['TYPE_USER'] == Constants::$TYPE_USER_CLIENT){
				    $totalPay += $consumCheck['PRICE_COST_SERVICE']*Constants::$PERCENTAGE_PAY_RESERVE;//$consumCheck['PAY_CONSUME_SERVICE'];
                }else{
				    $totalPay += $consumCheck['PRICE_COST_SERVICE'];//$consumCheck['PAY_CONSUME_SERVICE'];
                }
				$typeMoney = $consumCheck['NAME_TYPE_MONEY'];
				$i++; ?>
                <!-- Nombre de habitacion -->
                <tr>
                    <!-- habitacion -->
                    <td>
						<?php if(!empty($consumCheck['OCCUPATION'])){?>
                        (<?= $consumCheck['OCCUPATION'][0]['NAME_ROOM'] ?>)
						<?= $consumCheck['OCCUPATION'][0]['NAME_ROOM_MODEL'] ?>
						<?php }else { ?>
                        <?= $consumCheck['RESERVE'][0]['NAME_ROOM_MODEL'] ?>
						<?php }?>
                    </td>
                    <!-- fecha ingreso -->
                    <td><?=$consumCheck['DATE_START_CHECK'].'<br>('.$consumCheck['TIME_START_CHECK'].')'?></td>
                    <!-- fecha salida -->
                    <td><?=$consumCheck['DATE_END_CHECK'].'<br>('.$consumCheck['TIME_END_CHECK'].')'?></td>
                    <!-- costo del servicio -->
                    <td>
						<?= $consumCheck['NAME_TYPE_MONEY'] ?>
                        <b id="cost-price-<?= $i ?>"><?= $consumCheck['PRICE_COST_SERVICE'] ?></b>
                    </td>
                    <!-- cantidad pagada -->
                    <td>
                        <?php if ($_SESSION['TYPE_USER'] == Constants::$TYPE_USER_CLIENT){?>
                        <input type="number" min="0" max="99999" step="0.1" class="form-control" id="deposit-<?= $i ?>"
                               name="cost[<?= $i ?>][payService]"
                               value="<?= $consumCheck['PRICE_COST_SERVICE']*Constants::$PERCENTAGE_PAY_RESERVE; ?>"
                               onchange="updateValue(<?= $i ?>)"
                               disabled>
                        <input type="text" class="hidden" id="deposit-hidden-<?= $i ?>" name="cost[<?= $i ?>][idConsum]"
                               value="<?= $consumCheck['ID_CONSUME_SERVICE'] ?>">
                        <?php }else{?>
                            <input type="number" min="0" max="99999" step="0.1" class="form-control" id="deposit-<?= $i ?>"
                                   name="cost[<?= $i ?>][payService]"
                                   value="<?= $consumCheck['PRICE_COST_SERVICE'];//$consumCheck['PAY_CONSUME_SERVICE'] ?>"
                                   onchange="updateValue(<?= $i ?>)"
                                   required>
                            <input type="text" class="hidden" id="deposit-hidden-<?= $i ?>" name="cost[<?= $i ?>][idConsum]"
                                   value="<?= $consumCheck['ID_CONSUME_SERVICE'] ?>">
                        <?php }?>
                    </td>
                    <!-- saldo -->
                    <td>
						<?= $consumCheck['NAME_TYPE_MONEY'] ?>
	                    <?php if ($_SESSION['TYPE_USER'] == Constants::$TYPE_USER_CLIENT){?>
                            <b id="cost-pay-<?= $i ?>"><?=$consumCheck['PRICE_COST_SERVICE']*Constants::$PERCENTAGE_PAY_RESERVE?></b>
                        <?php }else{?>
                            <b id="cost-pay-<?= $i ?>"><?=$consumCheck['PRICE_COST_SERVICE']?></b>
                        <?php }?>
                    </td>
                    <!-- estado -->
                    <td>
                        <label class="label label-<?=$consumCheck['ID_STATE_CHECK']==Constants::$STATE_CHECK_ACTIVE?
		                    'success':($consumCheck['ID_STATE_CHECK']==Constants::$STATE_CHECK_FINISHED?'primary':'warning')?>">
		                    <?= $consumCheck['NAME_STATE_CHECK'] ?>
                        </label>
                    </td>
                    <!-- opciones -->
                    <td>
                        <?php if ($consumCheck['ID_TYPE_CHECK']==Constants::$TYPE_CHECK_RESERVE){?>
	                    <?php if($consumCheck['ID_STATE_CHECK'] == 5 || $consumCheck['ID_STATE_CHECK'] == 7): ?>
                        <a href="reserve/editConsume/<?= $consumCheck['ID_CONSUME_SERVICE'] ?>"
                           class="btn btn-xs btn-<?= $consumCheck['ACTIVE_CONSUME_SERVICE'] == 0 ? 'warning' : 'info' ?>">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="reserve/deleteConsume_dd/<?= $consumCheck['ID_CONSUME_SERVICE'] ?>"
                           class="btn btn-xs btn-danger"
                           onclick="return validLink('reserve/deleteConsume_dd/<?= $consumCheck['ID_CONSUME_SERVICE'] ?>','Eliminar Consumo','El consumo se eliminara','error')">
                            <i class="fa fa-remove"></i>
                        </a>
	                    <?php else: ?>
                        <a href="reserve/editConsume/<?= $consumCheck['ID_CONSUME_SERVICE'] ?>"
                           class="btn btn-xs btn-primary"
                           target="_blank"
                           name="show">
                            <i class="fa fa-edit"></i>
                        </a>
	                    <?php endif; ?>
	                    <?php } ?>
                        <?php if ($consumCheck['ID_TYPE_CHECK']==Constants::$TYPE_CHECK_IN){?>
	                        <?php if($consumCheck['ID_STATE_CHECK'] == Constants::$STATE_CHECK_PROCESS_WITH_INCUMBENT || $consumCheck['ID_STATE_CHECK'] == Constants::$STATE_CHECK_PROCESS_WITHOUT_INCUMBENT): ?>
                            <a href="checkTeam/edit/<?= $consumCheck['ID_CONSUME_SERVICE'] ?>"
                               class="btn btn-xs btn-<?= $consumCheck['ACTIVE_CONSUME_SERVICE'] == 0 ? 'warning' : 'info' ?>">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="reserve/deleteConsume_dd/<?= $consumCheck['ID_CONSUME_SERVICE'] ?>"
                               class="btn btn-xs btn-danger"
                               onclick="return validLink('reserve/deleteConsume_dd/<?= $consumCheck['ID_CONSUME_SERVICE'] ?>','Eliminar Consumo','El consumo se eliminara','error')">
                                <i class="fa fa-remove"></i>
                            </a>
	                        <?php else: ?>
                            <a href="checkTeam/edit/<?= $consumCheck['ID_CONSUME_SERVICE'] ?>"
                               class="btn btn-xs btn-primary"
                               target="_blank"
                               name="show">
                                <i class="fa fa-edit"></i>
                            </a>
	                        <?php endif; ?>
                        <?php } ?>
                    </td>
                </tr>
				<?php } ?>
                <!-- costo total del check -->
                <tr class="bg-success">
                    <td colspan="3"><b>Total:</b></td>
                    <td>
                        <h5><b><?= $typeMoney ?>.</b><span id="totalPrice"><?= $totalPrice?></span></h5>
                    </td>
                    <td>
                        <h5><b><?= $typeMoney ?>.</b><span id="totalPay"><?= $totalPay ?></span></h5>
                    </td>
                    <td>
                        <h5><b><?= $typeMoney ?>.</b><span id="totalResult"><?= $totalPay - $totalPrice; ?></span></h5>
                    </td>
                    <td colspan="2"></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php } ?>
<script>
    function updateValue(i) {
        $totalPriceService=document.getElementById('totalPrice').textContent;
        $totalPayService=document.getElementById('totalPay').textContent;
        p = document.getElementById('cost-price-' + i).textContent;//precio habitacion old
        d = document.getElementById('deposit-' + i).value;//deposito habitacion antetior
        c = document.getElementById('cost-pay-' + i).textContent;//precio resultante habitacion anterior

        document.getElementById('cost-pay-' + i).textContent = precise_round(d-p,2);

        $totalPayService = parseFloat(d-p-c)+parseFloat($totalPayService);
        document.getElementById('totalPay').textContent = precise_round($totalPayService,2);

        document.getElementById('totalResult').textContent = precise_round(parseFloat($totalPayService)-parseFloat($totalPriceService),2);
    }

    function precise_round(num, decimals) {
        var t = Math.pow(10, decimals);
        return (Math.round((num * t) + (decimals>0?1:0)*(Math.sign(num) * (10 / Math.pow(100, decimals)))) / t).toFixed(decimals);
    }
</script>
