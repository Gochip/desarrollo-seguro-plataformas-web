<?php

ini_set("display_errors", 1);

function generar_token_hv($id, $apellido, $nombre) {
    // Se establece el mensaje a firmar.
    $fecha = new DateTime();
    $fecha->modify("+1 year");
    $exp = $fecha->getTimestamp();
    $mensaje_a_firmar = "{\"exp\": ${exp}, \"id\": ${id}, \"apellido\": \"${apellido}\", \"nombre\": \"${nombre}\"}";
    
    // Se establece la clave que se debe compartir con el otro participante.
    $clave_secreta = "CLAVE";
    
    // Se genera la firma del mensaje.
    $firma = hash_hmac("sha256", $mensaje_a_firmar, $clave_secreta);
    
    // Se genera el token que contiene el mensaje y la firma.
    $token = urlencode(base64_encode($mensaje_a_firmar) . "|" . base64_encode($firma));
    
    return $token;
}

$token = generar_token_hv(1, "Prueba", "Test");

// Se muestra el token.
echo "<pre>" . $token . "</pre>";
