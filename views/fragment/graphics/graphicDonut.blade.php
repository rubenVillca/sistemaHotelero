<!-- graficas en vertical -->
<?php if(!empty($distribution)) { ?>
<script type="text/javascript">
    $(function () {
        $('#graphicDonut').highcharts({
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45
                }
            },
            title: {
                text: '<?=$distribution[0]['NAME_SERVICE']?>'
            },
            subtitle: {
                text: 'Grafica en forma de donut'
            },
            plotOptions: {
                pie: {
                    innerSize: 100,
                    depth: 45
                }
            },
            series: [{
                name: '<?=$distribution[0]['NAME_TYPE_MONEY']?>',
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
<div id="graphicDonut" class="graphics"></div>
<?php }else { ?>
<div class="col-xs-12 col-lg-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
    <div class="thumbnail">
        <h4 class="text-center">Datos de servicio no encontrados</h4>
        <img src="img/404/caja-vacia.jpg" class="app-img-5 center-block" alt="No existen datos disponibles">
    </div>
</div>
<?php } ?>