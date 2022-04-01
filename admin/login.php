<?php
session_start();
if(isset($_SESSION['admin'])) {
	header('location:index.php');
}


if(isset($_POST['login'])) {

	$email = $_POST['email'];
	$password = $_POST['password'];

	require 'connect.php';

    $sql="select * from admin where email='$email' and password='$password' ";
    $obj=$connect->prepare($sql);
    $obj->execute();

    if($obj->rowCount()>0){
        $_SESSION['admin'] = $email;
        header('location:index.php');
    }else{

        header('location:login.php?fail');
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <title>Admin panel - Login</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <!-- <link href="css/style.css" rel="stylesheet"> -->
    <!-- Custom CSS Edition -->
    <link href="css/mystyle.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<style type="text/css">
	* {
		margin: 0;
		padding: 0;
	}
	body {
		background-color: #f4f3f3;
		padding: 0;
		margin: 0;
	}
	.login-form {
		width: 35%;
		margin: 200px auto;
		background-color: #fff;
		padding: 10px;
		text-align: center;
		box-shadow: 3px 5px 15px rgba(0,0,0, .15);
	}
	.login-form label {
		float: left;
	}
	.error {
		background: #ff0000b0;
		padding: 10px;
		color: #fff;
		font-size: 16px;
	}
</style>

<body>



<div class="login-form">
	<?php
	if(isset($_GET['fail'])){
	?>
	<p class="error">Incorrect Email or Password !!</p>
	<?php
	}
	?>
	<form action="" method="POST">
		<h4>Login To Admin Panel</h4>
		<label>Email</label>
		<input type="email" class="form-control" name="email" placeholder="Your Email Address"><br>
		<label>Password</label>
		<input type="password" class="form-control" name="password" placeholder="Your Password"><br>
		<input type="submit" class="btn btn-primary btn-block" name="login" value="Login">
	</form>
</div>



</body>
</html>



