<?php
$servername = "localhost";
$server_username = "root";
$server_password = "";
$dbName = "loginsystem";

$email = $_POST("email_Post");
$password = $_POST("password_Post");

// Make connection
$conn = new mysqli($servername, $server_username, $server_password, $dbName);
// Check connection
if(!$conn)
{
	die("Connection Failed.". mysql_connect_error());
}

$sql = "SELECT password FROM users WHERE email = '".$email."'";
$sqlPassword = "UPDATE users SET password ='".$password."'";
$result = mysqli_query($conn, $sqlPassword);
if(!result)
{
	echo "Error";
}
else
{
	echo "Password Updated";
}
	