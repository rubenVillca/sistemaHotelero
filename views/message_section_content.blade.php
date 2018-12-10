<!--Section de contenido del mensaje-->
<section>
	<div class="app-color-white">
		<?php if(!empty($message)){ ?>
		<p class="app-color-white text-center">
			<br>
			<b><?= $message['TITTLE_MESSAGE'] ?></b>
		</p>
		<div class="well well-lg">
			<h5>
				<em><i class="fa fa-calendar"></i><b>Fecha de Env&iacute;o:</b> <?= $message['DATE_MESSAGE'] ?></em>
				<br>
				<em class=""> <i class="glyphicon glyphicon-time"></i> <b>Hora de
						Env&iacute;o:</b> <?= $message['TIME_MESSAGE'] ?>
				</em>
			</h5>
			<h5>
				<em><i class="fa fa-user"></i><b>Remitente:</b><?= $message['NAME_USER']; ?></em>
			</h5>
			<hr>
			<article class="text-justify"><?= $message['CONTAINER_MESSAGE']; ?></article>
			<hr>
			<form action="mesaje/" method="post">
				<input type="text" name="menu" id="menu" value="<?= $menuType; ?>" title="" class="hidden">
				<input type="text" value="<?= $message['ID_MESSAGE'] ?>" name="idMesaje" title="" class="hidden">
				<div class="pull-right">
					<button type="submit" class="btn btn-link label label-danger" name="deleteMesaje">Eliminar
						<span class="glyphicon glyphicon-edit"></span>
					</button>
				</div>
				<br>
			</form>
		</div>
		<?php }
		else{ ?>
		<div class="thumbnail">
			<h4 class="text-center">Seleccione un mensaje</h4>
			<img src="img/404/caja-vacia.jpg" class="app-img-5 center-block" alt="No existen datos disponibles">
		</div>
		<?php } ?>
	</div>
</section>