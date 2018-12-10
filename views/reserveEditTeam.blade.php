<!-- Section Datos del titulo-->
<section>
    <form action="reserve/updateTeam/<?= isset($idConsum) ? $idConsum : 0; ?>" method="post" class="form-horizontal">
        <div class="panel-group animated fadeInUp">
            <!-- *********************DATOS del servicio ofrecido********************************* -->
		<?php require_once 'views/fragment/consume/consumeService.blade.php'; ?>
        <!------------------------------------------------- Datos del cuarto------------------ -->
            <div class="panel panel-primary">
			<?php require_once 'views/fragment/consume/consumeArticle.blade.php' ?>
            <!-- ***********-********DATOS DE LAS HUESPEDES ***************************************-->
			<?php require_once 'views/fragment/consume/consumeTeam.blade.php' ?>
            <!-- botones -->
                <div class="panel-footer">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-md-offset-9 col-lg-2 col-lg-offset-10">
                        <button type="submit" class="btn btn-primary pull-right" name="updateTeam">
                            <span class="fa fa-save"></span> Guardar
                        </button>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </form>
</section>
