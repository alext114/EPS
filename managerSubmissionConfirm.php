<?php
include 'dbh.php';
include 'manager.php';

session_start();
$manager=new manager($_SESSION['username'], $_SESSION['theaterName']);

//gather post and put into array to be submitted into DB
$submittedEvent= array("fullName"=>$_POST["fullName"], "emailAddress"=>$_POST["emailAddress"], "phoneNumber"=>$_POST["phoneNumber"], "eventDate"=>$_POST["eventDate"], "description"=>$_POST["description"], "movie"=>$_POST["movie"], "eventTime"=>$_POST["eventTime"], "rate"=>0
    , "numOfPeople"=>$_POST["numOfPeople"], "specialAttention"=>$_POST["specialAttention"], "eventType"=>$_POST["eventType"], "partyRoomBook"=>$_POST["partyRoomBook"], "childName"=>$_POST["childName"], "theaterName"=>$_POST["theaterName"]);



$manager->addEntry($db, $submittedEvent);



 ?>
