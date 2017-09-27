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

    function placeInQueue($db, $submittedEvent){

      // declate variables

      $fullName=$submittedEvent['fullName'];
      $emailAddress=$submittedEvent['emailAddress'];
      $phoneNumber=$submittedEvent['phoneNumber'];
      $time=strtotime($submittedEvent['eventDate']);
      $description=$submittedEvent['description'];
      $movie=$submittedEvent['movie'];
      $eventTime=$submittedEvent['eventTime'];
      $numOfPeople=$submittedEvent['numOfPeople'];
      $specialAttention=$submittedEvent['specialAttention'];
      $eventType= $submittedEvent['eventType'];
      $partyRoomBook=$submittedEvent['partyRoomBook'];
      $childName=$submittedEvent['childName'];
      $theaterName=$submittedEvent['theaterName'];
      $rate=0;
  

      $eventDate = date('Y-m-d',$time);

      
      //rate changes depending on event type
      if($eventType=='Rental'){
        if($numOfPeople > 27){
          $extra=$numOfPeople-27;
          $rate=325+($extra*7);
        }
        $rate=325;
      }
      elseif($eventType=='Fundraiser'){
        $rate=320;
      }
      elseif ($eventType=='Walk-in') {
        $rate= ($numOfPeople*10)+100;
      }
      elseif ($eventType=='Private Screening') {
        if($numOfPeople <= 40){
            $rate=320;
        }
        elseif ($numOfPeople >= 100){
          $rate=$numOfPeople*7.5;

        }
        else{
          $rate=$numOfPeople*8;
        }

      }
      else{
        $rate=300;
      }


      $queryEvents = "INSERT INTO events_queue (`eventID`, `fullName`, `emailAddress`, `phoneNumber`, `eventDate`, `description`, `movie`, `eventTime`, `rate`, `numOfPeople`, `specialAttention`, `eventType`, `depositAmt`, `recievedDeposit`, `partyRoomBook`, `childName`, `isApproved`, `theaterName`)
          VALUES (null, '$fullName', '$emailAddress', '$phoneNumber', '$eventDate', '$description', '$movie', '$eventTime', null, '$numOfPeople', '$specialAttention', '$eventType', 0, 0, '$partyRoomBook', '$childName', 1, '$theaterName')";

      //dont forget to fix null VALUES
      if ($db->query($queryEvents) === true)
      {
        print '<script>alert("Your Event is now in wait for approval by the selected theater ");</script>';
       //redirects to home.html
       print '<script>window.location.assign("finalConfirmation.php");</script>';
      }
      else {
          //$error= "Error: " . $queryEvents . "<br>" . $db->error;
          print '<script>alert("The following information submitted was incorrectly typed, please resubmit event request");</script>';
          //redirects to home.html
          print '<script>window.location.assign("submissionform.html");</script>';

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


require_once __DIR__ . '/vendor/autoload.php';


define('APPLICATION_NAME', 'Google Calendar API PHP Quickstart');
define('CREDENTIALS_PATH', 'calendar-php-quickstart.json');
define('CLIENT_SECRET_PATH', __DIR__ . '/client_secret.json');
// If modifying these scopes, delete your previously saved credentials
// at ~/.credentials/calendar-php-quickstart.json
define('SCOPES', implode(' ', array(
  Google_Service_Calendar::CALENDAR)
));


// Get the API client and construct the service object.
$client = $this->getClient();
$service = new Google_Service_Calendar($client);
//get event based off event id
$query="SELECT * FROM `events` WHERE eventID='$eventID'";
$result=$db->query($query);
$event=null;
while ($row=$result->fetch_assoc()){
  // turn row into an array
  $event= array("eventID"=>$row["eventID"],
    "fullName"=>$row["fullName"], "emailAddress"=>$row["emailAddress"], "phoneNumber"=>$row["phoneNumber"], "eventDate"=>$row["eventDate"], "description"=>$row["description"], "movie"=>$row["movie"], "eventTime"=>$row["eventTime"], "rate"=>$row["rate"]
  , "numOfPeople"=>$row["numOfPeople"], "specialAttention"=>$row["specialAttention"], "depositAmt"=> $row['depositAmt'], "eventType"=>$row["eventType"], "partyRoomBook"=>$row["partyRoomBook"], "childName"=>$row["childName"], "theaterName"=>$row["theaterName"]);

}

// describes the whole event for the calendar
$fullDescription= $event['eventType'] . ' for ' . $event['fullName'] . ' to see ' . $event['movie'] ."\r\n".
'Movie: ' . $event['movie'] . "\r\n".
'Name: ' . $event['fullName'] . "\r\n" .
'Phone Number: ' . $event['phoneNumber'] . "\r\n" .
'Email Address: ' . $event['emailAddress'] . "\r\n".
'Number of People: ' . $event['numOfPeople'] . "\r\n" .
'Birthday Child Name(If Applicable): ' . $event['childName'] . "\r\n" .
'Deposit Paid: '  . $event['depositAmt'] . "\r\n" .
'Party Room?: ' . $event['partyRoomBook'] . "\r\n" .
'Description: ' . $event['description'] . "\r\n" .
'Special Attention: ' . $event['specialAttention'] . "\r\n" .
//converts time and date to dateTIme
$date=$event['eventDate'];
$time=$event['eventTime'];
$combinedDT= $date . $time;
$eventDateTime= new DateTime($combinedDT);
$startCombined= new DateTime($eventDateTime->format('Y-m-d\TH:i:sP'));
//split
$something=$startCombined->add(new DateInterval("PT3H"));
$endCombined=new DateTime($something->format('Y-m-d\TH:i:sP'));
$calendarEvent = new Google_Service_Calendar_Event(array(
  'summary' => $event['fullName'] . ' ' . $event['movie'] . ' ' . $event['eventType'],
  'location' => $event['theaterName'],
  'description' => $fullDescription,
  'start' => array(
    'dateTime' => $eventDateTime->format('Y-m-d\TH:i:sP'),
    'timeZone' => 'America/New_York',
  ),
  'end' => array(
    'dateTime' => $endCombined->format('Y-m-d\TH:i:sP'),
    'timeZone' => 'America/New_York',
  ),
  'reminders' => array(
    'useDefault' => FALSE,
    'overrides' => array(
      array('method' => 'email', 'minutes' => 24 * 60),
    ),
  ),
));

$calendarId = '33fk84kf0rdcqb7frkm8f1ocl0@group.calendar.google.com';
$calendarEvent = $service->events->insert($calendarId, $calendarEvent);
    }





  /**
   * Returns an authorized API client.
   * @return Google_Client the authorized client object
   */
public function getClient() {
    $client = new Google_Client();
    $client->setApplicationName(APPLICATION_NAME);
    $client->setScopes(SCOPES);
    $client->setAuthConfig(CLIENT_SECRET_PATH);
    $client->setAccessType('offline');

    // Load previously authorized credentials from a file.
    $credentialsPath = $this->expandHomeDirectory(CREDENTIALS_PATH);
    if (file_exists($credentialsPath)) {
      $accessToken = json_decode(file_get_contents($credentialsPath), true);
    } else {
      // Request authorization from the user.
      $authUrl = $client->createAuthUrl();
      printf("Open the following link in your browser:\n%s\n", $authUrl);
      print 'Enter verification code: ';
      $authCode = trim(fgets(STDIN));

      // Exchange authorization code for an access token.
      $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);

      // Store the credentials to disk.
      if(!file_exists(dirname($credentialsPath))) {
        mkdir(dirname($credentialsPath), 0700, true);
      }
      file_put_contents($credentialsPath, json_encode($accessToken));
      printf("Credentials saved to %s\n", $credentialsPath);
    }
    $client->setAccessToken($accessToken);

    // Refresh the token if it's expired.
    if ($client->isAccessTokenExpired()) {
      $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
      file_put_contents($credentialsPath, json_encode($client->getAccessToken()));
    }
    return $client;
  }

  /**
   * Expands the home directory alias '~' to the full path.
   * @param string $path the path to expand.
   * @return string the expanded path.
   */
  function expandHomeDirectory($path) {
    $homeDirectory = getenv('HOME');
    if (empty($homeDirectory)) {
      $homeDirectory = getenv('HOMEDRIVE') . getenv('HOMEPATH');
    }
    return str_replace('~', realpath($homeDirectory), $path);
  }

}


?>
