<?php
ini_set("display_errors", 1);

session_start();
$dbhost = getenv("DB_HOST");
$dbuser = getenv("DB_USER");
$dbpass = getenv("DB_PASSWORD");
$dbname = getenv("DB_NAME");
$conexion = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
	if (!is_null($conexion->connect_error)) {
		die("Error al tratar de conectarme con la base de datos");
	}
$conexion->set_charset("utf-8");
