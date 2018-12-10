<section>
    <div class="panel panel-primary animated fadeInUp">
        <div class="panel-heading">
            <h4 class="panel-title">Ordenes de alimentos pendientes</h4>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="bg-info">
                <tr>
                    <th>Nro</th>
                    <th>Húesped</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Costo</th>
                    <th>Alimento</th>
                    <th>Unidades</th>
                    <th>Lugar</th>
                    <th>Pedido</th>
                </tr>
                </thead>
                <tbody>
				<?php if (!empty($listOrder)){?>
				<?php foreach($listOrder as $order){?>
                <tr>
                    <td><?= $order['ID_CONSUME_FOOD']?></td>
                    <td><?= $order['NAME_PERSON'] . ' ' . $order['LAST_NAME_PERSON']?></td>
                    <td><?= $order['DATE_CONSUME_FOOD']?></td>
                    <td><?= $order['TIME_CONSUME_FOOD']?></td>
                    <td><?= $order['PRICE_CONSUME_FOOD']?></td>
                    <td><?= $order['NAME_FOOD']?></td>
                    <td><?= $order['UNIT_CONSUME_FOOD']?></td>
                    <td><?= $order['SITE_CONSUME_FOOD']?></td>
                    <td>
						<?php if ($order['STATE_CONSUME_FOOD'] == 0){?>
                        <a href="order/insert_dd/<?=$order['ID_CONSUME_FOOD']?>" class="btn btn-primary"
                           onclick="return validLink('order/insert_dd/<?=$order['ID_CONSUME_FOOD']?>','Enviar producto','Enviar el alimento <?=$order['NAME_FOOD']?> al lugar <?=$order['SITE_CONSUME_FOOD']?>','success' )">
                            <span class="fa fa-coffee"></span>
                            Enviar
                        </a>
						<?php }else{?>
                        <div class="bg-success">Enviado</div>
						<?php }?>
                    </td>
                </tr>
				<?php }?>
				<?php }else{?>
                <tr>
                    <td colspan="9">
                        <p class="text-center">No existen Ordenes de alimentos pendientes</p>
                    </td>
                </tr>
				<?php }?>
                </tbody>
            </table>
        </div>
    </div>
</section>