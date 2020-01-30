<?php include "include/admin_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->

<?php include "include/admin_navigation.php" ?>



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <h2 class="page-header">
                            Welcome
                            <small><?php echo $_SESSION['fname']?></small>
                        </h2>
<?php  

if (isset($_GET['source'])) {
  $source = $_GET['source'];
} else {

  $source = '';
}

switch ($source) {
  case 'add_cust':
    include "include/add_customer.php";
    break;

  case 'edit':
    include "include/editcustomer.php";
      break;

  case 'add_trans':
    include "include/tranport.php";
      break;

  case 'veiw_trans':
    include "include/view_all_trans.php";
    break;

  case 'edittrans':
    include "include/edittrans.php";
    break;
  
  default:
    include "include/view_all_custs.php";
    break;
}


?>

                        </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "include/admin_footer.php"?>

