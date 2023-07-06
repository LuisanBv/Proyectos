<?php
// Obtener el valor del correo enviado desde el formulario
$id = $_POST['id'];

// Realizar la conexión a la base de datos
require_once("conexion.php");
$conexion = conectarOracle();

// Verificar si la conexión fue exitosa
if (!$conexion) {
    $error = oci_error();
    die("Error al conectar a la base de datos: " . $error['message']);
}

// Construir la consulta SQL de eliminación
$sql = "DELETE FROM roles WHERE ID_rol = '$id'";

// Preparar la sentencia SQL
$statement = oci_parse($conexion, $sql);

// Ejecutar la sentencia SQL
$resultado = oci_execute($statement);

// Verificar si la eliminación fue exitosa
if ($resultado) {
    echo '<script> 
		alert ("Datos eliminados correctamente"); 
		///regresar ahi mismo///
		window.history.go(-1); 
		</script>';
} else {
    $error = oci_error($statement);
    echo '<script> 
		alert ("Error al eliminar datos: ' . $error['message'] . '"); 
		window.history.go(-1); 
		</script>';
}

// Cerrar la conexión a la base de datos
oci_close($conexion);
?>
