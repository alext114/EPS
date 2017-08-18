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
    <form method="POST" action="removemanager.php"><br>
      <fieldset name="deleteManagerFieldSet"><legend>Remove a Manager...</legend>
        Select Theater:&emsp;
        <select name="TheaterSelectionList">
        </select>
        <br>
        <br>
        Select Username:&nbsp;
        <select name="ManagerSelectionList">
        </select>
        <br>
        <br>
        <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
        <div style="text-align: center;"> <button type="button" name="deleteManagerButton"

            onclick="ConfirmDelete()"

            class="deleteButton"> Remove Manager</button> </div>
      </fieldset>
      <script>

        function ConfirmDelete()
          {
            var x = confirm("Are you sure you want to delete this manager?");
            if (x)
                return window.location.href="home.html";
            else
              return false;
          }

      </script>
    </form>
    <br>
  </div>
  </body>
</html>
