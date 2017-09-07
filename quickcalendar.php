<?php
include 'header.php';

$eventManager=new eventManager();
$events=$eventManager->quickCalendar($db, $_GET['eventDateTextBox']);
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" type="text/css" href="ButtonReferences.css">

    <title>quickcalendar</title>
    <style>
    body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
    body {font-size:16px;}
    .w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
    .w3-half img:hover{opacity:1}
    body{
      background-color: #ADD8E6
    }




  </style>

  </head>

  <body>
    <div class="w3-main" style="margin-left:340px;margin-right:40px">
      <div align="center">
        <h2 style="text-align: center;"><img style="width: 64px; height: 79px;" src="http://images.clipartpanda.com/movie-clipart-popcorn3.png">Event
          Popper System<img style="width: 64px; height: 79px;" src="http://images.clipartpanda.com/movie-clipart-popcorn3.png"></h2>
      </div>
      <div align="center">
        <h2><label form="dateLabel">Date: <?php echo date('m-d-Y',strtotime($_GET['eventDateTextBox'])); ?></label></h2>
      </div>

    <br>
    <table style="width: 100%" border="1">
      <tbody>
        <tr>
          <th id="name">Name</th>
          <th style="width: 192.933px;" id="email">Email</th>
          <th style="width: 168px;" id="phonenumber">Phone Number</th>
          <th id="event">Event</th>
          <th id="time">Time</th>
          <th id="partyroom">Party Room?</th>
        </tr>
        <?php foreach ($events as $event): ?>
        <tr>
          <td headers="name" style="text-align: center;"> <?php echo $event['fullName']; ?>
          </td>
          <td headers="email" style="text-align: center; margin-left: -91px;"><?php echo $event['emailAddress']; ?>
          </td>
          <td headers="phonenumber" style="text-align: center;"><?php echo $event['phoneNumber']; ?>
          </td>
          <td headers="event" style="text-align: center;"><?php echo $event['eventType']; ?>
          </td>
          <td headers="time" style="text-align: center;"><?php echo $event['eventTime']; ?>
          </td>
          <td headers="partyroom" style="text-align: center;"><?php echo $event['partyRoomBook']; ?>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
    <br>
    </div>
  </body>
</html>
