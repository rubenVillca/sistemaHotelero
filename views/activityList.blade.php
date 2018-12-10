<!--Tabla de actividades-->
<section>
    <div class="app-color-white">
		<?php if (!empty($listActivity)) { ?>
        <div class="row">
			<?php foreach ($listActivity as $activity) { ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 animated fadeInUp ">
                <div class='thumbnail'>
                    <img src="<?= !empty($activity['IMAGE_ACTIVITY']) ? $activity['IMAGE_ACTIVITY'] : $activity['IMAGE_ACTIVITY']; ?>"
                         alt="Actividad"
                         class="app-img-static-3"
                         >
                    <h5><b><?= $activity['NAME_ACTIVITY']; ?></b></h5>
                    <h6>
                        (<?= $activity['DATE_START_ACTIVITY'] . ' a ' . $activity['DATE_END_ACTIVITY']; ?>)
                    </h6>
                    <h6><?= $activity['NAME_TYPE_ACTIVITY']; ?>, <?= $activity['NAME_STATE_ACTIVITY']; ?></h6>
                    <p>
                        <a href="activity/show/<?= $activity['ID_ACTIVITY'] ?>"
                           class="btn btn-md btn-primary btn-block"><span class="fa fa-eye"></span> Ver</a>
                    </p>
                </div>
            </div>
			<?php } ?>
        </div>
		<?php } else { ?>
        <div class="thumbnail">
            <h4 class="text-center">Actividades no registradas</h4>
            <img src="img/404/caja-vacia.jpg"
                 class="app-img-5 center-block"
                 alt="No existen datos disponibles">
        </div>
		<?php } ?>
            <div class="pull-right">
                <a href="activity/calendar/" class="btn btn-primary">
                    Cambiar Vista <span class="glyphicon glyphicon-calendar"></span>
                </a>
            </div>
            <br><br>
    </div>
</section>