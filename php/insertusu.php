<?php

// Obtener los valores enviados desde el formulario
$correo = $_POST['correo'];
$password = $_POST['password'];
$nombre = $_POST['nombre'];
$ap = $_POST['ap'];
$am = $_POST['am'];
$id_rol = $_POST['id_rol'];

require_once("conexion.php");
$conexion = conectarOracle();

// Verificar si la conexión fue exitosa
if (!$conexion) {
    $error = oci_error();
    die("Error al conectar a la base de datos: " . $error['message']);
}

// Construir la consulta SQL de inserción
$sql = "INSERT INTO usuarios (correo, password, nombre, ap, am, id_rol) VALUES (:correo, :password, :nombre, :ap, :am, :id_rol)";

// Preparar la sentencia SQL
$statement = oci_parse($conexion, $sql);

// Asignar los valores a los parámetros
oci_bind_by_name($statement, ":correo", $correo);
oci_bind_by_name($statement, ":password", $password);
oci_bind_by_name($statement, ":nombre", $nombre);
oci_bind_by_name($statement, ":ap", $ap);
oci_bind_by_name($statement, ":am", $am);
oci_bind_by_name($statement, ":id_rol", $id_rol);

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
