<section>
    <div class="app-color-white animated fadeIn">
		<?php if(isset($sites) && !empty($sites)){
		foreach($sites as $site){ ?>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <img src="<?= $site['IMAGE_SITE'] ?>"
                         alt="No se encontro la imagen"
                         class="app-img-4 thumbnail">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-8 col-lg-9 caption">
                    <div class="row">
                        <h3 class="text-primary">Nombre: <?= Helper::camelUpperCase($site['NAME_SITE_TOUR']); ?></h3>
                        <p><b>Direcci&oacute;n:</b> <?= $site['ADDRESS_SITE_TOUR'] ?></p>
                        <p><b>Coordenadas GPS:</b> Latitud <?= $site['ADDRESS_GPS_X_SITE_TOUR'] ?>
                            Longitud <?= $site['ADDRESS_GPS_Y_SITE_TOUR'] ?>
                        </p>
                        <p><b>Descripción:</b> <?= Helper::camelUpperCase($site['DESCRIPTION_SITE_TOUR']); ?></p>
                    </div>
                </div>
                <div class="pull-right">
                    <a href="site/show/<?= $site['ID_SITE_TOUR']; ?>" class="btn btn-success">
                        Ver <span class="fa fa-eye"></span>
                    </a>
                    <a href="site/edit/<?= $site['ID_SITE_TOUR']; ?>"
                       class="btn btn-primary">
                        Editar <span class="fa fa-edit"></span>
                    </a>
                    <a href="site/delete_dd/<?= $site['ID_SITE_TOUR']; ?>"
                       onclick="return validLink('site/delete_dd/<?= $site['ID_SITE_TOUR']; ?>','Eliminar','Eliminar sitiio \'<?=$site['NAME_SITE_TOUR']?>\'?','error')"
                       class="btn btn-danger">
                        Eliminar <span class="fa fa-remove"></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <hr>
		<?php }
		}
		else{ ?>
        <div class="thumbnail">
            <img src="img/404/caja-vacia.jpg"
                 class="app-img-5 center-block"
                 alt="No existen datos disponibles">
            <h4 class="text-center">No se encontraron lugares turísticos registrados</h4>
        </div>
		<?php } ?>
        <div class="panel">
            <a href="site/insert/"
               class="btn btn-primary btn-block">Insertar</a>
        </div>
    </div>
</section>