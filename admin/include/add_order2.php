    <!-- <center><h1 class="page-header" style="background-color: #00CED1; color: white;">
        Packing List</h1></center>
        <input class="form-control" id="myInput" type="text" placeholder="Search.."> -->

        
          <fieldset class="page-header">
            <legend>Invoice:</legend>
            <img style="width: 100%;" src="../resources/images/head.jpg">
          </fieldset>
        </center>

<?php 
  if (isset($_POST['qty'])) {

    $insert_query = '';

    $qty = $_POST['qty'];
    $jobNum = $_POST['jobNum'];
    $custid = $_POST['custid'];
    $serial = $_POST['id'];
    $product = $_POST['product'];
    $descript = $_POST['descript'];
    $type = $_POST['type'];
    $pcs = $_POST['pcs'];
    $date = $_POST['date'];
    //$glas = $_POST['glassSize'];

    for($count = 0; $count<count($qty); $count++){
        $ecah_qty = mysqli($qty[$count]);
        $each_custid = mysqli($custid[$count]);
        $each_jobNum = mysqli($jobNum[$count]);
        $each_serial = mysqli($serial[$count]);
        $each_product = mysqli($product[$count]);
        $each_descript = mysqli($descript[$count]);
        $each_type = mysqli($type[$count]);
        $each_pcs = mysqli($pcs[$count]);
        $each_date = mysqli($date[$count]);
        //$each_glass = mysqli($glas[$count]);
        
        $insert_query = mysqli_prepare($con,"INSERT INTO tbl_packing_list (jobNum,customerNo ,prodSerial ,product,description, type,qty,pcs_rft,orderDate) VALUES(?,?,?,?,?,?,?,?,?)");
        mysqli_stmt_bind_param($insert_query,"ssssssdss", $each_jobNum, $each_custid, $each_serial, $each_product, $each_descript, $each_type, $ecah_qty, $each_pcs, $each_date);

        mysqli_stmt_execute($insert_query);
        confirmQuery($insert_query);
      }

      $orderdel = '';
      $update_query = mysqli_prepare($con,"UPDATE tbl_products SET orderDel = ?");
      mysqli_stmt_bind_param($update_query,"s", $orderdel);
      mysqli_stmt_execute($update_query);
      confirmQuery($update_query);

      $insert_query = mysqli_prepare($con,"INSERT INTO tbl_packing_list_summary (custID, jobnumb, glasstype, glassize1,glassize2, coating
) VALUES(?,?,?,?,?,?)");
      mysqli_stmt_bind_param($insert_query,"ssssss", $_SESSION['custid'], $_SESSION['jobnumber'],$_SESSION['glasstype'],$_SESSION['glassize1'], $_SESSION['glassize2'], $_SESSION['coattype']);

        mysqli_stmt_execute($insert_query);
        confirmQuery($insert_query);

      logs($_SESSION['id'], $_SESSION['username'], 'Place order for customer '.$_SESSION['custid'].' with. job number '.$_SESSION['jobnumber']);

      unset($_SESSION["coattype"]);
      unset($_SESSION["glassize2"]);
      unset($_SESSION["glassize1"]);
      unset($_SESSION["glasstype"]);

      echo "<script>alert('Order submitted......'); window.location='./orders.php?source=invoice'</script>";
      //header("Location: ./orders.php?source=invoice");

      //unset($_SESSION["products"])
      //$_SESSION['jobnumber'] = $d;
      //$_SESSION['username'] = $_GET['source'];
      //$id = $_SESSION['jobnumb'];

  
      }
?>
<!-- Form start here -->
<div class="row" style="background-color: #F8F8FF;" id="draft_table">
<form action="" method="post">
<div align="right">
<a href="./orders.php?source=restore">Restore Products</a>

<!-- <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_modal" class="btn btn-primary">Restore Item</button></div> -->
<table class="table table-bordered table-hover">
                    <thead style="background-color: gray">
                      <tr>
                        <th>Serial</th>
                        <th>Product</th>
                        <th>Description</th>
                        <th>Type</th>
                        <th>QTY</th>
                        <th>PCS/RFT</th>
                        <th>Manage</th>
                      </tr>
                    </thead>     
                  <tbody id="myTable">
        <?php 
              
              function descrpt($find_each1){
                 $value = '';
                while ($row = mysqli_fetch_assoc($find_each1)) {
                    //$value.="<option value="'.$row["description"].'">'.$row["description"].'</option>";
                     $dis = $row['description'];
                    echo "<option value='$dis'>$dis</option>";

                    }
              }

              function type($find_each){
                while ($row = mysqli_fetch_assoc($find_each)) {
                    echo '<option value="'.$row["type"].'">'.$row["type"].'</option>';

                    }
              }

              function pcs_rft($find_each2){
                while ($row = mysqli_fetch_assoc($find_each2)) {
                    echo '<option value="'.$row["PCS_RFT"].'">'.$row["PCS_RFT"].'</option>';

                    }
              }

                $query = "SELECT * from tbl_products where proDel != 'Deleted' and orderDel != 'Remove' order by SERIAL";
                $select_cust = mysqli_query($con, $query);
                
                logs($_SESSION['id'], $_SESSION['username'], "View customer");

                 while ($row = mysqli_fetch_assoc($select_cust)) {
                    $serial = $row['SERIAL'];
                    $product = $row['PRODUCT'];
                    $qty = $row['QTY'];


                $query_option = "SELECT * FROM tbl_product_description where product_serial=".$row['SERIAL'];
                $find_each1 = mysqli_query($con,$query_option);

                $query_option = "SELECT * FROM tbl_product_type where product_serials=".$row['SERIAL'];
                $find_each = mysqli_query($con,$query_option); 

                $query_option = "SELECT * FROM tbl_pcs_rft";
                $find_each2 = mysqli_query($con,$query_option);

                    ?>

                    <tr>
                    <td hidden><input type="text" name="date[]" required class="form-control" value="<?php echo date('Y-m-d')?>" ></td>
                    <td hidden><input type="text" name="jobNum[]" required class="form-control" value="<?php echo $_SESSION['jobnumber'] ?>" ></td>
                    <td hidden><input type="text" name="custid[]" required class="form-control" value="<?php echo $_SESSION['custid']?>" ></td>
                    <td><input type="text" name="id[]" required class="form-control" value="<?php echo $serial?>" readonly ></td>
                    <td><input type="text" name="product[]" required="" class="form-control" value="<?php echo $product ?>" readonly ></td>
                    <td><select class='form-control' name="descript[]"><?php descrpt($find_each1); ?></select></td> 
                    <td><select class='form-control' required name="type[]"><?php type($find_each); ?></select></td>                                           
                    <td><input type="number"  name="qty[]" required="" class="form-control" ></td>
                    <td><select class='form-control' name="pcs[]"><?php pcs_rft($find_each2); ?></select></td> 
                    <td><a style="color:red" href='./orders.php?source=ao2&add_order2=<?php echo $serial ?>'>Remove</a></td>
                    </tr>
        <?php 
              }

       ?>

                                          </tr>
                  </tbody>
                </table>

                <div class="col-xs-4 form-group" style="padding-left: 500px;">
                  <input type="submit" name="submit" value="Submit" class="btn btn-success">
                </div>

</form></div>

                <hr>

                <div id="add_data_modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h4 style="background-color: #00CED1; color: white;" class="modal-title">Restore Remove Item</h4></center>
      </div>
      <div class="modal-body">
        <form method="post" id="insert_form">
          
          <div class="form-group">
              <label for="title">Select Item</label>
              <select type="text" class="form-control" name="item" id="item" />
              <!-- <option value=""></option> -->
        <?php
            $query = "SELECT * FROM tbl_products where proDel != 'Deleted' ";
            $select_prod = mysqli_query($con, $query);
          
            //confirmQuery($select_prod);

           while ($row = mysqli_fetch_assoc($select_prod)) {
            $id = $row['SERIAL'];
            $prod = $row['PRODUCT'];

            echo "<option value='$id'>$prod</option>";
          }

          ?>
          </select></div>
        
            <input type="submit" class="btn btn-success btn-block" name="insert" id="insert" value="Restore">
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
        </div>
    </div>
  </div>
</div>
                
                
                <?php 
                
                if (isset($_SESSION['role'])) {

                  if($_SESSION['role'] == 'Admin'){

                if(isset($_GET['add_order2'])) {
                  
                  $the_cust_id = mysqli($_GET['add_order2']);

                  $query = "UPDATE tbl_products SET orderDel = 'Remove' where SERIAL = '$the_cust_id'";

                  $delete_query = mysqli_query($con, $query);

                  confirmQuery($delete_query);
                  logs($_SESSION['id'], $_SESSION['username'], "Remove a product during packing list $the_cust_id");
                  header("Location: ./orders.php?source=ao2");

                  //echo "<script>alert('User deleted......'); window.location='./products.php'</script>";


                }
                  
              }
            }
                 ?>
<script>
 $(document).ready(function(){
  $('#insert_form').on('submit', function(event){
    event.preventDefault();
    if($('#item').val() == "")
    {
      alert("Please select item");
    }
    else 
    {
      $.ajax({
        url:"restore.php",
        method:"POST",
        data:$('#insert_form').serialize(),
        success:function(data)
        {
          $('#insert_form')[0].reset();
          $('#add_data_modal').modal('hide');
          $('#draft_table').html(data);
        }
      });
    }
  }); 
});
 </script>


