<?php
include 'dbh.php';
include 'admin.php';

$admin= new admin();
$username=$_POST['managerSelection'];
$admin->deleteManager($db, $userID);
?>
