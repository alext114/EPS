
<?php
include 'header.php';

 ?>

<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
body {font-size:16px;}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
.w3-half img:hover{opacity:1}
</style>
<body>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

  <!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="showcase">
    <h1 class="w3-jumbo"><b>Interior Design</b></h1>
    <h1 class="w3-xxxlarge w3-text-red"><b>Showcase.</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
  </div>

  <!-- Photo grid (modal) -->
  <body>
    <form method="POST" action="logout.php">
      <div style="text-align: right;">
        <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
        <a href="ButtonReferences.css" class="logoutButton"> Logout</a></div>
    </form>
    <h1 style=" text-align: center;"></h1>
    <h1 style=" text-align: center;"><img style="width: 83px; height: 97px;"

        src="http://clipart.coolclips.com/480/vectors/tf05182/CoolClips_vc015190.png">What's
      Poppin'? <img style="width: 83px; height: 97px;" src="http://clipart.coolclips.com/480/vectors/tf05182/CoolClips_vc015190.png"></h1>
    <br>
    <form method="POST" action="managerSubmissionConfirm.php">
      <fieldset name="personalInfoFieldSet">Name:  <input required="required"

          name="fullName" type="text">
        <p>E-Mail:   <input required="required" name="emailAddress" type="email">
            <br>
        </p>
        <p>Phone Number: <input required="required" name="phoneNumber" type="tel"></p>
        Child's Name (If Applicable):  <input name="childName" type="text"><legend>Personal
          Information</legend></fieldset>
      <p><br>
      </p>
      <fieldset name="theaterFieldSet">Theater:
        <select name="theater">
          <option value="Teaneck Cinemas">Teaneck Cinemas</option>
          <option value="Sayville Cinemas">Sayville Cinemas</option>
        </select>
        <br>
        <br>
        Movie:  <input required="required" name="movie" type="text"><br>
        <br>
        Date Desired:  <input required="required" name="eventDate" type="date">
        Time Desired: <input name="eventTime" type="time"> <legend>Theater
          Information</legend></fieldset>
      &nbsp; <br>
      <br>
      <fieldset name="eventInfoFieldSet">Type of Event: 
        <select name="eventType">
          <option value="Fundraiser">Fundraiser</option>
          <option value="Walk-In">Walk-In</option>
          <option value="Rental">Rental</option>
          <option value="Private Screening">Private Screening</option>
        </select>
        <br>
        <br>
        Number of People Attending:  <input required="required" name="numOfPeople"

          type="number"><br>
        <br>
        Party Room: 
        <select id="partyroomselector" name="partyRoomChecker">
          <option value="">Select</option>
          <option value="Yes">Yes</option>
          <option value="No">No</option>
        </select>
        <br>
        <script>$('#partyroomselector').on('change', function () {
var optionSelected = $("option:selected", this);
var valueSelected = this.value;
if(valueSelected === "Yes"){
$("#partytimeIDHeader").show();
$("#partyroomTextID").show();
}
else{
$("#partytimeIDHeader").hide();
$("#partyroomTextID").hide();
}
});</script> <br>
        <label id="partytimeIDHeader" name="partytimeLabel" style="display: none">Time
          Desired:</label>   <input id="partyroomTextID" name="partyRoomTimeBox"

          style="display: none" type="time"><br>
        <legend>Event Information</legend></fieldset>
      <br>
      <br>
      <fieldset name="additionalInfoFieldSet"><legend>Additional
          Information</legend> Brief Description: <br>
        <textarea required="required" rows="3" cols="80" name="description"

wrap="hard"></textarea> <br>
        <br>
        Special Attention:<br>
        <textarea rows="3" cols="80" name="specialAttention"></textarea></fieldset>
      <br>
      <br>
      <br>
      <br>
      <div style="text-align: right;">
        <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
        <input name="submitButton" class="submitButton" type="submit"></div>
</form>
    <br><br>
    <div style="text-align: right;"> <button type="button" name="backButton"

class="backButton" onclick="window.location.href='home.php';">Back</button></div>
  <!-- Modal for full size images on click-->


  <!-- Services -->


  <!-- Designers -->


  <!-- The Team -->


  <!-- Packages / Pricing Tables -->


  <!-- Contact -->


<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"><p class="w3-right">Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-opacity">w3.css</a></p></div>

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}
</script>

</body>
</html>
