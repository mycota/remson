<?php 
	// Connection to DB
	$con = mysqli_connect("localhost","root","","goods");
	if (!$con) {
		echo "Not Connected";
	}
	// Error function
	function checkErrors($query){
		global $con;
    if (!$query) {
    	die("Query Failed !!" .mysqli_error($con));
    }
	}

	$img = '';
	$done = '';

	if (isset($_POST['submit'])) {
		
		$pname = mysqli_real_escape_string($con, $_POST['pname']);
		$qty = mysqli_real_escape_string($con, $_POST['qty']);
		$pcsrft = mysqli_real_escape_string($con, $_POST['pcsrft']);
		$descript = mysqli_real_escape_string($con, $_POST['descript']);
		$ptype = mysqli_real_escape_string($con, $_POST['ptype']);

		$image = mysqli_real_escape_string($con,$_FILES['image']['name']);
    	$imge_temp = mysqli_real_escape_string($con,$_FILES['image']['tmp_name']);

    	$query = "SELECT IMAGE FROM tbl_products WHERE SERIAL = '$pname'";
        $select_img = mysqli_query($con, $query);
    	checkErrors($select_img);
        while ($row = mysqli_fetch_assoc($select_img)) {
        	$img = $row['IMAGE'];
        }

    	if (empty($imge)) {
		$insert_prod = mysqli_prepare($con,"UPDATE tbl_products SET QTY = QTY+?, PCS_RFT = ? WHERE SERIAL = ?");
    	mysqli_stmt_bind_param($insert_prod,"ddd", $qty, $pcsrft,$pname);
    	mysqli_stmt_execute($insert_prod);

    	checkErrors($insert_prod);

    	$insert_descript = mysqli_prepare($con,"INSERT INTO tbl_product_description (description, product_serial) VALUES(?,?)");
    	mysqli_stmt_bind_param($insert_descript,"sd", $descript, $pname);
    	mysqli_stmt_execute($insert_descript);

    	checkErrors($insert_descript);

    	$insert_type = mysqli_prepare($con,"INSERT INTO tbl_product_type (type, product_serials) VALUES(?,?)");
    	mysqli_stmt_bind_param($insert_type,"sd", $ptype, $pname);
    	mysqli_stmt_execute($insert_type);

    	checkErrors($insert_type);
    	$done.= "Details successfully added: "; 
    	}
    	else{

    	unlink("images/$img");

		move_uploaded_file($imge_temp, "images/$image");
    	$insert_prod = mysqli_prepare($con,"UPDATE tbl_products SET QTY = QTY+?, PCS_RFT = ?, IMAGE = ? WHERE SERIAL = ?");
    	mysqli_stmt_bind_param($insert_prod,"ddsd", $qty, $pcsrft,$image,$pname);
    	mysqli_stmt_execute($insert_prod);

    	checkErrors($insert_prod);
    	
    	$insert_descript = mysqli_prepare($con,"INSERT INTO tbl_product_description (description, product_serial) VALUES(?,?)");
    	mysqli_stmt_bind_param($insert_descript,"sd", $descript, $pname);
    	mysqli_stmt_execute($insert_descript);

    	checkErrors($insert_descript);

    	$insert_type = mysqli_prepare($con,"INSERT INTO tbl_product_type (type, product_serials) VALUES(?,?)");
    	mysqli_stmt_bind_param($insert_type,"sd", $ptype, $pname);
    	mysqli_stmt_execute($insert_type);

    	checkErrors($insert_type);

    	 $done.= "Details successfully added: "; 
	}}
	
		?>

<!DOCTYPE html>
<html>
<head>
	<title>UPDATE PRODUCTS</title>
	<style type="text/css">
	*{padding: 5px; margin: 10px;}
	form{background-color: gray}
	/*span{padding-left: 100px;}*/
	select{width: 420px;}
	input{width: 400px;}
	</style>

</head>

<body><center>
			<form action="" method="POST" enctype="multipart/form-data">
			<span style="color: blue"><h2>Update product information</h2></span> 
			<span>Product Name:</span><br>
			<select type="number" name="pname"/>
			<?php
			
          	$query = "SELECT * FROM tbl_products";
          	$select_prod = mysqli_query($con, $query);
          
          	checkErrors($select_prod);
         	 while ($row = mysqli_fetch_assoc($select_prod)) {
          	$serial = $row['SERIAL'];
          	$product = $row['PRODUCT'];
		  	$qty = $row['QTY'];
		  	$image = $row['IMAGE'];

          	echo "<option value='$serial'>$product | $qty</option>";
			}
        	?>
			</select> 
			<br>

			<span>QTY:</span><br>
			<input type="number" name="qty" placeholder="Enter product qty" /><br>

			<span>PCS / RFT:</span><br>
			<select type="text" name="pcsrft"/>
         <?php

          $query = "select * from tbl_pcs_rft";
          $select_dept = mysqli_query($con, $query);
          
          //confirmQuery($select_dept);

          while ($row = mysqli_fetch_assoc($select_dept)) {
          $pcs_id = $row['pcs_rft_id'];
          $pcs_rft = $row['PCS_RFT'];

          echo "<option value='$pcs_id'>$pcs_rft</option>";
		}

        	?>
			</select> <br>
			<span>Description:</span><br>
			<input type="text" name="descript" required placeholder="Enter product description" /><br>

			<span>Type:</span><br>
			<input type="text" name="ptype" required placeholder="Enter product type" /><br>

			<span>Image:</span><br>
			<input type="file" name="image" /><br>
			<!-- p@55w0rd -->
			<input type="submit" style="background-color: #008B8B; width: 400px" name="submit" value="Submit"><br><br>
						<a href="add.php">Add new product</a>
						<a href="index.php">View product</a>
			</form>
	</center>
</body>
</html>