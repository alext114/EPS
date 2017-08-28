<?php

include 'dbh.php';
include 'manager.php';
include 'alert.php';
$alert=new alert();
$manager= new manager();


//accept the event
if(isset($_POST['acceptButton'])) {
  //check google calendar to see if date is available

}
//reject the event
if(isset($_POST['rejectButton'])) {
  //check if reason for rejection is filled
  if ($_POST['messageTextField'] === "") {
    echo 'Please provide a reason for the rejection of the event.';
  } else {
    $alert->rejectEmailCustomer($db, $_POST['messageTextField'], $_POST['eventID']);
    $manager->rejectEvent($db, $_POST['eventID']);
  }
}
//push the event to the bottom of the queue
if(isset($_POST['pushButton'])) {
    //check if reason for postponement is filled
  if ($_POST['messageTextField'] === "") {
    echo 'Please provide a reason for the postponement of the event.';
  } else {
    $alert->pushEmailCustomer($db, $_POST['messageTextField'], $_POST['eventID']);
    $manager->pushEvent($db, $_POST['eventID']);
  }
}
 ?>
