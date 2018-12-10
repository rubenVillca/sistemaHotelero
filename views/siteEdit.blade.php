<section>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title text-center">Editar Sitio Tur&iacute;stico</h4>
        </div>
        <div class="panel-body">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-lg-offset-1">
                <form action="site/edit_dd/<?= $site['ID_SITE_TOUR']; ?>"
                      method="post"
                      id="form-edit-site-tour"
                      enctype="multipart/form-data">
                    <!-- name-->
                    <div class="row">
                        <label for="nameSite" class="control-label">Nombre del Sitio</label>
                        <input type="text"
                               name="nameSite"
                               class="form-control"
                               id="nameSite"
                               value="<?= $site['NAME_SITE_TOUR']; ?>">
                    </div>
                    <!-- descripcion-->
                    <div class="row">
                        <label for="descrSite" class="control-label">Descripci&oacute;n</label>
                        <textarea name="descrSite"
                                  class="jqte-test form-control"
                                  id="descrSite"
                                  rows="5"><?= $site['DESCRIPTION_SITE_TOUR']; ?></textarea>
                    </div>
                    <!-- Direccion-->
                    <div class="row">
                        <label for="addressSite" class="control-label">Direcci&oacute;n</label>
                        <input type="text"
                               name="addressSite"
                               class="form-control"
                               id="addressSite"
                               value="<?= $site['ADDRESS_SITE_TOUR']; ?>">
                    </div>
                    <!-- coordenadas -->
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="row">
                                <!-- coordenadas GPS X-->
                                <label for="gps-x" class="control-label">Coordenadas GPS X</label>
                                <input type="number"
                                       step="0.00000001"
                                       name="gpsX"
                                       class="form-control"
                                       id="gps-x"
                                       value="<?= $site['ADDRESS_GPS_X_SITE_TOUR']; ?>">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="row">
                                <!-- coordenadas GPS Y-->
                                <label for="gps-y" class="control-label">Coordenadas GPS Y</label>
                                <input type="number"
                                       step="0.00000001"
                                       name="gpsY"
                                       class="form-control"
                                       id="gps-y"
                                       value="<?= $site['ADDRESS_GPS_Y_SITE_TOUR']; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- tabla y botones -->
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Cambiar imagen</th>
                                    <th>Opcion</th>
                                </tr>
                                </thead>
                                <tbody>
								<?php if(!empty($imgSite)){
								$i = 0; ?>
								<?php foreach($imgSite as $img){ ?>
                                <tr>
                                    <td><img src="<?= $img['IMAGE_SITE'] ?>" alt="Sin imagen" class="app-img-2"></td>
                                    <td>
                                        <input type="text"
                                               name="imgOld[<?= $img['ID_IMAGE_SITE'] ?>][idImg]"
                                               class="hidden"
                                               hidden
                                               value="<?= $img['ID_IMAGE_SITE'] ?>"
                                               title="id">
                                        <input type="text"
                                               name="imgOld[<?= $img['ID_IMAGE_SITE'] ?>][nameImg]"
                                               class="form-control"
                                               value="<?= $img['NAME_IMAGE_SITE'] ?>"
                                               title="Nombre de imagen">
                                    </td>
                                    <td>
										<textarea name="imgOld[<?= $img['ID_IMAGE_SITE'] ?>][descrImg]"
                                                  class="form-control"
                                                  rows="7"
                                                  title="Descripcion de imagen"><?= $img['DESCRIPTION_IMAGE_SITE'] ?></textarea>
                                    </td>
                                    <td>
                                        <input type="text"
                                               name="imgEditID[]"
                                               class="hidden"
                                               hidden
                                               value="<?= $img['ID_IMAGE_SITE'] ?>"
                                               title="id">
                                        <input type="file"
                                               name="imgEdit-<?= $img['ID_IMAGE_SITE'] ?>"
                                               id="img-<?=$i?>"
                                               class="file"
                                               title="Cambiar imagen por una nueva"
                                               data-show-upload="false"
                                               data-show-caption="false"
                                               data-show-remove="false"
                                               accept=".jpeg,.jpg,.gif,.png">
                                    </td>
                                    <td>
										<?php if($i > 0){ ?>
                                            <a href="javascript:void(0)" class="btn btn-xs btn-danger" id="remInput">
                                                <i class="fa fa-minus"></i>
                                            </a>
                                        <?php } ?>
                                        <?php $i++;?>
                                    </td>
                                </tr>
								<?php } ?>
								<?php } ?>
                                </tbody>
                                <!-- insertar imagenes -->
                                <tr>
                                    <td colspan="4">
                                        <label for="img" class="text-primary">Cargar mas imagenes</label>
                                        <input type="file"
                                               id="img"
                                               class="file-loading"
                                               name="img[]"
                                               data-show-upload="false"
                                               data-show-caption="false"
                                               data-show-remove="false"
                                               accept=".jpeg,.jpg,.gif,.png"
                                               multiple>
                                    </td>
                                </tr>
                                <!-- botones -->
                                <tfoot>
                                <tr>
                                    <td colspan="4">
                                        <div class="pull-right">
                                            <a href="site/panel/" class="btn btn-danger"><i class="fa fa-remove"></i>
                                                Cancelar
                                            </a>
                                            <button type="submit"
                                                    onclick="return validForm('form-edit-site-tour','Modificar','Desea modificar el sitio \'<?=$site['NAME_SITE_TOUR']?>\'?','success')"
                                                    class="btn btn-primary"
                                                    name="save">
                                                <i class="fa fa-save"></i> Guardar
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section><!-- SCRIPT -->
<script>
    //remove img
    $(function () {
        $(document).on('click', '#remInput', function () {
            $(this).parents('tr').remove();
            return false;
        });
    });
    //add img
    $(document).on('ready', function () {
        $("#img").fileinput({
            browseClass: "btn btn-primary btn-block",
            showCaption: false,
            showRemove: false,
            showUpload: false,
            uploadUrl: '/hotel/2',
            maxFilePreviewSize: 10240
        });
    });
</script>