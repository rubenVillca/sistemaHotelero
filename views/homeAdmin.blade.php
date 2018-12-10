<!-- container -->
<section>
    <br>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <!-- FIRST ROW OF BLOCKS -->
        <div class="row">
            <!-- USER PROFILE BLOCK -->
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="dash-unit">
                    <dtitle>Perfil de usuario</dtitle>
                    <hr>
                    <div class="thumbnail">
                        <img src="<?= $profile['IMAGE_PROFILE'] ?>"
                             alt="<?= $profile['NAME_PERSON'] ?>"
                             class="img-circle app-profile">
                    </div><!-- /thumbnail -->
                    <h1><?= $profile['NAME_PERSON'] ?></h1>
                    <h3><?= $profile['CITY_PERSON'].', '.$profile['COUNTRY_PERSON'] ?></h3>
                    <br>
                    <div class="info-user">
                        <a href="profile/"><span aria-hidden="true" class="fa fa-user"></span></a>
                        <a href="profile/edit/"><span aria-hidden="true" class="fa fa-gear"></span></a>
                        <a href="messages/"><span aria-hidden="true" class="fa fa-envelope"></span></a>
                    </div>
                </div>
            </div>
            <!-- info de hotel -->
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="dash-unit">
                    <dtitle>Informacion del hotel</dtitle>
                    <hr>
                    <div id="hotelAdvanced" class="grapics-home"></div>
                    <h2><?= $infoHotel; ?>%</h2>
                </div>
            </div>
            <!-- space server -->
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="dash-unit">
                    <dtitle>Espacio en servidor</dtitle>
                    <hr>
                    <div id="spaceDisk" class="grapics-home"></div>
                    <h2><?= isset($diskSpace) ? $diskSpace['busy'] : '100' ?>%</h2>
                </div>
            </div>
            <!-- hora y valocidad de subida -->
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <!-- LOCAL TIME BLOCK -->
                <div class="half-unit">
                    <dtitle>Hora local</dtitle>
                    <hr>
                    <div class="clockcenter">
                        <digiclock>12:45:25</digiclock>
                    </div>
                </div>
                <!-- SERVER UPTIME -->
                <div class="half-unit">
                    <dtitle>Velocidad de subida del servidor</dtitle>
                    <hr>
                    <div class="cont">
                        <p class="text-center"><span class="fa fa-upload"></span> <b>Velocidad</b> | <?= $speed ?>.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- SECOND ROW OF BLOCKS -->
        <div class="row">
            <!-- Sistemas operativo -->
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="dash-unit">
                    <dtitle>Visitas desde sistemas operativos</dtitle>
                    <hr>
                    <div id="sisOp" class="grapics-home"></div>
                    <h3>Windows <?= $totalNavigator['os']['WIN']['total'] ?> Visitas</h3>
                </div>
            </div>
            <!-- navegadores -->
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="dash-unit">
                    <dtitle>Visitas desde navegadores</dtitle>
                    <hr>
                    <div id="navegator" class="grapics-home"></div>
                    <h3>Chrome <?= $totalNavigator['browser']['CHROME']['total'] ?> Visitas</h3>
                </div>
            </div>
            <!-- cantidad de personas registradas -->
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="dash-unit">
                    <dtitle>Personas registradas</dtitle>
                    <hr>
                    <div id="men-register" class="grapics-home"></div>
                    <h3 class="text-center">
						<?= round(($totalSex[1]['TOTAL'])*100/($totalSex[0]['TOTAL']+$totalSex[1]['TOTAL']), 2); ?>
                        % Hombres
                    </h3>
                    <h3 class="text-center">
						<?= round(($totalSex[0]['TOTAL'])*100/($totalSex[0]['TOTAL']+$totalSex[1]['TOTAL']), 2); ?>
                        % Mujeres
                    </h3>
                </div>
            </div>
            <!-- personas inscritass hoy y reservas activas -->
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <!-- usuarios registrados -->
                <div class="half-unit">
                    <dtitle>Total Usuarios registrados</dtitle>
                    <hr>
                    <div class="cont">
                        <p>
                            <b><?= $totalUser ?></b>
                        </p>
                        <p><?= $totalUserToday ?> usuarios registrados hoy</p>
                    </div>
                </div>
                <!-- reservas activas -->
                <div class="half-unit">
                    <dtitle>Reservas activas</dtitle>
                    <hr>
                    <div class="cont">
                        <p>
                            <b><?= $totalReserve ?></b> | reservas activas
                        </p>
                    </div>
                    <div class="progress">
                        <div class="progress-bar"
                             role="progressbar"
                             aria-valuenow="<?= $totalReserve ?>"
                             aria-valuemin="0"
                             aria-valuemax="<?= $totalReserve+$totalReservePending ?>"
                             style="width:<?= $reserveAdvanced ?>%;"><span
                                    class="sr-only"><?= $totalReserve ?> Completos</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- TERCERO ROW OF BLOCKS -->
        <div class="row">
            <!-- Servidor de base de datos -->
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="dash-unit">
                    <dtitle>Servidor de base de datos</dtitle>
                    <hr>
                    <div class="thumbnail">
                        <span class="fa fa-database app-font-sm"></span>
                        <span class="fa fa-<?= $ping > 0 ? 'check' : 'close' ?> app-font-xs"></span>
                    </div>
                    <p class="text-justify text-center"><?= $ping > 0 ? 'Su servidor se esta trabajando correctamente' : 'No servidor no esta trabajando correctamente'; ?></p>
                </div>
            </div>
            <!-- graficas -->
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <a href="report/">
                    <div class="dash-unit">
                        <dtitle>Graficas</dtitle>
                        <hr>
                        <div class="thumbnail">
                            <span class="fa fa-area-chart app-font-sm"></span>
                        </div>
                        <h2>
                            Datos estadisticos
                        </h2>
                    </div>
                </a>
            </div>
            <!-- ofertas -->
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <a href="offer/panel/">
                    <div class="dash-unit">
                        <dtitle>Ofertas</dtitle>
                        <hr>
                        <div class="thumbnail">
                            <span class="fa fa-tags app-font-sm"></span>
                        </div>
                        <h2>Ofertas</h2>
                    </div>
                </a>
            </div>
            <!-- visitantes -->
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <!-- LIVE VISITORS BLOCK -->
                <div class="half-unit">
                    <dtitle>Cantidad de visitantes</dtitle>
                    <hr>
                    <div class="cont">
                        <p>
                            <b><?= $totalVisitor; ?></b> | Visitantes
                        </p>
                    </div>
                </div>
                <!-- PAGE VIEWS BLOCK -->
                <div class="half-unit">
                    <dtitle>Cantidad de visitas</dtitle>
                    <hr>
                    <div class="cont">
                        <p>
                            <b><?= $totalSession ?></b> | Visitas
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- cuarta fila -->
        <div class="row">
            <!-- servicios -->
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <a href="service/">
                    <div class="dash-unit">
                        <dtitle>Servicios</dtitle>
                        <hr>
                        <div class="thumbnail">
                            <span class="fa fa-star app-font-sm"></span>
                        </div>
                        <h2>
                            Servicios
                        </h2>
                    </div>
                </a>
            </div>
            <!-- lista de usuarios -->
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <a href="profile/list">
                    <div class="dash-unit">
                        <dtitle>Lista de usuarios</dtitle>
                        <hr>
                        <div class="thumbnail">
                            <span class="fa fa-users app-font-sm"></span>
                        </div>
                        <h2>Lista de usuarios</h2>
                    </div>
                </a>
            </div>
            <!-- lista de reservas -->
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <a href="reserve/list/">
                    <div class="dash-unit">
                        <dtitle>Lista de reservas</dtitle>
                        <hr>
                        <div class="thumbnail">
                            <span class="fa fa-shopping-cart app-font-sm"></span>
                        </div>
                        <h2>Lista de reservas</h2>
                    </div>
                </a>
            </div>
            <!-- configuracion del sistema -->
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="dash-unit">
                    <a href='settings/'>
                        <dtitle>Configurar</dtitle>
                        <hr>
                        <div class="thumbnail">
                            <span class="fa fa-gears app-font-sm"></span>
                        </div>
                        <h2>Configurar sistema</h2>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- script -->
<script type="text/javascript">
    $(window).load(function () {
        $('.flexslider').flexslider({
            animation: "slide",
            slideshow: true,
            start: function (slider) {
                $('body').removeClass('loading');
            }
        });
    });
</script>
<!-- importaciones de script -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="libs/homeAdmin/lineandbars.js"></script>
<!-- graficas -->
<!-- datos de las graficas -->
<script>
    /** Informacion registrada ***/
    $(document).ready(function () {
        var info = new Highcharts.Chart({
            chart: {
                renderTo: 'hotelAdvanced',
                margin: [0, 0, 0, 0],
                backgroundColor: null,
                plotBackgroundColor: 'none'
            },
            title: {
                text: null
            },
            tooltip: {
                formatter: function () {
                    return this.point.name + ': ' + this.y + ' %';
                }
            },
            series: [
                {
                    borderWidth: 2,
                    borderColor: '#F1F3EB',
                    shadow: false,
                    type: 'pie',
                    name: 'Income',
                    innerSize: '55%',
                    data: [
                        {name: 'Completado', y: <?= $infoHotel;?>, color: '#b2c831'},
                        {name: 'Falta', y: <?= 100-$infoHotel;?>, color: '#3d3d3d'}
                    ],
                    dataLabels: {
                        enabled: false,
                        color: '#000000',
                        connectorColor: '#000000'
                    }
                }]
        });
    });
    /**espacio de disco duro**/
    $(document).ready(function () {
        var info = new Highcharts.Chart({
            chart: {
                renderTo: 'spaceDisk',
                margin: [0, 0, 0, 0],
                backgroundColor: null,
                plotBackgroundColor: 'none'
            },
            title: {
                text: null
            },
            tooltip: {
                formatter: function () {
                    return this.point.name + ': ' + this.y + ' %';
                }
            },
            series: [
                {
                    borderWidth: 2,
                    borderColor: '#F1F3EB',
                    shadow: false,
                    type: 'pie',
                    name: 'SiteInfo',
                    innerSize: '55%',
                    data: [
                        {
                            name: 'Usado',
                            y: <?= isset($diskSpace['busy']) ? $diskSpace['busy'] : 100?>,
                            color: '#fa1d2d'
                        },
                        {name: 'Libre', y: <?= isset($diskSpace['libre']) ? $diskSpace['libre'] : 0?>, color: '#3d3d3d'}
                    ],
                    dataLabels: {
                        enabled: false,
                        color: '#000000',
                        connectorColor: '#000000'
                    }
                }]
        });
    });
    //hombres vs mujeres
    $(document).ready(function () {
        var men = new Highcharts.Chart({
            chart: {
                renderTo: 'men-register',
                margin: [0, 0, 0, 0],
                backgroundColor: null,
                plotBackgroundColor: 'none'
            },
            title: {
                text: null
            },
            tooltip: {
                formatter: function () {
                    return this.point.name + ': ' + this.y + ' %';
                }
            },
            series: [
                {
                    borderWidth: 2,
                    borderColor: '#F1F3EB',
                    shadow: false,
                    type: 'pie',
                    name: 'SiteInfo',
                    innerSize: '55%',
                    data: [
                        {
                            name: 'Hombres',
                            y: <?= round(($totalSex[1]['TOTAL'])*100/($totalSex[0]['TOTAL']+$totalSex[1]['TOTAL']), 2)?>,
                            color: '#fa1d2d'
                        },
                        {
                            name: 'Mujeres',
                            y: <?= round(($totalSex[0]['TOTAL'])*100/($totalSex[0]['TOTAL']+$totalSex[1]['TOTAL']), 2)?>,
                            color: '#3d3d3d'
                        }
                    ],
                    dataLabels: {
                        enabled: false,
                        color: '#000000',
                        connectorColor: '#000000'
                    }
                }]
        });
    });
    //navegadores
    $(document).ready(function () {
        var info = new Highcharts.Chart({
            chart: {
                renderTo: 'navegator',
                margin: [0, 0, 0, 0],
                backgroundColor: null,
                plotBackgroundColor: 'none'
            },
            title: {
                text: null
            },
            tooltip: {
                formatter: function () {
                    return this.point.name + ': ' + this.y + ' Visitas';
                }
            },
            series: [
                {
                    borderWidth: 2,
                    borderColor: '#356958',
                    shadow: false,
                    type: 'pie',
                    name: 'Navegador',
                    innerSize: '55%',
                    data: [
							<?php
							$navList = $totalNavigator['browser'];
							foreach($navList as $nav){?>
                        {
                            name: '<?=$nav['title']?>',
                            y:<?=$nav['total']?>,
                            color: '#<?=$nav['color']?>'
                        },
						<?php }?>

                    ],
                    dataLabels: {
                        enabled: false,
                        color: '#000000',
                        connectorColor: '#000000'
                    }
                }]
        });
    });
    //sistemas operativos
    $(document).ready(function () {
        var info = new Highcharts.Chart({
            chart: {
                renderTo: 'sisOp',
                margin: [0, 0, 0, 0],
                backgroundColor: null,
                plotBackgroundColor: 'none'
            },
            title: {
                text: null
            },
            tooltip: {
                formatter: function () {
                    return this.point.name + ': ' + this.y + ' Visitas';
                }
            },
            series: [
                {
                    borderWidth: 2,
                    borderColor: '#356958',
                    shadow: false,
                    type: 'pie',
                    name: 'Sistema Operativo',
                    innerSize: '55%',
                    data: [
							<?php
							$osList = $totalNavigator['os'];
							foreach($osList as $os){?>
                        {
                            name: '<?=$os['title']?>',
                            y:<?=$os['total']?>,
                            color: '#<?=$os['color']?>'
                        },
						<?php }?>

                    ],
                    dataLabels: {
                        enabled: false,
                        color: '#000000',
                        connectorColor: '#000000'
                    }
                }]
        });
    });
</script>

<script type="text/javascript" src="libs/homeAdmin/gauge.js"></script>
<!-- NOTY JAVASCRIPT -->
<script type="text/javascript" src="libs/homeAdmin/noty/jquery.noty.js"></script>
<script type="text/javascript" src="libs/homeAdmin/noty/layouts/top.js"></script>
<script type="text/javascript" src="libs/homeAdmin/noty/layouts/topLeft.js"></script>
<script type="text/javascript" src="libs/homeAdmin/noty/layouts/topRight.js"></script>
<script type="text/javascript" src="libs/homeAdmin/noty/layouts/topCenter.js"></script>
<!-- You can add more layouts if you want -->
<script type="text/javascript" src="libs/homeAdmin/noty/themes/default.js"></script>
<!-- <script type="text/javascript" src="libs/homeAdmin/dash-noty.js"></script> This is a Noty bubble when you init the theme-->
<script type="text/javascript" src="libs/highcharts/highcharts.js"></script>
<script type="text/javascript" src="libs/jquery/js/jquery.flexslider.js"></script>
<!-- muestra la hora -->
<script type="text/javascript" src="libs/homeAdmin/clock.js"></script>
<!-- script cambiar estados -->
