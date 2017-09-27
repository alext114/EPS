<?php
  include_once 'alert.php';

  class manager{
  //Variables being declared
    public $managerName;
    public $managerTheater;

    public function __construct($newManagerName, $newManagerTheater){


      $this->managerName=$newManagerName;
      $this->managerTheater=$newManagerTheater;

    }

    public function viewPendingQueue($db){
      /*Displays the events in a queue available in a
      	table. */
      	//connect to database

          //get tables for events
          $queryEvents = "SELECT * FROM events_queue LIMIT 1";
          $result = $db->query($queryEvents);
          if($result->num_rows <=0) {
            print '<script>alert("No More Events in Queue");</script>';
          }
          else {


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
          $db->close();
        }


    }
    public function viewAccepted($db){
      /*Displays the events in a queue available in a
      	table. */
      	//connect to database

          //get tables for events
          //$queryEvents = "SELECT * FROM `events` where theaterName= $managerTheater ORDER BY recievedDeposit DESC, eventDate ASC";


          $queryEvents = "SELECT * FROM `events` ORDER BY recievedDeposit DESC, eventDate ASC";
          $result = $db->query($queryEvents);
          $event=array($result->num_rows);
          $index=0;
        if ($result->num_rows==0){
            print '<script>alert("No More Accepted Events");</script>';

            return $event = array();
          }
          else{
          
          
        while($row = $result->fetch_assoc())
        {

            // turn row into an array
             $time= date_create($row['eventTime']);

            $event[$index]=array("eventID"=>$row['eventID'], "fullName"=>$row["fullName"], "emailAddress"=>$row["emailAddress"], "phoneNumber"=>$row["phoneNumber"], "eventDate"=>$row["eventDate"], "description"=>$row["description"], "movie"=>$row["movie"],
            "eventTime"=>date_format($time, 'H:i:sa'), "rate"=>$row["rate"], "depositAmt"=> $row['depositAmt']
            , "numOfPeople"=>$row["numOfPeople"], "specialAttention"=>$row["specialAttention"], "eventType"=>$row["eventType"], "partyRoomBook"=>$row["partyRoomBook"], "childName"=>$row["childName"], "theaterName"=>$row["theaterName"]);
            $index++;

          }
          //return the new array
          return $event;
          $db->close();
}


    }
    function viewNotPaid($db){

          //get tables for employee
          //$queryEvents = "SELECT * FROM `events` where `recievedDeposit`= 0, theaterName='$managerTheater'";

          $queryEvents = "SELECT * FROM `events` where `recievedDeposit`= 0";
          $result = $db->query($queryEvents);
          $event=array($result->num_rows);
          $index=0;
  if ($result->num_rows==0){
            print '<script>alert("All Events Have Deposit Paid!");</script>';

            return $event = array();
          }
          else{


          while ($row=$result->fetch_assoc())
          {
            $event[$index]=array("eventID"=>$row['eventID'], "fullName"=>$row["fullName"], "emailAddress"=>$row["emailAddress"], "phoneNumber"=>$row["phoneNumber"], "eventDate"=>$row["eventDate"], "description"=>$row["description"], "movie"=>$row["movie"],
            "eventTime"=>$row["eventTime"], "rate"=>$row["rate"], "recievedDeposit"=> $row['recievedDeposit']
            , "numOfPeople"=>$row["numOfPeople"], "specialAttention"=>$row["specialAttention"], "eventType"=>$row["eventType"], "partyRoomBook"=>$row["partyRoomBook"], "childName"=>$row["childName"], "theaterName"=>$row["theaterName"]);
            $index++;
          }
          return $event;
          $db->close();
}

    }
      public function deleteEvent($db, $eventID){

          //refund deposit
          //delete off google calendar
          $queryEvents = "DELETE FROM events
                          where eventID='$eventID'";
          $result = $db->query($queryEvents);

          //alert send deletion email to customer
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
        $theater=$submittedEvent['theaterName'];

         include 'eventManager.php';

        $eventManager=new eventManager();

        //Check if the date is available

      //  $isAvailable=$eventManager->checkAvailabilty($db,$partyRoomBook, date_format($eventDate,"Y/m/d"));


      //  if ($isAvailable==true){
          //query the database to insert
          //info not available is null


          $queryEvents = "INSERT INTO events (`eventID`, `fullName`, `emailAddress`, `phoneNumber`, `eventDate`, `description`, `movie`, `eventTime`, `rate`, `numOfPeople`, `specialAttention`, `eventType`, `depositAmt`, `recievedDeposit`, `partyRoomBook`, `childName`, `isApproved`, `theaterName`)
          VALUES (null, '$fullName', '$emailAddress', '$phoneNumber', '$eventDate', '$description', '$movie', '$eventTime', 0, '$numOfPeople', '$specialAttention', '$eventType', 0, 0, '$partyRoomBook', '$childName', 1, '$theater')";
          if ($db->query($queryEvents) === TRUE)
          {
            print '<script>alert("Event Booked!");</script>';
           //redirects to home.html
          print '<script>window.location.assign("acceptedevents.php");</script>';
          }
          else {
              $error= "Error: " . $queryEvents . "<br>" . $db->error;
              print '<script>alert("Event was not booked");</script>';
              //redirects to home.html
              print '<script>window.location.assign("acceptedevents.php");</script>';

          }
          $db->close();
      //}
    }

    public function editEvent($db, $eventID){

      $query= "SELECT * FROM events WHERE eventID='$eventID'";

      $result = $db->query($query);

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

      $db->close();

    }

    public function saveAcceptedChanges($db, $submittedEvent){
      $eventID=$submittedEvent['eventID'];
      $fullName=$submittedEvent['fullName'];
      $emailAddress=$submittedEvent['emailAddress'];
      $phoneNumber=$submittedEvent['phoneNumber'];
      $eventDate=$submittedEvent['eventDate'];
      $description=$submittedEvent['description'];
      $movie=$submittedEvent['movie'];
      $eventTime=$submittedEvent['eventTime'];
      $numOfPeople=$submittedEvent['numOfPeople'];
      $specialAttention=$submittedEvent['specialAttention'];
      //eventtype was here
      $partyRoomBook=$submittedEvent['partyRoomBook'];
      $childName=$submittedEvent['childName'];




      $query = "UPDATE `events` SET `fullName`='$fullName',`emailAddress`='$emailAddress',`phoneNumber`='$phoneNumber',`eventDate`='$eventDate',`description`= '$description'
      ,`movie`='$movie',`eventTime`='$eventTime', `numOfPeople`='$numOfPeople',`specialAttention`='$specialAttention', `partyRoomBook`='$partyRoomBook',
      `childName`='$childName' WHERE `eventID`= '$eventID'";

      $result=$db->query($query);
      $db->close();
      if(!$result) {
        echo "Query was unable to be executed";
      } else {
        //update google calendar here
        echo "Changes Saved!";
      }

    }

    public function payDeposit($db, $eventID){

    include 'eventManager.php';

       $alert= new alert();
      $eventManager=new eventManager();
      //update recievedDeposit to 1 by eventID
      $query="UPDATE `events` SET `recievedDeposit`= 1, `depositAmt`= 50 WHERE `eventID` = '$eventID'";
      $result=$db->query($query);

      //error handling
      if(!$result) {
        echo "Pay Deposit Failed. Unable to be executed";
              $db->close();
      }
      else
      {

        $eventManager->addToCalendar($db, $eventID);
        $alert->depositPaidEmail($db, $eventID);
        //echo "Deposit Paid!";
              $db->close();
      }

    }


public function waiveDeposit($db, $eventID){

      include 'eventManager.php';


       $alert= new alert();
      $eventManager=new eventManager();
      //update recievedDeposit to 1 by eventID
      $query="UPDATE `events` SET `recievedDeposit`= 1, `depositAmt`= 0 WHERE `eventID` = '$eventID'";
      $result=$db->query($query);

      //error handling
      if(!$result) {
        echo "waive Deposit Failed. Unable to be executed";
              $db->close();
      }
      else
      {

        $eventManager->addToCalendar($db, $eventID);
        $alert->waiveEmail($db, $eventID);
        //echo "Deposit Paid!";
              $db->close();
      }

    }





    public function acceptEvent($db, $eventID){
      //send accept email

      $alert=new alert();

   
    $db->query("INSERT INTO events (`fullName`, `emailAddress`, `phoneNumber`, `eventDate`, `description`,
        `movie`, `eventTime`, `rate`, `numOfPeople`, `specialAttention`, `eventType`, `depositAmt`, `recievedDeposit`,
         `partyRoomBook`, `childName`, `isApproved`, `theaterName`) SELECT `fullName`, `emailAddress`, `phoneNumber`, `eventDate`, `description`,
           `movie`, `eventTime`, `rate`, `numOfPeople`, `specialAttention`, `eventType`, `depositAmt`, `recievedDeposit`,
            `partyRoomBook`, `childName`, `isApproved`, `theaterName` FROM events_queue WHERE eventID = '$eventID'");
// move into other table
// send email
 $alert->acceptEmail($db, $eventID);
//then delete from previous trable
      $result=$db->query("DELETE FROM events_queue WHERE eventID = '$eventID'");
      if(!$result) {
        echo "Query was unable to be executed";
      } else {
        echo "The pending event was successfully approved!";
        print '<script>window.location.assign("pendingevents.php");</script>';
      }


    }

    public function rejectEvent($db, $eventID){
      /*create mail message*/

      //remove from database
      $result=$db->query("DELETE FROM events_queue WHERE eventID = '$eventID'");
      if(!$result) {
        echo "Query was unable to be executed";
              $db->close();
      } else {
        echo "The pending event was successfully removed from the database";
              $db->close();
        print '<script>window.location.assign("pendingevents.php");</script>';
      }

    }

    public function pushEvent($db, $eventID){
      /*create mail message*/

      //remove event from the top of the queue

      $result=$db->query("SELECT * FROM events_queue WHERE eventID = '$eventID'");
      //make into an array
      while($row = $result->fetch_assoc())
      {
        // turn row into an array
        $event= array("eventID"=>$row["eventID"],
          "fullName"=>$row["fullName"], "emailAddress"=>$row["emailAddress"], "phoneNumber"=>$row["phoneNumber"], "eventDate"=>$row["eventDate"], "description"=>$row["description"], "movie"=>$row["movie"], "eventTime"=>$row["eventTime"], "rate"=>$row["rate"]
        , "numOfPeople"=>$row["numOfPeople"], "specialAttention"=>$row["specialAttention"], "eventType"=>$row["eventType"], "partyRoomBook"=>$row["partyRoomBook"], "childName"=>$row["childName"], "theaterName"=>$row["theaterName"]);


      }
      //insert at the bottom of the queue
      $fullName = $event['fullName'];
      $emailAddress = $event['emailAddress'];
      $phoneNumber = $event['phoneNumber'];
      $eventDate = $event['eventDate'];
      $movie = $event['movie'];
      $eventTime = $event['eventTime'];
      $rate = $event['rate'];
      $numOfPeople = $event['numOfPeople'];
      $specialAttention = $event['specialAttention'];
      $eventType = $event['eventType'];
      $partyRoomBook = $event['partyRoomBook'];
      $childName = $event['childName'];
      $theaterName = $event['theaterName'];
      $description = $event['description'];
//DELETE EVENT FROM QUEUE      
$db->query("DELETE FROM events_queue WHERE eventID = '$eventID'");

      $result=$db->query("INSERT INTO `events_queue` (eventID, fullName, emailAddress, phoneNumber, eventDate, movie, eventTime, rate, numOfPeople, specialAttention, eventType, depositAmt, recievedDeposit, partyRoomBook, childName, isApproved, theaterName, description) VALUES (null, '$fullName', '$emailAddress', '$phoneNumber', '$eventDate', '$movie', '$eventTime', $rate, $numOfPeople, '$specialAttention', '$eventType', 0, 0, $partyRoomBook, '$childName', 0, '$theaterName', '$description')");
      if(!$result) {
        echo "Query was unable to be executed";
              $db->close();

      } else {
        print '<script>alert("The pending event was successfully pushed to the back of the queue");</script>';
      $db->close();
        print '<script>window.location.assign("pendingevents.php");</script>';
      }

    }

    public function getManagerTheater(){
      //return $managerName;
    }


}
?>
