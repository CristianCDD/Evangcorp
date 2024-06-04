            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarUsuario">
                Agregar Usuario

            </button>



            <!-- MODAL AGREGAR USUARIO -->
            <div class="modal fade" id="modalAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-dark">
                            <h5 class="modal-title text-white" id="exampleModalLabel">Agregar usuario</h5>


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

                    </div>
                </div>
            </div>