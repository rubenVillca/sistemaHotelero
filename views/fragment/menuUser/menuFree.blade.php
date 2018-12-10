<header>
	<div class="app-img-font">
		<div id="logo" class="text-center hidden-xs">
			<a href="home/" class="navbar-brand">
				<img src="img/system/logo.png" alt="Hotel" class="logo">
				<?php require_once 'views/widgets/downloadAplication.blade.php' ?>
			</a>
		</div>
		<nav class="navbar navbar-default header" id="container-menu">
			<div class="container">
				<!-- menu responsivo -->
				<div class="navbar-header">
					<a href="home/" class="hidden-sm hidden-md hidden-lg app-logo-xs-link">
						<img src="img/system/logo.png" alt="Hotel" class="app-logo-xs"/>
					</a>
					<button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target="#menu">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- menu de usuario -->
				<div class="collapse navbar-collapse navbar-right app-menu" id="menu">
					<?php $_SESSION['MENU'] = isset($_SESSION['MENU']) ? $_SESSION['MENU'] : Constants::$MENU_SELECTED_HOME; ?>
					<ul class="nav navbar-nav">
						<!-- inicio -->
						<li role="presentation"
						    class="<?= $_SESSION['MENU'] == Constants::$MENU_SELECTED_HOME ? 'active-menu' : '' ?> hidden-xs">
							<a href="home/">
								<p class="text-menu">Inicio</p>
							</a>
						</li>
						<!-- servicio -->
						<li role="presentation"
						    class="<?= $_SESSION['MENU'] == Constants::$MENU_SELECTED_SERVICE ? 'active-menu' : '' ?>">
							<a href="service/" class="app-nav-menu"><p class="text-menu">Servicios</p></a>
						</li>
						<!-- ofertas -->
						<li role="presentation"
							class="<?= $_SESSION['MENU'] == Constants::$MENU_SELECTED_OFFER ? 'active-menu' : '' ?>">
							<a href="offer/" class="app-nav-menu"><p class="text-menu">Ofertas</p></a>
						</li>
						<!-- reservas -->
						<li role="presentation"
						    class="<?= $_SESSION['MENU'] == Constants::$MENU_SELECTED_RESERVE ? 'active-menu' : '' ?>">
							<a href="reserve/" class="app-nav-menu"><p class="text-menu">Reservas</p></a>
						</li>
						<!-- precios -->
						<li role="presentation"
						    class="<?= $_SESSION['MENU'] == Constants::$MENU_SELECTED_PRICE ? 'active-menu' : '' ?>">
							<a href="price/" class="app-nav-menu"><p class="text-menu">Precios</p></a>
						</li>
						<!-- ayuda -->
						<li class="dropdown <?= $_SESSION['MENU'] == Constants::$MENU_SELECTED_HELP ? 'active-menu' : '' ?>">
							<a href="#" class="dropdown app-nav-menu" data-toggle="dropdown">
								<p class="text-menu">Ayuda <span class="caret"></span></p>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="help/about/" class="app-text-color-black"><span class="fa fa-info"></span> Acerca de nosotros</a>
								</li>
								<li>
									<a href="question/contact/"><span class="fa fa-envelope"></span> Contactenos</a>
								</li>
								<li>
									<a href="frequently/"><span class="fa fa-question-circle"></span> Preguntas
										Frecuentes
									</a>
								</li>
								<li>
									<a href="help/manualUser/" target="_blank">
										<span class="fa fa-bookmark"></span> Manual de usuario
									</a>
								</li>
							</ul>
						</li>
						<!-- iniciar sesion -->
						<li class="dropdown">
							<a href="login/" class="app-nav-menu">
								<p class="text-menu">Login</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>
</header>
