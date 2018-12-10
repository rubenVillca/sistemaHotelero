<!DOCTYPE html>
<html lang="es">
<head>
    <base href="<?=Helper::base()?>">
    <link rel="icon" href="img/system/logo.png">
    <title><?= isset($title) ? $title : "ERROR"; ?></title>
    <link href="library/css/404.css" rel="stylesheet" type="text/css"/>
</head>
<body class="app-color-black">
<?php if(isset($tpl_content)) { ?>
    <?= $tpl_content; ?>
<?php }?>
</body>
</html>