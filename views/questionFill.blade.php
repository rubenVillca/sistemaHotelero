<!-- llenar encuestas -->
<section>
	<div class="animated fadeInDown col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 app-color-white">
		<div class="row">
			<?php if(!empty($listQuestionInquest)) { ?>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title"><?= $listQuestionInquest[0]['NAME_INQUEST']?></h3>
				</div>
				<div class="panel-body">
					<form action="inquest/saveFill/" method="post" class="">
						<?php $i = 0; ?>
						<?php foreach($listQuestionInquest as $question){ ?>
						<div class="form-group">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<label for="response-<?= $question['ID_QUESTION'] ?>" class="control-label">
									<?= ++$i; ?>.- <?= Helper::camelUpperCase($question['DESCRIPTION_QUESTION']) ?>
								</label>
								<input type="text"
								       name="response[<?= $i ?>][idQuestion]"
								       value="<?= $question['ID_QUESTION'] ?>"
								       title="id de pregunta"
								       class="hidden">
								<?php if ($question['ACTIVE_QUESTION'] == 2){?>
								<br>
								<?php $valueDescription = isset($question['DESCRIPTION_RESPONSE']) ? Helper::camelUpperCase($question['DESCRIPTION_RESPONSE']) : '0'?>
								<label class="radio-inline">
									<input type="radio" name="response[<?=$i?>][response]"
									       value="1" <?=$valueDescription == 1 ? 'checked' : ''?>>
									Muy mala
								</label>
								<label class="radio-inline">
									<input type="radio" name="response[<?=$i?>][response]"
									       value="2" <?=$valueDescription == 2 ? 'checked' : ''?>>
									Mala
								</label>
								<label class="radio-inline">
									<input type="radio" name="response[<?=$i?>][response]"
									       value="3"<?=$valueDescription == 3 ? 'checked' : ''?>>
									Regular
								</label>
								<label class="radio-inline">
									<input type="radio" name="response[<?=$i?>][response]"
									       value="4" <?=$valueDescription == 4 ? 'checked' : ''?>>
									Buena
								</label>
								<label class="radio-inline">
									<input type="radio" name="response[<?=$i?>][response]"
									       value="5" <?=$valueDescription == 5 ? 'checked' : ''?>>
									Muy Buena
								</label>
								<br>
								<?php }?>
								<?php if ($question['ACTIVE_QUESTION'] == 1){?>
								<textarea
										id="response-<?= $question['ID_QUESTION'] ?>"
										name="response[<?= $i ?>][response]"
										class="form-control"
										title="Respuestas"
										rows="3"><?=isset($question['DESCRIPTION_RESPONSE']) ? Helper::camelUpperCase($question['DESCRIPTION_RESPONSE']) : ''?></textarea>
								<?php }?>
								<br>
							</div>
						</div>
						<?php } ?>
						<hr>
						<button type="submit" class="btn btn-primary pull-right" name="save">
							Guardar <i class="fa fa-save"></i>
						</button>
					</form>
				</div>
			</div>
			<?php }
			else { ?>
			<img src="img/404/caja-vacia.jpg"
			     class="app-img-5 center-block"
			     alt="No existen datos disponibles">
			<h4 class="text-center text-success">No existen encuestas activas</h4>
			<?php } ?>
		</div>
	</div>
</section>