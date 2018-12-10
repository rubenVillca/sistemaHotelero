<!--Caracteristicas de busqueda para actividades-->
<section>
    <div class="panel panel-primary animated fadeInUp">
        <div class="panel-heading">
            <h2 class="text-center">Actividades</h2>
        </div>
        <div class="panel-body">
            <form action="#" method="post">
                <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-3">
                    <input list="listaTipo" name="tipoActividad" id="tipoActividad" class="form-control"
                           title="Lista de actividades">
                    <datalist id="listaTipo">
                        <option value="caminara">caminata</option>
                        <option value="concurso">concuro</option>
                        <option value="fiesta">fista</option>
                        <option value="salon">cumpleanos</option>
                        <option value="salon">salon</option>
                    </datalist>
                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-3">
                    <input list="lista-encargados" name="encargado" id="encargado" class="form-control"
                           title="lista de actividades">
                    <datalist id="lista-encargados">
                        <option value="caminara">caminata</option>
                        <option value="concurso">concuro</option>
                        <option value="fiesta">fista</option>
                        <option value="salon">cumpleanos</option>
                        <option value="salon">salon</option>
                    </datalist>
                </div>

                <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-2">
                    <input type="date" name="fechaIni" id="fechaIni" class="form-control datepicker"
                           title="Formato fecha: aaaa/mm/dd">
                </div>
                <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-2">
                    <input type="date" name="fechaFin" id="fechaFin" class="form-control datepicker"
                           title="Formato fecha: aaaa/mm/dd">
                </div>
                <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-2">
                    <input type="submit" value="buscar" class="form-control">
                </div>
            </form>
        </div>
    </div>
</section>