<?php include "include/admin_header.php"; 
$error = '';
$db_pass = '';

if (isset($_SESSION['username'])) {
$username = $_SESSION['username'];
}
      
       if (isset($_POST['update_pass'])) {
       
                    $username = $_POST['username'];
                    $oldpass = mysqli($_POST['oldpass']);
                    $password = mysqli($_POST['newpass']);
                    $confirmpass = mysqli($_POST['confirmpass']);

                    $oldpass = encrypt($oldpass); 

                    $get_data = "SELECT * FROM tbl_user_login where username = '$username'";
                    $select_user = mysqli_query($con,$get_data);

                    confirmQuery($select_user);

                    while($row = mysqli_fetch_array($select_user))
                    {
                      $db_pass.= mysqli($row['passcode']);
                    }

                    if($oldpass !== $db_pass ) {
                      logs($_SESSION['id'], $_SESSION['username'], 'Attempt to reset password failed');

                      $error.="Old password donot match !!";
                    }
                    elseif ($password !== $confirmpass) {
                    logs($_SESSION['id'], $_SESSION['username'], 'Attempt to reset password failed');
                    $error.="Passwords donot match !!";
                    }
                    elseif(pass($confirmpass)){
                    logs($_SESSION['id'], $_SESSION['username'], 'Attempt to reset password failed');
                    $error.= "Password must have small, capital letter and symbols";//pass($confirmpass);

                    //echo "<script>alert('User password change........'); window.location='../logout.php'</script>";
                    }
                    else{

                    $pass = encrypt($confirmpass); 
                    $ft = 0;
                    $query = mysqli_prepare($con,"UPDATE tbl_user_login set passcode = ?, first_time = ? where email = ?");
                    mysqli_stmt_bind_param($query,"sss", $pass, $ft, $username);
                    mysqli_stmt_execute($query);

                    confirmQuery($query);
                    logs($_SESSION['id'], $_SESSION['username'], 'Password reset at application level');
                    echo "<script>alert('User password change........'); window.location='../logout.php'</script>";
            
                }
              }
            
?>

    <div id="wrapper">

        <!-- Navigation -->

<?php include "include/admin_navigation.php" ?>



        <form action="" method="POST" enctype="multipart/form-data">
  
  <div id="page-wrapper">

    <div class="container-fluid">
      <h1 class="page-header">
                            Welcome Admin 
                            <small><?php echo $_SESSION['fname']?></small>
                        </h1>
    <center><h2 class="page-header" style="background-color: #663399; color: white;">
       Change Password
    </h2></center><br>
  <center><font style="color:rgb(255, 95, 66);; font:bold 17px 'Aleo';"><?php echo $error?></font></center>
  <div class="row" style="background-color: ;" >          
    <div class="col-lg-6 col-md-6">
  
  <div class="form-group">
    <label for="title">Username</label>
  <input type="text" name="username" readonly value="<?php echo $username;?>" class="form-control" >
  </div>
    <div class="form-group">
    <label for="title">New Password</label>
    <input required type="password" name="newpass" placeholder="Enter Password" class="form-control" >
  </div>
<br>  
</div>

<div class="col-xs-6">
  <div class="form-group">
    <label for="title">Old Password</label>
  <input required type="password" name="oldpass" placeholder="Enter Old Password" class="form-control" >
  </div>
<div class="form-group">
    <label for="title">Confirm Password</label>
  <input required type="password" name="confirmpass" placeholder="Confirm Password" class="form-control" >
  </div>
  
  </div>
</div>
</div>
<center><div class="form-group">
    <input type="submit" class="btn btn-success btn-lg btn-block" name="update_pass" value="Change Password">
  </div></center>
</div>
</form>
<?php //include "include/admin_footer.php"?>

