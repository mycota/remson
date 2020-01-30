<?php 

// echo "<script>alert('Sorry this employees is aready part of the system, you can update the account'); window.location='./employees.php?source='</script>";  
if (isset($_GET['edit'])) {
    $select = mysqli_prepare($con,"SELECT * FROM tbl_customer_details WHERE customerID = ?");
    mysqli_stmt_bind_param($select,"s", $_GET['edit']);
    mysqli_stmt_execute($select);

    confirmQuery($select);
    $result = mysqli_stmt_get_result($select);

    while($row = mysqli_fetch_array($result))
    {
      $custoname = $row['custName'];
      $site = $row['siteName'];
      $custaddress = $row['custAddress'];
      $phone = $row['custPhone'];
      $custmail = $row['custEmail'];
      $rep = $row['custRep'];
      $bal = $row['currentBal'];
    }


}
if (isset($_POST['update_cust'])) {
	
	  $custname = mysqli($_POST['custname']);
	  $address = mysqli($_POST['address']);
	  $sitename = mysqli($_POST['sitename']); 
    $phone = mysqli($_POST['phone']);
    $email = mysqli($_POST['email']);
    $custrep = mysqli($_POST['custrep']);
    $cust = mysqli($_GET['edit']);
    
    $insert_query = mysqli_prepare($con,"INSERT INTO tbl_customer_details (customerID, custName, siteName, custAddress, custPhone, custEmail, custRep) VALUES (?,?,?,?,?,?,?)");
    mysqli_stmt_bind_param($insert_query,"sssssss", $cust, $custname, $sitename, $address, $phone, $email, $custrep);
    mysqli_stmt_execute($insert_query);

    confirmQuery($insert_query);

    $last_id = mysqli_insert_id($con);
    $cuid = "REM-".$last_id;

    $update_query = mysqli_prepare($con,"UPDATE tbl_customer_details SET custName = ?, siteName = ?, custAddress = ?, custPhone = ?, custEmail = ?, custRep = ? where customerID = ?");
    mysqli_stmt_bind_param($update_query,"sssssss", $custname, $sitename, $address, $phone, $email, $custrep, $cust);
    mysqli_stmt_execute($update_query);

    confirmQuery($update_query);

    logs($_SESSION['id'], $_SESSION['username'], "Updated customer info $custname");

    echo "<script>alert('WORKING ON IT OKAY........'); window.location='./customers.php'</script>";

}

?>

<form action="" method="POST" enctype="multipart/form-data">


	<div id="page-wrapper" style="background-color: #5F9EA0;">
        <fieldset>
        <center><legend><h1>Udate Customer information</h1></legend></center>
                   
    <div class="container-fluid">

   <div class="row"  >
    
    <div class="col-lg-6">

	<div class="form-group">		
     <h4><span>Customer Name:</span></h4><input type="text" class="form-control" required value="<?php echo $custoname;?>" name="custname">
	</div>

  <div class="form-group">    
  <h4><span>Address:</span></h4><input type="text" class="form-control" value="<?php echo $custaddress;?>" name="address">
  </div>

  <div class="form-group">    
  <h4><span>Site Name:</span></h4><input type="text" class="form-control" required value="<?php echo $site;?>" name="sitename">
  </div>
</div>
       
<div class="col-lg-6 col-md-6">

<div class="form-group">    
  <h4><span>Phone:</span></h4><input type="text" class="form-control" required value="<?php echo $phone;?>" name="phone">
  </div>
<div class="form-group">    
  <h4><span>Email ID:</span></h4><input type="email" class="form-control" required value="<?php echo $custmail;?>" name="email">
  </div>

  <div class="form-group">    
  <h4><span>Customer Representative:</span></h4><input type="text" class="form-control" required value="<?php echo $rep;?>" name="custrep">
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="update_cust" value="Create customer">
  </div>
</div>

</fieldset>
</form>