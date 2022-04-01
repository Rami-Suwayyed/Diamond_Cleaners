<?php
    include 'header.php';
?>
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">
                            <a href="add-product.php" class="btn btn-info">Add New Product</a>
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="index.php">Dashboard</a></li>
                            <li class="active">Products</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <?php
                if(isset($_GET['deleted'])){
                ?>
                <div class="white-box" style="background-color: #81d255">
                    <h3 style="color: #fff">
                        <i class="fa fa-check"></i>
                        Product Deleted Successfully
                    </h3>
                </div>
                <?php
            }
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">All Products</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead style="border-bottom:4px solid #ededed ">
                                        <tr style="font-size:17px">
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Description</th>
                                            <th style="text-align: center;">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                require 'connect.php';
                                $select_prod="select * from products order by id";
                                $data=  $connect->prepare($select_prod);
                                $data->execute();
                                if($data->rowCount()>0){
                                    $count = 0;
                                    $rows= $data->fetchAll();
                                    foreach ($rows as $row) {
                                        $count++;
                                        ?>
                                        <tr>
                                            <td><?php echo $count;  ?></td>
                                            <td>
                                                <img src="../uploads/<?php echo $row['image']; ?>" width="80" height="80">
                                            </td>
                                            <td><strong><?php echo $row['name'];  ?></strong></td>
                                            <td><strong><?php echo $row['category'];  ?></strong></td>
                                            <td><strong><?php echo $row['price'];  ?></strong> JD</td>
                                            <td>
                                                <?php
                                                if($row['description'] != ''){
                                                   echo $row['description'];   
                                               }else {
                                                    echo "<p style='color:#777;font-weight:500;margin-left:15%'>-</p>";
                                               }
                                                 ?>
                                                
                                            </td>
                                            <td style="text-align: center;">
                                                <a href="delete-product.php?id=<?php echo $row['id']; ?>" style="color:red">
                                                    <i class="fa fa-trash fa-lg"></i>
                                                </a>
                                                
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }else{
                                    echo "<tr>
                                    <td>No Products</td>
                                    </tr>";
                                }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
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