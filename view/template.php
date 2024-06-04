<?php

session_start();
if (isset($_SESSION["id"])) {


    $item = "id_usuario";
    $valor = $_SESSION["id"];
    $usuario = ControllerUser::ctrMostrarUsuarios($item, $valor);
}



?>


<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1, minimal-ui">
    <meta name="description" content="CryptoDash admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, CryptoDash Cryptocurrency Dashboard Template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="ThemeSelection">
    <title>Sistema de reporstes - <?php echo (isset($_GET["route"]) && $_GET["route"] == "login") ? 'login' : (isset($_GET["route"]) ? $_GET["route"] : 'login'); ?></title>
    <link rel="shortcut icon" href="view/img/logoEvang.jpeg" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i|Comfortaa:300,400,500,700" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="view/app-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="view/app-assets/vendors/css/charts/chartist.css">
    <link rel="stylesheet" type="text/css" href="view/app-assets/vendors/css/charts/chartist-plugin-tooltip.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="view/app-assets/css/app.css">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="view/app-assets/css/core/menu/menu-types/vertical-compact-menu.css">
    <link rel="stylesheet" type="text/css" href="view/app-assets/vendors/css/cryptocoins/cryptocoins.css">
    <link rel="stylesheet" type="text/css" href="view/app-assets/css/pages/timeline.css">
    <link rel="stylesheet" type="text/css" href="view/app-assets/css/pages/dashboard-ico.css">

    <link rel="stylesheet" type="text/css" href="view/assets/css/style.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="view/assets/css/style.css">
    <!-- END Custom CSS-->

    <script src="https://kit.fontawesome.com/3954c71592.js" crossorigin="anonymous"></script>

    <!--===================================
    =            data table JS            =
    ====================================-->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

    <!--===================================
    =            plugins de JS            =
    ====================================-->

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script src="view/plugins/sweetAlert/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="view/plugins/sweetAlert/vsweetalert2.min.css">

    <!-- responsive datatable -->
    <link rel="stylesheet" type="text/css" href="view/app-assets/css/core/libraries/responsive.dataTables.min.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="view/assets/css/style.css">

</head>

<body class="vertical-layout vertical-compact-menu 2-columns  menu-expanded fixed-navbar" data-open="click" data-menu="vertical-compact-menu" data-col="2-columns">


    <?php if (isset($_SESSION["init"]) && $_SESSION["init"] == "ok") : ?>



        <!--===================================
        =            CABECERA                 =
        ====================================-->

        <?php include 'view/pages/cabecera.php' ?>
        <!-- fin de la cabecera -->


        <!-- ////////////////////////////////////////////////////////////////////////////-->



        <!--===================================
        =            sidebar                  =
        ====================================-->
        <?php include 'view/pages/aside.php' ?>

        <!-- fin menu sidebar -->


        <div class="app-content content">


            <div class="content-wrapper">

                <!-- page de incio - dashboard -->

                <!-- Enrutamientos -->

                <?php
                if (!isset($_GET["route"]) || empty($_GET["route"])) {
                    include 'pages/inicio.php';
                } elseif (
                    $_GET["route"] == "usuarios" ||
                    $_GET["route"] == "inicio" ||
                    $_GET["route"] == "salir" ||
                    $_GET["route"] == "perfil" ||
                    $_GET["route"] == "insertar-prospecciones" ||
                    $_GET["route"] == "insertar-comercios" ||
                    $_GET["route"] == "carta-ofertas" ||
                    $_GET["route"] == "ingresar-venta" ||
                    $_GET["route"] == "registrar-validaciones" ||
                    $_GET["route"] == "seguimiento-comercios" ||
                    $_GET["route"] == "tasas" ||
                    $_GET["route"] == "asistencia" ||
                    $_GET["route"] == "control-asistencia" ||
                    $_GET["route"] == "seguimiento-prospecciones"
                ) {
                    include 'pages/' . $_GET["route"] . '.php';
                } else {
                    include 'pages/404.php';
                }
                ?>




            </div>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////-->

    <?php else : ?>

        <?php include 'pages/login.php' ?>

    <?php endif ?>


    <!--===================================
    =                FOOTER               =
    ====================================-->

    <?php include 'view/pages/footer.php' ?>
    <!-- fin del Footer -->

    <!-- BEGIN VENDOR JS-->
    <script src="view/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="view/app-assets/vendors/js/charts/chartist.min.js" type="text/javascript"></script>
    <script src="view/app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js" type="text/javascript"></script>
    <script src="view/app-assets/vendors/js/timeline/horizontal-timeline.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    <script src="view/app-assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="view/app-assets/js/core/app.js" type="text/javascript"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="view/app-assets/js/scripts/pages/dashboard-ico.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
    <script src="view/app-assets/js/core/libraries/bootstrap.min.js"></script>
    <script src="view/app-assets/js/core/libraries/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <!--===================================
    =            MIS SCRIPTS             =
    ====================================-->
    <!-- data table -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <!-- archivos js -->
    <script src="view/assets/js/template.js"></script>
    <script src="view/assets/js/usuarios.js"></script>
    <script src="view/assets/js/perfil.js"></script>
    <script src="view/assets/js/login.js"></script>
    <script src="view/assets/js/vendedor.js"></script>

    <script src="view/app-assets/js/scripts/forms/account-profile.js" type="text/javascript"></script>
</body>

</html>