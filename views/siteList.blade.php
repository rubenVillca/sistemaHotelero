<section>
	<div class="app-color-white">
		<div class="portfolio portfolio-page">
			<ul class="portfolio-img">
				<?php if (!empty($contentSiteTour)) { ?>
				<?php foreach ($contentSiteTour as $site) { ?>
				<li class='col-xs-12 col-sm-6 col-md-3 col-lg-3 animated zoomIn'>
					<div class="work">
						<img src='<?= $site['IMAGE_SITE'] ?>' alt='Su navegador no soporta html5' class='app-img-11'>
						<h4><?= substr(Helper::camelUpperCase($site['NAME_SITE_TOUR']),0,21); ?></h4>
						<a href="site/show/<?= $site['ID_SITE_TOUR'] ?>" class='btn btn-primary form-control'>
							<span class='fa fa-hand-o-right'></span> Ver Mas
						</a>
					</div>
				</li>
				<?php } ?>
				<?php } else { ?>
				<li>
					<img src="img/404/caja-vacia.jpg" class="app-img-5 center-block" alt="No existen datos disponibles">
					<h3 class="text-center"><b>El hotel no tiene sitios tur&iacute;sticos cercanos registrados</b></h3>
				</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</section>