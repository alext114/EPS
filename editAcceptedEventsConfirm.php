<?php
include 'dbh.php';
include 'manager.php';
$manager= new manager();


if(isset($_POST['saveChangesButton'])) {
  //checkAvailabilty?
$manager->saveAcceptedChanges($db, $_POST);
print '<script>window.location.assign("acceptedevents.php");</script>';
//its not updating in DB, make $POST an  array and pass it. Use $SESSION 
}


 ?>
