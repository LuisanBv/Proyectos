<?php
require_once("php/conexion.php");
$conexion = conectarOracle();
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>RASTREAR PAQUETE</title>
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
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->

    
    
    <!--mis css-->
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="datatables/bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="datatables/main.css">  
      
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="datatables/datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="datatables/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
     <!--font awesome con CDN-->  
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  
     
      
   
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
                        <div class="col-xl-8 col-md-8">
                            <div class="header_right d-flex align-items-center">
                               

                               
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
                                            <li><a  href="index.html">Regresar</a></li>  
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
                                <h3>Rastreo de paquetes</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ bradcam_area  -->


    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="img/blog/single_blog_1.png" alt="">
                                
                            <br>
                            <br>
                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Destinatario</th>
                                    <th>Remitente</th>
                                    <th>Sucursal</th>
                                    <th>Recibió Empleado</th>
                                    <th>Tamaño</th>
                                    <th>Tipo</th>
                                    <th>Descripción</th>
                                    <th>Estatus</th>
                                    <th>Fecha Envío</th>
                                    <th>Fecha Entrega</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if (isset($_GET['numero_rastreo'])) {
                                    $numeroRastreo = $_GET['numero_rastreo'];

                                    $sql = "SELECT p.ID_paquete, p.ID_destinatario, p.ID_remitente, p.ID_almacen, p.ID_usuario, 
                                            p.tpaquete, p.tipaquete, p.descripcion, p.estatus, p.fecha_envio, p.fecha_entrega, u.nombre, 
                                            u.ap, u.am, r.nombre_re, r.apellidos_re, d.nombre_des, d.apellidos_des, a.estado
                                            FROM paquetes p
                                            INNER JOIN usuarios u ON p.ID_usuario = u.ID_usuario
                                            INNER JOIN remitente r ON p.ID_remitente = r.ID_remitente
                                            INNER JOIN destinatario d ON p.ID_destinatario = d.ID_destinatario
                                            INNER JOIN almacen a ON p.ID_almacen = a.ID_almacen
                                            WHERE p.ID_paquete = '$numeroRastreo'";

                                    $stmt = oci_parse($conexion, $sql);
                                    oci_execute($stmt);

                                    while ($mostrar = oci_fetch_array($stmt)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $mostrar['ID_PAQUETE'] ?></td>
                                            <td><?php echo $mostrar['NOMBRE_DES'] . ' ' . $mostrar['APELLIDOS_DES']; ?></td>
                                            <td><?php echo $mostrar['NOMBRE_RE'] . ' ' . $mostrar['APELLIDOS_RE']; ?></td>
                                            <td><?php echo $mostrar['ESTADO'] ?></td>
                                            <td><?php echo $mostrar['NOMBRE'] . ' ' . $mostrar['AP'] . ' ' . $mostrar['AM']; ?></td>
                                            <td><?php echo $mostrar['TPAQUETE'] ?></td>
                                            <td><?php echo $mostrar['TIPAQUETE'] ?></td>
                                            <td><?php echo $mostrar['DESCRIPCION'] ?></td>
                                            <td><?php echo $mostrar['ESTATUS'] ?></td>
                                            <td><?php echo $mostrar['FECHA_ENVIO'] ?></td>
                                            <td><?php echo $mostrar['FECHA_ENTREGA'] ?></td>
                                        </tr>
                                    <?php
                                    }
                                    oci_free_statement($stmt);
                                    oci_close($conexion); // Cerrar la conexión a la base de datos
                                }
                                ?>

                            </tbody>
                        </table>
                        </article>

                        
                        </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="rastrear.php">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input name="numero_rastreo" type="text" class="form-control" placeholder='Introduzaca su numero de rastreo'
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Introduzca su numero de rastreo'">
                                        <div class="input-group-append">
                                            <button class="btn" type="button"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit">Rastrear</button>
                            </form>
                        </aside>

                        
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

    <!-- footer start -->
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
    <script src="js/gijgo.min.js"></script>

    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>

    <script src="js/main.js"></script>
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }

        });
    </script>
     <!-- scripts tablas-->
      <!-- jQuery, Popper.js, Bootstrap JS -->
      <script src="datatables/jquery/jquery-3.3.1.min.js"></script>
    <script src="datatables/popper/popper.min.js"></script>
    <script src="datatables/bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="datatables/datatables/datatables.min.js"></script>    
     
    <!-- para usar botones en datatables JS -->  
    <script src="datatables/datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>  
    <script src="datatables/datatables/JSZip-2.5.0/jszip.min.js"></script>    
    <script src="datatables/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>    
    <script src="datatables/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="datatables/datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
     
    <!-- código JS propìo-->    
    <script type="text/javascript" src="datatables/main.js"></script>  




</body>
</html>