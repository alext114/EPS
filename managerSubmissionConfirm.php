<?php
include 'dbh.php';
include 'manager.php';

session_start();
$manager=new manager($_SESSION['username'], $_SESSION['theaterName']);

$manager->addEntry($db, $_POST);


 ?>
