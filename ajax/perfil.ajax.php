<?php

require_once '../controller/usuarios.controller.php';
require_once '../model/usuarios.model.php';
require_once '../model/conexion.php';

class PerfilAjax
{

    public $idPerfil;

    public function ajaxMostrarPerfiles()
    {

        $item = "id_usuario";
        $valor = $this->idPerfil;

        $respuesta = ControllerUser::ctrMostrarUsuarios($item, $valor);

        echo json_encode($respuesta); // lo transforma en formato json 

        /* print_r($respuesta);
        var_dump($respuesta); */
    }
}

/*=====================================================
=            SACAR EL ID PARA EDITAR                 =
=====================================================*/

if (isset($_POST["idPerfil"])) {

    $editarPerfil = new PerfilAjax();
    $editarPerfil -> idPerfil = $_POST["idPerfil"];
    $editarPerfil->ajaxMostrarPerfiles();
}
