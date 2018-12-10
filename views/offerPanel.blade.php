<section>
	<div class="app-color-white animated fadeIn">
		<div class="row">
			<div class="col-xs-12 col-sm-4 col-sm-offset-8 col-md-3 col-md-offset-9 col-lg-2 col-lg-offset-10">
				<a href="offer/insert/" class="btn btn-block btn-primary"><span class="fa fa-plus-circle"></span> Insertar Oferta</a>
			</div>
		</div>
		<hr>
		<?php if(!empty($offers)){ ?>
		<div class="table-responsive">
			<table class="table table-condensed">
				<thead>
				<tr>
					<th class="text-info hidden-xs hidden-sm">#</th>
					<th class="text-info">Nombre</th>
					<th class="text-info hidden-xs hidden-sm">Descripci&oacute;n</th>
					<th class="text-info">Reservas</th>
					<th class="text-info">Inicio</th>
					<th class="text-info">Fin</th>
					<th class="text-info">Tipo</th>
					<th class="text-info">Estado</th>
					<th class="text-info hidden-xs hidden-sm">Imagen</th>
					<th class="text-info">Operacion</th>
				</tr>
				</thead>
				<tbody>
				<?php $i = 0;
				foreach($offers as $offer){ ?>
				<tr>
					<td class="hidden-xs hidden-sm"><?= ++$i ?></td>
					<td><?= $offer['NAME_SERVICE'] ?></td>
					<td class="hidden-xs hidden-sm"><?= Helper::camelUpperCase($offer['DESCRIPTION_SERVICE']) ?></td>
					<td><i class="fa fa-<?= $offer['RESERVED_SERVICE'] == 1 ? 'check' : 'remove'; ?>"></i></td>
					<td class="text-center">
						(<?= $offer['TIME_INI_OFFER'] ?>)
						<br>
						<?= $offer['DATE_INI_OFFER'] ?>
					</td>
					<td class="text-center">
						(<?= $offer['TIME_FIN_OFFER'] ?>)
						<br>
						<?= $offer['DATE_FIN_OFFER'] ?>
					</td>
					<td><?= $offer['NAME_TYPE_SERVICE']; ?></td>
					<td><span class="label label-success"><?= $offer['NAME_STATE_SERVICE'] ?></span></td>
					<td class="hidden-xs hidden-sm">
						<img src="<?= $offer['IMAGE_SERVICE'] ?>"
						     alt="la imagen no esta disponible"
						     class="app-img-1">
					</td>
					<td>
						<a href="offer/edit/<?= $offer['ID_SERVICE']; ?>"
						   class="btn btn-primary btn-xs">
							<span class="fa fa-edit"></span>
						</a>
						<a href="offer/delete_dd/<?= $offer['ID_SERVICE']; ?>"
						   onclick="return validLink('offer/delete_dd/<?= $offer['ID_SERVICE']; ?>','Eliminar','Desea Eliminar la oferta \'<?=$offer['NAME_SERVICE']?>\'','error')"
						   class="btn btn-danger btn-xs">
							<span class="fa fa-remove"></span>
						</a>
					</td>
				</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
		<?php }
		else{ ?>
		<div class="thumbnail">
			<img src="img/404/caja-vacia.jpg"
			     class="app-img-5 center-block"
			     alt="No existen datos disponibles">
			<h4 class="text-center">No existen ofertas activas</h4>
		</div>
		<?php } ?>
	</div>
</section>