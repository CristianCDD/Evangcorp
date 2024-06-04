<?php

class ModelValidaciones
{

    static public function mdlMostrarValidaciones($tabla, $item, $valor)
    {

        if ($item != null && $valor != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            //bind parama
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            //ejecutamos la accion
            $stmt->execute();

            //retornamos la respuesta
            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            //ejecutamos la accion
            $stmt->execute();

            //retornamos la respuesta
            return $stmt->fetchAll();
        }
    }

    static public function mdlAgregarValidaciones($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO $tabla (ruc, nombres_ruc, 
            llamada_validadora, duracion_llamada, activacion_pos, 
            vaucher_culqi, carta_oferta) 
            VALUES(:ruc ,:nombres_ruc, 
            :llamada_validadora, :duracion_llamada, 
            :activacion_pos, :vaucher_culqi,
             :carta_oferta)"
        );

        //sanatizacion de datos
        $stmt->bindParam(":ruc", $datos["ruc"], PDO::PARAM_STR);
        $stmt->bindParam(":nombres_ruc", $datos["nombres_ruc"], PDO::PARAM_STR);
        $stmt->bindParam(":llamada_validadora", $datos["llamada_validadora"], PDO::PARAM_STR);
        $stmt->bindParam(":duracion_llamada", $datos["duracion_llamada"], PDO::PARAM_STR);
        $stmt->bindParam(":activacion_pos", $datos["activacion_pos"], PDO::PARAM_STR);
        $stmt->bindParam(":vaucher_culqi", $datos["vaucher_culqi"], PDO::PARAM_STR);
        $stmt->bindParam(":carta_oferta", $datos["carta_oferta"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return print_r(Conexion::conectar()->errorInfo());
        }
    }

    static public function mdlActualizarValidaciones($tabla, $datos)
    {

        //preparamos la conexion
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
        llamada_validadora = :llamada_validadora,
        duracion_llamada = :duracion_llamada,
        activacion_pos = :activacion_pos,
        vaucher_culqi = :vaucher_culqi,
        carta_oferta = :carta_oferta
        WHERE ruc = :ruc");

        $stmt->bindParam(":llamada_validadora", $datos["llamada_validadora"], PDO::PARAM_STR);
        $stmt->bindParam(":duracion_llamada", $datos["duracion_llamada"], PDO::PARAM_STR);
        $stmt->bindParam(":activacion_pos", $datos["activacion_pos"], PDO::PARAM_STR);
        $stmt->bindParam(":vaucher_culqi", $datos["vaucher_culqi"], PDO::PARAM_STR);
        $stmt->bindParam(":carta_oferta", $datos["carta_oferta"], PDO::PARAM_STR);
        $stmt->bindParam(":ruc", $datos["ruc"], PDO::PARAM_STR);
        /*         $stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_STR);*/

        if ($stmt->execute()) {
            return "ok";
        } else {
            return print_r(Conexion::conectar()->errorInfo());
        }
    }

    static public function mdlEliminarValidacicones($tabla, $datos)
    {
        //conexion
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_validaciones = :id_validaciones");

        $stmt->bindParam(":id_validaciones", $datos, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return print_r(Conexion::conectar()->errorInfo());
        };
    }
}
