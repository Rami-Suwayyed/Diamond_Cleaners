<?php


if(isset($_GET['add'])) {

	$review = $_GET['add'];
	require 'connect.php';

    $sql_edit ="update reviews set homepage = 1 where id= '$review' ";
    $obj_edit = $connect->prepare($sql_edit);
    $obj_edit->execute();

    header('location:reviews.php?added');

}


if(isset($_GET['remove'])) {

	$review = $_GET['remove'];
	require 'connect.php';

    $sql_edit ="update reviews set homepage = 0 where id= '$review' ";
    $obj_edit = $connect->prepare($sql_edit);
    $obj_edit->execute();

    header('location:reviews.php?removed');

}