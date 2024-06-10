<?php
require_once __DIR__  . '/../model/asistencia.model.php';

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

        // Verificar si ya existe una entrada para el usuario y la fecha
        $id_asistencia = ModelAsistencia::mdlObtenerIdAsistencia("asistencia", $id_usuario, $fecha);

        if (!$id_asistencia) {
            // Si no existe, crear una nueva entrada
            $datos = array(
                "id_usuario" => $id_usuario,
                "fecha" => $fecha
            );
            $id_asistencia = ModelAsistencia::mdlMarcarEntrada("asistencia", $datos);
        }

        return $id_asistencia;
    }

    public static function ctrRegistrarDetalleAsistencia($id_asistencia, $ubicacion)
    {
        date_default_timezone_set('America/Lima');
        $hora = date('H:i:s');

        $datos = array(
            "id_asistencia" => $id_asistencia,
            "hora" => $hora,
            "ubicacion" => $ubicacion
        );

        ModelAsistencia::mdlRegistrarDetalleAsistencia("detalle_asistencia", $datos);
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

    public static function ctrMostrarHistorialAsistenciaPorId($id_asistencia)
    {
        return ModelAsistencia::mdlMostrarHistorialAsistenciaPorId($id_asistencia);
    }

    public static function ctrMostrarHistorialAsistencia($id_usuario)
    {
        return ModelAsistencia::mdlMostrarHistorialAsistencia($id_usuario);
    }
    
}
?>
