<?php 
// include "include/admin_header.php";
?>
  <style type="text/css">

  /*#fset0{padding-left: 40px; width: 100%; border-color: green; box-shadow: 30px 30px 30px 30px grey;}*/
  .td1{width: 100%;}
</style>

<script>
function selectoption(){
  var opt1 = document.getElementById("glasstype");
  var opt2 = document.getElementById("glassize1");
  var opt3 = document.getElementById("glassize2");
  var opt4 = document.getElementById("coattype");
  var opt5 = document.getElementById("product_name");
  var opt6 = document.getElementById("prtype");
  // var opt7 = document.getElementById("product_cover");

  if(opt1.value == "") {
    alert("Please select glass type");
    opt1.focus();
    return false;
  }
  if(opt2.value == "") {
    alert("Please select glass size");
    opt2.focus();
    return false;
  }
  if(opt4.value == "") {
    alert("Please select coating type");
    opt4.focus();
    return false;
  }

  if(opt5.value == "") {
    alert("Please select product name");
    opt5.focus();
    return false;
  }

  if(opt6.value == "") {
    alert("Please select product name");
    opt6.focus();
    return false;
  }

  // if(opt7.value == "") {
  //   alert("Please select product cover");
  //   opt7.focus();
  //   return false;
  // }

  return true;
  
}

</script>

  <div id="wrapper">

<?php include "include/admin_navigation.php" ?>
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- <h2 class="page-header">
                            Welcome:  
                            <small><?php echo $_SESSION['fname']?></small>
                        </h2> -->
                        <fieldset class="page-header">
            <!-- <legend>Invoice:</legend> -->
            <div class="pull-right" style="margin-right:100px;">
    <a href="javascript:Clickheretoprint()" style="font-size:20px; position:absolute; margin-top: 20px; left: 800px"><button class="btn btn-success btn-large"><i class="icon-print"></i> Print</button></a>
    </div>
  
  <div class="clearfix"></div> 
            
                        </div>
                <!-- </div> -->
<form action="inserquotation.php" method="POST" enctype="multipart/form-data" id="fset0">
  
  <div id="page-wrapper">

    <div class="container-fluid">
    <!-- <center><h2 class="page-header" style="background-color: #6A5ACD; color: white;">
       Edit Entry
    </h2></center> -->
    <div class="content" id="content">

    <img style="width: 100%; height: 15%;" src="../resources/images/head.jpg">
    <table border="1">

      <tr>
        <th colspan="5" width="1500"><center>Site Measurement Sheet</center></th>
      </tr>

      <tr>
        <td>Party Name</td> 
        <td><input class="td1" type="text" name="party_name" required="" placeholder="Enter party name"></td>
        <td>Date</td> 
        <td colspan="2"><input style="width: 100%;" value="<?php echo date('d-m-Y');?>" type="text" name="date" readonly></td>
      </tr>

      <tr>
        <td>Billing Name</td>
        <td><input class="td1" type="text" required name="billing_name" placeholder="Enter billing name"></td>
        <td>Place</td>
        <td colspan="2"><input style="width: 100%;" type="text" required="" name="place" placeholder="Enter place"></td>
      </tr>

      <tr>
        <td>Billing Address</td>
          <!-- <td><input class="td1" type="text" required name="billing_address" placeholder="Enter billing address"> -->
        <td rowspan="2">
          <textarea type="text" required name="billing_address" class="td1" rows="3" cols="20" placeholder="Billing address"></textarea>
        </td>
        <td>Glass</td>
        <td colspan="2">
        <select type="text" class="form-control" required id="glasstype" name="glasstype" onchange="populate(this.id,'glassize1'); populate2('glassize1', 'glassize2')">
          <option value="">Select glass type</option>
          <option value='TOUGHENED'>TOUGHENED</option>
          <option value="LAMINATED">LAMINATED</option>
        </select></td>
      </tr>
        <tr><td></td>
        <td>Size</td><td colspan="2">
        <select type="text" class="form-control" required name="glassize1" id="glassize1" onchange="populate2(this.id,'glassize2')">  
        </select></td>
      </tr>
      <tr>
        <td>Approx. RFT </td>
        <td><input class="td1" type="number" name="apoxrft"></td>
        <td>Size</td><td colspan="2">
        <select type="text" class="form-control"  name="glassize2" id="glassize2">
        </select>
        </td>
        </tr>
      </table>

      <table border="1">
        <tr>
          <th colspan="6" width="1500"><center>Final Product Details</center></th>
        </tr>
        <tr>
          <td>ProductName</td>
          <td>
            <select required name="product_name" type="text" class="form-control" id="product_name" onchange="products(this.id,'prtype'); productscover('prtype','product_cover')">
              <option value="">Select product name</option>
              <option value="SMART LINE CONTINUE PROFILE">SMART LINE</option>
              <option value="SEA LINE BRACKET PROFILE">SEA LINE</option>
              <option value="SQUARE LINE BRACKET PROFILE">SQUARE LINE</option>
              <option value="SLIM LINE CONTINUE PROFILE">SLIM LINE</option>
              <option value="SMALL LINE CONTINUE PROFILE">SMALL LINE</option>
              <option value="STAR LINE BRACKET PROFILE">STAR LINE</option>
              <option value="SKY LINE BRACKET PROFILE">SKY LINE</option>
              <option value="SPARK LINE BRACKET PROFILE">SPARK LINE</option>
              <option value="SLEEK LINE CONTINUE PROFILE">SLEEK LINE</option>
              <option value="SUPER LINE CONTINUE PROFILE">SUPER LINE</option>
              <option value="SIGNATURE LINE CONTINUE PROFILE">SIGNATURE LINE</option>
            </select>
          </td>
          <td>
            <select required type="text" class="form-control" name="prtype" id="prtype" onchange="productscover(this.id,'product_cover')">
              
            </select>
          </td>
          <td>
            <select name="product_cover" id="product_cover" type="text" class="form-control" >
              
            </select>
            <!-- <option value="0">Select product cover</option>
              <option value="SIDE COVER">SIDE COVER</option>
              <option value="FULL/BRACKET WISE">FULL/BRACKET WISE</option> -->
          </td>
          <td>
            <select required name="hand_rail" type="text" class="form-control">
              <option value="0">Select hand rail</option>
              <option value="ROUND HAND RAIL">ROUND</option>
              <option value="SQUARE HAND RAIL">SQUARE</option>
              <option value="SMALL HAND RAIL">SMALL</option>
              <option value="SLIM HAND RAIL">SLIM</option>
              <option value="EDGE GUARD HAND RAIL">EDGE GUARD</option>
              <option value="HALF ROUND HAND RAIL">HALF ROUND</option>
              <option value="RECTANGLE HAND RAIL">RECTANGLE</option>
              <option value="INCLINE HAND RAIL">INCLINE</option>
            </select>
          </td>
        </tr>
        <!-- for space -->
        <tr>
          <th colspan="6" width="1500"><center>&emsp;</center></th>
        </tr>

        <tr>
          <td colspan="2">
            <select type="text" class="form-control" required name="color_type" id="color_type" onchange="colorType(this.id,'colors')">
              <option value="">Select colour</option>
              <option value="ANODISED">ANODISED</option>
              <option value="PVDF">PVDF</option>
              <option value="WOODEN">WOODEN</option>
              <option value="MILL FINISH">MILL FINISH</option>
              <option value="POWDER COATING">POWDER COATING</option>
            </select></td>

          <td colspan="4">
            <select type="text" class="form-control" name="colors" id="colors">
              
            </select>
          </td>
        </tr>

      </table>
<!-- for space -->
        <tr>
          <th colspan="6" width="1500"><center>&emsp;</center></th>
        </tr>

      <table border="1" >
        <tr>

          <th colspan="6" width="1500"><center>Railing - 1</center></th>
        </tr>

        <tr>
          <td width="100%" rowspan="11">
            <select name="imgrail1" class="form-control" style="color: blue;" onchange="changeimg('imgids','images',this.value)">
              <option value="sline2.png">Straight</option>
              <option value="ctype2.png">C - Type</option>
              <option value="lshape.png">L Shape</option>
            </select><br><br><br>
            <img style="width: 70%; height: 65%;" src="../resources/images/sline2.png" id="imgids">
          </td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>

        <tr>
          <td width="600" rowspan=""></td>
          <td>Bracket</td>
          <td>Qty</td>
          <td>Accessories</td>
          <td>Qty</td>
        </tr>

        <tr>
          <td width="600"></td>
          <td>75</td>
          <td style="width: 60px;"><input style="width: 60px;" type="number" name="r1brack75qty"></td>
          <td>W/C</td>
          <td style="width: 60px;"><input style="width: 60px;" type="number" name="r1acceswcqty"></td>
        </tr>

      <tr>
        <td width="600"></td><td>100</td><td style="width: 60px;"><input type="number" name="r1brack100qty" style="width: 60px;"></td>
        <td>Corner</td>
        <td style="width: 60px;"><input type="number" name="r1accescorqty" style="width: 60px;"></td>
      </tr>

      <tr>
        <td width="600"></td>
        <td>150</td>
        <td style="width: 60px;"><input type="number" name="r1brack150qty" style="width: 60px;"></td><td>Connector</td>
        <td style="width: 60px;"><input type="number" name="r1accesconnqty" style="width: 60px;"></td>
      </tr>

      <tr>
        <td width="600"></td>
        <td><input type="text" name="r1brackother" style="width: 173px;"></td>
        <td style="width: 60px;"><input type="number" name="r1brackotherqty" style="width: 60px;"></td>
        <td>End Cap B/H</td>
        <td style="width: 60px;"><input type="number" name="r1accesendcapqty" style="width: 60px;"></td>
      </tr>

      <tr>
        <td width="600"></td>
        <td>Side Cover</td>
        <td>Qty</td>
        <td>Hand Rail</td>
        <td>Qty</td>
      </tr>

      <tr>
        <td width="600"></td>
        <td><select type="text" name="r1side1">
          <option value="0">Select side cover</option>
          <option value="FULL SIDE COVER">FULL SIDE COVER</option>
          <option value="BRACKET WISE">BRACKET WISE</option>
        </select></td>
        <td style="width: 60px;"><input style="width: 60px;" type="number" name="r1side1qty"></td>
        <td style="width: 60px;"><select style="width: 90px;" type="text" name="r1hr1">
              <option value="0">Select hand rail</option>
              <option value="ROUND HAND RAIL">ROUND</option>
              <option value="SQUARE HAND RAIL">SQUARE</option>
              <option value="SMALL HAND RAIL">SMALL</option>
              <option value="SLIM HAND RAIL">SLIM</option>
              <option value="EDGE GUARD HAND RAIL">EDGE GUARD</option>
              <option value="HALF ROUND HAND RAIL">HALF ROUND</option>
              <option value="RECTANGLE HAND RAIL">RECTANGLE</option>
              <option value="INCLINE HAND RAIL">INCLINE</option>
        </select></td><td style="width: 60px;"><input style="width: 60px;" type="number" name="r1hr1qty"></td>
      </tr>

      <tr>
        <td width="600"></td>
        <td><input readonly type="text" name="r1side2"></td>
        <td style="width: 60px;"><input readonly style="width: 60px;" type="number" name="r1side2qty"></td>
        <td style="width: 60px;"><input readonly style="width: 90px;" type="text" name="r1hr2"></td>
        <td style="width: 60px;"><input readonly style="width: 60px;" type="number" name="r1hr2qty"></td>
      </tr>

      <tr>
        <td width="600"></td>
        <td><input readonly type="text" name="r1side3"></td>
        <td style="width: 60px;"><input readonly style="width: 60px;" type="number" name="r1side3qty"></td>
        <td style="width: 60px;"><input readonly style="width: 90px;" type="text" name="r1hr3"></td>
        <td style="width: 60px;"><input readonly style="width: 60px;" type="number" name="r1hr3qty"></td>
      </tr>

      <tr>
        <td width="600"></td>
        <td><input readonly type="text" name="r1side4"></td>
        <td style="width: 60px;"><input readonly style="width: 60px;" type="number" name="r1side4qty"></td>
        <td style="width: 60px;"><input readonly style="width: 90px;" type="text" name="r1hr4"></td>
        <td style="width: 60px;"><input readonly style="width: 60px;" type="number" name="r1hr4qty"></td>
      </tr>

      <tr>

          <th colspan="6" width="1500"><center>Railing - 2</center></th>
        </tr>

        <tr>
          <td width="100%" rowspan="11">
            <select name="imgrail2" class="form-control" style="color: blue;" onchange="changeimg2('imgids','images',this.value)">
              <option value="white.png">Select shape</option>
              <option value="sline2.png">Streight</option>
              <option value="ctype2.png">C - Type</option>
              <option value="lshape">L Shape</option>
            </select><br><br><br>
            <img style="width: 70%; height: 65%;" src="../resources/images/white.png" id="imgids2">
          </td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>

        <tr>
          <td width="600" rowspan=""></td>
          <td>Bracket</td>
          <td>Qty</td>
          <td>Accessories</td>
          <td>Qty</td>
        </tr>

        <tr>
          <td width="600"></td>
          <td>75</td>
          <td style="width: 60px;"><input style="width: 60px;" type="number" name="r2brack75qty"></td>
          <td>W/C</td>
          <td style="width: 60px;"><input style="width: 60px;" type="number" name="r2acceswcqty"></td>
        </tr>

      <tr>
        <td width="600"></td><td>100</td><td style="width: 60px;"><input type="number" name="r2brack100qty" style="width: 60px;"></td>
        <td>Corner</td>
        <td style="width: 60px;"><input type="number" name="r2accescorqty" style="width: 60px;"></td>
      </tr>

      <tr>
        <td width="600"></td>
        <td>150</td>
        <td style="width: 60px;"><input type="number" name="r2brack150qty" style="width: 60px;"></td><td>Connector</td>
        <td style="width: 60px;"><input type="number" name="r2accesconnqty" style="width: 60px;"></td>
      </tr>

      <tr>
        <td width="600"></td>
        <td><input type="text" name="r2brackother" style="width: 173px;"></td>
        <td style="width: 60px;"><input type="number" name="r2brackotherqty" style="width: 60px;"></td>
        <td>End Cap B/H</td>
        <td style="width: 60px;"><input type="number" name="r2accesendcapqty" style="width: 60px;"></td>
      </tr>

      <tr>
        <td width="600"></td>
        <td>Side Cover</td>
        <td>Qty</td>
        <td>Hand Rail</td>
        <td>Qty</td>
      </tr>

      <tr>
        <td width="600"></td>
        <td><select type="text" name="r2side1">
          <option value="0">Select side cover</option>
          <option value="FULL SIDE COVER">FULL SIDE COVER</option>
          <option value="BRACKET WISE">BRACKET WISE</option>
        </select></td>
        <td style="width: 60px;"><input style="width: 60px;" type="number" name="r2side1qty"></td>
        <td style="width: 60px;"><select style="width: 90px;" type="text" name="r2hr1">
              <option value="0">Select hand rail</option>
              <option value="ROUND HAND RAIL">ROUND</option>
              <option value="SQUARE HAND RAIL">SQUARE</option>
              <option value="SMALL HAND RAIL">SMALL</option>
              <option value="SLIM HAND RAIL">SLIM</option>
              <option value="EDGE GUARD HAND RAIL">EDGE GUARD</option>
              <option value="HALF ROUND HAND RAIL">HALF ROUND</option>
              <option value="RECTANGLE HAND RAIL">RECTANGLE</option>
              <option value="INCLINE HAND RAIL">INCLINE</option>
        </select></td><td style="width: 60px;"><input style="width: 60px;" type="number" name="r2hr1qty"></td>
      </tr>

      <tr>
        <td width="600"></td>
        <td><input readonly type="text" name="r2side2"></td>
        <td style="width: 60px;"><input readonly style="width: 60px;" type="number" name="r2side2qty"></td>
        <td style="width: 60px;"><input readonly style="width: 90px;" type="text" name="r2hr2"></td>
        <td style="width: 60px;"><input readonly style="width: 60px;" type="number" name="r2hr2qty"></td>
      </tr>

      <tr>
        <td width="600"></td>
        <td><input readonly type="text" name="r2side3"></td>
        <td style="width: 60px;"><input readonly style="width: 60px;" type="number" name="r2side3qty"></td>
        <td style="width: 60px;"><input readonly style="width: 90px;" type="text" name="r2hr3"></td>
        <td style="width: 60px;"><input readonly style="width: 60px;" type="number" name="r2hr3qty"></td>
      </tr>

      <tr>
        <td width="600"></td>
        <td><input readonly type="text" name="r2side4"></td>
        <td style="width: 60px;"><input readonly style="width: 60px;" type="number" name="r2side4qty"></td>
        <td style="width: 60px;"><input readonly style="width: 90px;" type="text" name="r2hr4"></td>
        <td style="width: 60px;"><input readonly style="width: 60px;" type="number" name="r2hr4qty"></td>
      </tr>

      <tr>

          <th colspan="6" width="1500"><center>Railing - 3</center></th>
        </tr>

        <tr>
          <td width="100%" rowspan="11">
            <select name="imgrail3" class="form-control" style="color: blue;" onchange="changeimg3('imgids3','images',this.value)">
              <option value="white.png">Select shape</option>
              <option value="sline2.png">Streight</option>
              <option value="ctype2.png">C - Type</option>
              <option value="lshape.png">L Shape</option>
            </select><br><br><br>
            <img style="width: 70%; height: 65%;" src="../resources/images/white.png" id="imgids3">
          </td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>

        <tr>
          <td width="600" rowspan=""></td>
          <td>Bracket</td>
          <td>Qty</td>
          <td>Accessories</td>
          <td>Qty</td>
        </tr>

        <tr>
          <td width="600"></td>
          <td>75</td>
          <td style="width: 60px;"><input style="width: 60px;" type="number" name="r3brack75qty"></td>
          <td>W/C</td>
          <td style="width: 60px;"><input style="width: 60px;" type="number" name="r3acceswcqty"></td>
        </tr>

      <tr>
        <td width="600"></td><td>100</td><td style="width: 60px;"><input type="number" name="r3brack100qty" style="width: 60px;"></td>
        <td>Corner</td>
        <td style="width: 60px;"><input type="number" name="r3accescorqty" style="width: 60px;"></td>
      </tr>

      <tr>
        <td width="600"></td>
        <td>150</td>
        <td style="width: 60px;"><input type="number" name="r3brack150qty" style="width: 60px;"></td><td>Connector</td>
        <td style="width: 60px;"><input type="number" name="r3accesconnqty" style="width: 60px;"></td>
      </tr>

      <tr>
        <td width="600"></td>
        <td><input type="text" name="r3brackother" style="width: 173px;"></td>
        <td style="width: 60px;"><input type="number" name="r3brackotherqty" style="width: 60px;"></td>
        <td>End Cap B/H</td>
        <td style="width: 60px;"><input type="number" name="r3accesendcapqty" style="width: 60px;"></td>
      </tr>

      <tr>
        <td width="600"></td>
        <td>Side Cover</td>
        <td>Qty</td>
        <td>Hand Rail</td>
        <td>Qty</td>
      </tr>

      <tr>
        <td width="600"></td>
        <td><select type="text" name="r3side1">
          <option value="0">Select side cover</option>
          <option value="FULL SIDE COVER">FULL SIDE COVER</option>
          <option value="BRACKET WISE">BRACKET WISE</option>
        </select></td>
        <td style="width: 60px;"><input style="width: 60px;" type="number" name="r3side1qty"></td>
        <td style="width: 60px;"><select style="width: 90px;" type="text" name="r3hr1">
              <option value="0">Select hand rail</option>              
              <option value="ROUND HAND RAIL">ROUND</option>
              <option value="SQUARE HAND RAIL">SQUARE</option>
              <option value="SMALL HAND RAIL">SMALL</option>
              <option value="SLIM HAND RAIL">SLIM</option>
              <option value="EDGE GUARD HAND RAIL">EDGE GUARD</option>
              <option value="HALF ROUND HAND RAIL">HALF ROUND</option>
              <option value="RECTANGLE HAND RAIL">RECTANGLE</option>
              <option value="INCLINE HAND RAIL">INCLINE</option>
        </select></td><td style="width: 60px;"><input style="width: 60px;" type="number" name="r3hr1qty"></td>
      </tr>

      <tr>
        <td width="600"></td>
        <td><input readonly type="text" name="r3side2"></td>
        <td style="width: 60px;"><input readonly style="width: 60px;" type="number" name="r3side2qty"></td>
        <td style="width: 60px;"><input readonly style="width: 90px;" type="text" name="r3hr2"></td>
        <td style="width: 60px;"><input readonly style="width: 60px;" type="number" name="r3hr2qty"></td>
      </tr>

      <tr>
        <td width="600"></td>
        <td><input readonly type="text" name="r3side3"></td>
        <td style="width: 60px;"><input readonly style="width: 60px;" type="number" name="r3side3qty"></td>
        <td style="width: 60px;"><input readonly style="width: 90px;" type="text" name="r3hr3"></td>
        <td style="width: 60px;"><input readonly style="width: 60px;" type="number" name="r3hr3qty"></td>
      </tr>

      <tr>
        <td width="600"></td>
        <td><input readonly type="text" name="r3side4"></td>
        <td style="width: 60px;"><input readonly style="width: 60px;" type="number" name="r3side4qty"></td>
        <td style="width: 60px;"><input readonly style="width: 90px;" type="text" name="r3hr4"></td>
        <td style="width: 60px;"><input readonly style="width: 60px;" type="number" name="r3hr4qty"></td>
      </tr>
    </table>
    <!-- <div id="item_table" > -->
      
    </div>
    <br>
    <button style="float: right;" type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button><br>
    </div>

  <br>
<center><div class="form-group">
    <input type="submit" class="btn btn-success btn-lg btn-block" onclick="javascript: return confirm('If all inputs are OKAY and Railing is OKAY click OK else cancel');" name="submit" value="Submit">
  </div></center>
</div>
</div>
</div>
</form>
<script>

  // $(document).ready(function() {
  //       function disableBack() { window.history.forward() }

  //       window.onload = disableBack();
  //       window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
  //   });

  $(document).ready(function(){

    $('#imgsel').change(function(){
      var imageselected = $(this).val();
      var dir = "../resources/images/" + imageselected;
      alert(dir);
      $('#imgidss').img(dir);
    });
 
 $(document).on('click', '.add', function(){
  var html = '';
  html += '<table border="1" >';
  html += '<tr>';
  html += '<th colspan="6" width="1500"><center>Railing - 1 </center></th>';
  html += '</tr>';
  html += '<tr>';
  html += '<td width="100%" rowspan="11"><select id="imgsel" name="imgrail1" class="form-control" style="color: blue;"> <option value="sline2.png">Streight</option> <option value="ctype2.png">C - Type</option> <option value="lshape.png">L Shape</option></select><br><br><br> <img style="width: 70%; height: 65%;" src="" alt="Nothing showing" id="imgidss"></td>';
  html += '<td></td>';
  html += '<td></td>';
  html += '<td></td>';
  html += '<td></td>';
  html += '</tr>';

  html += '<tr>';
  html += '<td width="600" rowspan=""></td>';
  html += '<td>Bracket</td>';
  html += '<td>Qty</td>';
  html += '<td>Accessories</td>';
  html += '<td>Qty</td>';
  html += '</tr>';

  html += '<tr>';
  html += '<td width="600"></td>';
  html += '<td>75</td>';
  html += '<td style="width: 60px;"><input style="width: 60px;" type="" name=""></td>';
  html += '<td>W/C</td>';
  html += '<td style="width: 60px;"><input style="width: 60px;" type="" name=""></td>';
  html += '</tr>';

  html += '<tr>';
  html += '<td width="600"></td>';
  html += '<td>100</td>';
  html += '<td style="width: 60px;"><input style="width: 60px;"></td>';
  html += '<td>Corner</td>';
  html += '<td style="width: 60px;"><input style="width: 60px;"></td>';
  html += '</tr>';

  html += '<tr>';
  html += '<td width="600"></td>';
  html += '<td>150</td>';
  html += '<td style="width: 60px;"><input style="width: 60px;"></td>';
  html += '<td>Connector</td>';
  html += '<td style="width: 60px;"><input style="width: 60px;"></td>';
  html += '</tr>';

  html += '<tr>';
  html += '<td width="600"></td>';
  html += '<td><input style="width: 173px;"></td>';
  html += '<td style="width: 60px;"><input style="width: 60px;"></td>';
  html += '<td>End Cap B/H</td>';
  html += '<td style="width: 60px;"><input style="width: 60px;"></td>';
  html += '</tr>';

  html += '<tr>';
  html += '<td width="600"></td>';
  html += '<td>Side Cover</td>';
  html += '<td>Qty</td>';
  html += '<td>Hand Rail</td>';
  html += '<td>Qty</td>';
  html += '</tr>';

  html += '<tr>';
  html += '<td width="600"></td>';
  html += '<td><input type="" name=""></td>';
  html += '<td style="width: 60px;"><input style="width: 60px;" type="" name=""></td>';
  html += '<td style="width: 60px;"><input style="width: 90px;" type="" name=""></td>';
  html += '<td style="width: 60px;"><input style="width: 60px;" type="" name=""></td>';
  html += '</tr>';

  html += '<tr>';
  html += '<td width="600"></td>';
  html += '<td><input type="" name=""></td>';
  html += '<td style="width: 60px;"><input style="width: 60px;" type="" name=""></td>';
  html += '<td style="width: 60px;"><input style="width: 90px;" type="" name=""></td>';
  html += '<td style="width: 60px;"><input style="width: 60px;" type="" name=""></td>';
  html += '</tr>';

  html += '<tr>';
  html += '<td width="600"></td>';
  html += '<td><input type="" name=""></td>';
  html += '<td style="width: 60px;"><input style="width: 60px;" type="" name=""></td>';
  html += '<td style="width: 60px;"><input style="width: 90px;" type="" name=""></td>';
  html += '<td style="width: 60px;"><input style="width: 60px;" type="" name=""></td>';
  html += '</tr>';

  html += '<tr>';
  html += '<td width="600"></td>';
  html += '<td><input type="" name=""></td>';
  html += '<td style="width: 60px;"><input style="width: 60px;" type="" name=""></td>';
  html += '<td style="width: 60px;"><input style="width: 90px;" type="" name=""></td>';
  html += '<td style="width: 60px;"><input style="width: 60px;" type="" name=""></td>';
  html += '</tr>';
  html += '<tr><td colspan="6"><button style="float: right;" type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
  html += '</table>';
  $('#item_table').append(html);
  });

$(document).on('click', '.remove', function(){
  $(this).closest('table').remove();
 });

});
</script>