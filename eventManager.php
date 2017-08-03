<?php

  public class eventManager{

    var $eventID


    function checkAvailabilty($date){


    }

    function generateEventSheet(){

    }

    function placeInQueue(){
        $queryEvents = ;//INSERT INTO events_queue (`fullName`,`emailAddress`,`phoneNumber`,`eventDate`,`movie`,`eventTime`,`rate`,`numOfPeople`,`specialAttention`,`eventType`,`depositAmt`,`receivedDeposit`,`partyRoomBook`,`childName`,`isApproved`,`theater`) WHERE (`fullName`,`emailAddress`,`phoneNumber`,`eventDate`,`movie`,`eventTime`,`rate`,`numOfPeople`,`specialAttention`,`eventType`,`depositAmt`,`receivedDeposit`,`partyRoomBook`,`childName`,`isApproved`,`theater`)
        $result = $db->prepare($queryEvents);
        $result->execute(); 
    }

    function createEvent(){

    }
  }


?>
