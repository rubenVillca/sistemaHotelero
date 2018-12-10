<section>
    <div class="app-color-white">
        <!-- buscador -->
	<?php require_once "views/fragment/search/searchReport.blade.php"; ?>


    <!-- nombres de pestanas -->
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="active"><a href="#area" data-toggle="tab">Areas</a></li>
            <li><a href="#barra" data-toggle="tab">Barras</a></li>
            <li><a href="#torta" data-toggle="tab">Torta</a></li>
            <li><a href="#donut" data-toggle="tab">Donuts</a></li>
            <li><a href="#particle" data-toggle="tab">Particulas</a></li>
            <li><a href="#histogram" data-toggle="tab">Histograma</a></li>
        </ul>
        <!-- contenido de pestanas -->
        <div id="my-tab-content" class="tab-content">
            <!-- graficas -->
            <div class="tab-pane active" id="area">
				<?php require_once "views/fragment/graphics/graphicArea.blade.php";?>
            </div>
            <div class="tab-pane" id="barra">
				<?php require_once "views/fragment/graphics/graphicBarra.blade.php";?>
            </div>
            <div class="tab-pane" id="torta">
				<?php require_once "views/fragment/graphics/graphicTorta.blade.php";?>
            </div>
            <div class="tab-pane" id="donut">
				<?php require_once "views/fragment/graphics/graphicDonut.blade.php";?>
            </div>
            <div class="tab-pane" id="particle">
				<?php require_once "views/fragment/graphics/graphicParticle.blade.php";?>
            </div>
            <div class="tab-pane" id="histogram">
				<?php require_once "views/fragment/graphics/graphicHistogram.blade.php";?>
            </div>
        </div>
    </div>
</section>
<!-- script pestanas -->
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('#tabs').tab();
    });
</script>
<!-- script para graficas -->
<script src="libs/graphics/amcharts.js" type="text/javascript"></script>
<script src="libs/highcharts/highcharts.js"></script>
<script src="libs/highcharts/highcharts-3d.js"></script>
<script src="libs/highcharts/modules/exporting.js"></script>