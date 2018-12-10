<?php if(!empty($idCheck)){?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-push-2 animated fadeInUp">
	<div class="row app-color-white">
		<?php require_once "views/fragment/consume/consumeTitular.blade.php";?>
	</div>
	<div class="row">
		<section>
			<?php if (isset($idCheck) && $idCheck>0) { ?>
			<div class="app-color-white">
				<h3 class="text-center text-primary"><span class="fa fa-shopping-cart"></span> Registro Consumo</h3>
				<form action="<?= 'consume/saveConsumeFood/'.$idCheck ?>"
				      method="post"
				      id="form-consume-food"
				      class="form-horizontal">
					<?php if (!empty($listFood)) { ?>
					<div class="panel-body">
						<!-- comidas -->
						<?php $menu = '' ?>
						<?php $k = 0; ?>
						<?php foreach ($listFood as $food) { ?>
						<?php if ($food['NAME_MENU'] != $menu) { ?>
						<div class="clearfix"></div>
						<hr>
						<h3><?= $menu = $food['NAME_MENU'] ?></h3>
						<?php } ?>
						<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 thumbnail">
							<input type="checkbox"
							       id="idFood-<?= $food['ID_FOOD'] ?>"
							       name="listFood[<?= $k ?>][idFood]"
							       value="<?= $food['ID_FOOD'] ?>"
							       class="app-img-checkBox">
							<!-- imagen -->
							<img src="<?= $food['IMAGE_FOOD'] ?>"
							     alt="<?= $food['NAME_FOOD'] ?>"
							     class="app-img-4 img-thumbnail"
							     onclick="habilitarFood('<?= $food['ID_FOOD'] ?>','<?= $food['PRICE_COST_FOOD'] ?>')">
							<!-- cantida de unidades de comida -->
							<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 app-img-checkBox"
							     id="divUnitFood-<?= $food['ID_FOOD'] ?>" hidden>
								<input type="number"
								       id="unitsFood-<?= $food['ID_FOOD'] ?>"
								       value="1"
								       min="1"
								       name="listFood[<?= $k ?>][units]"
								       max="999"
								       class="form-control"
								       title="cantidad"
								       onchange="updateUnits('<?= $food['ID_FOOD'] ?>','<?= $food['PRICE_COST_FOOD'] ?>')">
							</div>
							<!-- inputs ocultos para el costo -->
							<div hidden>
								<input type="number"
								       id="unitsFoodDisabled-<?= $food['ID_FOOD'] ?>"
								       value="1"
								       min="1"
								       max="999"
								       class="form-control"
								       title="cantidad antiguo no usado">
								<input type="number"
								       value="<?= $food['UNIT_COST_FOOD'] ?>"
								       name="listFood[<?= $k ?>][unit]"
								       title="unidades para id food">
								<input type="number"
								       value="<?= $food['ID_TYPE_MONEY'] ?>"
								       name="listFood[<?= $k ?>][typeMoney]"
								       title="id del food"
								>
							</div>
							<!-- costo -->
							<label for="idFood-<?= $food['ID_FOOD'] ?>"><?= $food['NAME_FOOD'] ?></label>
							<h5>
								<?= $food['NAME_TYPE_MONEY'].' '.$food['PRICE_COST_FOOD'].'/'.$food['UNIT_COST_FOOD'] ?>
								unidad(es)
							</h5>
						</div>
						<?php if(($k+1)%4 == 0){?>
						<div class="clearfix"></div>
						<?php } ?>
						<?php $k++; ?>
						<?php } ?>
						<div class="clearfix"></div>
						<hr>
						<div class="form-group">
							<!-- Costo-->
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
								<label class="control-label" for="priceConsumDisabled">
									Costo (<?= $listFood[0]['NAME_TYPE_MONEY'] ?>)
								</label>
								<input type="number"
								       class="form-control"
								       id="priceConsumDisabled"
								       name="priceConsumDisabled"
								       value="0"
								       step="0.1"
								       min="0"
								       title="costo total"
								       disabled>
								<div class="hidden">
									<input type="number"
									       step="0.01"
									       id="priceConsum"
									       name="priceConsum"
									       value="0"
									       min="0"
									       title="precio Total">
								</div>
							</div>
							<!-- pagado -->
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
								<label class="control-label" for="payConsum">
									Pago (<?= $listFood[0]['NAME_TYPE_MONEY'] ?>)
								</label>
								<input type="number"
								       step="0.01"
								       class="form-control"
								       id="payConsum"
								       name="payConsum"
								       min="0"
								       value="0">
							</div>
							<!-- estado -->
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
								<label for="stateConsumeFood">Estado</label>
								<div class="onoffswitch">
									<input type="checkbox" name="stateConsumeFood" class="onoffswitch-checkbox"
									       id="myonoffswitch">
									<label class="onoffswitch-label" for="myonoffswitch">
										<span class="onoffswitch-inner"></span> <span class="onoffswitch-switch"></span>
									</label>
								</div>
							</div>
							<!-- lugar -->
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
								<label class="control-label" for="siteConsumeFood">Lugar</label>
								<select name="siteConsumeFood" id="siteConsumeFood" class="form-control">
									<option value="">Para llevar</option>
									<?php if (!empty($listRoom)) {
									foreach ($listRoom as $room) { ?>
									<option value="Habitación <?= $room['NAME_ROOM'] ?>">
										Habitación-<?= $room['NAME_ROOM'] ?></option>
									<?php }
									} ?>
									<?php for ($i = 1; $i<50; $i++) { ?>
									<option value="mesa-<?= $i ?>">Mesa-<?= $i ?></option>
									<?php } ?>
								</select>

							</div>
						</div>
						<!--Botones registrar - registrar-limpiar-cancelar-->
						<div class="form-group">
							<div class="pull-right">
								<button type="submit"
								        onclick="return validForm('form-consume-food','Registrar','Desea registrar los alimentos seleccionados?','success')"
								        class="btn btn-primary"
								        name="saveConsum">
									Consumir <span class="glyphicon glyphicon-check"></span>
								</button>
								<a href="consume/"
								   class="btn btn-default btn-danger">
									Cancelar <span class="fa fa-remove"></span>
								</a>
							</div>
						</div>
					</div>
					<?php } else { ?>
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
	</div>
</div>
<?php }else{?>
<div class="panel-body">
	<h3 class="text-center">Seleccione un registro</h3>
	<img src="img/404/caja-vacia.jpg"
	     class="app-img-5 center-block"
	     alt="No existen datos disponibles">
</div>
<?php }?>
<script>
    var totalPrice = 0;

    function habilitarFood(idFood, priceFood) {
        document.getElementById("idFood-" + idFood).checked = !document.getElementById("idFood-" + idFood).checked;
        document.getElementById("divUnitFood-" + idFood).hidden = !document.getElementById("divUnitFood-" + idFood).hidden;
        units = document.getElementById('unitsFood-' + idFood).value;
        if (document.getElementById("idFood-" + idFood).checked)
            totalPrice = (Math.round(parseFloat(totalPrice) * 100)) / 100 + Math.round(parseInt(units) * parseFloat(priceFood) * 100) / 100;
        else
            totalPrice = (Math.round(parseFloat(totalPrice) * 100)) / 100 - Math.round(parseInt(units) * parseFloat(priceFood) * 100) / 100;
        document.getElementById('priceConsumDisabled').value = totalPrice;
        document.getElementById('priceConsum').value = totalPrice;
    }

    function updateUnits(idFood, priceFood) {
        unitAnt = document.getElementById('unitsFoodDisabled-' + idFood).value;
        unitDes = document.getElementById('unitsFood-' + idFood).value;
        units = unitDes - unitAnt;
        totalPrice = totalPrice + Math.round(parseInt(units) * parseFloat(priceFood) * 100) / 100;
        document.getElementById('priceConsumDisabled').value = totalPrice;
        document.getElementById('priceConsum').value = totalPrice;
        document.getElementById('unitsFoodDisabled-' + idFood).value = unitDes;
    }
</script>