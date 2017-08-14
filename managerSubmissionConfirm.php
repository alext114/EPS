<?php
include 'dbh.php';
include 'manager.php';

$manager= new manager();

$manager->addEntry($db, $_POST);


 ?>
