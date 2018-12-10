<!--seccion del contenido de las ofertas-->
<section>
	<div class="app-color-white animated zoomIn">
	<?php if(!empty($offer)) { ?>
	<!-- imagen -->
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-5">
			<img src="<?= $offer[0]['IMAGE_SERVICE']; ?>" alt="No se hallo ninguna imagen" class="app-img-4 thumbnails">
		</div>
		<!-- contenido de la oferta -->
		<div class="col-xs-12 col-sm-8 col-md-6 col-lg-7">
			<!-- titulo -->
			<h2 class="animated zoomIn text-primary">Oferta: <?= $offer[0]['NAME_SERVICE']; ?></h2>
			<!-- fecha -->
			<?php if(!empty($offerDate)) {
			if($offerDate[0]['DATE_INI_OFFER'] != '0000-00-00') {
			?>
			<h5 class="text-muted">
				<b>Inicio: <em><?= $offerDate[0]['DATE_INI_OFFER'].' Hora: '.$offerDate[0]['TIME_INI_OFFER']; ?></em></b>
			</h5>
			<h5 class="text-muted">
				<b>Fin: <em><?= $offerDate[0]['DATE_FIN_OFFER'].' Hora: '.$offerDate[0]['TIME_FIN_OFFER']; ?></em></b>
			</h5>
			<?php }
			else {
			?>
			<h5 class="text-muted"><b>Validez: permanente</b></h5>
		<?php }
		} ?>
			<br>
			<a href="reserve" class="btn btn-primary pull-right">
				<span class="fa fa-shopping-cart"></span> Reservar
			</a>
			<br>
		<!-- descripcion -->
			<div>
				<h4><b>Descripción:</b></h4>
				<p class="text-justify"><?= Helper::camelUpperCase($offer[0]['DESCRIPTION_SERVICE']); ?></p>
			</div>
		</div>
		<div class="clearfix"></div>
		<hr>
		<div class="table-responsive">
			<table class="table">
				<thead>
				<tr>
					<th>Dias</th>
					<th>Horas</th>
					<th>Unidades</th>
					<th>Precio</th>
					<th>Puntos Obtenidos</th>
					<th>Puntos requeridos</th>
				</tr>
				</thead>
				<tbody>
				<?php if(!empty($offerCost)) {
				foreach($offerCost as $cost) { ?>
				<tr>
					<td><?= $cost['UNIT_DAY_COST_SERVICE'] ?></td>
					<td><?= $cost['UNIT_HOUR_COST_SERVICE'] ?></td>
					<td><?= $cost['UNIT_COST_SERVICE'] ?></td>
					<td><?= $cost['NAME_TYPE_MONEY'].' '.$cost['PRICE_COST_SERVICE'] ?></td>
					<td><?= $cost['POINT_OBTAIN_COST_SERVICE'] ?></td>
					<td><?= $cost['POINT_REQUIRED_COST_SERVICE'] ?></td>
				</tr>
				<?php }
				} ?>
				</tbody>
			</table>
		</div>
		<?php }
		else { ?>
		<h4 class="text-center">Oferta no encontrada</h4>
		<img src="img/404/caja-vacia.jpg" class="app-img-5 center-block" alt="No existen datos disponibles">
		<?php } ?>
	</div>
</section>