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
  case 'add_order':
    include "include/add_order.php"; 
    break;
 case 'invoice':
    include "include/invoice.php";
    break;
 case 'quo':
    include "include/quotation.php";
    break;
 case 'trans':
    include "include/add_trans.php";
    break;
 case 'update_trans':
    include "include/update_trans.php";
    break;

case 'restore':
    include "include/restore.php";
    break;

case 'view':
    include "include/viewtrans.php";
    break;

case 'ao2':
    include "include/add_order2.php";
    break;

case 'alltrans':
    include "include/alltrans.php";
    break;

  default:
    echo "Sorry you are not allowed to do this attack";
    //include "include/add_order2.php";
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

