<?php
session_start();
include_once('../../db_funct/db.php');
include_once('../../db_funct/function.php');
logs($_SESSION['id'],$_SESSION['username'], 'Waring !! Logout because user altered the URL to see what is in users directory.');
session_destroy();
header('Location: ../../../index.php');
?>