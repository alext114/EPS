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
    <form method="POST" action="createmanager.php"><br>
      <fieldset name="createManagerFieldSet"><legend>Create Manager...</legend><legend>Name:&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; <input required="required"

            name="managerNameTextBox" type="text"><br>
          <br>
          Username: &nbsp;&nbsp;&nbsp; &nbsp; <input required="required" name="userNameTextBox"

            type="text"><br>
          <br>
          Password:&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<input required="required" name="passwordTextBox"

            type="password"> &nbsp; <br>
          <br>
          Confirm Password:&nbsp;&nbsp;&nbsp; <input required="required" name="confirmPasswordTextBox"

            type="password"></legend><br>
        Town of Theater: &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
        <select name="theaterSelectionList">
        </select>
        <br>
        <br>
        <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
        <div style="text-align: center;"> <button type="button" name="createManagerButton"

            class="acceptedButton">Add Manager</button></div>
      </fieldset>
    </form>
    <br>
    </div>
  </body>
</html>
