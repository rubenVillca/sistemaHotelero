<?php if(!empty($idCheck)){?>
<div class="col-xs-12 col-sm-12 col-md-1 col-md-10 col-lg-8 col-lg-push-2">
    <div class="row">
		<?php require_once "views/fragment/consume/consumeTitular.blade.php";?>
    </div>
    <div class="row">
        <section>
			<?php if(isset($idCheck) && $idCheck > 0){ ?>
            <div class="app-color-white animated fadeInUp">
                <h3 class="text-center"><b>Registro Consumo</b></h3>
                <form action="<?= 'consume/saveConsum/'.$idCheck ?>"
                      method="post"
                      id="form-insert-consume"
                      class="form-horizontal">
					<?php if(!empty($listServices)){ ?>
                    <div class="panel-body">
                        <!--Nombre Servicio-->
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <label class="control-label"
                                   for="idService">Servicio</label>
                            <select class="form-control"
                                    id="idService"
                                    name="idService"
                                    required
                                    onchange="calcularCosto()">
								<?php foreach($listServices as $service){ ?>
                                <option value='<?= $service['ID_SERVICE'] ?>'>
									<?= $service['NAME_SERVICE'] ?>
                                </option>
								<?php } ?>
                            </select>
                        </div>
                        <!--Cantidad Consumo-->
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <label class="control-label"
                                   for="units">Unidades o porciones</label>
                            <input type="number"
                                   class="form-control"
                                   id="units"
                                   name="units"
                                   pattern="\d{1,}"
                                   min="1"
                                   max="999"
                                   value="1"
                                   onchange="calcularUnidades()"
                                   required>
                        </div>
                        <!-- Costo-->
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <label class="control-label"
                                   for="priceConsumDisabled">Costo</label>
                            <input type="text"
                                   class="form-control"
                                   id="priceConsumDisabled"
                                   name="priceConsumDisabled"
                                   value="<?= $listServices[0]['listPrice'][0]['NAME_TYPE_MONEY'].' '.$listServices[0]['listPrice'][0]['PRICE_COST_SERVICE'] ?>"
                                   min="0"
                                   title="costo total"
                                   disabled>
                            <div class="hidden">
                                <input type="number"
                                       step="0.01"
                                       id="priceConsum"
                                       name="priceConsum"
                                       value="<?= $listServices[0]['listPrice'][0]['PRICE_COST_SERVICE'] ?>"
                                       min="0"
                                       title="precio Total">
                                <input type="number"
                                       id="idCost"
                                       name="idCost"
                                       value="<?= $listServices[0]['listPrice'][0]['ID_COST_SERVICE'] ?>"
                                       min="0"
                                       title="cantidad de dias">
                            </div>
                        </div>
                        <!-- pagado -->
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <label class="control-label"
                                   for="payConsum">Pago</label>
                            <input type="number"
                                   step="0.01"
                                   class="form-control"
                                   id="payConsum"
                                   name="payConsum"
                                   min="0"
                                   value="0">
                        </div>
                        <div class="clearfix"></div>
                        <!-- tiempo de consumo -->
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<?php if(!empty($listServices)){ ?>
                            <label class="control-label"
                                   for="timeConsum">Tiempo de consumo</label>
                            <select name="timeConsum"
                                    id="timeConsum"
                                    class="form-control">
								<?php foreach($listServices[0]['listPrice'] as $cost){ ?>
                                <option value="<?= $cost['ID_COST_SERVICE'] ?>">
									<?= $cost['UNIT_HOUR_COST_SERVICE']+strtotime($cost['UNIT_DAY_COST_SERVICE'])/3600 ?>
                                    Hora(s)
                                </option>
								<?php } ?>
                            </select>
							<?php } ?>
                        </div>
                        <div class="clearfix"></div>
                        <!--Fecha de Inicio-->
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <label class="control-label"
                                   for="dateIni">Fecha de Inicio</label>
                            <input type="date"
                                   class="form-control datepicker"
                                   id="dateIni"
                                   name="dateIni"
                                   value="<?= date('Y-m-d') ?>"
                                   required>
                        </div>
                        <!--Hora de Inicio-->
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <label class="control-label"
                                   for="timeIni">Hora de Inicio</label>
                            <input type="time"
                                   class="form-control timepicker"
                                   id="timeIni"
                                   name="timeIni"
                                   value="<?= date('H:i:s') ?>"
                                   required>
                        </div>
                        <!-- Detalle de consumo -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <label class="control-label"
                                   for="detail">Detalle del consumo</label>
                            <textarea name="detail"
                                      id="detail"
                                      cols="30"
                                      rows="5"
                                      placeholder="Dettalle del consumo"
                                      class="jqte-test form-control"></textarea>
                        </div>
                        <!--Botones registrar - registrar-limpiar-cancelar-->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row pull-right">
                                <a href="consume/"
                                   class="btn btn-default btn-danger">
                                    Cancelar <span class="fa fa-remove"></span>
                                </a>
                                <button type="submit"
                                        onclick="return validForm('form-insert-consume','Registrar consumo','Desea registrar el consumo?','success')"
                                        class="btn btn-primary"
                                        name="saveConsum">
                                    Registrar <span class="glyphicon glyphicon-check"></span>
                                </button>
                            </div>
                        </div>
                    </div>
					<?php }
					else{ ?>
                    <div class="panel-body">
                        <h3 class="text-center">No existen servicios disponibles</h3>
                        <img src="img/404/caja-vacia.jpg"
                             class="app-img-5 center-block"
                             alt="No existen datos disponibles">
                        <!--Botones registrar - registrar-limpiar-cancelar-->
                        <div class="row">
                            <a href="consume/"
                               class="btn btn-block btn-danger">
                                Atras <span class="fa fa-remove"></span>
                            </a>
                        </div>
                    </div>
					<?php } ?>
                </form>
            </div>
			<?php } ?>
        </section>
        <script>
            var total = 0;
            var listService =<?=isset($listServices) ? json_encode($listServices) : new ArrayObject()?>;
            var indexService = 0;
            var indexTime = 0;

            function calcularCosto() {
                indexService = document.getElementById('idService').selectedIndex;
                //camviar time service
                select = document.getElementById('timeCost');
                for (var i = 0; i < listService[indexService]['listPrice'].length; i++) {
                    opt = document.createElement('option');
                    opt.value = i;
                    opt.innerHTML = 1000;
                    select.appendChild(opt);
                }

                document.getElementById('timeCost').selectedIndex = 0;//cambiar time de select
                indexTime = document.getElementById('timeCost').selectedIndex;
                price = listService[indexService]['listPrice'][indexTime]['PRICE_COST_SERVICE'];
                total = price * document.getElementById('units').value;
                document.getElementById('priceConsum').value = total;
                document.getElementById('priceConsumDisabled').value = listService[indexService]['listPrice'][indexTime]['NAME_TYPE_MONEY'] + ' ' + total;
                document.getElementById('idCost').value = listService[indexService]['listPrice'][indexTime]['ID_COST_SERVICE'];

            }

            function calcularUnidades() {
                total = document.getElementById('units').value * listService[indexService]['listPrice'][indexTime]['PRICE_COST_SERVICE'];
                document.getElementById('priceConsumDisabled').value = listService[indexService]['listPrice'][indexTime]['NAME_TYPE_MONEY'] + ' ' + total;
                document.getElementById('priceConsum').value = total;
            }

            function calcularTiempo() {

            }
        </script>
    </div>
</div>
<?php }else{?>
<div class="panel-body">
    <h3 class="text-center">No existen consumos disponibles</h3>
    <img src="img/404/caja-vacia.jpg" class="app-img-5 center-block" alt="No existen datos disponibles">
</div>
<?php }?>
