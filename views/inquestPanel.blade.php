<section>
    <div class="app-color-white animated fadeIn">
        <!-- contenido -->
		<?php if(!empty($listInquest)){ ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nro</th>
                    <th>Nombre</th>
                    <th>Descripci&oacute;n</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
				<?php $i = 1;
				foreach($listInquest as $inquest){ ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $inquest['NAME_INQUEST']; ?></td>
                    <td><?= Helper::camelUpperCase($inquest['DESCRIPTION_INQUEST']); ?></td>
                    <td><?= $inquest['DATE_START_INQUEST'].' '.$inquest['TIME_START_INQUEST']; ?></td>
                    <td><?= $inquest['DATE_START_INQUEST'].' '.$inquest['TIME_END_INQUEST']; ?></td>
                    <td><label for=""
                               class="label label-<?=$inquest['VALUE_STATE_INQUEST'] > 0 ? 'success' : 'danger'?>"><?= $inquest['NAME_STATE_INQUEST']; ?></label>
                    </td>
                    <td>
                        <a href="inquest/edit/<?= $inquest['ID_INQUEST']; ?>"
                           class="btn btn-xs btn-primary">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                        <a href="inquest/delete_dd/<?= $inquest['ID_INQUEST']; ?>"
                           onclick="return validLink('inquest/delete_dd/<?= $inquest['ID_INQUEST']; ?>','Eliminar','Desea eliminar la enquesta <?=$inquest['NAME_INQUEST']?>','error')"
                           class="btn btn-xs btn-danger">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a>
                    </td>
                </tr>
				<?php } ?>
                </tbody>
            </table>
        </div>
		<?php }
		else{ ?>
        <div class="thumbnail">
            <h4 class="text-center">Lista de servicios no encontrados</h4>
            <img src="img/404/caja-vacia.jpg"
                 class="app-img-5 center-block"
                 alt="No existen datos disponibles">
        </div>
	<?php } ?>
    <!-- boton para insertar servicio -->
        <div class="panel">
            <a href="inquest/insert"
               class="btn btn-block btn-primary">Insertar Encuesta <i class="fa fa-plus"></i></a>
        </div>
    </div>
</section>
