<section>
    <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 animated fadeIn">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title"><b>Configurar</b></h4>
            </div>
            <div class="panel-body">
				<?php if(!empty($hotel)){?>
                <form action="<?= 'hotel/insert_dd/'.$hotel['ID_HOTEL']?>" class="form-horizontal" method="post"
                      enctype="multipart/form-data">
                    <!-- nombre y tipo de hotel -->
                    <div class="form-group">
                        <!-- Nombre del hotel -->
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <label class="control-label" for="nameHotel">Nombre del hotel</label>
                            <input type="text"
                                   class="form-control"
                                   id="nameHotel"
                                   name="nameHotel"
                                   placeholder="Nombre del hotel"
                                   pattern="^[a-zA-Z0-9 ]{2-25}"
                                   value="<?= $hotel['NAME_HOTEL']; ?>"
                                   required>
                        </div>
                        <!-- Tipo de hotel -->
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <label class="control-label" for="idTypeHotel">Tipo de hotel</label>
                            <select class="form-control" id="idTypeHotel" name="idTypeHotel" required>
                                <option value=""></option>
								<?php $list = isset($listTypeHotel) ? $listTypeHotel : array();
								foreach($list as $type) { ?>
                                <option value="<?= $type['ID_TYPE_HOTEL'] ?>" <?= $type['ID_TYPE_HOTEL'] == $hotel['ID_TYPE_HOTEL'] ? 'selected' : ''; ?>>
									<?= $type['NAME_TYPE_HOTEL']; ?>
                                </option>
								<?php } ?>
                            </select>
                        </div>
                    </div>
                    <!-- email y telefono -->
                    <div class="form-group">
                        <!-- Email del hotel -->
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <label class="control-label" for="email">Email</label>
                            <input type="text"
                                   class="form-control"
                                   id="email"
                                   name="email"
                                   placeholder="Ingrese Email"
                                   value="<?= $hotel['EMAIL_HOTEL']; ?>">
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <!-- Telefono del hotel -->
                            <label class="control-label" for="phone">Telefono</label>
                            <input type="text"
                                   class="form-control"
                                   id="phone"
                                   name="phone"
                                   placeholder="Ingrese telefono del hotel"
                                   value="<?= $hotel['PHONE_HOTEL']; ?>">
                        </div>
                    </div>
                    <!-- fecha de fundacion y dominio -->
                    <div class="form-group">
                        <!-- Fecha de creacion -->
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <label class="control-label" for="dateFund">Fecha de fundaci&oacute;n</label>
                            <input type="date"
                                   class="form-control datepickerHistory"
                                   id="dateFund"
                                   name="dateFund"
                                   placeholder="Fecha de fundaci&oacute;n del hotel"
                                   value="<?= $hotel['DATE_FOUNDATION_HOTEL']; ?>">
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <!-- Direccion de la pagina -->
                            <label class="control-label" for="dominio">P&aacute;gina web</label>
                            <input type="text"
                                   class="form-control"
                                   id="dominio"
                                   name="dominio"
                                   placeholder="Nombre del dominio"
                                   pattern="^[a-zA-Z0-9.@ ]{5-25}$"
                                   value="<?= $hotel['DOMINIO_HOTEL']; ?>">
                        </div>
                    </div>
                    <!-- Direccion -->
                    <div class="control-group">
                        <label class="control-label" for="address">Direcci&oacute;n</label>
                        <input type="text"
                               class="form-control"
                               id="address"
                               name="address"
                               placeholder="Direcci&oacute;n del hotel"
                               value="<?= $hotel['ADDRESS_HOTEL']; ?>">
                    </div>
                    <!-- Mision -->
                    <div class="control-group">
                        <label class="control-label" for="mision">Misi&oacute;n</label>
                        <textarea class="jqte-test form-control"
                                  id="mision"
                                  name="mision"
                                  placeholder="Misi&oacute;n del hotel"><?= $hotel['MISSION_HOTEL']; ?></textarea>
                    </div>
                    <!-- Vision -->
                    <div class="control-group">
                        <label class="control-label" for="vision">Vision</label>
                        <textarea class="jqte-test form-control"
                                  id="vision"
                                  name="vision"
                                  placeholder="Visi&oacute;n del hotel"><?= $hotel['VISION_HOTEL']; ?></textarea>
                    </div>
                    <!-- imagen de: logo y portada -->
                    <div class="form-group">
                        <!-- Direccion del logo antiguo -->
                        <input id="imgAddressIconOld"
                               name="imgAddressIconOld"
                               type="text"
                               title="url old"
                               value="<?= $hotel['LOGO_HOTEL']; ?>"
                               class="hidden">
                        <!-- Direccion de la imgagen de portada antigua-->
                        <input id="imgAddressOld"
                               name="imgAddressOld"
                               type="text"
                               title="url portada old"
                               value="<?= $hotel['ADDRESS_IMAGE_HOTEL']; ?>"
                               class="hidden">
                        <!-- Direccion de la imgagen de portada -->
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <label class="control-label" for="imgAddress">Imagen de portada</label>
                            <input id="imgAddress"
                                   name="imgAddress"
                                   type="file"
                                   class="file"
                                   data-show-upload="false"
                                   data-show-caption="true">
                        </div>
                        <!-- Direccion del logo -->
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <label class="control-label" for="imgAddressIcon">Logo</label>
                            <input id="imgAddressIcon"
                                   name="imgAddressIcon"
                                   type="file"
                                   class="file"
                                   data-show-upload="false"
                                   data-show-caption="true">
                        </div>
                    </div>
                    <!-- mapa googlemaps -->
                    <div class="control-group">
                        <label class="control-label" for="addressGPS">Ubicaci&oacute;n GPS</label>
                        <div id="map" class="app-size-maps-1 form-control">Cargando ...</div>
                    </div>
                    <!-- Direccion GPS -->
                    <br>
                    <div class="form-group">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <input type="number"
                                   step="0.0000001"
                                   class="form-control"
                                   id="addressGPSX"
                                   name="addressGPSX"
                                   placeholder="Latitud"
                                   onchange="updateMap()"
                                   value="<?= $hotel['ADDRESS_GPS_X_HOTEL']; ?>">
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <input type="number"
                                   step="0.0000001"
                                   class="form-control"
                                   id="addressGPSY"
                                   name="addressGPSY"
                                   placeholder="Longitud"
                                   onchange="updateMap()"
                                   value="<?= $hotel['ADDRESS_GPS_Y_HOTEL']; ?>">
                        </div>
                    </div>
                    <!-- Historia del hotel -->
                    <div class="control-group">
                        <label class="control-label" for="history">Historia</label>
                        <textarea class="jqte-test form-control"
                                  id="history"
                                  name="history"
                                  placeholder="historia del hotel"><?= $hotel['HISTORY_HOTEL']; ?></textarea>
                    </div>
                    <!-- alcance del hotel -->
                    <div class="control-group">
                        <label class="control-label" for="scope">Alcance</label>
                        <textarea class="jqte-test form-control"
                                  id="scope"
                                  name="scope"
                                  placeholder="Alcance"><?= $hotel['SCOPE_HOTEL']; ?></textarea>
                    </div>
                    <!-- Objetivos del hotel -->
                    <div class="control-group">
                        <label class="control-label" for="objetive">Objetivos</label>
                        <textarea class="jqte-test form-control"
                                  id="objetive"
                                  name="objetive"
                                  placeholder="Objetivos del hotel"><?= $hotel['OBJECTIVE_HOTEL']; ?></textarea>
                    </div>
                    <!-- Lema -->
                    <div class="control-group">
                        <label class="control-label" for="watchWord">Lema</label>
                        <textarea class="jqte-test form-control"
                                  id="watchWord"
                                  name="watchWord"
                                  placeholder="Lema del hotel"><?= $hotel['WATCHWORD_HOTEL']; ?></textarea>
                    </div>
                    <!-- Descripcion -->
                    <div class="control-group">
                        <label class="control-label" for="description">Descripci&oacute;n</label>
                        <textarea class="jqte-test form-control"
                                  id="description"
                                  name="description"
                                  placeholder="Descripci&oacute;n del hotel"><?= $hotel['DESCRIPTION_HOTEL']; ?></textarea>
                    </div>
                    <!-- Botones -->
                    <div class="control-group">
                        <div class="panel pull-right">
                            <a class="btn btn-danger" href='settings/'>
                                <span class="glyphicon glyphicon-remove"></span> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary" name="btnSave">
                                <span class="glyphicon glyphicon-floppy-save"></span> Guardar
                            </button>
                        </div>
                    </div>
                </form>
				<?php }?>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    var map;
    var gpsX =<?= isset($hotel['ADDRESS_GPS_X_HOTEL']) ? $hotel['ADDRESS_GPS_X_HOTEL'] : 0;?>;
    var gpsY =<?= isset($hotel['ADDRESS_GPS_Y_HOTEL']) ? $hotel['ADDRESS_GPS_Y_HOTEL'] : 0;?>;
    var marker;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: gpsX, lng: gpsY},
            zoom: 7
        });

        var pos = new google.maps.LatLng(gpsX, gpsY);
        marker = new google.maps.Marker({
            position: pos,
            map: map,
            title: "Direccion Hotel",
            animation: google.maps.Animation.DROP
        });
    }

    function updateMap() {
        gpsX = document.getElementById("addressGPSX").value;
        gpsY = document.getElementById("addressGPSY").value;
        var pos = new google.maps.LatLng(gpsX, gpsY);
        marker.setMap(null);
        marker = new google.maps.Marker({
            position: pos,
            map: map,
            title: "Direccion Hotel"
        });
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBagiPKyr8hLrX6rwwzX1NZsIFYGD0f0Q&callback=initMap"></script>