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
  case 'add_prod':
    include "include/add_product.php";
    break;
  case 'add_order':
    include "include/add_order.php"; 
    break;
  case 'add_order2':
    include "include/add_order2.php"; 
    break;
  case 'edit':
    include "include/editproduct.php";
    break;
  
  
  default:
    include "include/view_all_product.php";
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

