<?php 

// echo "<script>alert('Sorry this employees is aready part of the system, you can update the account'); window.location='./employees.php?source='</script>";  
	
	  $done = '';
  if (isset($_POST['submit'])) {
    
    $pname = mysqli_real_escape_string($con, $_POST['pname']);
    $qty = mysqli_real_escape_string($con, $_POST['qty']);
    $pcsrft = mysqli_real_escape_string($con, $_POST['pcsrft']);
    $descript = mysqli_real_escape_string($con, $_POST['descript']);
    $ptype = mysqli_real_escape_string($con, $_POST['ptype']);

    $query_count = "SELECT MAX(SERIAL) from tbl_products";
    $find_count = mysqli_query($con,$query_count);
    $count = mysqli_num_rows($find_count);
    $serils = $count++;
    
    $insert_query = mysqli_prepare($con,"INSERT INTO tbl_products (SERIAL,PRODUCT, QTY, PCS_RFT) VALUES(?,?,?)");
      mysqli_stmt_bind_param($insert_query,"dsdd", $serils, $pname, $qty, $pcsrft);
      mysqli_stmt_execute($insert_query);

      //confirmQuery($insert_query);

      $last_id = mysqli_insert_id($con);

      $insert_query = mysqli_prepare($con,"INSERT INTO tbl_product_description (description, product_serial) VALUES(?,?)");
      mysqli_stmt_bind_param($insert_query,"sd", $descript, $last_id);
      mysqli_stmt_execute($insert_query);

      //confirmQuery($insert_query);


      $insert_query = mysqli_prepare($con,"INSERT INTO tbl_product_type (type, product_serials) VALUES(?,?)");
      mysqli_stmt_bind_param($insert_query,"sd", $ptype, $last_id);
      mysqli_stmt_execute($insert_query);

      //confirmQuery($insert_query);

      logs($_SESSION['id'], $_SESSION['username'], "Added a new product $pname");
      
      echo "<script>alert('Product added ...........'); window.location='./products.php?source=add_prod'</script>";  }

?>

    <form action="" method="POST" enctype="multipart/form-data">
      
      <div id="page-wrapper" style="background-color: #5F9EA0; ">
       <center><span ><h2>Provide product information</h2></span></center> <hr>                  
    <div class="container-fluid">

   <div class="row"  >
    
    <div class="col-lg-12">

      <div class="form-group">    
        <span>Product Name:</span>
        <input type="text" class="form-control" name="pname" required placeholder="Enter product name" />
      </div>

      <div class="form-group">    
        <span>QTY:</span>
        <input type="number" class="form-control" name="qty" required placeholder="Enter product qty" />
      </div>

      <div class="form-group">    
        <span>PCS / RFT:</span>
        <select type="text" class="form-control" name="pcsrft"/>
        <?php
            $query = "SELECT * FROM tbl_pcs_rft";
            $select_prod = mysqli_query($con, $query);
          
            //confirmQuery($select_prod);

           while ($row = mysqli_fetch_assoc($select_prod)) {
            $id = $row['pcs_rft_id'];
            $pcs = $row['PCS_RFTS'];

            echo "<option value='$id'>$pcs</option>";
          }

          ?>
          </select>
      </div>

      <div class="form-group">    
        <span>Description:</span>
        <input type="text" class="form-control" name="descript" required placeholder="Enter product description" />
      </div>

      <div class="form-group"> 
        <span>Type:</span>
        <input type="text" class="form-control" name="ptype" required placeholder="Enter product type" />
      </div>
      <center>
      <div class="form-group">    
        <input type="submit" class="btn btn-primary" name="submit" value="Submit"><br><br>
        <!-- <a href="update.php">Add product dropd down</a> -->
      </div></center>
      </form>
