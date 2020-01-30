<?php
session_start();
include_once('resources/db_funct/db.php');
include_once('resources/db_funct/function.php');
$error ='';
$db_user='';
$status='';
$code='';
$reset='';
$userrole='';

if(isset($_POST['submit']))
{
	
$username = mysqli($_POST['username']);
$password = mysqli($_POST['password']);

$pass = encrypt($password); 

$query = mysqli_prepare($con,"SELECT * from tbl_user_login WHERE username = ? and  passcode = ?");
mysqli_stmt_bind_param($query,"ss", $username, $pass);
mysqli_stmt_execute($query);

//confirmQuery($query);
$result = mysqli_stmt_get_result($query);

session_regenerate_id(true);
while($row = mysqli_fetch_array($result))
{
  
$_SESSION['username'] = $row['username'];
$_SESSION['fname'] = $row['first_name'];
$_SESSION['lname'] = $row['last_name'];
$_SESSION['id'] = $row['user_id'];
$_SESSION['role'] = $row['role'];
$db_user.= $row['username'];
$userrole.= $row['role'];
$reset.= $row['first_time'];
$code.= $row['passcode'];
$status.= $row['status'];
} 

if ($username !== $db_user || $pass !== $code) {
  session_destroy();
  logs(0,$username,'Login attempt failed wrong credentials.');
$error.="Please username or password may be wrong !!";
}
elseif ($status !== 'Unblocked') {
  logs($_SESSION['id'],$username,'Login attempt failed access dened.');
  session_destroy();
$error.="Sorry you not have access, see Admin";
}
elseif ($reset == 0) {
  //take me to password reset page
  session_destroy();
  logs($_SESSION['id'],$username,'Login for 1st time or after password reset.'); 
  header("Location: firsttime.php?usr=$db_user");
}
elseif ($userrole == 'Admin') {
  # admin page
  $query = mysqli_prepare($con,"UPDATE tbl_user_login SET last_login = now() where  username = ?");
  mysqli_stmt_bind_param($query,"s", $username);
  mysqli_stmt_execute($query);

  logs($_SESSION['id'],$username,'Login to system.');
  header("Location: admin");

}

elseif ($userrole == 'Client') {
  # admin page
  $query = mysqli_prepare($con,"UPDATE tbl_user_login SET last_login = now() where  username = ?");
  mysqli_stmt_bind_param($query,"s", $username);
  mysqli_stmt_execute($query);

  logs($_SESSION['id'],$username,'Login to system.');
  header("Location: client");

}

elseif ($userrole == 'Factory') {
  # admin page
  $query = mysqli_prepare($con,"UPDATE tbl_user_login SET last_login = now() where  username = ?");
  mysqli_stmt_bind_param($query,"s", $username);
  mysqli_stmt_execute($query);

  logs($_SESSION['id'],$username,'Login to system.');
  header("Location: factory");

}

elseif ($userrole == 'Accounts') {
  # admin page
  $query = mysqli_prepare($con,"UPDATE tbl_user_login SET last_login = now() where  username = ?");
  mysqli_stmt_bind_param($query,"s", $username);
  mysqli_stmt_execute($query);

  logs($_SESSION['id'],$username,'Login to system.');
  header("Location: account");

}

else{
session_destroy();
echo "<script>alert('User password change........'); window.location='./logout.php'</script>";

}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Remson</title>
<link href="resources/css/login_style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="icon" type="image/jpg" href="resources/images/LOGO_REM.jpg"/>
<style>
img, form { background-color:#F5F7FA; font-family:'Roboto'; padding:20px; margin:150px auto; max-width:480px;
      margin-top: 10%;}
</style>
</head>
<!-- rgb cmykc64m6y14nk0 #334cccc -->
<body>
<!-- <div id="jquery-script-menu" style= "background-color: #00354 !important;">
  <h1 style="text-align:center !important; color:antiquewhit !important;"> Login</h1>
    
    </div> -->

<div id="page-wrapper">

    <div class="container-fluid">
    
  <!-- <div class="row" style="background-color: ;" > -->
                   
<div class="col-lg-6 col-md-6">

<div class="form-group"> <img src="resources/images/LOGO_REM.jpg" class="rounded-circle"></div>
</div>
<div class="col-xs-6">
  <form action="" method="post" >

  <div class="form-group">
    <label for="exampleInputEmail1">Username/Phone <font style="color:rgb(255, 95, 66);; font:bold 17px 'Aleo';"><?php echo $error;?></font></label>
    <input type="text" name="username" required="" class="form-control" autofocus="true" autocomplete="false" id="exampleInputEmail1" placeholder="Phone">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" required="" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" name="submit" class="btn btn-danger">Submit</button>
</form></div>
</div>
</div>
</body>
 
</html>