<section>
    <div class="app-color-white animated fadeIn col-xs-12 col-sm-12 col-md-8 col-md-offset-4 col-lg-6 col-lg-offset-3">
		<?php if(!empty($article)){ ?>
        <form action="<?= 'article/edit_dd/'.$article['ID_ARTICLE'] ?>"
              method="post"
              id="form-edit-article"
              enctype="multipart/form-data">
            <!-- Nombre de article -->
            <div class="row">
                <label for="nameArticle"
                       class="control-label">Nombre del articulo</label>
                <input type="text"
                       id="nameArticle"
                       name="nameArticle"
                       class="form-control"
                       value="<?= $article['NAME_ARTICLE'] ?>"
                       placeholder="Nombre del articulo"
                       required>
            </div>
            <!-- descripcion de article -->
            <div class="row">
                <label for="descrArticle"
                       class="control-label">Descripci&oacute;n del articulo</label>
                <textarea id="descrArticle"
                          name="descrArticle"
                          class="form-control jqte-test"
                          placeholder="Descripci&oacute;n del articulo"
                          required><?= $article['DESCRIPTION_ARTICLE'] ?></textarea>
            </div>
            <!-- estado,cantidad article -->
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="row">
                        <label for="stateArticle"
                               class="control-label">Estado del articulo</label>
                        <br>
                        <label class="radio-inline">
                            <input type="radio"
                                   id="activo"
                                   value="1"
                                   name="stateArticle" <?= $article['STATE_ARTICLE'] ? 'checked' : '' ?>
                                   required> Activo
                        </label>
                        <label class="radio-inline">
                            <input type="radio"
                                   id="nonActivo"
                                   value="0"
                                   name="stateArticle" <?= $article['STATE_ARTICLE'] ? '' : 'checked' ?>> No activo
                        </label>
                    </div>
                </div>
                <!-- cantidad article -->
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="row">
                        <label for="nArticle"
                               class="control-label">Cantidad de articulos</label>
                        <input type="number"
                               id="nArticle"
                               name="nArticle"
                               min="1"
                               max="999"
                               value="<?= $article['UNIT_ARTICLE'] ?>"
                               class="form-control"
                               placeholder="cantidad de articulos"
                               required>
                    </div>
                </div>
            </div>
            <!-- botones -->
            <hr>
            <div class="row">
                <div class="panel pull-right">
                    <a href="<?= 'article/'?>"
                       class="btn btn-danger">Cancelar <i class="fa fa-remove"></i></a>
                    <button type="submit"
                            onclick="return validForm('form-edit-article','Modificar','Desea modificar el articulo <?=$article['NAME_ARTICLE']?>?','success')"
                            class="btn btn-primary"
                            name="update">Actualizar <i class="fa fa-plus"></i></button>
                </div>
            </div>
        </form>
		<?php } ?>
    </div>
</section>