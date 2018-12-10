<section class="animated fadeInUpBig app-color-white container-fluid">
    <div class="row">
        <?php require_once 'fragment/consume/consumeTitular.blade.php'?>
    </div>
    <hr>
    <div class="">
        <div class="">
            <h4 class="text-primary"><span class="fa fa-users"></span> Lista de clientes registrados</h4>
        </div>
        <div class="">
        <?php $i = 0;
        $id = 0;
        $i++;
        $id = $listConsum[0]['ID_CHECK']; ?>
        <!-- opciones del check -->
            <?php if ($listConsum[0]['ID_STATE_CHECK'] == 5 || $listConsum[0]['ID_STATE_CHECK'] == 7) { ?>
            <div class="pull-right">
                <a href="checkIn/search/<?= $listConsum[0]['ID_CHECK']; ?>" class="btn btn-sm btn-success">
                    <i class="fa fa-lg fa-plus"></i>
                    <br>Añadir
                </a>
                <!-- insertConsum, edit, cancel, save check -->
                <a href="checkIn/edit/<?= $listConsum[0]['ID_CHECK']; ?>" class="btn btn-sm btn-<?= $listConsum[0]['ID_STATE_CHECK'] == '7' ? 'warning' : 'info'; ?>">
                    <i class="fa fa-lg fa-edit"></i>
                    <br>Editar
                </a>
                <a href="checkIn/delete_dd/<?= $listConsum[0]['ID_CHECK']; ?>" class="btn btn-sm btn-danger"
                   onclick="return validLink('checkIn/delete_dd/<?= $listConsum[0]['ID_CHECK']; ?>','Eliminar Registro Check','Todo el registro de ingreso sera cancelado y eliminado','error')">
                    <i class="fa fa-lg fa-remove"></i>
                    <br>Cancelar
                </a>
                <?php if ($isRegistrable){?>
                <a href="checkIn/insert_dd/<?= $listConsum[0]['ID_CHECK']; ?>" class="btn btn-sm btn-primary"
                   onclick="return validLink('checkIn/insert_dd/<?= $listConsum[0]['ID_CHECK']; ?>','¿Terminar registro?','El huesped quedará registrado en el hotel','warning')">
                    <i class="fa fa-lg fa-save"></i>
                    <br>Guardar
                </a>
                <?php }else{?>
                <a class="btn btn-sm btn-primary" disabled>
                    <i class="fa fa-lg fa-save"></i>
                    <br>Guardar
                </a>
                <?php }?>
            </div>
            <?php } ?>
        </div>
        <div class="clearfix"></div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Estado</th>
                    <th>Servicio</th>
                    <th>Habitaci&oacute;n</th>
                    <th>Personas</th>
                    <th>Precio</th>
                    <th>Pagado</th>
                    <th>Opcion</th>
                </tr>
                </thead>
                <tbody>
				<?php if (!empty($listConsum)) { ?>
				<?php $i = 0;
				$id = 0;
				foreach ($listConsum as $consum) {
				$i++;
				if ($id != $consum['ID_CHECK']) {//si es diferente idCheck
				$id = $consum['ID_CHECK']; ?>
				<?php } ?>
                <tr>
                    <td><?=$consum['ID_CONSUME_SERVICE']?></td>
                    <td>
                        <label class="label label-<?=$consum['ID_STATE_CHECK'] == 1 ? 'primary' : 'danger'?>">
							<?= $consum['NAME_STATE_CHECK'] ?>
                        </label>
                    </td>
                    <td><?= $consum['NAME_SERVICE'] ?></td>
                    <td><?= $consum['NAME_ROOM'] ?></td>
                    <td>
						<?= $consum['UNIT_ADULT_ROOM_MODEL'] ?> Adultos <br>
						<?= $consum['UNIT_BOY_ROOM_MODEL'] ?> Niños
                    </td>
                    <td><?= $consum['NAME_TYPE_MONEY'] . ' ' . $consum['PRICE_CONSUME_SERVICE']; ?></td>
                    <td><?= $consum['NAME_TYPE_MONEY'] . ' ' . $consum['PAY_CONSUME_SERVICE']; ?></td>
                    <td>
                        <!-- opciones del consumo -->
						<?php if ($consum['ID_STATE_CHECK'] == 5 || $consum['ID_STATE_CHECK'] == 7) { ?>
                        <a href="checkTeam/edit/<?= $consum['ID_CONSUME_SERVICE']; ?>"
                           class="btn btn-xs btn-<?= $consum['ACTIVE_CONSUME_SERVICE'] == 0 ? 'warning' : 'primary' ?>">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="checkIn/deleteConsume_dd/<?= $consum['ID_CONSUME_SERVICE']; ?>"
                           class="btn btn-xs btn-danger"
                           onclick="return validLink('checkIn/deleteConsume_dd/<?= $consum['ID_CONSUME_SERVICE']; ?>','Eliminar Consumo','El consumo se eliminara','error')">
                            <i class="fa fa-minus"></i>
                        </a>
						<?php } else { ?>
                        <a href="consume/show/<?= $consum['ID_CONSUME_SERVICE'] ?>" class="btn btn-xs btn-primary">
                            <i class="fa fa-eye"></i>
                        </a>
						<?php } ?>
                    </td>
                </tr>
				<?php } ?>
				<?php } else { ?>
                <tr>
                    <td colspan="8">
                        <h3 class="text-center">No hay clientes registrado actualmente</h3>
                    </td>
                </tr>
				<?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
