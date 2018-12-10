<!--Section de tabla de informe de servicio -->
<?php if(!empty($listServices) && $listServices[0]['ID_SERVICE'] > 0) { ?>
<div class="panel panel-primary animated zoomIn">
    <div class="panel-heading">
        <h3 class="text-center">Informe servicio</h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nro</th>
                    <th>Fecha Ini</th>
                    <th>Fecha Fin</th>
                    <th>Ingreso</th>
                    <th>clientes</th>
                    <th>Quejas</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>2015/12/12</td>
                    <td>2015/12/12</td>
                    <td>152bs</td>
                    <td>45</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>2015/19</td>
                    <td>2015/45/2</td>
                    <td>1235$</td>
                    <td>46</td>
                    <td>2</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>2015/12/10</td>
                    <td>2015/12/13</td>
                    <td>6545Bs</td>
                    <td>6855</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>2015/12/12</td>
                    <td>2015/12/12</td>
                    <td>454$</td>
                    <td>45</td>
                    <td>45</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>2015/12/12</td>
                    <td>2015/45/12</td>
                    <td>24</td>
                    <td>245</td>
                    <td>45</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="panel-footer">
            <a href="#" class="pull-right">Ver Gr&aacute;fica
                <span class="glyphicon glyphicon-plus"></span>
            </a>
        </div>
    </div>
</div>	<?php }?>