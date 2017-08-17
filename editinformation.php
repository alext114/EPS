<!DOCTYPE html>
<?php
include 'dbh.php';
include 'manager.php';
$manager= new manager();
$event=$manager->viewPendingQueue($db);

?>
<html>
  <head>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
    <title>editinformation</title>
    <style>
    body{
      background-color: #BDA0CB
    }
  </style>
  </head>
  <body>
    <form method="POST" action="editEvent.php">
      <h2 style="text-align: center;"><img style="width: 64px; height: 79px;" src="http://images.clipartpanda.com/movie-clipart-popcorn3.png">Event
        Popper System<img style="width: 64px; height: 79px;" src="http://images.clipartpanda.com/movie-clipart-popcorn3.png"></h2>
      <fieldset name="personalInfoFieldSet">Name:&nbsp;&nbsp; &nbsp;&nbsp;
        &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp; <input name="nameTextBox" type="text">
        <p>E-Mail: &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
          <input name="emailField" type="email"> &nbsp; &nbsp;
          &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp; <br>
        </p>
        <p>Phone Number:&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp; &nbsp; <input name="phonenumberField" type="tel"></p>
        Child's Name (If Applicable):&nbsp; &nbsp;&nbsp; <input name="childNameTextBox"

          type="text"><legend>Personal Information</legend></fieldset>
      <p><br>
      </p>
      <fieldset name="theaterFieldSet">Town of Theater: &nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;
        <select name="TheaterSelectionList">
        </select>
        <br>
        <br>
        Movie:&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; <input name="movieTextBox" type="text"><br>
        <br>
        Date/Time Desired:&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp; &nbsp;&nbsp; <input name="datetimeOptions" type="datetime-local"><legend>Theater
          Information</legend></fieldset>
      &nbsp;<br>
      <fieldset name="eventInfoFieldSet">Type of Event:&nbsp;&nbsp; &nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
        <select name="EventList">
          <option value="">Fundraiser</option>
          <option value="">Walk-In</option>
          <option value="">Rental</option>
          <option value="">Private Screening</option>
        </select>
        <br>
        <br>
        Number of People Attending:&nbsp;&nbsp;&nbsp; <input name="attendanceTextBox"

          type="number"><br>
        <br>
        Party Room:&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        <select name="partyroomConfirmList">
          <option value="">No</option>
          <option value="">Yes</option>
        </select>
        <legend>Event Information</legend></fieldset>
      <br>
      <br>
      Brief Description: <br>
      <textarea rows="3" cols="80" name="descriptionField" wrap="hard"></textarea>
      <br>
      Special Attention:<br>
      <textarea rows="3" cols="80" name="attentionField"></textarea><br>
      <br>
      <br>
      <div style="text-align: center;">
        <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
        <button type="button" name="saveButton" class="prevButton"> Save Changes</button>
        &nbsp;
        <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
        <a href="pendingevents.php" class="rejectButton">Discard Changes</a>
        </div>
      <br>
      <br>
      <div style="text-align: right;">
        <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
        <button type="button" name="deleteEventButton"  onclick="confirm('Are you sure you want to delete this Event?')" class="deleteButton">
          Delete Event</button> </div>
    </form>
  </body>
</html>
