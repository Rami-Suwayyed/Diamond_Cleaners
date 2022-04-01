<?php

    session_start();

    if(isset($_SESSION['user'])) {
        header('location:home.php');
    }

    if(isset($_POST['signup'])) {

        require 'connect.php';

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = sha1($_POST['password']);


        $sql="insert into users (first_name,last_name,email,phone,password) values(:first_name, :last_name,:email, :phone, :password)";
        $obj=$connect->prepare($sql);
        $obj->execute(array(":first_name"=>$first_name,":last_name"=>$last_name,":email"=>$email,":phone"=>$phone,":password"=>$password));

        if($obj->rowCount()>0){

            header('location:signin.php?done');
        }else{

            echo "<script>alert('Error');</script>";
            header('location:signin.php');
        }

    }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Diamond Dry Cleaners - SignUp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Custom Theme files -->
    <link href="css/SignStyleSheet.css" rel="stylesheet" type="text/css" media="all" />
    <!-- //Custom Theme files -->
    <!-- web font -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- //web font -->
    <!-- fav and touch icons -->
    <script>
        function validateee() {
  var n1 = document.getElementById("pass1");
  var n2 = document.getElementById("pass2");
  if(n1.value != "" && n2.value != "") {
    if(n1.value == n2.value) {
      return true;
    }
  }
  document.getElementById("testt").innerHTML="Confirm Password Error";
  return false;
}
    </script>
    <link rel="shortcut icon" href="images/16D.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/144D.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/144D.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/72D.png">
    <link rel="apple-touch-icon-precomposed" href="images/57D.png">
</head>
<body>
    <!-- main -->
    <div class="main-w3layouts wrapper">
        <h1>Sign Up</h1>
        <div class="main-agileinfo">
            <div class="agileits-top">
                <form action="#" method="post" onsubmit="return validateee()">
                    <input class="text" type="text" name="first_name" placeholder="First Name" required="">
                    <input class="text ex" type="text" name="last_name" placeholder="Last Name" required="">
                    <input class="text ex" type="tel" name="phone" placeholder="Phone Number" required="">
                    <input class="text email" type="email" name="email" placeholder="Email" required="">
                    <input class="text" type="password" name="password" placeholder="Password" required="" id="pass1">
                    <input class="text w3lpass" type="password" name="confirm_password" placeholder="Confirm Password" required="" id="pass2">
                    <div class="wthree-text">

                        <div class="clear"></div>
                    </div>
                    <p id="testt" style="color: red;font-weight:bold;"></p>
                    <input type="submit" value="SIGNUP" name="signup">
                    
                </form>
                <p>Already have an account? <a href="signin.php">Login Now!</a></p>
            </div>
        </div>
        <!-- copyright -->
        <div class="colorlibcopy-agile">
            <p>Back to <a style="text-decoration:underline" href="home.php">Home</a></p>
        </div>
        <!-- //copyright -->
        <ul class="colorlib-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    <!-- //main -->

    
</body>
</html>
