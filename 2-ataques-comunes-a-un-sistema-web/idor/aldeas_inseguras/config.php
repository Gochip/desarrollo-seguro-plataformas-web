<?php 
session_start();

	define("ID_DESAFIO",3);
	define('ID_JUGADOR',32568);

	define("WEB_PATH","http://". $_SERVER['HTTP_HOST']."/");
	define("LOCAL_PATH",dirname(__FILE__)."/");
	define("CSS_PATH", WEB_PATH . "css/");
	define("JS_PATH", WEB_PATH . "js/");
	define("IMAGES_PATH", WEB_PATH . "img/");
	define("TMP_PATH", LOCAL_PATH . "tmp/");


$array_jugadores = array();

if(!isset($_SESSION['id_jugador'])){
	$_SESSION['id_jugador'] = ID_JUGADOR;

	$array_jugadores = array(
		array("id"=>10178,"nombre"=>'Alfonzo',"oro"=>2500,"plata"=>1999,"bronce"=>2400, 'recibio_oro'=>false),
		array("id"=>1901,"nombre"=>'Juana',"oro"=>1000,"plata"=>675,"bronce"=>300, 'recibio_oro'=>false),
		array("id"=>22358,"nombre"=>'Santiago',"oro"=>1520,"plata"=>389,"bronce"=>275, 'recibio_oro'=>false),
		array("id"=>ID_JUGADOR,"nombre"=>'pedro',"oro"=>620,"plata"=>1000,"bronce"=>800, 'recibio_oro'=>false)
	);
	$_SESSION['jugadores'] = $array_jugadores;
}


