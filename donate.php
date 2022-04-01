<?php

  $pageName = 'Donate';
  $pageActive = 'shop';
  include 'header.php';

?>

	<!-- Page Heading/Breadcrumbs -->

       <div class="full-title2">
    		<div class="container">
    			<h1 class="mt-4 mb-3"> Donation </h1>
    			<div class="breadcrumb-main">
    				<ol class="breadcrumb">
    					<li class="breadcrumb-item">
    						<a href="home.php">Home</a>
    					</li>
    					<li class="breadcrumb-item active"  id="Donate">Donation</li>
    				</ol>
    			</div>
    		</div>
    	</div>
 <div class="full-title3" >
   <div class="container" style="border-bottom: #ededed 3px solid;">
     <div class="dodo container">
       <ol class="dede  active">
         <li class="dede" >
           <a href="shop.php?type=dry_clean">Dry Clean</a>
         </li>
         <li class="dede">
           <a href="shop.php?type=iron_press">Iron Press</a>
         </li>
         <li class="dede">
           <a href="shop.php?type=wash">Wash & Fold</a>
         </li>
         <li class="dede">
           <a href="shop.php?type=other_clean">Carpet & Other Clean</a>
         </li>
         <li class="dede active">
           <a href="donate.php">Donation</a>
         </li>
       </ol>

     </div>
   </div>
 </div>





    <!-- Page Content -->

    	<div class="container">
            <div class="about-main" >
                <div class="row" >
    				<div class="col-lg-5 card-body" style="background-color:navy; border-radius:50px 0px 0px 0px">
                      <img class="img-fluid rounded" src="images/kaka.jpg" style="padding-top:5px" alt="" />
                   </div>
                   <div class="col-lg-3 "  style="background-color:darkblue;border-radius:0px 0px 50px 0px;padding-top:50px">
    				   <p style="color:white">Choose how many items to donate:</p>
    				   <form action="add-to-cart.php" method="GET">
	                     <input type="number" min="3" name="donate" value="3" id="donate" style="border:2px inset #1292ec;padding-left:10px;width:30%;border-radius:5px" required data-validation-required-message="Choose how many items to donate">
	    					   <p style="font-size:10px;color:beige">At Least Three Items</p><br />
	    				<button type="submit" class="btn btn-primary" id="donatebtn" style="margin-top:30px;margin-left:30%;margin-bottom:5%">Donate</button>
    					</form>
                   </div>

                </div>
                <!-- /.row -->
            </div>
    	</div>













    <!-- /.container -->
    <!--footer starts from here-->
    <footer class="footer">
        <div class="container bottom_border">
            <div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6 col" style="text-align:center">
					<h5 class="headin5_amrc col_white_amrc pt2">About Us</h5>
					<!--headin5_amrc-->
					<p class="mb10">We offer pickup and delivery dry cleaning to homes, businesses, office parks and more. You get to skip the trip to the store, save the power, and still get cleaner, brighter, softer, odor free clothes delivered right to your door.</p>
					<ul class="footer-social">

						<li><a class="facebook hb-xs-margin" href="#"><span class="hb hb-xs spin hb-facebook"><i class="fab fa-facebook-f"></i></span></a></li>
						<li></li>
						<li><a class="twitter hb-xs-margin" href="#"><span class="hb hb-xs spin hb-twitter"><i class="fab fa-twitter"></i></span></a></li>
						<li></li>
						<li><a class="instagram hb-xs-margin" href="#"><span class="hb hb-xs spin hb-instagram"><i class="fab fa-instagram"></i></span></a></li>
					</ul>
				</div>


				<div class="col-lg-3 col-md-6 col-sm-6"  style="text-align:center">
					<h5 class="headin5_amrc col_white_amrc pt2" >Why Choose Us?</h5>
					<!--headin5_amrc-->
					<ul class="footer_ul_amrc" >
						<li style="color:#CCC"><i ></i>  Reasonable price</li>
						<li style="color:#CCC"><i ></i>  Time Saving</li>
						<li style="color:#CCC"><i ></i>  Professional Quality</li>
						<li style="color:#CCC"><i ></i>  Easy to use Website</li>
						<li style="color:#CCC"><i ></i>  Door Step Pick-up and Delivery</li>
					</ul>
					<!--footer_ul_amrc ends here-->
				</div>


				<div class="col-lg-3 col-md-6 col-sm-6 d-n"  >
					<h5 class="headin5_amrc col_white_amrc pt2" style="text-align:center">Popular Services</h5>
					<!--headin5_amrc-->
					<ul class="footer_ul_amrc" style="text-align:center">
						<li style="color:#CCC"><i ></i>Dry Cleaning</li>
						<li style="color: #CCC"><i></i>Laundry & Service Wash</li>
						<li style="color: #CCC "><i></i>Ironing Service</li>
						<li style="color:#CCC"><i></i>Carpet, Curtain & Others Cleaning</li>
						<li style="color:whitesmoke; text-decoration: underline;"><a href="Services.html"><i></i>See All Services</a></li>
					</ul>
					<!--footer_ul_amrc ends here-->
				</div>


				<div class="col-lg-3 col-md-6 col-sm-6 " style="text-align:center;">
					<div class="news-box">
						<h5 class="headin5_amrc col_white_amrc pt2">Our Partner </h5>
						<div style="text-align:center">
							<a href="https://www.zuj.edu.jo/"><img src="images/ZujLogo.png" /></a>
						</div>
						<a href="https://www.zuj.edu.jo/"><p style="color:limegreen">Al-Zaytoonah University Of Jordan</p></a>
					</div>
				</div>


			</div>
		</div>
        <div class="container">
            <p class="copyright text-center">All Rights Reserved. &copy; 2020 <a href="#">Diamond</a> Design By :
				<a href="#">Diamond Technology</a>
            </p>
        </div>
    </footer>
</div>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/isotope.pkgd.min.js"></script>
<script src="js/filter.js"></script>
<script src="js/jquery.appear.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.fancybox.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
