<?php if(!empty($distribution) && $distribution[0]['ID_SERVICE'] > 0) { ?>
<script type="text/javascript">
    $(function () {
        $('#graphicTorta').highcharts({
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45,
                    beta: 0
                }
            },
            title: {
                text: '<?=$distribution[0]['NAME_SERVICE']?>'
            },
            subtitle: {
                text: 'Grafica en torta'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    depth: 35,
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}'
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Porcentaje',
                data: [
						<?php
						$totalIn = 0;
						$totalOut = 0;
						foreach($distribution as $dist) {
							$totalIn = $totalIn+$dist['INGRESO'];
							$totalOut = $totalOut+$dist['INGRESO'];
						}?>
                    ['Ingreso',   <?=$totalIn?>],
                    ['Egreso',    <?=$totalOut?>]
                ]
            }]
        });
    });
</script>
<div id="graphicTorta" class="graphics"></div>
<?php }else { ?>
<div class="col-xs-12 col-lg-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
    <div class="thumbnail">
        <h4 class="text-center">Datos de servicio no encontrados</h4>
        <img src="img/404/caja-vacia.jpg" class="app-img-5 center-block" alt="No existen datos disponibles">
    </div>
</div>
<?php } ?>