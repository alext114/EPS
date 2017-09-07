<?php
//start session
session_start();

//Captcha test
$captcha=$_POST['g-recaptcha-response'];
$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lc_RS0UAAAAAAliM5C_DoF3rzN2aS3O1Ngj7Ebo&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
$obj = json_decode($response);
if($obj->success == true)
{
    //passes test
}
else{
  print '<script>alert("ReCaptcha failed. Redirecting back to submission form...");</script>';
  print '<script>window.location.assign("submissionform.html");</script>';

}

?>

<!DOCTYPE, html>
<html>
  <head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <title>customerconfirmation</title>
    <style>
    body{
      background-color: 	#ffffe0
    }
  </style>
  </head>
  <body>
    <form method="POST" action="customerSubmitProcessing.php">
      <h2>Great, please take a second to review your
        information...&nbsp;&nbsp;</h2>
        <h2 style="text-align: center;"></h2>
        <div style="text-align: right;"><br>
        </div>
        <p style="text-align: left;">Personal Information </p>
        <fieldset name="personalInfoFieldSet"><legend>Personal Information</legend>
          <div style="text-align: left;">Name:   <label form="nameLabel"><?php  echo $_POST['fullName'];  ?></label></div>
          <p style="text-align: left;">E-Mail:   <label form="emailLabel"><?php  echo $_POST['emailAddress'];?></label>
            <br>
          </p>
          <p style="text-align: left;">Phone Number:   <label form="numberLabel"><?php  echo $_POST['phoneNumber'];  ?></label></p>
          <div style="text-align: left;">Child's Name (If Applicable):&nbsp; <label

              form="childNameLabel"><?php  echo $_POST['childName'];?></label> <legend></legend></div>
        </fieldset>
        <br>
        <div style="text-align: left;">
          <fieldset name="theaterFieldSet"><legend>Theater Information</legend>Theater:
              <label form="theaterNameLabel"><?php  echo $_POST['theater'];?></label>
            <p>Movie:   <label form="movieNameLabel"><?php  echo $_POST['movie'];?></label>
              <br>
            </p>
            <p>Date Desired:  <label form="eventdateLabel"><?php  echo $_POST['eventDate'];?></label></p>
            Time:   <label form="timeLabel"><?php  echo $_POST['eventTime'];?></label>
            &nbsp; <legend></legend></fieldset>
          <br>
          <fieldset name="eventinfoFieldSet"><legend>Event Information</legend>Event
            Type: <label form="eventTypeLabel"><?php  echo $_POST['eventType'];?></label>
            <p>People Attending:   <label form="numberAttendingLabel"><?php  echo $_POST['numOfPeople'];?></label><br>
            </p>
            <p>Party Room:  <label form="partyRoomConfirmationLabel"><?php  echo $_POST['partyRoomBook'];?></label><label></label></p>
            Party Room Time:   <label form="partyRoomTimeLabel">11:12 PM</label>
          </fieldset>
          <br>
          <fieldset name="additionalInfoFieldSet"><legend>Additional Information</legend>Brief
            Description:<br>
            <br>
            <label form="descLabel"><?php  echo $_POST['description'];?></label><br>
            <br>
            Special Attention:<br>
            <br>
            <label form="specialneedsLabel"><?php  echo $_POST['specialAttention'];?></label></fieldset>
      <h2>You should receive an e-mail from a representative as soon as
        possible.</h2>
      <h3>Thanks for booking with <label form="theaternameLabel"><?php echo $_POST['theater']?></label>! </h3>
      <h2 style="text-align: center;"><img style="width: 64px; height: 79px;" src="http://images.clipartpanda.com/movie-clipart-popcorn3.png"></h2>
      <div style="text-align: right;">
        <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
        <button type="button" name="editButton" class="rejectButton" onclick="window.location.submissionform.html';">Wait I Need to Edit!</button> &nbsp;&nbsp;&nbsp;&nbsp;
        <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
        <button type="submit" name="confirmButton" class="submitButton">Sounds
          Good!</button>
        <p><br>
        </p>
      </div>
    </form>
  </body>
</html>
