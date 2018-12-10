<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 app-color-white">
	<?php if(!empty($idCheck)){?>
    <div class="row">
		<?php require_once "views/fragment/consume/consumeTitular.blade.php";?>
    </div>
        <hr>
    <div class="row">
		<?php require_once "views/fragment/consume/listConsum.blade.php";?>
    </div>
	<?php }else{?>
    <div class="row">
        <div class="panel-body">
            <h3 class="text-center">Seleccione un registro</h3>
            <img src="img/404/caja-vacia.jpg" class="app-img-5 center-block" alt="No existen datos disponibles">
        </div>
    </div>
	<?php }?>
</div>

