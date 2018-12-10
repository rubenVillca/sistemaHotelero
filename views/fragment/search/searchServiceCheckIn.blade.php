<!--section de ver habitaciones disponibles-->
<section>
    <div class="panel panel-primary app-color-white animated fadeIn">
        <div class="panel-heading">
            <h3 class="panel-title">Estadia en el hotel</h3>
        </div>
        <div class="panel-body">
            <form action="<?='checkIn/search/'?>" method="post" class="form-horizontal">
                <div class="form-group">
                    <!--Fecha- Inicio-->
                    <div class="col-xs-6 col-sm-5 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="daysCheckIn" class="col-sm-2 control-label">Dias:</label>
                            <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                                <select name="daysCheckIn" id="daysCheckIn" class="form-control" required>
                                    <option value="0"> 0 Días</option>
                                    <option value="1" selected> 1 Días</option>
									<?php for ($i = 2;$i < 60;$i++){?>
                                    <option value="<?=$i?>"> <?=$i?> Días</option>
									<?php }?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-5 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="hoursCheckIn" class="col-sm-2 control-label">Horas:</label>
                            <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                                <select name="hoursCheckIn" id="hoursCheckIn" class="form-control">
                                    <option value="0"> -- Horas --</option>
									<?php for ($i = 0;$i < 23;$i++){?>
                                    <option value="<?=$i?>"><?= $i?> Horas</option>
									<?php }?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!--Botones-->
                    <div class="col-xs-6 col-sm-2 col-md-4 col-lg-2">
                        <button type="submit" class="btn btn-primary form-control" name="search">
                            <span class="fa fa-search"></span>
                            Buscar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<script>
    function timeUpdate() {
        document.getElementById('timeOut').value = document.getElementById('timeIn').value;
    }
</script>