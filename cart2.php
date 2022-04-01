<?php
 
  $pageName = 'Cart';
  $pageActive = 'cart';
  include 'header.php';

  if(isset($_POST['send'])) {

    if(!isset($_SESSION['user'])) {
      header('location:signin.php');
    }
    
    $user = $_SESSION['user'];
    $payment = $_POST['payment'];

    $lat =0;
    $lng =0;

    if(isset($_SESSION['wash']) && !empty($_SESSION['wash'])) {
      // $wash = $_SESSION['wash'][sizeof($_SESSION['wash'])-1];
      $wash = $_POST['wash'];
    }
    if(isset($_SESSION['donate']) && !empty($_SESSION['donate'])) {
      // $donate = $_SESSION['donate'][sizeof($_SESSION['donate'])-1];
      $donate = $_POST['donate'];
    }
    


    require 'connect.php';
    $random = rand(1,100000000);

    $lat = $_POST['txtLat'];
    $lng = $_POST['txtLng'];

    $sql="insert into orders (user_email,wash,payment,donate,random,lat,lng) values(:user_email, :wash, :payment, :donate, :random, :lat, :lng)";
    $obj=$connect->prepare($sql);
    $obj->execute(array(":user_email"=>$user,":wash"=>$wash,":payment"=>$payment,":donate"=>$donate,":random"=>$random,":lat"=>$lat,":lng"=>$lng));

    if($obj->rowCount()>0){
        header('location:insert.php?random='.$random);
    }else{

        echo "<script>alert('Error');</script>";
        header('location:cart2.php');
    }

  }



?>

  <style type="text/css">

    .cart-content {
      background-color: #fff;
      width: 50%;
      margin: 40px auto;
      padding: 10px;
      text-align: center;
      border: 1px solid #ccc;
      border-radius: 10px;
      box-shadow: 3px 5px 15px rgba(0,0,0, .15);
    }
    .cart-content ul {
      list-style: none;
      padding: 0;
    }
    .cart-content ul li {
      background-color: #f7f7f7;
      border: 1px solid #ccc;
    }
    .cart-content .media {
      padding: 10px;
      text-align: left;
    }
    .cart-content .media .media-body {
      position: relative;
    }
    .cart-content .media .media-body span {
      position: absolute;
      top: 0;
      right: 0;
    }
    .cart-content .media .media-body span a {
      color: red;
    }
    .quantity {
      border: 2px inset #1292ec;
      padding-left: 10px;
      width: 30%;
      border-radius: 5px;
    }
    #total {
      width: 100px;
      text-align: center;
      border: 1px solid #ccc;
      border-radius: 5px;
      margin: 10px 0;
    }
    #total:hover {
      cursor: default;
    }
    .map {
      margin: 30px 0;
    }
    #map_canvas {height:300px;width:500px}
    @media(max-width: 576px) {
      .cart-content {
        width: 100%;
      }
    }
  </style>

  <!-- full Title -->
 <div class="full-title2">
   <div class="container">
     <!-- Page Heading/Breadcrumbs -->
     <h1 class="mt-4 mb-3"> Cart </h1>
     <div class="breadcrumb-main">
       <ol class="breadcrumb">
         <li class="breadcrumb-item">
           <a href="home.php">Home</a>
         </li>
         <li class="breadcrumb-item active"  id="DryClean">Cart</li>
       </ol>
     </div>
   </div>
 </div>



    <!-- Page Content -->

    <div class="cart-content">
      <h4 class="mb-4"><i class="fa fa-shopping-cart"></i> Your Cart</h4>
      <span><a href="clear_cart.php">Clear Cart</a></span>
      <ul>
            <?php

            include 'connect.php';
            $products_price = 0;
            $val = 0;
            $donate_val = 0;
            if(isset($_SESSION['shopping_cart'])){
            foreach($_SESSION['shopping_cart'] as $product){
              $products_price += ($product["price"]*$product["quantity"]);
            ?>

        <li class="mt-2">
          <div class="media">
            <img src="uploads/<?php echo $product['image']; ?>" width="100" height="110" class="mr-3">
            <div class="media-body">
              <h5 class="mt-0" style="display: inline;"><?php echo $product['name']; ?></h5>
              <p ><?php echo $product['category']; ?></p>
              <p><?php echo $product['price']." JD"; ?></p>
              <form method='get' action='quantity.php'>
                <input type='hidden' name='id' value="<?php echo $product["id"]; ?>" />
                <!-- <input type='hidden' name='action' value="change" /> -->
                <select name='quantity' class='quantity' onchange="this.form.submit()">
                  <option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
                  <option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
                  <option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
                  <option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
                  <option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
                  <option <?php if($product["quantity"]==6) echo "selected";?> value="6">6</option>
                  <option <?php if($product["quantity"]==7) echo "selected";?> value="7">7</option>
                  <option <?php if($product["quantity"]==8) echo "selected";?> value="8">8</option>
                  <option <?php if($product["quantity"]==9) echo "selected";?> value="9">9</option>
                  <option <?php if($product["quantity"]==10) echo "selected";?> value="10">10</option>
                </select>
              </form>
              <span><a href="remove-from-cart.php?id=<?php echo $product['id']; ?>"><i class="fa fa-remove fa-lg"></i></a></span>
            </div>
          </div>
        </li>
        <?php
      }
    }else{
      echo "You Don't Have Products in Your Cart";
    }
        ?>
      </ul>
      <input type="hidden" value="<?php echo $products_price; ?>" id="all_pro">
      <ul>

        <?php
            if(isset($_SESSION['wash']) && !empty($_SESSION["wash"])){
              $number = $_SESSION['wash'][sizeof($_SESSION['wash'])-1];
              $val = $_SESSION['wash'][sizeof($_SESSION['wash'])-1] * 0.4;
        ?>
        <li class="mt-2">
          <div class="media">
            <img src="images/koko.jpg" width="80" height="80" class="mr-3">
            <div class="media-body">
              <h5 class="mt-0">Wash
              </h5>
              <input style="width: 45px;text-align: center;background-color: #f7f7f7;border: 0" type="text" id="wash_msg" value="<?php echo $val; ?>" readonly=""> JD <br>
              <select id="wash_qua" class="quantity">
                <option selected="true">5</option>
                <option>10</option>
                <option>15</option>
                <option>20</option>
                <option>25</option>
                <option>30</option>
                <option>35</option>
                <option>40</option>
                <option>45</option>
                <option>50</option>
              </select>
              <span><a href="remove-from-cart.php?num=<?php echo $_SESSION['wash'][sizeof($_SESSION['wash'])-1]; ?>"><i class="fa fa-remove fa-lg"></i></a></span>
            </div>
          </div>
        </li>
        <?php
      }
        ?>
      </ul>


      <ul>
        <?php
            if(isset($_SESSION['donate']) && !empty($_SESSION["donate"])){

              $donate_val = $_SESSION['donate'][sizeof($_SESSION['donate'])-1];
        ?>
        <li class="mt-2">
          <div class="media">
            <img src="images/kaka.jpg" width="80" height="80" class="mr-3">
            <div class="media-body">
              <h5 class="mt-0">Donate 
               <span>
                 <input class="quantity" type="number" min="3" id="donate_qua" value="<?php echo $donate_val; ?>">
               </span>
              </h5>
              <p>Free</p>
              <span><a href="remove-from-cart.php?donate=<?php echo $_SESSION['donate'][sizeof($_SESSION['donate'])-1]; ?>"><i class="fa fa-remove fa-lg"></i></a></span>
            </div>
          </div>
        </li>
        <?php
      }
        ?>
      </ul>




      <?php
      if(!empty($_SESSION["shopping_cart"]) || !empty($_SESSION["wash"]) || !empty($_SESSION["donate"])){
      ?>
      <form action="" method="POST">
        <h5 style="border-bottom: 1px solid #ccc">Total: 
          <input type="text" value="<?php echo $products_price + $val; ?>" readonly="" id="total"> JD
        </h5>
        <label style="margin: 10px 0 5px;">Payment method</label>
        <select name="payment" required="required" class="form-control">
          <option value="On Delivery">On Delivery</option>
          <option value="Paypal">Paypal</option>
          <option value="Credit Card">Credit Card</option>
        </select><br>
        <!-- Map Inputs -->
        <input type="hidden" id="txtLat" name="txtLat">
        <input type="hidden" id="txtLng" name="txtLng">

        <!-- Wash Values -->
        <input type="hidden" name="wash" value="" id="wash_input_values">
        <!-- Donation Values -->
        <input type="hidden" name="donate" value="3" id="donate_input_values">
        
        <div class="map" id="map_div" >
          <h5>Select Location To Delivery: </h5>
          <div class="map-content" >
            <div id="map_canvas" style="background-color: #ffffff;position: relative;margin:auto"></div>
          </div>
        </div>

        <input type="submit" id="go" class="btn btn-primary" value="Checkout" name="send" disabled="disabled">

      </form>
      <?php
    }
    ?>
    </div>


    <!-- /.container -->
 <?php
  include 'footer.php';
 ?>
  
 <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=""AIzaSyAXKZ3HwCwBjCaW-8GAX1qFxf01w1NtxgU""""&language=en"></script>



  <script type="text/javascript">
        var map;
        var marker;
        var markersArray = [];
        function initialize()
        {
            var latlng = new google.maps.LatLng(31.944531602666565, 35.92661056586186);
                var mapOptions = {
                zoom: 13,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
    google.maps.event.addListener(map, 'click', function(event) {
    if (marker) {
    marker.setMap(null);    //code          
    }
        //adding marker
    document.getElementById('txtLat').value=event.latLng.lat();
    document.getElementById('txtLng').value=event.latLng.lng();
      marker= new google.maps.Marker({
      position: event.latLng,
      map: map,
      title: 'pune'
  });
      //creting info window instance
      var infowindow = new google.maps.InfoWindow({
      content: 'selected location'
  });
      //adding pointer click event to open infowindow
    google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });
  });
}
google.maps.event.addDomListener(window, 'load', initialize);
    </script>



    <script>
      $('#map_div').click(function(){
        //$('#go').show();
        document.getElementById("go").removeAttribute("disabled");
      })
    </script>