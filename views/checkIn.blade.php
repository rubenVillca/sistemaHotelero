<?php if (!isset($isListFinish)) { ?>
<?php require_once "views/fragment/search/searchServiceCheckIn.blade.php"; ?>
<?php }?>
<section>
    <div class="app-color-white">
        <div class="container-fluid">
            <h3 class="text-primary">Registro de entradas y salidas</h3>
        </div>
        <hr>
        <div class="table-responsive">
            <div class="col-xs-12 col-sm-12 col-md-5 col-md-offset-7 col-lg-5 col-lg-offset-7">
                <div class="form-group pull-right">
                    <input type="text" class="search form-control" placeholder="Buscar">
                </div>
                <span class="counter pull-right"></span>
            </div>
            <table class="table table-hover results">
                <thead>
                <tr>
                    <th class="input-sm"><p>Id</p></th>
                    <th class="input-sm"><p>Cliente</p></th>
                    <th class="input-sm"><p>Tipo</p></th>
                    <th class="input-sm"><p>Estado</p></th>
                    <th class="input-sm"><p>Ingreso</p></th>
                    <th class="input-sm"><p>Salida</p></th>
                    <th class="input-sm"><p>Total hab.</p></th>
                    <th class="input-sm"><p>Precio</p></th>
                    <th class="input-sm"><p>Pagado</p></th>
                    <th class="input-sm"><p>Tiempo</p></th>
                    <th class="input-sm"><p>Opcion</p></th>
                </tr>
                </thead>
                <tbody>
				<?php if (!empty($listConsum)) :
				$i = 0;
				foreach ($listConsum as $consum) :
				$i++;?>
                <tr>
                    <td class="input-sm"><p><b><?= $consum['ID_CHECK']; ?></b></p></td><!-- id -->
                    <td class="input-sm"><p><?=$consum['NAME_PERSON'] . ' ' . $consum['LAST_NAME_PERSON']?></p></td><!-- nombre -->
                    <td class="input-sm"><p><?=$consum['ID_TYPE_CHECK'] == Constants::$TYPE_CHECK_RESERVE ? 'Reserva' :
								'Check-In'?></p></td><!-- tipo -->
                    <td class="input-sm"><?php switch ($consum['ID_STATE_CHECK']) {
							case Constants::$STATE_CHECK_ACTIVE:
								echo "<p class='label label-success'>Activo</p>";
								break;
							case Constants::$STATE_CHECK_FINISHED:
								echo "<p class='label label-primary'>Terminado</p>";
								break;
							case Constants::$STATE_CHECK_CANCEL:
								echo "<p class='label label-danger'>Cancelado</p>";
								break;
							case Constants::$STATE_CHECK_DENIED:
								echo "<p class='label label-danger'>Denegado</p>";
								break;
							case Constants::$STATE_CHECK_DELETE_AUTOMATIC:
								echo "<p class='label label-danger'>Auto-Cancelado</p>";
								break;
							case Constants::$STATE_CHECK_PENDING:
								echo "<p class='label label-primary'>Pendiente</p>";
								break;
							case Constants::$STATE_CHECK_PROCESS_WITHOUT_INCUMBENT:
								echo "<p class='label label-warning'>En proceso</p>";
								break;
							case Constants::$STATE_CHECK_PROCESS_WITH_INCUMBENT:
								echo "<p class='label label-warning'>En proceso</p>";
								break;
							default:
								echo "<label class='label label-primary'>Error</label>";
								break; ?>
                        <?php }?>
                    </td><!-- estado -->
                    <td class="input-sm"><p><?=$consum['DATE_START_CHECK']?></p></td><!-- fecha ingreso -->
                    <td class="input-sm"><p><?=$consum['DATE_END_CHECK']?></p></td><!-- fecha salida -->
                    <td class="input-sm"><?=$consum['roomTotal']?></td><!-- cantidad de habitaciones -->
                    <td class="input-sm"><?=$consum['priceTotal']?></td><!-- precio total -->
                    <td class="input-sm"><?=$consum['payTotal']?></td><!-- monto pagado -->
                    <td class="input-sm">
						<?php //checkIn
						if ($consum['ID_TYPE_CHECK'] == Constants::$TYPE_CHECK_IN && $consum['ID_STATE_CHECK'] == Constants::$STATE_CHECK_ACTIVE) {
							$end      = new DateTime($consum['DATE_END_CHECK'] . ' ' . $consum['TIME_END_CHECK']);
							$now      = new DateTime(date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s'))));
							$interval = date_diff($now, $end)->format('%a')>0?date_diff($now, $end)->format('%ad %hh %im'):date_diff($now, $end)->format('%hh %im');
							if ($now > $end) {
								echo "<p class=\"label label-warning\">- $interval</p>";
							} else {
								echo "<p class=\"label label-success\">$interval</p>";
							}
						}
						//reserve
						if ($consum['ID_TYPE_CHECK'] == Constants::$TYPE_CHECK_RESERVE && $consum['ID_STATE_CHECK'] == Constants::$STATE_CHECK_ACTIVE) {
							$end      = new DateTime($consum['DATE_END_CHECK'] . ' ' . $consum['TIME_END_CHECK']);
							$now      = new DateTime(date('Y-m-d H:i:s', strtotime('+1 hour', strtotime(date('Y-m-d H:i:s')))));
							$interval = date_diff($now, $end)->format('%a')>0?date_diff($now, $end)->format('%ad %hh %im'):date_diff($now, $end)->format('%hh %im');
							if ($now > $end) {
								echo "<p class=\"label label-danger\">- $interval</p>";
							} else {
								echo "<p class=\"label label-success\">$interval</p>";
							}
						}?>
                    </td><!-- tiempo -->
                    <td>
						<?php if ($consum['ID_TYPE_CHECK'] == Constants::$TYPE_CHECK_IN){?>
                            <a href="print/check/<?=$consum['ID_CHECK']?>" class="btn btn-xs btn-primary" target="_blank"><i class="fa fa-print"></i></a>
						<?php if ($consum['ID_STATE_CHECK'] == Constants::$STATE_CHECK_PROCESS_WITH_INCUMBENT || $consum['ID_STATE_CHECK'] == Constants::$STATE_CHECK_PROCESS_WITHOUT_INCUMBENT) { ?>
                        <a href="checkIn/panel/<?= $consum['ID_CHECK']; ?>" class="btn btn-xs btn-primary">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="checkIn/delete_dd/<?= $consum['ID_CHECK']; ?>"
                           class="btn btn-xs btn-danger"
                           onclick="return validLink('checkIn/delete_dd/<?= $consum['ID_CHECK']; ?>','Eliminar Registro Check','Todo el registro de ingreso sera cancelado y eliminado','error')">
                            <i class="fa fa-trash"></i>
                        </a>
						<?php }?>
						<?php if($consum['ID_STATE_CHECK'] == Constants::$STATE_CHECK_ACTIVE){?>
                            <a href="checkIn/show/<?= $consum['ID_CHECK'] ?>"
                               class="btn btn-xs btn-primary"
                               title="Ver registro">
                                <i class="fa fa-eye"></i>
                            </a>
                            <?php if ($now > $end){?>
                            <a href="checkOut/edit/<?= $consum['ID_CHECK'] ?>" class="btn btn-xs btn-danger" title="Registrar salida">
                                <i class="fa fa-sign-out"></i>
                            </a>
                            <?php }else{ ?>
                            <a class="btn btn-xs btn-danger" title="Registrar salida" disabled>
                                <i class="fa fa-sign-out"></i>
                            </a>
						<?php } ?>
						<?php } ?>
						<?php if($consum['ID_STATE_CHECK'] == Constants::$STATE_CHECK_FINISHED){?>
                        <a href="checkIn/show/<?=$consum['ID_CHECK']?>" class="btn btn-xs btn-primary">
                            <i class="fa fa-eye"></i>
                        </a>
						<?php } ?>
						<?php }?>
						<?php if ($consum['ID_TYPE_CHECK'] == Constants::$TYPE_CHECK_RESERVE) { ?>
                            <a href="print/reserve/<?=$consum['ID_CHECK']?>" class="btn btn-xs btn-primary" target="_blank"><i class="fa fa-print"></i></a>
						<?php if($consum['ID_STATE_CHECK'] == Constants::$STATE_CHECK_PROCESS_WITH_INCUMBENT || ($consum['ID_STATE_CHECK'] == Constants::$STATE_CHECK_PROCESS_WITHOUT_INCUMBENT)){ ?>
                        <?php if (strtotime($consum['DATE_START_CONSUME_SERVICE']) >= strtotime(date('Y-m-d'))) {?>
                        <a href="reserve/search/<?= $consum['ID_CHECK'] ?>" class="btn btn-xs btn-primary">
                            <i class="fa fa-plus"></i>
                        </a><!-- insertar mas -->
                        <?php }else{?>
                        <a class="btn btn-xs btn-primary" disabled>
                            <i class="fa fa-plus"></i>
                        </a><!-- insertar mas -->
                        <?php }?>
                        <a href="reserve/editIncumbent/<?= $consum['ID_CHECK'] ?>"
                           class="btn btn-xs btn-<?= $consum['ID_STATE_CHECK'] == Constants::$STATE_CHECK_PROCESS_WITHOUT_INCUMBENT ? 'warning' : 'info' ?>">
                            <i class="fa fa-edit"></i>
                        </a><!-- editar titular -->
                        <a href="reserve/deleteCheck/<?= $consum['ID_CHECK'] ?>"
                           class="btn btn-xs btn-danger"
                           onclick="return validLink('reserve/deleteCheck/<?= $consum['ID_CHECK'] ?>','Eliminar Registro Check','El registro de ingreso sera cancelado y eliminado','error')">
                            <i class="fa fa-close"></i>
                        </a><!-- eliminar reserva -->
                        <?php if ($consum['ID_STATE_CHECK'] == Constants::$STATE_CHECK_PROCESS_WITHOUT_INCUMBENT || $consum['ACTIVE_CONSUME_SERVICE'] == Constants::$STATE_CONSUME_INACTIVE){?>
                        <a class="btn btn-xs btn-success" disabled><i class="fa fa-check"></i></a><!-- guardar reserva -->
                        <?php }else{?>
                        <a href="reserve/saveReserve/<?= $consum['ID_CHECK'] ?>"
                           class="btn btn-xs btn-primary"
                           onclick="return validLink('reserve/saveReserve/<?= $consum['ID_CHECK'] ?>','Desea guardar el registro?','Todo el registro de ingreso sera cancelado y eliminado','success')">
                            <i class="fa fa-save"></i>
                        </a><!-- guardar reserva -->
                        <?php }?>
						<?php } ?>
						<?php if ($consum['ID_STATE_CHECK'] == Constants::$STATE_CHECK_ACTIVE) { ?>
                        <a href="reserve/show/<?= $consum['ID_CHECK'] ?>"
                           class="btn btn-xs btn-primary"
                           title="Ver Reserva">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="reserve/editReserve/<?= $consum['ID_CHECK'] ?>"
                           class="btn btn-xs btn-primary"
                           title="Editar informacin del titular de la reserva">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="reserve/delete_dd/<?= $consum['ID_CHECK'] ?>"
                           class="btn btn-xs btn-danger"
                           title="Eliminar reserva activa"
                           onclick="return validLink('checkIn/delete_dd/<?= $consum['ID_CHECK']; ?>','¿Cancelar reserva?','Cancelar la reserva con un monto extra','warning')">
                            <i class="fa fa-remove"></i>
                        </a>
                        <?php if ($now>$end){?>
                        <a href="reserve/show/<?= $consum['ID_CHECK'] ?>" class="btn btn-xs btn-success" title="Registrar ingreso">
                            <i class="fa fa-check"></i>
                        </a>
                        <?php }else{?>
                        <a class="btn btn-xs btn-success" title="Registrar ingreso" disabled>
                            <i class="fa fa-check"></i>
                        </a>
                        <?php }?>
						<?php } ?>
						<?php if ($consum['ID_STATE_CHECK'] == Constants::$STATE_CHECK_PENDING) { ?>
                        <a href="reserve/show/<?= $consum['ID_CHECK'] ?>"
                           class="btn btn-xs btn-primary"
                           title="Ver registro">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="reserve/checkInfo/<?= $consum['ID_CHECK'] ?>"
                           class="btn btn-xs btn-primary"
                           title="Validar registro">
                            <i class="fa fa-check"></i>
                        </a>
						<?php } ?>
						<?php } ?>

                        <?php if ($consum['ID_TYPE_CHECK'] == Constants::$TYPE_CHECK_OUT) {?>
                            <a href="print/check/<?=$consum['ID_CHECK']?>" class="btn btn-xs btn-primary" target="_blank"><i class="fa fa-print"></i></a>
                        <?php }?>
                    </td><!-- opciones -->
                </tr>
				<?php endforeach;
				else: ?>
                <tr>
                    <a href="checkIn/show/<?=$consum['ID_CHECK']?>" class="btn btn-xs btn-primary">
                        <i class="fa fa-eye"></i>
                    </a>
                </tr>
				<?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<script>
    $(document).ready(function () {
        $(".search").keyup(function () {
            var searchTerm = $(".search").val();
            var listItem = $('.results tbody').children('tr');
            var searchSplit = searchTerm.replace(/ /g, "'):containsi('")

            $.extend($.expr[':'], {
                'containsi': function (elem, i, match, array) {
                    return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
                }
            });

            $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function (e) {
                $(this).attr('visible', 'false');
            });

            $(".results tbody tr:containsi('" + searchSplit + "')").each(function (e) {
                $(this).attr('visible', 'true');
            });

            var jobCount = $('.results tbody tr[visible="true"]').length;
            $('.counter').text(jobCount + ' encontrado');

            if (jobCount == '0') {
                $('.no-result').show();
            }
            else {
                $('.no-result').hide();
            }
        });
    });
</script>
