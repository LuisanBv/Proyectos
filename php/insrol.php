<?php

// Obtener los valores enviados desde el formulario
$descripcion = $_POST['descripcion'];


// Incluir el archivo de conexión a Oracle
require_once("conexion.php");
$conexion = conectarOracle();

// Verificar si la conexión fue exitosa
if (!$conexion) {
    $error = oci_error();
    die("Error al conectar a la base de datos: " . $error['message']);
}

// Construir la consulta SQL de inserción
$sql = "INSERT INTO roles (descripcion) VALUES ('$descripcion')";

// Preparar la sentencia SQL
$statement = oci_parse($conexion, $sql);

// Ejecutar la sentencia SQL
$resultado = oci_execute($statement);

// Verificar si la inserción fue exitosa
if ($resultado) {
    echo '<script> 
		alert ("Datos insertados correctamente"); 
		///regresar ahi mismo///
		window.history.go(-1); 
		</script>';
} else {
    $error = oci_error($statement);
    echo '<script> 
		alert ("Error al insertar: ' . $error['message'] . '"); 
		window.history.go(-1); 
		</script>';
}

// Cerrar la conexión a la base de datos
oci_close($conexion);
?>
