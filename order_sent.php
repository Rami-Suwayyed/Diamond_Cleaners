<?php
	
	$pageName = 'Order Sent';
	include 'header.php';

    if(!empty($_SESSION['shopping_cart'])){
        foreach ($_SESSION["shopping_cart"] as $select => $val) {
            unset($_SESSION["shopping_cart"][$select]);
        }       
    }


    if (!empty($_SESSION["wash"])) {
    unset($_SESSION['wash']);
    }

    if (!empty($_SESSION["donate"])) {
    unset($_SESSION['donate']);
    }


?>
	
<style>

    .success {
        text-align: center;
    }

    .success i {
        background-color: #008000b3;
        color: #fff;
        padding: 20px;
        border-radius: 50%;
        margin: 20px 0;
    }

</style>



    <!-- Page Content -->

        <div class="contact-main">
    		<div class="container success">
                <h2 class="text-center">Your Order Sent Successfully !!</h2>
                <i class="fa fa-check fa-5x"></i>
                <h5><a href="dashboard.php" class="btn btn-success">Go To Dashboard</a></h5>
    		</div>
    		<!-- /.container -->
    	</div>





    <!-- /.container -->
  <?php

    include 'footer.php';

 ?>