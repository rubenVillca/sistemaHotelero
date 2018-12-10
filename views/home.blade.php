
<section class="animated bounceInUp">
	<?php if(!empty($hotel)){ ?>
        <div class="jumbotron">
            <div class="container">
                <h1><?= $hotel[0]['NAME_HOTEL'] ?></h1>
                <div class="col-xs-12 col-sm-8 col-md-6 col-lg-7">
                    <div class="thumbnail">
                        <img src="<?= $hotel[0]['ADDRESS_IMAGE_HOTEL'] ?>"
                             alt="Su navegador no soporta html5"
                             class="app-img-4 app-color-6">
                    </div>
                </div>
                <p class="text-justify">
                    <?= Helper::camelUpperCase($hotel[0]['DESCRIPTION_HOTEL']); ?>
                </p>
            </div>
        </div>

    <hr>
	<?php }else{ ?>
    <h2 class="text-center">No se cuenta con informacion del hotel</h2>
    <img src="img/404/caja-vacia.jpg"
         class="app-img-5 center-block"
         alt="No existen datos disponibles">
	<?php } ?>
</section>
