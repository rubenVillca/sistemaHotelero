<!--inicio seccion Ofertas-->
<aside class="hidden-xs">
	<?php if (!empty($listActivityWidget)) { ?>
    <div class="panel panel-default">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="panel-heading">
            <!-- /.widget-user-image -->
            <h4 class="panel-title"><b>Lista de Actividades</b></h4>
        </div>
        <div class="">
            <ul class="nav nav-stacked">
				<?php foreach ($listActivityWidget as $act) { ?>
                <li><a href="activity/show/<?= $act['ID_ACTIVITY'] ?>"
                       class=""><?= $act['NAME_ACTIVITY'] ?></a></li>
				<?php } ?>
            </ul>
        </div>
    </div>
	<?php } ?>
</aside>
