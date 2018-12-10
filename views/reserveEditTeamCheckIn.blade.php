<!-- Section Datos del titulo-->
<section>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 animated fadeIn">
        <div class="row">
            <form action="reserve/updateReserveCheckInTeam/<?= isset($idConsum) ? $idConsum : 0; ?>"
                  method="post"
                  class="form-horizontal"
                  enctype="multipart/form-data">
                <div class="panel panel-primary">
					<?php require_once 'views/fragment/consume/consumeService.blade.php' ?>
					<?php require_once 'views/fragment/consume/consumeArticle.blade.php' ?>
					<?php require_once 'views/fragment/consume/consumeTeam.blade.php' ?>
                        <div class="panel-body pull-right">
                            <button type="submit" id="edit" name="edit" class="btn btn-primary">
                                <span class="fa fa-refresh"></span> Actualizar
                            </button>
                        </div>
                        <br><br><br>
                </div>

            </form>
        </div>
    </div>
</section>