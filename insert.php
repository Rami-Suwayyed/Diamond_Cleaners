<?php
session_start();
if(isset($_GET['random'])) {
	$random = $_GET['random'];
    require 'connect.php';

    $select_prod="select * from orders where random='$random' ";
    $data=  $connect->prepare($select_prod);
    $data->execute();
    $row = $data->fetch();

    $order_id = $row['id'];

    if(isset($_SESSION['shopping_cart']) && !empty($_SESSION['shopping_cart'])){

       foreach($_SESSION['shopping_cart'] as $product) {

          $product_id = $product['id'];
          $quantity = $product['quantity'];
          $user = $_SESSION['user'];

          $sql="insert into order_products (product_id,quantity,order_id) values(:product_id, :quantity, :order_id)";
          $obj=$connect->prepare($sql);
          $obj->execute(array(":product_id"=>$product_id,":quantity"=>$quantity,":order_id"=>$order_id));

          if($obj->rowCount()>0){
              header('location:order_sent.php');
          }else{

              echo "<script>alert('Error');</script>";
              header('location:cart2.php');
          }
       }

    }else {
    	header('location:order_sent.php');
    }






}


?>