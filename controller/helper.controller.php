<?php 
/**
 * FUNCION PARA DEBUGEAR UN ARREGLO CON VALORES
 */
function debugear($param){

    echo '<pre>';
        var_dump($param);
    echo '</pre>';

}

/**
 * FUNCION PARA PASAR LA FECHA A CASTELLANO
 */
function fechaCastellano($fecha) {

    date_default_timezone_set('America/Lima');
    $fecha = substr($fecha, 0, 10);
    $numeroDia = date('d', strtotime($fecha));
    $dia = date('l', strtotime($fecha));
    $mes = date('F', strtotime($fecha));
    $anio = date('Y', strtotime($fecha));

    /**Por defecto el día y el mes ($dia, $mes) se obtienen en inglés, 
     * así que vamos a pasarlo a castellano/español usando str_replace(). */

    $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
    $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");

    $nombreDia = str_replace($dias_EN, $dias_ES, $dia);

    $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

    $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

    $nombreMes = str_replace($meses_EN, $meses_ES, $mes);

    /**Lo último sería devolver los datos en una sintaxis clara. En este caso sería así: */
    /**\view\assets\img\illustrations */

    return $nombreDia . " " . $numeroDia . " de " . $nombreMes . " de " . $anio;

}

/**FORMATEAR HORA */

function formatDate($date) {

    
	return date('g:i a', strtotime($date));
}