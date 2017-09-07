
<?php
	 class loginClass{
		//Variables being declared


		function verifyLogin($db, $inputUsername, $inputPassword){
			//receives user input for login from form in managerlogin.php
		   $user_name = mysqli_real_escape_string($db, $inputUsername);
			 //password is hashed
		   $password = mysqli_real_escape_string($db, md5($inputPassword));
			 //query the manager table
		   $query =  "SELECT * FROM users WHERE username='$user_name'";
			 $result= $db->query($query);



			 //checks if table exists


		   $exists = $result->num_rows;

		   $table_users = "";
		   $table_password = "";

		   //if there are returning rows for username
		   if($exists > 0)
		   {
		       //get all rows from query
		       while($row = $result->fetch_assoc())
		       {


		         /*the first username row is passed on to $table_users,
		         and so on until the query is finished*/
		         $table_users = $row["username"];

		         /*the first password row is passed on to $table_password,
		         and so on until the query is finished*/
		         $table_password = $row["password"];

						 /*the first theaterName row is passed on to $table_theaterName,
						 and so on until the query is finished*/
						 $table_theaterName = $row["theaterName"];


		       }
		       //checks if there are any matching fields
		       if(($user_name == $table_users) && ($password == $table_password))
		       {
		         //password matches
		         if($password == $table_password)
		         {
		           $_SESSION['username'] = $user_name;
							 //set theater to the successfull logins theater
							 $_SESSION['theaterName']= $table_theaterName;
							 print '<script>window.location.assign("home.php");</script>';

		         }
		       }
		       //password does not match username
		       else
		       {
		         print '<script>alert("Incorrect Password!");</script>';
		         //redirects to managerlogin.php
		         print '<script>window.location.assign("loginPage.html");</script>';
		       }
		   }
		   //if table does not exist or no existing username in table
		   else
		   {
		     print '<script>alert("Incorrect Username!");</script>';
		     //redirects to managerlogin.php
		    	print '<script>window.location.assign("loginPage.html");</script>';
		   }

		}


	}



?>
