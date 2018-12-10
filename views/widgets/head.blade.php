<meta charset="utf-8">
<meta name="author" content="Ruben Villca Fernandez"/>
<meta name="application-name" content="Servicio web de hotel 1.0"/>
<meta name="description" content="pagina de servicios de hotel permite reservas, ver servicios, ofertas, actividades">
<!-- configuracion para buscadores -->
<meta name="robots" content="noindex, nofollow"/>
<!-- plantilla responsiva -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- compatibilidad con navegadores -->
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<!-- direccion basica para los estilos -->
<base href="<?=Helper::base()?>">
<!-- titulo -->
<link rel="icon" href="<?=Helper::base()?>img/system/logo.png">
<title><?= isset($title) ? $title : "ERROR, Pagina no encontrada"; ?></title>
<!--  ESTILOS  -->
<!-- Bootstrap -->
<link type="text/css" rel="stylesheet" href="<?=Helper::base()?>libs/bootstrap/css/bootstrap.min.css">
<link type="text/css" rel="stylesheet" href="<?=Helper::base()?>libs/bootstrap/css/bootstrap-theme.min.css">
<link type="text/css" rel="stylesheet" href="<?=Helper::base()?>libs/bootstrap/css/bootstrap-multiselect.css">
<link type="text/css" rel="stylesheet" href="<?=Helper::base()?>libs/bootstrap/css/bootstrap2-toggle.min.css">

<!--link type="text/css" rel="stylesheet" href="<?=''//Helper::base()?>libs/bootstrap/css/bootstrap-reset.css"-->
<!-- animaciones de entrada de etiquetas -->
<link type="text/css" href="<?=Helper::base()?>library/fonts/css/font-awesome.min.css" rel="stylesheet">
<link type="text/css" href="<?=Helper::base()?>library/css/animate.min.css" rel="stylesheet">
<!-- JQuery para el datapicker en firefox-->
<link rel="stylesheet" href="<?=Helper::base()?>libs/jquery-ui-1.12.1/jquery-ui.min.css"/>
<!-- timepicker -->
<link rel="stylesheet" href="<?=Helper::base()?>libs/timepicker/jquery.timepicker.min.css">
<!-- Input file ingresar archivos al sistema -->
<link type="text/css" rel="stylesheet" href="<?=Helper::base()?>library/css/fileinput.min.css">
<!-- calendario -->
<link href="<?=Helper::base()?>libs/calendar/fullcalendar.css" rel="stylesheet">
<link href="<?=Helper::base()?>libs/calendar/fullcalendar.print.css" rel="stylesheet" media="print">
<!-- editor de texto -->
<link type="text/css" rel="stylesheet" href="<?=Helper::base()?>libs/jquery/css/jquery-te-1.4.0.css">
<!-- Estilos propios-->
<link type="text/css" rel="stylesheet" href="<?=Helper::base()?>library/css/styles.css">
<!-- date input para firefox -->
<!-- SCRIPTs  -->
<!-- JQuery -->
<script type="text/javascript" src="<?=Helper::base()?>libs/jquery/js/jquery.min.js"></script>
<!-- Input file -->
<script src="<?=Helper::base()?>library/js/fileinput.min.js" type="text/javascript"></script>
<!-- Bootstrap-->
<!--script src="libs/bootstrap/js/bootstrap.min.js"></script-->
<script type="text/javascript" src="<?=Helper::base()?>libs/bootstrap/js/bootstrap-multiselect.js"></script>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]-->
<script src="<?=Helper::base()?>libs/compatibility/html5shiv.js"></script>
<script src="<?=Helper::base()?>libs/compatibility/respond.min.js"></script>
<!--[endif]-->
<!-- estilos para alert javascript referencia https://limonte.github.io/sweetalert2/-->
<script src="<?=Helper::base()?>libs/sweetalert2/sweetalert2.min.js"></script>
<link rel="stylesheet" href="<?=Helper::base()?>libs/sweetalert2/sweetalert2.min.css">
