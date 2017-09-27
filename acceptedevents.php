<?php
include 'header.php';

//create manager and get an array of all the events

$event=$manager->viewAccepted($db);


?>


<html>
  <head>
    <title>acceptedeventsPage</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <style>
    body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
    body {font-size:16px;}
    .w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
    .w3-half img:hover{opacity:1}
    body{
      background-color: #ffecd0
    }
    </style>
  </head>
  <body onload="check()">
    <div class="w3-main" style="margin-left:340px;margin-right:40px">

      <div style="text-align: center;">
        <h2 style="text-align: center;"><img style="width: 64px; height: 79px;" src="http://images.clipartpanda.com/movie-clipart-popcorn3.png">Accepted Events<img style="width: 64px; height: 79px;" src="http://images.clipartpanda.com/movie-clipart-popcorn3.png"></h2>
      </div>
    <div align = 'center' >
    <button align= 'left' type="button" id="prevButton" class="prevButton" onclick="prevEvent()">Previous
      Entry</button> 

    <button align= 'right' type="button" id="nextButton" class="nextButton" onclick="nextEvent()">
      Next Entry</button>

    </div>
    <form method="post" id="editForm"name="editForm" action="editAcceptedEvents.php?">
      <div style="text-align: left;"><br>
        <fieldset name="personalInfoFieldSet"> <strong>Name:</strong>  <label

            id="fullName"> </label>
          <p style="text-align: left;"><strong>E-Mail: </strong>  <label id="emailAddress"></label>
              <br>
          </p>
          <p style="text-align: left;"><strong>Phone Number:</strong> <label id="phoneNumber"></label></p>
          <div style="text-align: left;"><strong>Child's Name (If Applicable):</strong>&nbsp;
            <label id="childName"></label> &nbsp; </div>
          <legend><strong>Personal Information</strong></legend></fieldset>
        <legend></legend></div>

    <br>
    <fieldset name="theaterFieldSet"><legend><strong>Theater Information</strong></legend><strong>Theater:
        </strong>   <label id="theater"></label>
      <p><strong>Movie:</strong>  <label id="movie"></label>   <br>
      </p>
      <p><strong>Date Desired:</strong>  <label id="eventDate"></label></p>
      <strong>Time:</strong> &nbsp; <label id="eventTime">  </fieldset>
    <br>
    <fieldset name="eventinfoFieldSet"><legend><strong>Event Information</strong></legend>

      <strong>Event Type:</strong>  <label id="eventType"></label>
      <p><strong>People Attending:</strong> <label id="numOfPeople"></label><br>
      </p>

      <div align='left'>
        <strong>Deposit Paid:</strong> &nbsp;
        <label id='depositPaid'></label>
      </div>

      <p><strong>Party Room:</strong>  <label id="partyRoomBook" form="partyRoomConfirmationLabel"></label></p>
      <label id="partyRoomTimeHeaderID" style="display: none"><strong>Party
          Room Time:</strong> </label>   <label id="partyRoomTime" form="partyRoomTimeLabel"

        style="display: none"></label>
        <br>

      </fieldset>

    <script>
    /*
    script for partyRoomTime bring back when needed. sorry slu

          function check(){
          var confirm = $('#partyRoomBook').text();
   if(confirm === "Yes"){
     $("#partyRoomTimeHeaderID").show();
     $("#partyRoomTime").show();
   }
   else{
     $("#partyRoomTimeHeaderID").hide();
     $("#partyRoomTime").hide();
   }
};
       */
        </script> <br>

    <fieldset name="additionalInfoFieldSet"><legend><strong>Additional
          Information</strong></legend><strong>Brief Description:</strong> <br>
      <label id="description"></label> <br>
      <br>
      <strong>Special Attention:<br>
      </strong>

      <label id="specialAttention"></label></fieldset>
    <br>
    <br>

      <br>

    <div style="text-align: center;">





      <link rel="stylesheet" type="text/css" href="editinformation.php">
      <input type="hidden" name="eventID" name="eventID" value=''>

      <a href="#" class="editButton" onclick="editEvent();">Edit Information</a></div>


        <br>
</form>
<div align='center'>
  <form method="post" id="finalizeForm" name="finalizeForm" action="finalizeEvent.php?">
          <a href="#" class="editButton" onclick="finalizeEvent();">Finalize Event</a>
    <input type="hidden" name="eventID" value=''>
</form>
<br>
</div>

    <script>

    //declare the index var
     var index=0;
    //pass php array to javascript
    var acceptedEvent= <?php echo json_encode($event); ?>;

    if (acceptedEvent[0]['fullName'] == "undefined"){

  //change content nothing
    document.getElementById("fullName").innerHTML = "";
    document.getElementById("emailAddress").innerHTML = "";
    document.getElementById("phoneNumber").innerHTML = "";
    document.getElementById("childName").innerHTML = "";
    document.getElementById("theater").innerHTML = "";
    document.getElementById("movie").innerHTML = "";
    document.getElementById("eventDate").innerHTML = "";
    document.getElementById("eventTime").innerHTML = "";
    document.getElementById("eventType").innerHTML = "";
    document.getElementById("numOfPeople").innerHTML = "";
    document.getElementById("partyRoomBook").innerHTML ="";
    document.getElementById("partyRoomTime").innerHTML = "";
    document.getElementById("description").innerHTML = "";
    document.getElementById("specialAttention").innerHTML = "";
    document.getElementById("depositPaid").innerHTML = "";
}
    //change content to top of array
    document.getElementById("fullName").innerHTML = acceptedEvent[index]['fullName'];
    document.getElementById("emailAddress").innerHTML = acceptedEvent[index]['emailAddress'];
    document.getElementById("phoneNumber").innerHTML = acceptedEvent[index]['phoneNumber'];
    document.getElementById("childName").innerHTML = acceptedEvent[index]['childName'];
    document.getElementById("theater").innerHTML = acceptedEvent[index]['theaterName'];
    document.getElementById("movie").innerHTML = acceptedEvent[index]['movie'];
    document.getElementById("eventDate").innerHTML = acceptedEvent[index]['eventDate'];
    document.getElementById("eventTime").innerHTML = acceptedEvent[index]['eventTime'];
    document.getElementById("eventType").innerHTML = acceptedEvent[index]['eventType'];
    document.getElementById("numOfPeople").innerHTML = acceptedEvent[index]['numOfPeople'];
    document.getElementById("partyRoomBook").innerHTML = acceptedEvent[index]['partyRoomBook'];
    document.getElementById("partyRoomTime").innerHTML = acceptedEvent[index]['partyRoomTime'];
    document.getElementById("description").innerHTML = acceptedEvent[index]['description'];
    document.getElementById("specialAttention").innerHTML = acceptedEvent[index]['specialAttention'];
    document.getElementById("depositPaid").innerHTML = acceptedEvent[index]['depositAmt'];


      function nextEvent(){
        //if the index is less than amount of events, continue

        if (index < acceptedEvent.length-1){
          document.getElementById("prevButton").disabled = false;
            index++;

            document.getElementById("fullName").innerHTML = acceptedEvent[index]['fullName'];
            document.getElementById("emailAddress").innerHTML = acceptedEvent[index]['emailAddress'];
            document.getElementById("phoneNumber").innerHTML = acceptedEvent[index]['phoneNumber'];
            document.getElementById("childName").innerHTML = acceptedEvent[index]['childName'];
            document.getElementById("theater").innerHTML = acceptedEvent[index]['theaterName'];
            document.getElementById("movie").innerHTML = acceptedEvent[index]['movie'];
            document.getElementById("eventDate").innerHTML = acceptedEvent[index]['eventDate'];
            document.getElementById("eventTime").innerHTML = acceptedEvent[index]['eventTime'];
            document.getElementById("eventType").innerHTML = acceptedEvent[index]['eventType'];
            document.getElementById("numOfPeople").innerHTML = acceptedEvent[index]['numOfPeople'];
            document.getElementById("partyRoomBook").innerHTML = acceptedEvent[index]['partyRoomBook'];
            document.getElementById("partyRoomTime").innerHTML = acceptedEvent[index]['partyRoomTime'];
            document.getElementById("description").innerHTML = acceptedEvent[index]['description'];
            document.getElementById("specialAttention").innerHTML = acceptedEvent[index]['specialAttention'];
            document.getElementById("depositPaid").innerHTML = acceptedEvent[index]['recievedDeposit'];



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
            document.getElementById("theater").innerHTML = acceptedEvent[index]['theaterName'];
            document.getElementById("movie").innerHTML = acceptedEvent[index]['movie'];
            document.getElementById("eventDate").innerHTML = acceptedEvent[index]['eventDate'];
            document.getElementById("eventTime").innerHTML = acceptedEvent[index]['eventTime'];
            document.getElementById("eventType").innerHTML = acceptedEvent[index]['eventType'];
            document.getElementById("numOfPeople").innerHTML = acceptedEvent[index]['numOfPeople'];
            document.getElementById("partyRoomBook").innerHTML = acceptedEvent[index]['partyRoomBook'];
            document.getElementById("partyRoomTime").innerHTML = acceptedEvent[index]['partyRoomTime'];
            document.getElementById("description").innerHTML = acceptedEvent[index]['description'];
            document.getElementById("specialAttention").innerHTML = acceptedEvent[index]['specialAttention'];
            document.getElementById("depositPaid").innerHTML = acceptedEvent[index]['recievedDeposit'];


        }

      }

      function editEvent(){
        document.editForm.eventID.value = acceptedEvent[index]['eventID'];
        document.forms["editForm"].submit();
      }

      function finalizeEvent(){
        document.finalizeForm.eventID.value = acceptedEvent[index]['eventID'];
        document.forms["finalizeForm"].submit();
      }
    </script>
  </div>
  </body>
</html>
