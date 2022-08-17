<?php

require_once '../../config.php';

session_start();
session_destroy();

$web_path = WEB_PATH;

$html = <<<HTML
    <html>
        <head></head>
        <body>
            <p>Sesión finalizada, datos reseteados</p>
            <a href='$web_path' >Volver a empezar</a>
        </body>
    </html>
HTML;

echo $html;
