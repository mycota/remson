    <!-- <center><h1 class="page-header" style="background-color: #00CED1; color: white;">
        Packing List</h1></center>
        <input class="form-control" id="myInput" type="text" placeholder="Search.."> -->

<div class="pull-right" style="margin-right:100px;">
    <a href="javascript:Clickheretoprint()" style="font-size:20px; position:absolute; margin-top: 20px; left: 800px"><button class="btn btn-success btn-large"><i class="icon-print"></i> Print</button></a>
    </div>
  
<div class="content" id="content">
  <div class="clearfix"></div>        
          <fieldset class="page-header">
            <!-- <legend>Invoice:</legend> -->
            <img style="width: 100%;" src="../resources/images/head.jpg">
          </fieldset>
<center><span>.....................................................................................................PACKING LIST.................................................................................................</span></center><br>

  <table class="table table-bordered table-hover">
                    <thead style="background-color: gray">
                      <tr>
                        <th>Job Number</th>
                        <th>Customer</th>
                        <th>Site Name</th>
                        <th>Phone</th>
                        <th>Date</th>
                        <th>Manage</th>
                      </tr>
                    </thead>     
                  <tbody id="myTable">
        <?php
        
         $query = "SELECT * from tbl_packing_list, tbl_customer_details WHERE customerID = customerNo group by jobNum order by orderID desc";
         $select_query = mysqli_query($con, $query);
         
         confirmQuery($select_query);

         logs($_SESSION['id'], $_SESSION['username'], "View packing list");
         while($row = mysqli_fetch_assoc($select_query))
          {
                    $_SESSION["jobnumber"] = $row['jobNum'];
                    $job = $row['jobNum'];

                    $_SESSION["custid"] = $row['customerNo'];
                    ?>

                    <tr>
                    <td hidden><?php echo $_SESSION['custid']?></td>
                    <td><?php echo $_SESSION['jobnumber']; ?></td>
                    <td><?php echo $row['custName'];?></td>
                    <td><?php echo $row['siteName'];?></td>
                    <td><?php echo $row['custPhone'];?></td>
                    <td><?php echo date('d/m/Y',strtotime($row['orderSystemdate']));?></td>
                    <th><a href="./orders.php?source=invoice&jn=<?php echo $row['jobNum'];?>">Details</a> | <a href="./orders.php?source=trans&job=<?php echo $job?>">Add Trans/Update | <a href="./orders.php?source=alltrans&jn=<?php echo $row['jobNum'];?>&css=<?php echo $row['customerNo'];?>">View Trans</a></a></th>
                    </tr>
        <?php 
              }

       ?>

                                          </tr>
                  </tbody>
                </table>
                <?php echo date('d-m-Y'); ?>
                <!-- <fieldset class="page-header">
            <legend></legend>
            <img style="width: 100%;" src="../resources/images/footer.jpg">
          </fieldset> -->
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