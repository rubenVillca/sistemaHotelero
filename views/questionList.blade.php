<section>
    <div class="animated fadeInDown col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
        <div class="list-group">
            <b class="list-group-item active">Preguntas</b>
			<?php if(!empty($listQuestionResponse)) {?>
			<?php $i = 0;?>
			<?php foreach($listQuestionResponse as $item) { ?>
            <a href="inquest/responseList/<?= $item['ID_QUESTION'] ?>" class="list-group-item">
				<?= ++$i;?>.- <span class="fa fa-arrow-right pull-right"></span>
				<?= Helper::camelUpperCase($item['DESCRIPTION_QUESTION']) ?>
            </a>
			<?php }
			}
			else { ?>
            <img src="img/404/caja-vacia.jpg" class="app-img-5 center-block" alt="No existen datos disponibles">
            <h4 class="text-center text-success">No existen encuestas activas</h4>
			<?php } ?>
        </div>
    </div>
</section>