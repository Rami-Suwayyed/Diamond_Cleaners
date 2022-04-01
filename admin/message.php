<?php
    include 'header.php';

    if(isset($_GET['id'])) {
        $message_id = $_GET['id'];
    }

?>
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Message</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="index.php">Dashboard</a></li>
                            <li class="active">Message</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                            <?php
                    require 'connect.php';
                    $select_prod="select * from messages where id='$message_id'";
                    $data=  $connect->prepare($select_prod);
                    $data->execute();
                    if($data->rowCount()>0){
                        $row= $data->fetch();
                        if(empty($row['user_email'])){
                            ?>
                        <div class="white-box">
                            <h3 class="box-title">Message Details:</h3>
                            <h5>Phone: <?php echo $row['phone']; ?></h5>
                            <h5 style="border-bottom: 2px solid #ccc;padding: 10px 0;">Email: <?php echo $row['email']; ?></h5>
                            <h4 style="color:navy;text-indent:15px ">" <?php echo $row['message']; ?> "</h4>
                        </div>
                        <?php
                    }else{
                    ?>
                        <div class="white-box">
                            <h3 class="box-title">Message Details:</h3>
                            <h5 style="border-bottom: 2px solid #ccc;padding: 10px 0;">Email: <?php echo $row['user_email']; ?></h5>
                            <h4 style="color:navy;text-indent:15px ">" <?php echo $row['message']; ?> "</h4>
                        </div>
                    <?php
                    }
                }
                        ?>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2020 &copy; DIAMOND DRY CLEANERS </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
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