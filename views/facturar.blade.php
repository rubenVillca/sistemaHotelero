<!--Section de verificar cuentas-->
<section>
    <!--Buscar por cliente-->
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 panel-body">
        <form action="#" method="post">
            <div class="col-xs-6 col-sm-6 col-md-8 col-lg-8">
                <input list="lista-clientes"
                       name="cliente"
                       id="cliente"
                       class="form-control"
                       placeholder="Buscar usuario"
                       required
                       value="<?= isset($_POST['searchUser']) ? $_POST['searchUser'] : ''; ?>">
                <datalist id="lista-clientes">
                    <option value="cliente1">Cliente1</option>
                    <option value="cliente2">Cliente2</option>
                    <option value="Cliente3">Cliente3</option>
                    <option value="Cliente4">Cliente4</option>
                </datalist>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                <input type="submit" value="buscar" class="form-control">
            </div>
        </form>
        <!--Caracterisicas de la cuentas-->
        <div class="row panel-body">
            <div>
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-10">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. repudiandae rerum tenetur
                    </p>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2">
                    <a href="#">Modificar</a>
                </div>
            </div>
            <div>
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-10">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. repudiandae rerum tenetur
                    </p>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2">
                    <a href="#">Modificar</a>
                </div>
            </div>
            <div>
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-10">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. repudiandae rerum tenetur
                    </p>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2">
                    <a href="#">Modificar</a>
                </div>
            </div>
            <div>
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-10">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. repudiandae rerum tenetur
                    </p>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2">
                    <a href="#">Modificar</a>
                </div>
            </div>
            <div>
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-10">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. repudiandae rerum tenetur
                    </p>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2">
                    <a href="#">Modificar</a>
                </div>
            </div>
            <div>
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-10">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. repudiandae rerum tenetur
                    </p>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2">
                    <a href="#">Modificar</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--section de ver factura -->
<section>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <h3 class="text-center">Factura</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="bg-info">
                <tr>
                    <th>Nro</th>
                    <th>Servicio</th>
                    <th>Costo</th>
                    <th>Fecha de uso</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>comida</td>
                    <td>45,5</td>
                    <td>12/12/2015</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>comida</td>
                    <td>45,5</td>
                    <td>12/12/2015</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>comida</td>
                    <td>45,5</td>
                    <td>12/12/2015</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>comida</td>
                    <td>45,5</td>
                    <td>12/12/2015</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>comida</td>
                    <td>45,5</td>
                    <td>12/12/2015</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>comida</td>
                    <td>45,5</td>
                    <td>12/12/2015</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>comida</td>
                    <td>45,5</td>
                    <td>12/12/2015</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>comida</td>
                    <td>45,5</td>
                    <td>12/12/2015</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>comida</td>
                    <td>45,5</td>
                    <td>12/12/2015</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>comida</td>
                    <td>45,5</td>
                    <td>12/12/2015</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>comida</td>
                    <td>45,5</td>
                    <td>12/12/2015</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>comida</td>
                    <td>45,5</td>
                    <td>12/12/2015</td>
                </tr>


                </tbody>
            </table>
        </div>
        <a href="#" class="pull-right btn btn-success">Imprimir</a>
        <a href="#" class="pull-right btn btn-info">Guardar como</a>
    </div>
</section>
