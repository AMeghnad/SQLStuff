<?php
		
		$servername = "localhost";
		$server_username = "root";
		$server_password = "";
		$dbName = "loginsystem";
	

		$email = $_POST["email_Post"];
		$password = $_POST["password_Post"];
		
		//Make Connection
		$conn = new mysqli($servername, $server_username,$server_password,$dbName);
		//Check Connection
		if(!$conn)
		{
			die("Connection Failed.". mysql_connect_error());
		}
		
		$sql = "Select password From users Where email = '".$email."'";
		$sqlPassword = "Update users Set password = '".$password."'";
		$result = mysqli_query($conn, $sqliPassword);
		if (!result)
		{
			echo "Error";
		}
		else
		{
			echo "Password Updated";
		}
		
?>