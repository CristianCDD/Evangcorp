<?php
require_once __DIR__ . '/../model/asistencia.model.php';

class ControllerAsistencia
{
    static public function ctrMostrarAsistenciaConUsuarios($item, $valor)
    {
        $tabla = "asistencia";
        $respuesta = ModelAsistencia::mdlMostrarUsuarios($tabla, $item, $valor);
        return $respuesta;
    }

    static public function ctrMostrarInner()
    {
        return ModelAsistencia::mdlMostrarInner();
    }

    public static function ctrMarcarEntrada($id_usuario)
    {
        date_default_timezone_set('America/Lima');
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');

        $datos = array(
            "id_usuario" => $id_usuario,
            "fecha" => $fecha,
            "hora_entrada" => $hora
        );

        $respuesta = ModelAsistencia::mdlMarcarEntrada("asistencia", $datos);
        return $respuesta;
    }

    public static function ctrUpdateCoordinates($id, $ubicacion)
    {
        $tabla = "asistencia";
        $datos = array(
            "id" => $id,
            "ubicacion" => $ubicacion
        );

        ModelAsistencia::mdlUpdateCoordinates($tabla, $datos);
    }

    public static function ctrMarcarSalida($id)
    {
        return "Funcionalidad deshabilitada.";
    }
}
?>
