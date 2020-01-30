<?php
session_start();
include_once('resources/db_funct/db.php');
include_once('resources/db_funct/function.php');
$error ='';

if(isset($_POST['submit']))
{
$username = mysqli($_POST['username']);
$password = mysqli($_POST['password']);
$confirm = mysqli($_POST['confirm']);
$ft = 1;
$pattern = ' /^.*(?=.{7,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$ /';

  if ($password != $confirm) {
  $error.="Sorry password donot match !!";
  }
  //1123Qw!123
elseif(pass($confirm)){
  $error.=pass($confirm);

}
else{
$pass = encrypt($confirm); 

$query = mysqli_prepare($con,"UPDATE tbl_user_login SET passcode = ?, first_time = ? where username = ?");
mysqli_stmt_bind_param($query,"sds", $pass, $ft, $username);
mysqli_stmt_execute($query);

//confirmQuery($query);
logs($_SESSION['id'], $_SESSION['username'], 'Password reset after admin reset');
echo "<script>alert('Password reset is successful proced to login.'); window.location='index.php'</script>";

}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Password Reset</title>
     <!-- My own -->
    <link rel="icon" type="image/jpg" href="resources/images/LOGO_REM.jpg"/> 
    <link href="resources/css/css/bootstrap.min.css" rel="stylesheet">
    <link href="resources/css/resetpass.css" rel="stylesheet">
    <link href="resources/css/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
    
  </head>

  <body>
      <div class="container">
        <div class="row">
          <div class="col-sm-offset-2 col-sm-8">
            <!-- <img src="resources/images/LOGO_REM.jpg"> -->
            <form action="" method="post">
           <center><font style="color:rgb(255, 95, 66);; font:bold 17px 'Aleo';"><?php echo $error?></font></center>
            <h1>Reset password before login</h1>
              <br><br>
              <input hidden type="text" name="username" value="<?php echo $_GET['usr'];?>">

         <div class="input-group">
           <span for="exampleInputPassword1" class="input-group-addon" id="sizing-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
           <input type="password" name="password" required="" id="exampleInputPassword1" autofocus class="form-control" aria-describeby="sizing-addon1" placeholder="Enter New Password" ></input>
         </div><br>
         
           <div class="input-group">
           <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
           <input type="password" name="confirm" required="" class="form-control" aria-describeby="sizing-addon1" placeholder="Confirm Password" ></input>
         </div> 
              <br>
                <button type="submit" name="submit" class="btn btn-primary">Reset</button>

              <!-- <button type="submit" name="submit"  class="btn btn-default" >Continue</button><br><br> -->
              <center><p>Remson</p></center>
            </form>
          </div>
        </div>
      </div>
  </body>
</html>