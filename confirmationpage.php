<?php
//start session
session_start();

//Captcha test
$captcha=$_POST['g-recaptcha-response'];
$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LdWmTAUAAAAALo1rWnpAh6_4WSs_hG0img9IKuW&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
$obj = json_decode($response);
if($obj->success == true)
{
     //passes test
    $_SESSION['customerInfo']= array(
      "fullName"=>$_POST["fullName"], "emailAddress"=>$_POST["emailAddress"], "phoneNumber"=>$_POST["phoneNumber"], "eventDate"=>$_POST["eventDate"], "description"=>$_POST["description"], "movie"=>$_POST["movie"], "eventTime"=>$_POST["eventTime"],
      "rate"=>'', "numOfPeople"=>$_POST["attendance"], "specialAttention"=>$_POST["specialAttention"],
      "eventType"=>$_POST["eventType"], "partyRoomBook"=>$_POST["partyRoomBook"], "childName"=>$_POST["childName"], "theaterName"=>$_POST["theaterName"]);


}
else{
  print '<script>alert("ReCaptcha failed. Redirecting back to submission form...");</script>';
  print '<script>window.location.assign("submissionform.html");</script>';

}
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <title>What's Poppin Events</title>

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
<form action="customerSubmitProcessing.php" method="post">
    <div style="color: black;"class="row">

      <h4>Personal Information</h4>
      <div class="input-group" >
        <label>Full Name: <?php  echo $_POST['fullName'];  ?></label>

      </div>
      <div class="input-group">
        <label>Email Address: <?php  echo $_POST['emailAddress'];  ?></label>

      </div>
      <div class="input-group">
        <label>Phone Number: <?php  echo $_POST['phoneNumber'];  ?></label>

      </div>
      <div class="input-group">
        <label>Child Name (If applicable): <?php  echo $_POST['childName'];  ?></label>

      </div>
    </div>
    <div style="color: black;" class="row">


        <h4>Theater Information</h4>


            <div class="row">

                <!--Header Here -->
                <div class="col-half">

                <div class="input-group">
                  <label>Movie: <?php  echo $_POST['movie'];  ?></label>



              </div>
</div>

                <!--Header Here -->
                <div class="col-half">

                <div class="input-group">
                  <label>Theater: <?php  echo $_POST['theaterName'];  ?></label>



              </div>
</div>






    </div>





    </div>
    <h4>Event Information</h4>





    <div style="color: black;" class="row">

        <!--Header Here -->
        <div class="col-half">

        <div class="input-group">
          <label>Event Type: <?php  echo $_POST['eventType'];  ?></label>


      </div>
</div>

      <div class="col-half">

      <div class="input-group">
        <label>Number of People: <?php  echo $_POST['attendance'];  ?></label>


    </div>
</div>

<div style="color: black;" class="row">

  <div class="col-half">

    <div class="input-group">
      <label>Date: <?php  echo $_POST['eventDate'];  ?></label>


    </div>
  </div>
  <div class="col-half">
    <div class="input-group">
      <label>Time: <?php  echo $_POST['eventTime'];  ?></label>

    </div>
  </div>
</div>




</div>
<div style="color: black;" class="row">
  <div class="col-half">
    <div class="input-group">
      <label>Party Room?: <?php  echo $_POST['partyRoomBook'];  ?></label>

           <h6> *Note: Party Room has an extra fee*</h6>

    </div>
  </div>


    </div>
<div style="color: black;" class="row">
  <div class="input-group">
    <label>Description: <?php  echo $_POST['description'];  ?></label>

        </div>

    </div>
    <div style="color: black;" class="row">
      <div class="input-group">
        <label>Special Attention: <?php  echo $_POST['specialAttention'];  ?></label>
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

      <div class="col-half">
        <div class="input-group">

          <input type="button" value="Wait I Need to Edit!" name="abortButton" onclick="window.location.assign('submissionform.html');">
</div>

      </div>
      <div class="col-half">
        <div class="input-group">
          <input type="submit" value="Sounds Good!">

        </div>
      </div>
    </div>



  </form>
</div>


</body>
</html>
<!--
