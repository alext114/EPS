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
      background-color: #FFEFD5
    }
  </style>
  </head>
  <body>
    <div class="w3-main" style="margin-left:340px;margin-right:40px">
    <h2><img style="width: 153px; height: 124px;" src="http://clipart-library.com/images/BcgKM4A9i.png"></h2>
    <h2></h2>
    <h2>Search Results for... <label form="nameLabel">name </label></h2>
    <h2>Last E-mail Used: <label form="emailLabel">e-mail here</label></h2>
    <table style="width: 100%" border="1">
      <tbody>
        <tr>
          <th id="event">Event</th>
          <th id="date">Date</th>
          <th id="time">Time</th>
          <th id="partyroom">Party Room?</th>
        </tr>
        <tr>
          <td headers="event" style="text-align: center;"><br>
          </td>
          <td headers="date" style="text-align: center;"><br>
          </td>
          <td headers="time" style="text-align: center;"><br>
          </td>
          <td headers="partyroom" style="text-align: center;"><br>
          </td>
        </tr>
      </tbody>
    </table>
    <p> </p>
    <br>
    <div style="text-align: center;">
      <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
      <button type="button" name="eventButton" class="acceptedButton" onclick="window.location.href='acceptedevents.html';">
        Go to Event</button> </div>
    <br>
    <div style="text-align: right;"><br>
    </div>
    <br>
    </div>
  </body>
</html>
