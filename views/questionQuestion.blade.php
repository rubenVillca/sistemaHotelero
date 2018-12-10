<!--Seccion para realizar su pregunta-->
<section>
	<div class="panel panel-primary animated fadeInUp">
		<div class="panel-heading">
			<h3 class="text-center panel-title">Realice su pregunta</h3>
		</div>
		<div class="panel-body">
			<form action="question/insertQuestion/" method="post">
                <textarea name="pregunta" id="pregunta" class="jqte-test form-control" rows="5" title="pregunta"
                          required></textarea>

				<button type="submit" name="enviar" id="enviar" class="btn btn-primary pull-right">
					Enviar <span class="glyphicon glyphicon-envelope"></span>
				</button>

			</form>
		</div>
	</div>
</section>