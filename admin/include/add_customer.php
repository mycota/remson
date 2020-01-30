<?php 

// echo "<script>alert('Sorry this employees is aready part of the system, you can update the account'); window.location='./employees.php?source='</script>";  

if (isset($_POST['add_cust'])) {
	
	  $custname = mysqli($_POST['custname']);
	  $address = mysqli($_POST['address']);
	  $sitename = mysqli($_POST['sitename']); 
    $phone = mysqli($_POST['phone']);
    $email = mysqli($_POST['email']);
    $custrep = mysqli($_POST['custrep']);
    $cust = 'REM-121';
    
    $insert_query = mysqli_prepare($con,"INSERT INTO tbl_customer_details (customerID, custName, siteName, custAddress, custPhone, custEmail, custRep) VALUES (?,?,?,?,?,?,?)");
    mysqli_stmt_bind_param($insert_query,"sssssss", $cust, $custname, $sitename, $address, $phone, $email, $custrep);
    mysqli_stmt_execute($insert_query);

    confirmQuery($insert_query);

    $last_id = mysqli_insert_id($con);
    $cuid = "REM-".$last_id;

    $update_query = mysqli_prepare($con,"UPDATE tbl_customer_details SET customerID = ? where custName = ?");
    mysqli_stmt_bind_param($update_query,"ss", $cuid, $custname);
    mysqli_stmt_execute($update_query);

    confirmQuery($update_query);

    logs($_SESSION['id'], $_SESSION['username'], "Added a new customer $custname");

    echo "<script>alert('Customer data added........'); window.location='./customers.php'</script>";

}

?>

<form action="" method="POST" enctype="multipart/form-data">


	<div id="page-wrapper" style="background-color: gray;">
        <fieldset>
        <center><legend><h1>Add Customer</h1></legend></center>
                   
    <div class="container-fluid">

   <div class="row"  >
    
    <div class="col-lg-6">

	<div class="form-group">		
     <h4><span>Customer Name:</span></h4><input type="text" class="form-control" required placeholder="Customer name" name="custname">
	</div>

  <div class="form-group">    
  <h4><span>Address:</span></h4><input type="text" class="form-control" placeholder="Address" name="address">
  </div>

  <div class="form-group">    
  <h4><span>Site Name:</span></h4><input type="text" class="form-control" required placeholder="Site name" name="sitename">
  </div>
</div>

<div class="col-lg-6 col-md-6">

<div class="form-group">    
  <h4><span>Phone:</span></h4><input type="text" class="form-control" required placeholder="Phone" name="phone">
  </div>
<div class="form-group">    
  <h4><span>Email ID:</span></h4><input type="email" class="form-control" required placeholder="Email ID" name="email">
  </div>

  <div class="form-group">    
  <h4><span>Customer Representative:</span></h4><input type="text" class="form-control" required placeholder="Customer Representative" name="custrep">
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="add_cust" value="Create customer">
  </div>
</div>

</fieldset>
</form>