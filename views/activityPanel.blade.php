<?php //require_once "views/search/searchActivity.blade.php";?>
<!--Tabla de actividades-->
<section>
    <div class="animated fadeInUp">
            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading">Lista de actividades a realizar en el hotel</div>
                <div class="panel-body">
                    <p>Son todas aquellas tareas o labores que se ejercen en el hotel,
                        están las actividades laborales, las actividades escolares, las actividades recreativas,
                        las actividades físicas o actividades culturales
                    </p>
                </div>
                <!-- Table -->
                <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>F. Inicio</th>
                        <th>F. Fin</th>
                        <th>Tipo</th>
                        <th>Estado</th>
                        <th>Imagen</th>
                        <th>Operaciones</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php if(!empty($listActivity)){ ?>
					<?php foreach($listActivity as $activity){ ?>
                    <tr>
                        <td><?= $activity['NAME_ACTIVITY']; ?></td>
                        <td>
                            <small>
                                <?= $activity['DATE_START_ACTIVITY']?><br><i>(<?= $activity['TIME_START_ACTIVITY']?>)</i>
                            </small>
                        </td>
                        <td>
                            <small>
	                        <?= $activity['DATE_END_ACTIVITY']; ?><br><em>(<?= $activity['TIME_END_ACTIVITY']?>)</em>
                            </small>
                        </td>
                        <td><?= $activity['NAME_TYPE_ACTIVITY']; ?></td>
                        <td><?= $activity['NAME_STATE_ACTIVITY']; ?></td>
                        <td>
                            <img src="<?= !empty($activity['IMAGE_ACTIVITY']) ? $activity['IMAGE_ACTIVITY'] :
								$activity['IMAGE_ACTIVITY']; ?>" alt="Actividad" class="app-img-3">
                        </td>
                        <td>
                            <a href="activity/show/<?= $activity['ID_ACTIVITY'] ?>" class="btn btn-xs btn-success"><span
                                        class="fa fa-eye"></span>
                            </a>
                            <a href="activity/edit/<?= $activity['ID_ACTIVITY'] ?>" class="btn btn-xs btn-primary"><span
                                        class="fa fa-edit"></span>
                            </a>
                            <a href="activity/delete_dd/<?= $activity['ID_ACTIVITY'] ?>"
                               onclick="return validLink('activity/delete_dd/<?= $activity['ID_ACTIVITY'] ?>','Eliminar','Desea eliminar la actividad \'<?=$activity['NAME_ACTIVITY']?>\'?','success')"
                               class="btn btn-xs btn-danger"><i class="fa fa-remove"></i></a>
                        </td>
                    </tr>
					<?php } ?>
					<?php }
					else{ ?>
                    <tr>
                        <td colspan="7">
                            <div class="thumbnail">
                                <h4 class="text-center">Actividades no registradas</h4>
                                <img src="img/404/caja-vacia.jpg" class="app-img-5 center-block"
                                     alt="No existen datos disponibles">
                            </div>
                        </td>
                    </tr>
					<?php } ?>
                    </tbody>
                </table>
                </div>
                <div class="panel-footer">
                    <div class="pull-right">
                        <a href="activity/insert/" class="btn btn-primary float-right">
                            Agregar <span class="glyphicon glyphicon-plus"></span>
                        </a>
                    </div>
                    <br><br>
                </div>

        </div>
    </div>
</section>

