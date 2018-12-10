<section>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title text-center">
                <b>Lista de tipo <?= $table ?></b>
				<?php $tableState = strtoupper($table) ?>
            </div>
        </div>
        <div class="panel-body">
            <!-- lista -->
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="bg-success">
                    <tr>
                        <th>Nro</th>
                        <th>Nombre</th>
                        <th class="hidden-xs">descripci&oacute;n</th>
                        <th class="hidden-xs hidden-sm">Estado</th>
                        <th class="hidden-xs hidden-sm">Imagen</th>
                        <th>Opcion</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php if(!empty($listType)){
					$i = 1;
					foreach($listType as $type){ ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $type['NAME_TYPE_'.$tableState] ?></td>
                        <td class="hidden-xs"><?= Helper::camelUpperCase($type['DESCRIPTION_TYPE_'.$tableState]) ?></td>
                        <td class="hidden-xs hidden-sm"><?= $type['VALUE_TYPE_'.$tableState] ? 'Activo' : 'No activo' ?></td>
                        <td class="hidden-xs hidden-sm">
                            <img src="<?= $type['IMAGE_TYPE_'.$tableState]; ?>"
                                 alt="sin Imagen"
                                 class="app-img-1">
                        </td>
                        <td>
                            <a href="type/edit/<?= $type['ID_TYPE_'.$tableState] ?>/<?= strtolower($table); ?>/"
                               class="btn btn-primary btn-xs">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="type/delete_dd/<?= $type['ID_TYPE_'.$tableState] ?>/<?= strtolower($table); ?>/"
                               class="btn btn-danger btn-xs"
                               onclick="return validLink('type/delete_dd/<?= $type['ID_TYPE_'.$tableState] ?>/<?= strtolower($table) ?>','¿Desea Eliminar?','El huesped quedara registrado en el hotel','error')">
                                <i class="fa fa-remove"></i>
                            </a>
                        </td>
                    </tr>
					<?php } ?>
					<?php }
					else{ ?>
                    <tr>
                        <td colspan="6">
                            <div class="center-block col-xs-12 col-sm-12 col-md-12 col-lg-6 col-lg-push-3 ">
                                <img src="img/404/caja-vacia.jpg"
                                     class="app-img-5 center-block"
                                     alt="No existen datos disponibles">
                                <h4 class="text-center">No existen tipos de <?= $tableState ?> registrados</h4>
                            </div>
                        </td>
                    </tr>
					<?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- botones -->
            <div class="pull-right">
                <a href='settings/'
                   class="btn btn-danger">
                    <i class="fa fa-arrow-left"></i> Atras
                </a>
                <button type="button"
                        class="btn btn-primary"
                        name="insertType"
                        data-toggle="modal"
                        data-target="#modalInsert">
                    <span class="fa fa-plus"></span> A&ntilde;adir
                </button>
            </div>
        </div>
    </div>
</section>
<!-- Modal insertar nuevo tipo -->
<div id="modalInsert"
     class="modal fade"
     role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">A&ntilde;adir tipo</h4>
            </div>
            <form action="type/insert/<?= strtolower($table); ?>/"
                  method="post"
                  enctype="multipart/form-data">
                <!-- datos del tipo -->
                <div class="modal-body">
                    <!-- nombre -->
                    <label for="nameType">Nombre</label>
                    <input type="text"
                           class="form-control"
                           name="nameType"
                           id="nameType"
                           placeholder="Nombre del tipo"
                           required>
                    <!-- descripcion -->
                    <label for="descrType">Descripci&oacute;n</label>
                    <textarea class="jqte-test form-control"
                              name="descrType"
                              id="descrType"
                              placeholder="Descripci&oacute;n del tipo"
                              rows="3"
                              title="Ingrese el campo"
                              required></textarea>
                    <!-- imagen -->
                    <label for="imgAddress"
                           class="control-label">Imagen del tipo</label>
                    <input type="file"
                           id="imgAddress"
                           name="imgAddress"
                           class="file"
                           data-show-upload="false"
                           data-show-caption="true">
                    <!-- estado -->
					<?php if(!isset($state)){ ?>
                    <label for="active"
                           class="control-label">Activo:</label><br>
                    <input type="radio"
                           id="active"
                           name="active"
                           value="1"
                           checked
                           required> Activo
                    <input type="radio"
                           id="active"
                           name="active"
                           value="0"> No activo
					<?php }
					else{ ?>
                    <div class="hidden">
                        <input type="text"
                               id="active"
                               name="active"
                               value="<?= $state ?>"> No activo
                    </div>
					<?php } ?>
                </div>
                <!-- botones -->
                <div class="modal-footer">
                    <button type="submit"
                            class="btn btn-primary"
                            name="insert"
                            id="insert">
                        <i class="fa fa-save"></i> Insertar
                    </button>
                    <button type="button"
                            class="btn btn-danger"
                            data-dismiss="modal">
                        Cerrar <i class="fa fa-close"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
