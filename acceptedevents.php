<?php
include 'dbh.php';
include 'manager.php';
//create manager and get an array of all the events
$manager=new manager();
$event=$manager->viewAccepted($db);


//Notes for Sly
/*
make the green and blue for buttons brigher
change deposit paid to event information
get all the information to line up
bold the labels i.e: Name: <--- that is bolded
make the font bigger



*/
?>

<!DOCTYPE html>
<html>
  <head>

    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <title>acceptedeventsPage</title>
    <style>
    body{
      background-color: #ffecd0
    }
  </style>
  </head>
  <body>

    <form method="POST" action="logout.php">
      <div style="text-align: right;">
        <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
        <button type="button" name="logoutButton" class="logoutButton">Logout</button></div>
    </form>
    <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
    <button type="button" id="prevButton" class="prevButton" onclick="prevEvent()">Previous Entry</button>&nbsp;&nbsp;
      <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
      <button type="button" id="nextButton" class="nextButton" onclick="nextEvent()" > Next
        Entry</button></form>
    <form method="POST" action="editEvent.php">
      <div style="text-align: left;"><br>
        <div style="text-align: right;">Deposit Paid <input name="depositCheckBox" type="checkbox"></div>
        <br>
        <fieldset name="personalInfoFieldSet"> Name:&nbsp;&nbsp; &nbsp;&nbsp;
          &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
          &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <label id="fullName"> </label>
          <p style="text-align: left;">E-Mail: &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
            &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp; <label id="emailAddress"></label> &nbsp;
            &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp; <br>
          </p>
          <p style="text-align: left;">Phone Number:&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <label id="phoneNumber"></label></p>
          <div style="text-align: left;">Child's Name (If Applicable):&nbsp; <label

              id="childName"></label> &nbsp; </div>
          <legend>Personal Information</legend></fieldset>
        <legend></legend></div>
    </form>
    <br>
    <fieldset name="theaterFieldSet"><legend>Theater Information</legend>Theater:&nbsp;&nbsp;
      &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; <label id="theater"></label>
      <p>Movie: &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <label id="movie"></label>
        &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; <br>
      </p>
      <p>Date Desired:&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <label id="eventDate"></label></p>
      Time: &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; <label id="eventTime"></label>
      &nbsp; </fieldset>
    &nbsp; &nbsp; <br>
    <fieldset name="eventinfoFieldSet"><legend>Event Information</legend>Event
      Type:&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; <label id="eventType"></label>
      <p>People Attending: &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <label id="numOfPeople"></label><br>
      </p>
      <p>Party Room:&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label id="partyRoomBook"></label></p>
      Party Room Time: &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <label id="partyRoomTime"></label> &nbsp; </fieldset>
    <br>
    <fieldset name="additionalInfoFieldSet"><legend>Additional Information</legend>Brief
      Description:
      <br>
      <label id="description"></label>
      <br>
      <br>
      Special Attention:
      <br>
      <label id="specialAttention"></label></fieldset>
    <br>
    <br>
    <br>
    <div style="text-align: left;">
      <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
      <button type="button" name="editInfoButton" class="editButton">Edit
        Information</button></div>
    <form method="POST" action="back.php">
      <div style="text-align: right;">
        <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
        <button type="button" name="backButton" class="backButton">Back</button></div>
    </form>
    <script>

    //declare the index var
     var index=0;
    //pass php array to javascript
    var acceptedEvent= <?php echo json_encode($event); ?>;
    //change content to top of array
    document.getElementById("fullName").innerHTML = acceptedEvent[index]['fullName'];
    document.getElementById("emailAddress").innerHTML = acceptedEvent[index]['emailAddress'];
    document.getElementById("phoneNumber").innerHTML = acceptedEvent[index]['phoneNumber'];
    document.getElementById("childName").innerHTML = acceptedEvent[index]['childName'];
    document.getElementById("theater").innerHTML = acceptedEvent[index]['theater'];
    document.getElementById("movie").innerHTML = acceptedEvent[index]['movie'];
    document.getElementById("eventDate").innerHTML = acceptedEvent[index]['eventDate'];
    document.getElementById("eventTime").innerHTML = acceptedEvent[index]['eventTime'];
    document.getElementById("eventType").innerHTML = acceptedEvent[index]['eventType'];
    document.getElementById("numOfPeople").innerHTML = acceptedEvent[index]['numOfPeople'];
    document.getElementById("partyRoomBook").innerHTML = acceptedEvent[index]['partyRoomBook'];
    document.getElementById("partyRoomTime").innerHTML = acceptedEvent[index]['partyRoomTime'];
    document.getElementById("description").innerHTML = acceptedEvent[index]['description'];
    document.getElementById("specialAttention").innerHTML = acceptedEvent[index]['specialAttention'];


      function nextEvent(){
        //if the index is less than amount of events, continue

        if (index < acceptedEvent.length-1){
          document.getElementById("prevButton").disabled = false;
            index++;

            document.getElementById("fullName").innerHTML = acceptedEvent[index]['fullName'];
            document.getElementById("emailAddress").innerHTML = acceptedEvent[index]['emailAddress'];
            document.getElementById("phoneNumber").innerHTML = acceptedEvent[index]['phoneNumber'];
            document.getElementById("childName").innerHTML = acceptedEvent[index]['childName'];
            document.getElementById("theater").innerHTML = acceptedEvent[index]['theater'];
            document.getElementById("movie").innerHTML = acceptedEvent[index]['movie'];
            document.getElementById("eventDate").innerHTML = acceptedEvent[index]['eventDate'];
            document.getElementById("eventTime").innerHTML = acceptedEvent[index]['eventTime'];
            document.getElementById("eventType").innerHTML = acceptedEvent[index]['eventType'];
            document.getElementById("numOfPeople").innerHTML = acceptedEvent[index]['numOfPeople'];
            document.getElementById("partyRoomBook").innerHTML = acceptedEvent[index]['partyRoomBook'];
            document.getElementById("partyRoomTime").innerHTML = acceptedEvent[index]['partyRoomTime'];
            document.getElementById("description").innerHTML = acceptedEvent[index]['description'];
            document.getElementById("specialAttention").innerHTML = acceptedEvent[index]['specialAttention'];



      }
      //else disable the next button to prevent the user from going further
      else{
        document.getElementById("nextButton").disabled = true;


      }
      }
      function prevEvent(){
        // if the index is equal to 0, disable prevButton abd enable next button
        if (index <= 0){
          document.getElementById("nextButton").disabled = false;
          document.getElementById("prevButton").disabled = true;
        }
        else{
          //else index moves back
          document.getElementById("nextButton").disabled = false;
            index--;
            document.getElementById("fullName").innerHTML = acceptedEvent[index]['fullName'];
            document.getElementById("emailAddress").innerHTML = acceptedEvent[index]['emailAddress'];
            document.getElementById("phoneNumber").innerHTML = acceptedEvent[index]['phoneNumber'];
            document.getElementById("childName").innerHTML = acceptedEvent[index]['childName'];
            document.getElementById("theater").innerHTML = acceptedEvent[index]['theater'];
            document.getElementById("movie").innerHTML = acceptedEvent[index]['movie'];
            document.getElementById("eventDate").innerHTML = acceptedEvent[index]['eventDate'];
            document.getElementById("eventTime").innerHTML = acceptedEvent[index]['eventTime'];
            document.getElementById("eventType").innerHTML = acceptedEvent[index]['eventType'];
            document.getElementById("numOfPeople").innerHTML = acceptedEvent[index]['numOfPeople'];
            document.getElementById("partyRoomBook").innerHTML = acceptedEvent[index]['partyRoomBook'];
            document.getElementById("partyRoomTime").innerHTML = acceptedEvent[index]['partyRoomTime'];
            document.getElementById("description").innerHTML = acceptedEvent[index]['description'];
            document.getElementById("specialAttention").innerHTML = acceptedEvent[index]['specialAttention'];


        }

      }

    </script>
  </body>
</html>
