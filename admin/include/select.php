<?php 	
	  $done = '';
  if (isset($_POST['submit'])) {

    $_SESSION['custid'] = mysqli($_POST['customer']);
    $_SESSION['glassize'] = mysqli($_POST['glassize']);
    $_SESSION['jobnumber'] = $jobNumber;

      header("Location: ./orders.php?source");
      

      // echo "<script>alert('Product added ...........'); window.location='./orders.php?source=$customerid'</script>";  }
}
?>

<script>
function populate(s1,s2){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	s2.innerHTML = "";
	if(s1.value == "TOUGHENED"){
		var optionArray = [" | ", "10 MM TOUGHENED | 10 MM TOUGHENED", "12 MM TOUGHENED | 12 MM TOUGHENED"];
	} else if(s1.value == "LAMINATED"){
		var optionArray = ["|","SENTRY|SENTRY","PVB|PVB"];
	} else if(s1.value == "Ford"){
		var optionArray = ["|","mustang|Mustang","shelby|Shelby"];
	}
	for(var option in optionArray){
		var pair = optionArray[option].split("|");
		var newOption = document.createElement("option");
		newOption.value = pair[0];
		newOption.innerHTML = pair[1];
		s2.options.add(newOption);
	}
}
</script>
<form action="" method="POST" enctype="multipart/form-data">
      
      <div id="page-wrapper" style="background-color: #5F9EA0; ">
       <center><span ><h2>Select a Customer to begin</h2></span></center> <hr>                  
    <div class="container-fluid">

   <div class="row" >
    
    <div class="col-lg-12">

      <div class="form-group">    
        <span>Job Number:</span>
        <input type="text" class="form-control" name="jobnu" required placeholder="Enter job number" />
      </div>

      <div class="form-group">    
        <span>Select a Customer to begin:</span>
        <select type="text" class="form-control" name="customer"/>
        <?php
        //include "ran.php";
        //$random = new \PHP\Random(true);
        //$d = $random->token(10, '0123456789');            
        $query = "SELECT * FROM tbl_customer_details";
        $select_prod = mysqli_query($con, $query);
          
            //confirmQuery($select_prod);

           while ($row = mysqli_fetch_assoc($select_prod)) {
            $id = $row['customerID'];
            $custname = $row['custName'];
            $site = $row['siteName'];
            $phone = $row['custPhone'];

            echo "<option value='$id'>$custname - $site - $phone</option>";
          }
//echo date("Ymds");
          ?>
          </select>
</div>
<div class="form-group">    
<span>Select glass size:</span>
<select type="text" class="form-control" id="slct1" name="slct1" onchange="populate(this.id,'slct2')">
  <option value=""></option>
  <option value='TOUGHENED'>TOUGHENED</option>
  <option value="LAMINATED">LAMINATED</option>
</select>
</div>
<div class="form-group">    
        <span>Select glass size:</span>
        <select type="text" class="form-control" name="slt2" id="slt2">  
        </select>
      </div>

<div class="form-group">    
        <span>Select glass size:</span>
        <select type="text" class="form-control" name="slct2" id="slct2">
        </select>
      </div>

      <div class="form-group">    
        <span>Coating Type:</span>
        <select type="text" class="form-control" name="glassize3" id="glassize3" />
        </select>
      </div>

      <center>
      <div class="form-group">    
        <input type="submit" class="btn btn-primary" name="submit" value="Submit"><br><br>
        <!-- <a href="update.php">Add product dropd down</a> -->
      </div></center>
      </form>

</html>