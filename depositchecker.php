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
    <form method="POST" action="emailcustomer.php">
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
          <tr>
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
          </tr>
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
        <button type="button" name="emailButton" class="editButton">Email
          Customer!</button> </div>
    </form>
    <br>
    <br>
    <div style="text-align: right;"> <button type="button" name="backButton" class="backButton"

        onclick="window.location.href='home.php';">Back</button> </div>
  </body>
</html>
