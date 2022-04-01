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
                        <h4 class="page-title">Messages</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="index.php">Dashboard</a></li>
                            <li class="active">Messages</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <div class="white-box">
                            <h3 class="box-title">Messages</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead style="border-bottom:3px solid #ededed ">
                                        <tr>
                                            <th>#</th>
                                            <th>From</th>
                                            <th>Date</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                require 'connect.php';
                                $select_prod="select * from messages order by id desc";
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
                                            <?php
                                            if(empty($row['user_email'])){
                                            ?>
                                            <td><?php echo $row['email'];  ?></td>
                                            <?php
                                        }else{
                                            ?>
                                            <td><?php echo $row['user_email']." (Customer)";  ?></td>
                                            <?php
                                        }
                                            ?>
                                            <td><?php echo $row['date'];  ?></td>
                                            <td class="text-center">
                                                <a href="message.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Show Message</a>
                                            </td>
                                        
                                        </tr>
                                        <?php
                                    }
                                }else{
                                    echo "<tr>
                                    <td>No Messages</td>
                                    </tr>";
                                }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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