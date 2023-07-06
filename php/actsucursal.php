<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $idSucursal = $_POST['sucursal'];
    $capacidad = $_POST['capacidad'];
    $estado = $_POST['estado'];
    $calle = $_POST['calle'];
    $codigoPostal = $_POST['cp'];
    $encargado = $_POST['encargado'];

    // Realizar la actualización en la base de datos
    require_once("conexion.php");
    $conexion = conectarOracle();

    if (!$conexion) {
        $error = oci_error();
        die("Error al conectar a la base de datos: " . $error['message']);
    }

    // Preparar la consulta
    $sql = "UPDATE almacen SET capacidad = :capacidad, estado = :estado, calle = :calle, cp = :codigoPostal, id_usuario = :encargado WHERE id_almacen = :idSucursal";
    $stmt = oci_parse($conexion, $sql);

    // Asignar valores a los parámetros
    oci_bind_by_name($stmt, ":capacidad", $capacidad);
    oci_bind_by_name($stmt, ":estado", $estado);
    oci_bind_by_name($stmt, ":calle", $calle);
    oci_bind_by_name($stmt, ":codigoPostal", $codigoPostal);
    oci_bind_by_name($stmt, ":encargado", $encargado);
    oci_bind_by_name($stmt, ":idSucursal", $idSucursal);

    // Ejecutar la consulta
    $resultado = oci_execute($stmt);

   

		// Verificar si la inserción fue exitosa
		if ($resultado) {
			echo '<script> 
				alert ("Datos Actualizados Correctamente"); 
				///regresar ahi mismo///
				window.history.go(-1); 
				</script>';
		} else {
			$error = oci_error($stmt);
			echo '<script> 
				alert ("Error al Actualizar: ' . $error['message'] . '"); 
				window.history.go(-1); 
				</script>';
		}

    // Cerrar la conexión
    oci_free_statement($stmt);
    oci_close($conexion);
}
?>
