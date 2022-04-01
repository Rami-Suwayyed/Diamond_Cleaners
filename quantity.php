<?php
session_start();
if(isset($_GET['id']) && isset($_GET['quantity'])) {

	foreach($_SESSION["shopping_cart"] as &$value){
	  if($value['id'] === $_GET["id"]){
	      $value['quantity'] = $_GET["quantity"];
	      break; // Stop the loop after we've found the product
	  }
	}

	echo "<script>window.history.back();</script>";
}




?>