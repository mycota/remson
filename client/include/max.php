<?php 
	 $con = mysqli_connect("localhost","root","","goods");
  if (!$con) {
    echo "Not Connected";
  }
   $query_count = "SELECT MAX(SERIAL) as maxx from tbl_products";
    $find_count = mysqli_query($con,$query_count);
    //$count = mysqli_num_rows($find_count);
    while ($row = mysqli_fetch_assoc($find_count)) {
    	$serils = $row['maxx']+1;
    
    }

    $query = "SELECT * FROM tbl_products where SERIAL = 1";
                  $select_query = mysqli_query($con, $query);
                  //confirmQuery($select_query);
                  while ($row = mysqli_fetch_assoc($select_query)) {
                    
                    echo $serial = $row['SERIAL'];
                    echo $pro = $row['PRODUCT'];
                    echo $qty = $row['QTY'];
                    echo $pcs = $row['PCS_RFT'];
                  }

                  $insert_query = mysqli_prepare($con,"INSERT INTO tbl_products (SERIAL,PRODUCT, QTY, PCS_RFT) VALUES(?,?,?)");
      mysqli_stmt_bind_param($insert_query,"dsdd", $serils, $pname, $qty, $pcsrft);
      mysqli_stmt_execute($insert_query);
    
    // echo $serils;
?>