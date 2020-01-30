<?php
include "include/admin_header.php";
if (!isset($_SESSION['username'])) {
        if(!isset($_SESSION['role'])){
          if ($_SESSION['role'] != 'Admin') {

         header("Location: ../logout.php");         
              
        }
     }
   }
?>

<script language="javascript">
var showMode = 'table-cell';
if (document.all) showMode='block';

function toggleVis(btn){

  btn   = document.forms['tcol'].elements[btn];

  cells = document.getElementsByName('t'+btn.name);

  mode = btn.checked ? showMode : 'none';

  for(j = 0; j < cells.length; j++) cells[j].style.display = mode;
}

</script>
<body>

  <div id="wrapper">




        <?php if ($con) {
            # code...
        } ?>

        <!-- Navigation -->

<?php include "include/admin_navigation.php" ?>



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">
                            Welcome:  
                            <small><?php echo $_SESSION['fname']?></small>
                        </h2>
                        
                        </div>
                </div>

  <style type="text/css">
    *{
      ont-size: 1.2em;
    }
  </style>

<form name="tcol" onsubmit="return false">

<center><h1 class="page-header" style="background-color: #00CED1; color: white;">Production Details
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

    $query_count = "SELECT * from tbl_production WHERE deleted != 'Deleted'";

    $find_count = mysqli_query($con,$query_count);
    $count = mysqli_num_rows($find_count);

    $count = ceil($count /15);
    ?>

<button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button>
<input type=checkbox name="col0" onclick="toggleVis(this.name)" checked> Date
<input type=checkbox name="col1" onclick="toggleVis(this.name)" checked> Name
<input type=checkbox name="col2" onclick="toggleVis(this.name)" checked> Job
<input type=checkbox name="col3" onclick="toggleVis(this.name)" checked> Syst
<input type=checkbox name="col4" onclick="toggleVis(this.name)" checked> Type
<input type=checkbox name="col5" onclick="toggleVis(this.name)" checked> H/R
<input type=checkbox name="col6" onclick="toggleVis(this.name)" checked> Cutt
<input type=checkbox name="col7" onclick="toggleVis(this.name)" checked> Coat
<input type=checkbox name="col8" onclick="toggleVis(this.name)" checked> Ass
<input type=checkbox name="col9" onclick="toggleVis(this.name)" checked> Pack
<input type=checkbox name="col10" onclick="toggleVis(this.name)" checked> Disp
<input type=checkbox name="col11" onclick="toggleVis(this.name)" checked> GlOrd
<input type=checkbox name="col12" onclick="toggleVis(this.name)" checked> GlsDte
<input type=checkbox name="col13" onclick="toggleVis(this.name)" checked> DeliDt
<input type=checkbox name="col14" onclick="toggleVis(this.name)" checked> Tem
<input type=checkbox name="col15" onclick="toggleVis(this.name)" checked> FDelDt
<input type=checkbox name="col16" onclick="toggleVis(this.name)" checked> FLRFT
<input type=checkbox name="col17" onclick="toggleVis(this.name)" checked> Sent
<input type=checkbox name="col18" onclick="toggleVis(this.name)" checked> Pend
<input type=checkbox name="col19" onclick="toggleVis(this.name)" checked> Remarks
<input type=checkbox name="col20" onclick="toggleVis(this.name)" checked> Action

<br>
<br>
<table class="table table-bordered table-hover">
                    <thead>
                      <tr style="background-color: gray;">
                         <th name="tcol0" id="tcol0">DAT</th>
                         <th name="tcol1" id="tcol1">CUST_NAME</th>
                         <th name="tcol2" id="tcol2">Job_No</th>
                         <th name="tcol3" id="tcol3">SYSTEM</th>
                         <th name="tcol4" id="tcol4">TYPE</th>
                         <th name="tcol5" id="tcol5">H/R</th>
                         <th name="tcol6" id="tcol6">CUTTING</th>
                         <th name="tcol7" id="tcol7">COATING</th>
                         <th name="tcol8" id="tcol8">ASSEMBLY</th>
                         <th name="tcol9" id="tcol9">PACKING</th>
                         <th name="tcol10" id="tcol10">DISPATCH</th>
                         <th name="tcol11" id="tcol11">GLASS_OD</th>
                         <th name="tcol12" id="tcol12">GLASS_DATE</th>
                         <th name="tcol13" id="tcol13">DELI_DATE</th>
                         <th name="tcol14" id="tcol14">TEAM</th>
                         <th name="tcol15" id="tcol15">FL_DEL_DATE</th>
                         <th name="tcol16" id="tcol16">TL_RFT</th>
                         <th name="tcol17" id="tcol17">SENT</th>
                         <th name="tcol18" id="tcol18">PENDING</th>
                         <th name="tcol19" id="tcol19">RMARKS</th>
                         <th name="tcol20" id="tcol20">ACTION</th>
                      </tr>
                    </thead>
                                         
                  <tbody id="myTable">
        <?php
        # Row colour change function

         function colour($findate_cleans){
          $colour = 'red';

        $current_date = date('Y-m-d');
        $date1 = $current_date;
        $date2 = $findate_cleans;

        $diff = abs(strtotime($date2) - strtotime($date1));

        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $date_diff = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

        if ($date_diff <= 3 && $date1 < $date2) {
          return 'yellow';
        }
       elseif ($date_diff <= 7 && $date1 < $date2) {
          return 'red';
        }
      else{return 'white';}

        }
    
  $query = "SELECT * from tbl_production WHERE deleted != 'Deleted' order by final_date_deli LIMIT $page1,15";
  
  $select_query = mysqli_query($con,$query);
  //confirmQuery($select_query);
  logs($_SESSION['id'], $_SESSION['username'], 'View entries');

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
        $findate_cleans = $row['final_date_deli'];
        $fab_clean = $row['fabricate'];
        $findate_clean = date('d/m/Y',strtotime($row['final_date_deli']));
        $totalTower_clean = $row['total_tower'];
        $totalTowerOrd_clean = $row['total_tower_ordered'];
        $pendingRFT= $totalTower_clean-$totalTowerOrd_clean;
        $remarks_clean= $row['remarks'];
    
    echo '<tr style="background-color:'.colour($findate_cleans) .'">';
    ?>
    <td name="tcol0" id="tcol0"><?php echo $date_clean?></td>
    <td name="tcol1" id="tcol1"><?php echo $custName_clean?></td>
    <td name="tcol2" id="tcol2"><?php echo $jobNumber_clean?></td>
    <td name="tcol3" id="tcol3"><?php echo $line_clean?></td>
    <td name="tcol4" id="tcol4"><?php echo $type_clean?></td>
    <td name="tcol5" id="tcol5"><?php echo $hr_clean?></td>
    <td name="tcol6" id="tcol6"><?php echo $cut_clean?></td>
    <td name="tcol7" id="tcol7"><?php echo $coat_clean?></td>
    <td name="tcol8" id="tcol8"><?php echo $assem_clean?></td>
    <td name="tcol9" id="tcol9"><?php echo $packing_clean?></td>
    <td name="tcol10" id="tcol10"><?php echo $disp_clean?></td>
    <td name="tcol11" id="tcol11"><?php echo $glasOrder_clean?></td>
    <td name="tcol12" id="tcol12"><?php echo $orddate_claen?></td>
    <td name="tcol13" id="tcol13"><?php echo $ddate_clean?></td>
    <td name="tcol14" id="tcol14"><?php echo $fab_clean?></td>
    <td name="tcol15" id="tcol15"><?php echo $findate_clean?></td>
    <td name="tcol16" id="tcol16"><?php echo $totalTower_clean?></td>
    <td name="tcol17" id="tcol17"><?php echo $totalTowerOrd_clean?></td>
    <td name="tcol18" id="tcol18"><?php echo $pendingRFT?></td>
    <td name="tcol19" id="tcol19"><?php echo $remarks_clean?></td>
    <td name="tcol20" id="tcol20"><a href='editEntry.php?id=<?php echo $proID_clean?>'>Edit</a> | <a href='display.php?id=<?php echo $proID_clean?>'>Delete</a></td>
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
                  
                  $pro_id = mysqli_real_escape_string($con,$_GET['id']);

                  $query = "UPDATE tbl_production SET deleted = 'Deleted' where proID = '$pro_id'";

                  $delete_query = mysqli_query($con, $query);

                  confirmQuery($delete_query);
                logs($_SESSION['id'], $_SESSION['username'], "Deleted entry $pro_id");

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