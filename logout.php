<?php
session_start();
include_once('resources/db_funct/db.php');
include_once('resources/db_funct/function.php');
logs($_SESSION['id'],$_SESSION['username'], 'Logout out');
session_destroy();
header('Location: index.php');
?>