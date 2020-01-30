<?php   
    $done = '';
  if (isset($_POST['submit'])) {

    $cid = mysqli($_POST['customer']);
    header("Location: ./quotationmenu?source=quots&cid=$cid");
      
      // echo "<script>alert('Product added ...........'); window.location='./orders.php?source=$customerid'</script>";  }
}
?>


<form action="" method="POST" enctype="multipart/form-data" id="frm">
      
      <div id="page-wrapper" style='background-image: url("../resources/images/handrails/ROUND_60MM.jpg"); '>
       <center><span ><h2>Select an existing client to begin or crate news</h2></span></center> <hr>                  
    <div class="container-fluid">

   <div class="row" >
    
    <div class="col-lg-12">

      
      <div class="form-group">    
        <span>Select a Customer to begin:</span>
        <select type="text" class="form-control" required name="customer"/>
        <option value="">Select Existing Clients</option>
            <?php 
            $client = $_SESSION['id'];
            $query = "SELECT * FROM tbl_agent_customer where agentCode = $client";
            $select_cust = mysqli_query($con, $query);

            confirmQuery($select_cust);

            logs($_SESSION['id'], $_SESSION['username'], "View site measurment");

            while($row = mysqli_fetch_assoc($select_cust))
            {
              $id = $row['agentCust_ID'];
              $party = $row['partyName'];
              $bilname = $row['billingName'];
              $place = $row['place'];
              $biladres = $row['billingAddress'];
            echo "<option value='$id'>$party - $bilname - $place</option>";


            }
            ?>
          </select>
</div>
      <center>
      <div class="form-group">    
        <input type="submit" class="btn btn-primary" name="submit" value="Submit"><br><br>
        <a href="./quotationmenu?source=quots"> <input type="button" class="btn btn-primary" style="background-color: orange;" value="New Client"></a>
      </div></center>
      </form>

</html>