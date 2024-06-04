

<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-light navbar-bg-color">
    <div class="navbar-wrapper">
        <div class="navbar-header d-md-none">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item d-md-none">
    <a class="navbar-brand" href="inicio">
        <img class="brand-logo-mobile d-sm-block d-md-none" alt="Evang Corp" src="view/img/logoEvangC.jpeg">
    </a>
</li>

<style>
    @media (max-width: 768px) {
    .brand-logo-mobile {
        width: 90px; /* Ajusta el valor según el tamaño deseado */
        height: auto; /* Mantiene la proporción del logo */
    }
}

</style>

                <!--  <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"> </i></a></li> -->
            </ul>
        </div>
        <div class="navbar-container">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs is-active" href="#"><i class="ft-menu"> </i></a></li>
                    <!-- <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a>
                        <div class="search-input">
                            <input class="input" type="text" placeholder="Explore CryptoDash...">
                        </div>
                    </li> -->
                </ul>
                <ul class="nav navbar-nav ml-md-auto"> <!-- Updated class to ml-md-auto for right alignment on medium and larger screens -->
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <span class="avatar avatar-online">
                                <img src="<?php echo $_SESSION["ruta"];?>" alt="">
                            </span>
                            <span class="user-name text-bold-500 smaller-name"><?php echo $_SESSION["nombre"] . " " . $_SESSION["apellidos"] ?></span>
                        </a>
                        <style>
                            .smaller-name {
                                font-size: 14px;
                            }
                        </style>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="perfil"><i class="ft-user"></i> Perfil</a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="salir"><i class="ft-power"></i> Salir</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>