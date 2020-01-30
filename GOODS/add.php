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

	$done = '';
	if (isset($_POST['submit'])) {
		
		$pname = mysqli_real_escape_string($con, $_POST['pname']);
		$qty = mysqli_real_escape_string($con, $_POST['qty']);
		$pcsrft = mysqli_real_escape_string($con, $_POST['pcsrft']);
		$descript = mysqli_real_escape_string($con, $_POST['descript']);
		$ptype = mysqli_real_escape_string($con, $_POST['ptype']);

		//$image = mysqli_real_escape_string($con,$_FILES['image']['name']);
    	//$imge_temp = mysqli_real_escape_string($con,$_FILES['image']['tmp_name']);

    	//move_uploaded_file($imge_temp, "images/$image");
		
		$insert_query = mysqli_prepare($con,"INSERT INTO tbl_products (PRODUCT, QTY, PCS_RFT) VALUES(?,?,?)");
    	mysqli_stmt_bind_param($insert_query,"sdd", $pname, $qty, $pcsrft);
    	mysqli_stmt_execute($insert_query);

    	//checkErrors($insert_query);

    	$last_id = mysqli_insert_id($con);

    	$insert_query = mysqli_prepare($con,"INSERT INTO tbl_product_description (description, product_serial) VALUES(?,?)");
    	mysqli_stmt_bind_param($insert_query,"sd", $descript, $last_id);
    	mysqli_stmt_execute($insert_query);

    	//checkErrors($insert_query);


    	$insert_query = mysqli_prepare($con,"INSERT INTO tbl_product_type (type, product_serials) VALUES(?,?)");
    	mysqli_stmt_bind_param($insert_query,"sd", $ptype, $last_id);
    	mysqli_stmt_execute($insert_query);

    	//checkErrors($insert_query);
    	
    	 $done.= "Details successfully added: "; 
	}
	
		?>

<!DOCTYPE html>
<html>
<head>
	<title>ADD PRODUCTS</title>
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
			<span style="color: blue"><h2>Provide product information</h2></span> 
			<small style="color: green;"><?php echo $done; ?></small>
			
			<span>Product Name:</span><br>
			<input type="text" name="pname" required placeholder="Enter product name" /><br>

			<span>QTY:</span><br>
			<input type="number" name="qty" required placeholder="Enter product qty" /><br>

			<span>PCS / RFT:</span><br>
			<select type="text" name="pcsrft"/>
			<?php
          	$query = "SELECT * FROM tbl_pcs_rft";
          	$select_prod = mysqli_query($con, $query);
          
          	//checkErrors($select_prod);

         	 while ($row = mysqli_fetch_assoc($select_prod)) {
          	$id = $row['pcs_rft_id'];
          	$pcs = $row['PCS_RFT'];

          	echo "<option value='$id'>$pcs</option>";
			}

        	?>
			</select> <br>
			<span>Description:</span><br>
			<input type="text" name="descript" required placeholder="Enter product description" /><br>

			<span>Type:</span><br>
			<input type="text" name="ptype" required placeholder="Enter product type" /><br>

			<!-- <span>Image:</span><br> -->
			<!-- <input type="file" name="image" required /><br> -->
			<!-- p@55w0rd -->
			<input type="submit" style="background-color: #008B8B; width: 400px" name="submit" value="Submit"><br><br>
						<a href="update.php">Add product dropd down</a>

			</form>
	</center>
</body>
</html>