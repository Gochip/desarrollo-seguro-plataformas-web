<?php

require_once "vendor/autoload.php";

ini_set("display_errors", 1);
error_reporting(1);

use MongoDB\Client as Client;
use MongoDB\BSON\ObjectID as ObjectID;

/* * * MongoDB * * */
define('CONNECTION_STRING_MONGO_DB', 'mongodb://localhost:27017');
define('MONGO_DB', 'test');

if (!defined("CONNECTION_STRING_MONGO_DB")) {
    throw new \InvalidArgumentException("No está definida la constante: CONNECTION_STRING_MONGO_DB");
}
if (!defined("MONGO_DB")) {
    throw new \InvalidArgumentException("No está definida la constante: MONGO_DB");
}

// Inyectar con: http://localhost/mongodb_injection/login.php

// En usuario=juan
// En clave clave[$ne]=1

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $m = new Client(CONNECTION_STRING_MONGO_DB);
    $db = $m->selectDatabase(MONGO_DB);

    $nombre_usuario = $_POST["usuario"];
    $clave = $_POST["clave"];

    $coleccion = $db->usuarios;
    $mensaje = "Usuario o clave incorrecta.";
    if (isset($coleccion)) {
        if(isset($nombre_usuario) && isset($clave)){
            $usuario = $coleccion->find(array(
                "nombre_usuario" => $nombre_usuario,
                "clave" => $clave)
            );

            if (isset($usuario)) {
                $us_array = $usuario->toArray();
                if(count($us_array) > 0) {
                    //$mensaje = "Ingreso exitoso: [[AQUÍ VA EL HASH GANADOR]]";
                    $mensaje = "Ingreso exitoso";
                }
            }
        }
    }
}
?>
<html>
    <head>
        <title>Rompiendo login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <form action="" method="POST" >
            <div class="row">
                <div class="col-sm-2 col-sm-offset-5">
                    <h2>Inicio de sesión</h2>
                    <div class="form-group">
                        <label for="usuario">Usuario:</label>
                        <input type="text" class="form-control" id="usuario" name="usuario">
                    </div>
                    <div class="form-group">
                        <label for="clave">Clave:</label>
                        <input type="password" class="form-control" id="clave" name="clave">
                    </div>
                    <p style="margin-top: 10px; text-align: center">
                        <?php echo $mensaje ?>
                    </p>
                    <div>
                        <button type="submit" class="btn btn-primary">Iniciar</button>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>




