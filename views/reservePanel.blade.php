<?php require_once "views/fragment/search/searchServiceReserve.blade.php"; ?>
<?php if ($_SESSION['TYPE_USER']==Constants::$TYPE_USER_CLIENT){?>
<!--Historial de resrvas-->
<section class="app-color-white animated fadeInUp">
	<?php if(!empty($listReserveHistory)){ ?>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="bg-info">
                <tr>
                    <th>Id</th>
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
                <!-- informcaion de check -->
                <tr class="warning">
                    <!-- Opciones de la check -->
					<?php if(($reserve['ID_STATE_CHECK'] == Constants::$STATE_CHECK_PROCESS_WITH_INCUMBENT ||$reserve['ID_STATE_CHECK'] == Constants::$STATE_CHECK_PROCESS_WITHOUT_INCUMBENT)){ ?>
                    <td><?= $id; ?></td>
                    <td colspan="6"></td>
                    <td>
                        <!-- insertar mas -->
                        <a href="reserve/search/<?= $reserve['ID_CHECK'] ?>"
                           class="btn btn-xs btn-success"><i class="fa fa-plus"></i></a>
                        <!-- editar titular -->
                        <a href="reserve/editIncumbent/<?= $reserve['ID_CHECK'] ?>"
                           class="btn btn-xs btn-<?= $reserve['ID_STATE_CHECK'] == 7 ? 'warning' : 'info' ?>">
                            <i class="fa fa-edit"></i></a>
                        <!-- eliminar reserva -->
                        <a href="reserve/deleteCheck/<?= $reserve['ID_CHECK'] ?>"
                           class="btn btn-xs btn-danger"
                           onclick="return validLink('reserve/deleteCheck/<?= $reserve['ID_CHECK'] ?>','Eliminar Registro Check','Todo el registro de ingreso sera cancelado y eliminado','error')">
                            <i class="fa fa-close"></i>
                        </a>
                        <!-- guardar reserva -->
                        <a href="reserve/saveReserve/<?= $reserve['ID_CHECK'] ?>"
                           class="btn btn-xs btn-primary <?= ($reserve['ID_STATE_CHECK'] == 7 || $reserve['ACTIVE_CONSUME_SERVICE'] == 0) ? 'disabled' : '' ?>"
                           onclick="return validLink('reserve/saveReserve/<?= $reserve['ID_CHECK'] ?>','Desea guardar el registro?','Todo el registro de ingreso sera cancelado y eliminado','success')">
                            <i class="fa fa-save"></i>
                        </a>
                    </td>
					<?php } ?>
					<?php if($reserve['ID_STATE_CHECK'] == Constants::$STATE_CHECK_FINISHED||$reserve['ID_STATE_CHECK'] == ($reserve['ID_STATE_CHECK'] == Constants::$STATE_CHECK_PENDING||$reserve['ID_STATE_CHECK'] == Constants::$STATE_CHECK_ACTIVE)){ ?>
                        <td><?= $id; ?></td>
                        <td>
                            (<?= $reserve['TIME_START_CHECK']; ?>)<br>
                            <em><?= $reserve['DATE_START_CHECK'] ?></em>
                        </td>
                        <td>
                            (<?= $reserve['TIME_END_CHECK']; ?>)<br>
                            <em><?= $reserve['DATE_END_CHECK'] ?></em>
                        </td>
                        <td><?=$reserve['ID_TYPE_CHECK']==Constants::$TYPE_CHECK_IN?'Check':'Reserva'?></td>
                        <td>
                            <?php
                            $totalPrice=0;
                            foreach($listReserveHistory as $reservePrice){
                            	if ($id==$reservePrice['ID_CHECK'])
                                    $totalPrice+=$reservePrice['PRICE_CONSUME_SERVICE'];
                            }
	                        echo $totalPrice;?>
                        </td>
                        <td>
	                        <?php
	                        $totalPay=0;
	                        foreach($listReserveHistory as $reservePay){
		                        if ($id==$reservePay['ID_CHECK'])
		                            $totalPay+=$reservePay['PAY_CONSUME_SERVICE'];
	                        }
	                        echo $totalPay;?>
                        </td>
                        <td>
                            <?php if ($reserve['ID_STATE_CHECK'] == Constants::$STATE_CHECK_FINISHED){?>
                            <label for="" class="label label-primary">Finalizado</label>
                            <?php }?>
                            <?php if ($reserve['ID_STATE_CHECK'] == Constants::$STATE_CHECK_ACTIVE){?>
                            <label for="" class="label label-success">Activo</label>
                            <?php }?>

                                <?php if ($reserve['ID_STATE_CHECK'] == Constants::$STATE_CHECK_PENDING){?>
                            <label for="" class="label label-warning">Pendiente</label>
                            <?php }?>
                        </td>
                        <td>
                        <a href="checkIn/show/<?= $reserve['ID_CHECK'] ?>"
                           class="btn btn-xs btn-primary">
                            <i class="fa fa-eye"></i>
                        </a>
                    </td>
					<?php } ?>
                </tr>
				<?php } ?>
                <!-- informacion de consumo -->
				<?php if($reserve['ID_STATE_CHECK'] != 6){ ?>
                <tr>
                    <td colspan="3"></td>
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
                           class="btn btn-xs btn-info"
                           name="show">
                            Ver <i class="fa fa-edit"></i>
                        </a>
						<?php } ?>
                    </td>
                </tr>
				<?php } ?>
				<?php } ?>
                </tbody>
            </table>
        </div>
    </div>
	<?php }
	else{ ?>
    <div class="thumbnail">
        <img src="img/404/caja-vacia.jpg"
             class="app-img-5 center-block"
             alt="No existen datos disponibles">
        <h4 class="text-center">No existe reservas pendientes</h4>
    </div>
	<?php } ?>
</section>

<?php }?>