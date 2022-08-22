<?php 
require_once("comun.php");

if(isset($_SESSION["id_usuario"])==true){
	session_destroy();
	$_SESSION = array();
}
	
header("Location: index.php");
exit;