<section>
    <div class="app-color-white animated fadeIn col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
		<?php if(!empty($menu)){ ?>
        <form action="menu/edit_dd/<?= $menu[0]['ID_MENU'] ?>"
              method="post"
              id="form-menu-edit"
              enctype="multipart/form-data">
            <!-- Nombre de menu food -->
            <div class="row">
                <label for="nameMenuFood"
                       class="control-label">Nombre del Menu</label>
                <input type="text"
                       id="nameMenuFood"
                       name="nameMenuFood"
                       class="form-control"
                       value="<?= $menu['0']['NAME_FOOD'] ?>"
                       placeholder="Nombre del menu de la comida"
                       required>
            </div>
            <!-- Fechas Ingreso, Egreso -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="row">
                                <label for="dateMenuIni">Fecha de Inicio</label>
                                <input type="date"
                                       id="dateMenuIni"
                                       name="dateMenuIni"
                                       class="form-control datepicker"
                                       value="<?= $menu['0']['DATE_START_MENU'] ?>">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="row">
                                <label for="dateMenuFin">Fecha de Fin</label>
                                <input type="date"
                                       id="dateMenuFin"
                                       name="dateMenuFin"
                                       class="form-control datepicker"
                                       value="<?= $menu['0']['DATE_END_MENU'] ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- activo? -->
            <div class="row">
                <label class="radio-inline">
                    <input type="radio"
                           name="activeMenu"
                           value="1" <?= $menu['0']['ACTIVE_MENU'] == 1 ? 'checked' : ''; ?> > Activo
                </label>
                <label class="radio-inline">
                    <input type="radio"
                           name="activeMenu"
                           value="0" <?= $menu['0']['ACTIVE_MENU'] == 0 ? 'checked' : ''; ?>> No activo
                </label>
            </div>
            <hr>
			<?php if(!empty($listFood)){ ?>
            <div class="row">
                <h3>Alimentos</h3>
				<?php foreach($listFood as $food){ ?>
                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 thumbnail">
                    <img src="<?= $food['IMAGE_FOOD'] ?>"
                         alt="Comida"
                         class="app-img-4 img-thumbnail app-img-font"
                         onClick="habilitarFood(<?= $food['ID_FOOD'] ?>)">
                    <div class="app-img-checkBox">
						<?php
						$checked = '';
						foreach($menu as $m) {
							if($m['ID_FOOD'] == $food['ID_FOOD'])
								$checked = !empty($checked) ?: 'checked';
						} ?>
                        <input type="checkbox"
                               id="idFood-<?= $food['ID_FOOD'] ?>"
                               name="idFood[]"
                               value="<?= $food['ID_FOOD'] ?>" <?= $checked ?>>
                    </div>
                    <label for="idFood-<?= $food['ID_FOOD'] ?>"><?= $food['NAME_FOOD'] ?></label>
                </div>
				<?php } ?>
            </div>
            <hr>
		<?php } ?>
        <!-- botones -->
            <div class="row">
                <div class="panel pull-right">
                    <a href="menu/panel/"
                       class="btn btn-danger">
                        Cancelar <i class="fa fa-remove"></i>
                    </a>
                    <button type="submit"
                            onclick="return validForm('form-menu-edit','Actualizar','Desea guardar los cambios efectuados en este menu','info')"
                            class="btn btn-primary"
                            name="insert">
                        Actualizar <i class="fa fa-refresh"></i>
                    </button>
                </div>
            </div>
        </form>
		<?php }
		else{ ?>
        <h4 class="text-center">No existen Menus disponibles</h4>
        <img src="img/404/caja-vacia.jpg"
             class="app-img-5 center-block"
             alt="No existen datos disponibles">
		<?php } ?>
    </div>
</section>
<script>
    function habilitarFood(idFood) {
        document.getElementById("idFood-" + idFood).checked = !document.getElementById("idFood-" + idFood).checked;
    }
</script>