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

  // drop dwon functions 
	function done(){
		$value = '';
		$items = array('Pending', 'Done');

		foreach($items as $item)
 			{
  			$value .= '<option value="'.$item.'">'.$item.'</option>';
 			}
 		return $value;
	}

	function type(){
		$value = '';
		$items = array('B/W', 'B/FC', 'F/P');

		foreach($items as $item)
 			{
  			$value .= '<option value="'.$item.'">'.$item.'</option>';
 			}
 		return $value;
	}

	function line(){
		$value = '';
		$items = array('STAR', 'SMART', 'SQUARE', 'SLIM', 'SLEEK', 'SMALL', 'SEA', 'SUPER', 'SIGNATURE', 'SPARK', 'SKY');

		foreach($items as $item)
 			{
  			$value .= '<option value="'.$item.'">'.$item.'</option>';
 			}
 		return $value;
	}

	function hr(){
		$value = '';
		$items = array('ROUND', 'SQUARE', 'SMALL', 'SLEEK', 'SLIM', 'EDGE GUARD', 'HALF ROUND', 'RECTANGLE', 'INCLINE');

		foreach($items as $item)
 			{
  			$value .= '<option value="'.$item.'">'.$item.'</option>';
 			}
 		return $value;
	}

	function coating(){
		$value = '';
		$items = array('REAL', 'SHREE', 'GANESH', 'SOMNATH');

		foreach($items as $item)
 			{
  			$value .= '<option value="'.$item.'">'.$item.'</option>';
 			}
 		return $value;
	}

	// End of drop down functions

	function jobNumbers(){
		global $con;
		$jobNumber_clean = '';

		$query = "SELECT jobNumber from tbl_production ";
  
  		$select_query = mysqli_query($con,$query);
  		checkErrors($select_query);

  		while ($row = mysqli_fetch_assoc($select_query)) {

        $jobNumber_clean .= $row['jobNumber'];
    }
    return $jobNumber_clean;
	}

  function customerID(){
    global $con;
    $customerID = '';

    $query = "SELECT * from tbl_customer_details";
  
      $select_query = mysqli_query($con,$query);
      confirmQuery($select_query);

      while ($row = mysqli_fetch_assoc($select_query)) {

        $customerID.= '<option value="'.$row['customerID'].'">'.$row['custName'].'</option>';
    }
    return $customerID;
  }
	
	//$date = '';
	//$date = date('d-m-Y');
	$done = '';
	if (isset($_POST["date"])) {

		$insert_query = '';

		$date = $_POST["date"];
		$custName = $_POST["custName"];
		$jobNumber = $_POST["jobNumber"];
		$line = $_POST["line"];
		$type = $_POST["type"];
		$hr = $_POST["hr"];
		$cut = $_POST["cut"];
		$coat = $_POST["coat"];
		$assem = $_POST["assem"];
		$packing = $_POST["packing"];
		$disp = $_POST["disp"];
		$glasOrder = $_POST["glasOrder"];
		$orddate = $_POST["orddate"];
		$ddate = $_POST["ddate"];
		$fab = $_POST["fab"];
		$findate = $_POST["findate"];
		$totalTower = $_POST["totalTower"];
    $totalTowerOrd = $_POST["totalTowerOrd"];
		$remarks = $_POST["remarks"];

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
  			$findate_clean = mysqli_real_escape_string($con,$findate[$count]);
  			$totalTower_clean = mysqli_real_escape_string($con,$totalTower[$count]);
        $totalTowerOrd_clean = mysqli_real_escape_string($con,$totalTowerOrd[$count]);
  			$remarks_clean = mysqli_real_escape_string($con,$remarks[$count]);

  			$insert_query = mysqli_prepare($con,"INSERT INTO tbl_production (proDate, custName, jobNumber, line, type, hr, cutting, coating, assemb, pack, disp, glassOrdered, orderDate, deliDate, fabricate,final_date_deli, total_tower, total_tower_ordered, remarks) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    		mysqli_stmt_bind_param($insert_query,"ssssssssssssssssdds", $date_clean,$custName_clean,$jobNumber_clean,$line_clean,$type_clean,$hr_clean,$cut_clean,$coat_clean,$assem_clean,$packing_clean,$disp_clean,$glasOrder_clean,$orddate_claen,$ddate_clean,$fab_clean,$findate_clean,$totalTower_clean,$totalTowerOrd_clean,$remarks_clean);
    		mysqli_stmt_execute($insert_query);
    	   //$done.= "Details successfully added:"; 
			}
			checkErrors($insert_query);

 			//$result = $insert_query->fetchAll();

 			if($insert_query != '')
 			{
 				if(mysqli_multi_query($con,$insert_query))
  				{
				echo 'ok';
				}
			else{
				echo "error";
			}
		}
	}
		?>

<!DOCTYPE html>
<html>
<head>
	<title>ADD PRODUCTS</title>
 
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcd.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="icon" type="image/jpeg" href="images/alumi.jpeg"/>
 </head>

<body>
			<br />
  <div class="container">
   <h3 align="center">Add rows to begin entries</h3>
   <br />
   <!-- <h4 align="center">Enter Details</h4> -->
   <br />
   <form method="post" id="insert_form">
   	<fieldset>
   		<?php //echo jobNumbers(); ?>
   		<legend><h4 alin="center">Enter Details</h4></legend>
    <div class="table-repsonsive">
     <span id="error"></span>
     <table class="table table-bordered table-hover" id="item_table">
                    
                       <tr>
                         <th>DATE</th>
                         <th>CUSTOMER_NAME&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</th>
                         <th>Job_Number&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</th>
                         <th>SYSTEM&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</th>
                         <th>TYPE&emsp;&emsp;&emsp;&emsp;</th>
                         <th>H/R&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</th>
                         <th>CUTTING&emsp;&emsp;&emsp;&emsp;</th>
                         <th>COATING&emsp;&emsp;&emsp;&emsp;</th>
                         <!-- <th>COUNTING&emsp;&emsp;&emsp;&emsp;</th> -->
                         <th>ASSEMBLY&emsp;&emsp;&emsp;&emsp;</th>
                         <th>PACKING&emsp;&emsp;&emsp;&emsp;</th>
                         <th>DISPATCH&emsp;&emsp;&emsp;&emsp;</th>
                         <th>GLASS_ORDERED&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</th>
                         <th>ORDERED_DATE</th>
                         <th>DELIVERY_DATE</th>
                         <th>FABIRICATOR&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</th>
                         <th>FINAL_DELIVERY_DATE</th>
                         <th>TOTAL_TOWER</th>
                         <th>TOTAL_TOWER_ORDERED</th>
                         <th>REMARKS</th>
                       <th><button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>  
               		</tr>
     </table>
     <div align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Submit" />
     </div>
    </div>
   </form>
   </fieldset>
  </div>
 </body>
</html>
<script>
$(document).ready(function(){
 
 $(document).on('click', '.add', function(){
  var html = '';
  html += '<tr>';
  html += '<td><input name="date[]" type="date" class="form-control date" /></td>';
  // html += '<td><input name="custName[]" type="text" placeholder="Enter customer name" class="form-control custName"/></td>';
  html += '<td><select name="custName[]" class="form-control custName"><?php echo customerID(); ?></select></td>';

  html += '<td><input name="jobNumber[]" type="text" class="form-control jobNumber" placeholder="Enter job number"/></td>';
  html += '<td><select name="line[]" class="form-control line"><?php echo line(); ?></select></td>';
  html += '<td><select name="type[]" class="form-control type"><?php echo type(); ?></select></td>';
  html += '<td><select name="hr[]" class="form-control hr"><?php echo hr(); ?></select></td>';
  html += '<td><select name="cut[]" class="form-control cut"><?php echo done(); ?></select></td>';
  html += '<td><select name="coat[]" class="form-control coat"><?php echo coating(); ?></select></td>';
  // html += '<td><select name="count[]" class="form-control count"><?php //echo done(); ?></select></td>';
  html += '<td><select name="assem[]" class="form-control assem"><?php echo done(); ?></select></td>';
  html += '<td><select name="packing[]" class="form-control packing"><?php echo done(); ?></select></td>';
  html += '<td><select name="disp[]" class="form-control disp"><?php echo done(); ?></select></td>';
  html += '<td><input name="glasOrder[]" type="text" class="form-control glasOrder" placeholder="Enter glass ordered"/></td>';
  html += '<td><input name="orddate[]" type="date" class="form-control orddate" placeholder="Enter delivery date" /></td>';
  html += '<td><input name="ddate[]" type="date" class="form-control ddate" placeholder="Enter delivery date" /></td>';


  html += '<td><input name="fab[]" type="text" class="form-control fab" placeholder="Enter fabiricator"/></td>';
  html += '<td><input name="findate[]" type="date" class="form-control findate" /></td>';
  html += '<td><input name="totalTower[]" type="number" class="form-control totalTower" placeholder="Enter total tower" /></td>';
  html += '<td><input name="totalTowerOrd[]" type="number" class="form-control totalTowerOrd" placeholder="Enter total tower ordered" /></td>';
  html += '<td><textarea name="remarks" class="form-control remarks" cols="30" rows="5"></textarea></td>';

  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
  $('#item_table').append(html);
  html += '<td><input name="jobNum[]" type="date" value="<?echo jobNumbers();?>" class="form-control jobNum" placeholder="Enter delivery date" /></td>';


 });
 
 $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });
 
 $('#insert_form').on('submit', function(event){
  event.preventDefault();
  var error = '';
  // var num1 = parseInt($('.jobNumber').val());
  // var num2 = parseInt($('.jobNum').val());
  $('.jobNum').each(function(){
   var count = 1;
   if(nu1 == num2)
   {
    error += "<p>Sorry job number already exist "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  $('.date').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter  date at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.custName').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter customer name at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.jobNumber').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select job number at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });

  $('.line').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter line at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });

  $('.hr').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter H/R at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });

  $('.glasOrder').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter glass ordered at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });

  $('.orddate').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter ordered date at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });

  $('.ddate').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter delivery date at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });

  $('.fab').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter fabiricator at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });

  $('.findate').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter final delivery date"+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });

  $('.totalTower').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter total tower"+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });

  $('.totalTowerOrd').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter total tower ordered"+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });

  $('.remarks').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter provide some remarks"+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });

  var form_data = $(this).serialize();
  if(error == '')
  {
   $.ajax({
    url:"addEntry.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
    	$('#item_table').find("tr:gt(0)").remove();
      $('#error').html('<div class="alert alert-success">Entries saved ...... </div>');
      window.location.href = "display.php";
     if(data == 'ok')
     {
      $('#item_table').find("tr:gt(0)").remove();
      $('#error').html('<div class="alert alert-success">Entries saved ...... </div>');
      window.location.href = "display.php";
      // window.location.replace("http://stackoverflow.com");
     }
    }
   });
  }
  else
  {
   $('#error').html('<div class="alert alert-danger">'+error+'</div>');
  }
 });
 
});
</script>