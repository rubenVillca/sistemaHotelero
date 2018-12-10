<!--Lista de mensajes-->
<section>
	<div class="app-color-white">
		<!-- lista de mensajes -->
		<br>
		<label class="bg bg-primary btn-block btn-compose-email text-center">
			<?= isset($tittle) ? $tittle : 'Mensajes'; ?>
		</label>
		<hr>
		<ul class="nav">
			<?php $i = isset($idListMesaje) ? ($idListMesaje-1)*10 : 0;
			if (isset($menuMesajes) && !empty($menuMesajes)) {
			foreach ($menuMesajes as $mesajeItem) { ?>
			<li value='<?= $i+1 ?>'
			    class='<?= $mesajeItem['STATE_MESSAGE'] == 1 ? 'app-color-5' : '' ?> <?= $mesajeItem['STATE_MESSAGE'] == 1 ? 'mark' : '' ?> animated zoomIn'>
				<a href="messages/show/<?= !empty($menuType) ? $menuType : 0; ?>/<?= $mesajeItem['ID_MESSAGE'] ?>/<?= isset($idListMesaje) ? $idListMesaje : 0; ?>"
				   class='btn-link app-underline text-left btn-block'>
					<span class="app-text-color-black">
						<span><?= ($i+1).'. '; ?></span>
						<span class="text-info"><?= Helper::camelUpperCase(substr($mesajeItem['TITTLE_MESSAGE'], 0, 35)); ?></span>
					</span>
					<span class="fa fa-star<?= $mesajeItem['STATE_MESSAGE'] == 1 ? '' : '-empty' ?> pull-right"></span>
					<i class="app-text-color-gray">- <?= $mesajeItem['NAME_USER']; ?></i>
					<span class="app-text-color-gray date hidden-xs hidden-sm hidden-md">
						Enviado el: <em><?= $mesajeItem['DATE_MESSAGE'].' ('.$mesajeItem['TIME_MESSAGE'].')' ?></em>
					</span>

				</a>
			</li>
			<?php $i++;
			}
			} else { ?>
			<li>
				<div class="thumbnail">
					<img src="img/404/caja-vacia.jpg"
					     class="app-img-5 center-block"
					     alt="No existen datos disponibles">
					<h4>No ha recibido mensajes de tipo <?= isset($tittle) ? $tittle : 'Mensajes'; ?></h4>
				</div>
			</li>
			<?php } ?>
		</ul>
		<div class="panel panel-footer">
			<div class="btn-toolbar"
			     role="toolbar">
				<div class="btn-group pull-right">
					<?php
					$n = isset($nButtonToolBar) ? count($nButtonToolBar)/10+1 : 1;
					for ($i = 1; $i<=$n; $i++) { ?>
					<a href="messages/show/<?= !empty($menuType) ? $menuType : 0; ?>/<?= 0 ?>/<?= $i; ?>"
					   name="idListMesaje"
					   class="btn btn-info">
						<?= $i ?>
					</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>