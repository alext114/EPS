<?php

   class eventManager{

    public $eventID;

    public function __construct(){
    //  use Screen\Capture;

    }
    public function checkAvailabilty($db, $wantsPartyRoom, $date){
    $systemDate=date_create();
    $newDate= date_create($date);
    $diffOfDates=  date_diff($systemDate,$newDate);
    $isBooked=false; //declaring variable
    //$numOfEvents=0;
    //sql statement that retrieves partyRoomBook boolean from the given datee

    $query ="SELECT partyRoomBook FROM events WHERE date='$date'";
    $result=$db->query($query);

    //num_rows returns number of rows returned from query statement
    $numOfEvents = $result->num_rows;
    echo $numOfEvents;
    //3 is the max amount of events in a day
    if ($numOfEvents >= 3){
        return false;
    }
    else{
        //test to see if new event requires party room, if true it mmust now check if any other event on that day has the party room already booked
        if($wantsPartyRoom== 'Yes'){
            //$query is the query stated above
            while($row = $result->fetch_assoc()){
                //if true isBooked is set to true else false
                if($row['partyRoomBook']=='Yes'){
                    $isBooked=true;
                    break;
                }
                else{
                    $isBooked=false;
                }//end partyRooomBook if
            }//end while
            if ($isBooked==true){
                //room is booked, return false, about availiabilty
                return false;


            }
            else{
                //if the timespan between the dates is over 30, warning message is given.
                if($diffOfDates>=30){
                echo "Movie might not be available if booking a month in advance. Please finish booking and then call the manager at the movie theater you are booking at to verify. ";
                return true;
                }
            }//end isBooked if
        }//end $wantsPartyRoom if
    }
     //if the timespan between the dates is over 30, warning message is given.
    if($diffOfDates>=30){
    echo "Movie might not be available if booking a month in advance. Please finish booking and then call the manager at the movie theater you are booking at to verify. ";
    return true;
    }

    }

    function generateEventSheet($url){


      $screenCapture = new Capture($url);
      $screenCapture->setTop(100);
      $screenCapture->setLeft(100);
      $screenCapture->setImageType('png');
      $fileLocation = __DIR__;
      $screenCapture->save($fileLocation); // Will automatically determine the extension type
    }

    function placeInQueue($submittedEvent){

      $queryEvents = "INSERT INTO events_queue (`eventID`, `fullName`, `emailAddress`, `phoneNumber`, `eventDate`, `description`, `movie`, `eventTime`, `rate`, `numOfPeople`, `specialAttention`, `eventType`, `depositAmt`, `recievedDeposit`, `partyRoomBook`, `childName`, `isApproved`, `theater`)
      VALUES (null, '$fullName', '$emailAddress', '$phoneNumber', '$eventDate', '$description', '$movie', '$eventTime', null, '$numOfPeople', '$specialAttention', '$eventType', null, null, '$partyRoomBook', '$childName', 1, '$theater')";
      //dont forget to fix null VALUES
      if ($db->query($queryEvents) === TRUE)
      {
        print '<script>alert("Your Event is now in wait for approval by the selected theater ");</script>';
       //redirects to home.html
      //  print '<script>window.location.assign("confirmation.php");</script>';
      }
      else {
          $error= "Error: " . $queryEvents . "<br>" . $db->error;
          //print '<script>alert('$error');</script>';
          //redirects to home.html
          print '<script>window.location.assign("home.html");</script>';

      }
      $db->close();
    }

    function quickCalendar($db, $date){
      //fetch all the events on given date
      $query="SELECT * FROM `events` WHERE eventDate = '$date'";
      $result=$db->query($query);
      while ($row=$result->fetch_assoc()){
            $events[]= $row;
      }
            $db->close();
      return $events;

    }


    function search($db, $name){
      //fetch all the events on given name


      $query="SELECT * FROM `events` WHERE fullName like '%".$name."%'";
      $result=$db->query($query);
      $events= array();
      while ($row=$result->fetch_assoc()){
            $events[]= $row;
      }
            $db->close();
      return $events;
    }


    function addToCalendar($db, $eventID){
      // Refer to the PHP quickstart on how to setup the environment:
// https://developers.google.com/google-apps/calendar/quickstart/php
// Change the scope to Google_Service_Calendar::CALENDAR and delete any stored
// credentials.

include 'quickstart.php';
$query="SELECT * FROM `events` WHERE eventID='$eventID'";
$result=$db->query($query);
while ($row=$result->fetch_assoc()){
      $event[]= $row;
}
$calendarEvent = new Google_Service_Calendar_Event(array(
  'summary' => 'Google I/O 2017',
  'location' => '800 Howard St., San Francisco, CA 94103',
  'description' => $event['description'],
  'start' => array(
    'dateTime' => '2018-05-28T09:00:00-07:00',
    'timeZone' => 'America/Los_Angeles',
  ),
  'end' => array(
    'dateTime' => '2018-05-28T17:00:00-07:00',
    'timeZone' => 'America/Los_Angeles',
  ),
  'recurrence' => array(
    'RRULE:FREQ=DAILY;COUNT=2'
  ),
  'attendees' => array(
    array('email' => 'lpage@example.com'),
    array('email' => 'sbrin@example.com'),
  ),
  'reminders' => array(
    'useDefault' => FALSE,
    'overrides' => array(
      array('method' => 'email', 'minutes' => 24 * 60),
      array('method' => 'popup', 'minutes' => 10),
    ),
  ),
));

$calendarId = $event['theaterName'] . 'Events';
$googleEvent = $service->events->insert($calendarId, $googleEvent);
printf('Event created: %s\n', $googleEvent->htmlLink);
    }

  }

?>
