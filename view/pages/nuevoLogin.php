<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V8</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" type="text/css" href="view/assets/css/login.css" />
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="contenedor-login">
                <?php

                $login = new ControllerUser();
                $login->ctrLogin();

                ?>
                <div class="wrap-login100">

                    <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="post">
                        <span class="login100-form-title">

                            <div class="content-credi">
                                <img src="view/img/logoEvangW.png" alt="Logo" />

                                <img src="view/img/credicorpEvang.png" class="credi" alt="Logo" />
                            </div>

                        </span>
                        <span class="text-center">
                            <h3 class="titulo-login" style="margin: 40px 0 15px 0;">Sistema Corporativo</h3>
                        </span>
                        <p class="text-center" style="margin: 10px 0 50px 0;">
                            Por favor inicia sesión para continuar.
                        </p>
                        <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
                            <input class="input100" type="text" name="ingUser" id="user" placeholder="Usuario" required />
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Please enter password">
                            <input class="input100" type="password" name="ingPassword" id="password" placeholder="Contraseña" required />
                            <span class="focus-input100"></span>
                        </div>

                        <div class="text-right p-t-13 p-b-23">
                            <span class="txt1"> Olvidaste </span>
                            <a href="https://wa.me/51941795983" class="txt2"> Usuario / Contraseña? </a>
                        </div>
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn">Iniciar sesion</button>
                        </div>
                        <div class="flex-col-c p-t-30 p-b-30"></div>
                    </form>



                </div>
            </div>

        </div>

    </div>



    <script src="view/assets/js/main.js"></script>
</body>

</html>