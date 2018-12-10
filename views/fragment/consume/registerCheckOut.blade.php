<!-- Section-->
<section>
	<?php if (!empty($person)) { ?>
    <form action="checkOut/insert_dd/<?= $person['ID_CHECK'] ?>"
          method="post"
          id="form-check-out"
          class="form-horizontal"
          name="checkOut">
        <div class="">
            <div class="container-fluid">
                <h3 class="text-primary">Articulos entregados</h3>
            </div>
            <hr>
            <div class="">
                <!--form de datos de habitaciones registradas -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<?php if (!empty($listConsumRoom)) { ?>
					<?php $limit = 0; ?>
					<?php $idConsum = 0;
					foreach ($listConsumRoom as $consum) { ?>
                    <div class="clearfix">
                        <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
                            <!-- nombre de habitacion -->
                            <p><b>Habitaci&oacute;n:</b> <?= $consum['NAME_ROOM'] ?></p>
                            <!-- Nombre de servicio -->
                            <p><b>Servicio:</b> <?= $consum['NAME_SERVICE'] ?></p>
                        </div>
                        <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
						<?php
						if ($idConsum != $consum['ID_CONSUME_SERVICE']) {
						$idConsum = $consum['ID_CONSUME_SERVICE'];
						$isTitle = 1; ?>
						<?php foreach ($consum['0'] as $article) { ?>
						<?php if ($article['ID_STATE_ARTICLE'] == 1) { ?>
						<?php if ($isTitle) { ?>
                        <!-- Objetos Entregados -->
                            <input type="text"
                                   name="listArticle[<?= $limit ?>][idConsum]"
                                   class="hidden"
                                   title=""
                                   value="<?= $consum['ID_CONSUME_SERVICE'] ?>">
                            <label class="control-label"
                                   for="idArticle-<?= $limit ?>">Objetos entregados</label>
							<?php $isTitle = 0;
							} ?>
                            <p>
                                <input id="idArticle-<?= $limit ?>"
                                       type="checkbox"
                                       value="<?= $article['ID_ARTICLE'] ?>"
                                       name="listArticle[<?= $limit ?>][idArticle][<?= $article['ID_ARTICLE'] ?>]"
                                       required>
								<?= $article['NAME_ARTICLE'] ?>
                            </p>
							<?php } ?>
							<?php } ?>
							<?php } ?>
                        </div>
                    </div>
                    <hr>
					<?php $limit++; ?>
					<?php } ?>
					<?php } ?>
                </div>
                <!--Botones registrar - registrar-limpiar-cancelar-->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <!--Pago Final-->
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <label class="control-label" for="pay">Pago final (<?= isset($type) ? $type : '$' ?>)</label>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <input type="number"
                               step="0.1"
                               class="form-control"
                               id="pay"
                               name="pay"
                               value="<?= isset($total)&&$total!=0 ? $total : 0; ?>">
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <button type="submit"
                                class="btn btn-primary"
                                id="enviar"
                                name="registrar"
                                onclick="return validForm('form-check-out','¿Desea registrar la salida del huesped?','La operacion no se podra deshacer!','warning')">
                            Registrar Salida <i class="fa fa-check-circle"></i>
                        </button>
                    </div>
                    <br><br>
                </div>
            </div>
        </div>
    </form>
	<?php } else { ?>
    <h3 class="text-center animated zoomIn">Registro no encontrado</h3>
	<?php } ?>
</section>