<?php
	
	$pageName = 'Contact';
	$pageActive = 'contact';
	include 'header.php';

    if(isset($_POST['msg_user'])) {

        $user = $_SESSION['user'];
        $message = $_POST['message'];

        require 'connect.php';

        $sql="insert into messages (message,user_email) values(:message, :user_email)";
        $obj=$connect->prepare($sql);
        $obj->execute(array(":message"=>$message,":user_email"=>$user));

        if($obj->rowCount()>0){
            header('location:contact.php?sent');
        }else{
            echo "<script>alert('Error');</script>";
            header('location:contact.php');
        }

    }

    if(isset($_POST['msg'])) {

        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        require 'connect.php';

        $sql="insert into messages (name,phone,email,message) values(:name, :phone, :email, :message)";
        $obj=$connect->prepare($sql);
        $obj->execute(array(":name"=>$name,":phone"=>$phone,":email"=>$email,":message"=>$message));

        if($obj->rowCount()>0){
            header('location:contact.php?sent');
        }else{
            echo "<script>alert('Error');</script>";
            header('location:contact.php');
        }  
    }



?>



<!-- full Title -->
    	<div class="full-title">
    		<div class="container">
    			<!-- Page Heading/Breadcrumbs -->
    			<h1 class="mt-4 mb-3"> Contact </h1>
    			<div class="breadcrumb-main">
    				<ol class="breadcrumb">
    					<li class="breadcrumb-item">
    						<a href="Home.html">Home</a>
    					</li>
    					<li class="breadcrumb-item active">Contact</li>
    				</ol>
    			</div>
    		</div>
    	</div>




    <!-- Page Content -->

        <div class="contact-main">
    		<div class="container">
    			<!-- Content Row -->
    		  <div class="row">
    			<!-- Map Column -->
    				<div class="col-lg-8 mb-4 contact-left">
                        <?php
                        if(isset($_GET['sent'])){
                        ?>
                        <p style="background-color: #008000bf;color:#fff;padding: 10px;text-align: center;">Message Sent !</p>
                        <?php
                            }
                        ?>
    					<h3>Send us a Message</h3>
                        <?php
                        if(isset($_SESSION['user'])){
                        ?>
                        <form action="" method="POST" id="contactForm" >
                            <div class="control-group form-group">
                                <div class="controls">
                                    <textarea rows="5" cols="100" placeholder="Message" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none" name="message"></textarea>
                                </div>
                            </div>
                            <button type="submit" name="msg_user" class="btn btn-primary" id="sendMessageButton">Send Message</button>
                        </form>
                        <?php
                    }else{
                        ?>
    					<form action="" method="POST" id="contactForm" >
    						<div class="control-group form-group">
    							<div class="controls">
    								<input type="text" name="name" placeholder="Full Name" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
    								<p class="help-block"></p>
    							</div>
    						</div>
    						<div class="control-group form-group">
    							<div class="controls">
    								<input type="tel" name="phone" placeholder="Phone Number" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number.">
    							</div>
    						</div>
    						<div class="control-group form-group">
    							<div class="controls">
    								<input type="email" name="email" placeholder="Email Address" class="form-control" id="email" required data-validation-required-message="Please enter your email address.">
    							</div>
    						</div>
    						<div class="control-group form-group">
    							<div class="controls">
    								<textarea rows="5" name="message" cols="100" placeholder="Message" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
    							</div>
    						</div>
    						<div id="success"></div>
    						<!-- For success/fail messages -->
    						<button type="submit" name="msg" class="btn btn-primary" id="sendMessageButton">Send Message</button>
    					</form>
                        <?php
                    }
                        ?>
    				</div>
    				<!-- Contact Details Column -->
    					<div class="col-lg-4 mb-4 contact-right">
    					<h3>Contact Details</h3>
    					<p>
    						Amman, Jordan
    						<br>Al-Sweifieh
    						<br>Paris-St 18
    					</p>
    					<p>
    						<abbr title="Phone"><img src="images/Phone.png" /></abbr>  : 06 5134 982
    					</p>
    					<p>
    						<abbr title="Email"><img src="images/email.png" /></abbr>  :
    						<a href="mailto:info@DiamondCleaners.com"> info@DiamondCleaners.com </a>
    					</p>
    					<p>
    						<abbr title="Hours"><img src="images/clock1.png" /></abbr>  : Saturday-Thursday: 9:00 AM to 6:00 PM
    					</p>
    						<p>
    						<a href="#"><img src="images/facebook2.png"/></a >&nbsp;&nbsp;<a href="#"><img src="images/twitter(1).png" /></a>&nbsp;&nbsp;<a h	ref="#"><img src="images/instagram(1).png" /></a>
    					</p>
    				</div>
    			</div>
    			<!-- /.row -->
    		</div>
    		<!-- /.container -->
    	</div>

    	<div class="map-main">
    		<!-- Embedded Google Map -->
    		<iframe width="100%" height="500px" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3385.1877069248017!2d35.85771781504967!3d31.95580403270864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151ca1101c91eded%3A0x548f884fc2e78605!2sParis%20St.%2018%2C%20Amman!5e0!3m2!1sen!2sjo!4v1585843700411!5m2!1sen!2sjo"></iframe>
    	</div>












    <!-- /.container -->
  <?php

    include 'footer.php';

 ?>