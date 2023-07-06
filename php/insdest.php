<?php
// Conexión a la base de datos
$servername = "nombre_servidor";
$username = "nombre_usuario";
$password = "contraseña";
$database = "nombre_base_de_datos";

require_once("conexion.php");
$conexion = conectarOracle();

if (!$conexion) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// Obtener los datos del formulario HTML
$nombreDestinatario = $_POST['nomdes'];
$apellidoDestinatario = $_POST['apdes'];
$calleDestinatario = $_POST['calledes'];
$estadoDestinatario = $_POST['estado'];
$correoDestinatario = $_POST['correodes'];
$telefonoDestinatario = $_POST['teldes'];
$ciudadDestinatario = $_POST['ciudades'];
$cpDestinatario = $_POST['cpdes'];

// Preparar la sentencia SQL para la inserción
$sql = "INSERT INTO destinatario (nombre_des, apellidos_des, calle, ciudad, estado, cp, telefono, correo) 
        VALUES (:nombreDestinatario, :apellidoDestinatario, :calleDestinatario, :ciudadDestinatario, :estadoDestinatario, :cpDestinatario, :telefonoDestinatario, :correoDestinatario)";

// Preparar la sentencia
$stmt = oci_parse($conexion, $sql);

// Vincular los valores a los parámetros de la sentencia
oci_bind_by_name($stmt, ':nombreDestinatario', $nombreDestinatario);
oci_bind_by_name($stmt, ':apellidoDestinatario', $apellidoDestinatario);
oci_bind_by_name($stmt, ':calleDestinatario', $calleDestinatario);
oci_bind_by_name($stmt, ':ciudadDestinatario', $ciudadDestinatario);
oci_bind_by_name($stmt, ':estadoDestinatario', $estadoDestinatario);
oci_bind_by_name($stmt, ':cpDestinatario', $cpDestinatario);
oci_bind_by_name($stmt, ':telefonoDestinatario', $telefonoDestinatario);
oci_bind_by_name($stmt, ':correoDestinatario', $correoDestinatario);

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
