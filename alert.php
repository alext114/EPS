<?php

class alert{

  public function rejectEmailCustomer($db, $message, $eventID){
    $result=$db->query("SELECT fullName, mailAddress, theaterName  FROM events WHERE eventID ='$eventID'");

    while($row = $result->fetch_assoc())
    {
      // turn row into an array
      $event= array("fullName"=>$row["fullName"], "emailAddress"=>$row["emailAddress"], "theaterName"=>$row["theaterName"]);


    }

    $to = $event['emailAddress'];
    $subject = $event['theaterName'] . ' Event Rejection';
    $message = 'Reason for rejection: ' . $_POST['messageTextField'];
    $headers = 'From: sapeventplanner@gmail.com' . "\r\n" .
        'Reply-To: sapeventplanner@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);

  }

  public function pushEmailCustomer($db, $message, $eventID){
    $result=$db->query("SELECT fullName, mailAddress, theaterName  FROM events WHERE eventID ='$eventID'");

    while($row = $result->fetch_assoc())
    {
      // turn row into an array
      $event= array("fullName"=>$row["fullName"], "emailAddress"=>$row["emailAddress"], "theaterName"=>$row["theaterName"]);


    }

    $to = $event['emailAddress'];
    $subject = $event['theaterName'] . ' Event Postponment';
    $message = 'Reason for postponement: ' . $_POST['messageTextField'];
    $headers = 'From: sapeventplanner@gmail.com' . "\r\n" .
        'Reply-To: sapeventplanner@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);

  }



}


?>
