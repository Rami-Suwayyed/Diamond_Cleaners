<?php
session_start();

if(isset($_GET['id'])){

	if(!isset($_SESSION['cart'])){
		$_SESSION['cart']= array();
	}
		
	$temp=array();
	$temp= $_SESSION['cart'];
	
	if(!in_array($_GET['id'],$temp)){
		$temp[]= $_GET['id'];
	}

	$_SESSION['cart']= $temp;


	// header('location:shop.php');
}


if(isset($_GET['num'])) {

	if(!isset($_SESSION['wash'])){
		$_SESSION['wash']= array();
	}
	$temp=array();
	$temp= $_SESSION['wash'];
	if(!in_array($_GET['num'],$temp)){

		$temp[]= $_GET['num'];
	}

	$_SESSION['wash']= $temp;


	// header('location:shop.php');
	echo "<script>window.history.back();</script>";

}

if(isset($_GET['donate'])) {

	if(!isset($_SESSION['donate'])){
		$_SESSION['donate']= array();
	}
	$temp=array();
	$temp= $_SESSION['donate'];
	if(!in_array($_GET['donate'],$temp)){

		$temp[]= $_GET['donate'];
	}

	$_SESSION['donate']= $temp;

	// header('location:shop.php');

	echo "<script>window.history.back();</script>";

}



?>