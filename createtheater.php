<?php
include 'header.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
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
    <form method="POST" action="createtheater.php"><br>
      <fieldset name="addTheater"><legend>Add a Theater</legend><br>
        Town of Theater:&nbsp;&nbsp;&nbsp; <input name="theaterNameTextBox" type="text"><br>
        <br>
        <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
        <div style="text-align: center;"> <button type="button" name="createTheaterButton"

            class="acceptedButton">Open Up!</button><br>
        </div>
      </fieldset>
    </form>
    <br>
    </div>
  </body>
</html>
