<?php

require_once '../controller/asistencia.controller.php';
session_start();

class AsistenciaAjax
{
    public $id;
    public $latitude;
    public $longitude;

    public function ajaxMarcarEntrada()
    {
        if (isset($_SESSION["id"])) {
            $id_usuario = $_SESSION["id"];
            $respuesta = ControllerAsistencia::ctrMarcarEntrada($id_usuario);
            echo $respuesta;
        } else {
            echo "Usuario no autenticado.";
        }
    }

    public function ajaxUpdateCoordinates()
{
    $id = $this->id;
    $latitude = $this->latitude;
    $longitude = $this->longitude;
    $ubicacion = "https://www.google.com/maps/search/?api=1&query=" . $latitude . "," . $longitude;
    $respuesta = ControllerAsistencia::ctrUpdateCoordinates($id, $latitude, $longitude, $ubicacion);
    echo $respuesta;
}

    

    public function ajaxMarcarSalida()
    {
        if (isset($this->id)) {
            $respuesta = ControllerAsistencia::ctrMarcarSalida($this->id);
            echo $respuesta;
        } else {
            echo "ID de usuario no especificado.";
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["action"])) {
        $asistenciaAjax = new AsistenciaAjax();

        switch ($_POST["action"]) {
            case 'marcarEntrada':
                $asistenciaAjax->ajaxMarcarEntrada();
                break;

            case 'updateCoordinates':
                if (isset($_POST["id"]) && isset($_POST["latitude"]) && isset($_POST["longitude"])) {
                    $asistenciaAjax->id = $_POST["id"];
                    $asistenciaAjax->latitude = $_POST["latitude"];
                    $asistenciaAjax->longitude = $_POST["longitude"];
                    $asistenciaAjax->ajaxUpdateCoordinates();
                } else {
                    echo "Datos incompletos.";
                }
                break;

            case 'marcarSalida':
                if (isset($_POST["id"])) {
                    $asistenciaAjax->id = $_POST["id"];
                    $asistenciaAjax->ajaxMarcarSalida();
                } else {
                    echo "ID no especificado.";
                }
                break;

            default:
                echo "Acción no válida.";
                break;
        }
    } else {
        echo "Acción no especificada.";
    }
}
?>
