<?php

  class admin{
  //Variables being declared
    public $adminName;


    public function createManager($db, $newUsername, $newPassword, $newName, $theaterName){
      //hash password
      $hashedPassword= md5($newPassword);

      $query= "INSERT INTO `users`(userID, `username`, `password`, `fullName`, `theaterName`) VALUES (null, '$newUsername','$hashedPassword','$newName','$theaterName')";

      if ($db->query($query) === TRUE)
      {
        print '<script>alert("Manager Created!");</script>';
       //redirects to home.html
      print '<script>window.location.assign("accountmanage.php");</script>';
      }
      else {
          $error= "Error: " . $query . "<br>" . $db->error;
          //print '<script>alert('$error');</script>';
          //redirects to accountmanage.php
          print '<script>window.location.assign("accountmanage.php");</script>';

      }
      $db->close();

    }


    public function deleteManager($db,$userID){

      $query="DELETE FROM `users` WHERE `userID`= '$userID'";
      $result=$db->query($query);
      if ( $result == true)
      {
        print '<script>alert("Manager Deleted!");</script>';
       //redirects to accountmanage.html
    print '<script>window.location.assign("accountmanage.php");</script>';
      }
      else {
          $error= "Error: " . $query . "<br>" . $db->error;
          //print '<script>alert('$error');</script>';
          //redirects to accountmanage.php
          print '<script>window.location.assign("accountmanage.php");</script>';

      }
      $db->close();
    }


    public function getManagers($db){
      $managers= array();
      $query= "SELECT username, userID FROM users";
          $result = $db->query($query);
          $managers=array($result->num_rows);
          $index=0;
      while ($row=$result->fetch_assoc()){
            $managers[$index] = array ("userID"=> $row['userID'], "username"=>$row['username']);

            $index++;
      }
      return $managers;
    }
  }
