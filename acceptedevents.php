<!--?php
include 'dbh.php';include 'manager.php';//create manager and get an array of all the events$manager=new manager();$event=$manager--->
<html>
  <head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
  </head>
  <body onload="check()">viewAccepted($db);
    <title>acceptedeventsPage</title>
    <style>
    body{
      background-color: #ffecd0
    }
  </style>
    <form method="POST" action="logout.php">
      <div style="text-align: right;">
        <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
        <button type="button" name="logoutButton" class="logoutButton">Logout</button></div>
    </form>
    <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
    <button type="button" id="prevButton" class="prevButton" onclick="prevEvent()">Previous
      Entry</button> 
    <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
    <button type="button" id="nextButton" class="nextButton" onclick="nextEvent()">
      Next Entry</button>
    <form method="POST" action="editEvent.php">
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
    </form>
    <br>
    <fieldset name="theaterFieldSet"><legend><strong>Theater Information</strong></legend><strong>Theater:
        </strong>   <label id="theater"></label>
      <p><strong>Movie:</strong>  <label id="movie"></label>   <br>
      </p>
      <p><strong>Date Desired:</strong>  <label id="eventDate"></label></p>
      <strong>Time:</strong>   </fieldset>
    <br>
    <fieldset name="eventinfoFieldSet"><legend><strong>Event Information</strong></legend>
      <div style="text-align: right;"><strong>Deposit Paid</strong> <input name="depositCheckBox"
          type="checkbox"> </div>
      <strong>Event Type:</strong>  <label id="eventType"></label>
      <p><strong>People Attending:</strong>   <label id="numOfPeople"></label><br>
      </p>
      <p><strong>Party Room:</strong>  <label id="partyConfirmIDLabel" form="partyRoomConfirmationLabel"></label></p>
      <label id="partyRoomTimeHeaderID" form="partyRoomTimeHeader" style="display: none"><strong>Party
          Room Time:</strong> </label>   <label id="partyRoomTimeIDLabel" form="partyRoomTimeLabel"
        style="display: none"></label> </fieldset>
    <script>
          function check(){
          var confirm = $('#partyConfirmIDLabel').text();
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
    <br>
    <fieldset name="additionalInfoFieldSet"><legend><strong>Additional
          Information</strong></legend><strong>Brief Description:</strong> <br>
      <label id="description"></label> <br>
      <br>
      <strong>Special Attention:<br>
      </strong>&nbsp;<br>
      <label id="specialAttention"></label></fieldset>
    <br>
    <br>
    <br>
    <div style="text-align: left;">
      <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
      <button type="button" name="editInfoButton" class="editButton">Edit
        Information</button></div>
    <div style="text-align: right;">
      <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
      <button type="button" name="backButton" class="backButton" onclick="window.location.href='home.php';">Back</button></div>
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
