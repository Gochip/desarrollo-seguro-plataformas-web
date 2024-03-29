<?php

$dbhost = getenv("DB_HOST");
$dbuser = getenv("DB_USER");
$dbpass = getenv("DB_PASSWORD");
$dbname = getenv("DB_NAME");

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	exit;
}

$buscar_por_codigo = $_GET["codigo"];

if (!($resultado = $mysqli->query("CALL get_usuario_por_codigo('" . $buscar_por_codigo . "')"))) {
    echo "Falló CALL: (" . $mysqli->errno . ") " . $mysqli->error;
	exit;
}

$fila = $resultado->fetch_assoc();
var_dump($fila);