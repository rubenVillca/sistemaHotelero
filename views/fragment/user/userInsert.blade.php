<!-- Section Datos del titulo-->
<section>
    <form action="" method="post" class="form-horizontal">
        <div class="panel-group animated fadeInUp">
            <!-- *****Inuts hidden****************************-->
            <div class="hidden">
                <input type="text" name="idConsum" value="<?= isset($idConsum) ? $idConsum : 0; ?>" title="">
            </div>
            <!-- *********************DATOS del servicio ofrecido********************************* -->
		<?php require_once 'views/fragment/consume/consumeService.blade.php' ?>
        <!-- ********************************DATOS DEL TITULAR**************************** ------>
		<?php require_once 'views/fragment/consume/consumeCheck.blade.php' ?>
        <!-- *******************DATOS DE LA TARGETA********************************************-->
		<?php require_once 'views/fragment/consume/consumeCard.blade.php' ?>
        <!------------------------------------------------- Datos del cuarto------------------ -->
		<?php require_once 'views/fragment/consume/consumeArticle.blade.php' ?>
        <!-- ***********-********DATOS DE LAS HUESPEDES ***************************************-->
		<?php require_once 'views/fragment/consume/consumeTeam.blade.php' ?>
        <!-- botones -->
            <div class="clearfix"></div>
            <div class="panel-body pull-right">
                <button type="submit" class="btn btn-info" name="insert" value="<?= isset($value) ? $value : '' ?>">
                    <span class="fa fa-save"></span> Guardar
                </button>
                <a href="javascript:history.go(-1);" class="btn btn-danger">
                    <i class="fa fa-remove"></i> Atras
                </a>
            </div>
        </div>
    </form>
</section>