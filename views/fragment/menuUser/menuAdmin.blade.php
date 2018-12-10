<header class="container-fluid app-container-left">
	<!-- Sidebar -->
	<nav class="nav navbar-default primary-color">
		<div class="app-left-menu">
			<?php require_once "views/widgets/menuSession.blade.php"; ?>
			<div class="navbar-header">
				<button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target="#menu-admin">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="row">
				<div class="navbar-left sidebar" role="navigation">
					<div class="sidebar-nav navbar-inverse navbar-collapse primary-color" id="menu-admin">
						<ul class="nav animated fadeInLeft" id="side-menu">
						<?php $_SESSION['MENU'] = isset($_SESSION['MENU']) ? $_SESSION['MENU'] : Constants::$MENU_SELECTED_HOME; ?>
						<!-- INICIO -->
							<li role="presentation" id="menu-home"
							    class="<?= $_SESSION['MENU'] == Constants::$MENU_SELECTED_HOME ? 'active' : '' ?>">
								<a href="<?= 'home/' ?>"><i class="fa fa-lg fa-home"></i> Inicio</a>
							</li>
							<!-- servicios -->
							<li role="presentation" id="menu-services"
							    class="<?= $_SESSION['MENU'] == Constants::$MENU_SELECTED_SERVICE ? 'active' : '' ?>">
								<a href="<?= 'service/' ?>"><i class="fa fa-lg fa-star"></i> Servicios</a>
							</li>
							<!-- ofertas -->
							<li role="presentation" id="menu-offer"
							    class="<?= $_SESSION['MENU'] == Constants::$MENU_SELECTED_OFFER ? 'active' : '' ?>">
								<a href="<?= 'offer' ?>"><i class="fa fa-lg fa-tags"></i> Ofertas</a>
							</li>
							<!-- sitios turisticos -->
							<li role="presentation" id="menu-site-tour"
							    class="<?= $_SESSION['MENU'] == Constants::$MENU_SELECTED_SITE_TOUR ? 'active' : '' ?>">
								<a href="<?= 'site/' ?>"><i class="fa fa-lg fa-camera"></i> Sitios tur&iacute;sticos</a>
							</li>
							<!-- informes, reportes -->
							<li role="presentation" id="menu-report"
							    class="<?= $_SESSION['MENU'] == Constants::$MENU_SELECTED_REPORT ? 'active' : '' ?>">
								<a href="<?= 'inform/' ?>">
									<i class="fa fa-lg fa-bar-chart"></i> Informes <i class="fa fa-lg arrow"></i>
								</a>
								<ul class="nav list-group nav-second-level" role="menu">
									<li>
										<a href="<?= 'report/' ?>">
											<i class="fa fa-lg fa-bar-chart"></i> Informes de servicios
										</a>
									</li>
									<li>
										<a href="<?= 'report/inquest/' ?>">
											<i class="fa fa-lg fa-list-alt"></i> Calificacion de encuestas
										</a>
									</li>
								</ul>
							</li>
							<!-- registro de ingreso -->
							<li role="presentation" id="menu-check"
							    class="<?= $_SESSION['MENU'] == Constants::$MENU_SELECTED_CHECK_IN ? 'active' : '' ?>">
								<a href="<?= 'consume' ?>">
									<i class="fa fa-lg fa-edit"></i> Registro
									<i class="badge"><?= !empty($_SESSION['nCheckTotal'])?$_SESSION['nCheckTotal']:0?></i>
									<i class="fa fa-lg arrow"></i>
								</a>
								<ul class="nav list-group nav-second-level" role="menu">
									<li>
										<a href="<?= 'reserve/' ?>">
											<i class="fa fa-lg fa-plus"></i> Reservas
											<i class="badge arrow"></i>
										</a>
									</li>
									<li>
										<a href="<?= 'checkIn/' ?>">
											<i class="fa fa-lg fa-check"></i> Registros
											<i class="badge arrow"><?= !empty($_SESSION['nCheckTotal'])?$_SESSION['nCheckTotal']:0?></i>
										</a>
									</li>
									<li>
										<a href="<?= 'checkIn/list/' ?>">
											<i class="fa fa-lg fa-list"></i> Historial
										</a>
									</li>
									<li>
										<a href="<?= 'order/' ?>">
											<i class="fa fa-lg fa-shopping-basket"></i> Pedidos
											<i class="badge arrow"><?= !empty($_SESSION['nFoodPending']) ? $_SESSION['nFoodPending'] : 0 ?></i>
										</a>
									</li>
									<li>
										<a href="<?= 'consume/' ?>">
											<i class="fa fa-lg fa-coffee"></i> Consumos
										</a>
									</li>
								</ul>
							</li>
							<!-- registrar usuarios -->
							<li role="presentation" id="menu-user"
								class="<?= $_SESSION['MENU'] == Constants::$MENU_SELECTED_USER ? 'active' : '' ?>">
								<a href="<?='user/'?>">
									<i class="fa fa-lg fa-users"></i> Usuarios <i class="fa fa-lg arrow"></i>
								</a>
								<ul class="nav list-group nav-second-level" role="menu">
									<li>
										<a href="<?= 'user/insert/' ?>">
											<i class="fa fa-lg fa-user-plus"></i> Registrar usuario
										</a>
									</li>
									<li>
										<a href="<?= 'profile/list/' ?>">
											<i class="fa fa-lg fa-list-alt"></i> Editar Cuentas
										</a>
									</li>
								</ul>
							</li>
							<!-- Habitaciones -->
							<li role="presentation" id="menu-check"
							    class="<?= $_SESSION['MENU'] == Constants::$MENU_SELECTED_ROOM ? 'active' : '' ?>">
								<a href="<?= 'room' ?>">
									<i class="fa fa-lg fa-bed"></i> Habitaciones <i class="fa fa-lg arrow"></i>
								</a>
								<ul class="nav list-group nav-second-level" role="menu">
									<li>
										<a href="<?= 'room/' ?>">
											<i class="fa fa-lg fa-list-alt"></i> Lista de habitaciones
										</a>
									</li>
									<li>
										<a href="<?= 'room/panel/' ?>">
											<i class="fa fa-lg fa-list"></i> Editar habitaciones
										</a>
									</li>
									<li>
										<a href="<?= 'room/insert/' ?>">
											<i class="fa fa-lg fa-plus-square"></i> Insertar Habitaciones
										</a>
									</li>
									<li>
										<a href="<?= 'room/calendar/' ?>">
											<i class="fa fa-lg fa-calendar"></i> Habitaciones Ocupadas
										</a>
									</li>
									<li>
										<a href="<?= 'typeRoom/' ?>">
											<i class="fa fa-lg fa-link"></i> Tipos de habitaciones
										</a>
									</li>
								</ul>
							</li>
							<!-- calendario -->
							<li role="presentation" id="menu-calendar"
							    class="<?= $_SESSION['MENU'] == Constants::$MENU_SELECTED_ACTIVITY ? 'active' : '' ?>">
								<a href="<?= 'activity' ?>">
									<i class="fa fa-lg fa-calendar"></i> Actividades <i class="fa fa-lg arrow"></i>
								</a>
								<ul class="nav list-group nav-second-level" role="menu">
									<li>
										<a href="<?= 'activity/calendar/' ?>"><i class="fa fa-lg fa-calendar"></i>
											Caledario de ctividades
										</a>
									</li>
									<li>
										<a href="<?= 'activity/' ?>"><i class="fa fa-lg fa-list"></i> Lista de
											actividades
										</a>
									</li>
									<li>
										<a href="<?= 'activity/panel/' ?>"><i class="fa fa-lg fa-edit"></i> Editar de
											actividades
										</a>
									</li>
								</ul>
							</li>
							<!-- configuracion del sistema -->
							<li role="presentation" id="menu-setting"
							    class="<?= $_SESSION['MENU'] == Constants::$MENU_SELECTED_SETTINGS ? 'active' : '' ?>">
								<a href="<?='settings/'?>"><i class="fa fa-lg fa-gears"></i> Configurar Sistema</a>
							</li>
							<!-- ayuda -->
							<li role="presentation" id="menu-help"
							    class="<?= $_SESSION['MENU'] == Constants::$MENU_SELECTED_HELP ? 'active' : '' ?>">
								<a href="<?= 'help' ?>">
									<i class="fa fa-lg fa-question"></i> Ayuda <i class="fa fa-lg arrow"></i>
								</a>
								<ul class="nav list-group nav-second-level" role="menu">
									<li>
										<a href="<?= 'help/about/' ?>">
											<i class="fa fa-lg fa-info-circle"></i> Acerca de nosotros
										</a>
									</li>
									<li>
										<a href="<?= 'frequently/' ?>">
											<i class="fa fa-lg fa-question-circle"></i> Preguntas Frecuentes
										</a>
									</li>
									<li>
										<a href="help/manualUserAdmin/" target="_blank">
											<span class="fa fa-bookmark"></span> Manual de usuario admnistrador
										</a>
									</li>
									<li>
										<a href="help/manualUserAndroid/" target="_blank">
											<span class="fa fa-bookmark"></span> Manual de usuario android
										</a>
									</li>
									<li>
										<a href="help/manualUserClient/" target="_blank">
											<span class="fa fa-bookmark"></span> Manual de usuario cliente
										</a>
									</li>
									<li>
										<a href="help/manualUserReception/" target="_blank">
											<span class="fa fa-bookmark"></span> Manual de usuario Recepcionista
										</a>
									</li>
									<li>
										<a href="help/manualUserCocina/" target="_blank">
											<span class="fa fa-bookmark"></span> Manual de usuario Cocinero
										</a>
									</li>
									<li>
										<a href="help/manualUserService/" target="_blank">
											<span class="fa fa-bookmark"></span> Manual de usuario de servicios
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</nav>
</header>
