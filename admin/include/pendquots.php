<center><h1 class="page-header" style="background-color: #00CED1; color: white;">
        Pending Orders</h1></center>
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <?php
  $page1;
  if(isset($_GET['page'])){ 

  $page = mysqli($_GET['page']);
    }
    else{
      $page = "";
    }

    if ($page == "" || $page == 1) {
      $page1 = 0;
    }
    else{
      $page1 = ($page * 5) - 5; 
    }

    $query_count = "SELECT * FROM tbl_agentOrders, tbl_agentOrders_railing, tbl_user_login where agentOrdCode = agentOrdCodeRail and agentID = user_id and ordStatus = 'Pending' group by agentOrdCodeRail";

    $find_count = mysqli_query($con,$query_count);
    $count = mysqli_num_rows($find_count);

    $count = ceil($count /5);


    ?>

<table class="table table-bordered table-hover" >
                    <thead style="background-color: gray">
                      <tr>
                        <th>Date</th>
                        <th>Client</th>
                        <th>Glass Detials</th>
                        <th>Product Details</th>
                        <th>ColorDetails</th>
                        <th>Railing Detials</th>
                        <th>Manage</th>
                      </tr>
                    </thead>     
                  <tbody id="myTable">
        <?php 
                    
                $query = "SELECT * FROM tbl_agentOrders, tbl_agentOrders_railing, tbl_user_login where agentOrdCode = agentOrdCodeRail and agentID = user_id and ordStatus = 'Pending' group by agentOrdCodeRail  order by agentOrdCode LIMIT $page1,5";
                $select_cust = mysqli_query($con, $query);
                
                logs($_SESSION['id'], $_SESSION['username'], "View pending order list");

                 while ($row = mysqli_fetch_assoc($select_cust)) {
                    
                    $code = $row['agentOrdCodeRail'];
                    $date = date('d/m/Y',strtotime($row['agentOrderDate']));
                    $fname = $row['first_name'];
                    $lname = $row['last_name'];
                    $glastype = $row['grlassType'];
                    $glassize = $row['glasSize1'];
                    $prodname = $row['productName'];
                    $handrail = $row['handrail'];
                    $prodcolor = $row['productColor'];
                    $color = $row['color'];
                    $rail = $row['sideCover'];
                    $hrail = $row['handRail'];
                    ?>
                  <tr>
                    <td><?php echo $date;?></td>
                    <td><?php echo $fname.' '.$lname;?></td>
                    <td><?php echo $glastype.' '.$glassize;?></td>                      
                    <td><?php echo $prodname.' '.$handrail;?></td>
                    <td><?php echo $prodcolor.' '.$color;?></td>
                    <td><?php echo $rail.' '.$hrail;?></td>
                    
                    <td><a href='quotationmenu.php?source=review&wqrt=<?php echo $code; ?>'>Review</a> | <a onClick="javascript: return confirm('Are you sure to REMOVE!'); " href='quotationmenu.php?source=pend&apr=<?php echo $code; ?>'>AddPrice</a></td>
                  </tr>
                    <?php
                }

       ?>

                  </tr>
                  </tbody>
                </table>

                <hr>
                <ul class="pager">
                  <?php 
                  for ($i=1; $i <= $count; $i++) {
                    if ($i == $page) {
                    echo "<li><a style='background: #000 !important;' class='active_link' href='quotationmenu?source=pend&page={$i}'>{$i}</a></li>";                      
                    }
                  else{
                    echo "<li><a href='quotationmenu?source=pend&page={$i}'>{$i}</a></li>";
                  }

                  }
                  

                  ?>
                </ul>


                <?php 
                
                // for deleting a comment
                if (isset($_SESSION['role'])) {

                  if($_SESSION['role'] == 'Admin'){

                if(isset($_GET['delete'])) {
                  
                  $the_cust_id = mysqli($_GET['delete']);

                  $query = "UPDATE tbl_customer_details SET custDel = 'Deleted' where customerID = '$the_cust_id'";

                  $delete_query = mysqli_query($con, $query);

                  confirmQuery($delete_query);
                  logs($_SESSION['id'], $_SESSION['username'], "Deleted a customer $the_cust_id");
                  echo "<script>alert('User deleted......'); window.location='./customers.php'</script>";


                }
                  // for unapprove
                //   if(isset($_GET['unblock'])) {
                //   $the_cust_id = mysqli($_GET['unblock']);

                //   $query = "UPDATE tbl_user_login SET status = 'Unblocked' where user_id = '$the_cust_id'";

                //   $blkquery = mysqli_query($con, $query);

                //   confirmQuery($blkquery);
                //   logs($_SESSION['id'], $_SESSION['username'], "Unblock a user $the_cust_id");

                //   echo "<script>alert('User Unblocked......'); window.location='./users.php'</script>";

                // }

                // for unapprove
                //   if(isset($_GET['block'])) {
                //   $the_cust_id = mysqli($_GET['block']);

                //   $query = "UPDATE tbl_user_login SET status = 'Blocked' where user_id = '$the_cust_id'";

                //   $blckquery = mysqli_query($con, $query);

                //   confirmQuery($blckquery);
                //   logs($_SESSION['id'], $_SESSION['username'], "Blocked a user $the_cust_id");
                //   echo "<script>alert('User blocked......'); window.location='./users.php'</script>";

                // }

              }
            }
                 ?>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
