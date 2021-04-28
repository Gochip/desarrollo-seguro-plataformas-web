<?php

function validar_token_hv($token) {
	if (isset($token) && strlen($token) === 0) return null;
	$clave_secreta = base64_decode("Y2xhdmU=");
	$datos = explode("|", urldecode($token));
	if (count($datos) !== 2) return null;
	$mensaje_recibido = base64_decode($datos[0]);
	$firma_recibida = base64_decode($datos[1]);
	$mensaje_recibido_firmado = hash_hmac("sha256", $mensaje_recibido, $clave_secreta);
	if ($firma_recibida === $mensaje_recibido_firmado) {
		$datos_hv = json_decode($mensaje_recibido, true);
		if (isset($datos_hv) && array_key_exists("exp", $datos_hv)) {
			$exp = $datos_hv["exp"];
			$t = time();
			if (is_numeric($exp) && $exp > $t) {
				return $datos_hv;
			} else {
				return null;
			}
		} else {
			return null;
		}
	} else {
		return null;
	}
}

$token = filter_input(INPUT_GET, "token");

$datos_usuario_hv = validar_token_hv($token);
if (isset($datos_usuario_hv)) {
    $id = $datos_usuario_hv["id"];
    echo $id . "<br>";
    $apellido = $datos_usuario_hv["apellido"];
    echo $apellido . "<br>";
	$nombre = $datos_usuario_hv["nombre"];
	echo $nombre;
} else {
    echo "Token inválido";
}

