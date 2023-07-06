<?php

function conectarOracle() {
    // Configuración de la conexión a Oracle
    $host = 'localhost';
    $port = '1521';
    $dbname = 'orcl';
    $user = 'system';
    $pass = 'Salazar123';

    // Crear una conexión a Oracle
    $conexion = oci_connect($user, $pass, "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=$host)(PORT=$port))(CONNECT_DATA=(SID=$dbname)))");

    // Verificar si la conexión fue exitosa
    if (!$conexion) {
        $error = oci_error();
        echo "Error al conectar a la base de datos: " . $error['message'];
    } else {
       // echo "Conexión exitosa a Oracle";
    }

    return $conexion;
}

?>
