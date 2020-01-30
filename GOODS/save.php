<?php
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
	if (isset($_POST['date'])) {

		$date = $_POST['date'];
		$custName = $_POST['custName'];
		$jobNumber = $_POST['jobNumber'];
		$line = $_POST['line'];
		$type = $_POST['type'];
		$hr = $_POST['hr'];
		$cut = $_POST['cut'];
		$coat = $_POST['coat'];
		$assem = $_POST['assem'];
		$packing = $_POST['packing'];
		$disp = $_POST['disp'];
		$glasOrder = $_POST['glasOrder'];
		$orddate = $_POST['orddate'];
		$ddate = $_POST['ddate'];
		$fab = $_POST['fab'];

		for($count = 0; $count<count($date); $count++){
  			$date_clean = mysqli_real_escape_string($con, $date[$count]);
  			$custName_clean = mysqli_real_escape_string($con,$custName[$count]);
  			$jobNumber_clean = mysqli_real_escape_string($con,$jobNumber[$count]);
  			$line_clean = mysqli_real_escape_string($con,$line[$count]);
  			$type_clean = mysqli_real_escape_string($con,$type[$count]);
  			$hr_clean = mysqli_real_escape_string($con,$hr[$count]);
  			$cut_clean = mysqli_real_escape_string($con,$cut[$count]);
  			$coat_clean = mysqli_real_escape_string($con,$coat[$count]);
  			$assem_clean = mysqli_real_escape_string($con,$assem[$count]);
  			$packing_clean = mysqli_real_escape_string($con,$packing[$count]);
  			$disp_clean = mysqli_real_escape_string($con,$disp[$count]);
  			$glasOrder_clean = mysqli_real_escape_string($con,$glasOrder[$count]);
  			$orddate_claen = mysqli_real_escape_string($con,$orddate[$count]);
  			$ddate_clean = mysqli_real_escape_string($con,$ddate[$count]);
  			$fab_clean = mysqli_real_escape_string($con,$fab[$count]);

  			$insert_query = mysqli_prepare($con,"INSERT INTO tbl_production (proDate, custName, jobNumber, line, type, hr, cutting, coating, assemb, pack, disp, glassOrdered, orderDate, deliDate, fabricate) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    		mysqli_stmt_bind_param($insert_query,"sssssssssssssss", $date_clean,$custName_clean,$jobNumber_clean,$line_clean,$type_clean,$hr_clean,$cut_clean,$coat_clean,$assem_clean,$packing_clean,$disp_clean,$glasOrder_clean,$orddate_claen,$ddate_clean,$fab_clean);
    		mysqli_stmt_execute($insert_query);
    	   //$done.= "Details successfully added:"; 
			}
			checkErrors($insert_query);

 			$result = $insert_query->fetchAll();

			if(isset($result))
  			{
				echo 'ok';
			}
		}
		?>