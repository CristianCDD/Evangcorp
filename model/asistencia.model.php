<?php

require_once 'conexion.php';

class ModelAsistencia
{
    static public function mdlMostrarUsuarios($tabla, $item, $valor)
    {
        if ($item != null && $valor != null) {
            $stmt = Conexion::conectar()->prepare("SELECT usuarios.id_usuario, usuarios.nombre, usuarios.apellidos, asistencia.fecha, asistencia.hora_entrada FROM asistencia INNER JOIN usuarios ON asistencia.id_usuario = usuarios.id_usuario WHERE $item = :$item");

            // Bind parameter
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            // Ejecutamos la acción
            $stmt->execute();

            // Retornamos la respuesta
            return $stmt->fetchAll(); // Cambiado a fetchAll para obtener múltiples filas
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            // Ejecutamos la acción
            $stmt->execute();

            // Retornamos la respuesta
            return $stmt->fetchAll();
        }
    }

    // Método para marcar la entrada
    public static function mdlMarcarEntrada($tabla, $datos)
    {
        // Conexión a la base de datos
        $conn = Conexion::conectar();
        $stmt = $conn->prepare("INSERT INTO $tabla (id_usuario, fecha, hora_entrada) VALUES (:id_usuario, :fecha, :hora_entrada)");

        // Vinculando los parámetros
        $stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);
        $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
        $stmt->bindParam(":hora_entrada", $datos["hora_entrada"], PDO::PARAM_STR);

        // Ejecutando la consulta y retornando la respuesta
        if ($stmt->execute()) {
            return $conn->lastInsertId(); // Retornar el último ID insertado
        } else {
            return print_r($conn->errorInfo(), true);
        }
    }

    // Método para actualizar la ubicación
    public static function mdlUpdateCoordinates($tabla, $datos)
    {
        // Conexión a la base de datos
        $conn = Conexion::conectar();
        $stmt = $conn->prepare("UPDATE $tabla SET ubicacion = :ubicacion WHERE id = :id");

        // Vinculando los parámetros
        $stmt->bindParam(":ubicacion", $datos["ubicacion"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        // Ejecutando la consulta
        $stmt->execute();
    }

    // Método para marcar la salida
    public static function mdlMarcarSalida($id, $hora_salida)
    {
        return "Funcionalidad deshabilitada.";
    }

    // Método para mostrar datos con INNER JOIN
    static public function mdlMostrarInner()
    {
        $stmt = Conexion::conectar()->prepare("SELECT usuarios.id_usuario, usuarios.nombre, usuarios.apellidos, asistencia.fecha, asistencia.hora_entrada FROM asistencia INNER JOIN usuarios ON asistencia.id_usuario = usuarios.id_usuario");

        $stmt->execute();

        // Retornar todos los registros
        return $stmt->fetchAll();
    }
}
?>
