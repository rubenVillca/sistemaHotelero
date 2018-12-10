<!DOCTYPE html>
<html lang="es">
<head>
<?php require_once "views/widgets/head.blade.php"; ?>
<!-- estilos menu admin -->
    <!-- menu vertigal con submenus deplegables -->
    <link rel="stylesheet" href="libs/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="libs/timeLine/css/timeline.css">
    <link rel="stylesheet" href="libs/timeLine/css/sb-admin-2.css">
</head>
<body class="primary-color">
<?php require_once "views/fragment/menuUser/menuAdmin.blade.php";?>
<div id="page-wrapper" class="app-color-font-2">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<?php require_once "views/widgets/breadCroumb.blade.php";?><!-- BreadCroumb -->
	<?php require_once "views/widgets/messageAlert.blade.php";?><!-- mensajes de alerta-->
	<?= !empty($tpl_content) ? $tpl_content : ''; ?><!-- Contenido principal-->
    </div>
    <div class="clearfix"></div>
<?php require_once "views/widgets/footer.blade.php"; ?><!-- footer -->
</div>
<?php require_once "views/widgets/script.blade.php";?>
<!-- interfaz administrador -->
<script type="text/javascript" src="libs/metisMenu/metisMenu.js"></script>
<script type="text/javascript" src="libs/timeLine/js/sb-admin-2.js"></script>
</body>
</html>