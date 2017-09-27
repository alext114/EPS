<?php
include 'dbh.php';
include 'manager.php';
session_start();
$manager=new manager($_SESSION['username'], $_SESSION['theaterName']);


//delete event
if(isset($_POST['deleteEventButton'])) {
$manager->deleteEvent($db, $_POST['eventID']);

print '<script>alert("Event Deleted, make sure a refund is given");</script>';
print '<script>window.location.assign("acceptedevents.php");</script>';


}



if(isset($_POST['saveChangesButton'])) {
  //checkAvailabilty?

  $event= array("eventID"=>$_POST["eventID"],
    "fullName"=>$_POST["fullName"], "emailAddress"=>$_POST["emailAddress"], "phoneNumber"=>$_POST["phoneNumber"], "eventDate"=>$_POST["eventDate"], "description"=>$_POST["description"], "movie"=>$_POST["movie"], "eventTime"=>$_POST["eventTime"]
  , "numOfPeople"=>$_POST["numOfPeople"], "specialAttention"=>$_POST["specialAttention"], "partyRoomBook"=>$_POST["partyRoomBook"], "childName"=>$_POST["childName"]);



//echo $event['eventID'];

$manager->saveAcceptedChanges($db, $event);
print '<script>window.location.assign("acceptedevents.php");</script>';
//its not updating in DB, make $POST an  array and pass it. Use $SESSION
}


 ?>
