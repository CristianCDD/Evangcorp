<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="CryptoDash admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, CryptoDash Cryptocurrency Dashboard Template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="ThemeSelection">
    <link rel="shortcut icon" href="view/img/logoEvang.jpeg" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i|Comfortaa:300,400,500,700" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="view/app-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="view/app-assets/vendors/css/forms/toggle/switchery.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="view/app-assets/css/app.css">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="view/app-assets/css/core/menu/menu-types/vertical-compact-menu.css">
    <link rel="stylesheet" type="text/css" href="view/app-assets/vendors/css/cryptocoins/cryptocoins.css">
    <link rel="stylesheet" type="text/css" href="view/app-assets/css/pages/account-profile.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="view/assets/css/style.css">

    <style>
        @media (max-width: 768px) {
            .responsived {
                display: flex;
                flex-direction: column;
            }

            .columna1 {
                max-width: 1400px;
            }

            .columna2 {
                max-width: 1400px;
            }


        }
    </style>
    <!-- END Custom CSS-->
</head>

<div class="content-header row">
    <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">MI PERFIL</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">ESCRITORIO</a>
                    </li>
                    <li class="breadcrumb-item active">Perfil de cuenta
                    </li>
                </ol>
            </div>
        </div>
    </div>

</div>
<section class="card">
    <div class="card-content">
        <div class="card-body">

            <div class="">


                <form method="post" enctype="multipart/form-data">

                    <div class="card-body">
                        <div class="row responsived">

                            <div class="col-5 p-4 columna1">
                                <div class="text-center mb-5">
                                    <img src="view/img/logoEvang.jpeg" id="fotoActual" height="100" class="mb-4 previsualizar" style="border-radius: 50%; border:2px solid #EDEEF9;">
                                    <h3 style="color: #2C3E50; font-family: 'Arial', sans-serif; text-transform:uppercase;"><?php echo $_SESSION["nombre"] . " " . $_SESSION["apellidos"]; ?></h3>
                                    <p style="color: #7F8C8D;">Por favor si tiene algun problema comuniquese con administración.</p>
                                </div>
                                <hr />


                                <input type="hidden" id="idPerfil" value="<?php echo $_SESSION["id"] ?>">


                                <?php


                                function obtenerCargo()
                                {
                                    if (isset($_SESSION["id"])) {
                                        $item = "rol";
                                        $valor = $_SESSION["rol"];
                                        $ultimoLogin = ControllerUser::ctrMostrarUsuarios($item, $valor);

                                        if ($ultimoLogin) {
                                            echo $_SESSION["rol"];
                                        } else {
                                            echo 'Usuario no encontrado';
                                        }
                                    }
                                }


                                if (!isset($_SESSION["id"])) {
                                    $item = "rol";
                                    $valor = $_SESSION["rol"];
                                    $ultimoLogin = ControllerUser::ctrMostrarUsuarios($item, $valor);

                                    if ($ultimoLogin) {
                                        echo $_SESSION["ultimoLogin"];
                                    } else {
                                        echo 'Usuario no encontrado';
                                    }
                                }


                                ?>


                                <table>
                                    <th>Cargo:</th>
                                    <td>&nbsp; <?php echo obtenerCargo(); ?></td>
                                </table>
                                <hr />

                                <table>
                                    <th>Ultimo login:</th>
                                    <td>&nbsp;<?php echo fechaCastellano($_SESSION["ultimoLogin"]) . " a las " . formatDate($_SESSION["ultimoLogin"]); ?></td>
                                </table>



                            </div>

                            <div class="col-7 columna2">

                                <div class="small-form">
                                    <form class="form" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <!-- Nombre -->
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                                            </div>
                                                            <input type="text" name="editNombre" id="editNombre" class="form-control" placeholder="Nombre" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <!-- Apellidos -->
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                                            </div>
                                                            <input type="text" name="editApellidos" id="editApellidos" class="form-control" placeholder="Apellidos" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <!-- dni -->
                                                    <div class="form-group">
                                                        <div class="input-group">

                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" style="font-size:10px;">DNI</span>
                                                            </div>
                                                            <input type="text" name="dni" id="dni" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <!-- Usuario -->
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-smile"></i></span>
                                                            </div>
                                                            <input type="text" name="editUsuario" id="editUsuario" class="form-control" placeholder="Usuario" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




                                            <!-- Correo electrónico -->
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                                    </div>
                                                    <input type="email" name="editCorreoElectronico" id="editCorreoElectronico" class="form-control" placeholder="Correo electrónico" readonly>
                                                </div>
                                            </div>

                                            <!-- Password -->
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                                    </div>
                                                    <input type="password" name="editPwd" id="editPwd" class="form-control" placeholder="Contraseña" readonly>
                                                    <input type="hidden" name="passActual" id="passActual" class="form-control" placeholder="Contraseña">
                                                </div>
                                            </div>


                                            <!-- Seleccionar Rol -->
                                            <div class="form-group" style="display: none;">
                                                <label for="exampleFormControlSelect1">
                                                    <i class="fas fa-users"></i> Seleccionar rol
                                                </label>
                                                <select class="form-control" name="editRol" id="editRol" readonly>
                                                    <option selected disabled>Seleccionar opciones</option>
                                                    <option value="Administrador"><i class="fas fa-user-shield"></i> Administrador</option>
                                                    <option value="Supervisor-lima"><i class="fas fa-user-check"></i> Supervisor-lima</option>
                                                    <option value="Supervisor-chiclayo"><i class="fas fa-user-check"></i> Supervisor-chiclayo</option>
                                                    <option value="Supervisor-iquitos"><i class="fas fa-user-check"></i> Supervisor-iquitos</option>
                                                    <option value="Vendedor"><i class="fas fa-user"></i> Vendedor</option>
                                                </select>
                                            </div>

                                            <!-- Subir Foto -->
                                            <div class="form-group">
                                                <label for="subirFoto">
                                                    <i class="fas fa-camera"></i> Subir foto
                                                </label>
                                                <input type="file" class="form-control-file nuevaFoto" id="newFoto" name="newFoto" accept="image/*" aria-describedby="fotoHelp">
                                                <input type="hidden" class="form-control-file nuevaFoto" id="fotoActual" name="fotoActual" accept="image/*" aria-describedby="fotoHelp">
                                                <small id="fotoHelp" class="form-text text-muted">Peso máximo: 2MB</small>
                                                <img src="view/img/anonimo.jpg" class="img-thumbnail previsualizar" width="100px" height="100px" alt="">
                                            </div>


                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary btnActualizarPerfil">Actualizar datos</button>
                                            </div>
                                        </div>
                                    </form>

                                    <!-- controlador para editar usuarios -->
                                    <?php
                                    $editarPerlfil = new ControllerUser();
                                    $editarPerlfil->ctrActualizarPerfil();

                                    ?>
                                </div>


                            </div>




                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
</section>

<br>



<!-- ////////////////////////////////////////////////////////////////////////////-->

<!-- BEGIN VENDOR JS-->
<script src="view/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="view/app-assets/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="view/app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="view/app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="view/app-assets/js/scripts/forms/account-profile.js" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->


</html>