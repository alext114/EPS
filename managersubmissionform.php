<?php include 'header.php';
 ?>
<!DOCTYPE html><html>
  <head>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
    <title>W3.CSS Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"> </script>
    <script>
    jQuery(function($){
       $("#phone").mask("999-999-9999");
    });
    </script>
    <style>
body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
body {font-size:16px;}
body {background-color: 	#ffffe0}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
.w3-half img:hover{opacity:1}
</style>
  </head>
  <body>
    <!-- Overlay effect when opening sidebar on small screens -->
    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:340px;margin-right:40px">


      <h1 style=" text-align: center;"><img style="width: 83px; height: 97px;" src="http://clipart.coolclips.com/480/vectors/tf05182/CoolClips_vc015190.png">What's
        Poppin'? <img style="width: 83px; height: 97px;" src="http://clipart.coolclips.com/480/vectors/tf05182/CoolClips_vc015190.png"></h1>
      <br>
<div align="Center" style="font-size: 23px;">
  <fieldset style=" padding-top: 0; padding-bottom: 0;"> <legend style=" padding-top: 0; padding-bottom: 0;">Event Form</legend>
  <form method="POST" action="managerSubmissionConfirm.php">

      <table style="border-collapse:separate; border-spacing:1em;">
        <tr>
          <th colspan="2">Personal Information</th>

        </tr>
      <tr>

        <td>Name:</td> 
        <td><input required="required" name="fullName" type="text" pattern = "[A-Za-z\s\-]{0,}" title="Names can't have numbers!"></td>
      </tr>
      <tr>
          <td>E-Mail:</td>  
          <td><input required="required" name="emailAddress" type="email"></td>
      </tr>

      <tr>
          <td>Phone Number:</td> 
          <td><input required="required" name="phoneNumber" type="tel" id = "phone" pattern = "\d{3}[\-]\d{3}[\-]\d{4}" placeholder="XXX-XXX-XXXX" title = "Please enter your phone number in XXX-XXX-XXXX format, dashes included!"></td>
      </tr>
      <tr>
          <td>Child's Name (If Applicable):</td> 
          <td><input name="childName" type="text" pattern = "[A-Za-z\s\-]{0,}" title="Names can't have numbers!"></td>
       </tr>


       <tr>
         <th colspan="2">Theater Information</th>
       </tr>


          <tr>
          <td>Theater:</td>
          <td><select name="theaterName">
            <option value="Teaneck Cinemas">Teaneck Cinemas</option>
            <option value="Sayville Cinemas">Sayville Cinemas</option>
          </select>
        </td>
      </tr>
        <tr>
          <td>Date Desired:</td>
          <td><input required="required" name="eventDate" type="date"></td>
        </tr>



        <tr>
          <th colspan="2">Event Information</th>
        </tr>

          <tr>
          <td>Type of Event:</td>
          <td><select id = "eventselector" name="eventType">
            <option value="Fundraiser">Fundraiser</option>
            <option value="Walk-In">Walk-In</option>
            <option value="Rental">Rental</option>
            <option value="Private Screening">Private Screening</option>
            <option value="Other">Other</option>
          </select></td>
        </tr>
          <script>
          $('#eventselector').on('change', function () {
var optionSelected = $("option:selected", this);
var valueSelected = this.value;
if(valueSelected === "Rental"){
document.getElementById("timeselect").value = "10:00:00";
document.getElementById("timeselect").readOnly = true;

}
else{
document.getElementById("timeselect").value = null;
document.getElementById("timeselect").readOnly = false;
}
});
</script>
        <tr>
          <td>Time Desired:</td>
          <td><input id = "timeselect" required="required" name="eventTime" type="time"> </td>
        </tr>
        <tr>
          <td>Number of People Attending:</td> 
          <td><input required="required" name="numOfPeople" type="number"></td>
        </tr>
        <tr>
          <td>Party Room:</td>
          <td><select id="partyroomselector" name="partyRoomBook">
            <option value="">Select</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
          </select></td>
        </tr>

        <tr>
          <th colspan="2">Additional Information</th>
        </tr>

          <tr>
          <td>Brief Description:</td>
          <td><textarea required="required" rows="3" name="description" wrap="hard"></textarea></td>
        </tr>
        <tr>
          <td>Special Attention:</td>
          <td><textarea rows="3" name="specialAttention"></textarea></td>
        </tr>
        </table>
      </fieldset>
        <br>

        <div style="text-align: center;">
          <link rel="stylesheet" type="text/css" href="ButtonReferences.css">
          <input name="submitButton" class="submitButton" type="submit"></div>
</form>
</div>
<br>

</body>
</html>
