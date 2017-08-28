<?php
include 'header.php';
include 'manager.php';
include 'dbh.php';

$manager=new manager();
$events= $manager->viewNotPaid($db);
 ?>

<!DOCTYPE html>
<html>
  <head>
      <meta content="text/html; charset=UTF-8" http-equiv="content-type">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
      <title>depositrequired</title>
      <style>
      body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
      body {font-size:16px;}
      .w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
      .w3-half img:hover{opacity:1}
      body{
        background-color: #FFEFD5
      }
    </style>
  </head>

  <body>
    <div class="w3-main" style="margin-left:340px;margin-right:40px">
    <h2 style="text-align: center;"><img style="width: 76px; height: 122px;" src="http://clipart-library.com/image_gallery/335689.png">Haven't
      Paid Deposit Yet <img style="width: 76px; height: 122px;" src="http://clipart-library.com/image_gallery/335689.png">
    </h2>
    <p> </p>
    <br>
    <form method="POST" action="depositCheckerConfirm.php">
      <table style="width: 100%" border="1">
        <tbody>
          <tr>
            <th id="select">Select</th>
            <th id="name">Name</th>
            <th style="width: 192.933px;" id="email">Email</th>
            <th style="width: 168px;" id="phonenumber">Phone Number</th>
            <th id="event">Event</th>
            <th id="date">Date</th>
            <th id="time">Time</th>
          </tr>
          <?php foreach ($events as $event): ?>

          <tr>
            <td headers="select" style="text-align: center;"><input type='radio' name='select' value= <?php echo $event['eventID']; ?>
            </td>
            <td headers="name" style="text-align: center;"><?php echo $event['fullName']; ?>
            </td>
            <td headers="email" style="text-align: center; margin-left: -91px;"><?php echo $event['emailAddress']; ?>
            </td>
            <td headers="phonenumber" style="text-align: center;"><?php echo $event['phoneNumber']; ?>
            </td>
            <td headers="event" style="text-align: center;"><?php echo $event['eventType']; ?>
            </td>
            <td headers="date" style="text-align: center;"><?php echo $event['eventDate']; ?>
            </td>
            <td headers="time" style="text-align: center;"><?php echo $event['eventTime']; ?>
            </td>
          </tr>
        <?php endforeach; ?>

        </tbody>
      </table>
      <br>
      <br>
      <br>
      <br>
      <br>
      <div align='center'>
      Want to write an Email? Select the customer you would like in the table...<br>
      <br>
      Write a message:<br>
      <br>
      <textarea rows="3" cols="80" name="messageTextField"></textarea><br>
      <br>
      <br>
      <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
      <div style="text-align: center;"><img style="width: 119px; height: 88px;"

          src="http://clipart-library.com/data_images/405781.png"><br>
        <br>
        <button type="submit" name="emailButton" class="editButton">Email Customer!</button>
        <button type="submit" name="payDepositButton" class="editButton">Pay Deposit</button>

      </div>
        </div>
    </form>
    <br>
      </div>
  </body>
</html>
