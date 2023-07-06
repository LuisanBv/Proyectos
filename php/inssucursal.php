
<?php
// Conexión a la base de datos
require_once("conexion.php");
$conexion = conectarOracle();

// Verificar si la conexión fue exitosa
if (!$conexion) {
    $error = oci_error();
    die("Error al conectar a la base de datos: " . $error['message']);
}

// Obtener los valores del formulario
$capacidad = $_POST['capacidad'];
$estado = $_POST['estado'];
$calle = $_POST['calle'];
$cp = $_POST['cp'];
$ciudad = $_POST['ciudad'];
$id_usuario = $_POST['encargado'];

// Preparar la sentencia de inserción
$sql = "INSERT INTO almacen (capacidad, estado, calle, cp, ciudad, id_usuario)
        VALUES (:capacidad, :estado, :calle, :cp, :ciudad, :id_usuario)";

$stmt = oci_parse($conexion, $sql);

oci_bind_by_name($stmt, ':capacidad', $capacidad);
oci_bind_by_name($stmt, ':estado', $estado);
oci_bind_by_name($stmt, ':calle', $calle);
oci_bind_by_name($stmt, ':cp', $cp);
oci_bind_by_name($stmt, ':ciudad', $ciudad);
oci_bind_by_name($stmt, ':id_usuario', $id_usuario);

// Ejecutar la sentencia de inserción
$resultado = oci_execute($stmt);

// Verificar si la inserción fue exitosa
if ($resultado) {
    echo '<script> 
		alert ("Datos insertados correctamente"); 
		///regresar ahi mismo///
		window.history.go(-1); 
		</script>';
} else {
    $error = oci_error($stmt);
    echo '<script> 
		alert ("Error al insertar: ' . $error['message'] . '"); 
		window.history.go(-1); 
		</script>';
}

// Cerrar la conexión
oci_close($conexion);
?>
