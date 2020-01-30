<?php include "include/admin_header.php"; 
$cdate = date("Y-m-d");

logs($_SESSION['id'], $_SESSION['username'], 'View dashboard');

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
<h2>Production Related</h2>
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
            // $query = "SELECT * FROM tbl_news, tbl_image, tbl_news_category, tbl_employee where authorid = id and categoryID = newscat_id and img_id = image_id and '$cdate' < end_date and '$cdate' > date_published";
            // $select_query = mysqli_query($con, $query);
            // $count_news = mysqli_num_rows($select_query);

            // echo "<div class='huge'>$count_news</div>"
            ?>
                        <div>Entries</div>
                    </div>
                </div>
            </div>
            <a href="addEntry.php">
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
            // $query = "SELECT * from tbl_news, tbl_image, tbl_news_category, tbl_employee where authorid = id and categoryID = newscat_id and img_id = image_id and '$cdate' < date_published";
            // $select_query = mysqli_query($connection, $query);
            // $count_newsp = mysqli_num_rows($select_query);

            // echo "<div class='huge'>$count_newsp</div>"
            ?>
                      <div>Production Details</div>
                    </div>
                </div>
            </div>
            <a href="./prodDetails.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
            $query = "SELECT * FROM tbl_products where proDel != 'Deleted'";
            $select_query = mysqli_query($con, $query);
            $count_newsa = mysqli_num_rows($select_query);

            echo "<div class='huge'>$count_newsa</div>"
            ?>
                        <div> Packaging List</div>
                    </div>
                </div>
            </div>
            <a href="./products.php">
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
            $query = "SELECT * from tbl_packing_list, tbl_customer_details WHERE customerID = customerNo group by jobNum";
            $select_query = mysqli_query($con, $query);
            $count_newsaa = mysqli_num_rows($select_query);

            echo "<div class='huge'>$count_newsaa</div>"
            ?>
                         <div>Packing List Order</div>
                    </div>
                </div>
            </div>
            <a href="./orders?source=quo">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
 <!-- /.row -->

                <h2>Personality</h2>
    <div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-plus-circle fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
            <?php
            // $query = "select * from tbl_department";
            // $select_query = mysqli_query($connection, $query);
            // $count_dept = mysqli_num_rows($select_query);

            // echo "<div class='huge'>$count_dept</div>"
            ?>
                      <div>Add User</div>
                    </div>
                </div>
            </div>
            <a href="users.php?source=add_users">
                <div class="panel-footer">
                    <span class="pull-left">Add User</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
            <?php
            $query = "SELECT * FROM tbl_user_login where userDel != 'Deleted'";
            $select_query = mysqli_query($con, $query);
            $count_login = mysqli_num_rows($select_query);

            echo "<div class='huge'>$count_login</div>"
            ?>
                        <div> View Users</div>
                    </div>
                </div>
            </div>
            <a href="./users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
            <?php
            /*$query = "select * from tbl_advert_category";
            $select_query = mysqli_query($connection, $query);
            $count_advert = mysqli_num_rows($select_query);

            echo "<div class='huge'>$count_advert</div>"*/
            ?>
                         <div>Profile</div>
                    </div>
                </div>
            </div>
            <a href="./profile.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
            <?php
            // $query = "select * from tbl_employee";
            // $select_query = mysqli_query($connection, $query);
            // $count_employ = mysqli_num_rows($select_query);

            // echo "<div class='huge'>$count_employ</div>"
            ?>      <div>Change Password</div>
                    </div>
                </div>
            </div>
            <a href="./changepass.php">
                <div class="panel-footer">
                    <span class="pull-left">Change password</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        function disableBack() { window.history.forward() }

        window.onload = disableBack();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
    });
</script>
                <!-- /.row -->
                <!-- for graph -->
                
<?php include "include/admin_footer.php"?>

