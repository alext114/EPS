<!DOCTYPE html>
<?php
include 'header.php';


$editEvent=$_POST['eventID'];
$eventID= $_POST['eventID'];
$event=$manager->editEvent($db, $editEvent);

?>
<html>

  <body>
  <style>
  body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
  body {font-size:16px;}
  .w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
  .w3-half img:hover{opacity:1}
  body{
    background-color: #ffecd0
  }
  </style>
    <div class="w3-main" style="margin-left:340px;margin-right:40px">
    <form method="POST" action="editAcceptedEventsConfirm.php">
      <h2 style="text-align: center;">
        <img style="width: 64px; height: 79px;" src="http://images.clipartpanda.com/movie-clipart-popcorn3.png">Event
        Popper System<img style="width: 64px; height: 79px;" src="http://images.clipartpanda.com/movie-clipart-popcorn3.png"></h2>
      <fieldset name="personalInfoFieldSet">Name:&nbsp;&nbsp; &nbsp;&nbsp;
        &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp; <input name="fullName" type="text" value="<?php echo $event['fullName']; ?>">
        <p>E-Mail: &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
          <input name="emailAddress" type="email" value="<?php echo $event['emailAddress']; ?>"> &nbsp; &nbsp;
          &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp; <br>
        </p>
        <p>Phone Number:&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp; &nbsp; <input name="phoneNumber" value="<?php echo $event['phoneNumber']; ?>" type="tel"></p>
        Child's Name (If Applicable):&nbsp; &nbsp;&nbsp; <input name="childName" type="text" value="<?php echo $event['childName']; ?>">
        <legend>Personal Information</legend></fieldset>
      <p><br>
      </p>
      <fieldset name="theaterFieldSet">Theater:
        <label name="theaterName"><?php echo $event['theaterName']; ?></label>
        <br>
        <br>
        Movie:  <input required="required" name="movie" type="text" value="<?php echo $event['movie']; ?>"><br>
        <br>
        Date Desired:  <input required="required" name="eventDate" type="date" value="<?php echo $event['eventDate']; ?>">
        <br>
        <br>
        Time Desired: <input name="eventTime" type="time" value="<?php echo $event['eventTime']; ?>"> <legend>Theater
          Information</legend></fieldset>
      &nbsp;<br>
      <fieldset name="eventInfoFieldSet">Type of Event:&nbsp;&nbsp; &nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
        <Label name="eventType"><?php echo $event['eventType']; ?></label>
        <br>
        <br>
        Number of People Attending:&nbsp;&nbsp;&nbsp; <input name="numOfPeople" type="number" value="<?php echo $event['numOfPeople']; ?>"><br>
        <br>
        Party Room:&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        <select name="partyRoomBook" selected='selected'>
          <option selected><?php echo $event['partyRoomBook']; ?></option>

          <option value="">No</option>
          <option value="">Yes</option>
        </select>
        <legend>Event Information</legend></fieldset>
      <br>
      <br>
      Brief Description: <br>
      <textarea rows="3" cols="80" name="description" wrap="hard" ><?php echo $event['description']; ?></textarea>
      <br>
      Special Attention:<br>
      <textarea rows="3" cols="80" name="specialAttention" ><?php echo $event['specialAttention']; ?></textarea><br>
      <br>
      <br>
      <input type="hidden" name="eventID" name="eventID" value="<?php echo $eventID; ?>">

      <div style="text-align: center;">
        <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
        <button type="submit" name="saveChangesButton" class="prevButton">Save Changes</button>
        &nbsp;
        <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
        <a href="acceptedevents.php" class="rejectButton">Discard Changes</a>
        </div>
      <br>
      <div style="text-align: right;">
        <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
        <button type="submit" name="deleteEventButton"  onclick="confirm('Are you sure you want to delete this Event? (Warning: If there was a deposit, refund will have to be given!)')" class="deleteButton">
          Delete Event</button> </div>
<br>
    </form>
  </body>
</html>
