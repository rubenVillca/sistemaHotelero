<!--Seccion Fromulario para generar-->
<section>
	<?php if(!empty($listService)) { ?>
    <div class="app-color-white animated zoomIn panel">
        <form action="<?='report/'?>" method="post" class="form-horizontal">
            <!-- lista de servicios -->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <label class="control-label" for="idService">Servicio</label>
                <select name="idService" id="idService" class="form-control">
                    <option value="0">Todos los servicios</option>
					<?php foreach($listService as $item) { ?>
                    <option value='<?= $item['ID_SERVICE'] ?>' <?= $idService == $item['ID_SERVICE'] ? 'selected' : ''; ?>>
						<?= $item['NAME_SERVICE'] ?>
                    </option>
					<?php } ?>
                </select>
            </div>
            <!-- fecha inicio -->
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2">
                <label class="control-label" for="dateIn">Fecha Inicio</label>
                <input type="date"
                       name="dateIn"
                       id="dateIn"
                       class="form-control datepickerHistory"
                       value="<?= isset($dateIn) ? $dateIn : date('Y-m-d'); ?>"
                       placeholder="YYYY-MM-DD"
                       title="Fecha Inicio"
                       required>
            </div>
            <!-- fecha fin -->
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2">
                <label class="control-label" for="dateOut">Fecha Fin</label>
                <input type="date"
                       name="dateOut"
                       id="dateOut"
                       class="form-control datepickerHistory"
                       value="<?= isset($dateOut) ? $dateOut : date('Y-m-d'); ?>"
                       placeholder="YYYY-MM-DD"
                       title="Fecha fin"
                       required>
            </div>
            <!-- botones graficar-->
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-2">
                <br>
                <button type="submit"
                        value="generar"
                        name="graphics"
                        id="generar"
                        class="form-control btn btn-primary">
                    <span class="glyphicon glyphicon-stats"></span> Graficar
                </button>
            </div>
            <!-- boton imprimir -->
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-2">
                <br>
                <button type="submit" value="imprimir" class="form-control btn btn-success" id="imprimir"
                        name="imprimir">
                    <span class="glyphicon glyphicon-print"></span> Imprimir
                </button>
            </div>
        </form>
    </div>
    <div class="clearfix"></div>
    <br>
	<?php } ?>
</section>