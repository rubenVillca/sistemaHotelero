<?php if (!empty($distribution)) { ?>
<script type="text/javascript">
    $(function () {
        // Give the points a 3D feel by adding a radial gradient
        Highcharts.getOptions().colors = $.map(Highcharts.getOptions().colors, function (color) {
            return {
                radialGradient: {
                    cx: 0.4,
                    cy: 0.3,
                    r: 0.5
                },
                stops: [
                    [0, color],
                    [1, Highcharts.Color(color).brighten(-0.2).get('rgb')]
                ]
            };
        });

        // Set up the chart
        var chart = new Highcharts.Chart({
            chart: {
                renderTo: 'graphicParticle',
                margin: 100,
                type: 'scatter',
                options3d: {
                    enabled: true,
                    alpha: 10,
                    beta: 30,
                    depth: 250,
                    viewDistance: 5,

                    frame: {
                        bottom: {size: 1, color: 'rgba(0,0,0,0.02)'},
                        back: {size: 1, color: 'rgba(0,0,0,0.04)'},
                        side: {size: 1, color: 'rgba(0,0,0,0.06)'}
                    }
                }
            },
            title: {
                text: '<?=$distribution[0]['NAME_SERVICE']?>'
            },
            subtitle: {
                text: 'Grafica Particulas'
            },
            plotOptions: {
                scatter: {
                    width: 10,
                    height: 10,
                    depth: 10
                }
            },
			<?php
				$xMax = 10; $yMax = 10; $zMax = 10; $serie = '';
				foreach($distribution as $dist) {
					$xMax = max($dist['INGRESO'], $xMax);
					$xMax = max($dist['EGRESO'], $yMax);
					$xMax = max($dist['TOTAL_PERSON'], $zMax);
					$serie = $serie."[".$dist['INGRESO'].','.$dist['EGRESO'].','.$dist['TOTAL_PERSON']."],";
				}?>
            yAxis: {
                min: 0,
                max: <?=$yMax?>,
                title: null
            },
            xAxis: {
                min: 0,
                max: <?=$xMax?>,
                gridLineWidth: 1
            },
            zAxis: {
                min: 0,
                max: <?=$zMax?>,
                showFirstLabel: false
            },
            legend: {
                enabled: false
            },
            series: [{
                name: 'X=Ingreso, Y=Egreso, Z=personas',
                colorByPoint: true,
                data: [<?=$serie?>]
            }]
        });


        // Add mouse events for rotation
        $(chart.container).bind('mousedown.hc touchstart.hc', function (e) {
            e = chart.pointer.normalize(e);

            var posX = e.pageX,
                posY = e.pageY,
                alpha = chart.options.chart.options3d.alpha,
                beta = chart.options.chart.options3d.beta,
                newAlpha,
                newBeta,
                sensitivity = 5; // lower is more sensitive

            $(document).bind({
                'mousemove.hc touchdrag.hc': function (e) {
                    // Run beta
                    newBeta = beta + (posX - e.pageX) / sensitivity;
                    chart.options.chart.options3d.beta = newBeta;

                    // Run alpha
                    newAlpha = alpha + (e.pageY - posY) / sensitivity;
                    chart.options.chart.options3d.alpha = newAlpha;

                    chart.redraw(false);
                },
                'mouseup touchend': function () {
                    $(document).unbind('.hc');
                }
            });
        });

    });
</script>
<div id="graphicParticle" class="graphics"></div>
<?php } else { ?>
<div class="col-xs-12 col-lg-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
    <div class="thumbnail">
        <h4 class="text-center">Datos de servicio no encontrados</h4>
        <img src="img/404/caja-vacia.jpg" class="app-img-5 center-block" alt="No existen datos disponibles">
    </div>
</div>
<?php } ?>
