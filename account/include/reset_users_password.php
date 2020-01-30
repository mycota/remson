<?php 
if (isset($_GET['resetpass'])) {
        	$the_empl_id = mysqli($_GET['resetpass']);


        }
                    
       $query = "SELECT * from tbl_user_login WHERE user_id = '$the_empl_id'";
       $select_empl_by_id = mysqli_query($con, $query);
                
        while ($row = mysqli_fetch_assoc($select_empl_by_id)){
                    $emply_id = $row['user_id'];
                    $passcode = $row['passcode'];
                    $role = $row['role'];
                    $username = $row['username'];
                    $fname = $row['first_name'];
                    $lastname = $row['last_name'];
                    $image = $row['image'];
        }


if (isset($_POST['update_user_role'])) {
	
    $the_user_id = mysqli($_GET['resetpass']);
	$username = mysqli($_POST['username']);
	$role = mysqli($_POST['role']);

    $query = mysqli_prepare($con,"UPDATE tbl_user_login set role = ? where user_id = ?");
    mysqli_stmt_bind_param($query,"sd", $role, $the_user_id);
    mysqli_stmt_execute($query);
    
    //confirmQuery($query);
    logs($_SESSION['id'], $_SESSION['username'], "Updated a user role $username");
    echo "<script>alert('User role updated........'); window.location='./users.php'</script>";

}

if (isset($_POST['reset_user_pass'])) {
    
    $the_user_id = mysqli($_GET['resetpass']);
    $pass = mysqli($_POST['pass']);
    $pass = encrypt($pass);
    $ft = 0;

    $query = mysqli_prepare($con,"UPDATE tbl_user_login set passcode = ?, first_time = ? where user_id = ?");
    mysqli_stmt_bind_param($query,"ssd", $pass, $ft, $the_user_id);
    mysqli_stmt_execute($query);

    confirmQuery($query);
    
    logs($_SESSION['id'], $_SESSION['username'], "Reset a user password $username");
    echo "<script>alert('User password change........'); window.location='./users.php'</script>";

}

?>

<form action="" method="POST" enctype="multipart/form-data">


	<div id="page-wrapper" style="background-color: #5F9EA0;">
        <fieldset>
        <center><legend><h1>Reset User password or Change role</h1></legend></center>
                   

    <div class="container-fluid">

   <div class="row"  >
    
    <div class="col-lg-6">
	

	<div class="form-group">		
		<label for="title"><h2><?php echo $fname." ".$lastname ?></h2></label>
        <br>
		<br>
		 <h4>Username:</h4><input type="text" class="form-control" value="<?php echo $username;?>" readonly name="username">
	</div>
    
	<div class="form-group">
    	<h4><span>Change User Role:</span></h4>
        <select class="form-control" name="role" id="post_category">
          <option value="<?php echo $role;?>"><?php echo $role; ?></option>
    	  <option value="Entries">Entries</option>
          <option value="View">View</option>
          <option value="Admin">Admin</option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_user_role" value="Update User Role">
    </div>
	 <input type="text" class="form-control" value="rem123" readonly name="pass">
     <span>Please kindly communicate the password (rem123) to the user.</span>
    <div class="form-group">
    <input type="submit" class="btn btn-warning" name="reset_user_pass" value="Reset User Password">
    </div>
</div>

<div class="col-lg-6 col-md-6">
<br>
<div class="form-group">
    <img width="200" height="200" src="../resources/images/users/<?php echo $image; ?>" alt=""></label>
  </div>
</div>

		</fieldset>
</form>