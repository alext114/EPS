<?php

include 'dbh.php';
include 'manager.php';
include_once 'alert.php';
$alert=new alert();
session_start();
$manager=new manager($_SESSION['username'], $_SESSION['theaterName']);

//accept the event
if(isset($_POST['acceptButton'])) {
  //check google calendar to see if date is available
  $manager->acceptEvent($db, $_POST['eventID']);
}
//reject the event
if(isset($_POST['rejectButton'])) {
  //check if reason for rejection is filled
  if ($_POST['messageTextField'] === "") {
        print '<script>alert("Please provide a reason for the rejection of the event.");</script>';
        print '<script>window.location.assign("pendingevents.php");</script>';

  } else {
  
    $manager->rejectEvent($db, $_POST['eventID']);
    $alert->rejectEmailCustomer($db, $_POST['messageTextField'], $_POST['eventID']);
  }
}
//push the event to the bottom of the queue
if(isset($_POST['pushButton'])) {
    //check if reason for postponement is filled
  if ($_POST['messageTextField'] === "") {
      print '<script>alert("Please provide a reason for the postponement of the event.");</script>';
      print '<script>window.location.assign("pendingevents.php");</script>';

  } else {
    
    $manager->pushEvent($db, $_POST['eventID']);
   $alert->pushEmailCustomer($db, $_POST['messageTextField'], $_POST['eventID']);
  }
}
 ?>
