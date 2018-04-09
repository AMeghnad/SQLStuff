<?php
	$server_name = "localhost";
	$server_username = "root";
	$server_password = "";
	$dbName = "loginsystem";
	
	$username = $_POST["username_Post"];
	$password = $_POST["password_Post"];
	
	// select the username and password fields from users and compare the username then password
	$checkaccount = "SELECT password FROM users WHERE username = '".$username."'";
	$amountofrows = mysqli_query ($conn, $checkaccount);
	if(mysqli_num_rows($amountofrows) > 0)
	{
		while($row = mysqli_fetch_assoc($amountofrows))
		{
			if($row ['password'] == $password)
			{
				echo "Signing in";
			}
			else
			{
				echo "Password Incorrect";
			}
		}
	}
	else
	{
		echo "User Not Found";
	}
?>