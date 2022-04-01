<?php


if(isset($_GET['id'])) {

    require 'connect.php';

    // Product ID
    $id = $_GET['id'];

    $select_prod="DELETE FROM products WHERE id='$id'";
    $data=  $connect->prepare($select_prod);
    $data->execute();
    if($data->rowCount() > 0){
    	header('location:products.php?deleted');
    }

}