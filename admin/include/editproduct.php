<?php 

// echo "<script>alert('Sorry this employees is aready part of the system, you can update the account'); window.location='./employees.php?source='</script>";  
	
	  if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $query = "SELECT * FROM tbl_products, tbl_pcs_rft where SERIAL = '$id' and PCS_RFT = pcs_rft_id";
            $select_prod = mysqli_query($con, $query);
          
            //checkErrors($select_prod);
           while ($row = mysqli_fetch_assoc($select_prod)) {
            $pcss = $row['PCS_RFTS'];
          }
    }

  if (isset($_POST['submit'])) {
    
    $pname = mysqli_real_escape_string($con, $_POST['pname']);
    $qty = mysqli_real_escape_string($con, $_POST['qty']);
    $pcsrft = mysqli_real_escape_string($con, $_POST['pcsrft']);
    $descript = mysqli_real_escape_string($con, $_POST['descript']);
    $ptype = mysqli_real_escape_string($con, $_POST['ptype']);

      $insert_prod = mysqli_prepare($con,"UPDATE tbl_products SET QTY = QTY+?, PCS_RFT = ? WHERE SERIAL = ?");
      mysqli_stmt_bind_param($insert_prod,"ddd", $qty, $pcsrft,$pname);
      mysqli_stmt_execute($insert_prod);

      //checkErrors($insert_prod);
      
      if (!empty($descript)) {
      $insert_descript = mysqli_prepare($con,"INSERT INTO tbl_product_description (description, product_serial) VALUES(?,?)");
      mysqli_stmt_bind_param($insert_descript,"sd", $descript, $pname);
      mysqli_stmt_execute($insert_descript);
      }
      //checkErrors($insert_descript);
      if (!empty($ptype)) {
      $insert_type = mysqli_prepare($con,"INSERT INTO tbl_product_type (type, product_serials) VALUES(?,?)");
      mysqli_stmt_bind_param($insert_type,"sd", $ptype, $pname);
      mysqli_stmt_execute($insert_type);
      }
      //checkErrors($insert_type);

      logs($_SESSION['id'], $_SESSION['username'], "Updated a new product $pname");
      
      echo "<script>alert('Product updated ...........'); window.location='./products.php?source'</script>";  
    }

?>

    <form action="" method="POST" enctype="multipart/form-data">
      
      <div id="page-wrapper" style="background-color: #5F9EA0; ">
       <center><span ><h2>Edit product information</h2></span></center> <hr>                  
    <div class="container-fluid">

   <div class="row"  >
    
    <div class="col-lg-12">

      <div class="form-group">    
        <span>Product Name:</span>
        <select type="text" class="form-control" name="pname">
        <?php
      
            $query = "SELECT * FROM tbl_products where SERIAL = '$id'";
            $select_prod = mysqli_query($con, $query);
          
            //checkErrors($select_prod);
           while ($row = mysqli_fetch_assoc($select_prod)) {
            $serial = $row['SERIAL'];
            $product = $row['PRODUCT'];
        $qty = $row['QTY'];
        $image = $row['IMAGE'];

            echo "<option value='$serial'>$product | $qty</option>";
          }
          ?>
        </select>
      </div>

      <div class="form-group">    
        <span>QTY:</span>
        <input type="number" class="form-control" name="qty" value="<?php ?>" />
      </div>

      <div class="form-group">    
        <span>PCS / RFT:</span>
        <select type="text" class="form-control" name="pcsrft"/>
        <option value="<?php echo $pcss ?>"><?php echo $pcss; ?></option>
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
        <input type="text" class="form-control" name="descript" placeholder="Enter product description" />
      </div>

      <div class="form-group"> 
        <span>Type:</span>
        <input type="text" class="form-control" name="ptype" placeholder="Enter product type" />
      </div>
      <center>
      <div class="form-group">    
        <input type="submit" class="btn btn-primary" name="submit" value="Submit"><br><br>
        <!-- <a href="update.php">Add product dropd down</a> -->
      </div></center>
      </form>
