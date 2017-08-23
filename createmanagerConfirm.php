<?php

include 'admin.php';
include 'dbh.php';
$admin= new admin();
$admin->createManager($db, $_POST['userNameTextBox'], $_POST['passwordTextBox'],$_POST['managerNameTextBox'], $_POST['theaterSelectionList']);


?>
