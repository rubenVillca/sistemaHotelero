<section>
    <div class="app-color-white animated fadeIn">
        <!-- contenido -->
		<?php if(!empty($listServices)){ ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nro</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Descripci&oacute;n</th>
                    <th>Reservas</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
				<?php $i = 1;
				foreach($listServices as $service){ ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td>
                        <img src="<?= $service['IMAGE_SERVICE']; ?>"
                             alt="El servicio requerido no tiene una imagen asociada"
                             class="app-img-9">
                    </td>
                    <td><?= $service['NAME_SERVICE']; ?></td>
                    <td><?= Helper::camelUpperCase($service['DESCRIPTION_SERVICE']); ?></td>
                    <td><i class="fa fa-<?= $service['RESERVED_SERVICE'] == 1 ? 'check' : 'remove'; ?>"></i></td>
                    <td><?= $service['NAME_TYPE_SERVICE']; ?></td>
                    <td><i class="fa fa-<?= $service['VALUE_STATE_SERVICE'] == 1 ? 'check' : 'remove'; ?>"></i></td>
                    <td>
                        <a href="service/edit/<?= $service['ID_SERVICE']; ?>"
                           class="btn btn-sm btn-primary">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                        <a href="service/delete_dd/<?= $service['ID_SERVICE']; ?>"
                           onclick="return validLink('service/delete_dd/<?= $service['ID_SERVICE']; ?>','Eliminar','Desea realmente eliminar el servicio <?=$service['NAME_SERVICE']?>','error')"
                           class="btn btn-sm btn-danger">
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
            <a href="service/insert"
               class="btn btn-block btn-primary">Insertar servicio <i class="fa fa-plus"></i></a>
        </div>
    </div>
</section>
