<?php //require_once "views/searchHistory.blade.php";?>
<!--Tabla del historial-->
<section>
    <div class="">
        <div class="animated fadeInUp">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="bg-success">
                    <tr>
                        <th>Id</th>
                        <th>Detalle</th>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th>Costo</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php if (!empty($listConsum)) {
					foreach ($listConsum as $consume){?>
                    <tr>
                        <td><?=$consume['ID_CHECK']?></td>
                        <td>
							<?=$consume['OBSERVATIONS_CHECK']?>
                        </td>
                        <td><?=$consume['DATE_START_CONSUME_SERVICE']?></td>
                        <td><?=$consume['DATE_END_CONSUME_SERVICE']?></td>
                        <td><?=$consume['TOTAL_PRICE']?></td>
                        <td>
							<span class=" label label-<?=$consume['VALUE_STATE_CHECK'] == 0 ? 'warning' :
								($consume['VALUE_STATE_CHECK'] < 0 ? 'danger' : 'primary');?>">
								<?= $consume['NAME_STATE_CHECK']?>
							</span>
                        </td>
                        <td>
                            <a href="history/show/<?= $consume['ID_CHECK'] ?>" class="btn btn-primary btn-xs">
                                <span class="fa fa-eye"></span>
                            </a>
                        </td>
                    </tr>
					<?php }
					}else{?>
                    <tr>
                        <td colspan="7"><h3 class="text-center">No tiene consumos registrado</h3></td>
                    </tr>
					<?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
