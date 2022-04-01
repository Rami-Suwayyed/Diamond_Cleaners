<?php

  $pageName = 'Shop';
  $pageActive = 'shop';
  include 'header.php';

  if(isset($_GET['type'])) {
    $cat = $_GET['type'];
  }else{
    header('location:shop.php?type='.'dry_clean');
  }

?>

        <!-- full Title -->
 <div class="full-title2">
   <div class="container">
     <!-- Page Heading/Breadcrumbs -->
     <h1 class="mt-4 mb-3"> Shop </h1>
     <div class="breadcrumb-main">
       <ol class="breadcrumb">
         <li class="breadcrumb-item">
           <a href="Home.php">Home</a>
         </li>
         <li class="breadcrumb-item active"  id="DryClean">Shop</li>
       </ol>
     </div>
   </div>
 </div>
 <div class="full-title3" >
   <div class="container" style="border-bottom: #ededed 3px solid;">
     <div class="dodo container">
       <ol class="dede  active">
         <li class="dede <?php if($cat == 'dry_clean'){echo 'active';} ?>" >
           <a href="shop.php?type=dry_clean">Dry Clean</a>
         </li>
         <li class="dede <?php if($cat == 'iron_press'){echo 'active';} ?>">
           <a href="shop.php?type=iron_press">Iron Press</a>
         </li>
         <li class="dede <?php if($cat == 'wash'){echo 'active';} ?>">
           <a href="shop.php?type=wash">Wash & Fold</a>
         </li>
         <li class="dede <?php if($cat == 'other_clean'){echo 'active';} ?>">
           <a href="shop.php?type=other_clean">Carpet & Other Clean</a>
         </li>
         <li class="dede">
           <a href="donate.php">Donation</a>
         </li>
       </ol>

     </div>
   </div>
 </div>

 


<?php
if($cat == 'dry_clean'){
?>
    <!-- Page Content -->

 <div class="portfolio-col">
   <div class="container">
     <div class="row">
        <?php
        require 'connect.php';
        $select_prod="select * from products where category='Dry Clean' order by id ";
        $data=  $connect->prepare($select_prod);
        $data->execute();
        if($data->rowCount()>0){
            $count = 0;
            $rows= $data->fetchAll();
            foreach ($rows as $row) {
                $count++;
            ?>
       <div class="col-lg-2 col-md-4 col-sm-6 portfolio-item">
         <div class="card h-100">
           <a class="hover-box" href="add.php?id=<?php echo $row['id']; ?>">
             <div class="dot-full">
               <i class="fas fa-plus"></i>
             </div>
             <img class="card-img-top" src="uploads/<?php echo $row['image']; ?>" alt="" />
           </a>
           <div class="card-body">
             <h5><a href="#"><?php echo $row['price']; ?> JD</a></h5>
             <h4><a href="#"><?php echo $row['name']; ?></a></h4>
             <p><?php echo $row['description']; ?></p>
           </div>
         </div>
       </div>

       <?php
     }
   }else{
    echo "<div style='text-align:center;width:100%;'>There is no Products</div>";
   }
   ?>

     </div>
   </div>
   <!-- /.container -->
 </div>

<?php
}
?>



<?php
if($cat == 'iron_press'){
?>
    <!-- Page Content -->

 <div class="portfolio-col">
   <div class="container">
     <div class="row">
        <?php
        require 'connect.php';
        $select_prod="select * from products where category='Iron Press' order by id ";
        $data=  $connect->prepare($select_prod);
        $data->execute();
        if($data->rowCount()>0){
            $count = 0;
            $rows= $data->fetchAll();
            foreach ($rows as $row) {
                $count++;
            ?>
       <div class="col-lg-2 col-md-4 col-sm-6 portfolio-item">
         <div class="card h-100">
           <a class="hover-box" href="add.php?id=<?php echo $row['id']; ?>">
             <div class="dot-full">
               <i class="fas fa-plus"></i>
             </div>
             <img class="card-img-top" src="uploads/<?php echo $row['image']; ?>" alt="" />
           </a>
           <div class="card-body">
             <h5><a href="#"><?php echo $row['price']; ?> JD</a></h5>
             <h4><a href="#"><?php echo $row['name']; ?></a></h4>
             <p><?php echo $row['description']; ?></p>
           </div>
         </div>
       </div>

       <?php
     }
   }else{
    echo "<div style='text-align:center;width:100%;'>There are no Products</div>";
   }
   ?>

     </div>
   </div>
   <!-- /.container -->
 </div>

<?php
}
?>



<?php
if($cat == 'other_clean'){
?>
    <!-- Page Content -->

 <div class="portfolio-col">
   <div class="container">
     <div class="row">
        <?php
        require 'connect.php';
        $select_prod="select * from products where category='Carpet & Other Clean' order by id";
        $data=  $connect->prepare($select_prod);
        $data->execute();
        if($data->rowCount()>0){
            $count = 0;
            $rows= $data->fetchAll();
            foreach ($rows as $row) {
                $count++;
            ?>
       <div class="col-lg-2 col-md-4 col-sm-6 portfolio-item">
         <div class="card h-100">
           <a class="hover-box" href="add.php?id=<?php echo $row['id']; ?>">
             <div class="dot-full">
               <i class="fas fa-plus"></i>
             </div>
             <img class="card-img-top" src="uploads/<?php echo $row['image']; ?>" alt="" />
           </a>
           <div class="card-body">
             <h5><a href="#"><?php echo $row['price']; ?> JD</a></h5>
             <h4><a href="#"><?php echo $row['name']; ?></a></h4>
             <p><?php echo $row['description']; ?></p>
           </div>
         </div>
       </div>

       <?php
     }
   }else{
    echo "<div style='text-align:center;width:100%;'>There are no Products</div>";
   }
   ?>

     </div>
   </div>
   <!-- /.container -->
 </div>

<?php
}
?>




<?php
if($cat == 'wash'){
?>
    <div class="container">
          <div class="about-main" >
              <div class="row" >
          <div class="col-lg-5 card-body" style="background-color:#ededed; border-radius:50px 0px 0px 0px">
                    <img class="img-fluid rounded" src="images/koko.jpg" alt="" />

            <h5 style="text-align:center;color:#1273eb"><br /><b>0.40JD For Each KG</b></h5>
                 </div>
                 <div class="col-lg-3 "  style="background-color:#ededed;border-radius:0px 0px 50px 0px;padding-top:50px">

             <!-- <p>Choose how many kg is your laundry:</p> -->
             <form action="add-to-cart.php" method="GET">
                   <input type="number" min="1" name="num" value="1" id="washQuantity" style="border:2px inset #1292ec;padding-left:10px;width:30%;border-radius:5px;display: none;" required data-validation-required-message="Choose how many kg is your laundry"> 
                   <h5 style="margin-left:15% ">At Least Five KG</h5>
                   <p style="margin-left:18% ">multiples of five</p>
                  
          <button type="submit" class="btn btn-primary" id="washQuant" style="margin-top:30px;margin-left:20%;margin-bottom:5%">Add To Cart</button>
          <p style="font-size:13px ">You can choose quantity in the cart</p>
               </form>
                 </div>

              </div>
              <!-- /.row -->
          </div>
    </div>

<?php
}
?>




    <!-- /.container -->
 <?php

  include 'footer.php';

 ?>