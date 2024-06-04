<?php

class ControllerUser
{

    static public function ctrMostrarUsuarios($item, $valor)
    {

        //tabla
        $tabla = "usuarios";

        //inicio conexion
        $respuesta = ModelUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

        return $respuesta;
    }

    public function ctrAgregarUsuarios()
    {

        if (isset($_POST["agregarUsuario"])) {

            if (
                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\d ]+$/', $_POST["agregarUsuario"]) &&
                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $_POST["agregarCorreoElectronico"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["agregarPwd"])
            ) {



                $imgNombre = $_FILES["nuevaFoto"]["tmp_name"];
                $rutaImagen = "view/img/usuarios/";

                //insertamos la foto
                if (!empty($imgNombre)) {

                    if (isset($imgNombre)) {

                        list($ancho, $alto) = getimagesize($imgNombre);

                        $nuevoAncho = 500;
                        $nuevoAlto = 500;

                        /* creamos el nuevo directorio */
                        $directorio = $rutaImagen . $_POST["agregarUsuario"];
                        mkdir($directorio, 0755); /* permiso de escritura y lectura */

                        /* segun el tipo de foto */

                        if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {

                            /* guardamos la imagen para tentar */

                            $aleatorio = mt_rand(100, 999);

                            $ruta = $rutaImagen . $_POST["agregarUsuario"] . "/" . $aleatorio . ".jpg";

                            /* para recortar la imgen o redimencionar */
                            $origen = imagecreatefromjpeg($imgNombre);

                            /* NUEVAS DIMENCIONES */
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                            imagejpeg($destino, $ruta);
                        }
                    }
                } else {

                    /* creamos el nuevo directorio */
                    $directorio = $rutaImagen . $_POST["agregarUsuario"];
                    mkdir($directorio, 0755); /* permiso de escritura y lectura */

                    $aleatorio = mt_rand(100, 999);
                    /* $imagenDefinida = $aleatorio."/anonimo.jpg"; */

                    $imagenDefinida = "anonimo.jpg";

                    /* origen de la imagen */
                    $origen = "view/img/anonimo.jpg";

                    $ruta = $directorio . "/" . $imagenDefinida;


                    /* COPIAMOS DEL ORIGEN DE LA IMAGEN A LA RUTA NUEVA */
                    copy($origen, $ruta);
                }

                $tabla = "usuarios";

                $encriptar = crypt($_POST["agregarPwd"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');


                $datos = array(
                    "usuario" => $_POST["agregarUsuario"],
                    "dni_usuarios" => $_POST["registroDni"],
                    "nombre" => $_POST["agregarNombre"],
                    "apellidos" => $_POST["agregarApellidos"],
                    "correo" => $_POST["agregarCorreoElectronico"],
                    "password" => $encriptar,
                    "rol" => $_POST["selRol"],
                    "ruta" => $ruta
                );

                //creamos la respuesta

                $respuesta = ModelUsuarios::mdlAgregarUsuario($tabla, $datos);

                if ($respuesta == "ok") {
                    echo "<script>

                        Swal.fire({
                            icon: 'success',
                            title: 'Correcto',
                            text: 'Los datos han sido guardado correctamente!'
                        }).then(function(result) {
                            if (result.value) {

                                window.location = 'usuarios';

                            }
                        })
                        
                	</script>";
                }
            } else {

                echo "<script>

            Swal.fire({
                    icon: 'error',
                    title: 'Corregir',
                    text: 'Los datos no pueden ir vacíos o llevar caracteres especiales!'
                }).then(function(result) {
                    if (result.value) {

                        window.location = 'usuarios';

                    }
                })

            </script>";

                return;
            }
        }
    }



    /*=====================================================
	=            Controller for login users            =
	=====================================================*/

    static public function ctrLogin()
    {

        if (isset($_POST["ingUser"])) {

            if (
                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\d ]+$/', $_POST["ingUser"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["ingPassword"])
            ) {

                $tabla = "usuarios";

                $item = "usuario";

                $valor = $_POST["ingUser"];

                $encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $respuesta = ModelUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

                /* var_dump($respuesta["apellidos"]);
                return;  */

                if (is_array($respuesta)) {


                    if ($respuesta["usuario"] == $_POST["ingUser"] && $respuesta["password"] == $encriptar) {

                        if ($respuesta["estado"] == 1) {

                            $_SESSION["init"] = "ok";
                            $_SESSION["id"] = $respuesta["id_usuario"];
                            $_SESSION["nombre"] = $respuesta["nombre"];
                            $_SESSION["apellidos"] = $respuesta["apellidos"];
                            $_SESSION["ruta"] = $respuesta["ruta"];
                            $_SESSION["rol"] = $respuesta["rol"];
                            $_SESSION["ultimoLogin"] = $respuesta["fecha_ingreso"];


                            /*===============================================
                             =   REGISTRAMOS LA FECHA EN LA QUE SE LOGEO   =
                            ==============================================*/

                            date_default_timezone_set('America/Lima');

                            $fecha = date('Y-m-d');

                            $hora = date('H:i:s');

                            $fechaActual = $fecha . ' ' . $hora;

                            $item1 = "fecha_ingreso";
                            $valor1 = $fechaActual;

                            $item2 = "id_usuario";
                            $valor2 = $respuesta["id_usuario"];

                            $lastLogin = ModelUsuarios::mdlActualizarHora($tabla, $item1, $valor1, $item2, $valor2);

                            if ($lastLogin == "ok") {

                                echo '<script>
                                        Swal.fire({
                                            position: "top-end",
                                            icon: "success",
                                            title: "Inicio de sesión exitoso",
                                            showConfirmButton: false,
                                            timer: 800
                                        }).then(function () {
                                            window.location = "inicio";
                                        });
                                </script>';
                            }
                        } else {

                            /*  echo "<script>
    
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Parece que tu cuenta esta desactivada, comunícate con el administrador para su activación!'
                            }).then(function(result) {
                                if (result.value) {
        
                                    history.back();
        
                                }
                            })
        
                            </script>"; */

                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Cuenta desactivada. 
                            <a href="#" class="text-dark saberMas" onclick="saberMas();">Saber Más</a>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        ';

                            return;
                        }
                    } else {

                       /*  echo "<script>
        
                        Swal.fire({
                            icon: 'error',
                            title: 'Hubo un error...',
                            text: 'Tu email o contraseña no coinciden!',
                        }).then(function(result) {
                            if (result.value) {
        
                                history.back();
        
                            }
                        })
        
                        </script>"; */

                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Tu email o contraseña no coinciden
                            <a href="#" class="text-dark saberMas" onclick="saberMasWarnign();">Saber Más</a>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';

                        return;
                    }
                } else {

                    echo "<script>
    
                            Swal.fire({
                                icon: 'error',
                                title: 'Hubo un error...',
                                text: 'El usuario no existe!',
                            }).then(function(result) {
                                if (result.value) {
    
                                    history.back();
    
                                }
                            })
    
                    </script>";
                }
            }
        }
    }


    static public function ctrActualizarUsuarios()
    {

        if (isset($_POST["editarUsuario"])) {

            if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])) {

                /*=====================================================
                =           VALIDAMOS LA IMAGEN                      =
                =====================================================*/

                $ruta = $_POST["fotoActual"];

                //insertamos la foto
                if (isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])) {


                    list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    /* creamos el nuevo directorio */
                    $directorio = "view/img/usuarios/" . $_POST["editarUsuario"];

                    if (!empty($_POST["fotoActual"])) {

                        unlink($_POST["fotoActual"]);
                    } else {

                        mkdir($directorio, 0755); /* permiso de escritura y lectura */
                        $rutaDefinida = "view/img/usuarios/";
                        $imgDefinida = "anonimo.jpg";
                        $rutaCompleta = $rutaDefinida . $imgDefinida;

                        if (file_exists($rutaCompleta)) {
                            unlink($rutaCompleta);
                        }
                    }

                    /* segun el tipo de foto */

                    if ($_FILES["editarFoto"]["type"] == "image/jpeg") {

                        /* guardamos la imagen para tentar */

                        $aleatorio = mt_rand(100, 999);

                        $ruta = "view/img/usuarios/" . $_POST["editarUsuario"] . "/" . $aleatorio . ".jpg";

                        /* para recortar la imgen o redimencionar */
                        $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);

                        /* NUEVAS DIMENCIONES */
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagejpeg($destino, $ruta);
                    }

                    if ($_FILES["editarFoto"]["type"] == "image/png") {

                        /* guardamos la imagen para tentar */

                        $aleatorio = mt_rand(100, 999);

                        $ruta = "view/img/usuarios/" . $_POST["editarUsuario"] . "/" . $aleatorio . ".png";

                        /* para recortar la imgen o redimencionar */
                        $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);

                        /* NUEVAS DIMENCIONES */
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                        imagepng($destino, $ruta);
                    }
                }

                $tabla = "usuarios";

                /*=====================================================
                =        SI EL USUARIO CAMBIA O NO SU PSSWORD        =
                =====================================================*/

                if ($_POST["editarPwd"] != "") {

                    if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarPwd"])) {

                        $encriptar = crypt($_POST["editarPwd"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                    } else {

                        echo "<script>

                                Swal.fire({
                                        icon: 'error',
                                        title: 'Corregir',
                                        text: 'Los datos no pueden ir vacíos o llevar caracteres especiales!'
                                    }).then(function(result) {
                                        if (result.value) {

                                            window.location = 'usuarios';

                                        }
                                    })

                            </script>";
                    }
                } else {

                    $encriptar = $_POST["pwdActual"];
                }

                /*=====================================================
                =                   RESPUESTA                        =
                =====================================================*/

                $datos = array(

                    "nombre" => $_POST["editarNombre"],
                    "apellidos" => $_POST["editarApellidos"],
                    "correo" => $_POST["editarCorreoElectronico"],
                    "password" => $encriptar,
                    "usuario" => $_POST["editarUsuario"],
                    "rol" => $_POST["editarRol"],
                    "ruta" => $ruta

                );

                $respuesta = ModelUsuarios::mdlActualizarUsuarios($tabla, $datos);


                if ($respuesta == "ok") {

                    echo "<script>

                        Swal.fire({
                            icon: 'success',
                            title: 'Correcto',
                            text: 'Los datos han sido modificados correctamente!'
                        }).then(function(result) {
                            if (result.value) {

                                window.location = 'carta-ofertas';

                            }
                        })
                        
                	</script>";
                }
            } else {

                echo "<script>
    
                        Swal.fire({
                                icon: 'error',
                                title: 'Corregir',
                                text: 'El nombre no puede ir vacio o llevar caracteres especiales!'
                            }).then(function(result) {
                                if (result.value) {
    
                                    window.location = 'usuarios';
    
                                }
                            })
                    </script>";
            }
        }
    }


    static public function ctrActualizarPerfil()
    {

        if (isset($_POST["editUsuario"])) {

            if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editNombre"])) {

                /*=====================================================
                =           VALIDAMOS LA IMAGEN                      =
                =====================================================*/

                /*   $ruta = $_POST["fotoActual"]; */

                $ruta = $_POST["fotoActual"];

                if ($_FILES["newFoto"]["tmp_name"] != "") {

                    //insertamos la foto
                    if (isset($_FILES["newFoto"]["tmp_name"]) && !empty($_FILES["newFoto"]["tmp_name"])) {


                        list($ancho, $alto) = getimagesize($_FILES["newFoto"]["tmp_name"]);

                        $nuevoAncho = 500;
                        $nuevoAlto = 500;

                        /* creamos el nuevo directorio */
                        $directorio = "view/img/usuarios/" . $_POST["editUsuario"];

                        if (!empty($_POST["fotoActual"])) {

                            unlink($_POST["fotoActual"]);
                        } else {

                            // Verificar si el directorio ya existe
                            if (!is_dir($directorio)) {
                                // Si no existe, entonces lo creamos
                                mkdir($directorio, 0755);
                            }

                            $rutaDefinida = "view/img/usuarios/";
                            $imgDefinida = "anonimo.jpg";
                            $rutaCompleta = $rutaDefinida . $imgDefinida;

                            if (file_exists($rutaCompleta)) {
                                unlink($rutaCompleta);
                            }
                        }

                        /* segun el tipo de foto */

                        if ($_FILES["newFoto"]["type"] == "image/jpeg") {

                            /* guardamos la imagen para tentar */

                            $aleatorio = mt_rand(100, 999);

                            $ruta = "view/img/usuarios/" . $_POST["editUsuario"] . "/" . $aleatorio . ".jpg";

                            /* para recortar la imgen o redimencionar */
                            $origen = imagecreatefromjpeg($_FILES["newFoto"]["tmp_name"]);

                            /* NUEVAS DIMENCIONES */
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                            imagejpeg($destino, $ruta);
                        }

                        if ($_FILES["newFoto"]["type"] == "image/png") {

                            /* guardamos la imagen para tentar */

                            $aleatorio = mt_rand(100, 999);

                            $ruta = "view/img/usuarios/" . $_POST["editUsuario"] . "/" . $aleatorio . ".png";

                            /* para recortar la imgen o redimencionar */
                            $origen = imagecreatefrompng($_FILES["newFoto"]["tmp_name"]);

                            /* NUEVAS DIMENCIONES */
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                            imagepng($destino, $ruta);
                        }
                    }
                } else {
                    echo "<script>
    
                    Swal.fire({
                            icon: 'error',
                            title: 'FOTO NO SELECCIONADA',
                            text: 'La foto tiene que ser reemplazada para actualizar!'
                        }).then(function(result) {
                            if (result.value) {

                                window.location = 'usuarios';

                            }
                        })
                    </script>";
                }



                $tabla = "usuarios";
                $encriptar = $_POST["passActual"];

                /*=====================================================
                =                   RESPUESTA                        =
                =====================================================*/

                $datos = array(

                    "nombre" => $_POST["editNombre"],
                    "apellidos" => $_POST["editApellidos"],
                    "correo" => $_POST["editCorreoElectronico"],
                    "password" => $encriptar,
                    "dni_usuarios" => $_POST["dni"],
                    "usuario" => $_POST["editUsuario"],
                    "rol" => $_POST["editRol"],
                    "ruta" => $ruta

                );

                $respuesta = ModelUsuarios::mdlActualizarPerfil($tabla, $datos);


                if ($respuesta == "ok") {

                    echo "<script>

                        Swal.fire({
                            icon: 'success',
                            title: 'Correcto',
                            text: 'Los datos han sido modificados correctamente!'
                        }).then(function(result) {
                            if (result.value) {

                                window.location = 'perfil';

                            }
                        })
                        
                	</script>";
                }
            } else {

                echo "<script>
    
                        Swal.fire({
                                icon: 'error',
                                title: 'Corregir',
                                text: 'El nombre no puede ir vacio o llevar caracteres especiales!'
                            }).then(function(result) {
                                if (result.value) {
    
                                    window.location = 'usuarios';
    
                                }
                            })
                    </script>";
            }
        }
    }

    static public function ctrEliminarUsuario()
    {

        if (isset($_GET["idUsuario"])) {

            $tabla = "usuarios";

            $datos = $_GET["idUsuario"];

            $respuesta = ModelUsuarios::mdlEliminarUsuario($tabla, $datos);

            if ($respuesta == "ok") {

                echo "<script>

					Swal.fire({
							icon: 'success',
							title: 'Eliminado',
							text: '¡El usuario ha sido eliminado correctamente!'
					}).then(function(result) {
						if (result.value) {

							window.location = 'usuarios';

						}
					})

                </script>";
            }
        }
    }
}
