<section>
    <!-- Carousel -->
<?php if(!empty($siteTour)){ ?>
<!-- carousel -->
    <div class="animated lightSpeedIn app-color-white">
        <h2 class="text-capitalize text-center text-primary"><?= $siteTour['0']['NAME_SITE_TOUR']; ?></h2>
		<?php if(!empty($siteTourImg)){ ?>
        <div id="myCarousel" class="carousel slide thumbnail" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
				<?php for($i = 0;$i < count($siteTourImg);$i++){ ?>
                <li data-target='#myCarousel' data-slide-to='<?= $i ?>' class=''></li>
				<?php } ?>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
				<?php $active = 'active';
				foreach($siteTourImg as $img){ ?>
                <div class='item <?= $active; ?>'>
                    <div class='app-img-6'>
                        <img src='<?= $img['IMAGE_SITE'] ?>' alt='Imagen' class='app-img-6'>
                    </div>
                    <div class="carousel-caption">
                        <h3 class="text-center"><?= $img['NAME_IMAGE_SITE'] ?></h3>
                        <p class="text-center text-justify"><?= Helper::camelUpperCase($img['DESCRIPTION_IMAGE_SITE']) ?></p>
                    </div>
                </div>
				<?php $active = ''; ?>
				<?php } ?>
            </div>
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
	<?php } ?>
    </div>
    <!-- descripcion del sitio y mapa-->
    <div class="app-color-white">
        <!--Descripcion del sitio turistico-->
        <h2 class="text-capitalize text-info">Ubicaci&oacute;n</h2>
        <hr>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="panel">
                <div id="map" class="app-size-maps-1">Cargando ...</div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 app-color-white">
            <p><b>Direccion GPS</b> X: <?= $siteTour['0']['ADDRESS_GPS_X_SITE_TOUR']; ?>
                Y: <?= $siteTour['0']['ADDRESS_GPS_Y_SITE_TOUR'] ?> </p>
            <p><b>Direccion: </b> <?= $siteTour['0']['ADDRESS_SITE_TOUR'] ?></p>
            <p class="text-justify"><b>Descripción:</b></p>
            <p class="text-justify"><?= Helper::camelUpperCase($siteTour['0']['DESCRIPTION_SITE_TOUR']) ?></p>
        </div>
    </div>
    <!-- Scripts-->
    <script>
        $(document).ready(function () {
            $(".carousel").carousel({
                interval: 8000,//changes the speed
                pause: false
            });
        });
    </script>
    <!--INICIO google maps-->
    <script type="text/javascript">
        var map;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: <?= $siteTour['0']['ADDRESS_GPS_X_SITE_TOUR'];?>,
                    lng: <?= $siteTour['0']['ADDRESS_GPS_Y_SITE_TOUR'];?>
                },
                zoom: 5
            });

            var pos = new google.maps.LatLng(<?= $siteTour['0']['ADDRESS_GPS_X_SITE_TOUR'];?>, <?= $siteTour['0']['ADDRESS_GPS_Y_SITE_TOUR'];?>);
            var marker = new google.maps.Marker({
                position: pos,
                map: map,
                title: "Direccion Hotel",
                animation: google.maps.Animation.DROP
            });
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBagiPKyr8hLrX6rwwzX1NZsIFYGD0f0Q&callback=initMap"></script>
    <!--FIN google maps-->
	<?php }else{ ?>
    <div class="panel panel-primary animated zoomIn">
        <img src="img/404/caja-vacia.jpg" class="app-img-5 center-block" alt="No existen datos disponibles">
        <h3>Sitio no encontrado</h3>
    </div>
	<?php } ?>
</section>
