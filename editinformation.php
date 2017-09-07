<!DOCTYPE html>
<?php
include 'header.php';

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
    <form method="POST">
      <h2 style="text-align: center;"><img style="width: 64px; height: 79px;" src="http://images.clipartpanda.com/movie-clipart-popcorn3.png">Event
        Popper System<img style="width: 64px; height: 79px;" src="http://images.clipartpanda.com/movie-clipart-popcorn3.png"></h2>
      <fieldset name="personalInfoFieldSet">Name:&nbsp;&nbsp; &nbsp;&nbsp;
        &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp; <input name="nameTextBox" value="<?php echo $event['fullName'] ?>" required="required" id="fullName" type="text">
        <p>E-Mail: &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
          <input name="emailField" id="emailAddress" value="<?php echo $event['emailAddress'] ?>" type="text" required="required"> &nbsp; &nbsp;
          &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp; <br>
        </p>
        <p>Phone Number:&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp; &nbsp; <input name="phonenumberField" type="text" id="phoneNumber" value="<?php echo $event['phoneNumber'] ?>" required="required"></p>
        Child's Name (If Applicable):&nbsp; &nbsp;&nbsp; <input name="childNameTextBox" id="childName" required="required" value="<?php echo $event['childName'] ?>" type="text"><legend>Personal Information</legend></fieldset>
      <p><br>
      </p>
      <fieldset name="theaterFieldSet">Theater Name: <p id="theaterName">(Currently <?php echo $event['theaterName'] ?>)</p>&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;
        <select name="theaterSelectionList">
          <option value="teaneck">Teaneck Cinemas</option>
          <option value="sayville">Sayville Cinemas</option>
        </select>
        <br>
        <br>
        Movie:&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; <input name="movieTextBox" type="text" id="movie" required="required" value="<?php echo $event['movie'] ?>"><br>
        <br>
        Date/Time Desired:&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp; &nbsp;&nbsp; <input name="datetimeOptions" type="datetime-local" id="datetime" required="required" value="<?php echo $event['eventDate'].'T'.$event['eventTime'] ?>"><legend>Theater
          Information</legend></fieldset>
      &nbsp;<br>
      <fieldset name="eventInfoFieldSet">Type of Event: <p id="eventType">(Was a <?php echo $event['eventType'] ?>)</p>&nbsp;&nbsp; &nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
        <select name="eventList">
          <option value="fundraiser">Fundraiser</option>
          <option value="walkin">Walk-In</option>
          <option value="rental">Rental</option>
          <option value="privatescreening">Private Screening</option>
        </select>
        <br>
        <br>
        Number of People Attending:&nbsp;&nbsp;&nbsp; <input name="attendanceTextBox" id="numOfPeople" type="number" required="required" value="<?php echo $event['numOfPeople'] ?>"><br>
        <br>
        Party Room: <p id="partyRoomBook">(Previously set to <?php
        if ($event['partyRoomBook'] == 1) {
          echo "Yes";
        } else {
          echo "No";
        }?>)</p>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        <select name="partyroomConfirmList">
          <option value="">No</option>
          <option value="">Yes</option>
        </select>
        <p>Estimated Rate: &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; <input type="text" id="rate" name="rateTextBox" value="<?php echo $event['rate'] ?>"> </p>
        <legend>Event Information</legend></fieldset>
      <br>
      <br>
      Brief Description: <br>
      <textarea rows="3" cols="80" name="descriptionField" wrap="hard"><?php echo $event['description'] ?></textarea>
      <br>
      Special Attention:<br>
      <textarea rows="3" cols="80" name="attentionField"><?php echo $event['specialAttention'] ?></textarea><br>
      <br>
      <br>
      <div style="text-align: center;">
        <input type="submit" name="saveButton" value="Save Changes" onclick="refreshPage()" class="prevButton">
        &nbsp;
        <a href="pendingevents.php" class="rejectButton">Discard Changes</a>
        </div>
      <br>
      <br>
      <div style="text-align: right;">
        <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
        </div>
          <div style="text-align: right;">
          <a href="pendingevents.php" class="backButton">Back</a></div>
    </form>
    <?php
    if(isset($_POST['saveButton'])) {
      $eventID = $event['eventID'];
      $date = substr($_POST['datetimeOptions'], 0, 10);
      $time = substr($_POST['datetimeOptions'], 11, 5);
      //insert the updated pending event into the queue
      $fullName = $_POST['nameTextBox'];
      $emailAddress = $_POST['emailField'];
      $phoneNumber = $_POST['phonenumberField'];
      $eventDate = $date;
      $movie = $_POST['movieTextBox'];
      $eventTime = $time;
      $rate = $_POST['rateTextBox'];
      $numOfPeople = $_POST['attendanceTextBox'];
      $specialAttention = $_POST['attentionField'];
      $eventType = $_POST['eventList'];
      if ($_POST['partyroomConfirmList'] == "Yes") {
        $partyRoomBook = 1;
      } else {
        $partyRoomBook = 0;
      }
      $childName = $_POST['childNameTextBox'];
      $theaterName = $_POST['theaterSelectionList'];
      $description = $_POST['descriptionField'];
      $result=$db->query("UPDATE events_queue SET fullName = '$fullName', emailAddress = '$emailAddress', phoneNumber = '$phoneNumber', eventDate = '$eventDate', movie = '$movie', eventTime = '$eventTime', rate = '$rate', numOfPeople = '$numOfPeople', specialAttention = '$specialAttention', eventType = '$eventType', depositAmt = 0, recievedDeposit = false, partyRoomBook = '$partyRoomBook', childName = '$childName', isApproved = 0, theaterName = '$theaterName', description = '$description' WHERE eventID = $eventID");
      if(!$result) {
        echo "Query was unable to be executed";
      } else {
        echo "The pending event was succesfully updated";
        $event=$manager->viewPendingQueue($db)
        ?>
        <script>
        function refreshPage() = {
          var acceptedEvent = <?php echo json_encode($event)?>
          document.getElementById("fullName").innerHTML = acceptedEvent['fullName'];
          document.getElementById("emailAddress").innerHTML = acceptedEvent['emailAddress'];
          document.getElementById("phoneNumber").innerHTML = acceptedEvent['phoneNumber'];
          document.getElementById("childName").innerHTML = acceptedEvent['childName'];
          document.getElementById("theaterName").innerHTML = acceptedEvent['theaterName'];
          document.getElementById("movie").innerHTML = acceptedEvent['movie'];
          document.getElementById("datetime").innerHTML = acceptedEvent['eventDate']+"T"+acceptedEvent['eventTime'].substring(0,4);
          document.getElementById("eventType").innerHTML = acceptedEvent['eventType'];
          document.getElementById("numOfPeople").innerHTML = acceptedEvent['numOfPeople'];
          document.getElementById("partyRoomBook").innerHTML = acceptedEvent['partyRoomBook'];
        }
        </script>
        <?php
      }
    }
    ?>
  </body>
</html>
