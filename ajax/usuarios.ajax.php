<?php

require_once '../controller/usuarios.controller.php';
require_once '../model/usuarios.model.php';
require_once '../model/conexion.php';


class UsuariosAjax
{
    public $idUsuario;

    public function ajaxEditarUsuarios()
    {

        $item = "id_usuario";
        $valor = $this->idUsuario;

        $respuesta = ControllerUser::ctrMostrarUsuarios($item, $valor);

        echo json_encode($respuesta); // lo transforma en formato json 

        /* print_r($respuesta);
        var_dump($respuesta); */
    }

    public $activarId;
    public $estadoUsuario;


    public function ajaxActivarUsuario()
    {
        $tabla = "usuarios";
        $item1 = "estado";
        $valor1 = $this->estadoUsuario;

        $item2 = "id_usuario";
        $valor2 = $this->activarId;

        $respuesta = ModelUsuarios::mdlActualizarHora($tabla, $item1, $valor1, $item2, $valor2);
    }   

    /* validar coincidencia de usuario con js */

    public $dniConsulta;

    public function ajaxValidarUsuario()
    {

        $item = "dni_usuarios";
        $valor = $this->dniConsulta;

        $respuesta = ControllerUser::ctrMostrarUsuarios($item, $valor);

        echo json_encode($respuesta);
    }

}

/*=====================================================
=            SACAR EL ID PARA EDITAR                 =
=====================================================*/

if (isset($_POST["idUsuario"])) {

    $editar = new UsuariosAjax();
    $editar->idUsuario = $_POST["idUsuario"];
    $editar->ajaxEditarUsuarios();
}

/*=====================================================
=         ACTIVAR Y DESACTIVAR USUARIO               =
=====================================================*/

if (isset($_POST["estadoUsuario"])) {

    $activarUsuario = new UsuariosAjax();
    $activarUsuario->estadoUsuario = $_POST["estadoUsuario"];
    $activarUsuario->activarId = $_POST["activarId"];

    $activarUsuario->ajaxActivarUsuario();
}

/*=====================================================
=       VALIDAR SI EL USUARIO YA ESTA EN LA BD       =
=====================================================*/

if (isset($_POST["dniConsulta"])) {

    $valDni = new UsuariosAjax();
    $valDni->dniConsulta = $_POST["dniConsulta"];

    $valDni->ajaxValidarUsuario();
}
