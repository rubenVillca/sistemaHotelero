<!--section de lista de reservas realizadas-->
<section>
    <div class="app-color-white animated fadeInUp">

        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="bg-info">
                <tr>
                    <th>Nro.</th>
                    <th>Ingreso</th>
                    <th>Salida</th>
                    <th>Servicio</th>
                    <th>Adultos</th>
                    <th>Ni&ntilde;os</th>
                    <th>Monto</th>
                    <th>Estado</th>
                </tr>
                </thead>
                <tbody>
				<?php if(!empty($listReserve)){ ?>
				<?php
				$id = 0;
				foreach(is_array($listReserve) ? $listReserve : array() as $reserve){
				if($id != $reserve['ID_CHECK']){
				$id = $reserve['ID_CHECK']; ?>
                <tr class="warning">
                    <td colspan="7"><b>N&uacute;mero de registro: <?= $id; ?></b></td>
                    <td colspan="1">
						<?php if($reserve['ID_STATE_CHECK'] == 3){ ?>
                        <a href="reserve/checkInfo/<?= $reserve['ID_CHECK']; ?>"
                           class="btn btn-sm btn-info"
                           name="update">
                            Verificar <i class="fa fa-edit"></i>
                        </a>
						<?php } ?>
                    </td>
                </tr>
				<?php } ?>
                <tr>
                    <td><?= $reserve['ID_CHECK'] ?></td>
                    <td><?= $reserve['DATE_START_CHECK'] ?></td>
                    <td><?= $reserve['DATE_END_CHECK'] ?></td>
                    <td><?= $reserve['NAME_SERVICE'] ?></td>
                    <td><?= $reserve['UNIT_ADULT_ROOM_MODEL'] ?></td>
                    <td><?= $reserve['UNIT_BOY_ROOM_MODEL'] ?></td>
                    <td><?= $reserve['PRICE_CONSUME_SERVICE']; ?></td>
                    <td><?= $reserve['NAME_STATE_CHECK']; ?></td>
                </tr>
				<?php } ?>
				<?php }
				else{ ?>
                <tr>
                    <td colspan="8">
                        <h4 class="text-center">No existen reservas pendientes</h4>
                    </td>
                </tr>
				<?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>