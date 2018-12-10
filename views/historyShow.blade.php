<!--Tabla del historial-->
<section>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 animated fadeInUp">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Historial de consumos</h3>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="bg-success">
                    <tr>
                        <th>Id</th>
                        <th>Imagen</th>
                        <th>Servicio</th>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th>Costo</th>
                        <th>Estado</th>
                        <th>Reserva</th>
                        <th>Habitacion</th>
                        <th>Puntos</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php if (!empty($consumeService) || !empty($consumeFood)) {?>
                    <!-- lista de servicios consumidos -->
                    <?php $totalConsume=0;?>
					<?php foreach (!empty($consumeService) ? $consumeService : array() as $consume){?>
                    <?php $totalConsume+=$consume['PAY_CONSUME_SERVICE'];?>
                    <tr>
                        <td><?=$consume['ID_CONSUME_SERVICE']?></td>
                        <td><img src="<?= $consume['IMAGE_SERVICE'] ?>" alt="Servicio" class="app-img-1"></td>
                        <td><?=$consume['NAME_SERVICE']?></td>
                        <td><?=$consume['DATE_START_CONSUME_SERVICE'] . ' ' . $consume['TIME_START_CONSUME_SERVICE']?></td>
                        <td><?=$consume['DATE_END_CONSUME_SERVICE'] . ' ' . $consume['TIME_END_CONSUME_SERVICE']?></td>
                        <td>(<?=$consume['NAME_TYPE_MONEY']?>)<?=$consume['PAY_CONSUME_SERVICE']?></td>
                        <td>
                            <span class=" label label-<?=$consume['ACTIVE_CONSUME_SERVICE'] == 0 ? 'success' :
                                ($consume['ACTIVE_CONSUME_SERVICE'] < 0 ? 'danger' : 'primary');?>">
                                <?=$consume['ACTIVE_CONSUME_SERVICE'] == 0 ? 'Pendiente' :
                                    ($consume['ACTIVE_CONSUME_SERVICE'] < 0 ? 'Cancelado' : 'Consumido');?>
                            </span>
                        </td>
                        <td>
                            <span class="fa fa-<?= $consume['VALUE_TYPE_CONSUME'] == Constants::$VALUE_TYPE_CONSUME_RESERVE ?
								'check' : 'ban';?>"></span>
                        </td>
                        <td><?= empty($consume['room']) ? '' : $consume['room'][0]['NAME_ROOM']?></td>
                        <td><?= $consume['POINT_OBTAIN_COST_SERVICE'] - $consume['POINT_REQUIRED_COST_SERVICE']?></td>
                    </tr>
					<?php }?>
                    <!-- lista de alimentos consumidos -->
					<?php foreach (!empty($consumeFood) ? $consumeFood : array() as $consumeFood){?>
                    <?php $totalConsume=$consumeFood['PAY_COST_FOOD']?>
                    <tr>
                        <td><?=$consumeFood['ID_CHECK']?></td>
                        <td><img src="<?= $consumeFood['IMAGE_FOOD'] ?>" alt="Servicio" class="app-img-1"></td>
                        <td>Alimentos</td>
                        <td><?=$consumeFood['DATE_CONSUME_FOOD'] . ' ' . $consumeFood['TIME_CONSUME_FOOD']?></td>
                        <td></td>
                        <td>(<?=$consumeFood['NAME_TYPE_MONEY']?>)<?=$consumeFood['PRICE_COST_FOOD']?></td>
                        <td>
                                <span class=" label label-<?=$consumeFood['STATE_CONSUME_FOOD'] == 0 ? 'success' :
	                                ($consumeFood['STATE_CONSUME_FOOD'] < 0 ? 'danger' : 'primary');?>">
                                    <?=$consumeFood['STATE_CONSUME_FOOD'] == 0 ? 'Pendiente' :
		                                ($consumeFood['STATE_CONSUME_FOOD'] < 0 ? 'Cancelado' : 'Consumido');?>
                                </span>
                        </td>
                        <td>
                            <span class="fa fa-<?= empty($consumeFood['reserve']) ? 'ban' : 'check';?>"></span>
                        </td>
                        <td><?= $consumeFood['SITE_CONSUME_FOOD']?></td>
                        <td><?= $consumeFood['POINT_OBTAIN_COST_FOOD'] - $consumeFood['POINT_REQUIRED_COST_FOOD']?></td>
                    </tr>
					<?php }?>
                            <tr>
                                <td colspan="2"><b>TOTAL CONSUMO</b></td>
                                <td colspan="4"><p class="pull-right"><?= $totalConsume?></p></td>
                            </tr>

					<?php }else{?>
                    <tr>
                        <td colspan="9" class="text-center">No tiene consumos registrado</td>
                    </tr>
					<?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>