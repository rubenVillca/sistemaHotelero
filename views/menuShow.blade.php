<section>
    <div class="app-color-white animated fadeIn col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
		<?php if(!empty($listFood)){ ?>
        <form action="menu/edit_dd/<?= $listFood[0]['ID_MENU'] ?>" method="post" enctype="multipart/form-data">
            <!-- Nombre de menu food -->
            <div class="row">
                <h2 class="text-center">Nombre del Menu <b><?= $listFood['0']['NAME_FOOD'] ?></b></h2>
            </div>
            <!-- Fechas Ingreso, Egreso -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="row">
                                <label for="dateMenuIni">Fecha de Inicio</label>
								<?= $listFood['0']['DATE_START_MENU'] ?>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="row">
                                <label for="dateMenuFin">Fecha de Fin</label>
								<?= $listFood['0']['DATE_END_MENU'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- activo? -->
            <div class="row">
                <b>Estado: </b> <?= $listFood['0']['ACTIVE_MENU'] == 1 ? 'Activo' : 'No activo'; ?>
            </div>
            <hr>
			<?php if(!empty($listFood)){ ?>
            <div class="row">
                <h3>Alimentos</h3>
				<?php $i = 1;?>
				<?php foreach($listFood as $food){ ?>
                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 thumbnail">
                    <a href="food/show/<?= $food['ID_FOOD'] ?>" class="app-underline">
                        <img src="<?= $food['IMAGE_FOOD'] ?>" alt="Comida" class="app-img-4 img-thumbnail app-img-font">
                        <h4><?= $food['NAME_FOOD'] ?></h4>
                    </a>
                </div>
				<?php if($i%4 == 0){?>
                <div class="clearfix"></div>
				<?php }?>
				<?php $i++;?>
				<?php } ?>
            </div>
            <hr>
			<?php } ?>
        </form>
		<?php }
		else{ ?>
        <h4 class="text-center">No existen Menus disponibles</h4>
        <img src="img/404/caja-vacia.jpg" class="app-img-5 center-block" alt="No existen datos disponibles">
		<?php } ?>
    </div>
</section>