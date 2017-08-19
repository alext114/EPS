<?php
session_start();


?>

<!DOCTYPE html>
<html>
<title>Event Popper</title>
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

  <!-- Sidebar/menu -->
  <nav class="w3-sidebar w3-blue w3-collapse w3-top w3-large w3-padding" style="box-shadow: 1px 1px 40px #808080;z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
    <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
    <div class="w3-container">
      <h3 class="w3-padding-64"><b>Event Popper</b> <img style="width: 30px; height: 45px;" src="http://images.clipartpanda.com/movie-clipart-popcorn3.png"></img></h3>
    </div>
    <div class="w3-bar-block">
      <a href="home.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a>
      <a href="pendingevents.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Pending Events</a>
      <a href="acceptedevents.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Accepted Events</a>
      <a href="managersubmissionform.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Create an Event</a>
      <br><input name="eventDateTextBox" type="date">
      <a href="quickcalendar.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Quick Calendar</a>
      <br><input name="searchTextBox" type="text">
      <a href="searchresults.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Search Results</a><br>
      <a href="accountmanage.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Manage Accounts</a><br>
      <a href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Logout</a>
    </div>
  </nav>

  <!-- Top menu on small screens -->
  <header class="w3-container w3-top w3-hide-large w3-aqua w3-xlarge w3-padding">
    <a href="javascript:void(0)" class="w3-button w3-blue w3-margin-right" onclick="w3_open()">☰</a>
    <span>Event Popper</span>
  </header>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

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
