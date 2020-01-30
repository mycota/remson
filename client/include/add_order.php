<?php   
    $done = '';
  if (isset($_POST['submit'])) {

    $_SESSION['custid'] = mysqli($_POST['customer']);
    $_SESSION['jobnumber'] = mysqli($_POST['jobnu']);
    $_SESSION['glasstype'] = mysqli($_POST['glasstype']);
    $_SESSION['glassize1'] = mysqli($_POST['glassize1']);
    $_SESSION['glassize2'] = mysqli($_POST['glassize2']);
    $_SESSION['coattype'] = mysqli($_POST['coattype']);

    header("Location: ./orders.php?source=ao2");
      
      // echo "<script>alert('Product added ...........'); window.location='./orders.php?source=$customerid'</script>";  }
}
?>

<script>
function selectoption(){
  var opt1 = document.getElementById("glasstype");
  var opt2 = document.getElementById("glassize1");
  var opt3 = document.getElementById("glassize2");
  var opt4 = document.getElementById("coattype");

  if(opt1.value == "") {
    alert("Please select glass type");
    opt1.focus();
    return false;
  }
  if(opt2.value == "") {
    alert("Please select glass size");
    opt2.focus();
    return false;
  }
  if(opt4.value == "") {
    alert("Please select coating type");
    opt4.focus();
    return false;
  }

  return true;
  
}

</script>
<form action="" method="POST" enctype="multipart/form-data" id="frm">
      
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
<span>Select glass type:</span>
<select type="text" class="form-control" required id="glasstype" name="glasstype" onchange="populate(this.id,'glassize1'); populate2('glassize1', 'glassize2')">
  <option value="">Select glass type</option>
  <option value='TOUGHENED'>TOUGHENED</option>
  <option value="LAMINATED">LAMINATED</option>
</select>
</div>
<div class="form-group">    
        <span>Select glass size:</span>
        <select type="text" class="form-control" required name="glassize1" id="glassize1" onchange="populate2(this.id,'glassize2')">  
        </select>
      </div>

<div class="form-group">    
        <span>Select glass size:</span>
        <select type="text" class="form-control"  name="glassize2" id="glassize2">
        </select>
      </div>

      <div class="form-group">    
        <span>Coating Type:</span>
        <select type="text" class="form-control" required name="coattype" id="coattype">
          <option value="">Select coating type</option>
          <option value="ANODISED">ANODISED</option>
          <option value="POWDER COAT">POWDER COAT</option>
          <option value="PVDF">PVDF</option>
          <option value="WOODEN FINISH">WOODEN FINISH</option>
        </select>
      </div>

      <center>
      <div class="form-group">    
        <input type="submit" class="btn btn-primary" name="submit" onclick="selectoption()" value="Submit"><br><br>
        <!-- <a href="update.php">Add product dropd down</a> -->
      </div></center>
      </form>

</html>