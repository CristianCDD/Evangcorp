<?php

require_once '../controller/validaciones.controller.php';
require_once '../model/validaciones.model.php';
require_once '../model/conexion.php';


class ValidacionesAjax{
    public $idValidaciones;

    public function ajaxEditarValidaciones()
    {

        $item = "id_validaciones";
        $valor = $this->idValidaciones;

        $respuesta = ControllerValidaciones::ctrMostrarValidaciones($item, $valor);

        echo json_encode($respuesta); // lo transforma en formato json 

        /* print_r($respuesta);
        var_dump($respuesta); */
    }

    public $rucConsulta;

    public function ajaxValidarRuc()
    {
        $item = "ruc";
        $valor = $this->rucConsulta;

        $respuesta = ControllerValidaciones::ctrMostrarValidaciones($item, $valor);

        echo json_encode($respuesta);
    }

}

/*=====================================================
=            SACAR EL ID PARA EDITAR                 =
=====================================================*/

if (isset($_POST["idValidaciones"])) {

    $editar = new ValidacionesAjax();
    $editar->idValidaciones = $_POST["idValidaciones"];
    $editar->ajaxEditarValidaciones();
}

/*=====================================================
=       VALIDAR SI EL USUARIO YA ESTA EN LA BD       =
=====================================================*/

if (isset($_POST["rucConsulta"])) {

    $valRuc = new ValidacionesAjax();
    $valRuc->rucConsulta = $_POST["rucConsulta"];

    $valRuc->ajaxValidarRuc();
}