<!--Historial de checkin NO USADDI-->
<section>
    <div class="app-color-white animated fadeInUp">
		<?php if(isset($listReserveHistory) && !empty($listReserveHistory)) { ?>
        <div class="page-header">
            <h3 class="text-center">Lista de Reservas activas</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="bg-info">
                <tr>
                    <th>ID.</th>
                    <th>Ingreso</th>
                    <th>Salida</th>
                    <th>Servicio</th>
                    <th>Adultos</th>
                    <th>Ni&ntilde;os</th>
                    <th>Monto</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
				<?php $id = 0;
				foreach(is_array($listReserveHistory) ? $listReserveHistory : array() as $reserve) {
				if($id != $reserve['ID_CHECK']) {//si es diferente idCheck
				$id = $reserve['ID_CHECK']; ?>
                <tr class="warning">
                    <td colspan="8"><b>N&uacute;mero de reserva: <?= $id; ?></b></td>
                    <!-- Opciones de la check -->
                    <td colspan="1">
                        <div class="row">
                            <a href="consume/checkIn/<?= $reserve['ID_CHECK']; ?>"
                               class="btn btn-sm btn-success">
                                <i class="fa fa-edit"></i> Registrar
                            </a>
                        </div>
                    </td>
                </tr>
				<?php } ?>
                <tr>
                    <td><?= $reserve['ID_CHECK'] ?></td>
                    <td><?= $reserve['DATE_START_CHECK'].' '.$reserve['TIME_START_CHECK']; ?></td>
                    <td><?= $reserve['DATE_END_CHECK'].' '.$reserve['TIME_END_CHECK']; ?></td>
                    <td><?= $reserve['NAME_SERVICE'] ?></td>
                    <td><?= $reserve['UNIT_ADULT_ROOM_MODEL'] ?></td>
                    <td><?= $reserve['UNIT_BOY_ROOM_MODEL'] ?></td>
                    <td><?= $reserve['PAY']; ?></td>
                    <td class="success"><?= $reserve['NAME_STATE_CHECK'] ?></td>
                    <td>
                        <!-- opciones del consumo -->
                        <form action="reserve/check" method="post">
                            <input type="text"
                                   name="idCheck"
                                   value="<?= $reserve['ID_CHECK']; ?>"
                                   class="hidden"
                                   title="">
                            <input type="text"
                                   name="idConsum"
                                   value="<?= $reserve['ID_CONSUME_SERVICE'] ?>"
                                   class="hidden"
                                   title="">
                            <button type="submit" class="btn btn-sm btn-info" name="show">
                                Ver <i class="fa fa-edit"></i>
                            </button>
                        </form>
                    </td>
                </tr>
				<?php } ?>
                </tbody>
            </table>
        </div>
		<?php }
		else { ?>
        <h4 class="text-center">No existen reservas pendientes</h4>
		<?php } ?>
    </div>
</section>