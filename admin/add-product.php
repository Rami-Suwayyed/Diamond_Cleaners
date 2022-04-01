<?php

    if(isset($_POST['add'])) {

        require 'connect.php';

        // POST Variables
        $name = $_POST['name'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $description = $_POST['description'];


        $new_img_name = "img_".rand();
        $img_name = $_FILES['img']['name'];
        $img_exploded = explode(".", $img_name);
        $ext_index = sizeof($img_exploded)-1;
        $img_ext = $img_exploded[$ext_index];
        $new_img_name = $new_img_name.".".$img_ext;

        move_uploaded_file($_FILES['img']['tmp_name'], "../uploads/".$new_img_name);

        $sql="insert into products (name,image,price,description,category) values(:name, :image,:price, :description, :category)";
        $obj=$connect->prepare($sql);
        $obj->execute(array(":name"=>$name,":image"=>$new_img_name,":price"=>$price,":description"=>$description,":category"=>$category));

        if($obj->rowCount()>0){

            header('location:add-product.php?done');
        }else{

            echo "<script>alert('Error');</script>";
            header('location:add-product.php');
        }
    }
    include 'header.php';




?>
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Add New Product</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="index.php">Dashboard</a></li>
                            <li class="active">Add Product</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <?php
                if(isset($_GET['done'])){
                ?>
                <div class="white-box" style="background-color: #81d255">
                    <h3 style="color: #fff">
                        <i class="fa fa-check"></i>
                        Product Added Successfully
                    </h3>
                </div>
                <?php
            }
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <!-- Add Product Form -->
                            <form id="add_pro_form" action="" method="POST" enctype="multipart/form-data">
                                <label>Product Name</label>
                                <input type="text" name="name" class="form-control" required="">
                                <label>Category</label><br>
                                <select class="form-control" name="category">
                                    <option>Dry Clean</option>
                                    <option>Iron Press</option>
                                    <option>Carpet & Other Clean</option>
                                </select>
                                <br>
                                <label>Price (JD)</label>
                                <input type="text" name="price" class="form-control price" required="">
                                <br>
                                <label>Image</label>
                                <input type="file" name="img" required="">
                                <br>
                                <label>Description (Optional)</label>
                                <textarea class="form-control" name="description"></textarea>
                                <!-- Add Product Button -->
                                <input type="submit" name="add" class="btn btn-primary btn-block" value="Add" style="width: 30%">
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
           <footer class="footer text-center">  2020 &copy; DIAMOND DRY CLEANERS </footer>
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
</body>

</html>