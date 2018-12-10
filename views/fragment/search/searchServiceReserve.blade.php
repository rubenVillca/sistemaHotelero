<!--section de solicitar reserva-->
<section>
    <div class="app-color-white">
        <!-- formulario para buscar el servicio disponible -->
        <form action="<?= 'reserve/search/'?>" method="post" class="form-horizontal">
            <div class="panel panel-primary animated fadeInLeft">
                <!-- titulo -->
                <div class="panel-heading">
                    <h3 class="panel-title"><b>Buscar habitaciones disponibles</b></h3>
                </div>
                <!-- formulario -->
                <div class="panel-body">
                    <!-- adutos y ninos -->
                    <div class="form-group">
                        <!--Adultos-->
                        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                            <label class="control-label pull-right" for="nPerson">Adultos:</label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <input type="number"
                                   min="1"
                                   max="100"
                                   name="nPerson"
                                   id="nPerson"
                                   class="form-control input-sm"
                                   value="<?= isset($nPerson) ? $nPerson : 1; ?>"
                                   title=""
                                   required>
                        </div>
                        <!-- ninos -->
                        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                            <label class="control-label pull-right" for="nBoy">Niños:</label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <input type="number"
                                   min="0"
                                   max="100"
                                   name="nBoy"
                                   id="nBoy"
                                   class="form-control input-sm"
                                   value="<?= isset($nBoy) ? $nBoy : 0; ?>"
                                   title="Cantidad de ninos a entrar en la habitacion"
                                   required>
                        </div>
                    </div>
                    <!-- fechas entrada-->
                    <div class="form-group">
                        <!-- Etiquetaa de ingreso-->
                        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                            <label class="control-label pull-right" for="timeIn">Ingreso:</label>
                        </div>
                        <!-- hora y fecha de ingreso -->
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="row">
                                    <input type="time"
                                           name="timeIn"
                                           class="form-control input-sm timepicker"
                                           id="timeIn"
                                           title="Hora de ingreso al hotel"
                                           value="<?= isset($timeIn) ? $timeIn : '06:00:00'; ?>"
                                           onchange="updateHourFin()"
                                           required>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="row">
                                    <input type="date"
                                           name="dateIn"
                                           min="<?=date('Y-m-d')?>"
                                           class="form-control input-sm"
                                           id="dateIn"
                                           required
                                           value="<?= isset($dateIn) ? $dateIn : date('Y-m-d'); ?>">
                                </div>
                            </div>
                        </div>
                        <!-- Etiqueta de salida -->
                        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                            <label class="control-label pull-right" for="timeIn">Salida:</label>
                        </div>
                        <!-- hora y fecha de salida -->
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="row">
                                    <input type="time"
                                           name="timeOut"
                                           class="form-control input-sm timepicker"
                                           id="timeOut"
                                           required
                                           title=""
                                           value="<?= isset($timeOut) ? $timeOut : '06:00:00'; ?>">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="row">
                                    <input type="date"
                                           name="dateOut"
                                           class="form-control input-sm datepicker"
                                           min="<?=date('Y-m-').(date('d')+1)?>"
                                           id="dateOut"
                                           required
                                           title=""
                                           autocomplete="off"
                                           value="<?= !empty($dateOut) ? $dateOut : ''; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- boton buscar -->
                    <div class="panel-group">
                        <button type="submit" class="btn btn-primary pull-right" name="search">
                            <span class="fa fa-search"></span> Consultar
                        </button>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="clearfix"></div>
</section>

<script>
    function updateHourFin() {
        document.getElementById('timeOut').value = document.getElementById('timeIn').value;
    }
</script>