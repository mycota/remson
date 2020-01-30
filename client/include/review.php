<?php 
  
  if (isset($_GET['wqrt'])) {

    $code = $_GET['wqrt'];

    $query = "SELECT * FROM tbl_agentOrders, tbl_agent_customer where agentCustID = agentCustid and agentOrdCode = $code";
    $select_cust = mysqli_query($con, $query);

    //confirmQuery($select_cust);


    while($row = mysqli_fetch_assoc($select_cust))
    {
      $custcode = $row['agentCust_ID'];
      $party = $row['partyName'];
      $bilname = $row['billingName'];
      $place = $row['place'];
      $biladres = $row['billingAddress'];
      $date = date('d/m/Y',strtotime($row['agentCustCreateDate']));
      $apoxrft = $row['approxiRFT'];
      $glasstype = $row['grlassType'];
      $gsize1 = $row['glasSize1'];
      $gsize2 = $row['glasSize2'];

      $proname = $row['productName'];
      $protype = $row['productType'];
      $procover = $row['productCover'];
      $hrail = $row['handrail'];
      $procolor = $row['productColor'];
      $color = $row['color'];


    }


  }


  if (isset($_POST['update'])) {
        //$agentCode = time(); 
    $id2 = $_POST['id2'];
    $id3 = $_POST['id3'];
    $ordercode = mysqli($_POST['ordercode']);

    $imgrail2 = $_POST['imgrail2'];
    $imgrail3 = $_POST['imgrail3'];
    $r1glassheight = mysqli($_POST['r1glassheight']);
    $r2glassheight = mysqli($_POST['r2glassheight']);
    $r3glassheight = mysqli($_POST['r3glassheight']);
    $custcode = $_POST['custcode'];
    $partyName = mysqli($_POST['party_name']);
    $billingName = mysqli($_POST['billing_name']);
    $place = mysqli($_POST['place']);
    $billingAddress = mysqli($_POST['billing_address']);
    $agent = $_SESSION['id'];
    
      $queryCust = mysqli_prepare($con,"UPDATE tbl_agent_customer SET partyName = ?, billingName = ?, place = ?, billingAddress = ? WHERE agentCust_ID = ?");
          mysqli_stmt_bind_param($queryCust,"ssssd", $partyName, $billingName, $place,$billingAddress, $custcode);
          mysqli_stmt_execute($queryCust);
          //confirmQuery($queryCust);


    $glasstype = mysqli($_POST['glasstype']);
    $glassize1 = mysqli($_POST['glassize1']);
    @$glassize2 = mysqli($_POST['glassize2']);
    $apoxrft = mysqli($_POST['apoxrft']);
    $productName = mysqli($_POST['product_name']);
    $productType = mysqli($_POST['prtype']);
    @$productCover = mysqli($_POST['product_cover']);
    $handRail = mysqli($_POST['hand_rail']);
    $colorType = mysqli($_POST['color_type']);
    $colors = mysqli($_POST['colors']);

      $queryOrder = mysqli_prepare($con,"UPDATE tbl_agentOrders SET grlassType = ?, glasSize1 = ?, glasSize2 = ?, approxiRFT = ?, productName = ?, productType = ?, productCover = ?, handrail = ?, productColor = ?, color = ? WHERE agentOrdCode = ?");
          mysqli_stmt_bind_param($queryOrder,"ssssssssssd", $glasstype, $glassize1, $glassize2, $apoxrft, $productName, $productType, $productCover, $handRail, $colorType, $colors, $ordercode);
          mysqli_stmt_execute($queryOrder);
          //confirmQuery($queryOrder);

        // Railing 1
    $id1 = $_POST['id1'];   
    $imgrail1 = mysqli($_POST['imgrail1']);
    $r1brack75qty = mysqli($_POST['r1brack75qty']);
    $r1acceswcqty = mysqli($_POST['r1acceswcqty']);
    $r1brack100qty = mysqli($_POST['r1brack100qty']);
    $r1accescorqty = mysqli($_POST['r1accescorqty']);
    $r1brack150qty = mysqli($_POST['r1brack150qty']);
    $r1accesconnqty = mysqli($_POST['r1accesconnqty']);
    $r1brackother = mysqli($_POST['r1brackother']);
    $r1brackotherqty = mysqli($_POST['r1brackotherqty']);
    $r1accesendcapqty = mysqli($_POST['r1accesendcapqty']);
    $r1side = mysqli($_POST['r1side1']);
    $r1sideqty = mysqli($_POST['r1side1qty']);
    $r1hr1 = mysqli($_POST['r1hr1']);
    $r1hr1qty = mysqli($_POST['r1hr1qty']);

      $queryRail1 = mysqli_prepare($con,"UPDATE tbl_agentOrders_railing SET shapeImage = ?, bracket75Qty = ?, bracket100Qty = ?, bracket150Qty = ?, bracketOther = ?, bracketOtherQty = ?, sideCover = ?, sideCoverQty = ?, accesWCQty = ?, accesCornerQty = ?, accesConnectorQty = ?, accesEndcapQty = ?, handRail = ?, handRailQty = ? WHERE agentOrdIDRail = ?");
          mysqli_stmt_bind_param($queryRail1,"sdddsdsdddddsdd", $imgrail1, $r1brack75qty, $r1brack100qty, $r1brack150qty, $r1brackother, $r1brackotherqty, $r1side, $r1sideqty, $r1acceswcqty, $r1accescorqty, $r1accesconnqty, $r1accesendcapqty, $r1hr1, $r1hr1qty,$id1);
          mysqli_stmt_execute($queryRail1);
          //confirmQuery($queryRail1);
        
    
      if ($imgrail2 != "white.png" && $imgrail3 != "white.png") {

        // Railing 2
        if (!empty($id2) && empty($id3)) {
          // update railing 2 
        $r2brack75qty = mysqli($_POST['r2brack75qty']);
        $r2acceswcqty = mysqli($_POST['r2acceswcqty']);
        $r2brack100qty = mysqli($_POST['r2brack100qty']);
        $r2accescorqty = mysqli($_POST['r2accescorqty']);
        $r2brack150qty = mysqli($_POST['r2brack150qty']);
        $r2accesconnqty = mysqli($_POST['r2accesconnqty']);
        $r2brackother = mysqli($_POST['r2brackother']);
        $r2brackotherqty = mysqli($_POST['r2brackotherqty']);
        $r2accesendcapqty = mysqli($_POST['r2accesendcapqty']);
        $r2side = mysqli($_POST['r2side1']);
        $r2sideqty = mysqli($_POST['r2side1qty']);
        $r2hr1 = mysqli($_POST['r2hr1']);
        $r2hr1qty = mysqli($_POST['r2hr1qty']);


          $queryRail2 = mysqli_prepare($con,"UPDATE tbl_agentOrders_railing SET shapeImage = ?, bracket75Qty = ?, bracket100Qty = ?, bracket150Qty = ?, bracketOther = ?, bracketOtherQty = ?, sideCover = ?, sideCoverQty = ?, accesWCQty = ?, accesCornerQty = ?, accesConnectorQty = ?, accesEndcapQty = ?, handRail = ?, handRailQty = ? WHERE agentOrdIDRail = ?");
              mysqli_stmt_bind_param($queryRail2,"sdddsdsdddddsdd", $imgrail2, $r2brack75qty, $r2brack100qty, $r2brack150qty, $r2brackother, $r2brackotherqty, $r2side, $r2sideqty, $r2acceswcqty, $r2accescorqty, $r2accesconnqty, $r2accesendcapqty, $r2hr1, $r2hr1qty, $id2);
              mysqli_stmt_execute($queryRail2);
              //confirmQuery($queryRail2); 
        

          // insert railing 3 
        $r3brack75qty = mysqli($_POST['r3brack75qty']);
        $r3acceswcqty = mysqli($_POST['r3acceswcqty']);
        $r3brack100qty = mysqli($_POST['r3brack100qty']);
        $r3accescorqty = mysqli($_POST['r3accescorqty']);
        $r3brack150qty = mysqli($_POST['r3brack150qty']);
        $r3accesconnqty = mysqli($_POST['r3accesconnqty']);
        $r3brackother = mysqli($_POST['r3brackother']);
        $r3brackotherqty = mysqli($_POST['r3brackotherqty']);
        $r3accesendcapqty = mysqli($_POST['r3accesendcapqty']);
        $r3side = mysqli($_POST['r3side1']);
        $r3sideqty = mysqli($_POST['r3side1qty']);
        $r3hr1 = mysqli($_POST['r3hr1']);
        $r3hr1qty = mysqli($_POST['r3hr1qty']);
        $railNo3 = 3;

          $queryRail3 = mysqli_prepare($con,"INSERT INTO tbl_agentOrders_railing (agentOrdCodeRail, shapeImage, bracket75Qty, bracket100Qty, bracket150Qty, bracketOther, bracketOtherQty, sideCover, sideCoverQty, accesWCQty, accesCornerQty, accesConnectorQty, accesEndcapQty, handRail, handRailQty, railingNo) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
              mysqli_stmt_bind_param($queryRail3,"dsdddsdsdddddsdd", $ordercode, $imgrail3, $r3brack75qty, $r3brack100qty, $r3brack150qty, $r3brackother, $r3brackotherqty, $r3side, $r3sideqty, $r3acceswcqty, $r3accescorqty, $r3accesconnqty, $r3accesendcapqty, $r3hr1, $r3hr1qty, $railNo3);
              mysqli_stmt_execute($queryRail3);
              //confirmQuery($queryRail3);

          logs($_SESSION['id'], $_SESSION['username'], "Updated (railing 2), added (railing 3) and others updated before processing on order: ".$ordercode);

          echo "<script>alert('Railing2 updated, Railing 3 added and others updated successfully.'); window.location='quotationmenu?source=pend'</script>";
            //echo $ordercode.' |'.$railNo2.' '.$r2hr1.' '.$imgrail2;
            //echo 'ID1: '.$id1.' ID2: '.$id2.' ID: '.$id3.' Code '.$ordercode;

        }
        else if (empty($id2) && !empty($id3)) {  

        // update Railing 3
        $r3brack75qty = mysqli($_POST['r3brack75qty']);
        $r3acceswcqty = mysqli($_POST['r3acceswcqty']);
        $r3brack100qty = mysqli($_POST['r3brack100qty']);
        $r3accescorqty = mysqli($_POST['r3accescorqty']);
        $r3brack150qty = mysqli($_POST['r3brack150qty']);
        $r3accesconnqty = mysqli($_POST['r3accesconnqty']);
        $r3brackother = mysqli($_POST['r3brackother']);
        $r3brackotherqty = mysqli($_POST['r3brackotherqty']);
        $r3accesendcapqty = mysqli($_POST['r3accesendcapqty']);
        $r3side = mysqli($_POST['r3side1']);
        $r3sideqty = mysqli($_POST['r3side1qty']);
        $r3hr1 = mysqli($_POST['r3hr1']);
        $r3hr1qty = mysqli($_POST['r3hr1qty']);

          $queryRail3 = mysqli_prepare($con,"UPDATE tbl_agentOrders_railing SET shapeImage = ?, bracket75Qty = ?, bracket100Qty = ?, bracket150Qty = ?, bracketOther = ?, bracketOtherQty = ?, sideCover = ?, sideCoverQty = ?, accesWCQty = ?, accesCornerQty = ?, accesConnectorQty = ?, accesEndcapQty = ?, handRail = ?, handRailQty = ? WHERE agentOrdIDRail = ?");
              mysqli_stmt_bind_param($queryRail3,"sdddsdsdddddsdd", $imgrail3, $r3brack75qty, $r3brack100qty, $r3brack150qty, $r3brackother, $r3brackotherqty, $r3side, $r3sideqty, $r3acceswcqty, $r3accescorqty, $r3accesconnqty, $r3accesendcapqty, $r3hr1, $r3hr1qty, $id3);
              mysqli_stmt_execute($queryRail3);
              //confirmQuery($queryRail3);


        // Insert railing 2
        $r2brack75qty = mysqli($_POST['r2brack75qty']);
        $r2acceswcqty = mysqli($_POST['r2acceswcqty']);
        $r2brack100qty = mysqli($_POST['r2brack100qty']);
        $r2accescorqty = mysqli($_POST['r2accescorqty']);
        $r2brack150qty = mysqli($_POST['r2brack150qty']);
        $r2accesconnqty = mysqli($_POST['r2accesconnqty']);
        $r2brackother = mysqli($_POST['r2brackother']);
        $r2brackotherqty = mysqli($_POST['r2brackotherqty']);
        $r2accesendcapqty = mysqli($_POST['r2accesendcapqty']);
        $r2side = mysqli($_POST['r2side1']);
        $r2sideqty = mysqli($_POST['r2side1qty']);
        $r2hr1 = mysqli($_POST['r2hr1']);
        $r2hr1qty = mysqli($_POST['r2hr1qty']);
        $railNo2 = 2;


          $queryRail2 = mysqli_prepare($con,"INSERT INTO tbl_agentOrders_railing (agentOrdCodeRail, shapeImage, bracket75Qty, bracket100Qty, bracket150Qty, bracketOther, bracketOtherQty, sideCover, sideCoverQty, accesWCQty, accesCornerQty, accesConnectorQty, accesEndcapQty, handRail, handRailQty, railingNo) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
              mysqli_stmt_bind_param($queryRail2,"dsdddsdsdddddsdd", $ordercode, $imgrail2, $r2brack75qty, $r2brack100qty, $r2brack150qty, $r2brackother, $r2brackotherqty, $r2side, $r2sideqty, $r2acceswcqty, $r2accescorqty, $r2accesconnqty, $r2accesendcapqty, $r2hr1, $r2hr1qty, $railNo2);
              mysqli_stmt_execute($queryRail2);
              //confirmQuery($queryRail2);


          logs($_SESSION['id'], $_SESSION['username'], "Updated (railing 3) and added (railing 2) and others updated before processing on order: ".$ordercode);

            echo "<script>alert('Railing 2 added, Railing updated and others successfully updated.'); window.location='quotationmenu?source=pend'</script>";
          
            }
        else if (!empty($id2) && !empty($id3)) {  

        $r2brack75qty = mysqli($_POST['r2brack75qty']);
        $r2acceswcqty = mysqli($_POST['r2acceswcqty']);
        $r2brack100qty = mysqli($_POST['r2brack100qty']);
        $r2accescorqty = mysqli($_POST['r2accescorqty']);
        $r2brack150qty = mysqli($_POST['r2brack150qty']);
        $r2accesconnqty = mysqli($_POST['r2accesconnqty']);
        $r2brackother = mysqli($_POST['r2brackother']);
        $r2brackotherqty = mysqli($_POST['r2brackotherqty']);
        $r2accesendcapqty = mysqli($_POST['r2accesendcapqty']);
        $r2side = mysqli($_POST['r2side1']);
        $r2sideqty = mysqli($_POST['r2side1qty']);
        $r2hr1 = mysqli($_POST['r2hr1']);
        $r2hr1qty = mysqli($_POST['r2hr1qty']);


          $queryRail2 = mysqli_prepare($con,"UPDATE tbl_agentOrders_railing SET shapeImage = ?, bracket75Qty = ?, bracket100Qty = ?, bracket150Qty = ?, bracketOther = ?, bracketOtherQty = ?, sideCover = ?, sideCoverQty = ?, accesWCQty = ?, accesCornerQty = ?, accesConnectorQty = ?, accesEndcapQty = ?, handRail = ?, handRailQty = ? WHERE agentOrdIDRail = ?");
              mysqli_stmt_bind_param($queryRail2,"sdddsdsdddddsdd", $imgrail2, $r2brack75qty, $r2brack100qty, $r2brack150qty, $r2brackother, $r2brackotherqty, $r2side, $r2sideqty, $r2acceswcqty, $r2accescorqty, $r2accesconnqty, $r2accesendcapqty, $r2hr1, $r2hr1qty, $id2);
              mysqli_stmt_execute($queryRail2);
              //confirmQuery($queryRail2); 

        $r3brack75qty = mysqli($_POST['r3brack75qty']);
        $r3acceswcqty = mysqli($_POST['r3acceswcqty']);
        $r3brack100qty = mysqli($_POST['r3brack100qty']);
        $r3accescorqty = mysqli($_POST['r3accescorqty']);
        $r3brack150qty = mysqli($_POST['r3brack150qty']);
        $r3accesconnqty = mysqli($_POST['r3accesconnqty']);
        $r3brackother = mysqli($_POST['r3brackother']);
        $r3brackotherqty = mysqli($_POST['r3brackotherqty']);
        $r3accesendcapqty = mysqli($_POST['r3accesendcapqty']);
        $r3side = mysqli($_POST['r3side1']);
        $r3sideqty = mysqli($_POST['r3side1qty']);
        $r3hr1 = mysqli($_POST['r3hr1']);
        $r3hr1qty = mysqli($_POST['r3hr1qty']);

          $queryRail3 = mysqli_prepare($con,"UPDATE tbl_agentOrders_railing SET shapeImage = ?, bracket75Qty = ?, bracket100Qty = ?, bracket150Qty = ?, bracketOther = ?, bracketOtherQty = ?, sideCover = ?, sideCoverQty = ?, accesWCQty = ?, accesCornerQty = ?, accesConnectorQty = ?, accesEndcapQty = ?, handRail = ?, handRailQty = ? WHERE agentOrdIDRail = ?");
              mysqli_stmt_bind_param($queryRail3,"sdddsdsdddddsdd", $imgrail3, $r3brack75qty, $r3brack100qty, $r3brack150qty, $r3brackother, $r3brackotherqty, $r3side, $r3sideqty, $r3acceswcqty, $r3accescorqty, $r3accesconnqty, $r3accesendcapqty, $r3hr1, $r3hr1qty, $id3);
              mysqli_stmt_execute($queryRail3);
              //confirmQuery($queryRail3);

          logs($_SESSION['id'], $_SESSION['username'], "Updated (railing 2 and 3) and others updated before processing on order: ".$ordercode);

         echo "<script>alert('Railing 2 & Railing 3 updated and others successfully.'); window.location='quotationmenu?source=pend'</script>";
              // echo $ordercode.' |'.$railNo2.' '.$r2hr1.' '.$imgrail2;
          // echo ' ID2: '.$id2.' ID3: '.$id3.' Code: '.$ordercode;


          }
        else{

        $r2brack75qty = mysqli($_POST['r2brack75qty']);
        $r2acceswcqty = mysqli($_POST['r2acceswcqty']);
        $r2brack100qty = mysqli($_POST['r2brack100qty']);
        $r2accescorqty = mysqli($_POST['r2accescorqty']);
        $r2brack150qty = mysqli($_POST['r2brack150qty']);
        $r2accesconnqty = mysqli($_POST['r2accesconnqty']);
        $r2brackother = mysqli($_POST['r2brackother']);
        $r2brackotherqty = mysqli($_POST['r2brackotherqty']);
        $r2accesendcapqty = mysqli($_POST['r2accesendcapqty']);
        $r2side = mysqli($_POST['r2side1']);
        $r2sideqty = mysqli($_POST['r2side1qty']);
        $r2hr1 = mysqli($_POST['r2hr1']);
        $r2hr1qty = mysqli($_POST['r2hr1qty']);
        $railNo2 = 2;


          $queryRail2 = mysqli_prepare($con,"INSERT INTO tbl_agentOrders_railing (agentOrdCodeRail, shapeImage, bracket75Qty, bracket100Qty, bracket150Qty, bracketOther, bracketOtherQty, sideCover, sideCoverQty, accesWCQty, accesCornerQty, accesConnectorQty, accesEndcapQty, handRail, handRailQty, railingNo) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
              mysqli_stmt_bind_param($queryRail2,"dsdddsdsdddddsdd", $ordercode, $imgrail2, $r2brack75qty, $r2brack100qty, $r2brack150qty, $r2brackother, $r2brackotherqty, $r2side, $r2sideqty, $r2acceswcqty, $r2accescorqty, $r2accesconnqty, $r2accesendcapqty, $r2hr1, $r2hr1qty, $railNo2);
              mysqli_stmt_execute($queryRail2);
              //confirmQuery($queryRail2);

              //

        $r3brack75qty = mysqli($_POST['r3brack75qty']);
        $r3acceswcqty = mysqli($_POST['r3acceswcqty']);
        $r3brack100qty = mysqli($_POST['r3brack100qty']);
        $r3accescorqty = mysqli($_POST['r3accescorqty']);
        $r3brack150qty = mysqli($_POST['r3brack150qty']);
        $r3accesconnqty = mysqli($_POST['r3accesconnqty']);
        $r3brackother = mysqli($_POST['r3brackother']);
        $r3brackotherqty = mysqli($_POST['r3brackotherqty']);
        $r3accesendcapqty = mysqli($_POST['r3accesendcapqty']);
        $r3side = mysqli($_POST['r3side1']);
        $r3sideqty = mysqli($_POST['r3side1qty']);
        $r3hr1 = mysqli($_POST['r3hr1']);
        $r3hr1qty = mysqli($_POST['r3hr1qty']);
        $railNo3 = 3;

          $queryRail3 = mysqli_prepare($con,"INSERT INTO tbl_agentOrders_railing (agentOrdCodeRail, shapeImage, bracket75Qty, bracket100Qty, bracket150Qty, bracketOther, bracketOtherQty, sideCover, sideCoverQty, accesWCQty, accesCornerQty, accesConnectorQty, accesEndcapQty, handRail, handRailQty, railingNo) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
              mysqli_stmt_bind_param($queryRail3,"dsdddsdsdddddsdd", $ordercode, $imgrail3, $r3brack75qty, $r3brack100qty, $r3brack150qty, $r3brackother, $r3brackotherqty, $r3side, $r3sideqty, $r3acceswcqty, $r3accescorqty, $r3accesconnqty, $r3accesendcapqty, $r3hr1, $r3hr1qty, $railNo3);
              mysqli_stmt_execute($queryRail3);
              //confirmQuery($queryRail3);

        logs($_SESSION['id'], $_SESSION['username'], "Railing 2 & Railing 3 were added and others updated before processing on order: ".$ordercode);

          echo "<script>alert('Railing 2 & Railing 3 added and others successfully.'); window.location='quotationmenu?source=pend'</script>";
        }
          }
        else if ($imgrail2 != "white.png" && $imgrail3 == "white.png") {

          // Railing 2
          if (empty($id2)) {

        $r2brack75qty = mysqli($_POST['r2brack75qty']);
        $r2acceswcqty = mysqli($_POST['r2acceswcqty']);
        $r2brack100qty = mysqli($_POST['r2brack100qty']);
        $r2accescorqty = mysqli($_POST['r2accescorqty']);
        $r2brack150qty = mysqli($_POST['r2brack150qty']);
        $r2accesconnqty = mysqli($_POST['r2accesconnqty']);
        $r2brackother = mysqli($_POST['r2brackother']);
        $r2brackotherqty = mysqli($_POST['r2brackotherqty']);
        $r2accesendcapqty = mysqli($_POST['r2accesendcapqty']);
        $r2side = mysqli($_POST['r2side1']);
        $r2sideqty = mysqli($_POST['r2side1qty']);
        $r2hr1 = mysqli($_POST['r2hr1']);
        $r2hr1qty = mysqli($_POST['r2hr1qty']);
        $railNo2 = 2;


          $queryRail2 = mysqli_prepare($con,"INSERT INTO tbl_agentOrders_railing (agentOrdCodeRail, shapeImage, bracket75Qty, bracket100Qty, bracket150Qty, bracketOther, bracketOtherQty, sideCover, sideCoverQty, accesWCQty, accesCornerQty, accesConnectorQty, accesEndcapQty, handRail, handRailQty, railingNo) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
              mysqli_stmt_bind_param($queryRail2,"dsdddsdsdddddsdd", $ordercode, $imgrail2, $r2brack75qty, $r2brack100qty, $r2brack150qty, $r2brackother, $r2brackotherqty, $r2side, $r2sideqty, $r2acceswcqty, $r2accescorqty, $r2accesconnqty, $r2accesendcapqty, $r2hr1, $r2hr1qty, $railNo2);
              mysqli_stmt_execute($queryRail2);
              //confirmQuery($queryRail2);

          logs($_SESSION['id'], $_SESSION['username'], "Added (railing 2) and others updated before processing on order: ".$ordercode);

          echo "<script>alert('Railing 2 added and others updated successfully.'); window.location='quotationmenu?source=pend'</script>";
          // echo $ordercode.' |'.$railNo2.' '.$r2hr1.' '.$imgrail2;
          // echo 'ID1: '.$id1.' ID2: '.$id2.' ID:'.$id3.' Code'.$ordercode;

          }
        else{

          $r2brack75qty = mysqli($_POST['r2brack75qty']);
          $r2acceswcqty = mysqli($_POST['r2acceswcqty']);
          $r2brack100qty = mysqli($_POST['r2brack100qty']);
          $r2accescorqty = mysqli($_POST['r2accescorqty']);
          $r2brack150qty = mysqli($_POST['r2brack150qty']);
          $r2accesconnqty = mysqli($_POST['r2accesconnqty']);
          $r2brackother = mysqli($_POST['r2brackother']);
          $r2brackotherqty = mysqli($_POST['r2brackotherqty']);
          $r2accesendcapqty = mysqli($_POST['r2accesendcapqty']);
          $r2side = mysqli($_POST['r2side1']);
          $r2sideqty = mysqli($_POST['r2side1qty']);
          $r2hr1 = mysqli($_POST['r2hr1']);
          $r2hr1qty = mysqli($_POST['r2hr1qty']);


            $queryRail2 = mysqli_prepare($con,"UPDATE tbl_agentOrders_railing SET shapeImage = ?, bracket75Qty = ?, bracket100Qty = ?, bracket150Qty = ?, bracketOther = ?, bracketOtherQty = ?, sideCover = ?, sideCoverQty = ?, accesWCQty = ?, accesCornerQty = ?, accesConnectorQty = ?, accesEndcapQty = ?, handRail = ?, handRailQty = ? WHERE agentOrdIDRail = ?");
                mysqli_stmt_bind_param($queryRail2,"sdddsdsdddddsdd", $imgrail2, $r2brack75qty, $r2brack100qty, $r2brack150qty, $r2brackother, $r2brackotherqty, $r2side, $r2sideqty, $r2acceswcqty, $r2accescorqty, $r2accesconnqty, $r2accesendcapqty, $r2hr1, $r2hr1qty, $id2);
                mysqli_stmt_execute($queryRail2);
                //confirmQuery($queryRail2);

                logs($_SESSION['id'], $_SESSION['username'], "Updated (railing 2) and others updated before processing on order: ".$ordercode);

              echo "<script>alert(' Railing 2 and others updated successfully.'); window.location='quotationmenu?source=pend'</script>";
        }

      }

    else if ($imgrail2 == "white.png" && $imgrail3 != "white.png") {

        // Railing 3

        if (empty($id3)) {

        $r3brack75qty = mysqli($_POST['r3brack75qty']);
      $r3acceswcqty = mysqli($_POST['r3acceswcqty']);
      $r3brack100qty = mysqli($_POST['r3brack100qty']);
      $r3accescorqty = mysqli($_POST['r3accescorqty']);
      $r3brack150qty = mysqli($_POST['r3brack150qty']);
      $r3accesconnqty = mysqli($_POST['r3accesconnqty']);
      $r3brackother = mysqli($_POST['r3brackother']);
      $r3brackotherqty = mysqli($_POST['r3brackotherqty']);
      $r3accesendcapqty = mysqli($_POST['r3accesendcapqty']);
      $r3side = mysqli($_POST['r3side1']);
      $r3sideqty = mysqli($_POST['r3side1qty']);
      $r3hr1 = mysqli($_POST['r3hr1']);
      $r3hr1qty = mysqli($_POST['r3hr1qty']);
      $railNo3 = 3;

        $queryRail3 = mysqli_prepare($con,"INSERT INTO tbl_agentOrders_railing (agentOrdCodeRail, shapeImage, bracket75Qty, bracket100Qty, bracket150Qty, bracketOther, bracketOtherQty, sideCover, sideCoverQty, accesWCQty, accesCornerQty, accesConnectorQty, accesEndcapQty, handRail, handRailQty, railingNo) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            mysqli_stmt_bind_param($queryRail3,"dsdddsdsdddddsdd", $ordercode, $imgrail3, $r3brack75qty, $r3brack100qty, $r3brack150qty, $r3brackother, $r3brackotherqty, $r3side, $r3sideqty, $r3acceswcqty, $r3accescorqty, $r3accesconnqty, $r3accesendcapqty, $r3hr1, $r3hr1qty, $railNo3);
            mysqli_stmt_execute($queryRail3);
            //confirmQuery($queryRail3);

        logs($_SESSION['id'], $_SESSION['username'], "Added (railing 3) and others updated before processing on order: ".$ordercode);

        echo "<script>alert('Railing 3 added and others updated successfully.'); window.location='quotationmenu?source=pend'</script>";

        }
      else{

        $r3brack75qty = mysqli($_POST['r3brack75qty']);
        $r3acceswcqty = mysqli($_POST['r3acceswcqty']);
        $r3brack100qty = mysqli($_POST['r3brack100qty']);
        $r3accescorqty = mysqli($_POST['r3accescorqty']);
        $r3brack150qty = mysqli($_POST['r3brack150qty']);
        $r3accesconnqty = mysqli($_POST['r3accesconnqty']);
        $r3brackother = mysqli($_POST['r3brackother']);
        $r3brackotherqty = mysqli($_POST['r3brackotherqty']);
        $r3accesendcapqty = mysqli($_POST['r3accesendcapqty']);
        $r3side = mysqli($_POST['r3side1']);
        $r3sideqty = mysqli($_POST['r3side1qty']);
        $r3hr1 = mysqli($_POST['r3hr1']);
        $r3hr1qty = mysqli($_POST['r3hr1qty']);

          $queryRail3 = mysqli_prepare($con,"UPDATE tbl_agentOrders_railing SET shapeImage = ?, bracket75Qty = ?, bracket100Qty = ?, bracket150Qty = ?, bracketOther = ?, bracketOtherQty = ?, sideCover = ?, sideCoverQty = ?, accesWCQty = ?, accesCornerQty = ?, accesConnectorQty = ?, accesEndcapQty = ?, handRail = ?, handRailQty = ? WHERE agentOrdIDRail = ?");
              mysqli_stmt_bind_param($queryRail3,"sdddsdsdddddsdd", $imgrail3, $r3brack75qty, $r3brack100qty, $r3brack150qty, $r3brackother, $r3brackotherqty, $r3side, $r3sideqty, $r3acceswcqty, $r3accescorqty, $r3accesconnqty, $r3accesendcapqty, $r3hr1, $r3hr1qty, $id3);
              mysqli_stmt_execute($queryRail3);
              //confirmQuery($queryRail3);

          logs($_SESSION['id'], $_SESSION['username'], "Updated (railing 3) and others updated before processing on order: ".$ordercode);

          echo "<script>alert(' Railing 3 and others successfully updated.'); window.location='quotationmenu?source=pend'</script>";
      }
    }

      else{

        logs($_SESSION['id'], $_SESSION['username'], "Updated (raailing 1) and others updated before processing on order: ".$ordercode);

          echo "<script>alert(' Railing 1 and others updated successfully.'); window.location='quotationmenu?source=pend'</script>";
      }

    }
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

<?php //include "include/admin_navigation.php"
    logs($_SESSION['id'], $_SESSION['username'], "View pending order: ".$code);
 ?>
<!-- <div id="page-wrapper"> -->

            <!-- <div class="container-fluid"> -->

                <!-- Page Heading -->
                <!-- <div class="row"> -->
                    <!-- <div class="col-lg-12"> -->
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
<form action="" method="POST" enctype="multipart/form-data" id="fset0">
  
  <!-- <div id="page-wrapper">

    <div class="container-fluid"> -->
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
        <input type="number" hidden value="<?php echo $custcode;?>" name="custcode">
        <td><input class="td1" type="text" name="party_name" value="<?php echo $party;?>" required="" placeholder="Enter party name"></td>
        <td>Date</td> 
        <td colspan="2"><input style="width: 100%;" value="<?php echo $date;?>" type="text" name="date" readonly></td>
      </tr>

      <tr>
        <td>Billing Name</td>
        <td><input class="td1" type="text" value="<?php echo $bilname;?>" required name="billing_name" placeholder="Enter billing name"></td>
        <td>Place</td>
        <td colspan="2"><input style="width: 100%;" value="<?php echo $place;?>" type="text" required="" name="place" placeholder="Enter place"></td>
      </tr>

      <tr>
        <td>Billing Address</td>
          <!-- <td><input class="td1" type="text" required name="billing_address" placeholder="Enter billing address"> -->
        <td rowspan="2">
          <textarea type="text" required name="billing_address" class="td1" rows="3" cols="20" placeholder="Billing address"><?php echo $biladres;?></textarea>
        </td>
        <td>Glass</td>
        <td colspan="2">
        <input type="number" hidden value="<?php echo $code;?>" name="ordercode">

        <select type="text" class="form-control" required id="glasstype" name="glasstype" onchange="populate(this.id,'glassize1'); populate2('glassize1', 'glassize2')">
          <option value="<?php echo $glasstype; ?>"><?php echo $glasstype; ?></option>
          <option value='TOUGHENED'>TOUGHENED</option>
          <option value="LAMINATED">LAMINATED</option>
        </select></td>
      </tr>
        <tr><td></td>
        <td>Size</td><td colspan="2">
        <select type="text" class="form-control" required name="glassize1" id="glassize1" onchange="populate2(this.id,'glassize2')">  
          <option value="<?php echo $gsize1; ?>"><?php echo $gsize1; ?></option>

        </select></td>
      </tr>
      <tr>
        <td>Approx. RFT </td>
        <td><input class="td1" type="number" name="apoxrft" value="<?php echo $apoxrft;?>"></td>
        <td>Size</td><td colspan="2">
        <select type="text" class="form-control"  name="glassize2" id="glassize2">
          <option value="<?php echo $gsize2; ?>"><?php echo $gsize2; ?></option>

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
              <option value="<?php echo $proname; ?>"><?php echo $proname; ?></option>

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
              <option value="<?php echo $protype; ?>"><?php echo $protype; ?></option>

              
            </select>
          </td>
          <td>
            <select name="product_cover" id="product_cover" type="text" class="form-control" >
              <option value="<?php echo $procover; ?>"><?php echo $procover; ?></option>
              
            </select>
            <!-- <option value="0">Select product cover</option>
              <option value="SIDE COVER">SIDE COVER</option>
              <option value="FULL/BRACKET WISE">FULL/BRACKET WISE</option> -->
          </td>
          <td>
            <select required name="hand_rail" type="text" class="form-control">

              <option value="<?php echo $hrail; ?>"><?php echo $hrail; ?></option>

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
              <option value="<?php echo $procolor; ?>"><?php echo $procolor; ?></option>

              <option value="ANODISED">ANODISED</option>
              <option value="PVDF">PVDF</option>
              <option value="WOODEN">WOODEN</option>
              <option value="MILL FINISH">MILL FINISH</option>
              <option value="POWDER COATING">POWDER COATING</option>
            </select></td>

          <td colspan="4">
            <select type="text" class="form-control" name="colors" id="colors">

              <option value="<?php echo $color; ?>"><?php echo $color; ?></option>

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
          <?php 
          $img1 = '';
          $imgname1 = '';

            $rail1 = 1;
            $queryr1 = mysqli_prepare($con,"SELECT * FROM tbl_agentOrders_railing where agentOrdCodeRail = ? and  railingNo = ?");
            mysqli_stmt_bind_param($queryr1,"dd", $code, $rail1);
            mysqli_stmt_execute($queryr1);

            //confirmQuery($queryr1);
            $resultr1 = mysqli_stmt_get_result($queryr1);

            while($row = mysqli_fetch_array($resultr1))
            {

              $bra75qty1 = $row['bracket75Qty'];
              $bra100qty1 = $row['bracket100Qty'];
              $bra150qty1 = $row['bracket150Qty'];
              $braother1 = $row['bracketOther'];
              $braotherqty1 = $row['bracketOtherQty'];
              $sidecover1 = $row['sideCover'];
              $sidecoverqty1 = $row['sideCoverQty'];
              $accewc1 = $row['accesWCQty'];
              $accecover1 = $row['accesCornerQty'];
              $acceconn1 = $row['accesConnectorQty'];
              $accend1 = $row['accesEndcapQty'];
              $hr1 = $row['handRail'];
              $hrqty1 = $row['handRailQty'];
              $img1 = $row['shapeImage'];
              $id1 = $row['agentOrdIDRail'];
            }

            if ($img1 == "sline2.png") {
                $imgname1 = "Straight";
              }
              else if ($img1 == "ctype2.png") {
                  $imgname1 = "C - Type";
              }
              else if ($img1 == "lshape.png") {
                  $imgname1 = "L Shape";
              }
            else{
                  $imgname1 = "Select shape";

            }
          ?>
          <td width="100%" rowspan="11">
          <input type="number" hidden value="<?php echo $id1;?>" name="id1">

            <select name="imgrail1" class="form-control" style="color: blue;" onchange="changeimg('imgids','images',this.value)">

              <option value="<?php echo $img1; ?>"><?php echo $imgname1; ?></option>
              <option value="sline2.png">Straight</option>
              <option value="ctype2.png">C - Type</option>
              <option value="lshape.png">L Shape</option>
            </select><br><br><br>
            <img style="width: 70%; height: 65%;" src="../resources/images/<?php echo $img1;?>" id="imgids">
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
          <td style="width: 60px;"><input style="width: 60px;" type="number" value="<?php echo $bra75qty1;?>" name="r1brack75qty"></td>
          <td>W/C</td>
          <td style="width: 60px;"><input style="width: 60px;" type="number" value="<?php echo $accewc1;?>" name="r1acceswcqty"></td>
        </tr>

      <tr>
        <td width="600"></td><td>100</td><td style="width: 60px;"><input type="number" value="<?php echo $bra100qty1;?>" name="r1brack100qty" style="width: 60px;"></td>
        <td>Corner</td>
        <td style="width: 60px;"><input type="number" name="r1accescorqty" value="<?php echo $accecover1;?>" style="width: 60px;"></td>
      </tr>

      <tr>
        <td width="600"></td>
        <td>150</td>
        <td style="width: 60px;"><input type="number" name="r1brack150qty" value="<?php echo $bra150qty1;?>" style="width: 60px;"></td><td>Connector</td>
        <td style="width: 60px;"><input type="number" name="r1accesconnqty" value="<?php echo $acceconn1; ?>" style="width: 60px;"></td>
      </tr>

      <tr>
        <td width="600"></td>
        <td><input type="text" name="r1brackother" value="<?php echo $braother1;?>" style="width: 173px;"></td>
        <td style="width: 60px;"><input type="number" name="r1brackotherqty" value="<?php echo $braotherqty1;?>" style="width: 60px;"></td>
        <td>End Cap B/H</td>
        <td style="width: 60px;"><input type="number" name="r1accesendcapqty" value="<?php echo $accend1;?>" style="width: 60px;"></td>
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
        <td><select type="text" required name="r1side1">
          <option value="<?php echo $sidecover1; ?>"><?php echo $sidecover1; ?></option>
          <option value="FULL SIDE COVER">FULL SIDE COVER</option>
          <option value="BRACKET WISE">BRACKET WISE</option>
        </select></td>
        <td style="width: 60px;"><input style="width: 60px;" type="number" value="<?php echo $sidecoverqty1; ?>" name="r1side1qty"></td>
        <td style="width: 60px;"><select required style="width: 90px;" type="text" name="r1hr1">
              <option value="<?php echo $hr1; ?>"><?php echo $hr1; ?></option>
              <option value="ROUND HAND RAIL">ROUND</option>
              <option value="SQUARE HAND RAIL">SQUARE</option>
              <option value="SMALL HAND RAIL">SMALL</option>
              <option value="SLIM HAND RAIL">SLIM</option>
              <option value="EDGE GUARD HAND RAIL">EDGE GUARD</option>
              <option value="HALF ROUND HAND RAIL">HALF ROUND</option>
              <option value="RECTANGLE HAND RAIL">RECTANGLE</option>
              <option value="INCLINE HAND RAIL">INCLINE</option>
        </select></td>
        <td style="width: 60px;"><input style="width: 60px;" type="number" value="<?php echo $hrqty1; ?>" name="r1hr1qty"></td>
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

          <?php 
          $imgname2 = '';
          $img2 = '';
          $hr2 = '';
          $opt = '';

            $rail2 = 2;
            $queryr2 = mysqli_prepare($con,"SELECT * FROM tbl_agentOrders_railing where agentOrdCodeRail = ? and  railingNo = ?");
            mysqli_stmt_bind_param($queryr2,"dd", $code, $rail2);
            mysqli_stmt_execute($queryr2);

            //confirmQuery($queryr2);
            $resultr2 = mysqli_stmt_get_result($queryr2);

            while($row = mysqli_fetch_array($resultr2))
            {

              $bra75qty2 = $row['bracket75Qty'];
              $bra100qty2 = $row['bracket100Qty'];
              $bra150qty2 = $row['bracket150Qty'];
              $braother2 = $row['bracketOther'];
              $braotherqty2 = $row['bracketOtherQty'];
              $sidecover2 = $row['sideCover'];
              $sidecoverqty2 = $row['sideCoverQty'];
              $accewc2 = $row['accesWCQty'];
              $accecover2 = $row['accesCornerQty'];
              $acceconn2 = $row['accesConnectorQty'];
              $accend2 = $row['accesEndcapQty'];
              $hr2 = $row['handRail'];
              $hrqty2 = $row['handRailQty'];
              $img2 = $row['shapeImage'];
              $id2 = $row['agentOrdIDRail'];  


              
            }


              if ($img2 == "sline2.png") {
                $imgname2 = "Straight";
                $img2 = "sline2.png";
              }
              else if ($img2 == "ctype2.png") {
                  $imgname2 = "C - Type";
                  $img2 = "ctype2.png";

              }
              else if ($img2 == "lshape.png") {
                  $imgname2 = "L Shape";
                  $img2 = "lshape.png";

              }
              else{
                  $imgname2 = "Select shape";
                  $img2 = "white.png";

            }

            if ($hr2 == "") {

              $opt = "Select hand rail";

            }

            if (@$sidecover2 == "") {
                
                @$optsid = "Select side cover";
            }

          ?>
          <td width="100%" rowspan="11">
          <input type="number" hidden value="<?php echo @$id2;?>" name="id2">
            <select name="imgrail2" class="form-control" style="color: blue;" onchange="changeimg2('imgids','images',this.value)">
              <option value="<?php echo $img2; ?>"><?php echo $imgname2; ?></option>
              <option value="sline2.png">Streight</option>
              <option value="ctype2.png">C - Type</option>
              <option value="lshape.png">L Shape</option>
            </select><br><br><br>
            <img style="width: 70%; height: 65%;" src="../resources/images/<?php echo $img2; ?>" id="imgids2">
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
          <td style="width: 60px;"><input style="width: 60px;" value="<?php echo @$bra75qty2; ?>" type="number" name="r2brack75qty"></td>
          <td>W/C</td>
          <td style="width: 60px;"><input style="width: 60px;" type="number" value="<?php echo @$accewc2; ?>" name="r2acceswcqty"></td>
        </tr>

      <tr>
        <td width="600"></td><td>100</td><td style="width: 60px;"><input type="number" value="<?php echo @$bra100qty2; ?>" name="r2brack100qty" style="width: 60px;"></td>
        <td>Corner</td>
        <td style="width: 60px;"><input type="number" value="<?php echo @$accecover2; ?>" name="r2accescorqty" style="width: 60px;"></td>
      </tr>

      <tr>
        <td width="600"></td>
        <td>150</td>
        <td style="width: 60px;"><input type="number" value="<?php echo @$bra150qty2; ?>" name="r2brack150qty" style="width: 60px;"></td><td>Connector</td>
        <td style="width: 60px;"><input type="number" value="<?php echo @$acceconn2; ?>" name="r2accesconnqty" style="width: 60px;"></td>
      </tr>

      <tr>
        <td width="600"></td>
        <td><input type="text" value="<?php echo @$braother2; ?>" name="r2brackother" style="width: 173px;"></td>
        <td style="width: 60px;"><input type="number" value="<?php echo @$braotherqty2; ?>" name="r2brackotherqty" style="width: 60px;"></td>
        <td>End Cap B/H</td>
        <td style="width: 60px;"><input type="number" value="<?php echo @$accend2; ?>" name="r2accesendcapqty" style="width: 60px;"></td>
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
          <option value="<?php echo @$sidecover2; ?>"><?php echo @$sidecover2.@$optsid; ?></option>
          <option value="FULL SIDE COVER">FULL SIDE COVER</option>
          <option value="BRACKET WISE">BRACKET WISE</option>
        </select></td>
        <td style="width: 60px;"><input style="width: 60px;" value="<?php echo @$sidecoverqty2; ?>" type="number" name="r2side1qty"></td>
        <td style="width: 60px;"><select style="width: 90px;" type="text" name="r2hr1">
              <option value="<?php echo @$hr2; ?>"><?php echo @$hr2.@$opt; ?></option>
              <option value="ROUND HAND RAIL">ROUND</option>
              <option value="SQUARE HAND RAIL">SQUARE</option>
              <option value="SMALL HAND RAIL">SMALL</option>
              <option value="SLIM HAND RAIL">SLIM</option>
              <option value="EDGE GUARD HAND RAIL">EDGE GUARD</option>
              <option value="HALF ROUND HAND RAIL">HALF ROUND</option>
              <option value="RECTANGLE HAND RAIL">RECTANGLE</option>
              <option value="INCLINE HAND RAIL">INCLINE</option>
        </select></td><td style="width: 60px;"><input style="width: 60px;" value="<?php echo @$hrqty2; ?>" type="number" name="r2hr1qty"></td>
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
          <?php 
          $imgname3 = '';
          $img3 = '';
          $hr3 = '';
          $opt3 = '';

            $rail3 = 3;
            $queryr3 = mysqli_prepare($con,"SELECT * FROM tbl_agentOrders_railing where agentOrdCodeRail = ? and  railingNo = ?");
            mysqli_stmt_bind_param($queryr3,"dd", $code, $rail3);
            mysqli_stmt_execute($queryr3);

            //confirmQuery($queryr3);
            $resultr3 = mysqli_stmt_get_result($queryr3);

            while($row = mysqli_fetch_array($resultr3))
            {

              $bra75qty3 = $row['bracket75Qty'];
              $bra100qty3 = $row['bracket100Qty'];
              $bra150qty3 = $row['bracket150Qty'];
              $braother3 = $row['bracketOther'];
              $braotherqty3 = $row['bracketOtherQty'];
              $sidecover3 = $row['sideCover'];
              $sidecoverqty3 = $row['sideCoverQty'];
              $accewc3 = $row['accesWCQty'];
              $accecover3 = $row['accesCornerQty'];
              $acceconn3 = $row['accesConnectorQty'];
              $accend3 = $row['accesEndcapQty'];
              $hr3 = $row['handRail'];
              $hrqty3 = $row['handRailQty'];
              $img3 = $row['shapeImage'];
              $id3 = $row['agentOrdIDRail'];  
            

              
            }


              if ($img3 == "sline2.png") {
                $imgname3 = "Straight";
                $img3 = "sline2.png";
              }
              else if ($img3 == "ctype2.png") {
                  $imgname3 = "C - Type";
                  $img3 = "ctype2.png";

              }
              else if ($img3 == "lshape.png") {
                  $imgname3 = "L Shape";
                  $img3 = "lshape.png";

              }
              else{
                  $imgname3 = "Select shape";
                  $img3 = "white.png";

            }

            if ($hr3 == "") {

              $opt3 = "Select hand rail";

            }

            if (@$sidecover3 == "") {
                
                @$optsid3 = "Select side cover";
            }

          ?>
          <td width="100%" rowspan="11">
            <input type="number" hidden value="<?php echo @$id3;?>" name="id3">
            <select name="imgrail3" class="form-control" style="color: blue;" onchange="changeimg3('imgids3','images',this.value)">
              <option value="<?php echo @$img3;?>"> <?php echo $imgname3 ?></option>
              <option value="sline2.png">Streight</option>
              <option value="ctype2.png">C - Type</option>
              <option value="lshape.png">L Shape</option>
            </select><br><br><br>
            <img style="width: 70%; height: 65%;" src="../resources/images/<?php echo $img3;?>" id="imgids3">
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
          <td style="width: 60px;"><input style="width: 60px;" value="<?php echo @$bra75qty3;?>" type="number" name="r3brack75qty"></td>
          <td>W/C</td>
          <td style="width: 60px;"><input style="width: 60px;" type="number" value="<?php echo @$accewc3;?>" name="r3acceswcqty"></td>
        </tr>

      <tr>
        <td width="600"></td><td>100</td><td style="width: 60px;"><input type="number" value="<?php echo @$bra100qty3;?>" name="r3brack100qty" style="width: 60px;"></td>
        <td>Corner</td>
        <td style="width: 60px;"><input type="number" name="r3accescorqty" value="<?php echo @$accecover3;?>" style="width: 60px;"></td>
      </tr>

      <tr>
        <td width="600"></td>
        <td>150</td>
        <td style="width: 60px;"><input type="number" value="<?php echo @$bra150qty3;?>" name="r3brack150qty" style="width: 60px;"></td><td>Connector</td>
        <td style="width: 60px;"><input type="number" value="<?php echo @$acceconn3;?>" name="r3accesconnqty" style="width: 60px;"></td>
      </tr>

      <tr>
        <td width="600"></td>
        <td><input type="text" value="<?php echo @$braother3;?>" name="r3brackother" style="width: 173px;"></td>
        <td style="width: 60px;"><input type="number" value="<?php echo @$braotherqty3;?>" name="r3brackotherqty" style="width: 60px;"></td>
        <td>End Cap B/H</td>
        <td style="width: 60px;"><input type="number" value="<?php echo @$accend3;?>" name="r3accesendcapqty" style="width: 60px;"></td>
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
          <option value="<?php echo @$sidecover3;?>"><?php echo @$optsid3.@$sidecover3;?></option>
          <option value="FULL SIDE COVER">FULL SIDE COVER</option>
          <option value="BRACKET WISE">BRACKET WISE</option>
        </select></td>
        <td style="width: 60px;"><input style="width: 60px;" value="<?php echo @$sidecoverqty3;?>" type="number" name="r3side1qty"></td>
        <td style="width: 60px;"><select style="width: 90px;" type="text" name="r3hr1">
              <option value="<?php echo @$hr3;?>"><?php echo @$hr3.@$opt3;?></option>              
              <option value="ROUND HAND RAIL">ROUND</option>
              <option value="SQUARE HAND RAIL">SQUARE</option>
              <option value="SMALL HAND RAIL">SMALL</option>
              <option value="SLIM HAND RAIL">SLIM</option>
              <option value="EDGE GUARD HAND RAIL">EDGE GUARD</option>
              <option value="HALF ROUND HAND RAIL">HALF ROUND</option>
              <option value="RECTANGLE HAND RAIL">RECTANGLE</option>
              <option value="INCLINE HAND RAIL">INCLINE</option>
        </select></td><td style="width: 60px;"><input style="width: 60px;" value="<?php echo @$hrqty3;?>" type="number" name="r3hr1qty"></td>
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
    <input type="submit" class="btn btn-success btn-lg btn-block" onclick="javascript: return confirm('If all inputs are OKAY and Railing is OKAY click OK else cancel');" name="update" value="Update">
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