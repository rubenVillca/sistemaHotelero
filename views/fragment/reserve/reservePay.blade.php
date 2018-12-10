<!------------------------------------------------- Datos del cuarto------------------ -->
<?php if(isset($listConsum)){ ?>
<!-- consumo -->
<div class="panel-heading">
    <h3 class="panel-title text-center">
        <a data-toggle="collapse"
           data-parent="#accordion"
           href="#collapse3">Consumo:</a>
    </h3>
</div>
<!-- contenidos del registro del ambiente -->
<div id="collapse3"
     class="panel-collapse collapse in">
	<?php $totalPrice = 0; ?>
	<?php $totalPay = 0; ?>
	<?php $typeMoney = '$' ?>
	<?php foreach($listConsum as $consum) { ?>
            <?php $totalPrice += $consum['PRICE_CONSUME_SERVICE']; ?>
            <?php $totalPay += $consum['PAY_CONSUME_SERVICE']; ?>
            <?php $typeMoney = $consum['NAME_TYPE_MONEY'] ?>
        <?php } ?>
    <div class="panel-body">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="row">
                <h4>Precio Total (<?= $typeMoney ?>):</h4>
                <p><?= $totalPrice ?></p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="row">
                <h4>Total pagado (<?= $typeMoney ?>):</h4>
                <p><?= $totalPay ?></p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="row">
                <h4><label for="totalPay">Monto (<?= $typeMoney ?>):</label></h4>
                <input type="number"
                       step="0.01"
                       id="totalPay"
                       name="totalPay"
                       class="form-control"
                       value="<?= $totalPrice-$totalPay ?>"
                       required>
            </div>
        </div>
    </div>
</div>
<?php } ?>
