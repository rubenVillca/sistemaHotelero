<section>
    <div class="app-color-white">
		<?php if(!empty($listArticle)){ ?>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Nro</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Unidades</th>
                    <th>Descripci&oacute;n</th>
                    <th>Operacion</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$i = 0;
				foreach($listArticle as $article){ ?>
                <tr>
                    <td><?= ++$i ?></td>
                    <td><?= $article['NAME_ARTICLE'] ?></td>
                    <td><i class="fa fa-<?= $article['STATE_ARTICLE'] > 0 ? 'check' : 'remove' ?>"></i></td>
                    <td><?= $article['UNIT_ARTICLE'] ?></td>
                    <td><?= Helper::camelUpperCase($article['DESCRIPTION_ARTICLE']) ?></td>
                    <td>
                        <a href="article/edit/<?= $article['ID_ARTICLE'] ?>"
                           class="btn btn-xs btn-primary">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="article/delete_dd/<?= $article['ID_ARTICLE'] ?>"
                           class="btn btn-xs btn-danger"
                           onclick="return validLink('article/delete_dd/<?= $article['ID_ARTICLE'] ?>','Eliminar Articulo?','Realmente desea eliminar eliminarlo','error')">
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
            <a href="article/insert/"
               class="btn btn-block btn-primary">
                <i class="fa fa-plus"></i> Insertar Articulo
            </a>
        </div>
    </div>
</section>