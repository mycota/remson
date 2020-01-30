<?php
include "include/admin_header.php";

	if (isset($_POST['update'])) {
        //$agentCode = time(); 
        $id2 = $_POST['id2'];
	    $id3 = $_POST['id3'];
		$imgrail2 = $_POST['imgrail2'];
		$imgrail3 = $_POST['imgrail3'];
		$custcode = $_POST['custcode'];
		$partyName = mysqli($_POST['party_name']);
	    $billingName = mysqli($_POST['billing_name']);
	    $place = mysqli($_POST['place']);
		$billingAddress = mysqli($_POST['billing_address']);
		$agent = $_SESSION['id'];
		
			$queryCust = mysqli_prepare($con,"UPDATE tbl_agent_customer SET partyName = ?, billingName = ?, place = ?, billingAddress = ? WHERE agentCust_ID = ?");
	        mysqli_stmt_bind_param($queryCust,"ssssd", $agent, $partyName, $billingName, $place,$billingAddress, $custcode);
	        mysqli_stmt_execute($queryCust);
	      	confirmQuery($queryCust);

      		$last_id = mysqli_insert_id($con);


      	$ordercode = mysqli($_POST['ordercode']);
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
	      	confirmQuery($queryOrder);

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

			$queryRail1 = mysqli_prepare($con,"UPDATE tbl_agentOrders_railing SET shapeImage = ?, bracket75Qty = ?, bracket100Qty = ?, bracket150Qty = ?, bracketOther = ?, bracketOtherQty = ?, sideCover = ?, sideCoverQty = ?, accesWCQty = ?, accesCornerQty = ?, accesConnectorQty = ?, accesEndcapQty = ?, handRail = ?, handRailQty = ? WHERE agentOrdCodeRail = ?");
	        mysqli_stmt_bind_param($queryRail1,"sdddsdsdddddsdd", $imgrail1, $r1brack75qty, $r1brack100qty, $r1brack150qty, $r1brackother, $r1brackotherqty, $r1side, $r1sideqty, $r1acceswcqty, $r1accescorqty, $r1accesconnqty, $r1accesendcapqty, $r1hr1, $r1hr1qty,$id1);
	        mysqli_stmt_execute($queryRail1);
	      	confirmQuery($queryRail1);
        
		
	    if ($imgrail2 != "white.png" && $imgrail3 != "white.png") {

	    	// Railing 2
	    	if (is_null($id2) && is_null($id3)) {
		    	// Railing 2
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
			        mysqli_stmt_bind_param($queryRail2,"dsdddsdsdddddsdd", $orderCode, $imgrail2, $r2brack75qty, $r2brack100qty, $r2brack150qty, $r2brackother, $r2brackotherqty, $r2side, $r2sideqty, $r2acceswcqty, $r2accescorqty, $r2accesconnqty, $r2accesendcapqty, $r2hr1, $r2hr1qty, $railNo2);
			        mysqli_stmt_execute($queryRail2);
			      	confirmQuery($queryRail2);

			    // Railing 3
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
			        mysqli_stmt_bind_param($queryRail3,"dsdddsdsdddddsdd", $orderCode, $imgrail3, $r3brack75qty, $r3brack100qty, $r3brack150qty, $r3brackother, $r3brackotherqty, $r3side, $r3sideqty, $r3acceswcqty, $r3accescorqty, $r3accesconnqty, $r3accesendcapqty, $r3hr1, $r3hr1qty, $railNo3);
			        mysqli_stmt_execute($queryRail3);
			      	confirmQuery($queryRail3);

			    logs($_SESSION['id'], $_SESSION['username'], "Agent place order for processing.");

	      		echo "<script>alert('Orders updated successfully placed wait for further processing.'); window.location='quotationmenu?source=quots'</script>";
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


					$queryRail2 = mysqli_prepare($con,"UPDATE tbl_agentOrders_railing SET shapeImage = ?, bracket75Qty = ?, bracket100Qty = ?, bracket150Qty = ?, bracketOther = ?, bracketOtherQty = ?, sideCover = ?, sideCoverQty = ?, accesWCQty = ?, accesCornerQty = ?, accesConnectorQty = ?, accesEndcapQty = ?, handRail = ?, handRailQty = ? WHERE agentOrdCodeRail = ?");
			        mysqli_stmt_bind_param($queryRail2,"sdddsdsdddddsdd", $imgrail2, $r2brack75qty, $r2brack100qty, $r2brack150qty, $r2brackother, $r2brackotherqty, $r2side, $r2sideqty, $r2acceswcqty, $r2accescorqty, $r2accesconnqty, $r2accesendcapqty, $r2hr1, $r2hr1qty, $id2);
			        mysqli_stmt_execute($queryRail2);
			      	confirmQuery($queryRail2);

			    // Railing 3
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

					$queryRail3 = mysqli_prepare($con,"UPDATE tbl_agentOrders_railing SET shapeImage = ?, bracket75Qty = ?, bracket100Qty = ?, bracket150Qty = ?, bracketOther = ?, bracketOtherQty = ?, sideCover = ?, sideCoverQty = ?, accesWCQty = ?, accesCornerQty = ?, accesConnectorQty = ?, accesEndcapQty = ?, handRail = ?, handRailQty = ? WHERE agentOrdCodeRail = ?");
			        mysqli_stmt_bind_param($queryRail3,"sdddsdsdddddsdd", $imgrail3, $r3brack75qty, $r3brack100qty, $r3brack150qty, $r3brackother, $r3brackotherqty, $r3side, $r3sideqty, $r3acceswcqty, $r3accescorqty, $r3accesconnqty, $r3accesendcapqty, $r3hr1, $r3hr1qty, $id3);
			        mysqli_stmt_execute($queryRail3);
			      	confirmQuery($queryRail3);

			    logs($_SESSION['id'], $_SESSION['username'], "Admin updated client order for before processing it.");

	      		echo "<script>alert('Orders successfully updated.'); window.location='quotationmenu?source=quots'</script>";
		    	
		    		}
	    		}
	    	else if ($imgrail2 != "white.png" && $imgrail2 == "white.png") {

		    	// Railing 2
		    	if (is_null($id2) && !is_null($id3)) {

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
			        mysqli_stmt_bind_param($queryRail2,"dsdddsdsdddddsdd", $orderCode, $imgrail2, $r2brack75qty, $r2brack100qty, $r2brack150qty, $r2brackother, $r2brackotherqty, $r2side, $r2sideqty, $r2acceswcqty, $r2accescorqty, $r2accesconnqty, $r2accesendcapqty, $r2hr1, $r2hr1qty, $railNo2);
			        mysqli_stmt_execute($queryRail2);
			      	confirmQuery($queryRail2);

			    logs($_SESSION['id'], $_SESSION['username'], "Agent place order for processing.");

	      		echo "<script>alert('Orders updated successfully placed wait for further processing.'); window.location='quotationmenu?source=quots'</script>";
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


						$queryRail2 = mysqli_prepare($con,"UPDATE tbl_agentOrders_railing SET shapeImage = ?, bracket75Qty = ?, bracket100Qty = ?, bracket150Qty = ?, bracketOther = ?, bracketOtherQty = ?, sideCover = ?, sideCoverQty = ?, accesWCQty = ?, accesCornerQty = ?, accesConnectorQty = ?, accesEndcapQty = ?, handRail = ?, handRailQty = ? WHERE agentOrdCodeRail = ?");
				        mysqli_stmt_bind_param($queryRail2,"sdddsdsdddddsdd", $imgrail2, $r2brack75qty, $r2brack100qty, $r2brack150qty, $r2brackother, $r2brackotherqty, $r2side, $r2sideqty, $r2acceswcqty, $r2accescorqty, $r2accesconnqty, $r2accesendcapqty, $r2hr1, $r2hr1qty, $id2);
				        mysqli_stmt_execute($queryRail2);
				      	confirmQuery($queryRail2);

				      	logs($_SESSION['id'], $_SESSION['username'], "Agent place order for processing.");

	      				echo "<script>alert('Orders updated successfully placed wait for further processing.'); window.location='quotationmenu?source=quots'</script>";
				}

			}

		else if ($imgrail2 == "white.png" && $imgrail2 != "white.png") {

	    	// Railing 3

		   	if (!is_null($id2) && is_null($id3)) {

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
		        mysqli_stmt_bind_param($queryRail3,"dsdddsdsdddddsdd", $orderCode, $imgrail3, $r3brack75qty, $r3brack100qty, $r3brack150qty, $r3brackother, $r3brackotherqty, $r3side, $r3sideqty, $r3acceswcqty, $r3accescorqty, $r3accesconnqty, $r3accesendcapqty, $r3hr1, $r3hr1qty, $railNo3);
		        mysqli_stmt_execute($queryRail3);
		      	confirmQuery($queryRail3);

		    logs($_SESSION['id'], $_SESSION['username'], "Agent place order for processing.");

      		echo "<script>alert('Orders updated successfully placed wait for further processing.'); window.location='quotationmenu?source=quots'</script>";

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

					$queryRail3 = mysqli_prepare($con,"UPDATE tbl_agentOrders_railing SET shapeImage = ?, bracket75Qty = ?, bracket100Qty = ?, bracket150Qty = ?, bracketOther = ?, bracketOtherQty = ?, sideCover = ?, sideCoverQty = ?, accesWCQty = ?, accesCornerQty = ?, accesConnectorQty = ?, accesEndcapQty = ?, handRail = ?, handRailQty = ? WHERE agentOrdCodeRail = ?");
			        mysqli_stmt_bind_param($queryRail3,"sdddsdsdddddsdd", $imgrail3, $r3brack75qty, $r3brack100qty, $r3brack150qty, $r3brackother, $r3brackotherqty, $r3side, $r3sideqty, $r3acceswcqty, $r3accescorqty, $r3accesconnqty, $r3accesendcapqty, $r3hr1, $r3hr1qty, $id3);
			        mysqli_stmt_execute($queryRail3);
			      	confirmQuery($queryRail3);

			    logs($_SESSION['id'], $_SESSION['username'], "Admin updated client order for before processing it.");

	      		echo "<script>alert('Orders successfully updated.'); window.location='quotationmenu?source=quots'</script>";
			}
		}

			else{

				logs($_SESSION['id'], $_SESSION['username'], "Admin updated client order for before processing it.");

      		echo "<script>alert('ONLY ONE RAILING was updated successfully.'); window.location='quotationmenu?source=quots'</script>";
			}

		}
 ?>