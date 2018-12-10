<!-- Section Datos del titulo-->
<section>
	<div class="animated fadeInLeft">
		<div class="col-xs-6 col-xs-offset-6 col-sm-6 col-sm-offset-6 col-md-6 col-md-offset-6 col-lg-4 col-lg-offset-8">
			<?php require_once "views/fragment/search/searchUser.blade.php";?>
		</div>
		<br>
		<br>
		<form action="<?= 'checkIn/edit_dd/'.(!empty($check['ID_CHECK']) ? $check['ID_CHECK'] : 0); ?>/"
		      method="post"
			  enctype="multipart/form-data"
		      class="form-horizontal">
			<div class="hidden">
				<input type="text" name="idPerson" value="<?= !empty($check['ID_PERSON']) ? $check['ID_PERSON'] : 0; ?>" title="id persona">
			</div>
			<ul class="list-group">
				<!-- datos de titular -->
				<li class="list-group-item">
					<div class="row">
						<?php require_once 'views/fragment/consume/consumeCheck.blade.php' ?>
					</div>
				</li>
				<!-- datos de targeta de pago -->
				<li class="list-group-item">
					<div class="row">
						<?php require_once 'views/fragment/consume/consumeCard.blade.php' ?>
					</div>
				</li>
				<!-- costo a pagar del servicio -->
				<li class="list-group-item">
					<div class="row">
						<?php require_once 'views/fragment/consume/consumePayService.blade.php' ?>
					</div>
				</li>
			</ul>
			<!-- botones -->
			<ul class="list-inline pull-right">
				<li>
					<button type="button" class="btn btn-default prev-step">Previous</button>
				</li>
				<li>
					<button type="submit" class="btn btn-primary" name="updateTeam">
						<span class="fa fa-arrow-right"></span> Guardar y Continuar
					</button>
				</li>
			</ul>
		</form>
	</div>
</section>