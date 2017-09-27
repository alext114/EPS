<?php

class alert{


  public function weeklyAgenda(){

  }

  public function acceptEmail($db, $eventID){
    $result=$db->query("SELECT fullName, emailAddress, theaterName FROM events WHERE eventID ='$eventID'");

    while($row = $result->fetch_assoc())
    {
      // turn row into an array
      $event= array("fullName"=>$row["fullName"], "emailAddress"=>$row["emailAddress"], "theaterName"=>$row["theaterName"]);


    }

    $to = $event['emailAddress'];
    $subject = $event['theaterName'] . ' Event Accepted';
    $message ="Dear " . $event['fullName'] . ", " .

"Your booking request at " . $event['theaterName'] . ",  was accepted. Please call the theater at 201-530-7409 to pay the $50.00 deposit to fully confirm and recieve a confirmation email. Or go to the theater at 503 Cedar Lane, Teaneck NJ, 07666 to leave a deposit in person. If you have any questions please call 201-530-7409 and request a manager so your questions can be answered. Please do not reply to this email.";
    $headers = 'From: sapeventplanner@gmail.com' . "\r\n" .
        'Reply-To: sapeventplanner@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);

  }


  public function rejectEmailCustomer($db, $message, $eventID){
    $result=$db->query("SELECT fullName, emailAddress, theaterName FROM events_queue WHERE eventID ='$eventID'");

    while($row = $result->fetch_assoc())
    {
      // turn row into an array
      $event= array("fullName"=>$row["fullName"], "emailAddress"=>$row["emailAddress"], "theaterName"=>$row["theaterName"]);


    }

    $to = $event['emailAddress'];
    $subject = $event['theaterName'] . ' Event Rejection';
    $message = "Dear " . $event['fullName'] . ",

Your booking request at " . $event['theaterName'] . ", was rejected for the following reason: " . $message . " If you have any questions please call 201-530-7409 and request a manager so your questions can be answered. Please do not reply to this email.";
    $headers = 'From: sapeventplanner@gmail.com' . "\r\n" .
        'Reply-To: sapeventplanner@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);

  }

  public function pushEmailCustomer($db, $message, $eventID){
    $result=$db->query("SELECT fullName, emailAddress, theaterName  FROM events_queue WHERE eventID ='$eventID'");

    while($row = $result->fetch_assoc())
    {
      // turn row into an array
      $event= array("fullName"=>$row["fullName"], "emailAddress"=>$row["emailAddress"], "theaterName"=>$row["theaterName"]);


    }

    $to = $event['emailAddress'];
    $subject = $event['theaterName'] . ' Pending Event Postponment';
    $message = "Dear " . $event['fullName'] . ",

Your booking request at " . $event['theaterName'] . ", was postponed for acceptance the following reason: " . $message . " If you have any questions please call 201-530-7409 and request a manager so your questions can be answered. Please do not reply to this email.";

    $headers = 'From: sapeventplanner@gmail.com' . "\r\n" .
        'Reply-To: sapeventplanner@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);

  }




public function depositPaidEmail($db, $eventID){
    $result=$db->query("SELECT fullName, emailAddress, theaterName, eventDate FROM events WHERE eventID ='$eventID'");

    while($row = $result->fetch_assoc())
    {
      // turn row into an array
      $event= array("fullName"=>$row["fullName"], "emailAddress"=>$row["emailAddress"], "theaterName"=>$row["theaterName"], "eventDate"=>$row['eventDate']);


    }

    $to = $event['emailAddress'];
    $subject = $event['theaterName'] . ' Event Deposit Paid';
    $message = 'Thank you ' . $event['fullName'] . ' for paying the deposit for your event at ' . $event['theaterName'] .
    ', We will be waiting for your arrival on ' . $event['eventDate'] . " If you have any questions please call 201-530-7409 and request a manager so your questions can be answered. Please do not reply to this email.";
    $headers = 'From: sapeventplanner@gmail.com' . "\r\n" .
        'Reply-To: sapeventplanner@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);

  }



public function waiveEmail($db, $eventID){
    $result=$db->query("SELECT fullName, emailAddress, theaterName, eventDate FROM events WHERE eventID ='$eventID'");

    while($row = $result->fetch_assoc())
    {
      // turn row into an array
      $event= array("fullName"=>$row["fullName"], "emailAddress"=>$row["emailAddress"], "theaterName"=>$row["theaterName"], "eventDate"=>$row['eventDate']);


    }

    $to = $event['emailAddress'];
    $subject = $event['theaterName'] . ' Event Deposit Waived';
    $message = 'Thank you ' . $event['fullName'] . ' for having for your event at ' . $event['theaterName'] .
    ', We will be waiting for your arrival on ' . $event['eventDate'] . " If you have any questions please call 201-530-7409 and request a manager so your questions can be answered. Please do not reply to this email.";
    $headers = 'From: sapeventplanner@gmail.com' . "\r\n" .
        'Reply-To: sapeventplanner@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);

  }

}


?>
