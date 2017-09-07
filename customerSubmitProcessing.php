<?php
include 'dbh.php';
include 'manager.php';
include 'eventManager.php';
session_start();
$manager=new manager($_SESSION['username'], $_SESSION['theaterName']);
$eventManager=new eventManager();
//add into database
$manager->addEntry($db, $_SESSION['customerInfo']);

//wipe customerInfo
$_SESSION['customerInfo']="";

 ?>
