<?php

// Etapa 1: Firma del mensaje y generación del token.

// Se establece el mensaje a firmar.
$mensaje_a_firmar = "datos2";

// Se establece la clave que se debe compartir con el otro participante.
$clave_secreta = "miclave2";

// Se genera la firma del mensaje.
$firma = hash_hmac("sha256", $mensaje_a_firmar, $clave_secreta);

// Se genera el token que contiene el mensaje y la firma.
$token = urlencode(base64_encode($mensaje_a_firmar) . "." . base64_encode($firma));

// Se muestra el token.
echo $token;

echo "<br/>";

// Etapa 2: Se recibe el token y se procede a validar la firma.

// Se obtiene el mensaje y la firma.
$datos = explode(".", urldecode($token));

$mensaje_recibido = base64_decode($datos[0]);
$firma_recibida = base64_decode($datos[1]);

// Se genera la firma del mensaje recibido con la clave secreta que se compartió.
$mensaje_recibido_firmado = hash_hmac("sha256", $mensaje_recibido, $clave_secreta);

// Se verifica la firma. La firma generada por el mensaje debe ser igual a la firma recibida.
if ($firma === $mensaje_recibido_firmado) {
	echo "<br/>";
	echo $mensaje_recibido;
} else {
	echo "<br/>";
	echo "Las firmas no son iguales. Por lo tanto, el mensaje ha sido modificado o fue generado por alguien que no conoce la clave secreta.";
}