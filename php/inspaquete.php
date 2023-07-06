<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $tampaquete = $_POST['tampa'];
    $tipopaquete = $_POST['tipopa'];
    $sucursal = $_POST['Sucursal'];
    $remitente = $_POST['remitente'];
    $destinatario = $_POST['destinatario'];
    $descripcion = $_POST['descri'];
	$estatus = "RECIBIDO";
	session_start();
    $id_usuario = $_SESSION['ID_usuario'];

    // Validar los datos (realiza tus validaciones aquí)

    // Obtener la fecha y hora actual en el formato deseado
    date_default_timezone_set('America/Mexico_City');
    $fechaEnvio = date('Y-m-d H:i:s'); // Obtiene la fecha y hora actual en el formato 'Y-m-d H:i:s' (por ejemplo, '2023-06-14 14:30:45')

    // Realizar la inserción en la base de datos
    require_once("conexion.php");
    $conexion = conectarOracle();

    // Verificar si la conexión fue exitosa
    if (!$conexion) {
        $error = oci_error();
        die("Error al conectar a la base de datos: " . $error['message']);
    }

    // Preparar la consulta
    $sql = "INSERT INTO paquetes (ID_destinatario, ID_remitente, ID_almacen, ID_usuario, tpaquete, tipaquete, descripcion, estatus, fecha_envio)
            VALUES (:destinatario, :remitente, :sucursal, :usuario, :tampaquete, :tipopaquete, :descripcion, :estatus, TO_TIMESTAMP(:fechaEnvio, 'YYYY-MM-DD HH24:MI:SS'))";
    $stmt = oci_parse($conexion, $sql);

    // Asignar valores a los parámetros
    oci_bind_by_name($stmt, ":destinatario", $destinatario);
    oci_bind_by_name($stmt, ":remitente", $remitente);
    oci_bind_by_name($stmt, ":sucursal", $sucursal);
    oci_bind_by_name($stmt, ":usuario", $id_usuario); // Reemplaza ":usuario" con el ID de usuario correspondiente
    oci_bind_by_name($stmt, ":tampaquete", $tampaquete);
    oci_bind_by_name($stmt, ":tipopaquete", $tipopaquete);
    oci_bind_by_name($stmt, ":descripcion", $descripcion);
    oci_bind_by_name($stmt, ":fechaEnvio", $fechaEnvio);
	oci_bind_by_name($stmt, ":estatus", $estatus);

    // Ejecutar la consulta
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
    oci_free_statement($stmt);
    oci_close($conexion);
}
?>
