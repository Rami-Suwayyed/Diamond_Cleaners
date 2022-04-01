<?php

session_start();
foreach ($_SESSION["shopping_cart"] as $select => $val) {
    unset($_SESSION["shopping_cart"][$select]);
}

if (!empty($_SESSION["wash"])) {
unset($_SESSION['wash']);
}

if (!empty($_SESSION["donate"])) {
unset($_SESSION['donate']);
}

header('location:cart2.php');