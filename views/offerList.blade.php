<!--seccion del contenido de las ofertas-->
<section>
	<div class="app-color-white">
		<div class="portfolio portfolio-page">
			<ul class="portfolio-img">
				<?php if(!empty($listOffer)){ ?>
				<?php foreach($listOffer as $offer){ ?>
				<li class='col-xs-12 col-sm-6 col-md-3 col-lg-3 animated zoomIn '>
					<div class="work">
						<img src='<?= $offer['IMAGE_SERVICE'] ?>' alt="No se hallo ninguna imagen" class="app-img-11">
						<h4 class="text-center text-muted">
							<b><?= Helper::camelUpperCase($offer['NAME_SERVICE']); ?></b>
						</h4>
						<a href="offer/show/<?= $offer['ID_SERVICE'] ?>" class='btn btn-primary form-control'>
							<span class='fa fa-hand-o-right'></span> Ver Mas
						</a>
					</div>
				</li>
				<?php }
				}
				else{ ?>
				<li>
					<img src="img/404/caja-vacia.jpg" class="app-img-5 center-block" alt="No existen datos disponibles">
					<h5 class="text-center"><b>No existen ofertas disponibles para esta categoria <br>
							<span>seleccione otra categoria de ofertas</span></b>
					</h5>
				</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</section>