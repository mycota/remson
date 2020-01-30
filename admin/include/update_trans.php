<?php 
    if (isset($_GET['tid'])) {
      $tid = $_GET['tid'];

      $query = mysqli_prepare($con,"SELECT * from tbl_transporter WHERE transID = ?");
        mysqli_stmt_bind_param($query,"d", $tid);
        mysqli_stmt_execute($query);

        confirmQuery($query);
        $result = mysqli_stmt_get_result($query);

        while($row = mysqli_fetch_array($result))
        {
          $job = $row['jobnumb'];
          $trans = $row['transporter'];
          $date = $row['date'];
          $bill = $row['bill'];
          $receipt = $row['receipt'];
          
    }
  }
	  $error = '';
  if (isset($_POST['update'])) {

    $tid = $_POST['tid'];
    $date = mysqli($_POST['date']);
    $obill = $_POST['obill'];
    $oreceipt = $_POST['oreceipt'];

    $bill = mysqli($_FILES['bill']['name']);
    $bill_temp = mysqli($_FILES['bill']['tmp_name']);

    $receipt = mysqli($_FILES['receipt']['name']);
    $receipt_temp = mysqli($_FILES['receipt']['tmp_name']);

    $cs = $_SESSION['custid'];
 
  if(!empty($bill) and !empty($receipt)){

    move_uploaded_file($bill_temp, "../resources/images/bill_receipt/$bill");
    move_uploaded_file($receipt_temp, "../resources/images/bill_receipt/$receipt");

    $insert_query = mysqli_prepare($con,"UPDATE tbl_transporter SET date = ?, bill =?, receipt = ? WHERE transID = ?");
    mysqli_stmt_bind_param($insert_query,"sssd", $date, $bill, $receipt,$tid);
    mysqli_stmt_execute($insert_query);

      confirmQuery($insert_query);

      logs($_SESSION['id'], $_SESSION['username'], "Udated a Transporter bill and receipt $tid");
      @unlink("../resources/images/bill_receipt/".$obill);
      @unlink("../resources/images/bill_receipt/".$oreceipt);

      echo "<script>alert('Transporter bill and receipt updated ...........'); window.location='./orders.php?source=alltrans&jn=$job&css=$cs'</script>";  
    }

    elseif(!empty($bill)){

      move_uploaded_file($bill_temp, "../resources/images/bill_receipt/$bill");

    $insert_query = mysqli_prepare($con,"UPDATE tbl_transporter SET date = ?, bill =? WHERE transID = ?");
    mysqli_stmt_bind_param($insert_query,"ssd", $date, $bill, $tid);
    mysqli_stmt_execute($insert_query);

      confirmQuery($insert_query);

      logs($_SESSION['id'], $_SESSION['username'], "Udated a Transporter bill $tid");
      @unlink("../resources/images/bill_receipt/".$obill);

      echo "<script>alert('Transporter updated ...........'); window.location='./orders.php?source=alltrans&jn=$job&css=$cs'</script>"; 
      }
    elseif (!empty($receipt)) {
    move_uploaded_file($receipt_temp, "../resources/images/bill_receipt/$receipt");

    $insert_query = mysqli_prepare($con,"UPDATE tbl_transporter SET date = ?, receipt = ? WHERE transID = ?");
    mysqli_stmt_bind_param($insert_query,"ssd", $date, $receipt,$tid);
    mysqli_stmt_execute($insert_query);

      confirmQuery($insert_query);

      logs($_SESSION['id'], $_SESSION['username'], "Udated a Transporter receipt $tid");

      @unlink("../resources/images/bill_receipt/".$oreceipt);

      echo "<script>alert('Transporter updated ...........'); window.location='./orders.php?source=alltrans&jn=$job&css=$cs'</script>"; 
    }
  else{
    echo "<script>alert('Sorry you have not updated anything here, kindly update bill or receipt ...........'); window.location='./orders.php?source=update_trans&tid=$tid'</script>";  

          // echo "<script>alert('Transporter added ...........'); window.location='./orders.php?source=update_trans&tid=$tid'</script>";

}
}
?>

    <form action="" method="POST" enctype="multipart/form-data">
      
      <div id="page-wrapper" style="background-color: #5F9EA0; ">
       <center><span ><h2>Update transport information</h2></span></center> <hr>                  
    <div class="container-fluid">

   <div class="row"  >
    
    <div class="col-lg-12">

      <div class="form-group">    
        <span>Job Number:</span>
        <input type="hidden" class="form-control" name="tid" readonly value="<?php echo $_GET['tid'];?>" />
        <input type="text" class="form-control" name="jobnu" readonly value="<?php echo $job;?>" />
      </div>
      <div class="form-group">    
        <span>Transporter:</span>
        <input type="text" class="form-control" readonly  name="transporter" value="<?php echo $trans;?>" required placeholder="Enter product qty" />
      </div>
      <div class="form-group">    
        <span>Date:</span>
        <input type="date" class="form-control" name="date" value="<?php echo $date;?>" required />
      </div>
      <div class="form-group">    
       <span>Bill:</span>
        <input type="file" class="form-control" name="bill" placeholder="Enter product qty" /> 
        <input type="hidden" class="form-control" name="obill" value="<?php echo $bill;?>" placeholder="Enter product qty" /> 
      </div>
      <div class="form-group">    
        <span>Receipt:</span>
        <input type="file" class="form-control" name="receipt" placeholder="Enter product description" />
        <input type="hidden" class="form-control" name="oreceipt" value="<?php echo $receipt;?>" placeholder="Enter product description" />
      </div>
      <center>
      <div class="form-group">    
        <input type="submit" class="btn btn-primary" name="update" value="Update"><br><br>
        <!-- <a href="update.php">Add product dropd down</a> -->
      </div></center>
      </form>
