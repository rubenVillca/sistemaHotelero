<!-- graficas en vertical -->
<?php if (!empty($distribution) && $distribution[0]['ID_SERVICE'] > 0) { ?>
<script type="text/javascript">
    $(function () {
        $('#graphicArea').highcharts({
            chart: {
                type: 'areaspline'
            },
            title: {text: '<?=$distribution[0]['NAME_SERVICE']?>'},
            subtitle: {text: 'Grafica en Area'},
            xAxis: {
                categories: [
					<?php foreach($distribution as $dist){?>
                        '<?=$dist['DATE_START']?>',
					<?php }?>
                ],
                plotBands: [{ // visualize the weekend
                    from: 4.5,
                    to: 6.5,
                    color: 'rgba(68, 170, 213, .2)'
                }]
            },
            yAxis: {
                title: {
                    text: 'Ingreso en <?=$distribution[0]['NAME_TYPE_MONEY']?>'
                }
            },
            tooltip: {
                shared: true,
                valueSuffix: ' <?=$distribution[0]['NAME_TYPE_MONEY']?>'
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                areaspline: {
                    fillOpacity: 0.5
                }
            },
            series: [{
                name: 'Ingreso',
                data: [
					<?php
					$egreso = '';
					$reserva = '';
					foreach($distribution as $dist) {
						echo $dist['INGRESO'].',';
						$egreso = $egreso.$dist['EGRESO'].',';
						$reserva = $reserva.$dist['RESERVA'].',';
					}?>
                ]
            }, {
                name: 'Egresos',
                data: [<?=$egreso?>]
            }, {
                name: 'Reservas',
                data: [<?=$reserva?>]
            }]
        });
    });
</script>
<div id="graphicArea" class="graphics center-block"></div>
<?php } else { ?>
<div class="col-xs-12 col-lg-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
    <div class="thumbnail">
        <h4 class="text-center">Datos de servicio no encontrados</h4>
        <img src="img/404/caja-vacia.jpg" class="app-img-5 center-block" alt="No existen datos disponibles">
    </div>
</div>
<?php } ?>