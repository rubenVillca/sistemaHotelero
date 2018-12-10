<!-- formulario para filtrar Historial-->
<section>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row animated fadeInUp">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="text-center">Historial</h3>
                </div>
                <div class="panel-body">
                    <form action="#" method="post">
                        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                            <!--Lista de servicios-->
                            <input list="lista-servicio" name="servicio" id="servicio" class="form-control"
                                   placeholder="Escoger servicio">
                            <datalist id="lista-servicio">
                                <option value="uncategory">Sin categoriao</option>
                                <option value="servicios">Servicio</option>
                                <option value="servicios">Servicio</option>
                                <option value="servicios">Servicio</option>
                                <option value="servicios">Servicio</option>
                            </datalist>
                        </div>
                        <!--Lista de usuarios-->
                        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                            <input list="lista-user" name="user" id="user" class="form-control"
                                   placeholder="Escoger Usuario">
                            <datalist id="lista-user">
                                <option value="user1">User1</option>
                                <option value="user2">User2</option>
                                <option value="user3">User3</option>
                                <option value="user4">User4</option>
                                <option value="user5">User5</option>
                            </datalist>
                        </div>
                        <!--Escoger Fecha-->
                        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                            <input type="date" name="date" id="date" class="form-control datepicker"
                                   placeholder="fecha">
                        </div>
                        <!--Boton para realizar la busqueda-->
                        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                            <input type="submit" class="btn btn-info form-control" value="Filtrar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
