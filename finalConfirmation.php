<?php
session_start();
$event=array();
$event= $_SESSION['customerInfo'];

//wipe customerInfo
$_SESSION['customerInfo']="";

?>






<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>What's Poppin Events</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/formstyle.css">
      <script src='https://www.google.com/recaptcha/api.js'></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</head>

<body>

<div class="container">
  <div align="center">
  <h2>Let's Get Poppin</h2>
</div>
<form action="finalConfirmation.php" method="post">
    <div style="color: black;"class="row">

      <h4>Personal Information</h4>
      <div class="input-group" >
        <label>Full Name: <?php  echo $event['fullName'];  ?></label>

      </div>
      <div class="input-group">
        <label>Email Address: <?php  echo $event['emailAddress'];  ?></label>

      </div>
      <div class="input-group">
        <label>Phone Number: <?php  echo $event['phoneNumber'];  ?></label>

      </div>
      <div class="input-group">
        <label>Child Name (If applicable): <?php  echo $event['childName'];  ?></label>

      </div>
    </div>
    <div style="color: black;" class="row">


        <h4>Theater Information</h4>


            <div class="row">

                <!--Header Here -->
                <div class="col-half">

                <div class="input-group">
                  <label>Movie: <?php  echo $event['movie'];  ?></label>



              </div>
</div>

                <!--Header Here -->
                <div class="col-half">

                <div class="input-group">
                  <label>Theater: <?php  echo $event['theaterName'];  ?></label>



              </div>
</div>






    </div>





    </div>
    <h4>Event Information</h4>





    <div style="color: black;" class="row">

        <!--Header Here -->
        <div class="col-half">

        <div class="input-group">
          <label>Event Type: <?php  echo $event['eventType'];  ?></label>


      </div>
</div>

      <div class="col-half">

      <div class="input-group">
        <label>Number of People: <?php  echo $event['numOfPeople'];  ?></label>


    </div>
</div>

<div style="color: black;" class="row">

  <div class="col-half">

    <div class="input-group">
      <label>Date: <?php  echo $event['eventDate'];  ?></label>


    </div>
  </div>
  <div class="col-half">
    <div class="input-group">
      <label>Time: <?php  echo $event['eventTime'];  ?></label>

    </div>
  </div>
</div>




</div>
<div style="color: black;" class="row">
  <div class="col-half">
    <div class="input-group">
      <label>Party Room?: <?php  echo $event['partyRoomBook'];  ?></label>

           <h6> *Note: Party Room has an extra fee*</h6>

    </div>
  </div>


    </div>
<div style="color: black;" class="row">
  <div class="input-group">
    <label>Description: <?php  echo $event['description'];  ?></label>

        </div>

    </div>
    <div style="color: black;" class="row">
      <div class="input-group">
        <label>Special Attention: <?php  echo $event['specialAttention'];  ?></label>
            </div>

        </div>
    <div style="color: black;" class="row">
      <h4>Terms and Conditions</h4>
      <label style="font-size: 12px;">All movies start promptly at agreed show time. Party rental rates include up to 27 people
        TOTAL. Additional guests can receive popcorn and soda for an added charge of $7 per guest ($8 for 3D films).
<br>
<br>
Please Note: Films are scheduled through our distributors on a weekly basis and we
cannot guarantee availability of any film. We will do our best to accommodate your party
requests but we cannot be held accountable for distributors’ changes.
<br></br>
YOUR EVENT IS NOT OFFICAL UNTIL IT IS ACCEPTED BY THE THEATER AND THE DEPOSIT ($50) HAS BEEN PAID.
<br><br>
We reserve the right
to cancel all events with 48 hours notice by refunding the full amount of the deposit.
Upon cancellation, deposits may be refunded up until one week before the event.
<br><br>
</label>
    </div>

<div>

</div>
    <div class="row">
      <label>You have successfully submitted an event request with <?php  echo $event['theaterName'];  ?>. If desired, print this page for your personal records and then close this window.</label>


    </div>



  </form>
</div>


</body>
</html>
