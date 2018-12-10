<header>
    <div class="app-img-font">
        <div id="logo" class="text-center hidden-xs">
            <a href="home/" class="navbar-brand">
                <img src="img/system/logo.png" alt="Hotel" class="logo">
				<?php require_once 'views/widgets/downloadAplication.blade.php' ?>
            </a>
        </div>
        <nav class="navbar navbar-default header" id="container-menu">
            <div class="container-menu">
			<?php require_once "views/widgets/menuSession.blade.php"; ?>
            <!-- menu responsivo -->
                <div class="navbar-header">
                    <button class="navbar-toggle pull-left" data-toggle="collapse" data-target="#menu2">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- menu de usuario -->
                <div class="collapse navbar-collapse" id="menu2">
					<?php $_SESSION['MENU'] = isset($_SESSION['MENU']) ? $_SESSION['MENU'] :
						Constants::$MENU_SELECTED_HOME; ?>
                    <ul class="nav navbar-nav">
                        <!-- inicio -->
                        <li role="presentation"
                            class="<?= $_SESSION['MENU'] == Constants::$MENU_SELECTED_HOME ? 'active-menu' : '' ?>">
                            <a href="home/" class="app-nav-menu">
                                <p class="text-menu">
                                    <span class="fa fa-home"></span>
                                    <label for="" class="hidden-lg hidden-md hidden-sm">Inicio</label>
                                </p>

                            </a>
                        </li>
                        <!-- servicios -->
                        <li role="presentation"
                            class="<?= $_SESSION['MENU'] == Constants::$MENU_SELECTED_SERVICE ? 'active-menu' : '' ?>">
                            <a href="service/" class="app-nav-menu">
                                <p class="text-menu">Servicios</p>
                            </a>
                        </li>
                        <!-- ofertas-->
                        <li role="presentation"
                            class="<?= $_SESSION['MENU'] == Constants::$MENU_SELECTED_OFFER ? 'active-menu' : '' ?>">
                            <a href="offer/" class="app-nav-menu">
                                <p class="text-menu">Ofertas</p>
                            </a>
                        </li>
                        <!-- reservas -->
                        <li role="presentation"
                            class="<?= $_SESSION['MENU'] == Constants::$MENU_SELECTED_RESERVE ? 'active-menu' : '' ?>">
                            <a href="reserve/" class="app-nav-menu">
                                <p class="text-menu">Reservas</p>
                            </a>
                        </li>

					<?php if (!empty($_SESSION['ACTIVE_CHECK']) && $_SESSION['ACTIVE_CHECK'] > 0){?>
                    <!-- Menu de alimentos -->
                        <li role="presentation"
                            class="<?= $_SESSION['MENU'] == Constants::$MENU_SELECTED_FOOD ? 'active-menu' : '' ?>">
                            <a href="food/" class="app-nav-menu"><p class="text-menu">Alimentos</p></a>
                        </li>

                        <!-- Estadia -->
                        <li role="presentation"
                            class="<?= $_SESSION['MENU'] == Constants::$MENU_SELECTED_CONSUME ? 'active-menu' : '' ?>">
                            <a href="consume/" class="app-nav-menu"><p class="text-menu">Consumo</p></a>
                        </li>
					<?php }?>
                    <!-- varios -->
                        <li class="dropdown <?= $_SESSION['MENU'] == Constants::$MENU_SELECTED_SITE_TOUR ? 'active-menu' :
							'' ?>">
                            <a href="#" class="dropdown-toggle app-nav-menu" data-toggle="dropdown">
                                <p class="text-menu">Hotel <span class="caret"></span></p>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- precios -->
                                <li>
                                    <a href="price/">
                                        <span class="fa fa-money"></span>
                                        Precios
                                    </a>
                                </li>
                                <!-- actividades -->
                                <li>
                                    <a href="activity/">
                                        <i class="fa fa-lg fa-calendar-check-o"></i> Actividades
                                    </a>
                                </li>
                                <!-- sitios turisticos -->
                                <li>
                                    <a href="site/">
                                        <i class="fa fa-lg fa-camera"></i> Tur&iacute;smo
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- ayuda -->
                        <li role="presentation"
                            class="dropdown <?= $_SESSION['MENU'] == Constants::$MENU_SELECTED_HELP ? 'active-menu' :
							    '' ?>">
                            <a href="#" class="dropdown-toggle app-nav-menu" data-toggle="dropdown">
                                <p class="text-menu">
                                    Ayuda <span class="caret"></span>
                                </p>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="help/about/">
                                        <span class="fa fa-info"></span> Acerca de nosotros
                                    </a>
                                </li>
                                <li>
                                    <a href="question/contact/">
                                        <span class="fa fa-envelope"></span> Contactenos
                                    </a>
                                </li>
                                <li>
                                    <a href="question/complaint/">
                                        <span class="fa fa-comments"></span> Registrar Quejas
                                    </a>
                                </li>
                                <li>
                                    <a href="question/suggestion/"><span class="fa fa-commenting"></span> Registra
                                        Sugerencias
                                    </a>
                                </li>
                                <li>
                                    <a href="question/"><span class="fa fa-question-circle"></span> Preguntenos</a>
                                </li>
                                <li>
                                    <a href="frequently/">
                                        <span class="fa fa-question-circle"></span> Preguntas Frecuentes
                                    </a>
                                </li>
                                <li>
                                    <a href="help/manualUser/" target="_blank">
                                        <span class="fa fa-bookmark"></span> Manual de usuario
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>