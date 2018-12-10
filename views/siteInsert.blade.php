<section>
    <div class="app-color-white animated fadeIn">
        <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
            <h3 class="text-center">Insertar Sitio Tur&iacute;stico</h3>
            <form action="site/insert_dd/" method="post" enctype="multipart/form-data">
                <!-- name-->
                <div class="row">
                    <label for="name" class="control-label">Nombre del Sitio</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <!-- descripcion-->
                <div class="row">
                    <label for="descr" class="control-label">Descripci&oacute;n</label>
                    <textarea name="descr" class="jqte-test form-control" id="descr" rows="5"></textarea>
                </div>
                <!-- Direccion-->
                <div class="row">
                    <label for="address" class="control-label">Direcci&oacute;n</label>
                    <input type="text" name="address" class="form-control" id="address" required>
                </div>
                <!-- coordenadas GPS X-->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="row">
                            <label for="gpsX" class="control-label">Coordenadas GPS X</label>
                            <input type="number" step="0.00000001" value="0" name="gpsX" class="form-control" id="gpsX">
                        </div>
                    </div>
                    <!-- coordenadas GPS Y-->
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <label for="gpsY" class="control-label">Coordenadas GPS Y</label>
                        <input type="number" step="0.00000001" value="0" name="gpsY" class="form-control" id="gpsY">
                    </div>
                </div>
                <!-- imagenes -->
                <div class="row">
                    <label for="img">Imagenes</label>
                    <input type="file"
                           id="img"
                           class="file-loading"
                           name="img[]"
                           data-show-upload="false"
                           data-show-caption="false"
                           data-show-remove="false"
                           accept=".jpeg,.jpg,.gif,.png"
                           multiple
                           required>
                </div>
                <hr>
                <!-- boones -->
                <div class="row">
                    <!-- Boton de guardar -->
                    <div class="pull-right panel">
                        <button type="submit" class="btn btn-primary" name="insert">
                            <i class="fa fa-save"></i> Siguiente
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- script  -->
<script>
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