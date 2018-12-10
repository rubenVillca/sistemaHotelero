<?php
//require_once "views/fragment/questionsMenu.blade.php";
?>
<section>
    <div class="app-color-white animated fadeInUp">
		<?php if(!empty($questionContainer) && $questionContainer[0]['ID_INQUEST'] > 0) { ?>
        <br>
        <h1 class='text-muted text-capitalize text-center'><?= $questionContainer[0]['NAME_INQUEST']; ?></h1>
        <!-- nombre del questionario -->
        <hr>
        <ol>
			<?php foreach($questionContainer as $q) { ?>
            <li>
                <p><b class="text-capitalize"><?= Helper::camelUpperCase($q['DESCRIPTION_QUESTION']); ?></b></p>
                <!-- preguta -->
                <p><?= Helper::camelUpperCase($q['DESCRIPTION_RESPONSE']); ?></p><!-- respuesta -->
            </li>
			<?php } ?>
        </ol>
		<?php } else { ?>
        <div class="panel-body">
            <h3 class="text-center">No existen preguntas</h3>
            <img src="img/404/caja-vacia.jpg" class="app-img-5 center-block" alt="No existen datos disponibles">
        </div>
		<?php } ?>
    </div>
</section>

