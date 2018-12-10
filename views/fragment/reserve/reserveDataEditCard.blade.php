<?php if(!empty($cardUserList)){ ?>
<div class="panel-body">
<?php $i = 0; ?>
<?php foreach($cardUserList as $cardUser){ ?>
<!-- numero y ccv -->
    <div class="clearfix">
        <!-- numero de la tarjeta -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <label for="nCard"
                   class="control-label">N&uacute;mero de la tarjeta</label>
            <input type="text"
                   id="nCard"
                   name="listCard[<?= $i ?>][nCard]"
                   value="<?= $cardUser['NUMBER_CARD']; ?>"
                   class="form-control"
                   placeholder="N&uacute;mero de la targeta de credito"
                   required>
        </div>
        <!-- Codigo ccv de la tarjeta -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <label for="ccv"
                   class="control-label">Codigo ccv de la tarjeta</label>
            <input type="text"
                   id="ccv"
                   name="listCard[<?= $i ?>][ccv]"
                   value="<?= $cardUser['CCV_CARD']; ?>"
                   class="form-control"
                   placeholder=""
                   required>
        </div>
    </div>
    <!-- mes y año de expiracion -->
    <div class="clearfix">
        <!-- Mes de expiracion de la targeta -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <label for="month"
                   class="control-label">Mes de expiraci&oacute;n de la targeta</label>
            <select id="month"
                    name="listCard[<?= $i ?>][month]"
                    class="form-control"
                    required>
				<?php foreach(!empty($listMonth) ? $listMonth : array() as $month){ ?>
                <option value="<?= $month['id'] ?>" <?= $cardUser['MONTH_CARD'] == $month['id'] ? 'selected' : ''; ?>>
					<?= $month['name'] ?>
                </option>
				<?php } ?>
            </select>
        </div>
        <!-- anio de expiracion de la targeta -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <label for="year"
                   class="control-label">A&ntilde;o de expiraci&oacute;n de la targeta</label>
            <select id="year"
                    name="listCard[<?= $i ?>][year]"
                    class="form-control"
                    required>
				<?php for($y = date('Y');$y < date('Y')+10;$y++){ ?>
                <option value="<?= $y ?>" <?= $cardUser['YEAR_CARD'] == $y ? 'selected' : '' ?>><?= $y ?></option>
				<?php } ?>
            </select>
        </div>
    </div>
    <!-- tipo de tarjeta y targeta valida? -->
    <div class="clearfix">
        <!-- Tipo de tarjeta -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <label for="idTypeCard"
                   class="control-label">Tipo de tarjeta</label>
            <select id="idTypeCard"
                    name="listCard[<?= $i ?>][idTypeCard]"
                    class="form-control"
                    required>
				<?php foreach(isset($listTypeCard) ? $listTypeCard : array() as $type){ ?>
                <option value="<?= $type['ID_TYPE_CARD']; ?>" <?= $type['ID_TYPE_CARD'] == $cardUser['ID_TYPE_CARD'] ? 'selected' : '' ?>>
					<?= $type['NAME_TYPE_CARD']; ?>
                </option>
				<?php } ?>
            </select>
        </div>
        <!-- Verificacion de la tarjeta -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <label for="validCard"
                   class="control-label">Verificaci&oacute;n de la tarjeta
            </label>
            <br>
            <input type="radio"
                   id="validCard"
                   name="listCard[<?= $i ?>][validCard]"
                   value="1"
			       <?= $cardUser['VALID_CARD'] == 1 ? 'checked' : ''; ?>
                   placeholder="Validaci&oacute;n de la tarjeta"
                   required> Valido |
            <input type="radio"
                   id="validCard"
                   name="listCard[<?= $i ?>][validCard]"
                   value="-1"
			       <?= $cardUser['VALID_CARD'] == -1 ? 'checked' : ''; ?>
                   placeholder="Validaci&oacute;n de la tarjeta"> No Valido
        </div>
    </div>
	<?php $i++; ?>
	<?php } ?>
</div>
<?php } ?>