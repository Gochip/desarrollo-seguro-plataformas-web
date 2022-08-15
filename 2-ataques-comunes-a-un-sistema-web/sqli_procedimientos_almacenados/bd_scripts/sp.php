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

$mysqli->query("CREATE PROCEDURE get_usuario_por_codigo(IN codigoBuscar VARCHAR(40)) BEGIN SELECT * FROM usuarios WHERE codigo=codigoBuscar; END;");