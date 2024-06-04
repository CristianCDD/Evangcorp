<?php

class ControllerValidaciones
{

    static public function ctrMostrarValidaciones($item, $valor)
    {

        //tabla
        $tabla = "validaciones";

        //inicio conexion
        $respuesta = ModelValidaciones::mdlMostrarValidaciones($tabla, $item, $valor);

        return $respuesta;
    }

    static public function ctrAgregarValidaciones()
    {

        if (isset($_POST["registroRuc"])) {

            if (
                preg_match('/^\d+$/', $_POST["registroRuc"])
            ) {

                if (!empty($_FILES["nuevoPDF"]["name"] && $_FILES["nuevoVoucher"]["tmp_name"])) {

                    if (isset($_FILES["nuevoPDF"]["name"]) && !empty($_FILES["nuevoPDF"]["name"])) {

                        // Verificar si es un PDF por la extensión del archivo
                        $extension = strtolower(pathinfo($_FILES["nuevoPDF"]["name"], PATHINFO_EXTENSION));
                        if ($extension != "pdf") {
                            echo "<script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Por favor, seleccione un archivo PDF válido.'
                                }).then(function(result) {
                                    if (result.value) {
                                        window.location = 'usuarios';
                                    }
                                });
                            </script>";
                            return; // Detener la ejecución si no es un PDF
                        }

                        // Carpeta donde deseas guardar los archivos PDF
                        $carpeta_destino = "view/documents/pdf/";

                        // Creamos el nuevo directorio si no existe
                        if (!file_exists($carpeta_destino)) {
                            mkdir($carpeta_destino, 0755, true); // Crea el directorio recursivamente
                        }

                        // Nombre del archivo y ruta completa en la carpeta destino
                        $nombre_archivo = $_FILES["nuevoPDF"]["name"];
                        $ruc = $_POST["registroRuc"];
                        $directorio = $carpeta_destino . $ruc . "/";
                        if (!file_exists($directorio)) {
                            mkdir($directorio, 0755, true); // Crea el directorio recursivamente
                        }
                        $ruta_archivo = $directorio . $nombre_archivo;

                        // Guardamos el archivo
                        if (!move_uploaded_file($_FILES["nuevoPDF"]["tmp_name"], $ruta_archivo)) {
                            // Hubo un error al mover el archivo
                            echo "<script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Hubo un error al subir el archivo PDF. Inténtalo de nuevo.'
                                }).then(function(result) {
                                    if (result.value) {
                                        window.location = 'registrar-validaciones';
                                    }
                                });
                            </script>";
                        }


                        /* move_uploaded_file($_FILES["nuevoPDF"]["tmp_name"], $ruta_archivo); */
                    } else {
                        // Hubo un error al mover el archivo
                        echo "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Hubo un error al subir el archivo PDF. Inténtalo de nuevo.'
                            }).then(function(result) {
                                if (result.value) {
                                    window.location = 'registrar-validaciones';
                                }
                            });
                        </script>";
                    }


                    $voucherNombre = $_FILES["nuevoVoucher"]["tmp_name"];
                    $rutaVoucher = "view/documents/voucher/";

                    //insertamos la foto
                    if (!empty($voucherNombre)) {

                        if (isset($voucherNombre)) {

                            list($ancho, $alto) = getimagesize($voucherNombre);

                            $nuevoAncho = 500;
                            $nuevoAlto = 500;

                            // Creamos el directorio si no existe
                            $directorio = $rutaVoucher . $_POST["registroRuc"] . "/";
                            if (!file_exists($directorio)) {
                                mkdir($directorio, 0755, true); // true para crear directorios recursivamente
                            }

                            // Nombre del archivo
                            $aleatorio = mt_rand(100, 999);
                            $nombreArchivo = $aleatorio . ".jpg";

                            // Ruta completa del archivo
                            $ruta = $directorio . $nombreArchivo;

                            // Según el tipo de foto
                            if ($_FILES["nuevoVoucher"]["type"] == "image/jpeg") {

                                // Redimensionamos y guardamos la imagen
                                $origen = imagecreatefromjpeg($voucherNombre);
                                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                                imagejpeg($destino, $ruta);

                                // Libera memoria
                                imagedestroy($origen);
                                imagedestroy($destino);
                            }
                        }
                    } else {

                        // Muestra un mensaje de error si no se seleccionó ninguna imagen
                        echo "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'INCORRECTO',
                                text: 'Ingresar el voucher es obligatorio!'
                            }).then(function(result) {
                                if (result.value) {
                                    window.location = 'registrar-validaciones';
                                }
                            });
                        </script>";
                    }
                } else {

                    echo "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'CAMPOS VACIOS',
                                text: 'Ingresar el voucher Y Carta oferta es obligatorio!'
                            }).then(function(result) {
                                if (result.value) {
                                    window.location = 'registrar-validaciones';
                                }
                            });
                    </script>";

                    return;
                }

                $tabla = "validaciones";

                $datos = array(
                    "ruc" => $_POST["registroRuc"],
                    "nombres_ruc" => $_POST["registrarNombreRuc"],
                    "llamada_validadora" => $_POST["horaValidadora"],
                    "duracion_llamada" => $_POST["duracionLlamada"],
                    "activacion_pos" => $_POST["horaActivacionPos"],
                    "vaucher_culqi" => $ruta,
                    "carta_oferta" => $ruta_archivo
                );

                //creamos la respuesta

                $respuesta = ModelValidaciones::mdlAgregarValidaciones($tabla, $datos);

                if ($respuesta == "ok") {
                    echo "<script>

                        Swal.fire({
                            icon: 'success',
                            title: 'Correcto',
                            text: 'Los datos han sido guardado correctamente!'
                        }).then(function(result) {
                            if (result.value) {

                                window.location = 'registrar-validaciones';

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

                                window.location = 'registrar-validaciones';

                            }
                        })
                </script>";

                return;
            }
        }
    }

    static public function ctrActualizarValidaciones()
    {
        if (isset($_POST["editarRuc"])) {

            $ruta_archivo = $_POST["actualPdf"];

            $ruta = $_POST["vaucherActual"];

            if (isset($_FILES["editarPdf"]["name"]) && !empty($_FILES["editarPdf"]["name"])) {
                // Procesar la subida del nuevo archivo PDF

                // Verificar si es un PDF por la extensión del archivo
                $extension = strtolower(pathinfo($_FILES["editarPdf"]["name"], PATHINFO_EXTENSION));

                if ($extension != "pdf") {
                    echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Por favor, seleccione un archivo PDF válido.'
                        }).then(function(result) {
                            if (result.value) {
                                window.location = 'usuarios';
                            }
                        });
                    </script>";
                    return; // Detener la ejecución si no es un PDF
                }

                // Carpeta donde deseas guardar los archivos PDF
                $carpeta_destino = "view/documents/pdf/";

                // Nombre del archivo y ruta completa en la carpeta destino
                $nombre_archivo = $_FILES["editarPdf"]["name"];
                $ruc = $_POST["editarRuc"];
                $directorio = $carpeta_destino . $ruc . "/";
                if (!file_exists($directorio)) {
                    mkdir($directorio, 0755, true); // Crea el directorio recursivamente
                }
                $ruta_archivo = $directorio . $nombre_archivo;

                // Guardamos el archivo
                if (!move_uploaded_file($_FILES["editarPdf"]["tmp_name"], $ruta_archivo)) {
                    // Hubo un error al mover el archivo
                    echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Hubo un error al subir el archivo PDF. Inténtalo de nuevo.'
                        }).then(function(result) {
                            if (result.value) {
                                window.location = 'registrar-validaciones';
                            }
                        });
                    </script>";
                    return; // Detener la ejecución si hubo un error
                }
            }


            if (isset($_FILES["editarVaucher"]["tmp_name"]) && !empty($_FILES["editarVaucher"]["tmp_name"])) {
                // Procesar la subida del nuevo vaucher

                $rutaVoucher = "view/documents/voucher/";

                // Creamos el directorio si no existe
                $directorio = $rutaVoucher . $_POST["editarRuc"] . "/";
                if (!file_exists($directorio)) {
                    mkdir($directorio, 0755, true); // true para crear directorios recursivamente
                }

                // Nombre del archivo
                $aleatorio = mt_rand(100, 999);
                $nombreArchivo = $aleatorio . ".jpg";

                // Ruta completa del archivo
                $ruta = $directorio . $nombreArchivo;

                // Según el tipo de foto
                if ($_FILES["editarVaucher"]["type"] == "image/jpeg") {

                    // Redimensionamos y guardamos la imagen
                    list($ancho, $alto) = getimagesize($_FILES["editarVaucher"]["tmp_name"]);
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;
                    $origen = imagecreatefromjpeg($_FILES["editarVaucher"]["tmp_name"]);
                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                    imagejpeg($destino, $ruta);
                }
            }

            $tabla = "validaciones";

            $datos = array(
                "ruc" => $_POST["editarRuc"],
                "llamada_validadora" => $_POST["editarHoraLlamadaValidadora"],
                "duracion_llamada" => $_POST["editarDuracionLlamada"],
                "activacion_pos" => $_POST["editarHoraActivacionPos"],
                "vaucher_culqi" => $ruta,
                "carta_oferta" => $ruta_archivo
            );

            // Actualizar los datos en la base de datos
            $respuesta = ModelValidaciones::mdlActualizarValidaciones($tabla, $datos);

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
                    });
                </script>";
            }
        }
    }



    static public function ctrEliminarValidacicones()
    {
        if (isset($_GET["idValidaciones"])) {

            $tabla = "validaciones";

            $datos = $_GET["idValidaciones"];

            $respuesta = ModelValidaciones::mdlEliminarValidacicones($tabla, $datos);

            if ($respuesta == "ok") {

                echo "<script>

					Swal.fire({
							icon: 'success',
							title: 'Eliminado',
							text: '¡El usuario ha sido eliminado correctamente!'
					}).then(function(result) {
						if (result.value) {

							window.location = 'carta-ofertas';

						}
					})

                </script>";

                return;
            }
        }
    }
}
