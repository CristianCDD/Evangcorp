<?php

require_once 'controller/template.controller.php';
require_once 'model/conexion.php';
require_once 'controller/usuarios.controller.php';
require_once 'model/usuarios.model.php';
require_once 'controller/helper.controller.php';
require_once 'controller/validaciones.controller.php';
require_once 'model/validaciones.model.php';
require_once 'controller/asistencia.controller.php';  // Incluir controlador de asistencia
require_once 'model/asistencia.model.php';  // Incluir modelo de asistencia

// Obtener la asistencia usando el método ctrMostrarInner
$asistencia = ControllerAsistencia::ctrMostrarInner();

$template = new ControllerTemplate();
$template->ctrTemplate();
