    <center><h1 class="page-header" style="background-color: #00CED1; color: white;">
        Packing List</h1></center>
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
      $page1 = ($page * 10) - 10; 
    }

    $query_count = "SELECT * from tbl_products where proDel != 'Deleted'";

    $find_count = mysqli_query($con,$query_count);
    $count = mysqli_num_rows($find_count);

    $count = ceil($count /10);


    ?>

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
                     $dis = $row['description'];
                    echo "<option value='$dis'>$dis</option>";

                    }
              }

              function type($find_each){
                while ($row = mysqli_fetch_assoc($find_each)) {
                    echo '<option value="'.$row["type"].'">'.$row["type"].'</option>';

                    }
              }

              function pcs($find_each2){
              
                while ($row = mysqli_fetch_assoc($find_each2)) {
                    echo $row["PCS_RFTS"];

                    }
              }

                $query = "SELECT * from tbl_products where proDel != 'Deleted' order by SERIAL LIMIT $page1,10";
                $select_cust = mysqli_query($con, $query);
                
                logs($_SESSION['id'], $_SESSION['username'], "View customer");
                $serial = '';
                 while($row = mysqli_fetch_assoc($select_cust)) {
                   //$serial = 1;
                    $product = $row['PRODUCT'];
                    $qty = $row['QTY'];
                    ++$serial + $page1;

                $query_option = "SELECT * FROM tbl_product_description where product_serial=".$row['SERIAL'];
                $find_each1 = mysqli_query($con,$query_option);

                $query_option = "SELECT * FROM tbl_product_type where product_serials=".$row['SERIAL'];
                $find_each = mysqli_query($con,$query_option); 

                $query_option = "SELECT * FROM tbl_pcs_rft where pcs_rft_id=".$row['PCS_RFT'];
                $find_each2 = mysqli_query($con,$query_option); 


                    ?>

                    <tr>
                    <td><?php echo $serial?></td>
                    <td><?php echo $product ?></td>
                    <td><select class='form-control'><?php descrpt($find_each1); ?></select></td> 
                    <td><select class='form-control'><?php type($find_each); ?></select></td>                                           
                    <td><?php echo $qty?></td>
                    <td><?php pcs($find_each2)?></td>
                    <td><a href='products.php?source=edit&edit=<?php echo $serial?>'>Update</a> | <a onClick="javascript: return confirm('Are you sure to DELETE!'); " href='products.php?delete=<?php echo $serial ?>'>Delete</a></td>
                    
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
                    echo "<li><a style='background: #000 !important;' class='active_link' href='products.php?source=none&page={$i}'>{$i}</a></li>";                      
                    }
                  else{
                    echo "<li><a href='products.php?source=none&page={$i}'>{$i}</a></li>";
                  }

                  }
                  

                  ?>
                </ul>


                <?php 
                
                // for deleting a comment
                if (isset($_SESSION['role'])) {

                  if($_SESSION['role'] == 'Admin'){

                if(isset($_GET['delete'])) {
                  
                  $the_cust_id = mysqli($_GET['delete']);

                  $query = "SELECT * FROM tbl_products where SERIAL = '$the_cust_id'";
                  $select_query = mysqli_query($con, $query);
                  confirmQuery($select_query);
                  while ($row = mysqli_fetch_assoc($select_query)) {
                    
                    $serial = $row['SERIAL'];
                    $pro = $row['PRODUCT'];
                    $qty = $row['QTY'];
                    $pcs = $row['PCS_RFT'];
                  }

                  $insert = mysqli_prepare($con, "INSERT INTO tbl_products_deleted (SERIAL, PRODUCT, QTY, PCS_RFT) VALUES(?,?,?,?)");
                  mysqli_stmt_bind_param($insert,"dsdd", $serial, $pro, $qty, $pcs);
                  mysqli_stmt_execute($insert); 

                   $query = "SELECT * FROM tbl_product_description where product_serial = '$the_cust_id'";
                  $select_query = mysqli_query($con, $query); 
       
                  confirmQuery($select_query);
                  while ($row = mysqli_fetch_assoc($select_query)) {
                    
                    $desid = $row['pro_des_id'];
                    $des = $row['description'];
                    $proserial = $row['product_serial'];

                 $insert = mysqli_prepare($con, "INSERT INTO tbl_product_description_deleted (pro_des_id,description,product_serial
) VALUES(?,?,?)");
                  mysqli_stmt_bind_param($insert,"dsd", $desid,$des,$proserial);
                  mysqli_stmt_execute($insert); 
                    
                  }
                 
                 $query = "SELECT * FROM tbl_product_type where product_serials = '$the_cust_id'";
                  $select_query = mysqli_query($con, $query);
                  confirmQuery($select_query);
                  while ($row = mysqli_fetch_assoc($select_query)) {
                    
                    $typeid = $row['pro_type_id'];
                    $type = $row['type'];
                    $proserial = $row['product_serials'];

                 $insert = mysqli_prepare($con, "INSERT INTO tbl_product_type_deleted (pro_type_id,type,product_serials

) VALUES(?,?,?)");
                  mysqli_stmt_bind_param($insert,"dsd", $typeid,$type,$proserial);
                  mysqli_stmt_execute($insert); 
                    
                  }

                  $query = "DELETE FROM tbl_product_description where product_serial = '$the_cust_id'";
                  $select_query = mysqli_query($con, $query);


                  $query = "DELETE FROM tbl_product_type where product_serials = '$the_cust_id'";
                  $select_query = mysqli_query($con, $query);
         
                  $query = "DELETE FROM tbl_products where SERIAL = '$the_cust_id'";
                  $select_query = mysqli_query($con, $query);


                  confirmQuery($select_query);
                  logs($_SESSION['id'], $_SESSION['username'], "Deleted a customer $the_cust_id");
                  echo "<script>alert('Product deleted......'); window.location='./products.php'</script>";

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
