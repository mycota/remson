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
	
		?>

<!DOCTYPE html>
<html>
<head>
	<title>PRODUCTS</title>
	<style type="text/css">
	*{padding: 10px; margin: 10px; box-shadow: 30px 30px 30px 30px #F0F8FF;}
	select{width: 400px;}
	</style>

</head>

<body><center>
			<span>Products and descriptions</span>
			<form action="" method="POST" enctype="multipart/form-data">
			<span>Products:</span> 
			<br>
			<select type="number" name="product"/>
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
			<input type="submit" style="background-color: #008B8B; width: 400px" name="submit" value="Search"><br><br>
			<span>Products Description:</span><br>

			<select type="text" name="descrit">
				<?php
				$descrit = '';
				if (isset($_POST['submit'])) {
								
				$produt = mysqli_real_escape_string($con, $_POST['product']);
				//echo $produt;

				$select_query = mysqli_prepare($con, "SELECT distinct * FROM tbl_product_description WHERE product_serial = ?");
				mysqli_stmt_bind_param($select_query, "s", $produt);
				mysqli_stmt_execute($select_query);

				checkErrors($select_query);
    			$result = mysqli_stmt_get_result($select_query);

    			while ($row = mysqli_fetch_assoc($result)) {

				$descrit = $row['description'];

				echo "<option value='$descrit'>$descrit</option>";	
			}}?>
			</select>	<br>

			<span>Product Type:</span><br>
			<select type="text" name="ptype">
				<?php
				$type = '';
				if (isset($_POST['submit'])) {
								
				$produt = mysqli_real_escape_string($con, $_POST['product']);
				//echo $produt;

				$select_query = mysqli_prepare($con, "SELECT distinct * FROM tbl_product_type WHERE product_serials = ?");
				mysqli_stmt_bind_param($select_query, "s", $produt);
				mysqli_stmt_execute($select_query);

				checkErrors($select_query);
    			$result = mysqli_stmt_get_result($select_query);

    			while ($row = mysqli_fetch_assoc($result)) {

				$type = $row['type'];

				echo "<option value='$type'>$type</option>";	
			}}?>
			</select><br>
			<!-- <img width='400' height='190' src='images/$image' alt='Product image'><br> -->
			<a href="add.php">Add new products</a>

			</form>
	</center>
</body>
</html>