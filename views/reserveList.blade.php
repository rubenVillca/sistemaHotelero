<?php if ($_SESSION['TYPE_USER']==Constants::$TYPE_USER_CLIENT){
    require_once "views/fragment/search/searchServiceReserve.blade.php";
 }?>
<!--section de lista de reservas realizadas-->
<section>
    <!-- lista de reservas -->
    <div class="app-color-white animated fadeIn">
        <div class="container-fluid">
            <div class="">
                <h3 class="text-primary">Reservas y registros</h3>
            </div>
            <hr>
	        <?php if (!empty($listReserve)) { ?>
		<?php foreach ($listReserve as $check) { ?>
            <div class="panel-body">
                <p><b class="text-primary">Id de registro: </b><?= $check['ID_CHECK']; ?></p>
	            <?php if ($_SESSION['TYPE_USER']!=Constants::$TYPE_USER_CLIENT){?>
                <p><b class="text-primary">Nombre del Cliente: </b><?= $check['NAME_PERSON'] . ' ' . $check['LAST_NAME_PERSON']; ?></p>
                <p><b class="text-primary">Genero: </b><?= $check['SEX_PERSON'] == 0 ? 'Mujer' : 'Hombre'; ?></p>
                <p><b class="text-primary">Fecha de nacimiento: </b><?= $check['DATE_BORN_PERSON']; ?></p>
                <p><b class="text-primary">Email: </b><?= $check['EMAIL_PERSON'] ?></p>
                <p><b class="text-primary">Tipo de registro: </b><?= $check['ID_TYPE_CHECK']==Constants::$TYPE_CHECK_IN?'Check - In':'Reserva' ?></p>
	            <?php }?>
                <p><b class="text-primary">Estadia: </b><?= "$check[DATE_START_CHECK] ($check[TIME_START_CHECK]) a $check[DATE_END_CHECK] ($check[TIME_END_CHECK])" ?></p>
                <p><b class="text-primary">Observaciones: </b><?= empty($check['OBSERVATIONS_CHECK'])?'No hay observaciones':$check['OBSERVATIONS_CHECK'] ?></p>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th colspan="6"></th>
                            <th>
                                <a href="checkIn/show/<?= $check['ID_CHECK']; ?>" class="btn btn-sm btn-primary">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <?php if (isset($_SESSION['TYPE_USER'])&&($_SESSION['TYPE_USER']==Constants::$TYPE_USER_ADMIN||$_SESSION['TYPE_USER']==Constants::$TYPE_USER_RECEPTION)){?>
                                    <a href="reserve/editReserve/<?= $check['ID_CHECK']; ?>" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <?php if ($check['is_room_select']) { ?>
                                    <a href="checkIn/insert_dd/<?= $check['ID_CHECK'] ?>"
                                       onclick="return validLink('checkIn/insert_dd/<?= $check['ID_CHECK'] ?>','Guardar','¿Registrar ingreso check-in al hotel?','success')"
                                       class="btn btn-sm btn-primary">
                                        <i class="fa fa-save"></i>
                                    </a>
                                    <?php } else { ?>
                                    <button class="btn btn-sm btn-danger" disabled>
                                        <i class="fa fa-save"></i>
                                    </button>
                                    <?php } ?>
                                <?php } ?>
	                            <?php if (isset($_SESSION['TYPE_USER'])&&($_SESSION['TYPE_USER']==Constants::$TYPE_USER_CLIENT)){?>
                                    <a href="reserve/editIncumbent/<?= $check['ID_CHECK'] ?>"
                                       onclick="return validLink('reserve/editIncumbent/<?= $check['ID_CHECK'] ?>','Guardar','¿Registrar ingreso check-in al hotel?','success')"
                                       class="btn btn-sm btn-primary">
                                        <i class="fa fa-save"></i>
                                    </a>
                                <?php } ?>
                            </th>
                        </tr>
                        <tr>
                            <th>Servicio</th>
                            <th>Habitaci&oacute;n</th>
                            <th>Precio</th>
                            <th>Pagado</th>
                            <th>Tipo</th>
                            <th>Tiempo</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
						<?php foreach ($check['list_consum'] as $consumRoom) { ?>
						<?php for ($x = 0; $x < $consumRoom['UNIT_CONSUME_SERVICE']; $x++) { ?>
                        <tr>
                            <td><?= $consumRoom['NAME_SERVICE'] ?></td>
                            <td><?php foreach ($consumRoom['list_room'] as $room) {
									echo $room['NAME_ROOM'] . ' ';
								} ?></td>
                            <td><?= $x == 0 ? $consumRoom['PRICE_CONSUME_SERVICE'] : '' ?></td>
                            <td><?= $x == 0 ? $consumRoom['PAY_CONSUME_SERVICE'] : '' ?></td>
                            <td><?= $consumRoom['NAME_TYPE_CONSUME'] ?></td>
                            <td>
	                            <?php
	                            $start = new DateTime($check['DATE_START_CHECK'] . ' ' . $check['TIME_START_CHECK']);
	                            $now = new DateTime(date('Y-m-d H:i:s', strtotime('+15 minute', strtotime(date('Y-m-d H:i:s')))));
	                            $interval = date_diff($now, $start);
	                            ?>
	                            <?php if ($now >= $start) { ?>
                                    <?php if (isset($_SESSION['TYPE_USER'])&&$_SESSION['TYPE_USER']==Constants::$TYPE_USER_ADMIN||$_SESSION['TYPE_USER']==Constants::$TYPE_USER_RECEPTION){?>
                                        <i class="fa fa-check"></i>
		                            <?php }else{?>
                                    	<h6 class="text-success">No disponible</h6>
		                            <?php }?>
	                            <?php } else {?>
                                <h6 class="text-danger">Disponible en: <br> <?= $interval->format('%a días, %h horas, %i minutos') ?></h6>
	                            <?php } ?>
                            </td>
                            <td>
                                <a href="consume/show/<?=$consumRoom['ID_CONSUME_SERVICE']?>"
                                   class="btn btn-sm btn-primary">
                                    <span class="fa fa-eye"></span>
                                </a>
	                            <?php if ($now >= $start) { ?>
                                    <?php if (isset($_SESSION['TYPE_USER'])&&$_SESSION['TYPE_USER']==Constants::$TYPE_USER_ADMIN||$_SESSION['TYPE_USER']==Constants::$TYPE_USER_RECEPTION){?>
                                    <a href="reserve/editReserveTeam/<?= $consumRoom['ID_CONSUME_SERVICE'] ?>"
                                       class="btn btn-sm btn-<?= $consumRoom['ACTIVE_CONSUME_SERVICE'] == 1 && !empty($consumRoom['list_room']) ?
                                           'primary' : 'warning' ?>">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <?php }else{?>
                                        <a href="reserve/editConsume/<?=$consumRoom['ID_CONSUME_SERVICE']?>"
                                           class="btn btn-sm btn-primary">
                                            <span class="fa fa-edit"></span>
                                        </a>
                                    <?php }?>
	                            <?php }?>
                            </td>
                        </tr>
						<?php } ?>
						<?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <hr>
		<?php } ?>
		<?php } else { ?>
        <div class="thumbnail">
            <img src="img/404/caja-vacia.jpg" class="app-img-5 center-block" alt="No existen datos disponibles">
            <h4 class="text-center">No hay reservas activa</h4>
        </div>
		<?php } ?>
        </div>
    </div>
</section>
