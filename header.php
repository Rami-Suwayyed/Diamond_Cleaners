<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title> <?php if(isset($pageName)){ echo $pageName; } ?> </title>
	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Fontawesome CSS -->
	<link href="css/all.css" rel="stylesheet">
	<!-- Owl Carousel CSS -->
	<link href="css/owl.carousel.min.css" rel="stylesheet">
	<!-- Owl Carousel CSS -->
	<link href="css/jquery.fancybox.min.css" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="css/style.css" rel="stylesheet">

	<style>

	 @media screen and (max-device-width:450px) {
.art-img{
         width:220px;
    }
}

	 @media screen and (max-device-width:400px) {
.art-im{
         display:none;
    }
}

	  @media screen and (max-device-width:310px) {
.art-i{
         display:none;
    }
}

	   @media screen and (max-device-width:290px) {
.artt{
         display:none;
    }
}

	</style>

	 <!-- fav and touch icons -->
  <link rel="shortcut icon" href="images/16D.png">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/144D.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/144D.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/72D.png">
  <link rel="apple-touch-icon-precomposed" href="images/57D.png">
</head>

<body>
<div class="wrapper-main">
	<!-- Top Bar -->
	<div class="top-bar">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="social-media">
						<ul>
							<li></li>
							<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#"><i class="fab fa-instagram"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="contact-details">
						<ul>
							<li><i class="fas fa-phone fa-rotate-90"></i> 06 5134982</li>
							<li><i class="fas fa-map-marker-alt"></i> Jordan, Amman, Al-Sweifieh</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-light top-nav">
        <div class="container">

			<a class="navbar-brand" href="home.php">
				<img src="images/logo.png" alt="logo"  style="margin-left:3px" class="art-img artt"/>
            </a>
            <button style="margin-right:4px" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fas fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link <?php if($pageActive == 'home'){echo 'active';} ?>" href="home.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?php if($pageActive == 'services'){echo 'active';} ?>" href="services.php">Services</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?php if($pageActive == 'shop'){echo 'active';} ?>" href="shop.php">Shop Now</a>
					</li>
					<?php
					if(isset($_SESSION['user'])){
					?>
					<li class="nav-item">
						<a class="nav-link  <?php if($pageActive == 'dashboard'){echo 'active';} ?>" href="dashboard.php"> Dashboard</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="logout.php"> Logout</a>
					</li>
					<?php
					}else{
					?>
					<li class="nav-item">
						<a class="nav-link" href="signin.php"> Sign In</a>
					</li>
					<?php
					}
					?>
					<li class="nav-item">
						<a class="nav-link <?php if($pageActive == 'contact'){echo 'active';} ?>" href="contact.php">Contact</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?php if($pageActive == 'cart'){echo 'active';} ?>" href="cart2.php">
							<img src="images/shopping-basket-add.png" style="width:24px;height:24px" />
							<span style="color:red;font-weight: bold;">
								<?php
								$donate = 0;
								$wash = 0;
								if(isset($_SESSION['donate'])) {
									$donate = 1;
								}
								if(isset($_SESSION['wash'])) {
									$wash = 1;
								}
								if(isset($_SESSION['shopping_cart'])){
									echo sizeof($_SESSION['shopping_cart']) + $donate + $wash;
								}else {
									echo $donate + $wash;
								}
							 ?>
							 </span>
						</a>
					</li>
				</ul>
            </div>
        </div>
    </nav>