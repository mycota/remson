    <center><h1 class="page-header" style="background-color: #00CED1; color: white;">
        Current system users</h1></center>
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
      $page1 = ($page * 500) - 500; 
    }

    $query_count = "SELECT * FROM tbl_user_login, tbl_logs where userID = user_id group by log_id";

    $find_count = mysqli_query($con,$query_count);
    $count = mysqli_num_rows($find_count);

    $count = ceil($count /500);


    ?>

<table class="table table-bordered table-hover">
                    <thead style="background-color: gray">
                      <tr>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Action Performed</th>
                        <th>IP Address</th>
                        <th>Date Time</th>
                      </tr>
                    </thead>     
                  <tbody id="myTable">
        <?php 
                    
                $query = "SELECT * FROM tbl_user_login, tbl_logs where userID = user_id group by log_id order by log_id DESC LIMIT $page1,500";
                $select_comment = mysqli_query($con, $query);
                
                logs($_SESSION['id'], $_SESSION['username'], "View users logs");

                 while ($row = mysqli_fetch_assoc($select_comment)) {
                    $user_id = $row['userID'];
                    $username = $row['user_name'];
                    $firstname = $row['first_name'];
                    $lastname = $row['last_name'];
                    $action = $row['log_action'];
                    $ip = $row['ipaddress'];
                    $date = date('d/m/Y h:m:s',strtotime($row['log_datetime']));
                    

                    echo "<tr>";
                    echo "<td>$username</td>";
                    echo "<td>$firstname $lastname</td>";
                    echo "<td>$action</td>";
                    echo "<td>$ip</td>";
                    echo "<td>$date</td>";
                    // echo "<td><a href='users.php?block=$user_id='>Block</a> |  <a href='users.php?unblock=$user_id'>Unblock</a>|<a href='users.php?source=resetpass&resetpass=$user_id'>ResetPassword</a>";
                    
                    echo "</tr>";
                                                                }

       ?>
 <!-- | <a href='users.php?delete=$user_id'>Delete</a></td>" -->
                                          </tr>
                  </tbody>
                </table>

                <hr>
                <ul class="pager">
                  <?php 
                  for ($i=1; $i <= $count; $i++) {
                    if ($i == $page) {
                    echo "<li><a style='background: #000 !important;' class='active_link' href='users.php?source=lg&page={$i}'>{$i}</a></li>";                      
                    }
                  else{
                    echo "<li><a href='users.php?source=lg&page={$i}'>{$i}</a></li>";
                  }

                  }
                  

                  ?>
                </ul>


                <?php 
                
                // for deleting a comment
                if (isset($_SESSION['role'])) {

                  if($_SESSION['role'] == 'Admin'){

                if(isset($_GET['delete'])) {
                  
                  $the_user_id = mysqli($_GET['delete']);

                  $query = "UPDATE tbl_user_login SET userDel = 'Deleted' where user_id = '$the_user_id'";

                  $delete_query = mysqli_query($con, $query);

                  confirmQuery($delete_query);
                  logs($_SESSION['id'], $_SESSION['username'], "Deleted a user $the_user_id");
                  echo "<script>alert('User deleted......'); window.location='./users.php'</script>";


                }
                  // for unapprove
                  if(isset($_GET['unblock'])) {
                  $the_user_id = mysqli($_GET['unblock']);

                  $query = "UPDATE tbl_user_login SET status = 'Unblocked' where user_id = '$the_user_id'";

                  $blkquery = mysqli_query($con, $query);

                  confirmQuery($blkquery);
                  logs($_SESSION['id'], $_SESSION['username'], "Unblock a user $the_user_id");

                  echo "<script>alert('User Unblocked......'); window.location='./users.php'</script>";

                }

                // for unapprove
                  if(isset($_GET['block'])) {
                  $the_user_id = mysqli($_GET['block']);

                  $query = "UPDATE tbl_user_login SET status = 'Blocked' where user_id = '$the_user_id'";

                  $blckquery = mysqli_query($con, $query);

                  confirmQuery($blckquery);
                  logs($_SESSION['id'], $_SESSION['username'], "Blocked a user $the_user_id");
                  echo "<script>alert('User blocked......'); window.location='./users.php'</script>";

                }

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
