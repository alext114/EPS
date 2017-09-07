<?php
include 'header.php';

include 'admin.php';

$admin= new admin();
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
    <form id="removeManager" method="POST" action="removemanagerConfirm.php"><br>
      <fieldset name="deleteManagerFieldSet"><legend>Remove a Manager...</legend>


        Select Username:&nbsp;
        <?php $managers=$admin->getManagers($db); ?>

        <select name="managerSelection">
        <?php  foreach($managers as $manager): ?>
          <option value=<?php echo $manager['username']; ?>>
            <?php echo $manager['username']; ?>
          </option>

      <?php endforeach ?>
        </select>

        <br>
        <br>
        <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
        <div style="text-align: center;">
          <button type="button" name="deleteManagerButton" onclick="ConfirmDelete()"class="deleteButton"> Remove Manager</button> </div>
      </fieldset>
      <script>

        function ConfirmDelete()
          {
            var x = confirm("Are you sure you want to delete this manager?");
            if (x){

            document.getElementById("removeManager").submit();
            }
            else{
              //return false;
          }
          }
      </script>
    </form>
  </div>
  </body>
</html>
