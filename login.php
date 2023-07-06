<?php
include_once 'php/conexion.php';
$conexion = conectarOracle();    
session_start();

if(isset($_GET['cerrar_sesion'])){
    session_unset(); 
    session_destroy(); 
}

if(isset($_SESSION['rol'])){
    switch($_SESSION['rol']){
        case 1:
            header('location: admin1.php');
            break;

        case 2:
            header('location: paqueteria.php');
            break;

        

        default:
    }
}

if(isset($_POST['correo']) && isset($_POST['password'])){
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    

    $query = "SELECT * FROM usuarios WHERE correo = :correo AND password = :password";
    $statement = oci_parse($conexion, $query);
    oci_bind_by_name($statement, ':correo', $correo);
    oci_bind_by_name($statement, ':password', $password);
    oci_execute($statement);

    $row = oci_fetch_array($statement, OCI_ASSOC+OCI_RETURN_NULLS);
    
    if($row){
        if(!empty($_POST['check'])) {
            $remember = $_POST['check'];

            //set cookies
            setcookie('correo', $correo, time()+60*60);
            setcookie('password', $password, time()+60*60);
            setcookie('userlogin', $remember, time()+60*60);
        } else {
            //expire cookies
            setcookie('correo', $correo, 30);
            setcookie('password', $password, 30);
        }

        $rol = $row['ID_ROL'];
        $_SESSION['ID_usuario'] = $row['ID_USUARIO'];
        $_SESSION['correo'] = $row['CORREO'];
        $_SESSION['nombre'] = $row['NOMBRE'];
        $_SESSION['ap'] = $row['AP'];
        $_SESSION['am'] = $row['AM'];
        $_SESSION['rol'] = $rol;

        switch($rol){
            case 1:
                header('location: admin.php');
                break;

            case 2:
                header('location: paqueteria.php');
                break;

                

            default:
        }
    } else {
        // no existe el usuario
        echo '<script> 
		alert ("Correo o contraseña incorrectas"); 
		///regresar ahi mismo///
		window.history.go(-1); 
		</script>';
    }
}
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Iniciar sesión</title>
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
   
    <link rel="stylesheet" href="css/estlogin.css">

    
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
                        <h3>Iniciar sesión</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--/ bradcam_area  -->
    <form action="login.php" class="formulario" id="formulario" method="POST">
    <!-- Grupo: Correo Electronico -->
    <label class="formulario__label">INICIAR SESION</label>
                <div class="formulario__grupo" id="grupo__correo">
				<label for="correo" class="formulario__label">Correo Electrónico</label>
				<div class="formulario__grupo-input">
					<input type="email" class="formulario__input" name="correo" id="correo" placeholder="Ingrese su correo" required 
                    value="<?php if(isset($_COOKIE['correo'])){echo $_COOKIE['correo'];};?>">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
			</div>

    <!-- Grupo: Contraseña -->
			<div class="formulario__grupo" id="grupo__password">
				<label for="password" class="formulario__label">Contraseña</label>
				<div class="formulario__grupo-input">
					<input type="password" class="formulario__input" name="password" id="password" placeholder="Ingrese su contraseña" required
                    value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];};?>">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">La contraseña tiene que ser de 10 a 20 caracteres.</p>
			</div>

			<div class="formulario__mensaje" id="formulario__mensaje">
				<p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
			</div>
            <br><br>

			<div class="formulario__grupo formulario__grupo-btn-enviar">
				<button type="submit" class="formulario__btn">Enviar</button>
				<p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
			</div>
  
            <div class="formulario__grupo formulario__grupo-btn-enviar" >
				<label class="formulario__label">Recordarme en este equipo</label>
					<input type="checkbox" class="formulario__ch" name="check" id="check"
                    <?php if(isset($_COOKIE['userlogin'])){echo "checked";};?>>
			</div>

   </form>
</main>
   


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

    <!-- scripts validaciones-->
    <script src="js/formulario1.js"></script>
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
 

</body>

</html>