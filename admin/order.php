<?php
    include 'header.php';
    if(isset($_GET['id'])) {
        $order = $_GET['id'];
    }
?>
<style>
    .map {
      margin: 30px 0;
    }
    #map_canvas {height:300px;width:500px}
</style>
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
<?php
 $total = 0;
require 'connect.php';
$select_prod="select * from orders where id ='$order' ";
$data=  $connect->prepare($select_prod);
$data->execute();
if($data->rowCount()>0){
    $row= $data->fetch();
}
?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Order Details:
                        </h4>
                        <h5>User Email: <?php echo $row['user_email']; ?></h5>
                        <h5>Date: <?php echo $row['date']; ?></h5>
                        <?php
                        if($row['status'] == 1){
                        ?>
                        <button class="btn btn-success fa-sm">Received</button>
                        <?php
                        }else{
                        ?>
                        <button class="btn btn-primary fa-sm">Sent</button>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="index.php">Dashboard</a></li>
                            <li class="active">Orders</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">

                        <?php
                        $select_prod2="select * from order_products where order_id ='$order' ";
                        $data2=  $connect->prepare($select_prod2);
                        $data2->execute();
                        if($data2->rowCount()>0){
                            $res= $data2->fetchAll();
                        ?>

                        <div class="white-box" style="margin-bottom: 0%">
                            <h3 class="box-title">
                            Products 
                            </h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead style="border-bottom:3px solid #ededed ">
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                       
                            foreach($res as $result){
                                $product_id = $result['product_id'];
                                $select_prod3="select * from products where id='$product_id' ";
                                $data3=  $connect->prepare($select_prod3);
                                $data3->execute();
                                $res_product= $data3->fetch();

                                $pro_total = $result['quantity'] * $res_product['price'];
                                $total += $pro_total;
                                        ?>
                                        <tr>
                                            <td><img src="../uploads/<?php echo $res_product['image']; ?>" width="80"></td>
                                            <td><?php echo $res_product['name']; ?></td>
                                            <td><?php echo $res_product['description']; ?></td>
                                            <td><?php echo $res_product['category']; ?></td>
                                            <td><?php echo $res_product['price']; ?> JD</td>
                                            <td><?php echo $result['quantity']; ?></td>
                                            <td><?php echo $pro_total; ?> JD</td>
                                        </tr>
                                    <?php
                                    }
                                        ?>
                                        
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><strong><?php echo $total; ?> JD</strong></td> 
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php
                        }
                        ?>




                <?php
                if($row['wash'] > 0){
                ?>
                <div class="white-box" style="margin-bottom: 0%">
                    <h3 class="box-title">
                    Wash & Fold 
                    </h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $row['wash']; ?></td>
                                    <td>0.4 JD</td>
                                    <td><strong><?php echo $row['wash'] * 0.4; ?> JD</strong></td>
                                </tr>
                                <!--
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>Total: <strong><?php echo $row['wash'] * 0.4; ?> JD</strong></td>
                                </tr> -->
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
                    }
                ?>

                <div class="white-box">
                    <div class="table-responsive">
                        <table class="table">
                            
                                
                            <tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                                
                                <tr >
                                    <td style="border:0px solid white"></td>
                                            <td style="border:0px solid white"></td>
                                            
                                    <td style="border:4px dashed blue;text-align: center;font-size: 20px;color:black"><strong >Total Bill : <?php echo(($row['wash'] * 0.4)+ $total); ?> JD</strong></td> 
                                    <td style="border:0px solid white"></td>
                                            <td style="border:0px solid white"> </td>
                                </tr>
                            
                        </table>
                    </div>
                </div>





                <?php
                if($row['donate'] > 0){
                ?>
                <div class="white-box">
                    <h3 class="box-title">
                    Donation
                    </h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Pieces</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $row['donate']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
                    }
                ?>


                <?php
                if(!empty($row['lat']) && $row['lat'] != 0){
                ?>
                <div class="white-box">
                    <h3 class="box-title">
                    Location
                    </h3>
                    <div class="map">
                        <div class="map-content">
                            <div id="map_canvas" style="background-color: #ffffff"></div>
                            <input type="hidden" value="<?php echo $row['lat'] ?>" id="lat">
                            <input type="hidden" value="<?php echo $row['lng'] ?>" id="lng">
                        </div>
                    </div>           
                </div>
                <?php
                    }
                ?>



                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2020 &copy; DIAMOND DRY CLEANERS </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>



 <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=""youerapikeyhere""""&language=mr"></script>
  <script type="text/javascript">
        var map;
        var marker;
        var markersArray = [];
        function initialize()
        {
            var lat = document.getElementById('lat').value;
            var lng = document.getElementById('lng').value;
            var latlng = new google.maps.LatLng(lat, lng);
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




</body>

</html>