<?php
require_once("conexion.php");
$conexion = conectarOracle();

if (!$conexion) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// Obtener los datos del formulario HTML
$nombreRemitente = $_POST['nomre'];
$apellidosRemitente = $_POST['apre'];
$correoRemitente = $_POST['corre'];
$telefonoRemitente = $_POST['telre'];

// Preparar la sentencia SQL para la inserción
$sql = "INSERT INTO remitente (nombre_re, apellidos_re, telefono_re, correo_re) 
        VALUES (:nombreRemitente, :apellidosRemitente, :telefonoRemitente, :correoRemitente)";

// Preparar la sentencia
$stmt = oci_parse($conexion, $sql);

// Vincular los valores a los parámetros de la sentencia
oci_bind_by_name($stmt, ':nombreRemitente', $nombreRemitente);
oci_bind_by_name($stmt, ':apellidosRemitente', $apellidosRemitente);
oci_bind_by_name($stmt, ':telefonoRemitente', $telefonoRemitente);
oci_bind_by_name($stmt, ':correoRemitente', $correoRemitente);

// Ejecutar la sentencia
$resultado = oci_execute($stmt);

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

// Cerrar la conexión
oci_free_statement($stmt);
oci_close($conexion);
?>
