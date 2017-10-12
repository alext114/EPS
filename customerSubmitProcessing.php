<?php
include 'dbh.php';

include 'eventManager.php';
session_start();

$eventManager=new eventManager();
//add into database
$eventManager->placeInQueue($db, $_SESSION['customerInfo']);


 ?>
