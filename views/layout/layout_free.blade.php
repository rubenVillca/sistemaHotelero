<!DOCTYPE html>
<html lang="es">
<head>
	<?php require_once "views/widgets/head.blade.php"; ?>
</head>
<body>
<!-- menu user free -->
<?php require_once "views/fragment/menuUser/menuFree.blade.php" ?>
<!-- contenido -->
<div class="app-color-font">
    <div class="container">
        <!-- descargar -->
        <div class="col-xs-12 hidden-sm hidden-md hidden-lg">
            <div class="row">
                <a href="<?= Helper::getLink();?>" class="btn btn-primary form-control">
                    <i class="fa fa-download"></i> Descargar APP
                </a>
            </div>
            <br>
        </div>
        <!-- BreadCroumb -->
        <div class="row">
			<?php require_once "views/widgets/breadCroumb.blade.php";?>
        </div>
        <!-- mensajes de alerta-->
        <div class="row">
			<?php require_once "views/widgets/messageAlert.blade.php";?>
        </div>
        <div class="row">
            <!--Contenido principal-->
            <?= isset($tpl_content) ? $tpl_content : ''; ?>
        </div>
        <div class="clearfix"></div>
    </div>
<?php require_once "views/widgets/footer.blade.php";?><!-- pie de pagina -->
</div>
<?php require_once "views/widgets/script.blade.php";?>
</body>
</html>