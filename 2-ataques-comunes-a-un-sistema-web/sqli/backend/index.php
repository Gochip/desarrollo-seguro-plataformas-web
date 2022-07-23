<?php
    $type = "";
    $dbhost = getenv("DB_HOST");
    $dbuser = getenv("DB_USER");
    $dbpass = getenv("DB_PASSWORD");
    $dbname = getenv("DB_NAME");

    $link = mysqli_connect($dbhost, $dbuser, $dbpass);
    mysqli_select_db($link, $dbname) or die(mysqli_error($link));

    // Si no está seteado el tipo, vamos con la consulta sin filtro
    if (!isset($_GET["type"])) {
    // Consulta
    $query = <<<SQL
                SELECT p.codigo AS code, p.nombre AS name, a.nombre AS owner, t.nombre AS type, n.nombre AS level
                FROM proyectos AS p
                INNER JOIN agentes AS a ON a.id = p.id_agente
                INNER JOIN niveles AS n ON n.id = p.id_nivel
                INNER JOIN tipos AS t ON t.id = p.id_tipo
                WHERE p.id_nivel != (SELECT id FROM niveles WHERE nombre='Top Secret')
                ORDER BY p.codigo
SQL;
    } else {
    // Si en cambio, está seteado el filtro
    $type = $_GET["type"];
    // Escapar input para prevenir SQLinjection
    //$type = filter_input(INPUT_GET, "type", FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
    //$type = mysqli_real_escape_string($link, $type);

    $query = <<<SQL
                SELECT p.codigo AS code, p.nombre AS name, a.nombre AS owner, t.nombre AS type, n.nombre AS level
                FROM proyectos AS p
                INNER JOIN agentes AS a ON a.id = p.id_agente
                INNER JOIN niveles AS n ON n.id = p.id_nivel
                INNER JOIN tipos AS t ON t.id = p.id_tipo
                WHERE t.id = $type AND p.id_nivel != (SELECT id FROM niveles WHERE nombre='Top Secret')
SQL;
    }
    // Ejecutar consulta
    $qry_result = mysqli_query($link, $query) or die(mysqli_error($link));
    // Así no se rompe en el caso de que no hayan filas
    $projects = array();

    while($row = mysqli_fetch_array($qry_result)) {
        $projects [] = array (
            "code" => $row['code'],
            "name" => $row['name'],
            "type" => $row['type'],
            "level" => $row['level'],
            "owner" => $row['owner']
        );
    }

    $respuesta = array(
        "status" => "ok",
        "data" => array(
            "projects" => $projects
        )
    );

    echo json_encode($respuesta);
