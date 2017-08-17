<?php
include 'dbh.php';
include 'manager.php';
$manager= new manager();
$event=$manager->viewPendingQueue($db)?>

<html>
  <head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
  </head>
  <body onload="check()"&gt;
    <title>Pending Events</title>
    <style>
    body{
      background-color: #b0e2ff
    }
  </style>
    <form method="POST" action="logout.php">
      <div style="text-align: right;">
        <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
        <button type="button" name="logoutButton" class="logoutButton">Logout</button></div>
    </form>
    <br>
    <div style="text-align: center;">
      <h2 style="text-align: center;"><img style="width: 64px; height: 79px;" src="http://images.clipartpanda.com/movie-clipart-popcorn3.png">Event
        Popper System<img style="width: 64px; height: 79px;" src="http://images.clipartpanda.com/movie-clipart-popcorn3.png"></h2>
    </div>
    <h2 style="text-align: center;"></h2>
    <form method="POST">
      <div style="text-align: right;">&nbsp;</div>
      <h2 style="text-align: center;"></h2>
      <div style="text-align: right;"><br>
      </div>
      <p style="text-align: left;">Personal Information </p>
      <fieldset name="personalInfoFieldSet"><legend><strong>Personal Information</strong></legend>
        <div style="text-align: left;"><strong>Name:</strong>   <label form="nameLabel"><?php  echo $event['fullName'];  ?></label></div>
        <p style="text-align: left;"><strong>E-Mail:</strong>   <label form="emailLabel"><?php  echo $event['emailAddress'];?></label>
          <br>
        </p>
        <p style="text-align: left;"><strong>Phone Number:</strong>   <label form="numberLabel"><?php  echo $event['phoneNumber'];  ?></label></p>
        <div style="text-align: left;"><strong>Child's Name (If Applicable):</strong>&nbsp;
          <label form="childNameLabel"><?php  echo $event['childName'];?></label>
          <legend></legend></div>
      </fieldset>
      <br>
      <div style="text-align: left;">
        <fieldset name="theaterFieldSet"><legend><strong>Theater Information</strong></legend><strong>Theater:</strong>
            <label form="theaterNameLabel"><?php  echo $event['theaterName'];?></label>
          <p><strong>Movie: </strong>  <label form="movieNameLabel"><?php  echo $event['movie'];?></label>
            <br>
          </p>
          <p><strong>Date Desired:</strong>  <label form="eventdateLabel"><?php  echo $event['eventDate'];?></label></p>
          <strong>Time:</strong>   <label form="timeLabel"><?php  echo $event['eventTime'];?></label>
          &nbsp; <legend></legend></fieldset>
        <br>
        <fieldset name="eventinfoFieldSet"><legend><strong>Event Information</strong></legend><strong>Event
            Type:</strong> <label form="eventTypeLabel"><?php  echo $event['eventType'];?></label>
          <p><strong>People Attending:</strong>   <label form="numberAttendingLabel"><?php  echo $event['numOfPeople'];?></label><br>
          </p>
          <p><strong>Party Room:</strong>  <label id="partyConfirmLabel" form="partyRoomConfirmationLabel"><?php  echo $event['partyRoomBook'];?></label><label></label></p>
          <label id="partyRoomTimeHeaderID" form="partyRoomTimeHeader" style="display: none"><strong>Party
            Room Time: </strong></label>   <label id="partyRoomTimeIDLabel" form="partyRoomTimeLabel"

            style="display: none">11:12 PM</label> </fieldset>
        <script>
          function check(){
          var confirm = $('#partyRoomTimeIDLabel').text();
   if(confirm === "Yes"){
     $("#partyRoomTimeHeaderID").show();
     $("#partyRoomTimeIDLabel").show();
   }
   else{
     $("#partyRoomTimeHeaderID").hide();
     $("#partyRoomTimeIDLabel").hide();
   }
};
        </script> <br>
        <fieldset name="additionalInfoFieldSet"><legend><strong>Additional
              Information</strong></legend><strong>Brief Description:</strong><br>
          <br>
          <label form="descLabel"><?php  echo $event['description'];?></label><br>
          <br>
          <strong>Special Attention:</strong><br>
          <br>
          <label form="specialneedsLabel"><?php  echo $event['specialAttention'];?></label></fieldset>
        <br>
        Message to be Delivered (Reason for postponment/rejection etc.):<br>
        <br>
        <textarea rows="3" cols="80" name="messageTextField"></textarea></div>
      <br>
      <br>
      <div style="text-align: center;">
        <div style="text-align: center;">
          <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
          <input type="submit" name="acceptButton" class="submitButton" value="Accept"> 
          <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
          <input type="submit" name="rejectButton" class="rejectButton" value="Reject">
          <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
          <input type="submit" name="pushButton" class="pushButton" value="Push!"></div>
      </div>
    </form>
    <?php
    //accept the event
    if(isset($_POST['acceptButton'])) {
      //check google calendar to see if date is available

    }
    //reject the event
    if(isset($_POST['rejectButton'])) {
      //check if reason for rejection is filled
      if ($_POST['messageTextField'] == "") {
        echo 'Please provide a reason for the rejection of the event.';
      } else {
        //create mail message
        $to = $event['emailAddress'];
        $subject = $event['theaterName'] . ' Event Rejection';
        $message = 'Reason for rejection: ' . $_POST['messageTextField'];
        $headers = 'From: sapeventplanner@gmail.com' . "\r\n" .
            'Reply-To: sapeventplanner@gmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $message, $headers);
        //remove from database
        $id = $event['eventID'];
        $result=$db->query("DELETE FROM events_queue WHERE eventID = $id");
        if(!$result) {
          echo "Query was unable to be executed";
        } else {
          echo "The pending event was successfully removed from the database";
          $event=$manager->viewPendingQueue($db);
        }
      }
    }
    //push the event to the bottom of the queue
    if(isset($_POST['pushButton'])) {
      //create mail message
      $to = $event['emailAddress'];
      $subject = $event['theaterName'] . ' Event Postponement';
      $message = 'Reason for postponement: ' . $_POST['messageTextField'];
      $headers = 'From: sapeventplanner@gmail.com' . "\r\n" .
          'Reply-To: sapeventplanner@gmail.com' . "\r\n" .
          'X-Mailer: PHP/' . phpversion();
      mail($to, $subject, $message, $headers);
      //remove event from the top of the queue
      $id = $event['eventID'];
      $result=$db->query("DELETE FROM events_queue WHERE eventID = $id");
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
      $depositAmt = 0;
      $recievedDeposit = false;
      $partyRoomBook = $event['partyRoomBook'];
      $childName = $event['childName'];
      $isApproved = false;
      $theaterName = $event['theaterName'];
      $description = $event['description'];
      $result=$db->query("INSERT INTO events_queue (fullName, emailAddress, phoneNumber, eventDate, movie, eventTime, rate, numOfPeople, specialAttention, eventType, depositAmt, recievedDeposit, partyRoomBook, childName, isApproved, theaterName, description) VALUES ('$fullName', '$emailAddress', '$phoneNumber', '$eventDate', '$movie', '$eventTime', $rate, $numOfPeople, '$specialAttention', '$eventType', 0, false, $partyRoomBook, '$childName', 0, '$theaterName', '$description')");
      if(!$result) {
        echo "Query was unable to be executed";
      } else {
        echo "The pending event was successfully pushed to the back of the queue";
        $event=$manager->viewPendingQueue($db);
      }
    }
     ?>
    <br>
    <br>
    <div style="text-align: left;">
      <a href="editinformation.php" class="editButton">Edit Information</a></div>
      <div style="text-align: right;">
      <a href="home.html" class="backButton">Back</a></div>
      <br>
  </body>
</html>
