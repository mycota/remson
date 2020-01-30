<?php
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
  //usr: remson
  //code: GoxFg2Cw
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
      /*font-size: 1.5em;*/
    }
  </style>

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
 </head>

<body>
<form name="tcol" onsubmit="return false">
<center><h1 class="page-header" style="background-color: #4B0082; color: white; font-size: ">Production Details
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

    $query_count = "SELECT * from tbl_production ";

    $find_count = mysqli_query($con,$query_count);
    $count = mysqli_num_rows($find_count);

    $count = ceil($count /10);


    ?>
<button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button>
<input type=checkbox name="col0" onclick="toggleVis(this.name)" checked> Date
<input type=checkbox name="col1" onclick="toggleVis(this.name)" checked> Name
<input type=checkbox name="col2" onclick="toggleVis(this.name)" checked> Job
<input type=checkbox name="col3" onclick="toggleVis(this.name)" checked> Syt
<input type=checkbox name="col4" onclick="toggleVis(this.name)" checked> Type
<input type=checkbox name="col5" onclick="toggleVis(this.name)" checked> H/R
<input type=checkbox name="col6" onclick="toggleVis(this.name)" checked> Cutt
<input type=checkbox name="col7" onclick="toggleVis(this.name)" checked> Coat
<input type=checkbox name="col8" onclick="toggleVis(this.name)" checked> Ass
<input type=checkbox name="col9" onclick="toggleVis(this.name)" checked> Pack
<input type=checkbox name="col10" onclick="toggleVis(this.name)" checked> Disp
<input type=checkbox name="col11" onclick="toggleVis(this.name)" checked> GlOrd
<input type=checkbox name="col12" onclick="toggleVis(this.name)" checked> GlsDte
<input type=checkbox name="col13" onclick="toggleVis(this.name)" checked> Tem
<input type=checkbox name="col14" onclick="toggleVis(this.name)" checked> Site
<input type=checkbox name="col15" onclick="toggleVis(this.name)" checked> TLRFT
<input type=checkbox name="col16" onclick="toggleVis(this.name)" checked> Sent
<input type=checkbox name="col17" onclick="toggleVis(this.name)" checked> Pend
<input type=checkbox name="col18" onclick="toggleVis(this.name)" checked> Act
<br>
<br>
<table class="table table-bordered table-hover" id="my_table">
                    <thead>
                      <tr style="background-color: gray;" class="tableizer-firstrow">

                        <th name="tcol0" id="tcol0">DATE</th>
                         <th name="tcol1" id="tcol1">CUSTOMER_NAME</th>
                         <th name="tcol2" id="tcol2">Job_Number</th>
                         <th name="tcol3" id="tcol3">SYSTEM</th>
                         <th name="tcol4" id="tcol4">TYPE</th>
                         <th name="tcol5" id="tcol5">H/R</th>
                         <th name="tcol6" id="tcol6">CUTTING</th>
                         <th name="tcol7" id="tcol7">COATING</th>
                         <th name="tcol8" id="tcol8">ASSEMBLY</th>
                         <th name="tcol9" id="tcol9">PACKING</th>
                         <th name="tcol10" id="tcol01">DISPATCH</th>
                         <th name="tcol11" id="tcol11">GLASS_ORDERED</th>
                         <th name="tcol12" id="tcol12">ORDERED_DATE</th>
                         <th name="tcol13" id="tcol13">DELIVERY_DATE</th>
                         <th name="tcol14" id="tcol14">FABIRICATOR</th>
                         <th name="tcol15" id="tcol15">FINAL_DELIVERY_DATE</th>
                         <th name="tcol16" id="tcol16">TOTAL_TOWER</th>
                         <th name="tcol17" id="tcol17">TOTAL_TOWER_ORDERED</th>
                         <th name="tcol18" id="tcol18">ACTION</th>
                      </tr>
                    </thead>     
                  <tbody id="myTable">
        <?php
        # working on
        //$findate_clean = '';

      //   $c = "2019-02-03";
        
      //   $date1 = new DateTime("2007-03-24");
      //   $date2 = new DateTime($c);
      //   $interval = $date2->diff($date1);

      //   if ($date1 > $date2) {
      //     echo "1 is big";

      //   }
      // else{ echo "2 is big";}
        //echo "difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days "; 

        // shows the total amount of days (not divided into years, months and days like above)
        //echo "difference " . $interval->days . " days ";


    
  $query = "SELECT * from tbl_production order by final_date_deli LIMIT $page1,10";
  
  $select_query = mysqli_query($con,$query);
  checkErrors($select_query);

  while ($row = mysqli_fetch_assoc($select_query)) {

        $proID_clean = $row['proID'];
        $date_clean = $row['proDate'];
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
        $orddate_claen = $row['orderDate'];
        $ddate_clean = $row['deliDate'];
        $fab_clean = $row['fabricate'];
        $findate_clean = $row['final_date_deli'];
        $totalTower_clean = $row['total_tower'];
        $totalTowerOrd_clean = $row['total_tower_ordered'];

        //$findate_clean = date('d/m/Y',strtotime($row['final_date_deli']));

        $colour = 'red';

        $current_date = date('d-m-Y');

        $date1 = new DateTime($current_date);
        $date2 = new DateTime($findate_clean);
        $interval = $date1->diff($date2);

        $date_diff = $interval->days;
        //echo $date_diff;

        if ($date_diff <= 3 && $date1 < $date2) {
          $colour = 'yellow';
        }
      elseif ($date_diff <= 7 && $date1 < $date2) {
          $colour = 'red';
        }
      else{$colour = 'white';}

    
    echo '<tr style="background-color:'.$colour .'">';
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
    <td name="tcol18" id="tcol18"><a href='display.php?id=<?php echo $proID_clean?>'>Delete</a>
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

                  $query = "DELETE from tbl_production where proID = '$pro_id'";

                  $delete_query = mysqli_query($con, $query);

                  checkErrors($delete_query);

                  echo "<script>alert('Entery is Delete.....'); window.location='display.php'</script>";
                }
      ?>
</form>
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