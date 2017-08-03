<?php

  public class manager{
  //Variables being declared
    var $fullName;
    var $emailAddress;


    function viewPendingQueue(){
      /*Displays the events in a queue available in a
      	table. */
      	//connect to database
      	include '../dbh.php';
          //get tables for employee
          $queryEvents = "SELECT *
                           FROM events_queue";
          $result = $db->prepare($queryEvents);
          $result->execute();
          $events = $result->fetchAll();
          $result->closeCursor();




    }

    function viewAccepted(){
      /*Displays the events  available in a
      	table. */
      	//connect to database
      	include '../dbh.php';
          //get tables for events
          $queryEvents = "SELECT *
                           FROM events";
          $result = $db->prepare($queryEvents);
          $result->execute();
          $events = $result->fetchAll();
          $result->closeCursor();



    }
    function viewNotPaid(){
      /*Displays the events in a queue available in a
      	table. */
      	//connect to database
      	include '../dbh.php';
          //get tables for employee
          $queryEvents = "SELECT *
                           FROM events where depositReceived='true'";
          $result = $db->prepare($queryEvents);
          $result->execute();
          $events = $result->fetchAll();
          $result->closeCursor();


    }
    function deleteEvent($eventID){
        if (checkDeposit($eventID)==true){
          //refund deposit
          //delete off google calendar
          $queryEvents = "DELETE FROM events
                          where eventID='$eventID'";
          $result = $db->prepare($queryEvents);
          $result->execute();

          //alert send deletion email to customer
        }

        else {
          if (checkDeposit($eventID)==true){
            //delete off google calendar
            $queryEvents = "DELETE FROM events
                            where eventID='$eventID'";
            $result = $db->prepare($queryEvents);
            $result->execute();

            //alert send deletion email to customer
          }

        }
    }

    function checkDeposit($eventID){
      /*Displays the events in a queue available in a
      	table. */
      	//connect to database
      	include '../dbh.php';
          //get tables for event where id is equal to event id
          //maybe change the * to single value
          $queryEvents = "SELECT *
                           FROM events where eventID='$eventID'";
          $result = $db->prepare($queryEvents);
          $result->execute();
          $event = $result->fetchAll();
          $result->closeCursor();

          //if receivedDeposit = true then return true
          if ($event['receivedDeposit'] == true){
              return true;

          }
          else{
            return false;
          }

    }
    function addEntry($submittedEvent){

      $eventManager= new eventManager;
      isAvailable=$eventManager->checkAvailabilty($date);

      if (isAvailable==true){
        $queryEvents = ;//INSERT INTO events (`fullName`,`emailAddress`,`phoneNumber`,`eventDate`,`movie`,`eventTime`,`rate`,`numOfPeople`,`specialAttention`,`eventType`,`depositAmt`,`receivedDeposit`,`partyRoomBook`,`childName`,`isApproved`,`theater`) WHERE (`fullName`,`emailAddress`,`phoneNumber`,`eventDate`,`movie`,`eventTime`,`rate`,`numOfPeople`,`specialAttention`,`eventType`,`depositAmt`,`receivedDeposit`,`partyRoomBook`,`childName`,`isApproved`,`theater`)
        $result = $db->prepare($queryEvents);
        $result->execute(); 

      }
    }
}

?>
