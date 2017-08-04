<?php

  public class eventManager{

    var $eventID


    function checkAvailabilty($date){


    }

    function generateEventSheet(){

    }

    function placeInQueue($submittedEvent){
        
        $queryEvents = INSERT INTO events_queue ($submittedEvent['fullName'],$submittedEvent['emailAddress'],$submittedEvent['phoneNumber'],$submittedEvent['eventDate'],$submittedEvent['movie'],$submittedEvent['eventTime'],$submittedEvent['rate'],$submittedEvent['numOfPeople'],$submittedEvent['specialAttention'],$submittedEvent['eventType'],$submittedEvent['depositAmt'],$submittedEvent['receivedDeposit'],$submittedEvent['partyRoomBook'],$submittedEvent['childName'],$submittedEvent['isApproved'],$submittedEvent['eventType'],$submittedEvent['theater']) WHERE (`fullName`,`emailAddress`,`phoneNumber`,`eventDate`,`movie`,`eventTime`,`rate`,`numOfPeople`,`specialAttention`,`eventType`,`depositAmt`,`receivedDeposit`,`partyRoomBook`,`childName`,`isApproved`,`theater`);
        $result = $db->prepare($queryEvents);
        $result->execute(); 
    }

    function createEvent(){

    }
  }


?>
