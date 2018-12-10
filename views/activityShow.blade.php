<section>
	<div class="animated fadeIn">
		<?php if(!empty($activity)) { ?>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 app-color-white">
			<div class="row form-group">
				<label for="nameActivity" class="col-xs-12 col-sm-6 col-md-6 col-lg-4"><b>Nombre:</b></label>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-8">
					<em id="nameActivity"><?= $activity['NAME_ACTIVITY'] ?></em>
				</div>
			</div>
			<div class="row form-group">
				<label for="nameTypeActivity" class="col-xs-12 col-sm-6 col-md-6 col-lg-4"><b>Tipo:</b></label>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-8">
					<p id="nameTypeActivity"><?= $activity['NAME_TYPE_ACTIVITY'] ?></p>
				</div>
			</div>
			<div class="row form-group">
				<label for="" class="col-xs-12 col-sm-6 col-md-6 col-lg-4"><b>Estado:</b></label>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-8">
					<p><?= $activity['NAME_STATE_ACTIVITY'] ?></p>
				</div>
			</div>
			<div class="row form-group">
				<label for="" class="col-xs-12 col-sm-6 col-md-6 col-lg-4"><b>Fecha de inicio:</b></label>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-8">
					<p><?= $activity['DATE_START_ACTIVITY'].' ('.$activity['TIME_START_ACTIVITY'].')' ?></p>
				</div>
			</div>
			<div class="row form-group">
				<label for="" class="col-xs-12 col-sm-6 col-md-6 col-lg-4"><b>Fecha fin:</b></label>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-8">
					<p><?= $activity['DATE_END_ACTIVITY'].' ('.$activity['TIME_END_ACTIVITY'].')' ?></p>
				</div>
			</div>
			<div class="row form-group">
				<label class="col-xs-12 col-sm-6 col-md-6 col-lg-4"><b>Descripción:</b></label>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-8">
					<p><?= Helper::camelUpperCase($activity['DESCRIPTION_ACTIVITY']) ?></p>
				</div>
			</div>

		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<div class="row">
				<img src="<?= $activity['IMAGE_ACTIVITY'] ?>" alt="imagen" class="app-img-4">
			</div>
		</div>
		<?php } ?>
	</div>
</section>