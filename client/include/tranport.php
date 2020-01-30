<?php 

// echo "<script>alert('Sorry this employees is aready part of the system, you can update the account'); window.location='./employees.php?source='</script>";  

if (isset($_POST['add_trans'])) {
	
	  $transname = mysqli($_POST['transname']);
	  $comments = mysqli($_POST['comments']);
    
  $insert_query = mysqli_prepare($con,"INSERT INTO tbl_transports (transport,comments
) VALUES (?,?)");
    mysqli_stmt_bind_param($insert_query,"ss", $transname, $comments);
    mysqli_stmt_execute($insert_query);

    confirmQuery($insert_query);

    logs($_SESSION['id'], $_SESSION['username'], "Added a new transport $transname");

    echo "<script>alert('Transport data added........'); window.location='./customers?source=add_trans'</script>";

}
?>
<form action="" method="POST" enctype="multipart/form-data">


	<div id="page-wrapper" style="background-color: gray;">
        <fieldset>
        <center><legend><h1>Add Tranporter to System</h1></legend></center>
                   
    <div class="container-fluid">

   <div class="row"  >
    
    <div class="col-lg-6">

	<div class="form-group">		
     <h4><span>Transport Name:</span></h4><input type="text" class="form-control" required placeholder=" Enter transporter name" name="transname">
	</div>

  <div class="form-group">    
  <h4><span>Comments:</span></h4><input type="text" class="form-control" placeholder="Enter comments" name="comments">
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="add_trans" value="Create transporter">
  </div>
</div>

</fieldset>
</form>