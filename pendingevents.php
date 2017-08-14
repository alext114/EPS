<!--?php
include 'dbh.php';include 'manager.php';$manager= new manager();$event=$manager--->
<html>
  <head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
  </head>
  <body>viewPendingQueue($db); //fix party room time and partyRoomBook //party
    room time should then appear depending if the they are getting a party room
    // fix the spacing so all the information comes at the same loginPage ?&gt;
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
&lt;&lt;&lt;&lt;&lt;&lt;&lt;
        HEAD:pendingevents.html Popper System<img style="width: 64px; height: 79px;"

          src="http://images.clipartpanda.com/movie-clipart-popcorn3.png"></h2>
    </div>
    <h2 style="text-align: center;"></h2>
    <form method="POST" action="edit.php">
      <div style="text-align: right;">&nbsp;</div>
      <div style="text-align: left;"> ======= Popper System<img style="width: 64px; height: 79px;"

          src="http://images.clipartpanda.com/movie-clipart-popcorn3.png"> </div>
      <h2 style="text-align: center;"></h2>
      <div style="text-align: right;"><br>
      </div>
      <p style="text-align: left;">Personal Information </p>
      <fieldset name="personalInfoFieldSet"><legend>Personal Information</legend>
        <div style="text-align: left;">Name:   <label form="nameLabel"><?php  echo $event['fullName'];  ?></label></div>
        <p style="text-align: left;">E-Mail:   <label form="emailLabel"><?php  echo $event['emailAddress'];?></label>
          <br>
        </p>
        <p style="text-align: left;">Phone Number:   <label form="numberLabel"><?php  echo $event['phoneNumber'];  ?></label></p>
        <div style="text-align: left;">Child's Name (If Applicable):&nbsp; <label

            form="childNameLabel"><?php  echo $event['childName'];?></label> <legend></legend></div>
      </fieldset>
      <br>
      <div style="text-align: left;"> &gt;&gt;&gt;&gt;&gt;&gt;&gt;
        c62f45ba9efc3b035632aea3b3e38a3a83a742c8:pendingevents.php
        <fieldset name="theaterFieldSet"><legend>Theater Information</legend>Theater:
            <label form="theaterNameLabel"><?php  echo $event['theater'];?></label>
          <p>Movie:   <label form="movieNameLabel"><?php  echo $event['movie'];?></label>
            <br>
          </p>
          <p>Date Desired:  <label form="eventdateLabel"><?php  echo $event['eventDate'];?></label></p>
          Time:   <label form="timeLabel"><?php  echo $event['eventTime'];?></label>
          &nbsp; <legend></legend></fieldset>
        <br>
        <fieldset name="eventinfoFieldSet"><legend>Event Information</legend>Event
          Type: <label form="eventTypeLabel"><?php  echo $event['eventType'];?></label>
          <p>People Attending:   <label form="numberAttendingLabel"><?php  echo $event['numOfPeople'];?></label><br>
          </p>
          <p>Party Room:  <label form="partyRoomConfirmationLabel"><?php  echo $event['partyRoomBook'];?></label><label></label></p>
          Party Room Time:   <label form="partyRoomTimeLabel">11:12 PM</label>
        </fieldset>
        <br>
        <fieldset name="additionalInfoFieldSet"><legend>Additional Information</legend>Brief
          Description:<br>
          <br>
          <label form="descLabel"><?php  echo $event['description'];?></label><br>
          <br>
          Special Attention:<br>
          <br>
          <label form="specialneedsLabel"><?php  echo $event['specialAttention'];?></label></fieldset>
        <br>
        Message to be Delivered:<br>
        <br>
        <textarea required="required" rows="3" cols="80" name="messageTextField"></textarea></div>
      <br>
      <br>
      <div style="text-align: center;">
        <div style="text-align: center;">
          <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
          <button type="button" name="acceptButton" class="submitButton">Accept</button> 
          <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
          <button type="button" name="rejectButton" class="rejectButton">Reject</button>
           
          <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
          <button type="button" name="pushButton" class="pushButton">Push!</button></div>
      </div>
    </form>
    <br>
    <br>
    <div style="text-align: left;">
      <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
      <button type="button" name="editInfoButton" class="editButton">Edit
        Information</button></div>
    <div style="text-align: right;"> <button type="button" name="backButton" class="backButton"

        onclick="window.location.href='home.php';">Back</button> </div>
    
  </body>
</html>
