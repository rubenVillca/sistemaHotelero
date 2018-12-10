<!-- Section Datos del titulo-->
<section>
    <div class="panel panel-primary animated fadeInUp">
        <div class="panel-heading">
            <h3 class="panel-title">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    Registrar reserva
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
	                <?php if ($_SESSION['TYPE_USER']==Constants::$TYPE_USER_ADMIN||$_SESSION['TYPE_USER']==Constants::$TYPE_USER_RECEPTION){?>
					<?php require_once "views/fragment/search/searchUser.blade.php";?>
                    <?php }?>
                </div>
                <br><br>
            </h3>
        </div>
        <form action="reserve/updateIncumbent/<?= !empty($check['ID_CHECK']) ? $check['ID_CHECK'] :
			0; ?>/<?= !empty($check['ID_PERSON']) ? $check['ID_PERSON'] : 0; ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
            <ul class="list-group">
                <!-- datos de titular -->
                <li class="list-group-item">
                    <div class="row">
						<?php require_once 'views/fragment/consume/consumeCheck.blade.php' ?>
                    </div>
                </li>
                <!-- datos de targeta de pago -->
                <li class="list-group-item">
                    <div class="row">
						<?php require_once 'views/fragment/consume/consumeCard.blade.php' ?>
                    </div>
                </li>
                <!-- costo a pagar del servicio -->
                <li class="list-group-item">
                    <div class="row">
						<?php require_once 'views/fragment/consume/consumePayService.blade.php' ?>
                    </div>
                </li>
                <!-- botones -->
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-4 col-lg-3 col-lg-offset-9">
                            <button type="submit" class="btn btn-primary pull-right" name="update">
                                <span class="fa fa-save"></span> Guardar
                            </button>
                        </div>
                    </div>
                </li>
            </ul>
        </form>
    </div>
</section>
