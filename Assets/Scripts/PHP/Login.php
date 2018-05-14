<?php
	$server_name = "localhost";
	$server_username = "root";
	$server_password = "";
	$dbName = "loginsystem";
	
	$username = $_POST["username_Post"];
	$password = $_POST["password_Post"];
	
	//Make a connection to our server_name
	$conn = new mysqli($server_name, $server_username, $server_password, $database_name);
	//Check connection
	if(!$conn)
	{
		die("Connection failed.".mysql_connect_error());
	}

	// select the username and password fields from users and compare the username then password
	$checkaccount = "SELECT username, password FROM users";
	$result = mysqli_query($conn, $checkaccount); 
	
	if(mysqli_num_rows($result) > 0) // if number of rows > 0
	{
		while($row = mysqli_fetch_assoc($result))
		{
			if($row ['username'] == $username && $row ['password'] == $password)
			{
				echo "Success";
				break 1;
			}
		}
	}
	else
	{
		echo "User Not Found";
	}
?>