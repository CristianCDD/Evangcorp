<?php

require_once 'conexion.php';

class ModelAsistencia
{
    static public function mdlMostrarUsuarios($tabla, $item, $valor)
    {
        if ($item != null && $valor != null) {
            $stmt = Conexion::conectar()->prepare("SELECT usuarios.id_usuario, usuarios.nombre, usuarios.apellidos, asistencia.fecha FROM asistencia INNER JOIN usuarios ON asistencia.id_usuario = usuarios.id_usuario WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();

            return $stmt->fetchAll();
        }
    }

    public static function mdlObtenerIdAsistencia($tabla, $id_usuario, $fecha)
    {
        $stmt = Conexion::conectar()->prepare("SELECT id FROM $tabla WHERE id_usuario = :id_usuario AND fecha = :fecha");
        $stmt->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
        $stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);
        $stmt->execute();
        $resultado = $stmt->fetch();
        return $resultado ? $resultado['id'] : false;
    }

    public static function mdlMarcarEntrada($tabla, $datos)
    {
        $conn = Conexion::conectar();
        $stmt = $conn->prepare("INSERT INTO $tabla (id_usuario, fecha) VALUES (:id_usuario, :fecha)");

        $stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);
        $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return $conn->lastInsertId();
        } else {
            return print_r($conn->errorInfo(), true);
        }
    }

    public static function mdlRegistrarDetalleAsistencia($tabla, $datos)
    {
        $conn = Conexion::conectar();
        $stmt = $conn->prepare("INSERT INTO $tabla (id_asistencia, hora, ubicacion) VALUES (:id_asistencia, :hora, :ubicacion)");

        $stmt->bindParam(":id_asistencia", $datos["id_asistencia"], PDO::PARAM_INT);
        $stmt->bindParam(":hora", $datos["hora"], PDO::PARAM_STR);
        $stmt->bindParam(":ubicacion", $datos["ubicacion"], PDO::PARAM_STR);

        $stmt->execute();
    }

    public static function mdlUpdateCoordinates($tabla, $datos)
    {
        $conn = Conexion::conectar();
        $stmt = $conn->prepare("UPDATE $tabla SET ubicacion = :ubicacion WHERE id = :id");

        $stmt->bindParam(":ubicacion", $datos["ubicacion"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        $stmt->execute();
    }

    public static function mdlMarcarSalida($id, $hora_salida)
    {
        return "Funcionalidad deshabilitada.";
    }

    static public function mdlMostrarInner()
    {
        $stmt = Conexion::conectar()->prepare("SELECT asistencia.id, asistencia.fecha, detalle_asistencia.hora, detalle_asistencia.ubicacion, usuarios.nombre, usuarios.apellidos FROM asistencia INNER JOIN detalle_asistencia ON asistencia.id = detalle_asistencia.id_asistencia INNER JOIN usuarios ON asistencia.id_usuario = usuarios.id_usuario");

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function mdlMostrarHistorialAsistenciaPorId($id_asistencia)
    {
        $stmt = Conexion::conectar()->prepare("SELECT asistencia.id, asistencia.id_usuario, asistencia.fecha, detalle_asistencia.hora, detalle_asistencia.ubicacion, usuarios.nombre FROM asistencia INNER JOIN detalle_asistencia ON asistencia.id = detalle_asistencia.id_asistencia INNER JOIN usuarios ON asistencia.id_usuario = usuarios.id_usuario WHERE asistencia.id = :id_asistencia");
        $stmt->bindParam(":id_asistencia", $id_asistencia, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function mdlMostrarHistorialAsistencia($id_usuario)
    {
        $stmt = Conexion::conectar()->prepare("SELECT asistencia.id, asistencia.fecha, detalle_asistencia.hora, detalle_asistencia.ubicacion, usuarios.nombre, usuarios.apellidos FROM asistencia INNER JOIN detalle_asistencia ON asistencia.id = detalle_asistencia.id_asistencia INNER JOIN usuarios ON asistencia.id_usuario = usuarios.id_usuario WHERE asistencia.id_usuario = :id_usuario AND asistencia.fecha = CURRENT_DATE;");
        $stmt->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>
