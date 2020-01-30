    <!-- <center><h1 class="page-header" style="background-color: #00CED1; color: white;">
        Packing List</h1></center>
        <input class="form-control" id="myInput" type="text" placeholder="Search.."> -->
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

<div class="pull-right" style="margin-right:100px;">
    <a href="javascript:Clickheretoprint()" style="font-size:20px; position:absolute; margin-top: 20px; left: 800px"><button class="btn btn-success btn-large"><i class="icon-print"></i> Print</button></a>
    </div>
  
<div class="content" id="content">
  <div class="clearfix"></div>        
          <fieldset class="page-header">
            <!-- <legend>Invoice:</legend> -->
            <img style="width: 100%;" src="../resources/images/head.jpg">
          </fieldset>
          </fieldset>
<center><span>.....................................................................................................Transporter.................................................................................................</span></center>
<fieldset class="page-header" style="float: left;">
    <table>
    <tr>
      <td>Customer:</td>
      <td><?php echo @$custName; ?></td>
    </tr>
    <tr>
      <td>Transporter:</td>
      <td><?php echo @$transporter; ?></td>
    </tr>
    <tr style="margin-top: 2344px">
      <td>Address:</td>
      <td><?php echo @$custaddr; ?></td>
    </tr>
    <tr style="margin-top: 2344px">
      <td>Phone:</td>
      <td><?php echo @$phone; ?></td>
    </tr>
    <tr style="margin-top: 2344px">
      <td>Jobnumber: </td>
      <td><?php echo @$jobnum; ?></td>
    </tr>
  </table>
</fieldset>
<br>

  <table class="table table-bordered table-hover">
                    <thead style="background-color: gray">
                      <tr>
                        <th>Date</th>
                        <th>Job Number</th>
                        <th>Bill</th>
                        <th>Receipt</th>
                        <th>Manage</th>
                      </tr>
                    </thead>     
                  <tbody id="myTable">
        <?php 
                logs($_SESSION['id'], $_SESSION['username'], "View transporter list");

         $query = mysqli_prepare($con,"SELECT * from tbl_transporter, tbl_customer_details WHERE jobnumb = ? and customerID = ?");
        mysqli_stmt_bind_param($query,"ss", $_SESSION['jobnumber'], $_SESSION['custid']);
        mysqli_stmt_execute($query);

        confirmQuery($query);
        $result = mysqli_stmt_get_result($query);

        while($row = mysqli_fetch_array($result))
        {
              
                    ?>

                    <tr>
                    <td><?php echo date('d/m/Y',strtotime($row['date']))?></td>
                    <td><?php echo $row['jobnumb']; ?></td>
                    <td><a href="../resources/images/bill_receipt/<?php echo $row['bill']?>"><?php echo $row['bill'];?></a></td>
                    <td><a href="../resources/images/bill_receipt/<?php echo $row['receipt']?>"><?php echo $row['receipt'];?></a></td>
                    <td><a href="./orders.php?source=update_trans&tid=<?php echo $row['transID'];?>">Update</a> | <a onClick="javascript: return confirm('Are you sure to REMOVE!'); " href="./orders.php?source=alltrans&tid=<?php echo $row['transID'];?>">Remove</a></td>
                  
                    </tr>
        <?php 
              }

       ?>

                </tr>
<!-- Javascript function for deleting data -->
  <!-- <script type="text/javascript">
 function deleteme(delid)
 {
 if(confirm("Are you sure to REMOVE!")){
 window.location.href='./orders.php?source=alltrans&tid=' +delid+'';
 return true;
 }
 } 
 </script> -->
                  </tbody>
                </table>
                <?php echo date('d-m-Y'); ?>
                
        </div>
</div>

                <hr>

                
                
                <?php 
                
                // for deleting a comment
                if (isset($_SESSION['role'])) {

                  if($_SESSION['role'] == 'Admin'){

                if(isset($_GET['tid'])) {
                  $ti = $_GET['tid'];
                  
        $query = mysqli_prepare($con,"SELECT * from tbl_transporter, tbl_customer_details WHERE transID = ?");
        mysqli_stmt_bind_param($query,"d", $_GET['tid']);
        mysqli_stmt_execute($query);

        confirmQuery($query);
        $result = mysqli_stmt_get_result($query);

        while($row = mysqli_fetch_array($result))
        {
          $bill = $row['bill'];
          $receipt = $row['receipt'];
          $jb = $row['jobnumb'];
          $cust = $row['custName'];

        }
                  $query = "DELETE FROM tbl_transporter where transID = '$ti'";

                  $delete_query = mysqli_query($con, $query);

                  confirmQuery($delete_query);
                  
                  @unlink("../resources/images/bill_receipt/".$bill);
                  @unlink("../resources/images/bill_receipt/".$receipt);
                  
                  logs($_SESSION['id'], $_SESSION['username'], "Deleted a receipt and bill $ti");
                  header("Location: ./orders.php?source=alltrans&jn=$jb&css=$cust");
                }
                  
              }
            }
            ?>
  

