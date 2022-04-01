<?php
 
  $pageName = 'Dashboard';
  $pageActive = 'dashboard';
  include 'header.php';

  if(!isset($_SESSION['user'])) {
    header('location:home.php');
  }

  if(isset($_POST['confirm'])) {
    $order_id = $_POST['order_id'];
    require 'connect.php';

    $sql_edit ="update orders set status = 1 where id= '$order_id' ";
    $obj_edit = $connect->prepare($sql_edit);
    $obj_edit->execute();

    header('location:dashboard.php?done');

  }

  if(isset($_POST['review'])) {

    require 'connect.php';

    $review = $_POST['review'];
    $user = $_SESSION['user'];

    $sql="insert into reviews (review,user_email) values(:review, :user_email)";
    $obj=$connect->prepare($sql);
    $obj->execute(array(":review"=>$review,":user_email"=>$user));

    if($obj->rowCount()>0){
        header('location:dashboard.php?review_sent');
    }else{
        echo "<script>alert('Error');</script>";
        header('location:dashboard.php');
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
    .review {
      background-color: #fff;
      width: 50%;
      margin: 10px auto;
      padding: 10px;
      text-align: center;
      font-size: 20px;
      box-shadow: 3px 5px 15px rgba(0,0,0, .15);
      border: 1px solid #ccc;
    }
    #reviewForm {
      margin: 10px 0;
      display: none;
    }
    #reviewForm input {
      margin: 10px 0;
    }
  </style>

  <!-- full Title -->
 <div class="full-title2">
   <div class="container">
     <!-- Page Heading/Breadcrumbs -->
     <h1 class="mt-4 mb-3"> Dashboard </h1>
     <div class="breadcrumb-main">
       <ol class="breadcrumb">
         <li class="breadcrumb-item">
           <a href="home.php">Home</a>
         </li>
         <li class="breadcrumb-item active"  id="DryClean">Dashboard</li>
       </ol>
     </div>
   </div>
 </div>


  <?php
  if(isset($_GET['done'])){
  ?>
  <div class="review">
    <p style=""><i class="fa fa-check"></i> Order Received</p>
    <a href="#" class="btn btn-info" id="review_btn">
      <i class="fa fa-star"></i> Service Review
    </a> 

    <form action="" method="POST" id="reviewForm">
      <label>Service Review:</label>
      <textarea name="review" class="form-control" placeholder="Write Your Review:"></textarea>
      <input type="submit" class="btn btn-primary" name="review-btn" value="Send">
    </form>

  </div>

  <?php
}
  ?>


  <?php
  if(isset($_GET['review_sent'])){
  ?>
  <p class="review" style="background-color: #008000ad;color:#fff"><i class="fa fa-check"></i> Review Sent</p>
  <?php
}
  ?>




    <!-- Page Content -->
    <div class="cart-content">
      <h4 class="mb-4"><i class="fa fa-th-large"></i> Dashboard</h4>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Order</th>
              <th>date</th>
              <th>Confirm</th>
            </tr>
          </thead>
          <tbody>
              <?php
              require 'connect.php';
              $user = $_SESSION['user'];
              $select_prod="select * from orders where user_email='$user' order by id desc";
              $data=  $connect->prepare($select_prod);
              $data->execute();
              $row = $data->fetch();
              if($data->rowCount() > 0){
              ?>
              <form action="" method="POST">
                <tr>
                  <td>Your Order</td>
                  <td><?php echo $row['date']; ?></td>
                  <?php
                  if($row['status'] == 0){
                    ?>
                  <td><input class="btn btn-success" type="submit" name="confirm" value="Confirm Receive" onclick="conf()"></td>
                  <td><input type="hidden" name="order_id" value="<?php echo $row['id']; ?>"></td>
                  <?php
                }else{
                ?>
                <td><button class="btn btn-success">Received</button></td>
                <?php
              }
              ?>
                </tr>
            </form>
            <?php
          }else{
            ?>
          <tr><td>No Orders</td></tr>
          <?php
        }
        ?>
          </tbody>
        </table>
      </div>


    </div>


    <!-- /.container -->
 <?php
  include 'footer.php';
 ?>

 <script>

  $('#review_btn').click(function(e){

    e.preventDefault();

    $(this).hide();

    $('#reviewForm').show();

  });

function conf(){
var result = confirm("Do you want to Confirm Receive?");

if (result == true) {
  alert("Confirmed");
}
else {
  alert("Thanks");
}
}
 </script>