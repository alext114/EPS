<?php
include 'dbh.php';
include 'manager.php';
$manager= new manager();

if(isset($_POST['payDepositButton'])) {

  if(isset($_POST['select'])){
    $manager->payDeposit($db, $_POST['select']);
    print '<script>alert("Depost Paid!");</script>';
    print '<script>window.location.assign("depositchecker.php");</script>';

  }
  else{
    print '<script>alert("Please select an option!");</script>';
    print '<script>window.location.assign("depositchecker.php");</script>';


  }

}



//email customeer
if(isset($_POST['emailButton'])) {

  if($_POST['messageTextField']===""){
    print '<script>alert("Please type a messaage to send!");</script>';
    print '<script>window.location.assign("depositchecker.php");</script>';

  }
  else{
    //send email code
    print '<script>alert("Email Sent!");</script>';
    print '<script>window.location.assign("depositchecker.php");</script>';

  }

}

?>
