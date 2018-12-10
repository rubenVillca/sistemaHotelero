<!------------------------------------------------------- datos de targeta ---------------------------->
<section>
	<?php if (!empty($card)) { ?>
    <div class="">
	    <?php foreach ($card as $targ) { ?>
        <?php if ($targ['ID_TYPE_CARD']!=Constants::$TYPE_CARD_DEPOSIT){?>
        <div class="panel-heading">
            <h4 class="text-center panel-title"><b>Datos de la tarjeta</b></h4>
        </div>
        <div class="panel-body">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <label class="control-label"><b>N&uacute;mero de targeta:</b></label>
                <br>
				<?= $targ['NUMBER_CARD'] ?>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <label class="control-label"><b>Tipo de tarjeta:</b></label>
                <br> <?= $targ['NAME_TYPE_CARD'] ?>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <label class="control-label"><b>Mes de Expiraci&oacute;n:</b></label>
                <br> <?= $targ['MONTH_CARD'] ?>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <label class="control-label"><b>Año de Expiraci&oacute;n:</b></label>
                <br> <?= $targ['YEAR_CARD'] ?>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <label class="control-label"><b>ccv:</b></label><br> <?= $targ['CCV_CARD'] ?>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <label for="myonoffswitch">Tarjeta verificada</label>
                <div class="onoffswitch">
                    <input type="checkbox" name="validCard" class="onoffswitch-checkbox"
                           id="myonoffswitch" <?= $targ['VALID_CARD'] ? 'checked' : '' ?>
                           onclick="sendValidCard('<?= $targ['ID_CHECK']; ?>','<?= $targ['ID_CARD']; ?>')">
                    <label class="onoffswitch-label" for="myonoffswitch">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                    </label>
                </div>
                <script>
                    function sendValidCard($idCheck, $idCard) {
                        var validCard = document.getElementById('myonoffswitch').checked;
                        $.ajax({
                            type: "POST",
                            url: "reserve/updateValidCard/" + $idCheck + "/" + $idCard,
                            data: {validCard: validCard ? 'on' : 0},
                            success: function () {
                                console.log("datos enviados");
                            }
                        });
                    }
                </script>
            </div>
        </div>
        <?php } ?>
        <?php if ($targ['ID_TYPE_CARD']==Constants::$TYPE_CARD_DEPOSIT){?>

            <h3 class="text-primary"><b>Deposito bancario</b></h3>
            <div class="">
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
                    <img src="<?=$targ['NUMBER_CARD']?>" class="img-thumbnail app-img-4" alt="Deposito bancario">
                </div>

                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                    <div class="row">
                        <!-- cantidad depositada -->
                        <label for="totalDepositRequires" class="control-label">Monto requerido ($)</label>
                        <input type="text" class="" id="totalDepositRequired" name="totalDepositRequired" placeholder="Monto depositdo a la cuenta del hotel"
                               value="<?=$payRequired?>" disabled>
                    </div>
                    <div class="row">
                        <!-- cantidad depositada -->
                        <label for="totalDeposit" class="control-label">Monto Verificado ($)</label>
                        <input type="text" class="" id="totalDeposit" name="totalDeposit" placeholder="Monto depositdo a la cuenta del hotel"
                               value="<?=$targ['DEPOSIT_CARD']?>" required>
                    </div>
                    <div class="row">
                        <label for="myonoffswitch">Deposito verificada</label>
                        <div class="onoffswitch">
                            <input type="checkbox" name="validCard" class="onoffswitch-checkbox"
                                   id="myonoffswitch" <?= $targ['VALID_CARD'] ? 'checked' : '' ?>
                                   onclick="sendValidDeposit('<?= $targ['ID_CHECK']; ?>','<?= $targ['ID_CARD']; ?>')">
                            <label class="onoffswitch-label" for="myonoffswitch">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                        </div>
                        <script>
                            function sendValidDeposit($idCheck, $idCard) {
                                var validCard = document.getElementById('myonoffswitch').checked;
                                $.ajax({
                                    type: "POST",
                                    url: "reserve/updateValidCard/" + $idCheck + "/" + $idCard,
                                    data: {validCard: validCard ? 'on' : 0},
                                    success: function () {
                                        console.log("datos enviados");
                                    }
                                });
                            }
                        </script>
                    </div>
                </div>
            </div>
		<?php } ?>
		<?php } ?>
    </div>
	<?php } ?>
</section>