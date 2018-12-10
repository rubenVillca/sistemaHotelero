<div class="pull-right">
    <ul class="nav nav-list nav-pills">
        <!-- reservas -->
		<?php if (strcmp($_SESSION['TYPE_USER'], Constants::$TYPE_USER_ADMIN) === 0 ||
                  strcmp($_SESSION['TYPE_USER'], Constants::$TYPE_USER_RECEPTION) === 0 ||
                  strcmp($_SESSION['TYPE_USER'], Constants::$TYPE_USER_CLIENT) === 0){?>
        <li role="presentation">
            <a href="<?=strcmp($_SESSION['TYPE_USER'], Constants::$TYPE_USER_CLIENT) === 0?"reserve/":"checkIn/"?>" class="app-link-menu app-nav-menu" role="button">
                <p class="text-menu"><i class="fa fa-shopping-cart app-font-4"></i></p>
                <sup class="info-number badge"><?= isset($_SESSION['nCheckTotal']) ? $_SESSION['nCheckTotal'] : 0; ?></sup>
            </a>
        </li>
        <!-- encuestas -->
        <li role="presentation">
            <a href="#" class="dropdown-toggle app-link-menu app-nav-menu" data-toggle="dropdown" role="button"
               aria-haspopup="true">
                <p class="text-menu">
                    <i class="fa fa-book app-font-4"></i> <i class="fa fa-caret-down app-font-6"></i>
                </p>
                <sup class="info-number badge"><?= isset($listInquest) ? count($listInquest) : 0; ?></sup>
            </a>
            <ul class="dropdown-menu dropdown-menu-left">
                <!--Recordatorio-->
				<?php foreach (!empty($listInquest) ? $listInquest : array() as $question) { ?>
                <li class="pull-left">
                    <a href="inquest/fillInquest/<?= $question['ID_INQUEST'] ?>" class='btn btn-block'>
                        <span class='fa fa-bookmark-o'></span> <?= $question['NAME_INQUEST'] ?>
                    </a>
                </li>
				<?php } ?>
				<?php if ($_SESSION['TYPE_USER'] == Constants::$TYPE_USER_ADMIN){?>
                <li>
                    <a href="inquest/insert/" class="btn btn-block"><label for="">Agregar encuesta</label></a>
                </li>
				<?php } ?>
            </ul>
        </li>
	<?php }?>
    <!-- actividades -->
        <li role="presentation">
            <a href="activity/calendar/" class="app-link-menu  app-nav-menu">
                <p class="text-menu"><i class="fa fa-calendar app-font-4"></i></p>
            </a>
        </li>
        <!-- mensajes -->
        <li class="dropdown " role="presentation">
            <a href="#" class="dropdown-toggle app-link-menu  app-nav-menu" data-toggle="dropdown" role="button"
               aria-haspopup="true">
                <p class="text-menu">
                    <i class="fa fa-envelope-o app-font-4"></i> <i class="fa fa-caret-down app-font-6"></i>
                </p>
                <i class="info-number badge"><?= $totalMesajes; ?></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-right">
                <!-- Enviar Mensaje -->
                <li>
                    <a href="messages/insert/">
                        <span class="fa fa-plus"></span>
                        Enviar Mensaje
                        <span class="fa fa-envelope"></span>
                    </a>
                </li>
                <!--Alertas-->
                <li>
                    <a href="messages/show/1/0/1">
                        <span class='badge'> <?= array_shift($listTypeMesajes); ?></span>
                        <i class='glyphicon glyphicon-warning-sign'></i> Alertas
                    </a>
                </li>
                <!--Registro de usuario-->
                <li>
                    <a href="messages/show/2/0/1">
                        <span class='badge'> <?= array_shift($listTypeMesajes) ?></span>
                        <i class='glyphicon glyphicon-earphone'></i> Registro de usuario
                    </a>
                </li>
                <!--Registro de clientes-->
                <li>
                    <a href="messages/show/3/0/1">
                        <span class='badge'> <?= array_shift($listTypeMesajes) ?></span>
                        <i class='glyphicon glyphicon-edit'></i> Registro de clientes
                    </a>
                </li>
                <!--Soliciud de reservas-->
                <li>
                    <a href="messages/show/4/0/1">
                        <span class='badge'> <?= array_shift($listTypeMesajes) ?></span>
                        <i class='fa fa-suitcase'></i> Soliciud de reservas
                    </a>
                </li>
                <!--Sugerencias-->
                <li>
                    <a href="messages/show/5/0/1">
                        <span class='badge'> <?= array_shift($listTypeMesajes) ?></span>
                        <i class='glyphicon glyphicon-paperclip'></i> Sugerencias
                    </a>
                </li>
                <!--Quejas-->
                <li>
                    <a href="messages/show/6/0/1">
                        <span class='badge'> <?= array_shift($listTypeMesajes) ?></span>
                        <i class='fa fa-bug'></i> Quejas
                    </a>
                </li>
                <!--Mensajes-->
                <li>
                    <a href="messages/show/7/0/1">
                        <span class='badge'> <?= array_shift($listTypeMesajes) ?></span>
                        <i class='fa fa-envelope'></i> Mensajes
                    </a>
                </li>
                <!--Recordatorio-->
                <li>
                    <a href="messages/show/8/0/1">
                        <span class='badge'> <?= array_shift($listTypeMesajes) ?></span>
                        <i class='fa fa-calendar'></i> Recordatorio
                    </a>
                </li>
                <!--Recordatorio-preguntas de clientes-->
                <li>
                    <a href="messages/show/9/0/1">
                        <span class='badge'> <?= array_shift($listTypeMesajes) ?></span>
                        <i class='fa fa-question-circle'></i> Preguntas
                    </a>
                </li>
            </ul>
        </li>
        <!-- perfil de usuario -->
        <li class="dropdown " role="presentation">
            <a href="#" class="dropdown-toggle app-link-menu  app-nav-menu" data-toggle="dropdown" role="button"
               aria-haspopup="true">
                <p class="text-menu">
                    <span class="fa fa-user fa-fw app-font-4"></span>
                    <i class="fa fa-caret-down app-font-6"></i>
                </p>
            </a>
            <ul class="dropdown-menu dropdown-menu-right">
                <li>
                    <a href="profile/"><i class="fa fa-user"></i> Perfil de usuario</a>
                </li>
                <li>
                    <a href="history/"><i class="fa fa-history"></i> Historial</a>
                </li>
                <li>
                    <a href="chat/"><i class="fa fa-comment"></i> Comentarios</a>
                </li>
                <li>
                    <a href="login/logout/"><i class="fa fa-power-off"></i> Cerrar Sesion</a>
                </li>
            </ul>
        </li>
    </ul>
</div>