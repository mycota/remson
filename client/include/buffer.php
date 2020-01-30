<?php 

// echo "<script>alert('Sorry this employees is aready part of the system, you can update the account'); window.location='./employees.php?source='</script>";  

if (isset($_POST['add_user'])) {
  
    $fname = mysqli($_POST['fname']);
    $lname = mysqli($_POST['lname']);
    $mname = mysqli($_POST['mname']); 
    $role = mysqli($_POST['role']);
    $email = mysqli($_POST['email']);
    $phone = mysqli($_POST['phone']);
    $bdate = mysqli($_POST['bdate']);
    $pass = 'rem123';
    $pass = encrypt($pass);
    $ft = 0;
    $status = 'Unblocked';

    //echo "$pass";

    $image = mysqli($_FILES['image']['name']);
    $imge_temp = mysqli($_FILES['image']['tmp_name']);

    
    move_uploaded_file($imge_temp, "../resources/images/users/$image");

    $insert_query = mysqli_prepare($con,"INSERT INTO tbl_user_login (first_name, middle_name, last_name, email,user_phone, birth_date, username, passcode, role, status, first_time,image) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
  mysqli_stmt_bind_param($insert_query,"ssssssssssss", $fname,$mname,$lname,$email,$phone,$bdate,$phone,$pass,$role,$status,$ft,$image);
  mysqli_stmt_execute($insert_query);

    //confirmQuery($insert_query);
    logs($_SESSION['id'], $_SESSION['username'], "Added a new user $phone");

    echo "<script>alert('Please kindly communicate the password (rem123) and username to the user.'); window.location='./users.php'</script>";

}

?>

<form action="" method="POST" enctype="multipart/form-data">


  <div id="page-wrapper" style="background-color: #8FBC8F;">
        <fieldset>
        <center><legend><h1>Add User</h1></legend></center>
                   
    <div class="container-fluid">

   <div class="row"  >
    
    <div class="col-lg-6">
  

  <div class="form-group">    
     <h4><span>First Name:</span></h4><input type="text" class="form-control" required placeholder="First name" name="fname">
  </div>

  <div class="form-group">    
  <h4><span>Middle Name:</span></h4><input type="text" class="form-control" placeholder="Middle name" name="mname">
  </div>

  <div class="form-group">    
  <h4><span>Last Name:</span></h4><input type="text" class="form-control" required placeholder="Last name" name="lname">
  </div>
    
  <div class="form-group">
      <h4><span>User Role:</span></h4><select class="form-control" name="role" id="post_category">
          <option value="Accounts">Accounts</option>
          <option value="Client">Client</option>
          <option value="Factory">Factory</option>
          <option value="Admin">Admin</option>
       </select>
    </div>
</div>

    <div class="col-lg-6 col-md-6">
<div class="form-group">    
  <h4><span>Email ID:</span></h4><input type="email" class="form-control" required placeholder="Email ID" name="email">
  </div>

  <div class="form-group">    
  <h4><span>Phone Number (Username):</span></h4><input type="text" class="form-control" required placeholder="Phone number" name="phone">
  </div>

  <div class="form-group">    
  <h4><span>Birth Date:</span></h4><input type="date" class="form-control" name="bdate">
  </div>

  <div class="form-group">    
  <h4><span>Picture:</span></h4><input type="file" class="form-control" name="image">
  </div>
    <span>Please kindly communicate the password (rem123) and username to the user.</span>
  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="add_user" value="Create User">
  </div>
</div>

    </fieldset>
</form>