<?php
session_start();
$event=array();
$event= $_SESSION['customerInfo'];

//wipe customerInfo
$_SESSION['customerInfo']="";

?>






<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>What's Popping Events</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Fare Order Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<!-- font-awesome-icons -->
<link href="css/font-awesome.css" rel="stylesheet">
<!-- //font-awesome-icons -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!--fonts-->
<link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Niconne" rel="stylesheet">
<!--//fonts-->

<!--ZA WARUDO-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!--//ZA WARUDO-->

</head>
<body>
<!--background-->
<h1> Event Popper </h1>
    <div class="bg-agile">
	<div class="book-appointment">
	<h2>You're all set! Feel free to print this page for your records.</h2>
						<div class="book-form agileits-login">
							<form action="#" method="post">
								<div class="phone_email">
									<label>Full name : </label>
									<div class="form-text">

										<label form="nameLabel"><?php  echo $event['fullName'];  ?></label>
									</div>
								</div>
								<div class="phone_email phone_email1">
									<label>Email : </label>
									<div class="form-text">

										<label form="emailLabel"><?php  echo $event['emailAddress'];?></label>
									</div>
								</div>
								<div class="phone_email">
									<label>Phone number : </label>
									<div class="form-text">

										<label form="numberLabel"><?php  echo $event['phoneNumber'];  ?></label>
									</div>
								</div>
								<div class="phone_email phone_email1">
									<label>Child's Name (If Applicable): </label>
									<div class="form-text">

                    <label form="childNameLabel"><?php  echo $event['childName'];?></label> <legend></legend>
									</div>
								</div>
								<div class="clear"></div>
								<div class="agileits_reservation_grid">
                  <div class="phone_email">
                    <!-- start_section_room -->
                    <label>Theater Name: </label>
                    <div class="form-text">

                      <label form="theaterNameLabel"><?php  echo $event['theaterName'];?></label>
                    </div>
                  </div>

                  <div class="phone_email phone_email1">
                    <!-- start_section_room -->
                    <label>Movie Desired: </label>
                    <div class="form-text">

                      <label form="movieNameLabel"><?php  echo $event['movie'];?></label>
                    </div>
                  </div>

									<div class="phone_email">
										<label>Date : </label>
										<div class="form-text">

											<label form="eventdateLabel"><?php  echo $event['eventDate'];?></label>

										</div>
									</div>

                  <div class="phone_email phone_email1">
                    <!-- start_section_room -->
                    <label>Time: </label>
                    <div class="form-text">
                      <label form="timeLabel"><?php  echo $event['eventTime'];?>
                    </div>
                  </div>

									<div class="phone_email">
										<label>Type of Event : </label>
										<!-- start_section_room -->
										<div class="form-text">

											<label form="eventTypeLabel"><?php  echo $event['eventType'];?></label>
										</div>
									</div>

                  <div class="phone_email phone_email1">
                    <!-- start_section_room -->
                    <label>Number of People Attending: </label>
                    <div class="form-text">

                      <label form="numberAttendingLabel"><?php  echo $event['numOfPeople'];?></label>
                    </div>
                  </div>

                  <div class="phone_email">

                    <!-- start_section_room -->
                    <div class="form-text">

                      <label>Party Room: </label>
                      <label form="partyRoomConfirmationLabel"><?php  echo $event['partyRoomBook'];?></label>
                    </div>
                  </div>

                  <div class="phone_email phone_email1">
                    <!-- start_section_room -->
                    <label id = "partytimeIDHeader">Party Time: </label>
                    <div class="form-text">
                      <input id = "partyroomTextID" name="partyTimeTextBox" style="display: none" type="time" value="">
                    </div>
                  </div>

                  <div class="span1_of_1">
                    <!-- start_section_room -->
                    <label>Brief Description: </label>
                    <div class="form-text">

                      <label form="descLabel"><?php  echo $event['description'];?></label><br>
                    </div>
                  </div>

                  <div class="span1_of_1">
                    <!-- start_section_room -->
                    <label>Special Attention: </label>
                    <div class="form-text">

                      <label form="specialneedsLabel"><?php  echo $event['specialAttention'];?></label>
                    </div>
                  </div>

									<div class="clear"></div>
								</div>
												<div class="wthree-text">

												<div class="clearfix"> </div>
											</div>

                      <h2>You should receive an e-mail from a representative as soon as
                      possible.</h2>

                      <h2>Thanks for booking with <?php echo $event['theaterName']?>! </h2>

                      <label>Close this tab whenever you're done.</label>
							</form>
						</div>

		</div>
   </div>
   <!--copyright-->
			<div class="copy w3ls">
		       <p>&copy; 2017. Fare Order Form . All Rights Reserved  | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
	        </div>
		<!--//copyright-->
		<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		<!-- Calendar -->
				<link rel="stylesheet" href="css/jquery-ui.css" />
				<script src="js/jquery-ui.js"></script>
				  <script>
						  $(function() {
							$( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
						  });
				  </script>
			<!-- //Calendar -->

</body>
</html>
