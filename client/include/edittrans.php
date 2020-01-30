<?php 

if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $query = mysqli_prepare($con,"SELECT * from tbl_transports WHERE trans_id = ?");
        mysqli_stmt_bind_param($query,"d", $id);
        mysqli_stmt_execute($query);

        confirmQuery($query);
        $result = mysqli_stmt_get_result($query);

        while($row = mysqli_fetch_array($result))
        {
          $trans = $row['transport'];
          $comm = $row['comments'];
        }
  
}
if (isset($_POST['edit'])) {
	
	  $transname = mysqli($_POST['transname']);
	  $comments = mysqli($_POST['comments']);
    
  $insert_query = mysqli_prepare($con,"UPDATE tbl_transports SET transport = ?, comments = ? where trans_id = ?");
    mysqli_stmt_bind_param($insert_query,"ssd", $transname, $comments, $_GET['edit']);
    mysqli_stmt_execute($insert_query);

    confirmQuery($insert_query);

    logs($_SESSION['id'], $_SESSION['username'], "Updated transport info $transname");

    echo "<script>alert('Transport data updated........'); window.location='./customers.php?source=veiw_trans'</script>";

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
     <h4><span>Transport Name:</span></h4><input type="text" class="form-control" required placeholder=" Enter transporter name" name="transname" value="<?php echo $trans?>">
	</div>

  <div class="form-group">    
  <h4><span>Comments:</span></h4><input type="text" class="form-control" placeholder="Enter comments" value="<?php echo $comm?>" name="comments">
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="edit" value="Create transporter">
  </div>
</div>

</fieldset>
</form>