<?php

require_once '../controller/asistencia.controller.php';
session_start();

class AsistenciaAjax
{
    public $id;
    public $latitude;
    public $longitude;

    public function ajaxMarcarEntrada() {
        if (isset($_SESSION["id"])) {
            $id_usuario = $_SESSION["id"];
            $id_asistencia = ControllerAsistencia::ctrMarcarEntrada($id_usuario);
            if ($id_asistencia === "limit_reached") {
                echo "limit_reached";
            } else {
                echo $id_asistencia;
            }
        } else {
            echo "Usuario no autenticado.";
        }
    }
    

    public function ajaxObtenerHistorialAsistencia()
    {
        if (isset($_POST["id_usuario"])) {
            $id_usuario = $_POST["id_usuario"];
            $respuesta = ControllerAsistencia::ctrMostrarHistorialAsistencia($id_usuario);
            echo json_encode($respuesta);
        } else {
            echo "ID de usuario no proporcionado.";
        }
    }

    public function ajaxUpdateCoordinates()
    {
        if (isset($this->id) && isset($this->latitude) && isset($this->longitude)) {
            $ubicacion = "https://www.google.com/maps/search/?api=1&query=" . $this->latitude . "," . $this->longitude;
            ControllerAsistencia::ctrRegistrarDetalleAsistencia($this->id, $ubicacion);
            echo "Coordenadas actualizadas.";
        } else {
            echo "Datos incompletos.";
        }
    }

    public function ajaxMarcarSalida()
    {
        echo "Funcionalidad deshabilitada.";
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
                echo "Funcionalidad deshabilitada.";
                break;
            
                case 'obtenerHistorialAsistencia':
                    $asistenciaAjax->ajaxObtenerHistorialAsistencia();
                    break;

            default:
                echo "Acción no válida.";
                break;

                case 'obtenerHistorialAsistenciaPorId':
                    if (isset($_POST["id_asistencia"])) {
                        $id_asistencia = $_POST["id_asistencia"];
                        $respuesta = ControllerAsistencia::ctrMostrarHistorialAsistenciaPorId($id_asistencia);
                        echo json_encode($respuesta);
                    } else {
                        echo "ID de asistencia no proporcionado.";
                    }
                    break;
                
        }
    } else {
        echo "Acción no especificada.";
    }
}