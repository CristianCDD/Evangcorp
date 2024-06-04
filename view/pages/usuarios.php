<?php
$item = null;
$valor = null;
$usuarios = ControllerUser::ctrMostrarUsuarios($item, $valor);

/* echo '<pre>'; var_dump($usuarios); echo '</pre>'; */


if (
    $_SESSION["rol"] == "Supervisor" ||
    $_SESSION["rol"] == "Vendedor"
) {

    echo '<script> window.location = "inicio"; </script>';

    return;
}

?>




<div id="recent-transactions" class="col-12">

    <div class="content-header row mt-4">
        <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">GESTOR DE USUARIOS</h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="inicio">ESCRITORIO</a>
                        </li>
                        <li class="breadcrumb-item active">Usuarios
                        </li>
                    </ol>
                </div>
            </div>
        </div>

    </div>

    <button type="button" class="btn btn-primary mb-4 btnAgregarUsuarios" data-bs-toggle="modal" data-bs-target="#modalAgregarUsuario">
        Agregar Usuario
    </button>

    <div class="card">
        <div class="card-content p-4">
            <div class="table-responsive">
                <table id="tabla-responsives" class="table table-hover table-xl mb-0 myTable display">
                    <thead>
                        <tr>
                            <th class="border-top-0">#</th>
                            <th class="border-top-0">Nombre</th>
                            <th class="border-top-0">Usuario</th>
                            <th class="border-top-0">Correo</th>
                            <th class="border-top-0">Rol</th>
                            <th class="border-top-0">Foto</th>
                            <th class="border-top-0">Estado</th>
                            <th class="border-top-0">Ultimo ingreso</th>
                            <th class="border-top-0">Acciones</th>
                        </tr>

                    </thead>
                    <tbody>

                        <?php foreach ($usuarios as $key => $value) : ?>
                            <tr>
                                <td><?php echo ($key + 1) ?></td>
                                <td><?php echo $value["nombre"] ?></td>
                                <td><?php echo $value["usuario"] ?></td>
                                <td width="60"><?php echo $value["correo"] ?></td>
                                <td><?php echo $value["rol"] ?></td>
                                <td><img src="<?php echo $value["ruta"] ?>" class="img-thumbnail" width="80px" alt=""></td>
                                <?php if ($value["estado"] != 0) : ?>

                                    <td><button type="button" estadoUsuario="0" idUsuario="<?php echo $value["id_usuario"] ?>" class="btn btn-success  btnActivar">Activado</button></td>

                                <?php else : ?>

                                    <td><button type="button" estadoUsuario="1" idUsuario="<?php echo $value["id_usuario"] ?>" class="btn btn-danger btnActivar">Desactivado</button></td>

                                <?php endif; ?>

                                <td><?php echo fechaCastellano($value["fecha_ingreso"]) . "  " . formatDate($value["fecha_ingreso"]); ?></td>
                                <!-- botonoes de accion -->
                                <td>
                                    <div class="btn-group" role="group" aria-label="Acciones de usuario">
                                        <button idUsuario="<?php echo $value["id_usuario"] ?>" type="button" class="btn btn-primary btn-xs btnEditarUsuarios" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-edit"></i></button>
                                        <button idUsuario="<?php echo $value["id_usuario"] ?>" type="button" class="btn btn-danger btn-xs btnEliminarUsuarios"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>


                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- MODAL AGREGAR USUARIO -->
<div class="modal fade" id="modalAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white mt-2" id="exampleModalLabel">Agregar usuario</h5>


                <button type="button" class="btn btn-link text-white" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>


            <!--=====================================================
             =                     FORMULARIO                       =
            ========================================================-->

            <form class="form" method="post" enctype="multipart/form-data">

                <div class="modal-body">

                    <!-- DNI -->
                    <div class="row mb-2">

                        <div class="col mb-2">

                            <small>Ingresa solo el numero de DNI</small><span style="color: red;"> *</span>

                            <!-- Agrega el formulario de búsqueda aquí -->
                            <div class="input-group">
                                <input type="text" id="dniConsulta" name="registroDni" class="form-control" style="outline: none;" placeholder="Buscar usuario">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-secondary registroDni">
                                        <i class="fas fa-search"></i> Buscar
                                    </button>
                                </div>
                            </div>
                            <small>Si tiene otro tipo de documento, ingresar datos manualmente.</small>
                        </div>
                    </div>


                    <!-- COLUMA DE DOS -->

                    <div class="row">
                        <div class="col">

                            <!-- Nombre -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input type="text" name="agregarNombre" id="nombreDNI" class="form-control" placeholder="Nombre">
                                </div>
                            </div>
                        </div>
                        <div class="col">

                            <!-- Apellidos -->
                            <div class="form-group">


                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                    </div>
                                    <input type="text" name="agregarApellidos" id="apellidoDNI" class="form-control" placeholder="Apellidos">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Usuario -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-smile"></i></span>
                            </div>
                            <input type="text" name="agregarUsuario" id="nameUser" class="form-control agregarUsuario" placeholder="Usuario">
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-7">
                            <!-- Correo electrónico -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                    </div>
                                    <input type="email" id="agregarCorreoElectronico" name="agregarCorreoElectronico" class="form-control" placeholder="Correo electrónico">
                                </div>
                            </div>
                        </div>
                        <div class="col-5">

                            <!-- Password -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                    </div>
                                    <input type="password" id="agregarPwd" name="agregarPwd" class="form-control" placeholder="Contraseña">
                                </div>
                            </div>

                        </div>
                    </div>


                    <!-- Seleccionar Rol -->
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">
                            <i class="fas fa-users"></i> Seleccionar rol
                        </label>
                        <select class="form-control" name="selRol" id="selRol">
                            <option selected disabled>Seleccionar opciones</option>
                            <option value="Administrador"><i class="fas fa-user-shield"></i> Administrador</option>
                            <option value="Supervisor"><i class="fas fa-user-check"></i> Supervisor</option>
                            <option value="Vendedor"><i class="fas fa-user"></i> Vendedor</option>
                        </select>
                    </div>


                    <!-- Subir Foto -->
                    <div class="form-group">
                        <label for="subirFoto">
                            <i class="fas fa-camera"></i> Subir foto
                        </label>
                        <input type="file" class="form-control-file nuevaFoto" name="nuevaFoto" accept="image/*" aria-describedby="fotoHelp">
                        <small id="fotoHelp" class="form-text text-muted">Peso máximo: 2MB</small>
                        <img src="view/img/anonimo.jpg" class="img-thumbnail previsualizar" width="100px" height="100px" alt="">
                    </div>


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar usuario</button>
                </div>
            </form>


            <!-- controlador para agregar usuarios -->
            <?php

            $agregarUsuario = new ControllerUser();
            $agregarUsuario->ctrAgregarUsuarios();

            ?>

        </div>
    </div>
</div>


<!-- MODAL EDITAR USUARIO -->
<div class="modal fade" id="modalEditarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white mt-2" id="exampleModalLabel">Edita usuario</h5>


                <button type="button" class="btn btn-link text-white" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form class="form" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">

                        <!-- para sacar el id de cada usuario -->

                        <!--                         <div class="form-group">

                            <input type="hidden" class="form-control" id="idUsuario" name="idUsuario" readonly>

                        </div> -->

                        <div class="col">
                            <!-- Nombre -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input type="text" name="editarNombre" id="editarNombre" class="form-control" placeholder="Nombre" readonly>
                                </div>
                            </div>
                        </div>


                        <div class="col">
                            <!-- Apellidos -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                    </div>
                                    <input type="text" name="editarApellidos" id="editarApellido" class="form-control" placeholder="Apellidos" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Usuario -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-smile"></i></span>
                            </div>
                            <input type="text" name="editarUsuario" id="editarUsuario" class="form-control" placeholder="Usuario" readonly>
                        </div>
                    </div>

                    <!-- Correo electrónico -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                            </div>
                            <input type="email" name="editarCorreoElectronico" id="editarCorreoElectronico" class="form-control" placeholder="Correo electrónico">
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            <input type="password" name="editarPwd" id="editarPwd" class="form-control" placeholder="Contraseña">
                            <input type="hidden" name="pwdActual" id="pwdActual" class="form-control" placeholder="Contraseña">
                        </div>
                    </div>

                    <!-- Seleccionar Rol -->
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">
                            <i class="fas fa-users"></i> Seleccionar rol
                        </label>
                        <select class="form-control" name="editarRol" id="editarRol">
                            <option selected disabled>Seleccionar opciones</option>
                            <option value="Administrador"><i class="fas fa-user-shield"></i> Administrador</option>
                            <option value="Supervisor"><i class="fas fa-user-check"></i> Supervisor</option>
                            <option value="Vendedor"><i class="fas fa-user"></i> Vendedor</option>
                        </select>
                    </div>

                    <!-- Subir Foto -->
                    <div class="form-group">
                        <label for="subirFoto">
                            <i class="fas fa-camera"></i> Subir foto
                        </label>
                        <input type="file" class="form-control-file nuevaFoto" name="editarFoto" id="editarFoto" accept="image/*" aria-describedby="fotoHelp">
                        <small id="fotoHelp" class="form-text text-muted">Peso máximo: 2MB</small>
                        <img src="view/img/anonimo.jpg" class="img-thumbnail previsualizar" width="100px" height="100px" alt="">
                        <input type="hidden" name="fotoActual" id="fotoActual">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Actualizar usuario</button>
                </div>
            </form>


            <!-- controlador para editar usuarios -->
            <?php

            $editarUsuario = new ControllerUser();
            $editarUsuario->ctrActualizarUsuarios();

            ?>

        </div>
    </div>
</div>


<?php

$eliminarUsuario = new ControllerUser();
$eliminarUsuario->ctrEliminarUsuario();

?>