<?php
require_once("php/conexion.php");
$conexion = conectarOracle();
session_start();

if(!isset($_SESSION['rol'])){
    header('location: login.php');
}else{
    if($_SESSION['rol'] != 1){
        header('location: login.php');
    }
}

?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ADMINISTRADOR</title>
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

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        canvas {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }
    </style>

    
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
                                            <li><a href="#">Usuarios <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="insertusr.php">Insertar</a></li>
                                                    <li><a href="actusr.php">Actualizar</a></li>
                                                    <li><a href="delusr.php">Eliminar</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Roles <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="insrol.php">Insertar</a></li>
                                                    <li><a href="actrol.php">Actualizar</a></li>
                                                    <li><a href="delrol.php">Eliminar</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Sucursales <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="inssucursal.php">Insertar</a></li>
                                                    <li><a href="actsucursal.php">Actualizar</a></li>
                                                    <li><a href="delsucursal.php">Eliminar</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Camiones <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="insertusr.php">Insertar</a></li>
                                                    <li><a href="">Actualizar</a></li>
                                                    <li><a href="">Eliminar</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Paquetes <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="actpaquete.php">Actualizar</a></li>
                                                    <li><a href="delpaquete.php">Eliminar</a></li>
                                                </ul>
                                            </li>
                                            
                                            <li><a href="   login.php?cerrar_sesion" class="dropdown-item" class="d-block text-light p-3 border-0"><i class="fa-solid fa-arrow-right-from-bracket"></i>
                    Cerrar sesión</a>  </li>
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
    <br>
    <!--/ bradcam_area  -->
        <div class="bradcam_text text-center">
            <h3>Estadisticas</h3>
         </div>
		<section id="tabla">
        <canvas id="barChart"></canvas>

                <script>
                    var ctx = document.getElementById('barChart').getContext('2d');
                    var barChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'],
                            datasets: [{
                                label: 'Envíos',
                                data: [120, 200, 180, 150, 220],
                                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>
		</section>
        <canvas id="lineChart"></canvas>

<script>
    var ctx = document.getElementById('lineChart').getContext('2d');
    var gradient = ctx.createLinearGradient(0, 0, 0, 400);
    gradient.addColorStop(0, 'rgba(54, 162, 235, 0.8)');
    gradient.addColorStop(0.5, 'rgba(54, 162, 235, 0.4)');
    gradient.addColorStop(1, 'rgba(54, 162, 235, 0.1)');

    var lineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            datasets: [{
                label: 'Envíos Mensuales',
                data: [100, 150, 220, 180, 250, 320, 300, 400, 380, 420, 390, 450],
                backgroundColor: gradient,
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2,
                pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                pointRadius: 4,
                pointHoverRadius: 6,
                lineTension: 0.3
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 100
                    }
                }
            },
            plugins: {
                title: {
                    display: true,
                    text: 'Crecimiento Mensual de Envíos',
                    font: {
                        size: 18
                    }
                },
                legend: {
                    display: false
                }
            }
        }
    });
</script>
        




        <br>
        <br>
                                    
       


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