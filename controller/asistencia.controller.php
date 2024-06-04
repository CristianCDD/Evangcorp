<?php
require_once __DIR__ . '/../model/asistencia.model.php';

class ControllerAsistencia
{
    static public function ctrMostrarAsistenciaConUsuarios($item, $valor)
    {
        $tabla = "asistencia";
        $respuesta = ModelUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);
        return $respuesta;
    }

    static public function ctrMostrarInner()
    {
        return ModelUsuarios::mdlMostrarInner();
    }

    public static function ctrMarcarEntrada($id_usuario)
    {
        date_default_timezone_set('America/Lima');
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');

        $datos = array(
            "id_usuario" => $id_usuario,
            "fecha" => $fecha,
            "hora_entrada" => $hora,
            "hora_salida" => $hora
        );

        $respuesta = ModelAsistencia::mdlMarcarEntrada("asistencia", $datos);
        return $respuesta;
    }

    public static function ctrUpdateCoordinates($id, $latitude, $longitude, $ubicacion)
    {
        $tabla = "asistencia";
        $datos = array(
            "id" => $id,
            "latitude" => $latitude,
            "longitude" => $longitude,
            "ubicacion" => $ubicacion
        );

        $respuesta = ModelAsistencia::mdlUpdateCoordinates($tabla, $datos);
        return $respuesta;
    }

    public static function ctrMarcarSalida($id)
    {
        date_default_timezone_set('America/Lima');
        $hora_salida = date('H:i:s');

        $respuesta = ModelAsistencia::mdlMarcarSalida($id, $hora_salida);
        return $respuesta;
    }
}
