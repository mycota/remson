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
		
		$pname = mysqli_real_escape_string($con, $_POST['descript']);
		$qty = mysqli_real_escape_string($con, $_POST['type']);
		$pcsrft = mysqli_real_escape_string($con, $_POST['qty']);
		$descript = mysqli_real_escape_string($con, $_POST['pcs']);

		echo $pname.$qty.$pcsrft.$descript;

    	 $done.= "Details successfully added:"; 
	}
	
		?>

<!DOCTYPE html>
<html>
<head>
	<title>ADD PRODUCTS</title>
	<style type="text/css">
	/**{padding: 5px; margin: 10px;}*/
	form{background-color: white}
	/*span{padding-left: 100px;}*/
	select{width: 180px;}
	/*input{width: 120px;}*/
	</style>
 
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
			<form action="" method="POST" enctype="multipart/form-data">
			<span style="color: blue"><h2>Provide product information</h2></span> 
			<small style="color: green;"><?php echo $done; ?></small>
                  <fieldset>
                  	<legend>SITE NAME:</legend>
                  <table border="1" class="table table-bordered table-hover">
                    <thead>
                       <tr>
                         <th>SERIAL</th>
                         <th>PRODUCT</th>
                         <th>DESCREPTION</th>
                         <th>TYPE</th>
                         <th>QYT</th>
                         <th>PCS./RFT</th>
                       </tr>
                    </thead>
                    <tbody id="myTable">
                    	
                <?php
								
				$select_query = "SELECT * FROM tbl_products, tbl_product_description, tbl_pcs_rft,tbl_product_type WHERE SERIAL = product_serial or SERIAL = product_serials or PCS_RFT = pcs_rft_id group by PRODUCT order by SERIAL";
				$query = mysqli_query($con,$select_query);

				checkErrors($query);

    			while ($row = mysqli_fetch_assoc($query)) {

				$serial = $row['SERIAL'];
				$product = $row['PRODUCT'];
				$descrit = $row['description'];
				$type = $row['type'];
				$qty = $row['QTY'];
				$prc = $row['PCS_RFTS'];

				// echo "<option value='$descrit'>$descrit</option>";	
			?>
			<?php
                echo"<tr>";
                      echo"<td><label>$serial</label></td>";
                      echo"<td><label>$product</label></td>";
                      echo"<td><select  name='descript'><option value='$descrit'>$descrit</option></select></td>";
                      echo"<td><select  name='type'><option value='$type'>$type</option>
                      <option value='$type'>$type</option></select></td>";
                      echo"<td><input name='qty' type='text' placeholder='Enter QTY' required/></td>";
                      echo"<td><select  name='pcs'><option value='$prc'>$prc</option></select></td>";            
                echo"</tr>";
                    }?>
                    </tbody>
                </table>
		<input type="submit" class="btn btn-success btn-lg btn-block" name="submit" value="Submit">

            </fieldset>
			</form>
	</center>
</body>
</html>