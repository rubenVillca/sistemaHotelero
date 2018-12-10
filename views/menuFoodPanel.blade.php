<section>
    <div class="app-color-white">
		<?php if(!empty($listMenu)){ ?>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Nro</th>
                    <th>Nombre</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$i = 0;
				foreach($listMenu as $menu){ ?>
                <tr class="<?= strtotime($menu['DATE_END_MENU']) >= strtotime(date('Y-m-d')) ? '' : 'danger' ?>">
                    <td><?= ++$i ?></td>
                    <td><?= $menu['NAME_MENU'] ?></td>
                    <td><?= $menu['DATE_START_MENU'] ?></td>
                    <td><?= $menu['DATE_END_MENU'] ?></td>
                    <td><?= $menu['ACTIVE_MENU'] == 1 ? (($menu['DATE_END_MENU'] < date('Y-m-d') ? 'Vencido' : 'Activo')) : 'No Activo' ?></td>
                    <td>
                        <a href="menu/show/<?= $menu['ID_MENU'] ?>"
                           class="btn btn-xs btn-info">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="menu/edit/<?= $menu['ID_MENU'] ?>"
                           class="btn btn-xs btn-primary">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="menu/delete_dd/<?= $menu['ID_MENU'] ?>"
                           class="btn btn-xs btn-danger"
                           onclick="return validLink('menu/delete_dd/<?= $menu['ID_MENU'] ?>','Eliminar menu','Realmente desea eliminar este Menu','error')">
                            <i class="fa fa-remove"></i>
                        </a>
                    </td>
                </tr>
				<?php } ?>
                </tbody>
            </table>
        </div>
		<?php }
		else{ ?>
        <div>
            <img src="img/404/caja-vacia.jpg"
                 class="app-img-5 center-block"
                 alt="No existen datos disponibles">
            <h4 class="text-center text-success">Alimentos no registrados</h4>
        </div>
		<?php } ?>
        <div class="panel">
            <a href="menu/insert/"
               class="btn btn-block btn-primary">
                <i class="fa fa-plus"></i> Insertar Menu
            </a>
        </div>
    </div>
</section>