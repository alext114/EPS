<?php
include 'header.php';
include 'dbh.php';
include 'manager.php';
$manager= new manager();?>
<!DOCTYPE html>
<html>
  <head>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
    <title>depositrequired</title>
    <style>
    body{
      background-color: #FFEFD5
    }
  </style>
  </head>
  <body>
    <form method="POST" action="logout.php">
      <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
      <div style="text-align: right;"> <button type="ButtonReferences.css" class="logoutButton">
          Logout</button></div>
    </form>
    <h2 style="text-align: center;"><img style="width: 76px; height: 122px;" src="http://clipart-library.com/data_images/139966.png">Haven't
      Paid Deposit Yet <img style="width: 76px; height: 122px;" src="http://clipart-library.com/data_images/139966.png">
    </h2>
    <p> </p>
    <br>
    <form method="POST">
      <table style="width: 100%" border="1">
        <tbody>
          <tr>
            <th id="name">Name</th>
            <th style="width: 192.933px;" id="email">Email</th>
            <th style="width: 168px;" id="phonenumber">Phone Number</th>
            <th id="event">Event</th>
            <th id="date">Date</th>
            <th id="time">Time</th>
          </tr>
          <!--<tr>
            <td headers="name" style="text-align: center;"><br>
            </td>
            <td headers="email" style="text-align: center; margin-left: -91px;"><br>
            </td>
            <td headers="phonenumber" style="text-align: center;"><br>
            </td>
            <td headers="event" style="text-align: center;"><br>
            </td>
            <td headers="date" style="text-align: center;"><br>
            </td>
            <td headers="time" style="text-align: center;"><br>
            </td>
          </tr>-->
          <?php
          $result=$db->query("SELECT * FROM events WHERE recievedDeposit = 0");
          if($result !== FALSE) {
            while($row = $result->fetch_assoc()) {
              //output result of query into the query
              $name = $row['fullName'];
              $email = $row['emailAddress'];
              $phoneNumber = $row['phoneNumber'];
              $event = $row['eventType'];
              $date = $row['eventDate'];
              $time = $row['eventTime'];
              echo "<tr><td>$name</td>
              <td><input type='radio' name='needDepositRadio' value='$email'>$email</td>
              <td>$phoneNumber</td>
              <td>$event</td>
              <td>$date</td>
              <td>$time</td><tr>";
            }
          } else {
            //no events have unpaid deposits
            echo "All deposits for events have been handled.";
          }
          ?>
        </tbody>
      </table>
      <br>
      <br>
      <br>
      <br>
      <br>
      Want to write an Email? Select the customer you would like in the table...<br>
      <br>
      Write a message:<br>
      <br>
      <textarea required="required" rows="3" cols="80" name="messageTextField"></textarea><br>
      <br>
      <br>
      <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
      <div style="text-align: center;"><img style="width: 119px; height: 88px;"

          src="http://clipart-library.com/data_images/405785.png"><br>
        <br>
        <input type="submit" name="emailButton" class="editButton" value="Email Customer!">
    </form>

    <?php
    if (isset($_POST['emailButton']) && isset($_POST['needDepositRadio'])) {
      //create mail message
      $to = $event['emailAddress'];
      $subject = $event['theaterName'] . ' Event Rejection';
      $message = 'Reason for rejection: ' . $_POST['messageTextField'];
      $headers = 'From: sapeventplanner@gmail.com' . "\r\n" .
          'Reply-To: sapeventplanner@gmail.com' . "\r\n" .
          'X-Mailer: PHP/' . phpversion();
      mail($to, $subject, $message, $headers);
      echo "Email sent successfully";
    }
    ?>
    <br>
    <br>
    <div style="text-align: right;"> <button type="button" name="backButton" class="backButton"

        onclick="window.location.href='home.php';">Back</button> </div>
  </body>
</html>
