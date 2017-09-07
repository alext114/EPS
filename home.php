<?php
include 'header.php';


 ?>

 <!DOCTYPE html>
 <html>
 <title>Event Popper Home Page</title>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
 <style>
 .googleCalendar{
   position: relative;
   height: 0;
   width: 100%;
   padding-bottom: 100% ;
 }

 .googleCalendar iframe{
   position: absolute;
   top: 0;
   left: 0;
   width: 100%;
   height: 100%;
 }

 body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
 body {font-size:16px;}
 .w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
 .w3-half img:hover{opacity:1}
 body{background-color: #95B9C7}
 </style>
 <body>


 <!-- Overlay effect when opening sidebar on small screens -->
 <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

 <!-- !PAGE CONTENT! -->
 <div class="w3-main" style="margin-left:340px;margin-right:40px">

   <!-- Header -->
   <div class="w3-container" style="margin-top:80px" id="showcase">
     <h1 class="w3-jumbo"><b><?php $manager->getManagerTheater(); ?>What's in Store... </b><img style="width: 70px; height: 70px;" src="http://clipart-library.com/data_images/359309.png">
     </h1><hr style="width:50px;border:5px solid blue" class="w3-round">
   </div>
   <div class="googleCalendar">
   <!-- Photo grid (modal) -->
   <iframe src="https://calendar.google.com/calendar/embed?src=33fk84kf0rdcqb7frkm8f1ocl0%40group.calendar.google.com&ctz=America/New_York" align="center" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>

 </div>

 </body>
 </html>
