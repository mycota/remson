<?php include "include/admin_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->

<?php include "include/admin_navigation.php" ?>



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <!-- <h2 class="page-header">
                            Welcome
                            <small><?php //echo $_SESSION['fname']?></small>
                        </h2> -->
<?php  

if (isset($_GET['source'])) {
  $source = $_GET['source'];
} else {

  $source = '';
}

switch ($source) {
  case 'quots1':
    include "include/quot_select.php";
    break;

    case 'quots':
    include "include/quotations.php";
    break;

  case 'pend':
    include "include/pendquots.php";
      break;

  case 'aprov':
    include "include/aproved.php";
      break;

  case 'review':
    include "include/review.php";
    break;

  case 'raw':
    include "include/raw_order.php";
    break;
  
  // default:
  //   include "include/view_all_custs.php";
  //   break;
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

