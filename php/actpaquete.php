<?php
    // Verificar si se ha enviado el formulario de actualización
    if (isset($_POST['actualizar'])) {
        // Obtener los valores del formulario
        $idPaquete = $_POST['paquete'];
        $idDestinatario = $_POST['destinatario'];
        $idEmpleado = $_POST['empleado'];
        $idRemitente = $_POST['remitente'];
        $tamPaquete = $_POST['tampa'];
        $descripcion = $_POST['descri'];
        $idSucursal = $_POST['sucursal'];
        $tipoPaquete = $_POST['tipopa'];
        $estatus = $_POST['estatus'];

        // Conexión a la base de datos
        require_once("conexion.php");
        $conexion = conectarOracle();

        if (!$conexion) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        }

        // Actualizar el registro del paquete
        $sql = "UPDATE paquetes SET ID_destinatario = :idDestinatario, ID_remitente = :idRemitente, ID_almacen = :idSucursal, ID_usuario = :idEmpleado, tpaquete = :tamPaquete, tipaquete = :tipoPaquete, descripcion = :descripcion, estatus = :estatus WHERE ID_paquete = :idPaquete";
        $stmt = oci_parse($conexion, $sql);

        oci_bind_by_name($stmt, ":idDestinatario", $idDestinatario);
        oci_bind_by_name($stmt, ":idRemitente", $idRemitente);
        oci_bind_by_name($stmt, ":idSucursal", $idSucursal);
        oci_bind_by_name($stmt, ":idEmpleado", $idEmpleado);
        oci_bind_by_name($stmt, ":tamPaquete", $tamPaquete);
        oci_bind_by_name($stmt, ":tipoPaquete", $tipoPaquete);
        oci_bind_by_name($stmt, ":descripcion", $descripcion);
        oci_bind_by_name($stmt, ":estatus", $estatus);
        oci_bind_by_name($stmt, ":idPaquete", $idPaquete);

        oci_execute($stmt);

        // Verificar si la actualización fue exitosa
        $filasActualizadas = oci_num_rows($stmt);

        
        if ($filasActualizadas > 0) {
            echo '<script> 
                alert ("El registro del paquete se actualizó correctamente."); 
                ///regresar ahi mismo///
                window.history.go(-1); 
                </script>';
        } else {
            $error = oci_error($statement);
            echo '<script> 
                alert ("No se pudo actualizar el registro del paquete: ' . $error['message'] . '"); 
                window.history.go(-1); 
                </script>';
        }
   
        // Cerrar la conexión
        oci_free_statement($stmt);
        oci_close($conexion);
    }
?>
