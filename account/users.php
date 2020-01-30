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
  case 'add_users':
    include "include/add_users.php";
    break;
  case '34':
    echo "Nice 34"; 
    break;
    case 'resetpass':
    include "include/reset_users_password.php";
      break;
  
  default:
    include "include/view_all_users.php";
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

