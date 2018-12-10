<!-- Section Datos del titulo-->
<section>
    <div class="">

        <ul class="nav nav-tabs" role="tablist">
			<?php foreach ($listConsumeRoom as $consumeRoom){?>
            <li role="presentation" class="<?=$consumeRoom['ID_CONSUME_SERVICE'] == $idConsum ? 'active' : ''?>">
                <a href="checkTeam/edit/<?=$consumeRoom['ID_CONSUME_SERVICE']?>/" title="Buscar habitacion">
                    <span class="round-tab ">
                        <i class="fa fa-hotel fa-lg"></i>
                    </span>
                </a>
            </li>
			<?php }?>
        </ul>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <form action="<?= 'checkTeam/edit_dd/' . (isset($idConsum) ? $idConsum : 0); ?>"
                  method="post"
                  class="form-horizontal">
                <div class="panel-group animated fadeInUp">
                    <!-- *********************DATOS del servicio ofrecido********************************* -->
				<?php require_once 'views/fragment/consume/consumeService.blade.php' ?>
                <!------------------------------------------------- Datos del cuarto y articulos ------------------ -->
                    <div class="panel-primary">
						<?php require_once 'views/fragment/consume/consumeArticle.blade.php' ?>
                    </div>
                    <!-- ***********-********DATOS DE LAS HUESPEDES ***************************************-->
                    <div class="panel-primary">
						<?php require_once 'views/fragment/consume/consumeTeam.blade.php' ?>
                    </div>
                    <!-- botones -->
                    <div class="clearfix"></div>
                    <ul class="list-inline pull-right">
                        <li>
                            <button type="button" class="btn btn-default prev-step">Anterior</button>
                        </li>
                        <li>
                            <button type="submit" class="btn btn-primary next-step" name="updateTeam">
                                <span class="fa fa-save"></span>
                                Guardar
                            </button>
                        </li>
                    </ul>
                </div>
            </form>
        </div>
        <br>
    </div>
</section>