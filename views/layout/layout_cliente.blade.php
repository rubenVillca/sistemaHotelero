<!DOCTYPE html>
<html lang="es">
<head>
	<?php require_once "views/widgets/head.blade.php"; ?>
</head>
<body>
<?php require_once "views/fragment/menuUser/menuCliente.blade.php"; ?>
<div class="app-color-font">
	<div class="container">
		<!-- descargar app -->
		<div class="row">
			<div class="col-xs-12 hidden-sm hidden-md hidden-lg">
				<div class="row">
					<a href="<?= Helper::getLink();?>" class="btn btn-primary form-control">
						<i class="fa fa-download"></i> Descargar APP
					</a>
				</div>
			</div>
		</div>
		<!-- BreadCroumb -->
		<div class="row">
			<?php require_once "views/widgets/breadCroumb.blade.php";?>
		</div>
		<!-- mensajes de alerta-->
		<div class="row">
			<?php require_once "views/widgets/messageAlert.blade.php";?>
		</div>
		<!-- container -->
		<div class="row">
			<!--Inicio de Seccion de herrameintas varios-->
			<div class="hidden-xs col-sm-6 col-md-3 col-lg-3 pull-right">
				<div class="panel-body">
					<?php require_once "views/widgets/widget_chat.blade.php";?>
				</div>
				<div class="panel-body">
					<?php require_once "views/widgets/calendarWidget.blade.php"; ?>
				</div>
				<hr>
				<div class="panel-body">
					<?php require_once "views/widgets/activityWidget.blade.php";?>
				</div>
			</div>
			<!--Contenido principal-->
			<div class="col-xs-12 col-sm-6 col-md-9 col-lg-9">
				<div class="row">
					<?= isset($tpl_content) ? $tpl_content : 'vacio'; ?>
				</div>
			</div>
		</div>
	</div>
	<?php require_once "views/widgets/footer.blade.php"; ?>
</div>
<?php require_once "views/widgets/script.blade.php";?>
</body>
</html>