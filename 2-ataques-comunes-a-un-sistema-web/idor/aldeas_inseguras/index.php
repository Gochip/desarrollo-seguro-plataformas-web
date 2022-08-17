<?php
	require_once 'config.php';
	require_once 'src/datos/recursos_bd.class.php';
	
	error_reporting(0);	

	$bd = RecursosBd::getInstancia();
	$template_datos = $bd->getJugadores();
	$template_cantidad_oro = $bd->getOro(ID_JUGADOR);
	$template_nombre = ucwords($bd->getNombre(ID_JUGADOR));
	
	require_once 'tmp/index.tmp.php';
