<section class="row">
    <!--Seccion del menu de servicios-->
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
        <div class="row">
            <nav class="nav navbar-default" role="navigation">
                <!-- MENU RESPONSE -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu-services2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <span class="navbar-brand hidden-lg hidden-md hidden-sm"><b>Servicios</b></span>
                </div>
                <!-- lista de servicios -->
                <div class="collapse navbar-collapse" id="menu-services2">
                    <div class="row">
                        <ul class="nav nav-pills nav-stacked">
							<?php if (!empty($listServices)): ?>
                            <li class="hidden-xs">
                                <label class="bg bg-primary btn-block btn-compose-email text-center">
									<?= isset($tittle) ? $tittle : 'Servicios'; ?>
                                </label>
                                <hr>
                            </li>
							<?php foreach ($listServices as $service): ?>
                            <li class="<?= $service['ID_SERVICE'] == $idService ? 'active' : '' ?>" role="presentation">
                                <a href="service/show/<?= $service['ID_SERVICE'] ?>" class="">
									<?= Helper::camelUpperCase($service['NAME_SERVICE']) ?>
                                </a>
                            </li>
							<?php endforeach; ?>
							<?php else:?>
                            <li>
                                <img src="img/404/caja-vacia.jpg" class="app-img-5 center-block"
                                     alt="No existen datos disponibles">
                                <h4 class="text-center">Servicios no encontrados</h4>
                            </li>
							<?php endif; ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!--seccion del contenido de los servicios-->
    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 app-color-white animated bounceInUp">
        <?php if (!empty($serviceContent) && $idService > 0) { ?>
        <h1 class='text-muted text-capitalize text-center'><?= $serviceContent['0']['NAME_SERVICE'] ?></h1>
        <img src='<?= $serviceContent['0']['IMAGE_SERVICE'] ?>' alt='La imagen no se encuentra disponible' class='app-img-4 thumbnail'>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-7 col-lg-8">
                <article>
                    <h4>
                        <b class="text-primary">Tipo de Servicio:</b> <?= $serviceContent['0']['NAME_TYPE_SERVICE'] ?>
                    </h4>
                    <h4><b class="text-primary">Estado:</b> <?= $serviceContent['0']['NAME_STATE_SERVICE'] ?></h4>
                </article>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-5 col-lg-4">
                <a href="reserve" class="btn btn-primary pull-right">
                    <span class="fa fa-shopping-cart"></span> Reservar
                </a>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <article>
                    <h4>
                        <b class="text-primary">Descripci&oacute;n: </b>
                    </h4>
                    <p><?= Helper::camelUpperCase($serviceContent['0']['DESCRIPTION_SERVICE']) ?></p>
                    <hr>
                    <?php if (!empty($serviceTypeRoom)) { ?>
                    <h4><b class="text-primary">Habitaciones</b></h4>
                    <dl>
                        <?php foreach ($serviceTypeRoom as $typeRoom) { ?>
                        <dt>- <?= Helper::camelUpperCase($typeRoom['NAME_ROOM_MODEL']) ?></dt>
                        <?php } ?>
                    </dl>
                    <?php } ?>
                    <!-- costos -->
                    <?php if (!empty($serviceCost)) { ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Moneda</th>
                                <th>Costos</th>
                                <th>D&iacute;as</th>
                                <th>Horas</th>
                                <th>Cantidad</th>
                                <th>Puntos Obtenidos</th>
                                <th>Puntos Requeridos</th>
                            </tr>
                            </thead>
                            <tbody id="listCost">
                            <?php foreach ($serviceCost as $cost) { ?>
                            <tr>
                                <td><?= $cost['NAME_TYPE_MONEY'] ?></td>
                                <td><?= $cost['PRICE_COST_SERVICE'] ?></td>
                                <td><?= $cost['UNIT_DAY_COST_SERVICE'] ?></td>
                                <td><?= $cost['UNIT_HOUR_COST_SERVICE'] ?></td>
                                <td><?= $cost['UNIT_COST_SERVICE'] ?></td>
                                <td><?= $cost['POINT_OBTAIN_COST_SERVICE'] ?></td>
                                <td><?= $cost['POINT_REQUIRED_COST_SERVICE'] ?></td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <?php } ?>
                </article>
            </div>
        </div>
        <?php } else { ?>
        <h4 class="text-center">Servicios no encontrados</h4>
        <img src="img/404/caja-vacia.jpg" class="app-img-5 center-block" alt="No existen datos disponibles">
        <?php } ?>
    </div>
</section>
<section class="row">
	<?php require_once "views/fragment/service/serviceHistory.blade.php";?>
</section>
