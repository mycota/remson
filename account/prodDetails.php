<?php include "include/admin_header.php"; 
$cdate = date("Y-m-d");
logs($_SESSION['id'], $_SESSION['username'], 'View production details');

if (!isset($_SESSION['username'])) {
        if(!isset($_SESSION['role'])){
          if ($_SESSION['role'] != 'Admin') {

         header("Location: ../logout.php");         
              
        }
     }
   }
?>


    <div id="wrapper">




        <?php if ($con) {
            # code...
        } ?>

        <!-- Navigation -->

<?php include "include/admin_navigation.php" ?>



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">
                            Welcome:  
                            <small><?php echo $_SESSION['fname']?></small>
                        </h2>
                        
                        </div>
                </div>
                <!-- /.row -->
<h2>Production</h2>
                <div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

            <?php
            $query = "SELECT * from tbl_production WHERE deleted != 'Deleted'";
            $select_query = mysqli_query($con, $query);
            $count_news = mysqli_num_rows($select_query);

            echo "<div class='huge'>$count_news</div>"
            ?>
                        <div>Display</div>
                    </div>
                </div>
            </div>
            <a href="./display.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <?php
            $query = "SELECT * from tbl_production WHERE deleted != 'Deleted' and cutting ='Done' and assemb = 'Done' and pack = 'Done' and disp = 'Done'";
            $select_query = mysqli_query($con, $query);
            $count_newsp = mysqli_num_rows($select_query);

            echo "<div class='huge'>$count_newsp</div>"
            ?>
                      <div>Completed Orders</div>
                    </div>
                </div>
            </div>
            <a href="./completedOrder.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <?php

            $query = "SELECT * from tbl_production WHERE deleted != 'Deleted' and cutting !='Done' and assemb != 'Done' and pack != 'Done' and disp != 'Done' and final_date_deli > '$cdate'";
            $select_query = mysqli_query($con, $query);
            $count_newsp = mysqli_num_rows($select_query);

            echo "<div class='huge'>$count_newsp</div>"
            ?>
                      <div>Pending Orders</div>
                    </div>
                </div>
            </div>
            <a href="./completedOrder.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    
                <!-- /.row -->
                <!-- for graph -->
                
<?php include "include/admin_footer.php"?>

