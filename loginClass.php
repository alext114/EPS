<?php
	public class loginClass{
		//Variables being declared
		var $username;
		var $password;
		var $hash_value;

		function verifyLogin($inputUsername, $inputPassword){
		//receives user input for login from form in employeelogin.php
		 $username = $inputUsername;
		
		 $password =  hashPassword($inputPassword);
		 //query the employee table
		 $query = mysqli_query($db, "SELECT * FROM user WHERE username='$username'");
		 //checks if table exists
		 $exists = mysqli_num_rows($query);
		 $table_users = "";
		 $table_password = "";
		 //if there are returning rows for username
		 if($exists > 0)
		 {
		     //get all rows from query
		     while($row = mysqli_fetch_assoc($query))
		     {
		       /*the first username row is passed on to $table_users,
		       and so on until the query is finished*/
		       $table_users = $row['username'];
		       /*the first password row is passed on to $table_password,
		       and so on until the query is finished*/
		       $table_password = $row['password'];
		     }
		     //checks if there are any matching fields
		     if(($user_name == $table_users) && ($password == $table_password))
		     {
		       //password matches
		       if($password == $table_password)
		       {
		         $_SESSION['username'] = $username;
		             print '<script>window.location.assign("managerFunctions.php");</script>';
		       }
		     }
		     //password does not match username
		     else
		     {
		       print '<script>alert("Incorrect Password!");</script>';
		       //redirects to employeelogin.php
		       print '<script>window.location.assign("loginPage.php");</script>';
		     }
		 }
		 //if table does not exist or no existing username in table
		 else
		 {
		   print '<script>alert("Incorrect Username!");</script>';
		   //redirects to employeelogin.php
		   print '<script>window.location.assign("loginPage.php");</script>';
		 }		
		}

		function hashPassword($inputPassword){
			//check to see if null
			if ($inputPassword != ""){
				//hashing password
				$hash_value=md5($inputPassword);
				//return hash_value
				return $hash_value;
			}

		}
	}



?> 