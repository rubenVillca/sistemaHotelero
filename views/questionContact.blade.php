<div class="hidden-xs col-sm-12 col-md-6 col-lg-4">
	<?php require_once "views/fragment/map/mapsHotel.blade.php";?>
</div>
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-8">
	<!--Eviar correo electronico al administrador-->
	<section>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-12 animated fadeInUp">
			<h3 class="text-center">Enviar Mensaje</h3>
			<form action="question/insert_dd/" method="post" class="form-horizontal">
				<!--Correo electronico-->
				<div class="form-group">
					<label for="email" class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">Email</label>
					<div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
						<input type="email" class="form-control" id="email" name="email"
						       placeholder="Correo electrónico" required>
					</div>
				</div>
				<!--Asunto-->
				<div class="form-group">
					<label for="title" class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">Asunto</label>
					<div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
						<input type="text" name="title" id="title" class="form-control" placeholder="Titulo del mensaje" required>
					</div>
				</div>
				<!--Mensaje-->
				<div class="form-group">
					<label for="message" class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">Mensaje</label>
					<div class="col-xs-12 col-sm-9 col-md-10 col-lg-10">
                        <textarea name="message" id="message" class="jqte-test form-control" rows="7" placeholder="Mensaje"
                                  required></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12 col-sm-6 col-sm-offset-6 col-md-4 col-md-offset-8 col-lg-3 col-lg-offset-9">
						<input type="submit" value="Enviar" class="btn btn-primary form-control" name="enviar">
					</div>
				</div>
			</form>
		</div>
	</section>
</div>
