<div class="main-menu menu-fixed menu-dark menu-bg-default rounded menu-accordion menu-shadow">
    <div class="main-menu-content"><a class="navigation-brand d-none d-md-block d-lg-block d-xl-block" href="inicio"><img class="brand-logo" alt="CryptoDash admin logo" src="view/img/EvanglogoNegativo.png" /></a>
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="active"><a href="inicio"><i class="icon-grid"></i><span class="menu-title" data-i18n="">Escritorio</span></a>
            </li>

            <?php if ($_SESSION["rol"] == "Administrador") : ?>
                <li class=" nav-item"><a href="usuarios"><i class="icon-user"></i><span class="menu-title" data-i18n="">Usuarios</span></a>
                </li>
            <?php endif ?>

            <?php if ($_SESSION["rol"] == "Administrador") : ?>
                <li class=" nav-item"><a href="asistencia"><i class="fa-solid fa-clipboard-user"></i><span class="menu-title" data-i18n="">Asistencia</span></a>

                    <ul class="menu-content">
                        <br>
                        <li><a class="menu-item" href="asistencia">Marcar Asistencia</a>
                        </li>
                        <br>
                        <?php if ($_SESSION["rol"] == "Administrador") : ?>

                            <li><a class="menu-item" href="control-asistencia">Ver asistencias</a>
                            </li>
                        <?php endif ?>
                        <br>
                    </ul>


                </li>

            <?php endif ?>


            <!-- COMERCIOS -->
            <li class=" nav-item"><a href="#"><i class="icon-wallet"></i><span class="menu-title" data-i18n="">Comercios</span></a>
                <ul class="menu-content">
                    <br>
                    <li><a class="menu-item" href="insertar-comercios">Insertar comercios</a>
                    </li>
                    <br>
                    <li><a class="menu-item" href="seguimiento-comercios">Segu. comercios</a>
                    </li>
                    <br>
                    <!-- <li><a class="menu-item" href="account-login-history.html">Login History</a>
                    </li>
                    <li class="navigation-divider"></li>
                    <li><a class="menu-item" href="#">Misc</a>
                        <ul class="menu-content">
                            <li><a class="menu-item" href="account-login.html">Login</a>
                            </li>
                            <li><a class="menu-item" href="account-register.html">Register</a>
                            </li>
                        </ul>
                    </li> -->
                </ul>
            </li>

            <!-- PROSPECCION -->
            <li class=" nav-item"><a href="#"><i class="icon-shuffle"></i><span class="menu-title" data-i18n="">Prospeccion</span></a>
                <ul class="menu-content">
                    <br>
                    <li><a class="menu-item" href="insertar-prospecciones">Insertar Prospecciones</a>
                    </li>
                    <br>
                    <li><a class="menu-item" href="seguimiento-prospecciones">Segui. Prospeccion</a>
                    </li>
                    <br>
                </ul>
            </li>


            <!-- VENTAS -->
            <li class=" nav-item"><a href="#"><i class="fas fa-chart-line"></i><span class="menu-title" data-i18n="">Ventas</span></a>
                <ul class="menu-content">
                    <br>



                    <li><a class="menu-item" href="ingresar-venta">Ingresar plantilla</a>
                    </li><br>

                    <?php if ($_SESSION["rol"] == "Administrador") : ?>
                        <li><a class="menu-item" href="carta-ofertas">Carta ofertas</a>
                        </li><br>
                    <?php endif ?>


                    <?php if (
                        $_SESSION["rol"] == "Administrador"  || $_SESSION["rol"] == "Supervisor-lima"  ||
                        $_SESSION["rol"] == "Supervisor-chiclayo" ||
                        $_SESSION["rol"] == "Supervisor-iquitos"
                    ) : ?>
                        <li><a class="menu-item" href="ingresar-venta">Sustentos de ventas</a>
                        </li><br>
                    <?php endif ?>


                    <?php if (
                        $_SESSION["rol"] == "Administrador" || $_SESSION["rol"] == "Supervisor-lima"  ||
                        $_SESSION["rol"] == "Supervisor-chiclayo" ||
                        $_SESSION["rol"] == "Supervisor-iquitos" 
                    ) : ?>
                        <li><a class="menu-item" href="registrar-validaciones">Registrar validaciones</a>
                        </li>
                    <?php endif ?>


                    <br>
                    <!-- <li><a class="menu-item" href="account-login-history.html">Login History</a>
                    </li>
                    <li class="navigation-divider"></li>
                    <li><a class="menu-item" href="#">Misc</a>
                        <ul class="menu-content">
                            <li><a class="menu-item" href="account-login.html">Login</a>
                            </li>
                            <li><a class="menu-item" href="account-register.html">Register</a>
                            </li>
                        </ul>
                    </li> -->
                </ul>
            </li>

            <!-- TASAS -->
            <li class=" nav-item"><a href="tasas"><i class="fa-solid fa-percent"></i><span class="menu-title" data-i18n="">Tasas</span></a>
            </li>

            <!-- perfil -->
            <li class=" nav-item"><a href="#"><i class="icon-user-following"></i><span class="menu-title" data-i18n="">Cuenta</span></a>
                <ul class="menu-content">
                    <br>
                    <li><a class="menu-item" href="perfil">Perfil</a>
                    </li>
                    <br>
                    <!-- <li><a class="menu-item" href="account-login-history.html">Login History</a>
                    </li>
                    <li class="navigation-divider"></li>
                    <li><a class="menu-item" href="#">Misc</a>
                        <ul class="menu-content">
                            <li><a class="menu-item" href="account-login.html">Login</a>
                            </li>
                            <li><a class="menu-item" href="account-register.html">Register</a>
                            </li>
                        </ul>
                    </li> -->
                </ul>
            </li>

            <li class=" nav-item"><a href="salir"><i class="icon-logout"></i><span class="menu-title" data-i18n="">Salir</span></a>
            </li>

        </ul>
    </div>
</div>