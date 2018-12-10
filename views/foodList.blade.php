<section>
    <div class="app-color-white animated zoomIn">
		<?php if(!empty($listFood) && $listFood[0]['ID_FOOD'] > 0){ ?>
        <br>
        <h1 class="text-center text-primary">Lista de alimentos</h1>
        <!-- SECCION DE LISTA DE COMIDAS-->
		<?php $i = 1; ?>
		<?php foreach($listFood as $food){ ?>
        <div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
            <a href="food/show/<?= $food['ID_FOOD'] ?>"
               class='app-link app-underline'
               role="button">
                <div class='thumbnail'>
                    <h4 class="text-center"><?= Helper::camelUpperCase($food['NAME_FOOD']); ?></h4>
                    <img src='<?= $food['IMAGE_FOOD'] ?>'
                         alt="No se hallo ninguna imagen"
                         class="app-img-4">
                    <article>
                        <p class="text-justify"><?= Helper::camelUpperCase(substr($food['DESCRIPTION_FOOD'], 0, 25)).'...'; ?></p>
                    </article>
                </div>
            </a>
        </div>
		<?php if($i%6 == 0){ ?>
            <br>
        <div class="clearfix"></div>
		<?php } ?>
		<?php $i++; ?>
		<?php }
		}
		else{ ?>
        <div>
            <img src="img/404/caja-vacia.jpg"
                 class="app-img-5 center-block"
                 alt="No existen datos disponibles">
            <h4 class="text-center text-success">Alimentos no registrados</h4>
        </div>
		<?php } ?>
    </div>
</section>