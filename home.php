<?php session_start();

 ?>
<!DOCTYPE html><html>
  <head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <title>EPS Home</title>
    <style>
    body{
      background-color: #f1f1f1
    }
  </style>
  </head>
  <body>
    <div style="text-align: center;">Logged in as <label form="nameLabel"><?php echo $_SESSION['username'];?></label>
      .<br>
      <h2 style="text-align: center;"><img style="width: 64px; height: 79px;" src="http://images.clipartpanda.com/movie-clipart-popcorn3.png">Event
        Popper System<img style="width: 64px; height: 79px;" src="http://images.clipartpanda.com/movie-clipart-popcorn3.png"></h2>
      <br>
      <iframe src="https://calendar.google.com/calendar/embed?src=33fk84kf0rdcqb7frkm8f1ocl0%40group.calendar.google.com&amp;ctz=America/New_York"

        style="border: 0" scrolling="no" frameborder="0" height="600" width="800"></iframe>
      <form method="POST" action="quicksearch.php">
        <div style="text-align: right;"><input name="eventDateTextBox" type="date"></div>
        <div style="text-align: left;"> <br>
          <div style="text-align: right;">
            <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
            <button type="button" name="searchButton" class="searchButton" href="ButtonReferences.css">
              Quick Search</button></div>
        </div>
      </form>
      <form method="POST" action="namesearch.php">
        <div style="text-align: center;"><input name="namesearchTextBox" type="text">
          <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
          <button type="button" name="namesearchButton" class="searchNameButton">
            Name Search</button></div>
      </form>
      <br>
      <div>
        <div style="text-align: center;">
          <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
          <button type="button" name="pendingEventButton" class="pendingButton"

            onclick="window.location.href='pendingevents.php';"> Manage Pending
            Events</button>
          <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
          <button type="button" name="acceptedEventButton" class="acceptedButton"

            onclick="window.location.href='acceptedevents.php';"> Manage
            Accepted Events</button> </div>
      </div>
      <br>
      <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
      <a href="managersubmissionform.html" name="createButton" class="changeButton">
        Create Event</a>
      <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
      <button type="button" name="depositcheckerButton" class="checkButton" onclick="window.location.href='depositchecker.html';">
        Check Unpaid Deposits</button> </div>
    <br>
    <br>
    <div style="text-align: justify;">
      <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
      <a href="manage.html" class="editButton"> Manage Accounts</a> <br>
      <form method="POST" action="logout.php">
        <div style="text-align: right;">
          <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
          <button type="button" name="logoutButton" class="logoutButton"> Logout</button></div>
      </form>
    </div>
  </body>
</html>
