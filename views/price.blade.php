<section>
	<?php if(!empty($services)) { ?>
    <div class="app-color-white animated fadeIn">
        <div class="panel panel-primary">
		<?php foreach($services as $service){ ?>
        <!-- Default panel contents -->
            <div class="panel-heading">
                <p class="panel-title text-success "><?= Helper::camelUpperCase($service['NAME_SERVICE']) ?></p>
            </div>
            <div class="panel-body">
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-2">
                    <img src="<?= $service['IMAGE_SERVICE'] ?>" alt="Tipo de servicio" class="app-img-3">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-10">
                    <p class="text-justify"><?= Helper::camelUpperCase($service['DESCRIPTION_SERVICE']); ?></p>
                    <!-- Table -->
                    <div class="table table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Unidades</th>
                                <th>Precio</th>
                                <th>Tiempo</th>
                                <th>Puntos Obtenidos</th>
                                <th>Puntos Requeridos</th>
                            </tr>
                            </thead>
                            <tbody>
			                <?php foreach($service['PRICE_COST_SERVICE'] as $cost){ ?>
                            <tr>
                                <td><?= $cost['UNIT_COST_SERVICE'] ?></td>
                                <td><?= $cost['NAME_TYPE_MONEY'] . ' ' . $cost['PRICE_COST_SERVICE'] ?></td>
                                <td><?= 'Dias: ' . $cost['UNIT_DAY_COST_SERVICE'] . ' Horas:' . $cost['UNIT_HOUR_COST_SERVICE'] ?></td>
                                <td><?= $cost['POINT_OBTAIN_COST_SERVICE'] ?></td>
                                <td><?= $cost['POINT_REQUIRED_COST_SERVICE'] ?></td>
                            </tr>
			                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
			<?php } ?>
        </div>
        <div class="panel pull-right">
            <a href="price/print/" class="btn btn-primary" target="_blank" >Imprimir <i class="fa fa-print"></i></a>
        </div>
		<?php }
		else{ ?>
        <h4 class="text-center">Precios no encontrados</h4>
        <img src="img/404/caja-vacia.jpg" class="app-img-5 center-block" alt="No existen datos disponibles">
		<?php } ?>
    </div>
</section>