<?php
include 'dbh.php';
include 'manager.php';

$manager= new manager();
$event=$manager->viewPendingQueue($db);

//fix party room time and partyRoomBook
// partyRoomBook needs to come up as yes or no depending on 1 or 0
//party room time should then appear depending if the they are getting a party room
// fix the spacing so all the information comes at the same loginPage
// make a fieldset for the description and specialAttention called Extra or something like that
//the push button is too grey
// remove the deposit paid button. it doesnt need to appear here because its accepeted yet.


?>

<!DOCTYPE html>
<html>
  <head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <title>Pending Events</title>
    <style>
    body{
      background-color: #b0e2ff
    }
  </style>
  </head>
  <body>
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
    <form method="POST" action="edit.php">
    <form method="POST" action="eventProcessing.php">
      <div style="text-align: right;">Deposit Paid <input name="depositCheckBox"

          type="checkbox"></div>
      <p style="text-align: left;">Personal Information </p>
      <fieldset name="personalInfoFieldSet"><legend>Personal Information</legend>
        <div style="text-align: left;">Name:&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <label form="nameLabel"><?php  echo $event['fullName'];  ?></label></div>
        <p style="text-align: left;">E-Mail: &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
          &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp; <label form="emailLabel"><?php  echo $event['emailAddress'];?></label> &nbsp;
          &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp; <br>
        </p>
        <p style="text-align: left;">Phone Number:&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <label form="numberLabel"><?php  echo $event['phoneNumber'];  ?></label></p>
        <div style="text-align: left;">Child's Name (If Applicable):&nbsp; <label

            form="childNameLabel"><?php  echo $event['childName'];?></label> &nbsp; <legend></legend></div>
      </fieldset>
      <br>
      <div style="text-align: left;">
        <fieldset name="theaterFieldSet"><legend>Theater Information</legend>Theater:&nbsp;&nbsp;
          &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; <label form="theaterNameLabel"><?php  echo $event['theater'];?></label>
          <p>Movie: &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <label form="movieNameLabel"><?php  echo $event['movie'];?></label> &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; <br>
          </p>
          <p>Date Desired:&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <label form="eventdateLabel"><?php  echo $event['eventDate'];?></label></p>
          Time: &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; <label form="timeLabel"><?php  echo $event['eventTime'];?></label>
          &nbsp; <legend></legend></fieldset>
        &nbsp; &nbsp; <br>
        <fieldset name="eventinfoFieldSet"><legend>Event Information</legend>Event
          Type:&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; <label form="eventTypeLabel"><?php  echo $event['eventType'];?></label>
          <p>People Attending: &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
            &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label form="numberAttendingLabel"><?php  echo $event['numOfPeople'];?></label><br>
          </p>
          <p>Party Room:&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label form="partyRoomConfirmationLabel"><?php  echo $event['partyRoomBook'];?></label><label></label></p>
          Party Room Time: &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <label form="partyRoomTimeLabel">11:12
            PM</label> &nbsp; </fieldset>
        <br>
        Brief Description:<br>
        <br>
      <label form="descLabel"><?php  echo $event['description'];?></label><br>
        <br>
      Special Attention:<br>
      <br>
      <label form="specialneedsLabel"><?php  echo $event['specialAttention'];?></label><br>
        <br>
        Message to be Delivered:<br>
        <br>
        <textarea required="required" rows="3" cols="80" name="messageTextField"></textarea></div>
      <br>
      <br>
      <div style="text-align: center;">
        <div style="text-align: center;">
          <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
          <button type="button" name="acceptButton" class="submitButton">Accept</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
          <button type="button" name="rejectButton" class="rejectButton">Reject</button>
          &nbsp; &nbsp;&nbsp;&nbsp;
          <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
          <button type="button" name="pushButton" class="pushButton">Push!</button></div>
      </div></form>
      <br>
      <br>
      <div style="text-align: left;">
        <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
        <button type="button" name="editInfoButton" class="editButton">Edit
          Information</button></div>
    </form>
    <form method="POST" action="back.php">
      <div style="text-align: right;">
        <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
        <button type="button" name="backButton" class="backButton">Back</button></div>
      <br>
    </form>

  </body>
</html>
