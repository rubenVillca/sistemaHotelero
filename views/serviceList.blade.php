<section>
	<div class="app-color-white">
		<div class="portfolio portfolio-page">
			<ul class="portfolio-img">
				<?php if(!empty($listServices)){
				foreach($listServices as $service){ ?>
				<li class='col-xs-12 col-sm-6 col-md-3 col-lg-3 animated zoomIn'>
					<div class="work">
						<img src="<?= $service['IMAGE_SERVICE'] ?>"
						     alt="Imagen" class="app-img-11">
						<h4><?= Helper::camelUpperCase($service['NAME_SERVICE']) ?></h4>
						<a href="service/show/<?= $service['ID_SERVICE'] ?>" class='btn btn-primary form-control'>
							<span class='fa fa-hand-o-right'></span> Ver Mas
						</a>
					</div>
				</li>
				<?php }
				}
				else{ ?>
				<li>
					<img src="img/404/caja-vacia.jpg"
					     class="app-img-5 center-block"
					     alt="No existen datos disponibles">
					<h4 class="text-center">Servicios no encontrados</h4>
				</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</section>
