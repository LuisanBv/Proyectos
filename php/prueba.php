


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 

	<!---------------------------------------------------------------------------------------------------------->
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>ENTRADAS Y SALIDAS GENERALES</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/stylet.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="css/main.css">  
      
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
           
    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  
    
</head>
<body>
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="admin.php">
					<img src="img/tesh.png" alt="" />
					<img src="img/logo.png" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="admin.PHP">Home</a></li>
				
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb4">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Entradas Generales</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
   
<main>
	<form action="php/mostrar.php" class="formulario" id="formulario">
    
		<section id="tabla">
			<div class="container">
			<div class="row">
					<div class="col-lg-12">
						<div class="table-responsive">        
							<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th> N. CONTROL </th>
										<th> OCUPACION </th>
										<th> NOMBRE(S) </th>
										<th> APELLIDO PATERNO </th>
										<th> APELLIDO MATERNO </th>
										<th> FECHA </th>
										<th> ENTRADA </th>
										<th> SALIDA </th>                               
										
										


									</tr>
								</thead>
								<tbody>
							
						   </table>                  
						</div>
					</div>
			</div>  
		</div>
		</section>    

   </form>
</main>

<!-- jQuery, Popper.js, Bootstrap JS -->
<script src="jquery/jquery-3.3.1.min.js"></script> <!-- botones-->
<script src="popper/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
  
<!-- datatables JS -->
<script type="text/javascript" src="datatables/datatables.min.js"></script>    
 
<!-- para usar botones en datatables JS -->  
<script src="datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>  
<script src="datatables/JSZip-2.5.0/jszip.min.js"></script>    
<script src="datatables/pdfmake-0.1.36/pdfmake.min.js"></script>    
<script src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script src="datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
 
<!-- código JS propìo-->    
<script type="text/javascript" src="js/main.js"></script>  
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

</body>
</html>