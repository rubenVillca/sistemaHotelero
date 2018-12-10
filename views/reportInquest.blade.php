<!-- script para graficas -->
<script src="libs/graphics/amcharts.js" type="text/javascript"></script>
<!-- pestanas tabs -->
<section>
	<!-- graficas en vertical -->
	<?php if(!empty($listStatisticalInquest)) { ?>
	<script type="text/javascript">
        $(function () {
            // Set up the chart
            var chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'barraVertical',
                    type: 'column',
                    margin: 75,
                    options3d: {
                        enabled: true,
                        alpha: 15,
                        beta: 15,
                        depth: 50,
                        viewDistance: 25
                    }
                },
                title: {
                    text: '<?=$listStatisticalInquest[0]['NAME_INQUEST']?>'
                },
                subtitle: {
                    text: 'Barras verticales en 3D'
                },
                xAxis: {
                    categories: [
						<?php foreach($listStatisticalInquest as $dist) {?>
                            "<?=Helper::camelUpperCase($dist['DESCRIPTION_QUESTION']);?>",
						<?php }?>
                    ]
                },
                yAxis: {
                    allowDecimals: true,
                    title: {
                        text: 'Calificacion (100%)'
                    }
                },
                tooltip: {
                    headerFormat: '<b>{point.key}</b><br>',
                    pointFormat: '<span style="color:{series.color}">\u25CF</span> {series.name}: {point.y} / {point.stackTotal}'
                },
                plotOptions: {
                    column: {
                        stacking: 'normal',
                        depth: 40
                    }
                },
                series: [
                    {
                        name: 'Resouestas',
                        data: [<?php foreach($listStatisticalInquest as $dist) {
							echo $dist['totalQuestion'].',';
						}?>],
                        stack: 'female'
                    }
                ]
            });

            function showValues() {
                $('#R0-value').html(chart.options.chart.options3d.alpha);
                $('#R1-value').html(chart.options.chart.options3d.beta);
            }

            // Activate the sliders
            $('#R0').on('change', function () {
                chart.options.chart.options3d.alpha = this.value;
                showValues();
                chart.redraw(false);
            });
            $('#R1').on('change', function () {
                chart.options.chart.options3d.beta = this.value;
                showValues();
                chart.redraw(false);
            });
            showValues();
        });
	</script>
	<div id="barraVertical"></div>
	<div id="sliders">
		<table class="table">
			<tr>
				<td>Angulo Alpha</td>
				<td>Angulo Beta</td>
			</tr>
			<tr>
				<td>
					<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
						<input id="R0" type="range" min="0" max="45" value="15" title="angulo de vista del grafico"/>
						<span id="R0-value" class="value"></span>
					</div>
				</td>
				<td>
					<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
						<input id="R1" type="range" min="0" max="45" value="15"/>
						<span id="R1-value"
						      class="value"></span>
					</div>
				</td>
			</tr>
		</table>
	</div>
	<?php }else { ?>
	<div class="col-xs-12 col-lg-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
		<div class="thumbnail">
			<h4 class="text-center">Datos de servicio no encontrados</h4>
			<img src="img/404/caja-vacia.jpg" class="app-img-5 center-block" alt="No existen datos disponibles">
		</div>
	</div>
	<?php } ?>
</section>
<!-- scripts para las graficas -->
<script src="libs/highcharts/highcharts.js"></script>
<script src="libs/highcharts/highcharts-3d.js"></script>
<script src="libs/highcharts/modules/exporting.js"></script>