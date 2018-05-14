<?php
$servername = "localhost";
$server_username = "root";
$server_password = "";
$dbName = "loginsystem";

// Make connection
$conn = new mysqli($servername, $server_username, $server_password, $dbName);
// Check connection
if(!$conn)
{
	die("Connection Failed.".mysql_connect_error());
}

// Get all the data from our weapon database
$getItem = "SELECT id, name, damage, ammoType, weaponRange, meshName, icon, clipSize FROM weapons";
// Connect and search
$result = mysqli_query($conn, $getItem);
// If we have something in that search result
if(mysqli_num_rows($result)>0)
{
	// while we have rows Echo info
	while($row = mysqli_fetch_assoc($result))
	{
		// We are going to pull a string of all the items
		// Items are by split by #
		// item data is split by |
		echo $row["id"]."|"
			.$row["name"]."|"
			.$row["damage"]."|"
			.$row["ammoType"]."|"
			.$row["weaponRange"]."|"
			.$row["meshName"]."|"
			.$row["icon"]."|"
			.$row["clipSize"]."#";
	}
}
?>