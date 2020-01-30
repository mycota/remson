<?php
// Connection to DB

  // Connection to DB
  $con = mysqli_connect("localhost","root","","goods");
  if (!$con) {
    echo "Not Connected";
  }
  // Error function
  function checkErrors($query){
    global $con;
    if (!$query) {
      die("Query Failed !!" .mysqli_error($con));
    }
  }


// Don't delete this comment
  //usr: remson_wrdb
  //code: wrpass123
?>
<!DOCTYPE html>
<html>
<head>
  <title>Display Entries</title>
 
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="icon" type="image/jpeg" href="images/alumi.jpeg"/>
  <style type="text/css">
    *{
      font-size: 1.2em;
    }
  </style>



 </head>

<body>



<center><h1 class="page-header" style="background-color: #4B0082; color: white;">Production Details
</h1></center>


<input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <?php
  $page1;
  if(isset($_GET['page'])){ 

  $page = mysqli_real_escape_string($con,$_GET['page']);
    }
    else{
      $page = "";
    }

    if ($page == "" || $page == 1) {
      $page1 = 0;
    }
    else{
      //global $page1;
      $page1 = ($page * 10) - 10; 
    }

    $query_count = "SELECT * from tbl_productions ";

    $find_count = mysqli_query($con,$query_count);
    $count = mysqli_num_rows($find_count);

    $count = ceil($count /10);


    ?>
<a href="display1.php">(Hide)</a>
<table class="table table-bordered table-hover">
                    <thead>
                      <tr style="background-color: gray;">
                        <th>DATE</th>
                         <th>CUST_NAME</th>
                         <th>Job_No</th>
                         <th>SYSTEM</th>
                         <th>TYPE</th>
                         <th>H/R</th>
                         <th>CUTTING</th>
                         <th>COATING</th>
                         <!-- <th>COUNTING&emsp;&emsp;&emsp;&emsp;</th> -->
                         <th>ASSEMBLY</th>
                         <th>PACKING</th>
                         <th>DISPATCH</th>
                         <th>GL_ORDER</th>
                         <th>ORDER_DATE</th>
                         <th>DELI_DATE</th>
                         <th>TEAM</th>
                         <th>FL_DEL_DATE</th>
                         <th>TL_RFT</th>
                         <th>SENT</th>
						 <th>PENDING</th>
                         <th>ACTION</th>
                      </tr>
                    </thead>     
                  <tbody id="myTable">
        <?php
        # working on
        function colour($findate_cleans){
          $colour = 'red';

        $current_date = date('Y-m-d');
        $date1 = $current_date;
        $date2 = $findate_cleans;

        $diff = abs(strtotime($date2) - strtotime($date1));

        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $date_diff = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

        //printf("%d years, %d months, %d days\n", $years, $months, $days);
        //echo $date_diff.', ';

        if ($date_diff <= 3 && $date1 < $date2) {
          return 'yellow';
        }
      elseif ($date_diff <= 7 && $date1 < $date2) {
          return 'red';
        }
      else{return 'white';}

        }
    
  $query = "SELECT * from tbl_productions order by final_date_deli LIMIT $page1,15";
  
  $select_query = mysqli_query($con,$query);
  checkErrors($select_query);

  while ($row = mysqli_fetch_assoc($select_query)) {

        $proID_clean = $row['proID'];
        $date_clean = date('d/m/Y',strtotime($row['proDate'])); 
        $custName_clean = $row['custName'];
        $jobNumber_clean = $row['jobNumber'];
        $line_clean = $row['line'];
        $type_clean = $row['type'];
        $hr_clean = $row['hr'];
        $cut_clean = $row['cutting'];
        $coat_clean = $row['coating'];
        $assem_clean = $row['assemb'];
        $packing_clean = $row['pack'];
        $disp_clean = $row['disp'];
        $glasOrder_clean = $row['glassOrdered'];
        $orddate_claen = date('d/m/Y',strtotime($row['orderDate']));
        $ddate_clean = date('d/m/Y',strtotime($row['deliDate']));
        $fab_clean = $row['fabricate'];
        $findate_clean = date('d/m/Y',strtotime($row['final_date_deli']));
        $findate_cleans = $row['final_date_deli'];
        $totalTower_clean = $row['total_tower'];
        $totalTowerOrd_clean = $row['total_tower_ordered'];
	$pendingRFT= $totalTower_clean-$totalTowerOrd_clean;
        
        
        
    
    echo '<tr style="background-color:'.colour($findate_cleans) .'">';
    ?>
    <td><?php echo $date_clean?></td>
    <td><?php echo $custName_clean?></td>
    <td><?php echo $jobNumber_clean?></td>
    <td><?php echo $line_clean?></td>
    <td><?php echo $type_clean?></td>
    <td><?php echo $hr_clean?></td>
    <td><?php echo $cut_clean?></td>
    <td><?php echo $coat_clean?></td>
    <td><?php echo $assem_clean?></td>
    <td><?php echo $packing_clean?></td>
    <td><?php echo $disp_clean?></td>
    <td><?php echo $glasOrder_clean?></td>
    <td><?php echo $orddate_claen?></td>
    <td><?php echo $ddate_clean?></td>
    <td><?php echo $fab_clean?></td>
    <td><?php echo $findate_clean?></td>
    <td><?php echo $totalTower_clean?></td>
    <td><?php echo $totalTowerOrd_clean?></td>
    <td><?php echo $pendingRFT?></td>
    <td><a href='display.php?id=<?php echo $proID_clean?>'>Delete</a>
    </tr>

   <?php
    }
       ?>

                                
                  </tbody>
                </table>

                <hr>
                <ul class="pager">
                  <?php 
                  for ($i=1; $i <= $count; $i++) {
                    if ($i == $page) {
                    echo "<li><a style='background: #000 !important;' class='active_link' href='display.php?page={$i}'>{$i}</a></li>";                      
                    }
                  else{
                    echo "<li><a href='display.php?page={$i}'>{$i}</a></li>";
                  }

                  }
                  

                  ?>
                </ul>

      <?php
        // for deleting a enties
                if (isset($_GET['id'])) {
                  
                  if(!isset($_SESSION['userid'])){
                  ?><script>window.location='login.php';</script><?php 
                }
                  
                  $pro_id = mysqli_real_escape_string($con,$_GET['id']);

                  $query = "DELETE from tbl_production where proID = '$pro_id'";

                  $delete_query = mysqli_query($con, $query);

                  checkErrors($delete_query);

                  echo "<script>alert('Entery is Delete.....'); window.location='display.php'</script>";
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