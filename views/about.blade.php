<!-- info basic hotel -->
<section>
	<?php if (!empty($infoHotel)) { ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 app-color-white">
        <!-- maps -->
        <div class="hidden-xs col-sm-12 col-md-6 col-lg-4">
            <br>
			<?php require_once "views/fragment/map/mapsHotel.blade.php";?>
        </div>
        <!-- info basic -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-8">
            <!--Seccion de carcteristicas principales del hotel-->
            <section class="app-color-white animated zoomIn">
                <div class="">
					<?php if(!empty($infoHotel[0]['NAME_HOTEL'])) { ?>
                    <h2 class="text-center"><?= Helper::camelUpperCase($infoHotel[0]['NAME_HOTEL']); ?></h2>
					<?php } ?>
                <!-- informacion del hotel -->
					<?php if(!empty($infoHotel[0]['ADDRESS_GPS_X_HOTEL'])) { ?>
                    <div class="row form-group">
                        <label class="col-xs-12 col-sm-6 col-md-6 col-lg-4">Latitud:</label>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-8">
                            <p><?= $infoHotel[0]['ADDRESS_GPS_X_HOTEL']; ?></p>
                        </div>
                    </div>
					<?php } ?>
					<?php if(!empty($infoHotel[0]['ADDRESS_GPS_Y_HOTEL'])) { ?>
                    <div class="row form-group">
                        <label class="col-xs-12 col-sm-6 col-md-6 col-lg-4">Longitud:</label>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-8">
                            <p><?= $infoHotel[0]['ADDRESS_GPS_Y_HOTEL']; ?></p>
                        </div>
                    </div>
					<?php } ?>
					<?php if(!empty($infoHotel[0]['ADDRESS_HOTEL'])) { ?>
                    <div class="row form-group">
                        <label class="col-xs-12 col-sm-6 col-md-6 col-lg-4">Direcci&oacute;n:</label>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-8">
                            <p><?= $infoHotel[0]['ADDRESS_HOTEL']; ?></p>
                        </div>
                    </div>
					<?php } ?>
					<?php if(!empty($infoHotel[0]['DATE_FOUNDATION_HOTEL'])) { ?>
                    <div class="row form-group">
                        <label class="col-xs-12 col-sm-6 col-md-6 col-lg-4">Fundado el:</label>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-8">
                            <p><?= $infoHotel[0]['DATE_FOUNDATION_HOTEL']; ?></p>
                        </div>
                    </div>
					<?php } ?>
					<?php if(!empty($infoHotel[0]['EMAIL_HOTEL'])) { ?>
                    <div class="row form-group">
                        <label class="col-xs-12 col-sm-6 col-md-6 col-lg-4">Email:</label>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-8">
                            <p><?= $infoHotel[0]['EMAIL_HOTEL']; ?></p>
                        </div>
                    </div>
					<?php } ?>
					<?php if(!empty($infoHotel[0]['PHONE_HOTEL'])) { ?>
                    <div class="row form-group">
                        <label class="col-xs-12 col-sm-6 col-md-6 col-lg-4">Telefono:</label>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-8">
                            <p><?= $infoHotel[0]['PHONE_HOTEL']; ?></p>
                        </div>
                    </div>
					<?php } ?>
					<?php if(!empty($infoHotel[0]['NAME_TYPE_HOTEL'])) { ?>
                    <div class="row form-group">
                        <label class="col-xs-12 col-sm-6 col-md-6 col-lg-4">Tipo de hotel:</label>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-8">
                            <p><?= Helper::camelUpperCase($infoHotel[0]['NAME_TYPE_HOTEL']); ?></p>
                        </div>
                    </div>
					<?php } ?>
					<?php if(!empty($infoHotel[0]['DESCRIPTION_TYPE_HOTEL'])) { ?>
                    <div class="row form-group">
                        <label class="col-xs-12 col-sm-6 col-md-6 col-lg-4">Descripci&oacute;n del tipo:
                        </label>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-8">
                            <p><?= Helper::camelUpperCase($infoHotel[0]['DESCRIPTION_TYPE_HOTEL']); ?></p>
                        </div>
                    </div>
					<?php } ?>
                </div>
            </section>
        </div>
        <!-- informacion avanzada del hotel -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <section>
                <div class="app-color-white animated fadeInRightBig">
                    <!-- Informacion del hotel-->
                    <div>
                        <h4><b>Historia:</b></h4>
                        <p class="text-justify"><?= Helper::camelUpperCase($infoHotel[0]['HISTORY_HOTEL']); ?></p>
                    </div>
                    <div>
                        <h4><b>Mision:</b></h4>
                        <p class="text-justify"><?= Helper::camelUpperCase($infoHotel[0]['MISSION_HOTEL']); ?></p>
                    </div>
                    <div>
                        <h4><b>Vision:</b></h4>
                        <p class="text-justify"><?= Helper::camelUpperCase($infoHotel[0]['VISION_HOTEL']); ?></p>
                    </div>
                    <div>
                        <h4><b>Alcance:</b></h4>
                        <p class="text-justify"><?= Helper::camelUpperCase($infoHotel[0]['SCOPE_HOTEL']); ?></p>
                    </div>
                    <div>
                        <h4><b>Objetivo:</b></h4>
                        <p class="text-justify"><?= Helper::camelUpperCase($infoHotel[0]['OBJECTIVE_HOTEL']); ?></p>
                    </div>
                    <div>
                        <h4><b>Lema:</b></h4>
                        <p class="text-justify"><?= Helper::camelUpperCase($infoHotel[0]['WATCHWORD_HOTEL']); ?></p>
                    </div>
                    <div>
                        <h4><b>Descripcion:</b></h4>
                        <p class="text-justify"><?= Helper::camelUpperCase($infoHotel[0]['DESCRIPTION_HOTEL']); ?></p>
                    </div>
                    <!-- Politicas del hotel-->
					<?php if (!empty($politicas)) { ?>
                    <hr>
                    <div>
                        <h2 class="text-center">Pol&iacute;ticas del Hotel</h2>
                        <ol>
							<?php foreach ($politicas as $fila) { ?>
                            <li>
                                <b><?= Helper::camelUpperCase($fila['NAME_RULE']) ?></b>
                                <p class="text-justify"><?= Helper::camelUpperCase($fila['DESCRIPTION_RULE']) ?></p>
                            </li>
							<?php } ?>
                        </ol>
                    </div>
					<?php } ?>
                <!-- Informacion del recepcionistas-->
					<?php if (!empty($team)) { ?>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <hr>
                        <h2 class="text-center">Nuestro equipo</h2>
                        <hr>
						<?php foreach ($team as $item) { ?>
                        <div class="col-xs-12 col-sm-6 col-sm-4 col-lg-3">
                            <h3 class="text-center text-uppercase text-primary"><?= $item['NAME_ROL'] ?></h3>
                            <div class="thumbnail">
                                <img src="<?= empty($item['IMAGE_PROFILE'])?'img/system/'.($item['SEX_PERSON']?'user_man.png':'user_woman.png'):$item['IMAGE_PROFILE'] ?>" alt=""
                                     class="img-circle app-profile-user eldiv grow">
                            </div>
                            <p class="text-center text-info">
                                <em><?= $item['NAME_PERSON'] . ' ' . $item['LAST_NAME_PERSON'] ?></em>
                            </p>
                        </div>
						<?php } ?>
                    </div>
					<?php } ?>
                </div>
            </section>
        </div>
    </div>
	<?php }else { ?>
    <h1 class="text-center text-info">Informaci&oacute;n de hotel no encontrada</h1>
    <img src="img/404/caja-vacia.jpg" class="app-img-5 center-block" alt="No existen datos disponibles">
	<?php } ?>
</section>