<!-- graficas en vertical -->
<?php if (!empty($distribution)) { ?>
<script type="text/javascript">
    $(function () {
        $('#graphicHistogram').highcharts({
            chart: {
                type: 'bar'
            },
            title: {text: '<?=$distribution[0]['NAME_SERVICE']?>'},
            subtitle: {text: 'Grafica Histograma'},
            xAxis: {
                categories: [
					<?php foreach($distribution as $dist) {?>
                        "<?=$dist['DATE_START'];?>",
					<?php }?>
                ],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: '(<?=$distribution[0]['NAME_TYPE_MONEY']?>)',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' <?=$distribution[0]['NAME_TYPE_MONEY']?>'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -40,
                y: 80,
                floating: true,
                borderWidth: 1,
                backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [
                {
                    name: "Ingeso",
                    data: [<?php foreach($distribution as $dist) {
						echo $dist['INGRESO'].',';
					}?>]
                },
                {
                    name: "Egreso",
                    data: [<?php foreach($distribution as $dist) {
						echo $dist['EGRESO'].',';
					}?>]
                }
            ]
        });
    });
</script>
<div id="graphicHistogram" class="graphics"></div>
<?php } else { ?>
<div class="col-xs-12 col-lg-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
    <div class="thumbnail">
        <h4 class="text-center">Datos de servicio no encontrados</h4>
        <img src="img/404/caja-vacia.jpg" class="app-img-5 center-block" alt="No existen datos disponibles">
    </div>
</div>
<?php } ?>