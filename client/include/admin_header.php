<?php ob_start(); ?>
<?php include "../resources/db_funct/db.php"; 
      include "../resources/db_funct/function.php";  
      session_start();
      //session_regenerate_id(true);
      if (!isset($_SESSION['username'])) {
        header("Location: ../../logout.php");         

        if(!isset($_SESSION['role'])){
          header("Location: ../../logout.php");         

          if ($_SESSION['role'] != 'Admin') {
            
                  header("Location: ../../logout.php");         
         //../index.php

        }
     }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin-Page</title>
    <link rel="icon" type="image/jpg" href="../resources/images/LOGO_REM.jpg"/>

    <!-- Bootstrap Core CSS -->
    <link href="../resources/css/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../resources/css/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link href="../resources/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../resources/css/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
    <script type = "text/javascript" src="../resources/css/js/bootstrap.min.js"></script>
    <script type = "text/javascript" src="../resources/css/js/bootstrap.js"></script>
    <script type = "text/javascript" src="../resources/css/js/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type = "text/javascript" href="../resources/css/js/filter.js"></script>

    <script type = "text/javascript" src="../resources/js/selectOptions.js"></script>


     <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->


  <!-- Google chart -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <!-- Pagenation -->
    <link rel="stylesheet" type="text/css" href="../resources/css/pagination.css">

</head>

<body>
  <script>
    /*$(document).ready(function( {
        function disableBack() { window.history.forward() }

        window.onload = disableBack();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
    });
    */
</script>