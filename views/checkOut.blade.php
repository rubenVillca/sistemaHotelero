<section>
	<?php require_once "views/fragment/search/searchUser.blade.php";?>
    <br>
    <div class="panel panel-primary animated fadeInUp">
        <div class="panel-heading">
            <h4 class="panel-title">Hu&eacute;spedes registrados</h4>
        </div>
        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="bg-info">
                <tr>
                    <th>Id</th>
                    <th>Email</th>
                    <th>Ingreso</th>
                    <th>Salida</th>
                    <th>Tiempo restante</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
				<?php if (!empty($listCheckIn)) {
				$idCheckAux = '';
				foreach ($listCheckIn as $check) {
				if ($idCheckAux != $check['ID_CHECK']) {
				$idCheckAux = $check['ID_CHECK']; ?>
                <tr>
                    <td><?= $check['ID_CHECK'] ?></td>
                    <td><?= $check['check']['EMAIL_PERSON'] ?></td>
                    <td>
						<?= $check['DATE_START_CHECK'] ?><br>
						<?= $check['TIME_START_CHECK'] ?>
                    </td>
                    <td>
						<?= $check['DATE_END_CHECK'] ?><br>
						<?= $check['TIME_END_CHECK'] ?>
                    </td>
                    <td>
						<?php
						$end = new DateTime($check['DATE_END_CHECK'] . ' ' . $check['TIME_END_CHECK']);
						$now = new DateTime(date('Y-m-d H:i:s', strtotime('+1 hour', strtotime(date('Y-m-d H:i:s')))));
						$interval = date_diff($now, $end);
						?>
						<?php if ($now > $end) { ?>
                        <p class="label label-danger">
                            - <?= $interval->format('%a días, %h horas, %i minutos') ?></p>
						<?php } else { ?>
                        <p class="label label-success">
							<?= $interval->format('%a días, %h horas, %i minutos') ?></p>
						<?php } ?>
                    </td>
                    <td>
                        <a href="checkOut/edit/<?= $check['ID_CHECK'] ?>" class="btn btn-<?=($now > $end)?'primary':'danger'?>">
                            Registrar Salida <i class="fa fa-sign-out"></i>
                        </a>

                    </td>
                </tr>
				<?php }
				}
				} else { ?>
                <tr>
                    <td colspan="6">
                        <h3 class="text-center">No existen huspedes activos</h3>
                    </td>
                </tr>
				<?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
