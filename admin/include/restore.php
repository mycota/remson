<?php 
  if(isset($_GET['source'])) {
  $query = "SELECT * from tbl_products where proDel != 'Deleted' and orderDel != 'Remove'";
  $find_count = mysqli_query($con, $query);
  $count = mysqli_num_rows($find_count);

  if ($count <= 0) {
  echo "<script>alert('Sorry NO product to restore !!!'); window.location='./orders.php?source'</script>";

  }
}

  if (isset($_POST['item'])) {

    $proid = mysqli($_POST['item']);
    $rest = '';

           $query = mysqli_prepare($con,"UPDATE tbl_products SET orderDel = ? WHERE  SERIAL = ?");
           mysqli_stmt_bind_param($query,"sd", $rest, $proid);
           mysqli_stmt_execute($query);

            confirmQuery($query);

              header("Location: ./orders.php?source");
          
       }
  ?>

  <style type="text/css">

  #page-wrapper{padding-left: 40px; width: 100%; border-color: green; box-shadow: 30px;}
</style>

    <form action="" method="POST" enctype="multipart/form-data">
      
      <div id="page-wrapper" style="background-color: #00BFFF; ">
       <center><span ><h2>Restore Remove Product</h2></span></center> <hr>                  
    <div class="container-fluid">

   <div class="row"  >
    
    <div class="col-lg-12">

      
<?php //echo $_GET['source']?>
      <div class="form-group">    
        <select class="form-control" name="item">
        <?php
        $query = "SELECT * FROM tbl_products where proDel != 'Deleted' and orderDel = 'Remove' ";
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
      <center>
      <div class="form-group">    
        <input type="submit" class="btn btn-primary" name="submit" value="Restore"><br><br>
        <!-- <a href="update.php">Add product dropd down</a> -->
      </div></center>
      </form>
