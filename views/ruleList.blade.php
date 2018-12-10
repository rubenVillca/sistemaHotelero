<!-- lista de reglas -->
<section>
    <div class="app-color-white">
	<?php if(!empty($listRule)){ ?>
    <!-- lista de reglas -->
        <div class="table-responsive">
            <table class="table table-striped">
                <!-- cabecera table -->
                <thead class="bg-success">
                <tr>
                    <th class="hidden-xs">Nro</th>
                    <th>Nombre</th>
                    <th class="hidden-xs">descripci&oacute;n</th>
                    <th>Tipo</th>
                    <th class="hidden-xs hidden-sm">Estado</th>
                    <th>Opcion</th>
                </tr>
                </thead>
                <!-- contenido tabla -->
                <tbody>
				<?php $i = 1;
				foreach($listRule as $rule){ ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $rule['NAME_RULE'] ?></td>
                    <td><?= Helper::camelUpperCase($rule['DESCRIPTION_RULE']) ?></td>
                    <td><?= $rule['NAME_TYPE_RULE'] ?></td>
                    <td class="hidden-xs hidden-sm">
                        <i class="fa fa-<?= $rule['STATE_RULE'] ? 'check' : 'close' ?>"></i></td>
                    <td>
                        <button type="button"
                                class="btn btn-info btn-xs"
                                name="editRule"
                                data-toggle="modal"
                                data-target="#modalEdit-<?= $i ?>">
                            <span class="fa fa-edit"></span>
                        </button>
                        <a href="rule/delete_dd/<?= $rule['NAME_RULE'] ?>"
                           onclick="return validLink('rule/delete_dd/<?= $rule['NAME_RULE'] ?>','Eliminar Regla','La regla sera eliminada . ¿Esta seguro de eliminarla?','error')"
                           class="btn btn-danger btn-xs">
                            <i class="fa fa-remove"></i>
                        </a>
                        <!-- Modal editar nueva regla -->
                        <div id="modalEdit-<?= $i ?>"
                             class="modal fade"
                             role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button"
                                                class="close"
                                                data-dismiss="modal">&times;
                                        </button>
                                        <h4 class="modal-title text-center">Editar Regla</h4>
                                    </div>
                                    <form action="rule/edit_dd/<?= $rule['NAME_RULE'] ?>"
                                          method="post"
                                          role="form"
                                          name="form"
                                          id="form-<?=$i?>"
                                          enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <!-- tipo -->
                                            <label for="idType-<?= $i ?>"
                                                   class="control-label">Tipo deRegla</label>
                                            <select name="idType"
                                                    id="idType-<?= $i ?>"
                                                    class="form-control">
												<?php if(isset($listType)){
												foreach($listType as $type){ ?>
                                                <option value="<?= $type['ID_TYPE_RULE'] ?>" <?= $type['ID_TYPE_RULE'] == $rule['ID_TYPE_RULE'] ? 'selected' : '' ?>>
													<?= $type['NAME_TYPE_RULE'] ?>
                                                </option>
												<?php }
												} ?>
                                            </select>
                                            <!-- nombre -->
                                            <label for="name-<?= $i ?>">Nombre</label>
                                            <input id="name-<?= $i ?>"
                                                   name="name"
                                                   type="text"
                                                   class="form-control"
                                                   value="<?= $rule['NAME_RULE'] ?>"
                                                   placeholder="Nombre de la regla"
                                                   required>
                                            <!-- descripcion -->
                                            <label for="descr-<?= $i ?>">Descripci&oacute;n</label>
                                            <textarea id="descr-<?= $i ?>"
                                                      name="descr"
                                                      class="jqte-test form-control"
                                                      placeholder="Descripci&oacute;n"
                                                      rows="3"
                                                      required><?= Helper::camelUpperCase($rule['DESCRIPTION_RULE']); ?></textarea>
                                            <!-- state -->
                                            <label for="state-<?= $i ?>"
                                                   class="control-label">Activo:</label><br>
                                            <input type="radio"
                                                   id="state-<?= $i ?>"
                                                   name="state"
                                                   value="1" <?= $rule['STATE_RULE'] == 1 ? 'checked' : '' ?>
                                                   required> Activo
                                            <input type="radio"
                                                   id="state-<?= $i ?>"
                                                   name="state"
                                                   value="0" <?= $rule['STATE_RULE'] == 0 ? 'checked' : '' ?>>
                                            No activo
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"
                                                    class="btn btn-danger"
                                                    data-dismiss="modal">
                                                <i class="fa fa-close"></i> Cerrar
                                            </button>
                                            <button type="submit"
                                                    onclick="return validForm('form-<?=$i?>','¿Desea modificar?','La regla seleccionada sera modificada','info')"
                                                    class="btn btn-primary"
                                                    name="update"
                                                    id="update-<?= $i ?>">
                                                Guardar <i class="fa fa-refresh"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
				<?php } ?>
                </tbody>
            </table>
        </div>
		<?php }
		else{ ?>
        <div class="thumbnail">
            <img src="img/404/caja-vacia.jpg"
                 class="app-img-5 center-block"
                 alt="No existen datos disponibles">
            <h4 class="text-center">No existen reglas registrados</h4>
        </div>
	<?php } ?>
    <!-- insertar nueva regla -->
        <div class="panel">
            <button type="button"
                    class="btn btn-primary btn-block"
                    name="insertType"
                    data-toggle="modal"
                    data-target="#modalInsert">
                <span class="fa fa-plus"></span> A&ntilde;adir
            </button>
        </div>
    </div>
</section>
<!-- Modal insertar nueva regla -->
<div id="modalInsert"
     class="modal fade"
     role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button"
                        class="close"
                        data-dismiss="modal">&times;
                </button>
                <h4 class="modal-title text-center">A&ntilde;adir tipo</h4>
            </div>
			<?php if(!empty($listType)){ ?>
            <form action="rule/insert_dd/"
                  method="post"
                  role="form"
                  enctype="multipart/form-data">
                <!-- formulario para insertar -->
                <div class="modal-body">
                    <label for="idType"
                           class="control-label">Tipo de Regla</label>
                    <select name="idType"
                            id="idType"
                            class="form-control"
                            required>
						<?php foreach($listType as $type){ ?>
                        <option value="<?= $type['ID_TYPE_RULE'] ?>"><?= $type['NAME_TYPE_RULE'] ?></option>
						<?php } ?>
                    </select>
                    <label for="name">Nombre</label>
                    <input type="text"
                           class="form-control"
                           name="name"
                           id="name"
                           placeholder="Nombre de la regla"
                           required>
                    <label for="descr">Descripci&oacute;n</label>
                    <textarea class="jqte-test form-control"
                              name="descr"
                              id="descr"
                              placeholder="Descripci&oacute;n del tipo"
                              rows="3"
                              required></textarea>
                    <label for="state"
                           class="control-label">Activo:</label><br>
                    <input type="radio"
                           id="state"
                           name="state"
                           value="1"
                           checked
                           required> Activo
                    <input type="radio"
                           id="state"
                           name="state"
                           value="0"> No activo
                </div>
                <!-- botones -->
                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-danger"
                            data-dismiss="modal">
                        <i class="fa fa-close"></i> Cerrar
                    </button>
                    <button type="submit"
                            class="btn btn-primary"
                            name="insert"
                            id="insert">
                        <i class="fa fa-plus"></i> Insertar
                    </button>
                </div>
            </form>
            <!-- si no existen tipo de reglas -->
			<?php }
			else{ ?>
            <div class="modal-body">
                <h4><b>Primeramente inserte un tipo de reglas</b></h4>
            </div>
            <div class="modal-footer">
                <a href="rule/typeList/"
                   class="btn btn-success"><i class="fa fa-list"></i> Ver tipo de reglas</a>
                <button type="button"
                        class="btn btn-warning"
                        data-dismiss="modal">
                    <i class="fa fa-close"></i> Cerrar
                </button>
            </div>
			<?php } ?>
        </div>
    </div>
</div>