<?php 
  
  // $con = mysqli_connect("localhost", "root", "", "plane_crash_1908");

  // $query = "SELECT * FROM crashes";

  // $get = mysqli_query($con,$query);

  // while($row=mysqli_fetch_assoc($get)) { 

  //   $date = date('Y',strtotime($row['Date']));
  // }
  ?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">

  /*#fset0{padding-left: 40px; width: 100%; border-color: green; box-shadow: 30px 30px 30px 30px grey;}*/
  .td1{width: 500px;}
</style>
</head>
<body>
<table border="1">
      <tr>
      <th width="1500"><center>Site Measurement Sheet</center></th>
      </tr>
    </table>
    <table border="1">
      <tr>
        <td>Party Name</td> <td><input class="td1" type="" name="" placeholder="Party name"></td>
        <td>Date</td> <td><input style="width: 400px;" type="" name="" placeholder="Party name"></td>

      </tr>
      <tr><td>Billing Name</td> <td><input class="td1" type="" name="" placeholder="Party name"></td>
      <td>Place</td> <td><input type="" name="" placeholder="Party name"></td>
      </tr>
      <tr><td>Billing Address</td><td><input class="td1" type="" name="" placeholder=""></td>
      <td>Glass</td><td>Toughened</td><td>Laminated</td>
      </tr>
      </tr>
        <tr><td></td><td><input class="td1" type="" name="" placeholder=""></td>
        <td>Size</td> <td><input type="" name="" placeholder=""></td><td><input type="" name=""></td>
      </tr>
    </table>
</body>
</html>
