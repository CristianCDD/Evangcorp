<div class="container">

    <style>
        /* Anula el outline en los inputs de Bootstrap */
        .form-control:focus {
            border-color: #ced4da;
            /* Color de borde cuando el input está enfocado */
            box-shadow: none;
            /* Elimina la sombra al enfocar el input */
        }


        @media (min-width: 768px) {

            .container {
                padding: 80px;

            }

        }
    </style>

    <div class="row">

        <div class="col-md-5 col-sm-12 mx-auto">

            <div class="card pt-4" style="border-radius: 10px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">

                <div class="card-body m-3">

                    <div class="text-center mb-5">
                        <img src="view/img/logoEvang.jpeg" height="100" class="mb-4" style="border-radius: 50%;">
                        <h3 style="color: #2C3E50; font-family: 'Arial', sans-serif;">Sistema EVANG CORP</h3>
                        <p style="color: #7F8C8D;">Por favor inicia sesión para continuar.</p>
                    </div>

                    <form method="post">
                        <div class="form-group has-icon-left">
                            <label for="user" style="color: #2C3E50;">Nombre de usuario</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="background-color: #170b89; color: white;"><i class="fa fa-envelope"></i></span>
                                </div>
                                <input type="text" name="ingUser" class="form-control" id="user" placeholder="Ingrese su usuario" required style="border-color: #170b89;">
                            </div>


                        </div>


                        <div class="form-group has-icon-left mb-4">
                            <label for="password" style="color: #2C3E50;">Contraseña</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="background-color: #E74C3C; color: white;"><i class="fa fa-lock"></i></span>
                                </div>
                                <input type="password" name="ingPassword" class="form-control" id="password" required style="border-color: #E74C3C; border-right: none;">
                                <div class="input-group-append">

                                    <span class="input-group-text" style="cursor: pointer; background-color: transparent; border-color: #E74C3C;" onclick="togglePassword()">
                                        <i class="fas fa-eye" id="eye-icon"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-warning btn-block btn-login" style="background-color: #F39C12; border-color: #F39C12;">Ingresar</button>
                        </div>

                    </form>

                    <?php

                    $login = new ControllerUser();
                    $login->ctrLogin();

                    ?>

                </div>

            </div>

        </div>

    </div>

</div>