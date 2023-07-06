<?php
require_once("php/conexion.php");
$conexion = conectarOracle();
session_start();

if(!isset($_SESSION['rol'])){
    header('location: login.php');
}else{
    if($_SESSION['rol'] != 2){
        header('location: login.php');
    }
}

?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Alta de paquetes</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">

    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div class="header-top_area d-none d-lg-block">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-4 col-lg-4">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-12 d-block d-lg-none">
                                <div class="logo">
                                    <a href="index.html">
                                        <img src="img/logo.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-9">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a  href="listapaquetes.php">Lista de paquetes</a></li>
                                            <li><a  href="login.php?cerrar_sesion">Cerrar Sesión</a></li>
                                           
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->
     <!-- bradcam_area  -->
     <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Bienvenido: <?PHP ECHO $_SESSION['nombre'], ' '.$_SESSION['ap'],' '.$_SESSION['am'] ;?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <br>
    
    <!--/ bradcam_area  -->

    <!-- Estimate_area start  -->
    <div class="Estimate_area overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-5">
                    <div class="Estimate_info">
                        <h3>Datos de envio</h3>
                        <p>¡Asegurat de reunir los datos del usuario!</p>
                       
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-7">
                    <div class="form">
                        <form action="php/insremi.php" method="POST">
                            <div class="row">
                                <div class="col-xl-6">
                                        <div class="Estimate_info">
                                            <h3>Datos del remitente</h3>
                                        </div>
                                    <div class="input_field">
                                        <input id="nomre" name="nomre" type="text" placeholder="Nombre de remitente">
                                  
                                        <input id="apre" name="apre" type="text" placeholder="Apellidos del remitente">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                         <div class="Estimate_info">
                                            <h3>  ‎ </h3>
                                        </div>
                                    <div class="input_field">
                                 
                                        <input id="corre" name="corre" type="email" placeholder="Correo del remitente">
                                        <input id="telre" name="telre" type="text" placeholder="Telefono del remitente">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="input_field">
                                        <button class="boxed-btn3-line" type="submit">Registrar remitente</button>
                                        <br>
                                        <br>
                        </form>
                                    </div>
                                </div>
                      


                                <div class="col-xl-6">
                                        <div class="Estimate_info">
                                            <h3>Datos del destinatario</h3>
                                        </div>
                                    <div class="input_field">
                                    <form action="php/insdest.php" method="POST">
                                        <input id="nomdes" name="nomdes" type="text" placeholder="Nombre del Destinatario">
                                        <input id="apdes" name="apdes" type="text" placeholder="Apellido del Destinatario">
                                        <input id="calledes" name="calledes" type="text" placeholder="Calle del Destinatario">
                                        <input id="estado" name="estado" type="text" placeholder="Estado del Destinatario">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                         <div class="Estimate_info">
                                            <h3>  ‎ </h3>
                                        </div>
                                    <div class="input_field">
                                        <input id="correodes" name="correodes" type="email" placeholder="Correo del Destinatario">
                                        <input id="teldes" name="teldes" type="text" placeholder="Telefono del Destinatario">
                                        <input id="ciudades" name="ciudades" type="text" placeholder="Ciudad del Destinatario">
                                        <input id="cpdes" name="cpdes" type="text" placeholder="Codigo postal">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="input_field">
                                        <button class="boxed-btn3-line" type="submit">Registrar Destinatario</button>
                                        <br>
                                        <br>
                                </form>
                                    </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="Estimate_info">
                                            <h3>Datos del paquete</h3>
                                        </div>
                                    <div class="input_field">
                                    <form action="php/inspaquete.php" method="POST"> 
                                        <select id="tampa" class="wide" name="tampa">
                                            <option data-display="Tamaño de paquete">Tamaño de paquete</option>
                                            <option value="PEQUEÑO">Pequeño</option>
                                            <option value="MEDIANO">Mediano</option>
                                            <option value="GRANDE">Grande</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                        <div class="Estimate_info">
                                            <h3>  ‎ </h3>
                                        </div>
                                    <div class="input_field">
                                        <select id="tipopa" class="wide" name="tipopa">
                                            <option data-display="Tipo de paquete">Tipo de paquete</option>
                                            <option value="ULTRA DELICADO">Ultra delicado</option>
                                            <option value="DELICADO">Delicado</option>
                                            <option value="STANDARD">Standard</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="input_field">
                                    <?php
                                        // Conexión a la base de datos
                                        require_once("php/conexion.php");
                                        $conexion = conectarOracle();

                                        if (!$conexion) {
                                            $e = oci_error();
                                            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                                        }

                                        // Consulta de destinatarios
                                        $sql = "SELECT ID_almacen, estado FROM almacen";
                                        $stmt = oci_parse($conexion, $sql);
                                        oci_execute($stmt);

                                        // Generar el combo box
                                        echo '<select name="Sucursal">';
                                        echo '<option value="" disabled selected>Sucursales</option>'; // Opción deshabilitada

                                        while ($row = oci_fetch_assoc($stmt)) {
                                            $idalmacen = $row['ID_ALMACEN'];
                                            $estado = $row['ESTADO'];
                                        

                                            echo '<option value="' . $idalmacen . '">' . $estado . ' ' .  '</option>';
                                        }

                                        echo '</select>';

                                        // Cerrar la conexión
                                        oci_free_statement($stmt);
                                        oci_close($conexion);
                                    ?>
                                    </div>

                                    <div class="input_field">
                                    <?php
                                        // Conexión a la base de datos
                                        require_once("php/conexion.php");
                                        $conexion = conectarOracle();

                                        if (!$conexion) {
                                            $e = oci_error();
                                            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                                        }

                                        // Consulta de destinatarios
                                        $sql = "SELECT ID_remitente, nombre_re, apellidos_re FROM REMITENTE";
                                        $stmt = oci_parse($conexion, $sql);
                                        oci_execute($stmt);

                                        // Generar el combo box
                                        echo '<select name="remitente">';
                                        echo '<option value="" disabled selected>Remitente</option>'; // Opción deshabilitada

                                        while ($row = oci_fetch_assoc($stmt)) {
                                            $idremitente = $row['ID_REMITENTE'];
                                            $nombreremitente = $row['NOMBRE_RE'];
                                            $apellidosremitente = $row['APELLIDOS_RE'];

                                            echo '<option value="' . $idremitente . '">' . $nombreremitente . ' ' . $apellidosremitente . '</option>';
                                        }

                                        echo '</select>';

                                        // Cerrar la conexión
                                        oci_free_statement($stmt);
                                        oci_close($conexion);
                                    ?>

                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="input_field">
                                        <?php
                                        // Conexión a la base de datos
                                        require_once("php/conexion.php");
                                        $conexion = conectarOracle();

                                        if (!$conexion) {
                                            $e = oci_error();
                                            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                                        }

                                        // Consulta de destinatarios
                                        $sql = "SELECT ID_destinatario, nombre_des, apellidos_des FROM destinatario";
                                        $stmt = oci_parse($conexion, $sql);
                                        oci_execute($stmt);

                                        // Generar el combo box
                                        echo '<select name="destinatario">';
                                        echo '<option value="" disabled selected>Destinatario</option>'; // Opción deshabilitada

                                        while ($row = oci_fetch_assoc($stmt)) {
                                            $idDestinatario = $row['ID_DESTINATARIO'];
                                            $nombreDestinatario = $row['NOMBRE_DES'];
                                            $apellidosDestinatario = $row['APELLIDOS_DES'];

                                            echo '<option value="' . $idDestinatario . '">' . $nombreDestinatario . ' ' . $apellidosDestinatario . '</option>';
                                        }

                                        echo '</select>';

                                        // Cerrar la conexión
                                        oci_free_statement($stmt);
                                        oci_close($conexion);
                                    ?>
                                      <input id="cpdes" name="cpdes" type="text" placeholder="ESTATUS: RECIBIDO" disabled>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="input_field">
                                        <textarea id="descri" name="descri" placeholder="Descripción"></textarea>
                                    </div>
                                    <div class="input_field">
                                        <button class="boxed-btn3-line" type="submit">Registrar paquete</button>
                                        <br>
                                        <br>
                                          </form>
                                    </div>
                                </div>

                                </div>
                            </div>          
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Estimate_area end  -->


    <br>
    <br>
    <div class="copy-right_text">
        <div class="container">
            <div class="footer_border"></div>
            <div class="row">
                <div class="col-xl-12">
                    <p class="copy_right text-center">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados para el equipo de ingenieros</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--/ footer end  -->
<!-- Button trigger modal -->
  
  <!-- Modal -->
  <div class="modal fade custom_search_pop" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="serch_form">
            <input type="text" placeholder="search" >
            <button type="submit">search</button>
        </div>
      </div>
    </div>
  </div>

    <!-- JS here -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <!-- <script src="js/gijgo.min.js"></script> -->
    <script src="js/slick.min.js"></script>



    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>


    <script src="js/main.js"></script>




</body>

</html>