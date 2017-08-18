<?php
include 'header.php';
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
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
    <form method="POST" action="dayshift.php">
      <div style="text-align: right;">
        <h2><label form="dateLabel">06/06/2006 </label></h2>
      </div>
      <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
      <button type="button" name="prevButton" class="prevButton"> Previous Day</button>&nbsp;&nbsp;
      <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
      <button type="button" name="nextButton" class="nextButton"> Next Day</button>
    </form>
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
        <tr>
          <td headers="name" style="text-align: center;"><br>
          </td>
          <td headers="email" style="text-align: center; margin-left: -91px;"><br>
          </td>
          <td headers="phonenumber" style="text-align: center;"><br>
          </td>
          <td headers="event" style="text-align: center;"><br>
          </td>
          <td headers="time" style="text-align: center;"><br>
          </td>
          <td headers="partyroom" style="text-align: center;"><br>
          </td>
        </tr>
      </tbody>
    </table>
    <br>
    </div>
  </body>
</html>
