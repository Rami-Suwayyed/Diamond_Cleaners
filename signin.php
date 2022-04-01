<?php
    session_start();

    if(isset($_SESSION['user'])) {
        header('location:home.php');
    }

    if(isset($_POST['signin'])) {
        require 'connect.php';

        $email = $_POST['email'];
        $password = sha1($_POST['password']);

        $sql="select * from users where email='$email' and password='$password' ";
        $obj=$connect->prepare($sql);
        $obj->execute();

        if($obj->rowCount()>0){
            $_SESSION['user'] = $email;
            header('location:home.php');
        }else{

            header('location:signin.php?fail');
        }
    }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Diamond Dry Cleaners - SignIn</title>
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
    <link rel="shortcut icon" href="images/16D.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/144D.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/144D.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/72D.png">
    <link rel="apple-touch-icon-precomposed" href="images/57D.png">
</head>
<body>
    <!-- main -->
    <div class="main-w3layouts wrapper">
        <h1>Sign In</h1>
        <div class="main-agileinfo">
            <div class="agileits-top">
                <form action="#" method="post">
                    <?php
                    if(isset($_GET['done'])){
                    ?>
                    <p>Email Registered Successfully!!</p>
                    <?php
                }else if(isset($_GET['fail'])){
                    ?>
                    <p>incorrect email or password</p>
                    <?php
                }else if(isset($_GET['need_login'])){
                    ?>
                    <p>You Must Login To Add to Cart</p>
                    <?php
                }
                    ?>
                    <input class="text email" type="email" name="email" placeholder="Email" required="">
                    <input class="text" type="password" name="password" placeholder="Password" required="">
                    <div class="wthree-text">

                        <div class="clear"></div>
                    </div>
                    <input type="submit" value="SIGNIN" name="signin">
                </form>
                <p>Don't have an account? <a href="signup.php">Sign Up!</a></p>
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
