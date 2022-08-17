<?php

require_once '../../config.php';
require_once '../datos/recursos_bd.class.php';
require_once "../juez/cliente_hash.php";

$id_jugador_origen = trim(filter_input(INPUT_POST,"id_jugador_origen"));
$id_jugador_destino = trim(filter_input(INPUT_POST,"select_jugador_destino"));
$cantidad_oro = trim(filter_input(INPUT_POST,"txt_cantidad"));

if(!is_numeric($id_jugador_origen) || !is_numeric($id_jugador_destino) || !is_numeric($cantidad_oro) || $cantidad_oro < 0){
	$template_error = "Error al enviar los datos. Por favor intente nuevamente";
	require_once('../../index.php');
	exit;
}


//-------------------------------------------------------------------
$bd = RecursosBd::getInstancia();

$recibio_oro = $bd->recibioOro($id_jugador_destino);
if (!$recibio_oro) {
	$oro_sustraido = $bd->quitarOro($id_jugador_origen,$cantidad_oro);
	$resultado = $bd->agregarOro($id_jugador_destino,$oro_sustraido);
} else {
	$template_error = "Este jugador ya recibió oro.";
}
//--------------------------------------------------------------------

if($id_jugador_destino == ID_JUGADOR && $bd->getJugador($id_jugador_origen) && $id_jugador_origen != ID_JUGADOR) {
	$oro = $bd->getOro($id_jugador_destino);
	if ($oro > 5000) {
		$template_mensaje = "<p>Has superado el desaf&iacute;o. C&oacute;digo: <strong>[[AQUÍ VA EL HASH]]</strong></p>";
	}
}
require_once('../../index.php');
