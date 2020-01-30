<?php
session_start();
include_once('../../db_funct/db.php');
include_once('../../db_funct/function.php');
logs($_SESSION['id'],$_SESSION['username'], 'Waring !! Logout because user altered the URL to see what is in bill_receipt directory.');
session_destroy();
header('Location: ../../index.php');
?>