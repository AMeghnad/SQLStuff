<?php 
//opening script
	///VARIABLES///
	$server_name = "localhost";
	$server_username = "root";
	$server_password = "";
	$dbName = "loginsystem";
	
	$username = $_POST["username_Post"];
	$password = $_POST["password_Post"];
	$email = $_POST["email_Post"];
	
	//Start
	//Make a connection to our server_name
	$conn = new mysqli($server_name, $server_username, $server_password, $database_name);
	//Check connection
	if(!$conn)
	{
		die("Connection failed.".mysql_connect_error());
	}
	
	//set our username from the users table
	$sql = "SELECT username FROM users";
	$result = mysqli_query($conn, $sql);
	$canmakeaccount = "";
	//if we don't have any users
	if(mysqli_num_rows($result) <= 0)
	{
		//create users
		$canmakeaccount = "creating account";
		$createuser = "INSERT INTO users(username, email, password)VALUES('".$username."', '".$email."', '".$password."')";
		$resultcreate = mysqli_query($conn, $createuser);
		
		if(!$resultcreate)
		{
			echo "Error";
		}
		else
		{
			echo "Create First User";
		}
	}
	// else if we have users, check matches
	else if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
			if($row['username'] == $username)
			{
				$canmakeaccount = "cant_user";
				echo "User Already Exists";
			}
			else
			{
				$canmakeaccount = "email_check";				
			}
		}
	}
	else if($canmakeaccount == "email_check" && mysqli_num_rows($result) > 0)
	{
		$checkemail = "SELECT email FROM users";
		$resultemail = mysqli_query($conn, $checkemail);
		
		if(mysqli_num_rows($resultemail) > 0)
		{
			while($row = mysqli_fetch_assoc($resultemail))
			{
				if($row['email'] == $email)
				{
					$canmakeaccount = "cant_email";
					echo "Email Already Exists";
				}
				else
				{
					//create users
					$canmakeaccount = "creating account";
					$createuser = "INSERT INTO users(username, email, password)VALUES('".$username."', '".$email."', '".$password."')";
					$resultcreate = mysqli_query($conn, $createuser);
		
					if(!$resultcreate)
					{
						echo "Error";
					}
					else
					{
						echo "Create User";
					}
				}
			}
		}
	}
	
// closing script
?> 