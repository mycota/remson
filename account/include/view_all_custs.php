<center><h1 class="page-header" style="background-color: #00CED1; color: white;">
        Current Customers</h1></center>
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

    $query_count = "SELECT * FROM tbl_customer_details where custDel != 'Deleted'";

    $find_count = mysqli_query($con,$query_count);
    $count = mysqli_num_rows($find_count);

    $count = ceil($count /5);


    ?>

<table class="table table-bordered table-hover" >
                    <thead style="background-color: gray">
                      <tr>
                        <th>Customer ID</th>
                        <th>Customer</th>
                        <th>Site</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Rep</th>
                        <th>Date Created</th>
                        <th>Manage</th>
                      </tr>
                    </thead>     
                  <tbody id="myTable">
        <?php 
                    
                $query = "SELECT * from tbl_customer_details where custDel != 'Deleted' order by custID LIMIT $page1,5";
                $select_cust = mysqli_query($con, $query);
                
                logs($_SESSION['id'], $_SESSION['username'], "View customer");

                 while ($row = mysqli_fetch_assoc($select_cust)) {
                    $cust_id = $row['customerID'];
                    $customer = $row['custName'];
                    $site = $row['siteName'];
                    $custadre = $row['custAddress'];
                    $phone = $row['custPhone'];
                    $email = $row['custEmail'];
                    $custrep = $row['custRep'];
                    $dateadd = $row['dateCreated'];                    
                    ?>
                    <tr>
                    <td><?php echo $cust_id; ?></td>
                    <td><?php echo $customer?></td>
                    <td><?php echo $site; ?></td>                      
                    <td><?php echo $custadre; ?></td>
                    <td><?php echo $phone; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $custrep; ?></td>
                    <td><?php echo $dateadd; ?></td>
                    <td><a href='customers.php?source=edit&edit=<?php echo $cust_id; ?>'>Update</a> | <a onClick="javascript: return confirm('Are you sure to REMOVE!'); " href='customers.php?delete=<?php echo $cust_id; ?>'>Delete</a></td>
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
                    echo "<li><a style='background: #000 !important;' class='active_link' href='customers.php?source=none&page={$i}'>{$i}</a></li>";                      
                    }
                  else{
                    echo "<li><a href='customers.php?source=none&page={$i}'>{$i}</a></li>";
                  }

                  }
                  

                  ?>
                </ul>


                <?php 
                
                // for deleting a comment
                if (isset($_SESSION['role'])) {

                  if($_SESSION['role'] == 'Accounts'){

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
