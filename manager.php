<?php


  class manager{
  //Variables being declared
    public $fullName;
    public $emailAddress;


    public function viewPendingQueue($db){
      /*Displays the events in a queue available in a
      	table. */
      	//connect to database

          //get tables for events
          $queryEvents = "SELECT * FROM events_queue LIMIT 1";
          $result = $db->query($queryEvents);

          $event = null;
          while($row = $result->fetch_assoc())
          {
            // turn row into an array
            $event= array("eventID"=>$row["eventID"],
              "fullName"=>$row["fullName"], "emailAddress"=>$row["emailAddress"], "phoneNumber"=>$row["phoneNumber"], "eventDate"=>$row["eventDate"], "description"=>$row["description"], "movie"=>$row["movie"], "eventTime"=>$row["eventTime"], "rate"=>$row["rate"]
            , "numOfPeople"=>$row["numOfPeople"], "specialAttention"=>$row["specialAttention"], "eventType"=>$row["eventType"], "partyRoomBook"=>$row["partyRoomBook"], "childName"=>$row["childName"], "theaterName"=>$row["theaterName"]);


          }
          //return the new array
          return $event;




    }

    function viewAccepted($db){
      /*Displays the events in a queue available in a
      	table. */
      	//connect to database

          //get tables for events
          $queryEvents = "SELECT * FROM events ORDER BY eventDate";
          $result = $db->query($queryEvents);
          $event=array($result->num_rows);
          $index=0;
        while($row = $result->fetch_assoc())
        {

            // turn row into an array

            $event[$index]=array("fullName"=>$row["fullName"], "emailAddress"=>$row["emailAddress"], "phoneNumber"=>$row["phoneNumber"], "eventDate"=>$row["eventDate"], "description"=>$row["description"], "movie"=>$row["movie"], "eventTime"=>$row["eventTime"], "rate"=>$row["rate"]
            , "numOfPeople"=>$row["numOfPeople"], "specialAttention"=>$row["specialAttention"], "eventType"=>$row["eventType"], "partyRoomBook"=>$row["partyRoomBook"], "childName"=>$row["childName"], "theater"=>$row["theater"]);
            $index++;

          }
          //return the new array


          return $event;



    }
    function viewNotPaid(){
      /*Displays the events in a queue available in a
      	table. */
      	//connect to database
      	include 'dbh.php';
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
      	include 'dbh.php';
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
    public function addEntry($db,$submittedEvent){




        $fullName=$submittedEvent['fullName'];
        $emailAddress=$submittedEvent['emailAddress'];
        $phoneNumber=$submittedEvent['phoneNumber'];
        $eventDate=$submittedEvent['eventDate'];
        $description=$submittedEvent['description'];
        $movie=$submittedEvent['movie'];
        $eventTime=$submittedEvent['eventTime'];
        $numOfPeople=$submittedEvent['numOfPeople'];
        $specialAttention=$submittedEvent['specialAttention'];
        $eventType=$submittedEvent['eventType'];
        $partyRoomBook=$submittedEvent['partyRoomBook'];
        $childName=$submittedEvent['childName'];
        $eventType=$submittedEvent['eventType'];
        $theater=$submittedEvent['theater'];


        //Check if the date is available
    //    $eventManager= new eventManager();
      //  $isAvailable=$eventManager->checkAvailabilty($db,$partyRoomBook, date_format($eventDate,"Y/m/d"));


      //  if ($isAvailable==true){
          //query the database to insert
          //info not available is null
          $queryEvents = "INSERT INTO events (`eventID`, `fullName`, `emailAddress`, `phoneNumber`, `eventDate`, `description`, `movie`, `eventTime`, `rate`, `numOfPeople`, `specialAttention`, `eventType`, `depositAmt`, `recievedDeposit`, `partyRoomBook`, `childName`, `isApproved`, `theater`)
          VALUES (null, '$fullName', '$emailAddress', '$phoneNumber', '$eventDate', '$description', '$movie', '$eventTime', null, '$numOfPeople', '$specialAttention', '$eventType', null, null, '$partyRoomBook', '$childName', 1, '$theater')";
          if ($db->query($queryEvents) === TRUE)
          {
            print '<script>alert("Event Booked!");</script>';
           //redirects to home.html
          print '<script>window.location.assign("home.html");</script>';
          }
          else {
              $error= "Error: " . $queryEvents . "<br>" . $db->error;
              //print '<script>alert('$error');</script>';
              //redirects to home.html
              print '<script>window.location.assign("home.html");</script>';

          }
          $db->close();
      //}
    }

}
?>
