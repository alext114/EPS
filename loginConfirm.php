<?php
  /*Checks the username and password when employee
  tries to login.*/
  //start session
  session_start();
  //connect to database
  include 'dbh.php';
  include 'loginClass.php';
  global $db;


$login= new loginClass();
$login->verifyLogin($db,$_POST['username'],$_POST['pass']);


?>
