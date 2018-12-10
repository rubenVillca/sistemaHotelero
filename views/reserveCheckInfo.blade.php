<section>
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-body">
			<?php if(isset($check)){ ?>
            <div class="clearfix">
				<?php require_once "views/fragment/reserve/reserveDataIncumbent.blade.php";?>
            </div>
            <div class="clearfix">
				<?php require_once "views/fragment/reserve/reserveDataCard.blade.php";?>
            </div>
            <div class="clearfix">
				<?php require_once "views/fragment/reserve/reserveDataConsume.blade.php";?>
            </div>
			<?php } ?>
        </div>
        <div class="modal-footer">
            <a href="reserve/deletePending/<?= isset($check['ID_CHECK']) ? $check['ID_CHECK'] : '-1' ?>"
               class="btn btn-danger"
               onclick="return validLink('reserve/deletePending/<?= isset($check['ID_CHECK']) ? $check['ID_CHECK'] : '-1' ?>','Denegar','¿Esta seguro que desea denegar esta solicitud de reserva','error')"
               name="delete">Denegar <i class="fa fa-remove"></i></a>
            <a href="reserve/savePending/<?= isset($check['ID_CHECK']) ? $check['ID_CHECK'] : '-1' ?>"
               onclick="return validLink('reserve/savePending/<?= isset($check['ID_CHECK']) ? $check['ID_CHECK'] : '-1' ?>','Guardar','Desea validar la solicitud de reserva?','success')"
               class="btn btn-primary">
                Validar reserva <i class="fa fa-check-circle"></i></a>
        </div>
    </div>
</section>
