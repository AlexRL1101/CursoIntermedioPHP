<?php

require_once 'vendor/autoload.php';

use App\Models\{Product, ProductCar, Socio};
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'cursophp',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();
// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

if (!empty($_POST)) {
	$product = new Product();
	$productcar = new ProductCar();
	$socio = new Socio();

	$product -> nombre = $_POST['nameproduct'];
	$product -> tipo = $_POST['typeproduct'];
	$product -> descripcion = $_POST['description'];
	$product -> imagen = $_POST['imagenproduct'];
	$socio -> nombre = $_POST['namesocio'];
	$socio -> empresa = $_POST['company'];
	$socio -> ubicacion = $_POST['location'];
	$socio -> mail = $_POST['mailsocio'];
	$productcar -> id_product = $product -> id;
	$productcar -> id_socio = $socio -> id;
	$productcar -> cantidad = $_POST['numberproduct'];
	$productcar -> fec_expiracion = $_POST['expirationproduct'];

	$product -> save();
	$socio -> save();
	$productcar -> save();
  }
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Add Product</title>

 		<!-- Google font -->
 		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

 		<!-- Bootstrap -->
 		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

 		<!-- Slick -->
 		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
 		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

 		<!-- nouislider -->
 		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

 		<!-- Font Awesome Icon -->
 		<link rel="stylesheet" href="css/font-awesome.min.css">

 		<!-- Custom stlylesheet -->
 		<link type="text/css" rel="stylesheet" href="css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-right">
						<li><a href="#"><i class="fa fa-user-o" aria-hidden="true"></i> My Account</a></li>
						<li><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> Lagout</a></li>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">

						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="https://www.youtube.com/channel/UCuQmrVQ91X5BAg0CXir-CWg" class="logo" target="_BLANK">
									<img src="./img/logo3.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li><a href="/CursoPHPIntermedio">Principal</a></li>
						<li><a href="/CursoPHPIntermedio/Socios.php">Socios</a></li>
						<li class="active"><a href="#">Agregar Productos</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-7">

						<!-- Agregar Productos -->
						<form action="addProduct.php" method="post">
							
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Producto</h3>
							</div>
							<div class="form-group">
								<label for="inputState">Name:</label>
								<input class="input" type="text" name="nameproduct" placeholder="Name Product">
							</div>
							<div class="form-group">
								<label for="inputState">Type:</label>
								<select id="inputState" name="typeproduct" class="form-control">
									<option selected>Choose...</option>
									<option value="Galletas">Galletas</option>
									<option value="Enlatados">Enlatados</option>
									<option value="Frituras">Frituras</option>
								</select>
							</div>
							<div class="form-group">
								<label for="inputState">Piece Quantity:</label>
								<input class="input" type="number" name="numberproduct" placeholder="Number">
							</div>
							<div class="form-group">
								<label for="inputState">Expiration Date:</label>
								<input class="input" type="date" name="expirationproduct" placeholder="Expiration date">
							</div>
							<div class="form-group">
								<label for="inputState">Description:</label>
								<textarea class="form-control" name="description" rows="5" placeholder="Description"></textarea>
							</div>
							<div class="form-group">
								<label for="inputState">Image:</label>
   	 							<input type="file" name="imagenproduct" class="form-control">
  							</div>

						<!-- /Agregar Productos -->


						<!-- Agregar Colaboradores -->

							<div class="section-title">
								<h3 class="title">Collaborator</h3>
							</div>
							<div class="form-group">
								<label for="inputState">Name:</label>
								<input class="input" type="text" name="namesocio" placeholder="Name Collaborator">
							</div>
							<div class="form-group">
								<label for="inputState">Company:</label>
								<input class="input" type="text" name="company" placeholder="Company">
							</div>
							<div class="form-group">
								<label for="inputState">Location:</label>
								<input class="input" type="text" name="location" placeholder="Location">
							</div>
							<div class="form-group">
								<label for="inputState">Mail:</label>
								<input class="input" type="mail" name="mailsocio" placeholder="Mail">
							</div>
							<div>
								<button type="submit" class="btn btn-default" >Submit</button>
							</div>
						</div>
						</form>
					<!-- /Agregar Colaboradores -->

					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">About Us</h3>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>Mexico City</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>soy.xido0@gmail.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
									<li><a href="#">Hot deals</a></li>
									<li><a href="#">Laptops</a></li>
									<li><a href="#">Smartphones</a></li>
									<li><a href="#">Cameras</a></li>
									<li><a href="#">Accessories</a></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Information</h3>
								<ul class="footer-links">
									<li><a href="#">Contact Us</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Service</h3>
								<ul class="footer-links">
									<li><a href="#">My Account</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>
