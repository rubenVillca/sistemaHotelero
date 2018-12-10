<h3>
	<a data-toggle="collapse" class="btn btn-primary" data-parent="#accordion" href="#collapse6">Forma de pago</a>
</h3>
<div id="collapse6" class="panel-collapse collapse in">
	<div class="panel-body">
		<!-- select typePay -->
		<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
			<select name="typePay" id="typePay" title="Tipo de pago" class="form-control" onchange="updateType()">
				<option value="2" selected>
					Deposito a cuenta
				</option>
				<option value="1" <?= empty($listCheckCard) ? :($listCheckCard[0]['ID_TYPE_CARD']==Constants::$TYPE_CARD_DEPOSIT ? :'selected')?>>
					Tarjeta de crédito
				</option>
				<?php if ($_SESSION['TYPE_USER']==Constants::$TYPE_USER_ADMIN||$_SESSION['TYPE_USER']==Constants::$TYPE_USER_RECEPTION){?>
				<option value="0">
					Efectivo
				</option>
				<?php }?>
			</select>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-9 col-lg-8">
			<!-- cantidad depositada -->
			<label for="totalDeposit" class="control-label">Monto minimo requerido (Bs)</label>
			<input type="text" class="" id="totalDeposit" name="totalDeposit" placeholder="Monto depositdo a la cuenta del hotel"
				   value="<?=$payRequired?>" disabled>
		</div>
		<hr>
		<div id="formPay-deposit">
			<div class="form-horizontal">
				<!-- numero de cuenta -->
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3" hidden>
					<label for="numberAccountDepositBank" class="control-label">Número de Cuenta:</label>
					<input id="numberAccountDepositBank" class="form-control" value="XXX-XX-XXX-XXX" disabled>
				</div>
				<!-- foto -->
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<label for="image-account-deposit" class="control-label">Foto del deposito</label>
					<input type="file" class="form-control file" name="imgAddress" id="image-account-deposit">
				</div>
			</div>
		</div>
		<div id="formPay-target" <?= empty($listCheckCard) ? 'hidden="hidden"':($listCheckCard[0]['ID_TYPE_CARD']==Constants::$TYPE_CARD_DEPOSIT ? 'hidden="hidden"': '')?>>
			<div class="form-horizontal">
				<!-- idTypeCard-->
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
					<label for="idTypeCard" class="control-label">Tipo de Tarjeta</label>
					<select class="form-control" id="idTypeCard" name="idTypeCard">
						<?php foreach (!empty($listTypeCard) ? $listTypeCard : array() as $type) { ?>
						<option value="<?= $type['ID_TYPE_CARD'] ?>"
						<?=empty($listCheckCard) ? '' : ($listCheckCard[0]['ID_TYPE_CARD'] == $type['ID_TYPE_CARD'] ? 'selected' : '')?>>
							<?= $type['NAME_TYPE_CARD']; ?>
						</option>
						<?php } ?>
					</select>
				</div>
				<!-- nCard-->
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
					<label for="nCard" class="control-label">N&uacute;mero de tarjeta</label>
					<input type="text" class="form-control" id="nCard" name="nCard" placeholder="Nro de tarjeta"
					       value="<?=empty($listCheckCard) ? '' : $listCheckCard[0]['NUMBER_CARD']?>">
				</div>
				<!-- ccv-->
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-2">
					<label for="ccv" class="control-label">CCV</label>
					<input type="text" class="form-control" id="ccv" name="ccv" placeholder="Codigo CCV"
					       value="<?=empty($listCheckCard) ? '' : $listCheckCard[0]['CCV_CARD']?>">
				</div>
				<!-- mesExp-->
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
					<label for="month" class="control-label">Exp. Mes</label>
					<select name="month" id="month" class="form-control" required>
						<?php foreach (Helper::getMonths() as $mes) { ?>
						<option value="<?= $mes['id'] ?>"
						<?=empty($listCheckCard) ? '' : ($listCheckCard[0]['MONTH_CARD'] == $mes['id'] ? 'selected' : '')?>>
							<?= $mes['name'] ?>
						</option>
						<?php } ?>
					</select>
				</div>
				<!-- anio de expiracion -->
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
					<label for="year" class="control-label">Exp. A&ntilde;o</label>
					<input type="number"
					       class="form-control"
					       id="year"
					       name="year"
					       min="<?= date('Y') ?>"
					       max="<?= (date('Y')+15) ?>"
					       value="<?=empty($listCheckCard) ? date('Y')+1 : $listCheckCard[0]['YEAR_CARD']?>"
					       required>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
    function updateType() {
        if (document.getElementById('typePay').selectedIndex === 0){
            document.getElementById('formPay-deposit').hidden = false;
            document.getElementById('formPay-target').hidden = true;
        }
        if (document.getElementById('typePay').selectedIndex === 1){
            document.getElementById('formPay-deposit').hidden = true;
            document.getElementById('formPay-target').hidden = false;
		}
        if (document.getElementById('typePay').selectedIndex === 2){
            document.getElementById('formPay-deposit').hidden = true;
            document.getElementById('formPay-target').hidden = true;
        }
    }
</script>