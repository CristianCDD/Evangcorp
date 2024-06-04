<?php

class ModelUsuarios
{

    //funcion para mostrar usuarios
    static public function mdlMostrarUsuarios($tabla, $item, $valor)
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

    static public function mdlMostrarInner()
    {
        $stmt = Conexion::conectar()->prepare("SELECT usuarios.id_usuario, usuarios.nombre, usuarios.apellidos, asistencia.fecha, asistencia.hora_entrada, asistencia.hora_salida, asistencia.ubicacion 
                                               FROM asistencia 
                                               INNER JOIN usuarios ON asistencia.id_usuario = usuarios.id_usuario");

        $stmt->execute();

        // Retornar todos los registros
        return $stmt->fetchAll();
    }

    //funcion para agregar usuarios
    static public function mdlAgregarUsuario($tabla, $datos)
    {

        //iniciamos la conexion

        if ($stmt = Conexion::conectar()->prepare(
            "INSERT INTO $tabla (dni_usuarios, usuario, nombre, apellidos, correo, password, rol, ruta) 
            VALUES(:dni_usuarios, :usuario ,:nombre, :apellidos, :correo, :password, :rol, :ruta)"
        )) {
            //sanatizacion de datos
            $stmt->bindParam(":dni_usuarios", $datos["dni_usuarios"], PDO::PARAM_STR);
            $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
            $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
            $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
            $stmt->bindParam(":rol", $datos["rol"], PDO::PARAM_STR);
            $stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return print_r(Conexion::conectar()->errorInfo());
            }
        } else if ($stmt = Conexion::conectar()->prepare(
            "INSERT INTO $tabla (usuario, nombre, apellidos, correo, password, ruta) 
            VALUES(:usuario ,:nombre, :apellidos, :correo, :password, :ruta)"
        )) {

            //sanatizacion de datos
            $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
            $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
            $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
            $stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return print_r(Conexion::conectar()->errorInfo());
            }
        } else {

            $stmt = Conexion::conectar()->prepare(
                "INSERT INTO $tabla (usuario, nombre, apellidos, correo, password, rol, ruta) 
                VALUES(:usuario ,:nombre, :apellidos, :correo, :password, :rol, :ruta)"
            );


            /* insignica evang */
            /* $insignia = "EVA";
            $postUser = $datos["usuario"];
            $marcaEvang = $insignia . $postUser; */

            //sanatizacion de datos
            $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
            $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
            $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
            $stmt->bindParam(":rol", $datos["rol"], PDO::PARAM_STR);
            $stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);


            if ($stmt->execute()) {
                return "ok";
            } else {
                return print_r(Conexion::conectar()->errorInfo());
            }
        }
    }


    //generar usuario rapid



    static public function mdlActualizarUsuarios($tabla, $datos)
    {
        //preparamos la conexion
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
        nombre = :nombre,
        apellidos = :apellidos,
        correo = :correo,
        password = :password,
        rol = :rol,
        ruta = :ruta
        WHERE usuario = :usuario");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":rol", $datos["rol"], PDO::PARAM_STR);
        $stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
        /*         $stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_STR);*/

        if ($stmt->execute()) {
            return "ok";
        } else {
            return print_r(Conexion::conectar()->errorInfo());
        }
    }

    static public function mdlActualizarPerfil($tabla, $datos)
    {
        //preparamos la conexion
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
        nombre = :nombre,
        apellidos = :apellidos,
        dni_usuarios = :dni_usuarios,
        correo = :correo,
        password = :password,
        rol = :rol,
        ruta = :ruta
        WHERE usuario = :usuario");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
        $stmt->bindParam(":dni_usuarios", $datos["dni_usuarios"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":rol", $datos["rol"], PDO::PARAM_STR);
        $stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
        /*         $stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_STR);*/

        if ($stmt->execute()) {
            return "ok";
        } else {
            return print_r(Conexion::conectar()->errorInfo());
        }
    }



    static public function mdlActualizarHora($tabla, $item1, $valor1, $item2, $valor2)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return print_r(Conexion::conectar()->errorInfo());
        }
    }

    static public function mdlEliminarUsuario($tabla, $datos)
    {

        //conexion
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_usuario = :id_usuario");

        $stmt->bindParam(":id_usuario", $datos, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return print_r(Conexion::conectar()->errorInfo());
        };
    }
}
