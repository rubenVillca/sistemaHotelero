<section>
    <div class="animated fadeInUp app-color-white">
        <!-- Section lista de usuarios-->
        <div class="panel-heading">
            <br>
            <h3 class="text-center">Lista de Usuarios</h3>
        </div>
        <div class="panel-body">
            <div class="row">
				<?php if (!empty($listPerson) && $listPerson[0]['ID_PERSON'] > 0) { ?>
                <div class="table-responsive">
                    <br>
                    <div class="form-group pull-right">
                        <input type="text" class="search form-control" placeholder="Buscar">
                    </div>
                    <span class="counter pull-right"></span>

                    <table class="table table-hover results">
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
						foreach ($listPerson as $person) { ?>
                        <tr>
                            <td><?= ++$i; ?></td>
                            <td>
                                <img src="<?= empty($person['IMAGE_PROFILE'])?(
                                	$person['SEX_PERSON']? 'img/system/user_woman.png':'img/system/user_man.png'):
                                    $person['IMAGE_PROFILE'] ?>"
                                     alt="" class="app-img-9 img-circle">
                            </td>
                            <td><?= $person['NAME_PERSON'] . "<br>" . $person['LAST_NAME_PERSON']; ?></td>
                            <td><?= !empty($person['EMAIL_PERSON']) ? $person['EMAIL_PERSON'] :
									$person['NAME_USER'] ?></td>
                            <td><?= $person['NAME_ROL']; ?></td>
                            <td>
                                <a href="chat/profile/<?= !empty($person['EMAIL_PERSON']) ? $person['EMAIL_PERSON'] :
									$person['NAME_USER'] ?>"
                                   type="submit" class="btn btn-sm btn-success" title="Conversar">
                                    <i class="fa fa-comment-o"></i>
                                </a>
								<?php if ($person['ID_ROL'] > 1) { ?>
                                <a href="profile/edit/<?= !empty($person['EMAIL_PERSON']) ? $person['EMAIL_PERSON'] :
									$person['NAME_USER'] ?>"
                                   type="submit" class="btn btn-sm btn-primary" title="Editar Perfil">
                                    <i class="fa fa-edit"></i>
                                </a>
								<?php } ?>
                            </td>
                        </tr>
						<?php } ?>
                        </tbody>
                    </table>
                </div>
				<?php } else { ?>
                <h4 class="text-center">No existen usuarios registrados</h4>
                <img src="img/404/caja-vacia.jpg" class="app-img-5 center-block" alt="No existen datos disponibles">
				<?php } ?>
            </div>
            <div class="row">
                <div class="panel-body pull-right">
                    <a href="user/insert/" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Crear Usuario
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $(".search").keyup(function () {
            var searchTerm = $(".search").val();
            var listItem = $('.results tbody').children('tr');
            var searchSplit = searchTerm.replace(/ /g, "'):containsi('")

            $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
                    return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
                }
            });

            $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
                $(this).attr('visible','false');
            });

            $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
                $(this).attr('visible','true');
            });

            var jobCount = $('.results tbody tr[visible="true"]').length;
            $('.counter').text(jobCount + ' registros');

            if(jobCount == '0') {$('.no-result').show();}
            else {$('.no-result').hide();}
        });
    });
</script>