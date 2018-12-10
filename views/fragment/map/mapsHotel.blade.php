<?php if(!empty($infoHotel)) { ?>
<!-- google maps del hotel -->
<div id="map" class="app-size-maps-1">
    Cargando ...
</div>
<div class="carousel-caption">
    <p class="app-text-color-1">
        Ubicaci&oacute;n del Hotel
    </p>
</div>

<script type="text/javascript">
    var map;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: <?= $infoHotel[0]['ADDRESS_GPS_X_HOTEL'];?>, lng: <?= $infoHotel[0]['ADDRESS_GPS_Y_HOTEL']?>},
            zoom: 6
        });
        var pos = new google.maps.LatLng(<?= $infoHotel[0]['ADDRESS_GPS_X_HOTEL'];?>, <?= $infoHotel[0]['ADDRESS_GPS_Y_HOTEL'];?>);

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
<?php } ?>