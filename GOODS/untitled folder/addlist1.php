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
	select{width: 100px;}
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
                         
                         <th>DATE</th>
                         <th>CUSTOMER NAME</th>
                         <th>Job Number</th>
                         <th>SYSTEM</th>
                         <th>H/R</th>
                         <th>TYPE</th>
                         <th>CUTTING</th>
                         <th>COATING</th>
                         <th>COUNTING</th>
                         <th>ASSEMBLY</th>
                         <th>PACKING</th>
                         <th>DISPATCH</th>
                         <th>GLASS ORDERED</th>
                         <th>DELIVERY DATE</th>
                         <th>SYSTEM DELI DATE</th>
                         <th>FABIRICATOR</th>
                       </tr>
                    </thead>
                    <tbody id="myTable">
                    <tr>	
                      
                      <td><input name='d1' type="date" placeholder='Enter date' required/></td>
                      <td><input name='c1' type='text' placeholder='Enter customer name' required/></td>            
                      <td><input name='j1' type='text' placeholder='Enter job number' required/></td>            
                      <td><input name='l1' type='text' placeholder='Enter line' required/></td>            
                      <td><input name='hr1' type='text' placeholder='Enter H/R' required/></td>            
                                
                      <td><select  name='typ'><option value='B/W'>B/W</option><option value='B/FC'>B/FC</option><option value='F/P'>F/P</option></select></td>
                      <td><select  name='cut1'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='coa1'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='cou1'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='ass1'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='pac1'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='dis1'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>        
                      <td><input name='g1' type='text' placeholder='Enter glass ordered' required/></td>            
                       
                      <td><input name='dd1' type="date" placeholder='Enter date' required/></td>
                      <td><input name='dd1' type="sdate" value="<?php echo date('d-m-Y');?>" readonly required/></td>
                      <td><input name='f1' type='text' placeholder='Enter fabiricator' required/></td>            
                                 
               		</tr>
<!-- 
               		<tr>	
                      
                      <td><input name='d2' type="date" placeholder='Enter date' required/></td>
                      <td><input name='c2' type='text' placeholder='Enter customer name' required/></td>            
                      <td><input name='l2' type='text' placeholder='Enter line' required/></td>            
                      <td><input name='hr2' type='text' placeholder='Enter H/R' required/></td>            
                                 
                      <td><select  name='cut2'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='coa2'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='cou2'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='ass2'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='pac'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='dis2'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><input name='g2' type='text' placeholder='Enter glass ordered' required/></td>           
                      <td><input name='dd2' type="date" placeholder='Enter date' required/></td>
                                  
                      <td><input name='f2' type='text' placeholder='Enter fabiricator' required/></td>            
                                  
               		</tr>

               		<tr>	
                      
                      <td><input name='d3' type="date" placeholder='Enter date' required/></td>
                      <td><input name='c3' type='text' placeholder='Enter customer name' required/></td>            
                      <td><input name='l3' type='text' placeholder='Enter line' required/></td>            
                      <td><input name='hr3' type='text' placeholder='Enter H/R' required/></td>            
                                 
                      <td><select  name='cut3'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='coa3'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='cou3'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='ass3'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='pac3'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='dis3'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>       
                      <td><input name='g3' type='text' placeholder='Enter glass ordered' required/></td>           
                      <td><input name='dd3' type="date" placeholder='Enter date' required/></td>
                                 
                      <td><input name='f3' type='text' placeholder='Enter fabiricator' required/></td>            
                                  
               		</tr>
               		<tr>	
                      
                      <td><input name='d4' type="date" placeholder='Enter date' required/></td>
                      <td><input name='c4' type='text' placeholder='Enter customer name' required/></td>            
                      <td><input name='l4' type='text' placeholder='Enter line' required/></td>            
                      <td><input name='hr4' type='text' placeholder='Enter H/R' required/></td>            
                                  
                      <td><select  name='cut4'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='coa4'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='cou4'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='ass4'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='pac4'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='dis4'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>          
                      <td><input name='g4' type='text' placeholder='Enter glass ordered' required/></td>            
                      <td><input name='dd4' type="date" placeholder='Enter date' required/></td>
                                  
                      <td><input name='f4' type='text' placeholder='Enter fabiricator' required/></td>            
                                 
               		</tr>
               		<tr>	
                      
                      <td><input name='d5' type="date" placeholder='Enter date' required/></td>
                      <td><input name='c5' type='text' placeholder='Enter customer name' required/></td>            
                      <td><input name='l5' type='text' placeholder='Enter line' required/></td>            
                      <td><input name='hr5' type='text' placeholder='Enter H/R' required/></td>            
                                  
                      <td><select  name='cut5'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='coa5'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='cou5'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='ass5'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='pac5'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='dis5'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>          
                      <td><input name='g5' type='text' placeholder='Enter glass ordered' required/></td>            
                      <td><input name='dd5' type="date" placeholder='Enter date' required/></td>
                                 
                      <td><input name='f5' type='text' placeholder='Enter fabiricator' required/></td>            
                                 
               		</tr>
               		<tr>	
                      
                      <td><input name='d6' type="date" placeholder='Enter date' required/></td>
                      <td><input name='c6' type='text' placeholder='Enter customer name' required/></td>            
                      <td><input name='l6' type='text' placeholder='Enter line' required/></td>            
                      <td><input name='hr7' type='text' placeholder='Enter H/R' required/></td>            
                                  
                      <td><select  name='cut6'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='cou6'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='coa6'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='ass6'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='pac6'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='dis6'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>           
                      <td><input name='g6' type='text' placeholder='Enter glass ordered' required/></td>            
                      <td><input name='dd6' type="date" placeholder='Enter date' required/></td>
                                  
                      <td><input name='f6' type='text' placeholder='Enter fabiricator' required/></td>            
                               
               		</tr>
               		<tr>	
                      
                      <td><input name='d7' type="date" placeholder='Enter date' required/></td>
                      <td><input name='c7' type='text' placeholder='Enter customer name' required/></td>            
                      <td><input name='l7' type='text' placeholder='Enter line' required/></td>            
                      <td><input name='hr7' type='text' placeholder='Enter H/R' required/></td>            
                                  
                      <td><select  name='cut7'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='coa7'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='cou7'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='ass7'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='pac7'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='dis7'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>           
                      <td><input name='g7' type='text' placeholder='Enter glass ordered' required/></td>            
                      <td><input name='dd7' type="date" placeholder='Enter date' required/></td>
                                  
                      <td><input name='f7' type='text' placeholder='Enter fabiricator' required/></td>            
                                
               		</tr>
               		<tr>	
                      
                      <td><input name='d8' type="date" placeholder='Enter date' required/></td>
                      <td><input name='c8' type='text' placeholder='Enter customer name' required/></td>            
                      <td><input name='l8' type='text' placeholder='Enter line' required/></td>            
                      <td><input name='hr8' type='text' placeholder='Enter H/R' required/></td>            
                                  
                      <td><select  name='cut8'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='coa8'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='cou8'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='ass8'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='pac8'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='dis8'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>           
                      <td><input name='g8' type='text' placeholder='Enter glass ordered' required/></td>            
                      <td><input name='dd8' type="date" placeholder='Enter date' required/></td>
                                 
                      <td><input name='f8' type='text' placeholder='Enter fabiricator' required/></td>            
                                  
               		</tr>
               		<tr>	
                      
                      <td><input name='d9' type="date" placeholder='Enter date' required/></td>
                      <td><input name='c9' type='text' placeholder='Enter customer name' required/></td>
                      <td><input name='l9' type='text' placeholder='Enter line' required/></td>            
                      <td><input name='hr9' type='text' placeholder='Enter H/R' required/></td>            
                                  
                      <td><select  name='cut9'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='coa9'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='cou9'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='ass9'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='pac9'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>
                      <td><select  name='dis9'><option value='Pending'>Pending</option><option value='Done'>Done</option></select></td>           
                      <td><input name='g9' type='text' placeholder='Enter glass ordered' required/></td>            
                      <td><input name='dd9' type="date" placeholder='Enter date' required/></td>
                                  
                      <td><input name='f9' type='text' placeholder='Enter fabiricator' required/></td>            
                                
               		</tr>
 -->
                    </tbody>
                </table>
		<input type="submit" class="btn btn-success btn-lg btn-block" name="submit" value="Print">

            </fieldset>
			</form>
	</center>
</body>
</html>