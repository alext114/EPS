<?php
include 'header.php';


$event=$manager->viewPendingQueue($db)?>

<html>
  <head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>


    <style>
    body{background-color: #b0e2ff}
    </style>
<title>Pending Events</title>
  </head>
  <body onload="check()"&gt;
    <br>
    <div class="w3-main" style="margin-left:340px;margin-right:40px">

    <div style="text-align: center;">
      <h2 style="text-align: center;"><img style="width: 64px; height: 79px;" src="http://images.clipartpanda.com/movie-clipart-popcorn3.png">Pending Events<img style="width: 64px; height: 79px;" src="http://images.clipartpanda.com/movie-clipart-popcorn3.png"></h2>
    </div>
    <h2 style="text-align: center;"></h2>
    <form method="POST" action="pendingeventsConfirm.php">
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
        <input type="hidden" name="eventID" value=<?php  echo $event['eventID'];?>>

        Message to be Delivered (Reason for postponment/rejection etc.):<br>
        <br>
        <textarea rows="3" cols="80" name="messageTextField"></textarea></div>
      <br>
      <br>
      <div align= "center">

          <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
          <input type="submit" name="acceptButton" class="submitButton" value="Accept"> 
          <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
          <input type="submit" name="rejectButton" class="rejectButton" value="Reject">
        </div>
<br><br>
         <div align="center">
          <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
          <input type="submit" name="pushButton" class="pushButton" value="Push!">
      </div>
    </form>

    <br>
    <br>
    
    </div>
  </body>
</html>
