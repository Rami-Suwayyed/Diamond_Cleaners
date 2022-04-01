<?php
error_reporting(0);
$item_id = $_GET["id"];
session_start();

if (!empty($_SESSION["shopping_cart"])) {
    foreach ($_SESSION["shopping_cart"] as $select => $val) {
        if($val["id"] == $item_id)
        {
            unset($_SESSION["shopping_cart"][$select]);
        }
    }
    header('location:cart2.php');
}

if(isset($_GET['num'])) {
	if (!empty($_SESSION["wash"])) {
	unset($_SESSION['wash']);
	header('location:cart2.php');
	}
}

if(isset($_GET['donate'])) {
	if (!empty($_SESSION["donate"])) {
	unset($_SESSION['donate']);
	header('location:cart2.php');
	}
}

?>