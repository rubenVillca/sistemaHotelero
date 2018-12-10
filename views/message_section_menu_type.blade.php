<!-- buscar tipo de mensaje -->
<section>
    <div class="app-color-white">
        <br>
        <a class="btn btn-danger btn-block btn-compose-email" href="messages/insert/">Crear mensaje</a>
        <hr>
        <ul class="nav nav-pills nav-stacked nav-email">
            <!-- alertas -->
            <li class="<?= $menuType == 1 ? 'active' : '' ?>">
                <a href="messages/show/1/0/1">
                    <i class="fa fa-warning"></i> Alertas <span class="badge pull-right">(<?= $typeMesaje1 ?>)</span>
                </a>
            </li>
            <!-- registro usuario -->
            <li class="<?= $menuType == 2 ? 'active' : '' ?>">
                <a href="messages/show/2/0/1">
                    <i class="fa fa-phone"></i> Registro de usuario
                    <span class="badge pull-right">(<?= $typeMesaje2 ?>)</span>
                </a>
            </li>
            <!-- Registro de clientes -->
            <li class="<?= $menuType == 3 ? 'active' : '' ?>">
                <a href="messages/show/3/0/1">
                    <i class="fa fa-edit"></i> Registro de usuario
                    <span class="badge pull-right">(<?= $typeMesaje3 ?>)</span>
                </a>
            </li>
            <!-- Soliciud de reservas -->
            <li class="<?= $menuType == 4 ? 'active' : '' ?>">
                <a href="messages/show/4/0/1">
                    <i class="fa fa-suitcase"></i> Soliciud de reservas
                    <span class="badge pull-right">(<?= $typeMesaje4 ?>)</span>
                </a>
            </li>
            <!-- Sugerencias -->
            <li class="<?= $menuType == 5 ? 'active' : '' ?>">
                <a href="messages/show/5/0/1">
                    <i class="fa fa-paperclip"></i> Sugerencias
                    <span class="badge pull-right">(<?= $typeMesaje5 ?>)</span>
                </a>
            </li>
            <!-- Quejas -->
            <li class="<?= $menuType == 6 ? 'active' : '' ?>">
                <a href="messages/show/6/0/1">
                    <i class="fa fa-bug"></i> Quejas
                    <span class="badge pull-right">(<?= $typeMesaje6 ?>)</span>
                </a>
            </li>
            <!-- Mensajes -->
            <li class="<?= $menuType == 7 ? 'active' : '' ?>">
                <a href="messages/show/7/0/1">
                    <i class="fa fa-envelope"></i> Mensajes
                    <span class="badge pull-right">(<?= $typeMesaje7 ?>)</span>
                </a>
            </li>
            <!-- Recordatorio -->
            <li class="<?= $menuType == 8 ? 'active' : '' ?>">
                <a href="messages/show/8/0/1">
                    <i class="fa fa-calendar"></i> Recordatorio
                    <span class="badge pull-right">(<?= $typeMesaje8 ?>)</span>
                </a>
            </li>
            <!-- Preguntas -->
            <li class="<?= $menuType == 9 ? 'active' : '' ?>">
                <a href="messages/show/9/0/1">
                    <i class="fa fa-question-circle"></i> Preguntas
                    <span class="badge pull-right">(<?= $typeMesaje9 ?>)</span>
                </a>
            </li>
        </ul>
    </div>
</section>