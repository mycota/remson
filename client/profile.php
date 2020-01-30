<?php include "include/admin_header.php"; 

if (isset($_SESSION['username'])) {
$username = $_SESSION['username'];
}
      logs($_SESSION['id'], $_SESSION['username'], 'View profile');
      $query = "SELECT * from tbl_user_login WHERE username = '$username' ";
      $select_user_id = mysqli_query($con, $query);
                
                 while ($row = mysqli_fetch_assoc($select_user_id)) {
                    
                    $fname = $row['first_name'];
                    $midlename = $row['middle_name'];
                    $lastname = $row['last_name'];
                    $gender = $row['gender'];
                    $phone = $row['user_phone'];
                    $email = $row['email'];
                    $birthdate = $row['birth_date'];
                    $image = $row['image'];

                  }
  
       
       if (isset($_POST['update_user'])) {
       
                    $fname = mysqli($_POST['fname']);
                    $lname = mysqli($_POST['lname']);
                    $bdate = mysqli($_POST['bdate']);
                    $phone = mysqli($_POST['phone']);
                    $mname = mysqli($_POST['mname']);
                    $gender = mysqli($_POST['gender']);
                    $bdate = mysqli($_POST['bdate']);
                    $email = mysqli($_POST['email']);
                    
                    $imge = mysqli($_FILES['image']['name']);
                    $imge_temp = mysqli($_FILES['image']['tmp_name']);


                   if (empty($imge)) {

                  $query = mysqli_prepare($con,"UPDATE tbl_user_login SET first_name = ?, middle_name = ?, last_name = ?, email = ?, birth_date = ?, gender = ? where email = ?");
                  mysqli_stmt_bind_param($query,"sssssss", $fname, $mname, $lname, $email, $bdate, $gender, $email);
                  mysqli_stmt_execute($query);
                   
                  //confirmQuery($query);
                  logs($_SESSION['id'], $_SESSION['username'], 'User infomartion updated');
                  echo "<script>alert('Profile updated.....'); window.location='./users.php'</script>";

                  }
            else{
                    
              unlink("../resources/images/users/".$image);
              move_uploaded_file($imge_temp, "../resources/images/users/$imge");

                   $query = mysqli_prepare($con,"UPDATE tbl_user_login SET first_name = ?, middle_name = ?, last_name = ?, email = ?, birth_date = ?, image = ?, gender = ? where email = ?");
                  mysqli_stmt_bind_param($query,"ssssssss", $fname, $mname, $lname, $email, $bdate, $imge, $gender, $email);
                  mysqli_stmt_execute($query);
                   

                  //confirmQuery($query);
                  logs($_SESSION['id'], $_SESSION['username'], 'User infomartion updated');
                  echo "<script>alert('Profile updated.....'); window.location='./users.php'</script>";

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
                            Welcome
                            <small><?php echo $_SESSION['fname']?></small>
                        </h1>
    <center><h2 class="page-header" style="background-color: #663399; color: white;">
       Edit Your Profile
    </h2></center><br>
  <div class="row" style="background-color: ;" >
                   
    <div class="col-lg-6 col-md-6">
  <div class="form-group">
    <label for="title">First Name:</label>
  <input type="text" name="fname" value="<?php echo $fname;?>" required placeholder="First Name" class="form-control" >
  </div>
    <div class="form-group">
    <label for="title">Middle Name</label>
    <input required type="text" name="mname" value="<?php echo $midlename;?>" placeholder="Last Name" class="form-control" >
  </div><br>

  <div class="form-group">
    <label for="title">Last Name</label>
    <input required type="text" name="lname" value="<?php echo $lastname;?>" placeholder="Last Name" class="form-control" >
  </div><br>
<div class="form-group">
    <label for="title">Gender</label>
       <select class="form-control" name="gender" id="">
       <option value="<?php echo $gender;?>"><?php echo $gender; ?></option>
        <option value='Male'>Male</option>";
        <option value='Female'>Female</option>";
       </select>  
   </div>
</div>

<div class="col-xs-6">

  <div class="form-group">
    <label for="title">Birth Date</label>
  <input type="date" name="bdate" value="<?php echo $birthdate;?>" placeholder="Birth date" class="form-control" >
  </div>
  
   <div class="form-group">
    <label for="">Email</label>
    <input required type="email" name="email" value="<?php echo $email;?>" placeholder="Email" class="form-control" name="status">
  </div>

  <div class="form-group">
    <label for="">Phone Number (Username)</label>
    <input type="text" placeholder="Stree Name" readonly value="<?php echo $phone;?>" class="form-control" name="phone">
  </div>

   <div class="form-group">
    <label for="">Picture
    <img width="100" src="../resources/images/users/<?php echo $image; ?>" alt=""></label>
    <input type="file" class="form-control" name="image">
    <font><?php //echo "$error"; ?></font>
  </div>
  </div>
</div>
</div>
<center><div class="form-group">
    <input type="submit" class="btn btn-success btn-lg btn-block" name="update_user" value="Update Profile">
  </div></center>
</div>
</form>
<?php include "include/admin_footer.php"?>

