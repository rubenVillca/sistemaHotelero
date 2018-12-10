<!DOCTYPE html>
<html lang="es">
<head>
	<?php require_once "views/widgets/head.blade.php"; ?>
</head>
<body>
<!-- menu recepcion -->
<?php require_once "views/fragment/menuUser/menuRecepcion.blade.php";?>
<div class="app-color-font">
	<div class="container">
		<div class="row">
		<?php require_once "views/widgets/breadCroumb.blade.php";?><!-- BreadCroumb -->
		<?php require_once "views/widgets/messageAlert.blade.php";?><!-- mensajes de alerta-->
			<div class="col-xs-12 col-sm-6 col-md-9 col-lg-9">
				<!--Contenido principal-->
				<div class="row">
					<?= isset($tpl_content) ? $tpl_content : ''; ?>
				</div>
			</div>
			<!--Inicio de Seccion de herrameintas varios-->
			<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 pull-right animated fadeInRight">
				<div class="panel-body">
					<?php require_once "views/widgets/widget_chat.blade.php";?>
				</div>
				<div class="panel-body">
					<?php require_once "views/widgets/calendarWidget.blade.php"; ?>
				</div>
				<hr/>
				<div class="panel-body">
					<?php require_once "views/widgets/activityWidget.blade.php"; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Pie de Pagina-->
<?php require_once "views/widgets/footer.blade.php";?>
<!-- Scripts -->
<?php require_once "views/widgets/script.blade.php";?>
</body>
</html>