<section>
    <div class="app-color-white animated fadeIn">
	<?php if(!empty($food)) { ?>
    <!-- imagen -->
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-5 animated zoomIn">
            <img src="<?= $food[0]['IMAGE_FOOD']; ?>" alt="No se hallo ninguna imagen" class="app-img-4 thumbnails">
        </div>
        <!-- contenido de la oferta -->
        <div class="col-xs-12 col-sm-8 col-md-6 col-lg-7 animated zoomIn">
            <!-- titulo -->
            <h2 class="animated zoomIn text-primary">Alimento: <?= $food[0]['NAME_FOOD']; ?></h2>
            <div class="content">
                <dl>
                    <dt>Tipo de Comida</dt>
                    <dd><?= $food[0]['NAME_TYPE_FOOD']; ?></dd>
                    <dt>Estado</dt>
                    <dd><?= $food[0]['NAME_STATE_FOOD']; ?></dd>
                    <dt>Descripción:</dt>
                    <dd><p class="text-justify"><?= Helper::camelUpperCase($food[0]['DESCRIPTION_FOOD']); ?></p></dd>
                </dl>
            </div>
        </div>
        <div class="clearfix"></div>
        <hr>
		<?php if(!empty($costFood)) { ?>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>Nro</th>
                    <th>Moneda</th>
                    <th>Costo</th>
                    <th>Unidades</th>
                    <th>Puntos a obtener</th>
                    <th>Puntos requeridos</th>
                    <th>Creado el</th>
                </tr>
                </thead>
                <tbody>
				<?php $i = 0;
				foreach($costFood as $item) { ?>
                <tr>
                    <td><?= ++$i; ?></td>
                    <td><?= $item['NAME_TYPE_MONEY'] ?></td>
                    <td><?= $item['PRICE_COST_FOOD'] ?></td>
                    <td><?= $item['UNIT_COST_FOOD'] ?></td>
                    <td><?= $item['POINT_OBTAIN_COST_FOOD'] ?></td>
                    <td><?= $item['POINT_REQUIRED_COST_FOOD'] ?></td>
                    <td><?= $item['DATE_CREATED_COST_FOOD'] ?></td>
                </tr>
				<?php } ?>
                </tbody>
            </table>
        </div>
		<?php } ?>
		<?php } ?>
    </div>
</section>