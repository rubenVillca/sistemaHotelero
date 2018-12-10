<section>
    <div class="animated fadeInDown col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
        <div class="list-group">
            <b class="list-group-item active">Respuestas a preguntas</b>
			<?php if(!empty($listResponse)) {
			$i = 0;
			foreach($listResponse as $item) { ?>
            <p class="list-group-item">
				<?= ++$i.'.- '.Helper::camelUpperCase($item['DESCRIPTION_RESPONSE']).'('.$item['NAME_PERSON'].' '.$item['LAST_NAME_PERSON'].')' ?>
            </p>
			<?php }
			}
			else { ?>
            <img src="img/404/caja-vacia.jpg" class="app-img-5 center-block" alt="No existen datos disponibles">
            <h4 class="text-center text-success">No existen Respuestas registradas</h4>
			<?php } ?>
        </div>
    </div>
</section>