<?php
if (isset($_GET['jn'])) {
  $_SESSION['jobnumber'] = $_GET['jn'];
  $query = mysqli_prepare($con,"SELECT * from tbl_packing_list, tbl_customer_details, tbl_packing_list_summary WHERE customerID = customerNo and jobNum = ?");
  mysqli_stmt_bind_param($query,"s", $_SESSION['jobnumber']);
  mysqli_stmt_execute($query);

  //confirmQuery($query);
  $result = mysqli_stmt_get_result($query);
  if (!$result) {
    echo "Sorry";
  }
  while($row = mysqli_fetch_array($result))
  {
        $custName = $row['custName'];
        $sitename = $row['siteName'];
        $custaddr = $row['custAddress'];
        $phone = $row['custPhone'];
        $jobnum = $row['jobNum'];
        $glasstype = $row['glasstype'];
        $glassize1 = $row['glassize1'];
        $glassize2 = $row['glassize2'];
        $coating = $row['coating'];

        $orderdate = date('d/m/Y',strtotime($row['orderSystemdate']));
  }
}
else{
  if (isset($_SESSION['custid']) ) {
  //$_SESSION['jobnumber'] = $_GET['jn'];
  $query = mysqli_prepare($con,"SELECT * from tbl_packing_list, tbl_customer_details, tbl_packing_list_summary WHERE customerID = customerNo and jobNum = ?");
  mysqli_stmt_bind_param($query,"s", $_SESSION['jobnumber']);
  mysqli_stmt_execute($query);

  //confirmQuery($query);
  $result = mysqli_stmt_get_result($query);

  while($row = mysqli_fetch_array($result))
  {
        $custName = $row['custName'];
        $sitename = $row['siteName'];
        $custaddr = $row['custAddress'];
        $phone = $row['custPhone'];
        $jobnum = $row['jobNum'];
        $glasstype = $row['glasstype'];
        $glassize1 = $row['glassize1'];
        $glassize2 = $row['glassize2'];
        $coating = $row['coating'];

        $orderdate = date('d/m/Y',strtotime($row['orderSystemdate']));
  }
}
}
?>

    <body>

  
  <div class="container-fluid">
      <div class="row-fluid"> 
  <div class="span10"><br>
  <div class="pull-right" style="margin-right:100px;">
    <a href="javascript:Clickheretoprint()" style="font-size:20px; position:absolute; margin-top: 20px; left: 800px"><button class="btn btn-success btn-large"><i class="icon-print"></i> Print</button></a>
    </div>
  
<div class="content" id="content">
  <div class="clearfix"></div>
  
  <div style="width: 100%; margin-top:0px;">
<fieldset class="page-header">
            <legend></legend>
            <img style="width: 100%;" src="../resources/images/head.jpg">
</fieldset>
            <center><label><h3>PACKING LIST</h3></label></center>

<fieldset><center><legend><label style="padding-left: 20px;"><h2>Job Number: <?php echo $jobnum; ?></h2></label>
</legend></center>
<fieldset class="page-header" style="float: left;">
    <table>
    <tr>
      <td>Customer:</td>
      <td><?php echo $custName; ?></td>
    </tr>
    <tr>
      <td>Site Name:</td>
      <td><?php echo $sitename; ?></td>
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
    
<fieldset class="page-header" style="float: right; padding-bottom: px;">
    <table>
    <tr style="margin-top: 2344px">
      <td>Date:</td>
      <td><?php echo $orderdate; ?></td>
    </tr>
    <tr style="margin-top: 2344px">
      <td>Glass Type: </td>
      <td><?php echo $glasstype; ?></td>
    </tr>
    <tr style="margin-top: 2344px">
      <td>Glass Size: </td>
      <td><?php echo $glassize1.', '.$glassize2; ?></td>
    </tr>
    <tr style="margin-top: 2344px">
      <td>Coating Type: </td>
      <td><?php  echo $coating; ?></td>
    </tr>
  </table>
</fieldset>
</fieldset>
</center>
  <table border="1" cellpadding="4" cellspacing="0" style="font-family: arial; font-size: 12px; text-align:left;" width="100%">
    <thead>
      <tr>
                <th>Product</th>
                <th>Description</th>
                <th>Type</th>
                <th>QTY</th>
                <th>PCS/RFT</th>
      </tr>
    </thead>
    <tr>
      <td>&nbsp;</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tbody>
      
        <?php
          if (isset($_SESSION['custid']) ) {

          $query = mysqli_prepare($con,"SELECT * from tbl_packing_list, tbl_customer_details WHERE customerID = customerNo and jobNum = ?");
         mysqli_stmt_bind_param($query,"s", $_SESSION['jobnumber']);
         mysqli_stmt_execute($query);

         confirmQuery($query);
         $result = mysqli_stmt_get_result($query);

         while($row = mysqli_fetch_array($result))
          {
              
        ?>
        <tr class="record">
        <td><?php echo $custid = $row['product']; ?></td>
        <td><?php echo $row['description']; ?></td>
        <td>
        <?php echo $row['type']        ?>
        </td>
        <td><?php echo $row['qty']; ?></td>
        <td>
        <?php echo $row['pcs_rft'];?>
        </td>
                        
        </tr>
        <?php
      }
    }?>
        
    </tbody>
  </table>
  <?php echo "Date printed: ".date('d-m-Y');?>
  <!-- <fieldset class="page-header">
            <legend></legend>
            <img style="width: 100%;" src="../resources/images/footer.jpg">
          </fieldset> -->
        
  
  </div>
  </div>
  </div>
  </div>
  </div>
</div>
</div>
<?php //include_once('footer.php');?>
