<?php 
    if (isset($_GET['job'])) {
      $job = $_GET['job'];
    }
	  $error = '';

  if (isset($_POST['submit'])) {

    $systransname = mysqli($_POST['systransname']);
    $custmtransname = mysqli($_POST['custmtransname']);
    $date = mysqli($_POST['date']);

    $bill = mysqli($_FILES['bill']['name']);
    $bill_temp = mysqli($_FILES['bill']['tmp_name']);

    $receipt = mysqli($_FILES['receipt']['name']);
    $receipt_temp = mysqli($_FILES['receipt']['tmp_name']);

    // if (empty($bill) or ) {
    //   # code...
    // }

    if ($systransname == '0' and empty($custmtransname)) {
      $error = "Sorry you must select a system transporter or enter one manually....";
    }

  elseif($systransname != '0' and !empty($custmtransname)) {

    $error.= "Sorry you cannot select a system transporter and enter new transporter manually....";
}
  elseif($systransname == '0' and !empty($custmtransname)){

    move_uploaded_file($bill_temp, "../resources/images/bill_receipt/$bill");
    move_uploaded_file($receipt_temp, "../resources/images/bill_receipt/$receipt");

    $insert_query = mysqli_prepare($con,"INSERT INTO tbl_transports (transport) VALUES (?)");
    mysqli_stmt_bind_param($insert_query,"s", $custmtransname);
    mysqli_stmt_execute($insert_query);
    //confirmQuery($insert_query);
    logs($_SESSION['id'], $_SESSION['username'], "Added a new transport $custmtransname");
    
    $insert_query = mysqli_prepare($con,"INSERT INTO tbl_transporter (jobnumb,transporter,date,bill,receipt) VALUES(?,?,?,?,?)");
    mysqli_stmt_bind_param($insert_query,"sssss", $_GET['job'], $custmtransname, $date, $bill, $receipt);
    mysqli_stmt_execute($insert_query);

      //confirmQuery($insert_query);

      logs($_SESSION['id'], $_SESSION['username'], "Added a Transporter $custmtransname");
      
      echo "<script>alert('Transporter added ...........'); window.location='./orders.php?source=quo'</script>";  
    }

    elseif($systransname != '0'){

    move_uploaded_file($bill_temp, "../resources/images/bill_receipt/$bill");
    move_uploaded_file($receipt_temp, "../resources/images/bill_receipt/$receipt");
    
    $insert_query = mysqli_prepare($con,"INSERT INTO tbl_transporter (jobnumb,transporter,date,bill,receipt) VALUES(?,?,?,?,?)");
    mysqli_stmt_bind_param($insert_query,"sssss", $_GET['job'], $systransname, $date, $bill, $receipt);
    mysqli_stmt_execute($insert_query);

      confirmQuery($insert_query);

      logs($_SESSION['id'], $_SESSION['username'], "Added a Transporter $systransname");
      
      echo "<script>alert('Transporter added ...........'); window.location='./orders.php?source=quo'</script>";  }
  
  else{
    $error.="Sorry something went wrong try again";
}
}
?>

    <form action="" method="POST" enctype="multipart/form-data">
      
      <div id="page-wrapper" style="background-color: #5F9EA0; ">
       <center><span ><h2>Provide transport informatio</h2></span></center> <hr>                  
    <div class="container-fluid">

   <div class="row"  >
    
    <div class="col-lg-12">

      <div class="form-group">    
        <span>Job Number:</span>
        <input type="text" class="form-control" name="jobnu" readonly value="<?php echo $job;?>" />
      </div>

      <div class="form-group">    
        <span>Date:</span>
        <input type="date" class="form-control" name="date" required placeholder="Enter product qty" />
      </div>

      <div class="form-group">    
        <span>System Transporter:</span>          
        <select class="form-control" name="systransname">
        <option value="0">Select Transporter</option>
        <?php
        $query = "SELECT * FROM tbl_transports";
        $select_prod = mysqli_query($con, $query);
          
            //confirmQuery($select_prod);

           while ($row = mysqli_fetch_assoc($select_prod)) {
            $id = $row['transID'];
            $transname = $row['transport'];

            echo "<option value='$transname'>$transname</option>";
          }
            ?>
      </select>
      </div>
      <div class="form-group">  
        <span>Custom Transporter:</span>
      <center><font style="color:red; font:bold 17px 'Aleo';"><?php echo $error?></font></center>
        <input type="text" class="form-control" name="custmtransname" placeholder="Enter product name" />
      </div>

      <div class="form-group">    
       <span>Bill:</span>
        <input type="file" class="form-control" name="bill" placeholder="Enter product qty" /> 
      </div>

      <div class="form-group">    
        <span>Receipt:</span>
        <input type="file" class="form-control" name="receipt" placeholder="Enter product description" />
      </div>
      <center>
      <div class="form-group">    
        <input type="submit" class="btn btn-primary" name="submit" value="Submit"><br><br>
        <!-- <a href="update.php">Add product dropd down</a> -->
        
      </div></center>
      </form>
