<header>
	<div class="app-img-font">
		<div id="logo" class="text-center hidden-xs">
			<a href="home/" class="navbar-brand">
				<img src="img/system/logo.png" alt="Hotel" class="logo">
			</a>
		</div>
		<!-- menu -->
		<nav class="navbar navbar-default header" id="container-menu">
			<div class="container-fluid app-left-menu">
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
					<?php $_SESSION['MENU'] = isset($_SESSION['MENU']) ? $_SESSION['MENU'] : Constants::$MENU_SELECTED_HOME; ?>
					<ul class="nav navbar-nav">
						<!-- INICIO -->
						<li class="<?= $_SESSION['MENU'] == Constants::$MENU_SELECTED_HOME ? 'active-menu' : '' ?>">
							<a href="home/" class="hidden-xs">
								<p class="text-menu">Inicio</p>
							</a>
						</li>
						<!-- registro check -->
						<li role="presentation"
						    class="dropdown <?= $_SESSION['MENU'] == Constants::$MENU_SELECTED_CHECK_IN ? 'active-menu' : '' ?>">
							<a href="consume/" class="app-nav-menu">
								<p class="text-menu">Huspu&eacute;sdes</p>
							</a>
						</li>
						<!-- ayuda -->
						<li class="dropdown <?= $_SESSION['MENU'] == Constants::$MENU_SELECTED_HELP ? 'active-menu' : '' ?>">
							<a href="#" class="dropdown-toggle app-nav-menu" data-toggle="dropdown">
								<p class="text-menu">Ayuda <span class="caret"></span></p>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="help/about/">
										<span class="fa fa-info-circle"></span> Acerca de nosotros
									</a>
								</li>
								<li>
									<a href="frequently/">
										<span class="fa fa-question-circle"></span> Preguntas Frecuentes
									</a>
								</li>
								<li>
									<a href="help/manualUser/" target="_blank">
										<span class="fa fa-bookmark"></span>
										Manual de usuario
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
