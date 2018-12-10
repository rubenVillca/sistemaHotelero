<section>
    <div class="app-color-white animated fadeIn col-xs-12 col-sm-12 col-md-12 col-lg-10 col-lg-offset-1">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Crear menu</h3>
            </div>
            <div class="panel-body">
                <form action="menu/insert_dd/" method="post" enctype="multipart/form-data">
                    <!-- Nombre de menu food -->
                    <div class="form-group">
                        <label for="nameMenuFood" class="control-label">Nombre del Menu</label>
                        <input type="text" id="nameMenuFood" name="nameMenuFood" class="form-control"
                               placeholder="Nombre del menu de la comida" required>
                    </div>
                    <!-- Fechas Ingreso, Egreso -->
                    <div class="form-group">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="row">
                            <label for="dateMenuIni">Fecha de Inicio</label>
                            <input type="date" id="dateMenuIni" name="dateMenuIni" class="form-control datepicker"
                                   required>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label for="dateMenuFin">Fecha de Fin</label>
                            <input type="date" id="dateMenuFin" name="dateMenuFin" class="form-control datepicker"
                                   required>
                        </div>
                    </div>
                    <!-- activo? -->
                    <div class="form-group">
                        <label class="radio-inline">
                            <input type="radio" name="activeMenu" value="1" required> Activo
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="activeMenu" value="0"> No activo
                        </label>
                    </div>
                    <hr>
					<?php if(!empty($listFood)){ ?>
                    <div class="row">
                        <h3>Alimentos</h3>
						<?php $i = 1;
						foreach($listFood as $food){ ?>
                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 thumbnail">
                            <img src="<?= $food['IMAGE_FOOD'] ?>" alt="Comida"
                                 class="app-img-4 img-thumbnail app-img-font"
                                 onClick="habilitarFood(<?= $food['ID_FOOD'] ?>)">
                            <div class="app-img-checkBox">
                                <input type="checkbox" id="idFood-<?= $food['ID_FOOD'] ?>" name="idFood[]"
                                       value="<?= $food['ID_FOOD'] ?>">
                            </div>
                            <label for="idFood-<?= $food['ID_FOOD'] ?>"><?= $food['NAME_FOOD'] ?></label>
                        </div>
						<?php if($i % 4 == 0){ ?>
                        <div class="clearfix"></div>
						<?php } ?>
						<?php $i++; ?>
						<?php } ?>
                    </div>
                    <hr>
				<?php } ?>
                <!-- botones -->
                    <div class="row">
                        <div class="panel pull-right">
                            <a href="food/" class="btn btn-danger">
                                Cancelar <i class="fa fa-remove"></i>
                            </a>
                            <button type="submit" class="btn btn-primary" name="insert">
                                Insertar <i class="fa fa-save"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    function habilitarFood(idFood) {
        document.getElementById("idFood-" + idFood).checked = !document.getElementById("idFood-" + idFood).checked;
    }
</script>