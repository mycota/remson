<?php 
if (isset($_GET['jn'])) {
  $_SESSION['jobnumber'] = $_GET['jn'];
  $_SESSION['custid'] = $_GET['css'];
  $query = mysqli_prepare($con,"SELECT * from tbl_transporter, tbl_customer_details WHERE jobnumb = ? and customerID = ?");
  mysqli_stmt_bind_param($query,"ss", $_SESSION['jobnumber'], $_SESSION['custid']);
  mysqli_stmt_execute($query);

  confirmQuery($query);
  $result = mysqli_stmt_get_result($query);

  while($row = mysqli_fetch_array($result))
  {
        $transporter = $row['transporter'];
        $date = $row['date'];
        $custName = $row['custName'];
        $jobnum = $row['jobnumb'];
        $custaddr = $row['custAddress'];
        $phone = $row['custPhone'];

        $orderdate = date('d/m/Y',strtotime($row['systemtime']));
  }
}

?>    
    <style>
tr.div.gallery {
  margin: 5px;
  border: 1px solid #ccc;
  float: left;
  width: 180px;
}

tr.div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

</style>

<div class="pull-right" style="margin-right:100px;">
    <a href="javascript:Clickheretoprint()" style="font-size:20px; position:absolute; margin-top: 20px; left: 800px"><button class="btn btn-success btn-large"><i class="icon-print"></i> Print</button></a>
    </div>
  
<div class="content" id="content">
  <div class="clearfix"></div>        
          <fieldset class="page-header">
            <!-- <legend>Invoice:</legend> -->
            <img style="width: 100%;" src="../resources/images/head.jpg">
          </fieldset>
<center><span>.....................................................................................................Transporter.................................................................................................</span></center><br>
<fieldset class="page-header" style="float: left;">
    <table>
    <tr>
      <td>Customer:</td>
      <td><?php echo $custName; ?></td>
    </tr>
    <tr>
      <td>Transporter:</td>
      <td><?php echo $transporter; ?></td>
    </tr>
    <tr style="margin-top: 2344px">
      <td>Address:</td>
      <td><?php echo $custaddr; ?></td>
    </tr>
    <tr style="margin-top: 2344px">
      <td>Phone:</td>
      <td><?php echo $phone; ?></td>
    </tr>
  </table>
</fieldset>
<br>

<?php
          $query = mysqli_prepare($con,"SELECT * from tbl_transporter, tbl_customer_details WHERE jobnumb = ? and customerID = ?");
  mysqli_stmt_bind_param($query,"ss", $_SESSION['jobnumber'], $_SESSION['custid']);
  mysqli_stmt_execute($query);

  confirmQuery($query);
  $result = mysqli_stmt_get_result($query); 
         
         logs($_SESSION['id'], $_SESSION['username'], "View packing list");
         while($row = mysqli_fetch_array($result))
              {
    
                    
                    ?>
  <tr><td><div class="gallery">
  <a href="../resources/images/bill_receipt/<?php echo $row['bill']?>">
    <img src="../resources/images/bill_receipt/<?php echo $row['bill']?>"><br>
  </a>
  </div></td>
  <td><div class="gallery">
  <a href="../resources/images/bill_receipt/<?php echo $row['receipt']?>">
    <img src="../resources/images/bill_receipt/<?php echo $row['receipt']?>"
    ><br>
  </a>
  </div></td>
  </tr>
                    
        <?php 
              }

       ?>

                  
        </div>
</div>

                <hr>

                
                
                <?php 
                
                // for deleting a comment
                if (isset($_SESSION['role'])) {

                  if($_SESSION['role'] == 'Admin'){

                if(isset($_GET['add_order2'])) {
                  
                  $the_cust_id = mysqli($_GET['add_order2']);

                  $query = "UPDATE tbl_products SET orderDel = 'Remove' where SERIAL = '$the_cust_id'";

                  $delete_query = mysqli_query($con, $query);

                  confirmQuery($delete_query);
                  logs($_SESSION['id'], $_SESSION['username'], "Deleted a customer $the_cust_id");
                  header("Location: ./orders.php?source");
                }
                  
              }
            }
            ?>