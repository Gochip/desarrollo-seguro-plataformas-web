<?php

$mysqli = new mysqli("localhost", "root", "", "pa");
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$buscar_por_codigo = $_GET["codigo"];

echo "CALL get_usuario_por_codigo('" . $buscar_por_codigo . "')";

if (!($resultado = $mysqli->query("CALL get_usuario_por_codigo('" . $buscar_por_codigo . "')"))) {
    echo "Falló CALL: (" . $mysqli->errno . ") " . $mysqli->error;
}

$fila = $resultado->fetch_assoc();
var_dump($fila);