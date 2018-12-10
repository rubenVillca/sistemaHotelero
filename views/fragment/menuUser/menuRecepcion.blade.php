<header>
    <div class="app-img-font">
        <div id="logo" class="text-center hidden-xs">
            <a href="home/" class="navbar-brand">
                <img src="img/system/logo.png" alt="Hotel" class="logo">
            </a>
        </div>
        <!-- menu -->
        <nav class="navbar navbar-default header" id="container-menu">
            <div class="container-fluid  app-left-menu">
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
                <div class="collapse navbar-collapse app-menu" id="menu2">
                    <ul class="nav navbar-nav">
                    <?php $_SESSION['MENU'] = isset($_SESSION['MENU']) ? $_SESSION['MENU'] : Constants::$MENU_SELECTED_HOME; ?>
                    <!-- INICIO -->
                        <li class="<?= $_SESSION['MENU'] == Constants::$MENU_SELECTED_HOME ? 'active-menu' : '' ?>">
                            <a href="home/" class="hidden-xs">
                                <p class="text-menu"><i class="fa fa-lg fa-lg fa-home"></i></p>
                            </a>
                        </li>
                        <!-- servicios -->
                        <li class="dropdown <?= $_SESSION['MENU'] == Constants::$MENU_SELECTED_SERVICE ? 'active-menu' : '' ?>">
                            <a href="" class="dropdown-toggle app-nav-menu" data-toggle="dropdown">
                                <p class="text-menu">Servicios <span class="caret"></span></p>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="service/"><p><i class="fa fa-lg fa-star"></i> Servicios</p></a>
                                </li>
                                <li>
                                    <a href="offer/"><p><i class="fa fa-lg fa-tags"></i> Ofertas</p></a>
                                </li>
                            </ul>
                        </li>
                        <!-- registro check -->
                        <li class="dropdown <?= $_SESSION['MENU'] == Constants::$MENU_SELECTED_CHECK_IN ? 'active-menu' : '' ?>">
                            <a href="#"
                               class="dropdown-toggle app-nav-menu"
                               data-toggle="dropdown">
                                <p class="text-menu">Registro <span class="caret"></span></p>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="checkIn/"><p><i class="fa fa-lg fa-sign-in"></i> Registros H&uacute;esped</p></a>
                                </li>
                                <li>
                                    <a href="consume/">
                                        <p><i class="fa fa-lg fa-coffee"></i> Registrar Consumo</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= 'room/' ?>">
                                        <p><i class="fa fa-lg fa-list-alt"></i> Lista de habitaciones</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= 'room/calendar/' ?>">
                                        <p><i class="fa fa-lg fa-calendar"></i> Habitaciones Ocupadas</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- reserva -->
                        <li class="dropdown <?= $_SESSION['MENU'] == Constants::$MENU_SELECTED_RESERVE ? 'active-menu' : '' ?>">
                            <a href=""
                               class="dropdown-toggle app-nav-menu"
                               data-toggle="dropdown">
                                <p class="text-menu">Reserva <span class="caret"></span></p>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="reserve/">
                                        <i class="fa fa-lg fa-plus"></i> Reservas
                                        <span class="badge text-right"><?= !empty($_SESSION['nReserveTotal'])?$_SESSION['nReserveTotal']:0 ?></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="reserve/list/">
                                        <i class="fa fa-lg fa-sign-in"></i> CheckIn por reserva
                                        <i class="badge right"><?= !empty($_SESSION['nCheckTotal'])?$_SESSION['nCheckTotal']:0 ?></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="reserve/pending/">
                                        <i class="fa fa-lg fa-pencil"></i> Reservas pendientes
                                        <span class="badge arrow"><?= !empty($_SESSION['nFoodPending'])?$_SESSION['nFoodPending']:0 ?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- Menu de alimentos -->
                        <li role="presentation" class="<?= $_SESSION['MENU'] == Constants::$MENU_SELECTED_FOOD ? 'active-menu' : '' ?>">
                            <a href="food/" class="app-nav-menu"><p class="text-menu">Alimentos</p></a>
                        </li>
                        <!-- hoteleria -->
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle app-nav-menu" data-toggle="dropdown">
                                <p class="text-menu">Hoteleria <span class="caret"></span></p>
                            </a>
                                <ul class="dropdown-menu">
                                    <!-- registro user -->
                                    <li>
                                        <a href="user/">
                                            <p><i class="fa fa-lg fa-user-plus"></i> Registrar usuario cliente</p>
                                        </a>
                                    </li>
                                    <!-- lista de usuarios -->
                                    <li>
                                        <a href="profile/list/">
                                            <p><i class="fa fa-lg fa-list-alt"></i> Editar Cuenta Cliente</p>
                                        </a>
                                    </li>
                                    <!-- actividades -->
                                    <li>
                                        <a href="activity/">
                                            <p><span class="fa fa-lg fa-calendar"></span> Actividades</p>
                                        </a>
                                    </li>
                                    <!-- sitios turisticos -->
                                    <li>
                                        <a href="site/">
                                            <p><i class="fa fa-lg fa-camera"></i> Sitios tur&iacute;sticos</p>
                                        </a>
                                    </li>
                                </ul>

                        </li>
                        <!-- ayuda -->
                        <li class="dropdown <?= $_SESSION['MENU'] == Constants::$MENU_SELECTED_HELP ? 'active-menu' : '' ?>">
                            <a href="#" class="dropdown-toggle app-nav-menu" data-toggle="dropdown">
                                <p class="text-menu">Ayuda <span class="caret"></span></p>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="help/about/">
                                        <p><span class="fa fa-lg fa-info-circle"></span> Acerca de nosotros</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="frequently/">
                                        <p><span class="fa fa-lg fa-question-circle"></span> Preguntas Frecuentes</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="help/manualUser/" target="_blank">
                                        <p><span class="fa fa-lg fa-bookmark"></span> Manual de usuario</p>
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
