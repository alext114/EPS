<?php
include 'dbh.php';
include 'eventManager.php';

//move event to past events
$eventID= $_POST['eventID'];

$db->query("INSERT INTO past_events (`fullName`, `emailAddress`, `phoneNumber`, `eventDate`, `description`,
    `movie`, `eventTime`, `rate`, `numOfPeople`, `specialAttention`, `eventType`, `depositAmt`, `recievedDeposit`,
     `partyRoomBook`, `childName`, `isApproved`, `theaterName`) SELECT `fullName`, `emailAddress`, `phoneNumber`, `eventDate`, `description`,
       `movie`, `eventTime`, `rate`, `numOfPeople`, `specialAttention`, `eventType`, `depositAmt`, `recievedDeposit`,
        `partyRoomBook`, `childName`, `isApproved`, `theaterName` FROM events WHERE eventID = '$eventID'");
// move into other table
//then delete from previous trable
  $result=$db->query("DELETE FROM events WHERE eventID = '$eventID'");
  //
print '<script>alert("Event has been Finalized");</script>';
// redirect to another page
  print '<script>window.location.assign("acceptedevents.php");</script>';

?>
