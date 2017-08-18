<?php
include 'header.php';
?>

<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
    <style>
    body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
    body {font-size:16px;}
    .w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
    .w3-half img:hover{opacity:1}
    body{
      background-color: #d3d3d3
    }
    </style>
  </head>
  <body>
  <div class="w3-main" style="margin-left:340px;margin-right:40px">
     <br>
      <div style="text-align: center;">
        <h1><img style="width: 65px; height: 46px;" src="http://diysolarpanelsv.com/images/agricultural-mechanics-clip-art-10.png">Some
          Maintenance... <img style="width: 65px; height: 46px;" src="http://diysolarpanelsv.com/images/agricultural-mechanics-clip-art-10.png"></h1>
      </div>
      <br>
      <fieldset name="managerFieldSet">
        <button type="button" name="addManagerButton" class="acceptedButton"
        onclick="window.location.href='createmanager.php';">Add
          a Manager</button><br>
        <br>
        <button type="button" name="removeManagerButton" class="changeButton"
        onclick="window.location.href='removemanager.php';">Remove
          a Manager</button> <br>
        <legend>Manager Maintenance</legend></fieldset>
      <br>
      <br>
      <fieldset name="theaterFieldSet">
        <button type="button" name="addTheaterButton" class="acceptedButton" onclick =
         "window.location.href='createtheater.php';">Add
          a Theater</button> <br>
        <br>
        <button type="button" name="removeTheaterButton" class="changeButton" onclick =
         "window.location.href='removetheater.php';">Remove
          a Theater</button> <br>
        <legend>Theater Maintenance</legend></fieldset>
    <br>
    <br>
        </div>
  </body>
</html>
