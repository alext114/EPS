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
    <form method="POST" action="dayshift.php"> <button type="button" name="prevEntryButton"
        class="prevButton">Previous Entry</button>&nbsp;&nbsp;
      <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
      <button type="button" name="nextEntryButton" class="nextButton"> Next
        Entry</button></form>
    <form method="POST" action="editEvent.php">
      <div style="text-align: left;"><br>
        <div style="text-align: right;">Deposit Paid <input name="depositCheckBox"
            type="checkbox"></div>
        <br>
        <fieldset name="personalInfoFieldSet"> Name:&nbsp;&nbsp; &nbsp;&nbsp;
          &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
          &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <label form="nameLabel">-name-</label>
          <p style="text-align: left;">E-Mail: &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
            &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp; <label form="emailLabel">-email-</label> &nbsp;
            &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp; <br>
          </p>
          <p style="text-align: left;">Phone Number:&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <label form="phoneLabel">XXX-XXX-XXXX</label></p>
          <div style="text-align: left;">Child's Name (If Applicable):&nbsp; <label
              form="childnameLabel">-billy-</label> &nbsp; </div>
          <legend>Personal Information</legend></fieldset>
        <legend></legend></div>
    </form>
    <br>
    <fieldset name="theaterFieldSet"><legend>Theater Information</legend>Theater:&nbsp;&nbsp;
      &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; <label form="theaterNameLabel">-theater
        name-</label>
      <p>Movie: &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <label form="movieNameLabel">dat
          movie son</label> &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; <br>
      </p>
      <p>Date Desired:&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <label form="dateLabel">XX/XX/XXXX</label><label></label></p>
      Time: &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; <label form="timeLabel">11:11 PM</label>
      &nbsp; <legend></legend></fieldset>
    &nbsp; &nbsp; <br>
    <fieldset name="eventinfoFieldSet"><legend>Event Information</legend>Event
      Type:&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; <label form="eventTypeLabel">-event
        type-</label>
      <p>People Attending: &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <label form="numberAttendingLabel">XXX</label><br>
      </p>
      <p>Party Room:&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label form="partyRoomConfirmationLabel">Yes/No</label><label></label></p>
      Party Room Time: &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <label form="partyRoomTimeLabel">11:12
        PM</label> &nbsp; </fieldset>
    <br>
    <fieldset name="additionalInfoFieldSet"><legend>Additional Information</legend>Brief
      Description:<br>
      <br>
      <label form="descLabel">Description Here</label><br>
      <br>
      Special Attention:<br>
      <br>
      <label form="specialneedsLabel">Needs Here</label></fieldset>
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
  </body>
</html>
