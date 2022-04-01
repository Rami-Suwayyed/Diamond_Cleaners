<?php
session_start();
if (isset($_GET['id'])){
	require 'connect.php';


	$code = $_GET['id'];

    $select_prod="select * from products where id='$code'";
    $data=  $connect->prepare($select_prod);
    $data->execute();

	$row = $data->fetch();

	$id = $row['id'];
	$name = $row['name'];
	$price = $row['price'];
	$image = $row['image'];
	$category = $row['category'];

	$cartArray = array(
		$code=>array(
		'id'=>$id,
		'name'=>$name,
		'price'=>$price,
		'quantity'=>1,
		'image'=>$image,
		'category'=>$category)
	);

	if(empty($_SESSION["shopping_cart"])) {
		$_SESSION["shopping_cart"] = $cartArray;
		// header('location:shop.php');
	}else{
		$array_keys = array_keys($_SESSION["shopping_cart"]);
		if(in_array($code,$array_keys)) {
			// header('location:shop.php');
		} else {
			$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
			// header('location:shop.php');
		}

		}
	echo "<script>window.history.back();</script>";	
}
?>