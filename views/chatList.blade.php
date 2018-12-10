<!-- Section lista de usuarios-->
<section>
    <div class="panel-primary animated fadeInUp">
        <div class="panel-heading">
            <h3 class="text-center"><b>Lista de Usuarios</b></h3>
        </div>
		<?php if (!empty($listPerson) && $listPerson[0]['ID_PERSON'] > 0) { ?>
        <div class="table-responsive app-color-white">
            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Perfil</th>
                    <th>Nombre</th>
                    <th>Cuenta</th>
                    <th>Rol</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
				<?php $i = 0;
				foreach ($listPerson as $person) {
				if (!empty($person['EMAIL_PERSON']) || !empty($person['NAME_PERSON'])){?>
                <tr>
                    <td><?= ++$i; ?></td>
                    <td><img src="<?= empty($person['IMAGE_PROFILE'])?($person['SEX_PERSON'] ? "img/System/user_man.png" : "img/System/user_woman.png"):$person['IMAGE_PROFILE'] ?>" alt="" class="app-img-9 img-circle"></td>
                    <td><?= $person['NAME_PERSON'] . "<br>" . $person['LAST_NAME_PERSON']; ?></td>
                    <td><?= $person['EMAIL_PERSON']; ?></td>
                    <td><?= $person['NAME_ROL']; ?></td>
                    <td>
                        <a href="chat/profile/<?= $person['EMAIL_PERSON'] ?>" type="submit"
                           class="btn btn-sm btn-primary" title="Conversar">
                            <i class="fa fa-comment-o"></i>
                        </a>
                    </td>
                </tr>
				<?php } ?>
				<?php } ?>
                </tbody>
            </table>
        </div>
		<?php } else { ?>
        <h4 class="text-center">No existen usuarios registrados</h4>
		<?php } ?>
    </div>
    </div>
</section>